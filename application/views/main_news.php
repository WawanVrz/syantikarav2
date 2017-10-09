<?php include "main-header.php" ;?>

<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(assets/frontend/images/work-2.jpg); height: 500px;">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-7 text-left">
        <div class="display-t">
          <div class="display-tc animate-box" data-animate-effect="fadeInUp">
            <h1 class="mb30">News Update</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<div id="fh5co-blog">
  <div class="container">
    <div class="row">
      <div class="col-md-10 animate-box">
        <h4><b> Berita Terkini</b></h4>
        <?php
            foreach ($result as $b)
            {
              $tanggal1 =  $b->tgl_publish;
              $format1 = date('d F Y', strtotime($tanggal1 ));
        ?>
        <div class="col-md-12 animate-box" style="margin-bottom: 20px;">
          <div class="col-md-2 text-left" style="margin-left: -10px;"> <img src="assets/uploads/<?php echo $b->image ?>" alt="Free HTML5 Website Template by gettemplates.co" class="img-responsive"> </div>
          <div class="col-md-8 text-left">
              <h4><b> <?php echo $b->title; ?> </b></h4>
              <h5 style="margin-top: -10px; color: gray"><p>Posted By: <i><?php echo $b->name; ?>. &nbsp;&nbsp;</i> Date : <i><?php echo $format1; ?>. &nbsp;&nbsp;</i></p></h5>
              <p style="font-size: 14px; margin-top: -10px; text-align: justify;">
              <?php echo $b->deskripsi_singkat; ?>
              </p>
              <p  style="font-size: 14px;">
                <a href="<?php echo base_url('news/detail/'.$b->id_news); ?>"><button class="btn btn-primary"> Read More </button></a>
              </p>
          </div>
        </div>
        <?php } ?>
        <div class="col-md-12 text-center">
          <nav aria-label="Page navigation">
              <?php echo $pagination;?>
          </nav>
        </div>
      </div>
      <div class="col-md-2 animate-box">
          <h4 style="margin-left: -65px;"><b>Kategori Berita</b></h4>
          <p>
          <?php
              foreach ($kategori as $k) {
          ?>
          <ul style="font-size: 14px; margin-left: -80px;" >
            <li style="margin-bottom: 10px;"><a href="<?php echo base_url('Blogs/kategori/'.$k->id_kategori); ?>"><?php echo $k->kategori; ?></a></li>
          </ul>
          <?php } ?>
          </p>
      </div>
    </div>
  </div>
</div>
<div id="fh5co-started-1"></div>
<?php include "main-footer.php"; ?>
