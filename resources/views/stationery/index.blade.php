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
                        <a class="btn btn-outline-primary mb-3" id="edit-profile">Edit Profile</a>
                        <table class="table" id="stationery">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th>Code</th>
                                    <th>Quantity</th>
                                    <th>Total Stock Remain</th>
                                    {{-- <th>Remark</th> --}}
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                                        <tbody>
                                            @foreach($stationeries as $key => $stationery)
                                            <tr>
                                                <td class="serial">{{ $key + 1 }}</td>
                                                <td> {{ $stationery->code }}</td>
                                                <td> {{ $stationery->quantity }}</td>
                                                <td> {{ $stationery->stock }}</td>
                                                {{-- <td> {{ $stationery->remark }}</td> --}}
                                                <td>
                                                    <a class="btn btn-outline-success btn-sm btn-request" data-id="{{ $stationery->id }}" data-code="{{ $stationery->code }}" data-stock="{{ $stationery->stock }}">Request</a>
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

         <!-- Modal - Calendar - Add New Event -->
         <div class="modal fade none-border" id="stock-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="add-stock" action="{{ route('stationery.request') }}" method="POST">
                    @csrf
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"><strong id="code"></strong></h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="stationery_id" value="" id="stationery-id"/>
                            <label for="stock">Request amount</label>
                            <input class="form-control" type="text" name="stock" value="0" id="stock"/>
                            <input class="form-control" type="hidden" name="request_by" id="request_by"/>
                            <input class="form-control" type="hidden" name="department_id" id="department_id"/>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success save-event waves-effect waves-light">Request</button>
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="modal fade none-border" id="profile-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    {{-- <form id="profile" action="#" method="POST">
                    @csrf --}}
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">User Profile</h4>
                        </div>
                        <div class="modal-body">
                            {{-- <input type="hidden" name="id" value="" id="stationery-id"/> --}}
                            <label for="name">Name</label>
                            <input class="form-control" type="text" name="name" id="profile-name"/>
                            <label for="name" class="pt-4">Department</label>
                            <select name="department" id="profile-department" class="form-control">
                                @foreach ($departments as $index => $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success save-event waves-effect waves-light" id="btn-save">Save</button>
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        </div>
                    {{-- </form> --}}
                </div>
            </div>
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
                        var maxStock = 0;
                        $('#stationery').DataTable();
                        $('#btn-save').click(function(){
                            let name = $('#profile-name').val();
                            let department = $('#profile-department').val();
                            localStorage.setItem('name', name);
                            localStorage.setItem('department', department);
                            $('#profile-modal').modal('hide');
                        });

                        $('#edit-profile').click(function(){
                            $('#profile-name').val(localStorage.getItem('name'));
                            $('#profile-department').val(localStorage.getItem('department'));
                            $('#profile-modal').modal({
                                backdrop: 'static',
                                keyboard: false
                            });

                        });

                        if(localStorage.getItem('name') == null || localStorage.getItem('department') == null) {
                            $('#profile-modal').modal({
                                backdrop: 'static',
                                keyboard: false
                            });
                        }

                        $('#stock').keyup(function(){
                            // console.log($(this).val());
                            if(parseInt($(this).val()) > maxStock) {
                                $(this).val(maxStock);
                            }
                        });


                        $('.btn-request').click(function(){
                            $('#stock-modal').modal({
                                backdrop: 'static',
                                keyboard: false
                            });
                            maxStock = $(this).attr('data-stock');
                            $('#stationery-id').val($(this).attr('data-id'));
                            $('#code').text($(this).attr('data-code'));
                            $('#stock').val('');
                            $('#request_by').val(localStorage.getItem('name'));
                            $('#department_id').val(localStorage.getItem('department'));
                        })
                    });
            </script>
    </body>
</html>
