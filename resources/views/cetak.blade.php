<!DOCTYPE html>
<html>

<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <link href="{{asset('/public/dist/css/cetak/report.css')}}" rel="stylesheet" type="text/css" media="all">
 <link href="{{asset('/public/dist/css/cetak/report-screen.css')}}" rel="stylesheet" type="text/css" media="screen">
 <title>CETAK ANTRIAN</title>
 <style media="all" type="text/css">
  body {
   font-family: Arial;
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
 <table class="screen" style="width:5.8cm;">
  <tbody>
   <tr>
    <td class="jarak">
     <!-- KOP SURAT -->
     <table cellspacing="0" cellpadding="0">
      <tbody>
       <tr>
        <td>&nbsp;</td>
       </tr>
       <tr>
        <td class="fontCenter " style="font-size:13px">KLINIK PRATAMA RAWAT JALAN</td>
       </tr>
       <tr>
        <td class="fontCenter fontBold" style="font-size:16px">AL AZHAR</td>
       </tr>
       <tr>
        <td class="fontCenter " style="font-size:12px;">JL. DUPAK BANDAREJO NO. 23 SURABAYA</td>
       </tr>
       <tr>
        <td>&nbsp;</td>
       </tr>
      </tbody>
     </table>
     <!-- END OF KOP SURAT -->
     <!-- KOP SURAT -->
     <table cellspacing="0" cellpadding="0">
      <tbody>
       <tr>
        <td class="fontCenter" style="border-top:1px solid black"></td>
       </tr>
       <tr>
        <td class="fontCenter" style="font-size:25px">Poli {{$antrian->namapoli}}</td>
       </tr>
       <tr>
        <td>&nbsp;</td>
       </tr>
       <tr>
        <td class="fontCenter" style="font-size:18px">Nomor Antrian</td>
       </tr>
       <tr>
        <td class="">&nbsp;</td>
       </tr>
       <tr>
        <td class="fontCenter" style="font-size:60px">{{sprintf("%03d", $antrian->noantrian)}}</td>
       </tr>
       <tr>
        <td class="">&nbsp;</td>
       </tr>
       <tr>
        <td class="fontCenter" style="font-size:13px">Mohon Menunggu Sampai Petugas Memanggil Nomor Antrian Anda</td>
       </tr>
       <tr>
        <td>&nbsp;</td>
       </tr>
      </tbody>
     </table>
     <!-- END OF KOP SURAT -->
     <!-- CONTENT -->

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