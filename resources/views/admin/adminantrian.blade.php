@extends('layouts.layout')

@section('adminShow')
menu-open
@endsection

@if($poli->namapoli=='Umum')
@section('umumStatus')
active
@endsection
@elseif($poli->namapoli=='Gigi')
@section('gigiStatus')
active
@endsection
@elseif($poli->namapoli=='KIA')
@section('kiaStatus')
active
@endsection
@endif

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <div class="content-header">
  <div class="container-fluid">
   <div class="row mb-2">
    <div class="col-sm-6">
     <h1 class="m-0">Klinik Pratama Rawat Jalan Al Azhar</h1>
     <p>Jl. Dupak Bandarrejo N0. 23 Surabaya</p>
    </div><!-- /.col -->
    <div class="col-sm-6">
     <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{route('antrian.index')}}">Home</a></li>
      <li class="breadcrumb-item active">Admin</li>
      <li class="breadcrumb-item active">Poli {{$poli->namapoli}}</li>
     </ol>
    </div><!-- /.col -->
   </div><!-- /.row -->
  </div><!-- /.container-fluid -->
 </div>
 <!-- /.content-header -->

 <!-- Main content -->
 <section class="content">
  <div class="container-fluid">
   <!-- Small boxes (Stat box) -->
   <div class="row">
    <div class="col-md-3">
     <!-- small box -->
     <div class="small-box bg-info text-center" style="padding: 20px 0;">
      <div class="inner">
       <h3>Poli {{$poli->namapoli}}</h3>
      </div>
      <div class="icon">
        <i class="fas fa-user-md" style="position: inherit;padding-bottom: 20px;"></i>
       </div>
     </div>
    </div>
    <!-- ./col -->
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h4>Antrian Saat Ini</h4>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <h4>Total Antrian</h4>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <h4>Sisa Antrian</h4>
        </div>
      </div>
    </div>
    
    <div class="col-md-3">
      <div class="card">
        <div class="card-body text-center row">
          <div class="col-md-4" style="padding: 0 0 0 10px;">
            <button class="btn btn-primary btn-block"><i class="fas fa-minus"></i></button>
          </div>
            <div class="col-md-4">
              <h4>{{isset($now) ? $now : '0'}}</h4>
            </div>
            <div class="col-md-4" style="padding: 0 10px 0 0;">
              <button class="btn btn-primary btn-block"><i class="fas fa-plus"></i></button>
            </div>
          
        </div>
      </div>
      <div class="card">
        <div class="card-body text-center row">
          <div class="col-md-4" style="padding: 0 0 0 10px;">
          </div>
          <div class="col-md-4">
            <h4>{{isset($last) ? $last : '0'}}</h4>
          </div>
          <div class="col-md-4" style="padding: 0 10px 0 0;">
            <button class="btn btn-primary btn-block">
              <i class="fas fa-sync-alt"></i>
            </button>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-body text-center">
          <h4>{{$last-$now}}</h4>
        </div>
      </div>
    </div>
   </div>
   <!-- /.row -->
   
  </div><!-- /.container-fluid -->
 </section>
 <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection