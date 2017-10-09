<nav class="fh5co-nav" role="navigation">
  <div class="container">
    <div class="row">
      <div class="col-xs-2 text-left">
        <div id="fh5co-logo"><a href="<?php echo base_url('/'); ?>"><img src="assets/frontend/images/logo.png" alt="Logo" width="199" height="50"></a></div>
      </div>
      <div class="col-xs-7 text-right menu-1" >
        <ul>
          <li><a href="<?php echo base_url('about'); ?>">About Us</a></li>
          <li><a href="<?php echo base_url('facilities'); ?>">Facilities</a></li>
          <li><a href="<?php echo base_url('news'); ?>">News</a></li>
          <li><a href="<?php echo base_url('gallery'); ?>">Gallery</a></li>
          <li><a href="<?php echo base_url('contact'); ?>">Contact</a></li>
        </ul>
      </div>
      <div class="col-xs-3 text-right menu-1" >
        <ul>
          <li><a href="" data-toggle="modal" data-target=".bs-example-modal-lg">Booking Now</a></li>
          <?php
            $in = $this->session->userdata("status");
            if($in == 'Login')
            {
          ?>
            <li class="has-dropdown">
							<a href="#">Account <i class="fa fa-angle-down"></i></a>
							<ul class="dropdown">
								<li><a href="<?php echo base_url('profile'); ?>"><i class="fa fa-user"> Profile </i></a></li>
								<li><a href="<?php echo base_url('list/reservation'); ?>"><i class="fa fa-list"> Transaction </i></a></li>
								<li><a href="<?php echo base_url('public/auth/logout'); ?>"><i class="fa fa-sign-out"> Sign Out </i></a></li>
							</ul>
						</li>
          <?php
            }else{
          ?>
            <li><a href="<?php echo base_url('signin'); ?>">Sign In</a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
</nav>
