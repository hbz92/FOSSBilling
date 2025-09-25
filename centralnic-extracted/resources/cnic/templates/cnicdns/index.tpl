{include file="modals/template.tpl"}
{include file="modals/apply.tpl"}
{include file="includes/alerts.tpl"}

<div class="admin-tabs-v2">
  <input type="hidden" name="description" value="[DNS]" />
  <ul class="nav nav-tabs admin-tabs admin-tabs-v2 tld-tabs" role="tablist">
    <li class="active">
      <a aria-controls="templates" role="tab" data-toggle="tab" href="#templates">
        <i class="fas fa-folder-open"></i> Templates
      </a>
    </li>
    <li class="tab">
      <a aria-controls="apply" role="tab" data-toggle="tab" href="#apply">
        <i class="fas fa-paint-roller"></i> Bulk Apply
      </a>
    </li>
    <li class="tab">
      <a href="systemactivitylog.php?description=[DNS]">
        <i class="fas fa-file-alt"></i> {AdminLang::trans('utilities.logs')}
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
    <div role="tabpanel" class="tab-pane fade in active" id="templates">
      {include file="tabs/templates.tpl"}
    </div>
    <div role="tabpanel" class="tab-pane fade in" id="apply">
      {include file="tabs/apply.tpl"}
    </div>
  </div>
</div>