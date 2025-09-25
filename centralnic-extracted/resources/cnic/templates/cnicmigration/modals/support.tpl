
<div class="modal fade" id="support-modal" tabindex="-1" role="dialog" aria-labelledby="support-modal-label">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="support-modal-label">Support</h4>
            </div>
            <div class="modal-body" id="support-modal-body">
                <div class="form-group">
                    <label for="support-message">Message</label>
                    <textarea class="form-control" id="support-message" name="message" cols="60" rows="10"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-support"><i class="fas fa-share" id="submit-icon"></i> Submit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="far fa-times-circle"></i> Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    {literal}
    $(document).ready(function() {
        let domainId = 0;

        $('#support-modal').on('show.bs.modal', function (event) {
            domainId = $(event.relatedTarget).data('id');
            let domainName = $(event.relatedTarget).data('domain');
            $('#support-modal .modal-title').html(`Support for ${domainName}`);
        }).on('hide.bs.modal', function () {
            domainId = 0;
            $('#support-modal .modal-title').html('Support');
            $('#support-message').val('');
        });

        $('#btn-support').click(function() {
            $('#btn-support').prop('disabled', true);
            $('#submit-icon').removeClass('fa-share').addClass('fa-spinner fa-spin');
            $.post(`${modulelink}&page=service&action=support-domain`, {
                id: domainId,
                message: $('#support-message').val()
            }).done(function(data) {
                if (data !== null && data.success) {
                    ShowSuccessMessage('Support request sent successfully');
                } else {
                    let msg = 'Failed to send support request';
                    if (data !== null) {
                        msg += `: ${data.message}`;
                    }
                    ShowErrorMessage(msg);
                }
            }).fail(function(response) {
                ShowErrorMessage(response.responseText);
            }).always(function() {
                $('#btn-support').prop('disabled', false);
                $('#submit-icon').removeClass('fa-spinner fa-spin').addClass('fa-share');
                $('#support-modal').modal('hide');
            });
        });
    });
    {/literal}
</script>
