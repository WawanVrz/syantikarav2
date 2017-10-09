<?php include "main-header.php" ;?>

<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(assets/frontend/images/work-2.jpg); height: 500px;">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-7 text-left">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeInUp">
							<h1 class="mb30">List Reservation</h1>
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
					<h3 align="center">List Data My Reservation</h3>
					<hr>
				</div>
			</div>
			<div class="row" style="text-align: center; margin-top:-80px; font-size:13px;">
				<div class="col-md-12">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
						<tr>
							<th>No</th>
							<th>Nama Pemesan</th>
							<th>No Telp</th>
							<th>Jumlah Tamu</th>
							<th>Tgl Check In</th>
							<th>Tgl Check Out</th>
							<th>Total Bayar</th>
							<th>Status Order</th>
							<th>Status Bayar</th>
							<th align="center">Actions</th>
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
							?>
						<tr id="row-<?= $r->id_transaksi ?>">
							<td><?php echo $no++ ?></td>
							<td><?php echo $r->nama_pemesan ?></td>
							<td><?php echo $r->no_telp ?></td>
							<td><?php echo $r->jumlah_tamu ?> Orang</td>
							<td><?php echo $format1 ?></td>
							<td><?php echo $format2 ?></td>
							<td>Rp <?php echo $angka_format ?></td>
							<td><?php echo $r->status_order ?></td>
							<td><?php echo $r->status_pembayaran ?></td>
							<td align="center">
								<a href="<?php echo base_url('list/reservation/detail/'.$r->id_transaksi); ?>"><button class="btn btn-success" style="width:90px; height:35px; font-size:13px;"><i class="fa fa-list"></i>&nbsp; Detail</button></a>&nbsp;&nbsp;
							</td>
						</tr>
						<?php } ?>
						</tbody>
						<tfoot>
						<tr>
							<th>No</th>
							<th>Nama Pemesan</th>
							<th>No Telp</th>
							<th>Jumlah Tamu</th>
							<th>Tgl Check In</th>
							<th>Tgl Check Out</th>
							<th>Total Bayar</th>
							<th>Status Order</th>
							<th>Status Bayar</th>
							<th align="center">Actions</th>
						</tr>
						</tfoot>
					</table>
			</div>
			</div>
		</div>
	</div>
<div id="fh5co-started-1"></div>
<?php include "main-footer.php"; ?>
