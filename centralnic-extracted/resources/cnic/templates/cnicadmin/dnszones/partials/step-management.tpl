{*
 * DNS Zone Management Step Template
 * Step 2: Filter & Manage DNS Zones
 *}

<!-- Step 2: Filter & Management -->
<div id="step2" class="cnic-step" style="display: none;">
    {include file="dnszones/partials/progress-indicator.tpl" currentStep=2 step1Status="completed" step2Status="active"}

    <!-- DNS Zone Management Panel -->
    <div class="panel panel-modern">
        <div class="panel-heading cnic-panel-header">
            <h4 class="panel-title">
                <div class="cnic-icon-wrapper green">
                    <i class="fas fa-cog"></i>
                </div>
                Filter & Manage DNS Zones
                <div class="panel-badge">
                    Step 2
                </div>
            </h4>
        </div>
        <div class="panel-body cnic-card-body">
            <!-- Zone Statistics Panel -->
            <div id="zoneStats" class="margin-bottom-3">
                <h5 class="cnic-subsection-title">
                    <i class="fas fa-chart-bar"></i>
                    Discovery Results Analytics
                </h5>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="cnic-choice-card text-center" style="height:100px">
                            <div class="choice-content">
                                <div id="totalDnsZones" class="choice-title h5 text-primary" style="margin-bottom: 2px; font-weight: 600;">0</div>
                                <small class="text-muted" style="font-size: 10px; line-height: 1.2;">Total DNS Zones</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="cnic-choice-card text-center" style="height:100px">
                            <div class="choice-content">
                                <div id="totalExternalZones" class="choice-title h5 text-warning" style="margin-bottom: 2px; font-weight: 600;">0</div>
                                <small class="text-muted" style="font-size: 10px; line-height: 1.2;">External Zones</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="cnic-choice-card text-center" style="height:100px">
                            <div class="choice-content">
                                <div id="totalInternalZones" class="choice-title h5 text-success" style="margin-bottom: 2px; font-weight: 600;">0</div>
                                <small class="text-muted" style="font-size: 10px; line-height: 1.2;">Internal Zones</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="cnic-choice-card text-center" style="height:100px">
                            <div class="choice-content">
                                <div id="percentageExternal" class="choice-title h5 text-danger" style="margin-bottom: 2px; font-weight: 600;">0%</div>
                                <small class="text-muted" style="font-size: 10px; line-height: 1.2;">External Percentage</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DNS Zones Data Table -->
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
                            <input type="text" id="tableSearch" placeholder="Search DNS zones..." />
                        </div>
                    </div>
                </div>

                        <!-- DataTable with Loading Overlay -->
                        <div style="position: relative;">
                            <div class="results-table-wrapper">
                                <table id="dnsZonesTable" class="cnic-dt-table modern-results-table">
                                    <thead class="results-table-header">
                                        <tr>
                                            <th class="cnic-dt-column-sortable"><i class="fas fa-globe"></i> DNS Zone</th>
                                            <th class="cnic-dt-column-sortable cnic-dt-column-status"><i class="fas fa-tag"></i> Type</th>
                                            <th class="cnic-dt-column-actions"><i class="fas fa-cog"></i> Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dnsZonesTableBody" class="results-table-body">
                                        <!-- Dynamic content will be loaded here -->
                                    </tbody>
                                </table>
                            </div>
                            
                            <!-- Loading indicator overlaying the table -->
                            <div id="tableLoadingIndicator" class="cnic-dt-loading hidden">
                                <div class="cnic-dt-loading-content">
                                    <i class="fas fa-spinner fa-spin fa-2x"></i>
                                    <p>Loading DNS zones...</p>
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
                </div>
                <div id="noZonesMessage" class="alert alert-info hidden">
                    <i class="fas fa-info-circle"></i> No DNS zones found matching your criteria.
                </div>
            </div>
            
            <!-- Action Buttons -->
            <div class="cnic-form-actions">
                <button type="button" class="btn btn-gradient-primary btn-lg hover-lift-modern" id="startOver">
                    <i class="fa fa-redo" style="margin-right: 10px;"></i>
                    Start Over
                </button>
                <div class="cnic-help-info">
                    <i class="fa fa-info-circle"></i>
                    <span>Return to the discovery step to scan for DNS zones again.</span>
                </div>
            </div>
        </div>