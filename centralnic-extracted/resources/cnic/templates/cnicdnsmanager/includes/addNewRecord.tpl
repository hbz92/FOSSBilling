<div class="ml-3 mr-2 mb-2">
    <div class="row align-items-center addNewRecord">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-4 p-1" id="newDnsRecordHostWrapper">
                    <input type="hidden" name="dnsrecid[]" value="" />
                    {foreach $prioritySupportedRecordTypes as $priorityResourceRecord}
                        <input type="hidden" name="prioritySupportedRecordType[]" value="{$priorityResourceRecord}" />
                    {/foreach}
                    <input type="text" id="newDnsRecordHost" class="form-control" placeholder="{$lang.hostname}" />
                </div>
                <div class="col-md-2 p-1" id="newDnsRecordTtlWrapper">
                    <input type="text" id="newDnsRecordTtl" class="form-control" placeholder="{$lang.ttl}" />
                </div>
                <div class="col-md-2 p-1" id="newDnsRecordTypeWrapper">
                    <select id="newDnsRecordType" class="form-control record-type">
                        {foreach from=$dnsRecordTypes key=type item=label}
                            <option value="{$type}">{$label}</option>
                        {/foreach}
                    </select>
                </div>
                <div class="col-md-4 p-1" id="newDnsRecordAddressWrapper">
                    <input type="text" id="newDnsRecordAddress" class="form-control" placeholder="{$lang.address}" />
                </div>
                <div class="col-md-2 p-1" id="newDnsRecordPriorityWrapper" style="display: none;">
                    <input type="text" id="newDnsRecordPriority" value="N/A" class="form-control priority-input"
                        placeholder="* {$lang.priority}" />
                </div>
            </div>
        </div>
        <div class="col-md-2 p-1">
            <button type="button" id="addRecordButton" class="form-control btn btn-primary cnicAddRecordButton">
                <i class="fa fa-plus"></i> {$lang.addRecord}
            </button>
        </div>
    </div>
</div>