/**
 * CNIC TLD Manager - Reusable TLD functionality across modules
 * Handles TLD loading, selection, and domain filtering
 * 
 * This module follows DRY principles by providing reusable TLD functionality
 * that can be used in additional fields, sync, and other modules.
 */

if (typeof window.CNIC === 'undefined') {
    window.CNIC = {};
}

window.CNIC.TldManager = (function() {
    'use strict';

    // Configuration
    const CONFIG = {
        loadTldEndpoint: '?action=loadtld',
        requestTimeout: 30000,
        retryAttempts: 3
    };

    // State management
    let state = {
        availableTlds: [],
        loadedDomains: {},
        currentTld: null,
        isLoading: false
    };

    /**
     * Initialize TLD selectize dropdown
     * @param {string} selectId - ID of the select element
     * @param {Object} options - Configuration options
     */
    function initTldSelectize(selectId, options = {}) {
        const $select = $('#' + selectId);
        if (!$select.length) {
            console.warn('TLD Manager: Select element not found:', selectId);
            return null;
        }

        // Default options
        const defaultOptions = {
            placeholder: 'Type or select a TLD...',
            searchField: ['text', 'value'],
            maxOptions: 50,
            create: true,
            createFilter: function(input) {
                // Allow creation of TLD-like inputs (.com, .it, etc.)
                return /^\.?[a-zA-Z0-9-]{2,}$/.test(input);
            },
            render: {
                option_create: function(data, escape) {
                    return '<div class="create">Add TLD: <strong>' + escape(data.input) + '</strong></div>';
                }
            },
            onInitialize: function() {
                loadPopularTlds(this);
            }
        };

        const selectizeOptions = Object.assign(defaultOptions, options);

        // Check if selectize is available
        if (typeof $.fn.selectize === 'undefined') {
            console.error('TLD Manager: Selectize plugin not available');
            return null;
        }

        // Destroy existing selectize if present
        if ($select[0].selectize) {
            $select[0].selectize.destroy();
        }

        return $select.selectize(selectizeOptions)[0].selectize;
    }

    /**
     * Load popular TLDs into selectize dropdown
     * @param {Object} selectizeInstance - Selectize instance
     */
    function loadPopularTlds(selectizeInstance) {
        const popularTlds = [
            { value: '.com', text: '.com' },
            { value: '.net', text: '.net' },
            { value: '.org', text: '.org' },
            { value: '.it', text: '.it' },
            { value: '.de', text: '.de' },
            { value: '.uk', text: '.uk' },
            { value: '.eu', text: '.eu' },
            { value: '.info', text: '.info' },
            { value: '.biz', text: '.biz' },
            { value: '.name', text: '.name' }
        ];

        popularTlds.forEach(tld => {
            selectizeInstance.addOption(tld);
        });

        state.availableTlds = popularTlds.map(tld => tld.value);
    }

    /**
     * Load domains for a specific TLD from registrar
     * @param {string} tld - TLD to load domains for
     * @param {Function} callback - Callback function
     */
    function loadDomainsForTld(tld, callback) {
        if (!tld) {
            callback(new Error('TLD is required'));
            return;
        }

        // Normalize TLD (ensure it starts with a dot)
        const normalizedTld = tld.startsWith('.') ? tld : '.' + tld;

        // Check cache first
        if (state.loadedDomains[normalizedTld]) {
            callback(null, state.loadedDomains[normalizedTld]);
            return;
        }

        state.isLoading = true;
        state.currentTld = normalizedTld;

        // Make AJAX request to load domains
        $.ajax({
            url: CONFIG.loadTldEndpoint,
            type: 'POST',
            data: { 
                tld: normalizedTld,
                loadDomains: true 
            },
            dataType: 'json',
            timeout: CONFIG.requestTimeout,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            success: function(response) {
                state.isLoading = false;
                
                if (response && response.success) {
                    const domains = response.domains || [];
                    state.loadedDomains[normalizedTld] = domains;
                    callback(null, domains);
                } else {
                    const error = new Error(response.error || 'Failed to load domains for TLD');
                    callback(error);
                }
            },
            error: function(xhr, status, error) {
                state.isLoading = false;
                console.error('TLD Manager: Failed to load domains for TLD:', normalizedTld, error);
                callback(new Error('Network error: ' + error));
            }
        });
    }

    /**
     * Filter domains by TLD from a given list
     * @param {Array} domains - List of domain objects
     * @param {string} tld - TLD to filter by
     * @return {Array} Filtered domains
     */
    function filterDomainsByTld(domains, tld) {
        if (!domains || !Array.isArray(domains) || !tld) {
            return [];
        }

        const normalizedTld = tld.startsWith('.') ? tld : '.' + tld;
        
        return domains.filter(domain => {
            const domainName = domain.domain || domain.name || domain;
            return domainName.toLowerCase().endsWith(normalizedTld.toLowerCase());
        });
    }

    /**
     * Show loading state for TLD operations
     * @param {string} containerId - Container to show loading in
     * @param {string} message - Loading message
     */
    function showTldLoading(containerId, message = 'Loading TLD data...') {
        const $container = $('#' + containerId);
        if (!$container.length) return;

        const loadingHtml = `
            <div class="tld-loading-indicator">
                <div class="text-center">
                    <i class="fas fa-spinner fa-spin fa-2x text-muted"></i>
                    <p class="text-muted margin-top-2">${message}</p>
                </div>
            </div>
        `;

        $container.html(loadingHtml);
    }

    /**
     * Hide loading state
     * @param {string} containerId - Container to hide loading from
     */
    function hideTldLoading(containerId) {
        const $container = $('#' + containerId);
        if (!$container.length) return;

        $container.find('.tld-loading-indicator').remove();
    }

    /**
     * Initialize domain list in disabled state - Single Source of Truth
     * @param {string} listId - The ID of the select element
     */
    function initializeDomainList(listId) {
        const $list = $('#' + listId);
        if (!$list.length) return;
        
        // Set initial disabled state as single source of truth
        $list.prop('disabled', true)
             .removeClass('interactive')
             .addClass('disabled')
             .css('pointer-events', 'none');
             
        console.log(`[TldManager] Domain list ${listId} initialized in disabled state`);
    }

    /**
     * Populate domains list with domains data - Single Source of Truth
     * @param {string} listId - The ID of the select element
     * @param {Array} domains - Array of domain objects
     */
    function populateDomainslist(listId, domains) {
        const $list = $('#' + listId);
        if (!$list.length) return;

        // Clear existing content
        $list.empty();

        if (!domains || domains.length === 0) {
            // No domains case - disable and show message
            $list.append('<option value="">No domains found for this TLD</option>')
                 .prop('disabled', true)
                 .removeClass('interactive')
                 .addClass('disabled')
                 .css('pointer-events', 'none');
            console.log(`[TldManager] Domain list ${listId} disabled - no domains found`);
            return;
        }

        // Populate with domains
        domains.forEach(domain => {
            const domainName = domain.domain || domain.name || domain;
            const $option = $('<option></option>')
                .attr('value', domainName)
                .text(domainName);
            $list.append($option);
        });
        
        // Enable the list and make it interactive - Single Source of Truth
        $list.prop('disabled', false)
             .removeClass('disabled')
             .addClass('interactive')
             .css('pointer-events', 'auto');
             
        console.log(`[TldManager] Domain list ${listId} populated with ${domains.length} domains and enabled`);
    }

    /**
     * Get current state
     * @return {Object} Current state
     */
    function getState() {
        return Object.assign({}, state);
    }

    /**
     * Reset state
     */
    function resetState() {
        state = {
            availableTlds: [],
            loadedDomains: {},
            currentTld: null,
            isLoading: false
        };
    }

    // Public API
    return {
        initTldSelectize,
        loadDomainsForTld,
        filterDomainsByTld,
        showTldLoading,
        hideTldLoading,
        initializeDomainList,
        populateDomainslist,
        getState,
        resetState,
        
        // Utility methods
        normalizeTld: function(tld) {
            if (!tld) return '';
            return tld.startsWith('.') ? tld : '.' + tld;
        },
        
        isValidTld: function(tld) {
            return /^\.?[a-zA-Z0-9-]{2,}$/.test(tld);
        }
    };
})();