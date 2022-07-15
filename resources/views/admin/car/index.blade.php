@extends('admin.layouts.app')

@section('content')
<!-- Booking -->
<div class="Booking">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">List Cars  </h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                        <th>Model</th>
                                        <th>Seats</th>
                                        <th>Driver</th>
                                        <th>Plate Number</th>
                                        <th>Working Time From</th>
                                        <th>Working Time To</th>
                                        <th>Rest Day</th>
                                        <th>Photo</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                        <tbody>
                                            @foreach($cars as $key => $value)
                                            <tr>
                                                <td class="serial">{{ $value->number }}</td>
                                                <td> {{ $value->model }}</td>
                                                <td> {{ $value->capacity }}</td>
                                                <td> {{ $value->driver->name }}</td>
                                                <td> {{ $value->plat_number }}</td>
                                                <td> {{ $value->working_time_from }}</td>
                                                <td> {{ $value->working_time_to }}</td>
                                                <td> {{ $value->rest_day }}</td>
                                                <td> 
                                                    <img src="{{ asset('storage/files/'.$value->image) }}" style="max-width: 120px"/>
                                                </td>
                                                <td>
                                                    <a class="btn btn-outline-primary btn-sm btn-update" href="{{ route('admin.car.edit', $value->id) }}"><i class="fa-solid fa-file-pen"></i>&nbsp; Edit</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div> <!-- /.table-stats -->
                            </div>
                        </div> <!-- /.card -->
                    </div>  <!-- /.col-lg-12 -->
                </div>
            </div>
        <!-- /.Booking -->
        <!-- Modal - Calendar - Add New Event -->
        <div class="modal fade none-border" id="room-update-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="update-room" action="{{ route('admin.room.update') }}" method="POST">
                    @csrf
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"><strong>Update</strong></h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value="" id="room-id"/>
                            <input class="form-control" type="text" name="name" value="" id="room-name"/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success save-event waves-effect waves-light">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /#event-modal -->
        @push('scripts')
        @endpush
@endsection