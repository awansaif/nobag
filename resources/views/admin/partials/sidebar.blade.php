<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ env('APP_URL') }}" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class=" mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            {{-- active --}}
                            <a href="{{ Route('admin.sellers') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.sellers' ? 'active' : ''  }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Guide</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            {{-- active --}}
                            {{-- <a href="{{ Route('user.index') }}"
                            class="nav-link {{ Route::currentRouteName() == 'user.index' ? 'active' : ''  }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>User</p>
                            </a> --}}
                        </li>

                        <li class="nav-item">
                            {{-- active --}}
                            <a href="{{ Route('admin.logout') }}" class="nav-link">
                                <i class="fas fa-sign-out-alt nav-icon"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>

                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>