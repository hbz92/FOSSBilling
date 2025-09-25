{* TLD Selection Section - Enhanced UI for TLD-specific domain synchronization *}
<div class="form-group tld-selection-group" id="tldInput" style="display: none;">
    <div class="sync-section-header">
        <label class="control-label">
            <i class="fas fa-filter text-purple"></i> Select TLD for Domain Filtering
        </label>
        <p class="help-block">
            Choose a TLD extension to synchronize all domains with that specific extension
        </p>
    </div>

    <div class="cnic-section tld-selection-section">
        {* Enhanced TLD Lookup Form *}
        <div class="tld-lookup-form">
            <div class="row">
                <div class="col-md-12">
                    <div class="input-group input-group-modern">
                        <span class="input-group-addon">
                            <i class="fas fa-globe text-purple"></i>
                        </span>
                        <select id="tldSelect" name="tldSelect" class="form-control tld-dropdown" disabled>
                            <option value="">Type or select a TLD extension...</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        {* Enhanced TLD Domains Results *}
        <div class="tld-domains-wrapper margin-top-4" style="display: none;">
            {* Beautiful Header Card *}
            <div class="tld-results-header">
                <div class="panel panel-modern tld-summary-card">
                    <div class="panel-body">
                        <div class="row cnic-align-items-center">
                            <div class="col-sm-8">
                                <div class="tld-summary-info">
                                    <div class="tld-summary-main">
                                        <div class="tld-icon-wrapper">
                                            <i class="fas fa-tag text-purple"></i>
                                        </div>
                                        <div class="tld-summary-details">
                                            <div class="tld-name">
                                                Selected TLD: <strong class="text-purple" id="selectedTldName">-</strong>
                                            </div>
                                            <div class="tld-description text-muted">
                                                Domains matching this extension
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 text-right">
                                <div class="tld-count-badge">
                                    <div class="count-number">
                                        <span id="tldDomainsCount">0</span>
                                    </div>
                                    <div class="count-label">
                                        domains found
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {* Enhanced Info Alert - Moved to bottom to avoid dropdown overlap *}
        <div class="alert alert-modern alert-info tld-info-alert margin-top-4">
            <div class="alert-icon">
                <i class="fas fa-info-circle"></i>
            </div>
            <div class="alert-content">
                <div class="alert-title">
                    <strong>TLD-Specific Synchronization</strong>
                </div>
                <div class="alert-description">
                    Select a TLD extension from the dropdown above to load and preview all domains with that extension. 
                    This allows you to synchronize all domains of a specific type (e.g., all .com or .it domains).
                </div>
            </div>
        </div>
    </div>
</div>