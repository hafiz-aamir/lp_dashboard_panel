@extends('layouts.backend')

@section('css')
<style>


</style>
@endsection

@section('content')


<?php



$yearMonth = '2024-08';
$year = null;
$month = null;

if ($yearMonth) {
    list($year, $month) = explode('-', $yearMonth);
} else {
    $year = date('Y');
    $month = date('m');
}

$statuses = [0, 1, 2, 3, 4]; // List of statuses to fetch data for
$dataPointsByStatus = [];

foreach ($statuses as $status) {
    $dataPoints = DB::table('leads')
        ->select(DB::raw("DATE_FORMAT(created_at, '%b') as label"))
        ->selectRaw('COUNT(*) as y')
        ->whereYear('created_at', $year)
        ->whereMonth('created_at', $month)
        ->where('status', $status)
        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%b')"))
        ->orderBy(DB::raw("MONTH(created_at)"))
        ->get();

    $dataPointsFormatted = array_fill(0, 12, ['label' => '', 'y' => 0]);
    foreach ($dataPoints as $point) {
        $index = date('n', strtotime($point->label . ' 1')); // Get month index (1-based)
        $dataPointsFormatted[$index - 1] = ['label' => $point->label, 'y' => $point->y];
    }

    $labels = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    foreach ($dataPointsFormatted as $index => $dataPoint) {
        $dataPointsFormatted[$index]['label'] = $labels[$index];
    }

    $dataPointsByStatus['status_' . $status] = $dataPointsFormatted;
}

// Encode the data and yearMonth for JavaScript
$dataPointsByStatusJson = json_encode($dataPointsByStatus, JSON_NUMERIC_CHECK);
 
	
?>

<script type="text/javascript">
        window.onload = function() {
            var dataPointsByStatus = <?php echo $dataPointsByStatusJson; ?>;
            var yearMonth = "<?php echo $yearMonth; ?>"; // Pass yearMonth to JavaScript

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "light2",
                title: {
                    text: "Leads for " + yearMonth
                },
                axisY: {
                    title: "Number of Leads"
                },
                data: [
                    {
                        type: "column",
                        name: "Pending",
                        showInLegend: true,
                        dataPoints: dataPointsByStatus.status_0.map(function(dp) {
                            return { label: dp.label, y: dp.y };
                        })
                    },
                    {
                        type: "column",
                        name: "Inprogress",
                        showInLegend: true,
                        dataPoints: dataPointsByStatus.status_1.map(function(dp) {
                            return { label: dp.label, y: dp.y };
                        })
                    },
                    {
                        type: "column",
                        name: "Completed",
                        showInLegend: true,
                        dataPoints: dataPointsByStatus.status_2.map(function(dp) {
                            return { label: dp.label, y: dp.y };
                        })
                    },
                    {
                        type: "column",
                        name: "Rejected",
                        showInLegend: true,
                        dataPoints: dataPointsByStatus.status_3.map(function(dp) {
                            return { label: dp.label, y: dp.y };
                        })
                    },
                    {
                        type: "column",
                        name: "Status 4",
                        showInLegend: true,
                        dataPoints: dataPointsByStatus.status_4.map(function(dp) {
                            return { label: dp.label, y: dp.y };
                        })
                    }
                ]
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

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="main-page-lead-box ">
                <div class="d-flex align-items-center mb-3">
                    <span class="fs-28px fw-bold col-10">Leads Details</span>
                    <select class="form-control">
                        <option value="">January</option>
                    </select>
                </div>
                <!-- <hr> -->
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

            </div>
        </div>
    </div>


</div>


@endsection

@section('js')
<script type="text/javascript">
    
    
</script>
@endsection
