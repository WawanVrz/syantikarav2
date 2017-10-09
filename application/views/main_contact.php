<?php include "main-header.php" ;?>

<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(assets/frontend/images/work-2.jpg); height: 500px;">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-7 text-left">
        <div class="display-t">
          <div class="display-tc animate-box" data-animate-effect="fadeInUp">
            <h1 class="mb30">Contact Us</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<div id="fh5co-contact">
  <div class="container">
    <div class="row">
      <div class="col-md-5 col-md-push-1 animate-box">
        <div class="fh5co-contact-info">
          <h3>Contact Information</h3>
          <?php
            foreach ($setting as $s) {
          ?>
          <ul>
            <li class="address">Jl. Colombo No.001, Caturtunggal, <br> Kec. Depok, Kabupaten Sleman, <br>Daerah Istimewa Yogyakarta</li>
            <li class="phone"><a href="<?php echo $s->phone ?>"><?php echo $s->phone ?></a></li>
            <li class="email"><a href="mailto:<?php echo $s->email ?>"><?php echo $s->email ?></a></li>
            <li class="url"><a href="www.syantikara.com">www.syantikara.com</a></li>
          </ul>
          <?php } ?>
        </div>
      </div>
      <div class="col-md-6 animate-box">
        <h3>Get In Touch</h3>
        <form action="<?php echo base_url(). 'Contacts/email'; ?>" method="post" enctype="multipart/form-data">
          <div class="row form-group">
            <div class="col-md-6">
              <label for="fname">First Name</label>
              <input type="text" name="fname" id="fname" class="form-control" placeholder="Your firstname">
            </div>
            <div class="col-md-6">
              <label for="lname">Last Name</label>
              <input type="text" name="lname" id="lname" class="form-control" placeholder="Your lastname">
            </div>
          </div>

          <div class="row form-group">
            <div class="col-md-12">
              <label for="email">Email</label>
              <input type="text" name="email" id="email" class="form-control" placeholder="Your email address">
            </div>
          </div>

          <div class="row form-group">
            <div class="col-md-12">
              <label for="subject">Subject</label>
              <input type="text" name="subject" id="subject" class="form-control" placeholder="Your subject of this message">
            </div>
          </div>

          <div class="row form-group">
            <div class="col-md-12">
              <label for="message">Message</label>
              <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
            </div>
          </div>
          <div class="form-group">
            <input type="submit" value="Send Message" class="btn btn-lg btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.1144877715687!2d110.38564681482131!3d-7.777683694394726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a59c8e48fb63d%3A0x47f6c376d0d03349!2sJl.+Colombo+No.1%2C+Caturtunggal%2C+Kec.+Depok%2C+Kabupaten+Sleman%2C+Daerah+Istimewa+Yogyakarta+55281!5e0!3m2!1sen!2sid!4v1489333351341" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe>


<?php include "main-footer.php"; ?>
