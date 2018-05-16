<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/core.js') }}" defer></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    </head>
    
    <body class="navbar-bottom navbar-top {{  Request::is( 'login' ) || Request::is( 'register' )  ? 'login-container' : '' }}">

        <!-- Page header -->
        @include('layouts.header')
        <!-- /page header -->


        <!-- Page container -->
        <div class="page-container">

            <!-- Page content -->
            <div class="page-content">

                <!-- Main content -->
                <div class="content-wrapper" id="app">
                    @yield('content')
                </div>
                <!-- /main content -->

            </div>
            <!-- /page content -->

        </div>
        <!-- /page container -->


        <!-- Footer -->
        @include('layouts.footer')
        <!-- /footer -->

    </body>
</html>
