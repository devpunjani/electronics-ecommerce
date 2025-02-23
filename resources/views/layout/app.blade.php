@section('open-main')
nav-item
@endsection

@section('open-main-pro')
nav-item
@endsection

@section('open-main-order')
nav-item
@endsection

@section('open-contactus')
nav-item
@endsection

@section('open-dashboard')
nav-item
@endsection

@section('open-feedback')
nav-item
@endsection


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    @yield('bootstrap')
</head>

<body class="hold-transition sidebar-mini layout-fixed">

{{-- Alert Include For Giving Alerts In Page --}}
@include('sweetalert::alert')

{{-- For Error Messages --}}
@include('layout.message')

<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('index')}}" class="nav-link">Home</a>
            </li>
        </ul>
    </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar User Panel -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                <img src="{{ asset('images\registerimage.jpg')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                <a href="{{ route('dashboard') }}" class="d-block">Admin</a>
                </div>
            </div>

            <!-- Sidebar Search -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->

                    <li class="@yield('open-dashboard')">
                        <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                        </a>
                    </li>

                    <li class="@yield('open-main')">
                        <a href="#" class="nav-link">
                        {{-- <i class="nav-icon fas fa-th"></i> --}}
                        <i class="nav-icon fas fa-bars"></i>
                        <p>
                            Category
                            <i class="right fas fa-angle-right"></i>
                        </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="@yield('open-view')">
                                <a href="{{ route('category.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Categories</p>
                                </a>
                            </li>
                            <li class="@yield('open-create')">
                                <a href="{{ route('category.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Category</p>
                                </a>
                            </li>
                            <li class="@yield('open-edit')">
                                <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Edit Category</p>
                                </a>
                            </li>
                            <li class="@yield('open-bulk')">
                                <a href="{{ route('category.bulkUpload') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bulk Upload</p>
                                </a>
                            </li>
                            <li class="@yield('open-image-bulk')">
                                <a href="{{ route('category.bulkImageUpload') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bulk Image Upload</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="@yield('open-main-pro')">
                        <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Products
                            <i class="right fas fa-angle-right"></i>
                        </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="@yield('open-view1')">
                                <a href="{{ route('product.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Products</p>
                                </a>
                            </li>
                            <li class="@yield('open-create1')">
                                <a href="{{ route('product.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Product</p>
                                </a>
                            </li>
                            <li class="@yield('open-edit1')">
                                <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Edit Product</p>
                                </a>
                            </li>
                            <li class="@yield('open-bulk1')">
                                <a href="{{ route('product.bulkUpload') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bulk Upload</p>
                                </a>
                            </li>
                            <li class="@yield('open-image-bulk1')">
                                <a href="{{ route('product.bulkImageUpload') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bulk Image Upload</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="@yield('open-main-order')">
                        <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list-ol"></i>
                        <p>
                            Orders
                            <i class="right fas fa-angle-right"></i>
                        </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="@yield('open-new')">
                                <a href="{{ route('orders.new') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New Orders</p>
                                </a>
                            </li>
                            <li class="@yield('open-accepted')">
                                <a href="{{ route('orders.accepted') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Accepted Orders</p>
                                </a>
                            </li>
                            <li class="@yield('open-delivered')">
                                <a href="{{ route('orders.delivered') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Delivered Orders</p>
                                </a>
                            </li>
                            <li class="@yield('open-returned')">
                                <a href="{{ route('orders.returned') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Return Requests</p>
                                </a>
                            </li>
                            <li class="@yield('open-canceled')">
                                <a href="{{ route('orders.canceled') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Orders Canceled</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="@yield('open-contactus')">
                        <a href="{{ route('contactusAdmin') }}" class="nav-link">
                        <i class="nav-icon fas fa-phone-alt"></i>
                        <p>
                            Contact Us
                        </p>
                        </a>
                    </li>

                    <li class="@yield('open-feedback')">
                        <a href="{{ route('feedbackAdmin') }}" class="nav-link">
                        <i class="nav-icon fas fa-comment-alt"></i>
                        <p>
                            Feedbacks
                        </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link">
                            <i class="fas fa-sign-out-alt nav-icon"></i>
                            <p>Log Out</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <!-- Content Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('subtitle')</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>

    {{-- Footer --}}
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2023 <a href="{{ route('dashboard') }}">AdminLTE.io</a>.</strong>
        All Rights Reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.2.0
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script>
    $(function () {
    $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": true,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
    });
</script>
</body>
</html>
