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
        <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/datatables.min.css') }}"/>

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
                Shinhan Stationery Request
            </h1>
            <!-- Animated -->
            <div class="animated fadeIn py-5">
                <div class="row mb-5">
                    <div class="col-8 offset-2">
                         @if(session()->has('message'))
                            <span class="alert alert-success"> {{ session('message') }} </span>
                        @endif
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-8 offset-2">
                        <a class="btn btn-outline-primary mb-3" href="{{ route('stationery') }}">Back</a>
                        <table class="table" id="request">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th>Request By</th>
                                    <th>Department</th>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Request Date</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                                        <tbody>
                                            @foreach($requests as $key => $request)
                                            <tr>
                                                <td class="serial">{{ $key + 1 }}</td>
                                                <td> {{ $request->request_by }}</td>
                                                <td> {{ $request->department->name }}</td>
                                                <td> {{ $request->stationery->code }}</td>
                                                <td> {{ $request->quantity . " " . $request->stationery->quantity}}</td>
                                                <td> {{ $request->created_at }} </td>
                                                <td>
                                                    @if ($request->approved_at == '' && $request->deleted_at == '')
                                                    <p class="text-primary">Pending</p> 
                                                    @elseif ($request->approved_at != '')
                                                        <p class="text-success">Approved</p> 
                                                    @elseif ($request->deleted_at != '')
                                                        <p class="text-danger">Cancelled</p>
                                                    @endif
                                                    
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                    </div>

                  
                </div>
                <!-- /Widgets -->
            </div>
            <!-- .animated -->
        </div>

         

        <!-- /#event-modal -->
        <!-- /.content -->
        <!-- Scripts -->
        {{-- <script src="{{ asset('/assets/npm//bootstrap@4.1.3/dist/js/bootstrap.min.js') }}"></script> --}}
        {{-- <script src="{{ asset('/assets/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js') }}"></script> --}}
        <script src="{{ asset('/assets/npm/date-time-picker/jquery.js') }}"></script>
        <script src="{{ asset('/assets/npm//bootstrap@4.1.3/dist/js/bootstrap.min.js') }}"></script>
        <!-- Scripts -->
        
            <script src="{{ asset('/assets/js/datatables.min.js') }}"></script>
            <script>
                    jQuery(document).ready(function($) {
                        $('#request').DataTable();
                    });
            </script>
    </body>
</html>
