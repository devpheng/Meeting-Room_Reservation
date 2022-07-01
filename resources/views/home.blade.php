<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <link rel="stylesheet" href="{{ asset('/assets/npm/normalize.css@8.0.0/normalize.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/npm/fontawesome@6.1.1/css/fontawesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/npm/fontawesome@6.1.1/css/solid.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/npm/date-time-picker/jquery.datetimepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/css/cs-skin-elastic.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
        
        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            .card-border{
                box-shadow: none;
                border:1px solid #ccc;
                border-radius: 0;
                height: 100%!important;
            }
            .card-border .card-body{
                padding: 10px;
            }
        </style>
    </head>
    <body class="antialiased">
          <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <input type="hidden" value="{{ route('booking.store') }}" id="url-store"/>
                                <form name="add-blog-post-form" id="add-blog-post-form" method="get" action="{{ route('home')}}">
                                    <input type="hidden" name="search" value="true" />
                                    <div class="row form-group">
                                        <div class="col-12 col-xl-3 py-3">
                                            <label>Date : </label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-calendar-days"></i></div>
                                                <input type="text" name="date" class="form-control" data-field="date" id="date-booking" value="{{ $date }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-6 col-xl-2 col-sm-6 py-3">
                                            <label>Time In : </label>
                                            <select name="time_in" id="time_in_select" class="form-control">
                                                @foreach (Config::get('times') as $index => $value)
                                                    <option value="{{ $value }}" id="timeIn-{{ $index }}" @if($setTimeIn == $value) selected @endif>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-6 col-xl-2 col-sm-6 py-3">
                                            <label>Time Out : </label>
                                            <select name="time_out" id="time_out_select" class="form-control">
                                                @foreach (Config::get('times') as $index => $value)
                                                    <option value="{{ $value }}" id="timeOut-{{ $index }}" @if($setTimeOut == $value) selected @endif>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-xl-1 py-3">
                                            <label> Filter Rooms</label>
                                            <button type="submit" class="btn btn-primary btn-sm form-control"><i class="fa-solid fa-magnifying-glass"></i>&nbsp; </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  Room  -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-8 mb-4 pr-0">
                                                <div class="card card-border">
                                                    <div class="card-body d-flex justify-content-center align-items-center">
                                                        <div class="mx-auto d-block">
                                                            <h3 class="text-center"><i class="fa-solid fa-building-user"></i></h3>
                                                            <h5 class="text-sm-center mt-2 mb-1"> GA Dept, Banking Dept</h5>
                                                        </div>
                                                    </div>
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
                                            <div class="col-2 mb-4 pl-0">
                                                <div class="card card-border">
                                                    <div class="card-body d-flex justify-content-center align-items-center">
                                                        <div class="mx-auto d-block">
                                                            <h5 class="text-sm-center mt-2 mb-1">Meeting Room2</h5>
                                                            <div class="location text-sm-center"><i class="fa fa-map-marker"></i> Meeting, ICT Development Dept</div>
                                                            <div class="d-btn p-3 d-flex justify-content-center align-items-center">
                                                                <button type="button" class="btn btn-success  btn-sm mr-2">List</button>
                                                                <button type="button" class="btn btn-primary btn-sm mr-2 book-modal" data-toggle="modal" data-target="#booking-modal" data-id="1" data-value="Meeting Room2">Book</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="row">
                                            <div class="col-4 mb-4 pr-0">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="card card-border m-0">
                                                            <div class="card-body d-flex justify-content-center align-items-center">
                                                                <div class="mx-auto d-block">
                                                                    <h5 class="text-sm-center mt-2 mb-1">Meeting Room5</h5>
                                                                    <div class="location text-sm-center"><i class="fa fa-map-marker"></i> Booked, Audit Dept</div>
                                                                    <div class="d-btn p-3 d-flex justify-content-center align-items-center">
                                                                        <button type="button" class="btn btn-success  btn-sm mr-2">List</button>
                                                                        <button type="button" class="btn btn-primary btn-sm mr-2 book-modal" data-toggle="modal" data-target="#booking-modal" data-id="2" data-value="Meeting Room5">Book</button>
                                                                        <button type="button" class="btn btn-danger btn-sm">Cancel</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="card card-border">
                                                            <div class="card-body d-flex justify-content-center align-items-center">
                                                                <div class="mx-auto d-block">
                                                                    <h5 class="text-sm-center mt-2 mb-1">Meeting Room6</h5>
                                                                    @if(isset($getMeetingRoom[3]) && $getMeetingRoom[3])
                                                                        <div class="location text-sm-center"><i class="fa fa-map-marker"></i> Meeting, {{ $getMeetingRoom[3]->department->name }}</div>
                                                                        <div class="location text-sm-center"><i class="fa-solid fa-clock"></i> {{ $getMeetingRoom[3]->time_in->format('H:i') }} - {{ $getMeetingRoom[3]->time_out->format('H:i') }}</div>
                                                                        <div class="d-btn p-3 d-flex justify-content-center align-items-center">
                                                                            <button type="button" class="btn btn-success  btn-sm mr-2">List</button>
                                                                        </div>
                                                                    @elseif(isset($getBookingRoom[3]) && $getBookingRoom[3])
                                                                        <div class="location text-sm-center"><i class="fa fa-map-marker"></i> Booked, {{ $getBookingRoom[3]->department->name }}</div>
                                                                        <div class="location text-sm-center"><i class="fa-solid fa-clock"></i> {{ $getBookingRoom[3]->time_in->format('H:i') }} - {{ $getBookingRoom[3]->time_out->format('H:i') }}</div>
                                                                        <div class="d-btn p-3 d-flex justify-content-center align-items-center">
                                                                            <button type="button" class="btn btn-success btn-sm mr-2">List</button>
                                                                            <button type="button" class="btn btn-danger btn-sm">Cancel</button>
                                                                        </div>
                                                                    @else
                                                                        <div class="location text-sm-center"><i class="fa fa-map-marker"></i> Available</div>
                                                                        <div class="d-btn p-3 d-flex justify-content-center align-items-center">
                                                                            <button type="button" class="btn btn-success  btn-sm mr-2">List</button>
                                                                            <button type="button" class="btn btn-primary btn-sm mr-2 book-modal" data-toggle="modal" data-target="#booking-modal" data-id="3" data-value="Meeting Room6">Book</button>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-2 mb-4 p-0">
                                                <div class="card card-border m-0">
                                                    <div class="card-body d-flex justify-content-center align-items-center">
                                                        <div class="mx-auto d-block">
                                                            <h3 class="text-center"><i class="fa-solid fa-chalkboard-user"></i></h3>
                                                            <h5 class="text-sm-center mt-2 mb-1"> Training Room</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-2 pl-0">
                                                <div class="row">
                                                    <div class="col-6 pr-0">
                                                        <div class="card card-border m-0">
                                                            <div class="card-body d-flex justify-content-center align-items-center p-0">
                                                                <div class="mx-auto d-block">
                                                                    <h3 class="text-center"><i class="fa-solid fa-house-laptop"></i></h3>
                                                                    <h5 class="text-sm-center mt-2 mb-1"> VP Room</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card card-border m-0">
                                                            <div class="card-body d-flex justify-content-center align-items-center">
                                                                <div class="mx-auto d-block">
                                                                    <h3 class="text-center"><i class="fa-solid fa-house-laptop"></i></h3>
                                                                    <h5 class="text-sm-center mt-2 mb-1"> VP Room</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 pl-0">
                                                        <div class="card card-border m-0">
                                                            <div class="card-body d-flex justify-content-center align-items-center p-0">
                                                                <div class="mx-auto d-block">
                                                                    <h3 class="text-center"><i class="fa-solid fa-house-laptop"></i></h3>
                                                                    <h5 class="text-sm-center mt-2 mb-1"> VP Room</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card card-border m-0">
                                                            <div class="card-body d-flex justify-content-center align-items-center">
                                                                <div class="mx-auto d-block">
                                                                    <h3 class="text-center"><i class="fa-solid fa-house-laptop"></i></h3>
                                                                    <h5 class="text-sm-center mt-2 mb-1"> VP Room</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-2 mb-4">
                                                <div class="card card-border">
                                                    <div class="card-body d-flex justify-content-center align-items-center">
                                                        <div class="mx-auto d-block">
                                                            <h3 class="text-center"><i class="fa-solid fa-person-walking-arrow-right"></i></h3>
                                                            <h5 class="text-sm-center mt-2 mb-1"> Enter</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-2 mb-4">
                                                <div class="card card-border">
                                                    <div class="card-body d-flex justify-content-center align-items-center">
                                                        <div class="mx-auto d-block">
                                                            <h3 class="text-center"><i class="fa-solid fa-server"></i></h3>
                                                            <h5 class="text-sm-center mt-2 mb-1"> Server Room</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>    
                                        </div>
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="card card-border">
                                                    <div class="card-body d-flex justify-content-center align-items-center">
                                                        <div class="mx-auto d-block">
                                                            <h3 class="text-center"><i class="fa-solid fa-building-user"></i></h3>
                                                            <h5 class="text-sm-center mt-2 mb-1"> Strategic Planning Dept, Channel Development Dept, Audit Dept, ICT Development Dept, Information Security Dept</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="card card-border">
                                                    <div class="card-body d-flex justify-content-center align-items-center">
                                                        <div class="mx-auto d-block">
                                                            <h5 class="text-sm-center mt-2 mb-1"><b>Conference Room</b></h5>
                                                            @if(isset($getMeetingRoom[4]) && $getMeetingRoom[4])
                                                                <div class="location text-sm-center"><i class="fa fa-map-marker"></i> Meeting, {{ $getMeetingRoom[4]->department->name }}</div>
                                                                <div class="location text-sm-center"><i class="fa-solid fa-clock"></i> {{ $getMeetingRoom[4]->time_in->format('H:i') }} - {{ $getMeetingRoom[4]->time_out->format('H:i') }}</div>
                                                                <div class="d-btn p-3 d-flex justify-content-center align-items-center">
                                                                     <button type="button" class="btn btn-success  btn-sm mr-2">List</button>
                                                                </div>
                                                            @elseif(isset($getBookingRoom[4]) && $getBookingRoom[4])
                                                                <div class="location text-sm-center"><i class="fa fa-map-marker"></i> Booked, {{ $getBookingRoom[4]->department->name }}</div>
                                                                <div class="location text-sm-center"><i class="fa-solid fa-clock"></i> {{ $getBookingRoom[4]->time_in->format('H:i') }} - {{ $getBookingRoom[4]->time_out->format('H:i') }}</div>
                                                                <div class="d-btn p-3 d-flex justify-content-center align-items-center">
                                                                    <button type="button" class="btn btn-success btn-sm mr-2">List</button>
                                                                    <button type="button" class="btn btn-danger btn-sm">Cancel</button>
                                                                </div>
                                                            @else
                                                                <div class="location text-sm-center"><i class="fa fa-map-marker"></i> Available</div>
                                                                <div class="d-btn p-3 d-flex justify-content-center align-items-center">
                                                                    <button type="button" class="btn btn-success  btn-sm mr-2">List</button>
                                                                    <button type="button" class="btn btn-primary btn-sm mr-2 book-modal" data-toggle="modal" data-target="#booking-modal" data-id="4" data-value="Conference Room">Book</button>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>    
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- /.row -->
                        </div>
                    </div><!-- /# column -->
                </div>
                <!--  /Traffic -->
                <div class="clearfix"></div>
                <!-- Modal - Calendar - Add New Event -->
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
                                        <input type="text" name="date" class="form-control" data-field="date" id="select-date-booking" value="{{ $date }}" readonly>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-6 col-sm-6 py-3">
                                    <label><span class="text-danger">*</span>Time In : </label>
                                    <select name="time_in" class="form-control" id="time-in">
                                        @foreach (Config::get('times') as $index => $value)
                                            <option value="{{ $value }}" @if($setTimeIn == $value) selected @endif>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-xl-6 col-sm-6 py-3">
                                    <label><span class="text-danger">*</span>Time Out : </label>
                                    <select name="time_out" class="form-control" id="time-out">
                                        @foreach (Config::get('times') as $index => $value)
                                            <option value="{{ $value }}" @if($setTimeOut == $value) selected @endif>{{ $value }}</option>
                                        @endforeach
                                    </select>
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
                                    <label><span class="text-danger">*</span>Perpose : </label>
                                    <textarea class="form-control" name="perpose" rows="4" cols="50" id="perpose" required></textarea>
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
                <!-- Modal - Calendar - Add Category -->
                <div class="modal fade none-border" id="add-category">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title"><strong>Add a category </strong></h4>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label">Category Name</label>
                                            <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name"/>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Choose Category Color</label>
                                            <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                                <option value="success">Success</option>
                                                <option value="danger">Danger</option>
                                                <option value="info">Info</option>
                                                <option value="pink">Pink</option>
                                                <option value="primary">Primary</option>
                                                <option value="warning">Warning</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- /#add-category -->
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

            $('#select-date-booking').datetimepicker({
                timepicker:false,
                format:'Y-m-d',
                formatDate:'Y-m-d',
                minDate:'-1970/01/01', // yesterday is minimum date
            });

            $(".book-modal").click(function(){
                $("#booker").val("");
                $("#perpose").val("");
                $("#room-name").val($(this).attr("data-value"));
                $("#room-id").val($(this).attr("data-id"));
            });

            $('#save').click(function(){
                var roomId = $("#room-id").val();
                var bookingDate = $("#select-date-booking").val();
                var bookingTimeIn = $("#time-in").val();
                var bookingTimeOut = $("#time-out").val();
                var booker = $("#booker").val();
                var departmentId = $("#department").val();
                var perpose = $("#perpose").val();
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

                if(perpose == "" || perpose == undefined){
                    alert("Plese Input Perpose");
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
                    perpose: perpose
                };
                var url = $("#url-store").val();
                $.ajax({
                    type:'POST',
                    url: url,
                    data: formData,
                    dataType: 'json',
                    success:function(data) {
                        alert("Booking successful")
                    }
                });
            })

            $(document ).ready(function() {
                $("#time_in_select").on('change', function(){
                    let getValue = $('#time_in_select').find(":selected").text();
                    let getOutId = $("#time_out_select option[value='"+getValue+"']").attr("id");
                    let result = getOutId.replace("timeOut-", "");
                    result = Number(result) + 1;
                    $("#time_out_select option[id=timeOut-"+result+"]").attr("selected", "selected");
                })
            });
            
        </script>
    </body>
</html>
