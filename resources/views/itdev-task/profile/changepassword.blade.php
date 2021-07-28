
@extends('itdev-task.layout')

@section('content')
    <div id="main-container">
        <h2 class="mb-4 ml-2">My Profile</h2>

        @include('itdev-task.notification.sucess')
        @include('itdev-task.notification.warning')
        @include('itdev-task.notification.error')

        <div class="row">

            <div class="col-md-9">

                <form action="/profile/{{ Auth::user()->id }}" method="POST">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form-group col-md-6">
                        <label>Password</label>
                        <input type="password" class="form-control" name = "new_password" placeholder="Input New Password">
                    </div>
                    <div class="form-group col-md-2">
                        <button type="submit" class="btn btn-primary form-control"><i class='bx bx-save' ></i> Update</button>
                    </div>
                </form>
            </div>

        </div>

            @include('itdev-task.status.create')
    </div>
@endsection
