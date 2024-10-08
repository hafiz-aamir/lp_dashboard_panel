<?php 

    $get_route = Request::segment(2);

?>



<!-- Left Sidebar -->
    <!-- ============================================================== -->
    <aside class="left-sidebar" id="sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                
                <img class="logo-sidebar" src="{{asset('assets/images/logo.png') }}" alt="" />
                <img src="{{asset('assets/images/logo-sm.png') }}" alt="user" class="logoSm" />
                
                <ul id="sidebarnav">

                    <li>
                        <a class="waves-effect waves-dark  <?php if($get_route == "index"){ echo "active"; } ?>" href="{{ route('dashboard') }}" aria-expanded="false">
                            <img src="{{asset('assets/images/meter.png') }}" alt=""><span class="hide-menu">Dashboard </span>
                        </a>
                    </li>

                    
                    <!-- Leads -->
                    @if(\App\Services\PermissionChecker::checkPermission('Listing', 'Leads'))
                    <li>
                        <a class="waves-effect waves-dark <?php if($get_route == "leads" || $get_route == "leads-detail"){ echo "active"; } ?>" href="{{ route('leads') }}" aria-expanded="false">
                            <!-- href="leads.php" aria-expanded="false"> -->
                            <img src="{{asset('assets/images/list.png') }}" alt=""><span class="hide-menu">Leads Lists</span>
                        </a>
                    </li>
                    @endif
                    

                    <!-- Users -->
                    @if(\App\Services\PermissionChecker::checkPermission('Listing', 'Users'))
                    <li>
                        <a class="waves-effect waves-dark <?php if($get_route == "user-management" || $get_route == "add-user" || $get_route == "edit-user" || $get_route == "edit-permission"){ echo "active"; } ?>" href="{{ route('user_management') }}" aria-expanded="false">
                            <img src="{{asset('assets/images/user-mng.png') }}" alt=""><span class="hide-menu">Users Management</span>
                        </a>
                    </li>
                    @endif

                </ul>

            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar   -->
    <!-- ============================================================== --> 