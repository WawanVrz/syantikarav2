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
              <h3 class="box-title">Add Data Reservasi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form id="form">
                <div class="box-body col-lg-12">
                  <div class="form-group">
                    <label>Nama Pemesan</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-user-plus"></i>
                      </div>
                      <input type="text" name="namapemesan" class="form-control field-check-form1" placeholder="Nama Pemesan ... " required disabled>
                    </div>
                  </div>
                </div>

                <!-- text input -->
                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>No Telp Pemesan</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-phone"></i>
                        </div>
                        <input type="text" name="notelp" id="notelp" class="form-control pull-right field-check-form1" placeholder="No Telp Pemesan ... " required disabled>
                      </div>
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Jumlah Tamu</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-plus-square"></i>
                      </div>
                      <input type="number" name="jmlhtamu" id="jmlhtamu" class="form-control field-check-form1" onclick="validasi()" value="0" placeholder="Jumlah Tamu ... " required disabled>
                    </div>
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Jenis Tamu</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-users"></i>
                        </div>
                        <select id="id_jenistamu" name="idjenistamu" class="form-control select2 field-check-form1" style="width: 100%;" required disabled>
                          <option selected="selected" value="" disabled="disabled">Pilih Jenis Tamu</option>
                          <?php foreach($idjenistamu as $rowjenistamu){?>
                                <option value="<?=$rowjenistamu->id_jenistamu?>"><?=$rowjenistamu->jenistamu?></option>
                           <?php }?>
                        </select>
                      </div>
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Kategori Tamu</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-users"></i>
                      </div>
                      <select onchange="getTarif()" id="id_jenistarif" name="idjenistarif" class="form-control select2 field-check-form1" style="width: 100%;" required disabled>
                        <option selected="selected" disabled="disabled">Pilih Jenis Tarif</option>
                        <?php foreach($idjenistarif as $rowjenistarif){?>
                              <option value="<?=$rowjenistarif->id_jenistarif?>"><?=$rowjenistarif->jenistarif?></option>
                         <?php }?>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Check In</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="in" class="form-control pull-right field-check-form1 tgl_checkin" id="datepicker1" placeholder="Check In ... " required disabled>
                    </div>
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Check Out</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" name="out" class="form-control pull-right field-check-form1 tgl_checkout" id="datepicker2" placeholder="Check Out ... " required disabled>
                    </div>
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Status Pembayaran</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-indent"></i>
                      </div>
                      <select name="pembayaran" class="form-control select2 field-check-form1" style="width: 100%;" disabled>
                        <option selected="selected" value="" disabled="disabled">Pilih Jenis Status Pembayaran</option>
                        <option value="Lunas">Lunas</option>
                        <option value="Belum Lunas">Belum Lunas</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Total Bayar</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-credit-card"></i>
                      </div>
                      <input id="total" type="text" name="bayar" class="form-control field-check-form1" placeholder="Total Bayar ... " disabled readonly>
                    </div>
                  </div>
                </div>
                <div class="box-body col-lg-12">
                  <div class="form-group">
                    <label>Permintaan Khusus</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-keyboard-o"></i>
                      </div>
                      <textarea name="permintaankhusus" class="form-control" rows="3" placeholder="Permintaan Khusus ..." required></textarea>
                    </div>
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>
                    Pilih Ruangan ? <br>
                    </label>
                    <br>
                      <label>
                        <input type="radio" name="ceked" class="flat-red" value="Ya" required> Ya
                      </label>
                      &nbsp;&nbsp;&nbsp;
                      <label>
                        <input type="radio" name="ceked" class="flat-red" Value="Tidak" required> Tidak
                      </label>
                    </div>
                </div>

                <div class="box-body col-lg-12">
                    <div class="form-group">
                      <input type="submit" name="submit" value="Save" class="btn btn-success field-check-form1" disabled>
                      <input type="reset" name="reset" value="Cancel" class="btn btn-success field-check-form1" disabled>
                      <a href="<?php echo base_url('dashboard/admin/data/reservasi/add'); ?>"><input type="button" value="Reload Page" class="btn btn-success"></a>
                    </div>
                </div>
              </form>
              <!-- <div class="box-body col-lg-12 field-checkkamar"> -->
                <div class="box-body col-lg-12">
                      <div class="form-group">
                        <label>Nama Ruangan</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-home"></i>
                          </div>
                          <select id="id_ruang" onchange="getRuang()" name="ruang" class="form-control select2" style="width: 100%;">
                            <option selected="selected" value="0">Pilih Ruangan</option>
                            <?php foreach($idruang1 as $rowruang){?>
                                  <option value="<?=$rowruang->id?>"><?=$rowruang->nama_ruang?></option>
                             <?php }?>
                          </select>
                        </div>
                      </div>
                      <!-- <input id="idxkamar" type="text"> -->
                    <div class="box-body col-lg-12" style="border: 2px solid grey;">
                       <div id="kotakkamar">
                         <br>
                       </div>
                     </div>
                     <div class="form-group">
                      <label></label>
                        <div class="input-group date">
                              <br><a href="<?php echo base_url('dashboard/admin/data/reservasi'); ?>"><input type="button" value="Go To List Reservasi" class="btn btn-success"></a>
                        </div>
                    </div>
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

<div class="modal fade" id="exampleModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Tambah Tamu</h4>
      </div>
      <div class="modal-body">
        <form id="MyForm1" enctype="multipart/form-data">
          <div class="form-group">
            <!-- <label for="recipient-name" class="control-label">ID Trx:</label> -->
            <input id="idtransaksi" type="text" name="idtrx" class="form-control" readonly required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Ruangan:</label>
            <input id="ruang" type="text" name="idr" class="form-control"  readonly required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">ID Kamar:</label>
            <input id="kamar" type="text" name="idk" class="form-control" readonly required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Nama Tamu:</label>
            <input type="text" id="namatamu" name="namatamu" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Jenis Kelamin:</label><br>
            <label>
              <input type="radio" id="jk" name="JK" class="flat-red" value="Lak-Laki" required> Laki-Laki
            </label>&nbsp;&nbsp;
            <label>
              <input type="radio" id="jk" name="JK" class="flat-red" Value="Perempuan" required> Perempuan
            </label>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" id="btnSubmit" class="btn btn-success">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- ========================= js ======================= -->

<script type="text/javascript">
  function validasi(){
    var notelepon = document.getElementById('notelp').value;
    var number = /^[0-9]+$/;
    if(!notelepon.match(number))
    {
      alert('No Telphone Harus Angka');
      return false;
    }

    if(notelepon.length >= 13)
    {
      alert('No Telphone Harus 12 digit');
      return false;
    }
  }
</script>

<script type = "text/javascript">
$(function () {
  $('#exampleModalAdd').on('hidden.bs.modal', function (e) {
    $(this).find("#namatamu").val("")
    $(this)
      .find("input[type=checkbox], input[type=radio]")
         .prop("checked", "")
         .end();
  })
});
</script>

  <script type = "text/javascript">
    function deleteData(id) {
        swal({
          title: "Apakah Ingin Memilih Ruang ?",
          text: "Anda Dapat Memilih Ruang Dan Kamar",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, Pick Room!",
          cancelButtonText: "No, No Pick Room!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
            swal("Pick Room!", "Anda Memilih Untuk Menset Ruangan", "success", {id:id});
            $('.field-checkkamar').show();
          } else {
            swal("Cancelled!", "Anda Memilih Untuk Tidak Menset Ruangan", "error");
          }
        });
    }
    function handleClickUpdate(e){
      e.preventDefault();
    }

    function getTarif() {
      var id_jenistamu = $('#id_jenistamu').val();
      var id_jenistarif = $('#id_jenistarif').val();
      var jmlhtamu = $('#jmlhtamu').val();

      $.get('/syantikara/api/tarif', {id_jenistamu: id_jenistamu, id_jenistarif: id_jenistarif}, function(response) {
        var data = JSON.parse(response);
        var total = parseFloat(jmlhtamu) * parseFloat(data.tarif);
        $('#total').val(total);
      });
    }

    function getRuang() {
      var id_ruang = $('#id_ruang').val();
      var tgl_checkin = $('#datepicker1').val();
      var tgl_checkout = $('#datepicker2').val();
      var bg = 0;

      $.get('/syantikara/api/transaksi', function(response) {
        var datatrans = JSON.parse(response);
        var iDx = datatrans.id_transaksi;
        $('#idtransaksi').val(iDx);
      });

      $.get('/syantikara/api/ruang', {id_ruang: id_ruang}, function(response) {
        var data = JSON.parse(response);
        var idruang = data.id;
        $('#ruang').val(idruang);

      });

      $.get('/syantikara/api/kamar', {id_ruang: id_ruang}, function(response) {
        var dataka = JSON.parse(response);


          $.get('/syantikara/api/transaksi/room?id_ruang='+id_ruang+'&tgl_checkin=%27'+tgl_checkin+'%27&tgl_checkout=%27'+tgl_checkout+'%27', function(response) {
              var Datakamartrans = JSON.parse(response);
              var st = 0;
              jQuery.each( Datakamartrans, function( key1, value1 ){
                  st = value1.kamar;
                 //console.log(st);
              });

        $("#kotakkamar").empty();
        jQuery.each( dataka, function( key, value ){
              var sd = value.id_kamar;

              console.log(st);
              console.log(sd);

              if(sd == st)
              {
                bg = 'url(assets/dashboard/dist/img/sales.png)';
              }
              else {
                bg = '#f4f4f4'
              }
              $("#kotakkamar").append("<div class='col-lg-2' style='background:"+bg+"; margin-right:1px; height:110px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;'><p align='center'><label>"+ value.nama_kamar+"</label><br><button type='button' onclick='getKamar("+ value.id_kamar+")' id='id_kamar' style='margin-top:25px;' class='btn btn-sm' > <i class='glyphicon glyphicon-plus'></i>&nbsp; </button></p></div>");

            });
        });
      });
    }


    function getKamar($idKamar) {
      var id_ruang= $('#id_ruang').val();
      var id_kamar = $idKamar;
      var id_kamar = id_kamar;
      $('#kamar').val(id_kamar);

      $.get('/syantikara/api/countkamar', {id_ruang: id_ruang, id_kamar: id_kamar}, function(response) {
      var data = JSON.parse(response);
      var panjang = data.length;
      if(panjang == 3)
      {
        $('#exampleModalAdd').modal('hide');
        alert("Maaf Kamar Sudah Penuh");
      }else {
        $('#exampleModalAdd').modal('show');
      }
     });
    }
  </script>

  <script type = "text/javascript">
  jQuery(document).ready(function($){
    $('#form').on('submit',function(e){
      var notelepon = document.getElementById('notelp').value;
      var number = /^[0-9]+$/;
      if(!notelepon.match(number) || notelepon.length >= 13)
      {
        alert('No Telphone Tidak Valid');
        return false;
      }else{
      e.preventDefault(); // <------this will restrict the page refresh
      var form_data = $(this).serialize();
      $.ajax({
          url: "<?php echo base_url(). 'ReservationController/tambah_aksi'; ?>",
          type: 'POST',
          data: form_data, // $(this).serialize(); you can use this too
          dataType: 'json',
          success: function(msg){

                if(msg.error == "no"){
                  deleteData(msg.id_data);
                  $('.field-check-form1').attr('disabled', true);
                }else{
                  alert('Gagal Input Data');
                }
          }
     });
   }
   });

  });
  </script>

  <script type = "text/javascript">
    jQuery(document).ready(function($){
      $('#MyForm1').on('submit',function(e){
        e.preventDefault(); // <------this will restrict the page refresh
        var form_data = $(this).serialize();
        $.ajax({
            url: "<?php echo base_url(). 'ReservationController/add_detailroom'; ?>",
            type: 'POST',
            data: form_data, // $(this).serialize(); you can use this too
            dataType: 'json',
            success: function(msg) {
                  if(msg.error == "no"){
                    alert('Sukses Input Data');
                    $("[data-dismiss=modal]").trigger({ type: "click" });
                  }else{
                    alert('Gagal Input Data');
                  }
            }
       });
     });
    });
  </script>

<?php include "Footer.php"; ?>
