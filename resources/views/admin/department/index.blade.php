@extends('admin.layouts.app')

@section('content')
<style>
    table {
        width: 100%;
        border-spacing: 0;
        max-height: 60vh;
    }

    thead, tbody, tr, th, td { display: block; }

    thead tr {
        /* fallback */
        width: 97%;
        /* minus scroll bar width */
        width: -webkit-calc(100% - 16px);
        width:    -moz-calc(100% - 16px);
        width:         calc(100% - 16px);
    }

    tr:after {  /* clearing float */
        content: ' ';
        display: block;
        visibility: hidden;
        clear: both;
    }

    tbody {
        height: 60vh;
        max-height: 60vh
        overflow-y: auto;
        overflow-x: hidden;
    }

    tbody td, thead th {
        width: 50%;  /* 19% is less than (100% / 5 cols) = 20% */
        float: left;
    }
</style>
<div class="row">
    <div class="col-lg-4 col-12">
        <div class="card">
            <div class="card-header">
                <strong><i class="fa fa-plus-circle"></i> Add/Update Department</strong>
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
                            <small class="form-text text-muted d-none" id="require">Please enter department</small>
                        </div>
                    </div>

                    <button type="button" class="btn btn-outline-primary float-right" id="action-tag">Add Department</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-12">
        <div class="card">
            <div class="card-header">
                <strong><i class="fa fa-tags"></i> Departments</strong>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                          <th scope="col" data-sort="asc">Department <i class="fas fa-caret-down"></i></th>
                          <th scope="col" data-sort="asc">Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($departments as $department)
                        <tr data-id="{{ $department->id }}">
                            <td class="align-middle">
                                <span class="tag-name">{{ $department->name }}</span>
                            </td>
                            <td>
                                <div class="action-box">
                                    <a href="javascript:void(0)" class="btn btn-primary edit">Edit</a>
                                    <a href="javascript:void(0)"  data-id="{{ $department->id }}" class="btn btn-danger delete">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
       
    </div>
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

<!-- Modal HTML -->
<div id="delete-modal" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="fa fa-times"></i>
                </div>				
                <h4 class="modal-title">Are you sure?</h4>
            </div>
            <div class="modal-body">
                <p>Do you really want to delete this department? This process cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger btn-ok">Delete</button>
            </div>
        </div>
    </div>
</div>   

@push('scripts')
    <script>
        var routes = {
                department: {
                    store: "{{ route('department.store') }}",
                    update: "{{ route('department.update', ['department' => '1']) }}"
                }
            };
    </script>
    <script src="{{ asset('/js/department.js') }}" defer></script>
@endpush
@endsection
