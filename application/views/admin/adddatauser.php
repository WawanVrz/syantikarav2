<?php include "Header.php"; ?>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12">
          <!-- TO DO List -->
          <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>
              <h3 class="box-title">Add Master Data User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="<?php echo base_url(). 'UsersController/tambah_aksi'; ?>" method="post" onsubmit="return validasi();" enctype="multipart/form-data">

                <?php echo $this->session->userdata("validasidata"); ?>
                <div class="box-body col-lg-12">
                  <div class="form-group">
                    <label>Fullname</label>
                    <input type="text" name="fulname" class="form-control" placeholder="Fullname ... " required>
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username ... " required>
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="pass" class="form-control" placeholder="Password ... " required>
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Role</label>
                    <select name="role" class="form-control select2" style="width: 100%;" required>
                      <option selected="selected" value="" disabled>Pilih Role</option>
                      <option value="Admin">Admin</option>
                      <option value="Frontoffice">Frontoffice</option>
                      <option value="Kepala">Kepala</option>
                      <option value="Penanggung Jawab">Penanggung Jawab</option>
                    </select>
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Position</label>
                    <input type="text" name="posisi" class="form-control" placeholder="Position ... " required>
                  </div>
                </div>
                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Provinsi</label>
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
                </div>
                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Kabupaten</label>
                        <select class='form-control' id='kota' name="kota">
                              <option value='0'>Pilih Kabupaten-Kota</option>
                        </select>
                  </div>
                </div>
                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Telphone</label>
                      <input type="text" class="form-control" id='telp' name="telp" placeholder="Telphone" required>
                  </div>
                </div>

                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Email</label>
                      <input type="email" class="form-control" id='email' name="email" placeholder="Email" required>
                  </div>
                </div>
                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Address</label>
                      <input type="text" class="form-control" name="address" placeholder="Address" required>
                  </div>
                </div>
                <div class="box-body col-lg-6">
                  <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control" />
                    <!-- <input type="text" name="filefoto" class="form-control" required> -->
                  </div>
                </div>
                <div class="form-group">
                  <input type="submit" name="submit" value="Save" class="btn btn-success">
                  <a href="<?php echo base_url('dashboard/admin/data/user'); ?>"><input type="button" value="Back To View" class="btn btn-success"></a>
                  <input type="reset" name="reset" value="Cancel" class="btn btn-success">
                </div>
              </form>
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

  <script type="text/javascript">
  	jQuery(document).ready(function($){
  		$.ajaxSetup({
  			type:"POST",
  			url: "<?php echo base_url('UsersController/ambil_data') ?>",
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
<?php include "Footer.php"; ?>
