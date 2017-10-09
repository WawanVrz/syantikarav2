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
              <i class="ion ion-key"></i>
              <h3 class="box-title">Change Password</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="col-lg-10 col-xs-10">
        				<div class="form-group">
                  <?php foreach($user_data as $ud){ ?>
                  <form action="<?php echo base_url(). 'DashboardAdminController/update'; ?>" method="post" enctype="multipart/form-data">
                  	<div class="box-body">
                      	<div class="form-group">
                            	<p><label for="password">New Password</label></p>
                               <input type="hidden" name="id" value="<?php echo $ud->id_user ?>">
                            	 <input type="password" id="pwd" class="form-control" name="newpass" placeholder="New Password" required />
                               <div id="pwd_strength_wrap">
                                  <div id="passwordDescription">Password not entered</div>
                                  <div id="passwordStrength" class="strength0"></div>
                                  <div id="pswd_info">
                                          <strong>Strong Password Tips:</strong>
                                          <ul>
                                                  <li class="invalid" id="length">At least 6 characters</li>
                                                  <li class="invalid" id="pnum">At least one number</li>
                                                  <li class="invalid" id="capital">At least one lowercase &amp; one uppercase letter</li>
                                                  <li class="invalid" id="spchar">At least one special character</li>
                                          </ul>
                                  </div>
                         		</div>
                    		</div>
                      </div>
                      <div class="box-body col-lg-5">
                      	<div class="form-group">
                            	<p><label for="password">Confirm Password</label></p>
                            	 <input type="password" class="form-control" name="confirm" placeholder="Confirm Password" required />
                    		</div>
                      </div>
                      <div class="box-footer col-lg-12">
                      	<div id="form_result"></div>
                      	<input type="submit" name="simpan" value="Change Password" class="btn btn-success">
                      </div>
                  </form>
                  <?php } ?>
        				</div>
        		</div>

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


  <?php include "Footer.php"; ?>
  <script type="text/javascript">
  $("input#pwd").on("focus keyup", function () {

  });

  $("input#pwd").blur(function () {

  });
  $("input#pwd").on("focus keyup", function () {
          var score = 0;
          var a = $(this).val();
          var desc = new Array();

          // strength desc
          desc[0] = "Too short";
      desc[1] = "Weak";
      desc[2] = "Good";
      desc[3] = "Strong";
      desc[4] = "Best";

  });

  $("input#pwd").blur(function () {

  });
  $("input#pwd").on("focus keyup", function () {
          var score = 0;
          var a = $(this).val();
          var desc = new Array();

          // strength desc
          desc[0] = "Too short";
          desc[1] = "Weak";
          desc[2] = "Good";
          desc[3] = "Strong";
          desc[4] = "Best";

          // password length
          if (a.length >= 6) {
              $("#length").removeClass("invalid").addClass("valid");
              score++;
          } else {
              $("#length").removeClass("valid").addClass("invalid");
          }

          // at least 1 digit in password
          if (a.match(/\d/)) {
              $("#pnum").removeClass("invalid").addClass("valid");
              score++;
          } else {
              $("#pnum").removeClass("valid").addClass("invalid");
          }

          // at least 1 capital & lower letter in password
          if (a.match(/[A-Z]/) && a.match(/[a-z]/)) {
              $("#capital").removeClass("invalid").addClass("valid");
              score++;
          } else {
              $("#capital").removeClass("valid").addClass("invalid");
          }

          // at least 1 special character in password {
          if ( a.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) ) {
                  $("#spchar").removeClass("invalid").addClass("valid");
                  score++;
          } else {
                  $("#spchar").removeClass("valid").addClass("invalid");
          }


          if(a.length > 0) {
                  //show strength text
                  $("#passwordDescription").text(desc[score]);
                  // show indicator
                  $("#passwordStrength").removeClass().addClass("strength"+score);
          } else {
                  $("#passwordDescription").text("Password not entered");
                  $("#passwordStrength").removeClass().addClass("strength"+score);
          }
  });

  $("input#pwd").blur(function () {

  });
  $("input#pwd").on("focus keyup", function () {
          var score = 0;
          var a = $(this).val();
          var desc = new Array();

          // strength desc
          desc[0] = "Too short";
          desc[1] = "Weak";
          desc[2] = "Good";
          desc[3] = "Strong";
          desc[4] = "Best";

          $("#pwd_strength_wrap").fadeIn(400);

          // password length
          if (a.length >= 6) {
              $("#length").removeClass("invalid").addClass("valid");
              score++;
          } else {
              $("#length").removeClass("valid").addClass("invalid");
          }

          // at least 1 digit in password
          if (a.match(/\d/)) {
              $("#pnum").removeClass("invalid").addClass("valid");
              score++;
          } else {
              $("#pnum").removeClass("valid").addClass("invalid");
          }

          // at least 1 capital & lower letter in password
          if (a.match(/[A-Z]/) && a.match(/[a-z]/)) {
              $("#capital").removeClass("invalid").addClass("valid");
              score++;
          } else {
              $("#capital").removeClass("valid").addClass("invalid");
          }

          // at least 1 special character in password {
          if ( a.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) ) {
                  $("#spchar").removeClass("invalid").addClass("valid");
                  score++;
          } else {
                  $("#spchar").removeClass("valid").addClass("invalid");
          }


          if(a.length > 0) {
                  //show strength text
                  $("#passwordDescription").text(desc[score]);
                  // show indicator
                  $("#passwordStrength").removeClass().addClass("strength"+score);
          } else {
                  $("#passwordDescription").text("Password not entered");
                  $("#passwordStrength").removeClass().addClass("strength"+score);
          }
  });

  $("input#pwd").blur(function () {
          $("#pwd_strength_wrap").fadeOut(400);
  });
  </script>
