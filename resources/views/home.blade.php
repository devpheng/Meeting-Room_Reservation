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
                background: #f1f2f7;
            }
            .card{
                background: transparent;
                box-shadow: none;
            }
            .btn-card{
                background-image: linear-gradient(135deg, #e32d76 0%, #648fe6 100%);
                color: #fff;
                border: 1px solid #fff;
                transition: all 0.4s ease;
                position: absolute;
            }
            .btn-card .stat-content .stat-text{
                color: #fff;
            }
            .btn-card .stat-icon{
                font-size: 30px;
                top: 10px;
            }
            .btn-card .stat-widget-five{
                min-height: auto;
            }
            .btn-card .stat-content{
                margin-left:0px;
                font-weight: 700px;
                text-align: center;
            }
            .card:hover .btn-card{
                -webkit-transform: translateX(10px);
                -moz-transform: translateX(10px);
                transform: translateX(10px);
            }
            @-webkit-keyframes gradient {
                0% {
                    background-position: 0% 50%;
                }
                50% {
                    background-position: 100% 50%;
                }
                100% {
                    background-position: 0% 50%;
                }
            }

            @-moz-keyframes gradient {
                0% {
                    background-position: 0% 50%;
                }
                50% {
                    background-position: 100% 50%;
                }
                100% {
                    background-position: 0% 50%;
                }
            }

            @keyframes gradient {
                0% {
                    background-position: 0% 50%;
                }
                50% {
                    background-position: 100% 50%;
                }
                100% {
                    background-position: 0% 50%;
                }
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
                    <div class="col-12">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <a href="{{ route('booking.room.index') }}">
                                        <div class="card-body btn-card">
                                            <div class="stat-widget-five">
                                                <div class="stat-icon dib">
                                                    <i class="fa-solid fa-people-roof"></i>
                                                </div>
                                                <div class="stat-content">
                                                    <div class="text-left dib">
                                                        <div class="stat-text"><span>ROOM BOOKING</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    {{-- <a href="{{ route('booking.room.index') }}"> --}}
                                        <div class="card-body btn-card">
                                            <div class="stat-widget-five">
                                                <div class="stat-icon dib">
                                                    <i class="fa-solid fa-car"></i>
                                                </div>
                                                <div class="stat-content">
                                                    <div class="text-left dib">
                                                        <div class="stat-text"><span>COMING SOON</span></div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    {{-- </a> --}}
                                </div>
                            </div>
                        </div>
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
