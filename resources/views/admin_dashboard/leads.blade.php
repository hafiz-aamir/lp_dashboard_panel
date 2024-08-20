@extends('layouts.backend')

@section('css')
<style>


</style>
@endsection

@section('content')



<div class="main-dashboard-content-parent">
        
        <div class="page-heading">
            <h3 class="text-themecolor fw-bold">Leads Lists</h3>
        </div>

        <!-- <div class="d-flex align-items-center filter-box-parent mt-4">
            
            <div class="btn-group">
                <button class="filter-box-inner-btn" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="assets/images/filter.png" alt="">
                </button>
                <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                    <li><a class="dropdown-item" href="#">Option 1</a></li>
                    <li><a class="dropdown-item" href="#">Option 2</a></li>
                    <li><a class="dropdown-item" href="#">Option 3</a></li>
                </ul>
            </div>

            <button class="filter-box-inner-btn fw-bold">
                <span class="d-flex align-items-center justify-content-center gap-3">Filter by</span>
            </button>

            <div class="btn-group">
                <button class="filter-box-inner-btn fw-bold" id="dateDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="d-flex align-items-center justify-content-center gap-3">Date <i class="fa-solid fa-chevron-down"></i></span>

                </button>
                <ul class="dropdown-menu" aria-labelledby="dateDropdown">
                    <li><input type="date" class="dropdown-item" name="date" /></li>

                </ul>
            </div>

            <div class="btn-group">
                <button class="filter-box-inner-btn fw-bold" id="leadStatusDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="d-flex align-items-center justify-content-center gap-3">Lead Status <i class="fa-solid fa-chevron-down"></i></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="leadStatusDropdown">

                    <div class="customDropMenu p-4">
                        <h5 class="modal-title">Select Status</h5>
                        <div class="d-flex flex-wrap gap-3 my-3">
                            <button class="btn btn-outline-primary status-btn" data-status="Completed">Completed</button>
                            <button class="btn btn-outline-primary status-btn" data-status="Rejected">Rejected</button>
                            <button class="btn btn-outline-primary status-btn" data-status="Pending">Pending</button>
                            <button class="btn btn-outline-primary status-btn" data-status="In Progress">In Progress</button>
                        </div>
                        <p class="text-muted">*You can choose multiple</p>
                        <button class="btn btn-primary mt-3" id="applyStatusBtn">Apply Now</button>
                    </div>
                </ul>

            </div>

            <div class="btn-group">
                <button class="filter-box-inner-btn fw-bold" id="brandNameDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="d-flex align-items-center justify-content-center gap-3">Brand Name <i class="fa-solid fa-chevron-down"></i></span>
                </button>
                </ul> 
                <ul class="dropdown-menu" aria-labelledby="leadStatusDropdown">

                    <div class="customDropMenu2 p-4">
                        <h5 class="modal-title">Select Status</h5>
                        <div class="d-flex flex-wrap gap-3 my-3">
                            <button class="btn btn-outline-primary status-btn" data-status="AMZ CENTRAL PUBLISHING">AMZ CENTRAL PUBLISHING</button>
                            <button class="btn btn-outline-primary status-btn" data-status="GLOBAL PUBLISHER">GLOBAL PUBLISHER</button>
                            <button class="btn btn-outline-primary status-btn" data-status="AMERICAN DESIGNER">AMERICAN DESIGNER</button>
                            <button class="btn btn-outline-primary status-btn" data-status="TRADE MARK ALLIES">TRADE MARK ALLIES</button>
                        </div>
                        <p class="text-muted">*You can choose multiple</p>
                        <button class="btn btn-primary mt-3 " id="applyStatusBtn2">Apply Now</button>
                    </div>
                </ul>
            </div>

           
            <button class="filter-box-inner-btn fw-bold text-danger">
                <span class="d-flex align-items-center justify-content-center gap-3"><i class="fa-solid fa-rotate-right"></i> Reset Filter</span>
            </button>
        </div> -->


        <div class="table-card mt-4">

        <table class="table table-responsive table-hover text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Brand Name</th>
                <th>Created At</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody id="leadsTableBody">
            <!-- Existing leads will be populated here by AJAX -->
        </tbody>
    </table>

        </div>

        
    </div>


@endsection

@section('js')

<script>
    $(document).ready(function() {
        // Fetch initial leads
        fetchLeads();

        // Function to fetch leads from the server
        function fetchLeads() {
            $.ajax({
                url: '{{ route('getLeads') }}',
                method: 'GET',
                success: function(data) {
                    $('#leadsTableBody').empty(); // Clear the table body
                    data.forEach(function(lead) {
                        appendLead(lead); // Append each lead
                    });
                }
            });
        }

        // Function to append a lead to the table
        function appendLead(lead) {
            var statusText = '';
            switch(lead.status) {
                case 0:
                    statusText = 'Pending';
                    color = 'primary';
                    break;
                case 1:
                    statusText = 'In Progress';
                    color = 'warning';
                    break;
                case 2:
                    statusText = 'Completed';
                    color = 'success';
                    break;
                case 3:
                    statusText = 'Rejected';
                    color = 'danger';
                    break;
            }

            var createdAt = new Date(lead.created_at);
            var formattedDate = createdAt.toLocaleString('en-US', {
                year: 'numeric',
                month: '2-digit',
                day: '2-digit',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false
            });

            var newRow = `
                <tr>
                    <td><p class="d-flex align-items-center justify-content-start mb-0">${lead.id}</p></td>
                    <td><p class="d-flex align-items-center justify-content-start mb-0">${lead.name}</p></td>
                    <td><p class="d-flex align-items-center justify-content-start mb-0">${lead.email}</p></td>
                    <td><p class="d-flex align-items-center justify-content-start mb-0">${lead.phone}</p></td>
                    <td><p class="d-flex align-items-center justify-content-start mb-0">${lead.brand_name}</p></td>
                    <td><p class="d-flex align-items-center justify-content-start mb-0">${formattedDate}</p></td>
                    <td><p class="d-flex align-items-center gap-lg-3 gap-2 mb-0">
                        <button class="table-button btn btn-${color.toLowerCase().replace(' ', '')}">${statusText}</button>
                        <a href="/dashboard/leads-detail/${lead.uuid}" class="table-button btn-viewlead">View Lead</a>
                    </p></td>
                </tr>`;
            $('#leadsTableBody').prepend(newRow); // Prepend new lead at the top
        }

        // Long polling function to check for new leads
        function checkForNewLeads() {
            setTimeout(function() {
                $.ajax({
                    url: '{{ route('getLeads') }}',
                    method: 'GET',
                    success: function(data) {
                        if (data.length > 0) {
                            $('#leadsTableBody').empty(); // Clear the table body
                            data.forEach(function(lead) {
                                appendLead(lead); // Append each lead
                            });
                        }
                        checkForNewLeads(); // Recursively check for new leads
                    }
                });
            }, 5000); // Check every 5 seconds
        }

        // Start the long polling
        checkForNewLeads();
    });
</script>

@endsection
