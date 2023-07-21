@extends('layouts.layout')

@section('laporanStatus')
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
     <h1 class="m-0">Laporan</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
     <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Laporan</li>
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
   <div class="row pb-4">
    <div class="col-md-2"></div>
    <div class="col-md-8">
     <form action="{{route('data.laporan')}}" method="get" id="formantrian">
      <div class="row">
       <div class="col-md-5">
        <input type="date" class="form-control" name="tglawal" style="font-size: 20px;"
         value="{{isset($tglawal) ? $tglawal : date('Y-m-d')}}">
       </div>
       <div class="col-md-5">
        <input type="date" class="form-control" name="tglakhir" style="font-size: 20px;"
         value="{{isset($tglakhir) ? $tglakhir : date('Y-m-d')}}">
       </div>
       <div class="col-md-2">
        <button class="btn btn-primary btn-block">Cari</button>
       </div>
      </div>

     </form>
    </div>
    <div class="col-md-2"></div>
    <div class="col-md-12 mt-4">
     <div class="card">
      <div class="card-header">
       <h3 class="card-title text-center">Laporan Jumlah Antrian Pasien</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0">
       <table class="table table-hover text-nowrap">
        <thead>
         <tr>
          <th>Tanggal</th>
          <th>Poli Umum</th>
          <th>Poli Gigi</th>
          <th>Poli KIA</th>
         </tr>
        </thead>
        <tbody>
         @foreach($antrian as $unit)
         <tr>
          <td>{{Carbon\Carbon::make($unit->tanggal)->translatedFormat('d F Y')}}</td>
          <td>{{$unit->umum}}</td>
          <td>{{$unit->gigi}}</td>
          <td>{{$unit->kia}}</td>
         </tr>
         @endforeach
        </tbody>
       </table>
      </div>
      <!-- /.card-body -->
     </div>
    </div>

    <!-- /.card -->
   </div>

   <div class="row">


   </div>
   <!-- /.row -->

  </div><!-- /.container-fluid -->
 </section>
 <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

@section('script')
<script>
 function submit(idpoli) {
  $('#inputidpoli').val(idpoli);
  $('#formantrian').submit();
 }
</script>
@endsection