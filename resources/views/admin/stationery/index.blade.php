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
                    <div class="pt-4">
                        <a class="btn btn-success" style="color: white" href="{{ route('admin.stationery.create') }}">Add New</a>
                        <a class="btn btn-primary" style="color: white" href="javascript:void(0)" id="btn-export-monthly">Export monthly report</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-stats order-table ov-h">
                        <table class="table" id="stationery">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th>Code</th>
                                    <th>Quantity</th>
                                    <th>Total Stock Remain</th>
                                    <th>Remark</th>
                                    <th>Add Stock Date</th>
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
                                                <td> {{ $stationery->remark }}</td>
                                                <td> {{ $stationery->AdditionStock->last() == null ? '' : $stationery->AdditionStock->last()->created_at }}</td>
                                                <td>
                                                    <a class="btn btn-outline-success btn-sm btn-add" data-id="{{ $stationery->id }}" data-code="{{ $stationery->code }}">Add Stock</a>
                                                    <a href="{{ route('admin.stationery.edit', ['id' => $stationery->id]) }}" class="btn btn-outline-primary btn-sm btn-update"><i class="fa-solid fa-file-pen"></i>&nbsp; Edit</a>
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
        <div class="modal fade none-border" id="stock-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="add-stock" action="{{ route('admin.stationery.add') }}" method="POST">
                    @csrf
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"><strong id="code"></strong></h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="id" value="" id="stationery-id"/>
                            <label for="stock">Add Stock</label>
                            <input class="form-control" type="text" name="stock" value="0" id="stock"/>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success save-event waves-effect waves-light">Add</button>
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
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
                        $('#stationery').DataTable();


                        $('body').on('click', '.btn-add', function(){
                            $('#stock-modal').modal({
                                backdrop: 'static',
                                keyboard: false
                            });
                            $('#stationery-id').val($(this).attr('data-id'));
                            $('#code').text($(this).attr('data-code'));
                        });


                        $('#btn-export-monthly').on('click', function() {
                            // var data = {
                            //     'username': $("#keyword_type").val() == "username" ? ($("#keyword").val().length > 0 ? $("#keyword").val() : null) : null,
                            //     'dateRange': $('input[name="date-range"]').val() == '' ? null : $('input[name="date-range"]').val()
                            // }
                            var data = {};
                            $.getJSON('{{ route('admin.stationery.monthly') }}',
                                data,
                                function(data) {
                                    var createXLSLFormatObj = [];

                                    /* XLS Head Columns */
                                    var xlsHeader = ["No.", "Description/Code", "Stock Quantity", "Addition Stock Quantity", "Quantity", "New Stock (Date)", "Total Stock Quantity", "Stock Used (Previous Month)", "Total Stock Remain", "Remark", "Amount Request Last 3 Month"];

                                    /* XLS Rows Data */
                                    var xlsRows = data;

                                    createXLSLFormatObj.push(xlsHeader);
                                    $.each(data, function(index, value) {
                                        var innerRowData = [];
                                        var stock_used = value.stock_used == null ? 0 : value.stock_used;
                                        var total_stock_quantity = parseInt(value.stock) + parseInt(stock_used);
                                        var addition_stock = value.addition == null ? 0 : value.addition;
                                        var stock_quantity = total_stock_quantity - addition_stock;
                                        var date = value.created_at == null ? " " : value.created_at;
                                        var new_stock_date = date.split(" ")[0];
                                        var columns = [index+1, value.code, stock_quantity, addition_stock, value.quantity, new_stock_date, total_stock_quantity, parseInt(stock_used), value.stock, value.remark, value.last_3_month];
                                        $.each(columns, function(ind, val) {
                                            innerRowData.push(val);
                                        });
                                        createXLSLFormatObj.push(innerRowData);
                                    });


                                    /* File Name */
                                    var filename = "Monthly Stationery Usage.xlsx";

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