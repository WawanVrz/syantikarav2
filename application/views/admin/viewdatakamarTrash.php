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
              <h3 class="box-title">Master Data Kamar In Bin</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <a href="<?php echo base_url('dashboard/admin/data/kamar'); ?>">All (<?php echo $this->session->userdata("kamar_jumlah"); ?>)</a> | <a href="<?php echo base_url('dashboard/admin/data/kamar/bin'); ?>">Trash (<?php echo $this->session->userdata("jumlah_sampah_kamar"); ?>)</a>
              <hr>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Ruang</th>
                  <th>Nama Kamar</th>
                  <th>Kapasitas Kamar</th>
                  <th>Keterangan</th>
                  <th width="20%">Actions</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    foreach ($kamar_bin as $k) {
                  ?>
                <tr id="row-<?= $k->id_kamar ?>">
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $k->nama_ruang ?></td>
                  <td><?php echo $k->nama_kamar ?></td>
                  <td><?php echo $k->kapasitas_kamar." Orang" ?></td>
                  <td><?php echo $k->keterangan ?></td>
                  <td align="center">
                      <button class="btn btn-warning btn-sm" onClick="RestoreData(<?= $k->id_kamar ?>)"><i class="glyphicon glyphicon-repeat"></i>&nbsp; Restore</button>
                      <button class="btn btn-danger btn-sm" onClick="deleteData(<?= $k->id_kamar ?>)"><i class="glyphicon glyphicon-remove"></i>&nbsp; Delete</button>
                  </td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama Ruang</th>
                  <th>Nama Kamar</th>
                  <th>Kapasitas Kamar</th>
                  <th>Keterangan</th>
                  <th width="20%">Actions</th>
                </tr>
                </tfoot>
              </table>
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
          text: "You will not be able to recover this Data!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: 'btn-danger',
          confirmButtonText: 'Yes, delete it!',
          closeOnConfirm: false,
          closeOnCancel: true
        },
        function() {
            $.get('<?php echo base_url('KamarController/hapus/'); ?>', {id:id}, function(data) {
              if (data == 'succeed') {
                  $('#row-' + id).remove();
                  swal("Deleted!", "Your Data has been deleted!", "success");
              }
            });
        });
    }
    function handleClickUpdate(e){
      e.preventDefault();
    }
  </script>

  <script>
    function RestoreData(id) {
        swal({
          title: "Are you sure?",
          text: "You will Restore this Data!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: 'btn-success',
          confirmButtonText: 'Yes, Restore it!',
          closeOnConfirm: false,
          closeOnCancel: true
        },
        function() {
            $.get('<?php echo base_url('KamarController/restoredelete/'); ?>', {id:id}, function(data) {
              if (data == 'succeed') {
                  $('#row-' + id).remove();
                  swal("Restore!", "Your Data has been Restore!", "success");
              }
            });
        });
    }
    function handleClickUpdate(e){
      e.preventDefault();
    }
  </script>


<?php include "Footer.php"; ?>
