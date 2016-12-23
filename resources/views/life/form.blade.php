
@extends('common.layouts')

@section('content')
<p>请填写下列信息!<b>请一张表一张表地提交!</b></p>

@include('common.error')

@foreach($events as $event)
<form method="post" action="{{ url('/')}}">
	{{csrf_field()}}

	<p>{{ $event->event_name }}</p>
	<input type="text" name="event_id" value="{{$event->event_id}}" hidden="hidden">
	<input type="text" name="stu_sno" placeholder="学号" value="{{ old('stu_sno') }}">
	<input type="text" name="stu_name" placeholder="姓名"  value="{{ old('stu_name') }}">
	@foreach($event->col_name as $col_name)
	<input type="text" name="data[{{$col_name}}]" placeholder="{{$col_name}}" value="{{ old('data')[$col_name]}}">
	@endforeach
	<input type="submit" name="submit">	
</form>
@endforeach

@stop
