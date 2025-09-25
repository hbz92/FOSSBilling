// jQuery script for AJAX submission of registrar settings form
$(document).ready(function () {
    var $form = $("#registrarSettingsForm");
    var $btn = $("#saveRegistrarSettingsBtn");
    var $loader = $("#loadingIndicator");

    function showAlert(type, message) {
        const alertTypes = {
            success: 'alert-success',
            error: 'alert-danger',
            warning: 'alert-warning',
            info: 'alert-info'
        };
        const alertClass = alertTypes[type] || 'alert-info';
        const alert = `
            <div class="alert ${alertClass} alert-dismissible" role="alert">
                ${message}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        `;
        $('#alertContainer').html(alert);
        if (type !== 'error') {
            setTimeout(function () {
                $('.alert').fadeOut();
            }, 5000);
        }
    }

    $btn.on("click", function (e) {
        e.preventDefault();
        $btn.prop("disabled", true);
        $loader.show();
        var formData = $form.serialize();
        $.ajax({
            url: window.location.href,
            type: "POST",
            data: formData,
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    showAlert('success', 'Settings saved successfully.');
                } else {
                    showAlert('error', response.error || 'Failed to save settings.');
                }
            },
            error: function () {
                showAlert('error', 'AJAX request failed.');
            },
            complete: function () {
                $btn.prop("disabled", false);
                $loader.hide();
            }
        });
    });
});
