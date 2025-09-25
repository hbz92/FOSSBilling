/**
 * Event List Management for CNIC Admin
 * Handles event loading, filtering, and display functionality
 */

(function ($) {
    'use strict';

    const EventList = {
        // Configuration
        config: {
            currentPage: 0,
            pageSize: 50,
            totalEvents: 0,
            isLoading: false,
            hasMoreEvents: false,
            currentFilters: {}
        },

        // Initialize the event list functionality
        init: function () {
            this.bindEvents();
            this.initializeFilters();
        },

        // Bind event listeners
        bindEvents: function () {
            $('#loadEventsBtn').on('click', this.loadEvents.bind(this));
            $('#clearFiltersBtn').on('click', this.clearFilters.bind(this));
            $('#loadMoreEventsBtn').on('click', this.loadMoreEvents.bind(this));
            $('#eventLimit').on('change', this.updatePageSize.bind(this));
            
            // Handle enter key in filter inputs
            $('#eventSubclass, #objectId').on('keypress', function(e) {
                if (e.which === 13) {
                    EventList.loadEvents();
                }
            });

            // Handle event details button clicks (using delegation for dynamically added rows)
            $('#eventsTableBody').on('click', '[data-action="show-details"]', this.showEventDetails.bind(this));
        },

        // Initialize filter dropdowns
        initializeFilters: function () {
            // Page size is already set in template, no need to load classes dynamically
            // as they're already in the template
        },

        // Update page size configuration
        updatePageSize: function () {
            this.config.pageSize = parseInt($('#eventLimit').val()) || 50;
        },

        // Load events with current filters
        loadEvents: function () {
            if (this.config.isLoading) {
                return;
            }

            this.config.currentFilters = this.getFilters();
            this.updatePageSize();
            
            this.showLoading();
            this.hideResults();
            this.hideNoEventsMessage();
            this.clearEventsTable();
            
            this.fetchEvents(0, this.config.pageSize);
        },

        // Load more events (pagination)
        loadMoreEvents: function () {
            if (this.config.isLoading || !this.config.hasMoreEvents) {
                return;
            }

            const nextPage = this.config.currentPage + this.config.pageSize;
            this.fetchEvents(nextPage, this.config.pageSize, true);
        },

        // Get current filter values
        getFilters: function () {
            return {
                class: $('#eventClass').val(),
                subclass: $('#eventSubclass').val().trim(),
                objectid: $('#objectId').val().trim(),
                limit: parseInt($('#eventLimit').val()) || 50
            };
        },

        // Clear all filters
        clearFilters: function () {
            $('#eventClass').val('');
            $('#eventSubclass').val('');
            $('#objectId').val('');
            $('#eventLimit').val('50');
            
            // Clear results and reset everything
            this.hideResults();
            this.hideNoEventsMessage();
            this.clearEventsTable();
        },

        // Fetch events from the server
        fetchEvents: function (first, limit, append = false) {
            this.config.isLoading = true;
            
            if (!append) {
                this.updateLoadingMessage('Loading events...');
            }

            const data = {
                request: 'fetchEvents',
                first: first,
                limit: limit,
                ...this.config.currentFilters
            };

            $.post(window.location.href, data)
                .done((response) => {
                    this.handleEventsResponse(response, append);
                })
                .fail((xhr, status, error) => {
                    this.handleError('Failed to load events: ' + error);
                })
                .always(() => {
                    this.config.isLoading = false;
                    this.hideLoading();
                });
        },

        // Handle server response for events
        handleEventsResponse: function (response, append = false) {
            if (response.success) {
                const events = response.events || [];
                const eventsHtml = response.eventsHtml || '';
                const totalFromAPI = parseInt(response.total) || 0;
                
                if (!append) {
                    this.clearEventsTable();
                    this.config.currentPage = 0;
                    this.config.totalEvents = totalFromAPI; // Use total from API
                }

                if (events.length > 0) {
                    // Use the pre-rendered HTML from server
                    const tbody = $('#eventsTableBody');
                    if (append) {
                        tbody.append(eventsHtml);
                    } else {
                        tbody.html(eventsHtml);
                    }
                    
                    this.config.currentPage += events.length;
                    this.config.hasMoreEvents = response.hasMore || false;
                    
                    this.showResults();
                    this.updateEventCount();
                    this.updatePagination();
                } else if (!append) {
                    this.showNoEventsMessage();
                }
            } else {
                this.handleError(response.error || 'Failed to load events');
            }
        },

        // Show event details in modal
        showEventDetails: function (e) {
            e.preventDefault();
            const button = $(e.currentTarget);
            const eventIndex = button.data('event-index');
            
            // Show the modal with loading state (already set in template)
            $('#eventDetailsModal').modal('show');
            
            // Fetch detailed event information via StatusEvent API
            this.fetchEventDetails(eventIndex);
        },

        // Fetch detailed event information using StatusEvent API
        fetchEventDetails: function (eventIndex) {
            const modalBody = $('#eventDetailsBody');
            
            // Show loading state
            modalBody.html(`
                <div class="text-center cnic-p-20-center">
                    <i class="fas fa-spinner fa-spin fa-2x text-primary"></i>
                    <p class="text-muted" style="margin-top: 15px;">Loading event details...</p>
                </div>
            `);

            const data = {
                request: 'getEventDetails',
                eventIndex: eventIndex
            };

            $.post(window.location.href, data)
                .done((response) => {
                    if (response.success) {
                        // Use the pre-rendered HTML from server
                        modalBody.html(response.detailsHtml);
                    } else {
                        modalBody.html(`
                            <div class="alert alert-warning text-center" style="margin: 20px;">
                                <i class="fas fa-info-circle fa-2x text-warning" style="margin-bottom: 15px; display: block;"></i>
                                <h4>No Details Available</h4>
                                <p style="margin-bottom: 0;">
                                    ${response.error || 'Event details are not available for this event.'}
                                </p>
                            </div>
                        `);
                    }
                })
                .fail((xhr, status, error) => {
                    modalBody.html(`
                        <div class="alert alert-danger text-center" style="margin: 20px;">
                            <i class="fas fa-exclamation-triangle fa-2x text-danger" style="margin-bottom: 15px; display: block;"></i>
                            <h4>Error Loading Details</h4>
                            <p style="margin-bottom: 0;">
                                Failed to load event details: ${error}
                            </p>
                        </div>
                    `);
                });
        },

        // Update event count display
        updateEventCount: function () {
            const loadedCount = this.config.currentPage;
            const totalCount = this.config.totalEvents;
            
            // Update the badge with total available events
            $('#eventCount').text(totalCount);
            
            // Update the info text to show current results vs total
            if (totalCount > 0) {
                if (loadedCount < totalCount) {
                    $('#eventsInfo').text(`Showing ${loadedCount} of ${totalCount} events`);
                } else {
                    $('#eventsInfo').text(`Showing all ${totalCount} events`);
                }
            } else {
                $('#eventsInfo').text('No events found');
            }
        },

        // Update pagination controls
        updatePagination: function () {
            const loadedCount = this.config.currentPage;
            const totalCount = this.config.totalEvents;
            
            if (totalCount > 0) {
                $('#eventsPagination').show();
                
                // Show load more button if there are more events to load
                if (this.config.hasMoreEvents && loadedCount < totalCount) {
                    $('#loadMoreEventsBtn').show();
                } else {
                    $('#loadMoreEventsBtn').hide();
                }
            } else {
                $('#eventsPagination').hide();
            }
        },

        // Clear events table
        clearEventsTable: function () {
            $('#eventsTableBody').empty();
            this.resetEventCounts();
        },

        // Reset event counts and display
        resetEventCounts: function () {
            this.config.totalEvents = 0;
            this.config.currentPage = 0;
            this.config.hasMoreEvents = false;
            $('#eventCount').text('0');
            $('#eventsInfo').text('');
            $('#eventsPagination').hide();
            $('#loadMoreEventsBtn').hide();
        },

        // Show loading indicator
        showLoading: function () {
            $('#loadingIndicator').show();
        },

        // Hide loading indicator
        hideLoading: function () {
            $('#loadingIndicator').hide();
        },

        // Update loading message
        updateLoadingMessage: function (message) {
            $('#loadingIndicator .loading-container p').text(message);
        },

        // Show results section
        showResults: function () {
            $('#eventsDisplay').show();
            this.hideNoEventsMessage();
        },

        // Hide results section
        hideResults: function () {
            $('#eventsDisplay').hide();
        },

        // Show no events message
        showNoEventsMessage: function () {
            $('#noEventsMessage').show();
            this.hideResults();
        },

        // Hide no events message
        hideNoEventsMessage: function () {
            $('#noEventsMessage').hide();
        },

        // Handle errors
        handleError: function (message) {
            this.showAlert('danger', 'Error', message);
            this.hideResults();
            this.hideNoEventsMessage();
        },

        // Show alert message
        showAlert: function (type, title, message) {
            const alert = `
                <div class="alert alert-${type} alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>${title}:</strong> ${message}
                </div>
            `;
            
            $('#alertContainer').html(alert);
            
            // Auto-dismiss after 5 seconds for non-error alerts
            if (type !== 'danger') {
                setTimeout(() => {
                    $('#alertContainer .alert').fadeOut();
                }, 5000);
            }
        }
    };

    // Initialize when document is ready
    $(document).ready(function () {
        EventList.init();
    });

    // Expose EventList globally for modal interactions
    window.EventList = EventList;

})(jQuery);
