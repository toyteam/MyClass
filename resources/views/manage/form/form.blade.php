
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
							<a href="#" id="create_form">创建表格</a>
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
										<th>操作</th>
									</tr>
								</thead>
								<tbody>
									@foreach($forms as $key => $value)
									<tr>
										<td>{{$value->form_title}}</td>
										<td>{{$value->form_detail}}</td>
										<td>{{$value->user_name}}</td>
										<td>{{date('Y-m-d H:i:s', $value->form_create_time)}}</td>
										<td>
											<a title="删除" href="/manage/form/deleteform?formid={{ $value->id }}"><li class="fa fa-remove"></li>删除</a>
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

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="form-info" class="form-horizontal form-label-left" method="post" action="/manage/form/create">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							&times;
						</button>
						<h4 class="modal-title" id="myModalLabel">
							创建表格
						</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-4">表格标题</label>
							<div class="col-md-9 col-sm-9 col-xs-8">
								<input type="text" name="form_title" class="form-control" placeholder="请输入表格标题">
							</div>
							<br><br>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-4">表格介绍</label>
							<div class="col-md-9 col-sm-9 col-xs-8">
								<textarea type="text" name="form_detail" class="form-control" placeholder="请输入表格介绍"></textarea>
							</div>
							<br><br>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" id="close" data-dismiss="modal">关闭</button>
						<button type="submit" class="btn btn-primary" id="create">添加</button>
					</div>
					<input type="hidden" name="_token" value="{{csrf_token()}}">
				</form>
			</div>
		</div>
		<button id="modal-btn" class="hidden" data-toggle="modal" data-target="#myModal"></button>
	</div>

    <div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="form-info" class="form-horizontal form-label-left" method="post" action="/manage/form/edit">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							&times;
						</button>
						<h4 class="modal-title" id="myModalLabel">
							创建表格
						</h4>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-4">表格标题</label>
							<div class="col-md-9 col-sm-9 col-xs-8">
								<input id="edit-form-title" type="text" name="form_title" class="form-control" placeholder="请输入表格标题">
							</div>
							<br><br>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-4">表格介绍</label>
							<div class="col-md-9 col-sm-9 col-xs-8">
								<textarea id="edit-form-detail" type="text" name="form_detail" class="form-control" placeholder="请输入表格介绍"></textarea>
							</div>
							<br><br>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" id="close" data-dismiss="modal">关闭</button>
						<button type="submit" class="btn btn-primary" id="create">编辑</button>
					</div>
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<input id="edit-form-id" type="hidden" name="formid" value="">
				</form>
			</div>
		</div>
		<button id="modal-btn-edit" class="hidden" data-toggle="modal" data-target="#myModalEdit"></button>
	</div>

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
	$('#create_form').click(function(){
		$('#modal-btn').click();
	});

	$('.edit').click(function(e){
		$.ajax({
			type: "GET",
			url: '/manage/form/getforminfo?formid='+$(e.target).val(),
			async: false,
			error: function(request) {
			    alert("表格不存在！");
			},
			success: function(data) {
				console.log(data[0]);
				$('#edit-form-title').val(data[0]['form_title']);
				$('#edit-form-detail').val(data[0]['form_detail']);
				$('#edit-form-id').val(data[0]['id']);
				$('#modal-btn-edit').click();
			}
				});
		// $('#form-edit-title')
	});
</script>
@stop