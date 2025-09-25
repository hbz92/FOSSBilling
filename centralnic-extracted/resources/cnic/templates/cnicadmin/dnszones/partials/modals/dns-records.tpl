{*
 * DNS Records Modal Template
 * Modal for viewing DNS zone records
 *}

<!-- DNS Records Modal -->
<div class="modal fade" id="dnsRecordsModal" tabindex="-1" role="dialog" aria-labelledby="dnsRecordsModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dnsRecordsModalLabel">
                    <i class="fas fa-list"></i> DNS Records for <span id="zoneName"></span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="recordsLoadingIndicator" class="text-center" style="padding: 20px;">
                    <i class="fas fa-spinner fa-spin fa-2x"></i>
                    <p>Loading DNS records...</p>
                </div>
                
                <div id="recordsContent" style="display: none;">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Value</th>
                                    <th>TTL</th>
                                    <th>Priority</th>
                                </tr>
                            </thead>
                            <tbody id="recordsTableBody">
                                <!-- Dynamic content will be loaded here -->
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div id="recordsError" class="alert alert-danger" style="display: none;">
                    <i class="fas fa-exclamation-triangle"></i>
                    Failed to load DNS records. Please try again.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
