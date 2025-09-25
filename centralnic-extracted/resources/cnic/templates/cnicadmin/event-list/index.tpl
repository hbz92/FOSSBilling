<div class="container cnicadmin-main">
    <div class="row">
        <div class="col-md-12">
            {* Event List Section with consistent header *}
            {assign var="title" value="Event List"}
            {assign var="icon" value="fas fa-list"}
            {assign var="subtitle" value="<strong>View and filter account events.</strong> Track domain activities and monitor account operations efficiently."}
            {assign var="stats_text" value="Real-time Events"}
            {assign var="stats_icon" value="fas fa-clock"}

            {include file="partials/section-header.tpl"}

            <div class="cnic-content-wrapper">
                <!-- Filters Section -->
                {assign var="filter_title" value="Event Filters"}
                {assign var="filter_icon" value="fas fa-filter"}
                {assign var="filter_color" value="purple"}
                <div class="panel panel-modern" id="filterSection">
                    <div class="panel-heading cnic-panel-header">
                        <h4 class="panel-title">
                            <div class="cnic-icon-wrapper {$filter_color}">
                                <i class="{$filter_icon}"></i>
                            </div>
                            {$filter_title}
                        </h4>
                    </div>
                    <div class="panel-body cnic-card-body">

                        <div class="panel-body cnic-card-body">
                            <div class="row">
                                <!-- Event Class -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="eventClass">Event Class</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fas fa-tags"></i>
                                            </span>
                                            <select class="form-control" id="eventClass" name="eventClass"
                                                title="Filter events by their classification type">
                                                <option value="">All Classes</option>
                                                <option value="DOMAIN_TRANSFER">Domain Transfer</option>
                                                <option value="DOMAIN_DELETION">Domain Deletion</option>
                                                <option value="DOMAIN_REGISTRATION">Domain Registration</option>
                                                <option value="DOMAIN_RENEWAL">Domain Renewal</option>
                                                <option value="DOMAIN_TRADE">Domain Trade</option>
                                                <option value="DOMAIN_MODIFICATION">Domain Modification</option>
                                                <option value="DOMAIN_BLOCKING_TRANSFER">Domain Blocking Transfer
                                                </option>
                                                <option value="DNSZONE_MODIFICATION">Dnszone Modification</option>
                                                <option value="CONTACT_REGISTRATION">Contact Registration</option>
                                                <option value="CERTIFICATE_REQUEST">Certificate Request</option>
                                                <option value="CERTIFICATE_CLOSE">Certificate Close</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Event Subclass -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="eventSubclass">Subclass <small
                                                class="text-muted">(Optional)</small></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fas fa-tag"></i>
                                            </span>
                                            <input type="text" class="form-control" id="eventSubclass"
                                                name="eventSubclass" placeholder="e.g., DELETION_FAILED"
                                                title="Optional - filter by specific subclass">
                                        </div>
                                    </div>
                                </div>

                                <!-- Object ID -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="objectId">Object ID <small
                                                class="text-muted">(Optional)</small></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fas fa-globe"></i>
                                            </span>
                                            <input type="text" class="form-control" id="objectId" name="objectId"
                                                placeholder="e.g., domain.com"
                                                title="Optional - filter by domain or object">
                                        </div>
                                    </div>
                                </div>

                                <!-- Results per page -->
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="eventLimit">Per Page</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fas fa-list-ol"></i>
                                            </span>
                                            <select class="form-control" id="eventLimit" name="eventLimit"
                                                title="Number of events to load per page">
                                                <option value="25">25</option>
                                                <option value="50" selected>50</option>
                                                <option value="100">100</option>
                                                <option value="200">200</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons Row -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-center" style="margin-top: 10px;">
                                        <button type="button" class="btn btn-gradient-primary hover-lift-modern"
                                            id="loadEventsBtn">
                                            <i class="fas fa-search"></i> Load Events
                                        </button>
                                        <button type="button" class="btn btn-default hover-lift-modern"
                                            id="clearFiltersBtn" style="margin-left: 10px;">
                                            <i class="fas fa-times"></i> Clear Filters
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Loading Indicator -->
                {include file="loading-indicator.tpl"}

                <!-- Events Display Section -->
                <div class="panel panel-modern" id="eventsDisplay" style="display: none;">
                    <div class="panel-heading cnic-panel-header">
                        <h4 class="panel-title">
                            <div class="cnic-icon-wrapper green">
                                <i class="fas fa-list-ul"></i>
                            </div>
                            Event Results
                            <div class="panel-badge" id="eventCount">0</div>
                        </h4>
                    </div>
                    <div class="panel-body cnic-card-body">
                        <!-- Events Table -->
                        <div class="results-table-wrapper">
                            <table class="cnic-dt-table modern-results-table" id="eventsTable">
                                <thead class="results-table-header">
                                    <tr>
                                        <th class="cnic-dt-column-date event-date-column"><i
                                                class="fas fa-calendar"></i> Date</th>
                                        <th class="cnic-dt-column-status event-class-column"><i class="fas fa-tags"></i>
                                            Class</th>
                                        <th class="cnic-dt-column-status event-subclass-column"><i
                                                class="fas fa-tag"></i> Subclass</th>
                                        <th class="cnic-dt-column-code event-object-column"><i class="fas fa-globe"></i>
                                            Object ID</th>
                                        <th class="cnic-dt-column-actions event-actions-column"><i
                                                class="fas fa-cog"></i> Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="eventsTableBody" class="results-table-body">
                                    <!-- Events will be populated here -->
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="row" id="eventsPagination" style="display: none;">
                            <div class="col-md-6">
                                <p class="text-muted" id="eventsInfo"></p>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="button" class="btn btn-default hover-lift-modern" id="loadMoreEventsBtn"
                                    style="display: none;">
                                    <i class="fas fa-chevron-down" style="margin-right: 10px;"></i>
                                    Load More Events
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- No Events Message -->
                <div class="panel panel-modern" id="noEventsMessage" style="display: none;">
                    <div class="panel-body text-center">
                        <i class="fas fa-inbox" style="font-size: 48px; color: #ccc; margin-bottom: 20px;"></i>
                        <h4>No Events Found</h4>
                        <p class="text-muted">No events match your current filter criteria. Try adjusting your
                            filters and search again.</p>
                    </div>
                </div>

                {include file="partials/section-footer.tpl"}
            </div>
        </div>
    </div>
</div>

{include file="event-list/partials/event-modal.tpl"}