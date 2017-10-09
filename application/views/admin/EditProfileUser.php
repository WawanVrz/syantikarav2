<?php include "Header.php"; ?>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
            <form role="form" action="<?php echo base_url(). 'JenisTamuController/update'; ?>" method="post" enctype="multipart/form-data">
              <img class="profile-user-img img-responsive img-circle" src="assets/dashboard/dist/img/<?php echo $this->session->userdata("gambar"); ?>" alt="User profile picture">
              <p align="center" style="margin-left:70px;"><input type="file" name="img"></p>
              <h3 class="profile-username text-center"><input type="text" name="fullname" class="form-control" ></h3>
              <p class="text-muted text-center">Member Since <?php echo $this->session->userdata("membersince"); ?></p>
              <div class="box-header with-border">
                <!-- <h3 class="box-title">About Me</h3> -->
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <strong><i class="fa fa-users margin-r-5"></i> Position </strong>
                <p class="text-muted"><input type="text" name="posisi" class="form-control" ></p>
                <hr>

                <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                <p class="text-muted"><input type="text" name="lokasi" class="form-control" ></p>
                <hr>

                <strong><i class="fa fa-gear  margin-r-5"></i> Status</strong>
                <p class="text-muted">Active</p>
                <hr>
              </div>
              <div class="form-group">
                <input type="submit" name="submit" value="Update" class="btn btn-success">
                <a href="<?php echo base_url('dashboard/admin/profile'); ?>"><input type="button" value="Back To Profile" class="btn btn-success"></a>
              </div>
            </div>
            </form>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    <!-- /.col -->
      </div>
  <!-- /.row -->

  </section>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->

<?php include "Footer.php"; ?>
