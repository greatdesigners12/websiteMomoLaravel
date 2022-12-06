<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Crovex - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="imaadmin/ges/favicon.ico">

        <!-- jvectormap -->
        <link href="plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">

        <!-- App css -->
        <link href="css/admin/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="css/admin/jquery-ui.min.css" rel="stylesheet">
        <link href="css/admin/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="css/admin/metisMenu.min.css" rel="stylesheet" type="text/css" />
        <link href="css/admin/app.min.css" rel="stylesheet" type="text/css" />
        
        <link href="plugins/dropify/css/dropify.min.css" rel="stylesheet">  

        @yield("cssImport")
        @livewireStyles

    </head>

    <body>
        @livewireScripts
        <script src="js/admin/jquery.min.js"></script>
        @include('admin-page.topbar')
        @include('admin-page.sidebar')
        <div class="page-wrapper">
            <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    <!-- jQuery  -->
    
    <script src="js/admin/bootstrap.bundle.min.js"></script>
    <script src="js/admin/metismenu.min.js"></script>
    <script src="js/admin/waves.js"></script>
    <script src="js/admin/feather.min.js"></script>
    <script src="js/admin/jquery.slimscroll.min.js"></script>
    <script src="js/admin/jquery-ui.min.js"></script>
    <script src="js/admin/bootstrap.bundle.min.js"></script>
    <script src="plugins/apexcharts/apexcharts.min.js"></script>
    <script src="plugins/moment/moment.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script>
    <script src="helpers/jquery.analytics_dashboard.init.js"></script>

    <!-- App js -->
    <script src="js/admin/jquery.core.js"></script>
    <script src="js/admin/app.js"></script>
    
</body>
        