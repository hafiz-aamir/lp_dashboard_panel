@extends('layouts.backend')

@section('css')
<style>


</style>
@endsection

@section('content')


<div class="main-dashboard-content-parent">
    <div>
        <a class="backToPageBtn" href="leads.php"><i class="fa-solid fa-arrow-left-long"></i> Back to Lead List</a>
    </div>
    <div class="page-heading mt-2">
        <h3 class="text-themecolor fw-bold">Leads Detail</h3>
    </div>
    <div class="boxLeadDetail mt-4">
        <form action="" method="POST">
            <div class="row mb-3">
                <label class="col-md-2 col-form-label">ID</label>
                <div class="col-md-5">
                    <input type="text" class="form-control inpCust" value="32"  name="idNo" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-2 col-form-label">First Name</label>
                <div class="col-md-5">
                    <input type="text" class="form-control inpCust" value="Christine Brooks" name="fsName" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-2 col-form-label">Email</label>
                <div class="col-md-5">
                    <input type="email" class="form-control inpCust" value="christine@example.com" name="email" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-2 col-form-label">Phone Number</label>
                <div class="col-md-5">
                    <input type="text" class="form-control inpCust" value="+1 (815) 333-3333" name="phone" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-2 col-form-label">Message</label>
                <div class="col-md-5">
                    <textarea class="form-control inpCust" rows="3" readonly>Lorem ipsum dolor sit amet consectetur. Sagittis eleifend congue nunc sed. Turpis ipsum amet commodo accumsan eget viverra tellus. Feugiat id quisque volutpat integer lectus lacus. Augue nec pulvinar varius risus mauris sed quis risus.</textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-2 col-form-label">Created At</label>
                <div class="col-md-5">
                    <input type="text" class="form-control inpCust" value="04 Sep 2019, 07:32 AM" name="timeAndDate" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-2 col-form-label">Page URL</label>
                <div class="col-md-5">
                    <input type="text" class="form-control inpCust" value="https://lp.codetech.pk/amzcentralpublishing" name="pageURL" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-md-2 col-form-label">IP Address</label>
                <div class="col-md-5">
                    <input type="text" class="form-control inpCust" value="101.101.101.101" readonly name="ipAddress">
                </div>
            </div>
            <div class="btn-group d-flex justify-content-end">
                <button class="printPdfBtn me-2"><i class="fa fa-print"></i></button>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="statusDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Inprogress
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="statusDropdown">
                        <li><a class="dropdown-item" href="#">Completed</a></li>
                        <li><a class="dropdown-item" href="#">Rejected</a></li>
                        <li><a class="dropdown-item" href="#">Pending</a></li>
                    </ul>
                </div>
            </div>
        </form>
    </div>

</div>


@endsection

@section('js')
<script type="text/javascript">
    
    
</script>
@endsection
