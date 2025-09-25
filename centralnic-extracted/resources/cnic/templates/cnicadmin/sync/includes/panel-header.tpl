{*
 * Reusable Modern Panel Header
 * Parameters:
 * - $title: Panel title
 * - $icon: FontAwesome icon class  
 * - $step: Step number (optional)
 * - $description: Panel description (optional)
 * - $gradient: Gradient colors (optional, defaults to blue gradient)
 * - $timestamp: Show timestamp (optional)
 *}

<div class="panel-heading">
    <div class="row">
        <div class="col-sm-8">
            <h4 class="panel-title">
                <div class="cnic-icon-wrapper blue">
                    <i class="fa {$icon}"></i>
                </div>
                {$title}
            </h4>
            {if $description}
                <p class="panel-description">{$description}</p>
            {/if}
        </div>
        <div class="col-sm-4 text-right">
            {if $step}
                <span class="cnic-badge panel-badge">
                    <i class="fa fa-list-ol"></i> Step {$step}
                </span>
            {/if}
            {if $timestamp}
                <span class="cnic-badge panel-badge">
                    <i class="fa fa-clock"></i> {$smarty.now|date_format:"%Y-%m-%d %H:%M"}
                </span>
            {/if}
        </div>
    </div>
</div>
