$(document).ready(function () {
    tblEpp = $('#tbl-epp').DataTable({
        pageLength: 25,
        lengthMenu: [
            [10, 25, 50, 75, 100],
            [10, 25, 50, 75, 100],
        ],
        stateSave: true,
        serverSide: true,
        deferRender: true,
        processing: true,
        searching: true,
        ajax: {
            url: modulelink + '&page=service&action=get-epp-codes',
            type: 'POST',
            error: function (xhr) {
                ShowErrorMessage(xhr.responseJSON.error);
            },
        },
        columns: [
            {
                name: 'domain',
                data: 'domain',
        },
            {
                name: 'eppcode',
                data: 'eppcode',
                render: function (data, type, row) {
                    return $('<div/>').text(data).html();
                },
        },
            {
                name: 'id',
                data: 'id',
                render: function (data, type, row) {
                    return (
                        '<button type="button" class="btn btn-danger btn-xs remove-epp" data-id="' +
                        data +
                        '" data-domain="' +
                        row.domain +
                        '"><i class="fas fa-trash"></i> Remove</button>'
                    );
                },
        },
        ],
    });

    $('#btn-refresh-epp').click(function () {
        tblEpp.ajax.reload();
    });

    $('#frm-add-epp').submit(function (event) {
        event.preventDefault();
        let domain = $("input[name='domain']").val();
        $.post(modulelink + '&page=service', {
            action: 'add-epp',
            domain: domain,
            eppcode: $("input[name='eppcode']").val(),
        })
            .done(function (data) {
                if (data.status === "error") {
                    ShowErrorMessage(data.msg);
                } else if (data.status === "success") {
                    ShowSuccessMessage(data.msg);
                    tblEpp.ajax.reload();
                }
            })
            .fail(function (response) {
                ShowErrorMessage(response.responseText);
            });
    });

    $('#tbl-epp').on('click', '.remove-epp', function () {
        let eppId = $(this).data('id');
        let domain = $(this).data('domain');
        if (
            !confirm(
                'Are you sure you want to remove the EPP code for ' + domain + '?',
            )
        ) {
            return;
        }

        $.post(modulelink + '&page=service', {
            action: 'remove-epp',
            id: eppId,
        })
            .done(function (data) {
                ShowSuccessMessage('EPP code for ' + domain + ' removed');
                tblEpp.ajax.reload();
            })
            .fail(function (response) {
                ShowErrorMessage(response.responseText);
            });
    });
});

function ShowInfoMessage(title, message)
{
    $('#info-title').html(title);
    $('#info-message').html(message);
    $('#info-alert').show();
}

function ShowSuccessMessage(message)
{
    $('#error-message').html('');
    $('#success-message').html('');
    $('#error-alert').hide();
    $('#success-message').html(message);
    $('#success-alert').show();
}

function ShowErrorMessage(message, success = false)
{
    if (!success) {
        $('#success-message').html('');
        $('#success-alert').hide();
    }
    $('#error-message').html(message);
    $('#error-alert').show();
}
