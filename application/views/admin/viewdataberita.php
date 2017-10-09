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
                <h3 class="box-title">Data Berita &nbsp;&nbsp;<a href="<?php echo base_url('dashboard/admin/data/berita/add'); ?>"><button class="btn btn-primary tambah-form btn-sm btn-flat" ><i class="fa fa-plus"></i>&nbsp; Tambah Data</button></a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <a href="<?php echo base_url('dashboard/admin/data/berita'); ?>">All (<?php echo $this->session->userdata("berita_jumlah"); ?>)</a> | <a href="<?php echo base_url('dashboard/admin/data/berita/bin'); ?>">Trash (<?php echo $this->session->userdata("jumlah_sampah_berita"); ?>)</a>
              <hr>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Image</th>
                  <th  width="15%">Judul</th>
                  <th>Deskripsi Singkat</th>
                  <th width="25%">Actions</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    foreach ($beritas as $b)
                    {
                  ?>
                <tr id="row-<?= $b->id_news ?>">
                  <td><?php echo $no++ ?></td>
                  <td><img class="profile-user-img img-responsive" src="assets/uploads/<?php echo $b->image ?>"></td>
                  <td><?php echo $b->title ?></td>
                  <td><?php echo $b->deskripsi_singkat ?></td>
                  <td align="center">
                    <a href="<?php echo base_url('dashboard/admin/data/berita/detail/'.$b->id_news); ?>"><button class="btn btn-success btn-sm" ><i class="glyphicon glyphicon-edit"></i>&nbsp; Detail</button></a>&nbsp;&nbsp;

                    <a href="<?php echo base_url('dashboard/admin/data/berita/edit/'.$b->id_news); ?>"><button class="btn btn-warning btn-sm" ><i class="glyphicon glyphicon-edit"></i>&nbsp; Update</button></a>&nbsp;&nbsp;

                    <button class="btn btn-danger btn-sm" onClick="deleteData(<?= $b->id_news ?>)"><i class="glyphicon glyphicon-trash"></i>&nbsp; Delete</button>
                  </td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Image</th>
                  <th>Judul</th>
                  <th>Deskripsi Singkat</th>
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
      console.log(id);
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
            $.get('<?php echo base_url('NewsController/softdelete/'); ?>', {id:id}, function(data) {
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
