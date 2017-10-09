<?php include "Header.php"; ?>


    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <div class="col-lg-12 col-xs-12">
          <div class="box-body">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Denah Lantai 1</a></li>
                <li><a href="#tab_2" data-toggle="tab">Denah Lantai 2</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                  <table width="900" border="1" bordercolor="#000000" class="table table-bordered">
                      <tr>
                        <td height="500">
                          <div class="box-body col-lg-6">
                            <div class="form-group">
                              <label>Check In</label>
                              <div class="input-group date">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="in" class="form-control pull-right field-check-form1 tgl_checkin" id="datepicker1" placeholder="Check In ... " >
                              </div>
                            </div>
                          </div>

                          <div class="box-body col-lg-6">
                            <div class="form-group">
                              <label>Check Out</label>
                              <div class="input-group date">
                                <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="out" class="form-control pull-right field-check-form1 tgl_checkout" id="datepicker2" placeholder="Check Out ... ">
                                <input type="hidden" name="days" id="days">
                              </div>
                            </div>
                          </div>

                          <table width="300" border="1" bordercolordark="#000000" align="left">
                                <tr>
                                    <td height="40" colspan="3" align="center" bgcolor="#39CCCC"><p style="color:#FFF">Ruang Kantor </p></td>
                                </tr>
                                <tr>
                                  <td height="7" colspan="4"></td>
                                </tr>
                                <tr>
                                   <?php if(count($ruang_d) > 0 ){ ?>
                                        <td height="50" colspan="4" align="center" background="assets/dashboard/dist/img/sale-iconruang1.png"><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"> R.Dominikus </button></td>
                                    <?php }else { ?>
                                        <td height="50" colspan="4" align="center" bgcolor="#3c8dbc"><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">R.Dominikus</button></td>
                                    <?php } ?>
                                </tr>
                                <tr>
                                  <td height="7" colspan="4"></td>
                                </tr>
                                <tr>
                                  <td height="50" colspan="4" align="center" class="bg-gray disabled color-palette"><p style="color:#000"> Gua Maria </p></td>
                                </tr>
                                <tr>
                                  <td height="7" colspan="4"></td>
                                </tr>
                                <tr>
                                   <?php if(count($ruang_f) > 0 ){ ?>
                                       <td height="50" colspan="4" align="center" background="assets/dashboard/dist/img/sale-iconruang.png"><button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bs-example-modal-lg-F"> R.Fransiskus </button></td>
                                   <?php }else { ?>
                                       <td height="50" colspan="4" align="center" bgcolor="#dd4b39"><button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bs-example-modal-lg-F"> R.Fransiskus </button></td>
                                   <?php } ?>
                                </tr>
                                <tr>
                                  <td height="7" colspan="4"></td>
                                </tr>
                                <tr>
                                  <td height="30" colspan="1" align="center" bgcolor="#f1c40f"><p style="color:#FFF"> Ruang Doa Kecil </p></td>
                                    <td height="30" colspan="2" align="center" bgcolor="#f1c40f"><p style="color:#FFF"> Ruang Martha </p></td>
                                </tr>
                                <tr>
                                  <td height="7" colspan="4"></td>
                                </tr>
                                <tr>
                                  <?php if(count($ruang_a) > 0 ){ ?>
                                      <td height="50" colspan="4" align="center" background="assets/dashboard/dist/img/sale-iconruang2.png"><button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg-A"> R.Antonius </button></td>
                                  <?php }else { ?>
                                      <td height="50" colspan="4" align="center" bgcolor="#00a65a"><button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg-A"> R.Antonius </button></td>
                                  <?php } ?>
                                </tr>
                            </table>
                            <table width="55%" border="0" bordercolordark="#000000">
                              <tr>
                                  <td height="30" colspan="4" align="center"> Ruang Lobby <p align="right"><b> </b></p></td>
                                </tr>
                            </table>
                            <table width="300" border="1" bordercolordark="#000000" align="right">
                              <tr>
                                  <td height="60" colspan="4" align="center" bgcolor="#2ecc71"><p style="color:#FFF"> Ruang makan besar </p></td>
                                </tr>
                                <tr>
                                  <td height="7" colspan="4"></td>
                                </tr>
                                 <tr>
                                  <td height="30" colspan="2" align="center" bgcolor="#34495e"><p style="color:#FFF"> Ruang Pertemuan- Paulus </p></td>
                                    <td height="30" colspan="2" align="center" bgcolor="#34495e"><p style="color:#FFF"> Ruang Doa Getsemani </p></td>
                                </tr>
                                <tr>
                                  <td height="7" colspan="4"></td>
                                </tr>
                                <tr>
                                  <td height="50" colspan="4" align="center" bgcolor="#16a085"><p style="color:#FFF"> Ruang Kapel Besar-Maria </p></td>
                                </tr>
                                <tr>
                                  <td height="7" colspan="4"></td>
                                </tr>
                                <tr>
                                  <?php if(count($ruang_yoh) > 0 ){ ?>
                                      <td height="50" colspan="4" align="center" background="assets/dashboard/dist/img/sale-iconruang3.png"><button type="button" class="btn btn-warning" data-toggle="modal" data-target=".bs-example-modal-lg-Y"> R.Yohanes </button></td>
                                  <?php }else { ?>
                                      <td height="50" colspan="4" align="center" bgcolor="#f39c12"><button type="button" class="btn btn-warning" data-toggle="modal" data-target=".bs-example-modal-lg-Y"> R.Yohanes </button></td>
                                  <?php } ?>
                                </tr>
                                <tr>
                                  <td height="7" colspan="4"></td>
                                </tr>
                                <tr>
                                  <?php if(count($ruang_ysp) > 0 ){ ?>
                                      <td height="50" colspan="4" align="center" background="assets/dashboard/dist/img/sale-iconruang4.png"><button type="button" class="btn bg-purple margin" data-toggle="modal" data-target=".bs-example-modal-lg-H"> R.Yoseph </button></td>
                                  <?php }else { ?>
                                      <td height="50" colspan="4" align="center" bgcolor="#605ca8"><button type="button" class="btn bg-purple margin" data-toggle="modal" data-target=".bs-example-modal-lg-H"> R.Yoseph </button></td>
                                  <?php } ?>
                                </tr>
                            </table>
                            <table width="100%" border="1" bordercolordark="#000000">
                              <tr>
                                  <td height="30" colspan="4" align="center" bgcolor="#95a5a6"><p style="color:#FFF"> Ruang Sidang Kecil </p></td>
                                </tr>
                            </table>
                            <table width="100%" border="0" bordercolordark="#000000">
                              <tr>
                                  <td height="100"><br>
                                    <img src="assets/dashboard/dist/img/11.png"> : R.Kantor<br>
                                    <img src="assets/dashboard/dist/img/12.png"> : R.Dominikus<br>
                                    <img src="assets/dashboard/dist/img/13.png"> : Gua Maria<br>
                                    <br>
                                  </td>
                                  <td height="100"><br>
                                    <img src="assets/dashboard/dist/img/16.png"> : R.Antonius<br>
                                    <img src="assets/dashboard/dist/img/17.png"> : R.Makan Besar<br>
                                    <img src="assets/dashboard/dist/img/18.png"> : R.Pertemuan Paulus & Doa Getsemani<br>
                                    <br>
                                  </td>
                                  <td height="100"><br>
                                    <img src="assets/dashboard/dist/img/20.png"> : R.Yohanes<br>
                                    <img src="assets/dashboard/dist/img/21.png"> : R.Yoseph<br>
                                    <img src="assets/dashboard/dist/img/22.png"> : R.Sidang Kecil<br>
                                    <br>
                                  </td>
                                  <td height="100"><br>
                                    <img src="assets/dashboard/dist/img/14.png"> : R.Fransiskus<br>
                                    <img src="assets/dashboard/dist/img/15.png"> : R.Doa Kecil & Ruang Martha<br>
                                    <img src="assets/dashboard/dist/img/19.png"> : R.Kapel Besar Maria<br>
                                    <br>
                                  </td>

                                  <td height="100" align="right"><img src="assets/dashboard/dist/img/arah.png"></td>
                                  </td>
                                </tr>
                            </table>
                        </td>
                      </tr>
                    </table>

                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                  <!-- Date range -->
                     <!-- <div class="form-group">
                       <label>Date range:</label>

                       <div class="input-group">
                         <div class="input-group-addon">
                           <i class="fa fa-calendar"></i>
                         </div>
                         <input type="text" class="form-control pull-right" id="reservationlt2">
                       </div>
                     </div> -->
                     <!-- /.form group -->
                  <table width="900" border="1" bordercolor="#000000" class="table table-bordered">
                      <tr>
                        <td height="400">
                          <table width="100%" border="0" bordercolordark="#000000">
                            <tr>
                                <td height="30" colspan="4" align="center"> <p align="right"><b> </b></p></td>
                              </tr>
                          </table>
                          <table width="300" border="1" bordercolordark="#000000" align="left">
                                <tr>
                                  <?php if(count($ruang_e) > 0 ){ ?>
                                      <td height="50" colspan="4" align="center" background="assets/dashboard/dist/img/sale-iconruang5.png"><button type="button" class="btn bg-maroon margin" data-toggle="modal" data-target=".bs-example-modal-lg-E"> R.Elisabeth </button></td>
                                  <?php }else { ?>
                                      <td height="50" colspan="4" align="center" bgcolor="#d81b60"><button type="button" class="btn bg-maroon margin" data-toggle="modal" data-target=".bs-example-modal-lg-E"> R.Elisabeth </button></td>
                                  <?php } ?>
                                </tr>
                                <tr>
                                  <td height="50" colspan="4"></td>
                                </tr>
                                <tr>
                                  <?php if(count($ruang_b) > 0 ){ ?>
                                      <td height="50" colspan="4" align="center" background="assets/dashboard/dist/img/sale-iconruang7.png"><button type="button" class="btn bg-olive margin" data-toggle="modal" data-target=".bs-example-modal-lg-B"> R.Borromeus</button></td>
                                  <?php }else { ?>
                                      <td height="50" colspan="4" align="center" bgcolor="#3d9970"><button type="button" class="btn bg-olive margin" data-toggle="modal" data-target=".bs-example-modal-lg-B"> R.Borromeus</button></td>
                                  <?php } ?>
                                </tr>
                            </table>
                            <table width="300" border="1" bordercolordark="#000000" align="right">
                                <tr>
                                  <?php if(count($ruang_s) > 0 ){ ?>
                                      <td height="50" colspan="4" align="center" background="assets/dashboard/dist/img/sale-iconruang6.png"><button type="button" class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal-lg-S"> R.Sesilia</button></td>
                                  <?php }else { ?>
                                      <td height="50" colspan="4" align="center" bgcolor="#00c0ef"><button type="button" class="btn btn-info" data-toggle="modal" data-target=".bs-example-modal-lg-S"> R.Sesilia</button></td>
                                  <?php } ?>
                                </tr>
                                <tr>
                                  <td height="50" colspan="4"></td>
                                </tr>
                                <tr>
                                  <?php if(count($ruang_c) > 0 ){ ?>
                                      <td height="50" colspan="4" align="center" background="assets/dashboard/dist/img/sale-iconruang8.png"><button type="button" class="btn btn-warning" data-toggle="modal" data-target=".bs-example-modal-lg-C"> R.Carolus </button></td>
                                  <?php }else { ?>
                                      <td height="50" colspan="4" align="center" bgcolor="#f39c12"><button type="button" class="btn btn-warning" data-toggle="modal" data-target=".bs-example-modal-lg-C"> R.Carolus </button></td>
                                  <?php } ?>
                                </tr>
                            </table>
                            <table width="100%" border="0" bordercolordark="#000000">
                              <tr><br>
                                <td height="100"><br>
                                  <img src="assets/dashboard/dist/img/23.png"> : Ruang Elisabeth<br>
                                </td>
                                <td height="100"><br>
                                  <img src="assets/dashboard/dist/img/24.png"> : Ruang Borromeus<br>
                                </td>
                                <td height="100"><br>
                                  <img src="assets/dashboard/dist/img/25.png"> : Ruang Sesilia<br>
                                </td>
                                <td height="100"><br>
                                  <img src="assets/dashboard/dist/img/26.png"> : Ruang Calous<br>
                                </td>
                                  <td height="100" colspan="4" align="right"><img src="assets/dashboard/dist/img/arah.png"></td>
                                </tr>
                            </table>
                        </td>
                      </tr>
                    </table>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div>
          </div>
        </div>
        <!-- Left col -->
      </div>
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-footer">
            <h4><b><p align="center">Ruang Dominikus</p></b></h4>
        </div>
        <div class="modal-footer">
          <div class="col-lg-12" style="background:#ffffff;">
                <!-- <div class="col-lg-2" style="background:url(assets/dashboard/dist/img/cba.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;"><p align="center"><button type="button" style="margin-top:25px; margin-left:0px;" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" title="Kamar 1"  data-content="Tamu : 2 Orang. Gender : Wanita "> Kamar 1 </button></p></div> -->
                  <?php foreach ($kamar_dominikus as $kd)
                  {
                      $nama ="";
                      $ab =0;
                      foreach ($transaksi_d as $td)
                      {
                          if($td->id_ruang == $kd->id_ruang)
                          {
                              if($td->id_kamar == $kd->id_kamar)
                              {
                                $aa = $td->id_kamar;
                                $ab = $aa;
                                $ad = $td->nama_tamu;
                                $ads = $td->jenis_kelamin;
                                $nama .=  "- Nama : $ad | JK: $ads <br>";

                              }
                          }
                       }

                       if($ab == $kd->id_kamar)
                       {
                         $data  = "$kd->nama_kamar / $td->instansi"
                     ?>
                      <div class="col-lg-2" style="background-image:url(assets/dashboard/dist/img/sale-icon6.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                        <?php }else{?>
                      <div class="col-lg-2" style="background:#f4f4f4; margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                        <?php } ?>
                        <p align="center">
                          <button type="button" style="margin-top:25px;" class="btn btn-default" data-container="body" data-toggle="popover" data-trigger="focus" data-html="true" data-placement="top" title="<?php echo  ($nama != "" ?  $data : "Kosong") ?>"  data-content="<?php echo $nama; ?>"> <?php echo $kd->nama_kamar ?>  </button>
                        </p>
                     </div>
                <?php
                  }
                ?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

  <div class="modal fade bs-example-modal-lg-F" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-footer">
            <h4><b><p align="center">Ruang Fransiskus</p></b></h4>
        </div>
        <div class="modal-footer">
          <div class="col-lg-12" style="background:#ffffff;">
                <!-- <div class="col-lg-2" style="background:url(assets/dashboard/dist/img/cba.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;"><p align="center"><button type="button" style="margin-top:25px; margin-left:0px;" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" title="Kamar 1"  data-content="Tamu : 2 Orang. Gender : Wanita "> Kamar 1 </button></p></div> -->
                <?php foreach ($kamar_fransiskus as $kf)
                {
                    $nama ="";
                    $ab =0;
                    foreach ($transaksi_d as $td)
                    {
                        if($td->id_ruang == $kf->id_ruang)
                        {
                            if($td->id_kamar == $kf->id_kamar)
                            {
                              $aa = $td->id_kamar;
                              $ab = $aa;
                              $ad = $td->nama_tamu;
                              $ads = $td->jenis_kelamin;
                              $nama .=  "- Nama : $ad | JK: $ads <br>";
                            }
                        }
                     }

                     if($ab == $kf->id_kamar)
                     {
                       $data  = "$kf->nama_kamar / $td->instansi"
                   ?>
                    <div class="col-lg-2" style="background-image:url(assets/dashboard/dist/img/sale-icon6.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                      <?php }else{?>
                    <div class="col-lg-2" style="background:#f4f4f4; margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                      <?php } ?>
                      <p align="center">
                        <button type="button" style="margin-top:25px;" class="btn btn-default" data-container="body" data-toggle="popover" data-trigger="focus" data-html="true" data-placement="top" title="<?php echo  ($nama != "" ?  $data : "Kosong") ?>"  data-content="<?php echo $nama; ?>"> <?php echo $kf->nama_kamar ?> </button>
                      </p>
                   </div>
              <?php
                }
              ?>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade bs-example-modal-lg-A" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-footer">
            <h4><b><p align="center">Ruang Antonius</p></b></h4>
        </div>
        <div class="modal-footer">
          <div class="col-lg-12" style="background:#ffffff;">
                <!-- <div class="col-lg-2" style="background:url(assets/dashboard/dist/img/cba.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;"><p align="center"><button type="button" style="margin-top:25px; margin-left:0px;" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" title="Kamar 1"  data-content="Tamu : 2 Orang. Gender : Wanita "> Kamar 1 </button></p></div> --->
                <?php foreach ($kamar_antonius as $ka)
                {
                    $nama ="";
                    $ab =0;
                    foreach ($transaksi_d as $td)
                    {
                        if($td->id_ruang == $ka->id_ruang)
                        {
                            if($td->id_kamar == $ka->id_kamar)
                            {
                              $aa = $td->id_kamar;
                              $ab = $aa;
                              $ad = $td->nama_tamu;
                              $ads = $td->jenis_kelamin;
                              $nama .=  "- Nama : $ad | JK: $ads <br>";
                            }
                        }
                     }

                     if($ab == $ka->id_kamar)
                     {
                       $data  = "$ka->nama_kamar / $td->instansi"
                   ?>
                    <div class="col-lg-2" style="background-image:url(assets/dashboard/dist/img/sale-icon6.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                      <?php }else{?>
                    <div class="col-lg-2" style="background:#f4f4f4; margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                      <?php } ?>
                      <p align="center">
                        <button type="button" style="margin-top:25px;" class="btn btn-default" data-container="body" data-toggle="popover" data-trigger="focus" data-html="true" data-placement="top" title="<?php echo  ($nama != "" ?  $data : "Kosong") ?>"  data-content="<?php echo $nama; ?>"> <?php echo $ka->nama_kamar ?> </button>
                      </p>
                   </div>
              <?php
                }
              ?>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<div class="modal fade bs-example-modal-lg-Y" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-footer">
          <h4><b><p align="center">Ruang Yohanes</p></b></h4>
      </div>
      <div class="modal-footer">
        <div class="col-lg-12" style="background:#ffffff;">
              <!-- <div class="col-lg-2" style="background:url(assets/dashboard/dist/img/cba.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;"><p align="center"><button type="button" style="margin-top:25px; margin-left:0px;" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" title="Kamar 1"  data-content="Tamu : 2 Orang. Gender : Wanita "> Kamar 1 </button></p></div> -->
              <?php foreach ($kamar_yohanes as $kyoh)
              {
                  $nama ="";
                  $ab =0;
                  foreach ($transaksi_d as $td)
                  {
                      if($td->id_ruang == $kyoh->id_ruang)
                      {
                          if($td->id_kamar == $kyoh->id_kamar)
                          {
                            $aa = $td->id_kamar;
                            $ab = $aa;
                            $ad = $td->nama_tamu;
                            $ads = $td->jenis_kelamin;
                            $nama .=  "- Nama : $ad | JK: $ads <br>";
                          }
                      }
                   }

                   if($ab == $kyoh->id_kamar)
                   {
                     $data  = "$kyoh->nama_kamar / $td->instansi"
                 ?>
                  <div class="col-lg-2" style="background-image:url(assets/dashboard/dist/img/sale-icon6.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                    <?php }else{?>
                  <div class="col-lg-2" style="background:#f4f4f4; margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                    <?php } ?>
                    <p align="center">
                      <button type="button" style="margin-top:25px;" class="btn btn-default" data-container="body" data-toggle="popover" data-trigger="focus" data-html="true" data-placement="top" title="<?php echo  ($nama != "" ?  $data : "Kosong") ?>"  data-content="<?php echo $nama; ?>"> <?php echo $kyoh->nama_kamar ?> </button>
                    </p>
                 </div>
            <?php
              }
            ?>
        </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bs-example-modal-lg-H" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-footer">
          <h4><b><p align="center">Ruang Yoseph</p></b></h4>
      </div>
      <div class="modal-footer">
        <div class="col-lg-12" style="background:#ffffff;">
              <!-- <div class="col-lg-2" style="background:url(assets/dashboard/dist/img/cba.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;"><p align="center"><button type="button" style="margin-top:25px; margin-left:0px;" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" title="Kamar 1"  data-content="Tamu : 2 Orang. Gender : Wanita "> Kamar 1 </button></p></div> -->
              <?php foreach ($kamar_yoseph as $ky)
              {
                  $nama ="";
                  $ab =0;
                  foreach ($transaksi_d as $td)
                  {
                      if($td->id_ruang == $ky->id_ruang)
                      {
                          if($td->id_kamar == $ky->id_kamar)
                          {
                            $aa = $td->id_kamar;
                            $ab = $aa;
                            $ad = $td->nama_tamu;
                            $ads = $td->jenis_kelamin;
                            $nama .=  "- Nama : $ad | JK: $ads <br>";
                          }
                      }
                   }

                   if($ab == $ky->id_kamar)
                   {
                     $data  = "$ky->nama_kamar / $td->instansi"
                 ?>
                  <div class="col-lg-2" style="background-image:url(assets/dashboard/dist/img/sale-icon6.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                    <?php }else{?>
                  <div class="col-lg-2" style="background:#f4f4f4; margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                    <?php } ?>
                    <p align="center">
                      <button type="button" style="margin-top:25px;" class="btn btn-default" data-container="body" data-toggle="popover" data-trigger="focus" data-html="true" data-placement="top" title="<?php echo  ($nama != "" ?  $data : "Kosong") ?>"  data-content="<?php echo $nama; ?>"> <?php echo $ky->nama_kamar ?> </button>
                    </p>
                 </div>
            <?php
              }
            ?>
        </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bs-example-modal-lg-E" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-footer">
          <h4><b><p align="center">Ruang Elisabeth</p></b></h4>
      </div>
      <div class="modal-footer">
        <div class="col-lg-12" style="background:#ffffff;">
              <!-- <div class="col-lg-2" style="background:url(assets/dashboard/dist/img/cba.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;"><p align="center"><button type="button" style="margin-top:25px; margin-left:0px;" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" title="Kamar 1"  data-content="Tamu : 2 Orang. Gender : Wanita "> Kamar 1 </button></p></div> -->
              <?php foreach ($kamar_elisabeth as $ke)
              {
                  $nama ="";
                  $ab =0;
                  foreach ($transaksi_d as $td)
                  {
                      if($td->id_ruang == $ke->id_ruang)
                      {
                          if($td->id_kamar == $ke->id_kamar)
                          {
                            $aa = $td->id_kamar;
                            $ab = $aa;
                            $ad = $td->nama_tamu;
                            $ads = $td->jenis_kelamin;
                            $nama .=  "- Nama : $ad | JK: $ads <br>";
                          }
                      }
                   }

                   if($ab == $ke->id_kamar)
                   {
                     $data  = "$ke->nama_kamar / $td->instansi"
                 ?>
                  <div class="col-lg-2" style="background-image:url(assets/dashboard/dist/img/sale-icon6.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                    <?php }else{?>
                  <div class="col-lg-2" style="background:#f4f4f4; margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                    <?php } ?>
                    <p align="center">
                      <button type="button" style="margin-top:25px;" class="btn btn-default" data-container="body" data-toggle="popover" data-trigger="focus" data-html="true" data-placement="top" title="<?php echo  ($nama != "" ?  $data : "Kosong") ?>"  data-content="<?php echo $nama; ?>"> <?php echo $ke->nama_kamar ?> </button>
                    </p>
                 </div>
            <?php
              }
            ?>
        </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bs-example-modal-lg-B" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-footer">
          <h4><b><p align="center">Ruang Borromeus</p></b></h4>
      </div>
      <div class="modal-footer">
        <div class="col-lg-12" style="background:#ffffff;">
              <!-- <div class="col-lg-2" style="background:url(assets/dashboard/dist/img/cba.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;"><p align="center"><button type="button" style="margin-top:25px; margin-left:0px;" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" title="Kamar 1"  data-content="Tamu : 2 Orang. Gender : Wanita "> Kamar 1 </button></p></div> -->
              <?php foreach ($kamar_borromeus as $kb)
              {
                  $nama ="";
                  $ab =0;
                  foreach ($transaksi_d as $td)
                  {
                      if($td->id_ruang == $kb->id_ruang)
                      {
                          if($td->id_kamar == $kb->id_kamar)
                          {
                            $aa = $td->id_kamar;
                            $ab = $aa;
                            $ad = $td->nama_tamu;
                            $ads = $td->jenis_kelamin;
                            $nama .=  "- Nama : $ad | JK: $ads <br>";
                          }
                      }
                   }

                   if($ab == $kb->id_kamar)
                   {
                     $data  = "$kb->nama_kamar / $td->instansi"
                 ?>
                  <div class="col-lg-2" style="background-image:url(assets/dashboard/dist/img/sale-icon6.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                    <?php }else{?>
                  <div class="col-lg-2" style="background:#f4f4f4; margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                    <?php } ?>
                    <p align="center">
                      <button type="button" style="margin-top:25px;" class="btn btn-default" data-container="body" data-toggle="popover" data-trigger="focus" data-html="true" data-placement="top" title="<?php echo  ($nama != "" ?  $data : "Kosong") ?>"  data-content="<?php echo $nama; ?>"> <?php echo $kb->nama_kamar ?> </button>
                    </p>
                 </div>
            <?php
              }
            ?>
        </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bs-example-modal-lg-S" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-footer">
          <h4><b><p align="center">Ruang Sesilia</p></b></h4>
      </div>
      <div class="modal-footer">
        <div class="col-lg-12" style="background:#ffffff;">
              <!-- <div class="col-lg-2" style="background:url(assets/dashboard/dist/img/cba.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;"><p align="center"><button type="button" style="margin-top:25px; margin-left:0px;" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" title="Kamar 1"  data-content="Tamu : 2 Orang. Gender : Wanita "> Kamar 1 </button></p></div> -->
              <?php foreach ($kamar_sesilia as $ks)
              {
                  $nama ="";
                  $ab =0;
                  foreach ($transaksi_d as $td)
                  {
                      if($td->id_ruang == $ks->id_ruang)
                      {
                          if($td->id_kamar == $ks->id_kamar)
                          {
                            $aa = $td->id_kamar;
                            $ab = $aa;
                            $ad = $td->nama_tamu;
                            $ads = $td->jenis_kelamin;
                            $nama .=  "- Nama : $ad | JK: $ads <br>";
                          }
                      }
                   }

                   if($ab == $ks->id_kamar)
                   {
                     $data  = "$ks->nama_kamar / $td->instansi"
                 ?>
                  <div class="col-lg-2" style="background-image:url(assets/dashboard/dist/img/sale-icon6.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                    <?php }else{?>
                  <div class="col-lg-2" style="background:#f4f4f4; margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                    <?php } ?>
                    <p align="center">
                      <button type="button" style="margin-top:25px;" class="btn btn-default" data-container="body" data-toggle="popover" data-trigger="focus" data-html="true" data-placement="top" title="<?php echo  ($nama != "" ?  $data : "Kosong") ?>"  data-content="<?php echo $nama; ?>"> <?php echo $ks->nama_kamar ?> </button>
                    </p>
                 </div>
            <?php
              }
            ?>
        </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bs-example-modal-lg-C" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-footer">
          <h4><b><p align="center">Ruang Carolus</p></b></h4>
      </div>
      <div class="modal-footer">
        <div class="col-lg-12" style="background:#ffffff;">
              <!-- <div class="col-lg-2" style="background:url(assets/dashboard/dist/img/cba.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;"><p align="center"><button type="button" style="margin-top:25px; margin-left:0px;" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" title="Kamar 1"  data-content="Tamu : 2 Orang. Gender : Wanita "> Kamar 1 </button></p></div> -->
              <?php foreach ($kamar_carolus as $kc)
              {
                  $nama ="";
                  $ab =0;
                  foreach ($transaksi_d as $td)
                  {
                      if($td->id_ruang == $kc->id_ruang)
                      {
                          if($td->id_kamar == $kc->id_kamar)
                          {
                            $aa = $td->id_kamar;
                            $ab = $aa;
                            $ad = $td->nama_tamu;
                            $ads = $td->jenis_kelamin;
                            $nama .=  "- Nama : $ad | JK: $ads <br>";
                          }
                      }
                   }

                   if($ab == $kc->id_kamar)
                   {
                      $data  = "$kc->nama_kamar / $td->instansi"
                 ?>
                  <div class="col-lg-2" style="background-image:url(assets/dashboard/dist/img/sale-icon6.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                    <?php }else{?>
                  <div class="col-lg-2" style="background:#f4f4f4; margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                    <?php } ?>
                    <p align="center">
                      <button type="button" style="margin-top:25px;" class="btn btn-default" data-container="body" data-toggle="popover" data-trigger="focus" data-html="true" data-placement="top" title="<?php echo  ($nama != "" ?  $data : "Kosong") ?>"  data-content="<?php echo $nama; ?>"> <?php echo $kc->nama_kamar ?> </button>
                    </p>
                 </div>
            <?php
              }
            ?>
        </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php include "Footer.php"; ?>
