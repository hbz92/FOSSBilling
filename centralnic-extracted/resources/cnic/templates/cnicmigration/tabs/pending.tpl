<h1>Pending migrations</h1>

<table id="tbl-pending" class="datatable stripe hover" width="100%" border="0" cellspacing="2" cellpadding="3" data-order='[[ 3, "asc" ]]'>
    <thead>
    <tr>
        <th>Domain</th>
        <th>Client Name</th>
        <th>Registrar</th>
        <th>Expiration Date</th>
        <th>Status</th>
        <th>Migration</th>
        <th data-orderable="false" data-searchable="false">Action</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<button class="btn btn-default" id="btn-refresh-pending"><i class="fas fa-sync"></i> Reload</button>

<script>
    let tblPending;
    {literal}
    $(document).ready(function() {
        tblPending = $('#tbl-pending').DataTable({
            pageLength: 25,
            lengthMenu: [[10, 25, 50, 75, 100], [10, 25, 50, 75, 100]],
            stateSave: true,
            serverSide: true,
            deferRender: true,
            processing: true,
            searching: true,
            ajax: {
                url: `${modulelink}&page=service&action=get-pending-domains`,
                type: 'POST',
                error: function(xhr) {
                    ShowErrorMessage(xhr.responseJSON.error);
                }
            },
            columns: [
                {
                    name: 'd.domain',
                    data: 'domain',
                    render: function(data, type, row) {
                        return '<a href="clientsdomains.php?id=' + row.id + '">' + data + '</a>';
                    }
                },
                {
                    name: 'c.lastname,c.firstname,c.companyname',
                    data: 'client',
                    render: function(data, type, row) {
                        return '<a href="clientssummary.php?userid=' + row.clientid + '">' + data + '</a>';
                    }
                },
                {
                    name: 'registrar',
                    data: 'registrar'
                },
                {
                    name: 'd.expirydate',
                    data: 'expirydate'
                },
                {
                    name: 'd.status',
                    data: 'domain_status',
                    render: function(data, type, row) {
                        return '<span class="label ' + data.toLowerCase() + '">' + data + '</span>';
                    }
                },
                {
                    name: 'l.status',
                    data: 'migration_status',
                    render: function(data, type, row) {
                        if (data !== null) {
                            let status = 'default';
                            if (data.startsWith('ERROR')) {
                                status = 'danger';
                            } else if (data.startsWith('SKIP')) {
                                status = 'info'
                            } else if (data.startsWith('INIT')) {
                                status = 'success';
                            }
                            return '<span class="label label-' + status + '">' + data + '</span>';
                        }
                        return '<span class="label label-default">PENDING</span>';
                    }
                },
                {
                    name: 'd.id',
                    data: 'id',
                    render: function(data, type, row) {
                        return '<div class="btn-group" role="group" aria-label="...">'
                            + '<button type="button" class="btn btn-sm btn-info support-domain" data-id="' + data + '" data-domain="' + row.domain + '" data-toggle="modal" data-target="#support-modal"><i class="fas fa-life-ring"></i> Support</button>'
                            + '</div>';
                    }
                }
            ]
        });

        $('#btn-refresh-pending').click(function() {
            tblPending.ajax.reload();
        });
    });
    {/literal}
</script>
