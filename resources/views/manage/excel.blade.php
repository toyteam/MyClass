@extends('common.layouts')

@section('content')
<a href="/download/model.xls">excel模板下载</a>

<form method="POST" action="/excel/importUsers" enctype="multipart/form-data">
	{{ csrf_field() }}
         <h3>导入Excel表：</h3><input  type="file" name="excel_users" />
         @include('common.error')
           <input type="submit"  value="导入" />
</form>
@stop