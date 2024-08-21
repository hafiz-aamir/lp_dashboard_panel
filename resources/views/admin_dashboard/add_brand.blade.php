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
        <a class="backToPageBtn" href="{{ route('user_management') }}"><i class="fa-solid fa-arrow-left-long"></i> Back to User Management</a>
    </div>
    <div class="page-heading mt-2">
        <h3 class="text-themecolor fw-bold">Add New User</h3>
    </div>
    <div class="addUserBox mt-4">
    
        <form method="post" action="{{ route('store_add_user') }}"  enctype="multipart/form-data">

        @csrf

        <div class="row">
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="addUserInp py-2">
                            <label for="">First Name</label>
                            <input name="fname" value="{{ old('fname') }}" class="inpCust py-3 d-lg-block form-control my-1" type="text" placeholder="Enter user first name">
                            @error('fname') <div class="error">{{ $message }}</div> @enderror
                        </div>
                        <div class="addUserInp py-2">
                            <label for="">Email</label>
                            <input name="email" value="{{ old('email') }}" class="inpCust py-3 d-lg-block form-control my-1" type="email" placeholder="Enter user email">
                            @error('email') <div class="error">{{ $message }}</div> @enderror
                        </div>
                        <div class="addUserInp py-2">
                            <label for="">Password</label>
                            <input name="password" value="{{ old('password') }}" class="inpCust py-3 d-lg-block form-control my-1" type="text" placeholder="Enter New Password">
                            @error('password') <div class="error">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="addUserInp py-2">
                            <label for="">Last Name</label>
                            <input name="lname" value="{{ old('lname') }}" class="inpCust py-3 d-lg-block form-control my-1" type="text" placeholder="Enter user last name">
                            @error('lname') <div class="error">{{ $message }}</div> @enderror
                        </div>
                        <div class="addUserInp py-2">
                            <label for="">Select Role</label>
                            <select name="role_id" class="inpCust py-3 d-lg-block form-control my-1">
                                <option value="" disabled>-- Select Brand --</option>
                                <!-- <option value="1">Super Admin</option> -->
                                <option value="2">Admin</option>
                            </select>
                        </div>
                        <div class="addUserInp py-2">
                            <label for="">Confirm Password</label>
                            <input name="password_confirmation" value="{{ old('password_confirmation') }}"  class="inpCust py-3 d-lg-block form-control my-1" type="text" placeholder="Enter New Password">
                            @error('password_confirmation') <div class="error">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                <button class="add-user-btn font-semibold mt-4 d-table border-0" href="">Confirm</button>
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
