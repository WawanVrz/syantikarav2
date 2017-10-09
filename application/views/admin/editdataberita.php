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
              <h3 class="box-title">Edit Data Berita</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php foreach($beritas as $f){ ?>
              <form role="form" action="<?php echo base_url(). 'NewsController/update'; ?>" method="post" enctype="multipart/form-data">
                <!-- text input -->
                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Title</label>
                    <input type="hidden" name="id" value="<?php echo $f->id_news ?>">
                    <input type="text" name="title" class="form-control" value="<?php echo $f->title ?>">
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                      <label>Jenis Kategori</label>
                      <select id="event" name="idkategori[]" multiple="multiple" class="form-control select2" style="width: 100%;" required>
                        <?php
                        foreach($kategoridetil as $k)
                        {
                            foreach($kategori as $rowkategori)
                            {
                        ?>
                               <option value="<?=$rowkategori->id_kategori?>" <?= $k->id_kategori == $rowkategori->id_kategori ? 'selected' : null ?>><?=$rowkategori->kategori?></option>
                        <?php
                            }
                        }
                        ?>
                      </select>
                  </div>
                </div>

                <div class="box-body col-lg-12">
                  <div class="form-group">
                    <label>Deskripsi Singkat</label>
                    <textarea id="mytextarea" name="desshort" rows="10" cols="80"><?php echo $f->deskripsi_singkat ?></textarea>
                  </div>
                </div>
                <div class="box-body col-lg-12">
                  <div class="form-group">
                    <label>Deskripsi Full</label>
                    <textarea name="desfull" id="mytextarea1" rows="10" cols="80"><?php echo $f->deskripsi_full ?></textarea>
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control"/>
                  </div>
                </div>
                <div class="box-body col-lg-6">
                  <div class="form-group">
                      <label>Status Publish</label>
                      <select id="event" name="stpublish" class="form-control" style="width: 100%;" required>
                        <option value="<?php echo $f->status_publish ?>" selected="selected"><?php echo $f->status_publish ?></option>
                        <option value="Draft">Draft</option>
                        <option value="Publish">Publish</option>
                        <option value="Pending">Pending</option>
                      </select>
                  </div>
                </div>
                <div class="form-group">
                  <input type="submit" name="submit" value="Save" class="btn btn-success">
                  <a href="<?php echo base_url('dashboard/admin/data/berita'); ?>"><input type="button" value="Back To View" class="btn btn-success"></a>
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
  <script type="text/javascript">
  $(function () {
      $(".select2").select2();
  });
  </script>
<?php include "Footer.php"; ?>
