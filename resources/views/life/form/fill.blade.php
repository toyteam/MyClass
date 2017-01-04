
@extends('common.layouts')




@section('content')

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
				 	<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">{{ $form_name }}</h3>
						</div><!-- /.box-header -->
						<div class="box-body">
							<form class="form-horizontal form-label-right" method="post" action="/life/form/submit">
								<?php 
									foreach($plugins as $value)
										echo $value;
								?>
								<div class="col-md-6 col-md-offset-3 text-center">
									<input class="btn btn-block btn-info" type="submit" name="submit" value="提交">
									<input type="hidden" name="form_id" value="{{ $form_id }}">
									<input type="hidden" name="_token"  value="{{csrf_token()}}"/>
								</div>
							</form>
						</div><!-- /.box-body -->
				 	</div><!-- /.box -->
				</div><!-- /.col -->
        	</div><!-- /.row -->
        </section><!-- /.content -->


@stop


