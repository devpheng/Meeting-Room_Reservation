@extends('admin.layouts.app')
@push('styles')
<link rel="stylesheet" href="{{ asset('/assets/npm/date-time-picker/jquery.datetimepicker.css') }}">
<style>
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
</style>
@endpush
@section('content')
<!-- Booking -->
@if(session()->has('message-cancel'))
    <div class="alert alert-success"> {{ session('message-cancel') }} </div>
@endif
<div class="Booking">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form id="search-booking" action="{{ route('admin.booking.index') }}" method="GET">
                        <div class="row">
                            <div class="col-6 col-md-6 col-xl-2 py-3">
                                <label>DATE </label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar-days"></i></div>
                                    <input type="text" name="date" class="form-control" data-field="date" id="date-booking" value="{{ $sDate ?? '' }}">
                                    <button type="button" class="btn btn-outline-secondary btn-sm d-none" id="clear"><i class="fa-solid fa-xmark"></i></button>
                                </div>
                            </div>
                            <div class="col-6 col-md-6 col-xl-2 py-3">
                                <label>ROOM </label>
                                <select name="room" id="room_select" class="form-control">
                                    <option disabled selected value> -- select an option -- </option>
                                    @foreach ($rooms as $index => $value)
                                        <option value="{{ $value->id }}" id="timeIn-{{ $value->id }}" @if($sRoom == $value->id) selected @endif>{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6 col-md-6 col-xl-2 py-3">
                                <label>DEPARTMENT </label>
                                <select name="department" id="department_select" class="form-control">
                                    <option disabled selected value> -- select an option -- </option>
                                    @foreach ($department as $index => $value)
                                        <option value="{{ $value->id }}" id="timeIn-{{ $value->id }}" @if($sRoom == $value->id) selected @endif>{{ $value->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6 col-md-6 col-xl-2 py-3">
                                <label>BOOKER </label>
                                <input class="form-control" type="text" name="booker" value="{{ $sBooker ?? ''}}" />
                            </div>
                            <div class="col-6 col-md-6 col-xl-2 py-3">
                                <label>SEARCH BOOKING</label>
                                <button type="submit" class="btn btn-primary btn-search btn-sm form-control" style="width:150px"><i class="fa-solid fa-magnifying-glass"></i>&nbsp; SEARCH</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Lists Booking</h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th>ROOM NAME</th>
                                    <th>DATE</th>
                                    <th>TIME IN</th>
                                    <th>TIME OUT</th>
                                    <th>BOOKER</th>
                                    <th>IP Address</th>
                                    <th>DEPARTMENT</th>
                                    <th>PURPOSE</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings as $key => $value)
                                    <tr>
                                        <td class="serial">{{ ($bookings->currentPage()-1) * $bookings->perPage() + $loop->index + 1 }}</td>
                                        <td> {{ $value->room->name }}</td>
                                        <td> {{ $value->time_in->format('d-m-Y') }}</td>
                                        <td> {{ $value->time_in->format('H:i') }}</td>
                                        <td> {{ $value->time_out->format('H:i') }}</td>
                                        <td> {{ $value->booker }}</td>
                                        <td> {{ $value->mac_adress }}</td>
                                        <td> {{ $value->department->name }}</td>
                                        <td>
                                            {{ $value->purpose }}
                                        </td>
                                        <td>
                                            @if($value->checkTimeStatus())
                                                <button type="button" class="btn btn-outline-danger btn-sm btn-cancel-booking" data-id="{{ $value->id }}" data-value="The Meeting at {{ $value->room->name }} on {{ $value->time_in->format('d-m-Y') }} from {{ $value->time_in->format('H:i') }} to {{ $value->time_out->format('H:i') }} " data-toggle="modal" data-target="#cancel-booking-modal" data-backdrop="static" data-keyboard="false"><i class="fa-solid fa-circle-minus"></i>&nbsp;Cancel</button>
                                            @elseif($value->checkMeetingTime())
                                                <button type="button" class="btn btn-outline-success btn-sm" disabled><i class="fa-solid fa-circle-minus"></i>&nbsp;On Meeting</button>
                                            @else
                                                <button type="button" class="btn btn-outline-secondary btn-sm" disabled><i class="fa-solid fa-circle-minus"></i>&nbsp;Meeting Finished</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- /.table-stats -->
                    <div class="d-flex justify-content-end p-4">
                        {{ $bookings->links() }}
                    </div>
                </div>
            </div> <!-- /.card -->
        </div>  <!-- /.col-lg-12 -->
    </div>
</div>
<!--Model Cancel Booking-->
<div class="container">
    <div class="row">
        <div class="modal fade" id="cancel-booking-modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <form class="float-right m-0" method="post" action="{{ route('admin.booking.delete') }}">
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
<!--Model Cancel Booking-->
<!-- /.Booking -->
@push('scripts')
<!-- Scripts -->
<script src="{{ asset('/assets/npm/date-time-picker/jquery.js') }}"></script>
<script src="{{ asset('/assets/npm//bootstrap@4.1.3/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/assets/npm/date-time-picker/moment.js') }}"></script>
<script src="{{ asset('/assets/npm/date-time-picker/build/jquery.datetimepicker.full.min.js') }}"></script>
<script>
jQuery(document).ready(function($) {
    $('#date-booking').datetimepicker({
        timepicker:false,
        format:'Y-m-d',
        formatDate:'Y-m-d'
    });
    $('#clear').click(function() {
        $("#date-booking").datetimepicker({
        });
    })

    $('.btn-cancel-booking').on('click', function(){
        $('#cancel-id').val("");
        $('#cancel-notice').html("");
        $('#cancel-notice').html($(this).attr('data-value'));
        $('#cancel-id').val($(this).attr('data-id'))
    });
})
</script>
@endpush
@endsection