<!-- Step 1: Registrar Selection -->
<div id="step1" class="cnic-step active">
    <!-- Progress Steps -->
    {include file="sync/includes/progress-steps.tpl" currentStep=1 completedSteps=[]}

    <form id="domainSyncForm" role="form">
        <!-- Modern Registrar Selection Panel -->
        <div class="panel panel-modern">
            <div class="panel-heading cnic-panel-header">
                <h4 class="panel-title">
                    <div class="cnic-icon-wrapper orange">
                        <i class="fas fa-server"></i>
                    </div>
                    Registrar Selection
                    <div class="panel-badge">
                        Step 1
                    </div>
                </h4>
            </div>
            <div class="panel-body cnic-card-body">
                <h5 class="cnic-subsection-title">
                    <i class="fas fa-server"></i>
                    Choose Your Registrar
                </h5>
                <p class="help-block">
                    Select the registrar you want to synchronize domain expiry dates from
                </p>

                <div class="registrar-selection-wrapper">
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon">
                            <i class="fas fa-server" aria-hidden="true"></i>
                        </span>
                        <select id="registrar" name="registrar" class="form-control" aria-label="Select Registrar"
                            required>
                            <option value="">Choose a registrar...</option>
                            {foreach from=$supportedRegistrars key=key item=value}
                                <option value="{$key}" {if $key == $smarty.request.registrar}selected{/if}>{$value}</option>
                            {/foreach}
                        </select>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-gradient-primary fetch-domains-btn"
                                aria-describedby="registrar-help">
                                <i class="fas fa-sync-alt" aria-hidden="true"></i> Load Domains
                            </button>
                        </span>
                    </div>
                </div>

                <div class="alert alert-info" style="margin-top: 20px;">
                    <div class="alert-content">
                        <i class="fas fa-lightbulb"></i>
                        <div>
                            <strong>Registrar Connection:</strong> Select your registrar from the dropdown above and
                            click "Load
                            Domains" to establish connection and retrieve your domain list.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- End Step 1 -->