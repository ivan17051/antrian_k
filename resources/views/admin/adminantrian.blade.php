@extends('layouts.layout')

@section('adminShow')
menu-open
@endsection

@if($poli->namapoli=='Pemeriksaan Umum')
@section('umumStatus')
active
@endsection
@elseif($poli->namapoli=='Kesehatan Gigi & Mulut')
@section('gigiStatus')
active
@endsection
@elseif($poli->namapoli=='Pemeriksaan KIA')
@section('kiaStatus')
active
@endsection
@elseif($poli->namapoli=='Pemeriksaan KB')
@section('kbStatus')
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
            <li class="breadcrumb-item active">{{$poli->namapoli}}</li>
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
          <div
            class="small-box @if($poli->id==1)bg-info @elseif($poli->id==2)bg-success @elseif($poli->id==3)bg-warning @elseif($poli->id==4)bg-danger @endif text-center"
            style="padding: 20px 0;">
            <div class="inner">
              <h4>{{$poli->namapoli}}</h4>
            </div>
            <div class="icon">
              <i class="fas fa-user-md" style="position: inherit;padding-bottom: 20px;"></i>
            </div>
          </div>
          <div class="card">
            <div class="card-body text-center">
              <input type="date" class="form-control" name="tanggal" style="font-size: 20px;" value="{{$tanggal}}"
                onchange="gantitanggal(this)">
            </div>
          </div>
          <div class="card">
            <div class="card-body text-center row">

              <button class="btn btn-info btn-block p-1" onclick="location.reload();">
                Refresh <i class="fas fa-sync-alt"></i>
              </button>

            </div>
          </div>


        </div>
        <!-- ./col -->
        <div class="col-md-9">
          <div class="row">
            <div class="col-sm-4">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Antrian Saat Ini</span>
                  <span class="info-box-number">{{isset($now) ? $now : '0'}}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-md-4">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total Antrian</span>
                  <span class="info-box-number">{{isset($last) ? $last : '0'}}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user-injured"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Sisa Antrian</span>
                  <span class="info-box-number">{{$last-$now}}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Antrian</h3>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table m-0">
                      <thead>
                        <tr>
                          <th style="width:15%;">No Antrian</th>
                          <th>Nama</th>
                          <th style="width:15%;">Status</th>
                          <th class="text-right" style="width:15%;">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($antrian as $unit)
                        <tr>
                          <td>{{$unit->noantrian}}</td>
                          <td>{{$unit->namapasien}}</td>
                          <td>
                            @if($unit->status==1)
                            <span class="badge badge-success">Dipanggil</span>
                            @elseif($unit->status==2)
                            <span class="badge badge-danger">Batal</span>
                            @elseif($unit->status==0)
                            <span class="badge badge-warning">Menunggu</span>
                            @endif
                          </td>
                          <td class="text-right">
                            @if($unit->status==0)
                            <button class="btn btn-success btn-sm" onclick="ubah(1,{{$unit->id}})"><i
                                class="fas fa-check"></i></button>
                            <button class="btn btn-danger btn-sm" onclick="ubah(2,{{$unit->id}})"><i
                                class="fas fa-times"></i></button>
                            @elseif($unit->status==1)
                            <button class="btn btn-warning btn-sm" onclick="ubah(0,{{$unit->id}})"><i
                                class="fas fa-redo-alt"></i></button>
                            <button class="btn btn-danger btn-sm" onclick="ubah(2,{{$unit->id}})"><i
                                class="fas fa-times"></i></button>
                            @else
                            <button class="btn btn-secondary btn-sm" disabled><i class="fas fa-lock"></i></button>
                            @endif
                          </td>
                        </tr>
                        @endforeach

                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                  <!-- <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                  <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a> -->
                </div>
                <!-- /.card-footer -->
              </div>

            </div>
          </div>
          <!-- /.row -->
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
  function ubah(val, id = null) {
    console.log(val, id);
    if (val == '1') {
      $('#formupdate').attr('action', "{{route('antrian.update',['antrian'=>'1'])}}?id=" + id);
    } else if (val == '0') {
      $('#formupdate').attr('action', "{{route('antrian.update',['antrian'=>'0'])}}?id=" + id);
    } else if (val == '2') {
      $('#formupdate').attr('action', "{{route('antrian.update',['antrian'=>'2'])}}?id=" + id);
    }
    $('#formupdate').submit();
  }

  function gantitanggal(e) {
    // console.log(e.value);
    window.location.href = "{{route('antrian.show',['antrian'=>$poli->id, 'tanggal'=>''])}}" + e.value;
  }
</script>
@endsection