@extends('common.layouts')

@section('content')
	<style type="text/css">
		.must{
			padding-left: 1.5em;
			padding-right: 1.5em;
		}
		.background-white{
			background-color: #ffffff;
			height: auto;
			margin: 0.5em;
			padding: 1.5em;
			border-radius: 7px;
		}
		.btn-block-group{
			padding-top: 1.5em;
			padding-bottom: 1.5em; 
		}
		.modal-content{
			border-radius: 7px;
		}
		.label-m{
			height: 34px;
			padding: 6px 12px;
		}

		
	</style>
	<div class="row" style="padding-left: 1.5em; padding-right: 1.5em; ">
		<div class="text-center">
			<div class="col-md-7 col-sm-5 background-white text-center">
				<h1>表格预览</h1>
				<div class="col-md-12 col-sm-12">
					<br /><br /><br />
					<form class="form-horizontal form-label-left" method="post">
						<div id="form-show"></div>
						<div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3">
							<input class="btn btn-primary btn-lg btn-block" type="submit" name="submit" value="创建">
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 background-white text-center">
				<h1>添加插件</h1>
				<div class="col-md-12 col-sm-12 col-xs-12 plugin-btn-group">
					@foreach($plugins as $plugin)
					<div class="form-group">
						<button class="btn btn-lg btn-default btn-block btn-block-add" value="{{ $plugin->id }}">添加{{ $plugin->plugin_name }}</button>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="form-info" class="form-horizontal form-label-left">
					<div id="modal-content"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" id="close" data-dismiss="modal">关闭</button>
						<button type="button" class="btn btn-primary" id="create">添加</button>
					</div>
					<input type="hidden" name="_token" value="{{csrf_token()}}">
				</form>
			</div>
		</div>
		<button id="modal-btn" class="hidden" data-toggle="modal" data-target="#myModal"></button>
	</div>
	<input type="hidden" id="data" name="data" value="">
	<script>
		$(document).ready(function() {
			$('.btn-block-add').click(function(e) {
				$.ajax({
					type: "GET",
					url: '/manage/form/getpluginset?plugin='+$(e.target).val(),
					async: false,
					error: function(request) {
					    alert("插件不存在！");
					},
					success: function(data) {
						$('#modal-content').html(data);
						$('#modal-btn').click();
					}
				});
			});
			$('#create').click(function() {
				$.ajax({
					type: "POST",
					url: '/manage/form/getplugin',
					data: $('#form-info').serializeArray(),
					async: false,
					error: function(request) {
					    alert("Connection error");
					},
					success: function(data) {
						$('#close').click();
					    $('#form-show').append(data[0]);
					    $('#data').val($('#data').val()+"%%@@"+data[1]);
					}
				});

			});
		});
	</script>
@stop