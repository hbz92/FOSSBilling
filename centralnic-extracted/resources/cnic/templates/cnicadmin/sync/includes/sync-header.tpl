{*
 * Reusable Sync Header Component
 * Parameters:
 * - $title: Page title
 * - $icon: FontAwesome icon class
 * - $currentStep: Current step number
 * - $completedSteps: Array of completed step numbers
 *}

<!-- Enhanced Header with Progress -->
<div class="sync-header">
    <div class="fields-title">
        <i class="fa {$icon}" aria-hidden="true"></i> {$title}
    </div>
    
    {include file="sync/includes/progress-steps.tpl" currentStep=$currentStep completedSteps=$completedSteps}
    
    <!-- Alert Container for Messages -->
    <div id="alertContainer" aria-live="polite" role="alert" class="cnic-alert-container mt-3" style="min-height: 0; position: relative; z-index: 1000;"></div>
</div>
