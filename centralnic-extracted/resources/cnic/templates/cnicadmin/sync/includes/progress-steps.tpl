{*
 * Reusable Progress Steps Component
 * Parameters:
 * - $currentStep: 1, 2, or 3
 * - $completedSteps: array of completed step numbers
 *}

<!-- Modern Progress Steps -->
<div class="cnic-progress">
    <div class="row">
        <!-- Step 1: Registrar Selection -->
        <div class="col-sm-4">
            <div class="cnic-step {if $currentStep == 1}active{elseif in_array(1, $completedSteps)}completed{else}pending{/if} text-center">
                <div class="cnic-icon-wrapper {if $currentStep == 1}orange{elseif in_array(1, $completedSteps)}green{else}gray{/if}">
                    {if in_array(1, $completedSteps)}
                        <i class="fa fa-check"></i>
                    {else}
                        <i class="fa fa-server"></i>
                    {/if}
                </div>
                <h6 class="step-title {if $currentStep == 1}text-warning{elseif in_array(1, $completedSteps)}text-success{else}text-muted{/if}">Registrar Selected</h6>
                <small class="text-muted step-subtitle">Choose your registrar</small>
            </div>
        </div>
        
        <!-- Step 2: Configuration -->
        <div class="col-sm-4">
            <div class="cnic-step {if $currentStep == 2}active{elseif in_array(2, $completedSteps)}completed{else}pending{/if} text-center">
                <div class="cnic-icon-wrapper {if $currentStep == 2}blue{elseif in_array(2, $completedSteps)}green{else}gray{/if}">
                    {if in_array(2, $completedSteps)}
                        <i class="fa fa-check"></i>
                    {else}
                        <i class="fa fa-cogs"></i>
                    {/if}
                </div>
                <h6 class="step-title {if $currentStep == 2}text-primary{elseif in_array(2, $completedSteps)}text-success{else}text-muted{/if}">Configure Options</h6>
                <small class="text-muted step-subtitle">Set sync preferences</small>
            </div>
        </div>
        
        <!-- Step 3: Synchronize -->
        <div class="col-sm-4">
            <div class="cnic-step {if $currentStep == 3}active{elseif in_array(3, $completedSteps)}completed{else}pending{/if} text-center">
                <div class="cnic-icon-wrapper {if $currentStep == 3}purple{elseif in_array(3, $completedSteps)}green{else}gray{/if}">
                    {if in_array(3, $completedSteps)}
                        <i class="fa fa-check"></i>
                    {else}
                        <i class="fa fa-rocket"></i>
                    {/if}
                </div>
                <h6 class="step-title {if $currentStep == 3}text-purple{elseif in_array(3, $completedSteps)}text-success{else}text-muted{/if}">Synchronize</h6>
                <small class="text-muted step-subtitle">Execute sync process</small>
            </div>
        </div>
    </div>
</div>
