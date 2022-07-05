<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
         <link rel="shortcut icon" href="{{ asset('/images/sbc_logo.png') }}" />
        <title>Booking | Shinhan Bank Cambodia</title>

        <link rel="stylesheet" href="{{ asset('/assets/npm/normalize.css@8.0.0/normalize.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/npm/fontawesome@6.1.1/css/fontawesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/npm/fontawesome@6.1.1/css/solid.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/css/cs-skin-elastic.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
         <!-- Content -->
        <div class="content">
            <h1 class="text-center py-5">
                <img src="{{ asset('/images/sbc_logo.png') }}" width="75"/>
                Shinhan Booking System
            </h1>
            <!-- Animated -->
            <div class="animated fadeIn py-5">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <a href="{{ route('booking.room.index') }}">
                                <div class="card-body">
                                    <div class="stat-widget-five">
                                        <div class="stat-icon dib">
                                            <i class="fa-solid fa-people-roof"></i>
                                        </div>
                                        <div class="stat-content">
                                            <div class="text-left dib">
                                                <div class="stat-text"><span>Booking Meeting Room</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <a href="{{ route('booking.room.index') }}">
                                <div class="card-body">
                                    <div class="stat-widget-five">
                                        <div class="stat-icon dib">
                                            <i class="fa-solid fa-car"></i>
                                        </div>
                                        <div class="stat-content">
                                            <div class="text-left dib">
                                                <div class="stat-text"><span>Booking Car</span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                       
                    </div>
                </div>
                <!-- /Widgets -->
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <!-- Scripts -->
        <script src="{{ asset('/assets/npm//bootstrap@4.1.3/dist/js/bootstrap.min.js') }}"></script>
    </body>
</html>
