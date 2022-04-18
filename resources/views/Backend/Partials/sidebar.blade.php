<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('Backend') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('Backend') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.slider.index') }}"
                        class="nav-link {{ Route::is('admin.slider.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Sliders
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.category.index') }}"
                        class="nav-link {{ Route::is('admin.category.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.sub-category.index') }}"
                        class="nav-link {{ Route::is('admin.sub-category.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Sub Category
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.tag.index') }}"
                        class="nav-link {{ Route::is('admin.tag.index') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Tags
                        </p>
                    </a>
                </li>
                <li
                    class="nav-item has-treeview {{ Route::is('admin.post.index') || Route::is('admin.post.create') ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ Route::is('admin.post.index') || Route::is('admin.post.create') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Post
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.post.index') }}"
                                class="nav-link {{ Route::is('admin.post.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Post</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.post.create') }}"
                                class="nav-link {{ Route::is('admin.post.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Psot</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.about.index') }}"
                        class="nav-link {{ Route::is('admin.about.index') ? 'active': '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            About
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.website.index') }}"
                        class="nav-link {{ Route::is('admin.website.index') ? 'active': '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Website Details
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/" target="_blank"
                        class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Browse
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
