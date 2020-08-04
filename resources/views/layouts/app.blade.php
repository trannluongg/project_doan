<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title')</title>
    <style>
        <?= file_get_contents('assets/css/slick.css');?>
        <?= file_get_contents('assets/css/slick-theme.css');?>
    </style>
    @yield('css')
</head>
<body>
    <div id="app">

        @include('layouts.header')

        <div class="fs-main">

            @yield('content')

        </div>

        @include('layouts.footer')

    </div>
    <script type="text/javascript">
        <?= file_get_contents('assets/js/jquery.min.js');?>
        <?= file_get_contents('assets/js/slick.min.js');?>
    </script>
    @yield('script')
</body>
</html>
