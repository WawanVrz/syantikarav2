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
              <h3 class="box-title">Add Data Berita</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="<?php echo base_url(). 'NewsController/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
                <!-- text input -->
                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Title  ... " required>
                  </div>
                </div>
                <div class="box-body col-lg-6">
                  <div class="form-group">
                      <label>Jenis Kategori</label>
                      <select id="event" name="idkategori[]" data-placeholder="Pilih Jenis Kategori"  multiple="multiple" class="form-control select2" style="width: 100%;" required>
                        <?php foreach($kategori as $rowkategori){?>
                              <option value="<?=$rowkategori->id_kategori?>"><?=$rowkategori->kategori?></option>
                         <?php }?>
                      </select>
                  </div>
                </div>

                <div class="box-body col-lg-12">
                  <div class="form-group">
                    <label>Deskripsi Singkat</label>
                    <!-- <textarea name="desshort" class="form-control" rows="5" placeholder="Deskripsi Singkat ..."  required></textarea> -->
                    <textarea id="mytextarea" name="desshort" rows="10" cols="80"></textarea>
                  </div>
                </div>
                <div class="box-body col-lg-12">
                  <div class="form-group">
                    <label>Deskripsi Full</label>
                    <textarea name="desfull" id="mytextarea1" rows="10" cols="80"></textarea>
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control" />
                  </div>
                </div>
                <div class="box-body col-lg-6">
                  <div class="form-group">
                      <label>Status Publish</label>
                      <select id="event" name="stpublish" class="form-control" style="width: 100%;" required>
                        <option value="Publish">Publish</option>
                        <option value="Draft">Draft</option>
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

<script>

  $(function () {
    CKEDITOR.replace('editor2');
    $(".textarea").wysihtml5();
  });
</script>

<?php include "Footer.php"; ?>
