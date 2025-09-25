<select name="email" class="form-control tplselection selectize selectized">
    <option value="">Select One ...</option>
    <option value="0">None</option>
    <option value="default">MIGRATION_DEFAULT</option>
    {foreach from=$templates key=id item=name}
        {if $name neq 'MIGRATION_DEFAULT'}
            <option value="{$id}">{$name}</option>
        {/if}
    {/foreach}
    <option value="new">*Generate new*</option>
</select>