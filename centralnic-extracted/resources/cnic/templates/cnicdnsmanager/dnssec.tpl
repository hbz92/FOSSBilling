<div class="card">
    <div class="card-body" style="padding-bottom:0;padding-top:10px;">
        <h3 class="d-flex card-title justify-content-between align-items-center">
            <span>
                {$lang.dnszoneDnssecManagement}
                {if !$dnssec.disabled}
                    {if $dnssec.dsData || $dnssec.keyData}
                        <button class="btn btn-primary btn-sm" data-toggle="collapse" data-target="#dnssecRecords"
                            aria-expanded="false" aria-controls="dnssecRecords">
                            {$lang.viewDnssecRecords}
                        </button>
                    {else}
                        <small><label class="badge badge-warning text-uppercase">
                                {$lang.dnssecPending}
                            </label></small>
                    {/if}
                {else}
                    <small><label class="badge badge-danger text-uppercase">
                            {$lang.dnssecInactiveMessage}
                        </label></small>
                {/if}
            </span>
            <form method="post" class="form" role="form" id="dnsSecForm">
                {if $dnssec.disabled}
                    <button type="submit" name="dnssec-enable" class="btn btn-success btn-sm"
                        aria-label="Enable DNSSEC">{Lang::trans("enable")}</button>
                {else}
                    <button type="submit" name="dnssec-disable" class="btn btn-danger btn-sm"
                        aria-label="Disable DNSSEC">{Lang::trans("disable")}</button>
                {/if}
            </form>
        </h3>

        {include file="$templateDir/includes/dnssec_status.tpl"}

        <!-- Collapsible Section -->
        <div id="dnssecRecords" class="collapse">
            {if $dnssec.dsData}
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">{Lang::trans("domainDnsSec.dsRecords")}</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>{Lang::trans("domainDnsSec.keyTag")}</th>
                                    <th>{Lang::trans("domainDnsSec.algorithm")}</th>
                                    <th>{Lang::trans("domainDnsSec.digestType")}</th>
                                    <th>{Lang::trans("domainDnsSec.digest")}</th>
                                </tr>
                            </thead>
                            <tbody>
                                {foreach item=ds from=$dnssec.dsData name=secdnsds}
                                    <tr>
                                        <td class="text-nowrap">{$ds.keytag}</td>
                                        <td class="text-nowrap">{$dnssec.algOptions[$ds.alg]}</td>
                                        <td class="text-nowrap">{$dnssec.digestOptions[$ds.digesttype]}</td>
                                        <td class="text-truncate" style="max-width: 300px;">{$ds.digest}</td>
                                    </tr>
                                {/foreach}
                            </tbody>
                        </table>
                    </div>
                </div>
            {/if}

            {if $dnssec.keyData}
                <div class="card mt-3">
                    <div class="card-header">
                        <h4 class="card-title mb-0">{Lang::trans("domainDnsSec.keyRecords")}</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>{Lang::trans("domainDnsSec.flags")}</th>
                                    <th>{Lang::trans("domainDnsSec.algorithm")}</th>
                                    <th>{Lang::trans("domainDnsSec.publicKey")}</th>
                                </tr>
                            </thead>
                            <tbody>
                                {foreach item=key from=$dnssec.keyData name=secdnskey}
                                    <tr>
                                        <td class="text-nowrap">{$dnssec.flagOptions[$key.flags]}</td>
                                        <td class="text-nowrap">{$dnssec.algOptions[$key.alg]}</td>
                                        <td class="text-truncate" style="max-width: 300px;">{$key.pubkey}</td>
                                    </tr>
                                {/foreach}
                            </tbody>
                        </table>
                    </div>
                </div>
            {/if}
        </div>
    </div>
</div>