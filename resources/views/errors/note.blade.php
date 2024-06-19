@if (Session::has('error'))
    <p class="alert alert-danger" style="font-family:Arial, Helvetica, sans-serif">{{Session::get('error')}}</p>
@endif

@foreach ($errors->all() as $error)
    <p class="alert alert-danger">{{$error}}</p>
@endforeach