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
              <h3 class="box-title">Add Master Data Ruang</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="<?php echo base_url(). 'RuangController/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
                <!-- text input -->
                <?php echo $this->session->userdata("validasidata"); ?>
                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Nama Ruang</label>
                    <input type="text" name="namaruang" class="form-control" placeholder="Nama Ruang ... " required>
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Type Ruang</label>
                    <select name="tipe" class="form-control" style="width: 100%;" required>
                      <option selected="selected" value="0" disabled="disabled">Pilih Tipe Ruang</option>
                      <option value="NK">Non Kamar</option>
                      <option value="K">Kamar</option>
                      <option value="RM">Ruang Makan</option>
                      <option value="KNT">Kantor</option>
                    </select>
                  </div>
                </div>

                <div class="box-body col-lg-12">
                  <div class="form-group">
                    <label>Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="3" placeholder="keterangan ..." required></textarea>
                  </div>
                </div>

                <div class="box-body col-lg-12">
                  <div class="form-group">
                    <input type="submit" name="submit" value="Save" class="btn btn-success">
                    <a href="<?php echo base_url('dashboard/admin/data/ruang'); ?>"><input type="button" value="Back To View" class="btn btn-success"></a>
                    <input type="reset" name="reset" value="Cancel" class="btn btn-success">
                  </div>
                </div>
              </form>
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
