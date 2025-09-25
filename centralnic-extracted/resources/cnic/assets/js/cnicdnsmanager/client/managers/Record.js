export class Record {
    constructor(ui) {
        this.ui = ui;
    }

    addRecord() {
        const dnszone = $('input[name="dnszone"]').val();
        // fetch host name and check if it matches dnszone then replace with '@'
        const host = (() => {
            const h = $('#newDnsRecordHost').val()?.trim();
            return h === dnszone ? '@' : h;
        })();
        const ttl = $('#newDnsRecordTtl').val();
        const type = $('#newDnsRecordType').val();
        const address = $('#newDnsRecordAddress').val().replace(/"/g, '&quot;').replace(/'/g, '&#39;');
        const priority = $('#newDnsRecordPriority').val();
        const prioritySupportedTypes = $('input[name="prioritySupportedRecordType[]"]').map(function () {
            return $(this).val();
        }).get();

        if (!host.length) {
            $('#cnicModal .modal-title').text('Error');
            $('#cnicModal .modal-body').text("Host is required.");
            $('#cnicModal').modal('show');
            return;
        }

        if (!address.length) {
            $('#cnicModal .modal-title').text('Error');
            $('#cnicModal .modal-body').text('Address is required.');
            $('#cnicModal').modal('show');
            return;
        }

        const options = this.getDnsRecordOptions(type);

        const newRow = `
            <tr class="dns-record cnic-tr new-record">
                <td class="cnic-td">
                    <input type="hidden" name="dnsrecid[]" value="" />
                    <input type="text" name="dnsrecordhost[]" value="${host}" size="10" class="form-control" readonly />
                </td>
                <td class="cnic-td">
                    <input type="text" name="dnsrecordttl[]" value="${ttl}" size="6" class="form-control" readonly />
                </td>
                <td class="cnic-td">
                    <select name="dnsrecordtype[]" class="form-control record-type" disabled>
                        ${options}
                    </select>
                </td>
                <td class="cnic-td address-field" colspan="2">
                    <div class="address-priority-wrapper d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <input type="text" name="dnsrecordaddress[]" value="${address}" size="40" class="form-control cnicEllipsis" readonly />
                            ${prioritySupportedTypes.includes(type) ? `<input type="text" name="dnsrecordpriority[]" value="${priority}" size="2" class="form-control priority-input" placeholder="* Priority" readonly />` : '<input type="hidden" name="dnsrecordpriority[]" value="N/A" size="2" class="form-control priority-input" placeholder="* Priority" readonly />'}
                        </div>
                        <button type="button" class="btn btn-sm delete-record cnicDeleteBtn"><i class="fa fa-trash"></i></button>
                    </div>
                </td>
            </tr>
        `;
        const $newRow = $(newRow);
        $newRow.find('.record-type').selectize({
            create: false,
            sortField: 'text',
            dropdownParent: 'body',
            selectOnTab: true // Enable selection on Tab key
        });

        // Insert the new row in the correct position based on the record type and hostname values
        const rows = $('#dnsRecordsTableBody').find('.dns-record');
        let inserted = false;
        rows.each(function () {
            const currentType = $(this).find('select[name="dnsrecordtype[]"]').val();
            const currentHost = $(this).find('input[name="dnsrecordhost[]"]').val();
            if (type < currentType || (type === currentType && host < currentHost)) {
                $(this).before($newRow);
                inserted = true;
                return false; // Break the loop
            }
        });
        if (!inserted) {
            $('#dnsRecordsTableBody').append($newRow);
        }

        // Remove the empty record row if it exists
        $('.dns-record-empty').remove();

        this.ui.showPendingSave();
        this.clearInputFields();
    }

    deleteRecord(event) {
        $(event.currentTarget).closest('tr').remove();
        this.ui.showPendingSave();
    }

    getDnsRecordOptions(selectedType) {
        const selectizeInstance = $('#newDnsRecordType')[0].selectize;
        const options = selectizeInstance.options;
        return Object.keys(options).map(key => {
            const type = options[key].value;
            return `<option value="${type}" ${type === selectedType ? 'selected' : ''}>${type}</option>`;
        }).join('');
    }

    clearInputFields() {
        $('#newDnsRecordHost').val('');
        $('#newDnsRecordTtl').val('');
        $('#newDnsRecordAddress').val('');
        if ($('#newDnsRecordType').val() !== 'MX') {
            $('#newDnsRecordPriority').val('N/A').attr('type', 'hidden');
        } else {
            $('#newDnsRecordPriority').val('');
        }
    }
}