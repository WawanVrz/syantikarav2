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
              <h3 class="box-title">Add Master Data Ruang Pertemuan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="<?php echo base_url(). 'RuanganController/tambah_aksi'; ?>" method="post" onsubmit="return validasi();" enctype="multipart/form-data">
                <!-- text input -->
                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Nama Ruangan</label>
                    <select name="idruangan" class="form-control select2" style="width: 100%;" required>
                      <option selected="selected" value="" disabled="disabled">Pilih Jenis Ruang</option>
                      <?php foreach($jenisruangan as $rowruangan){?>
                            <option value="<?=$rowruangan->id?>"><?=$rowruangan->nama_ruang?></option>
                       <?php }?>
                    </select>
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Jenis Jasa</label>
                    <select id="event" name="idjasa" class="form-control select2" style="width: 100%;" required>
                      <option selected="selected" value="0" disabled="disabled">Pilih Jenis Jasa</option>
                      <?php foreach($idjasa as $rowjasa){?>
                            <option value="<?=$rowjasa->id_jasa?>"><?=$rowjasa->nama_jasa?></option>
                       <?php }?>
                    </select>
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Kapasitas Ruangan</label>
                    <input type="text" id="kapasitas" name="kapasitas" class="form-control" placeholder="Kapasitas Ruang ... " required>
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Tarif Ruangan</label>
                    <input type="text" id="harga" name="harga" class="form-control" placeholder="Tarif Ruangan ... " required>
                  </div>
                </div>

                <div class="box-body col-lg-12">
                  <div class="form-group">
                    <label>Fasilitas Ruangan</label>
                    <input type="text" name="fasilitas" class="form-control" placeholder="Fasilitas ..." required>
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
                  <a href="<?php echo base_url('dashboard/admin/data/ruangan'); ?>"><input type="button" value="Back To View" class="btn btn-success"></a>
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
      var kapas = document.getElementById('kapasitas').value;
      var number = /^[0-9]+$/;
      if(!hargas.match(number))
      {
        alert('Harga Harus Angka');
        return false;
      }

      if(!kapas.match(number))
      {
        alert('Kapasitas Harus Angka');
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

  <script>
    $(function () {
      //Initialize Select2 Elements
      $(".select2").select2();
    });
  </script>
<?php include "Footer.php"; ?>
