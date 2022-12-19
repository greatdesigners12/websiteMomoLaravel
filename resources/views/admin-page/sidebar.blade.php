  <!-- Left Sidenav -->
  <div class="left-sidenav">
    <style>
        .left-sidenav-menu li ul li .active{
            color: blue;
        }
    </style>
    <ul class="metismenu left-sidenav-menu">
        <li class="{{Route::currentRouteName() == 'toDashboardPage' ? 'mm-active' : ''}}">
            <a href="{{route('toDashboardPage')}}"><i class="ti-bar-chart"></i><span>Dashboard</span></a>
        </li>
        @php($arr_products = ["toCreateProductPage", "toProductsManagementPage"])
        <li class="{{in_array( Route::currentRouteName(), $arr_products) ? 'mm-active' : ''}}">
            <a href="javascript: void(0);"><i class="ti-server"></i><span>Product</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                
                <li class="nav-item"><a class="nav-link {{Route::currentRouteName() == 'toCreateProductPage' ? 'active' : ''}}" href="{{route('toCreateProductPage')}}"><i class="ti-control-record"></i>Create Product</a></li>
                <li class="nav-item"><a class="nav-link {{Route::currentRouteName() == 'toProductsManagementPage' ? 'active' : ''}}" href="{{route('toProductsManagementPage')}}"><i class="ti-control-record"></i>Product Managament</a></li>
               
                
            </ul>
        </li>      
        @php($marketing_arr = ["topromoManagementPage", "toannouncementManagementPage", "toCreatepromoPage"])
        <li class="{{in_array( Route::currentRouteName(), $marketing_arr) ? 'mm-active' : ''}}">
            <a href="javascript: void(0);"><i class="ti-server"></i><span>Marketing</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li class="nav-item"><a class="nav-link {{Route::currentRouteName() == 'toCreatepromoPage' ? 'active' : ''}}" href="{{route('toCreatepromoPage')}}"><i class="ti-control-record"></i>Create Promo</a></li>
                <li class="nav-item"><a class="nav-link {{Route::currentRouteName() == 'topromoManagementPage' ? 'active' : ''}}" href="{{route('topromoManagementPage')}}"><i class="ti-control-record"></i>Promo Management</a></li>
                <li class="nav-item"><a class="nav-link {{Route::currentRouteName() == 'toCreateannouncementPage' ? 'active' : ''}}" href="{{route('toCreateannouncementPage')}}"><i class="ti-control-record"></i>Create Announcement</a></li>
                <li class="nav-item"><a class="nav-link {{Route::currentRouteName() == 'toannouncementManagementPage' ? 'active' : ''}}" href="{{route('toannouncementManagementPage')}}"><i class="ti-control-record"></i>Announcement Managament</a></li>
               
                
            </ul>
        </li>    
        
        @php($arr_others = ["toBrandsManagementPage", "toCategoriesManagementPage", "toUsersManagementPage", "totransactionsManagementPage"])
        <li class="{{in_array( Route::currentRouteName(), $arr_others) ? 'mm-active' : ''}}">
            <a href="javascript: void(0);"><i class="ti-server"></i><span>Others</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                
                <li class="nav-item"><a class="nav-link {{Route::currentRouteName() == 'toBrandsManagementPage' ? 'active' : ''}}" href="{{route('toBrandsManagementPage')}}"><i class="ti-control-record"></i>Brands Management</a></li>
                <li class="nav-item"><a class="nav-link {{Route::currentRouteName() == 'toCategoriesManagementPage' ? 'active' : ''}}" href="{{route('toCategoriesManagementPage')}}"><i class="ti-control-record"></i>Categories Managament</a></li>
                <li class="nav-item"><a class="nav-link {{Route::currentRouteName() == 'toUsersManagementPage' ? 'active' : ''}}" href="{{route('toUsersManagementPage')}}"><i class="ti-control-record"></i>Users Managament</a></li>
                <li class="nav-item"><a class="nav-link {{Route::currentRouteName() == 'totransactionsManagementPage' ? 'active' : ''}}" href="{{route('totransactionsManagementPage')}}"><i class="ti-control-record"></i>Transactions Managament</a></li>
                
            </ul>
        </li> 

        
    </ul>
</div>
<!-- end left-sidenav-->