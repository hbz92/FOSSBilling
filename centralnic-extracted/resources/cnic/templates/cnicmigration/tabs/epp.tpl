<h1>EPP Codes</h1>
<div class="container">
  <form action="" method="post" id="frm-add-epp">
    <div class="row">
      <div class="col-md-4">
        <div class="input-group">
          <span class="input-group-addon" id="domainName">Domain</span>
          <input type="text" class="form-control" aria-describedby="domainName" placeholder="Type the domain name here"
            name="domain" required />
        </div>
      </div>
      <div class="col-md-4">
        <div class="input-group">
          <span class="input-group-addon" id="domainEPPCode">EPP Code</span>
          <input type="text" class="form-control" aria-describedby="domainEPPCode"
            placeholder="Type domain authorization code here" name="eppcode" required />
        </div>
      </div>
      <div class="col-md-2">
        <button class="btn btn-default btn-block btn-sm" data-toggle="tooltip"
          title="{$lang_eppSingleBtnToolTipMsg}">{$lang_eppSingleBtn} <span class="glyphicon glyphicon-send"
            aria-hidden="true"></span></button>
      </div>
    </div>
  </form>
  <form action="" method="post" id="frm-add-epp-csv">
    <div class="row">
      <div class="col-md-10">
        <div class="text-center" style="padding:10px"><span style="color:grey;"> -- or -- </span></div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-7">
        <div class="input-group">
          <span class="input-group-addon" id="importEPPCsv">{$lang_eppBulkBtn}</span>
          <input class="form-control form-control-sm" aria-describedby="importEPPCsv" id="importEPPCsvFile" type="file"
            name="CSV" required />
        </div>
      </div>
      <div class="col-lg-3">
        <button class="btn btn-default btn-block btn-sm" id="submitCSV" data-toggle="tooltip" data-html="true"
          title="{$lang_eppBulkBtnToolTipMsg}">Upload <b>.CSV</b> File <span class="glyphicon glyphicon-cloud-upload"
            aria-hidden="true"></span></button>
        <div class="text-muted text-center" style="font-size:12px">
          <a href="{$csvPath}/domains_epp_sample.csv" class="text-muted">
            {$lang_downloadEppSampleMsg}</a>
        </div>
      </div>
    </div>
  </form>
  <div class="row">
    <div class="col-md-10">
      <hr style="border-top: 2px dashed #eee;margin-top:5px" />
    </div>
  </div>
</div>
<table id="tbl-epp" class="datatable stripe hover" width="100%" border="0" cellspacing="2" cellpadding="3"
  data-order='[[ 0, "desc" ]]'>
  <thead>
    <tr>
      <th>Domain</th>
      <th>EPP Code</th>
      <th data-orderable="false" data-searchable="false">Action</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
</table>

<button class="btn btn-default" id="btn-refresh-epp"><i class="fas fa-sync"></i> Reload</button>

<script>
  let tblEpp;
</script>
<script type="text/javascript" src="{$jsPath}/epp.js?date()"></script>