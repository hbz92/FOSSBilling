/**
 * AlertManager - Clean Alert and Message Management
 * Handles user notifications and messaging with clean Bootstrap integration
 * 
 * @author CNIC Development Team
 * @version 2.0.0
 */

'use strict';

class AlertManager {
    /**
     * AlertManager constants
     */
    static get CONSTANTS() {
        return Object.freeze({
            ALERT_TYPES: Object.freeze({
                SUCCESS: 'success',
                ERROR: 'danger',
                WARNING: 'warning',
                INFO: 'info'
            }),
            AUTO_DISMISS_DELAY: 3000,
            ANIMATION_DURATION: 300
        });
    }

    /**
     * Constructor
     * @param {SyncApp} app - Main application instance
     */
    constructor(app) {
        if (!app) {
            throw new Error('[AlertManager] Application instance is required');
        }

        this.app = app;
        this.activeAlerts = new Map();
        
        // Bind methods to maintain context
        this.reset = this.reset.bind(this);
    }

    /**
     * Show success alert
     * @param {string} message - Success message
     * @param {Object} options - Alert options
     * @returns {string} Alert ID
     */
    showSuccess(message, options = {}) {
        return this.showAlert(message, AlertManager.CONSTANTS.ALERT_TYPES.SUCCESS, options);
    }

    /**
     * Show error alert
     * @param {string} message - Error message
     * @param {Object} options - Alert options
     * @returns {string} Alert ID
     */
    showError(message, options = {}) {
        return this.showAlert(message, AlertManager.CONSTANTS.ALERT_TYPES.ERROR, options);
    }

    /**
     * Show warning alert
     * @param {string} message - Warning message
     * @param {Object} options - Alert options
     * @returns {string} Alert ID
     */
    showWarning(message, options = {}) {
        return this.showAlert(message, AlertManager.CONSTANTS.ALERT_TYPES.WARNING, options);
    }

    /**
     * Show info alert
     * @param {string} message - Info message
     * @param {Object} options - Alert options
     * @returns {string} Alert ID
     */
    showInfo(message, options = {}) {
        return this.showAlert(message, AlertManager.CONSTANTS.ALERT_TYPES.INFO, options);
    }

    /**
     * Show alert with specified type
     * @param {string} message - Alert message
     * @param {string} type - Alert type
     * @param {Object} options - Alert options
     * @returns {string} Alert ID
     */
    showAlert(message, type, options = {}) {
        if (!message || !type) {
            console.error('[AlertManager] Invalid alert parameters');
            return null;
        }

        try {
            const alertId = this.generateAlertId();
            const alertConfig = this.buildAlertConfig(message, type, options);
            
            // Create and show alert
            const $alertElement = this.createAlertElement(alertId, alertConfig);
            this.displayAlert($alertElement, alertConfig);
            
            // Track alert
            this.activeAlerts.set(alertId, {
                element: $alertElement,
                config: alertConfig,
                timestamp: Date.now()
            });

            // Setup auto-dismiss if configured
            if (alertConfig.autoDismiss) {
                this.setupAutoDismiss(alertId, alertConfig.autoDismissDelay);
            }

            return alertId;

        } catch (error) {
            console.error('[AlertManager] Failed to show alert:', error);
            return null;
        }
    }

    /**
     * Generate unique alert ID
     * @returns {string} Alert ID
     * @private
     */
    generateAlertId() {
        return `alert_${Date.now()}`;
    }

    /**
     * Build alert configuration
     * @param {string} message - Alert message
     * @param {string} type - Alert type
     * @param {Object} options - Alert options
     * @returns {Object} Alert configuration
     * @private
     */
    buildAlertConfig(message, type, options) {
        const {
            title = null,
            dismissible = true,
            autoDismiss = type !== AlertManager.CONSTANTS.ALERT_TYPES.ERROR,
            autoDismissDelay = AlertManager.CONSTANTS.AUTO_DISMISS_DELAY,
            icon = null,
            className = ''
        } = options;

        return {
            message: this.sanitizeMessage(message),
            type,
            title: title ? this.sanitizeMessage(title) : null,
            dismissible,
            autoDismiss,
            autoDismissDelay,
            icon: icon || this.getDefaultIcon(type),
            className
        };
    }

    /**
     * Sanitize message content
     * @param {string} message - Raw message
     * @returns {string} Sanitized message
     * @private
     */
    sanitizeMessage(message) {
        if (typeof message !== 'string') {
            return String(message);
        }

        // Basic HTML escape for security
        const div = document.createElement('div');
        div.textContent = message;
        return div.innerHTML;
    }

    /**
     * Get default icon for alert type
     * @param {string} type - Alert type
     * @returns {string} Icon class
     * @private
     */
    getDefaultIcon(type) {
        const iconMap = {
            [AlertManager.CONSTANTS.ALERT_TYPES.SUCCESS]: 'fa-check-circle',
            [AlertManager.CONSTANTS.ALERT_TYPES.ERROR]: 'fa-exclamation-triangle',
            [AlertManager.CONSTANTS.ALERT_TYPES.WARNING]: 'fa-exclamation-circle',
            [AlertManager.CONSTANTS.ALERT_TYPES.INFO]: 'fa-info-circle'
        };

        return iconMap[type] || 'fa-info-circle';
    }

    /**
     * Create alert DOM element
     * @param {string} alertId - Alert ID
     * @param {Object} config - Alert configuration
     * @returns {jQuery} Alert element
     * @private
     */
    createAlertElement(alertId, config) {
        const dismissButton = config.dismissible ? 
            `<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>` : '';

        const iconHtml = config.icon ? 
            `<i class="fas ${config.icon} me-2"></i>` : '';

        const titleHtml = config.title ? 
            `<strong>${config.title}</strong><br>` : '';

        const alertHtml = `
            <div id="${alertId}" class="alert alert-${config.type} alert-dismissible show ${config.className}" role="alert">
                ${iconHtml}
                ${titleHtml}
                ${config.message}
                ${dismissButton}
            </div>
        `;

        return $(alertHtml);
    }

    /**
     * Display alert in container
     * @param {jQuery} $alertElement - Alert element
     * @param {Object} config - Alert configuration
     * @private
     */
    displayAlert($alertElement, config) {
        const containerSelector = this.app.constructor.CONSTANTS.SELECTORS.alertContainer;
        const $container = $(containerSelector);
        
        console.log(`[AlertManager] Looking for container: ${containerSelector}`);
        console.log(`[AlertManager] Container found: ${$container.length > 0}`);
        
        if ($container.length === 0) {
            console.warn('[AlertManager] Alert container not found, appending to body');
            $('body').prepend($alertElement);
        } else {
            console.log('[AlertManager] Appending alert to container');
            $container.append($alertElement);
            
            // Make sure container is visible
            $container.show();
        }

        // Add inline styles to ensure visibility
        $alertElement.css({
            'display': 'block',
            'position': 'relative',
            'z-index': '99999999999999',
            'margin-bottom': '15px'
        });

        // Bind dismiss handler if dismissible
        if (config.dismissible) {
            $alertElement.on('closed.bs.alert', (event) => {
                const alertId = $(event.target).attr('id');
                this.activeAlerts.delete(alertId);
            });
        }
    }

    /**
     * Setup auto-dismiss for alert
     * @param {string} alertId - Alert ID
     * @param {number} delay - Dismiss delay in milliseconds
     * @private
     */
    setupAutoDismiss(alertId, delay) {
        setTimeout(() => {
            this.dismissAlert(alertId);
        }, delay);
    }

    /**
     * Dismiss specific alert
     * @param {string} alertId - Alert ID to dismiss
     * @returns {boolean} Dismiss success
     */
    dismissAlert(alertId) {
        if (!alertId || !this.activeAlerts.has(alertId)) {
            console.warn(`[AlertManager] Alert not found for dismissal: ${alertId}`);
            return false;
        }

        try {
            const alertData = this.activeAlerts.get(alertId);
            const $alertElement = alertData.element;

            // Use Bootstrap's alert dismissal
            if ($alertElement && $alertElement.length > 0) {
                $alertElement.alert('close');
            }

            // Clean up tracking
            this.activeAlerts.delete(alertId);

            return true;

        } catch (error) {
            console.error(`[AlertManager] Failed to dismiss alert ${alertId}:`, error);
            return false;
        }
    }

    /**
     * Clear all alerts
     * @returns {boolean} Clear success
     */
    clearAlerts() {
        try {
            // Dismiss all active alerts
            const alertIds = Array.from(this.activeAlerts.keys());
            alertIds.forEach(alertId => {
                this.dismissAlert(alertId);
            });

            // Force clear container if any alerts remain
            const $container = $(this.app.constructor.CONSTANTS.SELECTORS.alertContainer);
            if ($container.length > 0) {
                $container.empty();
            }

            this.activeAlerts.clear();

            return true;

        } catch (error) {
            console.error('[AlertManager] Failed to clear alerts:', error);
            return false;
        }
    }

    /**
     * Get count of active alerts
     * @returns {number} Active alert count
     */
    getActiveAlertCount() {
        return this.activeAlerts.size;
    }

    /**
     * Get active alerts by type
     * @param {string} type - Alert type to filter by
     * @returns {Array} Filtered alerts
     */
    getAlertsByType(type) {
        const alerts = [];
        
        this.activeAlerts.forEach((alertData, alertId) => {
            if (alertData.config.type === type) {
                alerts.push({ id: alertId, ...alertData });
            }
        });

        return alerts;
    }

    /**
     * Check if there are any error alerts
     * @returns {boolean} True if error alerts exist
     */
    hasErrors() {
        return this.getAlertsByType(AlertManager.CONSTANTS.ALERT_TYPES.ERROR).length > 0;
    }

    /**
     * Reset manager to initial state
     * @returns {boolean} Reset success
     */
    reset() {
        try {
            // Clear all alerts
            this.clearAlerts();

            return true;

        } catch (error) {
            console.error('[AlertManager] Reset failed:', error);
            return false;
        }
    }

    /**
     * Destroy manager instance
     */
    destroy() {
        try {
            // Clear all alerts
            this.clearAlerts();
            
            // Clear references
            this.app = null;
            this.activeAlerts.clear();
            
        } catch (error) {
            console.error('[AlertManager] Destroy failed:', error);
        }
    }
}

//=============================================================================
// EXPORT - Make AlertManager available
//=============================================================================

if (typeof module !== 'undefined' && module.exports) {
    module.exports = AlertManager;
} else if (typeof window !== 'undefined') {
    window.AlertManager = AlertManager;
}