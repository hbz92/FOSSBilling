<div class="container cnicadmin-main">
    <div class="row">
        <div class="col-md-12">
            {* Domain Sync Section with consistent header *}
            {assign var="title" value="Domain Expiry Date Sync"}
            {assign var="icon" value="fa fa-sync-alt"}
            {assign var="subtitle" value="<strong>Use this only if instructed by your registrar's support team.</strong><br />Synchronize domain expiry dates with your registrar only. This does not affect the actual domain status — it simply updates the expiry date in WHMCS. It's especially useful after migrating from an older module version that handled expiry dates differently."}
            {assign var="stats_text" value="Secure Sync Process"}
            {assign var="stats_icon" value="fa fa-shield-alt"}

            {include file="partials/section-header.tpl"}

            <div class="cnic-content-wrapper">

                    {include file="sync/registrar-selection.tpl"}
                    {include file="sync/sync-configuration.tpl"}
                    {include file="sync/sync-results.tpl"}
                </div>

                {include file="partials/section-footer.tpl"}
            {include file="sync/sync-loading.tpl"}
        </div>
    </div>
</div>