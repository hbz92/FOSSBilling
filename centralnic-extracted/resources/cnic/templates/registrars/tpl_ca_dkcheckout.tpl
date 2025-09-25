<div id="dkTacSection" class="section">
    <div class="sub-heading">
        <span class="primary-bg-color">{$L::trans("cnrdkcheckoutheading")}</span>
    </div>
    <div style="float:left;width:85%;">
        <p>{$L::trans("cnrdkcheckoutintro")}</p>
        <p><b>{$L::trans("cnrdkcheckoutdomains")}</b> {$domains}</p>
        <p><b>{$L::trans("cnrdkcheckoutregistrant")}</b> {$L::trans("cnrdkcheckoutregistrantaddress")}</p>
        <p><b>{$L::trans("cnrdkcheckoutadmin")}</b><br />{$L::trans("cnrdkcheckoutadminaddress")}</p>
    </div>
    <div style="float:right"><img src="//punktum.dk/themes/custom/pco_theme/prototype/source/images/logo.svg"
            alt="Punktum dk A/S" style="width: 80px;" /></div>
    <div style="clear:both"></div>
    <p>{$L::trans("cnrdkcheckouttac")}</p>
    <p>
    <ul>
        <li><a href="{$L::trans("cnrdkcheckouttacurl")}" target="_blank">{$L::trans("cnrdkcheckouttacurltext")}</a></li>
        <li><a href="{$L::trans("cnrdkcheckoutpolicyurl")}"
                target="_blank">{$L::trans("cnrdkcheckoutpolicyurltext")}</a>
        </li>
        <li><a href="{$L::trans("cnrdkcheckoutabouturl")}" target="_blank">{$L::trans("cnrdkcheckoutabouturltext")}</a>
        </li>
    </ul>
    </p>
    <p>
    <fieldset>
        <input type="hidden" name="dkTaC" value="off" />
        <label for="dkTaC">
            <input type="checkbox" name="dkTaC" id="dkTaC" value="on" required />&nbsp;&nbsp;{$L::trans("cnrdkcheckouttacagree")}
        </label>
    </fieldset>
    </p>
</div>

<script>
    $(document).ready(function() {
        var $form = $('form[name="orderfrm"]'); // WHMCS order form selector
        var $dkcheckout = $('#dkTacSection');

        if ($form.length && $dkcheckout.length && !$form.has($dkcheckout).length) {
            $form.prepend($dkcheckout); // not using append as it will be added at the end of the form after the submit button
        }
    });
</script>