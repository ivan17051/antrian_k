@extends('layouts.layout')

@section('awalStatus')
active
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <div class="content-header">
  <div class="container-fluid">
   <div class="row mb-2">
    <div class="col-sm-6">
     <!-- <h1 class="m-0">Tampilan Awal</h1> -->
    </div><!-- /.col -->
    <div class="col-sm-6">
     <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Tampilan Awal</li>
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
   <h3 style="text-align:center;">Selamat Datang</h3>
   <h3 style="text-align:center;">di</h3>
   <h2 style="text-align:center;">Klinik Pratama Rawat Jalan Al Azhar</h2>
   <h5 style="text-align:center;padding-bottom: 20px;">Jl. Dupak Bandarejo No. 23 Surabaya</h5>
   <div class="row pb-4">
    <div class="col-md-3"></div>
    <div class="col-md-6">
     <form action="{{route('antrian.store')}}" method="post" id="formantrian">
      @csrf
      <input type="date" class="form-control" name="tanggal" style="font-size: 20px;" value="{{date('Y-m-d')}}">
      <input type="hidden" name="idpoli" id="inputidpoli">
     </form>
    </div>
    <div class="col-md-3"></div>
   </div>

   <div class="row">
    <div class="col-md-4">
     <!-- small box -->
     <a class="small-box bg-info btn" onclick="submit(1)">
      <div class="inner">
       <h3 style="margin-bottom:0;">Poli Umum</h3>

       <!-- <p>New Orders</p> -->
      </div>
      <div class="icon">
       <i class="fas fa-user-md" style="position: inherit;padding-bottom: 20px;"></i>
      </div>
     </a>
    </div>
    <!-- ./col -->
    <div class="col-md-4">
     <!-- small box -->
     <a class="small-box bg-success btn" onclick="submit(2)">
      <div class="inner">
       <h3 style="margin-bottom:0;">Poli Gigi</h3>

       <!-- <p>New Orders</p> -->
      </div>
      <div class="icon">
       <i class="fas fa-user-md" style="position: inherit;padding-bottom: 20px;"></i>
      </div>
     </a>
    </div>
    <!-- ./col -->
    <div class="col-md-4">
     <!-- small box -->
     <a class="small-box bg-warning btn" onclick="submit(3)">
      <div class="inner">
       <h3 style="margin-bottom:0;">Poli KIA</h3>

       <!-- <p>New Orders</p> -->
      </div>
      <div class="icon">
       <i class="fas fa-user-md" style="position: inherit;padding-bottom: 20px;"></i>
      </div>
     </a>
    </div>
    <!-- ./col -->

   </div>
   <!-- /.row -->
   <h5 style="text-align:center;">*Silahkan tekan pada Poli tujuan Anda</h5>
  </div><!-- /.container-fluid -->
 </section>
 <!-- /.content -->
 @if(isset($cetak))
 <a id="cetak" href="{{route('antrian.cetak',['id'=>$cetak])}}" onclick="window.open(this, '_blank');return false;"
  class="btn btn-info" hidden>Cetak</a>
 @endif
</div>
<!-- /.content-wrapper -->

@endsection

@section('script')
<script>
 function submit(idpoli) {
  $('#inputidpoli').val(idpoli);
  $('#formantrian').submit();
 }

 
 @if (isset($cetak))
  document.getElementById('cetak').click();
 @endif
</script>
@endsection