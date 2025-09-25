{* Event row template for the events table *}
<tr data-event-index="{$event.eventIndex|escape}" data-event='{$eventJson}'>
    <td class="cnic-dt-column-date event-date-column">
        <span class="event-datetime">{$dateTime|escape}</span>
    </td>
    <td class="cnic-dt-column-status event-class-column">
        <span class="badge badge-info">{$event.class|escape}</span>
    </td>
    <td class="cnic-dt-column-status event-subclass-column">
        <span class="badge badge-secondary">{$event.subclass|escape}</span>
    </td>
    <td class="cnic-dt-column-code event-object-column">
        <code class="cnic-dt-column-code event-object-id">{$objectId|escape}</code>
    </td>
    <td class="cnic-dt-column-actions event-actions-column">
        <button type="button" class="btn btn-info btn-xs hover-lift-modern" data-action="show-details" data-event-index="{$event.eventIndex|escape}">
            <i class="fas fa-eye"></i> Details
        </button>
    </td>
</tr>