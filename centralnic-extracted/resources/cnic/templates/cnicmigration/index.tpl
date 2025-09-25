<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript"
  src="https://cdn.datatables.net/v/bs/jszip-2.5.0/b-2.0.0/b-html5-2.0.0/b-print-2.0.0/datatables.min.js"></script>
<script>
  modulelink = '{$modulelink}'; 
</script>
<script type="text/javascript" src="{$jsPath}/importcsv.js"></script>

{include file="modals/support.tpl"}

<div id="info-alert" class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-hide="alert" aria-label="Close"><span
      aria-hidden="true">&times;</span></button>
  <i class="fas fa-check-circle"></i> <strong><span id="info-title"></span></strong>: <span id="info-message"></span>
</div>
<div id="success-alert" class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-hide="alert" aria-label="Close"><span
      aria-hidden="true">&times;</span></button>
  <i class="fas fa-check-circle"></i> <strong>Success</strong>: <span id="success-message"></span>
</div>
<div id="error-alert" class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-hide="alert" aria-label="Close"><span
      aria-hidden="true">&times;</span></button>
  <i class="fas fa-times-circle"></i> <strong>Error</strong>: <span id="error-message"></span>
</div>

<div class="admin-tabs-v2">
  <ul class="nav nav-tabs admin-tabs admin-tabs-v2 tld-tabs" role="tablist">
    <li class="active">
      <a aria-controls="upcoming" role="tab" data-toggle="tab" href="#upcoming">
        <i class="fas fa-calendar-alt"></i> Upcoming Migrations
      </a>
    </li>
    <li class="tab">
      <a aria-controls="pending" role="tab" data-toggle="tab" href="#pending">
        <i class="fas fa-truck"></i> Pending Migrations
      </a>
    </li>
    <li class="tab">
      <a aria-controls="config" role="tab" data-toggle="tab" href="#logs">
        <i class="fas fa-th-list"></i> Logs
      </a>
    </li>
    <li class="tab">
      <a aria-controls="config" role="tab" data-toggle="tab" href="#mappings">
        <i class="fas fa-sliders-h"></i> Mappings
      </a>
    </li>
    <li class="tab">
      <a aria-controls="config" role="tab" data-toggle="tab" href="#epp">
        <i class="fas fa-key"></i> EPP Codes
      </a>
    </li>
    <li class="dropdown pull-right tabdrop"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i
          class="fab fa-readme"></i> Documentation <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li class="" role="presentation">
          <a target="_blank"
            href="https://support.centralnicreseller.com/hc/en-gb/articles/13508522630941-WHMCS-DNS-Templating-Addon">CentralNic
            Reseller
          </a>
        </li>
        <li class="" role="presentation">
          <a target="_blank"
            href="https://www.hexonet.support/hc/en-gb/articles/13655180049437-WHMCS-DNS-Templating-Addon">HEXONET
          </a>
        </li>
      </ul>
    </li>
    <li class="dropdown pull-right tabdrop"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i
          class="fas fa-life-ring"></i> Support <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li class="" role="presentation">
          <a target="_blank"
            href="https://support.centralnicreseller.com/hc/en-gb?utm_source=whmcs&utm_medium=direct&utm_campaign=whmcs-bundle">CentralNic
            Reseller
          </a>
        </li>
        <li class="" role="presentation">
          <a target="_blank" href="https://www.hexonet.support/hc/en-gb?utm_source=whmcs&utm_medium=direct&utm_campaign=whmcs-bundle">HEXONET
          </a>
        </li>
      </ul>
    </li>
  </ul>

  <div class="tab-content admin-tabs">
    <div role="tabpanel" class="tab-pane fade in active" id="upcoming">
      {include file="tabs/upcoming.tpl"}
    </div>
    <div role="tabpanel" class="tab-pane fade in" id="pending">
      {include file="tabs/pending.tpl"}
    </div>
    <div role="tabpanel" class="tab-pane fade in" id="logs">
      {include file="tabs/logs.tpl"}
    </div>
    <div role="tabpanel" class="tab-pane fade" id="mappings">
      {include file="tabs/mappings.tpl"}
    </div>
    <div role="tabpanel" class="tab-pane fade" id="epp">
      {include file="tabs/epp.tpl"}
    </div>
  </div>
</div>