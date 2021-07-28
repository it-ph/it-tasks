
@extends('itdev-task.layout')

@section('content')
    <div id="main-container">
        <h2 class="mb-4 ml-2">Tasks</h2>
        <div class="row">
            <div class="col-md-12">
                <a href="" class="btn btn-primary mb-4" data-toggle="modal" data-target="#create_taskModal">Add New Task</a>
                @include('itdev-task.notification.sucess')
                @include('itdev-task.notification.error')
                <div class="table-responsive">
                    <table id="taskTable" class="table table-striped table-bordered table-hover">
                        <thead style="background :#003B5D; color:white">
                            <tr>
                                <th style="display: none">ID</th>
                                {{-- <th>Team</th> --}}
                                <th>Type</th>
                                <th>Task Name</th>
                                <th>Product Owner</th>
                                <th>Start Date</th>
                                <th>Target Completion</th>
                                <th>Status</th>
                                <th>Remarks</th>
                                <th width="100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td style="display: none">{{ $task->id }}</td>
                                    {{-- <td>{{ $task->task_name }}</td> --}}
                                    <td>
                                        @if($task->thetype)
                                            {{ $task->thetype->type_name }}
                                        @endif
                                    </td>
                                    <td>{{ $task->task_name }}</td>
                                    <td>{{ $task->product_owner }}</td>
                                    <td>{{ $task->start_date }}</td>
                                    <td>{{ $task->target_completion }}</td>
                                    <td>
                                        @if($task->thestat)

                                            <span>{{ $task->thestat->status_name }}</span>
                                            {{-- @if ($task->thestat->id == '1')
                                                <span class="badge btn btn-success">{{ $task->thestat->status_name }}</span>
                                            @elseif ($task->thestat->id == '2')
                                                <span class="badge btn btn-primary">{{ $task->thestat->status_name }}</span>
                                            @elseif ($task->thestat->id == '3')
                                                <span class="badge btn btn-warning">{{ $task->thestat->status_name }}</span>
                                            @elseif ($task->thestat->id == '4')
                                                <span class="badge btn btn-danger">{{ $task->thestat->status_name }}</span>
                                            @else
                                                <span class="badge btn btn-dark">{{ $task->thestat->status_name }}</span>
                                            @endif --}}
                                        @endif
                                    </td>
                                    <td>{{ $task->remarks }}</td>
                                    <td>
                                        {{-- <div class="btn-group">
                                            <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                            </button>
                                            <div class="dropdown-menu">
                                                <center><a href="#" class="btn btn-warning btn-sm fa fa-pencil-square-o" data-toggle="modal" data-target="#editModal-{{$task->id}}">&nbsp;Edit</a>
                                                <a href="#" class="btn btn-danger btn-sm fa fa-trash-o" data-toggle="modal" data-target="#deleteModal-{{$task->id}}">&nbsp;Delete</a></center>
                                            </div>
                                        </div> --}}
                                        <a href="#" class="btn btn-warning btn-sm fa fa-pencil" data-toggle="modal" data-target="#editModal-{{$task->id}}"></a>
                                        <a href="#" class="btn btn-danger btn-sm fa fa-times" data-toggle="modal" data-target="#deleteModal-{{$task->id}}"></a>
                                    </td>
                                </tr>
                                {{-- include in @foreach --}}
                                @include('itdev-task.task.edit')
                                @include('itdev-task.task.delete')
                            @endforeach
                        </tbody>
                    </table>
                    {{-- {{ $tasks->links() }} --}}
                </div>
            </div>
        </div>

            @include('itdev-task.task.create')

    </div>

@endsection
