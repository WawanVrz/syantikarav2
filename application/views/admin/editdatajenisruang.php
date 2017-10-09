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
              <h3 class="box-title">Edit Master Data Ruang</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php foreach($ruang_edit as $re)
              {
                $tipe = $re->type;
                if($tipe == "NK")
                {
                    $tipe1 = "Non Kamar";
                }
                elseif ($tipe == "K") {
                    $tipe1 = "Kamar";
                }
                elseif ($tipe == "KNT") {
                    $tipe1 = "Kantor";
                }
                else {
                    $tipe1 = "Ruang Makan";
                }
              ?>
              <form role="form" action="<?php echo base_url(). 'RuangController/update'; ?>" method="post" enctype="multipart/form-data">
                <!-- text input -->
                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Nama Ruang</label>
                    <input type="hidden" name="id" value="<?php echo $re->id ?>">
                    <input type="text" name="namaruang" class="form-control" value="<?php echo $re->nama_ruang ?>">
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Type Ruang</label>
                    <select name="tipe" class="form-control" style="width: 100%;" required>
                      <option value="<?php echo $re->type ?>" selected="selected"><?php echo $tipe1 ?></option>
                      <option value="0" disabled="disabled">Pilih Tipe Ruang</option>
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
                    <textarea name="keterangan" class="form-control" rows="3"><?php echo $re->keterangan ?></textarea>
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
