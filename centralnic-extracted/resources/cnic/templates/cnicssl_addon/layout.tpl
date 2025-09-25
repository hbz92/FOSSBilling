<div class="pull-right" style="margin-top: -42px;">
    {$logo}
</div>

{if $error}
    <div class="alert alert-danger">
        <i class="fas fa-exclamation-circle"></i>
        <strong>Error!</strong> {$error}
    </div>
{elseif $success}
    <div class="alert alert-success">
        <i class="fas fa-check-circle"></i>
        <strong>Success!</strong> {$success}
    </div>
{/if}

{block name="content"}{/block}