<?php
    $tgl1 = $tahunan;
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
          <hr><h4><b><p style="padding-left:0px; font-weight:bold;"> DAFTAR TAMU RPCB SYANTIKARA <br> <h5 style="padding-top:-20px;">LAPORAN TAHUN <?php echo $tgl1; ?></b></h5></p></h4></hr><hr>
     </td>
   </tr>
 </table>
 <h4><b> JANUARI </b></h4>
<table border="1" bordercolor="#ccc" STYLE="BORDER-COLLAPSE:COLLAPSE;" width="100%">
   <?php include 'thead.php'; ?>
   <tbody>
  <?php
  $no = 1;
  foreach ($cari1 as $lap1)
  {
       $tanggal1 =  $lap1->tgl_checkin;
       $tanggal2 =  $lap1->tgl_checkout;
       $format1 = date('d F Y', strtotime($tanggal1 ));
       $format2 = date('d F Y', strtotime($tanggal2 ));
  ?>
 <tr>
   <td><?php echo $no++ ?></td>
   <td><?php echo $lap1->instansi ?></td>
   <td><?php echo $lap1->nama_pemesan .'&nbsp;&nbsp;/&nbsp;&nbsp;'. $lap1->no_telp ?></td>
   <td><?php echo $format1 .'&nbsp;&nbsp;-&nbsp;&nbsp;'. $format2?></td>
   <td><?php echo $lap1->kegiatan ?></td>
   <td align="center"><?php echo $lap1->jumlah_tamu ?></td>
   </tr>
   <?php } ?>
   </tbody>
   <tr>
     <td colspan="5" height="30px" style="font-size:16px;" align="right"> <b>TOTAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </td>
     <td align="center" style="font-size:16px;"> <b><?php echo $caritotaltahun1[0]->jumlahpeserta; ?></b> </td>
   </tr>
 </table>
 <!-- <div style="page-break-before: always;"></div> -->
 <br>
 <h4><b> FEBRUARI </b></h4>
<table border="1" bordercolor="#ccc" STYLE="BORDER-COLLAPSE:COLLAPSE;" width="100%">
   <?php include 'thead.php'; ?>
   <tbody>
  <?php
  $no = 1;
  foreach ($cari2 as $lap1)
  {
       $tanggal1 =  $lap1->tgl_checkin;
       $tanggal2 =  $lap1->tgl_checkout;
       $format1 = date('d F Y', strtotime($tanggal1 ));
       $format2 = date('d F Y', strtotime($tanggal2 ));
  ?>
 <tr>
   <td><?php echo $no++ ?></td>
   <td><?php echo $lap1->instansi ?></td>
   <td><?php echo $lap1->nama_pemesan .'&nbsp;&nbsp;/&nbsp;&nbsp;'. $lap1->no_telp ?></td>
   <td><?php echo $format1 .'&nbsp;&nbsp;-&nbsp;&nbsp;'. $format2?></td>
   <td><?php echo $lap1->kegiatan ?></td>
   <td align="center"><?php echo $lap1->jumlah_tamu ?></td>
   </tr>
   <?php } ?>
   </tbody>
   <tr>
     <td colspan="5" height="30px" style="font-size:16px;" align="right"> <b>TOTAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </td>
     <td align="center" style="font-size:16px;"> <b><?php echo $caritotaltahun2[0]->jumlahpeserta; ?></b> </td>
   </tr>
 </table>
 <br>
 <h4><b> MARET </b></h4>
<table border="1" bordercolor="#ccc" STYLE="BORDER-COLLAPSE:COLLAPSE;" width="100%">
   <?php include 'thead.php'; ?>
   <tbody>
  <?php
  $no = 1;
  foreach ($cari3 as $lap1)
  {
       $tanggal1 =  $lap1->tgl_checkin;
       $tanggal2 =  $lap1->tgl_checkout;
       $format1 = date('d F Y', strtotime($tanggal1 ));
       $format2 = date('d F Y', strtotime($tanggal2 ));
  ?>
 <tr>
   <td><?php echo $no++ ?></td>
   <td><?php echo $lap1->instansi ?></td>
   <td><?php echo $lap1->nama_pemesan .'&nbsp;&nbsp;/&nbsp;&nbsp;'. $lap1->no_telp ?></td>
   <td><?php echo $format1 .'&nbsp;&nbsp;-&nbsp;&nbsp;'. $format2?></td>
   <td><?php echo $lap1->kegiatan ?></td>
   <td align="center"><?php echo $lap1->jumlah_tamu ?></td>
   </tr>
   <?php } ?>
   </tbody>
   <tr>
     <td colspan="5" height="30px" style="font-size:16px;" align="right"> <b>TOTAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </td>
     <td align="center" style="font-size:16px;"> <b><?php echo $caritotaltahun3[0]->jumlahpeserta; ?></b> </td>
   </tr>
 </table>
 <br>
 <h4><b> APRIL </b></h4>
<table border="1" bordercolor="#ccc" STYLE="BORDER-COLLAPSE:COLLAPSE;" width="100%">
   <?php include 'thead.php'; ?>
   <tbody>
  <?php
  $no = 1;
  foreach ($cari4 as $lap1)
  {
       $tanggal1 =  $lap1->tgl_checkin;
       $tanggal2 =  $lap1->tgl_checkout;
       $format1 = date('d F Y', strtotime($tanggal1 ));
       $format2 = date('d F Y', strtotime($tanggal2 ));
  ?>
 <tr>
   <td><?php echo $no++ ?></td>
   <td><?php echo $lap1->instansi ?></td>
   <td><?php echo $lap1->nama_pemesan .'&nbsp;&nbsp;/&nbsp;&nbsp;'. $lap1->no_telp ?></td>
   <td><?php echo $format1 .'&nbsp;&nbsp;-&nbsp;&nbsp;'. $format2?></td>
   <td><?php echo $lap1->kegiatan ?></td>
   <td align="center"><?php echo $lap1->jumlah_tamu ?></td>
   </tr>
   <?php } ?>
   </tbody>
   <tr>
     <td colspan="5" height="30px" style="font-size:16px;" align="right"> <b>TOTAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </td>
     <td align="center" style="font-size:16px;"> <b><?php echo $caritotaltahun4[0]->jumlahpeserta; ?></b> </td>
   </tr>
 </table>
 <br>
 <h4><b> MEI </b></h4>
<table border="1" bordercolor="#ccc" STYLE="BORDER-COLLAPSE:COLLAPSE;" width="100%">
   <?php include 'thead.php'; ?>
   <tbody>
  <?php
  $no = 1;
  foreach ($cari5 as $lap1)
  {
       $tanggal1 =  $lap1->tgl_checkin;
       $tanggal2 =  $lap1->tgl_checkout;
       $format1 = date('d F Y', strtotime($tanggal1 ));
       $format2 = date('d F Y', strtotime($tanggal2 ));
  ?>
 <tr>
   <td><?php echo $no++ ?></td>
   <td><?php echo $lap1->instansi ?></td>
   <td><?php echo $lap1->nama_pemesan .'&nbsp;&nbsp;/&nbsp;&nbsp;'. $lap1->no_telp ?></td>
   <td><?php echo $format1 .'&nbsp;&nbsp;-&nbsp;&nbsp;'. $format2?></td>
   <td><?php echo $lap1->kegiatan ?></td>
   <td align="center"><?php echo $lap1->jumlah_tamu ?></td>
   </tr>
   <?php } ?>
   </tbody>
   <tr>
     <td colspan="5" height="30px" style="font-size:16px;" align="right"> <b>TOTAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </td>
     <td align="center" style="font-size:16px;"> <b><?php echo $caritotaltahun5[0]->jumlahpeserta; ?></b> </td>
   </tr>
 </table>
 <br>
 <h4><b> JUNI </b></h4>
<table border="1" bordercolor="#ccc" STYLE="BORDER-COLLAPSE:COLLAPSE;" width="100%">
   <?php include 'thead.php'; ?>
   <tbody>
  <?php
  $no = 1;
  foreach ($cari6 as $lap1)
  {
       $tanggal1 =  $lap1->tgl_checkin;
       $tanggal2 =  $lap1->tgl_checkout;
       $format1 = date('d F Y', strtotime($tanggal1 ));
       $format2 = date('d F Y', strtotime($tanggal2 ));
  ?>
 <tr>
   <td><?php echo $no++ ?></td>
   <td><?php echo $lap1->instansi ?></td>
   <td><?php echo $lap1->nama_pemesan .'&nbsp;&nbsp;/&nbsp;&nbsp;'. $lap1->no_telp ?></td>
   <td><?php echo $format1 .'&nbsp;&nbsp;-&nbsp;&nbsp;'. $format2?></td>
   <td><?php echo $lap1->kegiatan ?></td>
   <td align="center"><?php echo $lap1->jumlah_tamu ?></td>
   </tr>
   <?php } ?>
   </tbody>
   <tr>
     <td colspan="5" height="30px" style="font-size:16px;" align="right"> <b>TOTAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </td>
     <td align="center" style="font-size:16px;"> <b><?php echo $caritotaltahun6[0]->jumlahpeserta; ?></b> </td>
   </tr>
 </table>

 <br>
 <h4><b> JULI </b></h4>
<table border="1" bordercolor="#ccc" STYLE="BORDER-COLLAPSE:COLLAPSE;" width="100%">
   <?php include 'thead.php'; ?>
   <tbody>
  <?php
  $no = 1;
  foreach ($cari7 as $lap1)
  {
       $tanggal1 =  $lap1->tgl_checkin;
       $tanggal2 =  $lap1->tgl_checkout;
       $format1 = date('d F Y', strtotime($tanggal1 ));
       $format2 = date('d F Y', strtotime($tanggal2 ));
  ?>
 <tr>
   <td><?php echo $no++ ?></td>
   <td><?php echo $lap1->instansi ?></td>
   <td><?php echo $lap1->nama_pemesan .'&nbsp;&nbsp;/&nbsp;&nbsp;'. $lap1->no_telp ?></td>
   <td><?php echo $format1 .'&nbsp;&nbsp;-&nbsp;&nbsp;'. $format2?></td>
   <td><?php echo $lap1->kegiatan ?></td>
   <td align="center"><?php echo $lap1->jumlah_tamu ?></td>
   </tr>
   <?php } ?>
   </tbody>
   <tr>
     <td colspan="5" height="30px" style="font-size:16px;" align="right"> <b>TOTAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </td>
     <td align="center" style="font-size:16px;"> <b><?php echo $caritotaltahun7[0]->jumlahpeserta; ?></b> </td>
   </tr>
 </table>
 <br>
 <h4><b> AGUSTUS </b></h4>
<table border="1" bordercolor="#ccc" STYLE="BORDER-COLLAPSE:COLLAPSE;" width="100%">
   <?php include 'thead.php'; ?>
   <tbody>
  <?php
  $no = 1;
  foreach ($cari8 as $lap1)
  {
       $tanggal1 =  $lap1->tgl_checkin;
       $tanggal2 =  $lap1->tgl_checkout;
       $format1 = date('d F Y', strtotime($tanggal1 ));
       $format2 = date('d F Y', strtotime($tanggal2 ));
  ?>
 <tr>
   <td><?php echo $no++ ?></td>
   <td><?php echo $lap1->instansi ?></td>
   <td><?php echo $lap1->nama_pemesan .'&nbsp;&nbsp;/&nbsp;&nbsp;'. $lap1->no_telp ?></td>
   <td><?php echo $format1 .'&nbsp;&nbsp;-&nbsp;&nbsp;'. $format2?></td>
   <td><?php echo $lap1->kegiatan ?></td>
   <td align="center"><?php echo $lap1->jumlah_tamu ?></td>
   </tr>
   <?php } ?>
   </tbody>
   <tr>
     <td colspan="5" height="30px" style="font-size:16px;" align="right"> <b>TOTAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </td>
     <td align="center" style="font-size:16px;"> <b><?php echo $caritotaltahun8[0]->jumlahpeserta; ?></b> </td>
   </tr>
 </table>
 <br>
 <h4><b> SEPTEMBER </b></h4>
<table border="1" bordercolor="#ccc" STYLE="BORDER-COLLAPSE:COLLAPSE;" width="100%">
   <?php include 'thead.php'; ?>
   <tbody>
  <?php
  $no = 1;
  foreach ($cari9 as $lap1)
  {
       $tanggal1 =  $lap1->tgl_checkin;
       $tanggal2 =  $lap1->tgl_checkout;
       $format1 = date('d F Y', strtotime($tanggal1 ));
       $format2 = date('d F Y', strtotime($tanggal2 ));
  ?>
 <tr>
   <td><?php echo $no++ ?></td>
   <td><?php echo $lap1->instansi ?></td>
   <td><?php echo $lap1->nama_pemesan .'&nbsp;&nbsp;/&nbsp;&nbsp;'. $lap1->no_telp ?></td>
   <td><?php echo $format1 .'&nbsp;&nbsp;-&nbsp;&nbsp;'. $format2?></td>
   <td><?php echo $lap1->kegiatan ?></td>
   <td align="center"><?php echo $lap1->jumlah_tamu ?></td>
   </tr>
   <?php } ?>
   </tbody>
   <tr>
     <td colspan="5" height="30px" style="font-size:16px;" align="right"> <b>TOTAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </td>
     <td align="center" style="font-size:16px;"> <b><?php echo $caritotaltahun9[0]->jumlahpeserta; ?></b> </td>
   </tr>
 </table>
 <br>
 <h4><b> OKTOBER </b></h4>
<table border="1" bordercolor="#ccc" STYLE="BORDER-COLLAPSE:COLLAPSE;" width="100%">
   <?php include 'thead.php'; ?>
   <tbody>
  <?php
  $no = 1;
  foreach ($cari10 as $lap1)
  {
       $tanggal1 =  $lap1->tgl_checkin;
       $tanggal2 =  $lap1->tgl_checkout;
       $format1 = date('d F Y', strtotime($tanggal1 ));
       $format2 = date('d F Y', strtotime($tanggal2 ));
  ?>
 <tr>
   <td><?php echo $no++ ?></td>
   <td><?php echo $lap1->instansi ?></td>
   <td><?php echo $lap1->nama_pemesan .'&nbsp;&nbsp;/&nbsp;&nbsp;'. $lap1->no_telp ?></td>
   <td><?php echo $format1 .'&nbsp;&nbsp;-&nbsp;&nbsp;'. $format2?></td>
   <td><?php echo $lap1->kegiatan ?></td>
   <td align="center"><?php echo $lap1->jumlah_tamu ?></td>
   </tr>
   <?php } ?>
   </tbody>
   <tr>
     <td colspan="5" height="30px" style="font-size:16px;" align="right"> <b>TOTAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </td>
     <td align="center" style="font-size:16px;"> <b><?php echo $caritotaltahun10[0]->jumlahpeserta; ?></b> </td>
   </tr>
 </table>
 <br>
 <h4><b> NOVEMBER </b></h4>
<table border="1" bordercolor="#ccc" STYLE="BORDER-COLLAPSE:COLLAPSE;" width="100%">
   <?php include 'thead.php'; ?>
   <tbody>
  <?php
  $no = 1;
  foreach ($cari11 as $lap1)
  {
       $tanggal1 =  $lap1->tgl_checkin;
       $tanggal2 =  $lap1->tgl_checkout;
       $format1 = date('d F Y', strtotime($tanggal1 ));
       $format2 = date('d F Y', strtotime($tanggal2 ));
  ?>
 <tr>
   <td><?php echo $no++ ?></td>
   <td><?php echo $lap1->instansi ?></td>
   <td><?php echo $lap1->nama_pemesan .'&nbsp;&nbsp;/&nbsp;&nbsp;'. $lap1->no_telp ?></td>
   <td><?php echo $format1 .'&nbsp;&nbsp;-&nbsp;&nbsp;'. $format2?></td>
   <td><?php echo $lap1->kegiatan ?></td>
   <td align="center"><?php echo $lap1->jumlah_tamu ?></td>
   </tr>
   <?php } ?>
   </tbody>
   <tr>
     <td colspan="5" height="30px" style="font-size:16px;" align="right"> <b>TOTAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </td>
     <td align="center" style="font-size:16px;"> <b><?php echo $caritotaltahun11[0]->jumlahpeserta; ?></b> </td>
   </tr>
 </table>
 <br>
 <h4><b> DESEMBER </b></h4>
<table border="1" bordercolor="#ccc" STYLE="BORDER-COLLAPSE:COLLAPSE;" width="100%">
   <?php include 'thead.php'; ?>
   <tbody>
  <?php
  $no = 1;
  foreach ($cari12 as $lap1)
  {
       $tanggal1 =  $lap1->tgl_checkin;
       $tanggal2 =  $lap1->tgl_checkout;
       $format1 = date('d F Y', strtotime($tanggal1 ));
       $format2 = date('d F Y', strtotime($tanggal2 ));
  ?>
 <tr>
   <td><?php echo $no++ ?></td>
   <td><?php echo $lap1->instansi ?></td>
   <td><?php echo $lap1->nama_pemesan .'&nbsp;&nbsp;/&nbsp;&nbsp;'. $lap1->no_telp ?></td>
   <td><?php echo $format1 .'&nbsp;&nbsp;-&nbsp;&nbsp;'. $format2?></td>
   <td><?php echo $lap1->kegiatan ?></td>
   <td align="center"><?php echo $lap1->jumlah_tamu ?></td>
   </tr>
   <?php } ?>
   </tbody>
   <tr>
     <td colspan="5" height="30px" style="font-size:16px;" align="right"> <b>TOTAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </td>
     <td align="center" style="font-size:16px;"> <b><?php echo $caritotaltahun12[0]->jumlahpeserta; ?></b> </td>
   </tr>
 </table>
