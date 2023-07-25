@extends('layouts.layout')

@section('awalStatus')
active
@endsection

@section('content')
<div class="modal fade" id="formInput">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header bg-primary">
    <h4 class="modal-title">Pendaftaran</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">&times;</span>
    </button>
   </div>
   <form action="{{route('antrian.store')}}" method="post" id="formantrian">
    @csrf
    <div class="modal-body">

     <input type="hidden" name="idpoli" id="inputidpoli">
     <div class="row">
      <div class="col-md-5">
       <div class="form-group">
        <label for="tanggal">Tanggal Layanan</label>
        <input type="date" class="form-control" name="tanggal" style="font-size: 20px;" value="{{date('Y-m-d')}}">
       </div>

       <div class="form-group">
        <label for="tipepasien">Tipe Pasien</label>
        <div class="row">
         <div class="col">
          <div class="custom-control custom-radio">
           <input class="custom-control-input" type="radio" id="tipepasien1" name="tipepasien" value="umum"
            onchange="cektipepasien('umum')" checked>
           <label for="tipepasien1" class="custom-control-label">Umum</label>
          </div>
         </div>
         <div class="col">
          <div class="custom-control custom-radio">
           <input class="custom-control-input" type="radio" id="tipepasien2" name="tipepasien" value="bpjs"
            onchange="cektipepasien('bpjs')">
           <label for="tipepasien2" class="custom-control-label">BPJS</label>
          </div>
         </div>
        </div>

       </div>
       <div class="form-group" id="formbpjs" hidden>
        <label for="nama">No. BPJS</label>
        <input type="text" class="form-control" name="nobpjs" id="nobpjs" placeholder="Masukkan No. Kartu BPJS">
       </div>
      </div>
      <div class="col-md-7">
       <div class="form-group">
        <label for="nik">NIK</label>
        <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukkan NIK" maxlength="16" required>
       </div>
       <div class="form-group">
        <label for="nama">Nama Lengkap</label>
        <input type="text" class="form-control" name="namapasien" id="namapasien" placeholder="Masukkan Nama" maxlength="50"
         required>
       </div>
       <div class="form-group">
        <label for="nama">Alamat</label>
        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat" maxlength="100">
       </div>
      </div>
     </div>


    </div>

    <div class="modal-footer justify-content-between">
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
   </form>
  </div>
  <!-- /.modal-content -->
 </div>
 <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
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
    </div>
    <div class="col-md-3"></div>
   </div>

   <div class="row">
    <div class="col-md-3">
     <!-- small box -->

     <a class="small-box bg-info btn" onclick="submit(1)">
      <div class="inner">
       <h4 style="margin-bottom:0;">Pemeriksaan Umum</h4>

       <!-- <p>New Orders</p> -->
      </div>
      <div class="icon">
       <i class="fas fa-user-md" style="position: inherit;padding-bottom: 20px;"></i>
      </div>
     </a>
    </div>
    <!-- ./col -->
    <div class="col-md-3">
     <!-- small box -->
     <a class="small-box bg-success btn" onclick="submit(2)">
      <div class="inner">
       <h4 style="margin-bottom:0;">Kesehatan Gigi & Mulut</h4>

       <!-- <p>New Orders</p> -->
      </div>
      <div class="icon">
       <i class="fas fa-user-md" style="position: inherit;padding-bottom: 20px;"></i>
      </div>
     </a>
    </div>
    <!-- ./col -->
    <div class="col-md-3">
     <!-- small box -->
     <a class="small-box bg-warning btn" onclick="submit(3)">
      <div class="inner">
       <h4 style="margin-bottom:0;">Pemeriksaan KIA</h4>

       <!-- <p>New Orders</p> -->
      </div>
      <div class="icon">
       <i class="fas fa-user-md" style="position: inherit;padding-bottom: 20px;"></i>
      </div>
     </a>
    </div>
    <!-- ./col -->
    <div class="col-md-3">
     <!-- small box -->
     <a class="small-box bg-danger btn" onclick="submit(4)">
      <div class="inner">
       <h4 style="margin-bottom:0;">Pemeriksaan KB</h4>

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
  $('#formInput').modal('show');
  $('#inputidpoli').val(idpoli);

  // $('#formantrian').submit();
 }

 function cektipepasien(e) {

  if (e == 'umum') {
   $('#formbpjs').attr('hidden', true);
   $('#nobpjs').attr('required', false);
   
  } else if (e == 'bpjs') {
   $('#formbpjs').attr('hidden', false);
   $('#nobpjs').attr('required', true);
  }
 }


 @if (isset($cetak))
  document.getElementById('cetak').click();
 @endif
</script>
@endsection