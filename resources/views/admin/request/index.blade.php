.@extends('admin.layouts.app')
<link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/datatables.min.css') }}"/>
@section('content')
<!-- Booking -->
<div class="Booking">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="box-title">Lists Stationery  </h2>
                    @if(session()->has('message'))
                        <div class="alert alert-success"> {{ session('message') }} </div>
                    @endif
                    @if(session()->has('message_error'))
                        <div class="alert alert-danger"> {{ session('message_error') }} </div>
                    @endif
                    {{-- <div class="pt-4">
                        <a class="btn btn-success" style="color: white" href="{{ route('admin.stationery.create') }}">Add New</a>
                    </div> --}}
                </div>
                <div class="card-body">
                    <div class="table-stats ov-h">
                        <a href="javascript:void(0)" class="btn btn-success mb-4" id="btn-export-daily">Export Daily Report</a>
                        <table class="table" id="request">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th>Request By</th>
                                    <th>IP Address</th>
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
                                                <td> {{ $request->ip_address }}</td>
                                                <td> {{ $request->department->name }}</td>
                                                <td> {{ $request->stationery->code }}</td>
                                                <td> {{ $request->quantity . " " . $request->stationery->quantity}}</td>
                                                <td> {{ $request->created_at }} </td>
                                                <td>
                                                    @if ($request->approved_at == '' && $request->deleted_at == '')
                                                        <a href="{{ route('admin.request.approve', ['id' => $request->id]) }}" class="btn btn-outline-success">Approved</a>
                                                        <a href="{{ route('admin.request.cancel', ['id' => $request->id, 'stock' => $request->quantity]) }}" class="btn btn-outline-danger">Cancel</a>
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
            <script type="text/javascript" src="{{ asset('/assets/js/xlsx.full.min.js') }}"></script>
            <script src="{{ asset('/assets/js/datatables.min.js') }}"></script>
            <script>
                jQuery(document).ready(function($) {
                    $('#request').DataTable();

                    $('#btn-export-daily').on('click', function() {
                        // var data = {
                        //     'username': $("#keyword_type").val() == "username" ? ($("#keyword").val().length > 0 ? $("#keyword").val() : null) : null,
                        //     'dateRange': $('input[name="date-range"]').val() == '' ? null : $('input[name="date-range"]').val()
                        // }
                        var data = {};
                        $.getJSON('{{ route('admin.request.daily') }}',
                            data,
                            function(data) {
                                var createXLSLFormatObj = [];

                                /* XLS Head Columns */
                                var xlsHeader = ["No.", "Department", "Description/Code", "Quantity"];

                                /* XLS Rows Data */
                                // var xlsRows = data.data.activities;

                                createXLSLFormatObj.push(xlsHeader);
                                $.each(data, function(index, value) {
                                    var innerRowData = [];
                                    var columns = [index+1, value.name, value.code, value.total];
                                    $.each(columns, function(ind, val) {
                                        innerRowData.push(val);
                                    });
                                    createXLSLFormatObj.push(innerRowData);
                                });


                                /* File Name */
                                var filename = "Daily Stationery Usage.xlsx";

                                /* Sheet Name */
                                var ws_name = "Sheet1";

                                var wb = XLSX.utils.book_new(),
                                ws = XLSX.utils.aoa_to_sheet(createXLSLFormatObj);

                                /* Add worksheet to workbook */
                                XLSX.utils.book_append_sheet(wb, ws, ws_name);

                                /* Write workbook and Download */
                                XLSX.writeFile(wb, filename);
                            });
                    });
                });
            </script>
        @endpush
@endsection