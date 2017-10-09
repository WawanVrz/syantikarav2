<?php include "main-header.php" ;?>

<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(assets/frontend/images/work-2.jpg); height: 100px;">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-7 text-left">
				</div>
			</div>
		</div>
	</header>
	<div id="fh5co-contact">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<nav aria-label="Page navigation">
					  <ul class="pagination">
					    <li>
					      <p align="center">
								<img src="assets/frontend/images/S.png" class="img-responsive" width="150" height="150" style="margin-top: -50px;">
								<h4 align="center" style="margin-bottom: 0px;"><b>Login RPCB Syantikara</b></h4>
								<hr>
								<form action="<?php echo base_url('public/auth/login'); ?>" method="post" enctype="multipart/form-data">
									<div class="row form-group">
										<div class="col-md-12" style="margin-bottom: 10px;">
											<input type="text" class="form-control" name="username" placeholder="Username" required>
										</div>
										<div class="col-md-12">
											<input type="password" class="form-control" name="password" placeholder="Password" required>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-6 text-left" style="margin-left: -10px;">
											<input type="submit" name="submit" value="S i g n  &nbsp; I n" class="btn btn-primary">
										</div>
										<div class="col-md-6 text-right" style="padding-top: 5px;">
											<a href="<?php echo base_url('forget/password'); ?>">Forget Your Password ?</a>
										</div>
									</div>
									<br><br>
									<hr>
									Not Registered ? <a href="<?php echo base_url('signup'); ?>"> Registration Now </a>
								</form>
							</p>
					    </li>
					  </ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<div id="fh5co-started-1"></div>

<?php include "main-footer.php"; ?>
