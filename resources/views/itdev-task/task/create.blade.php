{{-- Add New Task Modal --}}

<!-- Modal -->
<div class="modal fade" id="create_taskModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header" style="background :#003B5D">
        <h5 class="modal-title" style="color :white">Add New Status</h5>
        <button type="button" class="close" data-dismiss="modal" style="color :white" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">

            <form action="{{ route('task.store') }}" method="POST">
                @csrf
                {{-- <div class="form-group">
                    <label>IT Team: </label>
                    <select id="type" name=type class="form-control">
                        <option disabled selected>-- Select Team --</option>
                            <option value="">Infrastructure</option>
                            <option value="">Deskside</option>
                            <option value="">App Dev</option>
                    </select>
                </div> --}}
                <div class="form-group">
                    <label>Type: </label>
                    <select id="type" name=type class="form-control">
                        <option disabled selected>-- Select Type --</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Task Name: </label>
                    <input type="text" class="form-control" name="task_name" placeholder="Enter Task" autocomplete="off">
                </div>
                <div class="form-group">
                    <label>Product Owner: </label>
                    <input type="text" class="form-control" name="product_owner" placeholder="Enter Product Owner" autocomplete="off">
                </div>
                <div class="form-group">
                    <label>Start Date: </label>
                    <input type="date" class="form-control" name="start_date">
                </div>
                <div class="form-group">
                    <label>Target Completion: </label>
                    <input type="date" class="form-control" name="target_completion">
                </div>
                <div class="form-group">
                    <label>Status: </label>
                    <select id="status" name=status class="form-control">
                        <option disabled selected>-- Select Status --</option>
                            @foreach ($stats as $stat)
                                <option value="{{ $stat->id }}">{{ $stat->status_name }}</option>
                            @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Remarks: </label>
                    <textarea class="form-control" name="remarks" cols="30" rows="3" placeholder="Enter remarks here..." autocomplete="off"></textarea>
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
