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
              <h3 class="box-title">Edit Master Data Jasa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php foreach($jenis_jasa as $jj){ ?>
              <form role="form" action="<?php echo base_url(). 'JasaController/update'; ?>" method="post" enctype="multipart/form-data">
                <!-- text input -->
                <div class="box-body col-lg-12">
                  <div class="form-group">
                    <label>Nama Jasa</label>
                    <input type="hidden" name="id" value="<?php echo $jj->id_jasa ?>">
                    <input type="text" name="nama" class="form-control" value="<?php echo $jj->nama_jasa ?>">
                  </div>
                </div>

                <div class="box-body col-lg-12">
                  <div class="form-group">
                    <label>Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="3"><?php echo $jj->keterangan ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <input type="submit" name="submit" value="Save" class="btn btn-success">
                  <a href="<?php echo base_url('dashboard/admin/data/jasa'); ?>"><input type="button" value="Back To View" class="btn btn-success"></a>
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
