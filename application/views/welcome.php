<?php include "main-header.php" ;?>

  	<header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image: url(assets/frontend/images/backG.png);">
  		<div class="overlay"></div>
  		<div class="container">
  			<div class="row">
  				<div class="col-md-9 text-left">
  					<div class="display-t">
  						<div class="display-tc animate-box" data-animate-effect="fadeInUp">
  							<h1 class="mb30">Let's build the characters together In RPCB Syantikara</h1>
  							<p>
  								<a data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-primary">Booking Now</a>
  							</p>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</header>
  	<div id="fh5co-project">
  		<div class="container">
  			<div class="row row-pb-md">
  				<div class="col-md-12 text-center fh5co-heading  animate-box">
  					<h2 align="center">RPCB Syantikara</h2>
  					<hr>
  					<p style="font-size: 14px;">
              <?php
                foreach ($setting as $s) {
                    echo  $s->about_header;
                }
              ?>
              <br><br>
              Visi :<br>
              Rumah Retret RPCB Syantikara merupakan tempat pembinaan dan tempat doa yang memberikan pelayanan<br>
              dalam semangat kasih, persaudaraan, keramahan, kesiapsediaan dan kesederhanaan.<br><br>

              Misi :<br>
              Melayani pribadi/kelompok yang membutuhkan sarana rohani seperti retret, rekoleksi dan ziarah.<br>
              Melayani kelompok-kelompok yang melaksanakan kegiatan pembinaan dan penyegaran.<br>
              Melayani pribadi/kelompok yang membutuhkan tempat dan suasana yang nyaman untuk pembuatan program dan penyelenggaraan raker.<br>
  					</p>
  				</div>
  			</div>
  		</div>
  	</div>
  	<div id="fh5co-blog" class="fh5co-bg-section">
  		<div class="container" style="margin-top: -50px;">
  			<div class="row animate-box row-pb-md" data-animate-effect="fadeInUp">
  				<div class="col-md-12 text-center fh5co-heading">
  					<h2 align="center">NEWS UPDATE</h2>
  					<hr>
  					<p style="font-size: 14px;">The most updated news, activities, article, nor information from Yayasan RPCB Syantikara is here. Check It Out.</p>
  				</div>
  			</div>
  			<div class="row">
          <?php
              foreach ($berita as $b)
              {
                $tanggal1 =  $b->tgl_publish;
                $format1 = date('d F Y', strtotime($tanggal1 ));
          ?>
  				<div class="col-md-4 col-sm-4 animate-box" data-animate-effect="fadeInUp">
  					<div class="fh5co-post">
  						<span class="fh5co-date"><?php echo $format1; ?></span>
  						<h3><a href="<?php echo base_url('news/detail/'.$b->id_news); ?>"><?php echo $b->title; ?></a></h3>
  						<p style="font-size:13px;"><?php echo $b->deskripsi_singkat; ?></p>
  						<p class="author"><img src="assets/dashboard/dist/img/<?php echo $b->imgpp; ?>"> <cite> Posted By : <?php echo $b->name; ?></cite></p>
  					</div>
  				</div>
  				<?php } ?>
  			</div>
        <p align="center"><a href="<?php echo base_url('news'); ?>" class="btn btn-primary btn-flat" style="padding-top: 10px; margin-bottom: -100px;">Show All The News</a></p>
  		</div>
  	</div>
  	<div id="fh5co-counter">
  		<div class="container">
  			<div class="row animate-box" data-animate-effect="fadeInUp">
  				<div class="col-md-12 text-center fh5co-heading">
  					<h2 align="center">Facts</h2>
  					<hr>
  					<p style="font-size: 14px;">Some facts occurred in Yayasan RPCB Syantikara. Check It out.</p>
  				</div>
  			</div>
  			<div class="row">
  				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
  					<div class="feature-center">
  						<span class="icon">
  							<i class="ti-download"></i>
  						</span>
  						<span class="counter"><span class="js-counter" data-from="0" data-to="15" data-speed="1500" data-refresh-interval="50">1</span>+</span>
  						<span class="counter-label">Mitra</span>

  					</div>
  				</div>
  				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
  					<div class="feature-center">
  							<span class="icon">
  								<i class="ti-face-smile"></i>
  							</span>
  							<span class="counter"><span class="js-counter" data-from="0" data-to="500" data-speed="1500" data-refresh-interval="50">1</span>+</span>
  							<span class="counter-label">Happy Clients</span>
  						</div>
  					</div>
  					<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
  						<div class="feature-center">
  							<span class="icon">
  								<i class="ti-briefcase"></i>
  							</span>
  							<span class="counter"><span class=" js-counter" data-from="0" data-to="90" data-speed="1500" data-refresh-interval="50">1</span>+</span>
  							<span class="counter-label">Workers</span>
  						</div>
  					</div>
  					<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
  						<div class="feature-center">
  							<span class="icon">
  								<i class="ti-time"></i>
  							</span>
  							<span class="counter"><span class="js-counter" data-from="0" data-to="150" data-speed="1500" data-refresh-interval="50">1</span>+</span>
  							<span class="counter-label">Reservation</span>

  						</div>
  					</div>

  				</div>
  		  </div>
  	</div>
  	<div id="fh5co-testimonial" class="fh5co-bg-section" >
  		<div class="container" style="margin-top: -50px;">
  			<div class="row animate-box" data-animate-effect="fadeInUp">
  				<div class="col-md-12 text-center fh5co-heading">
  					<h2 align="center">Testimonial</h2>
  					<hr>
  					<p style="font-size: 14px;">Some Testimonial from Syantikara's Mitra and Syantikara's Customers. Check It Out.</p>
  				</div>
  			</div>
  			<div class="row">
  				<div class="col-md-6 animate-box">
  					<div class="testimonial">
  						<blockquote>
  							<p>&ldquo;Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.&rdquo;</p>
  							<p class="author"> <img src="assets/frontend/images/user1-128x128.jpg" alt="Free HTML5 Bootstrap Template by gettemplates.co"> <cite>&mdash; Ignatius Kun Aldian</cite></p>
  						</blockquote>
  					</div>

  					<div class="testimonial fh5co-selected">
  						<blockquote>
  							<p>&ldquo;Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius. Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.&rdquo;</p>
  							<p class="author"><img src="assets/frontend/images/user2-160x160.jpg" alt="Free HTML5 Bootstrap Template by gettemplates.co"> <cite>&mdash; Dio - Himaforka UAJY</cite></p>
  						</blockquote>
  					</div>
  				</div>
  				<div class="col-md-6 animate-box">
  					<div class="testimonial fh5co-selected">
  						<blockquote>
  							<p>&ldquo;Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius. Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.&rdquo;</p>
  							<p class="author"><img src="assets/frontend/images/user3-128x128.jpg" alt="Free HTML5 Bootstrap Template by gettemplates.co"> <cite>&mdash; Yulia - HMPSM UAJY</cite></p>
  						</blockquote>
  					</div>
  					<div class="testimonial">
  						<blockquote>
  							<p>&ldquo;Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.&rdquo;</p>
  							<p class="author"><img src="assets/frontend/images/user4-128x128.jpg" alt="Free HTML5 Bootstrap Template by gettemplates.co"> <cite>&mdash; Bunga Natalia</cite></p>
  						</blockquote>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  	<div id="fh5co-started">
  		<div class="container">
  			<div class="row animate-box">
  				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
  					<h2>Are You Interesting ?</h2>
  					<p>Order now before they run out and get the special price for active member or mitra.</p>
  					<p><a data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-primary" style="padding-top: 15px;">Booking Now</a></p>
  				</div>
  			</div>
  		</div>
  	</div>

  <?php include "main-footer.php"; ?>
