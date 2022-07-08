
@extends('admin.layouts.app')
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
@section('content')
@if(session()->has('message-cancel'))
    <div class="alert alert-success"> {{ session('message-cancel') }} </div>
@endif
<!-- Animated -->
<div class="animated fadeIn">
    <!-- Widgets  -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-1">
                            <i class="fa-solid fa-house-lock"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="count">{{ $countAllBooking }}</span></div>
                                <div class="stat-heading">All Booking</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-five">
                        <div class="stat-icon dib flat-color-2">
                            <i class="fa-solid fa-house-lock"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-text"><span class="count">{{ $countTodayBooking }}</span></div>
                                    <div class="stat-heading">Today Booking</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-3">
                                <i class="fa-solid fa-building-user"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{ $countDepartment }}</span></div>
                                    <div class="stat-heading">Total Department</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-4">
                                <i class="fa-solid fa-person-shelter"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count">{{ $countRoom }}</span></div>
                                    <div class="stat-heading">Total Room</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Widgets -->
    </div>
    <!-- .animated -->
    <!-- Booking -->
    <div class="Booking">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Lists Booking ( {{ $currentDate->format('d M Y') }} ) </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th class="serial">#</th>
                                        <th>ROOM NAME</th>
                                        <th>TIME IN</th>
                                        <th>TIME OUT</th>
                                        <th>BOOKING BY</th>
                                        <th>DEPARTMENT</th>
                                        <th>PURPOSE</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($getTodayBooking as $key => $value)
                                    <tr>
                                        <td class="serial">{{ $key + 1 }}</td>
                                        <td> {{ $value->room->name }}</td>
                                        <td> {{ $value->time_in->format('H:i') }}</td>
                                        <td> {{ $value->time_out->format('H:i') }}</td>
                                        <td> {{ $value->booker }}</td>
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
                                    @if($getRoom && ($getDay == 'Tue' || $getDay == 'Thu'))
                                    <tr>
                                        <td class="serial">{{ count($getTodayBooking) + 1 }}</td>
                                        <td> {{ $getRoom->name }}</td>
                                        <td> 8:00</td>
                                        <td> 12:00</td>
                                        <td> SYSTEM</td>
                                        <td> - </td>
                                        <td>
                                            AUTO BOOKING
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-outline-success btn-sm" disabled><i class="fa-solid fa-circle-minus"></i>&nbsp;On Meeting</button>
                                        </td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div> <!-- /.card -->
            </div>  <!-- /.col-lg-12 -->
        </div>
    </div>
    <!-- /.Booking -->
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
    @push('scripts')
    <script>
    jQuery(document).ready(function($) {
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
        
        