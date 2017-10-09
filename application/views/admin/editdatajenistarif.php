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
              <h3 class="box-title">Edit Master Data Jenis Tarif</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php foreach($jenis_tarif as $jt){ ?>
              <form role="form" action="<?php echo base_url(). 'JenisTarifController/update'; ?>" method="post" enctype="multipart/form-data">
                <!-- text input -->
                <div class="form-group">
                  <label>Jenis Tamu</label>
                  <input type="hidden" name="id" value="<?php echo $jt->id_jenistarif ?>">
                  <input type="text" name="jenistarif" class="form-control" value="<?php echo $jt->jenistarif ?>">
                </div>

                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea name="keterangan" class="form-control" rows="3"><?php echo $jt->keterangan ?></textarea>
                </div>

                <div class="form-group">
                  <input type="submit" name="submit" value="Save" class="btn btn-success">
                  <a href="<?php echo base_url('dashboard/admin/data/jenistarif'); ?>"><input type="button" value="Back To View" class="btn btn-success"></a>
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
