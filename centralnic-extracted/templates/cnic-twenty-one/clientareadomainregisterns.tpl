{if $result}
    {include file="$template/includes/alert.tpl" type="warning" msg=$result textcenter=true}
{/if}

{include file="$template/includes/alert.tpl" type="info" msg="{lang key='domainregisternsexplanation'}"}

<!-- CNIC/ISPAPI: private nameserver list injection: START -->
{if (!empty($hosts))}
<div class="card">
    <div class="card-body">
        <h3 class="card-title">{lang key='domainprivatenameservers'}</h3>
        <table class="table table-sm table-bordered table-striped">
            <thead>
                <tr>
                    <th>{lang key='domainregisternsns'}</th>
                    <th>{lang key='domainregisternsip'}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            {foreach from=$hosts key=$hname item=$item}
                <tr>
                    <td>{$hname}</td>
                    <td>{$item.ips|implode:", <br/>"}</td>
                    <td>
                        <form role="form" method="post">
                            <input type="hidden" name="action" value="domainregisterns" />
                            <input type="hidden" name="sub" value="delete" />
                            <input type="hidden" name="domainid" value="{$domainid}" />
                            <input type="hidden" name="ns" value="{$item.sub}" />
                            <button type="submit" class="btn btn-sm btn-default"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>
</div>
{/if}
<!-- CNIC/ISPAPI: private nameserver list injection: END -->

<div class="card">
    <div class="card-body">
        <form role="form" method="post" action="{$smarty.server.PHP_SELF}?action=domainregisterns">
            <input type="hidden" name="sub" value="register" />
            <input type="hidden" name="domainid" value="{$domainid}" />

            <h3 class="card-title">{lang key='domainregisternsreg'}</h3>

            <div class="form-group row">
                <label for="inputNs1" class="col-md-4 col-form-label">{lang key='domainregisternsns'}</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputNs1" name="ns" />
                        <div class="input-group-append">
                            <span class="input-group-text">. {$domain}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputIp1" class="col-md-4 col-form-label">{lang key='domainregisternsip'}</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="inputIp1" name="ipaddress" />
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">
                    {lang key='clientareasavechanges'}
                </button>
            </div>

        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form role="form" method="post" action="{$smarty.server.PHP_SELF}?action=domainregisterns">
            <input type="hidden" name="sub" value="modify" />
            <input type="hidden" name="domainid" value="{$domainid}" />

            <h3 class="card-title">{lang key='domainregisternsmod'}</h3>

            <div class="form-group row">
                <label for="inputNs2" class="col-md-4 col-form-label">{lang key='domainregisternsns'}</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputNs2" name="ns" />
                        <div class="input-group-append">
                            <span class="input-group-text">. {$domain}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputIp2" class="col-md-4 col-form-label">{lang key='domainregisternscurrentip'}</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="inputIp2" name="currentipaddress" />
                </div>
            </div>
            <div class="form-group row">
                <label for="inputIp3" class="col-md-4 col-form-label">{lang key='domainregisternsnewip'}</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" id="inputIp3" name="newipaddress" />
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">
                    {lang key='clientareasavechanges'}
                </button>
            </div>

        </form>
    </div>
</div>

<!-- CNIC/ISPAPI: removal of private nameserver deletion form: START -->
<!-- CNIC/ISPAPI: removal of private nameserver deletion form: END -->
