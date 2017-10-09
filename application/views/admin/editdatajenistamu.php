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
              <h3 class="box-title">Edit Master Data Jenis Tamu</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php foreach($jenis_tamu as $jt){ ?>
              <form role="form" action="<?php echo base_url(). 'JenisTamuController/update'; ?>" method="post" enctype="multipart/form-data">
                <!-- text input -->
                <div class="form-group">
                  <label>Jenis Tamu</label>
                  <input type="hidden" name="id" value="<?php echo $jt->id_jenistamu ?>">
                  <input type="text" name="jenistamu" class="form-control" value="<?php echo $jt->jenistamu ?>">
                </div>

                <div class="form-group">
                  <label>Jenis Jasa</label>
                  <select id="event" name="idjasa" class="form-control" style="width: 100%;" required>
                    <option selected="selected" value="0" disabled="disabled">Pilih Jenis Jasa</option>
                    <?php foreach($idjasa as $rowjasa){?>
                          <option value="<?=$rowjasa->id_jasa?>" <?= $jt->id_jasa == $rowjasa->id_jasa ? 'selected' : null ?>><?=$rowjasa->nama_jasa?></option>
                     <?php }?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea name="keterangan" class="form-control" rows="3"><?php echo $jt->keterangan ?></textarea>
                </div>

                <div class="form-group">
                  <input type="submit" name="submit" value="Save" class="btn btn-success">
                  <a href="<?php echo base_url('dashboard/admin/data/jenistamu'); ?>"><input type="button" value="Back To View" class="btn btn-success"></a>
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
