$(document).ready(function () {
	let selectedTr;
	let premiumPrices = {};
	const successElement = $('#successMsgModal');
	const errorElement = $('#errorMsgModal');
	const spinnerElement = $('#modalSpinner');
	const domainMonitoringList = $('#domain-monitoring-list');

	// Initialize DataTable
	const table = domainMonitoringList.DataTable({
		order: [[3, 'desc']],
		columnDefs: [{
			targets: 3,
			orderable: true,
		}],
	});

	// Create the status filter element
	var statusFilterHtml = `
		<label for="statusFilter" class="control-label">Status:</label>
		<select id="statusFilter" class="form-control">
			<option value="">All</option>
			<option value="Updated Successfully">Completed</option>
			<option value="Pending">Pending</option>
		</select>
	`;

	// Append the status filter to the DataTables filter container
	$('#domain-monitoring-list_filter').append(statusFilterHtml);

	// Custom filter for status
	$.fn.dataTable.ext.search.push(
		function (settings, data, dataIndex) {
			const statusFilter = $('#statusFilter').val();
			const status = data[3]; // Assuming status is in the 4th column (index 3)

			if (statusFilter === "" || status.includes(statusFilter)) {
				return true;
			}
			return false;
		}
	);

	// Event listener for the status filter
	$('#statusFilter').change(function () {
		table.draw();
	});

	// Handle Fix Now button click
	function handleFixNowClick() {
		selectedTr = $(this).closest('tr');
		const rowDataId = selectedTr.data('id');
		const domain = selectedTr.find('[data-domain]').data('domain');
		const type = selectedTr.data('type');

		$('#cnicDomainModalLabel').text(domain);
		successElement.hide();
		errorElement.hide();
		spinnerElement.show();

		$.ajax({
			url: `${addonModuleLink}&action=fetchPrice`,
			method: 'GET',
			data: { id: rowDataId, type: type },
			dataType: 'json',
			success: function (response) {
				if (response?.success === false) {
					successElement.hide();
					spinnerElement.hide();
					errorElement.show().html(response.message);
					return;
				}

				let priceText = '';
				premiumPrices = {};

				if (response?.renew) {
					priceText += `* Renew: ${response.renew} ${response.currency}<br />`;
					premiumPrices.renew = response.renew;
					premiumPrices.currency = response.currency;
				}

				if (response?.transfer) {
					priceText += `* Transfer: ${response.transfer} ${response.currency}`;
					premiumPrices.transfer = response.transfer;
					premiumPrices.currency = response.currency;
				}

				if (priceText.length > 0) {
					priceText = `<br /><br />New Prices Are As Shown Below:<br />${priceText}`;
				}

				// Add block to show domain status upgrade
				let statusText = '<br />Domain Status Update:<br />* The domain status will be upgraded from Standard to Premium.';

				// Combine priceText and statusText
				const combinedText = statusText + priceText;

				const postText =
					`Kindly <strong>'Confirm'</strong> the pricing update by approving this pop-up.<br /><br />Once processed, you can reattempt the pending <strong>'${type === 'renew_premium_price_missing' ? 'Renewal' : 'Transfer'
					}'</strong> for the <strong>'${domain}'</strong> domain through Module Queue.<br /><br />` +
					`<p class="text-muted cnic-text-small">* We will be updating the pricing details in the "tbldomains_extra" table and the domain status in the "tbldomains" table. Please note that WHMCS will factor in coupons, as well as any additional costs such as premium margin, DNS management, email forwarding, URL forwarding, etc. You can view the final recurring amount at the domain level after the update is complete and proceed with the next steps.</p>`;

				successElement.html(`The domain has been upgraded to premium by the TLD provider, or its premium pricing has been adjusted. To reflect these changes, please confirm the updates to apply the new prices in WHMCS.<br /><strong>${combinedText}</strong><br /><br />${postText}`);
				successElement.show();
				spinnerElement.hide();
			},
			error: function (xhr, status, error) {
				console.error(status + ': ', error);
				successElement.hide();
				spinnerElement.hide();
				errorElement.show().html(status + ': ' + error);
			},
		});
	}

	// Handle Confirm button click
	function handleConfirmClick() {
		const rowDataId = selectedTr.data('id');
		const todoId = selectedTr.data('todoid');
		const domainId = selectedTr.data('domainid');
		const domainName = selectedTr.find('[data-domain]').data('domain');
		const domainRegistrar = selectedTr.data('type');

		spinnerElement.show();
		successElement.html('Sit tight while we work on updating domain prices...');

		$.ajax({
			url: `${addonModuleLink}&action=updatePrice`,
			method: 'POST',
			data: {
				id: rowDataId,
				todoId: todoId,
				domainId: domainId,
				domainName: domainName,
				domainRegistrar: domainRegistrar,
				renewPrice: premiumPrices?.renew ?? '',
				transferPrice: premiumPrices?.transfer ?? '',
				currency: premiumPrices.currency,
			},
			dataType: 'json',
			success: function (response) {
				if (response?.success === false) {
					successElement.hide();
					spinnerElement.hide();
					errorElement.show().html(response.message);
					return;
				}

				successElement.html("Great news! We've successfully updated the domain prices...");
				successElement.show();
				errorElement.hide();
				spinnerElement.hide();
				$('#domainFixModal').modal('hide');
				selectedTr.find('[data-status]').html('<span class="badge badge-success cnic-custom-badge-success">Updated Successfully</span>');
				selectedTr.find('[data-desc]').html(
					`<p>The domain pricing has been updated. Please review the domain's billing to ensure
                                accurate
                                records.</p>
                            <p><strong>To recalculate the domain pricing, please follow these steps:</strong></p>
                            <ol>
                                <li>Click on the provided URL: <a target="_blank" style="text-decoration:underline"
                                        href="./clientsdomains.php?id=${domainId}">clientsdomains.php?id=${domainId}</a>
                                </li>
                                <li>Toggle "Recalculate on Save" to "Yes".</li>
                                <li>Click the "Save" button to apply the changes and recalculate the prices.</li>
                            </ol>
                            <p><strong>* Additionally steps may be required:</strong><br />
                            <ol>
                                <li>Cancel & Refund the original Invoice & Order.</li>
                                <li>Initiate the renewal/transfer again via Client Area.</li>
                            </ol>`,
				);
				$('#dataActions').html(`<button type="button" class="btn btn-danger btn-sm deleteBtn">
                                <i class="fas fa-trash-alt"></i> Delete</button>`);
			},
			error: function (xhr, status, error) {
				console.error('Error:', error);
				successElement.hide();
				spinnerElement.hide();
				errorElement.show().html(error);
			},
		});
	}

	// Event delegation for delete button click
	$(document).on('click', '.deleteBtn', function () {
		selectedTr = $(this).closest('tr');
		const todoId = selectedTr.data('todoid');

		$.ajax({
			url: `${addonModuleLink}&action=deleteRecord`,
			method: 'POST',
			data: { id: todoId },
			dataType: 'json',
			success: function (response) {
				selectedTr.html('<td colspan="5" style="text-align: center;">Item has been deleted successfully.</td>');
			},
			error: function (xhr, status, error) {
				console.error('Error:', error);
			},
		});
	});

	// Attach event handlers to Fix Now and Confirm buttons
	$('.fixNowBtn').click(handleFixNowClick);
	$('.btn-submit').click(handleConfirmClick);
});
