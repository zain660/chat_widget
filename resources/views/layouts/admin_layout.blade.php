<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <!-- Custom fonts for this template-->
    <link href="{{ asset('/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dashboard')}}">
                <div class="logo-image">
                    <img src="{{ asset('assets/media/final-logo.png') }}">
                </div>                
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.allusers') }}">
                    <i class="fas fa-users"></i>
                    <span>Users</span>
                </a>
                {{-- <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Users Management</h6>
                        <a class="collapse-item" href="{{route('admin.allusers')}}">All Users</a>
                        <a class="collapse-item" href="{{route('admin.deactive_users')}}">Deactive Users</a>
                        <a class="collapse-item" href="{{route('admin.all_active_users')}}">Active Users</a>
                    </div>
                </div> --}}
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.UserChat') }}">
                    <i class="fas fa-comment"></i>
                    <span>Chats</span>
                </a>
                {{-- <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Chats Management:</h6>
                        <a class="collapse-item" href="{{route('admin.UserChat')}}">One to One chat</a>
                        <a class="collapse-item" href="{{route('admin.Allusergroup')}}">Group chats</a>
                    </div>
                </div> --}}
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('admin.client_list') }}">
                    <i class="fas fa-user"></i>
                    <span>Client</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            {{-- <div class="sidebar-heading">
                Addons
            </div> --}}

            <!-- Nav Item - Charts -->
            {{-- <li class="nav-item">
                <a class="nav-link" href="{{route('admin.all_packages')}}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Packages & Pricing</span></a>
            </li> --}}

            <!-- Nav Item - Tables -->
            {{-- <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Subscribed Users</span></a>
            </li> --}}


            <!-- Divider -->
            {{-- <hr class="sidebar-divider d-none d-md-block"> --}}

            <!-- Sidebar Toggler (Sidebar) -->
            {{-- <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div> --}}

            <!-- Sidebar Message -->
            {{-- <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>App Settings</strong> Update sites general info and configuration!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Show Settings</a>
            </div> --}}

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">System Admin</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('/assets/media/avatar') }}/{{ auth()->user()->avatar ?? 'avatar.png' }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                {{-- <div class="dropdown-divider"></div> --}}
                                <a class="dropdown-item" data-toggle="modal" data-target="#logoutModal"
                                    class="btn btn-outline-default mx-1"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    type="button">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                    <form action="{{route('logout')}}" id="logout" method="post">
                                        @csrf

                                    </form>
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                @yield('content')

                <!-- Bootstrap core JavaScript-->
                <script src="{{ asset('/admin/vendor/jquery/jquery.min.js') }}"></script>
                <script src="{{ asset('/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
                <!-- Core plugin JavaScript-->
                <script src="{{ asset('/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
                <!-- Custom scripts for all pages-->
                <script src="{{ asset('/admin/js/sb-admin-2.min.js') }}"></script>
                <!-- Page level plugins -->
                <script src="{{ asset('/admin/vendor/chart.js/Chart.min.js') }}"></script>
                <!-- Page level custom scripts -->
                <script src="{{ asset('/admin/js/demo/chart-area-demo.js') }}"></script>
                <script src="{{ asset('/admin/js/demo/chart-pie-demo.js') }}"></script>

                <script src="https://www.gstatic.com/firebasejs/7.13.1/firebase-app.js"></script>

                <!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
                <script src="https://www.gstatic.com/firebasejs/7.13.1/firebase-analytics.js"></script>

                <!-- Add Firebase products that you want to use -->
                <script src="https://www.gstatic.com/firebasejs/7.13.1/firebase-auth.js"></script>
                <script src="https://www.gstatic.com/firebasejs/7.13.1/firebase-database.js"></script>
                <script src="https://www.gstatic.com/firebasejs/7.13.1/firebase-firestore.js"></script>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>

                <script>
                    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
                    const firebaseConfig = {
                        apiKey: "AIzaSyBYdmaLCYwLqeU-Ud8G2T6Dnww5eS_a8II",
                        databaseURL: "https://hippacompliant-6c5ef-default-rtdb.firebaseio.com",
                        authDomain: "hippacompliant-6c5ef.firebaseapp.com",
                        projectId: "hippacompliant-6c5ef",
                        storageBucket: "hippacompliant-6c5ef.appspot.com",
                        messagingSenderId: "1023196025670",
                        appId: "1:1023196025670:web:0168e6bd37700ab77acb47",
                        measurementId: "G-804ZHKGB3H"
                    };
                    firebase.initializeApp(firebaseConfig);
                    firebase.analytics();
                </script>

                @stack('custom_js')
</body>

</html>
