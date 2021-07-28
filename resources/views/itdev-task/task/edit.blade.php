{{-- Edit Task Modal --}}

<!-- Modal -->
<div class="modal fade" id="editModal-{{ $task->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header" style="background :#003B5D">
        <h5 class="modal-title" style="color :white">Edit Task</h5>
        <button type="button" class="close" data-dismiss="modal" style="color :white"  aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">

            <form action="{{ route('task.update',$task->id) }}" method="POST" id="editTask" >
                @csrf
                @method('PUT')

                {{-- <div class="form-group">
                    <label>Type: </label>
                    <select name="type_id" id="type_id" class="form-control">
                        <option disabled>-- Select Type --</option>
                        <option value="">Infrastructure</option>
                        <option value="">Deskside</option>
                        <option value="">App Dev</option>
                    </select>
                </div> --}}

                <div class="form-group">
                    <label>Type: </label>
                    <select name="type_id" id="type_id" class="form-control">
                        <option disabled>-- Select Type --</option>
                        @foreach ($types as $type)
                            <option @if($type->id == $task->type_id) selected @endif value="{{ $type->id }}">{{ $type->type_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Task Name: </label>
                    <input type="text" class="form-control" value="{{ $task->task_name }}" name="task_name" id="task_name-{{ $task->id}}" placeholder="Enter Task Name" autocomplete="off">
                </div>

                <div class="form-group">
                    <label>Product Owner: </label>
                    <input type="text" class="form-control" value="{{ $task->product_owner }}" name="product_owner" id="product_owner" placeholder="Enter Product Owner" autocomplete="off">
                </div>

                <div class="form-group">
                    <label>Start Date: </label>
                    <input type="date" class="form-control" value="{{ $task->start_date }}" name="start_date" id="start_date">
                </div>

                <div class="form-group">
                    <label>Target Completion: </label>
                    <input type="date" class="form-control" value="{{ $task->target_completion }}" name="target_completion" id="target_completion">
                </div>

                <div class="form-group">
                    <label>Status: </label>
                    <select name="status_id" id="status_id" class="form-control">
                        <option disabled>-- Select Status --</option>
                        @foreach ($stats as $stat)
                            <option @if ($stat->id == $task->status_id) selected @endif value="{{ $stat->id }}">{{ $stat->status_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Remarks: </label>
                    <textarea name="remarks" id="remarks" class="form-control" autocomplete="off">{{ $task->remarks }}</textarea>
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
