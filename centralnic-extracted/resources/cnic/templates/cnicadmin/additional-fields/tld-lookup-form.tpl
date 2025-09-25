<div class="panel panel-modern">
    <div class="panel-heading">
        <h4 class="panel-title">
            <div class="cnic-icon-wrapper blue">
                <i class="fa fa-search"></i>
            </div>
            TLD Configuration Lookup
        </h4>
    </div>
    <div class="panel-body">
        <div class="tld-lookup-container text-center">
            <p class="text-muted" style="margin-bottom: 25px; font-size: 15px; line-height: 1.5;">
                Select a TLD to configure its additional domain fields and default values for seamless domain registration.
            </p>
            
            <form method="post" action="" id="lookupFieldsForm">
                <div class="input-group input-group-modern">
                    <span class="input-group-addon">
                        <i class="fa fa-search"></i>
                    </span>
                    <select name="tld" class="form-control selectize" id="tldInput"
                        placeholder="Choose or search for a TLD..." aria-label="TLD" required>
                        <option value="">Choose a TLD to configure...</option>
                        {foreach from=$tlds item=label}
                            <option value="{$label}">{$label}</option>
                        {/foreach}
                    </select>
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-primary btn-lg disabled" id="lookupFieldsButton" disabled>
                            <i class="fa fa-cog"></i>
                            Configure Fields
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>