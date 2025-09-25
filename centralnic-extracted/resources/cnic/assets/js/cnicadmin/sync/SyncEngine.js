/**
 * SyncEngine - Clean Domain Sync Processing Engine
 * Handles all domain sync operations with modern async/await patterns
 * 
 * @author CNIC Development Team
 * @version 2.0.0
 */

'use strict';

class SyncEngine {
    /**
    * Constructor
    * @param {SyncApp} app - Main application instance
    */
    constructor(app) {
        if (!app) {
            throw new Error('[SyncEngine] Application instance is required');
        }

        this.app = app;
        this.state = SyncEngine.CONSTANTS.SYNC_STATES.IDLE;
        this.activeRequests = new Map();
        this.completedCount = 0;
        this.totalCount = 0;
        this.errors = [];
        this.shouldContinue = true; // Simple flag to control processing

        // Bind methods to maintain context
        this.startSync = this.startSync.bind(this);
        this.cancelSync = this.cancelSync.bind(this);
        this.reset = this.reset.bind(this);
    }

    /**
     * SyncEngine consta
     * Process a batch of domains
     * @param {Array} domains - Batch of domains to process
     * @returns {Promise<void>}
     * @private
    */
    async processDomainBatch(domains) {
        // Filter out domains if sync was cancelled
        if (this.state === SyncEngine.CONSTANTS.SYNC_STATES.CANCELLING) {
            return;
        }

        const promises = domains.map(domain => this.processSingleDomain(domain));

        try {
            await Promise.allSettled(promises);
        } catch (error) {
            console.error('[SyncEngine] Batch processing error:', error);
        }
    }

    static get CONSTANTS() {
        return Object.freeze({
            SYNC_STATES: Object.freeze({
                IDLE: 'idle',
                INITIALIZING: 'initializing',
                RUNNING: 'running',
                CANCELLING: 'cancelling',
                COMPLETED: 'completed',
                ERROR: 'error'
            }),
            MAX_CONCURRENT_REQUESTS: 5,
            REQUEST_TIMEOUT: 30000, // 30 seconds
            RETRY_ATTEMPTS: 3,
            RETRY_DELAY: 1000 // 1 second
        });
    }

    /**
     * Start domain synchronization process
     * @returns {Promise<boolean>} Sync success status
     */
    async startSync() {
        if (this.state !== SyncEngine.CONSTANTS.SYNC_STATES.IDLE) {
            console.warn('[SyncEngine] Sync already in progress, state:', this.state);
            return false;
        }

        try {
            this.state = SyncEngine.CONSTANTS.SYNC_STATES.INITIALIZING;

            // Initialize sync environment
            const initSuccess = await this.initializeSync();
            if (!initSuccess) {
                throw new Error('Failed to initialize sync environment');
            }

            // Get domains to sync
            const domainsToSync = this.getDomainsToSync();
            if (domainsToSync.length === 0) {
                throw new Error('No domains available for synchronization');
            }

            // Setup progress tracking
            this.setupProgressTracking(domainsToSync.length);

            // Navigate to results step
            if (this.app.getModule('navigationManager')) {
                this.app.getModule('navigationManager').goToStep(
                    this.app.constructor.CONSTANTS.STEPS.SYNC_RESULTS
                );
            }

            // Start sync process
            this.state = SyncEngine.CONSTANTS.SYNC_STATES.RUNNING;
            await this.processDomainSync(domainsToSync);

            this.state = SyncEngine.CONSTANTS.SYNC_STATES.COMPLETED;
            return true;

        } catch (error) {
            console.error('[SyncEngine] Sync failed:', error);
            this.state = SyncEngine.CONSTANTS.SYNC_STATES.ERROR;
            this.handleSyncError(error);
            return false;
        }
    }

    /**
     * Cancel ongoing synchronization
     * @returns {Promise<boolean>} Cancellation success
     */
    async cancelSync() {
        console.log('[SyncEngine] Cancelling sync...');

        // Stop all further processing immediately
        this.shouldContinue = false;
        this.state = SyncEngine.CONSTANTS.SYNC_STATES.CANCELLING;

        // Update application state
        this.app.updateState({ syncCancelled: true });

        // Cancel all active HTTP requests
        await this.cancelAllActiveRequests();

        // Show cancelled status instead of clearing progress
        this.showCancelledStatus();

        // Set to idle state
        this.state = SyncEngine.CONSTANTS.SYNC_STATES.IDLE;

        console.log('[SyncEngine] Sync cancelled successfully');
        return true;
    }

    /**
     * Initialize sync environment
     * @returns {Promise<boolean>} Initialization success
     * @private
     */
    async initializeSync() {
        try {
            console.log('[SyncEngine] Initializing sync environment...');

            // Clear table for fresh sync
            const tableManager = this.app.getModule('tableManager');
            if (tableManager && typeof tableManager.clearTableForNewSync === 'function') {
                tableManager.clearTableForNewSync();
            }

            // Reset application sync state
            this.app.updateState({
                syncCancelled: false,
                totalDomainsToSync: 0,
                completedDomainsCount: 0
            });

            // Reset engine state
            this.completedCount = 0;
            this.totalCount = 0;
            this.errors = [];
            this.activeRequests.clear();
            this.shouldContinue = true; // Reset the continue flag for new sync

            console.log('[SyncEngine] Sync environment initialized successfully');
            return true;

        } catch (error) {
            console.error('[SyncEngine] Failed to initialize sync environment:', error);
            return false;
        }
    }

    /**
     * Get domains to synchronize based on selected sync type
     * @returns {Array} Domains to sync
     * @private
     */
    getDomainsToSync() {
        console.log('[SyncEngine] Getting domains for sync...');

        // Get domains from DomainManager based on selected sync type
        const domainManager = this.app.getModule('domainManager');
        if (domainManager && typeof domainManager.getDomainsForSync === 'function') {
            const domains = domainManager.getDomainsForSync();
            console.log(`[SyncEngine] DomainManager provided ${domains.length} domains for sync`);
            return domains;
        }

        // Fallback to app state domains (legacy support)
        const appState = this.app.getState();
        const domains = appState.domains || [];

        console.log(`[SyncEngine] Fallback: Found ${domains.length} domains from app state`);
        return domains;
    }

    /**
     * Setup progress tracking UI
     * @param {number} totalDomains - Total domains to sync
     * @private
     */
    setupProgressTracking(totalDomains) {
        this.totalCount = totalDomains;
        this.completedCount = 0;

        // Update application state
        this.app.updateState({
            totalDomainsToSync: totalDomains,
            completedDomainsCount: 0
        });

        // Show progress indicators
        this.showProgressIndicators();
        this.updateProgressDisplay(0, totalDomains);

        console.log(`[SyncEngine] Progress tracking setup for ${totalDomains} domains`);
    }

    /**
     * Process domain synchronization
     * @param {Array} domains - Domains to sync
     * @returns {Promise<void>}
     * @private
     */
    async processDomainSync(domains) {
        console.log(`[SyncEngine] Processing sync for ${domains.length} domains...`);

        // Get user-selected parallel processing setting
        const userParallelSetting = parseInt($('#parallelRequests').val()) || SyncEngine.CONSTANTS.MAX_CONCURRENT_REQUESTS;
        const batchSize = Math.min(userParallelSetting, domains.length);

        console.log(`[SyncEngine] Using ${batchSize} concurrent requests (user setting: ${userParallelSetting})`);

        for (let i = 0; i < domains.length; i += batchSize) {
            // Simple check - if cancelled, stop immediately
            if (!this.shouldContinue) {
                console.log('[SyncEngine] Sync cancelled - stopping all processing');
                break;
            }

            // Process batch
            const batch = domains.slice(i, i + batchSize);
            await this.processDomainBatch(batch);

            // Check again after batch
            if (!this.shouldContinue) {
                console.log('[SyncEngine] Sync cancelled after batch - stopping');
                break;
            }

            // Small delay between batches to prevent server overload
            if (i + batchSize < domains.length) {
                await new Promise(resolve => setTimeout(resolve, 100));
            }
        }
    }

    /**
     * Process a batch of domains
     * @param {Array} domains - Domain batch
     * @returns {Promise<void>}
     * @private
     */
    async processDomainBatch(domains) {
        // Simple check - if cancelled, skip this batch completely
        if (!this.shouldContinue) {
            console.log('[SyncEngine] Skipping batch - sync was cancelled');
            return;
        }

        const promises = domains.map(domain => this.processSingleDomain(domain));

        try {
            await Promise.allSettled(promises);
        } catch (error) {
            console.error('[SyncEngine] Batch processing error:', error);
        }
    }

    /**
     * Process a single domain sync
     * @param {Object} domain - Domain object
     * @returns {Promise<void>}
     * @private
     */
    async processSingleDomain(domain) {
        const domainName = domain.domain || domain.name;

        // Simple check - if cancelled, skip this domain
        if (!this.shouldContinue) {
            console.log(`[SyncEngine] Skipping domain ${domainName} - sync was cancelled`);
            return;
        }

        try {
            console.log(`[SyncEngine] Processing domain: ${domainName}`);

            // Create sync request
            const request = this.createSyncRequest(domain);
            this.activeRequests.set(domainName, request);

            // Check again if cancelled
            if (!this.shouldContinue) {
                console.log(`[SyncEngine] Cancelling domain ${domainName} - sync stopped`);
                this.activeRequests.delete(domainName);
                return;
            }

            // Perform sync with retry logic
            const result = await this.performSyncWithRetry(domain, request);

            // Check if cancelled after receiving result
            if (this.state === SyncEngine.CONSTANTS.SYNC_STATES.CANCELLING) {
                console.log(`[SyncEngine] Ignoring result for domain ${domainName} - sync was cancelled`);
                return;
            }

            // Process result
            await this.processSyncResult(domainName, result);

        } catch (error) {
            // Only process errors if sync wasn't cancelled
            if (this.state !== SyncEngine.CONSTANTS.SYNC_STATES.CANCELLING) {
                console.error(`[SyncEngine] Failed to process domain ${domainName}:`, error);
                await this.processSyncError(domainName, error);
            } else {
                console.log(`[SyncEngine] Ignoring error for domain ${domainName} - sync was cancelled`);
            }
        } finally {
            // Clean up request
            this.activeRequests.delete(domainName);
        }
    }

    /**
     * Create sync request for domain
     * @param {Object} domain - Domain object
     * @returns {Promise} Request promise
     * @private
     */
    createSyncRequest(domain) {
        const domainid = domain.domainid || domain.id;
        return $.ajax({
            url: 'addonmodules.php?module=cnicadmin&action=sync',
            method: 'POST',
            data: {
                domain: domainid,
                type: 'syncDomain',
                registrar: this.getSelectedRegistrar()
            },
            timeout: SyncEngine.CONSTANTS.REQUEST_TIMEOUT,
            dataType: 'json'
        });
    }

    /**
     * Perform sync with simple retry logic
     * @param {Object} domain - Domain object
     * @param {Promise} initialRequest - Initial request
     * @returns {Promise<Object>} Sync result
     * @private
     */
    async performSyncWithRetry(domain, initialRequest) {
        let lastError;

        for (let attempt = 1; attempt <= SyncEngine.CONSTANTS.RETRY_ATTEMPTS; attempt++) {
            // Simple check - if cancelled, stop immediately
            if (!this.shouldContinue) {
                console.log(`[SyncEngine] Stopping retry for ${domain.domain} - sync cancelled`);
                throw new Error('Sync was cancelled');
            }

            try {
                if (attempt === 1) {
                    return await initialRequest;
                } else {
                    console.log(`[SyncEngine] Retrying ${domain.domain} (${attempt}/${SyncEngine.CONSTANTS.RETRY_ATTEMPTS})`);
                    const retryRequest = this.createSyncRequest(domain);
                    return await retryRequest;
                }
            } catch (error) {
                lastError = error;
                console.warn(`[SyncEngine] Attempt ${attempt} failed for ${domain.domain}:`, error.message);

                // Check cancellation before delay
                if (!this.shouldContinue) {
                    console.log(`[SyncEngine] Stopping retry for ${domain.domain} - sync cancelled`);
                    throw new Error('Sync was cancelled');
                }

                // Simple delay if not the last attempt
                if (attempt < SyncEngine.CONSTANTS.RETRY_ATTEMPTS) {
                    await new Promise(resolve => setTimeout(resolve, SyncEngine.CONSTANTS.RETRY_DELAY * attempt));
                }
            }
        }

        throw lastError;
    }

    /**
     * Process successful sync result
     * @param {string} domainName - Domain name
     * @param {Object} result - Sync result
     * @returns {Promise<void>}
     * @private
     */
    async processSyncResult(domainName, result) {
        console.log(`[SyncEngine] Sync completed for ${domainName}:`, result.status);

        // Add result to table
        const tableManager = this.app.getModule('tableManager');
        if (tableManager) {
            const success = tableManager.addResult(domainName, result.status, result);
            if (!success) {
                console.error(`[SyncEngine] Failed to add table result for ${domainName}`);
            }
        }

        // Update progress
        this.updateProgress();
    }

    /**
     * Process sync error
     * @param {string} domainName - Domain name
     * @param {Error} error - Error object
     * @returns {Promise<void>}
     * @private
     */
    async processSyncError(domainName, error) {
        console.error(`[SyncEngine] Sync error for ${domainName}:`, error);

        // Record error
        this.errors.push({ domain: domainName, error: error.message });

        // Add error result to table
        const tableManager = this.app.getModule('tableManager');
        if (tableManager) {
            const errorResult = {
                old_expiry: 'N/A',
                new_expiry: 'N/A',
                next_due_date: 'N/A',
                next_invoice_date: 'N/A'
            };
            tableManager.addResult(domainName, 'error', errorResult);
        }

        // Update progress
        this.updateProgress();
    }

    /**
     * Update sync progress and handle completion
     * @private
     */
    updateProgress() {
        this.completedCount++;

        // Update application state
        this.app.updateState({
            completedDomainsCount: this.completedCount
        });

        // Update UI display
        this.updateProgressDisplay(this.completedCount, this.totalCount);

        console.log(`[SyncEngine] Progress: ${this.completedCount}/${this.totalCount}`);

        // Check if sync is complete
        if (this.completedCount >= this.totalCount) {
            this.handleSyncCompletion();
        }
    }

    /**
     * Handle sync completion
     * @private
     */
    handleSyncCompletion() {
        console.log('[SyncEngine] All domains processed, sync complete');

        // Hide cancel button since sync is complete
        $(this.app.constructor.CONSTANTS.SELECTORS.cancelSyncBtn).hide();

        // Hide the progress indicator completely
        $(this.app.constructor.CONSTANTS.SELECTORS.syncProgress).hide();

        // Update progress text to show completion
        $(this.app.constructor.CONSTANTS.SELECTORS.progressText).text(`Sync completed: ${this.completedCount} domains processed`);

        // Set completed state
        this.state = SyncEngine.CONSTANTS.SYNC_STATES.COMPLETED;

        // Trigger completion event for other modules to handle
        if (this.app && typeof this.app.trigger === 'function') {
            this.app.trigger('syncCompleted', {
                completed: this.completedCount,
                total: this.totalCount,
                errors: this.errors
            });
        }

        console.log('[SyncEngine] Sync completion handling finished');
    }

    /**
     * Update progress display
     * @param {number} completed - Completed count
     * @param {number} total - Total count
     * @private
     */
    updateProgressDisplay(completed, total) {
        const percentage = total > 0 ? Math.round((completed / total) * 100) : 0;
        const progressText = `Syncing domains: ${completed} of ${total} (${percentage}%)`;

        $(this.app.constructor.CONSTANTS.SELECTORS.progressText).text(progressText);
    }

    /**
     * Show progress indicators
     * @private
     */
    showProgressIndicators() {
        $(this.app.constructor.CONSTANTS.SELECTORS.syncProgress).show();
        $(this.app.constructor.CONSTANTS.SELECTORS.cancelSyncBtn).show();
    }

    /**
     * Clear progress indicators
     * @private
     */
    clearProgressIndicators() {
        $(this.app.constructor.CONSTANTS.SELECTORS.syncProgress).hide();
        $(this.app.constructor.CONSTANTS.SELECTORS.cancelSyncBtn).hide();
        $(this.app.constructor.CONSTANTS.SELECTORS.progressText).text('');
    }

    /**
     * Show cancellation status instead of clearing progress
     * @private
     */
    showCancelledStatus() {
        const progressText = $(this.app.constructor.CONSTANTS.SELECTORS.progressText);
        const syncProgress = $(this.app.constructor.CONSTANTS.SELECTORS.syncProgress);
        const cancelBtn = $(this.app.constructor.CONSTANTS.SELECTORS.cancelSyncBtn);
        
        // Update progress text to show cancelled status
        progressText.text(`🚫 Sync Cancelled - Processed: ${this.completedCount}/${this.totalCount} domains`);
        
        // Keep progress visible but hide cancel button
        syncProgress.show();
        cancelBtn.hide();
        
        // Add visual indication that it's cancelled (if progress bar exists)
        const progressBar = syncProgress.find('.progress-bar');
        if (progressBar.length) {
            progressBar.removeClass('bg-primary bg-info').addClass('bg-warning');
            progressBar.attr('aria-label', 'Sync cancelled');
        }
        
        console.log('[SyncEngine] Showing cancellation status');
    }

    /**
     * Cancel all active requests
     * @returns {Promise<void>}
     * @private
     */
    async cancelAllActiveRequests() {
        console.log(`[SyncEngine] Cancelling ${this.activeRequests.size} active requests...`);

        const cancelPromises = Array.from(this.activeRequests.values()).map(request => {
            return new Promise(resolve => {
                try {
                    if (request && typeof request.abort === 'function') {
                        request.abort();
                    }
                } catch (error) {
                    // Ignore abort errors
                } finally {
                    resolve();
                }
            });
        });

        await Promise.allSettled(cancelPromises);
        this.activeRequests.clear();

        console.log('[SyncEngine] All active requests cancelled');
    }

    /**
     * Get selected registrar
     * @returns {string} Registrar identifier
     * @private
     */
    getSelectedRegistrar() {
        return $(this.app.constructor.CONSTANTS.SELECTORS.registrar).val() || '';
    }

    /**
     * Handle sync error
     * @param {Error} error - Error object
     * @private
     */
    handleSyncError(error) {
        const alertManager = this.app.getModule('alertManager');
        if (alertManager) {
            alertManager.showError('Sync failed: ' + error.message);
        }

        this.clearProgressIndicators();
    }

    /**
     * Perform emergency cleanup
     */
    performEmergencyCleanup() {
        console.log('[SyncEngine] Performing emergency cleanup...');

        try {
            // Force cancel all requests
            this.activeRequests.forEach(request => {
                if (request && typeof request.abort === 'function') {
                    try {
                        request.abort();
                    } catch (error) {
                        // Ignore errors during emergency cleanup
                    }
                }
            });

            this.activeRequests.clear();
            this.state = SyncEngine.CONSTANTS.SYNC_STATES.IDLE;

        } catch (error) {
            console.error('[SyncEngine] Emergency cleanup error:', error);
        }
    }

    /**
     * Reset engine to initial state
     * @returns {boolean} Reset success
     */
    reset() {
        console.log('[SyncEngine] Resetting engine...');

        try {
            // Cancel any active sync
            if (this.state === SyncEngine.CONSTANTS.SYNC_STATES.RUNNING) {
                this.cancelSync();
            }

            // Reset state
            this.state = SyncEngine.CONSTANTS.SYNC_STATES.IDLE;
            this.completedCount = 0;
            this.totalCount = 0;
            this.errors = [];
            this.activeRequests.clear();

            // Clear UI
            this.clearProgressIndicators();

            console.log('[SyncEngine] Engine reset completed');
            return true;

        } catch (error) {
            console.error('[SyncEngine] Reset failed:', error);
            return false;
        }
    }

    /**
     * Get current sync statistics
     * @returns {Object} Sync statistics
     */
    getStats() {
        return Object.freeze({
            state: this.state,
            totalCount: this.totalCount,
            completedCount: this.completedCount,
            activeRequestsCount: this.activeRequests.size,
            errorCount: this.errors.length,
            errors: [...this.errors]
        });
    }

    /**
     * Check if sync is currently active
     * @returns {boolean} True if active
     */
    isActive() {
        return this.state === SyncEngine.CONSTANTS.SYNC_STATES.RUNNING ||
            this.state === SyncEngine.CONSTANTS.SYNC_STATES.INITIALIZING;
    }

    /**
     * Destroy engine instance
     */
    destroy() {
        console.log('[SyncEngine] Destroying engine...');

        try {
            // Cancel any active operations
            this.performEmergencyCleanup();

            // Clear all references
            this.app = null;
            this.activeRequests.clear();
            this.errors = [];

            console.log('[SyncEngine] Engine destroyed');

        } catch (error) {
            console.error('[SyncEngine] Destroy failed:', error);
        }
    }
}

//=============================================================================
// EXPORT - Make SyncEngine available
//=============================================================================

if (typeof module !== 'undefined' && module.exports) {
    module.exports = SyncEngine;
} else if (typeof window !== 'undefined') {
    window.SyncEngine = SyncEngine;
}