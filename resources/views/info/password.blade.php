@extends('common.layouts')

@section('content')

<form method="POST" action="{{ url('info/password_edit') }}">
              <!-- About Me Box -->
              <div class="box box-primary">
                <div class="box-body">
                  {{ csrf_field() }}
                  <input type="hidden" name="id" value="{{  session()->get('user_info')->id }}">

                  <strong><i class="fa fa-key margin-r-5"></i> 原密码</strong>
                  <input class="form-control" type="password" name="user_origin_pw">

                  <hr>

                  <strong><i class="fa fa-key margin-r-5"></i> 新密码</strong>
                  <input class="form-control" type="password" name="user_new_pw">

                  <hr>

                  <strong><i class="fa fa-key margin-r-5"></i> 确认密码</strong>
                  <input class="form-control" type="password" name="user_new_pw_confirmation">

                </div><!-- /.box-body -->
                <dir class="box box-footer">
                    <button type="submit" class="btn btn-primary" style="text-align: center"> 修改</button>
                </dir>
              </div><!-- /.box -->
</form>

@stop
