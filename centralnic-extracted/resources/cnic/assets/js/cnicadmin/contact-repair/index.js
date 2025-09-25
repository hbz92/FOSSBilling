/**
 * Contact Data Repair Tool JavaScript
 * Handles domain contact checking and repair functionality
 */
$(document).ready(function() {
    const ContactRepair = {
        // State management
        currentDomain: '',
        isLoading: false,

        // Initialize the application
        init: function() {
            this.bindEvents();
            this.resetForm();
        },

        // Bind event handlers
        bindEvents: function() {
            $('#checkDomainBtn').on('click', this.checkDomain.bind(this));
            $('#repairDomainBtn').on('click', this.repairDomain.bind(this));
            
            // Prevent form submission and handle via AJAX only
            $('#contactRepairForm').on('submit', function(e) {
                e.preventDefault();
                if (!ContactRepair.isLoading) {
                    ContactRepair.checkDomain();
                }
                return false;
            });
            
            // Enter key support
            $('#domainName').on('keypress', function(e) {
                if (e.which === 13 && !ContactRepair.isLoading) {
                    e.preventDefault();
                    ContactRepair.checkDomain();
                    return false;
                }
            });
            
            // Add a reset button functionality (can be triggered programmatically)
            $(document).on('click', '#resetBtn', this.resetForm.bind(this));
        },

        // Check domain for registry handles
        checkDomain: function() {
            const domain = $('#domainName').val().trim();
            
            if (!domain) {
                this.showAlert('error', 'Please enter a domain name.');
                return;
            }

            if (!this.isValidDomain(domain)) {
                this.showAlert('error', 'Please enter a valid domain name.');
                return;
            }

            // Clear any previous alerts when starting a new check
            $('#alertContainer').empty();
            
            this.currentDomain = domain;
            this.setLoading(true);

            $.post('addonmodules.php', {
                module: 'cnicadmin',
                action: 'forceRefreshDomains',
                request: 'checkDomain',
                domain: domain
            })
            .done(this.handleCheckResponse.bind(this))
            .fail(this.handleAjaxError.bind(this))
            .always(() => this.setLoading(false));
        },

        // Repair domain contacts
        repairDomain: function() {
            if (!this.currentDomain) {
                this.showAlert('error', 'No domain selected for repair.');
                return;
            }

            this.setLoading(true);

            $.post('addonmodules.php', {
                module: 'cnicadmin',
                action: 'forceRefreshDomains',
                request: 'repairDomain',
                domain: this.currentDomain
            })
            .done(this.handleRepairResponse.bind(this))
            .fail(this.handleAjaxError.bind(this))
            .always(() => this.setLoading(false));
        },

        // Handle check domain response
        handleCheckResponse: function(response) {
            if (response.success) {
                this.displayResults(response);
                $('#contactDetails').removeClass('hidden').show();
                $('#resetBtn').removeClass('hidden').show();
                
                if (response.needs_repair) {
                    $('#repairDomainBtn').removeClass('hidden').show();
                    this.showAlert('warning', response.message);
                } else {
                    $('#repairDomainBtn').addClass('hidden').hide();
                    this.showAlert('success', response.message);
                }
            } else {
                this.showAlert('error', response.error || 'Failed to check domain.');
            }
        },

        // Handle repair domain response
        handleRepairResponse: function(response) {
            if (response.success) {
                this.displayRepairResults(response);
                $('#contactDetails').removeClass('hidden').show();
                $('#repairDomainBtn').addClass('hidden').hide();
                $('#resetBtn').removeClass('hidden').show();
                
                if (response.repair_successful) {
                    this.showAlert('success', response.message);
                } else {
                    this.showAlert('warning', response.message);
                }
            } else {
                this.showAlert('error', response.error || 'Failed to repair domain.');
                $('#contactDetails').removeClass('hidden').show();
                $('#resetBtn').removeClass('hidden').show();
            }
        },

        // Display check results
        displayResults: function(data) {
            let html = `
                <div class="field-label">Domain: <span style="color: #666; font-weight: normal;">${this.escapeHtml(data.domain)}</span></div>
                <div class="field-label">Status: <span style="color: #666; font-weight: normal;">${this.escapeHtml(data.message)}</span></div>
            `;

            if (data.registry_handles && data.registry_handles.length > 0) {
                html += '<div class="field-label" style="margin-top: 15px;">Registry Handles Detected:</div>';
                html += '<div style="margin-left: 20px;">';
                data.registry_handles.forEach(handle => {
                    const contactType = handle.type.replace('contact', '').toUpperCase();
                    html += `<div style="margin-bottom: 5px;"><strong>${contactType}:</strong> ${this.escapeHtml(handle.contact_id)}</div>`;
                });
                html += '</div>';
            }

            $('#contactDetailsContent').html(html);
        },

        // Display repair results
        displayRepairResults: function(data) {
            let html = `
                <div class="field-label">Domain: <span style="color: #666; font-weight: normal;">${this.escapeHtml(data.domain)}</span></div>
                <div class="field-label">Repair Status: <span style="color: #666; font-weight: normal;">${this.escapeHtml(data.message)}</span></div>
            `;

            if (data.registry_handles && data.registry_handles.length > 0) {
                html += '<div class="field-label" style="margin-top: 15px;">Remaining Registry Handles:</div>';
                html += '<div style="margin-left: 20px;">';
                data.registry_handles.forEach(handle => {
                    const contactType = handle.type.replace('contact', '').toUpperCase();
                    html += `<div style="margin-bottom: 5px;"><strong>${contactType}:</strong> ${this.escapeHtml(handle.contact_id)}</div>`;
                });
                html += '</div>';
            } else {
                html += '<div class="field-label" style="margin-top: 15px; color: #28a745;">All registry handles have been successfully replaced with proper contact objects.</div>';
            }

            $('#contactDetailsContent').html(html);
        },

        // Show/hide sections
        showSection: function(sectionId) {
            $('#' + sectionId).removeClass('hidden').show();
        },

        hideSection: function(sectionId) {
            $('#' + sectionId).addClass('hidden').hide();
        },

        // Set loading state
        setLoading: function(loading) {
            this.isLoading = loading;
            $('#checkDomainBtn, #repairDomainBtn').prop('disabled', loading);
            
            if (loading) {
                $('#checkDomainBtn').html('<i class="fas fa-spinner fa-spin"></i> Checking...');
                $('#repairDomainBtn').html('<i class="fas fa-spinner fa-spin"></i> Repairing...');
            } else {
                $('#checkDomainBtn').html('<i class="fas fa-search"></i> Check Contacts');
                $('#repairDomainBtn').html('<i class="fas fa-wrench"></i> Repair Contacts');
            }
        },

        // Reset form
        resetForm: function() {
            this.currentDomain = '';
            this.isLoading = false;
            $('#domainName').val('').focus();
            // Don't clear alerts here - let them persist until user action
            $('#contactDetails').addClass('hidden').hide();
            $('#repairDomainBtn').addClass('hidden').hide();
            $('#resetBtn').addClass('hidden').hide();
            $('#checkDomainBtn, #repairDomainBtn').prop('disabled', false);
            $('#checkDomainBtn').html('<i class="fas fa-search"></i> Check Contacts');
            $('#repairDomainBtn').html('<i class="fas fa-wrench"></i> Repair Contacts');
        },

        // Show alert message
        showAlert: function(type, message) {
            const alertTypes = {
                success: 'alert-success',
                error: 'alert-danger',
                warning: 'alert-warning',
                info: 'alert-info'
            };

            const alertClass = alertTypes[type] || 'alert-info';
            const alert = `
                <div class="alert ${alertClass} alert-dismissible" role="alert">
                    ${this.escapeHtml(message)}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            `;

            $('#alertContainer').html(alert);

            // Auto-hide after 5 seconds for non-error messages
            if (type !== 'error') {
                setTimeout(() => {
                    $('.alert').fadeOut();
                }, 5000);
            }
        },

        // Handle AJAX errors
        handleAjaxError: function(xhr, status, error) {
            this.showAlert('error', 'Network error occurred. Please try again.');
            this.resetForm();
        },

        // Basic domain validation
        isValidDomain: function(domain) {
            const domainRegex = /^[a-zA-Z0-9][a-zA-Z0-9-]{0,61}[a-zA-Z0-9]?\.[a-zA-Z]{2,}$/;
            return domainRegex.test(domain);
        },

        // Escape HTML to prevent XSS
        escapeHtml: function(text) {
            const map = {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            };
            return text.replace(/[&<>"']/g, function(m) { return map[m]; });
        }
    };

    // Initialize the application
    ContactRepair.init();
});
