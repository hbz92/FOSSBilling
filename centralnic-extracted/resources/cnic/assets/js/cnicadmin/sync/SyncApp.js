/**
 * CentralNic Domain Expiry Sync Application
 * Clean, modern application architecture following best practices
 * 
 * @author CNIC Development Team
 * @version 2.0.0
 */

'use strict';

class SyncApp {
    /**
     * Application constants - immutable configuration
     */
    static get CONSTANTS() {
        return Object.freeze({
            STEPS: Object.freeze({
                REGISTRAR_SELECTION: 1,
                SYNC_CONFIGURATION: 2,
                SYNC_RESULTS: 3
            }),
            SYNC_TYPES: Object.freeze({
                ALL: 'all',
                SINGLE: 'single',
                TLD: 'tld'
            }),
            SELECTORS: Object.freeze({
                // Form elements
                registrar: '#registrar',
                domainInput: '#domainInput',
                domainSearch: '#domainSearch', 
                domain: '#domain',
                domainHelp: '#domainHelp',
                tldInput: '#tldInput',
                tldSelect: '#tldSelect',
                
                // Action buttons
                lookupTldDomainsButton: '#lookupTldDomainsButton',
                startOverBtn: '#startOverBtn',
                cancelSyncBtn: '#cancelSyncBtn',
                
                // Display elements
                loadingOverlay: '#loadingOverlay',
                syncProgress: '#syncProgress',
                progressText: '#progressText',
                tldDomainsList: '#tldDomainsList',
                tldDomainsCount: '#tldDomainsCount',
                selectedTldName: '#selectedTldName',
                alertContainer: '#alertContainer',
                
                // Table elements
                domainTable: '#domainTable',
                domainResults: '#domainResults'
            })
        });
    }

    /**
     * Constructor - Initialize clean application state
     */
    constructor() {
        // Application state - clean and organized
        this.state = {
            domains: [],
            supportedRegistrars: window.supportedRegistrars || {},
            domainId: window.domainId || '',
            activeRequests: new Map(), // Use Map for better performance
            syncCancelled: false,
            totalDomainsToSync: 0,
            completedDomainsCount: 0,
            inCleanup: false
        };

        // Module instances - will be initialized in init()
        this.modules = {
            alertManager: null,
            uiManager: null,
            domainManager: null,
            tableManager: null,
            navigationManager: null,
            syncEngine: null
        };

        // Event handlers registry for proper cleanup
        this.eventHandlers = new Map();
    }

    /**
     * Initialize application - main entry point
     * @returns {Promise<boolean>} Initialization success status
     */
    async init() {
        try {
            // Initialize modules in correct dependency order
            this.initializeModules();
            
            // Setup initial UI state
            this.initializeUI();
            
            // Bind all event handlers
            this.bindEventHandlers();
            
            // Setup cleanup handlers
            this.setupCleanupHandlers();
            
            // Handle special scenarios (auto-sync, single registrar)
            this.handleSpecialScenarios();
            
            return true;
            
        } catch (error) {
            console.error('[SyncApp] Initialization failed:', error);
            this.modules.alertManager?.showError('Application failed to initialize: ' + error.message);
            return false;
        }
    }

    /**
     * Initialize all module instances in proper order
     * @private
     */
    initializeModules() {
        // Order matters - dependencies first
        this.modules.alertManager = new AlertManager(this);
        this.modules.uiManager = new UIManager(this);
        this.modules.domainManager = new DomainManager(this);
        this.modules.tableManager = new TableManager(this);
        this.modules.navigationManager = new NavigationManager(this);
        this.modules.syncEngine = new SyncEngine(this);
    }

    /**
     * Initialize UI to clean starting state
     * @private
     */
    initializeUI() {
        console.log('[SyncApp] Initializing UI state...');
        
        // Hide all steps, show first step
        $('.cnic-step').removeClass('active').hide();
        $(`#step${SyncApp.CONSTANTS.STEPS.REGISTRAR_SELECTION}`).addClass('active').show();
        
        // Initialize UI components with small delay for DOM readiness
        setTimeout(() => {
            this.modules.uiManager.initializeSyncTypeToggle();
            this.modules.uiManager.updateModernChoiceCardStates();
        }, 50);
    }

    /**
     * Bind all event handlers using delegation
     * @private
     */
    bindEventHandlers() {
        const eventBindings = [
            // Form change events
            {
                selector: SyncApp.CONSTANTS.SELECTORS.registrar,
                event: 'change',
                handler: this.handleRegistrarChange.bind(this),
                description: 'Registrar selection change'
            },
            {
                selector: SyncApp.CONSTANTS.SELECTORS.domain,
                event: 'change', 
                handler: this.handleDomainChange.bind(this),
                description: 'Domain selection change'
            },
            
            // Button click events
            {
                selector: '.fetch-domains-btn',
                event: 'click',
                handler: this.handleFetchDomainsClick.bind(this),
                description: 'Fetch domains button'
            },
            {
                selector: '.sync-prev-button',
                event: 'click',
                handler: this.handlePreviousClick.bind(this),
                description: 'Previous step button'
            },
            {
                selector: '.sync-next-button', 
                event: 'click',
                handler: this.handleNextClick.bind(this),
                description: 'Next step button'
            },
            {
                selector: '.sync-start-button',
                event: 'click', 
                handler: this.handleStartSyncClick.bind(this),
                description: 'Start sync button'
            },
            {
                selector: SyncApp.CONSTANTS.SELECTORS.cancelSyncBtn,
                event: 'click',
                handler: this.handleCancelSyncClick.bind(this),
                description: 'Cancel sync button'
            },
            {
                selector: SyncApp.CONSTANTS.SELECTORS.startOverBtn,
                event: 'click',
                handler: this.handleStartOverClick.bind(this),
                description: 'Start over button'
            }
        ];

        // Bind all events using delegation for dynamic content
        eventBindings.forEach(({ selector, event, handler, description }) => {
            $(document).on(event, selector, handler);
            this.eventHandlers.set(`${selector}:${event}`, { handler, description });
        });
    }

    /**
     * Setup browser cleanup handlers
     * @private
     */
    setupCleanupHandlers() {
        const emergencyCleanup = () => {
            if (!this.state.inCleanup) {
                this.performEmergencyCleanup();
            }
        };

        // Browser navigation/close events
        $(window).on('beforeunload unload', emergencyCleanup);
        
        // Tab visibility changes
        $(document).on('visibilitychange', () => {
            if (document.hidden && this.state.syncCancelled) {
                emergencyCleanup();
            }
        });
    }

    /**
     * Handle special application scenarios
     * @private
     */
    handleSpecialScenarios() {
        // Auto-sync single domain if provided
        if (this.state.domainId) {
            // TODO: Implement single domain auto-sync
        }

        // Auto-select single registrar
        const registrars = Object.keys(this.state.supportedRegistrars);
        if (registrars.length === 1) {
            $(SyncApp.CONSTANTS.SELECTORS.registrar).val(registrars[0]).trigger('change');
        }
    }

    //=============================================================================
    // EVENT HANDLERS - Clean, well-organized event handling
    //=============================================================================

    /**
     * Handle registrar selection change
     * @param {Event} event - The change event
     */
    handleRegistrarChange(event) {
        const registrarValue = $(event.target).val();
        if (registrarValue && this.modules.domainManager) {
            this.modules.domainManager.fetchDomains();
        }
    }

    /**
     * Handle domain selection change  
     * @param {Event} event - The change event
     */
    handleDomainChange(event) {
        console.log('[SyncApp] Domain selection changed');
        
        if (this.modules.domainManager) {
            this.modules.domainManager.updateSyncButtonState();
        }
    }

    /**
     * Handle fetch domains button click
     * @param {Event} event - The click event
     */
    handleFetchDomainsClick(event) {
        event.preventDefault();
        console.log('[SyncApp] Fetch domains clicked - forcing refresh');
        
        if (this.modules.domainManager) {
            // Force refresh to bypass cache when button is explicitly clicked
            this.modules.domainManager.fetchDomains(true);
        }
    }

    /**
     * Handle previous step button click
     * @param {Event} event - The click event
     */
    handlePreviousClick(event) {
        event.preventDefault();
        const step = $(event.target).data('step') || SyncApp.CONSTANTS.STEPS.REGISTRAR_SELECTION;
        if (this.modules.navigationManager) {
            this.modules.navigationManager.goToStep(step);
        }
    }

    /**
     * Handle next step button click
     * @param {Event} event - The click event
     */
    handleNextClick(event) {
        event.preventDefault();
        const step = $(event.target).data('step') || SyncApp.CONSTANTS.STEPS.SYNC_CONFIGURATION;
        if (this.modules.navigationManager) {
            this.modules.navigationManager.goToStep(step);
        }
    }

    /**
     * Handle start sync button click
     * @param {Event} event - The click event
     */
    async handleStartSyncClick(event) {
        event.preventDefault();
        
        if ($(event.target).hasClass('disabled')) {
            return;
        }
        
        try {
            // First navigate to results page (step 3)
            const navigationManager = this.getModule('navigationManager');
            if (navigationManager) {
                await navigationManager.goToStep(3);
                
                // Small delay to ensure DOM is ready
                await new Promise(resolve => setTimeout(resolve, 100));
            }
            
            // Then start the sync
            if (this.modules.syncEngine) {
                await this.modules.syncEngine.startSync();
            }
            
        } catch (error) {
            console.error('[SyncApp] Failed to start sync:', error);
            
            // Show error to user
            const alertManager = this.getModule('alertManager');
            if (alertManager) {
                alertManager.showError('Failed to start synchronization: ' + error.message);
            }
        }
    }

    /**
     * Handle cancel sync button click
     * @param {Event} event - The click event
     */
    handleCancelSyncClick(event) {
        event.preventDefault();
        if (this.modules.syncEngine) {
            this.modules.syncEngine.cancelSync();
        }
    }

    /**
     * Handle start over button click
     * @param {Event} event - The click event
     */
    handleStartOverClick(event) {
        event.preventDefault();
        this.performCompleteReset();
    }

    //=============================================================================
    // PUBLIC API METHODS - Clean interface for external interactions
    //=============================================================================

    /**
     * Get current application state
     * @returns {Object} Current state (immutable copy)
     */
    getState() {
        return Object.freeze({ ...this.state });
    }

    /**
     * Update application state safely
     * @param {Object} updates - State updates to apply
     * @returns {boolean} Success status
     */
    updateState(updates) {
        if (!updates || typeof updates !== 'object') {
            console.error('[SyncApp] Invalid state updates provided');
            return false;
        }

        try {
            Object.assign(this.state, updates);
            return true;
        } catch (error) {
            console.error('[SyncApp] Failed to update state:', error);
            return false;
        }
    }

    /**
     * Get module instance
     * @param {string} moduleName - Name of the module
     * @returns {Object|null} Module instance or null
     */
    getModule(moduleName) {
        if (!moduleName || typeof moduleName !== 'string') {
            console.error('[SyncApp] Invalid module name provided');
            return null;
        }

        return this.modules[moduleName] || null;
    }

    /**
     * Check if application is in sync process
     * @returns {boolean} True if sync is active
     */
    isSyncing() {
        return this.state.activeRequests.size > 0 && !this.state.syncCancelled;
    }

    //=============================================================================
    // RESET AND CLEANUP METHODS - Clean application lifecycle management
    //=============================================================================

    /**
     * Perform complete application reset
     * @returns {Promise<boolean>} Reset success status
     */
    async performCompleteReset() {
        console.log('[SyncApp] Performing complete application reset...');
        
        try {
            // 1. Cancel any active sync operations
            if (this.modules.syncEngine && this.isSyncing()) {
                await this.modules.syncEngine.cancelSync();
                // Wait for cancellation to complete
                await new Promise(resolve => setTimeout(resolve, 100));
            }

            // 2. Reset application state
            this.resetApplicationState();

            // 3. Reset all modules
            this.resetAllModules();

            // 4. Reset UI to initial state
            this.resetUserInterface();

            // 5. Navigate to first step
            if (this.modules.navigationManager) {
                this.modules.navigationManager.goToStep(SyncApp.CONSTANTS.STEPS.REGISTRAR_SELECTION);
            }

            console.log('[SyncApp] Complete reset successful - reloading page');
            
            // 6. Reload the page to ensure clean state
            window.location.reload();
            
            return true;

        } catch (error) {
            console.error('[SyncApp] Complete reset failed:', error);
            return false;
        }
    }

    /**
     * Reset application state to initial values
     * @private
     */
    resetApplicationState() {
        console.log('[SyncApp] Resetting application state...');
        
        this.state.domains = [];
        this.state.syncCancelled = false;
        this.state.totalDomainsToSync = 0;
        this.state.completedDomainsCount = 0;
        this.state.inCleanup = false;
        
        // Clear all active requests
        this.state.activeRequests.forEach(request => {
            if (request && typeof request.abort === 'function') {
                request.abort();
            }
        });
        this.state.activeRequests.clear();
    }

    /**
     * Reset all modules to initial state
     * @private
     */
    resetAllModules() {
        console.log('[SyncApp] Resetting all modules...');
        
        // Special handling for TableManager - clear table first
        if (this.modules.tableManager && typeof this.modules.tableManager.clearTableForNewSync === 'function') {
            try {
                this.modules.tableManager.clearTableForNewSync();
                console.log('[SyncApp] Table cleared for new sync');
            } catch (error) {
                console.error('[SyncApp] Failed to clear table:', error);
            }
        }
        
        // Reset modules that have reset methods
        Object.entries(this.modules).forEach(([name, module]) => {
            if (module && typeof module.reset === 'function') {
                try {
                    module.reset();
                    console.log(`[SyncApp] ${name} reset successfully`);
                } catch (error) {
                    console.error(`[SyncApp] Failed to reset ${name}:`, error);
                }
            }
        });
    }

    /**
     * Reset user interface to initial state
     * @private
     */
    resetUserInterface() {
        console.log('[SyncApp] Resetting user interface...');
        
        // Clear form elements
        $(SyncApp.CONSTANTS.SELECTORS.registrar).val('').trigger('change');
        $('#tldSelect').val([]).trigger('change');
        $('#domainsList').empty();
        $('input[name="syncType"]').prop('checked', false);
        
        // Reset display elements
        $('#selectedRegistrarName').text('');
        $('#domainCount').text('0');
        $('.tld-domains-count').text('0');
        
        // Clear progress indicators
        $(SyncApp.CONSTANTS.SELECTORS.progressText).text('');
        $(SyncApp.CONSTANTS.SELECTORS.syncProgress).hide();
    }

    /**
     * Perform emergency cleanup when browser events fire
     * @private
     */
    performEmergencyCleanup() {
        if (this.state.inCleanup) {
            return; // Prevent recursive cleanup calls
        }

        this.state.inCleanup = true;
        console.log('[SyncApp] Performing emergency cleanup...');

        try {
            // Abort all active requests immediately
            this.state.activeRequests.forEach(request => {
                if (request && typeof request.abort === 'function') {
                    try {
                        request.abort();
                    } catch (error) {
                        // Ignore abort errors during emergency cleanup
                    }
                }
            });
            this.state.activeRequests.clear();

            // Emergency cleanup on sync engine
            if (this.modules.syncEngine && typeof this.modules.syncEngine.performEmergencyCleanup === 'function') {
                this.modules.syncEngine.performEmergencyCleanup();
            }

        } catch (error) {
            console.error('[SyncApp] Emergency cleanup error:', error);
        } finally {
            this.state.inCleanup = false;
        }
    }

    /**
     * Cleanup and destroy application instance
     * Call this when the application is no longer needed
     */
    destroy() {
        console.log('[SyncApp] Destroying application...');
        
        try {
            // Unbind all event handlers
            this.eventHandlers.forEach(({ handler, description }, key) => {
                const [selector, event] = key.split(':');
                $(document).off(event, selector, handler);
                console.log(`[SyncApp] Unbound ${description}`);
            });
            this.eventHandlers.clear();

            // Destroy all modules
            Object.entries(this.modules).forEach(([name, module]) => {
                if (module && typeof module.destroy === 'function') {
                    try {
                        module.destroy();
                        console.log(`[SyncApp] ${name} destroyed`);
                    } catch (error) {
                        console.error(`[SyncApp] Failed to destroy ${name}:`, error);
                    }
                }
            });

            // Clear all references
            this.state.activeRequests.clear();
            this.state = null;
            this.modules = null;
            this.eventHandlers = null;

            console.log('[SyncApp] Application destroyed successfully');

        } catch (error) {
            console.error('[SyncApp] Destroy failed:', error);
        }
    }
}

//=============================================================================
// GLOBAL EXPORT - Make SyncApp available globally
//=============================================================================

// Support both CommonJS and browser globals
if (typeof module !== 'undefined' && module.exports) {
    module.exports = SyncApp;
} else if (typeof window !== 'undefined') {
    window.SyncApp = SyncApp;
}