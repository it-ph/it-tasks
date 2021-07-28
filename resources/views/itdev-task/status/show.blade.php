
@extends('itdev-task.layout')

@section('content')
    <div id="main-container">
        <h2 class="mb-4 ml-2">Task Status</h2>

        <div class="row">
            <div class="col-md-12">

            <a href="" class="btn btn-primary mb-4" data-toggle="modal" data-target="#create_statusModal">Add New Status</a>
                @include('itdev-task.notification.sucess')
                @include('itdev-task.notification.warning')
                @include('itdev-task.notification.error')
                <div class="table-responsive">
                    <table id="statusTable" class="table table-striped table-bordered table-hover">
                        <thead style="background :#003B5D; color:white">
                            <tr>
                                <th style="display: none">ID</th>
                                <th>Task Status</th>
                                <th width="100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stats as $stat)
                                <tr>
                                    <td style="display: none">{{ $stat->id }}</td>
                                    <td>{{ $stat->status_name }}</td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm fa fa-pencil" data-toggle="modal" data-target="#editModal-{{ $stat->id }}"></a>
                                        <a href="#" class="btn btn-danger btn-sm fa fa-times" data-toggle="modal" data-target="#deleteModal-{{ $stat->id }}"></a>
                                    </td>
                                </tr>

                                @include('itdev-task.status.edit')
                                @include('itdev-task.status.delete')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

            @include('itdev-task.status.create')
    </div>
@endsection
