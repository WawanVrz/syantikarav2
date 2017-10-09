<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <base href="<?php echo base_url();?>" />
		<base src="<?php echo base_url();?>" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/frontend/css/bootstrap.css">
    <script src="assets/frontend/js/bootstrap.min.js"></script>
    <style rel="stylesheet">
    .btn {
        margin-right: 4px;
        margin-bottom: 4px;
        font-family: "Open Sans", Arial, sans-serif;
        font-size: 16px;
        font-weight: 400;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        -ms-border-radius: 4px;
        border-radius: 4px;
        -webkit-transition: 0.5s;
        -o-transition: 0.5s;
        transition: 0.5s;
        padding: 8px 20px;
        }
        .btn.btn-md {
        padding: 8px 20px !important;
        }
        .btn.btn-lg {
        padding: 18px 36px !important;
        }
        .btn:hover, .btn:active, .btn:focus {
        box-shadow: none !important;
        outline: none !important;
        }

        .btn-primary {
        background: #5E35B1;
        color: #fff;
        border: 2px solid #5E35B1;
        }
        .btn-primary:hover, .btn-primary:focus, .btn-primary:active {
        background: #311B92 !important;
        border-color: #311B92 !important;
        }
        .btn-primary.btn-outline {
        background: transparent;
        color: #512DA8;
        border: 2px solid #512DA8;
        }
        .btn-primary.btn-outline:hover, .btn-primary.btn-outline:focus, .btn-primary.btn-outline:active {
        background: #512DA8;
        color: #fff;
        }
    </style>
</head>
<body>
  <div class="col-md-12 text-center" style="background-color:#EEEEEE; height:80px; margin-bottom:30px;">
      <p style="font-size:18px; padding-top:25px; padding-left:40%;"><b>RPCB Syantikara</b></p>
  </div>
      <div class="col-md-12">
              <p style="font-size:16px; color:#000;"><b>Hello <?php echo $Fullname; ?>, </b></p>
              <hr>
              <p style="font-size:15px;">
              Anda Telah Mereset Password Anda, berikut data password baru anda: <br><br>

              <p style="font-size:15px; margin-left:5%;">
                - <b>Username : </b><?php echo $UserName;?><br><br>
                - <b>Password : </b><?php echo $Password; ?><br><br>
                - <b>Tgl Reset : </b><?php echo $DateRegister;?><br><br>
              </p>
              <p align="center"><a href="http://localhost:8081/syantikaraweb/signin"><button class="btn btn-primary">Login Ke Syantikara</button></a></p>
              <br><br>
              <p style="font-size:15px;">
                  Regards,<br><br>
                  RPCB Syantikara<br>
              </p>
              </p>
              <hr>
                <p style="font-size:11px;">
                  If you are having trouble clicking the "Login ke Syantikara" button, copy and paste the URL below into your web browser: http://syantikara.com/signin
                </p>
                <br>
      </div>
  <div class="col-md-12 text-center" style="background-color:#EEEEEE; height:80px;">
      <p style="font-size:14px; padding-top:25px; padding-left:35%; color:#424242;">&copy; 2017 RPCB Syantikara. All Rights Reserved</p>
  </div>
</body>
</html>
