@extends('layouts.backend')

@section('css')
<style>


</style>
@endsection

@section('content')

<?php
 
use App\Models\Lead;

$get_pending_leads = Lead::where('status', '0')->count();
$get_inprogress_leads = Lead::where('status', '1')->count();
$get_completed_leads = Lead::where('status', '2')->count();
$get_rejected_leads = Lead::where('status', '3')->count();

$dataPoints = array( 
	array("y" => $get_pending_leads, "label" => "Pending" ),
	array("y" => $get_inprogress_leads, "label" => "Inprogress" ),
	array("y" => $get_completed_leads, "label" => "Completed" ),
	array("y" => $get_rejected_leads, "label" => "Rejected" ),
);
 
?>

<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Current Month Leads"
	},
	axisY: {
		title: "Current Month Leads"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## Leads",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>

<div class="main-dashboard-content-parent">
    <div class="page-heading">
        <h3 class="text-themecolor fw-bold">Welcome, {{ Auth::user()->fname }} {{ Auth::user()->lname }} </h3>
    </div>

    <div class="row mt-4">
        <div class="col-lg-3 mt-md-0 mt-3 col-md-6">
            <div class="main-page-top-box d-flex align-items-start justify-content-between gap-2">
                <div class="d-flex flex-column align-items-start main-page-top-box-text-parent">
                    <span class="fs-16px fw-semibold">Leads Pending</span>
                    <span class="fs-28px fw-bold"> {{ $get_pending_leads }} </span>
                    <!-- <span class="fs-16px fw-semibold mt-2"><span style="color: #00B69B;">12</span> New Leads
                        Today.</span> -->
                </div>
                <img class="icon-img-main-page" src="{{ asset('assets/images/icon-1.png') }}" alt="">
            </div>
        </div>
        <div class="col-lg-3 mt-md-0 mt-3 col-md-6">
            <div class="main-page-top-box d-flex align-items-start justify-content-between gap-2">
                <div class="d-flex flex-column align-items-start main-page-top-box-text-parent">
                    <span class="fs-16px fw-semibold">Leads Inprogress</span>
                    <span class="fs-28px fw-bold"> {{ $get_inprogress_leads }} </span>
                    <!-- <span class="fs-16px fw-semibold mt-2"><span style="color: #00B69B;">6</span> New Leads Assigned to
                        you.</span> -->
                </div>
                <img class="icon-img-main-page" src="{{ asset('assets/images/icon-2.png') }}" alt="">
            </div>
        </div>
        <div class="col-lg-3 mt-lg-0 mt-3 col-md-6">
            <div class="main-page-top-box d-flex align-items-start justify-content-between gap-2">
                <div class="d-flex flex-column align-items-start main-page-top-box-text-parent">
                    <span class="fs-16px fw-semibold">Leads Completed</span>
                    <span class="fs-28px fw-bold"> {{ $get_completed_leads }} </span>
                    <!-- <span class="fs-16px fw-semibold mt-2"><span style="color: #00B69B;">5</span> More Leads
                        Completed.</span> -->
                </div>
                <img class="icon-img-main-page" src="{{ asset('assets/images/icon-3.png') }}" alt="">
            </div>
        </div>
        <div class="col-lg-3 mt-lg-0 mt-3 col-md-6">
            <div class="main-page-top-box d-flex align-items-start justify-content-between gap-2">
                <div class="d-flex flex-column align-items-start main-page-top-box-text-parent">
                    <span class="fs-16px fw-semibold">Leads Rejected</span>
                    <span class="fs-28px fw-bold"> {{ $get_rejected_leads }} </span>
                    <!-- <span class="fs-16px fw-semibold mt-2"><span style="color: #00B69B;">5</span> More Leads Started by
                        you.</span> -->
                </div>
                <img class="icon-img-main-page" src="{{ asset('assets/images/icon-4.png') }}" alt="">
            </div>
        </div>
    </div>

    <br><br><br>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    

</div>


@endsection

@section('js')

<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

<script type="text/javascript">
    
    
</script>
@endsection
