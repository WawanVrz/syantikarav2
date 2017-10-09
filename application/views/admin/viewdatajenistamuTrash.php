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
              <h3 class="box-title">Master Data Jenis Tamu In Bin</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <a href="<?php echo base_url('dashboard/admin/data/jenistamu'); ?>">All (<?php echo $this->session->userdata("jenis_tamu_jumlah"); ?>)</a> | <a href="#">Trash (<?php echo $this->session->userdata("jumlah_sampah"); ?>)</a>
              <hr>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th width="20%">Jenis Tamu</th>
                  <th width="20%">Jenis Jasa</th>
                  <th width="20%">Keterangan</th>
                  <th width="15%">Created At</th>
                  <th width="25%">Actions</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    foreach ($jenis_tamu_bin as $jt) {
                  ?>
                <tr id="row-<?= $jt->id_jenistamu ?>">
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $jt->jenistamu ?></td>
                  <td><?php echo $jt->nama_jasa ?></td>
                  <td><?php echo $jt->keterangan ?></td>
                  <td><?php echo $jt->created_at ?></td>
                  <td align="center">
                    <button class="btn btn-warning btn-sm" onClick="RestoreData(<?= $jt->id_jenistamu ?>)"><i class="glyphicon glyphicon-repeat"></i>&nbsp; Restore</button>
                    <button class="btn btn-danger btn-sm" onClick="deleteData(<?= $jt->id_jenistamu ?>)"><i class="glyphicon glyphicon-remove"></i>&nbsp; Delete</button>
                  </td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Jenis Tamu</th>
                  <th>Jenis Jasa</th>
                  <th>Keterangan</th>
                  <th>Created At</th>
                  <th>Actions</th>
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
            $.get('<?php echo base_url('JenisTamuController/hapus/'); ?>', {id:id}, function(data) {
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
            $.get('<?php echo base_url('JenisTamuController/restoredelete/'); ?>', {id:id}, function(data) {
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
