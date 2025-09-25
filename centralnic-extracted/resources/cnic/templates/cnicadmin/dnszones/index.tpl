<div class="container cnicadmin-main">
    <div class="row">
        <div class="col-md-12">
            {* DNS Zone Management Section with consistent header *}
            {assign var="title" value="DNS Zone Management"}
            {assign var="icon" value="fas fa-server"}
            {assign var="subtitle" value="<strong>Manage DNS zones and identify external zones.</strong> Find zones that are not associated with domains and manage zone operations efficiently."}
            {assign var="stats_text" value="Zone Analytics"}
            {assign var="stats_icon" value="fas fa-globe"}

            {include file="partials/section-header.tpl"}

            <div class="cnic-content-wrapper">
                <!-- Step 1: Discovery Configuration -->
                {include file="dnszones/partials/step-discovery.tpl"}

                <!-- Step 2: Filter & Management -->
                {include file="dnszones/partials/step-management.tpl"}
            </div>

            {include file="partials/section-footer.tpl"}
        </div>
    </div>
</div>

<!-- Modals Section -->
{include file="dnszones/partials/modals/dns-records.tpl"}
{include file="dnszones/partials/modals/delete-confirmation.tpl"}
