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
              <h3 class="box-title"> Detail Konten Web</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php
              foreach($detil_setting as $ds){
              ?>
              <table class="table table-bordered table-striped">
                <tr>
                  <td height="30"><b>Phone</td>
                  <td> : </td>
                  <td>&nbsp;&nbsp; <?php echo $ds->phone ?> </td>
                </tr>
                <tr>
                  <td height="30"><b>Email</td>
                  <td>: </td>
                  <td>&nbsp;&nbsp; <?php echo $ds->email ?> </td>
                </tr>
                <tr>
                  <td height="30"><b>Address</td>
                  <td> : </td>
                  <td>&nbsp;&nbsp; <?php echo $ds->address ?> </td>
                </tr>
                <tr>
                  <td height="30"><b>Facebook</td>
                  <td>: </td>
                  <td>&nbsp;&nbsp; <?php echo $ds->fb ?> </td>
                </tr>
                <tr>
                  <td height="30"><b>Twitter</td>
                  <td>: </td>
                  <td>&nbsp;&nbsp; <?php echo $ds->tw ?> </td>
                </tr>
                <tr>
                  <td height="30"><b>Youtube</td>
                  <td> : </td>
                  <td>&nbsp;&nbsp; <?php echo $ds->yt ?> </td>
                </tr>
                <tr>
                  <td height="30"><b>Instagram</td>
                  <td> : </td>
                  <td>&nbsp;&nbsp; <?php echo $ds->ig  ?> </td>
                </tr>
                <tr>
                  <td height="30"><b>Google</td>
                  <td> : </td>
                  <td>&nbsp;&nbsp; <?php echo $ds->google  ?> </td>
                </tr>
                <tr>
                  <td height="30"><b>About Us</td>
                  <td> : </td>
                  <td>&nbsp;&nbsp; <?php echo $ds->about ?> </td>
                </tr>
                <tr>
                  <td height="30"><b>About Us For Header</td>
                  <td> : </td>
                  <td>&nbsp;&nbsp; <?php echo $ds->about_header ?> </td>
                </tr>
                <tr>
                  <td height="30"><b>About Us For Footer</td>
                  <td> : </td>
                  <td>&nbsp;&nbsp; <?php echo $ds->about_footer ?> </td>
                </tr>
              </table>
              <?php } ?>
              <br>
              <a href="<?php echo base_url('dashboard/admin/data/setting'); ?>"><input type="button" value="Back To View" class="btn btn-success"></a>
              <!-- <input type="button" name="print" value="Print" class="btn btn-success" onClick="window.print();"> -->
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
