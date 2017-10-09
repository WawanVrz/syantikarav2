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
              <h3 class="box-title"> Detail Berita</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php
              foreach($detil_berita as $ds){
              ?>
              <table class="table table-bordered table-striped">
                <tr>
                  <td colspan="3"><img class="img-responsive" src="assets/uploads/<?php echo $ds->image ?>" width="250" height="250"><br> </td>
                </tr>
                <tr>
                  <td height="30" width="15%"><b>Judul</td>
                  <td width="2%"> : </td>
                  <td><?php echo $ds->title ?> </td>
                </tr>
                <tr>
                  <td height="30"><b>Kategori</td>
                  <td>: </td>
                  <td>
                    <?php
                    foreach($kategori as $k)
                    {
                      echo "$k->kategori | ";
                    }
                    ?>
                  </td>
                </tr>
                <tr>
                  <td height="30"><b>Deskripsi Singkat</td>
                  <td> : </td>
                  <td><?php echo $ds->deskripsi_singkat ?> </td>
                </tr>
                <tr>
                  <td height="30"><b>Deskripsi Full</td>
                  <td>: </td>
                  <td><?php echo $ds->deskripsi_full ?> </td>
                </tr>
                <tr>
                  <td height="30"><b>Status Publish</td>
                  <td>: </td>
                  <td><?php echo $ds->status_publish ?> </td>
                </tr>
                <tr>
                  <td height="30"><b>Tanggal Publish</td>
                  <td> : </td>
                  <td><?php echo $ds->tgl_publish ?> </td>
                </tr>
                <tr>
                  <td height="30"><b>Di Publish Oleh</td>
                  <td> : </td>
                  <td><?php echo $ds->name ?> </td>
                </tr>
              </table>
              <?php } ?>
              <br>
              <a href="<?php echo base_url('dashboard/admin/data/berita'); ?>"><input type="button" value="Back To View" class="btn btn-success"></a>
              <!-- <input type="button" name="print" value="Print" class="btn btn-success" onClick="window.print();"> -->
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
