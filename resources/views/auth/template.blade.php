<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Momo Accessories Authentication</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        
        
        @vite('resources/css/app.css')
        <!-- App favicon -->
        <link rel="icon" href="{{ url('img/logo.png') }}">

        <!-- App css -->
        <link href="{{asset('css/admin/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('css/admin/jquery-ui.min.css')}}" rel="stylesheet">
        <link href="{{asset('css/admin/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('css/admin/metisMenu.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('css/admin/app.min.css')}}" rel="stylesheet" type="text/css" />
        {{-- <link href="{{asset('css/otpVerification.css')}}" rel="stylesheet" type="text/css" /> --}}
        
        @livewireStyles
        @wireUiScripts
        <script src="//unpkg.com/alpinejs" defer></script>
    </head>

    <body class="account-body accountbg">
        
        <script src="{{asset('js/admin/jquery.min.js')}}"></script>
        @yield("content")
        <script src="{{asset('js/admin/jquery-ui.min.js')}}"></script>
        <script src="{{asset('js/admin/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('js/admin/metismenu.min.js')}}"></script>
        <script src="{{asset('js/admin/waves.js')}}"></script>
        <script src="{{asset('js/admin/feather.min.js')}}"></script>
        <script src="{{asset('js/admin/jquery.slimscroll.min.js')}}"></script>        
        @livewireScripts
        <!-- App js -->
        <script src="{{asset('js/admin/app.js')}}"></script>
    </body>
</html>