@extends('layouts.backend')

@section('css')
<style>

.error {
    color: red;
}

</style>
@endsection

@section('content')

<?php 

  // if(\App\Services\PermissionChecker::checkPermission('Listing', 'Leads')){ echo ''; }else{ echo ''; }
  
?>

<div class="main-dashboard-content-parent">
    <div>
        <a class="backToPageBtn" href="{{ route('brand_management') }}"><i class="fa-solid fa-arrow-left-long"></i> Back to Brand Management</a>
    </div>
    <div class="page-heading mt-2">
        <h3 class="text-themecolor fw-bold">Add New Brand</h3>
    </div>
    <div class="addUserBox mt-4">
    
        <form method="post" action="{{ route('store_add_brand') }}"  enctype="multipart/form-data">

        @csrf

        <div class="row">
            <div class="col-lg-10">
                <div class="row">
                    
                    <div class="col-lg-12">
                        
                        <div class="addUserInp py-2">
                            <label for="">Brand Name</label>
                            <input name="brand" value="{{ old('brand') }}" class="inpCust py-3 d-lg-block form-control my-1" type="text" placeholder="Enter user first name">
                            @error('brand') <div class="error">{{ $message }}</div> @enderror
                        </div>
                       
                    </div>
                    
                </div>
                <button class="add-user-btn font-semibold mt-4 d-table border-0" href="">Add</button>
            </div>
        </div>

        </form>

    </div>

</div>

@endsection

@section('js')



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    
    // Set the options that I want
    toastr.options = {
    "closeButton": true,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "1000",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear", 
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
    }

</script>

@if(Session::has('message'))
<script>
    $(document).ready(function onDocumentReady() {  
    
        toastr.success("{{ Session::get('message') }}");
    
    });
</script>
@elseif(Session::has('error'))
<script>
    $(document).ready(function onDocumentReady() {  
    
        toastr.error("{{ Session::get('error') }}");
    
    });
</script>
@endif

@endsection
