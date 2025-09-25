{*
 * Delete Confirmation Modal Template
 * Modal for confirming DNS zone deletion
 *}

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">
                    <i class="fas fa-exclamation-triangle text-danger"></i> Confirm DNS Zone Deletion
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning">
                    <i class="fas fa-warning"></i>
                    <strong>Warning:</strong> This action cannot be undone.
                </div>
                
                <p>Are you sure you want to delete the DNS zone <strong id="deleteZoneName"></strong>?</p>
                
                <div class="form-group">
                    <label>
                        <input type="checkbox" id="confirmDelete" /> 
                        I understand that this will permanently delete the DNS zone and all its records
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteButton" disabled>
                    <i class="fas fa-trash"></i> Delete Zone
                </button>
            </div>
        </div>
    </div>
</div>
