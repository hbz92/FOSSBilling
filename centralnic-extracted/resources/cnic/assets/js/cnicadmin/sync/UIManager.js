/**
 * UIManager - Clean User Interface Management
 * Handles UI state updates and user interaction components
 * 
 * @author CNIC Development Team
 * @version 2.0.0
 */

'use strict';

class UIManager {
    /**
     * Constructor
     * @param {SyncApp} app - Main application instance
     */
    constructor(app) {
        if (!app) {
            throw new Error('[UIManager] Application instance is required');
        }

        this.app = app;
        this.initialized = false;
        
        // Bind methods to maintain context
        this.reset = this.reset.bind(this);

        console.log('[UIManager] Instance created');
    }

    /**
     * Initialize sync type toggle functionality
     * @returns {boolean} Initialization success
     */
    initializeSyncTypeToggle() {
        try {
            console.log('[UIManager] Initializing sync type toggle...');

            // Initialize choice cards
            this.initializeChoiceCards();

            // Initialize sync type radio buttons
            this.initializeSyncTypeRadios();

            // Set initial card states (for pre-checked radio)
            setTimeout(() => {
                this.updateModernChoiceCardStates();
                this.updateSyncTypeDisplay();
            }, 100);

            this.initialized = true;
            console.log('[UIManager] Sync type toggle initialized successfully');
            return true;

        } catch (error) {
            console.error('[UIManager] Failed to initialize sync type toggle:', error);
            return false;
        }
    }

    /**
     * Initialize modern choice cards
     * @private
     */
    initializeChoiceCards() {
        $(document).on('click', '.cnic-choice-card', (event) => {
            const $card = $(event.currentTarget);
            const syncValue = $card.data('value');
            
            console.log('[UIManager] Choice card clicked:', syncValue);
            
            if (syncValue) {
                // Find and check the corresponding radio button
                const $radio = $card.find(`input[name="syncType"][value="${syncValue}"]`);
                if ($radio.length) {
                    console.log('[UIManager] Setting radio button:', syncValue);
                    $radio.prop('checked', true).trigger('change');
                } else {
                    console.warn('[UIManager] Radio button not found for:', syncValue);
                }
                
                // Update card states
                this.updateModernChoiceCardStates();
            }
        });

        console.log('[UIManager] Choice cards initialized');
    }

    /**
     * Initialize sync type radio button handlers
     * @private
     */
    initializeSyncTypeRadios() {
        $(document).on('change', 'input[name="syncType"]', () => {
            this.updateModernChoiceCardStates();
            this.updateSyncTypeDisplay();
            // Update sync button state when sync type changes
            if (this.app.modules.domainManager) {
                this.app.modules.domainManager.updateSyncButtonState();
            }
        });

        // Also handle direct clicks on radio inputs
        $(document).on('click', 'input[name="syncType"]', () => {
            this.updateModernChoiceCardStates();
            // Update sync button state when sync type changes
            if (this.app.modules.domainManager) {
                this.app.modules.domainManager.updateSyncButtonState();
            }
        });

        console.log('[UIManager] Sync type radios initialized');
    }

    /**
     * Update modern choice card states
     * @returns {boolean} Update success
     */
    updateModernChoiceCardStates() {
        try {
            $('.cnic-choice-card').each(function() {
                const $card = $(this);
                const $radio = $card.find('input[name="syncType"]');
                const $indicator = $card.find('.choice-indicator i');
                
                if ($radio.length && $radio.is(':checked')) {
                    // Add active class and show check icon
                    $card.addClass('active');
                    $indicator.removeClass('far fa-circle')
                              .addClass('fas fa-check-circle')
                              .css('color', '#5cb85c');
                } else {
                    // Remove active class and show circle icon
                    $card.removeClass('active');
                    $indicator.removeClass('fas fa-check-circle')
                              .addClass('far fa-circle')
                              .css('color', '#cbd5e1');
                }
            });

            console.log('[UIManager] Choice card states updated');
            return true;

        } catch (error) {
            console.error('[UIManager] Failed to update choice card states:', error);
            return false;
        }
    }

    /**
     * Update sync type display information
     * @private
     */
    updateSyncTypeDisplay() {
        const selectedSyncType = $('input[name="syncType"]:checked').val();
        
        if (selectedSyncType) {
            console.log(`[UIManager] Sync type selected: ${selectedSyncType}`);
            
            // Update UI based on sync type
            this.handleSyncTypeSelection(selectedSyncType);
        }
    }

    /**
     * Handle sync type selection changes
     * @param {string} syncType - Selected sync type
     * @private
     */
    handleSyncTypeSelection(syncType) {
        switch (syncType) {
            case 'all':
                this.handleAllDomainsSelection();
                break;
            case 'tld':
                this.handleTldSelection();
                break;
            case 'single':
                this.handleSingleDomainSelection();
                break;
            default:
                console.warn(`[UIManager] Unknown sync type: ${syncType}`);
        }
    }

    /**
     * Handle all domains sync type selection
     * @private
     */
    handleAllDomainsSelection() {
        console.log('[UIManager] All domains sync type selected');
        
        // Hide TLD and single domain specific UI
        $('#tldInput').hide();
        $('#domainInput').hide();
    }

    /**
     * Handle TLD sync type selection
     * @private
     */
    handleTldSelection() {
        console.log('[UIManager] TLD sync type selected');
        
        // Show TLD selection UI
        $('#tldInput').show();
        
        // Hide other type UI
        $('#domainInput').hide();
        
        // Setup TLD functionality
        this.setupTldFunctionality();
    }

    /**
     * Setup TLD selection functionality
     * @private
     */
    async setupTldFunctionality() {
        try {
            const domainManager = this.app.getModule('domainManager');
            if (domainManager && typeof domainManager.setupTldSelection === 'function') {
                await domainManager.setupTldSelection();
                console.log('[UIManager] TLD functionality setup complete');
            } else {
                console.warn('[UIManager] DomainManager not available for TLD setup');
            }
        } catch (error) {
            console.error('[UIManager] Failed to setup TLD functionality:', error);
        }
    }

    /**
     * Handle single domain sync type selection
     * @private
     */
    handleSingleDomainSelection() {
        console.log('[UIManager] Single domain sync type selected');
        
        // Show single domain UI
        $('#domainInput').show();
        
        // Hide other type UI
        $('#tldInput').hide();
        
        // Enable domain selection elements
        $('#domain').prop('disabled', false);
        $('#domainSearch').prop('disabled', false);
    }

    /**
     * Update step indicators
     * @param {number} currentStep - Current step number
     * @returns {boolean} Update success
     */
    updateStepIndicators(currentStep) {
        try {
            console.log(`[UIManager] Updating step indicators for step ${currentStep}`);

            // Update step progress indicators
            $('.step-indicator').removeClass('active current');
            $(`.step-indicator[data-step="${currentStep}"]`).addClass('active current');

            // Update previous steps as completed
            $('.step-indicator').each(function() {
                const stepNumber = parseInt($(this).data('step'));
                if (stepNumber < currentStep) {
                    $(this).addClass('completed').removeClass('current');
                } else if (stepNumber === currentStep) {
                    $(this).addClass('current').removeClass('completed');
                } else {
                    $(this).removeClass('active current completed');
                }
            });

            return true;

        } catch (error) {
            console.error('[UIManager] Failed to update step indicators:', error);
            return false;
        }
    }

    /**
     * Show loading overlay
     * @param {string} message - Loading message
     * @returns {boolean} Success status
     */
    showLoading(message = 'Loading...') {
        try {
            const $overlay = $(this.app.constructor.CONSTANTS.SELECTORS.loadingOverlay);
            
            if ($overlay.length > 0) {
                $overlay.find('.loading-text').text(message);
                $overlay.show();
                console.log(`[UIManager] Loading overlay shown: ${message}`);
                return true;
            }

            console.warn('[UIManager] Loading overlay element not found');
            return false;

        } catch (error) {
            console.error('[UIManager] Failed to show loading overlay:', error);
            return false;
        }
    }

    /**
     * Hide loading overlay
     * @returns {boolean} Success status
     */
    hideLoading() {
        try {
            const $overlay = $(this.app.constructor.CONSTANTS.SELECTORS.loadingOverlay);
            
            if ($overlay.length > 0) {
                $overlay.hide();
                console.log('[UIManager] Loading overlay hidden');
                return true;
            }

            return true; // Success even if element not found

        } catch (error) {
            console.error('[UIManager] Failed to hide loading overlay:', error);
            return false;
        }
    }

    /**
     * Update button states based on application state
     * @returns {boolean} Update success
     */
    updateButtonStates() {
        try {
            const appState = this.app.getState();
            
            // Update sync start button
            this.updateSyncStartButton(appState);
            
            // Update navigation buttons
            this.updateNavigationButtons(appState);
            
            // Update cancel button
            this.updateCancelButton(appState);

            return true;

        } catch (error) {
            console.error('[UIManager] Failed to update button states:', error);
            return false;
        }
    }

    /**
     * Update sync start button state
     * @param {Object} appState - Application state
     * @private
     */
    updateSyncStartButton(appState) {
        const $startButton = $('.sync-start-button');
        
        if (appState.syncCancelled || appState.activeRequests.size > 0) {
            $startButton.addClass('disabled').prop('disabled', true);
        } else {
            $startButton.removeClass('disabled').prop('disabled', false);
        }
    }

    /**
     * Update navigation button states
     * @param {Object} appState - Application state
     * @private
     */
    updateNavigationButtons(appState) {
        const $prevButtons = $('.sync-prev-button');
        const $nextButtons = $('.sync-next-button');
        
        if (appState.activeRequests.size > 0) {
            $prevButtons.addClass('disabled').prop('disabled', true);
            $nextButtons.addClass('disabled').prop('disabled', true);
        } else {
            $prevButtons.removeClass('disabled').prop('disabled', false);
            $nextButtons.removeClass('disabled').prop('disabled', false);
        }
    }

    /**
     * Update cancel button state
     * @param {Object} appState - Application state
     * @private
     */
    updateCancelButton(appState) {
        const $cancelButton = $(this.app.constructor.CONSTANTS.SELECTORS.cancelSyncBtn);
        
        if (appState.activeRequests.size > 0) {
            $cancelButton.show().removeClass('disabled').prop('disabled', false);
        } else {
            $cancelButton.hide();
        }
    }

    /**
     * Reset UI to initial state
     * @returns {boolean} Reset success
     */
    resetUI() {
        try {
            console.log('[UIManager] Resetting UI to initial state...');

            // Reset form elements
            this.resetFormElements();
            
            // Reset display elements
            this.resetDisplayElements();
            
            // Reset button states
            this.resetButtonStates();
            
            // Hide loading overlays
            this.hideLoading();

            console.log('[UIManager] UI reset completed');
            return true;

        } catch (error) {
            console.error('[UIManager] UI reset failed:', error);
            return false;
        }
    }

    /**
     * Reset form elements
     * @private
     */
    resetFormElements() {
        // Clear selection states
        $('input[name="syncType"]').prop('checked', false);
        $('.cnic-choice-card').removeClass('active');
        
        // Reset all choice card indicators
        $('.cnic-choice-card .choice-indicator i')
            .removeClass('fas fa-check-circle')
            .addClass('far fa-circle')
            .css('color', '#cbd5e1');
        
        // Reset dropdowns
        $('#tldSelect').val([]).trigger('change');
        $(this.app.constructor.CONSTANTS.SELECTORS.registrar).val('').trigger('change');
    }

    /**
     * Reset display elements
     * @private
     */
    resetDisplayElements() {
        // Clear text displays
        $('#selectedRegistrarName').text('');
        $('#domainCount').text('0');
        $('.tld-domains-count').text('0');
        
        // Hide containers
        $('#tldSelectionContainer').hide();
        $('#singleDomainContainer').hide();
        $('#allDomainsContainer').hide();
    }

    /**
     * Reset button states
     * @private
     */
    resetButtonStates() {
        // Enable all navigation buttons
        $('.sync-prev-button, .sync-next-button').removeClass('disabled').prop('disabled', false);
        
        // Reset sync start button
        $('.sync-start-button').removeClass('disabled').prop('disabled', false);
        
        // Hide cancel button
        $(this.app.constructor.CONSTANTS.SELECTORS.cancelSyncBtn).hide();
    }

    /**
     * Reset manager to initial state
     * @returns {boolean} Reset success
     */
    reset() {
        console.log('[UIManager] Resetting manager...');
        
        try {
            // Reset UI components
            this.resetUI();
            
            // Re-initialize if needed
            if (this.initialized) {
                this.updateModernChoiceCardStates();
            }

            console.log('[UIManager] Manager reset completed');
            return true;

        } catch (error) {
            console.error('[UIManager] Reset failed:', error);
            return false;
        }
    }

    /**
     * Destroy manager instance
     */
    destroy() {
        console.log('[UIManager] Destroying manager...');
        
        try {
            // Unbind any specific event handlers if needed
            $(document).off('click', '.modern-choice-card');
            $(document).off('change', 'input[name="syncType"]');
            
            // Clear references
            this.app = null;
            this.initialized = false;
            
            console.log('[UIManager] Manager destroyed');
            
        } catch (error) {
            console.error('[UIManager] Destroy failed:', error);
        }
    }
}

//=============================================================================
// EXPORT - Make UIManager available
//=============================================================================

if (typeof module !== 'undefined' && module.exports) {
    module.exports = UIManager;
} else if (typeof window !== 'undefined') {
    window.UIManager = UIManager;
}