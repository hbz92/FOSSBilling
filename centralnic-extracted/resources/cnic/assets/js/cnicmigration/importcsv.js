/* this function will call when page loaded successfully */
$(document).ready(function () {
	if (location.hash) {
		$("a[href='" + location.hash + "']").tab('show');
	}
	$(document.body).on('click', "a[data-toggle='tab']", function (event) {
		location.hash = this.getAttribute('href');
	});
	$(window).on('popstate', function () {
		let anchor =
			location.hash || $("a[data-toggle='tab']").first().attr('href');
		$("a[href='" + anchor + "']").tab('show');
	});
	$('#info-alert').hide();
	$('#success-alert').hide();
	$('#error-alert').hide();
	$('[data-hide]').on('click', function () {
		$(this)
			.closest('.' + $(this).attr('data-hide'))
			.hide();
	});

	/* this function will call when on submit button click event fired */
	$('#frm-add-epp-csv').submit(function (event) {
		event.preventDefault();
		/* current this object refer to input element */
		let input = $('#importEPPCsvFile');
		/* collect list of files choosen */
		let files = input[0].files;

		let filename = files[0].name;

		/* getting file extenstion eg- .jpg,.png, etc */
		let extension = filename.substr(filename.lastIndexOf('.'));

		/* define allowed file types */
		let allowedExtensionsRegx = /(\.csv)$/i;

		/* testing extension with regular expression */
		let isAllowed = allowedExtensionsRegx.test(extension);

		/** form data  */
		let formData = new FormData(this);
		formData.append('action', 'add-epp-csv');
		if (!isAllowed) {
			ShowErrorMessage('Invalid File Type.');
			return false;
		} else {
			$.ajax({
				url: modulelink + '&page=service',
				type: 'POST',
				data: formData,
				mimeType: 'multipart/form-data',
				contentType: false,
				cache: false,
				processData: false,
				dataType: "json",
				success: function (data) {
					if (data.status === "success") {
						ShowSuccessMessage(data.msg ?? data.successMsg);
						if (data.hasOwnProperty("errorMsg")) {
							ShowErrorMessage(data.errorMsg, true);
						}
						tblEpp.ajax.reload();
					} else {
						ShowErrorMessage(data.msg);
					}
				},
				error: function (error) {
					ShowErrorMessage(error.statusError);
				},
			});
		}
	});
});
