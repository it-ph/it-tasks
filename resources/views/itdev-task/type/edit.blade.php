{{-- Edit Type Modal --}}

<!-- Modal -->
<div class="modal fade" id="editModal-{{ $type->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header" style="background :#003B5D">
        <h5 class="modal-title" style="color :white">Edit Type</h5>
        <button type="button" class="close" data-dismiss="modal" style="color :white" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            
            <form action="{{ route('type.update',$type->id) }}" method="POST" id="editType" >
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Type: </label>
                    <input type="text" class="form-control" name="type" id="type" value="{{ $type->type_name }}" placeholder="Enter Type" autocomplete="off">
                </div>
        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
    </div>
    </div>
</div>
