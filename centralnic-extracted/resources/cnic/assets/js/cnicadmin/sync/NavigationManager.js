/**
 * NavigationManager - Clean Step Navigation Management
 * Handles navigation between sync steps with clean state management
 * 
 * @author CNIC Development Team
 * @version 2.0.0
 */

'use strict';

class NavigationManager {
    /**
     * NavigationManager constants
     */
    static get CONSTANTS() {
        return Object.freeze({
            ANIMATION_DURATION: 300,
            STEP_SELECTOR: '.cnic-step',
            ACTIVE_CLASS: 'active'
        });
    }

    /**
     * Constructor
     * @param {SyncApp} app - Main application instance
     */
    constructor(app) {
        if (!app) {
            throw new Error('[NavigationManager] Application instance is required');
        }

        this.app = app;
        this.currentStep = app.constructor.CONSTANTS.STEPS.REGISTRAR_SELECTION;
        
        // Bind methods to maintain context
        this.goToStep = this.goToStep.bind(this);
        this.reset = this.reset.bind(this);

        console.log('[NavigationManager] Instance created');
    }

    /**
     * Navigate to specific step
     * @param {number} stepNumber - Step number to navigate to
     * @param {Object} options - Navigation options
     * @returns {Promise<boolean>} Navigation success
     */
    async goToStep(stepNumber, options = {}) {
        const { skipValidation = false, force = false } = options;

        try {
            console.log(`[NavigationManager] Navigating to step ${stepNumber}`);

            // Validate step number
            if (!this.isValidStep(stepNumber)) {
                throw new Error(`Invalid step number: ${stepNumber}`);
            }

            // Check if already on the target step
            if (this.currentStep === stepNumber && !force) {
                console.log(`[NavigationManager] Already on step ${stepNumber}`);
                return true;
            }

            // Validate step transition if not skipping
            if (!skipValidation && !this.canNavigateToStep(stepNumber)) {
                console.warn(`[NavigationManager] Cannot navigate to step ${stepNumber} - validation failed`);
                return false;
            }

            // Perform step transition
            await this.performStepTransition(stepNumber);

            // Update current step
            this.currentStep = stepNumber;

            // Perform post-navigation actions
            await this.performPostNavigationActions(stepNumber);

            console.log(`[NavigationManager] Successfully navigated to step ${stepNumber}`);
            return true;

        } catch (error) {
            console.error('[NavigationManager] Navigation failed:', error);
            return false;
        }
    }

    /**
     * Navigate to next step
     * @returns {Promise<boolean>} Navigation success
     */
    async goToNext() {
        const nextStep = this.getNextStep();
        if (nextStep) {
            return await this.goToStep(nextStep);
        }
        return false;
    }

    /**
     * Navigate to previous step
     * @returns {Promise<boolean>} Navigation success
     */
    async goToPrevious() {
        const previousStep = this.getPreviousStep();
        if (previousStep) {
            return await this.goToStep(previousStep, { skipValidation: true });
        }
        return false;
    }

    /**
     * Validate if step number is valid
     * @param {number} stepNumber - Step number to validate
     * @returns {boolean} True if valid
     * @private
     */
    isValidStep(stepNumber) {
        const validSteps = Object.values(this.app.constructor.CONSTANTS.STEPS);
        return validSteps.includes(stepNumber);
    }

    /**
     * Check if navigation to step is allowed
     * @param {number} stepNumber - Target step number
     * @returns {boolean} True if navigation is allowed
     * @private
     */
    canNavigateToStep(stepNumber) {
        const { STEPS } = this.app.constructor.CONSTANTS;

        switch (stepNumber) {
            case STEPS.REGISTRAR_SELECTION:
                // Can always go back to step 1
                return true;

            case STEPS.SYNC_CONFIGURATION:
                // Need registrar selected for step 2
                return this.isRegistrarSelected();

            case STEPS.SYNC_RESULTS:
                // Need valid sync configuration for step 3
                return this.isRegistrarSelected() && this.isSyncConfigurationValid();

            default:
                return false;
        }
    }

    /**
     * Check if registrar is selected
     * @returns {boolean} True if selected
     * @private
     */
    isRegistrarSelected() {
        const registrarValue = $(this.app.constructor.CONSTANTS.SELECTORS.registrar).val();
        return registrarValue && registrarValue.trim() !== '';
    }

    /**
     * Check if sync configuration is valid
     * @returns {boolean} True if valid
     * @private
     */
    isSyncConfigurationValid() {
        // Check if at least one sync type is selected
        const syncTypeSelected = $('input[name="syncType"]:checked').length > 0;
        
        if (!syncTypeSelected) {
            return false;
        }

        // Additional validation based on sync type can be added here
        return true;
    }

    /**
     * Perform step transition animation
     * @param {number} targetStep - Target step number
     * @returns {Promise<void>}
     * @private
     */
    async performStepTransition(targetStep) {
        const $currentStepElement = $(`#step${this.currentStep}`);
        const $targetStepElement = $(`#step${targetStep}`);

        // Hide current step
        if ($currentStepElement.length > 0) {
            await new Promise(resolve => {
                $currentStepElement
                    .removeClass(NavigationManager.CONSTANTS.ACTIVE_CLASS)
                    .fadeOut(NavigationManager.CONSTANTS.ANIMATION_DURATION, resolve);
            });
        }

        // Show target step
        if ($targetStepElement.length > 0) {
            await new Promise(resolve => {
                $targetStepElement
                    .addClass(NavigationManager.CONSTANTS.ACTIVE_CLASS)
                    .fadeIn(NavigationManager.CONSTANTS.ANIMATION_DURATION, resolve);
            });
        }
    }

    /**
     * Perform actions after navigation
     * @param {number} stepNumber - Current step number
     * @returns {Promise<void>}
     * @private
     */
    async performPostNavigationActions(stepNumber) {
        const { STEPS } = this.app.constructor.CONSTANTS;

        switch (stepNumber) {
            case STEPS.REGISTRAR_SELECTION:
                await this.handleRegistrarSelectionStep();
                break;

            case STEPS.SYNC_CONFIGURATION:
                await this.handleSyncConfigurationStep();
                break;

            case STEPS.SYNC_RESULTS:
                await this.handleSyncResultsStep();
                break;
        }
    }

    /**
     * Handle registrar selection step actions
     * @returns {Promise<void>}
     * @private
     */
    async handleRegistrarSelectionStep() {
        console.log('[NavigationManager] Handling registrar selection step');
        
        // Focus on registrar selection if available
        const $registrarSelect = $(this.app.constructor.CONSTANTS.SELECTORS.registrar);
        if ($registrarSelect.length > 0) {
            $registrarSelect.focus();
        }

        // Update UI state
        const uiManager = this.app.getModule('uiManager');
        if (uiManager && typeof uiManager.updateStepIndicators === 'function') {
            uiManager.updateStepIndicators(this.currentStep);
        }
    }

    /**
     * Handle sync configuration step actions
     * @returns {Promise<void>}
     * @private
     */
    async handleSyncConfigurationStep() {
        console.log('[NavigationManager] Handling sync configuration step');

        // Update registrar display
        this.updateRegistrarDisplay();

        // Initialize domain loading if needed
        const domainManager = this.app.getModule('domainManager');
        if (domainManager && typeof domainManager.initializeForConfiguration === 'function') {
            domainManager.initializeForConfiguration();
        }

        // Update UI state
        const uiManager = this.app.getModule('uiManager');
        if (uiManager && typeof uiManager.updateStepIndicators === 'function') {
            uiManager.updateStepIndicators(this.currentStep);
        }
    }

    /**
     * Handle sync results step actions
     * @returns {Promise<void>}
     * @private
     */
    async handleSyncResultsStep() {
        console.log('[NavigationManager] Handling sync results step');

        // Ensure table is initialized
        const tableManager = this.app.getModule('tableManager');
        if (tableManager) {
            if (!tableManager.isInitialized) {
                await tableManager.initializeTable();
            }
        }

        // Update UI state
        const uiManager = this.app.getModule('uiManager');
        if (uiManager && typeof uiManager.updateStepIndicators === 'function') {
            uiManager.updateStepIndicators(this.currentStep);
        }
    }

    /**
     * Update registrar display on configuration step
     * @private
     */
    updateRegistrarDisplay() {
        const selectedRegistrar = $(this.app.constructor.CONSTANTS.SELECTORS.registrar).val();
        const registrarName = $(this.app.constructor.CONSTANTS.SELECTORS.registrar).find('option:selected').text();

        // Update display elements
        $('#selectedRegistrarName').text(registrarName || selectedRegistrar);
        
        console.log(`[NavigationManager] Updated registrar display: ${registrarName}`);
    }

    /**
     * Get next step number
     * @returns {number|null} Next step number or null
     * @private
     */
    getNextStep() {
        const { STEPS } = this.app.constructor.CONSTANTS;
        const stepOrder = [
            STEPS.REGISTRAR_SELECTION,
            STEPS.SYNC_CONFIGURATION,
            STEPS.SYNC_RESULTS
        ];

        const currentIndex = stepOrder.indexOf(this.currentStep);
        return currentIndex < stepOrder.length - 1 ? stepOrder[currentIndex + 1] : null;
    }

    /**
     * Get previous step number
     * @returns {number|null} Previous step number or null
     * @private
     */
    getPreviousStep() {
        const { STEPS } = this.app.constructor.CONSTANTS;
        const stepOrder = [
            STEPS.REGISTRAR_SELECTION,
            STEPS.SYNC_CONFIGURATION,
            STEPS.SYNC_RESULTS
        ];

        const currentIndex = stepOrder.indexOf(this.currentStep);
        return currentIndex > 0 ? stepOrder[currentIndex - 1] : null;
    }

    /**
     * Get current step number
     * @returns {number} Current step number
     */
    getCurrentStep() {
        return this.currentStep;
    }

    /**
     * Get current step name
     * @returns {string} Current step name
     */
    getCurrentStepName() {
        const { STEPS } = this.app.constructor.CONSTANTS;
        
        switch (this.currentStep) {
            case STEPS.REGISTRAR_SELECTION:
                return 'Registrar Selection';
            case STEPS.SYNC_CONFIGURATION:
                return 'Sync Configuration';
            case STEPS.SYNC_RESULTS:
                return 'Sync Results';
            default:
                return 'Unknown Step';
        }
    }

    /**
     * Check if navigation is currently in progress
     * @returns {boolean} True if navigating
     */
    isNavigating() {
        // Simple implementation - could be enhanced with actual state tracking
        return false;
    }

    /**
     * Reset navigation to initial state
     * @returns {Promise<boolean>} Reset success
     */
    async reset() {
        console.log('[NavigationManager] Resetting navigation...');
        
        try {
            // Go to first step
            const success = await this.goToStep(
                this.app.constructor.CONSTANTS.STEPS.REGISTRAR_SELECTION,
                { skipValidation: true, force: true }
            );

            console.log('[NavigationManager] Navigation reset completed');
            return success;

        } catch (error) {
            console.error('[NavigationManager] Reset failed:', error);
            return false;
        }
    }

    /**
     * Destroy manager instance
     */
    destroy() {
        console.log('[NavigationManager] Destroying manager...');
        
        try {
            // Clear references
            this.app = null;
            this.currentStep = null;
            
            console.log('[NavigationManager] Manager destroyed');
            
        } catch (error) {
            console.error('[NavigationManager] Destroy failed:', error);
        }
    }
}

//=============================================================================
// EXPORT - Make NavigationManager available
//=============================================================================

if (typeof module !== 'undefined' && module.exports) {
    module.exports = NavigationManager;
} else if (typeof window !== 'undefined') {
    window.NavigationManager = NavigationManager;
}