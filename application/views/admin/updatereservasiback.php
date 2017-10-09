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
            <h3 class="box-title"> Edit Data Reservasi &nbsp;&nbsp;&nbsp;
                <?php foreach ($detil_reservasi as $dt) { ?>
                    <a href="<?php echo base_url('ReservationController/update_reservasi/'.$dt->id_transaksi); ?>"><button class="btn btn-success btn-sm btn-flat"><i class="glyphicon glyphicon-refresh"></i>&nbsp; Refresh</button></a>
                <?php } ?>
            </h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <?php
                foreach ($detil_reservasi as $dt) {
                  if($dt->status_order == "Reserved" || $dt->status_order == "New Reservation"){
              ?>
                  <a href="<?php echo base_url('dashboard/admin/data/reservasi/update/'.$dt->id_transaksi); ?>"><button type="button" class="btn btn-default"> <i class="glyphicon glyphicon-edit"></i> </button></a>
              <?php
                  }
                }
              ?>
            </div>
            <!-- /. tools -->
          </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php
                foreach($detil_reservasi as $dr){
                  $tanggal1 =  $dr->tgl_checkin;
                  $tanggal2 =  $dr->tgl_checkout;
                  $format1 = date('d F Y', strtotime($tanggal1 ));
                  $format2 = date('d F Y', strtotime($tanggal2 ));

                  $angka = $dr->total_bayar;
                  $angkadp = $dr->dp;
                  $angka_format = number_format($angka,2,",",".");
                  $angka_formatdp = number_format($angkadp,2,",",".");
              ?>
              <table>
                <tr>
                  <td colspan="7"><h4><b> Data Transaksi Reservasi </b></h4></td>
                </tr>
                <tr>
                  <td height="30"><b>Instansi</td>
                  <td>&nbsp;&nbsp; : </td>
                  <td>&nbsp;&nbsp; <?php echo $dr->instansi ?> <input type="hidden" id="id_transaksi" name="id_transaksi" value="<?php echo $dr->id_transaksi ?>" size="5"> </td>
                  <td width="30%"> </td>
                  <td height="30"><b>Jenis Tamu</td>
                  <td>&nbsp;&nbsp; : </td>
                  <td>&nbsp;&nbsp; <?php echo $dr->jtamu ?> </td>
                </tr>
                <tr>
                  <td height="30"><b>Nama Pemesan</td>
                  <td>&nbsp;&nbsp; : </td>
                  <td>&nbsp;&nbsp; <?php echo $dr->nama_pemesan ?> </td>
                  <td width="30%"> </td>
                  <td height="30"><b>Kategori Tamu</td>
                  <td>&nbsp;&nbsp; : </td>
                  <td>&nbsp;&nbsp; <?php echo $dr->jtarif ?> </td>
                </tr>
                <tr>
                  <td height="30"><b>Kegiatan</td>
                  <td>&nbsp;&nbsp; : </td>
                  <td>&nbsp;&nbsp; <?php echo $dr->kegiatan ?> </td>
                  <td width="30%"> </td>
                  <td height="30"><b>Uang DP</td>
                  <td>&nbsp;&nbsp; : </td>
                  <td>&nbsp;&nbsp; Rp <?php echo $angka_formatdp ?> </td>
                </tr>
                <tr>
                  <td height="30"><b>No Telphone</td>
                  <td>&nbsp;&nbsp; : </td>
                  <td>&nbsp;&nbsp; <?php echo $dr->no_telp ?> </td>
                  <td width="30%"> </td>
                  <td height="30"><b>Total Pembayaran</td>
                  <td>&nbsp;&nbsp; : </td>
                  <td>&nbsp;&nbsp; Rp <?php echo $angka_format ?> </td>
                </tr>
                <tr>
                  <td height="30"><b>Jumlah Tamu</td>
                  <td>&nbsp;&nbsp; : </td>
                  <td>&nbsp;&nbsp; <?php echo $dr->jumlah_tamu ?> Orang <input type="hidden" id="jml" name="id_transaksi" value="<?php echo $dr->jumlah_tamu ?>" size="5"></td>
                  <td width="30%"> </td>
                  <td height="30"><b>Status Pembayaran</td>
                  <td>&nbsp;&nbsp; : </td>
                  <td>&nbsp;&nbsp; <?php echo $dr->status_pembayaran ?> </td>
                </tr>
                <tr>
                  <td height="30"><b>Tgl Check In</td>
                  <td>&nbsp;&nbsp; : </td>
                  <td>&nbsp;&nbsp; <?php echo $format1 ?> <input type="hidden" id="datepicker1" name="tgl_checkin" value="<?php echo $dr->tgl_checkin ?>" size="5"></td>
                  <td width="30%"> </td>
                  <td height="30"><b>Status Order</td>
                  <td>&nbsp;&nbsp; : </td>
                  <td>&nbsp;&nbsp; <?php echo $dr->status_order ?> </td>
                </tr>
                <tr>
                  <td height="30"><b>Tgl Check Out </td>
                  <td>&nbsp;&nbsp; : </td>
                  <td>&nbsp;&nbsp; <?php echo $format2 ?> <input type="hidden" id="datepicker2" name="tgl_checkout" value="<?php echo $dr->tgl_checkout ?>" size="5"></td>
                  <td width="30%"> </td>
                  <td height="30"><b>Permintaan Khusus</td>
                  <td>&nbsp;&nbsp; : </td>
                  <td>&nbsp;&nbsp; <?php echo $dr->permintaan_khusus ?> </td>
                </tr>
                <tr>
                  <td height="30"><b>Additional Ruang</td>
                  <td>&nbsp;&nbsp; : </td>
                  <td colspan="4">&nbsp;&nbsp;
                    <?php
                        foreach ($detil_additional as $da)
                        {
                            echo "$da->nama_ruang | ";
                        }
                    ?>
                  </td>
                </tr>
                <tr>
                  <td height="30"><b>Additional Ruang Yayasan</td>
                  <td>&nbsp;&nbsp; : </td>
                  <td colspan="4">&nbsp;&nbsp;
                    <?php
                        foreach ($detil_additionalruangyayasan as $dars)
                        {
                            echo "$dars->nama_ruang | ";
                        }
                    ?>
                  </td>
                </tr>
                <tr>
                  <td height="30"><b>Additional Fasilitas</td>
                  <td>&nbsp;&nbsp; : </td>
                  <td colspan="4">&nbsp;&nbsp; <?php
                      foreach ($detil_additionalfas as $das)
                      {
                          echo "$das->jenis_additional | ";
                      }
                  ?>
                </td>
                </tr>
              </table>
              <?php } ?>
              <br>
              <table id="exampleupdate" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <td colspan="5"><h4><b> Data Detil Reservasi </b></h4></td>
                  </tr>
                <tr>
                  <th width="5%">No</th>
                  <th width="30%">Ruangan</th>
                  <th width="15%">Kamar</th>
                  <th width="30%">Nama Tamu</th>
                  <th width="20%">Jenis Kelamin</th>
                  <th align="center">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $no = 1;
                    foreach ($detil_tamu as $dt) {
                ?>
                <tr id="row-<?= $dt->id_transaksi_detil ?>">
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $dt->nama_ruang ?></td>
                  <td><?php echo $dt->nama_kamar ?></td>
                  <td><?php echo $dt->nama_tamu ?></td>
                  <td><?php echo $dt->jenis_kelamin ?></td>
                  <td align="center">
                    <?php if($dt->status_order == "Reserved" || $dt->status_order == "New Reservation"){ ?>
                    <button class="btn btn-danger btn-sm" onClick="deleteData(<?= $dt->id_transaksi_detil ?>)"><i class="glyphicon glyphicon-remove"></i>&nbsp; Delete</button>
                    <?php }else{ ?>

                      <?php } ?>
                  </td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Ruangan</th>
                  <th>Kamar</th>
                  <th>Nama Tamu</th>
                  <th>Jenis Kelamin</th>
                  <th align="center">Actions</th>
                </tr>
                </tfoot>
              </table>
              <br><br>
              <?php
                foreach ($detil_reservasi as $dtx) {
                  if($dt->status_order == "Reserved" || $dt->status_order == "New Reservation"){
              ?>
              <div class="box-body col-lg-12">
                      <div class="form-group">
                        <label><h4><b> Tambah Data Kamar </b></h4></label><br>
                        <label>Nama Ruangan</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-home"></i>
                          </div>
                          <select id="id_ruang" onchange="getRuang()" name="ruang" class="form-control select2" style="width: 100%;">
                            <option selected="selected" value="" disabled>Pilih Ruangan</option>
                            <?php foreach($idruang1 as $rowruang){?>
                                  <option value="<?=$rowruang->id?>"><?=$rowruang->nama_ruang?></option>
                             <?php }?>
                          </select>
                        </div>
                      </div>
                    <div class="box-body col-lg-12" style="border: 2px solid grey;">
                       <div id="kotakkamar">
                         <br>
                       </div>
                     </div>
                     <div class="form-group">
                      <label></label>
                        <div class="input-group date">
                              <br><a href="<?php echo base_url('dashboard/admin/data/reservasi'); ?>"><button class="btn btn-success btn-sm btn-flat"><i class="glyphicon glyphicon-chevron-left"></i>&nbsp; Go To List Reservasi</button></a>
                        </div>
                    </div>
              </div>
              <?php
                  }else{
              ?>
              <div class="form-group">
               <label></label>
                 <div class="input-group date">
                       <br><a href="<?php echo base_url('dashboard/admin/data/reservasi'); ?>"><button class="btn btn-success btn-sm btn-flat"><i class="glyphicon glyphicon-chevron-left"></i>&nbsp; Go To List Reservasi</button></a>
                 </div>
             </div>
             <?php
                  }
                }
            ?>
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
              <input id="idtransaksi" type="hidden" name="idtrx" class="form-control" readonly required>
            </div>
            <div class="form-group">
              <!-- <label for="recipient-name" class="control-label">Ruangan:</label> -->
              <input id="ruang" type="hidden" name="idr" class="form-control"  readonly required>
            </div>
            <div class="form-group">
              <!-- <label for="recipient-name" class="control-label">ID Kamar:</label> -->
              <input id="kamar" type="hidden" name="idk" class="form-control" readonly required>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">Nama Tamu:</label>
              <input type="text" id="namatamu" name="namatamu" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="control-label">Jenis Kelamin:</label><br>
              <label>
                <input type="radio" id="jk" name="JK" class="flat-red" value="Laki-Laki" required> Laki-Laki
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

  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Detail Tamu</h4>
        </div>
        <div class="modal-body">
            <table class='table table-bordered table-stripe'>
              <tr>
                <td width="10%"><b> No </b></td>
                <td width="70%"><b> Nama </b></td>
                <td width="20%"><b> Jenis Kelamin </b></td>
              </tr>
            </table>
            <table class='table table-bordered table-stripe' id="kotaktamu">

            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<!-- ======================= js ============================ -->

<script>
  function deleteData(id) {
      swal({
        title: "Are you sure?",
        text: "You will not be able to recover this Data!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: 'btn-danger',
        confirmButtonText: 'Yes, delete it!',
        closeOnConfirm: false,
        closeOnCancel: true
      },
      function() {
          $.get('<?php echo base_url('ReservationController/hapustamu/'); ?>', {id:id}, function(data) {
            if (data == 'succeed') {
                $('#row-' + id).remove();
                swal("Deleted!", "Your Data has been deleted!", "success");
            }
            window.location.reload();
          });
      });
  }
  function handleClickUpdate(e){
    e.preventDefault();
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

$(function () {
  $('.bs-example-modal-sm').on('hidden.bs.modal', function (e) {
        $("#kotaktamu").html("");
  })
});
</script>

<script type = "text/javascript">
  function getTarif() {
      var id_jenistamu = $('#id_jenistamu').val();
      var id_jenistarif = $('#id_jenistarif').val();
      var jmlhtamu = $('#jmlhtamu').val();

      $.get('<?php echo base_url(). 'api/tarif'; ?>', {id_jenistamu: id_jenistamu, id_jenistarif: id_jenistarif}, function(response) {
        var data = JSON.parse(response);
        var total = parseFloat(jmlhtamu) * parseFloat(data.tarif);
        $('#total').val(total);
      });
    }

    function getRuang() {
      var id_ruang = $('#id_ruang').val();
      var tgl_checkin = $('#datepicker1').val();
      var tgl_checkout = $('#datepicker2').val();
      var id_transaksi= $('#id_transaksi').val();
      var bg = 0;

      $.get('<?php echo base_url(). 'api/transaksi/update'; ?>', {id_transaksi: id_transaksi}, function(response) {
        var datatrans = JSON.parse(response);
        var iDx = datatrans.id_transaksi;
        $('#idtransaksi').val(iDx);
      });

      $.get('<?php echo base_url(). 'api/ruang'; ?>', {id_ruang: id_ruang}, function(response) {
        var data = JSON.parse(response);
        var idruang = data.id;
        $('#ruang').val(idruang);

      });

      $.get('<?php echo base_url(). 'api/kamar'; ?>', {id_ruang: id_ruang}, function(response) {
        var dataka = JSON.parse(response);

          $.get('<?php echo base_url(). 'api/transaksi/room'; ?>?id_ruang='+id_ruang+'&tgl_checkin=%27'+tgl_checkin+'%27&tgl_checkout=%27'+tgl_checkout+'%27', function(response) {
              var Datakamartrans = JSON.parse(response);
              var arrayst = new Array();
              var st = 0;
              var i = 0;
              var l = 0;

              jQuery.each( Datakamartrans, function( key1, value1 ){
                  st = value1.kamar;
                  arrayst[i] = value1.kamar;
                  i++;
              });

        $("#kotakkamar").empty();
        jQuery.each( dataka, function( key, value ){
              var sd = value.id_kamar;
              var arraysel = new Array();
              var j = 0;
              var k = 0;

              for( j=0; j < arrayst.length; j++)
              {
                  if(arrayst[j] == sd)
                  {
                    arraysel[k] = sd;
                    k++;
                  }
                  else {
                  }
              }
              if(arraysel[l] == sd)
              {
                bg = 'red';
                bgbtn = 'red';
              }else {
                bg = '#00a65a';
                bgbtn = '#00a65a';
              }
              $("#kotakkamar").append("<div class='col-lg-2' style='background:"+bg+"; margin-right:1px; height:110px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;'><p align='center'><label>"+ value.nama_kamar+"</label><br><button type='button' onclick='getKamar("+ value.id_kamar+")' id='id_kamar' style='margin-top:25px; background-color:"+bgbtn+"; border-color:"+bgbtn+";' class='btn btn-sm' > <i class='glyphicon glyphicon-plus'></i>&nbsp; </button> <button type='button' onclick='getDetailKamar("+ value.id_kamar+")' style='margin-top:25px; background-color:"+bgbtn+"; border-color:"+bgbtn+";' class='btn btn-sm' data-toggle='modal' data-target='.bs-example-modal-sm'> <i class='glyphicon glyphicon-list'></i>&nbsp; </button></p></div>");
            });
        });
      });
    }

    function getDetailKamar($idKamar) {
      var id_ruang= $('#id_ruang').val();
      var tgl_checkin = $('#datepicker1').val();
      var tgl_checkout = $('#datepicker2').val();
      var id_kamar = $idKamar;
      var id_kamar = id_kamar;
      $('#kamar').val(id_kamar);


      $.get('<?php echo base_url(). 'api/transaksi/room/detil'; ?>?id_ruang='+id_ruang+'&id_kamar='+id_kamar+'&tgl_checkin=%27'+tgl_checkin+'%27&tgl_checkout=%27'+tgl_checkout+'%27', function(response) {
          var datadetkamar = JSON.parse(response);
          var arraysel = new Array();
          var j=1;
          var hasilz = "";

          var panjang1 = datadetkamar.length;
          if(panjang1 != 0)
          {
              jQuery.each( datadetkamar, function( key2, value2 ){
                var name = value2.nama_tamu;
                var gen = value2.jenis_kelamin;
                hasilz += "+. Nama : "+name+" | Jenis Kelamin : "+gen+"<br>";
                $("#kotaktamu").append("<tr><td width='10%'> "+ j++ +" </td><td width='70%'> "+ name +" </td><td width='20%'> "+ gen+"</td></tr>");
              });
          }else {
                $("#kotaktamu").append("<tr><td colspan='3' align='center'><h3>Kosong</h3></td></tr>");
          }
      });
    }

    function getKamar($idKamar) {
      var id_ruang= $('#id_ruang').val();
      var tgl_checkin = $('#datepicker1').val();
      var tgl_checkout = $('#datepicker2').val();
      var id_kamar = $idKamar;
      var id_kamar = id_kamar;
      var jumlahtamu = $('#jml').val();
      var trxid = $('#id_transaksi').val();
      $('#kamar').val(id_kamar);

      $.get('<?php echo base_url(). 'api/transaksi/total'; ?>?transaksi_id='+trxid+'&tgl_checkin=%27'+tgl_checkin+'%27&tgl_checkout=%27'+tgl_checkout+'%27', function(response) {
      var datatot = JSON.parse(response);
      var jumlah = datatot.length;

      if(jumlah == jumlahtamu)
      {
        $('#exampleModalAdd').modal('hide');
        alert("Maaf Inputan Tidak Boleh Melebihi Jumlah Tamu");
      }
      else {
        $.get('<?php echo base_url(). 'api/transaksi/room/detil'; ?>?id_ruang='+id_ruang+'&id_kamar='+id_kamar+'&tgl_checkin=%27'+tgl_checkin+'%27&tgl_checkout=%27'+tgl_checkout+'%27', function(response) {
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
      });
    }
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
                  window.location.reload();
                }else{
                  alert('Gagal Input Data');
                }
          }
     });
   });
  });
</script>
<?php include "Footer.php"; ?>
