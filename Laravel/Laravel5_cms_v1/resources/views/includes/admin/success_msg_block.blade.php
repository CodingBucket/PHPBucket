@if(Session::has('success'))
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4> Success!</h4>
        <p><b>{{ Session::get('success') }}</b></p>
    </div>
@endif

