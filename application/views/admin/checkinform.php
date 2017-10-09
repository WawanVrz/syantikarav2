<?php include "Header.php"; ?>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12">
          <!-- TO DO List -->
          <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>
              <h3 class="box-title">Check In Tamu</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="<?php echo base_url('dashboard/admin/data/konfirmasi/checkin'); ?>" method="get" enctype="multipart/form-data">

                <div class="col-lg-10">
                  <div class="form-group">
                    <label>Search Data Tamu</label>
                    <input id="event5" type="text" name="cari" class="form-control" placeholder="Nama Pemesan ... ">
                  </div>
                </div>
                <div class="col-lg-2">
                  <div class="form-group">
                    <input type="submit" name="submit" value="Go" class="btn btn-success" style="margin-top:24px;">
                    <a href="<?php echo base_url('dashboard/admin/data/konfirmasi/checkin'); ?>"><button class="btn btn-success" style="margin-top:24px;"><i class="glyphicon glyphicon-refresh"></i>&nbsp; Refresh</button></a>
                  </div>
               </div>
              </form>
              </div>
              <hr>
              <?php
              $cc = $this->input->get('cari');
              if($cc != "")
              {
                if(count($cari) > 0)
                {
                ?>
                  <table style="margin-left:5px;">
                    <tr>
                      <td height="50"><h4><b><i class="ion ion-clipboard"></i>&nbsp; List Check In </b></h4></td>
                    </tr>
                  </table>
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>ID Trx</th>
                      <th>Instansi</th>
                      <th>Nama Pemesan</th>
                      <th>No Telp</th>
                      <th>Check In</th>
                      <th>Check Out</th>
                      <th>Total Bayar</th>
                      <th>Pembayaran</th>
                      <th>Status Order</th>
                      <th align="center">Actions</th>
                    </tr>
                    </thead>
                <?php
                foreach($cari as $dr)
                {
                  $tanggal1 =  $dr->tgl_checkin;
                  $tanggal2 =  $dr->tgl_checkout;
                  $format1 = date('d F Y', strtotime($tanggal1 ));
                  $format2 = date('d F Y', strtotime($tanggal2 ));

                  $angka = $dr->total_bayar;
                  $angka_format = number_format($angka,2,",",".");

                  date_default_timezone_set("Asia/Jakarta");
                  $nowdate = date('Y-m-d');
                ?>
                  <tbody>
                  <tr>
                    <td><?php echo $dr->id_transaksi ?></td>
                    <td><?php echo $dr->instansi ?></td>
                    <td><?php echo $dr->nama_pemesan ?></td>
                    <td><?php echo $dr->no_telp ?></td>
                    <td><?php echo $format1 ?></td>
                    <td><?php echo $format2 ?></td>
                    <td>Rp <?php echo $angka_format ?></td>
                    <td><?php echo $dr->status_pembayaran ?></td>
                    <td><?php echo $dr->status_order ?></td>
                    <td align="center">
                      <?php
                        if($tanggal1 == $nowdate && $dr->status_order == "Reserved")
                        {
                      ?>
                          <a href="<?php echo base_url('dashboard/admin/data/konfirmasi/checkin/detail/'.$dr->id_transaksi); ?>"><button class="btn btn-success btn-sm" ><i class="glyphicon glyphicon-list-alt"></i>&nbsp; Detail</button></a>&nbsp;&nbsp;
                      <?php
                        }else {
                      ?>
                          <button class="btn btn-danger btn-sm" ><i class="glyphicon glyphicon-remove"></i>&nbsp; Not Available </button>
                      <?php } ?>
                    </td>
                  </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID Trx</th>
                    <th>Instansi</th>
                    <th>Nama Pemesan</th>
                    <th>No Telp</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Total Bayar</th>
                    <th>Pembayaran</th>
                    <th>Status Order</th>
                    <th align="center">Actions</th>
                  </tr>
                  </tfoot>
                </table>
                <br>
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
                  <!-- /.error-content -->
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
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </section>
      </div>
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
    function checkindata(id) {
        swal({
          title: "Are you sure?",
          text: "You will not be able to recover this Data !",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: 'btn-success',
          confirmButtonText: 'Yes, Check In!',
          closeOnConfirm: false,
          closeOnCancel: true
        },
        function() {
            $.get('<?php echo base_url('KonfirmasiController/checkinproses/'); ?>', {id:id}, function(data) {
              if (data == 'succeed') {
                  //$('#row-' + id).remove();
                  swal("Success!", "Your Has Been Check In !", "success");
              }
              window.location.reload();
            });
        });
    }
  </script>
<?php include "Footer.php"; ?>
