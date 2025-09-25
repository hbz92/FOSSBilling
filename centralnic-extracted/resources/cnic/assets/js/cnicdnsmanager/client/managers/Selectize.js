export class Selectize {
    initNewDnsRecordTypeSelectize() {
        $('#newDnsRecordType').selectize({
            create: false,
            sortField: 'text',
            dropdownParent: 'body',
            selectOnTab: true // Enable selection on Tab key
        });
    }

    initSelectize() {
        $('#dnsRecordsTableBody').find('.record-type').selectize({
            create: false,
            sortField: 'text',
            dropdownParent: 'body',
            selectOnTab: true
        });
    }
}