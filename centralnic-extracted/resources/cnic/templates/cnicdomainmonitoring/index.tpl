<link rel="stylesheet" href="{$cssPath}/style.css">
<!-- Page Container -->
<div class="container-fluid mt-4">
    <!-- Page Header -->
    <div class="row mb-4">
        <div class="col">
            <p class="text-muted">Monitor and manage domain issues efficiently.</p>
        </div>
    </div>

    <!-- Domain Monitoring Table -->
    <div class="row">
        <div class="col">
            <table id="domain-monitoring-list" class="table table-striped table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>Domain Name</th>
                        <th class="col-xs-6">Description</th>
                        <th>Registrar</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach $issues as $issue}
                        <tr data-id="{$issue->id}" data-status="{$issue->status}" data-type="{$issue->type}"
                            data-domainid="{$issue->domainId}" data-todoid="{$issue->todoId}">
                            <td data-domain="{$issue->domainName}" class="text-center"
                                style="vertical-align: middle;font-size:1.2em;">
                                <a href="./clientsdomains.php?id={$issue->domainId}"
                                    target="_blank">{$issue->domainName}</a>
                            </td>
                            <td data-desc="{$issue->todoDesc|nl2br}" class="text-wrap" style="vertical-align: middle;">
                                {if $issue->status eq "Completed"}
                                    <p>The domain pricing has been updated. Please review the domain's billing to ensure
                                accurate
                                records.</p>
                            <p><strong>To recalculate the domain pricing, please follow these steps:</strong></p>
                            <ol>
                                <li>Click on the provided URL: <a target="_blank" style="text-decoration:underline"
                                        href="./clientsdomains.php?id={$issue->domainId}">clientsdomains.php?id={$issue->domainId}</a>
                                </li>
                                <li>Toggle "Recalculate on Save" to "Yes".</li>
                                <li>Click the "Save" button to apply the changes and recalculate the prices.</li>
                            </ol>
                            <p><strong>* Additionally steps may be required:</strong><br />
                            <ol>
                                <li>Cancel & Refund the original Invoice & Order.</li>
                                <li>Initiate the renewal/transfer again via Client Area.</li>
                            </ol>
                            {else}
                            Our addon has detected that the domain has been upgraded to a premium domain by the TLD
                            provider, or its premium pricing has been adjusted. Please click the 'Fix Now' button to
                            update the status and reflect the new premium domain pricing in WHMCS. {/if}
                        </td>
                        <td data-registrar="{$issue->domainRegistrar}" style="vertical-align: middle;text-align:center">
                            {if $issue->domainRegistrar eq "ispapi"} Hexonet (ISPAPI)
                            {elseif $issue->domainRegistrar eq 'cnic'} CentralNic Reseller (CNIC)
                            {else}
                            <p class="text-danger">Not Supported</p>
                            {/if}
                        </td>
                        <td data-status="{$issue->status}" style="vertical-align: middle;text-align:center">
                            {if $issue->status eq "Completed"}
                            <span class="badge badge-success cnic-custom-badge-success">Updated Successfully</span>
                            {else}
                            <span class="badge badge-warning cnic-custom-badge-warning">{$issue->status}</span>
                            {/if}
                        </td>
                        <td id="dataActions" style="vertical-align: middle;text-align:center">
                            {if $issue->status eq "Completed"}
                            <button type="button" class="btn btn-danger btn-sm deleteBtn">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                            {else}
                            <button type="button" data-toggle="modal" data-target="#domainFixModal"
                                class="btn btn-primary btn-sm fixNowBtn">
                                <i class="fas fa-wrench"></i> Fix Now
                            </button>
                            {/if}
                        </td>
                    </tr>
                    {/foreach}
                </tbody>
                <tfoot>
                    <tr>
                        <th>Domain Name</th>
                        <th>Description</th>
                        <th>Registrar</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <p class="text-danger">
            * Please be aware that the domain may have either been upgraded to
            premium status
            and/or the renewal/transfer pricing has been adjusted. It's crucial to thoroughly
                    review and
                    update the billing to maintain precise records and prevent any discrepancies between
                    your
                    reseller cost and the customer's original payment. In the event of a discrepancy,
                    you may be
                    required to cover the difference instead of the customer.
                </p>
            </div>

            <!-- Domain Fix Modal -->
            {include file="partials/modal.tpl"}
        </div>