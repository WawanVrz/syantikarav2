<?php include "Header.php"; ?>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <div class="box-header">
                <i class="ion ion-clipboard"></i>
                <h2 class="box-title"><b>Profile User</b></h2>
                <p align="right" style="margin-top:-20px">
                  <div class="btn btn-sm btn-primary pull-right" style="background: #fff; font-size: 110%; color:#000; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                    Member Sejak &nbsp;&nbsp; <i class="glyphicon glyphicon-calendar fa fa-calendar"></i> &nbsp;&nbsp; <?php echo $this->session->userdata("membersince"); ?>
                  </div>
                </p>
              </div>
              <br>
              <div style="width:100%">
                <div class="col-lg-3">
                        <img class="img-responsive img-squere" align="center" style="margin-left:15px" width="200" height="250" src="assets/dashboard/dist/img/<?php echo $this->session->userdata("gambar"); ?>" alt="User profile picture"><br>
                        <h3 class="profile-username text-center"><?php echo $this->session->userdata("fullname"); ?></h3>
                        <p class="text-muted text-center">adminsyantikara@mail.com</p>
                </div>
                <div class="col-lg-9">
                  <div class="box-body">
                    <div class="nav-tabs-custom">
                      <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1" data-toggle="tab">Profile User</a></li>
                        <li><a href="#tab_2" data-toggle="tab">Change Password</a></li>
                      </ul>
                      <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                          <br>
                          <strong><i class="fa fa-user margin-r-5"></i> Fullname </strong>
                          <p class="text-muted"><?php echo $this->session->userdata("fullname"); ?></p>
                          <hr>

                          <strong><i class="fa fa-eye margin-r-5"></i> Username </strong>
                          <p class="text-muted"><?php echo $this->session->userdata("nama"); ?></p>
                          <hr>

                          <strong><i class="fa fa-gear margin-r-5"></i> Type </strong>
                          <p class="text-muted"><?php echo $this->session->userdata("type"); ?> </p>
                          <hr>

                          <strong><i class="fa fa-users margin-r-5"></i> Position </strong>
                          <p class="text-muted"><?php echo $this->session->userdata("posisi"); ?> In RPCB Syantikara   </p>
                          <hr>
<!--
                          <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                          <p class="text-muted"></p>
                          <hr> -->

                          <strong><i class="fa fa-unlock  margin-r-5"></i> Status</strong>
                          <p class="text-muted">Active</p>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                          <div class="col-lg-10 col-xs-10">
                    				<div class="form-group">
                              <form action="<?php echo base_url(). 'DashboardAdminController/update'; ?>" method="post" enctype="multipart/form-data">
                              	<div class="box-body">
                                  	<div class="form-group">
                                      <br>
                                        	<p><label for="password">New Password</label></p>
                                           <input type="hidden" name="id" value="<?php echo $this->session->userdata("id_user"); ?>">
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
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    <!-- /.col -->
      </div>
  <!-- /.row -->

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
