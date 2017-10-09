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
              <h3 class="box-title">
                Edit Data Reservasi
                    <?php foreach ($transaksitrx as $dt) { ?>
                        <a href="<?php echo base_url('dashboard/admin/data/reservasi/edit/'.$dt->id_transaksi); ?>"><button class="btn btn-success btn-sm btn-flat"><i class="glyphicon glyphicon-chevron-left"></i>&nbsp; Go To List Reservasi</button></a>

                        <a href="<?php echo base_url('dashboard/admin/data/reservasi/update/'.$dt->id_transaksi); ?>"><button class="btn btn-success btn-sm btn-flat"><i class="glyphicon glyphicon-refresh"></i>&nbsp; Reload</button></a>
                    <?php } ?>
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php
                  foreach($transaksitrx as $tx){
                    $tot = $tx->total_bayar2;
                    $totreduk = $tx->reduksi;
                    $angka_format = number_format($tot,2,",",".");
                    $angka_format2 = number_format($totreduk,2,",",".");
                    $tanggal1 =  $tx->tgl_checkin;
                    $tanggal2 =  $tx->tgl_checkout;
                    //if($tx->status_order == "Reserved" || $tx->status_order == "New Reservation"){
              ?>
              <form id="form">
                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Instansi Pemesan</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-user-plus"></i>
                      </div>
                      <input type="text" id="ins" name="instansi" class="form-control field-check-form1" value="<?php echo $tx->instansi ?>">
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
                      <input type="hidden" id="id_transaksi" name="id_transaksi" value="<?php echo $tx->id_transaksi ?>">
                      <input type="hidden" name="id" class="form-control" value="<?php echo $tx->id_transaksi ?>">
                      <input type="text" name="namapemesan" class="form-control" value="<?php echo $tx->nama_pemesan ?>">
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
                      <input type="hidden" name="tglin" class="form-control" id="datepicker1a" value="<?php echo $tanggal1 ?>">
                      <input type="text" name="in" class="form-control pull-right" id="datepicker1" onchange="getTarif()" value="<?php echo $tanggal1 ?>">
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
                      <input type="hidden" name="tglout" class="form-control" id="datepicker2a" value="<?php echo $tanggal2 ?>">
                      <input type="text" name="out" class="form-control pull-right" id="datepicker2" onchange="getTarif()" value="<?php echo $tanggal2 ?>">
                      <input type="hidden" name="days" id="days"><input type="hidden" name="dayss" id="dayss">
                    </div>
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>No Telp Pemesan</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-phone"></i>
                        </div>
                        <input type="text" name="notelp" id="notelp" class="form-control pull-right" value="<?php echo $tx->no_telp ?>">
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
                      <input type="number" name="jmlhtamu" id="jmlhtamu" onchange="getTarif()" class="form-control" value="<?php echo $tx->jumlah_tamu ?>">
                      <input type="hidden" name="jmlahtamu" id="jmlt" value="<?php echo $tx->jumlah_tamu ?>">
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
                        <select onchange="getTarif()" id="id_jenistamu" name="idjenistamu" class="form-control" style="width: 100%;" required>
                          <!-- <option selected="selected" value="" disabled="disabled">Pilih Jenis Tamu</option> -->
                          <?php foreach($idjenistamu as $rowjenistamu){?>
                                <option value="<?=$rowjenistamu->id_jenistamu?>" <?= $tx->id_jenistamu == $rowjenistamu->id_jenistamu ? 'selected' : null ?>><?=$rowjenistamu->jenistamu?></option>
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
                      <select onchange="getTarif()" id="id_jenistarif" name="idjenistarif" class="form-control" style="width: 100%;">
                        <option selected="selected" disabled="disabled">Pilih Jenis Tarif</option>
                        <?php foreach($idjenistarif as $rowjenistarif){?>
                              <option value="<?=$rowjenistarif->id_jenistarif?>" <?= $tx->id_jenistarif == $rowjenistarif->id_jenistarif ? 'selected' : null ?>><?=$rowjenistarif->jenistarif?></option>
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
                      <input type="text" name="kegiatan" class="form-control field-check-form1" value="<?php echo $tx->kegiatan ?>">
                    </div>
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Edit Additional</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-plus"></i>
                      </div>
                      <select id ="event-additional" name="tambahan" class="form-control field-check-form1" style="width: 100%;" disabled>
                        <option selected="selected" disabled="disabled">Edit Additional ?</option>
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
                      <textarea name="permintaankhusus" class="form-control" rows="3"> <?php echo $tx->permintaan_khusus ?> </textarea>
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
                          <?php
                          if($tampilForRuangMakancount > 0)
                          {
                            foreach ($tampilForRuangMakan as $trm)
                            {
                          ?>
                              <tr class="row-<?= $trm->transaksi_addt_id ?>">
                                <td width='85%'>
                                  <label>Ruang Makan</label>
                                    <div class="input-group date">
                                      <div class="input-group-addon">
                                        <i class="fa fa-plus"></i>
                                      </div>
                                      <select name="ruangpertemuanmakan[]" class="form-control field-check-form1 idrumakan" style="width: 100%;" disabled>
                                        <?php foreach($kamar_makan as $rowkamar_makan){?>
                                              <option value="<?=$rowkamar_makan->id_ruangpertemuan?>" <?= $trm->pertemuan_id == $rowkamar_makan->id_ruangpertemuan ? 'selected' : null ?>><?=$rowkamar_makan->nama_ruang?></option>
                                         <?php }?>
                                      </select>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <button type="button" name="button" onClick="addInput('dynamicInput');" class='btn btn-sm btn-primary btn-flat' style='margin-top:25px; margin-left:10px;'><i class="glyphicon glyphicon-plus"></i></button>
                                  <button style='margin-top:25px; margin-left:10px;' onClick="deleteData1(<?= $trm->transaksi_addt_id ?>,<?= $trm->harga ?>)" class='btn btn-flat btn-sm btn-danger'><i class="glyphicon glyphicon-remove"></i></button>
                                  <input type='hidden' name='IDAddDetil1[]' value=<?php echo $trm->transaksi_addt_id ?>>
                                  <input type='hidden' class='lama3' name='lama' value=0>
                                  <input type='hidden' class='baru3' name='baru' value=<?php echo $trm->harga ?>>
                                </td>
                              </tr>
                          <?php
                            }
                          }else {
                          ?>
                          <tr>
                            <td width='85%'>
                              <label>Ruang Makan</label>
                                <div class="input-group date">
                                  <div class="input-group-addon">
                                    <i class="fa fa-plus"></i>
                                  </div>
                                  <select name="ruangpertemuanmakanv2[]" class="form-control field-check-form1 idrumakan" style="width: 100%;" disabled>
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
                              <input type='hidden' class='lama3' name='lama' value=0>
                              <input type='hidden' class='baru3' name='baru' value=0>
                            </td>
                          </tr>
                          <?php }  ?>
                          </table>
                          <input type='hidden' class='IDAddDetil1delete' name='IDAddDetil1del'>
                        </fieldset >

                        <fieldset class="scheduler-border">
                          <legend class="scheduler-border">Additional Ruang Pertemuan RPCB</legend>
                          <table border='0' style='margin-bottom:15px;' width='100%' id='dynamicInput2' class='removinput2'>
                          <?php
                          if($tampilForRuangRPCBcount > 0)
                          {
                            foreach ($tampilForRuangRPCB as $tr)
                            {
                          ?>
                              <tr class="row-<?= $tr->transaksi_addt_id ?>">
                                <td width='85%'>
                                  <label>Ruang Pertemuan</label>
                                  <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-plus"></i>
                                    </div>
                                    <select name="ruangpertemuan[]" class="form-control field-check-form1 idruangpertemuan" style="width: 100%;" disabled>
                                      <?php foreach($ruangan_pertemuan as $rowruangan_pertemuan){?>
                                            <option value="<?=$rowruangan_pertemuan->id_ruangpertemuan?>" <?= $tr->pertemuan_id == $rowruangan_pertemuan->id_ruangpertemuan ? 'selected' : null ?>><?=$rowruangan_pertemuan->nama_ruang?></option>
                                       <?php }?>
                                    </select>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <button type="button" name="button" onClick="addInput2('dynamicInput2');" class='btn btn-sm btn-primary btn-flat' style='margin-top:25px; margin-left:10px;'><i class="glyphicon glyphicon-plus"></i></button>
                                  <button style='margin-top:25px; margin-left:10px;' onClick="deleteData(<?= $tr->transaksi_addt_id ?>,<?= $tr->harga ?>)" class='btn btn-flat btn-sm btn-danger'><i class="glyphicon glyphicon-remove"></i></button>
                                  <input type='hidden' class='IDAddDetil2' name='IDAddDetil2[]' value=<?php echo $tr->transaksi_addt_id ?>>
                                  <input type='hidden' class='lama' name='lama' value=0>
                                  <input type='hidden' class='baru' name='baru' value=<?php echo $tr->harga ?>><br>
                                </td>

                              </tr>
                              <?php
                                }
                              }else {
                              ?>
                              <tr>
                                <td width='85%'>
                                  <label>Ruang Pertemuan</label>
                                  <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-plus"></i>
                                    </div>
                                    <select name="ruangpertemuanv2[]" class="form-control field-check-form1 idruangpertemuan" style="width: 100%;" disabled>
                                      <option selected="selected" value=0>Pilih Ruang Pertemuan Rpcb</option>
                                      <?php foreach($ruangan_pertemuan as $rowruangan_pertemuan){?>
                                            <option value="<?=$rowruangan_pertemuan->id_ruangpertemuan?>"><?=$rowruangan_pertemuan->nama_ruang?></option>
                                       <?php }?>
                                    </select>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <button type="button" name="button" onClick="addInput2('dynamicInput2');" class='btn btn-sm btn-primary btn-flat' style='margin-top:25px; margin-left:10px;'><i class="glyphicon glyphicon-plus"></i></button>
                                  <!-- <button type="button" name="button" id="btnremove" class='btn btn-sm btn-primary btn-flat' style='margin-top:25px; margin-left:10px;'><i class="glyphicon glyphicon-remove"></i></button> -->
                                  <input type='hidden' class='lama' name='lama' value=0>
                                  <input type='hidden' class='baru' name='baru' value=0>
                                </td>
                              </tr>
                           <?php } ?>
                           </table>
                              <input type='hidden' class='IDAddDetil2delete' name='IDAddDetil2del'>
                        </fieldset >

                        <fieldset class="scheduler-border">
                          <legend class="scheduler-border">Additional Ruang Pertemuan Yayasan</legend>
                            <table border='0' style='margin-bottom:15px;' width='100%' id='dynamicInput4' class='removinput4'>
                          <?php
                          if($tampilForRyayasancount > 0)
                          {
                            foreach ($tampilForRyayasan as $try)
                            {
                          ?>
                              <tr class="row-<?= $try->transaksi_addt_id ?>">
                                <td width='85%'>
                                  <label>Ruang Pertemuan</label>
                                  <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-plus"></i>
                                    </div>
                                    <select name="ruangpertemuanyayasan[]" class="form-control field-check-form1 idruangpertemuanyayasan" style="width: 100%;" disabled>
                                      <?php foreach($ruangan_pertemuanyayasan as $rowruangan_pertemuanyayasan){?>
                                            <option value="<?=$rowruangan_pertemuanyayasan->id?>" <?= $try->ruangkantor_id == $rowruangan_pertemuanyayasan->id ? 'selected' : null ?>><?=$rowruangan_pertemuanyayasan->nama_ruang?></option>
                                       <?php }?>
                                    </select>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <button type="button" name="button" onClick="addInput4('dynamicInput4');" class='btn btn-sm btn-primary btn-flat' style='margin-top:25px; margin-left:10px;'><i class="glyphicon glyphicon-plus"></i></button>
                                  <button style='margin-top:25px; margin-left:10px;' onClick="deleteData3(<?= $try->transaksi_addt_id ?>,<?= $try->tarifruangyayasan ?>)" class='btn btn-flat btn-sm btn-danger'><i class="glyphicon glyphicon-remove"></i></button>
                                </td>
                              </tr>
                              <tr class="row-<?= $try->transaksi_addt_id ?>">
                                <td>
                                  <div class="input-group date" style="margin-top:10px;">
                                    <div class="input-group-addon">
                                      <i class="fa fa-credit-card"></i>
                                    </div>
                                          <input type="text" name="tarifruang[]" class="form-control field-check-form1 tarifRyayasan" id="tarifyayasan" value=<?php echo $try->tarifruangyayasan ?>><input type='hidden' id='idkode'>
                                  </div>
                                  <input type='hidden' name='IDAddDetil3[]' value=<?php echo $try->transaksi_addt_id ?>>
                                  <input type='hidden' class='lama4' name='lama' value=0>
                                  <input type='hidden' class='baru4' name='baru' value=<?php echo $try->tarifruangyayasan ?>>
                                </td>
                              </tr>
                              <?php
                                }
                              }else {
                              ?>
                              <tr>
                                <td width='85%'>
                                  <label>Ruang Pertemuan</label>
                                  <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-plus"></i>
                                    </div>
                                    <select name="ruangpertemuanyayasanv2[]" class="form-control field-check-form1 idruangpertemuanyayasan" style="width: 100%;" disabled>
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
                                          <input type="text" name="tarifruangv2[]" class="form-control field-check-form1 tarifRyayasan" id="tarifyayasan" value=0><input type='hidden' id='idkode'>
                                    </div>
                                    <input type='hidden' class='lama4' name='lama' value=0>
                                    <input type='hidden' class='baru4' name='baru' value=0>
                                </td>
                              </tr>
                            <?php } ?>
                            </table>
                              <input type='hidden' class='IDAddDetil3delete' name='IDAddDetil3del'>
                        </fieldset >

                        <fieldset class="scheduler-border">
                          <legend class="scheduler-border">Additional Fasilitas</legend>
                            <table border='0' style='margin-bottom:15px;' width='100%' id='dynamicInput3' class='removinput3'>
                          <?php
                          if($tampilForAdditionalcount > 0)
                          {
                            foreach ($tampilForAdditional as $ta)
                            {
                          ?>
                              <tr class="row-<?= $ta->transaksi_addt_id ?>">
                                <td width='85%'>
                                  <label>Fasilitas Tambahan</label>
                                  <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-plus"></i>
                                    </div>
                                    <select name="fasilitasplus[]" class="form-control field-check-form1 idadditional" style="width: 100%;" disabled>
                                      <?php foreach($jenis_additional as $rowjenis_additional){?>
                                            <option value="<?=$rowjenis_additional->id_additional?>" <?= $ta->additional_id == $rowjenis_additional->id_additional ? 'selected' : null ?>><?=$rowjenis_additional->jenis_additional?></option>
                                       <?php }?>
                                    </select>
                                    </div>
                                  </div>
                                </td>
                                <td>
                                  <button type="button" name="button" onClick="addInput3('dynamicInput3');" class='btn btn-sm btn-primary btn-flat' style='margin-top:25px; margin-left:10px;'><i class="glyphicon glyphicon-plus"></i></button>
                                  <button style='margin-top:25px; margin-left:10px;' onClick="deleteData4(<?= $ta->transaksi_addt_id ?>,<?= $ta->additional_id ?>,<?= $ta->harga ?>)" class='btn btn-flat btn-sm btn-danger'><i class="glyphicon glyphicon-remove"></i></button>
                                  <input type='hidden' name='IDAddDetil4[]' value=<?php echo $ta->transaksi_addt_id ?>>
                                  <input type='hidden' class='lama2' name='lama' value=0>
                                  <input type='hidden' class='baru2' name='baru' value=<?php echo $ta->harga ?>>
                                </td>
                              </tr>
                              <?php
                                }
                              }else {
                              ?>
                              <tr>
                                <td width='85%'>
                                  <label>Fasilitas Tambahan</label>
                                  <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-plus"></i>
                                    </div>
                                    <select name="fasilitasplusv2[]" class="form-control field-check-form1 idadditional" style="width: 100%;" disabled>
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
                                  <input type='hidden' class='lama2' name='lama' value=0>
                                  <input type='hidden' class='baru2' name='baru' value=0>
                                </td>
                              </tr>
                            <?php } ?>
                            </table>
                            <input type='hidden' class='IDAddDetil4delete' name='IDAddDetil4del'>
                        </fieldset >

                    </fieldset >
                  </div>

                <div class="box-body col-lg-12">
                    <div class="form-group">
                      <label>Status Order</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-credit-card"></i>
                        </div>
                        <select name="order" class="form-control" style="width: 100%;">
                          <option value="<?php echo $tx->status_order ?>" selected="selected"><?php echo $tx->status_order ?></option>
                          <option value="0" disabled="disabled">Pilih Status Order</option>
                          <option value="Reserved">Reserved</option>
                          <option value="New Reservation">New Reservation</option>
                        </select>
                      </div>
                    </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Status Pembayaran</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-credit-card"></i>
                      </div>
                      <select name="pembayaranstatus" class="form-control" style="width: 100%;">
                        <option value="<?php echo $tx->status_pembayaran ?>" selected="selected"><?php echo $tx->status_pembayaran ?></option>
                        <option value="0" disabled="disabled">Pilih Status Pembayaran</option>
                        <option value="Lunas">Lunas</option>
                        <option value="Belum Lunas">Belum Lunas</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Reduksi Pembayaran</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-credit-card"></i>
                      </div>
                        <input type="text" id="red" name="reduksi" class="form-control field-check-form1" value="Rp <?php echo $angka_format2 ?>" readonly>
                    </div>
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>DP Pembayaran</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-credit-card"></i>
                      </div>
                        <input type="text" id="dpx" name="dp" class="form-control field-check-form1" value="<?php echo $tx->dp ?>">
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
                      <input id="total1" type="text" class="form-control" value="Rp <?php echo $angka_format ?>" readonly>
                      <input id="total" type="hidden" name="bayar" class="form-control field-check-form1" value="<?php echo $tx->total_bayar2 ?>">
                    </div>
                  </div>
                </div>

                <div class="box-body col-lg-12">
                    <div class="form-group">
                      <input type="submit" name="submit" value="Update" class="btn btn-success">
                    </div>
                </div>
              </form>
              <div class="box-body col-lg-12 field-check-form-edit">
                <!-- <div class="box-body col-lg-12"> -->
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
              </div>
              <?php
              //    }
                }
              ?>
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

<!-- ========================= js ======================= -->
<script type="text/javascript">
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

var tanpa_tunai = document.getElementById('dpx');
tanpa_tunai.addEventListener('keyup', function(e)
{
  tanpa_tunai.value = formatRupiah(this.value);
});

$(document).ready(function()
{
  $( "#datepicker1a" ).datepicker({ dateFormat: 'dd-mm-yy' });
  $( "#datepicker2a" ).datepicker({ dateFormat: 'dd-mm-yy' });

    var start = $('#datepicker1a').datepicker('getDate');
    var end   = $('#datepicker2a').datepicker('getDate');

    if (start<end)
    {
        var days   = (end - start)/1000/60/60/24;
        $('#days').val(days);
    }
    else
    {
      alert ("You cant come back before you have been!");
      $('#datepicker1a').val("");
      $('#datepicker2a').val("");
        $('#days').val("");
    }
});

$(document).ready(function()
{
    $( "#datepicker1" ).datepicker({ dateFormat: 'dd-mm-yy' });
    $( "#datepicker2" ).datepicker({ dateFormat: 'dd-mm-yy' });

    $('#datepicker2, #datepicker1').change(function()
    {
      var start = $('#datepicker1').datepicker('getDate');
      var end   = $('#datepicker2').datepicker('getDate');

    if (start<end)
    {
        var daysz   = (end - start)/1000/60/60/24;
        $('#dayss').val(daysz);
    }
    else
    {
      alert ("You cant come back before you have been!");
      $('#datepicker1').val("");
      $('#datepicker2').val("");
        $('#dayss').val("");
    }
  }); //end change function
}); //end ready
</script>

<script>
  jQuery(document).ready(function($)
  {
     $('.field-check-form-edit').hide();
  });
</script>
<script type = "text/javascript">
jQuery(document).ready(function($){
  $('#form').on('submit',function(e){
    var tglin = $('#datepicker1').val();
    var tglout = $('#datepicker2').val();
    var tglin1 = $('#datepicker1a').val();
    var tglout2 = $('#datepicker2a').val();
    var jmlhtamu1 = $('#jmlhtamu').val();
    var jmlhtamu2 = $('#jmlt').val();
    var notelepon = document.getElementById('notelp').value;
    var jumlahtamu = document.getElementById('jmlhtamu').value;
    var dpuang = $('#dpx').val().replace(/[^,\d]/g, '').toString();
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
    var form2 =  <?php echo json_encode($tampilforAddRRPCBtarray);?>;
    var jsonString = JSON.stringify(form2);
    //console.log(form2);
    $.ajax({
        url: "<?php echo base_url(). 'ReservationController/editing'; ?>",
        type: 'POST',
        data: form_data, // $(this).serialize(); you can use this too
        //data : {data : jsonString},
        dataType: 'json',
        success: function(msg){
              if(msg.error == "no")
              {
                  if(tglin1 != tglin || jmlhtamu2 != jmlhtamu1)
                  {
                      alert('Sukses Update Data Dan Silahkan Pilih Ruangan');
                       $('.field-check-form-edit').show();
                  }
                  else {
                      alert('Sukses Update Data');
                  }
              }
              else
              {
                alert('Gagal Update Data');
              }
        }
   });
  }
 });
});
</script>

<script type = "text/javascript">
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
var bt = "<tr><td><div class='input-group date' style='margin-top:10px;'><div class='input-group-addon'><i class='fa fa-credit-card'></i></div><input type='text' name='tarifruangv2[]' class='form-control field-check-form1 tarifRyayasan' id='tarifyayasan' value=0></div><input type='hidden' class='lama4' name='lama' value=0><input type='hidden' class='baru4' name='baru' value=0></td></tr>";

var ruangmakan ="<table border='0' style='margin-bottom:15px;' width='100%' id='dynamicInput' class='removinput1'><tr><td width='100%'><label style='margin-top:10px;'>Ruang Makan</label><div class='input-group date'><div class='input-group-addon'><i class='fa fa-plus'></i></div><select name='ruangpertemuanmakanv2[]' class='form-control field-check-form1 idrumakan' style='width: 100%;'><option selected='selected' value=0>Pilih Ruang Makan</option><?php foreach($kamar_makan as $rowkamar_makan){?><option value='<?=$rowkamar_makan->id_ruangpertemuan?>'><?=$rowkamar_makan->nama_ruang?></option><?php }?></select></div></div></td><td><button style='margin-top:35px; margin-left:10px;' class='btn btn-flat btn-danger del1'>X</button><input type='hidden' class='lama3' name='lama' value=0><input type='hidden' class='baru3' name='baru' value=0></td></tr></table>";

var pertemuan = "<table border='0' style='margin-bottom:15px;' width='100%' id='dynamicInput2' class='removinput2'><tr><td width='100%'><label>Ruang Pertemuan</label><div class='input-group date'><div class='input-group-addon'><i class='fa fa-plus'></i></div><select name='ruangpertemuanv2[]' class='form-control field-check-form1 idruangpertemuan' style='width: 100%;'><option selected='selected' value=0>Pilih Ruang Pertemuan</option><?php foreach($ruangan_pertemuan as $rowruangan_pertemuan){?><option value='<?=$rowruangan_pertemuan->id_ruangpertemuan?>'><?=$rowruangan_pertemuan->nama_ruang?></option><?php }?></select></div></div></td><td><button style='margin-top:25px; margin-left:10px;' class='btn btn-flat btn-danger del'>X</button><input type='hidden' class='lama' name='lama' value=0><input type='hidden' class='baru' name='baru' value=0></td></tr></table>";

var pertemuanyayasan  = "<table style='margin-bottom:15px;' width='100%' id='dynamicInput4' class='removinput4'><tr><td width='85%'><label>Ruang Pertemuan</label><div class='input-group date'><div class='input-group-addon'><i class='fa fa-plus'></i></div><select name='ruangpertemuanyayasanv2[]' class='form-control field-check-form1 idruangpertemuanyayasan' style='width: 100%;'><option selected='selected' value=0>Pilih Ruang Pertemuan Yayasan</option><?php foreach($ruangan_pertemuanyayasan as $rowruangan_pertemuanyayasan){?><option value='<?=$rowruangan_pertemuanyayasan->id?>'><?=$rowruangan_pertemuanyayasan->nama_ruang?></option><?php }?></select></div></div></td><td><button style='margin-top:25px; margin-left:10px;' class='btn btn-flat btn-danger del4'>X</button></td></tr>"+bt+"</table>";

var additional = "<table border='0' style='margin-bottom:15px;' width='100%' id='dynamicInput2' class='removinput3'><tr><td width='85%'><label>Fasilitas Tambahan</label><div class='input-group date'><div class='input-group-addon'><i class='fa fa-plus'></i></div><select name='fasilitasplusv2[]' class='form-control field-check-form1 idadditional' style='width: 100%;'><option selected='selected' value=0>Pilih Tambahan Fasilitas</option><?php foreach($jenis_additional as $rowjenis_additional){?><option value='<?=$rowjenis_additional->id_additional?>'><?=$rowjenis_additional->jenis_additional?></option><?php }?></select></div></div></td><td><button style='margin-top:25px; margin-left:10px;' class='btn btn-flat btn-danger del3'>X</button><input type='hidden' class='lama2' name='lama' value=0><input type='hidden' class='baru2' name='baru' value=0></td></tr></table>";

var counter = 1;
var counter2 = 1;
var counter3 = 1;
//=============================================================  FIELD RUANG MAKAN ==============================================================
//----------------------ADD--------------------------
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
//----------------------DELETE---------------------------
  var w = "";
  function deleteData1(id,total1) {
    w += id+" ";
    $('.IDAddDetil1delete').val(w);
    console.log(w);
    console.log(total1);
    var baruharga = total1;
    var totHarga = $('#total').val();

    total = parseFloat(totHarga) - parseFloat(baruharga);
    var rps = toRp2(total);
     $('#total').val(total);
     $('#total1').val(rps);
    $('.row-' + id).remove();
    counter--;
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

//=============================================================  FIELD RUANG PERTEMUAN ==============================================================
//---------------------------ADD----------------------------------------------------------
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
//------------------------------------------------DELETE-------------------------------------
  var x = "";
  function deleteData(id,total2) {
    x += id+" ";
    $('.IDAddDetil2delete').val(x);
    console.log(x);
    console.log(total2);
    var baruharga = total2;
    var totHarga = $('#total').val();

    total = parseFloat(totHarga) - parseFloat(baruharga);
    var rps = toRp2(total);
     $('#total').val(total);
     $('#total1').val(rps);
    $('.row-' + id).remove();
    counter2--;
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

//=============================================================  FIELD ADDITIONAL FASILITAS ==============================================================
//--------------------------------------------------------ADD-------------------------------------------
  function addInput3(divName)
  {
    var newdiv = document.createElement('div');
    newdiv.innerHTML = additional;
    document.getElementById(divName).appendChild(newdiv);
    counter++;
   }
//----------------------------------------------------------DELETE--------------------------------
    var z = "";
    function deleteData4(id,idaddt,total4) {
      z += id+" ";
      $('.IDAddDetil4delete').val(z);
      console.log(z);
      console.log(total4);
	  
	if(idaddt == 1 || idaddt == 2)
	{
		var jmlhtamu = $('#jmlhtamu').val();
		var baruharga = (total4*jmlhtamu);
      var totHarga = $('#total').val();
		total = parseFloat(totHarga) - parseFloat(baruharga);
		  console.log(total);
		  var rps = toRp2(total);
		   $('#total').val(total);
		   $('#total1').val(rps);
		  $('.row-' + id).remove();  
	}
	else
	{
		var baruharga = total4;
      var totHarga = $('#total').val();
		total = parseFloat(totHarga) - parseFloat(baruharga);
		  console.log(total);
		  var rps = toRp2(total);
		   $('#total').val(total);
		   $('#total1').val(rps);
		  $('.row-' + id).remove();  
	} 
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

//=============================================================  FIELD RUANG YAYASAN ==============================================================
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

    var y = "";
    function deleteData3(id,total3) {
      y += id+" ";
      $('.IDAddDetil3delete').val(y);
      console.log(y);
      console.log(total3);
      var baruharga = total3;
      var totHarga = $('#total').val();

      total = parseFloat(totHarga) - parseFloat(baruharga);
      var rps = toRp2(total);
       $('#total').val(total);
       $('#total1').val(rps);
      $('.row-' + id).remove();
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

//=====================================================================================================================================================

    function toRp(angka){
        var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
        var rev2    = '';
        for(var i = 0; i < rev.length; i++){
            rev2  += rev[i];
            if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
                rev2 += '.';
            }
        }
        return 'Rp. ' + rev2.split('').reverse().join('') + ',00';
    }

//============================================== RUANG PERTEMUAN ==============================================================================
    var total =  $('#total').val();
    $(document).on('change', '.idruangpertemuan', function(){
          var id_jenistamu = $('#id_jenistamu').val();
          var id_jenistarif = $('#id_jenistarif').val();
          var jmlhtamu = $('#jmlhtamu').val();
          var hari = $('#days').val();
          var idruangpertemuan= $(this).val();
          var cek = $('#event-additional').val();

          var lamactrl = $(this).parent().parent().parent().find('.lama');
          var baructrl = $(this).parent().parent().parent().find('.baru');
          //alert($(this).parent().parent().parent().html());

          if(cek == "ya")
          {
            $.get('<?php echo base_url(). 'api/tarif'; ?>', {id_jenistamu: id_jenistamu, id_jenistarif: id_jenistarif}, function(response)
            {
              var data = JSON.parse(response);
              if(idruangpertemuan != 0)
              {
                  $.get('<?php echo base_url(). 'api/tarif/ruang/pertemuan?id_ruangpertemuan='?>'+idruangpertemuan, function(response)
                  {
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

//============================================== ADDITIONAL FASILITAS ==============================================================================
    $(document).on('change', '.idadditional', function(){
      var id_jenistamu = $('#id_jenistamu').val();
      var id_jenistarif = $('#id_jenistarif').val();
      var jmlhtamu = $('#jmlhtamu').val();
      var hari = $('#days').val();
      var idadditional = $(this).val();
      var cek = $('#event-additional').val();

      var lamactrl2 = $(this).parent().parent().parent().find('.lama2');
      var baructrl2 = $(this).parent().parent().parent().find('.baru2');

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

//============================================== RUANG MAKAN ==============================================================================
    $(document).on('change', '.idrumakan', function(){
      var id_jenistamu = $('#id_jenistamu').val();
      var id_jenistarif = $('#id_jenistarif').val();
      var jmlhtamu = $('#jmlhtamu').val();
      var hari = $('#days').val();
      var idruangmakan = $(this).val();
      var cek = $('#event-additional').val();

      var lamactrl3 = $(this).parent().parent().parent().find('.lama3');
      var baructrl3 = $(this).parent().parent().parent().find('.baru3');

      if(cek == "ya")
      {
        $.get('<?php echo base_url(). 'api/tarif'; ?>', {id_jenistamu: id_jenistamu, id_jenistarif: id_jenistarif}, function(response)
        {
          var data = JSON.parse(response);
          if(idruangmakan != 0)
          {
              $.get('<?php echo base_url(). 'api/tarif/ruang/pertemuan'; ?>?id_ruangpertemuan='+idruangmakan, function(response)
              {
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

//============================================== RUANG YAYANSA ==============================================================================
    $(document).on('input', '.tarifRyayasan', function(){
          var id_jenistamu = $('#id_jenistamu').val();
          var id_jenistarif = $('#id_jenistarif').val();
          var jmlhtamu = $('#jmlhtamu').val();
          var hari = $('#days').val();
          var idruangpertemuanyayasan = $(this).val();
          var cek = $('#event-additional').val();

          //alert($(this).parent().parent().parent().parent().parent().find('.tarifRyayasan').val().replace(/[^,\d]/g, '').toString());
          var lamactr4 = $(this).parent().parent().parent().find('.lama4');
          var baructr4 = $(this).parent().parent().parent().find('.baru4');
          var hargayayasan = $(this).parent().parent().parent().find('.tarifRyayasan');
         //alert($(this).parent().parent().parent().html());

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

//====================================================================================================================================================
    function getTarif() {
      var tglin = $('#datepicker1').val();
      var tglout = $('#datepicker2').val();
      var tglin1 = $('#datepicker1a').val();
      var tglout2 = $('#datepicker2a').val();
      var id_jenistamu = $('#id_jenistamu').val();
      var id_jenistarif = $('#id_jenistarif').val();
      var jmlhtamu = $('#jmlhtamu').val();
      var hari = $('#days').val();
      var harii = $('#dayss').val();

      if(tglin1 != tglin || tglout2 != tglout)
      {
        $.get('<?php echo base_url(). 'api/tarif'; ?>', {id_jenistamu: id_jenistamu, id_jenistarif: id_jenistarif}, function(response) {
          var data = JSON.parse(response);
          var total = (parseFloat(jmlhtamu) * parseFloat(data.tarif)) * parseFloat(harii);
          var rp = toRp(total);
           $('#total').val(total);
           $('#total1').val(rp);
        });
      }
      else {
        $.get('<?php echo base_url(). 'api/tarif'; ?>', {id_jenistamu: id_jenistamu, id_jenistarif: id_jenistarif}, function(response) {
          var data = JSON.parse(response);
          var total = (parseFloat(jmlhtamu) * parseFloat(data.tarif)) * parseFloat(hari);
          var rp = toRp(total);
           $('#total').val(total);
           $('#total1').val(rp);
        });
      }
    }
//====================================================================================================================================================
//====================================================================================================================================================
    $(function () {
      $(".select2").select2();
    });

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
    var count=1;
    function getKamar($idKamar) {
      var id_ruang= $('#id_ruang').val();
      var tgl_checkin = $('#datepicker1').val();
      var tgl_checkout = $('#datepicker2').val();
      var id_kamar = $idKamar;
      var id_kamar = id_kamar;
      $('#kamar').val(id_kamar);
      var jumlahtamu = $('#jmlhtamu').val();
      var trxid = $('#id_transaksi').val();
      // var Instan = $('#ins').val();
      // var hit = count++;
      // var gabhit = Instan+hit;
      // $('#namatamu').val(gabhit);

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
          var Instan = $('#ins').val();
          var hit = count++;
          var gabhit = Instan+hit;
          $('#namatamu').val(gabhit);
          
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
                  getRuang();
                }else{
                  alert('Gagal Input Data');
                }
          }
     });
   });
  });
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

<?php include "Footer.php"; ?>
