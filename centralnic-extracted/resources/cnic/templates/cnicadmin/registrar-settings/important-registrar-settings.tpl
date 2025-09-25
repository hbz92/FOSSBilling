<div class="container cnicadmin-main">
    <div class="row">
        <div class="col-md-12">
            {* Registrar Settings Section with consistent header *}
            {assign var="title" value="Important Registrar Account Settings"}
            {assign var="icon" value="fas fa-cogs"}
            {assign var="subtitle" value="Configure essential settings for your registrar module to ensure optimal performance and compatibility."}
            {assign var="stats_text" value="Safely update registrar account settings"}
            {assign var="stats_icon" value="fa fa-shield-alt"}

            {include file="partials/section-header.tpl"}

            <div class="cnic-content-wrapper">
                <!-- Registrar Settings Form -->
                <div class="panel panel-modern">
                    <div class="panel-body cnic-card-body">
                        {include file="loading-indicator.tpl"}
                        <div id="alertContainer" class="cnic-alert-container margin-bottom-3" aria-live="polite"></div>
                        
                        <form id="registrarSettingsForm" class="cnic-form" role="form">
                            <!-- Modern Settings Layout -->
                            <div class="row">
                                <!-- Internal Transfers Card -->
                                <div class="col-md-6">
                                    <div class="cnic-choice-card">
                                        <div class="choice-content">
                                            <div class="choice-header">
                                                <div class="choice-icon">
                                                    <i class="fa fa-sync-alt fa-2x"></i>
                                                </div>
                                                <h4 class="choice-title">Internal Transfer Renewals</h4>
                                            </div>
                                            <p class="choice-description">Configure renewal behavior for customer-to-customer transfers</p>
                                            <div class="form-group">
                                                <select id="account_internal_transfer_renewalmode"
                                                    name="account_internal_transfer_renewalmode"
                                                    class="form-control"
                                                    aria-label="Select Renewal Mode">
                                                    <option value="" {if $account_internal_transfer_renewalmode === ""}selected{/if}>Default</option>
                                                    <option value="REGISTRY" {if $account_internal_transfer_renewalmode === "REGISTRY"}selected{/if}>Apply registry policy</option>
                                                    <option value="NORENEW" {if $account_internal_transfer_renewalmode === "NORENEW"}selected{/if}>Never renew</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Account Wide Renewal Card -->
                                <div class="col-md-6">
                                    <div class="cnic-choice-card">
                                        <div class="choice-content">
                                            <div class="choice-header">
                                                <div class="choice-icon">
                                                    <i class="fa fa-bell fa-2x"></i>
                                                </div>
                                                <h4 class="choice-title">Account Wide Renewal</h4>
                                            </div>
                                            <p class="choice-description">Default renewal behavior for all domains</p>
                                            <div class="form-group">
                                                <select id="account_renewalmode" name="account_renewalmode"
                                                    class="form-control"
                                                    aria-label="Select Account Wide Renewal Mode">
                                                    <option value="AUTORENEW" {if $account_renewalmode === "AUTORENEW"}selected{/if}>Auto Renew</option>
                                                    <option value="AUTOEXPIRE" {if $account_renewalmode === "AUTOEXPIRE"}selected{/if}>Auto Expire (Recommended)</option>
                                                    <option value="AUTODELETE" {if $account_renewalmode === "AUTODELETE"}selected{/if}>Auto Delete</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Compact Info Section -->
                            <div class="alert alert-info" style="margin-top: 20px;">
                                <div class="alert-content">
                                    <i class="fas fa-lightbulb"></i>
                                    <div>
                                        <strong>Quick Guide:</strong> AutoExpire is recommended for WHMCS systems. Internal transfer settings only affect customer-to-customer domain transfers.
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="cnic-form-actions">
                                <button type="button" id="saveRegistrarSettingsBtn"
                                    class="btn btn-gradient-primary btn-lg hover-lift-modern">
                                    <i class="fa fa-save" style="margin-right: 10px;"></i>
                                    Update Settings
                                </button>
                                <div class="cnic-help-info">
                                    <i class="fa fa-info-circle"></i>
                                    <span>This will update your global registrar account settings for all domains managed under your CentralNic Reseller account.</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                {include file="partials/section-footer.tpl"}
            </div>
        </div>
    </div>
</div>
