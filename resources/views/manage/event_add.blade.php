@extends('manage.index')

@section('content')

<form method="POST" action="">
{{ csrf_field() }}
<table>
	<tr>
		<td>event name</td>
		<td><input type="text" name="event_name"></td>
	</tr>
	<tr>
		<td>event cols' names</td>
		<td><input type="text" name="cols_name" placeholder="format: col1:col2:..."></td>
	</tr>
</table>
<input type="submit" name="submit">
</form>

@stop