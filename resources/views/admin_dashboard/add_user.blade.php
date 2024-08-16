@extends('layouts.backend')

@section('css')
<style>


</style>
@endsection

@section('content')



<div class="main-dashboard-content-parent">
    <div>
        <a class="backToPageBtn" href="users-management.php"><i class="fa-solid fa-arrow-left-long"></i> Back to User Management</a>
    </div>
    <div class="page-heading mt-2">
        <h3 class="text-themecolor fw-bold">Add New User</h3>
    </div>
    <div class="addUserBox mt-4">
        <div class="row">
            <div class="col-lg-10">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="addUserInp py-2">
                            <label for="">First Name</label>
                            <input class="inpCust py-3 d-lg-block form-control my-1" type="text" placeholder="Enter user first name">
                        </div>
                        <div class="addUserInp py-2">
                            <label for="">Email</label>
                            <input class="inpCust py-3 d-lg-block form-control my-1" type="email" placeholder="Enter user email">
                        </div>
                        <div class="addUserInp py-2">
                            <label for="">Password</label>
                            <input class="inpCust py-3 d-lg-block form-control my-1" type="text" placeholder="Enter New Password">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="addUserInp py-2">
                            <label for="">Last Name</label>
                            <input class="inpCust py-3 d-lg-block form-control my-1" type="text" placeholder="Enter user last name">
                        </div>
                        <div class="addUserInp py-2">
                            <label for="">Select Brand</label>
                            <select class="inpCust py-3 d-lg-block form-control my-1">
                                <option value="">-- Select Brand --</option>
                                <option value="">American Publishers</option>
                                <option value="">American Designer</option>
                                <option value="">Global Publisher</option>
                                <option value="">KDP Publishing</option>
                            </select>
                        </div>
                        <div class="addUserInp py-2">
                            <label for="">Confirm Password</label>
                            <input class="inpCust py-3 d-lg-block form-control my-1" type="text" placeholder="Enter New Password">
                        </div>
                    </div>
                </div>
                <button class="add-user-btn font-semibold mt-4 d-table border-0" href="">Confirm</button>
            </div>
        </div>
    </div>

</div>

@endsection

@section('js')
<script type="text/javascript">
    
    
</script>
@endsection
