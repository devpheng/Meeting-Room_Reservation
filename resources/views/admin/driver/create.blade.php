@extends('admin.layouts.app')

@section('content')
<!-- Booking -->
<div class="Booking">
    <form id="update-room" action="{{ route('admin.driver.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header"><strong>Register Driver</strong></div>
                <div class="card-body card-block">
                    <div class="form-group">
                        <label for="name" class=" form-control-label">Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter your car name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('name')
                            <div class="text-danger">required</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone" class=" form-control-label">Phone</label>
                        <input type="text" id="phone" name="phone" placeholder="Enter your car phone" class="form-control @error('name') is-invalid @enderror" value="{{ old('phone') }}">
                        @error('phone')
                            <div class="text-danger">required</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status" class="form-control-label @error('name') is-invalid @enderror">Status</label>
                        <select id="status" name="status" class="form-control">
                            <option value="1" @if(old('status') == 1) selected @endif>Available</option>
                            <option value="2" @if(old('status') == 2) selected @endif>Unavailable</option>
                            <option value="3" @if(old('status') == 3) selected @endif>Resigned</option>
                        </select>
                        @error('status')
                            <div class="text-danger">required</div>
                        @enderror
                    </div>
                </div>
                <div class="card-text text-sm-center">
                        <button type="submit" class="btn btn-outline-primary m-3" id="save">Save</button>
                        <button type="button" class="btn btn-outline-danger m-3" id="cancel">Cancel</button>
                    </div>
            </div>
        </div>
        <!-- /.col-lg-12 -->
        {{-- <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-user"></i><strong class="card-title pl-2">Profile</strong>
                </div>
                <div class="card-body">
                    <div class="mx-auto d-block">
                        <img class="rounded-circle mx-auto d-block" src="{{ asset('/images/no-image.jpg')}}" alt="Card image cap" width="150px">
                        <div class="form-group">
                            <label for="image">Select Image</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                    </div>
                    <hr>
                    <div class="card-text text-sm-center">
                        <button type="submit" class="btn btn-outline-primary m-3" id="save">Save</button>
                        <button type="button" class="btn btn-outline-danger m-3" id="cancel">Cancel</button>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    </form>
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