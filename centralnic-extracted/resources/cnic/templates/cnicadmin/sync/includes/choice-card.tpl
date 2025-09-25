{*
 * Reusable Choice Card Component
 * Parameters:
 * - $id: Unique ID for the choice
 * - $value: Value for the radio/checkbox
 * - $name: Input name attribute
 * - $type: Input type (radio or checkbox)
 * - $title: Card title
 * - $description: Card description
 * - $icon: FontAwesome icon class
 * - $iconColor: Icon color variant (blue, green, orange, purple)
 * - $checked: Whether the option is selected (optional)
 * - $disabled: Whether the option is disabled (optional)
 *}

{assign var="cardId" value=$id|default:"choice-"|cat:$value}
{assign var="inputType" value=$type|default:"radio"}
{assign var="isChecked" value=$checked|default:false}
{assign var="isDisabled" value=$disabled|default:false}
{assign var="iconVariant" value=$iconColor|default:"blue"}

<div class="col-md-6 col-lg-4 margin-bottom-3">
    <div class="{$inputType}">
        <label class="cnic-choice-card {if $isChecked}selected{/if}" for="{$cardId}">
            
            <input type="{$inputType}" 
                   id="{$cardId}" 
                   name="{$name}" 
                   value="{$value}" 
                   {if $isChecked}checked{/if}
                   {if $isDisabled}disabled{/if}
                   class="choice-input">
            
            <div class="choice-content">
                <div class="choice-header">
                    <div class="cnic-icon-wrapper {$iconVariant}">
                        <i class="fa {$icon}"></i>
                    </div>
                    <div class="choice-info">
                        <div class="choice-title">
                            <strong>{$title}</strong>
                        </div>
                        <div class="choice-description">
                            <small class="text-muted">{$description}</small>
                        </div>
                    </div>
                    <div class="choice-indicator">
                        <div class="choice-check">
                            <i class="fa fa-check"></i>
                        </div>
                    </div>
                </div>
            </div>
        </label>
    </div>
</div>
