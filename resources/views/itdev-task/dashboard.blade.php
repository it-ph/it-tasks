
@extends('itdev-task.layout')

@section('content')
    <section id="main-container">
        <h2>Welcome Back, {{ Auth::user()->name }}!</h2>

        {{-- <a href="" class="btn btn-primary mb-4 mt-4" data-toggle="modal" data-target="#create_taskModal">Add New Task</a> --}}

        @include('itdev-task.task.create')

        {{-- <div class="card-deck "> --}}
        <div class="card-deck mt-5">
            @foreach ($stats as $stat)
                <div class="card">
                    <div class="card-header" style="background :#003B5D; color:white; font-weight:bold">{{ strtoUpper($stat->status_name) }}
                        <a class="close" style="color :white">
                            {{--<span>
                                @if($loop->index < $ctr->count())
                                    {{ $ctr[$loop->index]->c }}
                                @else
                                    {{ 0 }}
                                @endif
                            </span>
                             <span>{{ App\Task::where('status_id',$stat->id)->count() }}</span> --}}
                            <span>{{ DB::table('tasks')->where('status_id',$stat->id)->count() }}</span>
                        </a>
                    </div>
                    <div class="card-body">
                            <ul class="list-group">
                                @foreach ($tasks as $task)
                                    @if($stat->id == $task->status_id)
                                        <li class="list-group-item col-md-12">
                                            <div class="row">
                                                <div class="col-md-10">{{ $task->task_name }}</div>
                                                {{-- <div class="col-md-2">
                                                <i style="padding: 3px; color: #003B5D" class="btn btn-sm fa fa-pencil" data-toggle="modal" data-target="#editModal-{{$task->id}}"></i>
                                                <i style="padding: 3px; color:#DC3545" class="btn btn-sm fa fa-times" data-toggle="modal" data-target="#deleteModal-{{$task->id}}"></i>
                                                </div> --}}
                                            </div>

                                        </li>

                                        @include('itdev-task.task.edit')
                                        @include('itdev-task.task.delete')

                                        <hr style="margin: 1px">
                                    @endif
                                @endforeach
                            </ul>
                    </div>
                        {{-- <div class="card-footer">
                            <i class="fa fa-user"></i>
                            <i class="fa fa-user"></i>
                        </div> --}}
                </div>
            @endforeach

            @if($overdues->count() > 0)
            <div class="card">
                <div class="card-header" style="background :#003B5D; color:white; font-weight:bold">{{ strtoUpper('Overdue') }}
                    <a class="close" style="color :white;">
                        <span>{{ $ctr_overdue }}</span>
                    </a>
                </div>
                <div class="card-body">
                        <ul class="list-group">
                            @foreach ($overdues as $overdue)
                                    <li class="list-group-item">
                                        {{ $overdue->task_name }}
                                    </li>
                                    <hr style="margin: 1px">
                            @endforeach
                        </ul>
                </div>
            </div>
            @endif

        </div>
    </section>

@endsection
