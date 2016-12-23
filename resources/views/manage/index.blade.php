<!DOCTYPE html>
<html>
<head>
	<title>manage</title>
</head>
<body>
<a href="{{url('manage/viewAll')}}">view all tables</a>
<br />
<a href="{{url('manage/whoNotFill')}}">view who do not fill forms</a>
<br />
<a href="{{url('manage/event')}}">manage events</a>
<br />
<hr />
@section('content')

@show

</body>
</html>