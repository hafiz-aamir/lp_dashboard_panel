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
    <div class="page-heading d-flex align-items-center justify-content-between">
        <h3 class="text-themecolor fw-bold">Users Management</h3>
        <a class="add-user-btn font-semibold" href="{{ route('add_user') }}">Add New User</a>
    </div>

    <div class="table-card mt-4">

<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Role</th>
            <th>Action</th>
           
        </tr>
    </thead>
    <tbody>


        @foreach($get_all_user as $key => $value)
        <tr>
            <td>
                <p class="d-flex align-items-center justify-content-start mb-0"> {{ $key + 1 }} </p>
            </td>
            
            <td>
                <p class="d-flex align-items-center justify-content-start mb-0"> {{ $value->fname }} {{ $value->lname }} </p>
            </td>
            
            <td>
                <p class="d-flex align-items-center justify-content-start mb-0"> {{ $value->email }} </p>
            </td>

            <td>
                <p class="d-flex align-items-center justify-content-start mb-0"> {{ $value->phone }} </p>
            </td>

            <td>
                <p class="d-flex align-items-center justify-content-start mb-0"> {{ $value->role->role }} </p>
            </td>
            
            
            <td>
                <p class="d-flex align-items-center gap-lg-3 gap-2 mb-0">
                    
                    <a href="{{ route('edit_user', ['id' => $value->uuid]) }}" class="table-button btn-edit-user">Edit User</a>
                    
                    <?php if($value->role_id == '1'){ ?>

                        <button disabled class="table-button btn btn-secondary">Delete</button>

                    <?php }else{ ?>

                        <a href="{{ route('delete_user', ['id' => $value->uuid]) }}" onclick="return confirm('are you sure?')" class="table-button btn-delete">Delete</a>

                    <?php } ?>

                </p>
            </td>
        </tr>
        @endforeach
        

    </tbody>
</table>

</div>
   

</div>


@endsection

@section('js')
<script type="text/javascript">
    
    
</script>
@endsection
