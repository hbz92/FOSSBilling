<div class="modal fade" id="apply-modal" tabindex="-1" role="dialog" aria-labelledby="apply-modal-label">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="{AdminLang::trans('global.close')}"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="apply-modal-label"><span id="apply-modal-title"></span> {$lang.bulkApply}
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissible" id="apply-alert-error" role="alert">
                            <button type="button" class="close" data-hide="alert"
                                aria-label="{AdminLang::trans('global.close')}"><span
                                    aria-hidden="true">&times;</span></button>
                            <i class="fas fa-times-circle"></i> <strong>{AdminLang::trans('global.error')}</strong>:
                            <span id="apply-error"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-1 form-group">
                        <label for="apply-template">{AdminLang::trans('fields.template')}</label>
                        <select name="apply-template" id="apply-template" class="form-control">
                            {foreach $templates as $template}
                                <option value="{$template->id}">{$template->name}</option>
                            {/foreach}
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-1 form-group">
                        <label>{AdminLang::trans('fields.options')}</label>
                        <br />
                        <input class="form-check-input" type="checkbox" value="" id="enforce-nameservers" name="enforce-nameservers"{if $enforceNameservers} checked{/if}>
                        <label class="form-check-label" for="enforce-nameservers">
                            Enforce nameservers
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-1 form-group">
                        <label for="apply-log">{AdminLang::trans('clientsummary.log')}</label>
                        <textarea name="apply-log" id="apply-log" rows="8" class="form-control" readonly>...</textarea>
                    </div>
                </div>
                <div class="alert alert-info" role="alert">
                    <i class="fas fa-info-circle"></i> {$lang.bulkErrors}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-apply">
                    <i class="fas fa-play-circle" id="apply-icon"></i> {AdminLang::trans('global.apply')}
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    <i class="fas fa-times-circle"></i> {AdminLang::trans('global.close')}
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        let domains = [];

        $('#apply-modal').on('show.bs.modal', function(event) {
            resetForm();
        }).on('hide.bs.modal', function() {
            resetForm();
        });

        function resetForm() {
            domains = [];
            $('#apply-alert-error').hide();
            $('#apply-error').html('');
            $('#apply-alert-success').hide();
            $('#apply-success').html('');
            $('#apply-log').empty();
        }

        $('#btn-apply').click(function() {
            $('#apply-log').empty();
            $('#btn-apply').prop('disabled', true);
            $('#apply-icon').removeClass('fa-play-circle').addClass('fa-spinner fa-spin');

            $('input.bulk-select:checkbox:checked').each(function() {
                domains.push($(this).data('domain'));
            });

            applyTemplate(domains);
        });

        function applyTemplate(domains) {
            let log = $('#apply-log');
            let domain = domains.pop();
            if (!domain) {
                log.append('{AdminLang::trans('status.complete')}\n'.toUpperCase());
                $('#btn-apply').prop('disabled', false);
                $('#apply-icon').removeClass('fa-spinner fa-spin').addClass('fa-play-circle');
                return;
            }
            log.append('{$lang.bulkLog} ' + domain + ' ... ');

            $.ajax({
                url: '{$modulelink}&page=service',
                type: 'POST',
                dataType: 'json',
                data: {
                    action: 'applyTemplate',
                    templateId: $('#apply-template').val(),
                    enforceNs: $('#enforce-nameservers').is(':checked'),
                    domainName: domain
                }
            }).done(function(data) {
                if (data === true) {
                    log.append('{AdminLang::trans('global.success')}\n'.toUpperCase());
                } else {
                    log.append('{AdminLang::trans('global.error')}\n'.toUpperCase());
                }
            }).fail(function() {
                log.append('{AdminLang::trans('global.error')}\n'.toUpperCase());
            }).always(function() {
                log.scrollTop(log[0].scrollHeight - log.height());
                applyTemplate(domains);
            });
        }

        $('#apply-modal').on('show.bs.modal', function(event) {
            $.ajax({
                url: '{$modulelink}&page=service&action=getTemplates',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Clear existing options
                    $('#apply-template').empty();
                    // Check if 'data' key exists and is an array
                    if (response && response?.data && Array.isArray(response
                            .data)) {
                        // Iterate over each object in the array and append options
                        $.each(response.data, function(index, item) {
                            $('#apply-template').append($('<option>', {
                                value: item.id,
                                text: item.name
                            }));
                        });
                    } else {
                        console.error('Data structure is not as expected:',
                            response);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });
        });
    });
</script>
