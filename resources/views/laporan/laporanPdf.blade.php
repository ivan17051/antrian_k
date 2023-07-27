<!DOCTYPE html>
<html>

<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <link href="{{asset('/public/dist/css/cetak/report.css')}}" rel="stylesheet" type="text/css" media="all">
 <link href="{{asset('/public/dist/css/cetak/report-screen.css')}}" rel="stylesheet" type="text/css" media="screen">
 <title>LAPORAN JUMLAH PASIEN</title>
 <style media="all" type="text/css">
  body {
   font-family: Verdana, Geneva, sans-serif;
   font-size: 12px;
   padding: 0px;
   margin: 0px;
  }

  .TebalBorder {
   border-bottom: solid 2px;
  }

  p {
   text-indent: 40px;
  }
 </style>
</head>

<body>
 <table class="screen panjang lebarKertasTegak">
  <tbody>
   <tr>
    <td class="jarak">
     <!-- KOP SURAT -->
     <table cellspacing="0" cellpadding="0">
      <tbody>
       <tr>
        <td class="headerFont fontCenter  fontUnderline" style="font-size:16px">LAPORAN JUMLAH PASIEN</td>
       </tr>
       <tr>
        <td class="headerFont fontCenter " style="font-size:14px">{{Carbon\Carbon::make($tglawal)->translatedFormat('d M
         Y')}} - {{Carbon\Carbon::make($tglakhir)->translatedFormat('d M Y')}}</td>
       </tr>
       <tr>
        <td>&nbsp;</td>
       </tr>
       <tr>
        <td>&nbsp;</td>
       </tr>
      </tbody>
     </table>
     <!-- END OF KOP SURAT -->
     <!-- CONTENT -->

     <table class="w-85">
      <thead class="tb-header">
       <tr>
        <th class="headerFont fontCenter fontBold" style="font-size:13px">NO</th>
        <th class="headerFont fontCenter fontBold" style="font-size:13px; width:19%;">TANGGAL</th>
        <th class="headerFont fontCenter fontBold" style="font-size:13px; width:19%;">PEMERIKSAAN UMUM</th>
        <th class="headerFont fontCenter fontBold" style="font-size:13px; width:19%;">KESEHATAN GIGI & MULUT</th>
        <th class="headerFont fontCenter fontBold" style="font-size:13px; width:19%;">PEMERIKSAAN KIA</th>
        <th class="headerFont fontCenter fontBold" style="font-size:13px; width:19%;">PEMERIKSAAN KB</th>
       </tr>
      </thead>
      <tbody class="tb-body font-13">
       @foreach($antrian as $key=>$unit)
       <tr>
        <td class=" fontJustify">{{$key+1}}. </td>
        <td class=" fontJustify">{{Carbon\Carbon::make($unit->tanggal)->translatedFormat('d M Y')}}</td>
        <td class=" fontCenter">{{$unit->umum}}</td>
        <td class=" fontCenter">{{$unit->gigi}}</td>
        <td class=" fontCenter">{{$unit->kia}}</td>
        <td class=" fontCenter">{{$unit->kb}}</td>
       </tr>
       @endforeach
      </tbody>
     </table>

     <!-- END OF CONTENT -->
    </td>
   </tr>

  </tbody>
 </table>
 <script>
  window.print();
 </script>
</body>

</html>