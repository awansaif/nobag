<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
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
                <span class="text-muted">MEMEBERS</span>
                <li class="nav-item has-treeview menu-open">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            {{-- active --}}
                            <a href="{{ Route('admin.editor.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.editor.index' ? 'active' : ''  }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Editor</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            {{-- active --}}
                            <a href="{{ Route('admin.guides.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.guides.index' ? 'active' : ''  }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Guide</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            {{-- active --}}
                            <a href="{{ Route('admin.tourists.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.tourists.index' ? 'active' : ''  }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tourists</p>
                            </a>
                        </li>

                        {{--  --}}
                        <span class="text-muted">ARTICLE</span>
                        <li class="nav-item">
                            {{-- active --}}
                            <a href="{{ Route('admin.articles.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.articles.index' ? 'active' : ''  }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Articles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            {{-- active --}}
                            <a href="{{ Route('admin.article-categories.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.article-categories.index' ? 'active' : ''  }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category</p>
                            </a>
                        </li>

                        {{--  --}}
                        <span class="text-muted">TRIPS</span>
                        <li class="nav-item">
                            {{-- active --}}
                            <a href="{{ Route('admin.articles.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.articles.index' ? 'active' : ''  }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Articles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            {{-- active --}}
                            <a href="{{ Route('admin.article-categories.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.article-categories.index' ? 'active' : ''  }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category</p>
                            </a>
                        </li>
                        <span class="text-muted">PUBLIC</span>
                        <li class="nav-item">
                            {{-- active --}}
                            <a href="{{ Route('admin.messages') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.messages' ? 'active' : ''  }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Messages</p>
                                <span class="badge badge-success">
                                    {{ App\Models\ContactUs::where('is_read',0)->count() }}
                                </span>
                            </a>
                        </li>

                        <li class="nav-item">
                            {{-- active --}}
                            <a href="{{ Route('admin.testimonials.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.testimonials.index' ? 'active' : ''  }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Testimonials</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            {{-- active --}}
                            <a href="{{ Route('admin.profile.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.profile.index' ? 'active' : ''  }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>

                        <span class="text-muted">TEAM</span>
                        <li class="nav-item">
                            {{-- active --}}
                            <a href="{{ Route('admin.team.index') }}"
                                class="nav-link {{ Route::currentRouteName() == 'admin.team.index' ? 'active' : ''  }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Team</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" style="position: relative; bottom:10px;">
                <li class="nav-item mt-auto">
                    {{-- active --}}
                    <a href="{{ Route('admin.logout') }}" class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
