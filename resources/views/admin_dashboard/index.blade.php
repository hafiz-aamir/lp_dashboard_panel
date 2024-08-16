@extends('layouts.backend')

@section('css')
<style>


</style>
@endsection

@section('content')


<div class="main-dashboard-content-parent">
    <div class="page-heading">
        <h3 class="text-themecolor fw-bold">Welcome, {{ Auth::user()->fname }} {{ Auth::user()->lname }} </h3>
    </div>

    <div class="row mt-4">
        <div class="col-lg-3 mt-md-0 mt-3 col-md-6">
            <div class="main-page-top-box d-flex align-items-start justify-content-between gap-2">
                <div class="d-flex flex-column align-items-start main-page-top-box-text-parent">
                    <span class="fs-16px fw-semibold">Total Active Leads</span>
                    <span class="fs-28px fw-bold">54</span>
                    <span class="fs-16px fw-semibold mt-2"><span style="color: #00B69B;">12</span> New Leads
                        Today.</span>
                </div>
                <img class="icon-img-main-page" src="{{ asset('assets/images/icon-1.png') }}" alt="">
            </div>
        </div>
        <div class="col-lg-3 mt-md-0 mt-3 col-md-6">
            <div class="main-page-top-box d-flex align-items-start justify-content-between gap-2">
                <div class="d-flex flex-column align-items-start main-page-top-box-text-parent">
                    <span class="fs-16px fw-semibold">Leads Assign To me</span>
                    <span class="fs-28px fw-bold">31</span>
                    <span class="fs-16px fw-semibold mt-2"><span style="color: #00B69B;">6</span> New Leads Assigned to
                        you.</span>
                </div>
                <img class="icon-img-main-page" src="{{ asset('assets/images/icon-2.png') }}" alt="">
            </div>
        </div>
        <div class="col-lg-3 mt-lg-0 mt-3 col-md-6">
            <div class="main-page-top-box d-flex align-items-start justify-content-between gap-2">
                <div class="d-flex flex-column align-items-start main-page-top-box-text-parent">
                    <span class="fs-16px fw-semibold">Leads Completed</span>
                    <span class="fs-28px fw-bold">12</span>
                    <span class="fs-16px fw-semibold mt-2"><span style="color: #00B69B;">5</span> More Leads
                        Completed.</span>
                </div>
                <img class="icon-img-main-page" src="{{ asset('assets/images/icon-3.png') }}" alt="">
            </div>
        </div>
        <div class="col-lg-3 mt-lg-0 mt-3 col-md-6">
            <div class="main-page-top-box d-flex align-items-start justify-content-between gap-2">
                <div class="d-flex flex-column align-items-start main-page-top-box-text-parent">
                    <span class="fs-16px fw-semibold">Leads in Progress</span>
                    <span class="fs-28px fw-bold">19</span>
                    <span class="fs-16px fw-semibold mt-2"><span style="color: #00B69B;">5</span> More Leads Started by
                        you.</span>
                </div>
                <img class="icon-img-main-page" src="{{ asset('assets/images/icon-4.png') }}" alt="">
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="main-page-lead-box ">
                <div class="d-flex align-items-center justify-content-between">
                    <span class="fs-28px fw-bold">Leads Details</span>
                    <button class="d-flex align-items-center justify-content-center w-max lead-detail-btn fs-14px">October <i class="fa-solid fa-chevron-down"></i></button>
                </div>
                <img class="leads-box-img-main" src="{{ asset('assets/images/leads-box-img.png') }}" alt="">
            </div>
        </div>
    </div>


</div>


@endsection

@section('js')
<script type="text/javascript">
    
    
</script>
@endsection
