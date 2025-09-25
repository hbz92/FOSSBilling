
<div class="modal fade" id="migrate-modal1" tabindex="-1" role="dialog" aria-labelledby="migrate-modal-label1">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="migrate-modal-label1">Bulk Domain Migration Wizard - Step 1/3</h4>
            </div>
            <div class="modal-body" id="migrate-modal-body1">
                <div class="alert alert-info">
                    This wizard allows you to initiate a bulk migration.<br/>
                    It is advisable to only do this for domains that do not renew on transfer.
                </div>

                <div class="radio">
                    <label>
                        <input type="radio" name="wizard-mode" value="auto" checked>
                        Select all domains that qualify automatically
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="wizard-mode" value="manual">
                        Input a specific domain list manually
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="far fa-times-circle"></i> Close</button>
                <button type="button" class="btn btn-primary" id="btn-modal1-next"><span id="lbl-go1">Next</span> <i id="icon-go1" class="fas fa-step-forward"></i></button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="migrate-modal2" tabindex="-1" role="dialog" aria-labelledby="migrate-modal-label2">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="migrate-modal-label2">Bulk Domain Migration Wizard - Step 2/3</h4>
            </div>
            <div class="modal-body" id="migrate-modal-body2">
                <div class="alert alert-warning">
                    Please note that any domains listed here that do not match any migration mapping will be skipped.
                </div>
                <div class="form-group">
                    <label for="txt-domains">List of domains to migrate (one per line):</label>
                    <textarea id="txt-domains" class="form-control" rows="15"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="far fa-times-circle"></i> Close</button>
                <button type="button" class="btn btn-default" id="btn-modal2-prev"><i class="fas fa-step-backward"></i> Back</button>
                <button type="button" class="btn btn-primary" id="btn-modal2-next">Next <i class="fas fa-step-forward"></i></button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="migrate-modal3" tabindex="-1" role="dialog" aria-labelledby="migrate-modal-label3">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="migrate-modal-label3">Migrate domains with free transfer - Step 3/3</h4>
            </div>
            <div class="modal-body" id="migrate-modal-body3">
                <span id="progress-status">Ready</span>
                <div class="progress">
                    <div class="progress-bar progress-bar-success" style="width: 0"></div>
                    <div class="progress-bar progress-bar-danger" style="width: 0"></div>
                </div>
                <ul class="list-group">
                    <li class="list-group-item">
                        <span id="progress-pending" class="badge">0</span>
                        Pending
                    </li>
                    <li class="list-group-item">
                        <span id="progress-failed" class="badge">0</span>
                        Failed
                    </li>
                    <li class="list-group-item">
                        <span id="progress-success" class="badge">0</span>
                        Successful
                    </li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="far fa-times-circle"></i> Close</button>
                <button type="button" class="btn btn-default" id="btn-modal3-prev"><i class="fas fa-step-backward"></i> Back</button>
                <button type="button" class="btn btn-primary" id="btn-migrate"><span id="lbl-migrate">Start</span> <i class="fas fa-play" id="migrate-icon"></i></button>
            </div>
        </div>
    </div>
</div>

<script>
    {literal}
    $(document).ready(function() {
        let migrateDomains = []
        let successDomains = 0
        let failedDomains = 0
        let migrationRunning = false

        $('#btn-modal1-next').click(function() {
            if ($("input:radio[name='wizard-mode']:checked").val() == 'auto') {
                $('#btn-modal1-next').prop('disabled', true)
                $('#lbl-go1').text('Loading...')
                $('#icon-go1').removeClass('fa-step-forward').addClass('fa-spinner fa-spin')
                $.get(`${modulelink}&page=service&action=get-free-transfer-domains`, {
                }).done(function(data) {
                    let txt = ''
                    for (const element of data) {
                        txt += element.name + '\n'
                    }
                    $('#txt-domains').val(txt)
                    $('#migrate-modal1').modal('hide')
                    $('#migrate-modal2').modal('show')
                    $('#btn-modal1-next').prop('disabled', false)
                    $('#lbl-go1').text('Next')
                    $('#icon-go1').removeClass('fa-spinner fa-spin').addClass('fa-step-forward')
                }).fail(function(response) {
                    ShowErrorMessage(response.responseText)
                })
            } else {
                $('#txt-domains').val('')
                $('#migrate-modal1').modal('hide')
                $('#migrate-modal2').modal('show')
            }
        })
        $('#btn-modal2-prev').click(function() {
            $('#migrate-modal2').modal('hide')
            $('#migrate-modal1').modal('show')
        })
        $('#btn-modal2-next').click(function() {
            migrateDomains = $('#txt-domains').val().split(/\n/).filter(function (str) { return str.length > 0 })
            $('#migrate-modal2').modal('hide')
            $('#migrate-modal3').modal('show')
        })
        $('#btn-modal3-prev').click(function() {
            $('#migrate-modal3').modal('hide')
            $('#migrate-modal2').modal('show')
        })
        $('#btn-migrate').click(function() {
            if (migrationRunning) {
                migrationRunning = false
                $('#lbl-migrate').text('Stopping...')
                $('#btn-migrate').prop('disabled', true)
            } else {
                migrationRunning = true
                $('#lbl-migrate').text('Stop')
                $('#migrate-icon').removeClass('fa-play').addClass('fa-stop')
                successDomains = 0
                failedDomains = 0
                updateProgress(successDomains, failedDomains)
                migrateDomain(0)
            }
        })

        $('#migrate-modal3').on('show.bs.modal', function (event) {
            updateProgress(0, 0)
            $('#progress-status').text('Ready')
            $('#btn-migrate').prop('disabled', migrateDomains.length < 1)
        }).on('hide.bs.modal', function () {
            migrationRunning = false
            $('#lbl-migrate').text('Start')
            $('#migrate-icon').removeClass('fa-stop fa-check fa-times').addClass('fa-play')
            $('#btn-migrate').prop('disabled', false)
            tblPending.ajax.reload()
            tblUpcoming.ajax.reload()
            tblLogs.ajax.reload()
        })

        function updateProgress(successCount, failureCount) {
            const totalDomains = migrateDomains.length
            let successPercent = Math.round(successCount * 100 / totalDomains)
            const failurePercent = Math.round(failureCount * 100 / totalDomains)
            if (successPercent + failurePercent > 100) {
                successPercent -= successPercent + failurePercent - 100
            }
            $('.progress-bar-success').css({"width": successPercent + "%"})
            $('.progress-bar-danger').css({"width": failurePercent + "%"})
            $('#progress-success').text(successCount)
            $('#progress-failed').text(failureCount)
            $('#progress-pending').text(totalDomains - successCount - failureCount)
        }

        function migrateDomain(index) {
            if (migrateDomains[index] === undefined) {
                return
            }
            const domain = migrateDomains[index]
            $('#progress-status').text(`Processing ${domain}...`)
            $.post(`${modulelink}&page=service&action=migrate-domain`, {
                domain: domain
            }).done(function (data) {
                if (data !== null && data.success) {
                    successDomains++
                } else {
                    failedDomains++
                }
            }).fail(function (response) {
                failedDomains++
            }).always(function () {
                updateProgress(successDomains, failedDomains)
                index++
                if (!migrationRunning) {
                    $('#progress-status').text('Aborted')
                    $('#lbl-migrate').text('Aborted')
                    $('#migrate-icon').removeClass('fa-stop').addClass('fa-times')
                } else if (index < migrateDomains.length) {
                    migrateDomain(index)
                } else {
                    $('#progress-status').text('Done')
                    $('#lbl-migrate').text('Done')
                    $('#migrate-icon').removeClass('fa-stop').addClass('fa-check')
                    $('#btn-migrate').prop('disabled', true)
                }
            })
        }

    })
    {/literal}
</script>
