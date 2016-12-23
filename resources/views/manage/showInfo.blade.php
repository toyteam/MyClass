@extends('manage.index')

@section('content')

@foreach($data as $item)
<h4>{{current($item)->event_name}}</h4>
<table>
	<th>学号</th>
	<th>姓名</th>
	@if(isset(current($item)->data))
	@foreach(json_decode(current($item)->data) as $col_name => $col_content)
	<th>
		{{$col_name}}
	</th>
	@endforeach
	@endif
	@foreach($item as $cols)
		<tr>
		<td>{{$cols->stu_sno}}</td>
		<td>{{$cols->stu_name}}</td>
		@if(isset($cols->data))
		@foreach(json_decode($cols->data) as $col_content)
		<td>
			{{$col_content}}
		</td>
		@endforeach
		@endif
		</tr>
	@endforeach
</table>
@endforeach

@stop