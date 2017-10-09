<?php
  foreach ($setting as $s) {
?>
<footer id="fh5co-footer" role="contentinfo">
  <div class="container">
    <div class="row row-pb-md">
      <div class="col-md-5 fh5co-widget ">
        <img src="assets/frontend/images/logo.png" class="img-footer" width="50%" style="margin-left: -5px; margin-top: -10px; margin-bottom: 15px;">
        <p style="font-size: 14px;">
          <?php echo $s->about_footer ?>
        </p>
        <p>
          <ul class="fh5co-social-icons">
            <li><a href="<?php echo $s->tw ?>" target="_blank"><i class="icon-twitter twitter"></i></a></li>
            <li><a href="<?php echo $s->fb ?>" target="_blank"><i class="icon-facebook facebook"></i></a></li>
            <li><a href="<?php echo $s->yt ?>" target="_blank"><i class="icon-youtube youtube"></i></a></li>
            <li><a href="<?php echo $s->ig ?>" target="_blank"><i class="icon-instagram instagram"></i></a></li>
            <li><a href="<?php echo $s->google ?>" target="_blank"><i class="icon-google google"></i></a></li>
          </ul>
        </p>
      </div>
      <div class="col-md-4">
        <h4 style="margin-bottom: 35px;"><b>Contacts</b></h4>
        <ul class="fh5co-footer" style="font-size: 14px; margin-left: -25px;">
          <li>Address : <?php echo $s->address ?></li>
                      <li>Phone   : <?php echo $s->phone ?></li>
                      <li>Email   : <?php echo $s->email ?></li>
                      <li>Website   : www.syantikara.com</li>
        </ul>
      </div>

      <div class="col-md-3">
        <h4 style="margin-bottom: 30px;"><b>Site Maps</b></h4>
        <ul class="fh5co-footer" style="font-size: 14px; margin-left: -25px;">
          <li style="margin-bottom: 10px;"><a href="<?php echo base_url('about'); ?>">About Us</a></li>
          <li style="margin-bottom: 10px;"><a href="<?php echo base_url('facilities'); ?>">Facilities</a></li>
          <li style="margin-bottom: 10px;"><a href="<?php echo base_url('news'); ?>">News</a></li>
          <li style="margin-bottom: 10px;"><a href="<?php echo base_url('gallery'); ?>">Gallery</a></li>
          <li style="margin-bottom: 10px;"><a href="<?php echo base_url('contact'); ?>">Contact Us</a></li>
          <li style="margin-bottom: 10px;"><a data-toggle="modal" data-target=".bs-example-modal-lg">Booking Now</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>
<div class="col-md-12">
  <div class="row copyright" style="background-color: #434a54; color: white; height: auto;">
    <div class="col-md-6" style="padding-top: 25px; padding-left: 8%; margin-bottom: 25px;"> <small class="block">www.syantikara.com</small>  </div>
    <div class="col-md-6 text-right" style="padding-top: 25px; padding-right: 8%; margin-bottom: 25px;"> <small class="block">RPCB Syantikara © 2017. All Rights Reserved</small>  </div>
  </div>
</div>
<div class="gototop js-top">
  <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>
<?php } ?>
<!-------------------------------------------------------------------------------------------------------------------->

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">BOOK SYANTIKARA</h4>
      </div>
      <div class="modal-body">
      <p style="margin-bottom:20px;"></p>
      <form>
          <table>
            <tr height="100px">
              <td width="450px">
                <label for="recipient-name" class="control-label">Check In:</label>
                <input type="text" class="form-control" id="recipient-name">
              </td>
              <td width="100px">
              </td>
              <td width="450px">
                <label for="recipient-name" class="control-label">Check Out:</label>
                <input type="text" class="form-control" id="recipient-name">
              </td>
            </tr>
            <tr>
              <td width="450px">
                <label for="recipient-name" class="control-label">Rooms:</label>
                  <input type="number" name="room" id="room" class="form-control" value="0" required>
              </td>
              <td width="100px">
              </td>
              <td width="450px">
                <label for="recipient-name" class="control-label">Guest:</label>
                <input type="number" name="guest" id="guest" class="form-control" value="0" required>
              </td>
            </tr>
          </table>
        </form>
        <p style="margin-bottom:50px;"></p>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Book Now</button>
        </div>
      </div>
  </div>
</div>
</div>

<!-------------------------------------------------------------------------------------------------------------------->
<script>
      $('#myModal').on('shown.bs.modal', function () {
          $('#myInput').focus()
      })
</script>
<!-- jQuery -->
<script src="assets/frontend/js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="assets/frontend/js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="assets/frontend/js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="assets/frontend/js/jquery.waypoints.min.js"></script>
<!-- countTo -->
<script src="assets/frontend/js/jquery.countTo.js"></script>
<!-- Magnific Popup -->
<script src="assets/frontend/js/jquery.magnific-popup.min.js"></script>
<script src="assets/frontend/js/magnific-popup-options.js"></script>
<!-- Stellar -->
<script src="assets/frontend/js/jquery.stellar.min.js"></script>
<!-- Main -->
<script src="assets/frontend/js/main.js"></script>
<!-- Lightbox -->
<script src="assets/frontend/lightbox/dist/js/lightbox.js"></script>

<!-- DataTables -->
<script src="assets/dashboard/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/dashboard/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
  //  $("#example1").DataTable();
    $('#example1').DataTable({
      "responsive": true,
      "paging": false,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": false,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
