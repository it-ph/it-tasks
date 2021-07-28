{{-- Add New Status Modal --}}

<!-- Modal -->
<div class="modal fade" id="create_statusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header" style="background :#003B5D">
        <h5 class="modal-title" style="color :white">Add New Status</h5>
        <button type="button" class="close" data-dismiss="modal" style="color :white" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">

            <form action="{{ route('status.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Status: </label>
                    <input type="text" class="form-control" name="status" placeholder="Enter Status" autocomplete="off">
                </div>

        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
    </div>
    </div>
</div>
