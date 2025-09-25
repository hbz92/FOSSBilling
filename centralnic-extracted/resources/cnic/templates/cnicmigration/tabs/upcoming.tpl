<h1>Upcoming migrations</h1>

<table id="tbl-upcoming" class="datatable stripe hover" width="100%" border="0" cellspacing="2" cellpadding="3" data-order='[[ 4, "asc" ]]'>
    <thead>
    <tr>
        <th>Domain</th>
        <th>Client Name</th>
        <th>Losing Registrar</th>
        <th data-orderable="false" data-searchable="false">Gaining Registrar</th>
        <th>Expiration Date</th>
        <th>Status</th>
        <th>Migration</th>
        <th data-orderable="false" data-searchable="false">Action</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<button class="btn btn-default" id="btn-refresh-upcoming"><i class="fas fa-sync"></i> Reload</button>
<button class="btn btn-primary" id="btn-migrate-free" data-toggle="modal" data-target="#migrate-modal1"><i class="fas fa-truck"></i> Bulk Migration Wizard</button>

{include file="modals/migrate.tpl"}

<script>
    let tblUpcoming;
    {literal}
    $(document).ready(function() {
        tblUpcoming = $('#tbl-upcoming').DataTable({
            pageLength: 25,
            lengthMenu: [[10, 25, 50, 75, 100], [10, 25, 50, 75, 100]],
            stateSave: true,
            serverSide: true,
            deferRender: true,
            processing: true,
            searching: true,
            ajax: {
                url: `${modulelink}&page=service&action=get-upcoming-domains`,
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
                    searchable: false,
                    render: function(data, type, row) {
                        return '<a href="clientssummary.php?userid=' + row.clientid + '">' + data + '</a>';
                    }
                },
                {
                    name: 'registrar',
                    data: 'registrar',
                    searchable: false
                },
                {
                    data: 'registrarto',
                    searchable: false
                },
                {
                    name: 'd.expirydate',
                    data: 'expirydate',
                    searchable: false
                },
                {
                    name: 'd.status',
                    data: 'domain_status',
                    searchable: false,
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
                            } else if (data.startsWith('FREE')) {
                                status = 'info';
                            }
                            return '<span class="label label-' + status + '">' + data + '</span>';
                        }
                        return '<span class="label label-default">UPCOMING</span>';
                    }
                },
                {
                    name: 'd.id',
                    data: 'id',
                    render: function(data, type, row) {
                        return '<div class="btn-group" role="group" aria-label="...">'
                            + '<button type="button" class="btn btn-sm btn-default renew-domain" data-id="' + data + '" data-domain="' + row.domain + '" data-registrar="' + row.registrar + '"><i class="fas fa-sync"></i> Renew</button>'
                            + '<button type="button" class="btn btn-sm btn-primary migrate-domain" data-id="' + data + '"data-domain="' + row.domain + '" data-registrar="' + row.registrarto + '"><i class="fas fa-exchange-alt"></i> Migrate</button>'
                            + '<button type="button" class="btn btn-sm btn-info support-domain" data-id="' + data + '" data-domain="' + row.domain + '" data-toggle="modal" data-target="#support-modal"><i class="fas fa-life-ring"></i> Support</button>'
                            + '</div>';
                    }
                }
            ]
        });

        $('#btn-refresh-upcoming').click(function() {
            tblUpcoming.ajax.reload();
        });

        $('#tbl-upcoming').on('click', '.renew-domain', function() {
            let domainId = $(this).data('id');
            let domain = $(this).data('domain');
            let registrar = $(this).data('registrar');
            if (!confirm(`Are you sure you want to renew ${domain} with ${registrar}?`)) {
                return;
            }

            $(this).children('i').removeClass('fa-sync').addClass('fa-spinner fa-spin');
            $(this).prop('disabled', true);
            $.post(`${modulelink}&page=service&action=renew-domain`, {
                id: domainId
            }).done(function(data) {
                if (data !== null && data.result === 'success') {
                    ShowSuccessMessage(`Domain ${domain} renewed with ${registrar}`);
                } else {
                    let msg = `Domain ${domain} failed to renew with ${registrar}`
                    if (data !== null) {
                        msg += `: ${data.error}`
                    }
                    ShowErrorMessage(msg);
                }
            }).fail(function(response) {
                ShowErrorMessage(response.responseText);
            }).always(function() {
                tblUpcoming.ajax.reload();
                tblLogs.ajax.reload();
            });
        });

        $('#tbl-upcoming').on('click', '.migrate-domain', function() {
            let domainId = $(this).data('id');
            let domain = $(this).data('domain');
            let registrar = $(this).data('registrar');
            if (!confirm(`Are you sure you want to migrate ${domain} to ${registrar}?`)) {
                return;
            }

            $(this).children('i').removeClass('fa-life-ring').addClass('fa-spinner fa-spin');
            $(this).prop('disabled', true);
            $.post(`${modulelink}&page=service&action=migrate-domain`, {
                id: domainId
            }).done(function(data) {
                if (data !== null) {
                    if (data.success) {
                        ShowSuccessMessage(`Domain ${domain} migration to ${registrar} initiated: ${data.message}`);
                    } else {
                        ShowErrorMessage(`Domain ${domain} failed to migrate to ${registrar}: ${data.message}`);
                    }
                } else {
                    ShowErrorMessage(`Domain ${domain} failed to migrate to ${registrar}.`);
                }
            }).fail(function(response) {
                ShowErrorMessage(response.responseText);
            }).always(function() {
                tblUpcoming.ajax.reload();
                tblLogs.ajax.reload();
            });
        });
    });
    {/literal}
</script>
