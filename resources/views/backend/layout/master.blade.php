<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> @stack('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('backend')}}/assets/images/favicon.ico">

    <!-- Plugins css-->
    <link href="{{asset('backend')}}/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!-- Table datatable css -->
    <link href="{{asset('backend')}}/assets/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Notification css (Toastr) -->
    <link href="{{asset('backend')}}/assets/libs/toastr/toastr.min.css" rel="stylesheet" type="text/css" />


    <!-- App css -->
    <link href="{{asset('backend')}}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="{{asset('backend')}}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('backend')}}/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />

    @yield('extraCSS')

</head>

<body>

<!-- Begin page -->
<div id="wrapper">


    <!-- Topbar Start -->
    @include('backend.layout.topbar')
    <!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->
    @include('backend.layout.leftSidebar')
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <!-- Start Content-->
        <div class="content">
            @yield('content')
        </div>
        <!-- end content -->



        <!-- Footer Start -->
       @include('backend.layout.footer')
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->


<!-- Right Sidebar -->
<div class="right-bar">
    <div class="rightbar-title">
        <a href="javascript:void(0);" class="right-bar-toggle float-right">
            <i class="mdi mdi-close"></i>
        </a>
        <h4 class="font-17 m-0 text-white">Theme Customizer</h4>
    </div>
    <div class="slimscroll-menu">

        <div class="p-4">
            <div class="alert alert-warning" role="alert">
                <strong>Customize </strong> the overall color scheme, layout, etc.
            </div>
            <div class="mb-2">
                <img src="assets/images/layouts/light.png" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="custom-control custom-switch mb-3">
                <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
                <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
            </div>

            <div class="mb-2">
                <img src="assets/images/layouts/dark.png" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="custom-control custom-switch mb-3">
                <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css"
                       data-appStyle="assets/css/app-dark.min.css" />
                <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
            </div>

            <div class="mb-2">
                <img src="assets/images/layouts/rtl.png" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="custom-control custom-switch mb-5">
                <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css" />
                <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
            </div>

            <a href="https://bit.ly/2QMLoUn" class="btn btn-danger btn-block mt-3" target="_blank"><i class="mdi mdi-download mr-1"></i> Download Now</a>
        </div>
    </div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<a href="javascript:void(0);" class="right-bar-toggle demos-show-btn">
    <i class="mdi mdi-settings-outline mdi-spin"></i> &nbsp;Choose Demos
</a>

<!-- Vendor js -->
<script src="{{asset('backend')}}/assets/js/vendor.min.js"></script>

<script src="{{asset('backend')}}/assets/libs/moment/moment.min.js"></script>
<script src="{{asset('backend')}}/assets/libs/jquery-scrollto/jquery.scrollTo.min.js"></script>
<script src="{{asset('backend')}}/assets/libs/sweetalert2/sweetalert2.min.js"></script>


<!-- Datatable Js Start -->
<script src="{{asset('backend')}}/assets/libs/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('backend')}}/assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
 <!-- Datatables init -->
 <script src="{{asset('backend')}}/assets/js/pages/datatables.init.js"></script>
<!-- Datatable Js End -->


<!-- Toastr js -->
<script src="{{asset('backend')}}/assets/libs/toastr/toastr.min.js"></script>

<script src="{{asset('backend')}}/assets/js/pages/toastr.init.js"></script>


<!-- Chat app -->
<script src="{{asset('backend')}}/assets/js/pages/jquery.chat.js"></script>

<!-- Todo app -->
<script src="{{asset('backend')}}/assets/js/pages/jquery.todo.js"></script>

<!-- flot chart -->
<script src="{{asset('backend')}}/assets/libs/flot-charts/jquery.flot.js"></script>
<script src="{{asset('backend')}}/assets/libs/flot-charts/jquery.flot.time.js"></script>
<script src="{{asset('backend')}}/assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
<script src="{{asset('backend')}}/assets/libs/flot-charts/jquery.flot.resize.js"></script>
<script src="{{asset('backend')}}/assets/libs/flot-charts/jquery.flot.pie.js"></script>
<script src="{{asset('backend')}}/assets/libs/flot-charts/jquery.flot.selection.js"></script>
<script src="{{asset('backend')}}/assets/libs/flot-charts/jquery.flot.stack.js"></script>
<script src="{{asset('backend')}}/assets/libs/flot-charts/jquery.flot.crosshair.js"></script>



@yield('extraJs')


<!-- Dashboard init JS -->
<script src="{{asset('backend')}}/assets/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="{{asset('backend')}}/assets/js/app.min.js"></script>

</body>

</html>
