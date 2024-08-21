@extends('layouts.backend')

@section('css')
<style>


</style>
@endsection

@section('content')

<?php 

  // if(\App\Services\PermissionChecker::checkPermission('Listing', 'Leads')){ echo ''; }else{ echo ''; }
  
?>

<div class="main-dashboard-content-parent">
        
        <div class="page-heading">
            <h3 class="text-themecolor fw-bold">Leads Lists</h3>
        </div>

        <div class="table-card mt-4">

        <table class="table table-responsive table-hover text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Brand Name</th>
                <th>Page</th>
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
            var url = lead.page_url;

            // Extract the last segment after the last '/'
            var lastSegment = url.split('/').pop();

            // Remove the '.php' extension
            lastSegment = lastSegment.replace('.php', '');

            var newRow = `
                <tr>
                    <td><p class="d-flex align-items-center justify-content-start mb-0">${lead.id}</p></td>
                    <td><p class="d-flex align-items-center justify-content-start mb-0">${lead.name}</p></td>
                    <td><p class="d-flex align-items-center justify-content-start mb-0">${lead.email}</p></td>
                    <td><p class="d-flex align-items-center justify-content-start mb-0">${lead.phone}</p></td>
                    <td><p class="d-flex align-items-center justify-content-start mb-0">${lead.brand_name}</p></td>
                    <td><p class="d-flex align-items-center justify-content-start mb-0">${lastSegment}</p></td>
                    <td><p class="d-flex align-items-center justify-content-start mb-0">${formattedDate}</p></td>
                    <td><p class="d-flex align-items-center gap-lg-3 gap-2 mb-0">
                        <button class="table-button btn btn-${color.toLowerCase().replace(' ', '')}">${statusText}</button>
                        <?php if(\App\Services\PermissionChecker::checkPermission('View', 'Leads')){ ?>
                        <a href="/dashboard/leads-detail/${lead.uuid}" class="table-button btn-viewlead">View Lead</a>
                        <?php } ?>
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
