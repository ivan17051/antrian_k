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
        
        <div class="col-md-12">
          <form action="{{route('data.laporan')}}" method="get" id="formantrian">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <label for="tipepasien">Tipe Pasien</label>
                    <select name="tipepasien" id="tipepasien" class="form-control" required>
                      <option value="" selected disabled>-- Pilih Tipe Pasien --</option>
                      <option value="semua" @if($tipe == 'semua') selected @endif>Semua</option>
                      <option value="umum" @if($tipe == 'umum') selected @endif>Umum</option>
                      <option value="bpjs" @if($tipe == 'bpjs') selected @endif>BPJS</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label for="tglawal">Tanggal Awal</label>
                    <input type="date" class="form-control" name="tglawal" style="font-size: 20px;"
                      value="{{isset($tglawal) ? $tglawal : date('Y-m-d')}}">
                  </div>
                  <div class="col-md-3">
                    <label for="tglakhir">Tanggal Akhir</label>
                    <input type="date" class="form-control" name="tglakhir" style="font-size: 20px;"
                      value="{{isset($tglakhir) ? $tglakhir : date('Y-m-d')}}">
                  </div>
                  <div class="col-md-2">
                    <button class="btn btn-primary btn-block" style="height: 100%;">Tampilkan</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>

        <div class="col-md-12 mt-4">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-md-6">
                  <h3 class="card-title text-center">Laporan</h3>
                </div>
                <div class="col-md-6 text-right">
                  @if(isset($antrian))
                  <form action="{{route('data.download')}}" id="formdownload">
                    <input type="hidden" name="tipepasien" value="{{isset($tipe) ? $tipe : ''}}">
                    <input type="hidden" name="tglawal" value="{{isset($tglawal) ? $tglawal : date('Y-m-d')}}">
                    <input type="hidden" name="tglakhir" value="{{isset($tglakhir) ? $tglakhir : date('Y-m-d')}}">
                    <button type="submit" class="btn btn-info btn-sm" target="_blank">Download</button>
                  </form>
                  @endif
                </div>
              </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>Tanggal</th>
                    <th>Pemeriksaan Umum</th>
                    <th>Kesehatan Gigi & Mulut</th>
                    <th>Pemeriksaan KIA</th>
                    <th>Pemeriksaan KB</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($antrian as $unit)
                  <tr>
                    <td>{{Carbon\Carbon::make($unit->tanggal)->translatedFormat('d F Y')}}</td>
                    <td>{{$unit->umum}}</td>
                    <td>{{$unit->gigi}}</td>
                    <td>{{$unit->kia}}</td>
                    <td>{{$unit->kb}}</td>
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