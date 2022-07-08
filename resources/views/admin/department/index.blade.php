@extends('admin.layouts.app')

@section('content')
<style>
    
</style>
<div class="row">
    <div class="col-lg-4 col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="box-title"><i class="fa fa-plus-circle"></i> Add / Edit Department </h4>
            </div>
            <div class="card-body">
                <form action="#" method="post" class="form-horizontal">
                    @csrf
                    <input type="hidden" name="id" id="id"/>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="name" class="form-control-label">Department</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="name" name="name" placeholder="Enter Department" class="form-control">
                            <small class="form-text d-none text-danger" id="require">Please enter department</small>
                        </div>
                    </div>

                    <button type="button" class="btn btn-outline-primary float-right" id="action-tag">Add Department</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="box-title"><i class="fa-solid fa-building"></i> List Departments </h4>
            </div>
            <div class="card-body--">
                <div class="table-stats order-table ov-h">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th class="serial">#</th>
                                <th scope="col" data-sort="asc">DEPARTMENT NAME</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($departments as $key => $value)
                            <tr data-id="{{ $value->id }}">
                                <td class="serial">{{ ($departments->currentPage()-1) * $departments->perPage() + $loop->index + 1 }}</td>
                                <td class="align-middle"><span class="tag-name">{{ $value->name }}</span></td>
                                <td>
                                    <div class="action-box">
                                        <button type="button" class="btn btn-outline-primary btn-sm edit"><i class="fa-solid fa-file-pen"></i>&nbsp; Edit</button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- /.table-stats -->
                <div class="d-flex justify-content-end p-4">
                    {{ $departments->links() }}
                </div>
            </div>
        </div> <!-- /.card -->
    </div>  <!-- /.col-lg-12 -->
</div>
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel"><i class="fa fa-info"></i> Information</h5>
            </div>
            <div class="modal-body">
                <p></p>
            </div>
        </div>
    </div>
</div>   

@push('scripts')
    <script>
        var routes = {
                department: {
                    store: "{{ route('admin.department.store') }}",
                    update: "{{ route('admin.department.update', ['department' => '1']) }}"
                }
            };
    </script>
    <script src="{{ asset('/js/department.js') }}" defer></script>
@endpush
@endsection
