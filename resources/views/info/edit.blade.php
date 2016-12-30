@extends('common.layouts')

@section('content')

<form method="POST" action="{{ url('info/edit') }}">
              <!-- About Me Box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">个人信息</h3>
                </div><!-- /.box-header -->
                <div class="box-body">

                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $user_info->id }}">

                  <strong><i class="fa fa-id-card margin-r-5"></i>学号</strong>
                  <p class="text-muted">{{ $user_info->user_sno }}</p>

                  <hr>

                  <strong><i class="fa fa-user margin-r-5"></i> 姓名</strong>
                  <p class="text-muted">{{ $user_info->user_name }}</p>

                  <hr>

                  <strong><i class="fa fa-phone margin-r-5"></i> 手机</strong>
                  <input class="form-control" type="text" name="user_phone" value="{{ old('user_phone')?old('user_phone'):$user_info->user_phone }}">

                  <hr>

                  <strong><i class="fa fa-qq margin-r-5"></i> QQ</strong>
                  <input class="form-control" type="text" name="user_qq" value="{{ old('user_qq')?old('user_qq'):$user_info->user_qq }}">

                  <hr>

                  <strong><i class="fa fa-envelope-o margin-r-5"></i> 电子邮箱</strong>
                  <input class="form-control" type="text" name="user_email" value="{{ old('user_email')?old('user_email'):$user_info->user_email }}">


                  <hr>

                  <strong><i class="fa fa-map-marker margin-r-5"></i> 邮编</strong>
                  <input class="form-control" type="text" name="user_postcode" value="{{ old('user_postcode')?$old('user_postcode'):$user_info->user_postcode }}">


                  <hr>

                  <strong><i class="fa fa-map-marker margin-r-5"></i> 家庭住址</strong>
                  <input class="form-control" type="text" name="user_address" value="{{ old('user_address')?old('user_address'):$user_info->user_address }}">

                </div><!-- /.box-body -->
                <dir class="box box-footer">
                		<button type="submit" class="btn btn-primary" style="text-align: center"> 修改</button>
                </dir>
              </div><!-- /.box -->

</form>

@stop
