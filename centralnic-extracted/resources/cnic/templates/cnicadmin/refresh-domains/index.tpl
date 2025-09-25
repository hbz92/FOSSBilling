<div class="container cnicadmin-main">
    <div class="row">
        <div class="col-md-12">
            {* Contact Data Repair Tool Section with consistent header *}
            {assign var="title" value="Contact Data Repair Tool"}
            {assign var="icon" value="fa fa-sync-alt"}
            {assign var="subtitle" value="<strong>Repair domain contact data by forcing a refresh from the registry.</strong> This tool is particularly useful for domains where contact handles don't start with prefixes (P- or O-). It synchronizes contact information without affecting domain functionality."}

            {include file="partials/section-header.tpl"}

            <div class="refresh-domains-container">
                {include file="loading-indicator.tpl"}
                <div id="alertContainer" class="margin-bottom-3" aria-live="polite"></div>
                
                {* Domain Contact Verification Section *}
                <div class="panel panel-modern">
                    <div class="panel-heading cnic-panel-header">
                        <h4 class="panel-title">
                            <div class="cnic-icon-wrapper blue">
                                <i class="fa fa-globe"></i>
                            </div>
                            Domain Contact Verification
                        </h4>
                    </div>
                    <div class="panel-body cnic-card-body">
                        <p class="text-muted margin-bottom-4" style="font-size: 15px; line-height: 1.5;">
                            Enter the domain name to analyze and repair contact information.
                        </p>
                        
                        <form id="contactRepairForm" class="cnic-form" role="form">
                            <div class="form-group margin-bottom-4">
                                <div class="input-group input-group-lg">
                                    <span class="input-group-addon">
                                        <i class="fa fa-globe"></i>
                                    </span>
                                    <input type="text" 
                                           id="domainName" 
                                           name="domainName" 
                                           class="form-control" 
                                           placeholder="example.com" 
                                           aria-label="Domain Name"
                                           required>
                                    <span class="input-group-btn">
                                        <button type="button" 
                                                id="checkDomainBtn" 
                                                class="btn btn-gradient-primary btn-lg hover-lift-modern">
                                            <i class="fas fa-search"></i>
                                            Check Contacts
                                        </button>
                                    </span>
                                </div>
                                <small class="help-block margin-top-2">Enter the domain name you want to check and repair</small>
                            </div>

                            <div class="text-center margin-top-4">
                                <button type="button" 
                                        id="repairDomainBtn" 
                                        class="btn btn-gradient-success btn-lg hover-lift-modern hidden"
                                        style="margin-right: 15px;">
                                    <i class="fas fa-wrench"></i>
                                    Repair Domain Contacts
                                </button>
                                
                                <button type="button" 
                                        id="resetBtn" 
                                        class="btn btn-secondary btn-lg hover-lift-modern hidden">
                                    <i class="fas fa-redo"></i>
                                    Check Another Domain
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                {* Contact details container *}
                <div id="contactDetails" class="hidden margin-top-5">
                    <div class="panel panel-modern">
                        <div class="panel-heading cnic-panel-header">
                            <h4 class="panel-title">
                                <div class="cnic-icon-wrapper green">
                                    <i class="fas fa-info-circle"></i>
                                </div>
                                Contact Information Analysis
                            </h4>
                        </div>
                        <div class="panel-body cnic-card-body">
                            <div id="contactDetailsContent" class="margin-top-2 margin-bottom-2">
                                {* Contact details will be populated here *}
                            </div>
                        </div>
                    </div>
                </div>

                {* Legacy alert containers - keeping for JS compatibility *}
                <div style="display: none;">
                    <div id="successAlert" class="alert alert-success hidden">
                        <i class="fas fa-check-circle"></i>
                        <span id="successMessage"></span>
                    </div>
                    <div id="errorAlert" class="alert alert-danger hidden">
                        <i class="fas fa-exclamation-triangle"></i>
                        <span id="errorMessage"></span>
                    </div>
                    <div id="infoAlert" class="alert alert-info hidden">
                        <i class="fas fa-info-circle"></i>
                        <span id="infoMessage"></span>
                    </div>
                    <div id="warningAlert" class="alert alert-warning hidden">
                        <i class="fas fa-exclamation-circle"></i>
                        <span id="warningMessage"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{include file="partials/section-footer.tpl"}