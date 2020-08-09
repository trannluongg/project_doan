<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('assets/images/admin/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image" style="width: 40px;height: 40px; box-sizing: content-box">
                <img src="{{ asset('upload/avatar/'. \Illuminate\Support\Facades\Auth::guard('admins')->user()->avatar) }}" style="width: 100%; height: 100%; object-fit: cover;" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ \Illuminate\Support\Facades\Auth::guard('admins')->user()->name ?? '' }}</a>
            </div>
        </div>
        @php
            $current_route = \Route::currentRouteName();
        @endphp
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            @if(in_array('full', $admin_permission))
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    @foreach($modules_group_menu as $modules_g)
                        @if($modules_g['name'] != 'Full')
                            <li class="nav-header text-bold text-uppercase text-warning">{{$modules_g['name']}}</li>
                            @php
                                $modules = $modules_g['modules_group']['data'];
                            @endphp
                            @foreach ($modules as $module)
                                @php
                                    $menus = $module['menu'];
                                    $array_menu = [];
                                @endphp
                                @foreach($menus as $menu)
                                    @php
                                        array_push($array_menu, $menu[1])
                                    @endphp
                                @endforeach
                                <li class="nav-item has-treeview {{ (in_array($current_route, $array_menu)) ? 'menu-open' : '' }}">
                                    <a href="#" class="nav-link {{ (in_array($current_route, $array_menu)) ? 'active' : '' }}">
                                        <i class="nav-icon {{ $module['icon'] }}"></i>
                                        <p>
                                            {{ $module['name'] }}
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview {{ (in_array($current_route, $array_menu)) ? 'd-block' : '' }}">
                                        @foreach($menus as $menu)
                                            <li class="nav-item">
                                                <a href="{{ route($menu[1]) }}" class="nav-link {{ route($menu[1]) == route($current_route) ? 'active' : '' }}" style="white-space: nowrap">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>{{ $menu[0] }}</p>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        @endif
                    @endforeach
                </ul>
            @endif
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
