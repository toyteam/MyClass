
@extends('common.layouts')

@section('MyCss')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('AdminLTE2')}}/plugins/datatables/dataTables.bootstrap.css">
@stop






@section('content')

<div class="modal fade" id="import_users" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">批量添加人员</h4>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <div class="col-md-3">
                  <a href="/download/model.xls"><button class="btn btn-default">excel模板下载</button></a>
                </div>
                <div class="col-md-9">
                    <form method="POST" action="{{url('excel/importUsers')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input id="excel_users" name="excel_users" type="file" style="display:none">
                    <span class="input-group-addon" onclick="$('input[id=excel_users]').click();" style="cursor: pointer; "><i class="fa fa-folder-open"></i>选择文件</span>
                    <input id="photoCover" class="form-control" type="submit">
                  </form>
                </div>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">人员信息</h3>
                  <a href="/manage/user/import_user">添加人员</a>
                  <a href="#import_users" data-toggle="modal">批量添加人员</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="user_info" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>学号</th>
                        <th>姓名</th>
                        <th>权限</th>
                        <th>所在班级</th>
                        <th>最后一次登录时间</th>
                        <th>操作</th>
                      </tr>
                    </thead>
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
			        },
			},
                            "ajax": '{{ url("manage/user/userinfo") }}',
                            "aoColumns":[
                                    {"mDataProp": "user_sno"},
                                    {"mDataProp": "user_name"},
                                    {"mDataProp": "role_name"},
                                    {"mDataProp": "class_name"},
                                    {"mDataProp": "user_latest_login_time"},
                                    {"mDataProp": "operations"},
                                ],
		});
	});
</script>
@stop