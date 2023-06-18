<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Template Assete Start -->
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <!-- chartist CSS -->
    <link href="{{ asset('/assets/template/node_modules/morrisjs/morris.css') }}" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="{{ asset('/assets/template/node_modules/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
    <!-- This is data table -->
    <link href="{{ asset('/assets/template/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/template/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <!-- select2 CSS -->
    <link href="{{ asset('/assets/template/node_modules/select2/dist/css/select2.min.css') }}" rel="stylesheet">
    <!-- toast CSS -->
    <link href="{{ asset('/assets/template/node_modules/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
    
    <link href="{{ asset('/assets/template/node_modules/dropify/dist/css/dropify.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('/assets/template/dist/css/style.min.css') }}" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="{{ asset('/assets/template/dist/css/pages/dashboard1.css') }}" rel="stylesheet">

    <!-- <link href="{{ asset('/assets/template/dist/css/pages/icon-page.css') }}" rel="stylesheet"> -->
    <!-- Template Assete End -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0-10/css/all.css" integrity="sha512-Dj9pt3sZROOuTTs9S89ykGZeu1XQgWKg3DVpu5tZALApsrWdd3tnVjTclUuVONaHM4O8GgCnjSbHlTKXrd2OWg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('/assets/template/node_modules/fontawesome-free/css/all.min.css') }}">

    @yield('style')

</head>

<body class="skin-megna fixed-layout">

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            @include('layouts.inc.admin-topbar')
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            @include('layouts.inc.admin-left-sidebar')
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    @include('layouts.inc.admin-page-title')
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- Info box -->
                <!-- ============================================================== -->
                <main>
                    @yield('content')
                </main>
                <!-- ============================================================== -->
                <!-- End Page Content -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    @include('layouts.inc.admin-right-sidebar')
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->

            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->


        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            @include('layouts.inc.admin-footer')
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->



    <!-- Template Assete Start -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('/assets/template/node_modules/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('/assets/template/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset('/assets/template/dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('/assets/template/dist/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('/assets/template/dist/js/sidebarmenu.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('/assets/template/dist/js/custom.min.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="{{ asset('/assets/template/node_modules/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('/assets/template/node_modules/morrisjs/morris.min.js') }}"></script>
    <script src="{{ asset('/assets/template/node_modules/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <!-- Popup message jquery -->
    <script src="{{ asset('/assets/template/node_modules/toast-master/js/jquery.toast.js') }}"></script>
    <!-- jQuery peity -->
    <script src="{{ asset('/assets/template/node_modules/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('/assets/template/node_modules/peity/jquery.peity.init.js') }}"></script>
    <script src="{{ asset('/assets/template/dist/js/dashboard1.js') }}"></script>
    <!-- jQuery file upload -->
    <script src="{{ asset('/assets/template/node_modules/dropify/dist/js/dropify.min.js') }}"></script>
    <!-- Template Assete End -->

    @yield('script')

</body>

</html>
