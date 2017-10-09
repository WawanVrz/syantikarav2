<?php include "main-header.php" ;?>

<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(assets/frontend/images/work-2.jpg); height: 500px;">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-7 text-left">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeInUp">
							<h1 class="mb30">Detail Reservation</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
</header>
<div id="fh5co-services">
		<div class="container" style="margin-top: -60px;">
			<div class="row row-pb-md">
				<div class="col-md-12 text-center fh5co-heading  animate-box">
					<h3 align="center">Detail Reservation</h3>
					<hr>
				</div>
			</div>
			<div class="row" style="text-align: justify; margin-top:-80px; font-size:13px;">
				<div class="col-md-12">
					<?php
					foreach ($detailreservasi as $dr) {
						$tanggal1 =  $dr->tgl_checkin;
						$tanggal2 =  $dr->tgl_checkout;
						$format1 = date('d F Y', strtotime($tanggal1 ));
						$format2 = date('d F Y', strtotime($tanggal2 ));

						$angka = $dr->total_bayar;
						$angka_format = number_format($angka,2,",",".");
					 ?>
					<table>
						<tr>
							<td height="30"><b>ID Trx</td>
							<td>&nbsp;&nbsp; : </td>
							<td>&nbsp;&nbsp; <?php echo $dr->id_transaksi ?> </td>
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
					</table>
					<?php } ?>
					<br>
					<table class="table table-bordered table-striped">
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
					<a href="<?php echo base_url('list/reservation'); ?>"><input type="button" value="Back To View" class="btn btn-success"></a>
			</div>
			</div>
		</div>
	</div>
<div id="fh5co-started-1"></div>
<?php include "main-footer.php"; ?>
