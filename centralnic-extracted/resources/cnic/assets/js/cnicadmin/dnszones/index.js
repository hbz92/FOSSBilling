$(document).ready(function() {
    // Configuration constants
    const CONFIG = {
        steps: {
            DISCOVERY: 1,
            FILTER_MANAGE: 2  // Combined step: search & manage zones
        },
        selectors: {
            zoneTable: '#dnsZonesTable',
            zoneTableBody: '#dnsZonesTableBody',
            tableSearch: '#tableSearch',
            entriesPerPage: '#entriesPerPage',
            deleteModal: '#deleteConfirmationModal',
            recordsModal: '#dnsRecordsModal',
            deleteZoneName: '#deleteZoneName',
            modalZoneName: '#zoneName',
            recordsContent: '#recordsContent',
            recordsLoadingIndicator: '#recordsLoadingIndicator',
            recordsError: '#recordsError',
            recordsTableBody: '#recordsTableBody',
            noZonesMessage: '#noZonesMessage',
            zoneStats: '#zoneStats',
            tableLoadingIndicator: '#tableLoadingIndicator',
            alertContainer: '#alertContainer',
            tableInfo: '#tableInfo',
            tablePagination: '#tablePagination',
            confirmDeleteCheckbox: '#confirmDelete',
            confirmDeleteButton: '#confirmDeleteButton',
            // Multi-step navigation selectors
            steps: '.cnic-step',
            startDiscovery: '#startDiscovery',
            startOver: '#startOver',
            prevButton: '.sync-prev-button',
            nextButton: '.sync-next-button',
            // Statistics filter selectors
            totalDnsZones: '#totalDnsZones',
            totalExternalZones: '#totalExternalZones',
            totalInternalZones: '#totalInternalZones'
        },
        classes: {
            table: {
                main: 'cnic-dt-table',
                header: 'cnic-dt-column-sortable',
                body: 'cnic-dt-table tbody',
                responsive: 'cnic-dt-container'
            },
            status: {
                external: 'cnic-dt-badge cnic-dt-badge-warning',
                internal: 'cnic-dt-badge cnic-dt-badge-success'
            },
            buttons: {
                delete: 'cnic-dt-btn cnic-dt-btn-danger',
                view: 'cnic-dt-btn cnic-dt-btn-info',
                group: 'cnic-dt-btn-group'
            }
        },
        icons: {
            external: 'fas fa-exclamation-triangle',
            internal: 'fas fa-home',
            delete: 'fas fa-trash',
            view: 'fas fa-list',
            spinner: 'fas fa-spinner fa-spin'
        },
        messages: {
            loading: 'Loading...',
            networkError: 'Network error occurred',
            noRecords: 'No DNS records found for this zone.',
            deleteSuccess: 'DNS zone deleted successfully',
            deleteFailed: 'Failed to delete DNS zone',
            loadFailed: 'Failed to load DNS zones',
            recordsFailed: 'Failed to load DNS records'
        }
    };

    // State variables
    let currentZones = [];
    let currentZoneForAction = '';
    let currentPage = 1;
    let itemsPerPage = 15;
    let filteredZones = [];
    let currentFilter = 'all'; // Track current filter: 'all', 'external', 'internal'

    // Utility functions
    const Utils = {
        // AJAX request wrapper with common error handling
        makeRequest: function(url, data, successMessage = null) {
            showLoadingIndicator();
            return $.post(url, data)
                .done(function(response) {
                    hideLoadingIndicator();
                    if (response.success) {
                        if (successMessage) {
                            showAlert('success', response.message || successMessage);
                        }
                        return response;
                    } else {
                        showAlert('error', response.error || 'Operation failed');
                        return $.Deferred().reject(response.error || 'Operation failed').promise();
                    }
                })
                .fail(function() {
                    hideLoadingIndicator();
                    showAlert('error', CONFIG.messages.networkError);
                    return $.Deferred().reject(CONFIG.messages.networkError).promise();
                });
        },

        // Create HTML elements with consistent structure
        createElement: function(tag, classes = '', content = '', attributes = {}) {
            let element = `<${tag}`;
            if (classes) element += ` class="${classes}"`;
            
            Object.keys(attributes).forEach(attr => {
                element += ` ${attr}="${attributes[attr]}"`;
            });
            
            element += `>${content}</${tag}>`;
            return element;
        },

        // Create icon with optional text
        createIcon: function(iconClass, text = '') {
            const icon = `<i class="${iconClass}"></i>`;
            return text ? `${icon} ${text}` : icon;
        },

        // Create button with consistent structure
        createButton: function(classes, text, attributes = {}) {
            return this.createElement('button', classes, text, attributes);
        },

        // Create status label
        createStatusLabel: function(isExternal) {
            const statusConfig = isExternal ? 
                { class: CONFIG.classes.status.external, icon: CONFIG.icons.external, text: 'External' } :
                { class: CONFIG.classes.status.internal, icon: CONFIG.icons.internal, text: 'Internal' };
            
            return this.createElement('span', statusConfig.class, this.createIcon(statusConfig.icon, statusConfig.text));
        },

        // Create table structure
        createTable: function(headers, bodyClass = CONFIG.classes.table.body) {
            const headerRow = headers.map(header => 
                this.createElement('th', 'text-nowrap', this.createIcon(header.icon, header.text))
            ).join('');
            
            return `
                <table class="${CONFIG.classes.table.main}">
                    <thead class="${CONFIG.classes.table.header}">
                        <tr>${headerRow}</tr>
                    </thead>
                    <tbody class="${bodyClass}"></tbody>
                </table>
            `;
        },

        // Toggle element visibility
        toggleElements: function(showSelectors = [], hideSelectors = []) {
            showSelectors.forEach(selector => $(selector).removeClass('hidden'));
            hideSelectors.forEach(selector => $(selector).addClass('hidden'));
        }
    };

    // Initialize page - DON'T auto-load zones for multi-step approach
    $(document).on('click', '.btn-delete-zone', function() {
        currentZoneForAction = $(this).data('zone');
        $(CONFIG.selectors.deleteZoneName).text(currentZoneForAction);
        $(CONFIG.selectors.deleteModal).modal('show');
    });

    $(document).on('click', '.btn-view-records', function() {
        const zone = $(this).data('zone');
        viewZoneRecords(zone);
    });

    // Delete confirmation checkbox handler
    $(document).on('change', CONFIG.selectors.confirmDeleteCheckbox, function() {
        const isChecked = $(this).is(':checked');
        $(CONFIG.selectors.confirmDeleteButton).prop('disabled', !isChecked);
    });

    // Delete confirmation button handler
    $(document).on('click', CONFIG.selectors.confirmDeleteButton, function() {
        deleteZone(currentZoneForAction);
    });

    // Pagination event handlers
    $(document).on('click', CONFIG.selectors.tablePagination + ' a', function(e) {
        e.preventDefault();
        const page = $(this).data('page');
        
        if ($(this).parent().hasClass('disabled')) {
            return;
        }
        
        if (page === 'prev') {
            currentPage = Math.max(1, currentPage - 1);
        } else if (page === 'next') {
            const totalPages = Math.ceil(filteredZones.length / itemsPerPage);
            currentPage = Math.min(totalPages, currentPage + 1);
        } else {
            currentPage = parseInt(page);
        }
        
        displayCurrentPage();
    });

    // Entries per page change handler
    $(document).on('change', CONFIG.selectors.entriesPerPage, function() {
        itemsPerPage = parseInt($(this).val());
        currentPage = 1; // Reset to first page
        displayCurrentPage();
    });

    // Table search handler
    $(document).on('input', CONFIG.selectors.tableSearch, function() {
        const searchTerm = $(this).val().toLowerCase();
        filterTableRows(searchTerm);
    });

    // Statistics card filter handlers - target the entire card containers
    $(document).on('click', function(e) {
        const $target = $(e.target);
        const $card = $target.closest('.col-lg-3.col-md-6.col-sm-6');
        
        if ($card.length > 0) {
            const $totalDnsZones = $card.find(CONFIG.selectors.totalDnsZones);
            const $totalExternalZones = $card.find(CONFIG.selectors.totalExternalZones);
            const $totalInternalZones = $card.find(CONFIG.selectors.totalInternalZones);
            
            if ($totalDnsZones.length > 0) {
                setFilter('all');
            } else if ($totalExternalZones.length > 0) {
                setFilter('external');
            } else if ($totalInternalZones.length > 0) {
                setFilter('internal');
            }
        }
    });

    // Functions
    function initializeDataTable() {
        console.log('Initializing table with basic styling for better CSS compatibility');
        // Remove DataTables to avoid CSS conflicts
        // Just ensure proper table structure and styling
        ensureTableStructure();
        addBasicTableFeatures();
    }

    function ensureTableStructure() {
        const $table = $(CONFIG.selectors.zoneTable);
        
        if ($table.length === 0) {
            console.warn('DNS zones table element not found in DOM');
            return;
        }
        
        // Check if table has proper structure and classes
        const hasValidStructure = $table.find('thead').length > 0 && 
                                  $table.find('tbody').length > 0;
        
        if (!hasValidStructure) {
            console.log('Recreating table structure for better styling');
            recreateTableStructure();
        }
    }
    
    function addBasicTableFeatures() {
        // Add click handlers for sortable columns
        $(`${CONFIG.selectors.zoneTable} thead th.cnic-dt-column-sortable`).on('click', function() {
            const $th = $(this);
            const columnIndex = $th.index();
            
            // Remove previous sort classes from all columns
            $(`${CONFIG.selectors.zoneTable} thead th`).removeClass('cnic-dt-column-sorted-asc cnic-dt-column-sorted-desc');
            
            // Toggle sort direction
            const currentSort = $th.data('sort') || 'asc';
            const newSort = currentSort === 'asc' ? 'desc' : 'asc';
            
            // Add sort indicator to current column
            $th.addClass(`cnic-dt-column-sorted-${newSort}`).data('sort', newSort);
            
            // Sort the table data (basic implementation)
            sortTableByColumn(columnIndex, newSort);
        });
    }
    
    function sortTableByColumn(columnIndex, direction) {
        // Sort the filtered zones array - simplified for actual data structure
        filteredZones.sort(function(a, b) {
            let aVal, bVal;
            
            switch(columnIndex) {
                case 0: // DNS Zone
                    aVal = a.dnszone || '';
                    bVal = b.dnszone || '';
                    break;
                case 1: // Type
                    aVal = a.type || '';
                    bVal = b.type || '';
                    break;
                default:
                    aVal = '';
                    bVal = '';
            }
            
            // String sort for all columns
            return direction === 'asc' ? 
                aVal.toString().localeCompare(bVal.toString()) : 
                bVal.toString().localeCompare(aVal.toString());
        });
        
        // Reset to first page and redisplay
        currentPage = 1;
        displayCurrentPage();
    }
    
    function filterTableRows(searchTerm) {
        const searchTermLower = searchTerm ? searchTerm.toLowerCase() : '';
        
        filteredZones = currentZones.filter(zone => {
            // Apply category filter first
            let passesFilter = true;
            if (currentFilter === 'external') {
                passesFilter = zone.is_external;
            } else if (currentFilter === 'internal') {
                passesFilter = !zone.is_external;
            }
            // 'all' filter allows all zones through
            
            // Apply search term filter if provided
            if (searchTermLower && passesFilter) {
                const searchText = `${zone.dnszone || ''} ${zone.type || ''}`.toLowerCase();
                passesFilter = searchText.includes(searchTermLower);
            }
            
            return passesFilter;
        });
        
        currentPage = 1; // Reset to first page when filtering
        displayCurrentPage();
    }

    function setFilter(filterType) {
        currentFilter = filterType;
        
        // Update visual indicators on statistics cards
        updateFilterVisualState();
        
        // Apply the filter with current search term
        const currentSearchTerm = $(CONFIG.selectors.tableSearch).val();
        filterTableRows(currentSearchTerm);
        
        // Show filter status message
        const filterMessages = {
            'all': 'Showing all DNS zones',
            'external': 'Showing external DNS zones only',
            'internal': 'Showing internal DNS zones only'
        };
        showAlert('info', filterMessages[filterType]);
    }

    function updateFilterVisualState() {
        // Define filter to selector mapping for cleaner code
        const filterSelectors = {
            'all': CONFIG.selectors.totalDnsZones,
            'external': CONFIG.selectors.totalExternalZones,
            'internal': CONFIG.selectors.totalInternalZones
        };
        
        // Get all card containers
        const $allCards = $(Object.values(filterSelectors).join(', ')).parent().parent();
        
        // Remove active state from all cards and reset cursor
        $allCards.removeClass('filter-active').css('cursor', '');
        
        // Find and highlight the active card based on current filter
        const activeSelector = filterSelectors[currentFilter];
        if (activeSelector) {
            const $activeCard = $(activeSelector).parent().parent();
            if ($activeCard.length > 0) {
                $activeCard.addClass('filter-active');
            }
        }
        
        // Make all statistics cards clickable with pointer cursor
        $allCards.css('cursor', 'pointer');
    }
    
    function recreateTableStructure() {
        const headers = [
            { icon: 'fas fa-globe', text: 'DNS Zone', sortable: true },
            { icon: 'fas fa-tag', text: 'Type', sortable: true, extraClass: 'cnic-dt-column-status' },
            { icon: 'fas fa-cog', text: 'Actions', sortable: false, extraClass: 'cnic-dt-column-actions' }
        ];
        
        const headerRow = headers.map(header => {
            const classes = header.sortable ? 'cnic-dt-column-sortable' : '';
            const finalClasses = [classes, header.extraClass].filter(Boolean).join(' ');
            return Utils.createElement('th', finalClasses, Utils.createIcon(header.icon, header.text));
        }).join('');
        
        const cleanTableHTML = `
            <thead>
                <tr>${headerRow}</tr>
            </thead>
            <tbody id="dnsZonesTableBody">
            </tbody>`;
        
        $(CONFIG.selectors.zoneTable).html(cleanTableHTML);
    }

    // Removed getDataTableConfig function - using simple table instead

    function deleteZone(zoneName) {
        $(CONFIG.selectors.deleteModal).modal('hide');
        
        Utils.makeRequest('', {
            filter: 'deleteZone',
            dnszone: zoneName
        }, CONFIG.messages.deleteSuccess).done(function(response) {
            if (response.success) {
                // Remove the deleted zone from current data
                currentZones = currentZones.filter(zone => zone.dnszone !== zoneName);
                filteredZones = filteredZones.filter(zone => zone.dnszone !== zoneName);
                
                // Update statistics after deletion
                updateStatisticsAfterDeletion();
                
                // Refresh the display
                displayZones(filteredZones);
            }
        }).fail(function() {
            // Error already handled by Utils.makeRequest
        });
    }

    function displayZones(zones) {
        filteredZones = zones; // Store for pagination
        currentPage = 1; // Reset to first page
        
        if (zones.length === 0) {
            Utils.toggleElements(
                [CONFIG.selectors.noZonesMessage], 
                [CONFIG.selectors.zoneTable, CONFIG.selectors.tablePagination]
            );
            return;
        }
        
        Utils.toggleElements(
            [CONFIG.selectors.zoneTable], 
            [CONFIG.selectors.noZonesMessage]
        );
        
        // Ensure proper table structure before populating data
        ensureTableStructure();
        
        // Display current page
        displayCurrentPage();
        
        // Initialize basic table features after populating data
        initializeDataTable();
    }

    function displayCurrentPage() {
        const tbody = $(CONFIG.selectors.zoneTableBody);
        tbody.empty();
        
        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = Math.min(startIndex + itemsPerPage, filteredZones.length);
        const currentPageZones = filteredZones.slice(startIndex, endIndex);
        
        // Populate table data using utilities
        currentPageZones.forEach(zone => tbody.append(createZoneRow(zone)));
        
        // Update pagination controls
        updatePagination();
    }

    function updatePagination() {
        const totalItems = filteredZones.length;
        const totalPages = Math.ceil(totalItems / itemsPerPage);
        
        if (totalPages <= 1) {
            $(CONFIG.selectors.tablePagination).hide();
            return;
        }
        
        $(CONFIG.selectors.tablePagination).show();
        
        // Update info
        const startIndex = (currentPage - 1) * itemsPerPage + 1;
        const endIndex = Math.min(currentPage * itemsPerPage, totalItems);
        $(CONFIG.selectors.tableInfo).text(`Showing ${startIndex} to ${endIndex} of ${totalItems} entries`);
        
        // Update pagination buttons
        const $pagination = $(CONFIG.selectors.tablePagination);
        $pagination.empty();
        
        // Previous button
        const prevDisabled = currentPage === 1 ? 'disabled' : '';
        $pagination.append(`<li class="previous ${prevDisabled}">
            <a href="#" data-page="prev">Previous</a>
        </li>`);
        
        // Page numbers
        const startPage = Math.max(1, currentPage - 2);
        const endPage = Math.min(totalPages, currentPage + 2);
        
        for (let i = startPage; i <= endPage; i++) {
            const current = i === currentPage ? 'current' : '';
            $pagination.append(`<li class="${current}">
                <a href="#" data-page="${i}">${i}</a>
            </li>`);
        }
        
        // Next button
        const nextDisabled = currentPage === totalPages ? 'disabled' : '';
        $pagination.append(`<li class="next ${nextDisabled}">
            <a href="#" data-page="next">Next</a>
        </li>`);
    }

    function createZoneRow(zone) {
        const isExternal = zone.is_external;
        const zoneType = Utils.createStatusLabel(isExternal);
        const actions = createZoneActions(zone.dnszone, isExternal);
        
        const cells = [
            Utils.createElement('td', '', `<span class="cnic-dt-column-code">${zone.dnszone}</span>`),
            Utils.createElement('td', 'cnic-dt-column-status', zoneType),
            Utils.createElement('td', 'cnic-dt-column-actions', actions)
        ];
        
        return Utils.createElement('tr', '', cells.join(''));
    }

    function createZoneActions(zoneName, isExternal) {
        const viewButton = Utils.createButton(
            CONFIG.classes.buttons.view + ' btn-view-records',
            Utils.createIcon(CONFIG.icons.view),
            { 'data-zone': zoneName, 'title': 'View Records' }
        );
        
        if (isExternal) {
            const deleteButton = Utils.createButton(
                CONFIG.classes.buttons.delete + ' btn-delete-zone',
                Utils.createIcon(CONFIG.icons.delete),
                { 'data-zone': zoneName, 'title': 'Delete Zone' }
            );
            
            return Utils.createElement('div', CONFIG.classes.buttons.group, deleteButton + viewButton, { 'role': 'group' });
        }
        
        return viewButton;
    }

    function updateStatistics(stats) {
        // Use backend-provided stats directly
        const statsConfig = [
            { selector: '#totalDnsZones', value: stats.total_dns_zones || 0 },
            { selector: '#totalExternalZones', value: stats.external_count || 0 },
            { selector: '#totalInternalZones', value: stats.internal_count || 0 }
        ];
        
        statsConfig.forEach(stat => $(stat.selector).text(stat.value));
        
        // Calculate percentage from backend stats
        const total = stats.total_dns_zones || 0;
        const external = stats.external_count || 0;
        const percentage = total > 0 ? Math.round((external / total) * 100) : 0;
        $('#percentageExternal').text(percentage + '%');
        
        // Show stats section
        $(CONFIG.selectors.zoneStats).removeClass('hidden');
        
        // Update filter visual state
        updateFilterVisualState();
    }

    function updateStatisticsAfterDeletion() {
        // Calculate updated statistics from remaining zones
        const total = currentZones.length;
        const external = currentZones.filter(zone => zone.is_external).length;
        const internal = total - external;
        
        const updatedStats = {
            total_dns_zones: total,
            external_count: external,
            internal_count: internal
        };
        
        updateStatistics(updatedStats);
    }

    function viewZoneRecords(zoneName) {
        $(CONFIG.selectors.modalZoneName).text(zoneName);
        $(CONFIG.selectors.recordsModal).modal('show');
        
        // Show loading indicator and hide content/error
        $(CONFIG.selectors.recordsLoadingIndicator).show();
        $(CONFIG.selectors.recordsContent).hide();
        $(CONFIG.selectors.recordsError).hide();
        
        Utils.makeRequest('', {
            filter: 'getZoneRecords',
            dnszone: zoneName
        }).done(function(response) {
            $(CONFIG.selectors.recordsLoadingIndicator).hide();
            if (response.success) {
                displayDnsRecords(response.records);
                $(CONFIG.selectors.recordsContent).show();
            } else {
                $(CONFIG.selectors.recordsError).show();
            }
        }).fail(function() {
            $(CONFIG.selectors.recordsLoadingIndicator).hide();
            $(CONFIG.selectors.recordsError).show();
        });
    }

    function displayDnsRecords(records) {
        const tableBody = $(CONFIG.selectors.recordsTableBody);
        
        if (records.length === 0) {
            tableBody.html('<tr><td colspan="5" class="text-center">No DNS records found</td></tr>');
            return;
        }
        
        let rowsHtml = '';
        records.forEach(function(record) {
            rowsHtml += `
                <tr>
                    <td>${record.name || '-'}</td>
                    <td><span class="label label-info">${record.type || '-'}</span></td>
                    <td style="word-break: break-all;">${record.value || record.content || '-'}</td>
                    <td>${record.ttl || '-'}</td>
                    <td>${record.priority || '-'}</td>
                </tr>
            `;
        });
        
        tableBody.html(rowsHtml);
    }

    function showAlert(type, message) {
        // Remove any existing alerts first
        $('.alert').remove();
        
        const alertTypes = {
            success: 'alert-success',
            warning: 'alert-warning',
            info: 'alert-info',
            error: 'alert-danger'
        };
        
        const alertClass = alertTypes[type] || 'alert-danger';
        const capitalizedType = type.charAt(0).toUpperCase() + type.slice(1);
        
        const alert = Utils.createElement('div', `alert ${alertClass} alert-dismissible`, 
            `<strong>${capitalizedType}:</strong> ${message}` +
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                '<span aria-hidden="true">&times;</span>' +
            '</button>',
            { 'role': 'alert' }
        );
        
        $(CONFIG.selectors.alertContainer).append(alert);
        
        // Auto-hide after 5 seconds
        setTimeout(function() {
            $(alert).fadeOut(500, function() {
                $(this).remove();
            });
        }, 5000);
    }

    function showLoadingIndicator() {
        console.log('Showing loading indicator');
        // Hide any global loading overlays
        $('#loadingOverlay').hide();
        // Show our specific table loading indicator
        $(CONFIG.selectors.tableLoadingIndicator).removeClass('hidden');
    }

    function hideLoadingIndicator() {
        console.log('Hiding loading indicator');
        // Hide any global loading overlays
        $('#loadingOverlay').hide();
        // Hide our specific table loading indicator
        $(CONFIG.selectors.tableLoadingIndicator).addClass('hidden');
    }

    // ========================================
    // MULTI-STEP NAVIGATION SYSTEM
    // ========================================
    
    /**
     * Navigation to specific step
     */
    function goToStep(stepNumber) {
        console.log('Navigating to step:', stepNumber);
        
        // Hide all steps explicitly
        $(CONFIG.selectors.steps).each(function() {
            $(this).removeClass('active').hide().css('display', 'none');
        });
        
        // Show target step explicitly
        const $targetStep = $('#step' + stepNumber);
        if ($targetStep.length > 0) {
            $targetStep.addClass('active').show().css('display', 'block');
            console.log('Successfully navigated to step:', stepNumber);
        } else {
            console.error('Step not found:', stepNumber);
            return;
        }
        
        // Handle step-specific initialization
        switch(stepNumber) {
            case CONFIG.steps.DISCOVERY:
                resetDiscoveryStep();
                break;
            case CONFIG.steps.FILTER_MANAGE:
                initializeFilterManageStep();
                break;
        }
    }

    /**
     * Reset discovery step
     */
    function resetDiscoveryStep() {
        $('.alert').remove();
    }

    /**
     * Initialize zone management step
     */
    function initializeFilterManageStep() {
        console.log('Initializing zone management step with', currentZones.length, 'zones...');
        
        // Display all discovered zones in the management table
        displayZones(currentZones);
        
        // Show success message
        if (currentZones.length > 0) {
            showAlert('success', `Ready to manage ${currentZones.length} discovered DNS zones.`);
        }
    }

    /**
     * Start zone discovery process
     */
    function startZoneDiscovery() {
        console.log('Starting zone discovery process...');
        showAlert('info', 'Starting zone discovery...');
        showLoadingIndicator();
        
        // Disable the start discovery button and show loader
        const $startButton = $(CONFIG.selectors.startDiscovery);
        const originalText = $startButton.html();
        $startButton.prop('disabled', true)
                   .html('<i class="fas fa-spinner fa-spin"></i> Discovering Zones...');
        
        // Actually load zones during discovery
        Utils.makeRequest('addonmodules.php', {
            action: 'dnszones',
            module: 'cnicadmin',
            filter: "fetchZones",
            token: csrfToken
        }).done(function(response) {
            if (response.success) {
                // Use provided stats directly instead of complex mapping
                const stats = response.stats || {};
                const externalZones = new Set(response.external_zones || []);
                
                // Simple zone mapping using backend-provided data
                currentZones = (response.dns_zones || []).map(zone => ({
                    dnszone: zone,
                    type: externalZones.has(zone) ? 'External' : 'Internal',
                    is_external: externalZones.has(zone)
                }));
                filteredZones = [...currentZones];

                console.log('Zone discovery completed, found', stats.total_dns_zones || currentZones.length, 'zones');
                hideLoadingIndicator();
                showAlert('success', `Zone discovery completed! Found ${stats.total_dns_zones || currentZones.length} DNS zones.`);
                
                // Update statistics using backend data
                updateStatistics(stats);
                goToStep(CONFIG.steps.FILTER_MANAGE);
            }
        }).fail(function() {
            hideLoadingIndicator();
            showAlert('error', 'Failed to discover DNS zones. Please try again.');
        }).always(function() {
            // Re-enable the button and restore original text
            $startButton.prop('disabled', false).html(originalText);
        });
    }

    // ========================================
    // EVENT BINDINGS FOR NAVIGATION
    // ========================================

    // Start discovery button
    $(document).on('click', CONFIG.selectors.startDiscovery, function(e) {
        e.preventDefault();
        startZoneDiscovery();
    });

    // Previous/Next navigation buttons
    $(document).on('click', CONFIG.selectors.prevButton, function(e) {
        e.preventDefault();
        const targetStep = parseInt($(this).data('step'));
        if (targetStep) {
            goToStep(targetStep);
        }
    });

    $(document).on('click', CONFIG.selectors.nextButton, function(e) {
        e.preventDefault();
        const targetStep = parseInt($(this).data('step'));
        if (targetStep) {
            goToStep(targetStep);
        }
    });

    // Start over button
    $(document).on('click', CONFIG.selectors.startOver, function(e) {
        e.preventDefault();
        // Reset everything and go back to step 1
        currentZones = [];
        filteredZones = [];
        currentPage = 1;
        itemsPerPage = 15;
        currentFilter = 'all';
        $(CONFIG.selectors.tableSearch).val(''); // Clear search input
        goToStep(CONFIG.steps.DISCOVERY);
    });

    // Modal cleanup event handlers
    $(CONFIG.selectors.deleteModal).on('hidden.bs.modal', function() {
        // Reset checkbox and button state
        $(CONFIG.selectors.confirmDeleteCheckbox).prop('checked', false);
        $(CONFIG.selectors.confirmDeleteButton).prop('disabled', true);
        $(CONFIG.selectors.deleteZoneName).text('');
        currentZoneForAction = null;
    });

    $(CONFIG.selectors.recordsModal).on('hidden.bs.modal', function() {
        // Reset modal content
        $(CONFIG.selectors.modalZoneName).text('');
        $(CONFIG.selectors.recordsLoadingIndicator).hide();
        $(CONFIG.selectors.recordsContent).hide();
        $(CONFIG.selectors.recordsError).hide();
        $(CONFIG.selectors.recordsTableBody).empty();
    });

    // Initialize the interface with step 1
    goToStep(CONFIG.steps.DISCOVERY);
});