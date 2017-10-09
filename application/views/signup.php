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
				<div class="col-md-10 text-center" style="margin-left: 100px;">
					<nav aria-label="Page navigation">
					  <ul class="pagination">
					    <li>
					      <p align="center">
							  <img src="assets/frontend/images/S.png" class="img-responsive" width="100" height="100" style="margin-top: -70px;">
								<h3 align="center" style="margin-bottom: 0px;"><b>Registrasi Member RPCB Syantikara</b></h3>
								<hr>
								<form method="post" action="<?php echo base_url(). 'SignUp/tambah_aksi'; ?>" onsubmit="return validasi();" enctype="multipart/form-data">
									<div class="row form-group">
										<div class="col-md-6" style="margin-bottom: 10px;">
											<input type="text" class="form-control" name="first" placeholder="Firstname" required>
										</div>
										<div class="col-md-6" style="margin-bottom: 10px;">
											<input type="text" class="form-control" name="last" placeholder="Lastname" required>
										</div>
										<div class="col-md-6" style="margin-bottom: 10px;">
											<input type="text" class="form-control" id='telp' name="telp" placeholder="Telphone" required>
										</div>
										<div class="col-md-6" style="margin-bottom: 10px;">
											<input type="email" class="form-control" id='email' name="email" placeholder="Email" required>
										</div>
										<div class="col-md-12" style="margin-bottom: 10px;">
											<textarea class="form-control" name="address" placeholder="Address" required></textarea>
										</div>
										<div class="col-md-6" style="margin-bottom: 10px;">
											<select class='form-control' id='provinsi' name="prov">
													<option value='0' selected="selected" disabled="disabled">Pilih Provinsi</option>
													<?php
													foreach ($provinsi as $prov)
													{
														echo "<option value='$prov[id]'>$prov[name]</option>";
													}
													?>
											</select>
										</div>
										<div class="col-md-6" style="margin-bottom: 10px;">
											<select class='form-control' id='kota' name="kota">
														<option value='0'>Pilih Kabupaten-Kota</option>
											</select>
										</div>
										<div class="col-md-6" style="margin-bottom: 10px;">
											<input type="text" class="form-control" name="username" placeholder="Username" required>
										</div>
										<div class="col-md-6" style="margin-bottom: 10px;">
											<input type="password" class="form-control" name="pass" placeholder="Password" required>
										</div>
										<div class="col-md-6" style="margin-bottom: 10px;">
											<input type="text" class="form-control" name="org" placeholder="Organization" required>
										</div>
										<div class="col-md-6" style="margin-bottom: 10px;">
											<input type="file" name="image" class="form-control"  />
										</div>
										<div class="col-md-6" style="margin-bottom: 10px;">
											<?php
												echo $recaptcha_html;
											?>
											<p style="color:red; font-size:12px; text-align:left;">*Wajib Diisi.</p>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-6 text-left" style="margin-left: -10px;">
											  <input type="submit" name="submit" value="Register" class="btn btn-primary">
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

<script type="text/javascript">
	jQuery(document).ready(function($){
		$.ajaxSetup({
			type:"POST",
			url: "<?php echo base_url('SignUp/ambil_data') ?>",
			cache: false,
		});

		$("#provinsi").change(function()
		{
			var value=$(this).val();
			if(value>0)
			{
				$.ajax({
					data:{modul:'kabupaten',id:value},
					success: function(respond)
					{
						$("#kota").html(respond);
					}
				})
			}
		});
	})
</script>
