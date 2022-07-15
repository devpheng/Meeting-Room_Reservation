@extends('admin.layouts.app')

@section('content')
<!-- Booking -->
<div class="Booking">
    <form id="update-room" action="{{ route('admin.car.update') }}" method="POST" enctype="multipart/form-data">
    <input type="hidden" id="id" name="id" value="{{ $car->number }}">
    @csrf
    <div class="row">
        <div class="col-xl-8">
             
                <div class="card">
                    <div class="card-header"><strong>Edit Car</strong></div>
                    <div class="card-body card-block">
                        <div class="form-group">
                            <label for="number" class=" form-control-label">Number</label>
                            <input type="text" id="number" name="number" placeholder="Enter your car number" class="form-control" value="{{ $car->number }}">
                            @error('number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="model" class=" form-control-label">Model</label>
                            <input type="text" id="model" name="model" placeholder="Enter your car model" class="form-control" value="{{ $car->model }}">
                            @error('model')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="driver" class=" form-control-label">Driver Name</label>
                            <select name="driver_id" id="driver" name="driver_id" class="form-control">
                                <option value="0">Please select</option>
                                @foreach($drivers as $key => $value)
                                    <option value="{{ $key }}" @if ($car->driver->name == $value) selected @endif>{{ $value }}</option>
                                @endforeach
                            </select>
                            @error('driver_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="plat_number" class=" form-control-label">Plat Number</label>
                            <input type="text" id="plat_number" name="plat_number" placeholder="Enter your car plat number" class="form-control" value="{{ $car->plat_number }}">
                            @error('plat_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="capacity" class=" form-control-label">Capacity</label>
                            <input type="number" id="capacity" name="capacity" placeholder="Enter your car capacity" class="form-control" value="{{ $car->capacity }}">
                            @error('capacity')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image" class=" form-control-label">Image</label>
                            <input type="file" id="image" name="image" class="form-control-file">
                            <img src="{{ asset('storage/files/'.$car->image) }}" id="preview-image" class="img-thumbnail" style="max-width: 300px"/>
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header"><strong>Work Schedule</strong></div>
                    <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col">
                                <div class="form-group">
                                    <label for="working_time_from" class=" form-control-label">Working Time From</label>
                                    <select name="working_time_from" id="working_time_from" class="form-control">
                                        <option value="7:30" @if ($car->working_time_from == '7:30') selected @endif>7:30</option>
                                        @for ($i = 7; $i < 20; $i++)
                                            <option value="{{ $i }}:00" @if ($car->working_time_from == $i . ':00') selected @endif>{{ $i }}:00</option>
                                        @endfor
                                    </select>
                                    @error('working_time_from')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="working_time_to" class=" form-control-label">Working Time To</label>
                                    <select name="working_time_to" id="working_time_to" class="form-control">
                                        @for ($i = 8; $i < 20; $i++)
                                            <option value="{{ $i }}:00" @if ($car->working_time_to == $i . ':00') selected @endif>{{ $i }}:00</option>
                                        @endfor
                                    </select>
                                    @error('tuesday_from')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="rest_day" class=" form-control-label">Rest Day</label>
                                    <select name="rest_day" id="rest_day" class="form-control">
                                        <option value="saturday" @if ($car->rest_day == 'saturday') selected @endif>Saturday</option>
                                        <option value="sunday" @if ($car->rest_day == 'sunday') selected @endif>Sunday</option>
                                    </select>
                                    @error('rest_day')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
        </div> 
        <!-- /.col-lg-12 -->
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header"><strong>Work Schedule</strong></div>
                <div class="card-body card-block">
                    <button type="submit" class="btn btn-outline-primary m-3" id="save">Edit</button>
                    <button type="button" class="btn btn-outline-danger m-3" id="cancel">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    </form>
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

                        $('#image').change(function(){
                            
                            let reader = new FileReader();
                            reader.onload = (e) => { 
                            $('#preview-image').attr('src', e.target.result); 
                            }
                            reader.readAsDataURL(this.files[0]); 
                        
                        });
                    })
            </script>
        @endpush
@endsection