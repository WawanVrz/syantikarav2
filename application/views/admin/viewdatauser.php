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
              <h3 class="box-title">Master Data Jenis Users &nbsp;&nbsp;<a href="<?php echo base_url('dashboard/admin/data/user/add'); ?>"><button class="btn btn-primary tambah-form btn-sm btn-flat" ><i class="fa fa-plus"></i>&nbsp; Tambah Data</button></a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <a href="<?php echo base_url('dashboard/admin/data/user'); ?>">All (<?php echo $this->session->userdata("user_jumlah"); ?>)</a> | <a href="<?php echo base_url('dashboard/admin/data/user/bin'); ?>">Trash (<?php echo $this->session->userdata("jumlah_sampah_user"); ?>)</a>
              <hr>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Image</th>
                  <th>Fullname</th>
                  <th>Username</th>
                  <th>Position</th>
                  <th>Location</th>
                  <th>Register Date</th>
                  <th width="20%">Actions</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    foreach ($userss as $u) {
                  ?>
                <tr id="row-<?= $u->id_user ?>">
                  <td><?php echo $no++ ?></td>
                  <td><img class="profile-user-img img-responsive img-circle" src="assets/dashboard/dist/img/<?php echo $u->image ?>"></td>
                  <td><?php echo $u->name ?></td>
                  <td><?php echo $u->username ?></td>
                  <td><?php echo $u->position ?></td>
                  <td><?php echo "$u->namakota, $u->namaprovinsi"; ?></td>
                  <td><?php echo $u->tgl_daftar ?></td>
                  <td align="center">
                    <a href="<?php echo base_url('dashboard/admin/data/user/edit/'.$u->id_user); ?>"><button class="btn btn-warning btn-sm" ><i class="glyphicon glyphicon-edit"></i>&nbsp; Update</button></a>&nbsp;&nbsp;
                    <?php
                    $in = $this->session->userdata("nama");
                    $out = $u->username;
                    if($in == $out)
                    {
                    ?>
                        <button disabled="disabled" class="btn btn-danger btn-sm" onClick="deleteData(<?= $u->id_user ?>)"><i class="glyphicon glyphicon-trash"></i>&nbsp; Delete</button>
                    <?php
                    }else {
                    ?>
                        <button class="btn btn-danger btn-sm" onClick="deleteData(<?= $u->id_user ?>)"><i class="glyphicon glyphicon-trash"></i>&nbsp; Delete</button>
                    <?php
                    }
                    ?>
                  </td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Image</th>
                  <th>Fullname</th>
                  <th>Username</th>
                  <th>Position</th>
                  <th>Location</th>
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
            $.get('<?php echo base_url('UsersController/softdelete/'); ?>', {id:id}, function(data) {
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
