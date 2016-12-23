@extends('manage.index')

@section('content')


<a href="{{url('manage/event_add')}}">add an event</a>

<table border="">
	<tr>
		<th>event name</th>
		<th>operation</th>
		<th colspan="20">event cols' names</th>
	</tr>
	@foreach($events as $event)
	<tr>
		<td>{{$event->event_name}}</td>
		<td><a href='{{ url("manage/delete/$event->event_id") }}'>delete</a></td>
		@foreach($event->col_name as $col_name)
		<td>{{$col_name}}</td>
		@endforeach
	</tr>
	@endforeach
</table>

@stop