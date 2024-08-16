@extends('layouts.backend')

@section('css')
<style>


</style>
@endsection

@section('content')




<div class="main-dashboard-content-parent">
    <div class="page-heading d-flex align-items-center justify-content-between">
        <h3 class="text-themecolor fw-bold">Users Management</h3>
        <a class="add-user-btn font-semibold" href="{{ route('add_user') }}">Add New User</a>
    </div>

    <div class="table-card mt-4">

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Action</th>
           
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <p class="d-flex align-items-center justify-content-start mb-0">1</p>
            </td>
            <td>
                <p class="d-flex align-items-center justify-content-start mb-0">Christine Brooks</p>
            </td>
            <td>
                <p class="d-flex align-items-center justify-content-start mb-0">christine@example.com</p>
            </td>
            <td>
                <p class="d-flex align-items-center justify-content-start mb-0">christine@example.com</p>
            </td>
            
            
            <td>
                <p class="d-flex align-items-center gap-lg-3 gap-2 mb-0">
                    <a href="{{ route('edit_user') }}" class="table-button btn-edit-user">Edit User</a>
                    <a href="" class="table-button btn-delete">Delete</a>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="d-flex align-items-center justify-content-start mb-0">1</p>
            </td>
            <td>
                <p class="d-flex align-items-center justify-content-start mb-0">Christine Brooks</p>
            </td>
            <td>
                <p class="d-flex align-items-center justify-content-start mb-0">christine@example.com</p>
            </td>
            <td>
                <p class="d-flex align-items-center justify-content-start mb-0">christine@example.com</p>
            </td>
            
            
            <td>
                <p class="d-flex align-items-center gap-lg-3 gap-2 mb-0">
                    <a href="{{ route('edit_user') }}" class="table-button btn-edit-user">Edit User</a>
                    <a href="" class="table-button btn-delete">Delete</a>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p class="d-flex align-items-center justify-content-start mb-0">1</p>
            </td>
            <td>
                <p class="d-flex align-items-center justify-content-start mb-0">Christine Brooks</p>
            </td>
            <td>
                <p class="d-flex align-items-center justify-content-start mb-0">christine@example.com</p>
            </td>
            <td>
                <p class="d-flex align-items-center justify-content-start mb-0">christine@example.com</p>
            </td>
            
            
            <td>
                <p class="d-flex align-items-center gap-lg-3 gap-2 mb-0">
                    <a href="{{ route('edit_user') }}" class="table-button btn-edit-user">Edit User</a>
                    <a href="" class="table-button btn-delete">Delete</a>
                </p>
            </td>
        </tr>
        

    </tbody>
</table>

</div>
   

</div>


@endsection

@section('js')
<script type="text/javascript">
    
    
</script>
@endsection
