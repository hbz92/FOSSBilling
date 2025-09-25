{if $dnssec.isSupported}
    {include file="$templateDir/dnssec.tpl"}
{/if}
<div class="card">
    <div class="card-body">
        <h3 class="card-title">{lang key='domaindnsmanagement'}</h3>

        {include file="$templateDir/includes/alert.tpl" type="info" msg="{lang key='domaindnsmanagementdesc'}"}

        {if !empty($error)}
            {include file="$templateDir/includes/alert.tpl" type="error" msg=$error}
            <!-- CNIC: Add success message: START -->
        {elseif !empty($smarty.post["token"]) && !isset($smarty.post["dnssec-disable"]) && !isset($smarty.post["dnssec-enable"])}
            {include file="$templateDir/includes/alert.tpl" type="success" msg="{lang key='changessavedsuccessfully'}"}
            <!-- CNIC: Add success message: END -->
        {/if}

        <!-- CNIC: Show KeyDNS specific data: START -->
        {if isset($KeyDnsActive) and $KeyDnsActive === false}
            {include file="$templateDir/includes/alert.tpl" type="warning" msg="{$lang.keyDnsMsg} {$KeyDnsNameservers}"}
        {/if}
        <!-- CNIC: Show KeyDNS specific data: END -->

        {if $external}
            <div class="text-center px-4">
                {$code}
            </div>
        {else}

            {include file="$templateDir/includes/pendingChanges.tpl"}
            {include file="$templateDir/includes/addNewRecord.tpl"}

            <form method="post" class="form" role="form" id="dnsForm">
                <input type="hidden" name="action" value="saveDNS" />
                <input type="hidden" name="m" value="cnicdnsmanager" />
                <input type="hidden" name="sub" value="save" />
                <input type="hidden" name="domainid" value="{$domainid}" />
                <input type="hidden" name="dnszone" value="{$dnszone}" />
                <table class="table cnic-table table-striped">
                    <thead class="cnic-thead">
                        <tr class="cnic-tr">
                            <th class="cnic-th">{$lang.hostname}</th>
                            <th class="cnic-th">{$lang.ttl}</th>
                            <th class="cnic-th">{$lang.type}</th>
                            <th class="cnic-th" colspan="2">{$lang.address}</th>
                        </tr>
                    </thead>
                    <tbody id="dnsRecordsTableBody" class="cnic-tbody">
                        {if $dnsrecords|@count == 0}
                            <tr class="cnic-tr dns-record-empty">
                                <td class="cnic-td text-center" colspan="5">
                                    {$lang.noDnsRecordsFound}
                                </td>
                            </tr>
                        {else}
                            {foreach $dnsrecords as $dnsrecord}
                                <tr class="dns-record cnic-tr">
                                    <td class="cnic-td">
                                        <input type="hidden" name="dnsrecid[]" value="{$dnsrecord.recid}" />
                                        <input type="text" name="dnsrecordhost[]" value="{$dnsrecord.hostname}" size="10"
                                            class="form-control" readonly />
                                    </td>
                                    <td class="cnic-td">
                                        <input type="text" name="dnsrecordttl[]" value="{$dnsrecord.ttl}" size="6"
                                            class="form-control" readonly />
                                    </td>
                                    <td class="cnic-td">
                                        <select name="dnsrecordtype[]" class="form-control record-type" disabled>
                                            {foreach from=$dnsRecordTypes key=type item=label}
                                                <option value="{$type}" {if $dnsrecord.type eq $type} selected="selected" {/if}>{$label}
                                                </option>
                                            {/foreach}
                                        </select>
                                    </td>
                                    <td class="cnic-td" colspan="2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center address-priority-wrapper">
                                                <input type="text" name="dnsrecordaddress[]"
                                                    value="{$dnsrecord.address|escape:'htmlall'}" size="40"
                                                    class="form-control cnicEllipsis" readonly />
                                                <input
                                                    type="{if in_array($dnsrecord.type, $prioritySupportedRecordTypes)}text{else}hidden{/if}"
                                                    name="dnsrecordpriority[]"
                                                    value="{if in_array($dnsrecord.type, $prioritySupportedRecordTypes)}{$dnsrecord.priority}{else}N/A{/if}"
                                                    size="2" class="form-control priority-input" placeholder="* {$lang.priority}"
                                                    readonly />
                                            </div>
                                            <button type="button" class="btn btn-sm delete-record cnicDeleteBtn"><i
                                                    class="fa fa-trash"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            {/foreach}
                        {/if}
                    </tbody>
                </table>
            </form>
            <p class="text-right text-muted">
                <small>{$lang.mxdesc}</small>
            </p>

            <div class="text-center">
                <button type="submit" id="submitButton" class="btn btn-primary" disabled>
                    <i class="fa fa-spinner fa-spin" id="loaderIcon" style="display: none;"></i>
                    {$lang.saveChanges}
                </button>
                <button type="reset" id="resetButton" class="btn btn-default">
                    {$lang.cancelChanges}
                </button>
            </div>

        {/if}

    </div>
</div>

{include file="$templateDir/includes/modal.tpl"}