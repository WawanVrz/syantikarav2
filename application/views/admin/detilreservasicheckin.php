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
              <table style="margin-left:10px;">
                <tr>
                  <td height="50"><h4><b><i class="ion ion-clipboard"></i>&nbsp; Detail Reservasi </b></h4></td>
                </tr>
                <tr>
                  <td height="30"><b>Instansi</td>
                  <td>&nbsp;&nbsp; : </td>
                  <td>&nbsp;&nbsp; <?php echo $dr->instansi ?> </td>
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
                  <td height="30"><b>No Telphone</td>
                  <td>&nbsp;&nbsp; : </td>
                  <td>&nbsp;&nbsp; <?php echo $dr->no_telp ?> </td>
                  <td width="30%"> </td>
                  <td height="30"><b>Total Pembayaran</td>
                  <td>&nbsp;&nbsp; : </td>
                  <td>&nbsp;&nbsp; Rp <?php echo $angka_format ?> </td>
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
                  <td height="30"><b>Jumlah Tamu</td>
                  <td>&nbsp;&nbsp; : </td>
                  <td>&nbsp;&nbsp; <?php echo $dr->jumlah_tamu ?> Orang </td>
                  <td width="30%"> </td>
                  <td height="30"><b>Status Pembayaran</td>
                  <td>&nbsp;&nbsp; : </td>
                  <td>&nbsp;&nbsp; <?php echo $dr->status_pembayaran ?> </td>
                </tr>
                <tr>
                  <td height="30"><b>Tgl Check In</td>
                  <td>&nbsp;&nbsp; : </td>
                  <td>&nbsp;&nbsp; <?php echo $format1 ?> </td>
                  <td width="30%"> </td>
                  <td height="30"><b>Status Order</td>
                  <td>&nbsp;&nbsp; : </td>
                  <td>&nbsp;&nbsp; <?php echo $dr->status_order ?> </td>
                </tr>
                <tr>
                  <td height="30"><b>Tgl Check Out</td>
                  <td>&nbsp;&nbsp; : </td>
                  <td>&nbsp;&nbsp; <?php echo $format2 ?> </td>
                  <td width="30%"> </td>
                  <td height="30"><b>Permintaan Khusus</td>
                  <td>&nbsp;&nbsp; : </td>
                  <td>&nbsp;&nbsp; <?php echo $dr->permintaan_khusus ?> </td>
                </tr>
                <tr>
                  <td height="30"><b>Additional Ruang RPCB</td>
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
              <table style="margin-left:10px;">
              <tr>
                <td height="30"><h4><b><i class="glyphicon glyphicon-user"></i>&nbsp; Detail Tamu </b></h4></td>
              </tr>
            </table>
              <table id="exampleupdate" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Ruangan</th>
                  <th>Kamar</th>
                  <th>Nama Tamu</th>
                  <th>Jenis Kelamin</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $no = 1;
                    foreach ($detil_tamu as $dt) {
                ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $dt->nama_ruang ?></td>
                  <td><?php echo $dt->nama_kamar ?></td>
                  <td><?php echo $dt->nama_tamu ?></td>
                  <td><?php echo $dt->jenis_kelamin ?></td>
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
                </tr>
                </tfoot>
              </table>
              <br><br>
              <p style="margin-left:10px;">
                <a href="<?php echo base_url('dashboard/admin/data/konfirmasi/checkin'); ?>"><input type="button" value="Back To View" class="btn btn-success"></a>
                <?php if($dr->status_order != "Check In" && $dr->status_order != "Check Out"){ ?>
                  <button class="btn btn-success" onClick="checkindata(<?= $dr->id_transaksi ?>)"><i class="glyphicon glyphicon-ok"></i>&nbsp; Check In</button>
                  <?php }else{ ?>

                    <?php } ?>
                  <!-- <input type="button" name="print" value="Print" class="btn btn-success" onClick="window.print();return false"> -->
              </p><br>

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
  <script>
    function checkindata(id) {
        swal({
          title: "Are you sure?",
          text: "You will not be able to recover this Data !",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: 'btn-success',
          confirmButtonText: 'Yes, Check In!',
          closeOnConfirm: false,
          closeOnCancel: true
        },
        function() {
            $.get('<?php echo base_url('KonfirmasiController/checkinproses/'); ?>', {id:id}, function(data) {
              if (data == 'succeed') {
                  //$('#row-' + id).remove();
                  swal("Success!", "Your Has Been Check In !", "success");
              }
              window.location.reload();
            });
        });
    }
  </script>
<?php include "Footer.php"; ?>
