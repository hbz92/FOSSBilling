<div class="cnic-field-row {$rowClass}" data-field-type="{$type}">
    <div class="cnic-field-header">
        <div class="cnic-field-label-wrapper">
            <label class="cnic-field-label">
                {$field.label|unescape:'html'}
                {if strpos($field.html, 'required') !== false}
                    <span class="cnic-required-badge">Required</span>
                {/if}
            </label>
        </div>
        <div class="cnic-field-visibility">
            <span class="cnic-visibility-label">Visibility</span>
            <div class="cnic-toggle-wrapper">
                <input type="hidden" name="toggle_{$fieldKey|escape:'html'}" value="{$field.visibility}" class="toggle-hidden" />
                <input type="checkbox" class="cnic-toggle" data-hidden="toggle_{$fieldKey|escape:'html'}"
                    {if $field.visibility === 1}checked{/if} />
                <label class="cnic-toggle-label"></label>
            </div>
        </div>
    </div>
    <div class="cnic-field-input">
        {$field.html|unescape:'html'|replace:'form-control':'form-control cnic-input'}
    </div>
    {if isset($helpTexts[$fieldKey])}
        <div class="cnic-field-help">
            <i class="fa fa-info-circle"></i>
            <span>{$helpTexts[$fieldKey]}</span>
        </div>
    {/if}
</div>