<h3 style="margin-bottom:25px;">WHOIS Settinngs</h3>

{if $successful}
	<div class="alert alert-success text-center">
    	<p>{$L::trans("changessavedsuccessfully")}</p>
	</div>
{/if}

{if $error}
	<div class="alert alert-danger text-center">
    	<p>{$error}</p>
	</div>
{/if}

<form method="POST" action="{$smarty.server.PHP_SELF}">
	<input type="hidden" name="action" value="domaindetails">
	<input type="hidden" name="id" value="{$domainid}">
	<input type="hidden" name="modop" value="custom">
	<input type="hidden" name="a" value="xwhoissettings">
  	<input type="hidden" name="submit" value="1">
  <div class="form-group">
    <label for="providername">Reseller Service Provider Name:</label> 
    <input id="providername" value="{$xwhoisdata.providername}" name="providername" type="text" class="form-control" required="required">
  </div>
  <div class="form-group">
    <label for="providerurl">Reseller Service Provider URL:</label> 
    <input id="providerurl" value="{$xwhoisdata.providerurl}" name="providerurl" type="text" class="form-control" required="required">
  </div>
  <div class="form-group">
    <label for="banner1">Banner Line 1:</label> 
    <input id="banner1" value="{$xwhoisdata.banner1}" name="banner1" type="text" class="form-control" required="required">
  </div>
  <div class="form-group">
    <label for="banner2">Banner Line 2:</label> 
    <input id="banner2" value="{$xwhoisdata.banner2}" name="banner2" type="text" class="form-control" required="required">
  </div>
  <div class="form-group">
    <label for="banner3">Banner Line 3:</label> 
    <input id="banner3" value="{$xwhoisdata.banner3}" name="banner3" type="text" class="form-control" required="required">
  </div> 
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Save</button>
  </div>
</form>
