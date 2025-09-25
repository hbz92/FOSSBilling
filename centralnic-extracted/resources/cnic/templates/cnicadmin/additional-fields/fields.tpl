<div class="fields-configuration-panel">
    <div class="panel-heading cnic-panel-header">
        <h4 class="panel-title">
            <div class="cnic-icon-wrapper blue">
                <i class="fa fa-cogs"></i>
            </div>
            Additional Fields for {$tld|escape}
        </h4>
    </div>
    <div class="panel-body cnic-card-body">
        <form id="saveFieldsForm" method="post" action="" class="cnic-form">
            <input type="hidden" name="action" value="saveAdditionalFieldsData">
            <input type="hidden" name="tld" value="{$tld|escape}">

            {if isset($errorMessage)}
                <div class="alert alert-danger">
                    <div class="alert-content">
                        <i class="fas fa-exclamation-triangle"></i>
                        <div>
                            <strong>Error:</strong> {$errorMessage}
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            {/if}

            {if isset($successMessage)}
                <div class="alert alert-success">
                    <div class="alert-content">
                        <i class="fas fa-check-circle"></i>
                        <div>
                            <strong>Success:</strong> {$successMessage}
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            {/if}

        {if isset($fields) && count($fields) > 0}
            {* Sort fields by name (label) and hide the sort result *}
            {assign var="sortedKeys" value=array_keys($fields)}
            {assign var="sortResult" value=$sortedKeys|@sort}

            {* Group fields by type for better organization *}
            {assign var="acceptFields" value=[]}
            {assign var="registrantFields" value=[]}
            {assign var="otherFields" value=[]}

            {foreach from=$sortedKeys item=fieldKey}
                {assign var="fieldLabel" value=$fields[$fieldKey].label}
                {if strpos($fieldLabel, 'Accept') !== false}
                    {append var="acceptFields" value=$fieldKey}
                {elseif strpos($fieldLabel, 'Registrant') !== false}
                    {append var="registrantFields" value=$fieldKey}
                {else}
                    {append var="otherFields" value=$fieldKey}
                {/if}
            {/foreach}

            <div class="field-group-container">
                {if count($acceptFields) > 0}
                    <div class="cnic-form-section">
                        <div class="field-group-header">
                            <h5 class="field-group-title">
                                <div class="cnic-icon-wrapper green">
                                    <i class="fa fa-check-circle"></i>
                                </div>
                                Contract Acceptance
                            </h5>
                        </div>
                        <div class="field-group-body">
                            <div class="fields-grid">
                                {foreach from=$acceptFields item=fieldKey}
                                    {include file="additional-fields/field-row.tpl"
                                        fieldKey=$fieldKey
                                        field=$fields[$fieldKey]
                                        rowClass="field-accept field-full"
                                        type="accept"
                                        helpTexts=$helpTexts
                                    }
                                {/foreach}
                            </div>
                        </div>
                    </div>
                {/if}
                
                {if count($registrantFields) > 0}
                    <div class="cnic-form-section">
                        <div class="field-group-header">
                            <h5 class="field-group-title">
                                <div class="cnic-icon-wrapper blue">
                                    <i class="fa fa-user"></i>
                                </div>
                                Registrant Information
                            </h5>
                        </div>
                        <div class="field-group-body">
                            <div class="fields-grid">
                                {foreach from=$registrantFields item=fieldKey}
                                    {include file="additional-fields/field-row.tpl"
                                        fieldKey=$fieldKey
                                        field=$fields[$fieldKey]
                                        rowClass="field-registrant"
                                        type="registrant"
                                        helpTexts=$helpTexts
                                    }
                                {/foreach}
                            </div>
                        </div>
                    </div>
                {/if}
                
                {if count($otherFields) > 0}
                    <div class="cnic-form-section">
                        {if count($acceptFields) > 0 || count($registrantFields) > 0}
                            <div class="field-group-header">
                                <h5 class="field-group-title">
                                    <div class="cnic-icon-wrapper purple">
                                        <i class="fa fa-list-alt"></i>
                                    </div>
                                    Additional Information
                                </h5>
                            </div>
                        {/if}
                        <div class="field-group-body">
                            <div class="fields-grid">
                                {foreach from=$otherFields item=fieldKey}
                                    {include file="additional-fields/field-row.tpl"
                                        fieldKey=$fieldKey
                                        field=$fields[$fieldKey]
                                        rowClass="field-other"
                                        type="other"
                                        helpTexts=$helpTexts
                                    }
                                {/foreach}
                            </div>
                        </div>
                    </div>
                {/if}
            </div>
        {else}
            <div class="alert alert-info">
                <div class="alert-content">
                    <i class="fas fa-info-circle"></i>
                    <div>
                        <strong>No Additional Fields Required</strong>
                        <p>This TLD does not require any additional fields for registration.</p>
                    </div>
                </div>
            </div>
        {/if}
        </form>
    </div>
    
    {* Action buttons moved to card footer *}
    <div class="panel-footer additional-fields-form-actions">
        <button type="submit" id="saveFieldsButton" class="btn btn-gradient-primary btn-lg hover-lift-modern" form="saveFieldsForm"
            data-loading-text="<i class='fa fa-spinner fa-spin'></i> Saving...">
            <i class="fa fa-save" style="margin-right: 10px;"></i>
            Save Fields
        </button>
        <button type="button" id="cancelButton" class="btn btn-default btn-lg hover-lift-modern">
            <i class="fa fa-times" style="margin-right: 10px;"></i>
            Cancel
        </button>
    </div>
</div>