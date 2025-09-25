/**
 * CentralNic Domain Expiry Sync - Main Entry Point
 * Clean module loader with proper dependency management
 * 
 * @author CNIC Development Team
 * @version 2.0.0
 */

'use strict';

(() => {
    /**
     * Module loading configuration
     */
    const SYNC_CONFIG = Object.freeze({
        // Module loading order (dependencies first)
        MODULES: [
            'AlertManager.js',          // No dependencies
            'UIManager.js',             // Depends on AlertManager
            'DomainManager.js',         // Depends on AlertManager
            'TableManager.js',          // No dependencies (standalone)
            'NavigationManager.js',     // Depends on UIManager
            'SyncEngine.js',            // Depends on TableManager, NavigationManager, AlertManager
            'SyncApp.js'               // Main app (depends on all modules)
        ],
        
        // Base paths
        SYNC_MODULE_PATH: '/resources/cnic/assets/js/cnicadmin/sync/',
        
        // Loading options
        CACHE_BUSTING: true,
        TIMEOUT: 10000, // 10 seconds per module
        RETRY_ATTEMPTS: 2
    });

    /**
     * Module loader class
     */
    class SyncModuleLoader {
        constructor() {
            this.loadedModules = new Set();
            this.failedModules = new Set();
            this.loadingPromises = new Map();
            this.startTime = Date.now();
        }

        /**
         * Load all sync modules
         * @returns {Promise<boolean>} Loading success
         */
        async loadAllModules() {
            try {
                // Load modules sequentially to respect dependencies
                for (const moduleName of SYNC_CONFIG.MODULES) {
                    const success = await this.loadModule(moduleName);
                    if (!success) {
                        throw new Error(`Failed to load critical module: ${moduleName}`);
                    }
                }

                // Initialize application
                await this.initializeApplication();
                
                return true;

            } catch (error) {
                console.error('[SyncModuleLoader] Module loading failed:', error);
                this.handleLoadingError(error);
                return false;
            }
        }

        /**
         * Load a single module
         * @param {string} moduleName - Module file name
         * @returns {Promise<boolean>} Load success
         */
        async loadModule(moduleName) {
            // Skip if already loaded
            if (this.loadedModules.has(moduleName)) {
                return true;
            }

            // Check if loading is in progress
            if (this.loadingPromises.has(moduleName)) {
                return await this.loadingPromises.get(moduleName);
            }

            // Create loading promise
            const loadingPromise = this.performModuleLoad(moduleName);
            this.loadingPromises.set(moduleName, loadingPromise);

            try {
                const result = await loadingPromise;
                return result;
            } finally {
                this.loadingPromises.delete(moduleName);
            }
        }

        /**
         * Perform actual module loading with retry
         * @param {string} moduleName - Module file name
         * @returns {Promise<boolean>} Load success
         */
        async performModuleLoad(moduleName) {
            let lastError;

            for (let attempt = 1; attempt <= SYNC_CONFIG.RETRY_ATTEMPTS; attempt++) {
                try {
                    await this.loadScript(moduleName);
                    
                    this.loadedModules.add(moduleName);
                    return true;

                } catch (error) {
                    lastError = error;
                    console.warn(`[SyncModuleLoader] Load attempt ${attempt} failed for ${moduleName}:`, error.message);
                    
                    if (attempt < SYNC_CONFIG.RETRY_ATTEMPTS) {
                        await this.delay(1000 * attempt); // Exponential backoff
                    }
                }
            }

            this.failedModules.add(moduleName);
            console.error(`[SyncModuleLoader] Failed to load ${moduleName} after ${SYNC_CONFIG.RETRY_ATTEMPTS} attempts:`, lastError);
            throw lastError;
        }

        /**
         * Load script file
         * @param {string} moduleName - Module file name
         * @returns {Promise<void>}
         */
        loadScript(moduleName) {
            return new Promise((resolve, reject) => {
                const script = document.createElement('script');
                const moduleUrl = this.buildModuleUrl(moduleName);
                
                script.src = moduleUrl;
                script.type = 'text/javascript';
                script.async = false; // Ensure sequential loading
                
                // Setup timeout
                const timeoutId = setTimeout(() => {
                    reject(new Error(`Module load timeout: ${moduleName}`));
                }, SYNC_CONFIG.TIMEOUT);

                script.onload = () => {
                    clearTimeout(timeoutId);
                    resolve();
                };

                script.onerror = () => {
                    clearTimeout(timeoutId);
                    reject(new Error(`Script load error: ${moduleName}`));
                };

                // Append to head to start loading
                document.head.appendChild(script);
            });
        }

        /**
         * Build module URL with cache busting
         * @param {string} moduleName - Module file name
         * @returns {string} Complete module URL
         */
        buildModuleUrl(moduleName) {
            let url = SYNC_CONFIG.SYNC_MODULE_PATH + moduleName;
            
            if (SYNC_CONFIG.CACHE_BUSTING) {
                url += '?ts=' + Date.now();
            }
            
            return url;
        }

        /**
         * Initialize the main application
         * @returns {Promise<boolean>} Initialization success
         */
        async initializeApplication() {
            try {
                // Verify SyncApp is available
                if (typeof window.SyncApp !== 'function') {
                    throw new Error('SyncApp class not found - module loading may have failed');
                }

                // Create and initialize application instance
                const syncApp = new window.SyncApp();
                const success = await syncApp.init();

                if (success) {
                    // Make app instance globally available
                    window.cnicSyncApp = syncApp;
                    
                    // Dispatch ready event
                    this.dispatchReadyEvent();
                    return true;
                } else {
                    throw new Error('Application initialization failed');
                }

            } catch (error) {
                console.error('[SyncModuleLoader] Application initialization failed:', error);
                throw error;
            }
        }

        /**
         * Dispatch application ready event
         */
        dispatchReadyEvent() {
            const event = new CustomEvent('cnicSyncReady', {
                detail: {
                    app: window.cnicSyncApp,
                    loadTime: Date.now() - this.startTime,
                    loadedModules: Array.from(this.loadedModules)
                }
            });

            document.dispatchEvent(event);
        }

        /**
         * Handle loading errors
         * @param {Error} error - Error object
         */
        handleLoadingError(error) {
            console.error('[SyncModuleLoader] Critical loading error:', error);
            
            // Show user-friendly error message
            const errorMessage = `
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Module Loading Failed</h4>
                    <p>The sync application failed to load properly. Please refresh the page and try again.</p>
                    <hr>
                    <p class="mb-0">
                        <small><strong>Error:</strong> ${error.message}</small>
                    </p>
                </div>
            `;

            // Try to show in alert container or body
            const $alertContainer = $('#alertContainer');
            if ($alertContainer.length > 0) {
                $alertContainer.html(errorMessage);
            } else {
                $('body').prepend(errorMessage);
            }

            // Dispatch error event
            const event = new CustomEvent('cnicSyncError', {
                detail: { error }
            });
            document.dispatchEvent(event);
        }

        /**
         * Simple delay utility
         * @param {number} ms - Milliseconds to delay
         * @returns {Promise<void>}
         */
        delay(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
        }

        /**
         * Get loading statistics
         * @returns {Object} Loading stats
         */
        getStats() {
            return Object.freeze({
                totalModules: SYNC_CONFIG.MODULES.length,
                loadedCount: this.loadedModules.size,
                failedCount: this.failedModules.size,
                loadTime: Date.now() - this.startTime,
                loadedModules: Array.from(this.loadedModules),
                failedModules: Array.from(this.failedModules)
            });
        }
    }

    /**
     * Auto-initialize when DOM is ready
     */
    function autoInitialize() {
        const loader = new SyncModuleLoader();
        
        // Make loader available for debugging
        window.cnicSyncLoader = loader;
        
        // Start loading
        loader.loadAllModules().catch(error => {
            console.error('[SyncModuleLoader] Auto-initialization failed:', error);
        });
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', autoInitialize);
    } else {
        // DOM already ready
        autoInitialize();
    }

    // Export loader class for manual use if needed
    window.SyncModuleLoader = SyncModuleLoader;
})();