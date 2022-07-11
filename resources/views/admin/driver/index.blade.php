@extends('admin.layouts.app')

@section('content')
<!-- Booking -->
<div class="Booking">
    @if(session()->has('message'))
        <div class="alert alert-success"> {{ session('message') }} </div>
    @endif
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">List Drivers</h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                        <th>NAME</th>
                                        <th>PHONE</th>
                                        <th>STATUS</th>
                                        <th>ACTION</th>
                                    </tr>
                                    </thead>
                                        <tbody>
                                            @foreach($drivers as $key => $value)
                                            <tr>
                                                <td class="serial">{{ $key + 1 }}</td>
                                                <td> {{ $value->name }}</td>
                                                <td> {{ $value->phone }}</td>
                                                <td> {{ $value->getStatus() }}</td>
                                                <td>
                                                    <a href="{{ route('admin.driver.edit', $value->id) }}" class="btn btn-outline-primary btn-sm btn-update"><i class="fa-solid fa-file-pen"></i>&nbsp; Edit</a>
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
        @push('scripts')
            <script>
                    jQuery(document).ready(function($) {
                        $('.btn-update').click(function(){
                            $('#room-update-modal').modal({
                                backdrop: 'static',
                                keyboard: false
                            });
                            $('#room-id').val($(this).attr('data-id'));
                            $('#room-name').val($(this).attr('data-value'));
                        })
                    })
            </script>
        @endpush
@endsection