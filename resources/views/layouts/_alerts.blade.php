@if (Session::has('success'))
    <p class="alert alert-success">
        {{ Session::get('success') }}
    </p>
@endif
@if (Session::has('danger'))
    <p class="alert alert-danger">
        {{ Session::get('danger') }}
    </p>
@endif