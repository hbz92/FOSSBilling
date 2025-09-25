<!-- Step 3: Sync Results -->
<div id="step3" class="cnic-step sync-results-step">
    <!-- Progress Steps -->
    {include file="sync/includes/progress-steps.tpl" currentStep=3 completedSteps=[1,2]}
    
    <!-- Enhanced Results Panel -->
    <div class="panel panel-modern">
        <div class="panel-heading">
            <h4 class="panel-title">
                <div class="cnic-icon-wrapper green">
                    <i class="fa fa-list-alt"></i>
                </div>
                Synchronization Results
                <div class="panel-badge">
                    Step 3
                </div>
            </h4>
        </div>
        <div class="panel-body">
            <!-- Modern Progress Indicator -->
            <div id="syncProgress" class="sync-progress-container">
                <div class="row cnic-align-items-center">
                    <div class="col-md-8">
                        <div class="sync-progress-content">
                            <div class="loading-spinner">
                                <i class="fa fa-sync fa-spin"></i>
                            </div>
                            <div class="sync-progress-text">
                                <strong class="progress-title">Syncing in progress...</strong> 
                                <div id="progressText" class="progress-details">Starting domain synchronization...</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-right">
                        <button type="button" class="btn btn-warning btn-sm hover-lift-modern cancel-sync-btn" id="cancelSyncBtn">
                            <i class="fa fa-stop"></i> Cancel Sync
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Sync Domain Data Table -->
            <div class="cnic-dt-container">
                <!-- DataTable Header Controls -->
                <div class="cnic-dt-header">
                    <div class="cnic-dt-header-left">
                        <div class="cnic-dt-length">
                            <label>
                                Show
                                <select id="entriesPerPage">
                                    <option value="10">10</option>
                                    <option value="15" selected>15</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                </select>
                                entries
                            </label>
                        </div>
                    </div>
                    <div class="cnic-dt-header-right">
                        <div class="cnic-dt-search">
                            <input type="text" id="tableSearch" placeholder="Search domains..." />
                        </div>
                    </div>
                </div>

                <!-- DataTable with Loading Overlay -->
                <div style="position: relative;">
                    <div class="results-table-wrapper">
                        <table id='domainTable' class='cnic-dt-table modern-results-table'>
                            <thead class="results-table-header">
                                <tr>
                                    <th class="cnic-dt-column-sortable"><i class="fa fa-globe"></i> Domain Name</th>
                                    <th class="cnic-dt-column-sortable cnic-dt-column-status"><i class="fa fa-check-circle"></i> Status</th>
                                    <th class="cnic-dt-column-sortable cnic-dt-column-date"><i class="fa fa-calendar-times"></i> Old Expiry</th>
                                    <th class="cnic-dt-column-sortable cnic-dt-column-date"><i class="fa fa-calendar-check"></i> New Expiry</th>
                                    <th class="cnic-dt-column-sortable cnic-dt-column-date"><i class="fa fa-clock"></i> Next Due Date</th>
                                    <th class="cnic-dt-column-date"><i class="fa fa-file-invoice"></i> Invoice Date</th>
                                </tr>
                            </thead>
                            <tbody id='domainResults'>
                                <!-- Dynamic rows will be inserted here -->
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Loading indicator overlaying the table -->
                    <div id="tableLoadingIndicator" class="cnic-dt-loading hidden">
                        <div class="cnic-dt-loading-content">
                            <i class="fas fa-spinner fa-spin fa-2x"></i>
                            <p>Loading sync results...</p>
                        </div>
                    </div>
                </div>

                <!-- DataTable Footer Controls -->
                <div class="cnic-dt-footer">
                    <div class="cnic-dt-info" id="tableInfo">
                        Showing 0 to 0 of 0 entries
                    </div>
                    <ul class="cnic-dt-pagination" id="tablePagination">
                        <li class="previous disabled">
                            <a href="#" data-page="prev">Previous</a>
                        </li>
                        <li class="current">
                            <a href="#" data-page="1">1</a>
                        </li>
                        <li class="next disabled">
                            <a href="#" data-page="next">Next</a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Action Buttons -->
            <div class="cnic-form-actions">
                <button type="button" class="btn btn-gradient-primary btn-lg hover-lift-modern" id="startOverBtn">
                    <i class="fa fa-redo" style="margin-right: 10px;"></i>
                    Start New Sync
                </button>
                <div class="cnic-help-info">
                    <i class="fa fa-info-circle"></i>
                    <span>Return to the first step to configure a new synchronization.</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Step 3 -->
