<?php include "Header.php"; ?>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12">
          <!-- TO DO List -->
          <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>
              <h3 class="box-title"> List Reservasi &nbsp;&nbsp;<a href="<?php echo base_url('dashboard/admin/data/reservasi'); ?>"><button class="btn btn-success btn-sm btn-flat"><i class="glyphicon glyphicon-refresh"></i>&nbsp; Refresh</button></a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Reservation List</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Cancel Reservation List</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>No</th>
                        <th>Instansi</th>
                        <th>Kontak</th>
                        <th>No Telp</th>
                        <th width="10%">Check In</th>
                        <th width="10%">Check Out</th>
                        <th>Total Bayar</th>
                        <th>Status</th>
                        <th align="center" width="25%">Actions</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php
                          $no = 1;
                          foreach ($reservasi as $r) {
                            $tanggal1 =  $r->tgl_checkin;
                            $tanggal2 =  $r->tgl_checkout;
                            $format1 = date('d F Y', strtotime($tanggal1 ));
                            $format2 = date('d F Y', strtotime($tanggal2 ));

                            $angka = $r->total_bayar;
                            $angka_format = number_format($angka,2,",",".");
                        ?>
                      <tr id="row-<?= $r->id_transaksi ?>">
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $r->instansi ?></td>
                        <td><?php echo $r->nama_pemesan ?></td>
                        <td><?php echo $r->no_telp ?></td>
                        <td><?php echo $format1 ?></td>
                        <td><?php echo $format2 ?></td>
                        <td>Rp <?php echo $angka_format ?></td>
                        <td><?php echo $r->status_order ?></td>
                        <td align="center">
                          <table border="0">
                            <tr>
                              <td><a href="<?php echo base_url('dashboard/admin/data/reservasi/detail/'.$r->id_transaksi); ?>"><button class="btn btn-success btn-sm" ><i class="glyphicon glyphicon-list-alt"></i>&nbsp; Detail</button></a>&nbsp;&nbsp;</td>
                              <?php if($r->status_order != "Check Out"){ ?>
                                  <td width="5%"> </td>
                                  <td><a href="<?php echo base_url('dashboard/admin/data/reservasi/edit/'.$r->id_transaksi); ?>"><button class="btn btn-warning btn-sm" ><i class="glyphicon glyphicon-edit"></i>&nbsp; Update</button></a>&nbsp;&nbsp;</td>
                                  <td width="5%"> </td>
                                  <td><button class="btn btn-danger btn-sm" style="margin-top:-25px;" onClick="deleteData(<?= $r->id_transaksi ?>)"><i class="glyphicon glyphicon-remove" ></i>&nbsp; Cancel</button></td>
                            <?php }else{ ?>

                              <?php } ?>
                            </tr>
                          </table>
                        </td>
                      </tr>
                      <?php } ?>
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Instansi</th>
                        <th>Kontak</th>
                        <th>No Telp</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Total Bayar</th>
                        <th>Status</th>
                        <th align="center">Actions</th>
                      </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>No</th>
                        <th width="15%">Instansi</th>
                        <th width="15%">Kontak</th>
                        <th width="10%">No Telp</th>
                        <th width="15%">Check In</th>
                        <th width="15%">Check Out</th>
                        <th width="15%">Total Bayar</th>
                        <th width="20%">Status</th>
                        <th align="center" width="10%">Actions</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php
                          $no = 1;
                          foreach ($cancelreservasi as $cr) {
                            $tanggal1 =  $cr->tgl_checkin;
                            $tanggal2 =  $cr->tgl_checkout;
                            $format1 = date('d F Y', strtotime($tanggal1 ));
                            $format2 = date('d F Y', strtotime($tanggal2 ));

                            $angka = $cr->total_bayar;
                            $angka_format = number_format($angka,2,",",".");
                        ?>
                      <tr id="row-<?= $cr->id_transaksi ?>">
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $cr->instansi ?></td>
                        <td><?php echo $cr->nama_pemesan ?></td>
                        <td><?php echo $cr->no_telp ?></td>
                        <td><?php echo $format1 ?></td>
                        <td><?php echo $format2 ?></td>
                        <td>Rp <?php echo $angka_format ?></td>
                        <td><?php echo $cr->status_order ?></td>
                        <td align="center">
                          <table border="0">
                            <tr>
                              <td><a href="<?php echo base_url('ReservationController/detail_reservasi/'.$cr->id_transaksi); ?>"><button class="btn btn-success btn-sm" ><i class="glyphicon glyphicon-list-alt"></i>&nbsp; Detail</button></a>&nbsp;&nbsp;</td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                      <?php } ?>
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>No</th>
                        <th>Instansi</th>
                        <th>Kontak</th>
                        <th>No Telp</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                        <th>Total Bayar</th>
                        <th>Status</th>
                        <th align="center">Actions</th>
                      </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div>

              </div>
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
    function deleteData(id) {
        swal({
          title: "Are you sure?",
          text: "You will not be able to recover this Data !",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: 'btn-danger',
          confirmButtonText: 'Yes, Cancel It!',
          closeOnConfirm: false,
          closeOnCancel: true
        },
        function() {
            $.get('<?php echo base_url('ReservationController/cancel_reservasi/'); ?>', {id:id}, function(data) {
              if (data == 'succeed') {
                  //$('#row-' + id).remove();
                  swal("Cancel!", "Your Reservation has been Cancel !", "success");
              }
              window.location.reload();
            });
        });
    }
    function handleClickUpdate(e){
      e.preventDefault();
    }
  </script>
<?php include "Footer.php"; ?>
