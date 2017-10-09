<?php include "main-header.php" ;?>

<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(assets/frontend/images/work-2.jpg); height: 500px;">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-7 text-left">
        <div class="display-t">
          <div class="display-tc animate-box" data-animate-effect="fadeInUp">
            <h1 class="mb30">Our Gallery</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<div id="fh5co-project">
  <div class="container" style="margin-top: -60px;">
    <div class="col-md-12 text-center fh5co-heading  animate-box">
        <h2 align="center">RPCB Syantikara's Gallery</h2>
        <hr>
        <p style="font-size: 14px;">
          RPCB Syantikara adalah rumah retret yang dikhususkan bagi jemaat yang ingin melakukan perjalanan rohani. Selain itu RPCB Syantikara juga merupakan tempat retret dan tempat pembinaan untuk kalangan muda.
        </p>
      </div>
    <div class="row">
      <?php
        foreach ($result as $g) {
      ?>
      <div class="col-md-4 col-sm-6 fh5co-project animate-box" data-animate-effect="fadeIn">
        <a href="assets/uploads/<?php echo $g->image ?>" data-lightbox="roadtrip" data-title="Syantikara Galleries"><img src="assets/uploads/<?php echo $g->image ?>" alt="Free HTML5 Website Template by gettemplates.co" class="img-responsive">
          <div class="fh5co-copy">
            <h3><?php echo $g->nama ?></h3>
          </div>
        </a>
      </div>
      <?php } ?>

      <div class="col-md-12 text-center">
        <nav aria-label="Page navigation">
            <?php echo $pagination;?>
        </nav>
      </div>
    </div>
  </div>
</div>
<div id="fh5co-started-1"></div>

<?php include "main-footer.php"; ?>
