<div class="tab-pane fade active show" id="tabEmailVerification">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">{$L::trans("emailverificationtitle")}</h2>

            {if $success}
                <div class="alert alert-success text-center">{$L::trans("domains.resendNotificationSuccess")}</div>
            {/if}

            {if $error}
                <div class="alert alert-danger text-center">{$error}</div>
            {/if}

            <div class="alert alert-warning text-center">
                {if $pendingVerification}
                    <p><strong>{$L::trans("domains.verificationRequired")}</strong></p>
                    <p>{$L::trans("domains.newRegistrationDate")|replace:':date':$timeToSuspension}</p>
                {else}
                    {$L::trans("emailverificationconsequences")}
                {/if}
            </div>

            <form method="POST" action="">
                <input type="hidden" name="action" value="domaindetails" />
                <input type="hidden" name="modop" value="custom" />
                <input type="hidden" name="a" value="EmailVerification" />
                <input type="hidden" name="domainid" value="{$domainid}" />
                <input type="hidden" name="token" value="{$token}" />
                <input type="hidden" name="sub" value="resend" />

                <div class="row mt-4">
                    <div class="col-md-8">
                        <p class="text">{$L::trans("emailverificationinfo")}</p>
                        <p class="text"><strong>{$email}</strong> {if $pendingVerification}<span
                                class="badge badge-warning">{$L::trans("emailverificationpending")}</span>{else}<span
                                class="badge badge-success">{$L::trans("verified")}</span>{/if}</p>
                    </div>
                </div>

                {if $pendingVerification}
                    <div class="alert alert-info mt-4">{$L::trans("emailverificationresendemailinfo")}</div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-primary">{$L::trans("domains.resendNotification")}</button>
                    </div>
                {/if}
            </form>
        </div>
    </div>
</div>