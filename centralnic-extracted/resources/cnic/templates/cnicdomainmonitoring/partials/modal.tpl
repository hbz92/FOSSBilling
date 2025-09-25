<!-- Domain Fix Modal -->
<div class="modal fade" id="domainFixModal" tabindex="-1" role="dialog" aria-labelledby="domainModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title col-md-3" id="cnicDomainModalLabel">Fix Domain Issues</h5>
                <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="successMsgModal" aria-live="polite"></div>
                <div class="alert alert-danger" id="errorMsgModal" role="alert" style="display: none;"
                    aria-live="assertive"></div>
                <div class="text-center" id="modalSpinner" style="display: none;">
                    <i class="fas fa-spinner fa-spin"></i>
                    <p>Loading...</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-submit">Confirm</button>
            </div>
        </div>
    </div>
</div>