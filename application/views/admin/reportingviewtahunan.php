<?php include "Header.php"; ?>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- /.row --->
      <!-- Main row -->
      <div class="row">
        <div class="col-lg-12 col-xs-12">
         <div class="box box-info">
           <div class="box-header">
             <i class="glyphicon glyphicon-stats"></i>
             <h3 class="box-title">Laporan Tahunan RPCB Syantikara</b></h3>
             <div class="pull-right box-tools">
             </div>
           </div>
               <div class="box-body">
                <form role="form" action="<?php echo base_url(). 'Reporting/indextahunan'; ?>" method="get" enctype="multipart/form-data">
                 <div class="box-body col-lg-11">
                   <div class="form-group">
                     <label>Pilih Tahun</label>
                     <div class="input-group date">
                       <div class="input-group-addon">
                         <i class="fa fa-calendar"></i>
                       </div>
                       <select name="laporantahunan" class="form-control" style="width: 100%;" required>
                          <option value=00 selected="selected" disabled="disabled"><?php echo $thn; ?></option>
                          <?php
                            $now=(date('Y') + 2);
                            for ($a=2010;$a<=$now;$a++)
                            {
                                 echo "<option value='$a'>$a</option>";
                            }
                          ?>
                       </select>
                     </div>
                   </div>
                 </div>
                 <div class="box-body col-lg-1">
                   <div class="form-group">
                     <label></label>
                     <div class="input-group date">
                       <input type="submit" name="submit" value="Tampilkan" class="btn btn-success btn-sm btn-flat" style="margin-top:7px;">
                     </div>
                   </div>
                 </div>
               </form>
            <?php
              $caritahun = $this->input->get('laporantahunan');

              if($caritahun != "")
              {
                if(count($cari) > 0)
                {
               ?>
                 <div class="box-body col-lg-12">
                   <div id="printdata">
                   <table width="100%" border="0">
                     <tr>
                       <td colspan="8" align="center">
                         <h3 style="padding-left:0px;"><b> RPCB SYANTIKARA </b></h3>
                         <p style="padding-left:0px;">Jl. Colombo CT VI / 001, Yogyakarta </p>
                        <p style="padding-left:0px; margin-top:-10px;"> Telp. (0274) 562263 </p>
                       </td>
                     </tr>
                     <tr>
                       <td colspan="8" align="center">
                            <hr><h4><b><p style="padding-left:0px;"> DAFTAR TAMU RPCB SYANTIKARA <br> <h5>LAPORAN TAHUN <?php echo $caritahun; ?></b></h5></p></h4></hr><hr>
                       </td>
                     </tr>
                   </table>
                   <h4><b> JANUARI </b></h4>
                   <table id="januari" class="table table-bordered table-striped">
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
                     <tfoot>
                       <td colspan="5" height="20px" style="font-size:16px;" align="right"> <b>TOTAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </td>
                       <td align="center" style="font-size:16px;"> <b><?php echo $caritotaltahun1[0]->jumlahpeserta; ?></b> </td>
                     </tfoot>
                   </table>
                   <br>
                   <h4><b> FEBRUARI </b></h4>
                   <table id="februari" class="table table-bordered table-striped">
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
                     <tfoot>
                       <td colspan="5" height="20px" style="font-size:16px;" align="right"> <b>TOTAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </td>
                       <td align="center" style="font-size:16px;"> <b><?php echo $caritotaltahun2[0]->jumlahpeserta; ?></b> </td>
                     </tfoot>
                   </table>
                   <br>
                   <h4><b> MARET </b></h4>
                   <table id="maret" class="table table-bordered table-striped">
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
                     <tfoot>
                       <td colspan="5" height="20px" style="font-size:16px;" align="right"> <b>TOTAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </td>
                       <td align="center" style="font-size:16px;"> <b><?php echo $caritotaltahun3[0]->jumlahpeserta; ?></b> </td>
                     </tfoot>
                   </table>
                   <br>
                   <h4><b> APRIL </b></h4>
                   <table id="april" class="table table-bordered table-striped">
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
                     <tfoot>
                       <td colspan="5" height="20px" style="font-size:16px;" align="right"> <b>TOTAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </td>
                       <td align="center" style="font-size:16px;"> <b><?php echo $caritotaltahun4[0]->jumlahpeserta; ?></b> </td>
                     </tfoot>
                   </table>
                   <br>
                   <h4><b> MEI </b></h4>
                   <table id="mei" class="table table-bordered table-striped">
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
                     <tfoot>
                       <td colspan="5" height="20px" style="font-size:16px;" align="right"> <b>TOTAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </td>
                       <td align="center" style="font-size:16px;"> <b><?php echo $caritotaltahun5[0]->jumlahpeserta; ?></b> </td>
                     </tfoot>
                   </table>
                   <br>
                   <h4><b> JUNI </b></h4>
                   <table id="juni" class="table table-bordered table-striped">
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
                     <tfoot>
                       <td colspan="5" height="20px" style="font-size:16px;" align="right"> <b>TOTAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </td>
                       <td align="center" style="font-size:16px;"> <b><?php echo $caritotaltahun6[0]->jumlahpeserta; ?></b> </td>
                     </tfoot>
                   </table>

                   <br>
                   <h4><b> JULI </b></h4>
                   <table id="juli" class="table table-bordered table-striped">
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
                     <tfoot>
                       <td colspan="5" height="20px" style="font-size:16px;" align="right"> <b>TOTAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </td>
                       <td align="center" style="font-size:16px;"> <b><?php echo $caritotaltahun7[0]->jumlahpeserta; ?></b> </td>
                     </tfoot>
                   </table>
                   <br>
                   <h4><b> AGUSTUS </b></h4>
                   <table id="agustus" class="table table-bordered table-striped">
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
                     <tfoot>
                       <td colspan="5" height="20px" style="font-size:16px;" align="right"> <b>TOTAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </td>
                       <td align="center" style="font-size:16px;"> <b><?php echo $caritotaltahun8[0]->jumlahpeserta; ?></b> </td>
                     </tfoot>
                   </table>
                   <br>
                   <h4><b> SEPTEMBER </b></h4>
                   <table id="september" class="table table-bordered table-striped">
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
                     <tfoot>
                       <td colspan="5" height="20px" style="font-size:16px;" align="right"> <b>TOTAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </td>
                       <td align="center" style="font-size:16px;"> <b><?php echo $caritotaltahun9[0]->jumlahpeserta; ?></b> </td>
                     </tfoot>
                   </table>
                   <br>
                   <h4><b> OKTOBER </b></h4>
                   <table id="oktober" class="table table-bordered table-striped">
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
                     <tfoot>
                       <td colspan="5" height="20px" style="font-size:16px;" align="right"> <b>TOTAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </td>
                       <td align="center" style="font-size:16px;"> <b><?php echo $caritotaltahun10[0]->jumlahpeserta; ?></b> </td>
                     </tfoot>
                   </table>
                   <br>
                   <h4><b> NOVEMBER </b></h4>
                   <table id="november" class="table table-bordered table-striped">
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
                     <tfoot>
                       <td colspan="5" height="20px" style="font-size:16px;" align="right"> <b>TOTAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </td>
                       <td align="center" style="font-size:16px;"> <b><?php echo $caritotaltahun11[0]->jumlahpeserta; ?></b> </td>
                     </tfoot>
                   </table>
                   <br>
                   <h4><b> DESEMBER </b></h4>
                   <table id="desember" class="table table-bordered table-striped">
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
                     <tfoot>
                       <td colspan="5" height="20px" style="font-size:16px;" align="right"> <b>TOTAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </td>
                       <td align="center" style="font-size:16px;"> <b><?php echo $caritotaltahun12[0]->jumlahpeserta; ?></b> </td>
                     </tfoot>
                   </table>
                   </div>
                   <br><br>
                   <p align="right">
                     <div class="col-lg-1 pull-right">
                       <form role="form" action="<?php echo base_url(). 'Reporting/ReportTahunanPdf'; ?>" method="get" enctype="multipart/form-data" target="_blank">
                           <input type="hidden" name="laporantahun" class="form-control" value="<?php echo $caritahun; ?>">
                           <input type="submit" name="submit" value="Generate" class="btn btn-success" target="_blank">
                       </form>
                     </div>
                     <div class="col-lg-1 pull-right">
                       <button class="btn btn-success" onclick="printContent('printdata')" target="_blank"> Print Data</button>
                     </div>
                  </p>
                  <?php
                      }else{
                  ?>
                   <div class="error-page">
                      <h2 class="headline text-yellow"> 404</h2>
                      <div class="error-content">
                        <h3><i class="fa fa-warning text-yellow"></i> Oops! Data not found.</h3>
                        <p>
                          We could not find the data you were looking for.
                          Meanwhile, you may return to dashboard.
                        </p>
                      </div>
                      <!-- /.error-content- -->
                    </div>
                    <br><br><br>
                  <?php
                    }
                  }else{
                   ?>
                   <div class="error-page field-checkcari">
                       <h2 class="headline text-yellow"> 404</h2>
                       <div class="error-content">
                         <h3><i class="fa fa-warning text-yellow"></i> Oops! Data not found.</h3>
                         <p>
                           We could not find the data you were looking for.
                           Meanwhile, you may return to dashboard.
                         </p>
                       </div>
                       <!-- /.error-content -->
                     </div>
                     <br><br><br>
                   <?php } ?>
               </div>
            </div>
         </div>
        <!-- Left col -->
      </div>
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>
  function printContent(el){
  	var restorepage = document.body.innerHTML;
  	var printcontent = document.getElementById(el).innerHTML;
  	document.body.innerHTML = printcontent;
  	window.print();
  	document.body.innerHTML = restorepage;
  }
  </script>
<?php include "Footer.php"; ?>
