/**
 * Additional Fields JavaScript Module
 * 
 * Handles all JavaScript functionality for the TLD Additional Fields
 * configuration section including TLD lookup, field saving, toggle switches,
 * and recent TLDs management.
 */

$(document).ready(function () {
    // Check if we're on the right page
    if (!$('#tldInput').length) {
        return;
    }

    // Initialize immediately
    AdditionalFields.init();

    // Double-check after WHMCS scripts load and re-initialize if needed
    setTimeout(function () {
        if (!$("#tldInput")[0].selectize) {
            AdditionalFields.initSelectize();
        }
    }, 1500);

    // Additional check for conflicts with other scripts
    $(window).on('load', function () {
        setTimeout(function () {
            if (!$("#tldInput")[0].selectize) {
                AdditionalFields.initSelectize();
            }
        }, 500);
    });
});

/**
 * Main Additional Fields Module
 */
const AdditionalFields = {
    /**
     * Initialize the module
     */
    init: function () {
        try {
            this.initSelectize();
            this.attachEventListeners();
            this.initFormSubmission(); // Initialize AJAX form submission
            this.initCancelButton(); // Initialize cancel button functionality
            this.initRecentTlds(); // Initialize recent TLDs on page load
            this.generateBootstrapSwitches(); // Initialize any existing toggles
        } catch (error) {
            console.error('Additional Fields: Initialization failed:', error);
        }
    },

    /**
     * Attach event listeners
     */
    attachEventListeners: function () {
        // Attach click handler for lookup button
        $(document).off('click.additionalFields', '#lookupFieldsButton').on('click.additionalFields', '#lookupFieldsButton', function () {
            AdditionalFields.performTldLookup();
        });

        // Handle form submission
        $(document).off('submit.additionalFields', '#lookupFieldsForm').on('submit.additionalFields', '#lookupFieldsForm', function (e) {
            e.preventDefault();
            AdditionalFields.performTldLookup();
        });
    },

    /**
     * Initialize TLD lookup button
     */
    initLookupButton: function () {
        $("#lookupFieldsButton").on("click", function () {
            AdditionalFields.performTldLookup();
        });
    },

    /**
     * Initialize Selectize dropdown for TLD input
     */
    initSelectize: function () {
        const $tldSelect = $("#tldInput");
        if (!$tldSelect.length) {
            return;
        }

        // Check if selectize is available
        if (typeof $.fn.selectize === 'undefined') {
            console.error('Additional Fields: Selectize plugin not available, using fallback');
            this.initFallbackSelect();
            return;
        }

        // Destroy existing selectize if present
        if ($tldSelect[0].selectize) {
            $tldSelect[0].selectize.destroy();
        }

        // Initialize our own selectize instance
        try {
            const selectizeConfig = {
                create: false,
                sortField: 'text',
                placeholder: 'Choose or search for a TLD...',
                searchField: ['text', 'value'],
                maxOptions: 1000,
                loadThrottle: 300,
                hideSelected: false,
                selectOnTab: true,
                openOnFocus: true,
                closeAfterSelect: true,
                dropdownParent: 'body', // Append dropdown to body to avoid z-index issues
                maxItems: 1,
                onChange: function (value) {
                    AdditionalFields.toggleLookupButton(value);
                },
                onInitialize: function () {
                    // Set initial button state after initialization
                    const currentValue = this.getValue();
                    AdditionalFields.toggleLookupButton(currentValue);
                },
                render: {
                    option: function (item, escape) {
                        return '<div class="option">' + escape(item.text || item.value) + '</div>';
                    },
                    item: function (item, escape) {
                        return '<div class="item">' + escape(item.text || item.value) + '</div>';
                    }
                }
            };

            $tldSelect.selectize(selectizeConfig);

            // Additional verification
            if ($tldSelect[0].selectize) {
                // Set initial button state
                const initialValue = $tldSelect[0].selectize.getValue();
                AdditionalFields.toggleLookupButton(initialValue);
            } else {
                throw new Error('Selectize instance not created');
            }

        } catch (error) {
            console.error('Additional Fields: Failed to initialize selectize:', error);
            this.initFallbackSelect();
        }
    },

    /**
     * Fallback select initialization for when selectize fails
     */
    initFallbackSelect: function () {
        const $tldSelect = $("#tldInput");

        // Remove any existing change handlers and add our own
        $tldSelect.off('change.additionalFields').on('change.additionalFields', function () {
            const value = $(this).val();
            AdditionalFields.toggleLookupButton(value);
        });

        // Add keyboard support for better UX
        $tldSelect.off('keyup.additionalFields').on('keyup.additionalFields', function (e) {
            if (e.which === 13) { // Enter key
                const value = $(this).val();
                if (value && value.trim() !== '') {
                    AdditionalFields.performTldLookup();
                }
            }
        });

        // Set initial button state
        const initialValue = $tldSelect.val();
        AdditionalFields.toggleLookupButton(initialValue);
    },

    /**
     * Toggle lookup button based on TLD selection
     */
    toggleLookupButton: function (value) {
        const $button = $("#lookupFieldsButton");
        if (!$button.length) {
            console.error('Additional Fields: Lookup button not found!');
            return;
        }

        if (value && value.trim() !== '') {
            $button.prop('disabled', false).removeClass('disabled');
        } else {
            $button.prop('disabled', true).addClass('disabled');
        }
    },

    /**
     * Perform TLD lookup
     */
    performTldLookup: function () {
        // Get value from Selectize dropdown
        let tld = $("#tldInput").val();
        if (tld) {
            tld = tld.trim();
        }

        $('#alertContainer').empty();

        if (!this.validateTld(tld)) {
            this.showAlert('danger', '<strong>Error:</strong> Please enter a valid TLD (e.g., .it)');
            $("#tldInput").focus();
            return;
        }

        this.prepareLookupContainer();
        this.showLoadingIndicator();

        $.ajax({
            url: window.location.href,
            type: "POST",
            data: {
                action: "loadtld",
                tld: tld,
            },
            dataType: "json",
            success: function (response) {
                AdditionalFields.handleLookupSuccess(response, tld);
            },
            error: function (xhr, status, error) {
                AdditionalFields.handleLookupError(error);
            }
        });
    },

    /**
     * Validate TLD format
     */
    validateTld: function (tld) {
        if (!tld) return false;

        tld = String(tld).trim();

        if (!tld.startsWith('.')) {
            tld = '.' + tld;
            // Update the Selectize dropdown value
            if ($("#tldInput")[0].selectize) {
                $("#tldInput")[0].selectize.setValue(tld);
            } else {
                $("#tldInput").val(tld);
            }
        }

        return tld.length > 1;
    },

    /**
     * Prepare lookup container
     */
    prepareLookupContainer: function () {
        if ($("#fieldsContainer").length === 0) {
            $("#tldFields").wrap('<div id="fieldsContainer" class="fields-wrapper"></div>');
        }

        const currentHeight = $("#fieldsContainer").height();
        if (currentHeight > 100) {
            $("#fieldsContainer").css('min-height', currentHeight + 'px');
        } else {
            $("#fieldsContainer").css('min-height', '300px');
        }

        if ($("#tldFields").children().length > 0) {
            $("#tldFields").fadeTo(200, 0.3);
        }
    },

    /**
     * Show loading indicator
     */
    showLoadingIndicator: function () {
        $("#loadingIndicator").appendTo("#fieldsContainer").css({
            'position': 'absolute',
            'top': '50%',
            'left': '50%',
            'transform': 'translate(-50%, -50%)',
            'z-index': 100,
            'width': '100%',
            'background': 'rgba(255,255,255,0.7)'
        }).fadeIn(200);
    },

    /**
     * Handle successful TLD lookup
     */
    handleLookupSuccess: function (response, tld) {
        if (response?.success) {
            this.addRecentTld(tld);
        }

        $("#loadingIndicator").fadeOut(200);

        if (response && response.success) {

            $("#tldFields").stop(true, true).fadeTo(150, 0.3, function () {
                const $fieldsContainer = $(this);

                // Insert the new HTML
                $fieldsContainer.html(response.html || '');

                // Reset opacity and container height
                $fieldsContainer.fadeTo(200, 1, function () {
                    $("#fieldsContainer").css('min-height', '');

                    // Remove container if no content
                    if (!response.html || response.html.trim() === '') {
                        $("#fieldsContainer").remove();
                        AdditionalFields.showAlert('info', '<strong>Info:</strong> No additional fields are configured for this TLD.');
                        return;
                    }

                    // Initialize field interactions and toggle switches
                    AdditionalFields.initFieldInteractions();
                    AdditionalFields.generateBootstrapSwitches();
                    AdditionalFields.initFormSubmission(); // Initialize AJAX form submission
                    
                    // Store original values for reset functionality
                    setTimeout(function() {
                        AdditionalFields.storeOriginalValues();
                    }, 100); // Small delay to ensure all fields are fully initialized

                    // Smooth scroll to fields
                    if (response.html && response.html.trim() !== '') {
                        $('html, body').animate({
                            scrollTop: $("#tldFields").offset().top - 50
                        }, 300);

                        // Animate field rows with staggered effect using CSS transitions
                        $(".cnic-field-row").each(function (index) {
                            const $row = $(this);
                            $row.css({
                                'opacity': 0,
                                'transform': 'translateY(20px)',
                                'transition': 'all 0.3s ease'
                            });

                            // Use setTimeout for staggered animation
                            setTimeout(function () {
                                $row.css({
                                    'opacity': 1,
                                    'transform': 'translateY(0)'
                                });
                            }, index * 50);
                        });
                    }
                });
            });
        } else {
            console.error('Additional Fields: Lookup failed:', response);
            $("#tldFields").stop(true, true).fadeTo(200, 1);
            $("#fieldsContainer").css('min-height', '');
            this.showAlert('danger', '<strong>Error:</strong> ' + (response?.error || "Failed to load TLD fields."));
        }
    },

    /**
     * Handle TLD lookup error
     */
    handleLookupError: function (error) {
        $("#loadingIndicator").fadeOut(300);
        console.error("AJAX Error:", error);
        this.showAlert('danger', '<strong>Error:</strong> Failed to load TLD fields. Please try again or contact support.');
    },

    /**
     * Initialize form submission
     */
    initFormSubmission: function () {
        // Remove any existing handlers to prevent duplicates
        $(document).off('submit.saveFields', '#saveFieldsForm');

        // Add form submission handler
        $(document).on('submit.saveFields', '#saveFieldsForm', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            AdditionalFields.saveFields();
            return false;
        });
    },

    /**
     * Save additional fields data
     */
    saveFields: function () {
        const $form = $('#saveFieldsForm');

        if (!$form.length) {
            console.error('Additional Fields: Save form not found!');
            AdditionalFields.showAlert('danger', '<strong>Error:</strong> Form not found. Please refresh the page and try again.');
            return;
        }

        const formData = $form.serialize();
        const $saveButton = $('#saveFieldsButton');

        // Modern loading state
        $saveButton.prop('disabled', true)
            .addClass('disabled')
            .html('<i class="fa fa-spinner fa-spin"></i> Saving...');
        $('.cnic-field-row').addClass('saving');

        $.ajax({
            url: window.location.href,
            type: "POST",
            data: formData,
            dataType: "json",
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            success: function (response) {
                const $saveButton = $('#saveFieldsButton');
                $saveButton.prop('disabled', false)
                    .removeClass('disabled')
                    .html('<i class="fa fa-save"></i> Save Fields');
                $('.cnic-field-row').removeClass('saving');

                if (response && response.success) {
                    AdditionalFields.showAlert('success', '<strong>Success:</strong> Additional fields have been saved successfully.');
                    AdditionalFields.showSuccessMessage();
                } else {
                    AdditionalFields.showAlert('danger', '<strong>Error:</strong> ' + (response.error || "Failed to save fields."));
                }
            },
            error: function (xhr, status, error) {
                console.warn('Additional Fields: AJAX error:', xhr, status, error);
                const $saveButton = $('#saveFieldsButton');
                $saveButton.prop('disabled', false)
                    .removeClass('disabled')
                    .html('<i class="fa fa-save"></i> Save Fields');
                $('.cnic-field-row').removeClass('saving');
                console.error("AJAX Error:", error);
                AdditionalFields.showAlert('danger', '<strong>Error:</strong> Failed to save fields. Please try again or contact support.');
            }
        });
    },

    /**
     * Initialize cancel button
     */
    initCancelButton: function () {
        $(document).on("click", "#cancelButton", function (e) {
            e.preventDefault();
            
            // Remove any success messages
            $('.save-success-message').remove();
            
            // Reset all form fields to their original values before clearing
            AdditionalFields.resetFormFields();
            
            // Clear the tldFields container (this is where the form content is loaded)
            $("#tldFields").fadeOut(200, function () {
                $(this).empty();
                $(this).show(); // Keep the container, just empty it
                $("#fieldsContainer").css('min-height', 'auto');
            });

            // Clear and focus the TLD input
            if ($("#tldInput")[0].selectize) {
                $("#tldInput")[0].selectize.clear();
                $("#tldInput")[0].selectize.focus();
            } else {
                $("#tldInput").val('').focus();
            }
        });
    },

    /**
     * Reset form fields to their original values
     */
    resetFormFields: function() {
        const $form = $('#fieldsForm');
        if ($form.length === 0) return;
        
        // Reset all input fields to their original values
        $form.find('input, select, textarea').each(function() {
            const $field = $(this);
            const originalValue = $field.data('original-value');
            
            if (originalValue !== undefined) {
                $field.val(originalValue);
            } else {
                // If no original value stored, reset to empty or default
                if ($field.is(':checkbox') || $field.is(':radio')) {
                    $field.prop('checked', $field.data('original-checked') || false);
                } else {
                    $field.val('');
                }
            }
            
            // Update selectize if present
            if ($field[0].selectize) {
                $field[0].selectize.setValue(originalValue || '');
            }
        });
        
        // Reset any visual states
        $('.cnic-field-row').removeClass('saving');
        $('.form-group').removeClass('has-error');
        $('.help-block').remove();
    },

    /**
     * Store original form values for reset functionality
     */
    storeOriginalValues: function() {
        const $form = $('#fieldsForm');
        if ($form.length === 0) return;
        
        $form.find('input, select, textarea').each(function() {
            const $field = $(this);
            
            if ($field.is(':checkbox') || $field.is(':radio')) {
                $field.data('original-checked', $field.prop('checked'));
            } else {
                $field.data('original-value', $field.val());
            }
        });
    },

    /**
     * Initialize field interactions
     */
    initFieldInteractions: function () {
        $('.cnic-field-row').off('focusin.fieldHighlight focusout.fieldHighlight')
            .on('focusin.fieldHighlight', 'input, select, textarea', function () {
                $(this).closest('.cnic-field-row').addClass('field-focused');
            })
            .on('focusout.fieldHighlight', 'input, select, textarea', function () {
                $(this).closest('.cnic-field-row').removeClass('field-focused');
            });

        $('.cnic-field-row input, .cnic-field-row select, .cnic-field-row textarea')
            .off('input.validation change.validation')
            .on('input.validation change.validation', function () {
                const $field = $(this);
                const $row = $field.closest('.cnic-field-row');
                const isRequired = $field.attr('required') || $field.hasClass('required');
                const hasValue = $field.val() && $field.val().trim() !== '';

                $row.toggleClass('field-valid', hasValue && isRequired);
                $row.toggleClass('field-invalid', !hasValue && isRequired);
            });
    },

    /**
     * Generate bootstrap toggle switches
     */
    generateBootstrapSwitches: function () {
        // Use delegated event handling for dynamic content
        $(document).off('change.toggleBootstrap', '.cnic-toggle').on('change.toggleBootstrap', '.cnic-toggle', function () {
            const $this = $(this);
            const $wrapper = $this.closest('.cnic-toggle-wrapper');
            const hiddenName = $this.data('hidden');
            const $hidden = $('input[type="hidden"][name="' + hiddenName + '"]');

            $hidden.val($this.is(':checked') ? '1' : '0');

            $wrapper.toggleClass('toggle-on', $this.is(':checked'));
            $wrapper.toggleClass('toggle-off', !$this.is(':checked'));

            $wrapper.addClass('toggle-animate');
            setTimeout(function () {
                $wrapper.removeClass('toggle-animate');
            }, 300);
        });

        // Add click handler for toggle wrapper (better UX)
        $(document).off('click.toggleWrapper', '.cnic-toggle-wrapper').on('click.toggleWrapper', '.cnic-toggle-wrapper', function (e) {
            // Only trigger if clicking the wrapper itself, not the checkbox
            if (e.target === this || $(e.target).hasClass('cnic-toggle-label')) {
                const $toggle = $(this).find('.cnic-toggle');
                $toggle.prop('checked', !$toggle.prop('checked')).trigger('change');
            }
        });

        // Initialize existing toggles
        $('.cnic-toggle').each(function () {
            const $toggle = $(this);
            const $wrapper = $toggle.closest('.cnic-toggle-wrapper');

            if ($wrapper.hasClass('initialized')) {
                return;
            }

            $wrapper.addClass('initialized');

            const isChecked = $toggle.is(':checked');
            $wrapper.toggleClass('toggle-on', isChecked);
            $wrapper.toggleClass('toggle-off', !isChecked);
        });
    },

    /**
     * Initialize recent TLDs
     */
    initRecentTlds: function () {
        const recentTlds = this.getRecentTlds();
        if (recentTlds.length === 0) {
            // Hide the recent TLDs section if no recent TLDs
            $('#recentTldsSection').hide();
            return;
        }

        const $recentContainer = $('#recentTldsList');
        if (!$recentContainer.length) return;

        $recentContainer.empty();

        recentTlds.forEach(tld => {
            const $btn = $('<button>', {
                type: 'button',
                class: 'recent-tld-btn btn btn-outline-primary btn-sm',
                text: tld,
                'data-tld': tld,
                style: 'margin: 3px;'
            });
            $recentContainer.append($btn);
        });

        // Show the recent TLDs section
        $('#recentTldsSection').show();

        // Bind click events for recent TLD buttons
        $(document).on('click', '.recent-tld-btn', function (e) {
            e.preventDefault();
            const tld = $(this).data('tld');

            // Set the TLD in selectize without triggering change event to avoid duplicate loading
            if ($("#tldInput")[0].selectize) {
                const selectize = $("#tldInput")[0].selectize;
                selectize.setValue(tld, true); // Silent set to avoid triggering change
            } else {
                $("#tldInput").val(tld);
            }

            // Update lookup button and trigger single lookup
            AdditionalFields.toggleLookupButton(tld);
            AdditionalFields.performTldLookup();
        });

        // Keyboard accessibility for recent TLD buttons
        $(document).on('keydown', '.recent-tld-btn', function (e) {
            if (e.which === 13 || e.which === 32) {
                e.preventDefault();
                $(this).click();
            }
        });
    },

    /**
     * Get recent TLDs from localStorage
     */
    getRecentTlds: function () {
        try {
            const stored = localStorage.getItem('cnic_recentTlds');
            return stored ? JSON.parse(stored) : [];
        } catch (e) {
            console.error('Failed to get recent TLDs', e);
            return [];
        }
    },

    /**
     * Add TLD to recent list
     */
    addRecentTld: function (tld) {
        try {
            let tlds = this.getRecentTlds();
            tlds = tlds.filter(item => item !== tld);
            tlds.unshift(tld);
            tlds = tlds.slice(0, 5);
            localStorage.setItem('cnic_recentTlds', JSON.stringify(tlds));

            // Re-initialize recent TLDs display
            this.initRecentTlds();
        } catch (e) {
            console.error('Failed to save recent TLD', e);
        }
    },

    /**
     * Show alert message
     */
    showAlert: function (type, message) {
        const alertHtml = `
            <div class="alert alert-${type} alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                ${message}
            </div>
        `;
        $('#alertContainer').html(alertHtml);

        if (type === 'success') {
            setTimeout(function () {
                $('.alert-success').fadeOut('slow', function () {
                    $(this).remove();
                });
            }, 5000);
        }
    },

    /**
     * Show success message below the save button with auto-dismiss
     */
    showSuccessMessage: function () {
        // Remove any existing success message immediately
        $('.save-success-message').remove();

        const $formActions = $('.additional-fields-form-actions');
        if ($formActions.length === 0) return;

        // Create success message using existing CSS classes
        const successHtml = `
            <div class="save-success-message alert alert-success text-center" style="margin-top: 15px; max-width: 300px; margin-left: auto; margin-right: auto;">
                <i class="fa fa-check-circle"></i>
                Fields saved successfully!
            </div>
        `;

        // Insert success message below the form actions
        $formActions.after(successHtml);
        
        // Add fade-in animation using existing class
        $('.save-success-message').addClass('cnicadmin-main');

        // Auto-remove after 3 seconds with fade out
        setTimeout(function () {
            $('.save-success-message').fadeOut(300, function() {
                $(this).remove();
            });
        }, 3000);
    },

    /**
     * Bind keyboard events
     */
    bindKeyboardEvents: function () {
        // Handle Enter key in selectize input
        $(document).on('keydown', '.selectize-input', function (e) {
            if (e.which === 13 && $("#tldInput")[0].selectize.getValue()) {
                e.preventDefault();
                $("#lookupFieldsButton").click();
            }
        });
    }
};