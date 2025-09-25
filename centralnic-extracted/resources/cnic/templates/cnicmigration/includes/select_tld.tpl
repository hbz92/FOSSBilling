<select name="tld" class="form-control tldselection selectize selectized">
    <option value="">Select One ...</option>
    <option value="*">All TLDs</option>
    {foreach from=$tlds item=tld}
    <option value="{$tld}">{$tld}</option>
    {/foreach}
</select>
