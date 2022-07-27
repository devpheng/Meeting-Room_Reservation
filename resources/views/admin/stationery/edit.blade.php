@extends('admin.layouts.app')

@section('content')
<!-- Booking -->
<div class="Booking">
    <form id="update-room" action="{{ route('admin.stationery.update') }}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="{{ $stationery->id }}" />
    @csrf
    <div class="row">
        <div class="col-xl-12">
             
                <div class="card">
                    <div class="card-header"><strong>Update Stationery</strong></div>
                    <div class="card-body card-block">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="code" class=" form-control-label">Code</label>
                                    <input type="text" id="code" name="code" placeholder="Enter stationery code" class="form-control" value="{{ $stationery->code }}">
                                    @error('code')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="quantity" class=" form-control-label">Quantity</label>
                                    <input type="text" id="quantity" name="quantity" placeholder="Enter stationery quantiry" class="form-control" value="{{ $stationery->quantity }}">
                                    @error('quantity')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="remark" class=" form-control-label">Remark</label>
                                    <input type="text" id="remark" name="remark" placeholder="Enter remark" class="form-control" value="{{ $stationery->remark }}">
                                    @error('remark')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="stock" class=" form-control-label">Total Stock Remain</label>
                                    <input type="number" id="stock" name="stock" placeholder="Enter total stock remain" class="form-control" value="{{ $stationery->stock }}">
                                    @error('stock')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="image" class=" form-control-label">Photo</label>
                                    <input type="file" id="image" name="image" class="form-control-file">
                                    
                                    @if ($stationery->image == null)
                                        <img src="{{ asset('storage/files/images/no.jpg') }}" id="preview-image" class="img-thumbnail" style="max-width: 300px"/>
                                    @else
                                        <img src="{{ asset('storage/files/'.$stationery->image) }}" id="preview-image" class="img-thumbnail" style="max-width: 300px"/>
                                    @endif
                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        

                        <button type="submit" class="btn btn-outline-primary m-3" id="save">Save</button>
                        <a href="{{ route('admin.stationery.index') }}" class="btn btn-outline-danger m-3" id="cancel">Cancel</a>
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
                        // $('.btn-update').click(function(){
                        //     $('#room-update-modal').modal({
                        //         backdrop: 'static',
                        //         keyboard: false
                        //     });
                        //     $('#room-id').val($(this).attr('data-id'));
                        //     $('#room-name').val($(this).attr('data-value'));
                        // })

                        // $('#image').change(function(){
                            
                        //     let reader = new FileReader();
                        //     reader.onload = (e) => { 
                        //     $('#preview-image').attr('src', e.target.result); 
                        //     }
                        //     reader.readAsDataURL(this.files[0]); 
                        
                        // });

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