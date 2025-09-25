<h1>Migration Mapping Configuration</h1>

<form action="{$modulelink}#mappings" method="post" id="frm-add-mapping">
  <table class="form" width="100%" cellspacing="2" cellpadding="3" border="0">
    <tbody>
      <tr>
        <td class="fieldlabel" width="15%">Losing Registrar</td>
        <td class="fieldarea">
          {include file="includes/select_registrar.tpl" registrars=$registrars cnic=false field="registrarfrom"}
        </td>
        <td class="fieldlabel" width="15%">Email Template Selection</td>
        <td class="fieldarea">
          {include file="includes/select_email.tpl"}
        </td>
      </tr>
      <tr>
        <td class="fieldlabel" width="15%">Gaining Registrar</td>
        <td class="fieldarea">
          {include file="includes/select_registrar.tpl" registrars=$registrars cnic=true field="registrarto"}
        </td>
        <td class="fieldlabel" width="15%">EPP</td>
        <td class="fieldarea">
          <label class="checkbox-inline">
            <input type="checkbox" name="epp" value="1" checked />
            Request Auth Codes automatically
          </label>
        </td>
      </tr>
      <tr>
        <td class="fieldlabel" width="15%">TLD Selection</td>
        <td class="fieldarea">
          {include file="includes/select_tld.tpl"}
        </td>
        <td class="fieldlabel" width="15%">Active</td>
        <td class="fieldarea">
          <label class="checkbox-inline">
            <input type="checkbox" name="active" value="1" />
            Activate Mapping
          </label>
        </td>
      </tr>
    </tbody>
  </table>

  <div class="btn-container">
    <button type="submit" class="btn btn-default">Add Mapping</button>
  </div>
</form>

<table id="tbl-mappings" class="datatable stripe hover" width="100%" border="0" cellspacing="2" cellpadding="3"
  data-order='[[ 0, "desc" ]]'>
  <thead>
    <tr>
      <th>Losing Registrar</th>
      <th>Gaining Registrar</th>
      <th>TLD</th>
      <th>EPP</th>
      <th>Email Template</th>
      <th>Active</th>
      <th data-orderable="false" data-searchable="false">Action</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>

<button class="btn btn-default" id="btn-refresh-mappings"><i class="fas fa-sync"></i> Reload</button>

<script>
  let tblMappings;
  $(document).ready(function() {
    tblMappings = $('#tbl-mappings').DataTable({
      pageLength: 25,
      lengthMenu: [
        [10, 25, 50, 75, 100],
        [10, 25, 50, 75, 100]
      ],
      stateSave: true,
      serverSide: false,
      deferRender: true,
      processing: true,
      searching: true,
      ajax: {
        url: '{$modulelink}&page=service&action=get-mappings',
        dataSrc: '',
        type: 'POST',
        error: function(xhr) {
          ShowErrorMessage(xhr.responseJSON.error);
        }
      },
      columns: [{
          name: 'registrarfromlabel',
          data: 'registrarfromlabel'
        },
        {
          name: 'registrartolabel',
          data: 'registrartolabel'
        },
        {
          name: 'tld',
          data: 'tld'
        },
        {
          name: 'epp',
          data: 'epp',
          render: function(data, type, row) {
            if (data) {
              return '<input type="checkbox" class="toggle-mapping-epp" data-id="' + row.id + '" checked/>';
            }
            return '<input type="checkbox" class="toggle-mapping-epp" data-id="' + row.id + '"/>';
          }
        },
        {
          name: 'emailtemplatename',
          data: 'emailtemplatename',
          render: function(data, type, row) {
            let html = '<select class="form-control select-template" data-id="' + row.id + '">';
            if (row.email === 0) {
              html += '<option value="0" selected>None</option>';
            } else {
              html += '<option value="0">None</option>';
            }
            {foreach from=$templates key=id item=name}
            if (row.email === {$id}) {
              html += '<option value="{$id}" selected>{$name}</option>';
            } else {
              html += '<option value="{$id}">{$name}</option>';
            }
            {/foreach}
            html += '<option value="new">*Generate new*</option>';
            html += '</select>';
            return html;
          }
        },
        {
          name: 'active',
          data: 'active',
          render: function(data, type, row) {
            if (data) {
              return '<input type="checkbox" class="toggle-mapping-active" data-id="' + row.id + '" checked/>';
            }
            return '<input type="checkbox" class="toggle-mapping-active" data-id="' + row.id + '"/>';
          }
        },
        {
          name: 'id',
          data: 'id',
          render: function(data, type, row) {
            let actions = '';
            if (row.emailtemplatename) {
              actions +=
              '<a href="configemailtemplates.php?action=edit&id=' + row.email + '" class="btn btn-default btn-xs">' +
              '<i class="fas fa-envelope-open-text"></i> Edit Email</a>';
            }
            actions += '<button type="button" class="btn btn-danger btn-xs remove-mapping" data-id="' + data +
                    '"><i class="fas fa-trash"></i> Remove</button>';
            return actions;
          }
        }
      ]
    });

    $('#btn-refresh-mappings').click(function() {
      tblMappings.ajax.reload();
    });

    $("#frm-add-mapping").submit(function(event) {
      event.preventDefault();
      let complete = true;
      $("select").parent().removeClass("has-error");
      $("#frm-add-mapping").serializeArray().forEach(row => {
        if (/^(tld|registrar(from|to)|email)$/.test(row.name) && row.value === "") {
          $("select[name='" + row.name + "']").parent().addClass("has-error");
          complete = false;
        }
      });
      if ($("select[name='registrarfrom']").val() === $("select[name='registrarto']").val()) {
        $("select[name='registrarfrom']").parent().addClass("has-error");
        $("select[name='registrarto']").parent().addClass("has-error");
        complete = false;
      }
      if (!complete) {
        ShowErrorMessage("Invalid form data");
      } else {
        $.post('{$modulelink}&page=service', {
          action: 'add-mapping',
          registrarfrom: $("select[name='registrarfrom']").val(),
          registrarto: $("select[name='registrarto']").val(),
          tld: $("select[name='tld']").val(),
          active: $("input[name='active']").is(':checked'),
          epp: $("input[name='epp']").is(':checked'),
          email: $("select[name='email']").val()
        }).done(function(data) {
          if (data['error']) {
            ShowErrorMessage('Failed to add mapping');
          } else {
            ShowSuccessMessage('Mapping added');
            location.reload();
          }
        }).fail(function(response) {
          ShowErrorMessage(response.responseText);
        });
      }
    });

    $('#tbl-mappings').on('click', '.remove-mapping', function() {
      let mappingId = $(this).data('id');
      if (!confirm('Are you sure you want to remove the mapping?')) {
        return;
      }

      $.post('{$modulelink}&page=service', {
        action: 'remove-mapping',
        id: mappingId
      }).done(function(data) {
        ShowSuccessMessage('Mapping removed');
        tblMappings.ajax.reload();
        tblUpcoming.ajax.reload();
      }).fail(function(response) {
        ShowErrorMessage(response.responseText);
      });
    });

    $('#tbl-mappings').on('click', '.toggle-mapping-active', function() {
      let active = $(this).is(':checked');
      $.post('{$modulelink}&page=service', {
        action: 'toggle-mapping-active',
        id: $(this).data('id'),
        active: active
      }).done(function(data) {
        if (active) {
          ShowSuccessMessage('Mapping enabled');
        } else {
          ShowSuccessMessage('Mapping disabled');
        }
        tblMappings.ajax.reload();
        tblUpcoming.ajax.reload();
      }).fail(function(response) {
        ShowErrorMessage(response.responseText);
      });
    });

    $('#tbl-mappings').on('click', '.toggle-mapping-epp', function() {
      let active = $(this).is(':checked');
      $.post('{$modulelink}&page=service', {
        action: 'toggle-mapping-epp',
        id: $(this).data('id'),
        epp: active
      }).done(function(data) {
        if (active) {
          ShowSuccessMessage('EPP enabled');
        } else {
          ShowSuccessMessage('EPP disabled');
        }
        tblMappings.ajax.reload();
      }).fail(function(response) {
        ShowErrorMessage(response.responseText);
      });
    });

    $('#tbl-mappings').on('change', '.select-template', function() {
      let selected = $(this).find(":selected").val();
      $.post('{$modulelink}&page=service', {
        action: 'switch-template',
        id: $(this).data('id'),
        email: selected
      }).done(function(data) {
        ShowSuccessMessage('Template switched');
        location.reload();
      }).fail(function(response) {
        ShowErrorMessage(response.responseText);
      });
    });
  });
</script>