export class UI {
    constructor(selectize) {
        this.tapInsideRow = false;
        this.isMobile = window.matchMedia("(max-width: 768px)").matches;
        this.originalHtml = '';
        this.selectizeInstance = selectize;
        this.selectizeInstance.initSelectize();
        this.selectizeInstance.initNewDnsRecordTypeSelectize();
        this.storeOriginalData();
    }

    attachEventHandlers(record) {
        $('#addRecordButton').click(() => record.addRecord());
        $(document).on('click', '.delete-record', (event) => record.deleteRecord(event));

        // Handle reset button click to reset table rows data
        $('#resetButton').click(() => this.resetTableRows());

        $('#newDnsRecordType').change(() => this.handleTypeChange());
        $('#newDnsRecordHost, #newDnsRecordTtl, #newDnsRecordType, #newDnsRecordAddress, #newDnsRecordPriority')
            .focus((event) => this.handleFocus(event))
            .blur((event) => this.handleBlur(event));

        // Handle submit button click to submit the form data
        $('#submitButton').click((event) => this.handleSubmit(event));

        // Handle changes in existing fields and dynamically added rows
        $(document).on('change', '#dnsForm', () => {
            this.showPendingSave();
        });

        // Handle hover event to make fields editable
        $(document).on('mouseenter', '.dns-record', (event) => this.handleMouseEnter(event));
        $(document).on('mouseleave', '.dns-record', (event) => this.handleMouseLeave(event));

        // Handle click event to make fields editable
        $(document).on('click', '.dns-record', (event) => this.handleClick(event));

        // Handle click event outside of .dns-record to make fields read-only
        $(document).on('click', (event) => this.handleDocumentClick(event));

        // Handle change event for dnsrecordtype select fields
        $(document).on('change', '.dns-record select', (event) => this.handleTypeChangeEvent(event));
    }

    showPendingSave() {
        $('#submitButton').prop('disabled', false);
        $('#pendingSave').show();
    }

    hidePendingSave() {
        $('#submitButton').prop('disabled', true);
        $('#pendingSave').hide();
    }

    storeOriginalData() {
        this.originalHTML = $('.cnic-table tbody').html(); // Store the original HTML of the table body
    }

    resetTableRows() {
        $('.cnic-table tbody').html(this.originalHTML); // Restore the original HTML of the table body
        this.originalData = [];
        this.storeOriginalData(); // Re-store the original data after resetting the table
        $('#submitButton').prop('disabled', true);
        $('#pendingSave').hide();
    }

    handleTypeChange() {
        const type = $('#newDnsRecordType').val();
        const prioritySupportedTypes = $('input[name="prioritySupportedRecordType[]"]').map(function () {
            return $(this).val();
        }).get();

        this.toggleAddressField($('#newDnsRecordAddress'), type, "");

        if (prioritySupportedTypes.includes(type)) {
            $('#newDnsRecordPriorityWrapper').show();
            $('#newDnsRecordPriority').val('').attr('type', 'text');
            $('#newDnsRecordAddressWrapper').removeClass('col-md-4').addClass('col-md-3');
            $('#newDnsRecordHostWrapper').removeClass('col-md-4').addClass('col-md-3');
        } else {
            $('#newDnsRecordPriorityWrapper').hide();
            $('#newDnsRecordPriority').val("N/A").attr('type', 'hidden');
            $('#newDnsRecordAddressWrapper').removeClass('col-md-3').addClass('col-md-4');
            $('#newDnsRecordHostWrapper').removeClass('col-md-3').addClass('col-md-4');
        }
    }

    handleFocus(event) {
        const targetId = event.target.id;
        const priorityVisible = $('#newDnsRecordPriorityWrapper').is(':visible');
        if (targetId === 'newDnsRecordHost') {
            if (priorityVisible) {
                $('#newDnsRecordHostWrapper').removeClass('col-md-3').addClass('col-md-4');
                $('#newDnsRecordAddressWrapper').removeClass('col-md-3').addClass('col-md-2');
            } else {
                $('#newDnsRecordHostWrapper').removeClass('col-md-3').addClass('col-md-5');
                $('#newDnsRecordAddressWrapper').removeClass('col-md-4').addClass('col-md-3');
            }
        } else if (targetId === 'newDnsRecordAddress') {
            if (priorityVisible) {
                $('#newDnsRecordAddressWrapper').removeClass('col-md-3').addClass('col-md-4');
                $('#newDnsRecordHostWrapper').removeClass('col-md-3').addClass('col-md-2');
            } else {
                $('#newDnsRecordAddressWrapper').removeClass('col-md-3').addClass('col-md-5');
                $('#newDnsRecordHostWrapper').removeClass('col-md-4').addClass('col-md-3');
            }
        }
    }

    handleBlur(event) {
        const targetId = event.target.id;
        const priorityVisible = $('#newDnsRecordPriorityWrapper').is(':visible');
        if (targetId === 'newDnsRecordHost') {
            if (priorityVisible) {
                $('#newDnsRecordHostWrapper').removeClass('col-md-4').addClass('col-md-3');
                $('#newDnsRecordAddressWrapper').removeClass('col-md-2').addClass('col-md-3');
            } else {
                $('#newDnsRecordHostWrapper').removeClass('col-md-5').addClass('col-md-4');
                $('#newDnsRecordAddressWrapper').removeClass('col-md-3').addClass('col-md-4');
            }
        } else if (targetId === 'newDnsRecordAddress') {
            if (priorityVisible) {
                $('#newDnsRecordAddressWrapper').removeClass('col-md-4').addClass('col-md-3');
                $('#newDnsRecordHostWrapper').removeClass('col-md-2').addClass('col-md-3');
            } else {
                $('#newDnsRecordAddressWrapper').removeClass('col-md-5').addClass('col-md-4');
                $('#newDnsRecordHostWrapper').removeClass('col-md-3').addClass('col-md-4');
            }
        }
    }

    handleSubmit(event) {
        event.preventDefault();

        // show loader
        $('#loaderIcon').show();

        // save original data
        this.originalHTML = [];
        this.storeOriginalData();

        // disable submit button
        $('#submitButton').prop('disabled', true);

        // Temporarily enable all dns-record rows to include them in the form data
        $('#dnsForm').find('.dns-record').each(function () {
            $(this).find('input, select').prop('disabled', false);
        });

        // Collect DNS records
        const dnsRecords = [];
        $('#dnsForm').find('.dns-record').each(function () {
            const selectizeInstance = $(this).find('select[name="dnsrecordtype[]"]').data('selectize');
            const record = {
                dnsrecid: $(this).find('input[name="dnsrecid[]"]').val(),
                dnsrecordhost: $(this).find('input[name="dnsrecordhost[]"]').val(),
                dnsrecordttl: $(this).find('input[name="dnsrecordttl[]"]').val(),
                dnsrecordtype: selectizeInstance ? selectizeInstance.getValue() : '',
                dnsrecordaddress: $(this).find('input[name="dnsrecordaddress[]"]').val(),
                dnsrecordpriority: $(this).find('input[name="dnsrecordpriority[]"]').val()
            };
            dnsRecords.push(record);
        });

        const currentUrl = new URL(cnicWebRootPath + "/index.php");
        const actionUrl = currentUrl.toString();
        // Convert dnsRecords to a format suitable for URL-encoded form data
        const formData = $('#dnsForm').serialize();

        $.ajax({
            type: 'POST',
            url: actionUrl,
            data: formData,
            success: (response) => {
                // Show success modal with message from API
                if (response.success) {
                    $('#cnicModal .modal-title').text('Success');
                    $('#cnicModal .modal-body').text("DNS records have been updated successfully.");
                    $('#cnicModal').modal('show');
                    this.hidePendingSave();
                }
                else {
                    $('#cnicModal .modal-title').text('Error');
                    $('#cnicModal .modal-body').text(response.error);
                    $('#cnicModal').modal('show');
                }
                // hide loader
                $('#loaderIcon').hide();
            },
            error: function (error) {
                // Show error modal with message from API
                $('#cnicModal .modal-title').text('Error');
                $('#cnicModal .modal-body').text(error.responseJSON.message);
                $('#cnicModal').modal('show');
                // hide loader
                $('#loaderIcon').hide();
            }
        });
    }

    makeFieldsEditable(row) {
        row.addClass('editing');
        const addressField = row.find('input[name="dnsrecordaddress[]"]');
        this.toggleAddressField($(addressField), row.find('.record-type').val());
        row.find('input').prop('readonly', false);
        row.find('select').each(function () {
            const selectize = $(this)[0].selectize;
            if (selectize) {
                selectize.enable();
            }
        });
    }

    makeFieldsReadOnly(row) {
        row.removeClass('editing');
        const addressField = row.find('textarea[name="dnsrecordaddress[]"]');
        this.toggleAddressField($(addressField), row.find('.record-type').val());
        row.find('input').prop('readonly', true);
        row.find('select').each(function () {
            const selectize = $(this)[0].selectize;
            if (selectize) {
                selectize.disable();
            }
        });
    }

    handleMouseEnter(event) {
        const row = $(event.currentTarget);
    
        // Check if any row is currently in an editable state
        const currentlyEditingRow = $('.dns-record.editing');
    
        // If no row is currently editable, make this row editable immediately
        if (!currentlyEditingRow.length) {
            this.makeAllFieldsReadOnlyExcept(row);
            row.data('shouldBeEditable', true);
            this.makeFieldsEditable(row);
            return;
        }
    
        // Clear any existing hover timer for this row
        if (row.data('hoverTimer')) {
            clearTimeout(row.data('hoverTimer'));
        }
    
        // Set a new hover timer for subsequent hovers
        const hoverTimer = setTimeout(() => {
            if (currentlyEditingRow[0] !== row[0]) {
                this.makeAllFieldsReadOnlyExcept(row);
                row.data('shouldBeEditable', true);
                this.makeFieldsEditable(row);
            }
        }, 500); // Replace 300 with your desired threshold in milliseconds
    
        // Store the timer in the row's data
        row.data('hoverTimer', hoverTimer);
    }
    
    handleMouseLeave(event) {
        const row = $(event.currentTarget);
    
        // Clear the hover timer when the mouse leaves the row
        if (row.data('hoverTimer')) {
            clearTimeout(row.data('hoverTimer'));
            row.removeData('hoverTimer');
        }
    }

    // handleMouseLeave(event) {
    //     const row = $(event.currentTarget);
    //     const target = $(event.relatedTarget);

    //     // Check if the target is an input or select element within the row
    //     if (target.is('input') || target.is('select') || target.closest('.dns-record').length) {
    //         return;
    //     }

    //     if (!this.isMobile) {
    //         row.data('shouldBeEditable', false);
    //         setTimeout(() => {
    //             if (!row.data('shouldBeEditable') && !row.find('input:focus, select:focus').length && !this.isEditing) {
    //                 this.makeFieldsReadOnly(row);
    //             }
    //         }, 300); // Adjust the delay as needed
    //     } else {
    //         if (!this.tapInsideRow) {
    //             row.data('shouldBeEditable', false);
    //             setTimeout(() => {
    //                 if (!row.data('shouldBeEditable') && !row.find('input:focus, select:focus').length && !this.isEditing) {
    //                     this.makeFieldsReadOnly(row);
    //                 }
    //             }, 300); // Adjust the delay as needed
    //         }
    //         this.tapInsideRow = false;
    //     }
    // }

    handleClick(event) {
        const row = $(event.currentTarget);
        this.makeAllFieldsReadOnlyExcept(row);
        row.data('shouldBeEditable', true);
        this.makeFieldsEditable(row);
        if (this.isMobile) {
            this.tapInsideRow = true;
        }
    }

    handleDocumentClick(event) {
        if (!$(event.target).closest('.dns-record').length) {
            $('.dns-record').each((index, element) => {
                const row = $(element);
                row.data('shouldBeEditable', false);
                this.makeFieldsReadOnly(row);
            });
            this.isEditing = false; // Reset the flag when clicking outside
        }
    }

    makeAllFieldsReadOnlyExcept(row) {
        $('.dns-record').each((index, element) => {
            const currentRow = $(element);
            if (currentRow[0] !== row[0]) {
                currentRow.data('shouldBeEditable', false);
                this.makeFieldsReadOnly(currentRow);
            }
        });
    }

    handleTypeChangeEvent(event) {
        const row = $(event.currentTarget).closest('tr');
        if (row.hasClass('editing') || row.hasClass('new-record')) {
            const type = $(event.currentTarget).val();
            const addressField = row.find('input[name="dnsrecordaddress[]"], textarea[name="dnsrecordaddress[]"]');
            this.toggleAddressField(addressField, type);
            this.togglePriorityField(row, type);
        }
    }

    toggleAddressField(element, type, name = "dnsrecordaddress[]") {
        if (type === 'TXT' && !element.is('textarea')) {
            const textarea = $('<textarea>').attr({
                name: name,
                id: element.attr('id') ? element.attr('id') : "",
                placeholder: 'Address',
                class: 'form-control cnicMultiline' + (name === 'dnsrecordaddress[]' ? '' : ' dnsrecordaddress'),
                rows: 5
            }).val(element.val());
            element.replaceWith(textarea);
        } else {
            if (element.is('textarea')) {
                const input = $('<input>').attr({
                    type: 'text',
                    name: name,
                    id: element.attr('id') ? element.attr('id') : "",
                    placeholder: 'Address',
                    class: 'form-control cnicEllipsis' + (name === 'dnsrecordaddress[]' ? '' : ' dnsrecordaddress'),
                }).val(element.val());
                element.replaceWith(input);
            }
        }
    }

    togglePriorityField(row, type) {
        const priorityField = row.find('.priority-input');
        const prioritySupportedTypes = $('input[name="prioritySupportedRecordType[]"]').map(function () {
            return $(this).val();
        }).get();

        if (prioritySupportedTypes.includes(type) && priorityField.attr('type') === 'hidden') {
            priorityField.attr('type', 'text');
            if (priorityField.val() === 'N/A') {
                priorityField.val('');
            }
            priorityField.size = 2;
        } else {
            if (priorityField.val() === 'N/A') {
                priorityField.val('');
            }
            priorityField.attr('type', 'hidden');
        }
    }
}