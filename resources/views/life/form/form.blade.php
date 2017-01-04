
@extends('common.layouts')

@section('MyCss')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('AdminLTE2')}}/plugins/datatables/dataTables.bootstrap.css">
@stop




@section('content')

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
				 	<div class="box">
						<div class="box-header">
							<h3 class="box-title">已建表格</h3>
							<!-- <a href="/manage/user/import_users">批量添加人员</a> -->
						</div><!-- /.box-header -->
						<div class="box-body">
							<table id="user_info" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>表格名称</th>
										<th>表格介绍</th>
										<th>表格创建者</th>
										<th>表格创建时间</th>
										<th>状态</th>
									</tr>
								</thead>
								<tbody>
									@foreach($forms as $key => $value)
									<tr>
										<td><a href="/life/form/fill?formid={{ $value->id }}">{{$value->form_title}}</a></td>
										<td>{{$value->form_detail}}</td>
										<td>{{$value->user_name}}</td>
										<td>{{date('Y-m-d H:i:s', $value->form_create_time)}}</td>
										<td>
										@if($value->user_form_data == null)
											<label class="label label-danger">未填</label>
										@else
											<label class="label label-success">已填</label>
										@endif
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div><!-- /.box-body -->
				 	</div><!-- /.box -->
				</div><!-- /.col -->
        	</div><!-- /.row -->
        </section><!-- /.content -->


@stop



@section('MyJavascript')
<!-- DataTables -->
<script src="{{asset('AdminLTE2')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('AdminLTE2')}}/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- page script -->
<script>
	$(function () {
		$('#user_info').DataTable({
			"paging": true,
			"lengthChange": true,
			"processing":true,
			"searching": true,
			"ordering": true,
			"info": false,
			"autoWidth": true,
                            "deferRender": true,
			"language": {
			        "sProcessing": "处理中...",
			        "sLengthMenu": "显示 _MENU_ 项结果",
			        "sZeroRecords": "没有匹配结果",
			        "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
			        "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
			        "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
			        "sInfoPostFix": "",
			        "sSearch": "搜索:",
			        "sUrl": "",
			        "sEmptyTable": "表中数据为空",
			        "sLoadingRecords": "载入中...",
			        "sInfoThousands": ",",
			        "oPaginate": {
			            "sFirst": "首页",
			            "sPrevious": "上页",
			            "sNext": "下页",
			            "sLast": "末页"
			        },
			        "oAria": {
			            "sSortAscending": ": 以升序排列此列",
			            "sSortDescending": ": 以降序排列此列"
			        }
			}
		});
	});
</script>
@stop