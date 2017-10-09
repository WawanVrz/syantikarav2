<?php include "Header.php"; ?>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12">
          <!-- TO DO List -->
          <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>
              <h3 class="box-title"> List Pembayaran Transaksi Reservasi Kamar &nbsp;&nbsp;
                <a href="<?php echo base_url('dashboard/admin/data/konfirmasi/checkout'); ?>"><button class="btn btn-success btn-sm btn-flat"><i class="glyphicon glyphicon-chevron-left"></i>&nbsp; Back</button></a>
                <a href="<?php echo base_url('dashboard/admin/data/reservasi/pembayaran'); ?>"><button class="btn btn-success btn-sm btn-flat"><i class="glyphicon glyphicon-refresh"></i>&nbsp; Refresh</button></a>
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Instansi</th>
                  <th>Tgl Check In</th>
                  <th>Tgl Check Out</th>
                  <th>Status Order</th>
                  <th>Total Bayar</th>
                  <th>Pembayaran</th>
                  <th align="center" width="15%">Actions</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    foreach ($reservasi as $r) {
                      $tanggal1 =  $r->tgl_checkin;
                      $tanggal2 =  $r->tgl_checkout;
                      $format1 = date('d F Y', strtotime($tanggal1 ));
                      $format2 = date('d F Y', strtotime($tanggal2 ));

                      $angka = $r->total_bayar;
                      $angka_format = number_format($angka,2,",",".");
                      $angka2 = $r->dp;
                      $angka_format2 = number_format($angka2,2,",",".");
                  ?>
                <tr id="row-<?= $r->id_transaksi ?>">
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $r->instansi ?></td>
                  <td><?php echo $format1 ?></td>
                  <td><?php echo $format2 ?></td>
                  <td><?php echo $r->status_order ?></td>
                  <td>Rp <?php echo $angka_format ?></td>
                  <td><?php echo $r->status_pembayaran ?></td>
                  <td align="center">
                    <table>
                      <tr>
                        <td> <a href="<?php echo base_url('dashboard/admin/data/reservasi/detail/'.$r->id_transaksi); ?>"><button class="btn btn-primary btn-sm" ><i class="glyphicon glyphicon-list-alt"></i>&nbsp; Detail</button></a> </td>
                        <td width="5%"> </td>
                        <?php if($r->status_pembayaran != "Lunas"){ ?>
                        <td> <button class="btn btn-success btn-sm" onClick="prosesbayar(<?= $r->id_transaksi ?>)"><i class="glyphicon glyphicon-credit-card"></i>&nbsp; Bayar</button> </td>
                        <?php }else { ?>
                              <td> <a href="<?php echo base_url('printnota/notapembayaran/'.$r->id_transaksi); ?>" target="_blank"><button class="btn btn-success btn-sm"><i class="glyphicon glyphicon-print" ></i>&nbsp; Print</button></a> </td>
                        <?php } ?>
                      </tr>
                    </table>
                  </td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Instansi</th>
                  <th>Tgl Check In</th>
                  <th>Tgl Check Out</th>
                  <th>Status Order</th>
                  <th>Total Bayar</th>
                  <th>Pembayaran</th>
                  <th align="center">Actions</th>
                </tr>
                </tfoot>
              </table>
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
          <h4 class="modal-title" id="exampleModalLabel">Form Pembayaran</h4>
        </div>
        <div class="modal-body">
          <form id="MyForm2" enctype="multipart/form-data">
            <table border="0" width="100%">
              <tr>
                <td width="30%"></td>
                <td colspan="2"></td>
                <td width="70%"><input type="hidden" id="idtrx" name="idtransaksi" class="form-control" readonly></td>
              </tr>
              <tr>
                <td width="30%" height="42"><b> Total Bayar </b></td>
                <td height="43" colspan="3"><input type="text" id="totalbayar" class="form-control" readonly><input type="hidden" id="totalbayarint" name="totalint" class="form-control"></td>
                <td width="70%"></td>
              </tr>
              <tr>
                <td width="30%" height="41"><b> Bayar DP </b></td>
                <td height="43" colspan="3"><input type="text" id="bayardp" class="form-control" readonly><input type="hidden" id="bayardpint" name="dpint" class="form-control"></td>
                <td width="70%"></td>
              </tr>
              <tr>
                <td width="30%" height="41"><b> Sudah Terbayarkan </b></td>
                <td height="43" colspan="3"><input type="text" id="terbayarakan" class="form-control" readonly></td>
                <td width="70%"></td>
              </tr>
              <tr class="cekafter1">
                <td width="30%" height="43"><b> Reduksi </b></td>
                <td height="43" width="4%" colspan="2"><b> Rp </b></td>
                <td width="70%">
                  <input type="text" id="reduksi" name="reduksi" oninput="prosesbayar(document.getElementById('idtrx').value);" class="form-control" value=0>
                </td>
              </tr>
              <tr class="cekafter2">
                <td width="30%" height="41"><b> Reduksi </b></td>
                <td height="43" colspan="3"><input type="text" id="reduksiAfter" name="reduksiAfter" class="form-control" readonly></td>
                <td width="70%"></td>
              </tr>
              <tr>
                <td colspan="2"> <hr> </td>
              </tr>
              <tr>
                <td width="30%" height="41"><b> Total Yang Harus DiBayar </b></td>
                <td height="43" colspan="3"><input type="text" style="font-size:22px;" id="totalall" class="form-control" readonly><input type="hidden" id="totalallint" name="totalall" class="form-control"></td>
                <td width="70%"></td>
              </tr>
              <tr>
                <td width="30%" height="43"><b> Tunai </b></td>
                <td height="43" colspan="2"><b> Rp </b></td>
                <td width="70%"><input type="text" style="font-size:20px;" id="tunai" name="tunai" oninput="prosesbayar(document.getElementById('idtrx').value)" class="form-control" value=0></td>
              </tr>
              <tr>
                <td width="30%" height="41"><b> Kembalian </b></td>
                <td height="43" colspan="3"><input type="text" style="font-size:20px;" id="kembali" class="form-control" readonly></td>
                <td width="70%"></td>
              </tr>
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" name="submit" id="btnSubmit" class="btn btn-success">Proses</button>
        </div>
        </form>
      </div>
    </div>
  </div>

<!-- ============================================================================================================================ -->
<script type = "text/javascript">
$(function () {
  $('#exampleModalAdd').on('hidden.bs.modal', function (e) {
    $(this)
      .find("input[type=text]")
         .val(0)
         .end();
  })
});


function coba()
{
  var reduksi = $('#reduksi').val();
  $('#hid').val(reduksi);
}
</script>
  <script>
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

    function prosesbayar($idtransaksi) {
      var id_transaksi = $idtransaksi;
      var reduksi = $('#reduksi').val().replace(/[^,\d]/g, '').toString();
      var tunai = $('#tunai').val().replace(/[^,\d]/g, '').toString();
      $('#idtrx').val(id_transaksi);

      /* Fungsi */
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

      var temp="";
      var tanpa_rupiah = document.getElementById('reduksi');
      var tanpa_tunai = document.getElementById('tunai');

    	tanpa_rupiah.addEventListener('keyup', function(e)
    	{
    		tanpa_rupiah.value = formatRupiah(this.value);
    	});

      tanpa_tunai.addEventListener('keyup', function(e)
    	{
    		tanpa_tunai.value = formatRupiah(this.value);
    	});


      if(reduksi != "" && tunai != "")
      {
        $.get('<?php echo base_url(). 'api/transaksi/pembayaran'; ?>', {id_transaksi: id_transaksi}, function(response)
        {
           reduksi = reduksi.replace(/[^,\d]/g, '').toString();
           tunai = tunai.replace(/[^,\d]/g, '').toString();
           var data = JSON.parse(response);
           var reduksicek = data.reduksi;

           if(reduksicek == 0)
           {
              $('.cekafter1').show();
              $('.cekafter2').hide();

              var total = data.total_bayar;
              var rptotal = toRp(total);
              var dp = data.dp;
              var rptotaldp = toRp(dp);
              var terbayar = data.Jumlah_Terbayarkan;
              var rpterbayar = toRp(terbayar);

              var terreduksi = data.reduksi;
              var rpterreduksi = toRp(terreduksi);

              $('#totalbayar').val(rptotal);
              $('#totalbayarint').val(total);
              $('#bayardp').val(rptotaldp);
              $('#bayardpint').val(dp);
              $('#terbayarakan').val(rpterbayar);
              $('#reduksiAfter').val(rpterreduksi);

                var totalAll = (parseFloat(total) - parseFloat(dp) - parseFloat(reduksi));
                var totalkembalian = (parseFloat(tunai) - parseFloat(totalAll));
                var rp = toRp(totalAll);
                var rp2 = toRp(totalkembalian);
                $('#totalallint').val(totalAll);
                $('#totalall').val(rp);
                $('#kembali').val(rp2);

              $('#exampleModalAdd').modal('show');
           }else {
             $('.cekafter2').show();
             $('.cekafter1').hide();

             var total = data.total_bayar;
             var rptotal = toRp(total);
             var dp = data.dp;
             var rptotaldp = toRp(dp);
             var terbayar = data.Jumlah_Terbayarkan;
             var rpterbayar = toRp(terbayar);

             var terreduksi = data.reduksi;
             var rpterreduksi = toRp(terreduksi);

             $('#totalbayar').val(rptotal);
             $('#totalbayarint').val(total);
             $('#bayardp').val(rptotaldp);
             $('#bayardpint').val(dp);
             $('#terbayarakan').val(rpterbayar);
             $('#reduksiAfter').val(rpterreduksi);

               var totalAll = (parseFloat(total) - parseFloat(dp) - parseFloat(terbayar) - parseFloat(terreduksi));
               var totalkembalian = (parseFloat(tunai) - parseFloat(totalAll));
               var rp = toRp(totalAll);
               var rp2 = toRp(totalkembalian);
               $('#totalallint').val(totalAll);
               $('#totalall').val(rp);
               $('#kembali').val(rp2);

             $('#exampleModalAdd').modal('show');
           }
        });
      }else {
        var reduksi = 0;
        var tunai = 0;
        $.get('<?php echo base_url(). 'api/transaksi/pembayaran'; ?>', {id_transaksi: id_transaksi}, function(response)
        {
            var data = JSON.parse(response);
            var reduksicek = data.reduksi;

            if(reduksicek == 0)
            {
              $('.cekafter1').show();
              $('.cekafter2').hide();

              var total = data.total_bayar;
              var rptotal = toRp(total);
              var dp = data.dp;
              var rptotaldp = toRp(dp);
              var terbayar = data.Jumlah_Terbayarkan;
              var rpterbayar = toRp(terbayar);

              var terreduksi = data.reduksi;
              var rpterreduksi = toRp(terreduksi);

              $('#totalbayar').val(rptotal);
              $('#totalbayarint').val(total);
              $('#bayardp').val(rptotaldp);
              $('#bayardpint').val(dp);
              $('#terbayarakan').val(rpterbayar);
              $('#reduksiAfter').val(rpterreduksi);

                var totalAll = (parseFloat(total) - parseFloat(dp) - parseFloat(reduksi));
                var totalkembalian = (parseFloat(tunai) - parseFloat(totalAll));
                var rp = toRp(totalAll);
                var rp2 = toRp(totalkembalian);
                $('#totalallint').val(totalAll);
                $('#totalall').val(rp);
                $('#kembali').val(rp2);

              $('#exampleModalAdd').modal('show');
            }else {
              $('.cekafter2').show();
              $('.cekafter1').hide();

              var total = data.total_bayar;
              var rptotal = toRp(total);
              var dp = data.dp;
              var rptotaldp = toRp(dp);
              var terbayar = data.Jumlah_Terbayarkan;
              var rpterbayar = toRp(terbayar);

              var terreduksi = data.reduksi;
              var rpterreduksi = toRp(terreduksi);

              $('#totalbayar').val(rptotal);
              $('#totalbayarint').val(total);
              $('#bayardp').val(rptotaldp);
              $('#bayardpint').val(dp);
              $('#terbayarakan').val(rpterbayar);
              $('#reduksiAfter').val(rpterreduksi);

                //var totalAll = (parseFloat(total) - parseFloat(dp) - parseFloat(reduksi));
                var totalAll = (parseFloat(total) - parseFloat(dp) - parseFloat(terbayar) - parseFloat(terreduksi));
                var totalkembalian = (parseFloat(tunai) - parseFloat(totalAll));
                var rp = toRp(totalAll);
                var rp2 = toRp(totalkembalian);
                $('#totalallint').val(totalAll);
                $('#totalall').val(rp);
                $('#kembali').val(rp2);

              $('#exampleModalAdd').modal('show');
            }
        });
      }
    }

    jQuery(document).ready(function($){
      $('#MyForm2').on('submit',function(e){
        var reduksi = $('#reduksi').val().replace(/[^,\d]/g, '').toString();
        var tunai = $('#tunai').val().replace(/[^,\d]/g, '').toString();
        var totalallint = $('#totalallint').val();
        var number = /^[0-9]+$/;
        if(!reduksi.match(number))
        {
          alert('Reduksi Harus Angka');
          return false;
        }
        else if(!tunai.match(number))
        {
          alert('Tunai Harus Angka');
          return false;
        }
        else if(tunai < totalallint)
        {
          alert('Pembayaran Tunai Harus Lebih Besar Daripada Total');
          return false;
        }else{
        e.preventDefault(); // <------this will restrict the page refresh
        var form_data = $(this).serialize();
        $.ajax({
            url: "<?php echo base_url(). 'ReservationController/payment_reservasi'; ?>",
            type: 'POST',
            data: form_data, // $(this).serialize(); you can use this too0
            dataType: 'json',
            success: function(msg) {
                  if(msg.error == "no"){
                    alert('Sukses Proses Pembayaran');
                    $("[data-dismiss=modal]").trigger({ type: "click" });
                    printkwitansi(msg.id_data);
                    //window.location.reload();
                  }else{
                    alert('Gagal Proses Pembayaran');
                  }
            }
       });
       }
     });
    });

    function printkwitansi($id) {
      var idx = $id;
        swal({
          title: "Apakah Ingin Mencetak Nota ?",
          text: "Anda Akan Mencetak Nota & Kwitansi Pembayaran",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: 'btn-danger',
          confirmButtonText: 'Ya, Cetak Nota',
          closeOnConfirm: false,
          closeOnCancel: true
        },
        function(isConfirm) {
          if (isConfirm) {
            //swal("Deleted!", "Your imaginary file has been deleted.", "success");
            window.open('printnota/notapembayaran/'+idx,'_blank');
            window.location.reload();
          } else {
            swal("Tidak", "Kamu Memilih Untuk Tidak Mencetak Nota Sekarang", "error");
            window.location.reload();
          }
        });
    }
    function handleClickUpdate(e){
      e.preventDefault();
    }
  </script>

<?php include "Footer.php"; ?>
