/**
 * DomainManager - Clean Domain Data Management
 * Handles domain fetching, caching, and selection logic
 * 
 * @author CNIC Development Team
 * @version 2.0.0
 */

'use strict';

class DomainManager {
    /**
     * DomainManager constants
     */
    static get CONSTANTS() {
        return Object.freeze({
            CACHE_DURATION: 300000, // 5 minutes
            MAX_DOMAINS_PER_REQUEST: 100,
            REQUEST_TIMEOUT: 15000, // 15 seconds
            RETRY_ATTEMPTS: 2
        });
    }

    /**
     * Constructor
     * @param {SyncApp} app - Main application instance
     */
    constructor(app) {
        if (!app) {
            throw new Error('[DomainManager] Application instance is required');
        }

        this.app = app;
        this.domainCache = new Map();
        this.tldCache = new Map();
        this.activeRequests = new Map();
        
        // Bind methods to maintain context
        this.fetchDomains = this.fetchDomains.bind(this);
        this.updateSyncButtonState = this.updateSyncButtonState.bind(this);
        this.reset = this.reset.bind(this);

        console.log('[DomainManager] Instance created');
    }

    /**
     * Fetch domains for selected registrar
     * @param {boolean} forceRefresh - Force refresh even if cached
     * @returns {Promise<boolean>} Fetch success status
     */
    async fetchDomains(forceRefresh = false) {
        const registrar = this.getSelectedRegistrar();
        
        if (!registrar) {
            console.warn('[DomainManager] No registrar selected for domain fetch');
            this.app.getModule('alertManager')?.showWarning('Please select a registrar first');
            return false;
        }

        try {
            console.log(`[DomainManager] Fetching domains for registrar: ${registrar}${forceRefresh ? ' (force refresh)' : ''}`);

            // Show loading state
            this.showDomainLoadingState();

            // Check cache first (unless force refresh is requested)
            if (!forceRefresh && this.isDomainsCached(registrar)) {
                console.log('[DomainManager] Using cached domains');
                this.displayCachedDomains(registrar);
                return true;
            }

            // Fetch fresh data
            const domains = await this.fetchDomainsFromServer(registrar);
            
            if (domains && domains.length >= 0) {
                // Cache and display results
                this.cacheDomains(registrar, domains);
                this.displayDomains(domains);
                
                // Update application state
                this.app.updateState({ domains });

                console.log(`[DomainManager] Successfully fetched ${domains.length} domains`);
                
                // Automatically navigate to step 2 after successful domain fetch
                await this.navigateToConfigurationStep();
                
                return true;
            } else {
                throw new Error('Invalid domain data received from server');
            }

        } catch (error) {
            console.error('[DomainManager] Failed to fetch domains:', error);
            this.handleFetchError(error);
            return false;
        } finally {
            this.hideDomainLoadingState();
        }
    }

    /**
     * Get currently selected registrar
     * @returns {string} Registrar identifier
     * @private
     */
    getSelectedRegistrar() {
        return $(this.app.constructor.CONSTANTS.SELECTORS.registrar).val() || '';
    }

    /**
     * Check if domains are cached for registrar
     * @param {string} registrar - Registrar identifier
     * @returns {boolean} True if cached and valid
     * @private
     */
    isDomainsCached(registrar) {
        if (!this.domainCache.has(registrar)) {
            return false;
        }

        const cacheEntry = this.domainCache.get(registrar);
        const now = Date.now();
        
        return (now - cacheEntry.timestamp) < DomainManager.CONSTANTS.CACHE_DURATION;
    }

    /**
     * Display cached domains
     * @param {string} registrar - Registrar identifier
     * @private
     */
    displayCachedDomains(registrar) {
        const cacheEntry = this.domainCache.get(registrar);
        this.displayDomains(cacheEntry.domains);
        
        // Update application state
        this.app.updateState({ domains: cacheEntry.domains });
    }

    /**
     * Fetch domains from server
     * @param {string} registrar - Registrar identifier
     * @returns {Promise<Array>} Domain list
     * @private
     */
    async fetchDomainsFromServer(registrar) {
        // Prevent duplicate requests
        if (this.activeRequests.has(registrar)) {
            console.log(`[DomainManager] Request already active for ${registrar}, waiting...`);
            return await this.activeRequests.get(registrar);
        }

        // Create request promise
        const requestPromise = this.performDomainFetch(registrar);
        this.activeRequests.set(registrar, requestPromise);

        try {
            const result = await requestPromise;
            return result;
        } finally {
            this.activeRequests.delete(registrar);
        }
    }

    /**
     * Perform actual domain fetch with retry logic
     * @param {string} registrar - Registrar identifier
     * @returns {Promise<Array>} Domain list
     * @private
     */
    async performDomainFetch(registrar) {
        let lastError;

        for (let attempt = 1; attempt <= DomainManager.CONSTANTS.RETRY_ATTEMPTS; attempt++) {
            try {
                console.log(`[DomainManager] Fetch attempt ${attempt} for ${registrar}`);

                const response = await $.ajax({
                    url: 'addonmodules.php?module=cnicadmin&action=sync',
                    method: 'POST',
                    data: { type: 'fetchDomains', registrar },
                    timeout: DomainManager.CONSTANTS.REQUEST_TIMEOUT,
                    dataType: 'json'
                });

                if (response && response.success) {
                    return response.domains || [];
                } else {
                    throw new Error(response?.message || 'Failed to fetch domains');
                }

            } catch (error) {
                lastError = error;
                console.warn(`[DomainManager] Attempt ${attempt} failed:`, error.message);
                
                if (attempt < DomainManager.CONSTANTS.RETRY_ATTEMPTS) {
                    await new Promise(resolve => setTimeout(resolve, 1000 * attempt));
                }
            }
        }

        throw lastError;
    }

    /**
     * Cache domains for registrar
     * @param {string} registrar - Registrar identifier
     * @param {Array} domains - Domain list
     * @private
     */
    cacheDomains(registrar, domains) {
        this.domainCache.set(registrar, {
            domains,
            timestamp: Date.now()
        });

        console.log(`[DomainManager] Cached ${domains.length} domains for ${registrar}`);
    }

    /**
     * Display domains in UI
     * @param {Array} domains - Domain list to display
     * @private
     */
    displayDomains(domains) {
        console.log(`[DomainManager] Displaying ${domains.length} domains`);

        // Update domain count
        $('#domainCount').text(domains.length);

        // Populate single domain dropdown
        this.populateDomainDropdown(domains);

        // Also populate TLD list for TLD-specific sync
        this.populateTldDropdown(domains);

        // Update sync button state
        this.updateSyncButtonState();

        // Bind domain selection events
        this.bindDomainSelectionEvents();
    }

    /**
     * Populate domain dropdown for single domain sync
     * @param {Array} domains - Domain list
     * @private
     */
    populateDomainDropdown(domains) {
        const $domainSelect = $('#domain');
        
        if ($domainSelect.length === 0) {
            console.warn('[DomainManager] Domain select element not found');
            return;
        }

        // Clear existing options
        $domainSelect.empty().append('<option value="">Choose a domain...</option>');

        if (domains.length === 0) {
            $domainSelect.append('<option value="" disabled>No domains available</option>');
            $domainSelect.prop('disabled', true);
            return;
        }

        // Add domain options
        domains.forEach(domain => {
            const domainName = domain.domain || domain.name;
            const expiryDate = domain.expirydate || domain.expiry || 'Unknown';
            
            $domainSelect.append(`
                <option value="${domainName}" title="Expires: ${expiryDate}">
                    ${domainName} (Expires: ${expiryDate})
                </option>
            `);
        });

        // Enable dropdown
        $domainSelect.prop('disabled', false);

        // Setup search functionality
        this.setupDomainSearch(domains);

        console.log(`[DomainManager] Populated domain dropdown with ${domains.length} domains`);
    }

    /**
     * Setup domain search functionality
     * @param {Array} domains - Available domains
     * @private
     */
    setupDomainSearch(domains) {
        const $searchInput = $('#domainSearch');
        const $domainSelect = $('#domain');
        
        if ($searchInput.length === 0) return;

        // Enable and show the search input
        $searchInput.prop('disabled', false).show();

        $searchInput.off('input keyup').on('input keyup', function() {
            const searchTerm = $(this).val().toLowerCase();
            
            // Filter domains based on search term
            const filteredDomains = searchTerm.length === 0 ? domains : domains.filter(domain => {
                const domainName = (domain.domain || domain.name).toLowerCase();
                return domainName.includes(searchTerm);
            });

            // Update dropdown options
            $domainSelect.empty().append('<option value="">Choose a domain...</option>');
            
            filteredDomains.forEach(domain => {
                const domainName = domain.domain || domain.name;
                const expiryDate = domain.expirydate || domain.expiry || 'Unknown';
                
                $domainSelect.append(`
                    <option value="${domainName}" title="Expires: ${expiryDate}">
                        ${domainName} (Expires: ${expiryDate})
                    </option>
                `);
            });

            console.log(`[DomainManager] Filtered to ${filteredDomains.length} domains`);
        });

        console.log('[DomainManager] Domain search functionality setup');
    }

    /**
     * Populate TLD dropdown for TLD-specific sync
     * @param {Array} domains - Domain list
     * @private
     */
    populateTldDropdown(domains) {
        console.log('[DomainManager] Populating TLD dropdown with domains:', domains.length);
        
        // Extract unique TLDs from domains
        const tlds = [...new Set(domains.map(domain => {
            const domainName = domain.domain || domain.name;
            const parts = domainName.split('.');
            return '.' + parts.slice(1).join('.');
        }))].sort();

        const $tldSelect = $('#tldSelect');
        
        if ($tldSelect.length === 0) {
            console.error('[DomainManager] TLD select element not found');
            return;
        }

        tlds.forEach(tld => {
            $tldSelect.append(`<option value="${tld}">${tld}</option>`);
        });

        // Enable the dropdown and remove disabled class
        $tldSelect.prop('disabled', false).removeClass('disabled');

        // Initialize or refresh Selectize
        this.initializeTldSelectize($tldSelect);

        // Ensure no value is pre-selected after Selectize initialization
        if ($tldSelect[0] && $tldSelect[0].selectize) {
            $tldSelect[0].selectize.clear();
        }

        // Setup handlers after initialization
        this.setupTldSelectionHandlers(domains);
        
        console.log(`[DomainManager] TLD dropdown populated with ${tlds.length} TLDs`);
    }

    /**
     * Initialize Selectize for TLD dropdown with clean, simple styling
     * @param {jQuery} $tldSelect - TLD select element
     * @private
     */
    initializeTldSelectize($tldSelect) {
        // Destroy existing Selectize instance if it exists
        if ($tldSelect[0] && $tldSelect[0].selectize) {
            $tldSelect[0].selectize.destroy();
        }

        // Simple, clean Selectize configuration - prevent auto-selection
        $tldSelect.selectize({
            placeholder: 'Choose a TLD...',
            searchField: ['text', 'value'],
            allowEmptyOption: true,
            create: false,
            maxItems: 1,
            selectOnTab: false,
            openOnFocus: true,  // Allow single click to open
            hideSelected: true,
            closeAfterSelect: true,
            preload: false,
            dropdownParent: 'body',
            onInitialize: function() {
                // Explicitly clear any selection after initialization
                this.clear();
            },
            render: {
                option: function(item, escape) {
                    return '<div class="selectize-option">' + escape(item.text) + '</div>';
                },
                item: function(item, escape) {
                    return '<div class="selectize-item">' + escape(item.text) + '</div>';
                }
            }
        });

        console.log('[DomainManager] TLD Selectize initialized with clean styling');
    }

    /**
     * Setup TLD selection handlers using existing domain data
     * @param {Array} domains - Available domains
     * @private
     */
    setupTldSelectionHandlers(domains) {
        const $tldSelect = $('#tldSelect');
        
        // Setup TLD change handler - works with both regular select and Selectize
        $tldSelect.off('change').on('change', (e) => {
            const selectedTld = $(e.target).val();
            if (selectedTld) {
                this.handleTldSelectionFromDomains(selectedTld, domains);
            }
            // Always update sync button state when selection changes
            this.updateSyncButtonState();
        });

        // Also bind to Selectize-specific events if Selectize is present
        if ($tldSelect[0].selectize) {
            $tldSelect[0].selectize.on('change', (value) => {
                if (value) {
                    this.handleTldSelectionFromDomains(value, domains);
                }
                this.updateSyncButtonState();
            });
        }

        console.log('[DomainManager] TLD selection handlers setup complete');
    }

    /**
     * Handle TLD selection for sync - simplified version
     * @param {string} selectedTld - Selected TLD  
     * @param {Array} domains - Available domains
     * @private
     */
    handleTldSelectionFromDomains(selectedTld, domains) {
        console.log(`[DomainManager] TLD selected for sync: ${selectedTld}`);

        // Filter and store all domains for the selected TLD
        const tldDomains = domains.filter(domain => {
            const domainName = domain.domain || domain.name;
            return domainName.endsWith(selectedTld);
        });

        // Store all TLD domains for sync (no preview selection)
        this.selectedTldDomains = tldDomains;

        // Update UI elements if they exist (for backwards compatibility)
        const $selectedTldName = $('#selectedTldName');
        if ($selectedTldName.length) {
            $selectedTldName.text(selectedTld);
        }
        
        const $tldDomainsCount = $('#tldDomainsCount');
        if ($tldDomainsCount.length) {
            $tldDomainsCount.text(tldDomains.length);
        }

        // Show the TLD domains wrapper if it exists
        const $tldDomainsWrapper = $('.tld-domains-wrapper');
        if ($tldDomainsWrapper.length) {
            $tldDomainsWrapper.show();
        }

        // Update sync button state immediately after TLD selection
        this.updateSyncButtonState();

        console.log(`[DomainManager] Auto-selected ${tldDomains.length} domains for TLD ${selectedTld} sync`);
    }

    /**
     * Setup TLD selection functionality using existing domain data
     * @returns {Promise<boolean>} Setup success
     */
    async setupTldSelection() {
        try {
            // Get cached domains for current registrar
            const registrar = this.getSelectedRegistrar();
            if (!registrar) {
                console.warn('[DomainManager] No registrar selected for TLD setup');
                return false;
            }

            const cachedData = this.domainCache.get(registrar);
            if (!cachedData || !cachedData.domains) {
                console.warn('[DomainManager] No cached domains available for TLD setup');
                return false;
            }

            // Use existing domain data to populate TLD dropdown
            this.populateTldDropdown(cachedData.domains);

            console.log('[DomainManager] TLD selection setup complete using cached domains');
            return true;

        } catch (error) {
            console.error('[DomainManager] Failed to setup TLD selection:', error);
            
            // Show user-friendly error
            this.app.getModule('alertManager')?.showError(
                'Failed to setup TLD selection. Please ensure domains are loaded first.'
            );
            
            return false;
        }
    }

    /**
     * Update domain selection state
     * @private
     */
    updateDomainSelection() {
        const selectedDomain = $('#domain').val();
        console.log(`[DomainManager] Single domain selected: ${selectedDomain || 'none'}`);

        // Update UI based on selection
        if (selectedDomain) {
            $('.selected-domain-count').text(1);
        } else {
            $('.selected-domain-count').text(0);
        }
    }

    /**
     * Bind domain selection change events
     * @private
     */
    bindDomainSelectionEvents() {
        // Bind single domain dropdown change
        $('#domain').off('change').on('change', () => {
            this.updateSyncButtonState();
            this.updateDomainSelection();
        });

        console.log('[DomainManager] Domain selection events bound');
    }

    /**
     * Get currently selected domains
     * @returns {Array} Selected domain names
     */
    getSelectedDomains() {
        const selected = [];
        
        $('#domainsList input[type="checkbox"]:checked').each(function() {
            selected.push($(this).val());
        });

        return selected;
    }

    /**
     * Get selected TLD domains for sync
     * @returns {Array} Selected TLD domains
     */
    getSelectedTldDomains() {
        return this.selectedTldDomains || [];
    }

    /**
     * Get domains for sync based on selected sync type
     * @returns {Array} Domains to sync
     */
    getDomainsForSync() {
        const selectedSyncType = $('input[name="syncType"]:checked').val();
        const registrar = this.getSelectedRegistrar();
        
        console.log(`[DomainManager] Getting domains for sync type: ${selectedSyncType}`);

        switch (selectedSyncType) {
            case 'all':
                // Return all cached domains for the selected registrar
                const cachedData = this.domainCache.get(registrar);
                if (cachedData && cachedData.domains) {
                    console.log(`[DomainManager] Returning ${cachedData.domains.length} domains for 'all' sync`);
                    return cachedData.domains;
                }
                return [];

            case 'single':
                // Return the single selected domain
                const selectedDomain = $('#domain').val();
                if (selectedDomain) {
                    const cachedData = this.domainCache.get(registrar);
                    if (cachedData && cachedData.domains) {
                        const domain = cachedData.domains.find(d => 
                            (d.domain || d.name) === selectedDomain
                        );
                        if (domain) {
                            console.log(`[DomainManager] Returning 1 domain for 'single' sync: ${selectedDomain}`);
                            return [domain];
                        }
                    }
                }
                return [];

            case 'tld':
                // Return domains for selected TLD
                const tldDomains = this.getSelectedTldDomains();
                console.log(`[DomainManager] Returning ${tldDomains.length} domains for 'tld' sync`);
                return tldDomains;

            default:
                console.warn(`[DomainManager] Unknown sync type: ${selectedSyncType}`);
                return [];
        }
    }

    /**
     * Update sync button state based on selections
     * @returns {boolean} Update success
     */
    updateSyncButtonState() {
        try {
            const $syncButton = $('.sync-start-button');
            const selectedSyncType = $('input[name="syncType"]:checked').val();

            let enableButton = false;

            switch (selectedSyncType) {
                case 'all':
                    enableButton = true; // Always enabled for all domains
                    break;
                case 'single':
                    const selectedDomain = $('#domain').val();
                    enableButton = selectedDomain && selectedDomain.length > 0;
                    break;
                case 'tld':
                    const selectedTld = $('#tldSelect').val();
                    enableButton = selectedTld && selectedTld.length > 0;
                    break;
                default:
                    enableButton = false;
            }

            if (enableButton) {
                $syncButton.removeClass('disabled').prop('disabled', false);
                console.log(`[DomainManager] Sync button enabled for ${selectedSyncType} sync`);
            } else {
                $syncButton.addClass('disabled').prop('disabled', true);
                console.log(`[DomainManager] Sync button disabled for ${selectedSyncType} sync`);
            }

            return true;

        } catch (error) {
            console.error('[DomainManager] Failed to update sync button state:', error);
            return false;
        }
    }

    /**
     * Check if TLD selection is valid
     * @returns {boolean} True if valid
     * @private
     */
    isTldSelectionValid() {
        const selectedTlds = $('#tldSelect').val();
        return selectedTlds && selectedTlds.length > 0;
    }

    /**
     * Show domain loading state
     * @private
     */
    showDomainLoadingState() {
        const $domainsList = $('#domainsList');
        $domainsList.html('<div class="text-center p-3"><i class="fas fa-spinner fa-spin me-2"></i>Loading domains...</div>');
        
        $('#domainCount').text('Loading...');
    }

    /**
     * Hide domain loading state
     * @private
     */
    hideDomainLoadingState() {
        // Loading state is replaced by actual content or error message
        console.log('[DomainManager] Domain loading state cleared');
    }

    /**
     * Handle domain fetch error
     * @param {Error} error - Error object
     * @private
     */
    handleFetchError(error) {
        console.error('[DomainManager] Domain fetch error:', error);

        // Show error in domains list
        const $domainsList = $('#domainsList');
        $domainsList.html(`
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle me-2"></i>
                Failed to load domains: ${error.message}
                <button type="button" class="btn btn-sm btn-outline-danger ms-2 fetch-domains-retry">
                    <i class="fas fa-redo me-1"></i>Retry
                </button>
            </div>
        `);

        // Reset count
        $('#domainCount').text('Error');

        // Show alert
        this.app.getModule('alertManager')?.showError('Failed to load domains: ' + error.message);

        // Bind retry button - force refresh when retry is clicked
        $('.fetch-domains-retry').off('click').on('click', () => {
            this.fetchDomains(true);
        });
    }

    /**
     * Clear domain cache for registrar
     * @param {string} registrar - Registrar identifier (optional, clears all if not provided)
     * @returns {boolean} Clear success
     */
    clearDomainCache(registrar = null) {
        try {
            if (registrar) {
                this.domainCache.delete(registrar);
                console.log(`[DomainManager] Cache cleared for ${registrar}`);
            } else {
                this.domainCache.clear();
                console.log('[DomainManager] All domain cache cleared');
            }
            return true;
        } catch (error) {
            console.error('[DomainManager] Failed to clear cache:', error);
            return false;
        }
    }

    /**
     * Get domain cache statistics
     * @returns {Object} Cache statistics
     */
    getCacheStats() {
        const stats = {
            domainCacheSize: this.domainCache.size,
            tldCacheSize: this.tldCache.size,
            activeRequests: this.activeRequests.size
        };

        return Object.freeze(stats);
    }

    /**
     * Initialize manager for configuration step
     * Called when navigating to configuration step
     * @returns {boolean} Initialization success
     */
    initializeForConfiguration() {
        try {
            console.log('[DomainManager] Initializing for configuration step...');

            // Update sync button state
            this.updateSyncButtonState();

            // Refresh domain data if needed
            const registrar = this.getSelectedRegistrar();
            if (registrar && !this.isDomainsCached(registrar)) {
                this.fetchDomains();
            }

            return true;

        } catch (error) {
            console.error('[DomainManager] Failed to initialize for configuration:', error);
            return false;
        }
    }

    /**
     * Reset manager to initial state
     * @returns {boolean} Reset success
     */
    reset() {
        console.log('[DomainManager] Resetting manager...');
        
        try {
            // Cancel any active requests
            this.activeRequests.forEach(request => {
                if (request && typeof request.abort === 'function') {
                    try {
                        request.abort();
                    } catch (error) {
                        // Ignore abort errors
                    }
                }
            });
            this.activeRequests.clear();

            // Clear caches
            this.domainCache.clear();
            this.tldCache.clear();

            // Reset UI elements
            $('#domainsList').empty();
            $('#domainCount').text('0');
            $('.selected-domain-count').text('0');

            // Reset application domain state
            this.app.updateState({ domains: [] });

            console.log('[DomainManager] Manager reset completed');
            return true;

        } catch (error) {
            console.error('[DomainManager] Reset failed:', error);
            return false;
        }
    }

    /**
     * Navigate to configuration step after successful domain fetch
     * Provides automatic navigation from step 1 to step 2
     */
    navigateToConfigurationStep() {
        try {
            console.log('[DomainManager] Navigating to configuration step...');
            
            // Get navigation manager from app modules
            const navigationManager = this.app.modules.navigationManager;
            if (!navigationManager) {
                console.warn('[DomainManager] NavigationManager not available');
                return;
            }
            
            // Navigate to step 2 (configuration)
            navigationManager.goToStep(2);
            
            console.log('[DomainManager] Successfully navigated to configuration step');
            
        } catch (error) {
            console.error('[DomainManager] Failed to navigate to configuration:', error);
        }
    }

    /**
     * Destroy manager instance
     */
    destroy() {
        console.log('[DomainManager] Destroying manager...');
        
        try {
            // Cancel active requests
            this.activeRequests.forEach(request => {
                if (request && typeof request.abort === 'function') {
                    try {
                        request.abort();
                    } catch (error) {
                        // Ignore abort errors
                    }
                }
            });

            // Clear all data
            this.domainCache.clear();
            this.tldCache.clear();
            this.activeRequests.clear();
            
            // Clear references
            this.app = null;
            
            console.log('[DomainManager] Manager destroyed');
            
        } catch (error) {
            console.error('[DomainManager] Destroy failed:', error);
        }
    }
}

//=============================================================================
// EXPORT - Make DomainManager available
//=============================================================================

if (typeof module !== 'undefined' && module.exports) {
    module.exports = DomainManager;
} else if (typeof window !== 'undefined') {
    window.DomainManager = DomainManager;
}