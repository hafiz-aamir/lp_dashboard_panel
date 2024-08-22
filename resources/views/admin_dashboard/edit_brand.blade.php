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
        <a class="backToPageBtn" href="{{ route('brand_management') }}"><i class="fa-solid fa-arrow-left-long"></i> Back to User Management</a>
    </div>
    <div class="page-heading mt-2">
        <h3 class="text-themecolor fw-bold">Edit Brand</h3>
    </div>
    <div class="addUserBox mt-4">
        
        <form method="post" action="{{ route('update_brand') }}">

            @csrf

            <div class="row">
                <div class="col-lg-10">

                        <div class="row">
                            <div class="col-lg-12">
                                
                                <div class="addUserInp py-2">
                                    <label for="">Brand Name</label>
                                    <input name="brand" value="{{ $get_brand->brand }}" class="inpCust py-3 d-lg-block form-control my-1" type="text" >
                                    @error('brand') <div class="error">{{ $message }}</div> @enderror
                                    
                                    <input type="hidden" name="id" value="{{ $get_brand->id }}">

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
