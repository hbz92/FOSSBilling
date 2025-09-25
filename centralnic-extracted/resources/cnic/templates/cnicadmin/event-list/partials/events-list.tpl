{* Events list template - renders multiple events using includes *}
{if $events && count($events) > 0}
    {foreach $events as $event}
        {assign var="dateTime" value=$event.date}
        {assign var="objectId" value=$event.objectid|default:'-'}
        {assign var="eventJson" value=$event|json_encode}
        {include file="event-list/partials/event-row.tpl" event=$event dateTime=$dateTime objectId=$objectId eventJson=$eventJson}
    {/foreach}
{else}
    <tr>
        <td colspan="5" class="text-center text-muted">
            <i class="fas fa-info-circle"></i>
            No events found matching your criteria
        </td>
    </tr>
{/if}