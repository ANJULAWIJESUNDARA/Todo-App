<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>ToDO APP - @yield('title')</title>
    @include('layouts.stylesheet')
</head>

<body class="">
    @include('layouts.left-sidenav')
    @include('layouts.topbar-start')
    <div class="page-wrapper">
        <!-- Page Content-->
        <div class="page-content-tab">
            <div class="container-fluid">
                @yield('page-title-breadcrumb') >> @yield('page-title-breadcrumb2')
                @yield('content')
            </div><!-- container -->
            <footer class="footer text-center text-sm-left">
                @php
                    $year = date('Y');
                @endphp
            </footer>
            <!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->


    @include('layouts.javascripts')

</body>

</html>
