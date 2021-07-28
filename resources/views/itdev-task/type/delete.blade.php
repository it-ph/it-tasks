{{-- Delete Type Modal --}}

<!-- Modal -->
<div class="modal fade" id="deleteModal-{{ $type->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header" style="background :#003B5D">
        <h5 class="modal-title" style="color :white">Delete Type</h5>
        <button type="button" class="close" data-dismiss="modal" style="color :white" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">

            <form action="{{ route('type.destroy',$type->id) }}" method="POST" id="deleteType">
                @csrf
                @method('DELETE')
                <input type="hidden" name="_method" value="DELETE">
                <p>Are you sure you want to delete this type?</p>
        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </form>
    </div>
    </div>
</div>
