<div class="alert alert-info">
    {$lang.bulkInfo}
</div>

<table id="tbl-domains" class="datatable stripe hover" width="100%" border="0" cellspacing="2" cellpadding="3">
    <thead>
    <tr>
        <th data-searchable="false" data-orderable="false"></th>
        <th>{AdminLang::trans('fields.domain')}</th>
        <th>{AdminLang::trans('fields.client')}</th>
        <th>{AdminLang::trans('fields.regdate')}</th>
        <th>{AdminLang::trans('fields.expirydate')}</th>
        <th>{AdminLang::trans('fields.registrar')}</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<button type="button" class="btn btn-default" id="btn-domains">
    <i class="fas fa-sync"></i> {AdminLang::trans('global.refresh')}
</button>
<button type="button" class="btn btn-primary" id="btn-bulk" data-toggle="modal" data-target="#apply-modal">
    <i class="fas fa-play-circle"></i> {AdminLang::trans('global.apply')}
</button>

<script>
    let tblDomains;
    $(document).ready(function() {
        tblDomains = $('#tbl-domains').DataTable({
            pageLength: 10,
            lengthMenu: [[10, 25, 50, 75, 100], [10, 25, 50, 75, 100]],
            stateSave: false,
            serverSide: false,
            deferRender: true,
            processing: true,
            searching: true,
            ajax: {
                url: '{$modulelink}&page=service&action=getDomains',
                type: 'GET',
                error: function(xhr) {
                    ShowErrorMessage(xhr.responseJSON.error);
                }
            },
            columns: [
                {
                    render: function(data, type, row) {
                        return '<input type="checkbox" class="bulk-select" data-domain="' + row.domain + '" />';
                    }
                },
                {
                    data: 'domain',
                    render: function(data, type, row) {
                        return '<a href="clientsdomains.php?userid=' + row.client_id + '&id=' + row.domain_id + '">' + data + '</a>';
                    }
                },
                {
                    data: 'client_id',
                    render: function(data, type, row) {
                        let html = '<a href="clientssummary.php?userid=' + data + '">';
                        if (row.companyname) {
                            html += row.companyname;
                        } else {
                            html += row.firstname + ' ' + row.lastname;
                        }
                        html += '</a>';
                        return html;
                    }
                },
                { data: 'registrationdate' },
                { data: 'expirydate' },
                { data: 'registrar' }
            ]
        });

        $('#btn-domains').click(function() {
            tblDomains.ajax.reload();
        });
    });
</script>
