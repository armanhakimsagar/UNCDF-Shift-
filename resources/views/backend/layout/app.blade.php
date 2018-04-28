<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('project/common/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('project/common/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('project/backend/css/ionicons.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('project/backend/css/dataTables.bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('project/backend/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{ asset('project/backend/css/_all-skins.min.css')}}">
  <!-- sweet alert style -->
  <link rel="stylesheet" href="{{ asset('project/backend/css/sweetalert.css')}}">
  <!-- select 2 style -->
  <link rel="stylesheet" href="{{ asset('project/backend/css/select2.min.css')}}">
  <!-- Custome style -->
  <link rel="stylesheet" href="{{ asset('project/backend/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('project/backend/css/demo_style.css')}}">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{ route('dashbord')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    @include('backend.layout.top_menu')
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      @include('backend.layout.left_menu')
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->
  @include('backend/layout/footer')
  <!-- Control Sidebar -->
  @include('backend/layout/control_sidebar')
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
@section('footer_js_scrip_area')
<script src="{{ asset('project/common/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{ asset('project/common/js/bootstrap.min.js')}}"></script>
<!-- DataTables -->
<script src="{{ asset('project/backend/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('project/backend/js/dataTables.bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('project/backend/js/adminlte.min.js')}}"></script>
<!--select 2 js-->
<script src="{{ asset('project/backend/js/select2.full.min.js')}}"></script>
<!--select 2 js-->
<script src="{{ asset('project/backend/js/sweetalert.min.js')}}"></script>
<script>
  $(function () {
    $('#example2').DataTable();
    $('#permission').select2();
    $('#roles').select2();
  })
</script>
@show 
</body>
</html>
