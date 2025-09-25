<div class="container cnicadmin-main">
    <div class="row">
        <div class="col-md-12">
            {* CNIC Configuration Dashboard - Main Index *}
            {assign var="title" value="CNIC Configuration Dashboard"}
            {assign var="icon" value="fas fa-tachometer-alt"}
            {assign var="subtitle" value="<strong>Centralized management console for your CNIC registrar configuration.</strong> Access all configuration tools and features from this unified dashboard."}

            {include file="partials/section-header.tpl"}

            <div class="cnic-dashboard-grid">
                {* TLD Additional Fields *}
                <div class="cnic-dashboard-card">
                    <div class="cnic-card-header">
                        <div class="cnic-icon-wrapper blue">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <h4 class="cnic-card-title">TLD Additional Fields</h4>
                    </div>
                    <div class="cnic-card-body">
                        <p class="cnic-card-description">
                            Configure default values for domain registration additional fields.
                            Customize field visibility and default values for different TLDs.
                        </p>
                        <div class="cnic-card-features">
                            <ul class="cnic-feature-list">
                                <li><i class="fas fa-check text-success"></i> Field visibility control</li>
                                <li><i class="fas fa-check text-success"></i> Default value configuration</li>
                                <li><i class="fas fa-check text-success"></i> TLD-specific settings</li>
                            </ul>
                        </div>
                        <div class="cnic-card-actions">
                            <a href="addonmodules.php?module=cnicadmin&action=additionalfields"
                                class="btn btn-gradient-primary btn-block hover-lift-modern">
                                <i class="fas fa-cogs"></i> Configure Additional Fields
                            </a>
                        </div>
                    </div>
                </div>

                {* Domain Expiry Sync *}
                <div class="cnic-dashboard-card">
                    <div class="cnic-card-header">
                        <div class="cnic-icon-wrapper green">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                        <h4 class="cnic-card-title">Domain Expiry Sync</h4>
                    </div>
                    <div class="cnic-card-body">
                        <p class="cnic-card-description">
                            Synchronize domain expiry dates between your WHMCS installation and
                            registrar. Keep your domain records up to date automatically.
                        </p>
                        <div class="cnic-card-features">
                            <ul class="cnic-feature-list">
                                <li><i class="fas fa-check text-success"></i> Bulk synchronization</li>
                                <li><i class="fas fa-check text-success"></i> Individual domain sync</li>
                                <li><i class="fas fa-check text-success"></i> Registrar integration</li>
                            </ul>
                        </div>
                        <div class="cnic-card-actions">
                            <a href="addonmodules.php?module=cnicadmin&action=sync"
                                class="btn btn-gradient-success btn-block hover-lift-modern">
                                <i class="fas fa-sync-alt"></i> Sync Domain Expiry
                            </a>
                        </div>
                    </div>
                </div>

                {* DNS Zone Management *}
                <div class="cnic-dashboard-card">
                    <div class="cnic-card-header">
                        <div class="cnic-icon-wrapper purple">
                            <i class="fas fa-server"></i>
                        </div>
                        <h4 class="cnic-card-title">DNS Zone Management</h4>
                    </div>
                    <div class="cnic-card-body">
                        <p class="cnic-card-description">
                            Manage DNS zones and identify external zones. Find zones that are
                            not associated with domains and manage zone operations efficiently.
                        </p>
                        <div class="cnic-card-features">
                            <ul class="cnic-feature-list">
                                <li><i class="fas fa-check text-success"></i> Zone discovery</li>
                                <li><i class="fas fa-check text-success"></i> External zone detection</li>
                                <li><i class="fas fa-check text-success"></i> Bulk operations</li>
                            </ul>
                        </div>
                        <div class="cnic-card-actions">
                            <a href="addonmodules.php?module=cnicadmin&action=dnszones"
                                class="btn btn-gradient-purple btn-block hover-lift-modern">
                                <i class="fas fa-server"></i> Manage DNS Zones
                            </a>
                        </div>
                    </div>
                </div>

                {* Contact Data Repair *}
                <div class="cnic-dashboard-card">
                    <div class="cnic-card-header">
                        <div class="cnic-icon-wrapper orange">
                            <i class="fas fa-wrench"></i>
                        </div>
                        <h4 class="cnic-card-title">Contact Data Repair</h4>
                    </div>
                    <div class="cnic-card-body">
                        <p class="cnic-card-description">
                            Repair and update contact information for domains. Force refresh
                            domain data to ensure consistency between WHMCS and registrar.
                        </p>
                        <div class="cnic-card-features">
                            <ul class="cnic-feature-list">
                                <li><i class="fas fa-check text-success"></i> Force domain refresh</li>
                                <li><i class="fas fa-check text-success"></i> Contact data repair</li>
                                <li><i class="fas fa-check text-success"></i> Data consistency check</li>
                            </ul>
                        </div>
                        <div class="cnic-card-actions">
                            <a href="addonmodules.php?module=cnicadmin&action=forceRefreshDomains"
                                class="btn btn-gradient-orange btn-block hover-lift-modern">
                                <i class="fas fa-wrench"></i> Repair Contact Data
                            </a>
                        </div>
                    </div>
                </div>

                {* Important Registrar Settings *}
                <div class="cnic-dashboard-card">
                    <div class="cnic-card-header">
                        <div class="cnic-icon-wrapper red">
                            <i class="fas fa-cog"></i>
                        </div>
                        <h4 class="cnic-card-title">Registrar Account Settings</h4>
                    </div>
                    <div class="cnic-card-body">
                        <p class="cnic-card-description">
                            Configure important registrar account settings that affect domain operations.
                            Manage critical configurations for optimal registrar performance.
                        </p>
                        <div class="cnic-card-features">
                            <ul class="cnic-feature-list">
                                <li><i class="fas fa-check text-success"></i> Critical settings</li>
                                <li><i class="fas fa-check text-success"></i> Performance optimization</li>
                                <li><i class="fas fa-check text-success"></i> Safety configurations</li>
                            </ul>
                        </div>
                        <div class="cnic-card-actions">
                            <a href="addonmodules.php?module=cnicadmin&action=registrarsettings"
                                class="btn btn-gradient-danger btn-block hover-lift-modern">
                                <i class="fas fa-cog"></i> Configure Settings
                            </a>
                        </div>
                    </div>
                </div>

                {* Event List *}
                <div class="cnic-dashboard-card">
                    <div class="cnic-card-header">
                        <div class="cnic-icon-wrapper teal">
                            <i class="fas fa-list"></i>
                        </div>
                        <h4 class="cnic-card-title">Event List</h4>
                    </div>
                    <div class="cnic-card-body">
                        <p class="cnic-card-description">
                            View and filter account events. Track domain activities and monitor
                            registrar operations with comprehensive event logging.
                        </p>
                        <div class="cnic-card-features">
                            <ul class="cnic-feature-list">
                                <li><i class="fas fa-check text-success"></i> Real-time events</li>
                                <li><i class="fas fa-check text-success"></i> Advanced filtering</li>
                                <li><i class="fas fa-check text-success"></i> Activity monitoring</li>
                            </ul>
                        </div>
                        <div class="cnic-card-actions">
                            <a href="addonmodules.php?module=cnicadmin&action=eventlist"
                                class="btn btn-gradient-info btn-block hover-lift-modern">
                                <i class="fas fa-list"></i> View Event List
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {* Quick Stats Section *}
    <div class="row margin-top-4">
        <div class="col-md-12">
            <div class="panel panel-modern">
                <div class="panel-heading cnic-panel-header">
                    <h4 class="panel-title">
                        <div class="cnic-icon-wrapper gray">
                            <i class="fas fa-info-circle"></i>
                        </div>
                        Quick Information
                    </h4>
                </div>
                <div class="panel-body cnic-card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="cnic-info-card">
                                <h5><i class="fas fa-book text-primary"></i> Documentation</h5>
                                <p>Access comprehensive documentation and guides for all CNIC configuration features.
                                </p>
                                <a href="https://support.centralnicreseller.com/hc/en-gb/articles/27732808256157-WHMCS-CentralNic-Reseller-Configuration-Addon"
                                    target="_blank" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-external-link-alt"></i> View Documentation
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="cnic-info-card">
                                <h5><i class="fas fa-question-circle text-info"></i> Support</h5>
                                <p>Get help with CNIC registrar configuration and troubleshooting from our support team.
                                </p>
                                <a href="https://support.centralnicreseller.com/hc/en-gb" target="_blank"
                                    class="btn btn-sm btn-outline-info">
                                    <i class="fas fa-life-ring"></i> Get Support
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="cnic-info-card">
                                <h5><i class="fas fa-code-branch text-success"></i> Version</h5>
                                <p>You are running CNIC Configuration Addon version
                                    {$smarty.const.CNIC_VERSION|default:"Unknown"}.</p>
                                <small class="text-muted">Keep your addon updated for the latest features and
                                    fixes.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{include file="partials/section-footer.tpl"}
