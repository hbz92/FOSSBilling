{* Event details template for the modal content *}
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-modern cnic-mb-20">
            <div class="panel-heading cnic-panel-header">
                <h5 class="panel-title">
                    <div class="cnic-icon-wrapper blue">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    Event Information
                </h5>
            </div>
            <div class="panel-body cnic-card-body">
                <div class="cnic-field-group">
                    <div class="cnic-field-item">
                        <label class="cnic-field-label">Class</label>
                        <span class="badge badge-info cnic-badge">{$eventDetails.class|default:'N/A'|escape}</span>
                    </div>
                    <div class="cnic-field-item">
                        <label class="cnic-field-label">Subclass</label>
                        <span class="badge badge-secondary cnic-badge">{$eventDetails.subclass|default:'N/A'|escape}</span>
                    </div>
                    <div class="cnic-field-item">
                        <label class="cnic-field-label">Date</label>
                        <div class="cnic-mono-display">
                            {$eventDetails.date|default:'N/A'|escape}
                        </div>
                    </div>
                    <div class="cnic-field-item">
                        <label class="cnic-field-label">Object ID</label>
                        <code class="cnic-code-block">{$eventDetails.objectid|default:'N/A'|escape}</code>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-modern cnic-mb-20">
            <div class="panel-heading cnic-panel-header">
                <h5 class="panel-title">
                    <div class="cnic-icon-wrapper green">
                        <i class="fas fa-server"></i>
                    </div>
                    Request Details
                </h5>
            </div>
            <div class="panel-body cnic-card-body">
                <div class="cnic-field-group">
                    <div class="cnic-field-item">
                        <label class="cnic-field-label">Info</label>
                        <div class="cnic-text-area">
                            {$eventInfo|default:'No additional information available'|escape}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{if $eventDetails.data && count($eventDetails.data) > 0}
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-modern">
            <div class="panel-heading cnic-panel-header">
                <h5 class="panel-title">
                    <div class="cnic-icon-wrapper purple">
                        <i class="fas fa-reply"></i>
                    </div>
                    Response Details
                </h5>
            </div>
            <div class="panel-body cnic-card-body">
                <div class="cnic-light-container">
                    <div class="list-group cnic-list-group">
                        {foreach $eventDetails.data as $index => $item}
                            <div class="list-group-item cnic-status-item">
                                <span class="cnic-status-number">#{$index + 1}</span>
                                <span class="cnic-status-text">{$item|escape}</span>
                            </div>
                        {/foreach}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{else}
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-modern">
            <div class="panel-heading cnic-panel-header">
                <h5 class="panel-title">
                    <div class="cnic-icon-wrapper purple">
                        <i class="fas fa-reply"></i>
                    </div>
                    Response Details
                </h5>
            </div>
            <div class="panel-body cnic-card-body">
                <div class="cnic-empty-state">
                    <i class="fas fa-inbox"></i>
                    <p>No additional response data available</p>
                </div>
            </div>
        </div>
    </div>
</div>
{/if}