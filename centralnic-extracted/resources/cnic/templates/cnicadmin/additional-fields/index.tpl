<div class="container cnicadmin-main">
    <div class="row">
        <div class="col-md-12">
            {* Additional Fields Section with consistent header *}
            {assign var="title" value="TLD Additional Fields Configuration"}
            {assign var="icon" value="fas fa-cogs"}
            {assign var="subtitle" value="<strong>Manage TLD additional fields for your domain reseller account.</strong> Search and select a TLD to configure default values for its additional fields."}

            {include file="partials/section-header.tpl"}

            <div class="additional-fields-container">
                {* Alert Container for messages *}
                <div id="alertContainer" class="margin-bottom-3"></div>

                {* TLD Lookup Section *}
                <div class="tld-lookup-section">
                    {include file="additional-fields/tld-lookup-form.tpl"}
                </div>

                {* Loading Indicator *}
                {include file="additional-fields/loading-indicator.tpl"}

                {* Dynamic Fields Container *}
                <div id="tldFields" class="margin-top-4 margin-bottom-5"></div>
            </div>

            {* Recent TLDs Section - Outside of main configuration panel *}
            <div class="recent-tlds-section">
                {include file="additional-fields/recent-tlds.tpl"}
            </div>

            {include file="partials/section-footer.tpl"}
        </div>
    </div>
</div>