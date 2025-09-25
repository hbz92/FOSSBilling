{*
 * DNS Zone Discovery Step Template
 * Step 1: Discovery Configuration
 *}

<!-- Step 1: Discovery Configuration -->
<div id="step1" class="cnic-step active">
    {include file="dnszones/partials/progress-indicator.tpl" currentStep=1 step1Status="active" step2Status="pending"}

    <!-- DNS Zone Discovery Configuration Panel -->
    <div class="panel panel-modern">
        <div class="panel-heading cnic-panel-header">
            <h4 class="panel-title">
                <div class="cnic-icon-wrapper blue">
                    <i class="fas fa-search"></i>
                </div>
                DNS Zone Discovery
                <div class="panel-badge">
                    Step 1
                </div>
            </h4>
        </div>
        <div class="panel-body cnic-card-body">
            <!-- Discovery Configuration -->
            <div>
                <h5 class="cnic-subsection-title">
                    <i class="fas fa-cog"></i>
                    Discovery Configuration Setup
                </h5>
                <div class="row">
                    <div class="col-md-12">
                        <div class="cnic-choice-card text-center">
                            <div class="choice-content">
                                <div class="choice-header">
                                    <div class="choice-icon">
                                        <i class="fas fa-server fa-2x"></i>
                                    </div>
                                    <h4 class="choice-title">Discover External DNS Zones</h4>
                                </div>
                                <p class="choice-description">
                                    Scan your CentralNic Reseller account for DNS zones that are not associated with WHMCS domains. 
                                    This helps identify external zones that may need cleanup or management.
                                </p>
                                <div class="choice-recommendation choice-recommendation-single">
                                    <small><i class="fas fa-lightbulb"></i> Best for identifying orphaned DNS zones</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="cnic-form-actions">
                <button type="button" class="btn btn-gradient-primary btn-lg hover-lift-modern" id="startDiscovery">
                    <i class="fas fa-search" style="margin-right: 10px;"></i>
                    Start Zone Discovery
                </button>
                <div class="cnic-help-info">
                    <i class="fa fa-info-circle"></i>
                    <span>This will scan your CentralNic Reseller account for external DNS zones that may need management.</span>
                </div>
            </div>
        </div>
    </div>
</div>
