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
              <h3 class="box-title">Master Data Ruang In Bin</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <a href="<?php echo base_url('dashboard/admin/data/ruang'); ?>">All (<?php echo $this->session->userdata("jenis_ruang_jumlah"); ?>)</a> | <a href="<?php echo base_url('dashboard/admin/data/ruang/bin'); ?>">Trash (<?php echo $this->session->userdata("jumlah_sampah_ruang"); ?>)</a>
              <hr>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Ruang</th>
                  <th>Type</th>
                  <th width="25%">Keterangan</th>
                  <th>Created At</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    foreach ($jenis_ruang_bin as $jr)
                    {
                      $tipe = $jr->type;
                      if($tipe == "NK")
                      {
                          $tipe1 = "Non Kamar";
                      }
                      elseif ($tipe == "K") {
                          $tipe1 = "Kamar";
                      }
                      else {
                          $tipe1 = "Ruang Makan";
                      }
                  ?>
                <tr id="row-<?= $jr->id ?>">
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $jr->nama_ruang ?></td>
                  <td><?php echo $tipe1 ?></td>
                  <td><?php echo $jr->keterangan ?></td>
                  <td><?php echo $jr->created_at ?></td>
                  <td align="center">
                    <button class="btn btn-warning btn-sm" onClick="RestoreData(<?= $jr->id ?>)"><i class="glyphicon glyphicon-repeat"></i>&nbsp; Restore</button>
                    <button class="btn btn-danger btn-sm" onClick="deleteData(<?= $jr->id ?>)"><i class="glyphicon glyphicon-remove"></i>&nbsp; Delete</button>
                  </td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama Ruang</th>
                  <th>Type</th>
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
            $.get('<?php echo base_url('RuangController/hapus/'); ?>', {id:id}, function(data) {
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
            $.get('<?php echo base_url('RuangController/restoredelete/'); ?>', {id:id}, function(data) {
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
