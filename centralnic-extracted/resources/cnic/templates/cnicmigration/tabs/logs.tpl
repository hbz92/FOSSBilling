<h1>Logs</h1>

<table id="tbl-logs" class="datatable stripe hover" width="100%" border="0" cellspacing="2" cellpadding="3" data-order='[[ 5, "desc" ]]'>
  <thead>
    <tr>
      <th>Domain</th>
      <th>Losing Registrar</th>
      <th>Gaining Registrar</th>
      <th>Status</th>
      <th>Message</th>
      <th>Timestamp</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>

<div id="btn-logs">
  <button class="btn btn-default" id="btn-refresh-logs"><i class="fas fa-sync"></i> Reload</button>
</div>

<script>
  let tblLogs
  $(document).ready(function() {
    tblLogs = $('#tbl-logs').DataTable({
      pageLength: 25,
      lengthMenu: [[10, 25, 50, 75, 100, -1], [10, 25, 50, 75, 100, 'All']],
      stateSave: true,
      serverSide: true,
      deferRender: true,
      processing: true,
      searching: true,
      ajax: {
        url: '{$modulelink}&page=service&action=get-logs',
        type: 'POST',
        error: function(xhr) {
          ShowErrorMessage(xhr.responseJSON.error);
        }
      },
      columns: [
        {
          name: 'domain',
          data: 'domain'
        },
        {
          name: 'registrar_from',
          data: 'registrar_from'
        },
        {
          name: 'registrar_to',
          data: 'registrar_to'
        },
        {
          name: 'status',
          data: 'status',
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
            return '';
          }
        },
        {
          name: 'message',
          data: 'message'
        },
        {
          name: 'created_at',
          data: 'created_at'
        }
      ],
      dom: 'Blfrtip',
      buttons: [
        {
          extend: 'csv',
          exportOptions: {
            columns: [ 0, 1, 2, 3, 4, 5 ]
          }
        },
        {
          extend: 'excel',
          exportOptions: {
            columns: [ 0, 1, 2, 3, 4, 5 ]
          }
        },
        {
          extend: 'print',
          exportOptions: {
            columns: [ 0, 1, 2, 3, 4, 5 ]
          }
        }
      ]
    });

    tblLogs.buttons().container().appendTo( $('#btn-logs') );

    $('#btn-refresh-logs').click(function() {
      tblLogs.ajax.reload();
    });
  });
</script>
