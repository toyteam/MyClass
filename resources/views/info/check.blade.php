@extends('common.layouts')

@section('content')

              <!-- About Me Box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">个人信息</h3>
                </div><!-- /.box-header -->
                <div class="box-body">

                  <strong><i class="fa fa-id-card margin-r-5"></i>学号</strong>
                  <p class="text-muted">{{ $user_info->user_sno }}</p>

                  <hr>

                  <strong><i class="fa fa-user margin-r-5"></i> 姓名</strong>
                  <p class="text-muted">{{ $user_info->user_name }}</p>

                  <hr>

                  <strong><i class="fa fa-phone margin-r-5"></i> 手机</strong>
                  <p class="text-muted">
                    {{ $user_info->user_phone }}
                  </p>

                  <hr>

                  <strong><i class="fa fa-qq margin-r-5"></i> QQ</strong>
                  <p class="text-muted">{{ $user_info->user_qq }}</p>

                  <hr>

                  <strong><i class="fa fa-envelope-o margin-r-5"></i> 电子邮箱</strong>
                  <p class="text-muted">{{ $user_info->user_email }}</p>

                  <hr>

                  <strong><i class="fa fa-map-marker margin-r-5"></i> 邮编</strong>
                  <p class="text-muted">{{ $user_info->user_postcode }}</p>

                  <hr>

                  <strong><i class="fa fa-map-marker margin-r-5"></i> 家庭住址</strong>
                  <p class="text-muted">{{ $user_info->user_address }}</p>

                  <hr>

                  <strong><i class="fa fa-calendar margin-r-5"></i> 上一次登录时间</strong>
                  <p class="text-muted">{{ date('Y-m-d H:i:s',session()->get('user_latest_login_time')) }}</p>

                  <hr>

                  <strong><i class="fa fa-map-marker margin-r-5"></i> 上一次登录ip</strong>
                  <p class="text-muted">{{ session()->get('user_latest_ip') }}</p>

                </div><!-- /.box-body -->
              </div><!-- /.box -->


@stop
