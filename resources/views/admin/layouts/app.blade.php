<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Booking System | Shinhan Bank Cambodia</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{ asset('/images/sbc_logo.png') }}">
    <link rel="shortcut icon" href="{{ asset('/images/sbc_logo.png') }}">

    <link rel="stylesheet" href="{{ asset('/assets/npm/normalize.css@8.0.0/normalize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/npm/fontawesome@6.1.1/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/npm/fontawesome@6.1.1/css/solid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
     @stack('styles')
   <style>
        #weatherWidget .currentDesc {
            color: #ffffff!important;
        }
        .traffic-chart {
            min-height: 335px;
        }
        #flotPie1  {
            height: 115px;
        }
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
            height: 115px;
        }
        
        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }
    </style>
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="{{ (request()->is('admin')) ? 'active' : '' }}">
                        <a href="{{ route('admin.index') }}"><i class="menu-icon fa fa-laptop"></i> Dashboard </a>
                    </li>
                    <li class="{{ (request()->is('admin/room')) ? 'active' : '' }}">
                        <a href="{{ route('admin.room.index') }}"><i class="menu-icon fa-solid fa-house"></i> Rooms </a>
                    </li>
                    <li class="{{ (request()->is('admin/booking')) ? 'active' : '' }}">
                        <a href="{{ route('admin.booking.index') }}"><i class="menu-icon fa-solid fa-house-lock"></i> Room Booking</a>
                    </li>
                    <li class="{{ (request()->is('admin/department')) ? 'active' : '' }}">
                        <a href="{{ route('admin.department.index') }}"><i class="menu-icon fa-solid fa-building"></i> Departments</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ route('admin.index')}}"><img src="{{ asset('images/sbc_logo.png') }}" alt="Shinhan Bank" width="30px"> Booking System</a>
                    <a class="navbar-brand hidden" href="{{ route('admin.index')}}"><img src="{{ asset('images/sbc_logo.png') }}" alt="Shinhan Bank" width="30px"> Booking System</a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="user-area dropdown float-right">
                        <a class="dropdown-toggle active" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        </a>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            @yield('content')
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2022 Shinhan Bank Cambodia
                    </div>
                    <div class="col-sm-6 text-right">
                        Developed by ICT Department
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="{{ asset('/assets/npm/date-time-picker/jquery.js') }}"></script>
    <script src="{{ asset('/assets/npm//bootstrap@4.1.3/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets/npm/date-time-picker/moment.js') }}"></script>
    <script src="{{ asset('/assets/npm/date-time-picker/build/jquery.datetimepicker.full.min.js') }}"></script>
     <!-- Scripts -->
    <script src="{{ asset('/assets/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js') }}"></script>
    <script src="{{ asset('/assets/js/main.js') }}"></script>
    @stack('scripts')

    <!--Local Stuff-->
    <script>
       
    </script>
</body>
</html>

