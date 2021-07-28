@if(Session::has('with_warning'))
    <div class="alert alert-warning">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('with_warning') }}</i>
    </div>
@endif
