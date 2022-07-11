<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
         <link rel="shortcut icon" href="{{ asset('/images/sbc_logo.png') }}" />
        <title>Booking Meeting Room | Shinhan Bank Cambodia</title>

        <link rel="stylesheet" href="{{ asset('/assets/npm/normalize.css@8.0.0/normalize.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/npm/fontawesome@6.1.1/css/fontawesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/npm/fontawesome@6.1.1/css/solid.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/npm/date-time-picker/jquery.datetimepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/css/cs-skin-elastic.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">

        <style>
            body {
                background: #f1f2f7;
                font-family: 'Nunito', sans-serif;
            }
            .card{
                box-shadow: none;
                border: 1px solid rgba(0,0,0,.125);
                margin-bottom: 10px;
            }


            .card-border{
                box-shadow: none;
                border:1px solid #fff;
                border-radius: 0;
                height: 100%!important;
            }
            .no-card-border{
                height: 100%!important;
                box-shadow: none;
                border-radius: 0;
                border: 0;
            }

            .no-card-border .card-body{
                background-color: none;
            }
            .card-border .card-body{
                padding: 10px;
                background-color: bisque;
            }

            /*--thank you pop starts here--*/
            .modal-msg-pop{
                width:100%;
                padding:20px;
                text-align:center;
            }
            .modal-msg-pop i{
                margin:0 auto;
                display:block;
                margin-bottom:25px;
                font-size: 90px;
            }

            .modal-msg-pop h1{
                font-size: 42px;
                margin-bottom: 25px;
                color:#5C5C5C;
            }
            .modal-msg-pop p{
                font-size: 20px;
                margin-bottom: 27px;
                color:#5C5C5C;
            }
            .modal-msg-pop h3.cupon-pop{
                font-size: 25px;
                margin-bottom: 40px;
                color:#222;
                display:inline-block;
                text-align:center;
                padding:10px 20px;
                border:2px dashed #222;
                clear:both;
                font-weight:normal;
            }
            .modal-msg-pop h3.cupon-pop span{
                color:#03A9F4;
            }
            .modal-msg-pop a{
                display: inline-block;
                margin: 0 auto;
                padding: 9px 20px;
                color: #fff;
                text-transform: uppercase;
                font-size: 14px;
                background-color: #8BC34A;
                border-radius: 17px;
            }
            .modal-msg-pop a i{
                margin-right:5px;
                color:#fff;
            }
            #ignismyModal .modal-header{
                border:0px;
            }

            .bd-pink-wrap{
                box-shadow: rgb(0 0 0 / 24%) 0px 0px 20px;
                margin: 20px;
                border-radius: 10px;
            }

            .block-filter .main-top-bg{
                background: rgb(243,127,169);
                background: linear-gradient(90deg, rgba(243,127,169,1) 0%, rgba(153,97,243,1) 100%);
            }
            .block-filter label{
                color: #fff;
                font-weight: 700;
            }
            .block-filter .btn-search{
                background: rgb(243,127,169);
                border: 0px solid #fff;
                border-radius: 50px;
                box-shadow: rgb(0 0 0 / 24%) 0px 3px 8px;
            }

            .block-filter .btn-search i{
                color: #fff;
            }
            .block-book .head-title{
                background: #f37fa9; /* fallback for old browsers */
                background: -webkit-linear-gradient(to right, #f37fa9, #9961f3); /* Chrome 10-25, Safari 5.1-6 */
                background: linear-gradient(to right, #f37fa9, #9961f3); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                -webkit-background-clip: text;
                background-clip: text;
                color: transparent;
                font-weight: 600;
            }
            .card-border .card-body-bg-danger{
                background-color:#f0675d;
            }
            .box-badge-bg-available i{
                color: bisque;
                border: 1px solid #000;
            }
            .box-badge-bg-unavailable i{
                color: #f0675d;
                border: 1px solid #000;
            }
            /*--thank you pop ends here--*/
        </style>
    </head>
    <body class="antialiased">
          <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <div class="row justify-content block-filter">
                    <div class="col-lg-12">
                        <a href="{{ route('home') }}"><i class="fa-solid fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="col-lg-12">
                        <div class="card main-top-bg">
                            <div class="card-body">
                                <input type="hidden" value="{{ route('booking.room.store') }}" id="url-store"/>
                                <form name="add-blog-post-form" id="add-blog-post-form" method="get" action="{{ route('booking.room.index')}}">
                                    <input type="hidden" name="search" value="true" />
                                    <div class="row form-group justify-content-center">
                                        <div class="col-12 col-xl-3 py-3">
                                            <label>Date </label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-calendar-days"></i></div>
                                                <input type="text" name="date" class="form-control" data-field="date" id="date-booking" value="{{ $date }}">
                                            </div>
                                        </div>
                                        <div class="col-6 col-xl-2 col-sm-6 py-3">
                                            <label>Time In </label>
                                            <select name="time_in" id="time_in_select" class="form-control">
                                                @foreach (Config::get('times') as $index => $value)
                                                    @if(!$loop->last && $currentDateTimeIn->format('Hi') < str_replace(':', '', $value))
                                                        <option value="{{ $value }}" id="timeIn-{{ $index }}" @if($setTimeIn == $value) selected @endif @if($currentDateTimeIn->format('Hi') > str_replace(':', '', $value)) disabled="disabled" @endif>{{ $value }}</option>
                                                    @endif
                                                @endforeach
                                              
                                            </select>
                                        </div>
                                        <div class="col-6 col-xl-2 col-sm-6 py-3">
                                            <label>Time Out </label>
                                            <select name="time_out" id="time_out_select" class="form-control">
                                                @foreach (Config::get('times') as $index => $value)
                                                    @if(!$loop->first && $currentDateTimeOut->format('Hi') < str_replace(':', '', $value))
                                                        <option value="{{ $value }}" id="timeOut-{{ $index }}" @if($setTimeOut == $value) selected @endif>{{ $value }}</option>
                                                    @endif
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                        <div class="col-12 col-xl-2 py-3">
                                            <label> Find Available Rooms</label>
                                            <button type="submit" class="btn btn-primary btn-search btn-sm form-control" style="width:150px"><i class="fa-solid fa-magnifying-glass"></i>&nbsp; </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  Room  -->
                <div class="row block-book">
                    <div class="col-lg-12">
                        <div class="card">
                            <h2 class="text-sm-center mt-3 head-title"> MAP LAYOUT</h2>
                            <div class="row">
                                <div class="col-2">
                                    <div class="compass p-4">
                                        <img src="{{ asset('/images/compass.png') }}" width="200px"/>
                                    </div>
                                    <div class="note p-4">
                                        <h4 class="py-3">Room Status</h4>
                                        <p class="box-badge-bg-available m-0"><i class="fa-solid fa-square"></i> <span> Available Room </span></p>
                                        <p class="box-badge-bg-unavailable"><i class="fa-solid fa-square"></i> <span> Unavailable Room </span></p>
                                    </div>
                                </div>
                                <div class="col-8 bd-pink-wrap">
                                    <div class="card-body">
                                        <div class="row">
                                             <div class="col-4">
                                                <div class="card card-border">
                                                    <x-room-button type="button" :checkFinished="$checkFinished" :getRooms="$getRooms[1]" :getBookingRoom="$getBookingRoom[1]" :getMeetingRoom="$getMeetingRoom[1]" :setTimeIn="$setTimeIn" :setTimeOut="$setTimeOut" :macAddr="$macAddr" :checkMeetingFinished="$checkMeetingFinished[1]" :checkSystemBooking="$checkSystemBooking"/>
                                                </div>
                                            </div>    
                                            <div class="col-8">
                                               
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1 mb-4 p-0">
                                               
                                            </div>
                                            <div class="col-2 mb-4">
                                                <div class="card no-card-border">
                                                    <div class="card-body d-flex justify-content-center align-items-center">
                                                        <div class="mx-auto d-block">
                                                            <h3 class="text-center"> <i class="fa-solid fa-door-open"></i></h3>
                                                            <h5 class="text-sm-center mt-2 mb-1"> Entrance</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-2 mb-4">
                                                
                                            </div>
                                            <div class="col-3 mb-4 p-0">
                                                <div class="card card-border m-0">
                                                    <x-room-button type="button" :checkFinished="$checkFinished" :getRooms="$getRooms[2]" :getBookingRoom="$getBookingRoom[2]" :getMeetingRoom="$getMeetingRoom[2]" :setTimeIn="$setTimeIn" :setTimeOut="$setTimeOut" :macAddr="$macAddr" :checkMeetingFinished="$checkMeetingFinished[2]" :checkSystemBooking="$checkSystemBooking"/>
                                                </div>
                                            </div>
                                            <div class="col-4 mb-4 pl-0">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card card-border m-0">
                                                            <x-room-button type="button" :checkFinished="$checkFinished" :getRooms="$getRooms[3]" :getBookingRoom="$getBookingRoom[3]" :getMeetingRoom="$getMeetingRoom[3]" :setTimeIn="$setTimeIn" :setTimeOut="$setTimeOut" :macAddr="$macAddr" :checkMeetingFinished="$checkMeetingFinished[3]" :checkSystemBooking="$checkSystemBooking"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="card card-border">
                                                            <x-room-button type="button" :checkFinished="$checkFinished" :getRooms="$getRooms[4]" :getBookingRoom="$getBookingRoom[4]" :getMeetingRoom="$getMeetingRoom[4]" :setTimeIn="$setTimeIn" :setTimeOut="$setTimeOut" :macAddr="$macAddr" :checkMeetingFinished="$checkMeetingFinished[4]" :checkSystemBooking="$checkSystemBooking"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3 mb-4 pr-0">
                                                <div class="card card-border">
                                                    <x-room-button type="button" :checkFinished="$checkFinished" :getRooms="$getRooms[5]" :getBookingRoom="$getBookingRoom[5]" :getMeetingRoom="$getMeetingRoom[5]" :setTimeIn="$setTimeIn" :setTimeOut="$setTimeOut" :macAddr="$macAddr" :checkMeetingFinished="$checkMeetingFinished[5]" :checkSystemBooking="$checkSystemBooking"/>
                                                </div>
                                            </div>
                                            <div class="col-2 mb-4 p-0">
                                                <div class="card card-border">
                                                    <div class="card-body d-flex justify-content-center align-items-center">
                                                        <div class="mx-auto d-block">
                                                            <h3 class="text-center"><i class="fa-solid fa-book"></i></h3>
                                                            <h5 class="text-sm-center mt-2 mb-1"> library room</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-7 mb-4 pl-0">
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1 p-0">
                                    
                                </div>
                            </div> <!-- /.row -->
                        </div>
                    </div><!-- /# column -->
                </div>
                <!--  /Traffic -->
                <div class="clearfix"></div>
                <!-- Modal - Save Booking - Add New Event -->
                <div class="modal fade none-border" id="booking-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"><strong>New Booking</strong></h4>
                            </div>
                            <div class="modal-body row">
                                <div class="col-12 py-3">
                                    <!--  Date Input  -->
                                    <label><span class="text-danger">*</span>Room : </label>
                                    <div class="input-group">
                                        <input type="text" name="room_name" class="form-control" value="" id="room-name" readonly>
                                        <input type="hidden" name="room_id" class="form-control" value="" id="room-id">
                                    </div>
                                </div>
                                <div class="col-12 py-3">
                                    <!--  Date Input  -->
                                    <label><span class="text-danger">*</span>Date : </label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar-days"></i></div>
                                        <input type="text" name="date" class="form-control" id="select-date-booking" value="{{ $date }}" readonly>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-6 col-sm-6 py-3">
                                    <label><span class="text-danger">*</span>Time In : </label>
                                    <input type="text" name="time_in" class="form-control" id="time-in" value="{{ $setTimeIn }}" readonly />
                                    {{-- <select name="time_in" class="form-control" id="time-in" readonly>
                                        @foreach (Config::get('times') as $index => $value)
                                            @if(!$loop->last)
                                                <option value="{{ $value }}" @if($setTimeIn == $value) selected @endif>{{ $value }}</option>
                                            @endif
                                        @endforeach
                                    </select> --}}
                                </div>
                                <div class="col-12 col-xl-6 col-sm-6 py-3">
                                    <label><span class="text-danger">*</span>Time Out : </label>
                                    <input type="text" name="time_out" class="form-control" id="time-out" value="{{ $setTimeOut }}" readonly />
                                    {{-- <select name="time_out" class="form-control" id="time-out" readonly>
                                        @foreach (Config::get('times') as $index => $value)
                                            @if(!$loop->first)
                                                <option value="{{ $value }}" @if($setTimeOut == $value) selected @endif>{{ $value }}</option>
                                            @endif
                                        @endforeach
                                    </select> --}}
                                </div>
                                <div class="col-12 py-3">
                                    <label><span class="text-danger">*</span>Booker : </label>
                                    <input type="text" class="form-control" name="booker" value="" id="booker" required/>
                                </div> 
                                <div class="col-12 py-3">
                                    <label><span class="text-danger">*</span>Department : </label>
                                    <select name="department" id="department" class="form-control">
                                        @foreach ($departments as $index => $value)
                                            <option value="{{ $index }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                 <div class="col-12 py-3">
                                    <label><span class="text-danger">*</span>Purpose : </label>
                                    <textarea class="form-control" name="purpose" rows="4" cols="50" id="purpose" required></textarea>
                                </div> 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success save-booking waves-effect waves-light" id="save">Save Booking</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /#event-modal -->

                <!--Model Popup Success-->
                <div class="container">
                    <div class="row">
                        <div class="modal fade" id="save-success" role="dialog">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="modal-msg-pop">
                                            <p class="text-success"><i class="fa-solid fa-file-circle-check"></i><p>
                                            <h3>Booking Successfully!</h3>
                                            <p class="m-2">Date: <span id="d-s-date"><span></p>
                                            <p class="mb-2">Time: <span id="d-s-time"><span></p>
                                            <p class="mb-2">Room: <span id="d-s-room"><span></p>
                                        </div>
                                        <button type="button" class="btn btn-info justify-content-center align-items-center d-flex m-auto s-close" data-dismiss="modal" aria-label=""><span>close</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Model Popup Success ends-->
                <!--Model Popup Success-->
                <div class="container">
                    <div class="row">
                        <div class="modal fade" id="save-error" role="dialog">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="modal-msg-pop">
                                            <p class="text-danger"><i class="fa-solid fa-file-circle-xmark"></i></p>
                                            <h3>Booking Fail!</h3>
                                            <p id="error-msg"></p>
                                        </div>
                                        <button type="button" class="btn btn-info justify-content-center align-items-center d-flex m-auto" data-dismiss="modal" aria-label="" id="heng-btn-close"><span>close</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Model Popup Success ends-->
                @foreach($getRooms as $key => $value)
                     <!-- Modal - Lists - Add New Event -->
                    <div class="modal fade none-border" id="lists-room-modal-{{ $value['id'] }}">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title"><strong>Booking lists</strong> ( {{ $date }} )</h4>
                                </div>
                                <div class="modal-body">
                                    <!-- Booking Lists -->
                                    <div class="orders">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="box-title">{{ $value['name'] }} </h4>
                                                    </div>
                                                    <div class="card-body--">
                                                        <div class="table-stats order-table ov-h">
                                                            <table class="table ">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Time In</th>
                                                                        <th>Time Out</th>
                                                                        <th>Booked By</th>
                                                                        <th>Department</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($listBookings as $key => $valueBooking)
                                                                        @if($valueBooking->room_id == $value['id'])
                                                                            <tr>
                                                                                <td> <span class="time_in">{{ $valueBooking->time_in->format('H:i') }}</span> </td>
                                                                                <td><span class="time_out">{{ $valueBooking->time_out->format('H:i') }}</span></td>
                                                                                <td><span class="booker">{{ $valueBooking->booker }}</span></td>
                                                                                <td><span class="department">{{ $valueBooking->department->name }}</span></td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div> <!-- /.table-stats -->
                                                    </div>
                                                </div> <!-- /.card -->
                                            </div>  <!-- /.col-lg-8 -->
                                        </div>
                                    </div>
                                    <!-- /.orders -->
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!--Model Popup Success-->
                <div class="container">
                    <div class="row">
                        <div class="modal fade" id="cancel-booking-modal" role="dialog">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <form class="float-right m-0" method="post" action="{{ route('booking.room.delete') }}">
                                    @method('delete')
                                    @csrf
                                    <div class="modal-content">
                                        <input type="hidden" name="id" id="cancel-id" />
                                        <div class="modal-body">
                                            <div class="modal-msg-pop">
                                                <p class="text-danger"><i class="fa-solid fa-users-rays"></i></p>
                                                <h3>Are you sure you want to cancel this booking ?</h3>
                                                <p class="m-3" id="cancel-notice"></p>
                                            </div>
                                            <div class="justify-content-center align-items-center d-flex m-auto">
                                                <button type="submit" class="btn btn-primary m-2"><span>Yes</span></button>
                                                <button type="button" class="btn btn-info m-2" data-dismiss="modal" aria-label=""><span>No</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Model Popup Success ends-->
                @if(session()->has('message-cancel'))
                <!--Model Popup Cancel Success-->
                <div class="container">
                    <div class="row">
                        <div class="modal fade" id="cancel-success" role="dialog">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="modal-msg-pop">
                                            <p class="text-success"><i class="fa-solid fa-file-circle-check"></i><p>
                                            <h3>Booking was canceled Successful!</h3>
                                        </div>
                                        <button type="button" class="btn btn-info justify-content-center align-items-center d-flex m-auto" data-dismiss="modal" aria-label=""><span>close</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Model Popup Cancel Success ends-->
                @endif
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <!-- Scripts -->
        <script src="{{ asset('/assets/npm/date-time-picker/jquery.js') }}"></script>
        <script src="{{ asset('/assets/npm//bootstrap@4.1.3/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/assets/npm/date-time-picker/moment.js') }}"></script>
        <script src="{{ asset('/assets/npm/date-time-picker/build/jquery.datetimepicker.full.min.js') }}"></script>
        <!--Local Stuff-->
        <script>
            
            $('#date-booking').datetimepicker({
                timepicker:false,
                format:'Y-m-d',
                formatDate:'Y-m-d',
                minDate:'-1970/01/01', // yesterday is minimum date
            });

            $('#select-date-booking1').datetimepicker({
                timepicker:false,
                format:'Y-m-d',
                formatDate:'Y-m-d',
                minDate:'-1970/01/01', // yesterday is minimum date
                
            });

            $(".book-modal").click(function(){
                $("#booker").val("");
                $("#purpose").val("");
                $("#room-name").val($(this).attr("data-value"));
                $("#room-id").val($(this).attr("data-id"));
            });

            $('#save').click(function(){
                var roomId = $("#room-id").val();
                var roomName = $("#room-name").val();
                var bookingDate = $("#select-date-booking").val();
                var bookingTimeIn = $("#time-in").val();
                var bookingTimeOut = $("#time-out").val();
                var booker = $("#booker").val();
                var departmentId = $("#department").val();
                var purpose = $("#purpose").val();
                $('#d-s-date').html("");
                $('#d-s-time').html("");
                $('#d-s-room').html("");
                if(roomId == "" || roomId == undefined){
                    alert("Plese Select Room");
                    return;
                }
                if(bookingDate == "" || bookingDate == undefined){
                    alert("Plese Select Booking Date");
                    return;
                }
                if(bookingTimeIn == "" || bookingTimeIn == undefined){
                    alert("Plese Select Booking Time In");
                    return;
                }

                if(bookingTimeOut == "" || bookingTimeOut == undefined){
                    alert("Plese Select Booking Time Out");
                    return;
                }

                if(booker == "" || booker == undefined){
                    alert("Plese Input Booker");
                    return;
                }

                if(departmentId == "" || departmentId == undefined){
                    alert("Plese Select Department");
                    return;
                }

                if(purpose == "" || purpose == undefined){
                    alert("Plese Input purpose");
                    return;
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                var formData = {
                    room_id: roomId,
                    date: bookingDate,
                    timeIn: bookingDate+' '+bookingTimeIn+':00',
                    timeOut: bookingDate+' '+bookingTimeOut+':00',
                    booker: booker,
                    department: departmentId,
                    purpose: purpose
                };
                var url = $("#url-store").val();
                $.ajax({
                    type:'POST',
                    url: url,
                    data: formData,
                    dataType: 'json',
                    success:function(data) {
                        console.log(data);
                        if(data.status == 'success'){
                            $('#d-s-date').html(bookingDate)
                            $('#d-s-time').html(bookingTimeIn+' - '+bookingTimeOut);
                            $('#d-s-room').html(roomName);
                            $('#booking-modal').modal('hide');
                            $('#save-success').modal({backdrop: 'static', keyboard: false});
                        }else if(data.status == 'error'){
                            $('#save-success').modal('hide');
                            $('#save-error').modal({backdrop: 'static', keyboard: false});
                            $("#error-msg").html(data.msg);
                        }else{
                            $('#booking-modal').modal('hide');
                            $('#save-error').modal({backdrop: 'static', keyboard: false});
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                         $('#save-error').modal({backdrop: 'static', keyboard: false});
                         $("#error-msg").html("Server Error, Please Contact to ICT Department!");
                    }
                });
            })

            $(document).ready(function() {
                $('.btn-cancel-booking').on('click', function(){
                    $('#cancel-id').val("");
                    $('#cancel-notice').html("");
                    $('#cancel-notice').html($(this).attr('data-value'));
                    $('#cancel-id').val($(this).attr('data-id'))
                });
                $('#heng-btn-close').on('click', function(){
                    location.reload();
                });
                $('.s-close').on('click', function(){
                    location.reload();
                });

                var timeInOption = $("#time_in_select").html();
                var timeOutOption = $("#time_out_select").html();
                var timeIn = [
                            '08:00',
                            '08:30',
                            '09:00',
                            '09:30',
                            '10:00',
                            '10:30',
                            '11:00',
                            '11:30',
                            '12:00',
                            '12:30',
                            '13:00',
                            '13:30',
                            '14:00',
                            '14:30',
                            '15:00',
                            '15:30',
                            '16:00',
                            '16:30',
                        ];
                var timeOut = [
                            '08:30',
                            '09:00',
                            '09:30',
                            '10:00',
                            '10:30',
                            '11:00',
                            '11:30',
                            '12:00',
                            '12:30',
                            '13:00',
                            '13:30',
                            '14:00',
                            '14:30',
                            '15:00',
                            '15:30',
                            '16:00',
                            '16:30',
                            '17:00',
                        ];

                $("#date-booking").on("change", function (e) {
                    let today = new Date().toISOString().slice(0, 10);
                    let selectedDate = $(this).val();

                    let timeInSelect = "";
                    let timeOutSelect = "";
                    if (selectedDate != today) {
                        for(let i=0; i<18; i++) {
                            timeInSelect += `<option value="${timeIn[i]}" id="timeIn-${i}}">${timeIn[i]}</option>`;
                            timeOutSelect += `<option value="${timeOut[i]}" id="timeOut-${i}}">${timeOut[i]}</option>`;
                        }
                        $("#time_in_select").html(timeInSelect);
                        $("#time_out_select").html(timeOutSelect);
                    } else {
                        $("#time_in_select").html(timeInOption);
                        $("#time_out_select").html(timeOutOption);
                    }
                });

                $('#cancel-success').modal({backdrop: 'static', keyboard: false});
                $("#time_in_select").change(function(){
                    let getValue = $('#time_in_select').find(":selected").text();
                    let getOutId = $("#time_out_select option[value='"+getValue+"']").attr("id");
                    $("#time_out_select option").removeAttr("selected");
                    if(getOutId !== undefined){
                        let result = getOutId.replace("timeOut-", "");
                        result = Number(result) + 1;
                        $("#time_out_select option[id=timeOut-"+result+"]").attr("selected", "selected");
                    }else{
                        $("#time_out_select option[id=timeOut-1]").attr("selected", "selected");
                    }
                })

                $("#time_out_select").change(function(){
                    let getIdIn = $('#time_in_select').find(":selected").text();
                    let getIdOut = $('#time_out_select').find(":selected").text();
                    let getOutId = $("#time_out_select option[value='"+getIdIn+"']").attr("id");
                    let resultIn = getIdIn.replace(":", "");
                    let resultOut = getIdOut.replace(":", "");
                    let result = getOutId.replace("timeOut-", "");
                    if(Number(resultIn) >= Number(resultOut)){
                        result = Number(result) + 1;
                        $("#time_out_select option").removeAttr("selected");
                        $("#time_out_select option").prop("selected", false)
                        $("#time_out_select option[id=timeOut-"+result+"]").attr("selected", "selected");
                        alert("Sorry can't select time out less than time in !!!");
                    }
                })
            });
        </script>
    </body>
</html>
