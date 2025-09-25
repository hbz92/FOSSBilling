{if !$dnssec.disabled}
    <div class="alert alert-success alert-dismissible fade show p-4" role="alert"
        style="border-left: 5px solid #28a745; background-color: #e9f7ef;">
        <div class="d-flex align-items-center">
            <div>
                <span class="small">
                    {* 
                        Show different messages based on DNSSEC status:
                        - If DS Data matches and domain is signed, show success message.
                        - If DS Data matches but domain is not yet signed, show pending message.
                        - Otherwise, show generic active message.
                    *}
                    {if $dnssec.dnssecDataMatches && $dnssec.domainSigned}
                        {* DS Data matches and domain is signed *}
                        {$lang.dnssecDataMatchesAndSigned|replace:'#dnszone_placeholder#':$dnszone|replace:'#dnssecmanagementlink_placeholder#':$dnsseclink}
                    {elseif $dnssec.dnssecDataMatches && !$dnssec.domainSigned}
                        {* DS Data matches but domain is not signed yet *}
                        {$lang.dnssecSignedPending|replace:'#dnszone_placeholder#':$dnszone|replace:'#dnssecmanagementlink_placeholder#':$dnsseclink}
                    {else}
                        {* DS Data does not match or other state *}
                        {$lang.dnssecActiveMessage|replace:'#dnszone_placeholder#':$dnszone|replace:'#dnssecmanagementlink_placeholder#':$dnsseclink}
                    {/if}
                </span>
            </div>
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"
            style="position: absolute; top: 10px; right: 10px;">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    {*
        Show the DS Data form only when:
        - DNS Zone DS Data exists,
        - Domain-level DS Data is missing or does not match,
        - and Key Nameservers are active.
    *}
    {if $dnssec.keyData && $dnssec.dsData && (!$dnssec.dnssecDataMatches || !$dnssec.domainDnssecData) && $KeyDnsActive}
        <form action="/clientarea.php" method="post" class="mt-3">
            <input type="hidden" name="prefill" value="1" />
            <input type="hidden" name="action" value="domaindetails" />
            <input type="hidden" name="modop" value="custom" />
            <input type="hidden" name="a" value="dnssec" />
            <input type="hidden" name="domainid" value="{$domainid}" />
            <div class="form-group">
                <button type="submit" class="btn btn-info btn-sm btn-block mb-2">
                    {if !$dnssec.dnssecDataMatches && $dnssec.domainDnssecData}
                        {$lang.autoUpdateBtn}
                    {else}
                        {$lang.autoActivateBtn}
                    {/if}
                </button>
            </div>
        </form>
    {/if}
{/if}

{if !empty($dnssec.error)}
    <div class="alert alert-danger alert-dismissible fade show mt-3 p-4" role="alert"
        style="border-left: 5px solid #dc3545; background-color: #f8d7da;">
        <div class="d-flex align-items-center">
            <i class="fas fa-exclamation-circle text-danger mr-2" style="font-size: 1.5rem;"></i>
            <div>
                <span class="small"><b>{$lang.oopsError}</b> {$dnssec.error}</span>
            </div>
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"
            style="position: absolute; top: 10px; right: 10px;">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
{/if}