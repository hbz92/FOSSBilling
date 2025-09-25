{if $error}
    <div class="alert alert-danger">{$error}</div>
{/if}
{if $fileName}
    <div class="alert alert-info">
        Please create a file {$fileName} on your webserver and put the following contents in it:
        <br>{$fileContents}
    </div>
{/if}
{if $dnsRecords}
    <div class="alert alert-info">
        Please create the following DNS records:
        <br>{$dnsRecords}
    </div>
{/if}

Choose the desired validation method:

<form method="post" action="">
    <div class="form-group">
        <input type="radio" id="email" name="dcvmethod" value="email">
        <label for="email">Email</label><br>
        <input type="radio" id="dns" name="dcvmethod" value="dns-cname">
        <label for="dns">DNS</label><br>
        <input type="radio" id="file" name="dcvmethod" value="https">
        <label for="file">HTTP File</label>
    </div>

    <button type="submit" class="btn btn-primary">Change</button>
</form>

{* TODO: use template of configure ssl step 2/3 *}
