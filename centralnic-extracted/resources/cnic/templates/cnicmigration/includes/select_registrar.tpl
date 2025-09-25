<select class="form-control registrarselection selectize selectized" name="{$field}">
    <option value="">Select One ...</option>
    {if $field==="registrarfrom"}
    <option value="*">All Registrars</option>
    {/if}
    {foreach from=$registrars item=reg}
        {if !$cnic || $reg.isCNIC}
            <option value="{$reg.id}">{$reg.name}</option>
        {/if}
    {/foreach}
</select>
