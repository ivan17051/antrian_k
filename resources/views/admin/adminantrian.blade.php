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
  <form action="" method="post" id="formupdate">
    @csrf
    @method('PUT')
    <input type="hidden" name="idpoli" value="{{$poli->id}}">
    <input type="hidden" class="form-control" name="tanggal" value="{{$tanggal}}">
  </form>
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Klinik Pratama Rawat Jalan Al Azhar</h1>
          <p>Jl. Dupak Bandarejo N0. 23 Surabaya</p>
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
          <div class="small-box @if($poli->id==1)bg-info @elseif($poli->id==2)bg-success @elseif($poli->id==3)bg-warning @endif text-center" style="padding: 20px 0;">
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
          <div class="card">
            <div class="card-body">
              <input type="date" class="form-control" name="tanggal" style="font-size: 20px;" value="{{$tanggal}}" onchange="gantitanggal(this)">
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card">
            <div class="card-body text-center row">
              <div class="col-md-4" style="padding: 0 0 0 10px;">
                @if(isset($now))
                <button class="btn btn-warning btn-block" onclick="ubah('0')">
                  <i class="fas fa-minus"></i>
                </button>
                @endif
              </div>
              <div class="col-md-4">
                <h4>{{isset($now) ? $now : '0'}}</h4>
              </div>
              @if(isset($last) && $now!=$last)
              <div class="col-md-4" style="padding: 0 10px 0 0;">
                <button class="btn btn-success btn-block" onclick="ubah('1')"><i class="fas fa-plus"></i></button>
              </div>
              @endif
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
                <button class="btn btn-info btn-block" onclick="location.reload();">
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
@section('script')
<script>
  function ubah(val) {
    // console.log(val);
    if (val == '1') {
      $('#formupdate').attr('action', "{{route('antrian.update',['antrian'=>'1'])}}");
    } else if (val == '0') {
      $('#formupdate').attr('action', "{{route('antrian.update',['antrian'=>'0'])}}");
    }
    $('#formupdate').submit();
  }

  function gantitanggal(e) {
    console.log(e.value);
    window.location.href = "{{route('antrian.show',['antrian'=>$poli->id, 'tanggal'=>''])}}"+e.value;
  }
</script>
@endsection