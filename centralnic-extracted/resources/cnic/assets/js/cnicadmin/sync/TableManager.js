/**
 * TableManager - Clean DataTable Management with Modern Best Practices
 * Handles all DataTable operations without workarounds or legacy code
 * 
 * @author CNIC Development Team
 * @version 2.0.0
 */

'use strict';

class TableManager {
    /**
     * TableManager constants
     */
    static get CONSTANTS() {
        return Object.freeze({
            STATUS_CLASSES: Object.freeze({
                success: 'badge-success',
                error: 'badge-danger', 
                warning: 'badge-warning',
                info: 'badge-info',
                pending: 'badge-secondary'
            }),
            COLUMN_INDICES: Object.freeze({
                DOMAIN: 0,
                STATUS: 1,
                OLD_EXPIRY: 2,
                NEW_EXPIRY: 3,
                NEXT_DUE: 4,
                NEXT_INVOICE: 5
            })
        });
    }

    /**
     * Constructor
     * @param {SyncApp} app - Main application instance
     */
    constructor(app) {
        if (!app) {
            throw new Error('[TableManager] Application instance is required');
        }

        this.app = app;
        this.selector = app.constructor.CONSTANTS.SELECTORS.domainTable;
        this.dataTable = null;
        this.isInitialized = false;
        
        // Bind methods to maintain context
        this.destroy = this.destroy.bind(this);
        this.reset = this.reset.bind(this);

        console.log('[TableManager] Instance created');
    }

    /**
     * Build DataTable configuration
     * @returns {Object} DataTable configuration object
     * @private
     */
    buildTableConfig() {
        return {
            order: [[TableManager.CONSTANTS.COLUMN_INDICES.DOMAIN, 'asc']],

            // Feature configuration - enable functionality but use template controls
            searching: true,   // Enable search but will be controlled by template
            paging: true,      // Enable paging but will be controlled by template
            info: true,        // Enable info but will be displayed in template
            autoWidth: false,
            responsive: true,
            processing: false,
            deferRender: true,

            // Custom page length options - match template default
            lengthMenu: [[10, 15, 25, 50], [10, 15, 25, 50]],
            pageLength: 15, // Match template default (15 is selected)

            // Remove default DataTables DOM - use template elements instead
            dom: 't', // Only show table, no controls

            // Language configuration
            language: {
                emptyTable: "No sync results available",
                processing: "Processing sync results...",
                search: "Search domains:",
                lengthMenu: "Show _MENU_ domains",
                info: "Showing _START_ to _END_ of _TOTAL_ domains",
                infoEmpty: "No domains to display",
                infoFiltered: "(filtered from _MAX_ total domains)"
            },

            // Performance optimizations
            drawCallback: this.handleDrawCallback.bind(this),
            initComplete: (settings, json) => {
                // Store the DataTable instance reference from the settings object
                this.dataTable = new $.fn.dataTable.Api(settings);
                this.isInitialized = true;
                // Now call our handler
                this.handleInitComplete();
            }
        };
    }

    /**
     * Completely destroy existing DataTable to prevent reinitialization errors
     * @private
     */
    destroyExistingTable() {
        try {
            const $table = $(this.selector);
            
            // Method 1: Destroy current instance if it exists
            if (this.dataTable) {
                this.dataTable.destroy(true); // true = remove from DOM
                this.dataTable = null;
            }
            
            // Method 2: Check jQuery.fn.DataTable registry
            if ($.fn.DataTable && $.fn.DataTable.isDataTable($table[0])) {
                $table.DataTable().destroy(true);
            }
            
            // Method 3: Clear any remaining DataTable elements
            $table.removeClass('dataTable no-footer');
            $table.find('thead th').removeClass('sorting sorting_asc sorting_desc');
            
            // Clear any wrapper elements that might exist
            const $wrapper = $table.closest('.dataTables_wrapper');
            if ($wrapper.length && $wrapper[0] !== $table[0]) {
                $wrapper.replaceWith($table);
            }
            
            // Reset flags
            this.isInitialized = false;
            
            console.log('[TableManager] Existing table destroyed successfully');
            
        } catch (error) {
            console.log('[TableManager] No existing table to destroy:', error.message);
        }
    }

    /**
     * Initialize the DataTable instance
     * @returns {Promise<boolean>} Initialization success
     */
    async initializeTable() {
        try {
            console.log('[TableManager] Initializing DataTable...');

            // Destroy existing DataTable instance completely
            this.destroyExistingTable();

            // Check if table element exists
            const $table = $(this.selector);
            if ($table.length === 0) {
                throw new Error(`Table element not found: ${this.selector}`);
            }

            // Validate table structure
            this.validateTableStructure($table);

            const config = this.buildTableConfig();
            const tableInstance = $table.DataTable(config);
            // this.dataTable and this.isInitialized will be set in initComplete callback
            
            console.log('[TableManager] DataTable initialization started');
            return true;

        } catch (error) {
            console.error('[TableManager] Failed to initialize DataTable:', error);
            this.isInitialized = false;
            return false;
        }
    }

    /**
     * Validate table structure before initialization
     * @param {jQuery} $table - Table element
     * @private
     */
    validateTableStructure($table) {
        const headerCount = $table.find('thead th').length;
        const expectedColumns = 6;

        if (headerCount !== expectedColumns) {
            throw new Error(`Table structure invalid: found ${headerCount} columns, expected ${expectedColumns}`);
        }

        // Ensure tbody exists
        if ($table.find('tbody').length === 0) {
            $table.append('<tbody></tbody>');
        }

        console.log('[TableManager] Table structure validated');
    }

    /**
     * Add a domain result to the DataTable
     * @param {string} domainName - Domain name
     * @param {string} status - Sync status
     * @param {Object} statusData - Status data object
     * @returns {boolean} Success status
     */
    addResult(domainName, status, statusData) {
        if (!domainName || !status || !statusData) {
            console.error('[TableManager] Invalid parameters for addResult');
            return false;
        }

        try {
            console.log(`[TableManager] Adding result: ${domainName} -> ${status}`);

            // Try DataTable approach first
            if (this.isInitialized && this.dataTable) {
                return this.addResultToDataTable(domainName, status, statusData);
            } else {
                // Fallback to custom table approach
                return this.addResultToCustomTable(domainName, status, statusData);
            }

        } catch (error) {
            console.error(`[TableManager] Failed to add result for ${domainName}:`, error);
            return false;
        }
    }

    /**
     * Add result using DataTable
     * @param {string} domainName - Domain name
     * @param {string} status - Status string
     * @param {Object} statusData - Status data object
     * @returns {boolean} Success status
     * @private
     */
    addResultToDataTable(domainName, status, statusData) {
        try {
            // Build row data
            const rowData = this.buildRowData(domainName, status, statusData);

            // Add to DataTable
            const row = this.dataTable.row.add(rowData);
            
            // Redraw table to show new data
            this.dataTable.draw(false); // false = don't reset paging
            
            // Manually update info display to ensure it shows correct counts
            this.updateInfoDisplay();

            console.log(`[TableManager] Successfully added DataTable result for ${domainName}`);
            return true;
        } catch (error) {
            console.error(`[TableManager] DataTable add failed for ${domainName}:`, error);
            return false;
        }
    }

    /**
     * Add result using custom table approach
     * @param {string} domainName - Domain name
     * @param {string} status - Status string
     * @param {Object} statusData - Status data object
     * @returns {boolean} Success status
     * @private
     */
    addResultToCustomTable(domainName, status, statusData) {
        try {
            const $tbody = $(this.selector).find('tbody');
            if ($tbody.length === 0) {
                console.error('[TableManager] Table tbody not found');
                return false;
            }

            // Clear placeholder text on first result
            this.clearPlaceholderIfExists($tbody);

            // Build HTML row
            const rowHtml = this.buildRowHTML(domainName, status, statusData);

            // Add to table
            $tbody.append(rowHtml);

            // Update custom table info
            this.updateCustomTableInfo();

            console.log(`[TableManager] Successfully added custom table result for ${domainName}`);
            return true;
        } catch (error) {
            console.error(`[TableManager] Custom table add failed for ${domainName}:`, error);
            return false;
        }
    }

    /**
     * Clear placeholder text if it exists
     * @param {jQuery} $tbody - Table body element
     * @private
     */
    clearPlaceholderIfExists($tbody) {
        // Remove any placeholder rows
        $tbody.find('tr').each(function() {
            const $row = $(this);
            const text = $row.text().trim();
            if (text === 'No sync results available' || $row.find('td').length === 1) {
                $row.remove();
            }
        });
    }

    /**
     * Build HTML row for custom table approach
     * @param {string} domainName - Domain name
     * @param {string} status - Status string
     * @param {Object} statusData - Status data object
     * @returns {string} HTML row string
     * @private
     */
    buildRowHTML(domainName, status, statusData) {
        const statusClass = TableManager.CONSTANTS.STATUS_CLASSES[status] || 'badge-secondary';
        const statusDisplay = status.charAt(0).toUpperCase() + status.slice(1);

        const oldExpiry = statusData.oldexpiry || statusData.old_expiry || 'N/A';
        const newExpiry = statusData.newexpiry || statusData.new_expiry || 'N/A';
        const nextDue = statusData.nextdue || statusData.next_due || 'N/A';
        const invoiceDate = statusData.invoicedate || statusData.invoice_date || 'N/A';

        return `
            <tr data-domain="${domainName}" data-status="${status}">
                <td class="cnic-dt-column-domain">${domainName}</td>
                <td class="cnic-dt-column-status">
                    <span class="badge ${statusClass}">${statusDisplay}</span>
                </td>
                <td class="cnic-dt-column-date">${oldExpiry}</td>
                <td class="cnic-dt-column-date">${newExpiry}</td>
                <td class="cnic-dt-column-date">${nextDue}</td>
                <td class="cnic-dt-column-date">${invoiceDate}</td>
            </tr>
        `;
    }

    /**
     * Update custom table info display
     * @private
     */
    updateCustomTableInfo() {
        const $tbody = $(this.selector).find('tbody');
        const totalRows = $tbody.find('tr').length;
        
        const $tableInfo = $('#tableInfo');
        if ($tableInfo.length) {
            $tableInfo.text(`Showing 1 to ${totalRows} of ${totalRows} entries`);
        }

        console.log(`[TableManager] Updated custom table info: ${totalRows} entries`);
    }

    /**
     * Clear all table contents for new sync
     * @returns {boolean} Clear success
     */
    clearTableForNewSync() {
        try {
            console.log('[TableManager] Clearing table for new sync...');

            if (this.isInitialized && this.dataTable) {
                // DataTable approach
                this.dataTable.clear().draw();
                // Manually update info display to ensure it shows correct counts
                this.updateInfoDisplay();
            } else {
                // Custom table approach
                const $tbody = $(this.selector).find('tbody');
                $tbody.empty();
                
                // Update table info
                const $tableInfo = $('#tableInfo');
                if ($tableInfo.length) {
                    $tableInfo.text('Showing 0 to 0 of 0 entries');
                }
            }

            console.log('[TableManager] Table cleared successfully');
            return true;

        } catch (error) {
            console.error('[TableManager] Failed to clear table:', error);
            return false;
        }
    }

    /**
     * Build row data array for a domain result
     * @param {string} domainName - Domain name
     * @param {string} status - Sync status  
     * @param {Object} statusData - Status data
     * @returns {Array} Row data array
     * @private
     */
    buildRowData(domainName, status, statusData) {
        return [
            this.buildDomainCell(domainName),
            this.buildStatusCell(status),
            this.buildDateCell(statusData.old_expiry, '#fef3cd', '#856404'),
            this.buildDateCell(statusData.new_expiry, '#d1edff', '#0c5aa6'),
            this.buildDateCell(statusData.next_due_date, '#e2e3e5', '#495057'),
            this.buildDateCell(statusData.next_invoice_date, '#f8d7da', '#721c24')
        ];
    }

    /**
     * Build domain cell content
     * @param {string} domainName - Domain name
     * @returns {string} HTML content
     * @private
     */
    buildDomainCell(domainName) {
        return `<strong>${this.escapeHtml(domainName)}</strong>`;
    }

    /**
     * Build status cell content with badge
     * @param {string} status - Status string
     * @returns {string} HTML content
     * @private
     */
    buildStatusCell(status) {
        const statusInfo = this.getStatusInfo(status);
        const badgeClass = TableManager.CONSTANTS.STATUS_CLASSES[statusInfo.type] || 'badge-secondary';
        
        return `<span class="badge ${badgeClass}">${this.escapeHtml(statusInfo.label)}</span>`;
    }

    /**
     * Build date cell content with styling
     * @param {string} dateValue - Date value
     * @param {string} bgColor - Background color
     * @param {string} textColor - Text color
     * @returns {string} HTML content
     * @private
     */
    buildDateCell(dateValue, bgColor, textColor) {
        if (!dateValue || dateValue === 'N/A') {
            return '<span class="text-muted">N/A</span>';
        }

        const escapedDate = this.escapeHtml(dateValue);
        return `<span class="badge" style="background-color: ${bgColor}; color: ${textColor};">${escapedDate}</span>`;
    }

    /**
     * Get status information for display
     * @param {string} status - Raw status string
     * @returns {Object} Status info object
     * @private
     */
    getStatusInfo(status) {
        const statusMap = {
            'success': { type: 'success', label: 'Success' },
            'updated': { type: 'success', label: 'Updated' },
            'completed': { type: 'success', label: 'Completed' },
            'failed': { type: 'error', label: 'Failed' },
            'error': { type: 'error', label: 'Error' },
            'skipped': { type: 'warning', label: 'Skipped' },
            'pending': { type: 'pending', label: 'Pending' },
            'processing': { type: 'info', label: 'Processing' }
        };

        return statusMap[status.toLowerCase()] || { type: 'info', label: status };
    }

    /**
     * Escape HTML to prevent XSS
     * @param {string} text - Text to escape
     * @returns {string} Escaped text
     * @private
     */
    escapeHtml(text) {
        if (typeof text !== 'string') {
            return String(text);
        }
        
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    /**
     * Clear all table data
     * @returns {boolean} Success status
     */
    clearData() {
        if (!this.isInitialized || !this.dataTable) {
            console.log('[TableManager] No data to clear - DataTable not initialized');
            return true;
        }

        try {
            console.log('[TableManager] Clearing all table data...');
            
            this.dataTable.clear().draw();
            
            console.log('[TableManager] Table data cleared successfully');
            return true;

        } catch (error) {
            console.error('[TableManager] Failed to clear table data:', error);
            return false;
        }
    }

    /**
     * Get current row count
     * @returns {number} Number of rows
     */
    getRowCount() {
        if (!this.isInitialized || !this.dataTable) {
            return 0;
        }

        return this.dataTable.rows().count();
    }

    /**
     * Check if table is empty
     * @returns {boolean} True if empty
     */
    isEmpty() {
        return this.getRowCount() === 0;
    }

    /**
     * Destroy DataTable completely and clean up
     * @returns {boolean} Success status
     */
    destroyTable() {
        if (!this.isInitialized || !this.dataTable) {
            console.log('[TableManager] No DataTable to destroy');
            return true;
        }

        try {
            console.log('[TableManager] Destroying DataTable...');

            // Destroy DataTable instance
            this.dataTable.destroy(true); // true = remove from DOM
            
            // Clear references
            this.dataTable = null;
            this.isInitialized = false;

            // Clean up any remaining DataTable elements
            $('.dataTables_wrapper').remove();
            $('.dataTables_info').remove();
            $('.dataTables_paginate').remove();
            $('.dataTables_length').remove();
            $('.dataTables_filter').remove();

            console.log('[TableManager] DataTable destroyed successfully');
            return true;

        } catch (error) {
            console.error('[TableManager] Failed to destroy DataTable:', error);
            
            // Force cleanup on error
            this.dataTable = null;
            this.isInitialized = false;
            return false;
        }
    }

    /**
     * Reset table to clean state
     * @returns {Promise<boolean>} Reset success
     */
    async reset() {
        console.log('[TableManager] Resetting table...');
        
        try {
            // Destroy existing table
            this.destroyTable();
            
            // Small delay to ensure DOM cleanup
            await new Promise(resolve => setTimeout(resolve, 50));
            
            // Re-initialize clean table
            return await this.initializeTable();

        } catch (error) {
            console.error('[TableManager] Reset failed:', error);
            return false;
        }
    }

    //=============================================================================
    // EVENT HANDLERS - Clean callback handling
    //=============================================================================

    /**
     * Handle DataTable draw callback
     * @private
     */
    handleDrawCallback() {
        console.log(`[TableManager] Table redrawn - ${this.getRowCount()} rows displayed`);
    }

    /**
     * Handle DataTable initialization complete
     * @private
     */
    handleInitComplete() {
        console.log('[TableManager] DataTable initialization completed, DataTable instance:', !!this.dataTable);
        
        // Double-check that we have the DataTable instance
        if (!this.dataTable) {
            console.error('[TableManager] DataTable instance not available in initComplete');
            return;
        }
        
        // Setup template controls after table is initialized
        this.setupTemplateControls();
        
        // Initialize info display to show proper empty state
        this.updateInfoDisplay();
        
        // Add any other post-initialization setup
        this.setupTableEventHandlers();
    }

    /**
     * Setup template controls to work with DataTable
     */
    setupTemplateControls() {
        console.log('[TableManager] Setting up template controls...');
        
        // Check if DataTable is initialized before setting up controls
        if (!this.dataTable) {
            console.warn('[TableManager] DataTable not initialized, skipping template controls setup');
            return;
        }

        // Setup search functionality - use the correct ID from template
        const searchInput = document.querySelector('#tableSearch');
        if (searchInput) {
            // Remove existing listeners to avoid duplicates
            searchInput.replaceWith(searchInput.cloneNode(true));
            const newSearchInput = document.querySelector('#tableSearch');
            
            newSearchInput.addEventListener('keyup', (e) => {
                console.log('[TableManager] Search triggered:', e.target.value);
                this.dataTable.search(e.target.value).draw();
            });
            
            newSearchInput.addEventListener('input', (e) => {
                console.log('[TableManager] Input triggered:', e.target.value);
                this.dataTable.search(e.target.value).draw();
            });
            
            console.log('[TableManager] Search functionality connected to #tableSearch');
        } else {
            console.error('[TableManager] Search input #tableSearch not found in DOM');
        }

        // Setup entries selector - use the correct ID from template  
        const entriesSelect = document.querySelector('#entriesPerPage');
        if (entriesSelect) {
            // Remove existing listeners to avoid duplicates
            entriesSelect.replaceWith(entriesSelect.cloneNode(true));
            const newEntriesSelect = document.querySelector('#entriesPerPage');
            
            newEntriesSelect.addEventListener('change', (e) => {
                const pageLength = parseInt(e.target.value);
                console.log('[TableManager] Page length changed to:', pageLength);
                this.dataTable.page.len(pageLength).draw();
            });
            console.log('[TableManager] Entries per page selector connected to #entriesPerPage');
        } else {
            console.error('[TableManager] Entries selector #entriesPerPage not found in DOM');
        }

        // Setup pagination buttons
        this.setupPaginationButtons();
        
        // Update info display
        this.updateInfoDisplay();
        
        // Listen for table draw events to update template elements
        this.dataTable.on('draw', () => {
            this.updateInfoDisplay();
            this.updatePaginationButtons();
        });

        console.log('[TableManager] All template controls connected to DataTable');
    }

    /**
     * Setup pagination button handlers
     */
    setupPaginationButtons() {
        const pagination = document.querySelector('.cnic-dt-pagination');
        if (!pagination || !this.dataTable) return;

        // Previous button - using the correct template structure
        const prevBtn = pagination.querySelector('.previous a');
        if (prevBtn) {
            prevBtn.addEventListener('click', (e) => {
                e.preventDefault();
                if (this.dataTable.page.info().page > 0) {
                    this.dataTable.page('previous').draw('page');
                }
            });
        }

        // Next button - using the correct template structure
        const nextBtn = pagination.querySelector('.next a');
        if (nextBtn) {
            nextBtn.addEventListener('click', (e) => {
                e.preventDefault();
                const info = this.dataTable.page.info();
                if (info.page < info.pages - 1) {
                    this.dataTable.page('next').draw('page');
                }
            });
        }
        
        console.log('[TableManager] Pagination buttons connected');
    }

    /**
     * Update pagination button states and generate page numbers
     */
    updatePaginationButtons() {
        if (!this.dataTable) return;
        
        const info = this.dataTable.page.info();
        const pagination = document.querySelector('.cnic-dt-pagination');
        if (!pagination) return;

        console.log('[TableManager] Updating pagination - Current page:', info.page + 1, 'Total pages:', info.pages);

        // Clear existing pagination content except template buttons
        const prevBtn = pagination.querySelector('.previous');
        const nextBtn = pagination.querySelector('.next');
        
        // Remove all page number items (keep prev/next buttons)
        const pageItems = pagination.querySelectorAll('li:not(.previous):not(.next)');
        pageItems.forEach(item => item.remove());

        // Update previous button
        if (prevBtn) {
            if (info.page === 0) {
                prevBtn.classList.add('disabled');
            } else {
                prevBtn.classList.remove('disabled');
            }
        }

        // Generate page numbers
        if (info.pages > 1) {
            this.generatePageNumbers(pagination, info, prevBtn, nextBtn);
        } else {
            // Single page - just add page 1
            const pageItem = document.createElement('li');
            pageItem.className = 'current';
            pageItem.innerHTML = '<a href="#" data-page="1">1</a>';
            if (nextBtn) {
                pagination.insertBefore(pageItem, nextBtn);
            } else {
                pagination.appendChild(pageItem);
            }
        }

        // Update next button
        if (nextBtn) {
            if (info.page >= info.pages - 1) {
                nextBtn.classList.add('disabled');
            } else {
                nextBtn.classList.remove('disabled');
            }
        }
    }

    /**
     * Generate page number buttons for pagination
     * @param {Element} pagination - Pagination container
     * @param {Object} info - DataTable page info
     * @param {Element} prevBtn - Previous button element
     * @param {Element} nextBtn - Next button element
     */
    generatePageNumbers(pagination, info, prevBtn, nextBtn) {
        const currentPage = info.page + 1; // DataTable uses 0-based indexing
        const totalPages = info.pages;
        
        // Simple pagination: show all pages if <= 5, otherwise show smart truncation
        let startPage = 1;
        let endPage = totalPages;
        
        if (totalPages > 5) {
            if (currentPage <= 3) {
                startPage = 1;
                endPage = 5;
            } else if (currentPage >= totalPages - 2) {
                startPage = totalPages - 4;
                endPage = totalPages;
            } else {
                startPage = currentPage - 2;
                endPage = currentPage + 2;
            }
        }

        // Generate page number buttons
        for (let i = startPage; i <= endPage; i++) {
            const pageItem = document.createElement('li');
            pageItem.className = i === currentPage ? 'current' : '';
            pageItem.innerHTML = `<a href="#" data-page="${i}">${i}</a>`;
            
            // Add click handler
            pageItem.querySelector('a').addEventListener('click', (e) => {
                e.preventDefault();
                if (this.dataTable && i !== currentPage) {
                    this.dataTable.page(i - 1).draw('page');
                }
            });

            // Insert before next button
            if (nextBtn) {
                pagination.insertBefore(pageItem, nextBtn);
            } else {
                pagination.appendChild(pageItem);
            }
        }

        // Add ellipsis if needed
        if (startPage > 1) {
            const ellipsisItem = document.createElement('li');
            ellipsisItem.className = 'disabled';
            ellipsisItem.innerHTML = '<span>...</span>';
            const firstPageItem = pagination.querySelector('li:not(.previous):not(.next)');
            pagination.insertBefore(ellipsisItem, firstPageItem);
        }

        if (endPage < totalPages) {
            const ellipsisItem = document.createElement('li');
            ellipsisItem.className = 'disabled';
            ellipsisItem.innerHTML = '<span>...</span>';
            if (nextBtn) {
                pagination.insertBefore(ellipsisItem, nextBtn);
            } else {
                pagination.appendChild(ellipsisItem);
            }
        }
    }

    /**
     * Update info display in template
     */
    updateInfoDisplay() {
        const infoElement = document.querySelector('.cnic-dt-footer .cnic-dt-info') || document.querySelector('#tableInfo');
        if (!infoElement || !this.dataTable) return;

        const info = this.dataTable.page.info();
        let infoText = '';
        
        if (info.recordsTotal === 0) {
            infoText = 'No domains to display';
        } else {
            const start = info.recordsDisplay === 0 ? 0 : info.start + 1;
            const end = info.start + info.length > info.recordsDisplay ? 
                       info.recordsDisplay : info.start + info.length;
            
            infoText = `Showing ${start} to ${end} of ${info.recordsDisplay} domains`;
            
            if (info.recordsFiltered < info.recordsTotal) {
                infoText += ` (filtered from ${info.recordsTotal} total domains)`;
            }
        }
        
        infoElement.textContent = infoText;
    }

    /**
     * Setup table-specific event handlers
     * @private
     */
    setupTableEventHandlers() {
        if (!this.isInitialized || !this.dataTable) return;

        // Add custom event handlers for table interactions
        // For example, row click handlers, etc.
        
        console.log('[TableManager] Table event handlers setup complete');
    }

    //=============================================================================
    // CLEANUP AND DESTRUCTION
    //=============================================================================

    /**
     * Cleanup and destroy manager instance
     */
    destroy() {
        console.log('[TableManager] Destroying manager...');
        
        try {
            // Destroy DataTable
            this.destroyTable();
            
            // Clear all references
            this.app = null;
            this.dataTable = null;
            this.isInitialized = false;

            console.log('[TableManager] Manager destroyed successfully');

        } catch (error) {
            console.error('[TableManager] Destroy failed:', error);
        }
    }
}

//=============================================================================
// EXPORT - Make TableManager available
//=============================================================================

if (typeof module !== 'undefined' && module.exports) {
    module.exports = TableManager;
} else if (typeof window !== 'undefined') {
    window.TableManager = TableManager;
}