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
              <h3 class="box-title">Data Fasilitas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <a href="<?php echo base_url('dashboard/admin/data/fasilitas'); ?>">All (<?php echo $this->session->userdata("fasilitas_jumlah"); ?>)</a> | <a href="<?php echo base_url('dashboard/admin/data/fasilitas/bin'); ?>">Trash (<?php echo $this->session->userdata("jumlah_sampah_fasilitas"); ?>)</a>
              <hr>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Image</th>
                  <th>Fasilitas</th>
                  <th >Keterangan</th>
                  <th>Created At</th>
                  <th width="18%">Actions</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    foreach ($fasilitas as $f) {
                  ?>
                <tr id="row-<?= $f->id_fasilitas ?>">
                  <td><?php echo $no++ ?></td>
                  <td><img class="profile-user-img img-responsive img-circle" src="assets/uploads/<?php echo $f->image ?>"></td>
                  <td><?php echo $f->nama ?></td>
                  <td><?php echo $f->keterangan ?></td>
                  <td><?php echo $f->created_at ?></td>
                  <td align="center">
                    <a href="<?php echo base_url('dashboard/admin/data/fasilitas/edit/'.$f->id_fasilitas); ?>"><button class="btn btn-warning btn-sm" ><i class="glyphicon glyphicon-edit"></i>&nbsp; Update</button></a>&nbsp;&nbsp;
                    <button class="btn btn-danger btn-sm" onClick="deleteData(<?= $f->id_fasilitas ?>)"><i class="glyphicon glyphicon-trash"></i>&nbsp; Delete</button>
                  </td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Image</th>
                  <th>Fasilitas</th>
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
            $.get('<?php echo base_url('FasilitasController/softdelete/'); ?>', {id:id}, function(data) {
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
