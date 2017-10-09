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
              <h3 class="box-title">Master Data Jenis Tamu &nbsp;&nbsp;<a href="<?php echo base_url('dashboard/admin/data/jenistamu/add'); ?>"><button class="btn btn-primary tambah-form btn-sm btn-flat" ><i class="fa fa-plus"></i>&nbsp; Tambah Data</button></a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <a href="<?php echo base_url('dashboard/admin/data/jenistamu'); ?>">All (<?php echo $this->session->userdata("jenis_tamu_jumlah"); ?>)</a> | <a href="<?php echo base_url('dashboard/admin/data/jenistamu/bin'); ?>">Trash (<?php echo $this->session->userdata("jumlah_sampah"); ?>)</a>
              <hr>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th width="20%">Jenis Tamu</th>
                  <th width="20%">Jenis Jasa</th>
                  <th width="20%">Keterangan</th>
                  <th width="15%">Created At</th>
                  <th width="20%">Actions</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    foreach ($jenis_tamu as $jt) {
                  ?>
                <tr id="row-<?= $jt->id_jenistamu ?>">
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $jt->jenistamu ?></td>
                  <td><?php echo $jt->nama_jasa ?></td>
                  <td><?php echo $jt->keterangan ?></td>
                  <td><?php echo $jt->created_at ?></td>
                  <td align="center">
                    <a href="<?php echo base_url('dashboard/admin/data/jenistamu/edit/'.$jt->id_jenistamu); ?>"><button class="btn btn-warning btn-sm" ><i class="glyphicon glyphicon-edit"></i>&nbsp; Update</button></a>&nbsp;&nbsp;
                    <button class="btn btn-danger btn-sm" onClick="deleteData(<?= $jt->id_jenistamu ?>)"><i class="glyphicon glyphicon-trash"></i>&nbsp; Delete</button>
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
            $.get('<?php echo base_url('JenisTamuController/softdelete/'); ?>', {id:id}, function(data) {
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

<?php include "Footer.php"; ?>
