@extends('admin.layouts.app')

@section('content')
<!-- Booking -->
<div class="Booking">
    <form id="update-room" action="{{ route('admin.car.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xl-8">
             
                <div class="card">
                    <div class="card-header"><strong>Register Car</strong></div>
                    <div class="card-body card-block">
                        <div class="form-group">
                            <label for="name" class=" form-control-label">Name</label>
                            <input type="text" id="name" name="name" placeholder="Enter your car name" class="form-control">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="brand" class=" form-control-label">Brand</label>
                            <input type="text" id="brand" name="brand" placeholder="Enter your car brand" class="form-control">
                            @error('brand')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="driver" class=" form-control-label">Driver Name</label>
                            <select name="driver_id" id="driver" name="driver_id" class="form-control">
                                <option value="0">Please select</option>
                                @foreach($drivers as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            @error('driver_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="plat_number" class=" form-control-label">Plat Number</label>
                            <input type="text" id="plat_number" name="plat_number" placeholder="Enter your car plat number" class="form-control">
                            @error('plat_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="capacity" class=" form-control-label">Capacity</label>
                            <input type="number" id="capacity" name="capacity" placeholder="Enter your car capacity" class="form-control">
                            @error('capacity')
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
                                    <label for="city" class=" form-control-label">Monday</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="city" class=" form-control-label">Tuesday</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="city" class=" form-control-label">Wednesday</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="city" class=" form-control-label">Thursday</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="city" class=" form-control-label">Friday</label>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col">
                                <div class="form-group">
                                    <label for="monday_from" class=" form-control-label">Time From</label>
                                    <input type="text" id="monday_from" name="monday_from" placeholder="Monday From" class="form-control">
                                    @error('monday_from')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="tuesday_from" class=" form-control-label">Time From</label>
                                    <input type="text" id="tuesday_from" name="tuesday_from" placeholder="Tuesday From" class="form-control">
                                    @error('tuesday_from')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="wednesday_from" class=" form-control-label">Time From</label>
                                    <input type="text" id="wednesday_from" name="wednesday_from" placeholder="Wednesday From" class="form-control">
                                    @error('wednesday_from')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="thursday_from" class=" form-control-label">Time From</label>
                                    <input type="text" id="thursday_from" name="thursday_from" placeholder="Thursday From" class="form-control">
                                    @error('thursday_from')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="friday_from" class=" form-control-label">Time From</label>
                                    <input type="text" id="friday_from" placeholder="Friday From" class="form-control">
                                    @error('friday_from')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col">
                                <div class="form-group">
                                    <label for="monday_to" class=" form-control-label">To</label>
                                    <input type="text" id="monday_to" name="monday_to" placeholder="Monday To" class="form-control">
                                    @error('monday_to')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="tuseday_to" class=" form-control-label">To</label>
                                    <input type="text" id="tuseday_to" name="tuseday_to" placeholder="Tuesday To" class="form-control">
                                    @error('tuseday_to')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="wednesday_to" class=" form-control-label">To</label>
                                    <input type="text" id="wednesday_to" name="wednesday_to" placeholder="Wednesday To" class="form-control">
                                    @error('wednesday_to')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="thursday_to" class=" form-control-label">To</label>
                                    <input type="text" id="thursday_to" name="thursday_to" placeholder="Thursday To" class="form-control">
                                    @error('thursday_to')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="friday_to" class=" form-control-label">To</label>
                                    <input type="text" id="friday_to" name="friday_to" placeholder="Friday To" class="form-control">
                                    @error('friday_to')
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
                    <button type="submit" class="btn btn-outline-primary m-3" id="save">Save</button>
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
                    })
            </script>
        @endpush
@endsection