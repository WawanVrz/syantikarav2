<?php
    $tgl1 = $awal;
    $tgl2 = $akhir;
    $format111 = date('d F Y', strtotime($tgl1));
    $format112 = date('d F Y', strtotime($tgl2));
 ?>
 <table width="100%" border="0">
   <tr>
     <td colspan="8" align="center">
       <h3 style="padding-left:0px; font-size:18px;"><b> RPCB SYANTIKARA </b></h3>
       <p style="padding-left:0px; padding-top:-15px;">Jl. Colombo CT VI / 001, Yogyakarta </p>
      <p style="padding-left:0px; padding-top:-10px;"> Telp. (0274) 562263 </p>
     </td>
   </tr>
   <tr>
     <td colspan="8" align="center">
          <hr><h4><b><p style="padding-left:0px; font-weight:bold;"> DAFTAR TAMU RPCB SYANTIKARA <br> <h5 style="padding-top:-20px;">Periode <?php echo $format111
          ?> s/d <?php echo $format112 ?></b></h5></p></h4></hr><hr>
     </td>
   </tr>
 </table>
<table border="1" bordercolor="#ccc" STYLE="BORDER-COLLAPSE:COLLAPSE;" width="100%">
   <thead>
   <tr>
     <th height="30px">No</th>
     <th>Instansi</th>
     <th>Contact Person</th>
     <th>Tanggal Pemakaian</th>
     <th>Kegiatan</th>
     <th>Jumlah Peserta</th>
   </tr>
   </thead>
   <tbody>
     <?php
     $no = 1;
     foreach ($carihari as $lap)
     {
       $tanggal1 =  $lap->tgl_checkin;
       $tanggal2 =  $lap->tgl_checkout;
       $format1 = date('d F Y', strtotime($tanggal1 ));
       $format2 = date('d F Y', strtotime($tanggal2 ));

       $angka = $lap->total_bayar;
       $angka_format = number_format($angka,2,",",".");
   ?>
 <tr>
   <td><?php echo $no++ ?></td>
   <td><?php echo $lap->instansi ?></td>
   <td><?php echo $lap->nama_pemesan .'&nbsp;&nbsp;/&nbsp;&nbsp;'. $lap->no_telp ?></td>
   <td><?php echo $format1 .'&nbsp;&nbsp;-&nbsp;&nbsp;'. $format2?></td>
   <td><?php echo $lap->kegiatan ?></td>
   <td align="center"><?php echo $lap->jumlah_tamu ?></td>
  </tr>
   <?php } ?>
   </tbody>
   <tr>
     <td colspan="5" height="30px" style="font-size:16px;" align="right"> <b>TOTAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </td>
     <td align="center" style="font-size:16px;"> <b><?php echo $caritotalhari[0]->jumlahpeserta; ?></b> </td>
   </tr>
 </table>
