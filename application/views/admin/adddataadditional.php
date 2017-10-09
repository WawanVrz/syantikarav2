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
              <h3 class="box-title">Add Master Data Jenis Konsumsi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="<?php echo base_url(). 'AdditionalController/tambah_aksi'; ?>" method="post" onsubmit="return validasi();" enctype="multipart/form-data">
                <!-- text input -->
                <?php echo $this->session->userdata("validasidata"); ?>
                <div class="box-body col-lg-12">
                  <div class="form-group">
                    <label>Jenis Additional</label>
                    <input type="text" name="jenis" class="form-control" placeholder="Jenis Additional ... " required>
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Jenis Jasa</label>
                    <select id="event" name="idjasa" class="form-control" style="width: 100%;" required>
                      <option selected="selected" value="0" disabled="disabled">Pilih Jenis Jasa</option>
                      <?php foreach($idjasa as $rowjasa){?>
                            <option value="<?=$rowjasa->id_jasa?>"><?=$rowjasa->nama_jasa?></option>
                       <?php }?>
                    </select>
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Harga</label>
                    <input type="text" id="harga" name="harga" class="form-control" placeholder="Harga Konsumsi ... " required>
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
                  <a href="<?php echo base_url('dashboard/admin/data/additional'); ?>"><input type="button" value="Back To View" class="btn btn-success"></a>
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
      var hargas = $('#harga').val().replace(/[^,\d]/g, '').toString();
      var number = /^[0-9]+$/;
      if(!hargas.match(number))
      {
        alert('Harga Harus Angka');
        return false;
      }
    }

    function formatRupiah(angka, prefix)
    {
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split	= number_string.split(','),
        sisa 	= split[0].length % 3,
        rupiah 	= split[0].substr(0, sisa),
        ribuan 	= split[0].substr(sisa).match(/\d{3}/gi);

      if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }

      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    var tanpa_tunai = document.getElementById('harga');
    tanpa_tunai.addEventListener('keyup', function(e)
    {
      tanpa_tunai.value = formatRupiah(this.value);
    });
  </script>
<?php include "Footer.php"; ?>
