@if(Auth::user())
@include('layouts.sidebar')
@endif
<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="icon" type="image/png" href="{{asset('public/dist/img/logo_32.png')}}">
 <title>Klinik Al Azhar Surabaya</title>

 <!-- Google Font: Source Sans Pro -->
 <link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
 <!-- Font Awesome -->
 <link rel="stylesheet" href="{{asset('public/plugins/fontawesome-free/css/all.min.css')}}">
 <!-- Ionicons -->
 <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
 <!-- Tempusdominus Bootstrap 4 -->
 <link rel="stylesheet"
  href="{{asset('public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
 <!-- iCheck -->
 <link rel="stylesheet" href="{{asset('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
 <!-- JQVMap -->
 <link rel="stylesheet" href="{{asset('public/plugins/jqvmap/jqvmap.min.css')}}">
 <!-- Theme style -->
 <link rel="stylesheet" href="{{asset('public/dist/css/adminlte.min.css')}}">
 <!-- overlayScrollbars -->
 <link rel="stylesheet" href="{{asset('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
 <!-- Daterange picker -->
 <link rel="stylesheet" href="{{asset('public/plugins/daterangepicker/daterangepicker.css')}}">
 <!-- summernote -->
 <link rel="stylesheet" href="{{asset('public/plugins/summernote/summernote-bs4.min.css')}}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
 <div class="modal fade" id="modal-logout">
  <div class="modal-dialog">
   <div class="modal-content">
    <div class="modal-header bg-primary">
     <h4 class="modal-title">Logout</h4>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
     </button>
    </div>
    <div class="modal-body">
     Anda yakin ingin keluar?
    </div>

    <div class="modal-footer justify-content-between">
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     <a class="btn btn-primary" href="{{ route('logout') }}"
      onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log out</a>
     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
     </form>
    </div>

   </div>
   <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
 </div>

 <div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
   <img class="animation__shake" src="{{asset('public/dist/img/logo_32.png')}}" alt="Logo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="@if(!Auth::user())margin-left: 0; @endif">
   @if(Auth::user())
   <!-- Left navbar links -->
   <ul class="navbar-nav">
    <li class="nav-item">
     <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <!-- <li class="nav-item d-none d-sm-inline-block">
     <a href="index3.html" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
     <a href="#" class="nav-link">Contact</a>
    </li> -->
   </ul>
   @endif
   <ul class="navbar-nav ml-auto">

    <li class="nav-item">
     @if(Auth::user())
     <a class="nav-link" href="#" role="button" data-target="#modal-logout" data-toggle="modal">
      <i class="fas fa-power-off"></i>
     </a>
     @else
     <a class="nav-link" href="{{route('login')}}" role="button">
      <i class="fas fa-sign-in-alt"></i>
     </a>
     @endif
    </li>
   </ul>

  </nav>
  @if(Auth::user())
  <!-- /.navbar -->

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="index3.html" class="brand-link">
    <img src="{{asset('public/dist/img/logo_32.png')}}" alt="Logo" class="brand-image img-circle elevation-3"
     style="opacity: .8">
    <span class="brand-text font-weight-light">Al Azhar</span>
   </a>
   @yield('sidebar')
  </aside>
  @endif
  @yield('content')

  <footer class="main-footer" style="@if(!Auth::user())margin-left: 0; @endif">
   <strong>Copyright &copy; {{date('Y')}} <a href="#">D I A Corp</a>.</strong>
   All rights reserved.
   <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 1.0.0
   </div>
  </footer>
 </div>
 <!-- ./wrapper -->
 @yield('script')
 <!-- jQuery -->
 <script src="{{asset('public/plugins/jquery/jquery.min.js')}}"></script>
 <!-- jQuery UI 1.11.4 -->
 <script src="{{asset('public/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 <script>
  $.widget.bridge('uibutton', $.ui.button)
 </script>
 <!-- Bootstrap 4 -->
 <script src="{{asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
 <!-- ChartJS -->
 <script src="{{asset('public/plugins/chart.js/Chart.min.js')}}"></script>
 <!-- Sparkline -->
 <script src="{{asset('public/plugins/sparklines/sparkline.js')}}"></script>
 <!-- JQVMap -->
 <script src="{{asset('public/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
 <script src="{{asset('public/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
 <!-- jQuery Knob Chart -->
 <script src="{{asset('public/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
 <!-- daterangepicker -->
 <script src="{{asset('public/plugins/moment/moment.min.js')}}"></script>
 <script src="{{asset('public/plugins/daterangepicker/daterangepicker.js')}}"></script>
 <!-- Tempusdominus Bootstrap 4 -->
 <script src="{{asset('public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
 <!-- Summernote -->
 <script src="{{asset('public/plugins/summernote/summernote-bs4.min.js')}}"></script>
 <!-- overlayScrollbars -->
 <script src="{{asset('public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
 <!-- AdminLTE App -->
 <script src="{{asset('public/dist/js/adminlte.js')}}"></script>
 <!-- AdminLTE for demo purposes -->
 <!-- <script src="{{asset('public/dist/js/demo.js')}}"></script> -->
 <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
 <script src="{{asset('public/dist/js/pages/dashboard.js')}}"></script>
</body>

</html>