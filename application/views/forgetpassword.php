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
								<form method="post" action="<?php echo base_url(). 'ForgetPassword/reset'; ?>" enctype="multipart/form-data">
									<div class="row form-group">
										<div class="col-xs-12" style="margin-bottom: 10px;">
											<input type="email" class="form-control" name="email" placeholder="Your Email" required>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12 text-center">
											<input type="submit" name="submit" value="Reset Password" class="btn btn-primary">
										</div>
									</div>
									<br><br>
									<hr>
									Already Registered ? <a href="<?php echo base_url('signin'); ?>"> Sign In Now </a>
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
