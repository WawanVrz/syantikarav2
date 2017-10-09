<?php
		include "main-header.php" ;

		foreach ($detail_berita as $db)
		{
			$tanggal1 =  $db->tgl_publish;
			$format1 = date('d F Y', strtotime($tanggal1 ));
?>
<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(assets/uploads/<?php echo $db->image ?>); height: 500px;">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-7 text-left">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeInUp">
							<h2 style="font-size: 30px; font-weight: bold"><?php echo $db->title ?></h2>
							<h5 style="margin-top: -30px; color: white; ">Posted By : <i><?php echo $db->name ?></i> | Date : <i><?php echo $format1 ?></i></h5>
					</div>
				</div>
			</div>
		</div>
	</header>
	<div id="fh5co-blog">
		<div class="container">
			<div class="col-md-12 text-center fh5co-heading  animate-box">
					<h3 align="center" style="font-size: 30px; font-weight: bold; margin-top: -20px;"><?php echo $db->title ?></h3>
					<p style="font-size: 13px;">Category : <i>
						<?php
						foreach($kategori as $k)
						{
							echo "$k->kategori | ";
						}
						?>
					</i></p>
					<hr>
				</div>
			<div class="row">
				<div class="col-md-10 animate-box" style="text-align: justify; margin-left: 100px;">
					<?php echo $db->deskripsi_full ?>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
<div id="fh5co-started-1"></div>

<?php include "main-footer.php"; ?>
