<?php include "Header.php"; ?>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- /.row --->
      <!-- Main row -->
      <?php
        
        if($bln == 01)
        {
          $bulanku = "JANUARI";
        }
        if($bln == 02)
        {
          $bulanku = "FEBRUARI";
        }
        if($bln == 03)
        {
          $bulanku = "MARET";
        }
        if($bln == 04)
        {
          $bulanku = "APRIL";
        }
        if($bln == 05)
        {
          $bulanku = "MEI";
        }
        if($bln == 06)
        {
          $bulanku = "JUNI";
        }
        if($bln == 07)
        {
          $bulanku = "JULI";
        }
        if($bln == 8)
        {
          $bulanku = "AGUSTUS";
        }
        if($bln == 9)
        {
          $bulanku = "SEPTEMBER";
        }
        if($bln == 10)
        {
          $bulanku = "OKTOBER";
        }
        if($bln == 11)
        {
          $bulanku = "NOVEMBER";
        }
        if($bln == 12){
          $bulanku = "DESEMBER";
        }
       ?>
      <div class="row">
        <div class="col-lg-12 col-xs-12">
         <div class="box box-info">
           <div class="box-header">
             <i class="glyphicon glyphicon-stats"></i>
             <h3 class="box-title">Laporan Bulanan RPCB Syantikara</b></h3>
             <div class="pull-right box-tools">
             </div>
           </div>
               <div class="box-body">
                <form role="form" action="<?php echo base_url(). 'Reporting/indexbulanan'; ?>" method="get" enctype="multipart/form-data">
                 <div class="box-body col-lg-5">
                   <div class="form-group">
                     <label>Pilih Bulan</label>
                     <div class="input-group date">
                       <div class="input-group-addon">
                         <i class="fa fa-calendar"></i>
                       </div>
                       <select name="laporanbulanan" class="form-control" style="width: 100%;" required>
                          <option value=00 selected="selected" disabled="disabled"><?php echo $bulanku; ?></option>
                          <option value=01>Januari</option>
                          <option value=02>Februari</option>
                          <option value=03>Maret</option>
                          <option value=04>April</option>
                          <option value=05>Mei</option>
                          <option value=06>Juni</option>
                          <option value=07>Juli</option>
                          <option value=08>Agustus</option>
                          <option value=09>September</option>
                          <option value=10>Oktober</option>
                          <option value=11>November</option>
                          <option value=12>Desember</option>
                       </select>
                     </div>
                   </div>
                 </div>
                 <div class="box-body col-lg-5">
                   <div class="form-group">
                     <label>Pilih Tahun</label>
                     <div class="input-group date">
                       <div class="input-group-addon">
                         <i class="fa fa-calendar"></i>
                       </div>
                       <select name="laporantahunan" class="form-control" style="width: 100%;" required>
                          <option value=00 selected="selected" disabled="disabled"><?php echo $thn; ?></option>
                          <?php
                            $now=(date('Y')+2);
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
              $caribulan = $this->input->get('laporanbulanan');
              $caritahun = $this->input->get('laporantahunan');
              if($caribulan == 01)
              {
                $bulanku = "JANUARI";
              }
              if($caribulan == 02)
              {
                $bulanku = "FEBRUARI";
              }
              if($caribulan == 03)
              {
                $bulanku = "MARET";
              }
              if($caribulan == 04)
              {
                $bulanku = "APRIL";
              }
              if($caribulan == 05)
              {
                $bulanku = "MEI";
              }
              if($caribulan == 06)
              {
                $bulanku = "JUNI";
              }
              if($caribulan == 07)
              {
                $bulanku = "JULI";
              }
              if($caribulan == 8)
              {
                $bulanku = "AGUSTUS";
              }
              if($caribulan == 9)
              {
                $bulanku = "SEPTEMBER";
              }
              if($caribulan == 10)
              {
                $bulanku = "OKTOBER";
              }
              if($caribulan == 11)
              {
                $bulanku = "NOVEMBER";
              }
              if($caribulan == 12){
                $bulanku = "DESEMBER";
              }

              if($caribulan != "")
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
                            <hr><h4><b><p style="padding-left:0px;"> DAFTAR TAMU RPCB SYANTIKARA <br> <h5>LAPORAN BULAN <?php echo $bulanku; ?> <?php echo $caritahun; ?></b></h5></p></h4></hr><hr>
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
                       <td align="center" style="font-size:16px;"> <b><?php echo $caritotal[0]->jumlahpeserta; ?></b> </td>
                     </tfoot>
                   </table>
                   </div>
                   <br><br>
                   <p align="right">
                     <div class="col-lg-1 pull-right">
                       <form role="form" action="<?php echo base_url(). 'Reporting/ReportBulananPdf'; ?>" method="get" enctype="multipart/form-data" target="_blank">
                           <input type="hidden" name="bulananku" class="form-control" value="<?php echo $caribulan; ?>">
                            <input type="hidden" name="tahunku" class="form-control" value="<?php echo $caritahun; ?>">
                           <input type="hidden" name="bulanankarakter" class="form-control" value="<?php echo $bulanku; ?>">
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
