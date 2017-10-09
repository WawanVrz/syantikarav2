<?php include "main-header.php" ;?>

<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(assets/frontend/images/work-2.jpg); height: 500px;">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-7 text-left">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeInUp">
							<h1 class="mb30">Our Facilities</h1>
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
					<h2 align="center">RPCB Syantikara's Facilities</h2>
					<hr>
					<p style="font-size: 14px;">
						RPCB Syantikara adalah rumah retret yang dikhususkan bagi jemaat yang ingin melakukan perjalanan rohani. Selain itu RPCB Syantikara juga merupakan tempat retret dan tempat pembinaan untuk kalangan muda.
					</p>
				</div>
			</div>
			<div class="row" style="text-align: center;">
				<?php
          foreach ($fasilitas as $f) {
        ?>
				<div class="col-md-4 col-sm-6 ">
					<div class="feature-center animate-box" data-animate-effect="fadeInUp" >
						<span class="icon" style="margin-left:35%;">
							<img class="profile-user-img img-responsive img-circle" src="assets/uploads/<?php echo $f->image ?>" width="96" height="">
						</span>
						<h3><?php echo $f->nama ?></h3>
						<p><?php echo $f->keterangan ?></p>
					</div>
				</div>
				<?php } ?>
				<!-- <div class="col-md-4 col-sm-6 ">
					<div class="feature-center animate-box" data-animate-effect="fadeInUp">
						<span class="icon">
							<i class="icon-command"></i>
						</span>
						<h3>Laundry</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
				<div class="clearfix visible-sm-block"></div>
				<div class="col-md-4 col-sm-6 ">
					<div class="feature-center animate-box" data-animate-effect="fadeInUp">
						<span class="icon">
							<i class="icon-power"></i>
						</span>
						<h3>AC Room</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
				<div class="clearfix visible-md-block"></div>
				<div class="col-md-4 col-sm-6 ">
					<div class="feature-center animate-box" data-animate-effect="fadeInUp">
						<span class="icon">
							<i class="icon-eye"></i>
						</span>
						<h3>Customers Service</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
				<div class="clearfix visible-sm-block"></div>
				<div class="col-md-4 col-sm-6 ">
					<div class="feature-center animate-box" data-animate-effect="fadeInUp">
						<span class="icon">
							<i class="icon-command"></i>
						</span>
						<h3>Prayer Room</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 ">
					<div class="feature-center animate-box" data-animate-effect="fadeInUp">
						<span class="icon">
							<i class="icon-power"></i>
						</span>
						<h3>Meeting Room</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div> -->
				<div class="clearfix visible-md-block"></div>
			</div>
		</div>
	</div>
<div id="fh5co-started-1"></div>

<?php include "main-footer.php"; ?>
