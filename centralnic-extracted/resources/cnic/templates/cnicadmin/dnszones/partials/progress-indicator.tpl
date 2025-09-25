{*
 * DNS Zone Management - Progress Indicator
 * 
 * Variables:
 * - $currentStep (int): Current active step (1 or 2)
 * - $step1Status (string): 'active', 'completed', 'pending'
 * - $step2Status (string): 'active', 'completed', 'pending'
 *}

<!-- Progress Steps -->
<div class="progress-container" style="background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%); border-radius: 12px; padding: 20px; margin-bottom: 30px; border: 1px solid #cbd5e1;">
    <div class="row">
        <!-- Step 1: DNS Zone Discovery -->
        <div class="col-sm-6">
            <div class="step-modern {$step1Status}" style="text-align: center; position: relative;">
                {if $step1Status == 'active'}
                    <div class="step-circle" style="width: 48px; height: 48px; background: linear-gradient(135deg, #f39c12, #e67e22); animation: pulse 2s infinite; color: white; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 12px; box-shadow: 0 4px 12px rgba(243, 156, 18, 0.3);">
                        <i class="fas fa-search" style="font-size: 18px;"></i>
                    </div>
                    <h6 style="color: #f39c12; font-weight: 600; margin: 0 0 4px 0; font-size: 14px;">Discover Zones</h6>
                    <small style="color: #64748b; font-size: 12px;">Configure discovery</small>
                {elseif $step1Status == 'completed'}
                    <div class="step-circle" style="width: 48px; height: 48px; background: linear-gradient(135deg, #10b981, #059669); color: white; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 12px; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);">
                        <i class="fas fa-check" style="font-size: 18px;"></i>
                    </div>
                    <h6 style="color: #10b981; font-weight: 600; margin: 0 0 4px 0; font-size: 14px;">Discovery Complete</h6>
                    <small style="color: #64748b; font-size: 12px;">Zones discovered</small>
                {else}
                    <div class="step-circle" style="width: 48px; height: 48px; background: #e2e8f0; color: #94a3b8; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 12px;">
                        <i class="fas fa-search" style="font-size: 18px;"></i>
                    </div>
                    <h6 style="color: #94a3b8; font-weight: 600; margin: 0 0 4px 0; font-size: 14px;">Discover Zones</h6>
                    <small style="color: #64748b; font-size: 12px;">Configure discovery</small>
                {/if}
                <!-- Connection line -->
                {if $currentStep == 1}
                    <div class="step-line" style="position: absolute; top: 24px; left: calc(50% + 24px); width: calc(100vw - 48px); height: 2px; background: linear-gradient(90deg, #f39c12, #94a3b8); z-index: 1; max-width: 300px;"></div>
                {elseif $step1Status == 'completed'}
                    <div class="step-line" style="position: absolute; top: 24px; left: calc(50% + 24px); width: calc(100vw - 48px); height: 2px; background: linear-gradient(90deg, #10b981, #3b82f6); z-index: 1; max-width: 200px;"></div>
                {/if}
            </div>
        </div>
        
        <!-- Step 2: Filter & Manage -->
        <div class="col-sm-6">
            <div class="step-modern {$step2Status}" style="text-align: center; position: relative;">
                {if $step2Status == 'active'}
                    <div class="step-circle" style="width: 48px; height: 48px; background: linear-gradient(135deg, #3b82f6, #1d4ed8); animation: pulse 2s infinite; color: white; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 12px; box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);">
                        <i class="fas fa-cog" style="font-size: 18px;"></i>
                    </div>
                    <h6 style="color: #3b82f6; font-weight: 600; margin: 0 0 4px 0; font-size: 14px;">Filter & Manage</h6>
                    <small style="color: #64748b; font-size: 12px;">Filter and manage zones</small>
                {elseif $step2Status == 'completed'}
                    <div class="step-circle" style="width: 48px; height: 48px; background: linear-gradient(135deg, #10b981, #059669); color: white; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 12px; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);">
                        <i class="fas fa-check" style="font-size: 18px;"></i>
                    </div>
                    <h6 style="color: #10b981; font-weight: 600; margin: 0 0 4px 0; font-size: 14px;">Management Complete</h6>
                    <small style="color: #64748b; font-size: 12px;">Zones managed</small>
                {else}
                    <div class="step-circle" style="width: 48px; height: 48px; background: #e2e8f0; color: #94a3b8; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 12px;">
                        <i class="fas fa-cog" style="font-size: 18px;"></i>
                    </div>
                    <h6 style="color: #94a3b8; font-weight: 600; margin: 0 0 4px 0; font-size: 14px;">Filter & Manage</h6>
                    <small style="color: #64748b; font-size: 12px;">Filter and manage zones</small>
                {/if}
            </div>
        </div>
    </div>
</div>
