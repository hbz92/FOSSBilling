<!-- Event Details Modal -->
<div class="modal fade" id="eventDetailsModal" tabindex="-1" role="dialog" aria-labelledby="eventDetailsModalLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header cnic-modal-header">
                <h4 class="modal-title cnic-modal-title" id="eventDetailsModalLabel">
                    <div class="cnic-modal-icon">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    Event Details
                </h4>
                <button type="button" class="close cnic-modal-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body cnic-modal-body" id="eventDetailsBody">
                {include file="event-list/partials/loading-details.tpl"}
            </div>
            <div class="modal-footer cnic-modal-footer">
                <button type="button" class="btn btn-default hover-lift-modern cnic-modal-close-btn" data-dismiss="modal">
                    <i class="fas fa-times" style="margin-right: 8px;"></i>Close
                </button>
            </div>
        </div>
    </div>
</div>
