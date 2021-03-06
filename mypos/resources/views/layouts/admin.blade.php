<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LaraVue | Library</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

        @yield('css')
    </head>

    <body class="hold-transition dark-mode sidebar-mini layout-fixed">
        <div class="wrapper">

            <!-- Preloader -->
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo"
                    height="60" width="60">
            </div>

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-dark">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Notifications Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            <i class="far fa-bell"></i>
                            <span class="badge badge-warning navbar-badge">15</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-item dropdown-header">15 Notifications</span>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i> 4 new messages
                                <span class="float-right text-muted text-sm">3 mins</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-users mr-2"></i> 8 friend requests
                                <span class="float-right text-muted text-sm">12 hours</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-file mr-2"></i> 3 new reports
                                <span class="float-right text-muted text-sm">2 days</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link bg-danger rounded" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                            <i class="fas fa-sign-out-alt ml-1"></i>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>

            <!-- Sidebar Start -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Sidebar Logo Start -->
                <a href="{{ url('dashboard') }}" class="brand-link">
                    <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">Muhamad POS</span>
                </a>
                <!-- Sidebar Logo End -->

                <!-- Sidebar Content Start-->
                <div class="sidebar">
                    <!-- Sidebar User Panel Start -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                                alt="User Image">
                        </div>
                        <div class="info">
                            <a href="{{ url('dashboard') }}" class="d-block">{{ auth()->user()->name }}</a>
                        </div>
                    </div>
                    <!-- Sidebar User Panel End -->

                    <!-- Sidebar Menu Start -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <li class="nav-item">
                                <a href="{{ url('dashboard') }}"
                                    class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-file-medical-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>

                            @if (auth()->user()->hasPermission('categories_read'))
                            <li class="nav-item">
                                <a href="{{ url('categories') }}"
                                    class="nav-link {{ Request::is('categories*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        Categories
                                    </p>
                                </a>
                            </li>
                            @endif

                            @if (auth()->user()->hasPermission('products_read'))
                            <li class="nav-item">
                                <a href="{{ url('products') }}"
                                    class="nav-link {{ Request::is('products*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-box"></i>
                                    <p>
                                        Products
                                    </p>
                                </a>
                            </li>
                            @endif

                            @if (auth()->user()->hasPermission('clients_read'))
                            <li class="nav-item">
                                <a href="{{ url('clients') }}"
                                    class="nav-link {{ Request::is('clients*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-id-card"></i>
                                    <p>
                                        Clients
                                    </p>
                                </a>
                            </li>
                            @endif

                            @if (auth()->user()->hasPermission('orders_read'))
                            <li class="nav-item">
                                <a href="{{ url('orders') }}"
                                    class="nav-link {{ Request::is('orders*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-shopping-cart"></i>
                                    <p>
                                        Orders
                                    </p>
                                </a>
                            </li>
                            @endif

                            <li class=" mt-2 border-bottom border-secondary"></li>

                            @if (auth()->user()->hasPermission('users_read'))
                            <li class="nav-item mt-2">
                                <a href="{{ url('users') }}"
                                    class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-users-cog"></i>
                                    <p>
                                        Administrators
                                    </p>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </nav>
                    <!-- Sidebar Menu End -->
                </div>
                <!-- Sidebar Content End-->
            </aside>
            <!-- Sidebar End -->

            <!-- Content Start -->
            <div class="content-wrapper">
                <!-- Content Header Start -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">@yield('header')</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content Header End -->

                <!-- Main content Start-->
                <section class="content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </section>
                <!-- Main content End-->
            </div>
            <!-- Content End -->

            <!-- Footer Start -->
            <footer class="main-footer text-center">
                <strong><a href="#">Point Of Sale Task | Laravue Eduwork</a><br>2021-2022</strong>
            </footer>
            <!-- Footer End -->
        </div>

        <!-- jQuery -->
        <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- overlayScrollbars -->
        <script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>
        <!-- VueJs CDN -->
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
        <!-- Axios CDN -->
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <!-- SweetAlert 2 CDN -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @yield('js')
    </body>

</html>
