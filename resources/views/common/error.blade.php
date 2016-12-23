
@if (count($errors))
@foreach($errors->all() as $error)
<p style="color:red;">{{$error}}</p>
@endforeach
@endif