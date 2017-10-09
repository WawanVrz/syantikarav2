<?php include "main-header.php" ;?>

<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background:#2196f3; height: 500px;">
<div class="overlay"></div>
<div class="container">
  <div class="row">
    <div class="col-md-7 text-left">
      <div class="display-t">
        <div class="display-tc animate-box" data-animate-effect="fadeInUp">
          <h1 class="mb30">About Us</h1>
        </div>
      </div>
    </div>
  </div>
</div>
</header>

<div id="fh5co-team">
<div class="container" style="margin-top: -60px;">
  <div class="row animate-box row-pb-md">
    <div class="col-md-12 text-center fh5co-heading  animate-box">
      <h2 align="center">About RPCB Syantikara</h2>
      <hr>
      <p style="font-size: 14px;">
        <?php
          foreach ($setting as $s)
          {
              echo  $s->about;
          }
        ?>
      </p>
    </div>
  </div>
</div>
</div>

<div id="fh5co-testimonial" class="fh5co-bg-section" >
<div class="container">
  <div class="row animate-box" data-animate-effect="fadeInUp">
    <div class="col-md-12 text-center fh5co-heading">
      <h2 align="center">Testimonial</h2>
      <hr>
      <p style="font-size: 14px;">Some Testimonial from Syantikara's Mitra and Syantikara's Customers. Check It Out.</p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 animate-box">
      <div class="testimonial">
        <blockquote>
          <p>&ldquo;Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.&rdquo;</p>
          <p class="author"> <img src="assets/frontend/images/user1-128x128.jpg" alt="Free HTML5 Bootstrap Template by gettemplates.co"> <cite>&mdash; Ignatius Kun Aldian</cite></p>
        </blockquote>
      </div>

      <div class="testimonial fh5co-selected">
        <blockquote>
          <p>&ldquo;Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius. Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.&rdquo;</p>
          <p class="author"><img src="assets/frontend/images/user2-160x160.jpg" alt="Free HTML5 Bootstrap Template by gettemplates.co"> <cite>&mdash; Dio - Himaforka UAJY</cite></p>
        </blockquote>
      </div>
    </div>

    <div class="col-md-6 animate-box">
      <div class="testimonial fh5co-selected">
        <blockquote>
          <p>&ldquo;Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius. Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.&rdquo;</p>
          <p class="author"><img src="assets/frontend/images/user3-128x128.jpg" alt="Free HTML5 Bootstrap Template by gettemplates.co"> <cite>&mdash; Yulia - HMPSM UAJY</cite></p>
        </blockquote>
      </div>
      <div class="testimonial">
        <blockquote>
          <p>&ldquo;Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.&rdquo;</p>
          <p class="author"><img src="assets/frontend/images/user4-128x128.jpg" alt="Free HTML5 Bootstrap Template by gettemplates.co"> <cite>&mdash; Bunga Natalia</cite></p>
        </blockquote>
      </div>
    </div>
  </div>
</div>
</div>

<?php include "main-footer.php"; ?>
