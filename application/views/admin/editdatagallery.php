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
              <h3 class="box-title">Edit Data Gallery</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php foreach($gallery as $g){ ?>
              <form role="form" action="<?php echo base_url(). 'GalleryController/update'; ?>" method="post" enctype="multipart/form-data">
                <!-- text input -->
                <div class="box-body col-lg-12">
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="hidden" name="id" value="<?php echo $g->id_gallery ?>">
                    <input type="text" name="nama" class="form-control" value="<?php echo $g->nama ?>">
                  </div>
                </div>

                <div class="box-body col-lg-12">
                  <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control"/>
                  </div>
                </div>

                <div class="form-group">
                  <input type="submit" name="submit" value="Save" class="btn btn-success">
                  <a href="<?php echo base_url('dashboard/admin/data/gallery'); ?>"><input type="button" value="Back To View" class="btn btn-success"></a>
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
