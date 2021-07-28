
@extends('itdev-task.layout')

@section('content')
    <div id="main-container">
        <h2 class="mb-4 ml-2">Overdue Tasks</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="taskTable" class="table table-striped table-bordered table-hover">
                        <thead style="background :#003B5D; color:white">
                            <tr>
                                <th style="display: none">ID</th>
                                <th>Type</th>
                                <th>Task Name</th>
                                <th>Product Owner</th>
                                <th>Start Date</th>
                                <th>Target Completion</th>
                                <th>Status</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($overdues as $overdue)
                                <tr>
                                    <td style="display: none">{{ $overdue->id }}</td>
                                    <td>
                                        @if($overdue->thetype)
                                            {{ $overdue->thetype->type_name }}
                                        @endif
                                    </td>
                                    <td>{{ $overdue->task_name }}</td>
                                    <td>{{ $overdue->product_owner }}</td>
                                    <td>{{ $overdue->start_date }}</td>
                                    <td>{{ $overdue->target_completion }}</td>
                                    <td>
                                        @if($overdue->thestat)
                                            <span>{{ $overdue->thestat->status_name }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $overdue->remarks }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
