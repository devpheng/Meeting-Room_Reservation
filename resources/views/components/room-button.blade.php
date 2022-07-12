@if(isset($getRooms) && $getRooms)
    @if($checkSystemBooking == true && $getRooms['id'] == 1)
        <div class="card-body d-flex justify-content-center align-items-center card-body-bg-danger">
            <div class="mx-auto d-block">
                <h5 class="text-sm-center mt-2 mb-1">
                    <b>{{ $getRooms['name'] }}</b>
                </h5>
                <div class="location text-sm-center p-1">
                    <i class="fa-solid fa-users"></i> Meeting from 08:00 - 12:00, Top management meeting 
                </div>
                <div class="d-btn p-1 d-flex justify-content-center align-items-center">
                    <button type="button" class="btn btn-success  btn-sm mr-2" data-toggle="modal" data-target="#lists-room-modal-{{ $getRooms['id'] }}">View All Booking</button>
                </div>
            </div>
        </div>
    @elseif(($checkFinished || $checkMeetingFinished) && (isset($getBookingRoom) && $getBookingRoom && $getBookingRoom !== null))
        <div class="card-body d-flex justify-content-center align-items-center card-body-bg-danger">
            <div class="mx-auto d-block">
                <h5 class="text-sm-center mt-2 mb-1">
                    <b>{{ $getRooms['name'] }}</b>
                </h5>
                <div class="location text-sm-center p-1">
                    <i class="fa-solid fa-users-slash"></i> Meeting Finished, {{ $getBookingRoom->department->name }} ( {{ $getBookingRoom->time_in->format('H:i') }} - {{ $getBookingRoom->time_out->format('H:i') }} )
                </div>
                <div class="d-btn p-1 d-flex justify-content-center align-items-center">
                    <button type="button" class="btn btn-success  btn-sm mr-2" data-toggle="modal" data-target="#lists-room-modal-{{ $getRooms['id'] }}">View All Booking</button>
                </div>
            </div>
        </div>
    @elseif($checkFinished) 
        <div class="card-body d-flex justify-content-center align-items-center card-body-bg-danger">
            <div class="mx-auto d-block">
                <h5 class="text-sm-center mt-2 mb-1">
                    <b>{{ $getRooms['name'] }}</b>
                </h5>
                <div class="location text-sm-center p-1">
                    <i class="fa-solid fa-file-circle-xmark"></i> Can't book ( Time has passed )
                </div>
                <div class="d-btn p-1 d-flex justify-content-center align-items-center">
                    <button type="button" class="btn btn-success  btn-sm mr-2" data-toggle="modal" data-target="#lists-room-modal-{{ $getRooms['id'] }}">View All Booking</button>
                </div>
            </div>
        </div>
    @elseif(isset($getMeetingRoom) && $getMeetingRoom && $getMeetingRoom !== null) 
        <div class="card-body d-flex justify-content-center align-items-center card-body-bg-danger">
            <div class="mx-auto d-block">
                <h5 class="text-sm-center mt-2 mb-1">
                    <b>{{ $getRooms['name'] }}</b>
                </h5>
                <div class="location text-sm-center p-1">
                    <i class="fa-solid fa-users"></i> Meeting from {{ $getMeetingRoom->time_in->format('H:i') }} - {{ $getMeetingRoom->time_out->format('H:i') }}, {{ $getMeetingRoom->department->name }}
                </div>
                <div class="d-btn p-1 d-flex justify-content-center align-items-center">
                    <button type="button" class="btn btn-success  btn-sm mr-2" data-toggle="modal" data-target="#lists-room-modal-{{ $getRooms['id'] }}">View All Booking</button>
                </div>
            </div>
        </div>
    @elseif(isset($getBookingRoom) && $getBookingRoom && $getBookingRoom !== null) 
        <div class="card-body d-flex justify-content-center align-items-center card-body-bg-danger">
            <div class="mx-auto d-block">
                <h5 class="text-sm-center mt-2 mb-1">
                    <b>{{ $getRooms['name'] }}</b>
                </h5>
                @if($macAddr == $getBookingRoom->mac_adress) 
                    <div class="location text-sm-center p-1">
                        <i class="fa-solid fa-circle-check text-success"></i> Booked from {{ $getBookingRoom->time_in->format('H:i') }} - {{ $getBookingRoom->time_out->format('H:i') }}, {{ $getBookingRoom->department->name }}
                    </div>
                    <div class="d-btn p-1 d-flex justify-content-center align-items-center">
                        <button type="button" class="btn btn-success  btn-sm mr-2" data-toggle="modal" data-target="#lists-room-modal-{{ $getRooms['id'] }}">View All Booking</button>
                        <button type="button" class="btn btn-danger btn-sm btn-cancel-booking" data-id="{{ $getBookingRoom->id }}" data-value="{{ $getRooms['name'] }} ({{ $getBookingRoom->time_in->format('d-m-Y') }} {{ $getBookingRoom->time_in->format('H:i') }} - {{ $getBookingRoom->time_out->format('H:i') }})" data-toggle="modal" data-target="#cancel-booking-modal" data-backdrop="static" data-keyboard="false">Cancel</button>
                    </div>
                @else 
                    <div class="location text-sm-center p-1">
                        <i class="fa-solid fa-circle-xmark text-danger"></i> Booked from {{ $getBookingRoom->time_in->format('H:i') }} - {{ $getBookingRoom->time_out->format('H:i') }}, {{ $getBookingRoom->department->name }}
                    </div>
                    <div class="d-btn p-1 d-flex justify-content-center align-items-center">
                        <button type="button" class="btn btn-success  btn-sm mr-2" data-toggle="modal" data-target="#lists-room-modal-{{ $getRooms['id'] }}">View All Booking</button>
                    </div>
                @endif     
            </div>
        </div>
    @else 
        <div class="card-body d-flex justify-content-center align-items-center">
            <div class="mx-auto d-block">
                <h5 class="text-sm-center mt-2 mb-1">
                    <b>{{ $getRooms['name'] }}</b>
                </h5>
                <div class="location text-sm-center p-1">
                    <i class="fa-solid fa-file-circle-check"></i> Available from {{ $setTimeIn }} - {{ $setTimeOut }} 
                </div>
                <div class="d-btn p-1 d-flex justify-content-center align-items-center">
                    <button type="button" class="btn btn-success  btn-sm mr-2" data-toggle="modal" data-target="#lists-room-modal-{{ $getRooms['id'] }}">View All Booking</button>
                    <button type="button" class="btn btn-primary btn-sm mr-2 book-modal" data-toggle="modal" data-target="#booking-modal" data-id="{{ $getRooms['id'] }}" data-value="{{ $getRooms['name'] }}">Book</button>
                </div>
            </div>
        </div>
    @endif
@endif