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
<div id="fh5co-services">
		<div class="container" style="margin-top: -60px;">
			<?php
					foreach ($userz as $u)
					{
			?>
			<div style="width:100%">
				<div class="col-lg-4">
								<img class="img-responsive img-circle" align="center" style="margin-left:85px" width="200" height="250" src="assets/dashboard/dist/img/<?php echo $u->image; ?>" alt="User profile picture"><br>
								<h3 class="profile-username text-center"><?php echo $u->name; ?></h3>
								<p class="text-muted text-center" style="font-size:15px; margin-top:-20px;"><?php echo $u->email; ?></p>
								<p class="text-muted text-center" style="font-size:12px; margin-top:-20px;">Member Since <?php echo $u->tgl_daftar; ?></p>
				</div>
				<div class="col-lg-8">
					<div class="box-body">
						<div class="nav-tabs-custom">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab_1" data-toggle="tab">Profile User</a></li>
								<li><a href="#tab_2" data-toggle="tab">Change Password</a></li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane active" id="tab_1">
									<br>
									<form method="post" action="<?php echo base_url(). 'MyProfileUser/update_profile'; ?>" onsubmit="return validasi();" enctype="multipart/form-data">
										<strong><i class="fa fa-user margin-r-5"></i> Fullname </strong>
										<input type="hidden" class="form-control" name="id" value="<?php echo $u->id_user; ?>">
										<input type="text" class="form-control" name="fullname" value="<?php echo $u->name; ?>">
										<hr>

										<strong><i class="fa fa-eye margin-r-5"></i> Username </strong>
										<input type="text" class="form-control" name="username" value="<?php echo $u->username; ?>" disabled>
										<hr>

										<strong><i class="fa fa-phone margin-r-5"></i> Phone </strong>
										<input type="text" class="form-control" name="phone" value="<?php echo $u->phone; ?>">
										<hr>

										<strong><i class="fa fa-envelope-o margin-r-5"></i> Email </strong>
										<input type="text" class="form-control" name="email" value="<?php echo $u->email; ?>">
										<hr>

										<strong><i class="fa fa-location-arrow margin-r-5"></i> Address </strong>
										<input type="text" class="form-control" name="address" value="<?php echo $u->address; ?>">
										<hr>

										<strong><i class="fa fa-file-image-o margin-r-5"></i> Image </strong>
										<input type="file" class="form-control" name="image">
										<hr>

										<input type="submit" class="btn btn-success" name="submit" value="Update">
									</div>
								</form>
								<!-- /.tab-pane -->
								<div class="tab-pane" id="tab_2">
									<div class="col-lg-10 col-xs-10">
										<div class="form-group">
											<form action="<?php echo base_url(). 'MyProfileUser/updatePassword'; ?>" method="post" enctype="multipart/form-data">
												<div class="box-body">
														<div class="form-group">
															<br>
																	<p><label for="password">New Password</label></p>
																	 <input type="hidden" class="form-control" name="id" value="<?php echo $u->id_user; ?>">
																	 <input type="password" id="pwd" class="form-control" name="newpass" placeholder="New Password" required />
														</div>
													</div>
													<div class="box-body">
															<div class="form-group">
																<br>
																		<p><label for="password">Confirm Password</label></p>
																		 <input type="password" class="form-control" name="newpassconfirm" placeholder="Confirm Password" required />
															</div>
													</div>
													<div class="box-body">
															<div class="form-group">
																<br><input type="submit" name="simpan" value="Change Password" class="btn btn-success">
															</div>
														</div>
											</form>
										</div>
								</div>

								</div>
								<!-- /.tab-pane -->
							</div>
							<!-- /.tab-content -->
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
<div id="fh5co-started-1"></div>
<?php include "main-footer.php"; ?>

<script type="text/javascript">
  function validasi(){
    var notelepon = document.getElementById('telp').value;
    var mail = document.getElementById('email').value;
    var number = /^[0-9]+$/;
		var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

    if(!mail.match(re))
    {
      alert('Email Tidak Valid');
      return false;
    }

    if(!notelepon.match(number))
    {
      alert('No Telphone Harus Angka');
      return false;
    }

    if(notelepon.length >= 13)
    {
      alert('No Telphone Harus 12 digit');
      return false;
    }

		return true;
  }
</script>
