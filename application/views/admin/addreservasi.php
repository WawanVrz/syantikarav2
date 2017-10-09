<?php include "Header.php"; ?>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12">
          <!-- TO DO List -->
          <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>
              <h3 class="box-title">Add Data Reservasi &nbsp;&nbsp;&nbsp;<a href="<?php echo base_url('dashboard/admin/data/reservasi/add'); ?>"><button class="btn btn-success btn-sm btn-flat"><i class="glyphicon glyphicon-refresh"></i>&nbsp; Refresh</button></a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form id="form">
                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Instansi Pemesan</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-user-plus"></i>
                      </div>
                      <input type="text" id="ins" name="instansi" class="form-control field-check-form1" placeholder="Instansi Pemesan ... " required disabled>
                    </div>
                  </div>
                </div>

                <div class="box-body col-lg-6">
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
                      <input type="hidden" name="days" id="days">
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
                        <select id="id_jenistamu" onchange="cektamu()" name="idjenistamu" class="form-control field-check-form1" style="width: 100%;" required disabled>
                          <option selected="selected" value=0 disabled="disabled">Pilih Jenis Tamu</option>
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
                      <select id="id_jenistarif" name="idjenistarif" onchange="getTarif()" class="form-control field-check-form1" style="width: 100%;" required disabled>
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
                    <label>Kegiatan</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-keyboard-o"></i>
                      </div>
                      <input type="text" name="kegiatan" class="form-control field-check-form1" placeholder="Kegiatan ... " required>
                    </div>
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Tambah Additional</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-plus"></i>
                      </div>
                      <select id ="event-additional" name="tambahan" class="form-control field-check-form1" style="width: 100%;" disabled>
                        <option selected="selected" disabled="disabled">Tambah Additional ?</option>
                        <option value="ya">Ya</option>
                        <option value="tidak">Tidak</option>
                      </select>
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
                <!-- cek-additional -->
                <div class="box-body col-lg-12 cek-additional">
                    <fieldset class="scheduler-border">
                      <legend class="scheduler-border">Additional</legend>
                        <fieldset class="scheduler-border">
                          <legend class="scheduler-border">Additional Ruang Makan</legend>
                            <table border='0' style='margin-bottom:15px;' width='100%' id='dynamicInput' class='removinput1'>
                              <tr>
                                <td width='85%'>
                                  <label>Ruang Makan</label>
                                    <div class="input-group date">
                                      <div class="input-group-addon">
                                        <i class="fa fa-plus"></i>
                                      </div>
                                      <select name="ruangpertemuan[]" class="form-control field-check-form1 idrumakan" style="width: 100%;" disabled>
                                        <option selected="selected" value=0>Pilih Ruang Makan</option>
                                        <?php foreach($kamar_makan as $rowkamar_makan){?>
                                              <option value="<?=$rowkamar_makan->id_ruangpertemuan?>"><?=$rowkamar_makan->nama_ruang?></option>
                                         <?php }?>
                                      </select>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <button type="button" name="button" onClick="addInput('dynamicInput');" class='btn btn-sm btn-primary btn-flat' style='margin-top:25px; margin-left:10px;'><i class="glyphicon glyphicon-plus"></i></button>
                                  <!-- <button type="button" name="button" id="btnremove1" class='btn btn-sm btn-primary btn-flat' style='margin-top:25px; margin-left:10px;'><i class="glyphicon glyphicon-remove"></i></button> -->
                                </td>
                              </tr>
                              <tr><td><input type='hidden' class='lama3' name='lama' value=0></td><td><input type='hidden' class='baru3' name='baru' value=0></td></tr>
                            </table>
                        </fieldset >

                        <fieldset class="scheduler-border">
                          <legend class="scheduler-border">Additional Ruang Pertemuan RPCB</legend>
                            <table border='0' style='margin-bottom:15px;' width='100%' id='dynamicInput2' class='removinput2'>
                              <tr>
                                <td width='85%'>
                                  <label>Ruang Pertemuan</label>
                                  <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-plus"></i>
                                    </div>
                                    <select name="ruangpertemuan[]" class="form-control field-check-form1 idruangpertemuan" style="width: 100%;" disabled>
                                      <option selected="selected" value=0>Pilih Ruang Pertemuan Rpcb</option>
                                      <?php foreach($ruangan_pertemuan as $rowruangan_pertemuan){?>
                                            <option value="<?=$rowruangan_pertemuan->id_ruangpertemuan?>"><?=$rowruangan_pertemuan->nama_ruang?> ( <?=$rowruangan_pertemuan->kapasitas?> )</option>
                                       <?php }?>
                                    </select>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <button type="button" name="button" onClick="addInput2('dynamicInput2');" class='btn btn-sm btn-primary btn-flat' style='margin-top:25px; margin-left:10px;'><i class="glyphicon glyphicon-plus"></i></button>
                                  <!-- <button type="button" name="button" id="btnremove" class='btn btn-sm btn-primary btn-flat' style='margin-top:25px; margin-left:10px;'><i class="glyphicon glyphicon-remove"></i></button> -->
                                </td>
                              </tr>
                              <tr><td><input type='hidden' class='lama' name='lama' value=0></td><td><input type='hidden' class='baru' name='baru' value=0></td></tr>
                            </table>
                        </fieldset >

                        <fieldset class="scheduler-border">
                          <legend class="scheduler-border">Additional Ruang Pertemuan Yayasan</legend>
                            <table border='0' style='margin-bottom:15px;' width='100%' id='dynamicInput4' class='removinput4'>
                              <tr>
                                <td width='85%'>
                                  <label>Ruang Pertemuan</label>
                                  <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-plus"></i>
                                    </div>
                                    <select name="ruangpertemuanyayasan[]" class="form-control field-check-form1 idruangpertemuanyayasan" style="width: 100%;" disabled>
                                      <option selected="selected" value=0>Pilih Ruang Pertemuan Yayasan</option>
                                      <?php foreach($ruangan_pertemuanyayasan as $rowruangan_pertemuanyayasan){?>
                                            <option value="<?=$rowruangan_pertemuanyayasan->id?>"><?=$rowruangan_pertemuanyayasan->nama_ruang?></option>
                                       <?php }?>
                                    </select>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <button type="button" name="button" onClick="addInput4('dynamicInput4');" class='btn btn-sm btn-primary btn-flat' style='margin-top:25px; margin-left:10px;'><i class="glyphicon glyphicon-plus"></i></button>
                                  <!-- <button type="button" name="button" id="btnremove4" class='btn btn-sm btn-primary btn-flat' style='margin-top:25px; margin-left:10px;'><i class="glyphicon glyphicon-remove"></i></button> -->
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <div class="input-group date" style="margin-top:10px;">
                                    <div class="input-group-addon">
                                      <i class="fa fa-credit-card"></i>
                                    </div>
                                          <input type="text" name="tarifruang[]" class="form-control field-check-form1 tarifRyayasan" id="tarifyayasan" value=0><input type='hidden' id='idkode'>
                                    </div>
                                    </div>
                                </td>
                              </tr>
                              <tr><td><input type='hidden' class='lama4' name='lama' value=0></td><td><input type='hidden' class='baru4' name='baru' value=0></td></tr>
                            </table>
                        </fieldset >

                        <fieldset class="scheduler-border">
                          <legend class="scheduler-border">Additional Fasilitas</legend>
                            <table border='0' style='margin-bottom:15px;' width='100%' id='dynamicInput3' class='removinput3'>
                              <tr>
                                <td width='85%'>
                                  <label>Fasilitas Tambahan</label>
                                  <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-plus"></i>
                                    </div>
                                    <select name="fasilitasplus[]" class="form-control field-check-form1 idadditional" style="width: 100%;" disabled>
                                      <option selected="selected" value=0>Pilih Tambahan Fasilitas</option>
                                      <?php foreach($jenis_additional as $rowjenis_additional){?>
                                            <option value="<?=$rowjenis_additional->id_additional?>"><?=$rowjenis_additional->jenis_additional?></option>
                                       <?php }?>
                                    </select>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <button type="button" name="button" onClick="addInput3('dynamicInput3');" class='btn btn-sm btn-primary btn-flat' style='margin-top:25px; margin-left:10px;'><i class="glyphicon glyphicon-plus"></i></button>
                                  <!-- <button type="button" name="button" id="btnremove3" class='btn btn-sm btn-primary btn-flat' style='margin-top:25px; margin-left:10px;'><i class="glyphicon glyphicon-remove"></i></button> -->
                                </td>
                              </tr>
                              <tr><td><input type='hidden' class='lama2' name='lama' value=0></td><td><input type='hidden' class='baru2' name='baru' value=0></td></tr>
                            </table>
                        </fieldset >
                    </fieldset >
                  </div>

                  <div class="box-body col-lg-6">
                    <div class="form-group">
                      <label>DP Pembayaran</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-credit-card"></i>
                        </div>
                          <input type="text" name="dp" id="tunai" class="form-control field-check-form1" placeholder="DP Pembayaran ... " required>
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
                        <!-- <label>Rp <span id="total1"></span></label> -->
                        <input id="total1" type="text" class="form-control field-check-form1" placeholder="Total Bayar ... " disabled readonly>
                        <input id="total" type="hidden" name="bayar" class="form-control field-check-form1">
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
                        <input type="radio" name="ceked" class="flat-red" value="Ya" id ="yes" required disabled> Ya
                      </label>
                      &nbsp;&nbsp;&nbsp;
                      <label>
                        <input type="radio" name="ceked" class="flat-red" Value="Tidak" id ="no" required> Tidak
                      </label>
                    </div>
                </div>

                <div class="box-body col-lg-12">
                    <div class="form-group">
                      <input type="submit" name="submit" value="Save" class="btn btn-success field-check-form1" disabled>
                      <input type="reset" name="reset" value="Cancel" class="btn btn-success field-check-form1" disabled>
                      <a href="<?php echo base_url('dashboard/admin/data/reservasi'); ?>"><input type="button" value="Go To List Reservasi" class="btn btn-success"></a>
                    </div>
                </div>
              </form>
              <div class="box-body col-lg-12 field-checkkamar">
                <!-- <div class="box-body col-lg-12"> -->
                      <div class="form-group">
                        <label>Nama Ruangan</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-home"></i>
                          </div>
                          <input id="idtransaksi" type="hidden" name="idtrx" class="form-control" readonly required>
                          <select id="id_ruang" onchange="getRuang()" name="ruang" class="form-control " style="width: 100%;">
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
            <p align="center"><b> <span id="kamarnama"></span> </b></p>
            <input id="idxxx" type="hidden" name="idtrx" class="form-control" readonly required>
          </div>
          <div class="form-group">
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
              <input type="radio" id="jk1" onclick="displayResult(this.value)" name="JK" class="flat-red" value="Laki-Laki" required> Laki-Laki
            </label>&nbsp;&nbsp;
            <label>
              <input type="radio" id="jk2" onclick="displayResult(this.value)" name="JK" class="flat-red" Value="Perempuan" required> Perempuan
            </label>
            <br>
            <input type="hidden" id="result">
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
        <h4 class="modal-title"><span id="NkamarID"></span> &nbsp;&nbsp; | &nbsp;&nbsp; <span id="instansiID"></span></h4>
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

<!-- ========================= js ======================= -->
<script type="text/javascript">
  function cektamu()
  {
        var idjenistamu = $('#id_jenistamu').val();
        if(idjenistamu == 13)
        {
              $('#yes').attr('disabled', true);
        }else {
             $('#yes').attr('disabled', false);
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

  var tanpa_tunai = document.getElementById('tunai');
  tanpa_tunai.addEventListener('keyup', function(e)
  {
    tanpa_tunai.value = formatRupiah(this.value);
  });

  var tanpa_tarifyayasan = document.getElementById('tarifyayasan');
  tanpa_tarifyayasan.addEventListener('keyup', function(e)
  {
    tanpa_tarifyayasan.value = formatRupiah(this.value);
  });
</script>

<script type="text/javascript">
$(document).ready(function()
{
    $( "#datepicker1" ).datepicker({ dateFormat: 'dd-mm-yy' });
    $( "#datepicker2" ).datepicker({ dateFormat: 'dd-mm-yy' });
    $('#datepicker2').change(function()
    {
        var start = $('#datepicker1').datepicker('getDate');
        var end   = $('#datepicker2').datepicker('getDate');
    if (start<end)
    {
        var days   = (end - start)/1000/60/60/24;
        $('#days').val(days);
    }
    else
    {
      alert ("You cant come back before you have been!");
      $('#datepicker1').val("");
      $('#datepicker2').val("");
        $('#days').val("");
    }
  });
});
</script>

<script type="text/javascript">
function toRp2(angka){
    var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
    var rev2    = '';
    for(var i = 0; i < rev.length; i++){
        rev2  += rev[i];
        if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
            rev2 += '.';
        }
    }
    return 'Rp ' + rev2.split('').reverse().join('') + ',00';
}

  function validasi(){
    var notelepon = document.getElementById('notelp').value;
    var jumlahtamu = document.getElementById('jmlhtamu').value;
    var number = /^[0-9]+$/;
    if(!jumlahtamu.match(number))
    {
      alert('Jumlah Tamu Harus Angka');
      return false;
    }
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
  $(function () {
      $(".select2").select2();
  });

  var btn = "</td><td><button style='margin-top:25px; margin-left:10px;' class='btn btn-flat btn-danger del4'>X</button></td>";

  var ceki = "class='form-control field-check-form1 idruangpertemuanyayasan'";

  var ruangmakan ="<table style='margin-bottom:15px;' width='100%' id='dynamicInput' class='removinput1'><tr><td width='100%'><label style='margin-top:10px;'>Ruang Makan</label><div class='input-group date'><div class='input-group-addon'><i class='fa fa-plus'></i></div><select name='ruangpertemuan[]' class='form-control field-check-form1 idrumakan' style='width: 100%;'><option selected='selected' value=0>Pilih Ruang Makan</option><?php foreach($kamar_makan as $rowkamar_makan){?><option value='<?=$rowkamar_makan->id_ruangpertemuan?>'><?=$rowkamar_makan->nama_ruang?></option><?php }?></select></div></div></td><td><button style='margin-top:35px; margin-left:10px;' class='btn btn-flat btn-danger del1'>X</button></td></tr><tr><td><input type='hidden' class='lama3' name='lama' value=0></td><td><input type='hidden' class='baru3' name='baru' value=0></td></tr></table>";

  var pertemuan = "<table style='margin-bottom:15px;' width='100%' id='dynamicInput2' class='removinput2'><tr><td width='100%'><label>Ruang Pertemuan</label><div class='input-group date'><div class='input-group-addon'><i class='fa fa-plus'></i></div><select name='ruangpertemuan[]' class='form-control field-check-form1 idruangpertemuan' style='width: 100%;'><option selected='selected' value=0>Pilih Ruang Pertemuan</option><?php foreach($ruangan_pertemuan as $rowruangan_pertemuan){?><option value='<?=$rowruangan_pertemuan->id_ruangpertemuan?>'><?=$rowruangan_pertemuan->nama_ruang?> <?=$rowruangan_pertemuan->kapasitas?> </option><?php }?></select></div></div></td><td><button style='margin-top:25px; margin-left:10px;' class='btn btn-flat btn-danger del'>X</button></td></tr><tr><td><input type='hidden' class='lama' name='lama' value=0><input type='hidden' class='baru' name='baru' value=0></td></tr></table>";

  var pertemuanyayasan  = "<table style='margin-bottom:15px;' width='100%' id='dynamicInput4' class='removinput4'><tr><td width='100%'><label>Ruang Pertemuan</label><div class='input-group date'><div class='input-group-addon'><i class='fa fa-plus'></i></div><select name='ruangpertemuanyayasan[]' "+ceki+" style='width: 100%;'><option value='0'>Pilih Ruang Yayasan</option><?php foreach($ruangan_pertemuanyayasan as $row_pertemuanyayasan){?><option value='<?=$row_pertemuanyayasan->id?>'><?=$row_pertemuanyayasan->nama_ruang?></option><?php }?></select></div></div></td>"+btn+"</tr><tr><td><div class='input-group date' style='margin-top:10px;'><div class='input-group-addon'><i class='fa fa-credit-card'></i></div><input type='text' name='tarifruang[]' class='form-control field-check-form1 tarifRyayasan' id='tarifyayasan' value=0></div></td></tr><tr><td><input type='hidden' class='lama4' value=0><input type='hidden' class='baru4' value=0></td></tr></table>";

  var additional = "<table style='margin-bottom:15px;' width='100%' id='dynamicInput2' class='removinput3'><tr><td width='100%'><label>Fasilitas Tambahan</label><div class='input-group date'><div class='input-group-addon'><i class='fa fa-plus'></i></div><select name='fasilitasplus[]' class='form-control field-check-form1 idadditional' style='width: 100%;'><option selected='selected' value=0>Pilih Tambahan Fasilitas</option><?php foreach($jenis_additional as $rowjenis_additional){?><option value='<?=$rowjenis_additional->id_additional?>'><?=$rowjenis_additional->jenis_additional?></option><?php }?></select></div></div></td><td><button style='margin-top:25px; margin-left:10px;' class='btn btn-flat btn-danger del3'>X</button></td></tr><tr><td><input type='hidden' class='lama2' name='lama' value=0></td><td><input type='hidden' class='baru2' name='baru' value=0></td></tr></table>";

  var counter = 1;
  var counter2 = 1;
  var counter3 = 1;
  function addInput(divName)
  {
    $.get('<?php echo base_url(). 'api/count/ruang/makan'; ?>',function(response)
    {
      var datatot1 = JSON.parse(response);
      var jumlah = datatot1.length;

        if (counter == jumlah)
        {
             alert("You have reached the limit of adding " + counter + " inputs");
        }
        else
        {
           var newdiv = document.createElement('div');
           newdiv.innerHTML = ruangmakan;
           document.getElementById(divName).appendChild(newdiv);
           counter++;
        }
    });
   }

   $(document).on('click', '.del1', function(event) {
     var baruharga = $(this).parent().parent().parent().parent().find('.baru3').val();
     var totHarga = $('#total').val();

     total = parseFloat(totHarga) - parseFloat(baruharga);
     var rps = toRp2(total);
      $('#total').val(total);
      $('#total1').val(rps);

     var target = $(event.target),
         row = target.closest('.removinput1');
     row.remove();
     counter--;
   });

   function addInput2(divName)
   {
     $.get('<?php echo base_url(). 'api/count/ruang/pertemuan'; ?>',function(response)
     {
       var datatot2 = JSON.parse(response);
       var jumlah1 = datatot2.length;

         if (counter2 == jumlah1)
         {
              alert("You have reached the limit of adding " + counter2 + " inputs");
         }
         else
         {
           var newdiv = document.createElement('div');
           newdiv.innerHTML = pertemuan;
           document.getElementById(divName).appendChild(newdiv);
           counter2++;
         }
     });
    }

    $(document).on('click', '.del', function(event) {
      var baruharga = $(this).parent().parent().parent().parent().find('.baru').val();
      var totHarga = $('#total').val();

      total = parseFloat(totHarga) - parseFloat(baruharga);
      var rps = toRp2(total);
       $('#total').val(total);
       $('#total1').val(rps);

      var target = $(event.target),
          row = target.closest('.removinput2');
      row.remove();
      counter2--;
    });

    function addInput3(divName)
    {
      var newdiv = document.createElement('div');
      newdiv.innerHTML = additional;
      document.getElementById(divName).appendChild(newdiv);
      counter++;
     }

     $(document).on('click', '.del3', function(event) {
       var baruharga = $(this).parent().parent().parent().parent().find('.baru2').val();
       var totHarga = $('#total').val();

       total = parseFloat(totHarga) - parseFloat(baruharga);
       var rps = toRp2(total);
        $('#total').val(total);
        $('#total1').val(rps);

       var target = $(event.target),
           row = target.closest('.removinput3');
       row.remove();
     });

     function addInput4(divName)
     {
       $.get('<?php echo base_url(). 'api/count/ruang/pertemuan/yayasan'; ?>',function(response)
       {
         var datatot4 = JSON.parse(response);
         var jumlah1 = datatot4.length;

           if (counter3 == jumlah1)
           {
                alert("You have reached the limit of adding " + counter3 + " inputs");
           }
           else
           {
             var newdiv = document.createElement('div');
             newdiv.innerHTML = pertemuanyayasan;
             document.getElementById(divName).appendChild(newdiv);
             counter3++;
           }
       });
      }

      $(document).on('click', '.del4', function(event) {
        var baruharga = $(this).parent().parent().parent().parent().find('.baru4').val();
        var totHarga = $('#total').val();

        total = parseFloat(totHarga) - parseFloat(baruharga);
        var rps = toRp2(total);
         $('#total').val(total);
         $('#total1').val(rps);

        var target = $(event.target),
            row = target.closest('.removinput4');
        row.remove();
        counter3--;
      });

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

var gender = "";
    function deleteData(id) {
        swal({
          title: "Apakah Ingin Memilih Ruang ?",
          text: "Anda Dapat Memilih Ruang Dan Kamar",
          type: "warning",
          showCancelButton: false,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, Pick Room!",
          //cancelButtonText: "No, No Pick Room!",
          closeOnConfirm: false,
          //closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
            swal("Pick Room!", "Anda Memilih Untuk Menset Ruangan", "success", {id:id});
            $('.field-checkkamar').show();
          // } else {
          //   swal("Cancelled!", "Anda Memilih Untuk Tidak Menset Ruangan", "error");
          }
        });
    }
    function handleClickUpdate(e){
      e.preventDefault();
    }

    function toRp(angka){
        var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
        var rev2    = '';
        for(var i = 0; i < rev.length; i++){
            rev2  += rev[i];
            if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
                rev2 += '.';
            }
        }
        return 'Rp ' + rev2.split('').reverse().join('') + ',00';
    }

    var total = 0;
    $(document).on('change', '.idruangpertemuan', function(){
          var id_jenistamu = $('#id_jenistamu').val();
          var id_jenistarif = $('#id_jenistarif').val();
          var jmlhtamu = $('#jmlhtamu').val();
          var hari = $('#days').val();
          var idruangpertemuan= $(this).val();
          var cek = $('#event-additional').val();

          //alert($(this).parent().parent().parent().parent().parent().parent().find('.baru').val());
          var lamactrl = $(this).parent().parent().parent().parent().find('.lama');
          var baructrl = $(this).parent().parent().parent().parent().find('.baru');

          if(cek == "ya")
          {
            $.get('<?php echo base_url(). 'api/tarif'; ?>', {id_jenistamu: id_jenistamu, id_jenistarif: id_jenistarif}, function(response)
            {
              var data = JSON.parse(response);
              if(idruangpertemuan != 0)
              {
                  $.get('<?php echo base_url(). 'api/tarif/ruang/pertemuan?id_ruangpertemuan='?>'+idruangpertemuan, function(response)
                  {
                      //alert(lamactrl.val());
                      var Bbaru = baructrl.val();
                      lamactrl.val(Bbaru);
                      var datapertemuan = JSON.parse(response);
                      var hargabaru = parseFloat(datapertemuan.harga);
                      baructrl.val(hargabaru);
                      var Llama = lamactrl.val();

                      total = (total - parseFloat(Llama)) + hargabaru;
                      var rp = toRp(total);
                       $('#total').val(total);
                       $('#total1').val(rp);
                       console.log("ada1");
                  });
               }else {
                   var Bbaru = baructrl.val();
                   lamactrl.val(Bbaru);
                   var datapertemuan = JSON.parse(response);
                   var hargabaru = 0;
                   baructrl.val(hargabaru);
                   var Llama = lamactrl.val();

                  total = (total - parseFloat(Llama)) + hargabaru;
                  var rp = toRp(total);
                  $('#total').val(total);
                  $('#total1').val(rp);
                  console.log("ada1");
               }
            });
          }
          else {
            $.get('<?php echo base_url(). 'api/tarif'; ?>', {id_jenistamu: id_jenistamu, id_jenistarif: id_jenistarif}, function(response)
            {
                  var data = JSON.parse(response);
                  total = (parseFloat(jmlhtamu) * parseFloat(data.tarif)) * parseFloat(hari);
                  var rp = toRp(total);
                   $('#total').val(total);
                   $('#total1').val(rp);
                   console.log("tidak ada");
            });
          }
    });

    $(document).on('change', '.idadditional', function(){
      var id_jenistamu = $('#id_jenistamu').val();
      var id_jenistarif = $('#id_jenistarif').val();
      var jmlhtamu = $('#jmlhtamu').val();
      var hari = $('#days').val();
      var idadditional = $(this).val();
      var cek = $('#event-additional').val();

      var lamactrl2 = $(this).parent().parent().parent().parent().find('.lama2');
      var baructrl2 = $(this).parent().parent().parent().parent().find('.baru2');

      if(cek == "ya")
      {
        $.get('<?php echo base_url(). 'api/tarif'; ?>', {id_jenistamu: id_jenistamu, id_jenistarif: id_jenistarif}, function(response)
        {
          var data = JSON.parse(response);
          if(idadditional != 0)
          {
			  if(idadditional == 2 || idadditional == 1)
			  {
				  $.get('<?php echo base_url(). 'api/tarif/additional'; ?>', {id_additional: idadditional}, function(response)
				  {
					//alert(baructrl2.val());
					var Bbaru2 = baructrl2.val();
					lamactrl2.val(Bbaru2);
					var dataadditional = JSON.parse(response);
					var hargabaru2 = (parseFloat(dataadditional.harga)*jmlhtamu);
					baructrl2.val(hargabaru2);
					var Llama2 = lamactrl2.val();

					  console.log(total);
					  console.log(Bbaru2);
					  console.log(hargabaru2);
					  console.log(Llama2);

					  total = (total - parseFloat(Llama2)) + hargabaru2;
					  console.log("-------------------------------------------------");
					  console.log(total);
					  var rp = toRp(total);
					   $('#total').val(total);
					   $('#total1').val(rp);
					   console.log("ada2");
				   });
			  }
			  else
			  {
              $.get('<?php echo base_url(). 'api/tarif/additional'; ?>', {id_additional: idadditional}, function(response)
              {
                //alert(baructrl2.val());
                var Bbaru2 = baructrl2.val();
                lamactrl2.val(Bbaru2);
                var dataadditional = JSON.parse(response);
                var hargabaru2 = parseFloat(dataadditional.harga);
                baructrl2.val(hargabaru2);
                var Llama2 = lamactrl2.val();

                  console.log(total);
                  console.log(Bbaru2);
                  console.log(hargabaru2);
                  console.log(Llama2);

                  total = (total - parseFloat(Llama2)) + hargabaru2;
                  console.log("-------------------------------------------------");
                  console.log(total);
                  var rp = toRp(total);
                   $('#total').val(total);
                   $('#total1').val(rp);
                   console.log("ada2");
               });
			  }
            }else {
                var Bbaru2 = baructrl2.val();
                lamactrl2.val(Bbaru2);
                var dataadditional = JSON.parse(response);
                var hargabaru2 = 0;
                baructrl2.val(hargabaru2);
                var Llama2 = lamactrl2.val();

                console.log(total);
                console.log(Bbaru2);
                console.log(hargabaru2);
                console.log(Llama2);

                total = (total - parseFloat(Llama2)) + hargabaru2;
                console.log("-------------------------------------------------");
                console.log(total);
                var rp = toRp(total);
                $('#total').val(total);
                $('#total1').val(rp);
                console.log("ada2");
            }
        });
      }
      else {
        $.get('<?php echo base_url(). 'api/tarif'; ?>', {id_jenistamu: id_jenistamu, id_jenistarif: id_jenistarif}, function(response)
        {
              var data = JSON.parse(response);
              total = (parseFloat(jmlhtamu) * parseFloat(data.tarif)) * parseFloat(hari);
              var rp = toRp(total);
               $('#total').val(total);
               $('#total1').val(rp);
               console.log("tidak ada");
        });
      }
    });

    $(document).on('change', '.idrumakan', function(){
      var id_jenistamu = $('#id_jenistamu').val();
      var id_jenistarif = $('#id_jenistarif').val();
      var jmlhtamu = $('#jmlhtamu').val();
      var hari = $('#days').val();
      var idruangmakan = $(this).val();
      var cek = $('#event-additional').val();

      var lamactrl3 = $(this).parent().parent().parent().parent().find('.lama3');
      var baructrl3 = $(this).parent().parent().parent().parent().find('.baru3');

      if(cek == "ya")
      {
        $.get('<?php echo base_url(). 'api/tarif'; ?>', {id_jenistamu: id_jenistamu, id_jenistarif: id_jenistarif}, function(response)
        {
          var data = JSON.parse(response);
          if(idruangmakan != 0)
          {
              $.get('<?php echo base_url(). 'api/tarif/ruang/pertemuan'; ?>?id_ruangpertemuan='+idruangmakan, function(response)
              {
                //alert(baructrl3.val());
                var Bbaru3 = baructrl3.val();
                lamactrl3.val(Bbaru3);
                var datapertemuanmakan = JSON.parse(response);
                var hargabaru3 = parseFloat(datapertemuanmakan.harga);
                baructrl3.val(hargabaru3);
                var Llama2 = lamactrl3.val();

                console.log(total);
                console.log(Bbaru3);
                console.log(hargabaru3);
                console.log(Llama3);
                console.log(Bhargabaru3);

                total = (total - parseFloat(Llama3)) + hargabaru3;
                console.log("-------------------------------------------------");
                console.log(total);
                var rp = toRp(total);
                 $('#total').val(total);
                 $('#total1').val(rp);
                 console.log("ada3");
              });
           }else {
             var Bbaru3 = baructrl3.val();
             lamactrl3.val(Bbaru3);
             var datapertemuanmakan = JSON.parse(response);
             var hargabaru3 = 0;
             baructrl3.val(hargabaru3);
             var Llama2 = lamactrl3.val();

             console.log(total);
             console.log(Bbaru3);
             console.log(hargabaru3);
             console.log(Llama3);
             console.log(Bhargabaru3);

             total = (total - parseFloat(Llama3)) + hargabaru3;
             console.log("-------------------------------------------------");
             console.log(total);
             var rp = toRp(total);
              $('#total').val(total);
              $('#total1').val(rp);
              console.log("ada3");
           }
        });
      }
      else {
        $.get('<?php echo base_url(). 'api/tarif'; ?>', {id_jenistamu: id_jenistamu, id_jenistarif: id_jenistarif}, function(response)
        {
              var data = JSON.parse(response);
              total = (parseFloat(jmlhtamu) * parseFloat(data.tarif)) * parseFloat(hari);
              var rp = toRp(total);
               $('#total').val(total);
               $('#total1').val(rp);
               console.log("tidak ada");
        });
      }
    });

    $(document).on('input', '.tarifRyayasan', function(){
          var id_jenistamu = $('#id_jenistamu').val();
          var id_jenistarif = $('#id_jenistarif').val();
          var jmlhtamu = $('#jmlhtamu').val();
          var hari = $('#days').val();
          var idruangpertemuanyayasan = $(this).val();
          var cek = $('#event-additional').val();

          //alert($(this).parent().parent().parent().parent().parent().find('.tarifRyayasan').val().replace(/[^,\d]/g, '').toString());
          var lamactr4 = $(this).parent().parent().parent().parent().parent().find('.lama4');
          var baructr4 = $(this).parent().parent().parent().parent().parent().find('.baru4');
          var hargayayasan = $(this).parent().parent().parent().parent().parent().find('.tarifRyayasan');

          if(cek == "ya")
          {
            $.get('<?php echo base_url(). 'api/tarif'; ?>', {id_jenistamu: id_jenistamu, id_jenistarif: id_jenistarif}, function(response)
            {
              var data = JSON.parse(response);
                  var Bbaru4 = baructr4.val();
                  lamactr4.val(Bbaru4);
                  var hargabaru4 = parseFloat(hargayayasan.val().replace(/[^,\d]/g, '').toString());
                  baructr4.val(hargabaru4);
                  var Llama4 = lamactr4.val();

                  console.log(total);
                  console.log(Bbaru4);
                  console.log(hargabaru4);
                  console.log(Llama4);

                  total = (total - parseFloat(Llama4)) + hargabaru4;
                  console.log("-------------------------------------------------");
                  console.log(total);
                  var rp = toRp(total);
                   $('#total').val(total);
                   $('#total1').val(rp);
                   console.log("ada4");

            });
          }
          else {
            $.get('<?php echo base_url(). 'api/tarif'; ?>', {id_jenistamu: id_jenistamu, id_jenistarif: id_jenistarif}, function(response)
            {
                  var data = JSON.parse(response);
                  total = (parseFloat(jmlhtamu) * parseFloat(data.tarif)) * parseFloat(hari);
                  var rp = toRp(total);
                   $('#total').val(total);
                   $('#total1').val(rp);
                   console.log("tidak ada");
            });
          }
    });
//------------------------------------------------------ GET TARIF ALL-----------------------------------------------
    function getTarif() {
      var id_jenistamu = $('#id_jenistamu').val();
      var id_jenistarif = $('#id_jenistarif').val();
      var jmlhtamu = $('#jmlhtamu').val();
      var hari = $('#days').val();
      var idruangpertemuan= $('.idruangpertemuan').val();
      var idadditional = $('#idadditional').val();
      var cek = $('#event-additional').val();

      if(cek == "ya")
      {
        $.get('<?php echo base_url(). 'api/tarif'; ?>', {id_jenistamu: id_jenistamu, id_jenistarif: id_jenistarif}, function(response)
        {
          var data = JSON.parse(response);
          $.get('<?php echo base_url(). 'api/tarif/ruang/pertemuan'; ?>?id_ruangpertemuan='+idruangpertemuan, function(response)
          {
              var datapertemuan = JSON.parse(response);
              total = total + parseFloat(datapertemuan.harga);
              var rp = toRp(total);
               $('#total').val(total);
               $('#total1').val(rp);
               console.log("ada1");
          });
        });
      }
      else {
        $.get('<?php echo base_url(). 'api/tarif'; ?>', {id_jenistamu: id_jenistamu, id_jenistarif: id_jenistarif}, function(response)
        {
              var data = JSON.parse(response);
              total = (parseFloat(jmlhtamu) * parseFloat(data.tarif)) * parseFloat(hari);
              var rp = toRp(total);
               $('#total').val(total);
               $('#total1').val(rp);
               console.log("tidak ada");
        });
      }
    }
//-------------------------------------------------------------------------------------------------------

    function getRuang() {
      var id_ruang = $('#id_ruang').val();
      var tgl_checkin = $('#datepicker1').val();
      var tgl_checkout = $('#datepicker2').val();
      var bg = 0;

      // $.get('<?php echo base_url(). 'api/transaksi'; ?>', function(response) {
      //   var datatrans = JSON.parse(response);
      //   var iDx = datatrans.id_transaksi;
      // });

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
              $("#kotakkamar").append("<div class='col-lg-2' style='background:"+bg+"; color:#fff; margin-right:1px; height:110px; margin-bottom:5px; margin-left:20px; border: 2px solid grey;'><p align='center'><label>"+ value.nama_kamar+"</label><br><button type='button' onclick='getKamar("+ value.id_kamar+")' id='id_kamar' style='margin-top:25px; background-color:"+bgbtn+"; border-color:"+bgbtn+";' class='btn btn-sm btn-flat' > <i class='glyphicon glyphicon-plus'></i>&nbsp; </button> <button type='button' onclick='getDetailKamar("+ value.id_kamar+")' style='margin-top:25px; background-color:"+bgbtn+"; border-color:"+bgbtn+";' class='btn btn-sm' data-toggle='modal' data-target='.bs-example-modal-sm'> <i class='glyphicon glyphicon-list'></i>&nbsp; </button></p></div>");
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
                var instnsi = value2.instansi;
                var Nkamar = value2.nama_kamar;
                document.getElementById("instansiID").innerHTML=instnsi;
                document.getElementById("NkamarID").innerHTML=Nkamar;

                hasilz += "+. Nama : "+name+" | Jenis Kelamin : "+gen+"<br>";
                $("#kotaktamu").append("<tr><td width='10%'> "+ j++ +" </td><td width='70%'> "+ name +" </td><td width='20%'> "+ gen+"</td></tr>");
              });
          }else {
                $("#kotaktamu").append("<tr><td colspan='3' align='center'><h3>Kosong</h3></td></tr>");
          }
      });
    }

    function displayResult(jeniskelamin)
    {
      document.getElementById("result").value = jeniskelamin;
    }
    var count=1;
    function getKamar($idKamar) {
      var id_ruang= $('#id_ruang').val();
      var tgl_checkin = $('#datepicker1').val();
      var tgl_checkout = $('#datepicker2').val();
      var id_kamar = $idKamar;
      var id_kamar = id_kamar;
      var jumlahtamu = $('#jmlhtamu').val();
      var trxid = $('#idtransaksi').val();
      $('#kamar').val(id_kamar);


      $.get('<?php echo base_url(). 'api/transaksi/total'; ?>?transaksi_id='+trxid+'&tgl_checkin=%27'+tgl_checkin+'%27&tgl_checkout=%27'+tgl_checkout+'%27', function(response) {
      var datatot = JSON.parse(response);
      var jumlah = datatot.length;

     console.log(jumlah);

      if(jumlah == jumlahtamu)
      {
        $('#exampleModalAdd').modal('hide');
        alert("Maaf Inputan Tidak Boleh Melebihi Jumlah Tamu");
      }
      else {
        $.get('<?php echo base_url(). 'api/transaksi/room/detil'; ?>?id_ruang='+id_ruang+'&id_kamar='+id_kamar+'&tgl_checkin=%27'+tgl_checkin+'%27&tgl_checkout=%27'+tgl_checkout+'%27', function(response) {
        var data = JSON.parse(response);
        var panjang = data.length;

        jQuery.each( data, function( key5, value5 )
        {
          gender =  value5.jenis_kelamin;
        });
        if(panjang == 3)
        {
          // var Instan = $('#ins').val();
          // var hit = count--;
          // var gabhit = Instan+hit;
          // $('#namatamu').val(gabhit);

          $('#exampleModalAdd').modal('hide');
          alert("Maaf Kamar Sudah Penuh");
        }else {
          var Instan = $('#ins').val();
          var hit = count++;
          var gabhit = Instan+hit;
          $('#namatamu').val(gabhit);

          if(panjang > 0)
          {
            alert('Warning ! Yang Menginap Di Kamar Ini Adalah : ' + gender);
            $('#exampleModalAdd').modal('show');
          }
          else {
            alert("Masih Belum Ada Yang Menginap Di Kamar Ini");
            $('#exampleModalAdd').modal('show');
          }
        }
       });
      }
      });
    }

    jQuery(document).ready(function($){
      $('#MyForm1').on('submit',function(e)
      {
        // var jenisgender1 = $('#result').val();
        // var kalimat = "Warning 2 ! Yang Menginap Di Kamar Ini Adalah : " + gender;
        //
        // if(jenisgender1 == "")
        // {
        //   alert(kalimat);
        //   return false;
        // }
        // else
        // {
        e.preventDefault(); // <------this will restrict the page refresh
        var form_data = $(this).serialize();
        $.ajax({
            url: "<?php echo base_url(). 'ReservationController/add_detailroom'; ?>",
            type: 'POST',
            data: form_data, // $(this).serialize(); you can use this too0
            dataType: 'json',
            success: function(msg) {
                  if(msg.error == "no"){
                    alert('Sukses Input Data');
                    $("[data-dismiss=modal]").trigger({ type: "click" });
                    getRuang();
                  }else{
                    alert('Gagal Input Data');
                  }
            }
       });
    // }
     });
    });
</script>

  <script type = "text/javascript">
  jQuery(document).ready(function($){
    $('#form').on('submit',function(e){
      var notelepon = document.getElementById('notelp').value;
      var jumlahtamu = document.getElementById('jmlhtamu').value;
      var dpuang = $('#tunai').val().replace(/[^,\d]/g, '').toString();
      var number = /^[0-9]+$/;
      if(!jumlahtamu.match(number))
      {
        alert('Jumlah Tamu Harus Angka');
        return false;
      }
      else if(!notelepon.match(number) || notelepon.length >= 13)
      {
        alert('No Telphone Tidak Valid');
        return false;
      }
      else if(!dpuang.match(number))
      {
          alert('DP Harus Angka');
          return false;
      }else{
      e.preventDefault(); // <------this will restrict the page refresh
      var form_data = $(this).serialize();
      swal({
        title: "Apakah Anda Yakin ?",
        text: "Apakah Anda Ingin Melanjutkan Proses Reservasi ?",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Ya, Lanjutkan Transaksi",
        cancelButtonText: "Tidak, Cancel Transaksi",
        closeOnConfirm: false
      },
      function(isConfirm) {
        if (isConfirm == true)
        {
          swal("Lanjutkan Transaksi!", "Anda Memilih Untuk Melanjutkan Transaksi", "success");
          $.ajax({
              url: "<?php echo base_url(). 'ReservationController/tambah_aksi'; ?>",
              type: 'POST',
              data: form_data,
              dataType: 'json',
              success: function(msg)
              {
                  if(msg.error == "no")
                  {
                    console.log(msg.id_data);
                    $('#idxxx').val(msg.id_data);
                    $('#idtransaksi').val(msg.id_data);
                    var validasicek = document.querySelector('input[name = "ceked"]:checked').value;

                    if(validasicek == 'Ya')
                    {
                      setTimeout(function() {
                         deleteData(msg.id_data);
                      }, 2000);
                      $('.field-check-form1').attr('disabled', true);
                    }
                    else {
                      setTimeout(function() {
                      }, 2000);
                      $('.field-check-form1').attr('disabled', true);
                    }
                  }
                  else
                  {
                    alert('Gagal Input Data');
                  }
              }
          });
        } else {
        }
      });
    }
   });
  });
  </script>
<?php include "Footer.php"; ?>
