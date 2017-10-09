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
              <h3 class="box-title">Edit Master Data Kamar</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php foreach($kamaredit as $ke){ ?>
              <form role="form" action="<?php echo base_url(). 'KamarController/update'; ?>" method="post" enctype="multipart/form-data">
                <!-- text input -->
                <div class="box-body col-lg-12">
                  <div class="form-group">
                    <label>Nama Ruang</label>
                    <input type="hidden" name="id" value="<?php echo $ke->id_kamar ?>">
                    <select name="idruangan" class="form-control select2" style="width: 100%;" required>
                      <?php foreach($ruangan as $rowruangan){?>
                            <option value="<?=$rowruangan->id?>" <?= $ke->id_ruang == $rowruangan->id ? 'selected' : null ?>><?=$rowruangan->nama_ruang?></option>
                       <?php }?>
                    </select>
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Nama Kamar</label>
                    <input type="text" name="namakamar" class="form-control" value="<?php echo $ke->nama_kamar ?>">
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Kapasitas Kamar</label>
                    <input type="text" name="kapasitas" class="form-control" value="<?php echo $ke->kapasitas_kamar ?>">
                  </div>
                </div>

                <div class="box-body col-lg-12">
                  <div class="form-group">
                    <label>Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="3"><?php echo $ke->keterangan ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <input type="submit" name="submit" value="Save" class="btn btn-success">
                  <a href="<?php echo base_url('dashboard/admin/data/kamar'); ?>"><input type="button" value="Back To View" class="btn btn-success"></a>
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
