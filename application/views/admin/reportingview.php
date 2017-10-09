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
             <h3 class="box-title">Laporan Harian RPCB Syantikara</b></h3>
             <div class="pull-right box-tools">
             </div>
           </div>
               <div class="box-body">
                <form role="form" action="<?php echo base_url(). 'Reporting'; ?>" method="get" enctype="multipart/form-data">
                 <div class="box-body col-lg-5">
                   <div class="form-group">
                     <label>Tanggal Awal</label>
                     <div class="input-group date">
                       <div class="input-group-addon">
                         <i class="fa fa-calendar"></i>
                       </div>
                       <input type="text" name="tgl_checkin" class="form-control pull-right field-check-form1 tgl_checkin" id="datepicker1"placeholder="<?php echo $tglcheckin; ?>">
                     </div>
                   </div>
                 </div>
                 <div class="box-body col-lg-6">
                   <div class="form-group">
                     <label>Tanggal Akhir</label>
                     <div class="input-group date">
                       <div class="input-group-addon">
                         <i class="fa fa-calendar"></i>
                       </div>
                       <input type="text" name="tgl_checkout" class="form-control pull-right field-check-form1 tgl_checkout" id="datepicker2" placeholder="<?php echo $tglcheckout; ?>">
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
                $tgl1 = $this->input->get('tgl_checkin');
                $tgl2 = $this->input->get('tgl_checkout');

                $format11 = date('d F Y', strtotime($tgl1 ));
                $format12 = date('d F Y', strtotime($tgl2 ));
              if($tgl1 || $tgl1 != "")
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
                            <hr><h4><b><p style="padding-left:0px;"> DAFTAR TAMU RPCB SYANTIKARA  </b> <br> <h5><b>Periode <?php echo $format11
                            ?> s/d <?php echo $format12 ?> </b></h5></p></h4></hr><hr>
                       </td>
                     </tr>
                   </table>
                   <table id="example2" class="table table-bordered table-striped">
                     <thead>
                     <tr>
                       <th>No</th>
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
                       foreach ($cari as $lap)
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
                     <tfoot>
                       <td colspan="5" height="20px" style="font-size:16px;" align="right"> <b>TOTAL &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </td>
                       <td align="center" style="font-size:16px;"> <b><?php echo $caritotalhari[0]->jumlahpeserta; ?></b> </td>
                     </tfoot>
                   </table>
                   </div>
                   <br><br>
                   <p align="right">
                     <div class="col-lg-1 pull-right">
                       <form role="form" action="<?php echo base_url(). 'Reporting/ReportHarianPdf'; ?>" method="get" enctype="multipart/form-data" target="_blank">
                           <input type="hidden" name="checkin" class="form-control" value="<?php echo $tgl1; ?>">
                           <input type="hidden" name="checkout" class="form-control" value="<?php echo $tgl2; ?>">
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
