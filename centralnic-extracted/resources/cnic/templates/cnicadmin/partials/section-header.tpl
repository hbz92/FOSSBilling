{*
 * CNIC Admin - Reusable Section Header Template
 * 
 * This template provides a consistent header structure for all CNIC Admin sections.
 * It eliminates code duplication and ensures uniform appearance across the addon.
 * 
 * Required Parameters:
 * - $title: The main title of the section
 * - $icon: FontAwesome icon class (e.g., "fas fa-list")
 * 
 * Optional Parameters:
 * - $subtitle: Description text below the title
 * - $stats_text: Text for the right-side stats area
 * - $stats_icon: Icon for the stats area (defaults to "fas fa-info-circle")
 * - $documentation_url: URL for documentation link
 * - $panel_type: Panel type class (defaults to "panel-default")
 * - $custom_class: Additional CSS classes for the panel
 *}

{* Set default values for optional parameters *}
{if !isset($panel_type)}{assign var="panel_type" value="panel-default"}{/if}
{if !isset($stats_icon)}{assign var="stats_icon" value="fas fa-info-circle"}{/if}
{if !isset($custom_class)}{assign var="custom_class" value=""}{/if}

<div class="panel {$panel_type} {$custom_class}">
    <div class="panel-heading">
        <div class="row cnic-align-items-center">
            <div class="col-md-8">
                <h3 class="panel-title cnic-section-title">
                    <i class="{$icon}" aria-hidden="true"></i>
                    {$title}
                </h3>
                {if isset($subtitle) && $subtitle}
                    <p class="cnic-section-subtitle">
                        {$subtitle}
                    </p>
                {/if}
            </div>
            <div class="col-md-4 text-right">
                {if isset($documentation_url) && $documentation_url}
                    <a href="{$documentation_url}" target="_blank" rel="noopener" class="cnic-documentation-btn">
                        <i class="fa fa-book" aria-hidden="true"></i> Documentation
                    </a>
                {elseif isset($stats_text) && $stats_text}
                    <div class="header-stats cnic-header-stats">
                        <i class="{$stats_icon}" aria-hidden="true"></i>
                        {$stats_text|escape:'html'}
                    </div>
                {/if}
            </div>
        </div>
        <!-- Modern decoration -->
        <div class="cnic-header-decoration"></div>
    </div>
    <div class="panel-body cnic-section-body">
        <!-- Alerts placeholder -->
        <div id="alertContainer" aria-live="polite" role="alert" class="cnic-alert-container"></div>
        
        {* Content will be included after this template *}