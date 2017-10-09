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
              <h3 class="box-title">Edit Data Konten Web</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php foreach($settings as $s){ ?>
              <form role="form" action="<?php echo base_url(). 'SettingController/update'; ?>" method="post" enctype="multipart/form-data">
                <!-- text input -->
                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Phone</label>
                    <input type="hidden" name="id" value="<?php echo $s->id_setting ?>">
                    <input type="text" name="phone" class="form-control" value="<?php echo $s->phone ?>">
                  </div>
                </div>
                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $s->email ?>">
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" value="<?php echo $s->address ?>">
                  </div>
                </div>
                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>FaceBook</label>
                    <input type="text" name="fb" class="form-control" value="<?php echo $s->fb ?>">
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Twiiter</label>
                    <input type="text" name="tw" class="form-control" value="<?php echo $s->tw ?>">
                  </div>
                </div>
                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Youtube</label>
                    <input type="text" name="ytb" class="form-control" value="<?php echo $s->yt ?>">
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Instagram</label>
                    <input type="text" name="ig" class="form-control" value="<?php echo $s->ig ?>">
                  </div>
                </div>
                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Google Plus</label>
                    <input type="text" name="google" class="form-control" value="<?php echo $s->google ?>">
                  </div>
                </div>

                <div class="box-body col-lg-12">
                  <div class="form-group">
                    <label>About Us</label>
                    <textarea name="tentang" class="form-control" rows="3"><?php echo $s->about ?></textarea>
                  </div>
                </div>

                <div class="box-body col-lg-12">
                  <div class="form-group">
                    <label>About Us For Header</label>
                    <textarea name="tentangheader" class="form-control" rows="3"><?php echo $s->about_header ?></textarea>
                  </div>
                </div>

                <div class="box-body col-lg-12">
                  <div class="form-group">
                    <label>About Us For Footer</label>
                    <textarea name="tentangfooter" class="form-control" rows="3"><?php echo $s->about_footer ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <input type="submit" name="submit" value="Save" class="btn btn-success">
                  <a href="<?php echo base_url('dashboard/admin/data/setting'); ?>"><input type="button" value="Back To View" class="btn btn-success"></a>
                  <input type="reset" name="reset" value="Cancel" class="btn btn-success">
                </div>
              </form>
              <?php } ?>
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

<?php include "Footer.php"; ?>
