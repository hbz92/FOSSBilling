<div class="errorbox">
  <strong><span class="title">{$error}</span></strong><br>{$details}
  {if !empty($items)}<ul>{foreach $items as $item}<li>{$item}</li>{/foreach}</ul>{/if}
</div>