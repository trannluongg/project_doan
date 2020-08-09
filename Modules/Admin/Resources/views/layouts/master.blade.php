<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>

        @yield('css')
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="{{ asset('assets/css/admin/tempusdominus-bootstrap-4.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/admin/icheck-bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/admin/jqvmap.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/admin/adminlte.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/admin/OverlayScrollbars.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/admin/daterangepicker.css') }}">

    </head>
    <body>

        <div class="wrapper">

            @include('admin::layouts.header')
            @include('admin::layouts.sidebar')

            <div class="content-wrapper">
                @yield('content')
            </div>

            @include('admin::layouts.footer')
        </div>

        <script type="text/javascript" src="{{ asset('assets/js/admin/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/admin/jquery-ui.js') }}"></script>
        <script src="https://kit.fontawesome.com/ef4075029c.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="{{ asset('assets/js/admin/bootstrap.bundle.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/admin/Chart.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/admin/sparkline.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/admin/jquery.vmap.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/admin/jquery.vmap.usa.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/admin/jquery.knob.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/admin/moment.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/admin/daterangepicker.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/admin/tempusdominus-bootstrap-4.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/admin/jquery.overlayScrollbars.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/admin/adminlte.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/admin/dashboard.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/admin/demo.js') }}"></script>
        @yield('script')
    </body>
</html>
