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
    <div>
        <a class="backToPageBtn" href="{{ route('user_management') }}"><i class="fa-solid fa-arrow-left-long"></i> Back to User Management</a>
    </div>
    <div class="page-heading mt-2">
        <h3 class="text-themecolor fw-bold">Edit User</h3>
    </div>
    <div class="addUserBox mt-4">
        
        <form method="post" action="{{ route('update_user') }}">

            @csrf

            <div class="row">
                <div class="col-lg-10">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="addUserInp py-2">
                                    <label for="">First Name</label>
                                    <input name="fname" value="{{ $get_user->fname }}" class="inpCust py-3 d-lg-block form-control my-1" type="text" placeholder="Enter user first name">
                                    <input type="hidden" name="id" value="{{ $get_user->id }}">
                                </div>
                                <div class="addUserInp py-2">
                                    <label for="">Email</label>
                                    <input name="email" value="{{ $get_user->email }}" class="inpCust py-3 d-lg-block form-control my-1" type="email" placeholder="Enter user email">
                                </div>
                                
                            </div>
                            <div class="col-lg-6">
                                <div class="addUserInp py-2">
                                    <label for="">Last Name</label>
                                    <input name="lname" value="{{ $get_user->lname }}" class="inpCust py-3 d-lg-block form-control my-1" type="text" placeholder="Enter user last name">
                                </div>
                                <div class="addUserInp py-2">
                                    <label for="">Select Brand</label>
                                    <select name="role_id" class="inpCust py-3 d-lg-block form-control my-1">
                                        <option value="" disabled selected>-- Select Brand --</option>
                                        <option <?php if($get_user->role_id == "2"){ echo 'selected'; } ?> value="2">Admin</option>
                                    </select>
                                </div>
                                
                            </div>

                            <div class="col-lg-6">
                                <div class="addUserInp py-2">
                                    <label for="">Select Status</label>
                                    <select name="role_id" class="inpCust py-3 d-lg-block form-control my-1">
                                        <option value="1" disabled selected>-- Select Status --</option>
                                        <option <?php if($get_user->status == "1"){ echo 'selected'; } ?> value="1">Active</option>
                                        <option <?php if($get_user->status == "2"){ echo 'selected'; } ?> value="2">InActive</option>
                                    </select>
                                </div>
                                
                            </div>

                        </div>

                        <button  class="add-user-btn font-semibold mt-4 d-table border-0">Update</button>

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
