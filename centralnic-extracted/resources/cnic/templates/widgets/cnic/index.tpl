{if $widgetStatus eq -1}
    <div class="widget-content-padded widget-billing">
        <div class="color-pink">
            Please install or upgrade to the latest { $widgetTitleWithCompany } Registrar Module.
            <span data-toggle="tooltip"
                title="The { $widgetTitleWithCompany } Registrar Module is regularly maintained, download and documentation available at github."
                class="glyphicon glyphicon-question-sign"></span><br />
            <a href="{$repoLink}" style="margin-top:15px;">
                <img src="{$logo}?ts={constant("CNIC_VERSION")}" class="cnic-widget-logo" />
            </a>
        </div>
    </div>
{else}

    {if $widgetStatus eq 0}
        <div class="widget-billing">
            <div class="row account-widget">
                <div class="col-sm-12">
                    <div class="item">
                        <div class="note">
                            {$widgetDisableMessage}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {/if}
    <script type="text/javascript">
        const {$moduleName} = new Widget(`{$widgetId}`, `{$widgetTTL}`, `{$widgetExpires}`, `{$widgetStatus}`, `{$widgetStatusIcon}`, `#cnrbalexpires{$widgetId}`);
        {$moduleName}.mainWidget();
    </script>
{/if}

{if $widgetStatus eq 1}
    <div class="widget-billing">
        <div class="row account-widget-cnic">
            <div class="item col-sm-6 bordered-right" style="padding:13px">
                {$balanceHTML}
            </div>
            <div class="item col-sm-6">
                <div class="text-center" style="padding:15px;">
                    <img src="{$logo}?ts={constant("CNIC_VERSION")}" class="cnic-widget-logo">
                </div>
                {if $latestVersion neq false}
                    <div class="text-center">
                        <a style="color:crimson" class="btn btn-default btn-sm"
                            href="https://github.com/centralnicgroup-opensource/rtldev-middleware-whmcs/raw/main/whmcs-cnic-bundle.zip"
                            target="_blank"><i class="fas fa-download" aria-hidden="true"></i> Latest version {$latestVersion}
                            available!</a>
                        </a>
                    </div>
                {else}
                    <div class="text-center small">
                        <span style="color:dimgray;">You're running with the latest version.</span>
                    </div>
                {/if}
            </div>
        </div>
        <div class="widget-footer-outer">
            {if $quotaStatistics neq ""}
                <span class="text-muted quota-stats-inner">
                    <i class="fa fa-tachometer" aria-hidden="true"></i> {$quotaStatistics}
                </span>
            {/if}
            <span class="text-muted current-version-inner">
                <i class="fas fa-exclamation-circle"></i>
                Current version {$currentVersion}.
            </span>
        </div>
    </div>
    {if $refreshRequest eq ""}
        <script type="text/javascript">
            {$moduleName}.cnrStartCounter();
        </script>
    {/if}
{/if}