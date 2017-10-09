<?php include "Header.php"; ?>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <div class="col-lg-12 col-xs-12">
         <div class="box box-info">
           <div class="box-header">
             <i class="fa fa-dashboard"></i>
             <h3 class="box-title">WELCOME : <b> <?php echo $this->session->userdata("fullname"); ?> </b></h3>
             <div class="pull-right box-tools">
             </div>
           </div>
           <div class="box-body">
                   Selamat Datang <br><br>
                   Hai Administrator , selamat datang di halaman Administrator.<br>
                   Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola konten website anda.<br>
                 </div>
                 <div class="box-footer clearfix">
                  <p align="right">
                   <?php
                      date_default_timezone_set("Asia/Jakarta");
                      $today = date("j F Y | h:i:s a");
                      echo "Tanggal : $today"
                   ?>
                 </p>
                 </div>
               </div>
           </div>

           <div class="col-lg-12 col-xs-12">
            <div class="box box-info">
              <div class="box-header">
                <i class="fa fa-home"></i>
                <h3 class="box-title">Visi & Misi RPCB Syantikara</h3>
                <div class="pull-right box-tools">
                </div>
              </div>
                  <div class="box-body">
                          <b> Visi : </b><br><br>
                          Berperan serta dalam pembangunan atau pengembangan gereja dan masyarakat Indonesia yang adil dan sejahtera, khususnya melalui pelayanan rumah pembinaan<br>
                          dengan memperhatikan mereka yang lemah, miskin dan tersingkir serta melestarikan keutuhan ciptaan<br>
                  </div>
                  <div class="box-footer clearfix">
                          <b> Misi : </b><br><br>
                          1.Menyediakan fasilitas atau sarana yang memadai bagi para tamu <br>
                          2.Menyediakan lingkungan yang sejuk, bersih, indah, nyaman dan aman <br>
                          3.Menyediakan makanan yang sehat dan bergizi dengan menu yang bervariasi <br>
                          4.Menyediakan tarif khusus bagi yang membutuhkan <br>
                          5.Mengupayakan terjadinya komunikasi dan kerjasama yang harmonis. <br>
                          <br>
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

<?php include "Footer.php"; ?>
