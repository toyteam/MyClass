<?php
    $stu_info = session()->get('stu_info');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>班级管理系统-{{$title}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('AdminLTE2')}}/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('AdminLTE2')}}/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('AdminLTE2')}}/dist/css/skins/_all-skins.min.css">

    @section('MyCss')

    @show

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo">
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">班级管理系统</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{asset('AdminLTE2')}}/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs">{{ $stu_info->stu_name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="{{asset('AdminLTE2')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      {{ $stu_info->stu_name }}
                      <small>该帐号创建于 {{date('Y-m-d', $stu_info->stu_create_time)}}</small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">个人资料</a>
                    </div>
                    <div class="pull-right">
                      <a href="{{url('logout')}}" class="btn btn-default btn-flat">登出</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{asset('AdminLTE2')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{$stu_info->stu_name}}</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            <li class="treeview" id="notice">
              <a href="{{url('welcome')}}">
                <i class="fa fa-clock-o" ></i> <span>班级通知</span>
              </a>
            </li>

            <li class="treeview" id="life">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>生活管理</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li id="budget"><a href="#"><i class="fa fa-circle-o"></i>班费公示</a></li>
                <li id="fund"><a href="{{url('life/fund')}}"><i class="fa fa-circle-o"></i>缴纳班费</a></li>
                <li id="form"><a href="{{url('life/form')}}"><i class="fa fa-circle-o"></i>填写表格</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>天天向上</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> 学习资料</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> 考试真题</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-table"></i> <span>轻松一下</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i>班级活动</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i>表白墙</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i>表情包墙</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>个人信息</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i>信息查看</a></li>
                <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i>信息修改</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>后台管理</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i>班费管理</a></li>
                <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i>表格管理</a></li>
                <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i>资料管理</a></li>
                <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i>人员管理</a></li>
              </ul>
            </li>
            
            <li><a href="{{url('logout')}}"><i class="fa fa-book"></i> <span>登出</span></a></li>

        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            {{$title}}
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          
          @section('content')
          @show

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <a href="#">建议反馈</a> |
          <b>版本</b> 1.0.0
        </div>
        <strong>&copy; 2017 <a href="#">413之阿和的长辈联盟</a>.</strong> All rights reserved.
      </footer>
      
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="{{asset('AdminLTE2')}}/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('AdminLTE2')}}/bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('AdminLTE2')}}/dist/js/app.min.js"></script>

    <script type="text/javascript">
      $('#{{ $url }}').addClass('active');
      $('#{{ $url }}').parents().addClass('active');
    </script>

    @section('MyJavascript')

    @show

  </body>
</html>
