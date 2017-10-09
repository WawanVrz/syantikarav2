<?php include "terbilang.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Nota Pembayaran Reservasi </title>
<base href="<?php echo base_url();?>" />
<base src="<?php echo base_url();?>" />
</head>
<body>
<!-- ================================================================================================================================================== -->
<table border="1" bordercolor="#000" STYLE="BORDER-COLLAPSE:COLLAPSE;" width="106%">
  <tr>
    <td>
      <table border="0" bordercolor="#ccc" STYLE="BORDER-COLLAPSE:COLLAPSE;" width="100%">
        <tr>
          <td align="center"  colspan="3">
            <h3 style="padding-left:0px; font-size:18px;"><b> RPCB SYANTIKARA </b></h3>
            <p style="padding-left:0px; padding-top:-15px;"><b>Jl. COLOMBO CT VI / 001, Telp. (0274) 562263 </b></p>
           <p style="padding-left:0px; padding-top:-15px;"><b>YOGYAKARTA </b></p><hr>
          </td>
        </tr>
        <tr>
          <td align="center" colspan="3">
            <h4 style="padding-left:0px;"><b><u> BUKTI PENERIMAAN UANG </u></b></h4>
          </td>
        </tr>
        <?php
          foreach ($detilreservasi as $dr)
          {

            $angka = $dr->total_bayar;
            $angka2 = $dr->total_bayar2;
            $angkadp = $dr->dp;
            $angkareduksi = $dr->reduksi;
            $angkasudahterbayarkan = $dr->Jumlah_Terbayarkan;
            $angkasudahterbayarkanAfter = $dr->Jumlah_TerbayarkanAfter;
            if($angkasudahterbayarkanAfter == 0)
            {
              $totalbayarfinal1 = ($angka - $angkadp - $angkareduksi);
            }else {
              $totalbayarfinal1 = ($angka2 - $angkadp - $angkareduksi - $angkasudahterbayarkan);
            }

            $angka_format = number_format($totalbayarfinal1,2,",",".");
            $terbilangrupiah = ucwords(terbilang($totalbayarfinal1));

            $tanggal1 =  $dr->tgl_checkin;
            $tanggal2 =  $dr->tgl_checkout;
            $format1 = date('d F Y', strtotime($tanggal1 ));
            $format2 = date('d F Y', strtotime($tanggal2 ));
        ?>
        <tr style="font-size:16px;">
          <td width="20%" height="30px"><b>&nbsp; Telah Terima Dari </b></td>
          <td width="2%"><b> : </b></td>
          <td><b> <?php echo $dr->instansi; ?> </b></td>
        </tr>
        <tr style="font-size:16px;">
          <td width="20%" height="30px;"><b>&nbsp; Banyaknya Uang </b></td>
          <td width="2%"><b> : </b></td>
          <td><b> Rp &nbsp;<?php echo $angka_format; ?> </b></td>
        </tr>
        <tr style="font-size:16px;">
          <td width="15%" height="30px;"><b>&nbsp; Terbilang </b></td>
          <td width="2%"><b> : </b></td>
          <td><b> <?php echo $terbilangrupiah; ?> Rupiah</b></td>
        </tr>
        <tr style="font-size:16px;">
          <td width="30%" height="30px;"><b>&nbsp; Untuk Pembayaran </b></td>
          <td width="2%"><b> : </b></td>
          <td><b> <?php echo $dr->nama_jasa; ?> Tgl <?php echo $format1 .'&nbsp;&nbsp;-&nbsp;&nbsp;'. $format2?> </b></td>
        </tr>
        <tr style="font-size:16px;" >
          <td width="20%" height="45px;"></td>
          <td width="2%"></td>
          <td><b> </b></td>
        </tr>
        <?php } ?>
      </table>
      <table border="1" bordercolor="#000" STYLE="BORDER-COLLAPSE:COLLAPSE;" width="100%">
        <tr style="text-align:center;">
          <td width="25%"> <b>Mengetahui</b> </td>
          <td width="25%"> <b>Pengguna</b> </td>
          <td width="25%"> <b>Penerima</b> </td>
          <td width="25%"> <b>Tanggal</b> </td>
        </tr>
        <tr style="text-align:center;" height="100px;">
          <td>
            <br><br><br>
            <?php
              foreach ($namapj as $pj)
              {
                  echo "<b>". $pj->name ."</b>";
              }
             ?>
          </td>
          <td>
            <br><br><br>
            <b></b>
          </td>
          <td>
            <br><br><br>
            <b></b>
          </td>
          <td>
            <b>
            <?php
                date_default_timezone_set("Asia/Jakarta");
                $date = date('d/m/Y');
                echo $date;
            ?>
          </b>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<b>No. Rek. Bank Mandiri Cab. UGM, 137 - 00 - 7373000 - 0, a/n. YAYASAN SYANTIKARA.RPCB</b>

<!-- ================================================================================================================================================== -->

<div style="page-break-before: always;"></div>
<table border="0" bordercolor="#000" STYLE="BORDER-COLLAPSE:COLLAPSE;" width="106%">
  <tr>
    <td>
      <?php
        foreach ($detilreservasi as $dr)
        {
      ?>
      <table border="1" bordercolor="#000" STYLE="BORDER-COLLAPSE:COLLAPSE;" width="100%">
        <tr>
          <td align="left">
            <p style="padding-left:0px; font-size:18px;"><b> RPCB Syantikara </b></p>
            <p style="padding-left:0px; padding-top:-14px; font-size:12px;">Jl. Colombo CT VI / 001, Yogyakarta 55221 </p>
            <p style="padding-left:0px; padding-top:-14px; font-size:12px;">Ph. 0274-562263, 087892399277</p>
            <p style="padding-left:0px; padding-top:-14px; font-size:12px;">Fax: 0274515805 </p>
          </td>
          <td align="center"
            <h3 style="padding-left:0px; font-size:18px;"><b> Kwitansi Pembayaran </b></h3><br><br>
          </td>
          <td align="left">
            <p style="padding-left:0px; font-size:12px;"><b>Yogyakarta, &nbsp;&nbsp;<?php echo $date; ?> </b></p>
            <p style="padding-left:0px; padding-top:-12px; font-size:12px;"><b>Kepada Yth. &nbsp;&nbsp;&nbsp;<?php echo $dr->instansi; ?> </b></p>
            <p style="padding-left:0px; padding-top:-12px; font-size:12px;"><b>Alamat: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo "Yogyakarta"; ?> </b></p>
          </td>
        </tr>
      <?php } ?>
      </table>
      <hr color ="black" width="100%">
      <table border="0" bordercolor="#000" STYLE="BORDER-COLLAPSE:COLLAPSE;" width="100%">
        <tr>
          <td width="5%" style="font-size:14px;" height="30px;"> </td>
          <td width="30%" style="font-size:14px;"> <b>Nama Jasa</b> </td>
          <td style="font-size:14px;"> <b>Quantity</b> </td>
          <td style="font-size:14px;"> <b>Hari</b> </td>
          <td style="font-size:14px;"> <b>Harga</b> </td>
          <td style="font-size:14px;" align="right"> <b>Total</b> </td>
        </tr>
      </table>
      <hr color ="black" width="100%">
      <table border="0" align="center" bordercolor="#000" STYLE="BORDER-COLLAPSE:COLLAPSE;" width="100%">
        <?php
        $no = 1;
        foreach ($detiljasa as $djs)
        {
          $angka1= $djs->tarif;
          $angka_format1 = number_format($angka1,0,",",".");
          $angka2= $djs->Total;
          $angka_format2 = number_format($angka2,0,",",".");
        ?>
        <tr align="left">
          <td width="5%" style="font-size:14px;" height="30px;"> <b><?php echo "-"; ?> </b></td>
          <td width="35%" style="font-size:14px;"> <?php echo $djs->nama_jasa; ?> </td>
          <td style="font-size:14px;" align="center"> <?php echo $djs->jumlah_tamu; ?> </td>
          <td style="font-size:14px;" align="center"> <?php echo $djs->selisihhari; ?> </td>
          <td style="font-size:14px;" align="center"> <?php echo $angka_format1; ?> </td>
          <td style="font-size:14px;" align="right"> <?php echo $angka_format2; ?> </td>
        </tr>
        <?php } ?>
        <?php
        $no = 1;
        foreach ($detiljasakonsumsi as $djsk)
        {
          $angka1= $djsk->hargatarif;
          $angka_format1 = number_format($angka1,0,",",".");
          $angka2= $djsk->TotalJumlah;
          $angka_format2 = number_format($angka2,0,",",".");
        ?>
        <tr align="left">
          <td width="5%" style="font-size:14px;" height="30px;"> <b><?php echo "-"; ?> </b></td>
          <td width="30%" style="font-size:14px;"> <?php echo $djsk->nama_jasa; ?> </td>
          <td style="font-size:14px;" align="center"> <?php echo $djsk->Quantity; ?> </td>
          <td style="font-size:14px;" align="center"> <?php echo 1 ?> </td>
          <td style="font-size:14px;" align="center"> <?php echo $angka_format1; ?> </td>
          <td style="font-size:14px;" align="right"> <?php echo $angka_format2; ?> </td>
        </tr>
        <?php } ?>
        <?php
        $no = 1;
        foreach ($detiljasakontribusitempat as $djskt)
        {
          $angka1= $djskt->hargatarif;
          $angka_format1 = number_format($angka1,0,",",".");
          $angka2= $djskt->TotalJumlah;
          $angka_format2 = number_format($angka2,0,",",".");
        ?>
        <tr align="left">
          <td width="5%" style="font-size:14px;" height="30px;"> <b><?php echo "-"; ?> </b></td>
          <td width="30%" style="font-size:14px;"> <?php echo $djskt->nama_jasa; ?> </td>
          <td style="font-size:14px;" align="center"> <?php echo $djskt->Quantity; ?> </td>
          <td style="font-size:14px;" align="center"> <?php echo 1 ?> </td>
          <td style="font-size:14px;" align="center"> <?php echo $angka_format1; ?> </td>
          <td style="font-size:14px;" align="right"> <?php echo $angka_format2; ?> </td>
        </tr>
        <?php } ?>
        <?php
        $no = 1;
        foreach ($detiljasakontribusiyayasan as $djsky)
        {
          $angka1= $djsky->hargatarif;
          $angka_format1 = number_format($angka1,0,",",".");
          $angka2= $djsky->TotalJumlah;
          $angka_format2 = number_format($angka2,0,",",".");
        ?>
        <tr align="left">
          <td width="5%" style="font-size:14px;" height="30px;"> <b><?php echo "-"; ?> </b></td>
          <td width="30%" style="font-size:14px;"> <?php echo $djsky->keterangan; ?> </td>
          <td style="font-size:14px;" align="center"> <?php echo $djsky->Quantity; ?> </td>
          <td style="font-size:14px;" align="center"> <?php echo 1 ?> </td>
          <td style="font-size:14px;" align="center"> <?php echo $angka_format1; ?> </td>
          <td style="font-size:14px;" align="right"> <?php echo $angka_format2; ?> </td>
        </tr>
        <?php } ?>
      </table>
      <hr color ="black" width="100%" style="margin-top:50px;">
        <!-- <P><b> Terbilang : (Dua Puluh Lima Juta Rupiah) </b>
          <span style="margin-left:400px; font-weight:bold;">Total</span>
          <span style="margin-left:100px; font-weight:bold;">20.500.000</span>
        </p> -->
        <?php
          foreach ($detilreservasi as $dr)
          {
            $angka = $dr->total_bayar;
            $angka2 = $dr->total_bayar2;
            $angkadp = $dr->dp;
            $angkareduksi = $dr->reduksi;
            $angkasudahterbayarkan = $dr->Jumlah_Terbayarkan;
            $angkasudahterbayarkanAfter = $dr->Jumlah_TerbayarkanAfter;
            if($angkasudahterbayarkanAfter == 0)
            {
              $totalbayarfinal = ($angka - $angkadp - $angkareduksi);
            }else {
              $totalbayarfinal = ($angka2 - $angkadp - $angkareduksi - $angkasudahterbayarkan);
            }
            $angka_format = number_format($angka,2,",",".");
            $angka_formatdp = number_format($angkadp,2,",",".");
            $angka_formatreduksi = number_format($angkareduksi,2,",",".");
            $angka_formatdinal = number_format($totalbayarfinal,2,",",".");
            $terbilangrupiahtotalfinal = ucwords(terbilang($totalbayarfinal));

            $tanggal1 =  $dr->tgl_checkin;
            $tanggal2 =  $dr->tgl_checkout;
            $format1 = date('d F Y', strtotime($tanggal1 ));
            $format2 = date('d F Y', strtotime($tanggal2 ));
        ?>
        <table border="0" bordercolor="#000" STYLE="BORDER-COLLAPSE:COLLAPSE; font-size:14px;" width="100%">
          <tr>
            <td style="font-size:14px;" colspan="3" width="70%" height="20px;"> <b>Terbilang : (<?php echo $terbilangrupiahtotalfinal ?> Rupiah )</b> </td>
            <td style="font-size:14px;"> <b>Total</b> </td>
            <td style="font-size:14px;" align="right"> <b><?php echo $angka_format; ?></b> </td>
          </tr>
          <tr>
            <td style="font-size:14px;" align="center"> <b>Mengetahui</b> </td>
            <td style="font-size:14px;" align="center"> <b>Pengguna</b> </td>
            <td style="font-size:14px;" align="center"> <b>Penerima</b> </td>
            <td style="font-size:14px;"> <b>Uang Muka</b> </td>
            <td style="font-size:14px;" align="right"> <b><?php echo $angka_formatdp; ?></b> </td>
          </tr>
          <tr>
            <td style="font-size:14px;"> <b></b> </td>
            <td style="font-size:14px;"> <b></b> </td>
            <td style="font-size:14px;"> <b></b> </td>
            <td style="font-size:14px;"> <b>Reduksi </b></td>
            <td style="font-size:14px;" align="right"> <b><?php echo $angka_formatreduksi; ?></b></td>
          </tr>
          <tr>
            <td style="font-size:14px;"> <b></b> </td>
            <td style="font-size:14px;"> <b></b> </td>
            <td style="font-size:14px;"> <b></b> </td>
            <!-- <td style="font-size:14px;"> <b></b></td> -->
            <td colspan="2"> <hr width="100%"> </td>
          </tr>
          <tr>
            <td style="font-size:14px;" align="center">
              <?php
              foreach ($namapj as $pj)
              {
                  echo "<b>". $pj->name ."</b>";
              }
             ?>
           </td>
            <td style="font-size:14px;"> <hr width="150px"> </td>
            <td style="font-size:14px;"> <hr width="150px"> </td>
            <td style="font-size:14px;"> <b>Total Bayar</b> </td>
            <td style="font-size:14px;" align="right"> <b><?php echo $angka_formatdinal; ?></b> </td>
          </tr>
        </table>
        <?php } ?>
      <hr color ="black" width="100%" style="margin-top:10px;">
        <b style="font-size:14px;">Rekening: Bank Mandiri Cab. UGM, 137-00-7373000-0, a/n. YAYASAN SYANTIKARA.RPCB</b>
      <hr color ="black" width="100%" style="margin-top:20px;">
    </td>
  </tr>
</table>

<!-- ================================================================================================================================================== -->

<div style="page-break-before: always;"></div>
<table border="0" bordercolor="#000" STYLE="BORDER-COLLAPSE:COLLAPSE;" width="106%">
  <tr>
    <td>
      <?php
        foreach ($detilreservasi as $dr)
        {
      ?>
      <table border="1" bordercolor="#000" STYLE="BORDER-COLLAPSE:COLLAPSE;" width="100%">
        <tr>
          <td align="left">
            <p style="padding-left:0px; font-size:18px;"><b> RPCB Syantikara </b></p>
            <p style="padding-left:0px; padding-top:-14px; font-size:12px;">Jl. Colombo CT VI / 001, Yogyakarta 55221 </p>
            <p style="padding-left:0px; padding-top:-14px; font-size:12px;">Ph. 0274-562263, 087892399277</p>
            <p style="padding-left:0px; padding-top:-14px; font-size:12px;">Fax: 0274515805 </p>
          </td>
          <td align="center"
            <h3 style="padding-left:0px; font-size:18px;"><b> Kwitansi Pembayaran </b></h3><br><br>
          </td>
          <td align="left">
            <p style="padding-left:0px; font-size:12px;"><b>Yogyakarta, &nbsp;&nbsp;<?php echo $date; ?> </b></p>
            <p style="padding-left:0px; padding-top:-12px; font-size:12px;"><b>Kepada Yth. &nbsp;&nbsp;&nbsp;<?php echo $dr->instansi; ?> </b></p>
            <p style="padding-left:0px; padding-top:-12px; font-size:12px;"><b>Alamat: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo "Yogyakarta"; ?> </b></p>
          </td>
        </tr>
      <?php } ?>
      </table>
      <hr color ="black" width="100%">
      <table border="0" bordercolor="#000" STYLE="BORDER-COLLAPSE:COLLAPSE;" width="100%">
        <tr>
          <td width="5%" style="font-size:14px;" height="30px;"> </td>
          <td width="30%" style="font-size:14px;"> <b>Nama Jasa</b> </td>
          <td width="17%" style="font-size:14px;"> <b>Keterangan </b> </td>
          <td style="font-size:14px;"> <b>Quantity</b> </td>
          <td style="font-size:14px;"> <b>Hari</b> </td>
          <td style="font-size:14px;"> <b>Harga</b> </td>
          <td style="font-size:14px;" align="right"> <b>Total</b> </td>
        </tr>
      </table>
      <hr color ="black" width="100%">
      <table border="0" align="center" bordercolor="#000" STYLE="BORDER-COLLAPSE:COLLAPSE;" width="100%">
        <?php
        $no = 1;
        foreach ($detiljasa as $djs)
        {
          $angka1= $djs->tarif;
          $angka_format1 = number_format($angka1,0,",",".");
          $angka2= $djs->Total;
          $angka_format2 = number_format($angka2,0,",",".");
          $tamu = $djs->jenistamu;
          $tarif = $djs->jenistarif;
          $tariftamu = $tamu.'/'.$tarif;
        ?>
        <tr align="left">
          <td width="5%" style="font-size:14px;" height="30px;"> <b><?php echo "-"; ?> </b></td>
          <td width="30%" style="font-size:14px;"> <?php echo $djs->nama_jasa; ?> </td>
          <td width="20%" style="font-size:14px;"> <?php echo $tariftamu; ?> </td>
          <td align="center" style="font-size:14px;"> <?php echo $djs->jumlah_tamu; ?> </td>
          <td align="center" style="font-size:14px;"> <?php echo $djs->selisihhari; ?> </td>
          <td align="center" style="font-size:14px;"> <?php echo $angka_format1; ?> </td>
          <td align="right" style="font-size:14px;"> <?php echo $angka_format2; ?> </td>
        </tr>
        <?php } ?>
        <?php
        $no = 1;
        foreach ($detiljasakonsumsi as $djsk)
        {
          $angka1= $djsk->hargatarif;
          $angka_format1 = number_format($angka1,0,",",".");
          $angka2= $djsk->TotalJumlah;
          $angka_format2 = number_format($angka2,0,",",".");
        ?>
        <tr align="left">
          <td width="5%" style="font-size:14px;" height="30px;"> <b><?php echo "-"; ?> </b></td>
          <td width="30%" style="font-size:14px;"> <?php echo $djsk->nama_jasa; ?> </td>
          <td width="20%" style="font-size:14px;"> <?php echo $djsk->jenis_additional; ?> </td>
          <td align="center" style="font-size:14px;"> <?php echo $djsk->Quantity; ?> </td>
          <td align="center" style="font-size:14px;"> <?php echo 1 ?> </td>
          <td align="center" style="font-size:14px;"> <?php echo $angka_format1; ?> </td>
          <td align="right" style="font-size:14px;"> <?php echo $angka_format2; ?> </td>
        </tr>
        <?php } ?>
        <?php
        $no = 1;
        foreach ($detiljasakontribusitempat as $djskt)
        {
          $angka1= $djskt->hargatarif;
          $angka_format1 = number_format($angka1,0,",",".");
          $angka2= $djskt->TotalJumlah;
          $angka_format2 = number_format($angka2,0,",",".");
        ?>
        <tr align="left">
          <td width="5%" style="font-size:14px;" height="30px;"> <b><?php echo "-"; ?> </b></td>
          <td width="30%" style="font-size:14px;"> <?php echo $djskt->nama_jasa; ?> </td>
          <td width="20%" style="font-size:14px;"> <?php echo $djskt->nama_ruang; ?> </td>
          <td align="center" style="font-size:14px;"> <?php echo $djskt->Quantity; ?> </td>
          <td align="center" style="font-size:14px;"> <?php echo 1 ?> </td>
          <td align="center" style="font-size:14px;"> <?php echo $angka_format1; ?> </td>
          <td align="right" style="font-size:14px;"> <?php echo $angka_format2; ?> </td>
        </tr>
        <?php } ?>
        <?php
        $no = 1;
        foreach ($detiljasakontribusiyayasan as $djsky)
        {
          $angka1= $djsky->hargatarif;
          $angka_format1 = number_format($angka1,0,",",".");
          $angka2= $djsky->TotalJumlah;
          $angka_format2 = number_format($angka2,0,",",".");
        ?>
        <tr align="left">
          <td width="5%" style="font-size:14px;" height="30px;"> <b><?php echo "-"; ?> </b></td>
          <td width="30%" style="font-size:14px;"> <?php echo $djsky->keterangan; ?> </td>
          <td width="20%" style="font-size:14px;"> <?php echo $djsky->nama_ruang; ?> </td>
          <td align="center" style="font-size:14px;"> <?php echo $djsky->Quantity; ?> </td>
          <td align="center" style="font-size:14px;"> <?php echo 1 ?> </td>
          <td align="center" style="font-size:14px;"> <?php echo $angka_format1; ?> </td>
          <td align="right" style="font-size:14px;"> <?php echo $angka_format2; ?> </td>
        </tr>
        <?php } ?>
      </table>
      <hr color ="black" width="100%" style="margin-top:50px;">
        <!-- <P><b> Terbilang : (Dua Puluh Lima Juta Rupiah) </b>
          <span style="margin-left:400px; font-weight:bold;">Total</span>
          <span style="margin-left:100px; font-weight:bold;">20.500.000</span>
        </p> -->
        <?php
          foreach ($detilreservasi as $dr)
          {
            $angka = $dr->total_bayar;
            $angka2 = $dr->total_bayar2;
            $angkadp = $dr->dp;
            $angkareduksi = $dr->reduksi;
            $angkasudahterbayarkan = $dr->Jumlah_Terbayarkan;
            $angkasudahterbayarkanAfter = $dr->Jumlah_TerbayarkanAfter;
            if($angkasudahterbayarkanAfter == 0)
            {
              $totalbayarfinal = ($angka - $angkadp - $angkareduksi);
            }else {
              $totalbayarfinal = ($angka2 - $angkadp - $angkareduksi - $angkasudahterbayarkan);
            }
            $angka_format = number_format($angka,2,",",".");
            $angka_formatdp = number_format($angkadp,2,",",".");
            $angka_formatreduksi = number_format($angkareduksi,2,",",".");
            $angka_formatdinal = number_format($totalbayarfinal,2,",",".");
            $terbilangrupiahtotalfinal = ucwords(terbilang($totalbayarfinal));

            $tanggal1 =  $dr->tgl_checkin;
            $tanggal2 =  $dr->tgl_checkout;
            $format1 = date('d F Y', strtotime($tanggal1 ));
            $format2 = date('d F Y', strtotime($tanggal2 ));
        ?>
        <table border="0" bordercolor="#000" STYLE="BORDER-COLLAPSE:COLLAPSE; font-size:14px;" width="100%">
          <tr>
            <td style="font-size:14px;" colspan="3" width="70%" height="20px;"> <b>Terbilang : (<?php echo $terbilangrupiahtotalfinal ?> Rupiah )</b> </td>
            <td style="font-size:14px;"> <b>Total</b> </td>
            <td style="font-size:14px;" align="right"> <b><?php echo $angka_format; ?></b> </td>
          </tr>
          <tr>
            <td style="font-size:14px;" align="center"> <b>Mengetahui</b> </td>
            <td style="font-size:14px;" align="center"> <b>Pengguna</b> </td>
            <td style="font-size:14px;" align="center"> <b>Penerima</b> </td>
            <td style="font-size:14px;"> <b>Uang Muka</b> </td>
            <td style="font-size:14px;" align="right"> <b><?php echo $angka_formatdp; ?></b> </td>
          </tr>
          <tr>
            <td style="font-size:14px;"> <b></b> </td>
            <td style="font-size:14px;"> <b></b> </td>
            <td style="font-size:14px;"> <b></b> </td>
            <td style="font-size:14px;"> <b>Reduksi </b></td>
            <td style="font-size:14px;" align="right"> <b><?php echo $angka_formatreduksi; ?></b></td>
          </tr>
          <tr>
            <td style="font-size:14px;"> <b></b> </td>
            <td style="font-size:14px;"> <b></b> </td>
            <td style="font-size:14px;"> <b></b> </td>
            <!-- <td style="font-size:14px;"> <b></b></td> -->
            <td colspan="2"> <hr width="100%"> </td>
          </tr>
          <tr>
            <td style="font-size:14px;" align="center">
              <?php
              foreach ($namapj as $pj)
              {
                  echo "<b>". $pj->name ."</b>";
              }
             ?>
           </td>
            <td style="font-size:14px;"> <hr width="150px"> </td>
            <td style="font-size:14px;"> <hr width="150px"> </td>
            <td style="font-size:14px;"> <b>Total Bayar</b> </td>
            <td style="font-size:14px;" align="right"> <b><?php echo $angka_formatdinal; ?></b> </td>
          </tr>
        </table>
        <?php } ?>
      <hr color ="black" width="100%" style="margin-top:10px;">
        <b style="font-size:14px;">Rekening: Bank Mandiri Cab. UGM, 137-00-7373000-0, a/n. YAYASAN SYANTIKARA.RPCB</b>
      <hr color ="black" width="100%" style="margin-top:20px;">
    </td>
  </tr>
</table>
</body>
</html>
