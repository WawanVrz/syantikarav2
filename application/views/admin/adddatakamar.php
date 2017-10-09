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
              <h3 class="box-title">Add Master Data Kamar</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="<?php echo base_url(). 'KamarController/tambah_aksi'; ?>" method="post" onsubmit="return validasi();" enctype="multipart/form-data">
                <!-- text input -->
                <div class="box-body col-lg-12">
                  <div class="form-group">
                    <label>Nama Ruang</label>
                    <select name="idruangan" class="form-control select2" style="width: 100%;" required>
                      <option selected="selected" value="" disabled="disabled">Pilih Jenis Ruang</option>
                      <?php foreach($ruangan as $rowruangan){?>
                            <option value="<?=$rowruangan->id?>"><?=$rowruangan->nama_ruang?></option>
                       <?php }?>
                    </select>
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Nama Kamar</label>
                    <input type="text" name="namakamar" class="form-control" placeholder="Nama Kamar ... " required>
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Kapasitas Kamar</label>
                    <input type="text" name="kapasitas" id="jumlahkapasitas" class="form-control" placeholder="Kapasitas Kamar ... " required>
                  </div>
                </div>

                <div class="box-body col-lg-12">
                  <div class="form-group">
                    <label>Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="3" placeholder="keterangan ..." required></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <input type="submit" name="submit" value="Save" class="btn btn-success">
                  <a href="<?php echo base_url('dashboard/admin/data/kamar'); ?>"><input type="button" value="Back To View" class="btn btn-success"></a>
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
    function validasi(){
      var kapasitas = document.getElementById('jumlahkapasitas').value;
      var number = /^[0-9]+$/;
      if(!kapasitas.match(number))
      {
        alert('Kapasitas Harus Angka');
        return false;
      }
    }
  </script>
<script>
    $(function () {
      //Initialize Select2 Elements
      $(".select2").select2();
    });
  </script>
<?php include "Footer.php"; ?>
