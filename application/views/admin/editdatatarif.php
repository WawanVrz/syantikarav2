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
              <h3 class="box-title">Edit Master Data Tarif</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php foreach($jenis_tarif as $jt){ ?>
              <form role="form" action="<?php echo base_url(). 'TarifController/update'; ?>" method="post" enctype="multipart/form-data">
                <!-- text input -->

                <div class="box-body col-lg-6">
                  <div class="form-group">
                      <label>Jenis Tamu</label>
                      <input type="hidden" name="id" value="<?php echo $jt->id_tarif ?>">
                      <select name="idjenistamu" class="form-control select2" style="width: 100%;">
                        <!-- <option selected="selected" disabled="disabled">Pilih Jenis Tamu</option> -->
                        <?php foreach($idjenistamu as $rowjenistamu){?>
                              <option value="<?=$rowjenistamu->id_jenistamu?>" <?= $jt->id_jenistamu == $rowjenistamu->id_jenistamu ? 'selected' : null ?>><?=$rowjenistamu->jenistamu?></option>
                         <?php }?>
                      </select>
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                      <label>Jenis Tarif</label>
                      <select name="idjenistarif"class="form-control select2" style="width: 100%;">
                        <!-- <option selected="selected" disabled="disabled">Pilih Jenis Tarif</option> -->
                        <?php foreach($idjenistarif as $rowjenistarif){?>
                              <option value="<?=$rowjenistarif->id_jenistarif?>" <?= $jt->id_jenistarif == $rowjenistarif->id_jenistarif ? 'selected' : null ?>><?=$rowjenistarif->jenistarif?></option>
                         <?php }?>
                      </select>
                  </div>
                </div>

                <div class="box-body col-lg-12">
                  <div class="form-group">
                    <label>Harga</label>
                    <input type="text" id="harga" name="harga" class="form-control" value="<?php echo $jt->tarif ?>">
                  </div>
                </div>

                <div class="box-body col-lg-12">
                  <div class="form-group">
                    <label>Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="3"><?php echo $jt->keterangan ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <input type="submit" name="submit" value="Save" class="btn btn-success">
                  <a href="<?php echo base_url('dashboard/admin/data/tarif'); ?>"><input type="button" value="Back To View" class="btn btn-success"></a>
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
  <script>
    $(function () {
      //Initialize Select2 Elements
      $(".select2").select2();
    });

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
