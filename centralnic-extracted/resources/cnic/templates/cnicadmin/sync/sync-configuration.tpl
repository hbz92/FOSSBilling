<!-- Step 2: Sync Configuration -->
<div id="step2" class="cnic-step">
    <!-- Progress Steps -->
    {include file="sync/includes/progress-steps.tpl" currentStep=2 completedSteps=[1]}

    <form id="syncForm" role="form">
        <!-- Enhanced Registrar Status -->
        <div class="alert alert-success sync-success-alert">
            <div class="row cnic-align-items-center">
                <div class="col-sm-8">
                    <div class="sync-success-content">
                        <div class="sync-success-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="sync-success-text">
                            <strong>Successfully Connected</strong>
                            <div class="sync-success-details">
                                <span id="selectedRegistrarName">-</span>
                                <span class="separator">•</span>
                                <span id="domainCount">0</span> domains ready for sync
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 text-right">
                    <div class="sync-ready-badge">
                        <small>Ready to sync</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modern Synchronization Options Panel -->
        <div class="panel panel-modern sync-options-panel">
            <div class="panel-heading cnic-panel-header">
                <h4 class="panel-title">
                    <span>
                        <div class="cnic-icon-wrapper blue">
                            <i class="fas fa-sliders-h"></i>
                        </div>
                        Synchronization Options
                    </span>
                    <div class="panel-badge">
                        Step 2
                    </div>
                </h4>
            </div>
            <div class="panel-body cnic-card-body">
                <!-- Enhanced Sync Type Selection -->
                <h5 class="cnic-subsection-title">
                    <i class="fas fa-list"></i>
                    Choose Sync Method
                </h5>
                <p class="help-block">
                    Select how you want to synchronize domain expiry dates with your registrar
                </p>

                    <div class="row choice-cards-container">
                        <div class="col-sm-4 choice-card-wrapper" id="allDomainsWrapper">
                            <div class="radio">
                                <label class="cnic-choice-card" data-value="all">
                                    <input type="radio" name="syncType" value="all" checked class="choice-input">
                                    <div class="choice-content">
                                        <div class="choice-header">
                                            <div class="choice-icon">
                                                <div class="cnic-icon-wrapper blue">
                                                    <i class="fas fa-globe"></i>
                                                </div>
                                            </div>
                                            <div class="choice-info">
                                                <div class="choice-title">
                                                    <strong>All Domains</strong>
                                                </div>
                                                <div class="choice-description">
                                                    Synchronize expiry dates for all domains from your registrar account
                                                </div>
                                            </div>
                                            <div class="choice-indicator">
                                                <i class="far fa-circle"></i>
                                            </div>
                                        </div>
                                        <div class="choice-recommendation">
                                            <small>
                                                <i class="fas fa-info-circle"></i>
                                                Recommended for bulk operations
                                            </small>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4 choice-card-wrapper" id="singleDomainWrapper">
                            <div class="radio">
                                <label class="cnic-choice-card" data-value="single">
                                    <input type="radio" name="syncType" value="single" class="choice-input">
                                    <div class="choice-content">
                                        <div class="choice-header">
                                            <div class="choice-icon">
                                                <div class="cnic-icon-wrapper green">
                                                    <i class="fas fa-crosshairs"></i>
                                                </div>
                                            </div>
                                            <div class="choice-info">
                                                <div class="choice-title">
                                                    <strong>Single Domain</strong>
                                                </div>
                                                <div class="choice-description">
                                                    Select and synchronize a specific domain from the list below
                                                </div>
                                            </div>
                                            <div class="choice-indicator">
                                                <i class="far fa-circle"></i>
                                            </div>
                                        </div>
                                        <div class="choice-recommendation">
                                            <small>
                                                <i class="fas fa-search"></i>
                                                Ideal for targeted sync operations
                                            </small>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4 choice-card-wrapper" id="tldDomainsWrapper">
                            <div class="radio">
                                <label class="cnic-choice-card" data-value="tld">
                                    <input type="radio" name="syncType" value="tld" class="choice-input">
                                    <div class="choice-content">
                                        <div class="choice-header">
                                            <div class="choice-icon">
                                                <div class="cnic-icon-wrapper purple">
                                                    <i class="fas fa-filter"></i>
                                                </div>
                                            </div>
                                            <div class="choice-info">
                                                <div class="choice-title">
                                                    <strong>TLD-Specific</strong>
                                                </div>
                                                <div class="choice-description">
                                                    Synchronize all domains with a specific TLD extension
                                                </div>
                                            </div>
                                            <div class="choice-indicator">
                                                <i class="far fa-circle"></i>
                                            </div>
                                        </div>
                                        <div class="choice-recommendation">
                                            <small>
                                                <i class="fas fa-layer-group"></i>
                                                Perfect for TLD-focused management
                                            </small>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                <!-- Enhanced Domain Selection -->
                <div class="form-group domain-selection-group" id="domainInput" style="display: none;">
                    <div class="sync-section-header">
                        <label class="control-label">
                            <i class="fas fa-search"></i> Select Domain to Sync
                        </label>
                        <p class="help-block">
                            Choose a specific domain from your registrar account
                        </p>
                    </div>

                    <div class="cnic-section domain-selection-section">
                        <div class="domain-search-wrapper">
                            <div class="input-group input-group-modern">
                                <span class="input-group-addon">
                                    <i class="fas fa-search"></i>
                                </span>
                                <input type="text" id="domainSearch" class="form-control form-control-modern"
                                    placeholder="Type to filter domains...">
                            </div>
                        </div>

                        <div class="domain-list-wrapper">
                            <div class="domain-dropdown-wrapper">
                                <select id="domain" name="domain" class="form-control domain-dropdown cnic-select-modern" disabled size="6">
                                    <option value="">Select a domain</option>
                                </select>
                            </div>
                        </div>

                        <div class="alert alert-info domain-info-alert">
                            <div class="alert-content">
                                <i class="fas fa-lightbulb"></i>
                                <div>
                                    <strong>Single Domain Mode:</strong> Select a domain from the loaded list above to proceed with targeted
                                    synchronization. Use the search field to quickly find specific domains from your registrar account.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TLD Selection Section -->
                {include file="sync/includes/tld-selection.tpl"}
            </div>
        </div>

        <!-- Processing Configuration Panel -->
        <div class="panel panel-modern">
            <div class="panel-heading cnic-panel-header">
                <h4 class="panel-title">
                    <span>
                        <div class="cnic-icon-wrapper green">
                            <i class="fas fa-cogs"></i>
                        </div>
                        Processing Configuration
                    </span>
                    <div class="panel-badge">
                        Performance
                    </div>
                </h4>
            </div>
            <div class="panel-body cnic-card-body">
                <h5 class="cnic-subsection-title">
                    <i class="fas fa-tachometer-alt"></i>
                    Parallel Processing Settings
                </h5>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="parallelRequests" class="control-label">
                                <i class="fas fa-stream"></i>
                                Concurrent Requests
                            </label>
                            <select id="parallelRequests" name="parallelRequests" class="form-control">
                                <option value="1">1 request (Safest, slowest)</option>
                                <option value="2" selected>2 requests (Balanced)</option>
                                <option value="3">3 requests (Faster)</option>
                                <option value="4">4 requests (Fastest, may timeout)</option>
                            </select>
                            <div class="help-block">
                                <i class="fas fa-info-circle"></i>
                                <span id="configDetails">Processing 2 domains in parallel for balanced performance</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="alert alert-info domain-info-alert">
                            <div class="alert-content">
                                <i class="fas fa-lightbulb"></i>
                                <div>
                                    <strong>Performance Tip:</strong> Start with 2 requests for balanced speed and reliability.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced Action Buttons -->
        <div class="sync-actions-section">
            <div class="sync-action-buttons">
                <button type="button" class="btn btn-default hover-lift-modern sync-prev-button" id="prevButtonStep2"
                    data-step="1">
                    <i class="fas fa-arrow-left" style="margin-right: 10px;"></i> Previous Step
                </button>
                <button type="button" class="btn btn-gradient-primary hover-lift-modern sync-start-button">
                    <i class="fas fa-rocket" style="margin-right: 10px;"></i><span class="btn-text">Start
                        Synchronization</span>
                </button>
            </div>
        </div>
    </form>
</div>
<!-- End Step 2 -->

<script>
function updateConfigDetails() {
    const parallelSelect = document.getElementById('parallelRequests');
    const configDetails = document.getElementById('configDetails');
    
    if (parallelSelect && configDetails) {
        const value = parallelSelect.value;
        const descriptions = {
            '1': 'Processing domains sequentially for optimal stability',
            '2': 'Processing 2 domains in parallel for balanced performance',
            '3': 'Processing 3 domains in parallel for faster sync',
            '4': 'Processing 4 domains in parallel for maximum speed'
        };
        
        configDetails.textContent = descriptions[value] || descriptions['2'];
        
        // Store in global config for SyncEngine to use
        window.CNIC_SYNC_CONFIG = window.CNIC_SYNC_CONFIG || {};
        window.CNIC_SYNC_CONFIG.maxConcurrent = parseInt(value);
    }
}

// Initialize configuration when page loads
document.addEventListener('DOMContentLoaded', function() {
    const parallelSelect = document.getElementById('parallelRequests');
    if (parallelSelect) {
        parallelSelect.addEventListener('change', updateConfigDetails);
        updateConfigDetails(); // Set initial state
    }
});
</script>