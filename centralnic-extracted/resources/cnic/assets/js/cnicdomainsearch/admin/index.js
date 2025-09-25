// eslint-disable-next-line no-unused-vars
const translations = {};
let nagrid; // Grid "Not Assigned"
let maingrid; // Categories
let tldgrids; // TLD Lists
let dragCounter = 0; // counter for drag actions
let data; // configuration data container
const maxCategoryBodyHeight = '330px';
const docElem = document.documentElement;
const packer = new Muuri.Packer();

class FontAwesomeIcons {
	static iconOptions = [];

	async initCategoryIcons(url) {
		return new Promise((resolve, reject) => {
			const xhr = new XMLHttpRequest();
			xhr.open('GET', url);
			xhr.onload = () => {
				if (xhr.status === 200) {
					const cssText = xhr.responseText;
					const fontAwesomeClasses = Array.from(
						new Set(this.getFontAwesomeClasses(cssText)),
					);
					this.iconOptions = fontAwesomeClasses.map(icon =>
						$(
							`<li><a href="#" data-value="${icon}"><i class="fas fa-${icon}"></i> ${icon}</a></li>`,
						),
					);
					resolve(this.iconOptions);
				} else {
					reject(new Error(`Failed to fetch CSS file. Status: ${xhr.status}`));
				}
			};
			xhr.onerror = () =>
				reject(new Error('Network error occurred while fetching CSS file.'));
			xhr.send();
		});
	}

	getFontAwesomeClasses(cssText) {
		const regex = /\.fa-([\w-]+):before(?=.*\.fa-\1:after)/g;
		return cssText.match(regex)?.map(match => match.slice(4, -7)) || [];
	}

	async loadIcons() {
		try {
			const url = cnicFontawesomePath;
			await this.initCategoryIcons(url);
		} catch (error) {
			console.error(error);
		}
	}

	async getIcons() {
		if (!this.iconOptions?.length) {
			await this.loadIcons();
		}
		return this.iconOptions;
	}
}

const iconList = new FontAwesomeIcons();

/**
 * Notifications
 * @param d http response data
 * @param msg Message to display
 * @param [title] Title to display
 */
function infoOut(d, msg, title) {
	title = title || 'Error occured!';
	let infomsg = msg;
	let isError = false;
	if (Object.prototype.hasOwnProperty.call(d, 'status') && d.status !== 200) {
		isError = true;
		infomsg += ` (${d.status} ${d.statusText})`;
	}
	if (isError || /(error|fail)/i.test(title) || /(error|fail)/i.test(infomsg)) {
		return $.growl.error({
			title: title,
			message: infomsg,
		});
	}
	$.growl.notice({
		title: title,
		message: infomsg,
	});
}

/**
 * Initialize Default WHMCS' categories import feature
 */
function initImport() {
	$('#importdefaultcategories')
		.off()
		.click(() => {
			$('#dialog-confirm').dialog({
				title: "Import WHMCS' default categories",
				resizable: false,
				height: 'auto',
				width: 400,
				modal: true,
				open: function () {
					$('#contentholder').html(TPLMgr.renderString('import'));
				},
				buttons: {
					Confirm: function () {
						$(this).dialog('close');
						$('#loading').show();
						$('#tabs').tabs({ disabled: [0] });
						$.ajax({
							url: '?module=cnicdomainsearch&action=importdefaults',
							type: 'POST',
							dataType: 'json',
						})
							.done(function (d) {
								$('#loading').hide();
								$('#tabs').tabs({ disabled: [] });
								d.defaultActiveCategories = data.categories.map(cat => cat.id);
								saveDefaultCategories(null, d.defaultActiveCategories);
								saveCategoriesOrder();
								// generate(d);
								// generateTab1Block1();
								// generateTab2();
								setTimeout(function () {
									location.reload();
								}, 1000);
								infoOut(
									d,
									"Import of the default WHMCS' categories finished. Please re-configure your by-default active Categories in Settings Tab.",
									'Import successful!',
								);
							})
							.fail(function (d) {
								$('#loading').hide();
								location.reload();
								// generate(d);
								// generateTab1Block1();
								// generateTab2();
								infoOut(
									d,
									"Import of the default WHMCS' categories failed.",
									'Import failed!',
								);
							});
					},
					Cancel: function () {
						$(this).dialog('close');
					},
				},
			});
		});
}

/**
 * Initialize Add new Category feature
 */
async function initAddCategory() {
	const icons = await iconList.getIcons();
	let categoryIcon;
	$('#addcategory')
		.off()
		.click(() => {
			$('#dialog-confirm').dialog({
				title: 'Add a custom Category',
				resizable: false,
				height: 'auto',
				width: 400,
				modal: true,
				open: function () {
					$('#contentholder').html(TPLMgr.renderString('addcategory'));
					$('#categoryIcons').append(icons);
					$('#categoryIcons')
						.off()
						.click(ele => {
							const dropdownToggle = $(this)
								.parent()
								.find('span#selectIconPlaceholder');
							const selectedIcon = $(ele.target).data('value'); // Get the selected value
							dropdownToggle.html(
								selectedIcon.length > 0
									? `<i class="fas fa-${selectedIcon}"></i> ${selectedIcon}`
									: 'None',
							); // Update the dropdown toggle text
							categoryIcon = selectedIcon;
						});
				},
				buttons: {
					Confirm: function () {
						$('#contentholder .form-group').first().removeClass('has-error');
						const cat = $('#categoryinp')
							.val()
							.replace(/(^\s+|\s+$)/g, '');
						if (!cat.length) {
							$('#contentholder .form-group').first().addClass('has-error');
							return;
						}
						const addnatlds = $('#addunassignedtlds').prop('checked') === true;
						const tlds = addnatlds ? data.notassignedtlds : [];
						$(this).dialog('close');
						$('#loading').show();
						$.ajax({
							url: '?module=cnicdomainsearch&action=addcategory',
							type: 'POST',
							data: {
								category: cat,
								tlds: tlds,
								icon: categoryIcon,
							},
							dataType: 'json',
						})
							.done(function (d) {
								$('#loading').hide();
								infoOut(d, d.msg, 'Action succeeded!');
								if (d.success) {
									saveCategoriesOrder();
									loadConfig().then(() => {
										createMainGrid();
									});
								}
							})
							.fail(function (d) {
								$('#loading').hide();
								infoOut(d, 'Failed to add the custom category.');
							});
					},
					Cancel: function () {
						$(this).dialog('close');
					},
				},
			});
		});
}

/**
 * Initialize Edit Category feature
 */
async function initEditCategory() {
	const icons = await iconList.getIcons();
	$(document).on('click', '.edit-category', function () {
		const item = $(this).closest('.item');
		const categoryId = item.data('category');
		let categoryIcon = item.data('icon');
		let categoryName = item.data('name');
		$('#dialog-confirm').dialog({
			title: 'Edit Category',
			resizable: false,
			height: 'auto',
			width: 400,
			modal: true,
			open: function () {
				$('#contentholder').html(TPLMgr.renderString('addcategory'));
				$('#addunassignedtlds').parent().remove();
				$('#categoryIcons').append(icons);
				$('#categoryinp').val(categoryName);
				if (categoryIcon) {
					const dropdownToggle = $('#categoryIcons')
						.parent()
						.find('span#selectIconPlaceholder');
					dropdownToggle.html(
						categoryIcon.length > 0
							? `<i class="fas fa-${categoryIcon}"></i> ${categoryIcon}`
							: 'None',
					); // Update the dropdown toggle text
				}
				$('#categoryIcons')
					.off()
					.click(ele => {
						const dropdownToggle = $(this)
							.parent()
							.find('span#selectIconPlaceholder');
						categoryIcon = $(ele.target).data('value'); // Get the selected value
						dropdownToggle.html(
							categoryIcon.length > 0
								? `<i class="fas fa-${categoryIcon}"></i> ${categoryIcon}`
								: 'None',
						); // Update the dropdown toggle text
						dropdownToggle.val(categoryIcon); // Update the dropdown toggle value
					});
			},
			buttons: {
				Confirm: function () {
					$('#contentholder .form-group').first().removeClass('has-error');
					$(this).dialog('close');
					$('#loading').show();
					categoryName = $('#categoryinp').val();
					$.ajax({
						url: '?module=cnicdomainsearch&action=editcategory',
						type: 'POST',
						data: {
							id: categoryId,
							name: categoryName,
							icon: categoryIcon,
						},
						dataType: 'json',
					})
						.done(function (d) {
							$('#loading').hide();
							infoOut(d, d.msg, 'Action succeeded!');
							if (d.success) {
								saveCategoriesOrder();
								loadConfig().then(() => {
									createMainGrid();
								});
							}
						})
						.fail(function (d) {
							$('#loading').hide();
							infoOut(d, 'Failed to add the custom category.');
						});
				},
				Cancel: function () {
					$(this).dialog('close');
				},
			},
		});
	});
}

/**
 * get tldgrid instance by given category id
 * @param categoryid id of the category
 * @return tldgrid instance
 */
function getTLDGridByCategory(categoryid) {
	return tldgrids.filter(g => {
		return $(g.getElement()).data('category') === categoryid;
	})[0];
}

/**
 * Initialize Delete Category feature
 */
function initDropCategory() {
	$('.dropcat')
		.off()
		.click(function () {
			const gridEl = $(this).closest('.item');
			const name = gridEl.data('name');
			const cat = gridEl.data('category');
			$('#dialog-confirm').dialog({
				title: `Delete Category "${name}"`,
				resizable: false,
				height: 'auto',
				width: 400,
				modal: true,
				open: function () {
					$('#contentholder').html(TPLMgr.renderString('dropcategory'));
				},
				buttons: {
					Confirm: function () {
						$(this).dialog('close');
						$('#loading').show();
						$.ajax({
							url: '?module=cnicdomainsearch&action=deletecategory',
							type: 'POST',
							data: {
								category: cat,
							},
							dataType: 'json',
						})
							.done(function (d) {
								$('#loading').hide();
								infoOut(d, d.msg, 'Action succeeded!');
								if (d.success) {
									const idx = data.defaultActiveCategories.indexOf(cat);
									if (idx > -1) {
										data.defaultActiveCategories.splice(idx, 1);
										saveDefaultCategories(null, data.defaultActiveCategories);
									}
									data.categories = data.categories.filter(mycat => {
										return mycat.id !== cat;
									});
									const g = getTLDGridByCategory(
										gridEl.find('.tldgrid').data('category'),
									);
									g.getItems().forEach(item => {
										const tld = $(item.getElement()).data('tld');
										let found = false;
										for (let i = 0; i < data.categories.length; i++) {
											found =
												found || data.categories[i].tlds.indexOf(tld) !== -1;
											if (found) {
												break;
											}
										}
										if (!found) {
											data.notassignedtlds.push(tld);
											g.send(item, nagrid, 0);
										}
									});
									tldgrids.splice(tldgrids.indexOf(g), 1);
									g.destroy(true);
									maingrid.remove(gridEl[0], {
										removeElements: true,
									});
									saveCategoriesOrder();
									maingrid.refreshItems().layout();
									generateTab1Block1();
								}
							})
							.fail(function (d) {
								$('#loading').hide();
								infoOut(d, 'Failed to add the custom category.');
							});
					},
					Cancel: function () {
						$(this).dialog('close');
					},
				},
			});
		});
}

/**
 * Delete TLD feature
 * @param item tldgrid item to delete
 */
function dropTLD(item) {
	const itemEl = $(item.getElement());
	const cat = $(item.getGrid().getElement()).data('category');
	const catlabel = itemEl.closest('.item').data('name');
	const tld = itemEl.data('tld');

	$('#dialog-confirm').dialog({
		title: `Remove Extension .${tld}`,
		resizable: false,
		height: 'auto',
		width: 400,
		modal: true,
		open: function () {
			$('#contentholder').html(
				TPLMgr.renderString('droptld', { tld: tld, category: catlabel }),
			);
		},
		buttons: {
			Confirm: function () {
				$(this).dialog('close');
				let found = false;
				let updatedCategory;
				data.categories = data.categories.map(mycat => {
					if (mycat.id !== cat) {
						found = found || mycat.tlds.indexOf(tld) !== -1;
					} else {
						mycat.tlds = mycat.tlds.filter(mytld => {
							return mytld !== tld;
						});
						updatedCategory = mycat;
					}
					return mycat;
				});
				const g = item.getGrid();
				$(item.getElement()).data(
					'category',
					$(item.getGrid().getElement()).data('category'),
				);
				if (!found) {
					// tld is not in any further category
					data.notassignedtlds.unshift(tld);
					g.send(item, nagrid, 0);
				} else {
					g.remove(item, { removeElements: true });
				}
				g._emit('dragEnd', item);
				// not found, create an new item and add it
				$.ajax({
					url: '?module=cnicdomainsearch&action=updatecategory',
					data: {
						category: updatedCategory.id,
						tlds: updatedCategory.tlds,
					},
					type: 'POST',
					dataType: 'json',
				})
					.done(function (d) {
						$('#loading').hide();
						if (d.success) {
							g.refreshItems().layout();
							infoOut(d, d.msg, 'Action successful!');
							return;
						}
						infoOut(d, 'Failed to update the category.');
					})
					.fail(function (d) {
						$('#loading').hide();
						infoOut(d, 'Failed to update the category.');
					});
			},
			Cancel: function () {
				$(this).dialog('close');
			},
		},
	});
}

/**
 * Add category (to maingrid)
 * @param cat category (object e.g. {id: 1, name: "...", tlds:[]})
 * @param index where the category has to be added
 * @returns inserted category item
 */
function addCategory(cat, index) {
	const $eL = $(TPLMgr.renderString('tldgrid', cat));
	if (cat.id < 0) {
		$eL.find('.droptld').hide();
		$eL.find('.dropcat').remove();
		$eL.find('.panel-primary').switchClass('panel-primary', 'panel-warning');
		$eL.find('.panel-heading').text(cat.name);
	}
	if (index != null) {
		maingrid.add($eL[0], { index: index });
	} else {
		maingrid.add($eL[0]);
	}
	// hide "not assigned" when empty
	if (cat.id === -1 && !cat.tlds.length) {
		maingrid.hide($eL[0], { instant: true });
	}
	return $eL;
}

/**
 * Initialize Add TLD (to category) feature
 */
function initAddTLD() {
	$('#addtld')
		.off()
		.click(() => {
			const tlds = data.alltlds.map(tld => {
				return `.${tld}`;
			});
			let tldsavailable = tlds;
			$('#dialog-confirm').dialog({
				title: 'Add TLD to Category',
				resizable: false,
				height: 'auto',
				width: 600,
				modal: true,
				open: function () {
					$('#contentholder').html(
						TPLMgr.renderString('addtld', {
							tld: tlds[0],
							categories: data.categories,
						}),
					);
					$('#tldinp').autocomplete({
						source: tldsavailable,
					});
					$('#categoryinp').change(function () {
						let val = this.value;
						if (val !== '') {
							val = parseInt(val, 10);
							const category = data.categories.filter(cat => {
								return cat.id === val;
							})[0];
							tldsavailable = tlds.filter(function (value) {
								return category.tlds.indexOf(value.replace(/^\./, '')) === -1;
							});
						} else {
							tldsavailable = tlds;
						}
						tldsavailable.sort();
						$('#tldinp').autocomplete('option', {
							source: tldsavailable,
						});
					});
				},
				buttons: {
					Add: function () {
						const selectedCat = parseInt($('#categoryinp').val(), 10);
						const selectedTLD = $('#tldinp')
							.val()
							.toLowerCase()
							.replace(/(^\.|\s)/g, '');
						const category = data.categories.filter(cat => {
							return cat.id === selectedCat;
						})[0];
						$('#contentholder .form-group').first().removeClass('has-error');
						$('#contentholder .form-group').last().removeClass('has-error');
						if (category === undefined) {
							$('#contentholder .form-group').first().addClass('has-error');
							return;
						}
						const tldlist = category.tlds;
						const tldsav = tldsavailable.map(tld => {
							return tld.replace(/\./, '');
						});
						// if invalid input     || already part of that category       || tld not available / configured
						if (
							!selectedTLD.length ||
							tldlist.indexOf(selectedTLD) !== -1 ||
							tldsav.indexOf(selectedTLD) === -1
						) {
							$('#contentholder .form-group').last().addClass('has-error');
							return;
						}
						tldlist.unshift(selectedTLD);
						$(this).dialog('close');

						// if it is part of category "Not Assigned"
						const g = getTLDGridByCategory(selectedCat);
						const found = data.notassignedtlds.indexOf(selectedTLD) !== -1;
						if (found) {
							// move it to the category
							data.notassignedtlds = data.notassignedtlds.filter(
								function (mytld) {
									return mytld !== selectedTLD;
								},
							);
							const item = nagrid.getItems().filter(function (i) {
								return $(i.getElement()).data('tld') === selectedTLD;
							})[0];
							$(item.getElement()).data('category', -1);
							nagrid.send(item, g, 0);
							g._emit('dragEnd', item);
						} else {
							// not found, create an new item and add it
							$('#loading').show();
							$.ajax({
								url: '?module=cnicdomainsearch&action=updatecategory',
								data: {
									category: selectedCat,
									tlds: tldlist,
								},
								type: 'POST',
								dataType: 'json',
							})
								.done(function (d) {
									$('#loading').hide();
									if (d.success) {
										category.tlds = tldlist;
										const $el = TPLMgr.renderPrepend(
											`.tldgrid[data-category="${selectedCat}"]`,
											'tldgriditem',
											selectedTLD,
										);
										g.add($el[0], { index: 0 });
										g.refreshItems().layout();
										infoOut(d, d.msg, 'Action successful!');
										return;
									}
									infoOut(d, 'Failed to update the category.');
								})
								.fail(function (d) {
									$('#loading').hide();
									infoOut(d, 'Failed to update the category.');
								});
						}
					},
					Cancel: function () {
						$(this).dialog('close');
					},
				},
			});
		});
}

/**
 * Update Grid "Not Assigned"
 */
function updateNACategory() {
	if (!nagrid) {
		return;
	}
	const eL = nagrid.getElement();
	const items = nagrid.getItems();
	if (items.length) {
		items.forEach(i => {
			$(i.getElement()).find('.droptld').hide();
		});
		maingrid.show($(eL).closest('.item')[0], { instant: true });
	} else {
		maingrid.hide($(eL).closest('.item')[0], { instant: true });
	}
}

function sortItemsByPriority(a, b) {
	const tldA = $(a.getElement()).data('tld');
	const tldB = $(b.getElement()).data('tld');
	const idxA = data.alltlds.indexOf(tldA);
	const idxB = data.alltlds.indexOf(tldB);
	return idxA - idxB;
}

/**
 * Add a new TLDGrid instance
 * @param elem the html element that covers the grid dom
 * @param prepend if the grid should be at the beginning. by default at the end.
 */
function addTLDGrid(elem, prepend) {
	let itemHasMoved = false;
	const tldgrid = new Muuri(elem, {
		items: '.tldgrid-item',
		layoutDuration: 400,
		layoutEasing: 'ease',
		dragEnabled: true,
		dragSort: function () {
			return tldgrids.filter(g => {
				// not allowed to drag into category "Not assigned"
				return $(g.getElement()).data('category') !== -1;
			});
		},
		dragSortInterval: 0,
		// don't change the below, or tldgrid-item might be invisible when dragging
		dragContainer: document.body,
		dragReleaseDuration: 400,
		dragReleaseEasing: 'ease',
		dragStartPredicate: function (item, event) {
			const $t = $(event.target);
			if (!event.isFinal && $t.hasClass('droptld')) {
				dropTLD(item);
				return false;
			}
			return Muuri.ItemDrag.defaultStartPredicate(item, event, {
				distance: 10,
				delay: 50,
			});
		},
		dragPlaceholder: {
			enabled: true,
			duration: 300,
			easing: 'ease',
			createElement: null,
			onCreate: null,
			onRemove: null,
		},
	})
		.on('dragStart', function (item) {
			++dragCounter;
			docElem.classList.add('dragging');
			$(item.getElement()).data(
				'category',
				$(item.getGrid().getElement()).data('category'),
			);
			$(item.getElement()).css({
				width: item.getWidth() + 'px',
				height: item.getHeight() + 'px',
			});
		})
		.on('dragReleaseEnd', function (item) {
			if (--dragCounter < 1) {
				docElem.classList.remove('dragging');
			}
			const $iEL = $(item.getElement());
			const grid = item.getGrid();
			const catTo = $(grid.getElement()).data('category');
			const catFrom = $iEL.data('category');

			// Skip making changes if the TLD has not been moved to another category yet.
			itemHasMoved = catTo !== catFrom;
			if (!itemHasMoved) {
				return;
			}

			$iEL.removeData('category');
			const data = {
				item: item,
				toGrid: grid,
				toGridId: catTo,
				fromGridId: catFrom,
				fromGrid: null,
			};
			$iEL.css({
				width: '',
				height: '',
			});
			data.fromGrid = catTo === catFrom ? grid : getTLDGridByCategory(catFrom);
			saveCategoryChanges(data);
		})
		.on('layoutStart', function () {
			// necessary to repaint after dragging to another category
			maingrid.refreshItems().layout();
		})
		.on('layoutEnd', function (items) {
			if (items && items.length) {
				items[0].getGrid()._items.sort(sortItemsByPriority);
				items.sort(sortItemsByPriority);
			}
			return packer.getLayout(items);
		});

	if ($(elem).data('category') === -1) {
		// initialize global var
		nagrid = tldgrid;
	}
	if (prepend) {
		// after nagrid, at index 1, drop 0 items
		tldgrids.splice(1, 0, tldgrid);
	} else {
		tldgrids.push(tldgrid);
	}
}

/**
 * update lookup configuration output in DOM
 */
function updateLookupConfigurationHTML() {
	$('#cfgsuggestionstatus').text(data.suggestionsOn ? 'ON' : 'OFF');
}

/**
 * update lookup registrar output in DOM
 */
function updateLookupRegistrarHTML() {
	$(document).ready(function () {
		const $lr = $('#cfglookupregistrar');
		if (data.lookupRegistrar === 'ispapi' || data.lookupRegistrar === 'cnic') {
			$lr.text('IS');
			$lr.removeClass('label-danger');
			$lr.addClass('label label-success');
			const $cnf = $('#cfgaccordion');
			$('#tabs').tabs('enable');
			$cnf
				.find('.ui-accordion-header:gt(0)')
				.attr('aria-disabled', 'true')
				.removeClass('ui-state-disabled');
		} else {
			$lr.text('IS NOT');
			$lr.removeClass('label-success');
			$lr.addClass('label label-danger');
			// Disable a specific accordion tabs
			$('#tabs').tabs('disable');
			const $cnf = $('#cfgaccordion');
			$cnf
				.find('.ui-accordion-header:gt(0)')
				.attr('aria-disabled', 'true')
				.addClass('ui-state-disabled');
		}
	});
}

/**
 * Overwrite Native JS set by WHMCS for submit button
 * in Lookup Configuration Dialog
 */
function replaceLookupConfigurationDialogListeners() {
	const submitButton = $('#btnSaveLookupConfiguration');
	submitButton.off('click');
	submitButton.on('click', function () {
		const modalForm = $('#modalAjax').find('form');
		$('#modalAjax .loader').show();
		$.post(
			modalForm.attr('action'),
			modalForm.serialize(),
			function (d) {
				if (d.successMsg) {
					const selector =
						'input[type="checkbox"][name="providerSettings[Registrarispapi][suggestions]"]';
					data.suggestionsOn = modalForm.find(selector).prop('checked') ? 1 : 0;
					updateLookupConfigurationHTML();
				}
				updateAjaxModal(d);
			},
			'json',
		).fail(function (xhr) {
			let data = xhr.responseJSON;
			const genericErrorMsg =
				'An error occurred while communicating with the server. Please try again.';
			if (data && data.data) {
				data = data.data;
				if (data.errorMsg) {
					$.growl.warning({
						title: data.errorMsgTitle,
						message: data.errorMsg,
					});
				} else if (data.data.body) {
					$('#modalAjax .modal-body').html(data.body);
				} else {
					$('#modalAjax .modal-body').html(genericErrorMsg);
				}
			} else {
				$('#modalAjax .modal-body').html(genericErrorMsg);
			}
			$('#modalAjax .loader').fadeOut();
		});
	});
}

/**
 * Overwrite Native JS set by WHMCS for submit button
 * in Lookup Provider Dialog
 */
function replaceLookupProviderDialogListeners() {
	$(document).off('click', '.lookup-provider, .lookup-providers-registrars a');
	$(document).on(
		'click',
		'.lookup-provider, .lookup-providers-registrars a',
		function () {
			const self = $(this);
			const provider = self.data('provider');

			$('.lookup-provider').removeClass('active');
			self.addClass('active');

			if (provider === 'Registrar') {
				if ($('.lookup-providers-registrars').hasClass('hidden')) {
					$('.lookup-providers-registrars').hide().removeClass('hidden');
				}
				$('.lookup-providers-registrars').slideDown();
				return;
			}

			WHMCS.http.jqClient.post(
				'configdomains.php',
				{
					token: csrfToken,
					provider: provider,
					action: 'lookup-provider',
				},
				function (d) {
					if (d.successMsg) {
						dialogClose();
						data.lookupRegistrar = provider;
						updateLookupRegistrarHTML();
						$.growl.notice({
							title: d.successMsgTitle,
							message: d.successMsg,
						});
					} else {
						$.growl.warning({
							title: d.errorMsgTitle,
							message: d.errorMsg,
						});
					}
				},
				'json',
			);
		},
	);
}

/**
 * return list of default active catgories (as ID list)
 *
 * @return list of category ids
 */
function getDefaultSelectedCategories() {
	const actives = [];
	$('#categoriescont >li.active').each(function () {
		actives.push(parseInt($(this).attr('id').replace(/^s_/, ''), 10));
	});
	return actives;
}

/**
 * Save Active Features
 * @param Event event
 * @param int state
 */
function saveFeatures(event, state) {
	const payload = generatePayload();

	$('#loading').show();
	$.ajax({
		url: '?module=cnicdomainsearch&action=savefeatures',
		type: 'POST',
		data: payload,
		dataType: 'json',
	})
		.done(function (d) {
			data.features = d.data;
			$('#loading').hide();
			moveDisabledItems();
			updateButtons();
			updatePositions();
			infoOut(d, d.msg, d.success ? 'Action successful!' : 'Error occured!');
		})
		.fail(function (d) {
			$('#loading').hide();
			infoOut(d, 'Setting update failed.');
		});
}

function saveCategoriesOrder() {
	const categories = [];
	maingrid.getItems().forEach((el, index) => {
		const categoryId = $(el.getElement()).data('category');
		$(el.getElement()).find('.cat-order').text(index);
		if (categoryId > 0) {
			categories.push({ id: categoryId });
		}
	});
	$('#loading').show();
	$.ajax({
		url: '?module=cnicdomainsearch&action=saveCategoriesOrder',
		type: 'POST',
		data: {
			categories,
		},
		dataType: 'json',
	})
		.done(function (d) {
			$('#loading').hide();
			infoOut(d, d.msg, d.success ? 'Action successful!' : 'Error occured!');
		})
		.fail(function (d) {
			$('#loading').hide();
			infoOut(d, 'Setting update failed.');
		});
	const newCategories = [];
	categories.forEach((category, index) => {
		const item = data.categories.find(cat => cat.id === category.id);
		item.order = ++index;
		newCategories.push(item);
	});

	data.categories = newCategories;
	generateTab1Block1();
}

/**
 * Save Configuration `Default Active Categories`
 */
function saveDefaultCategories(event, categories) {
	const actives = categories || getDefaultSelectedCategories();
	$('#loading').show();
	$.ajax({
		url: '?module=cnicdomainsearch&action=savedefaultcategories',
		type: 'POST',
		data: {
			categories: actives,
		},
		dataType: 'json',
	})
		.done(function (d) {
			$('#loading').hide();
			data.defaultActiveCategories = actives;
			infoOut(d, d.msg, d.success ? 'Action successful!' : 'Error occured!');
		})
		.fail(function (d) {
			$('#loading').hide();
			infoOut(d, 'Setting update failed.');
		});
}


// Dynamic save setting function
function saveSetting(event, state, settingType) {
	const val = /ClientThemePath|ClientCacheTime/.test(settingType) ? state : state ? 1 : 0;
	const postData = { value: val, type: settingType };
	if (settingType === 'PremiumDomains') {
		postData.prefix = 0;
	}
	$('#loading').show();
	$.ajax({
		url: '?module=cnicdomainsearch&action=saveSetting',
		type: 'POST',
		data: postData,
		dataType: 'json',
	})
		.done(function (d) {
			$('#loading').hide();
			data[settingType] = val;
			infoOut(d, d.msg, d.success ? 'Action successful!' : 'Error occured!');
			// Additional logic for specific settings
			if (settingType === 'PremiumDomains') {
				if (val === 0) {
					$('#feature-toggle-Aftermarket').bootstrapSwitch('toggleDisabled');
					$('#feature-toggle-Aftermarket').bootstrapSwitch('state', false, true);
				} else {
					$('#feature-toggle-Aftermarket').bootstrapSwitch('toggleDisabled', false);
				}
			}
		})
		.fail(function (d) {
			$('#loading').hide();
			infoOut(d, 'Setting update failed.');
		});
}

/**
 * Generate Content of Tab `Categories`
 */
function generateTab2() {
	initImport();
	initAddCategory();
	initEditCategory();
	initAddTLD();
	createMainGrid();
}

function createMainGrid() {
	$('#maingrid').empty();
	let itemHasMoved = false;
	// align categories correctly
	maingrid = new Muuri('.grid', {
		layoutDuration: 100,
		layoutEasing: 'ease',
		dragEnabled: true,
		dragSortInterval: 0,
		dragStartPredicate: function (item, event) {
			// Prevent "Not Assigned" from being dragged.
			if (maingrid.getItems().indexOf(item) === 0) {
				return false;
			}
			return $(event.target).hasClass('panel-heading');
		},
		dragSortPredicate: function (item) {
			const result = Muuri.ItemDrag.defaultSortPredicate(item, {
				action: 'move',
				threshold: 50,
			});
			return result && result.index === 0 ? false : result;
		},
		dragReleaseDuration: 400,
		dragReleaseEasing: 'ease',
	})
		.on('layoutStart', function () {
			updateNACategory();
		})
		.on('layoutEnd', function () {
			initDropCategory();
		})
		.on('move', function () {
			itemHasMoved = true;
		})
		.on('dragReleaseEnd', function () {
			if (itemHasMoved) {
				saveCategoriesOrder();
				itemHasMoved = false;
			}
		});
	// add categories
	data.categories.forEach((cat, index) => {
		addCategory(cat, index);
	});
	addCategory(
		{
			id: -1, // not existing id
			name: 'Not assigned',
			tlds: data.notassignedtlds,
		},
		0,
	);

	// make tlds draggable
	tldgrids = [];
	$('.tldgrid').each(function () {
		addTLDGrid(this, false);
	});
	maingrid.refreshItems().layout();
	maingrid.getItems().forEach(item => {
		$element = $(item.getElement());
		$element.find('.tldgrid').css({ maxHeight: maxCategoryBodyHeight });
	});
}
/**
 * (Re-)Gemerate Block 'By-default active Categories' of Tab 1
 */
function generateTab1Block1() {
	const $eL = $('.catcontainer');
	$eL.empty();
	TPLMgr.renderAppend('.catcontainer', 'activecats', {
		categories: data.categories,
		cssclass: function () {
			return data.defaultActiveCategories.indexOf(this.id) === -1
				? ''
				: ' active';
		},
	});
	$eL
		.find('.subCat')
		.off('click')
		.click(function () {
			$(this).toggleClass('active');
			let url = `${baseurl}cat=${getDefaultSelectedCategories()}`;
			$uri.text(url);
			$uri.prop('href', url);

			url = `${baseurl2}cat=${getDefaultSelectedCategories()}`;
			$uri2.text(url);
			$uri2.prop('href', url);
		});
	$('#savedefaultcats').off('click').click(saveDefaultCategories);
}

/**
 * Generate Content of Tab `Settings`
 */
function generateTab1() {
	// BLOCK #1 (Default Active Categories)
	generateTab1Block1();

	// Update feature checkboxes and their states
	$('input.dsfeature').each(function () {
		let feature = this.id.replace(/^feature-toggle-/, '');
		feature = feature.charAt(0).toUpperCase() + feature.slice(1);

		// Set checkbox state based on data
		$(this).prop('checked', data.features[feature]['active'] === 1);

		// Initialize Bootstrap Switch
		$(this)
			.off()
			.bootstrapSwitch({
				state: data.features[feature]['active'] === 1,
				size: 'small',
				onColor: 'success',
				offColor: 'default',
			})
			.on('switchChange.bootstrapSwitch', saveFeatures);

		// Toggle disabled state based on premium domains (if applicable)
		if (feature === 'Aftermarket' && data.premiumDomains === 0) {
			$(this).bootstrapSwitch('toggleDisabled');
		}
	});

	// BLOCK #6 (Additional Settings)
	// Define the event handlers mapping
	const eventHandlers = {
		takenDomains: (event, state) => saveSetting(event, state, 'TakenDomains'),
		premiumDomains: (event, state) => saveSetting(event, state, 'PremiumDomains'),
		domainTransfers: (event, state) => saveSetting(event, state, 'DomainTransfers'),
		containerSpotlight: (event, state) => saveSetting(event, state, 'ContainerSpotlight'),
		promotions: (event, state) => saveSetting(event, state, 'Promotions'),
		searchLogs: (event, state) => saveSetting(event, state, 'SearchLogs'),
		clientThemePath: (event, state) => saveSetting(event, state, 'ClientThemePath'),
		clientCacheTime: (event, state) => saveSetting(event, state, 'ClientCacheTime'),
		additionalScroll: (event, state) => saveSetting(event, state, 'AdditionalScroll'),
		stickyMobileMenu: (event, state) => saveSetting(event, state, 'StickyMobileMenu'),
		// Add more handlers as needed
	};

	$(document).ready(function () {
		// Iterate over all elements with IDs starting with 'toggle-'
		$('[id^=toggle-]').each(function () {
			const id = $(this).attr('id');
			const key = id.replace('toggle-', '');
			$(this)
				.off()
				.bootstrapSwitch({
					state: data[key] === 1,
					size: 'small',
					onColor: 'success',
					offColor: 'default',
				})
				.on('switchChange.bootstrapSwitch', eventHandlers[key]);
		});
	});

	// BLOCK #5 (Lookup Provider + Configuration)
	updateLookupConfigurationHTML();
	updateLookupRegistrarHTML();

	$('#input-clientThemePath').val(data.clientThemePath);
	$('#input-clientThemePath').on('change', function (event) {
		eventHandlers.clientThemePath(event, $(this).val());
	});

	$('#input-clientCacheTime').val(data.clientCacheTime);
	$('#input-clientCacheTime').on('change', function (event) {
		eventHandlers.clientCacheTime(event, $(this).val());
	});

	// Change Lookup Provider & Configuration Modal - JS listener override
	// Necessary as we need to know the result of the operation
	// and the target url was wrong for the data post (lookup provider dialog).
	$('#configureLookupProvider').click(function () {
		const observer = new MutationObserver(function (mutations) {
			mutations.forEach(function (mutation) {
				if (!mutation.addedNodes) return;
				if ($('#btnSaveLookupConfiguration').length) {
					replaceLookupConfigurationDialogListeners();
					observer.disconnect();
				}
			});
		});
		observer.observe(document.body, {
			childList: true,
			subtree: true,
			attributes: false,
			characterData: false,
		});
	});
	$('#changeLookupProvider').click(function () {
		const observer = new MutationObserver(function (mutations) {
			mutations.forEach(function (mutation) {
				if (!mutation.addedNodes) return;
				if ($('.lookup-providers-registrars').length) {
					replaceLookupProviderDialogListeners();
					observer.disconnect();
				}
			});
		});
		observer.observe(document.body, {
			childList: true,
			subtree: true,
			attributes: false,
			characterData: false,
		});
	});
	$('#cfgaccordion').accordion({ heightStyle: 'content' });

	// Initial setup	
	initializeFeatures();
}

/**
 * Generate initial View
 * @param d configuration data response
 */
function generate(d) {
	$('#loading').hide();

	data = d;
	if (!Object.prototype.hasOwnProperty.call(data, 'categories')) {
		infoOut(data, 'Error loading configuration');
		$('#tabs').remove();
		TPLMgr.renderAppend('#contentarea', 'loadcfgerror');
		return;
	}
	$(document).ready(() => {
		$('#tabs').show();
		// render tabs step by step
		// Tab #1
		generateTab1();
		// Tab #2 see activate handler at #tabs
	});
}

/**
 * Save category changes by AJAX Post
 * @param cat categoryid
 * @param tlds tld list
 */
function saveCategory(cat, tlds) {
	if (cat === -1) {
		// NOT ASSIGNED
		if (!tlds.length) {
			maingrid.hide($(nagrid.getElement()).closest('.item')[0], {
				instant: true,
			});
		}
		return;
	}
	$('#loading').show();
	$.ajax({
		url: '?module=cnicdomainsearch&action=updatecategory',
		type: 'POST',
		data: {
			category: cat,
			tlds: tlds, // $ will leave this out when empty
		},
		dataType: 'json',
	})
		.done(function (d) {
			$('#loading').hide();
			infoOut(d, d.msg, 'Action successful!');
		})
		.fail(function (d) {
			$('#loading').hide();
			infoOut(d, 'Failed to update the category.');
		});
}

/**
 * Prepare saving tldgrid changes (remove, move)
 * @param data object covering the action data fromGrid, fromGridId, toGrid, toGridId, item, action
 */
function saveCategoryChanges(data) {
	let tlds = [];
	const $iEL = $(data.item.getElement());
	const mytld = $iEL.data('tld');
	const foundIndexes = [];
	$iEL.data('category', data.toGridId);
	if (data.toGridId !== -1) {
		// naGrid
		$iEL.find('.droptld').show();
	}
	data.toGrid.getItems().forEach(item => {
		const tld = $(item.getElement()).data('tld');
		if (tld === mytld) {
			foundIndexes.push(tlds.length);
		}
		tlds.push(tld);
	});
	foundIndexes.pop(); // keep one item
	if (foundIndexes.length) {
		foundIndexes.forEach(idx => {
			data.toGrid.remove(data.toGrid.getItems()[idx], {
				removeElements: true,
			});
			tlds.splice(idx, 1);
		});
	}
	if (data.toGridid !== data.fromGridId) {
		saveCategory(data.toGridId, tlds); // this won't save for Not Assigned or naGrid
	}
	tlds = [];
	data.fromGrid.getItems().forEach(item => {
		tlds.push($(item.getElement()).data('tld'));
	});
	saveCategory(data.fromGridId, tlds); // this won't save for Not Assigned or naGrid

	tldgrids.forEach(function (tldgrid) {
		tldgrid.refreshItems();
	});
}

/**
 * load configuration data from PHP
 */
async function loadConfig() {
	await $.ajax({
		url: '?module=cnicdomainsearch&action=loadconfiguration',
		type: 'GET',
		dataType: 'json',
	}).then(
		d => {
			generate(d);
		},
		d => {
			generate(d);
		},
	);
}

// Trigger initial configuration load
loadConfig();

// const wr = new URLSearchParams(document.currentScript.src.replace(/[^?]+/, '')).get('wr')

// Initial DOM Manipulation and rendering of tabs
$(document).ready(() => {
	generateTabs();
});

function generateTabs() {
	(async function () {
		// load templates
		await TPLMgr.loadTemplates(
			[
				'activecats',
				'import',
				'tldgrid',
				'tldgriditem',
				'loading',
				'help',
				'loadcfgerror',
				'addtld',
				'addcategory',
				'droptld',
				'dropcategory',
			],
			'Admin',
		);
		// init tabs
		const generated = {};
		$('#tabs').tabs({
			beforeActivate: function (event, ui) {
				const idx = ui.newTab.index();
				if (idx === 1 && !generated[idx]) {
					$('#loading').show();
				}
			},
			activate: function (event, ui) {
				const idx = ui.newTab.index();
				if (idx === 1 && !generated[idx]) {
					generateTab2();
					generated[idx] = true;
					$('#loading').hide();
				}
			},
		});
		// modify title to save space
		TPLMgr.renderPrepend('#contentarea >div >h1', 'help', {});
		TPLMgr.renderAppend('#contentarea >div >h1', 'loading', {});
	})();
}

function updateButtons() {
	const activeItems = $('.feature-item').filter(function () {
		return $(this).find('.dsfeature').is(':checked');
	});

	// Set visibility of move-up and move-down buttons
	activeItems.find('.move-up').css('visibility', 'visible');
	activeItems.find('.move-down').css('visibility', 'visible');

	activeItems.first().find('.move-up').css('visibility', 'hidden');
	activeItems.last().find('.move-down').css('visibility', 'hidden');

	// Hide move buttons for disabled items
	$('.feature-item').each(function () {
		if (!$(this).find('.dsfeature').is(':checked')) {
			$(this).find('.move-button').css('visibility', 'hidden');
		}
	});
}

// Function to reposition features based on order and update buttons
// Function to reposition features based on order and update buttons
function updatePositions() {
	const $container = $('.feature-item-container');
	const $features = $container.children('.feature-item');

	// Create an array with feature items and their order
	const featuresWithOrder = $features.map(function () {
		const $this = $(this);
		const featureId = $this.data('feature');
		const order = parseInt(data.features[featureId]?.order, 10) || 0; // Default to 0 if order is not available
		return { element: $this, order: order };
	}).get();

	// Separate active (non-zero order) and disabled (zero order) features
	const activeFeatures = featuresWithOrder.filter(item => item.order > 0);
	const disabledFeatures = featuresWithOrder.filter(item => item.order === 0);

	// Sort active features based on their order
	const sortedActiveFeatures = activeFeatures.sort((a, b) => a.order - b.order);

	// Reorder active features in the DOM
	$(sortedActiveFeatures).each(function () {
		$container.append($(this.element)); // Move the item to the end of the container
		$(this.element).find('.position-number').text(`#${this.order}`);
	});

	// Handle disabled features (order 0) - placed after active features
	$(disabledFeatures).each(function () {
		$container.append($(this.element)); // Move the item to the end of the container
		$(this.element).find('.position-number').text(``);
	});

	// Reinitialize Bootstrap Switches
	$('input.dsfeature').each(function () {
		const $switch = $(this);
		const feature = this.id.replace(/^feature-toggle-/, '');
		const featureKey = feature.charAt(0).toUpperCase() + feature.slice(1);

		// Ensure the feature exists in the data object
		if (data.features[featureKey]) {
			// Destroy existing Bootstrap Switch instance to avoid duplication
			if ($switch.data('bootstrap-switch')) {
				$switch.bootstrapSwitch('destroy');
			}

			// Reinitialize Bootstrap Switch
			$switch.bootstrapSwitch({
				state: data.features[featureKey]['active'] === 1,
				size: 'small',
				onColor: 'success',
				offColor: 'default',
				onText: 'ON',
				offText: 'OFF'
			}).off('switchChange.bootstrapSwitch').on('switchChange.bootstrapSwitch', saveFeatures);

			// Toggle disabled state based on premium domains (if applicable)
			if (featureKey === 'Aftermarket' && data.premiumDomains === 0) {
				$switch.bootstrapSwitch('toggleDisabled');
			}
		}
	});

	// Update buttons visibility
	updateButtons();
}

function moveDisabledItems() {
	const container = $('.feature-item-container');
	const items = container.find('.feature-item');

	items.filter(function () {
		return !$(this).find('.dsfeature').is(':checked');
	}).appendTo(container);

	updatePositions(); // Ensure positions are updated after moving items
}

function generatePayload() {
	const features = {};
	let order = 1;

	$('.feature-item').each(function () {
		const feature = $(this).data('feature');
		const isActive = $(this).find('input.dsfeature').prop('checked');

		if (isActive) {
			features[feature] = {
				active: 1,
				order: order++
			};
		} else {
			features[feature] = {
				active: 0,
				order: 0  // Disabled features should have 0 or a placeholder order
			};
		}
	});

	return { features };
}

function initializeFeatures() {
	// Function to handle Move Up and Move Down button clicks
	$(document).on('click', '.move-up', function () {
		const item = $(this).closest('.feature-item');
		const prevItem = item.prev('.feature-item');
		if (prevItem.length) {
			item.insertBefore(prevItem);
			saveFeatures(); // Save the new order
			updatePositions(); // Update positions and order
		}
	});

	$(document).on('click', '.move-down', function () {
		const item = $(this).closest('.feature-item');
		const nextItem = item.next('.feature-item');
		if (nextItem.length) {
			item.insertAfter(nextItem);
			saveFeatures(); // Save the new order
			updatePositions(); // Update positions and order
		}
	});

	moveDisabledItems(); // Ensure disabled items are moved
	updateButtons();     // Update the button visibility
	updatePositions();   // Update positions based on current data
}