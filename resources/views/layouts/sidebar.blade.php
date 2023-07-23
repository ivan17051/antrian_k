@section('sidebar')
<!-- Sidebar -->
<div class="sidebar">
 <!-- Sidebar user panel (optional) -->
 <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
  <div class="image">
   <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
  </div>
  <div class="info">
   <a href="#" class="d-block">Alexander Pierce</a>
  </div>
 </div> -->

 <!-- SidebarSearch Form -->
 <div class="form-inline">
  <div class="input-group" data-widget="sidebar-search">
   <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
   <div class="input-group-append">
    <button class="btn btn-sidebar">
     <i class="fas fa-search fa-fw"></i>
    </button>
   </div>
  </div>
 </div>

 <!-- Sidebar Menu -->
 <nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
   <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
   <!-- <li class="nav-item">
    <a href="{{route('antrian.index')}}" class="nav-link @yield('antrianStatus')">
     <i class="nav-icon fas fa-tachometer-alt"></i>
     <p>
      Admin Antrian
     </p>
    </a>
   </li> -->
   <li class="nav-item">
    <a href="{{route('antrian.index')}}" class="nav-link @yield('awalStatus')">
     <i class="nav-icon fas fa-desktop"></i>
     <p>
      Tampilan Awal
     </p>
    </a>
   </li>
   <li class="nav-item">
    <a href="{{route('data.laporan')}}" class="nav-link @yield('laporanStatus')">
     <i class="nav-icon fas fa-file-invoice"></i>
     <p>
      Laporan
     </p>
    </a>
   </li>
   <!-- <li class="nav-header">ADMIN</li> -->
   <li class="nav-item @yield('adminShow')">
    <a href="#" class="nav-link">
     <i class="nav-icon fas fa-tachometer-alt"></i>
     <p>
      Admin
      <i class="right fas fa-angle-left"></i>
     </p>
    </a>
    <ul class="nav nav-treeview">
     <li class="nav-item">
      <a href="{{route('antrian.show',['antrian'=>1])}}" class="nav-link @yield('umumStatus')">
       <i class="far fa-circle nav-icon"></i>
       <p>Pemeriksaan Umum</p>
      </a>
     </li>
     <li class="nav-item">
      <a href="{{route('antrian.show',['antrian'=>2])}}" class="nav-link @yield('gigiStatus')">
       <i class="far fa-circle nav-icon"></i>
       <p>Kesehatan Gigi & Mulut</p>
      </a>
     </li>
     <li class="nav-item">
      <a href="{{route('antrian.show',['antrian'=>3])}}" class="nav-link @yield('kiaStatus')">
       <i class="far fa-circle nav-icon"></i>
       <p>Pemeriksaan KIA</p>
      </a>
     </li>
     <li class="nav-item">
      <a href="{{route('antrian.show',['antrian'=>4])}}" class="nav-link @yield('kbStatus')">
       <i class="far fa-circle nav-icon"></i>
       <p>Pemeriksaan KB</p>
      </a>
     </li>
    </ul>
   </li>

  </ul>
 </nav>
 <!-- /.sidebar-menu -->
</div>
@endsection