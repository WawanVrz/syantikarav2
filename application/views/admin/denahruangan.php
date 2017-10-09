<?php include "Header.php"; ?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-lg-12 col-xs-12">
         <div class="box box-info">
           <!-- <div class="box-header">
             <i class="fa fa-home"></i>
             <h3 class="box-title"><b> Denah Rpcb Syantikara </b></h3>
             <div class="pull-right box-tools">
             </div>
           </div> -->
            <div class="box-body" >
            <form role="form" action="<?php echo base_url(). 'denahruangan/denah'; ?>" method="get" enctype="multipart/form-data">
              <div class="box-body col-lg-4">
                <div class="form-group">
                  <label>Check In</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="tgl_checkin" class="form-control pull-right field-check-form1 tgl_checkin" id="datepicker1" placeholder="<?php echo $tglcheckin; ?>" >
                  </div>
                </div>
              </div>
              <div class="box-body col-lg-4">
                <div class="form-group">
                  <label>Check Out</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="tgl_checkout" class="form-control pull-right field-check-form1 tgl_checkout" id="datepicker2" placeholder="<?php echo $tglcheckout; ?>">
                  </div>
                </div>
              </div>
              <div class="box-body col-lg-4">
                <div class="form-group">
                    <input type="submit" name="submit" value="Tampilkan" class="btn btn-success btn-flat" style="margin-top:24px;"> &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url('dashboard/admin/denah/ruangan'); ?>"><button class="btn btn-success btn-flat" style="margin-top:24px;"><i class="glyphicon glyphicon-refresh"></i>&nbsp; Refresh</button></a>
                </div>
              </div>
              </form>
              <div class="col-lg-12">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Denah Lantai 1</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Denah Lantai 2</a></li>
                  <li><a href="#tab_3" data-toggle="tab">Denah Ruang Pertemuan</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <div class="col-lg-12" style='margin-left:-35px; margin-bottom:15px;'>
                      <?php
                      foreach($allruangd1 as $ar)
                      {
                        $bg = "";
                        $bgbtn = "";
                        // if($ar->id == 1)
                        // {
                        //   $bg = "#00a65a;";
                        //   $bgbtn = "#00a65a;";
                        // }
                        // if($ar->id == 2)
                        // {
                        //   $bg = "#00a65a;";
                        //   $bgbtn = "#00a65a;";
                        // }
                        // if($ar->id == 3)
                        // {
                        //   $bg = "#00a65a;";
                        //   $bgbtn = "#00a65a;";
                        // }
                        // if($ar->id == 4)
                        // {
                        //   $bg = "#00a65a;";
                        //   $bgbtn = "#00a65a;";
                        // }
                        // if($ar->id == 5)
                        // {
                        //   $bg = "#00a65a;";
                        //   $bgbtn = "#00a65a;";
                        // }
                        // if($ar->id == 6)
                        // {
                        //   $bg = "#00a65a;";
                        //   $bgbtn = "#00a65a;";
                        // }
                        // if($ar->id == 10)
                        // {
                        //   $bg = "#00a65a;";
                        //   $bgbtn = "#00a65a;";
                        // }
                        // if($ar->id == 11)
                        // {
                        //   $bg = "#00a65a;";
                        //   $bgbtn = "#00a65a;";
                        // }
                        // if($ar->id == 13)
                        // {
                        //   $bg = "#00a65a;";
                        //   $bgbtn = "#00a65a;";
                        // }
                        // if($ar->id == 14)
                        // {
                        //   $bg = "#00a65a;";
                        //   $bgbtn = "#00a65a;";
                        // }
                        // if($ar->id == 15)
                        // {
                        //   $bg = "#00a65a;";
                        //   $bgbtn = "#00a65a;";
                        // }
                        // if($ar->id == 16)
                        // {
                        //   $bg = "#00a65a;";
                        //   $bgbtn = "#00a65a;";
                        // }

                        $bg = "#00a65a;";
                        $bgbtn = "#00a65a;";
                        if(count($ruangdenah) > 0)
                        {
                            foreach($ruangdenah as $rd)
                            {
                               if($rd->id_ruang == $ar->id)
                               {
                                 $bg = "red";
                                 $bgbtn = "red";
                               }
                            }

                            foreach($ruangdenahpertemuan as $rdp)
                            {
                               if($rdp->id == $ar->id)
                               {
                                 $bg = "red";
                                 $bgbtn = "red";
                               }
                            }
                          ?>
                          <div class='col-lg-2' style='background:<?php echo $bg; ?>; color:#fff; margin-right:1px; height:80px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;' align="center">
                              <button type='button' id='id_kamar' style='background-color:<?php echo $bgbtn; ?>; margin-top:20px; text-align:center;' class='btn btn-sm btn-flat' data-toggle="modal" data-target=".bs-example-modal-<?php echo $ar->id ?>"><b><?php echo $ar->nama_ruang ?></b></button>
                          </div>
                      <?php
                      }else {
                      ?>
                        <div class='col-lg-2' style='background:<?php echo $bg; ?>; color:#fff; margin-right:1px; height:80px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;'>
                            <button type='button' id='id_kamar' style='background-color:<?php echo $bgbtn; ?>; margin-top:20px;' class='btn btn-sm btn-flat' data-toggle="modal" data-target=".bs-example-modal-<?php echo $ar->id ?>"><b><?php echo $ar->nama_ruang ?></b></button>
                        </div>
                      <?php
                          }
                       }
                      ?>
                      <div class='col-lg-2' style='background:#00a65a; margin-right:1px; color:#fff; height:80px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;'>
                          <p style="text-align:center; padding-top:25px; margin-left:-25px; font-size:12px;"><b>Ruang Kapel Besar</b></p>
                      </div>
                      <div class='col-lg-2' style='background:#00a65a; margin-right:1px; color:#fff; height:80px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;'>
                          <p style="text-align:center; padding-top:25px; margin-left:-25px; font-size:12px;"><b>Ruang Martha</b></p>
                      </div>
                      <div class='col-lg-2' style='background:#00a65a; margin-right:1px; color:#fff; height:80px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;'>
                          <p style="text-align:center; padding-top:25px; margin-left:-25px; font-size:12px;"><b>Gua Maria</b></p>
                      </div>
                    </div>

                    <table border="0" width="50%" style="margin-left:5px;">
                      <tr>
                        <td>
                          <img src='assets/dashboard/dist/img/08.png'> : Available <br>
                        </td>
                        <td>
                          <img src='assets/dashboard/dist/img/15.png'> : Not Available <br>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                    <div class="col-lg-12" style='margin-left:-35px; margin-bottom:10px;'>
                      <?php
                      foreach($allruangd2 as $ar2)
                      {
                        $bg = "";
                        $bgbtn = "";
                        // if($ar2->id == 12)
                        // {
                        //   $bg = "#00a65a;";
                        //   $bgbtn = "#00a65a;";
                        // }
                        // if($ar2->id == 7)
                        // {
                        //   $bg = "#00a65a;";
                        //   $bgbtn = "#00a65a;";
                        // }
                        // if($ar2->id == 8)
                        // {
                        //   $bg = "#00a65a;";
                        //   $bgbtn = "#00a65a;";
                        // }
                        // if($ar2->id == 9)
                        // {
                        //   $bg = "#00a65a;";
                        //   $bgbtn = "#00a65a;";
                        // }
                        // if($ar2->id == 17)
                        // {
                        //   $bg = "#00a65a;";
                        //   $bgbtn = "#00a65a;";
                        // }
                        $bg = "#00a65a;";
                        $bgbtn = "#00a65a;";
                        if(count($ruangdenah) > 0)
                        {
                            foreach($ruangdenah as $rd)
                            {
                               if($rd->id_ruang == $ar2->id)
                               {
                                 $bg = "red";
                                 $bgbtn = "red";
                               }
                            }

                            foreach($ruangdenahpertemuan as $rdp)
                            {
                               if($rdp->id == $ar2->id)
                               {
                                 $bg = "red";
                                 $bgbtn = "red";
                               }
                            }
                          ?>
                          <div class='col-lg-2' style='background:<?php echo $bg; ?>; color:#fff; margin-right:1px; height:80px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;' align="center">
                              <button type='button' id='id_kamar' style='background-color:<?php echo $bgbtn; ?>; margin-top:25px;' class='btn btn-sm btn-flat' data-toggle="modal" data-target=".bs-example-modal-<?php echo $ar2->id ?>"><b><?php echo $ar2->nama_ruang ?></b></button>
                          </div>
                      <?php
                        }else {
                      ?>
                          <div class='col-lg-2' style='background:<?php echo $bg; ?>; color:#fff; margin-right:1px; height:80px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;' align="center">
                              <button type='button' id='id_kamar' style='background-color:<?php echo $bgbtn; ?>; margin-top:25px;' class='btn btn-sm' data-toggle="modal" data-target=".bs-example-modal-<?php echo $ar2->id ?>"><b><?php echo $ar2->nama_ruang ?></b></button>
                          </div>
                      <?php
                          }
                       }
                      ?>
                    </div>
                    <table border="0" width="50%" style="margin-left:5px;">
                      <tr>
                        <td>
                          <img src='assets/dashboard/dist/img/08.png'> : Available <br>
                        </td>
                        <td>
                          <img src='assets/dashboard/dist/img/15.png'> : Not Available <br>
                        </td>
                      </tr>
                    </table>
                  </div>

                  <div class="tab-pane" id="tab_3">
                    <div class="col-lg-12" style='margin-left:-35px; margin-bottom:10px;'>
                      <?php
                      foreach($allruangd3 as $ar3)
                      {
                        $bg = "";
                        $bgbtn = "";
                        // if($ar3->id == 17)
                        // {
                        //   $bg = "#00a65a;";
                        //   $bgbtn = "#00a65a;";
                        // }
                        // if($ar3->id == 18)
                        // {
                        //   $bg = "#00a65a;";
                        //   $bgbtn = "#00a65a;";
                        // }
                        // if($ar3->id == 19)
                        // {
                        //   $bg = "#00a65a;";
                        //   $bgbtn = "#00a65a;";
                        // }
                        // if($ar3->id == 20)
                        // {
                        //   $bg = "#00a65a;";
                        //   $bgbtn = "#00a65a;";
                        // }
                        $bg = "#00a65a;";
                        $bgbtn = "#00a65a;";
                        if(count($ruangdenah) > 0)
                        {

                            foreach($ruangdenahpertemuanyayasan as $rdpy)
                            {
                               if($rdpy->ruangkantor_id == $ar3->id)
                               {
                                 $bg = "red";
                                 $bgbtn = "red";
                               }
                            }
                          ?>
                          <div class='col-lg-2' style='background:<?php echo $bg; ?>; color:#fff; margin-right:1px; height:80px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;' align="center">
                              <button type='button' id='id_kamar' style='background-color:<?php echo $bgbtn; ?>; margin-top:25px;' class='btn btn-sm btn-flat' data-toggle="modal" data-target=".bs-example-modal-<?php echo $ar3->id ?>"><b><?php echo $ar3->nama_ruang ?></b></button>
                          </div>
                      <?php
                        }else {
                      ?>
                          <div class='col-lg-2' style='background:<?php echo $bg; ?>; color:#fff; margin-right:1px; height:80px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;' align="center">
                              <button type='button' id='id_kamar' style='background-color:<?php echo $bgbtn; ?>; margin-top:25px;' class='btn btn-sm' data-toggle="modal" data-target=".bs-example-modal-<?php echo $ar3->id ?>"><b><?php echo $ar3->nama_ruang ?></b></button>
                          </div>
                      <?php
                          }
                       }
                      ?>
                    </div>
                    <table border="0" width="50%" style="margin-left:5px;">
                      <tr>
                        <td>
                          <img src='assets/dashboard/dist/img/08.png'> : Available <br>
                        </td>
                        <td>
                          <img src='assets/dashboard/dist/img/15.png'> : Not Available <br>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              </div>
          </div>
       </div>
     </div>
  </div>
</div>
</section>

<div class="modal fade bs-example-modal-5" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <?php
      $tanggalcekin ="";
      $tanggalcekout ="";
      $range = "";
 ?>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-footer">
        <?php foreach ($kamar_dominikus as $kd)
         {
           foreach ($transaksi_d as $td)
           {
             if($td->id_ruang == $kd->id_ruang)
             {
               $tanggalcekin = $td->tgl_checkin;
               $tanggalcekout = $td->tgl_checkout;
               $range = "Dipakai Dari : $tanggalcekin  s/d  $tanggalcekout";
             }
           }
         }
         ?>
           <h4><b><p align="center">Ruang Dominikus</p></b></h4>
           <h5><p align="center"> <?php echo  ($range != "" ?  $range : "Available") ?></p></h5>
      </div>
      <div class="modal-footer">
        <div class="col-lg-12" style="background:#ffffff;">
              <!-- <div class="col-lg-2" style="background:url(assets/dashboard/dist/img/cba.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;"><p align="center"><button type="button" style="margin-top:25px; margin-left:0px;" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" title="Kamar 1"  data-content="Tamu : 2 Orang. Gender : Wanita "> Kamar 1 </button></p></div> -->
                <?php foreach ($kamar_dominikus as $kd)
                {
                    $nama ="";
                    $ab =0;
                    $bgbtn = "";
                    foreach ($transaksi_d as $td)
                    {
                        if($td->id_ruang == $kd->id_ruang)
                        {
                            if($td->kamar == $kd->id_kamar)
                            {
                              $aa = $td->kamar;
                              $ab = $aa;
                              $ad = $td->nama_tamu;
                              $ads = $td->jenis_kelamin;
                              $nama .=  "- Nama : $ad | JK: $ads <br>";

                            }
                        }
                     }

                     if($ab == $kd->id_kamar)
                     {
                       $data  = "$kd->nama_kamar / $td->instansi";
                       $bgbtn = "red";
                   ?>
                    <div class="col-lg-2" style="background:red; margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                      <?php }else{ $bgbtn = "#00a65a";?>
                    <div class="col-lg-2" style="background:#00a65a; margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                      <?php } ?>
                      <p align="center">
                        <button type="button" style="margin-top:25px; background-color:<?php echo $bgbtn; ?>; border-color:<?php echo $bgbtn; ?>;" class="btn btn-default" data-container="body" data-toggle="popover" data-trigger="focus" data-html="true" data-placement="top" title="<?php echo  ($nama != "" ?  $data : "Kosong") ?>"  data-content="<?php echo $nama; ?>"> <?php echo $kd->nama_kamar ?>  </button>
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

<div class="modal fade bs-example-modal-6" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <?php
      $tanggalcekin ="";
      $tanggalcekout ="";
      $range = "";
   ?>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-footer">
        <?php foreach ($kamar_fransiskus as $kf)
        {
          foreach ($transaksi_d as $td)
          {
            if($td->id_ruang == $kf->id_ruang)
            {
              $tanggalcekin = $td->tgl_checkin;
              $tanggalcekout = $td->tgl_checkout;
              $range = "Dipakai Dari : $tanggalcekin  s/d  $tanggalcekout";
            }
          }
        }
        ?>
          <h4><b><p align="center">Ruang Fransiskus</p></b></h4>
          <h5><p align="center"> <?php echo  ($range != "" ?  $range : "Available") ?></p></h5>
      </div>
      <div class="modal-footer">
        <div class="col-lg-12" style="background:#ffffff;">
              <!-- <div class="col-lg-2" style="background:url(assets/dashboard/dist/img/cba.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;"><p align="center"><button type="button" style="margin-top:25px; margin-left:0px;" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" title="Kamar 1"  data-content="Tamu : 2 Orang. Gender : Wanita "> Kamar 1 </button></p></div> -->
              <?php foreach ($kamar_fransiskus as $kf)
              {
                  $nama ="";
                  $ab =0;
                  $bgbtn = "";
                  foreach ($transaksi_d as $td)
                  {
                      if($td->id_ruang == $kf->id_ruang)
                      {
                          if($td->kamar == $kf->id_kamar)
                          {
                            $aa = $td->kamar;
                            $ab = $aa;
                            $ad = $td->nama_tamu;
                            $ads = $td->jenis_kelamin;
                            $nama .=  "- Nama : $ad | JK: $ads <br>";
                          }
                      }
                   }

                   if($ab == $kf->id_kamar)
                   {
                     $data  = "$kf->nama_kamar / $td->instansi";
                     $bgbtn = "red";
                 ?>
                  <div class="col-lg-2" style="background:red; margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                    <?php }else{ $bgbtn = "#00a65a";?>
                  <div class="col-lg-2" style="background:#00a65a; margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                    <?php } ?>
                    <p align="center">
                      <button type="button" style="margin-top:25px; background-color:<?php echo $bgbtn; ?>; border-color:<?php echo $bgbtn; ?>;" class="btn btn-default" data-container="body" data-toggle="popover" data-trigger="focus" data-html="true" data-placement="top" title="<?php echo  ($nama != "" ?  $data : "Kosong") ?>"  data-content="<?php echo $nama; ?>"> <?php echo $kf->nama_kamar ?> </button>
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

<div class="modal fade bs-example-modal-4" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <?php
      $tanggalcekin ="";
      $tanggalcekout ="";
      $range = "";
 ?>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-footer">
        <?php foreach ($kamar_antonius as $ka)
         {
           foreach ($transaksi_d as $td)
           {
             if($td->id_ruang == $ka->id_ruang)
             {
               $tanggalcekin = $td->tgl_checkin;
               $tanggalcekout = $td->tgl_checkout;
               $range = "Dipakai Dari : $tanggalcekin  s/d  $tanggalcekout";
             }
           }
         }
         ?>
           <h4><b><p align="center">Ruang Antonius</p></b></h4>
           <h5><p align="center"> <?php echo  ($range != "" ?  $range : "Available") ?></p></h5>
      </div>
      <div class="modal-footer">
        <div class="col-lg-12" style="background:#ffffff;">
              <!-- <div class="col-lg-2" style="background:url(assets/dashboard/dist/img/cba.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;"><p align="center"><button type="button" style="margin-top:25px; margin-left:0px;" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" title="Kamar 1"  data-content="Tamu : 2 Orang. Gender : Wanita "> Kamar 1 </button></p></div> --->
              <?php foreach ($kamar_antonius as $ka)
              {
                  $nama ="";
                  $ab =0;
                  $bgbtn = "";
                  foreach ($transaksi_d as $td)
                  {
                      if($td->id_ruang == $ka->id_ruang)
                      {
                          if($td->kamar == $ka->id_kamar)
                          {
                            $aa = $td->kamar;
                            $ab = $aa;
                            $ad = $td->nama_tamu;
                            $ads = $td->jenis_kelamin;
                            $nama .=  "- Nama : $ad | JK: $ads <br>";
                          }
                      }
                   }

                   if($ab == $ka->id_kamar)
                   {
                     $data  = "$ka->nama_kamar / $td->instansi";
                     $bgbtn = "red";
                 ?>
                  <div class="col-lg-2" style="background:red; margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                    <?php }else{ $bgbtn = "#00a65a";?>
                  <div class="col-lg-2" style="background:#00a65a; margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                    <?php } ?>
                    <p align="center">
                      <button type="button" style="margin-top:25px; background-color:<?php echo $bgbtn; ?>; border-color:<?php echo $bgbtn; ?>;" class="btn btn-default" data-container="body" data-toggle="popover" data-trigger="focus" data-html="true" data-placement="top" title="<?php echo  ($nama != "" ?  $data : "Kosong") ?>"  data-content="<?php echo $nama; ?>"> <?php echo $ka->nama_kamar ?> </button>
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

<div class="modal fade bs-example-modal-11" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <?php
      $tanggalcekin ="";
      $tanggalcekout ="";
      $range = "";
 ?>
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-footer">
      <?php foreach ($kamar_yohanes as $kyoh)
       {
         foreach ($transaksi_d as $td)
         {
           if($td->id_ruang == $kyoh->id_ruang)
           {
             $tanggalcekin = $td->tgl_checkin;
             $tanggalcekout = $td->tgl_checkout;
             $range = "Dipakai Dari : $tanggalcekin  s/d  $tanggalcekout";
           }
         }
       }
       ?>
         <h4><b><p align="center">Ruang Yohanes</p></b></h4>
         <h5><p align="center"> <?php echo  ($range != "" ?  $range : "Available") ?></p></h5>
    </div>
    <div class="modal-footer">
      <div class="col-lg-12" style="background:#ffffff;">
            <!-- <div class="col-lg-2" style="background:url(assets/dashboard/dist/img/cba.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;"><p align="center"><button type="button" style="margin-top:25px; margin-left:0px;" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" title="Kamar 1"  data-content="Tamu : 2 Orang. Gender : Wanita "> Kamar 1 </button></p></div> -->
            <?php foreach ($kamar_yohanes as $kyoh)
            {
                $nama ="";
                $ab =0;
                $bgbtn = "";
                foreach ($transaksi_d as $td)
                {
                    if($td->id_ruang == $kyoh->id_ruang)
                    {
                        if($td->kamar == $kyoh->id_kamar)
                        {
                          $aa = $td->kamar;
                          $ab = $aa;
                          $ad = $td->nama_tamu;
                          $ads = $td->jenis_kelamin;
                          $nama .=  "- Nama : $ad | JK: $ads <br>";
                        }
                    }
                 }

                 if($ab == $kyoh->id_kamar)
                 {
                   $data  = "$kyoh->nama_kamar / $td->instansi";
                   $bgbtn = "red";
               ?>
                <div class="col-lg-2" style="background:red; margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                  <?php }else{ $bgbtn = "#00a65a";?>
                <div class="col-lg-2" style="background:#00a65a; margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                  <?php } ?>
                  <p align="center">
                    <button type="button" style="margin-top:25px; background-color:<?php echo $bgbtn; ?>; border-color:<?php echo $bgbtn; ?>;" class="btn btn-default" data-container="body" data-toggle="popover" data-trigger="focus" data-html="true" data-placement="top" title="<?php echo  ($nama != "" ?  $data : "Kosong") ?>"  data-content="<?php echo $nama; ?>"> <?php echo $kyoh->nama_kamar ?> </button>
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

<div class="modal fade bs-example-modal-10" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <?php
      $tanggalcekin ="";
      $tanggalcekout ="";
      $range = "";
 ?>
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-footer">
      <?php foreach ($kamar_yoseph as $ky)
      {
        foreach ($transaksi_d as $td)
        {
          if($td->id_ruang == $ky->id_ruang)
          {
            $tanggalcekin = $td->tgl_checkin;
            $tanggalcekout = $td->tgl_checkout;
            $range = "Dipakai Dari : $tanggalcekin  s/d  $tanggalcekout";
          }
        }
      }
      ?>
        <h4><b><p align="center">Ruang Yoseph</p></b></h4>
        <h5><p align="center"> <?php echo  ($range != "" ?  $range : "Available") ?></p></h5>
    </div>
    <div class="modal-footer">
      <div class="col-lg-12" style="background:#ffffff;">
            <!-- <div class="col-lg-2" style="background:url(assets/dashboard/dist/img/cba.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;"><p align="center"><button type="button" style="margin-top:25px; margin-left:0px;" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" title="Kamar 1"  data-content="Tamu : 2 Orang. Gender : Wanita "> Kamar 1 </button></p></div> -->
            <?php foreach ($kamar_yoseph as $ky)
            {
                $nama ="";
                $ab =0;
                $bgbtn = "";
                foreach ($transaksi_d as $td)
                {
                    if($td->id_ruang == $ky->id_ruang)
                    {
                        if($td->kamar == $ky->id_kamar)
                        {
                          $aa = $td->kamar;
                          $ab = $aa;
                          $ad = $td->nama_tamu;
                          $ads = $td->jenis_kelamin;
                          $nama .=  "- Nama : $ad | JK: $ads <br>";
                        }
                    }
                 }

                 if($ab == $ky->id_kamar)
                 {
                   $data  = "$ky->nama_kamar / $td->instansi";
                   $bgbtn = "red";
               ?>
                <div class="col-lg-2" style="background:red; margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                  <?php }else{ $bgbtn = "#00a65a";?>
                <div class="col-lg-2" style="background:#00a65a; margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                  <?php } ?>
                  <p align="center">
                    <button type="button" style="margin-top:25px; background-color:<?php echo $bgbtn; ?>; border-color:<?php echo $bgbtn; ?>;" class="btn btn-default" data-container="body" data-toggle="popover" data-trigger="focus" data-html="true" data-placement="top" title="<?php echo  ($nama != "" ?  $data : "Kosong") ?>"  data-content="<?php echo $nama; ?>"> <?php echo $ky->nama_kamar ?> </button>
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

<div class="modal fade bs-example-modal-12" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <?php
      $tanggalcekin ="";
      $tanggalcekout ="";
      $range = "";
 ?>
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-footer">
      <?php foreach ($kamar_elisabeth as $ke)
       {
         foreach ($transaksi_d as $td)
         {
           if($td->id_ruang == $ke->id_ruang)
           {
             $tanggalcekin = $td->tgl_checkin;
             $tanggalcekout = $td->tgl_checkout;
             $range = "Dipakai Dari : $tanggalcekin  s/d  $tanggalcekout";
           }
         }
       }
       ?>
         <h4><b><p align="center">Ruang Elisabeth</p></b></h4>
         <h5><p align="center"> <?php echo  ($range != "" ?  $range : "Available") ?></p></h5>
    </div>
    <div class="modal-footer">
      <div class="col-lg-12" style="background:#ffffff;">
            <!-- <div class="col-lg-2" style="background:url(assets/dashboard/dist/img/cba.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;"><p align="center"><button type="button" style="margin-top:25px; margin-left:0px;" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" title="Kamar 1"  data-content="Tamu : 2 Orang. Gender : Wanita "> Kamar 1 </button></p></div> -->
            <?php foreach ($kamar_elisabeth as $ke)
            {
                $nama ="";
                $ab =0;
                $bgbtn = "";
                foreach ($transaksi_d as $td)
                {
                    if($td->id_ruang == $ke->id_ruang)
                    {
                        if($td->kamar == $ke->id_kamar)
                        {
                          $aa = $td->kamar;
                          $ab = $aa;
                          $ad = $td->nama_tamu;
                          $ads = $td->jenis_kelamin;
                          $nama .=  "- Nama : $ad | JK: $ads <br>";
                        }
                    }
                 }

                 if($ab == $ke->id_kamar)
                 {
                   $data  = "$ke->nama_kamar / $td->instansi";
                   $bgbtn = "red";
               ?>
                <div class="col-lg-2" style="background:red; margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                  <?php }else{ $bgbtn = "#00a65a";?>
                <div class="col-lg-2" style="background:#00a65a; margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                  <?php } ?>
                  <p align="center">
                    <button type="button" style="margin-top:25px; background-color:<?php echo $bgbtn; ?>; border-color:<?php echo $bgbtn; ?>;" class="btn btn-default" data-container="body" data-toggle="popover" data-trigger="focus" data-html="true" data-placement="top" title="<?php echo  ($nama != "" ?  $data : "Kosong") ?>"  data-content="<?php echo $nama; ?>"> <?php echo $ke->nama_kamar ?> </button>
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

<div class="modal fade bs-example-modal-8" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <?php
      $tanggalcekin ="";
      $tanggalcekout ="";
      $range = "";
 ?>
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-footer">
      <?php foreach ($kamar_borromeus as $kb)
      {
        foreach ($transaksi_d as $td)
        {
          if($td->id_ruang == $kb->id_ruang)
          {
            $tanggalcekin = $td->tgl_checkin;
            $tanggalcekout = $td->tgl_checkout;
            $range = "Dipakai Dari : $tanggalcekin  s/d  $tanggalcekout";
          }
        }
      }
      ?>
        <h4><b><p align="center">Ruang Borromeus</p></b></h4>
        <h5><p align="center"> <?php echo  ($range != "" ?  $range : "Available") ?></p></h5>
    </div>
    <div class="modal-footer">
      <div class="col-lg-12" style="background:#ffffff;">
            <!-- <div class="col-lg-2" style="background:url(assets/dashboard/dist/img/cba.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;"><p align="center"><button type="button" style="margin-top:25px; margin-left:0px;" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" title="Kamar 1"  data-content="Tamu : 2 Orang. Gender : Wanita "> Kamar 1 </button></p></div> -->
            <?php foreach ($kamar_borromeus as $kb)
            {
                $nama ="";
                $ab =0;
                $bgbtn = "";
                foreach ($transaksi_d as $td)
                {
                    if($td->id_ruang == $kb->id_ruang)
                    {
                        if($td->kamar == $kb->id_kamar)
                        {
                          $aa = $td->kamar;
                          $ab = $aa;
                          $ad = $td->nama_tamu;
                          $ads = $td->jenis_kelamin;
                          $nama .=  "- Nama : $ad | JK: $ads <br>";
                        }
                    }
                 }

                 if($ab == $kb->id_kamar)
                 {
                   $data  = "$kb->nama_kamar / $td->instansi";
                   $bgbtn = "red";
               ?>
                <div class="col-lg-2" style="background:red; margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                  <?php }else{ $bgbtn = "#00a65a";?>
                <div class="col-lg-2" style="background:#00a65a; margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                  <?php } ?>
                  <p align="center">
                    <button type="button" style="margin-top:25px; background-color:<?php echo $bgbtn; ?>; border-color:<?php echo $bgbtn; ?>;" class="btn btn-default" data-container="body" data-toggle="popover" data-trigger="focus" data-html="true" data-placement="top" title="<?php echo  ($nama != "" ?  $data : "Kosong") ?>"  data-content="<?php echo $nama; ?>"> <?php echo $kb->nama_kamar ?> </button>
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


<div class="modal fade bs-example-modal-7" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <?php
      $tanggalcekin ="";
      $tanggalcekout ="";
      $range = "";
 ?>
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-footer">
      <?php foreach ($kamar_sesilia as $ks)
      {
        foreach ($transaksi_d as $td)
        {
          if($td->id_ruang == $ks->id_ruang)
          {
            $tanggalcekin = $td->tgl_checkin;
            $tanggalcekout = $td->tgl_checkout;
            $range = "Dipakai Dari : $tanggalcekin  s/d  $tanggalcekout";
          }
        }
      }
      ?>
        <h4><b><p align="center">Ruang Sesilia</p></b></h4>
        <h5><p align="center"> <?php echo  ($range != "" ?  $range : "Available") ?></p></h5>
    </div>
    <div class="modal-footer">
      <div class="col-lg-12" style="background:#ffffff;">
            <!-- <div class="col-lg-2" style="background:url(assets/dashboard/dist/img/cba.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;"><p align="center"><button type="button" style="margin-top:25px; margin-left:0px;" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" title="Kamar 1"  data-content="Tamu : 2 Orang. Gender : Wanita "> Kamar 1 </button></p></div> -->
            <?php foreach ($kamar_sesilia as $ks)
            {
                $nama ="";
                $ab =0;
                $bgbtn = "";
                foreach ($transaksi_d as $td)
                {
                    if($td->id_ruang == $ks->id_ruang)
                    {
                        if($td->kamar == $ks->id_kamar)
                        {
                          $aa = $td->kamar;
                          $ab = $aa;
                          $ad = $td->nama_tamu;
                          $ads = $td->jenis_kelamin;
                          $nama .=  "- Nama : $ad | JK: $ads <br>";
                        }
                    }
                 }

                 if($ab == $ks->id_kamar)
                 {
                   $data  = "$ks->nama_kamar / $td->instansi";
                   $bgbtn = "red";
               ?>
                <div class="col-lg-2" style="background:red; margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                  <?php }else{ $bgbtn = "#00a65a";?>
                <div class="col-lg-2" style="background:#00a65a; margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                  <?php } ?>
                  <p align="center">
                    <button type="button" style="margin-top:25px; background-color:<?php echo $bgbtn; ?>; border-color:<?php echo $bgbtn; ?>;" class="btn btn-default" data-container="body" data-toggle="popover" data-trigger="focus" data-html="true" data-placement="top" title="<?php echo  ($nama != "" ?  $data : "Kosong") ?>"  data-content="<?php echo $nama; ?>"> <?php echo $ks->nama_kamar ?> </button>
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


<div class="modal fade bs-example-modal-9" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <?php
      $tanggalcekin ="";
      $tanggalcekout ="";
      $range = "";
 ?>
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-footer">
      <?php foreach ($kamar_carolus as $kc)
      {
        foreach ($transaksi_d as $td)
        {
          if($td->id_ruang == $kc->id_ruang)
          {
            $tanggalcekin = $td->tgl_checkin;
            $tanggalcekout = $td->tgl_checkout;
            $range = "Dipakai Dari : $tanggalcekin  s/d  $tanggalcekout";
          }
        }
      }
      ?>
        <h4><b><p align="center">Ruang Carolus</p></b></h4>
        <h5><p align="center"> <?php echo  ($range != "" ?  $range : "Available") ?></p></h5>
    </div>
    <div class="modal-footer">
      <div class="col-lg-12" style="background:#ffffff;">
            <!-- <div class="col-lg-2" style="background:url(assets/dashboard/dist/img/cba.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;"><p align="center"><button type="button" style="margin-top:25px; margin-left:0px;" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" title="Kamar 1"  data-content="Tamu : 2 Orang. Gender : Wanita "> Kamar 1 </button></p></div> -->
            <?php foreach ($kamar_carolus as $kc)
            {
                $nama ="";
                $ab =0;
                $bgbtn = "";
                foreach ($transaksi_d as $td)
                {
                    if($td->id_ruang == $kc->id_ruang)
                    {
                        if($td->kamar == $kc->id_kamar)
                        {
                          $aa = $td->kamar;
                          $ab = $aa;
                          $ad = $td->nama_tamu;
                          $ads = $td->jenis_kelamin;
                          $nama .=  "- Nama : $ad | JK: $ads <br>";
                        }
                    }
                 }

                 if($ab == $kc->id_kamar)
                 {
                    $data  = "$kc->nama_kamar / $td->instansi";
                    $bgbtn = "red";
               ?>
                <div class="col-lg-2" style="background:red; margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                  <?php }else{ $bgbtn = "#00a65a";?>
                <div class="col-lg-2" style="background:#00a65a; margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                  <?php } ?>
                  <p align="center">
                    <button type="button" style="margin-top:25px; background-color:<?php echo $bgbtn; ?>; border-color:<?php echo $bgbtn; ?>;" class="btn btn-default" data-container="body" data-toggle="popover" data-trigger="focus" data-html="true" data-placement="top" title="<?php echo  ($nama != "" ?  $data : "Kosong") ?>"  data-content="<?php echo $nama; ?>"> <?php echo $kc->nama_kamar ?> </button>
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

<div class="modal fade bs-example-modal-1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <?php
      $tanggalcekin ="";
      $tanggalcekout ="";
      $range = "";
 ?>
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-footer">
      <?php foreach ($paulus as $p)
      {
        foreach ($transaksi_pertemuan as $tp)
        {
          if($tp->ruang_id == $p->id)
          {
            $tanggalcekin = $tp->tgl_checkin;
            $tanggalcekout = $tp->tgl_checkout;
            $range .= "Dipakai Dari : $tanggalcekin  s/d  $tanggalcekout <br>";
          }
        }
      }
      ?>
        <h4><b><p align="center">Ruang Paulus</p></b></h4>
        <h5><p align="center"> <?php echo  ($range != "" ?  $range : "Available") ?></p></h5>
    </div>
    <div class="modal-footer">
      <div class="col-lg-12" style="background:#ffffff;">
            <!-- <div class="col-lg-2" style="background:url(assets/dashboard/dist/img/cba.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;"><p align="center"><button type="button" style="margin-top:25px; margin-left:0px;" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" title="Kamar 1"  data-content="Tamu : 2 Orang. Gender : Wanita "> Kamar 1 </button></p></div> -->
            <?php foreach ($paulus as $p)
            {
                $nama ="";
                $ab =0;
                $bgbtn = "";
                foreach ($transaksi_pertemuan as $tp)
                {
                    if($tp->ruang_id == $p->id)
                    {
                          $aa = $tp->ruang_id;
                          $ab = $aa;
                          $ad = $tp->instansi;
                          $nama .=  "Instansi : $ad <br>";
                    }
                 }

                 if($ab == $p->id)
                 {
                    $data  = "$p->nama_ruang";
                    $bgbtn = "red";
               ?>
                <div class="col-lg-3" style="background:red; margin-right:1px; height:90px; margin-bottom:5px; margin-left:310px; border: 2px solid grey;">
                  <?php }else{ $bgbtn = "#00a65a";?>
                <div class="col-lg-3" style="background:#00a65a; margin-right:1px; height:90px; margin-bottom:5px; margin-left:310px; border: 2px solid grey;">
                  <?php } ?>
                  <p align="center">
                    <button type="button" style="margin-top:25px; background-color:<?php echo $bgbtn; ?>; border-color:<?php echo $bgbtn; ?>;" class="btn btn-default" data-container="body" data-toggle="popover" data-trigger="focus" data-html="true" data-placement="top" title="<?php echo  ($nama != "" ?  $data : "Kosong") ?>"  data-content="<?php echo $nama; ?>"> <?php echo $p->nama_ruang ?> </button>
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

<div class="modal fade bs-example-modal-2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <?php
      $tanggalcekin ="";
      $tanggalcekout ="";
      $range = "";
 ?>
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-footer">
      <?php foreach ($sidangkecil as $sk)
      {
        foreach ($transaksi_pertemuan as $tp)
        {
          if($tp->ruang_id == $sk->id)
          {
            $tanggalcekin = $tp->tgl_checkin;
            $tanggalcekout = $tp->tgl_checkout;
            $range .= "Dipakai Dari : $tanggalcekin  s/d  $tanggalcekout <br>";
          }
        }
      }
      ?>
        <h4><b><p align="center">Ruang Sidang Kecil</p></b></h4>
        <h5><p align="center"> <?php echo  ($range != "" ?  $range : "Available") ?></p></h5>
    </div>
    <div class="modal-footer">
      <div class="col-lg-12" style="background:#ffffff;">
            <!-- <div class="col-lg-2" style="background:url(assets/dashboard/dist/img/cba.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;"><p align="center"><button type="button" style="margin-top:25px; margin-left:0px;" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" title="Kamar 1"  data-content="Tamu : 2 Orang. Gender : Wanita "> Kamar 1 </button></p></div> -->
            <?php foreach ($sidangkecil as $sk)
            {
                $nama ="";
                $ab =0;
                $bgbtn = "";
                foreach ($transaksi_pertemuan as $tp)
                {
                    if($tp->ruang_id == $sk->id)
                    {
                          $aa = $tp->ruang_id;
                          $ab = $aa;
                          $ad = $tp->instansi;
                          $nama .=  "Instansi : $ad <br>";
                    }
                 }

                 if($ab == $sk->id)
                 {
                    $data  = "$sk->nama_ruang";
                    $bgbtn = "red";
               ?>
                <div class="col-lg-3" style="background:red; margin-right:1px; height:90px; margin-bottom:5px; margin-left:310px; border: 2px solid grey;">
                  <?php }else{ $bgbtn = "#00a65a";?>
                <div class="col-lg-3" style="background:#00a65a; margin-right:1px; height:90px; margin-bottom:5px; margin-left:310px; border: 2px solid grey;">
                  <?php } ?>
                  <p align="center">
                    <button type="button" style="margin-top:25px; background-color:<?php echo $bgbtn; ?>; border-color:<?php echo $bgbtn; ?>;" class="btn btn-default" data-container="body" data-toggle="popover" data-trigger="focus" data-html="true" data-placement="top" title="<?php echo  ($nama != "" ?  $data : "Kosong") ?>"  data-content="<?php echo $nama; ?>"> <?php echo $sk->nama_ruang ?> </button>
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

<div class="modal fade bs-example-modal-3" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <?php
      $tanggalcekin ="";
      $tanggalcekout ="";
      $range = "";
 ?>
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-footer">
      <?php foreach ($konsultasi as $kn)
      {
        foreach ($transaksi_d as $td)
        {
          if($td->id_ruang == $kn->id_ruang)
          {
            $tanggalcekin = $td->tgl_checkin;
            $tanggalcekout = $td->tgl_checkout;
            $range = "Dipakai Dari : $tanggalcekin  s/d  $tanggalcekout";
          }
        }
      }
      ?>
        <h4><b><p align="center">Ruang Konsultasi</p></b></h4>
        <h5><p align="center"> <?php echo  ($range != "" ?  $range : "Available") ?></p></h5>
    </div>
    <div class="modal-footer">
      <div class="col-lg-12" style="background:#ffffff;">
            <!-- <div class="col-lg-2" style="background:url(assets/dashboard/dist/img/cba.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;"><p align="center"><button type="button" style="margin-top:25px; margin-left:0px;" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" title="Kamar 1"  data-content="Tamu : 2 Orang. Gender : Wanita "> Kamar 1 </button></p></div> -->
            <?php foreach ($konsultasi as $kn)
            {
                $nama ="";
                $ab =0;
                $bgbtn = "";
                foreach ($transaksi_d as $td)
                {
                    if($td->id_ruang == $kn->id_ruang)
                    {
                        if($td->kamar == $kn->id_kamar)
                        {
                          $aa = $td->kamar;
                          $ab = $aa;
                          $ad = $td->nama_tamu;
                          $ads = $td->jenis_kelamin;
                          $nama .=  "- Nama : $ad | JK: $ads <br>";
                        }
                    }
                 }

                 if($ab == $kn->id_kamar)
                 {
                    $data  = "$kn->nama_kamar / $td->instansi";
                    $bgbtn = "red";
               ?>
                <div class="col-lg-2" style="background:red; margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                  <?php }else{ $bgbtn = "#00a65a";?>
                <div class="col-lg-2" style="background:#00a65a; margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;">
                  <?php } ?>
                  <p align="center">
                    <button type="button" style="margin-top:25px; background-color:<?php echo $bgbtn; ?>; border-color:<?php echo $bgbtn; ?>;" class="btn btn-default" data-container="body" data-toggle="popover" data-trigger="focus" data-html="true" data-placement="top" title="<?php echo  ($nama != "" ?  $data : "Kosong") ?>"  data-content="<?php echo $nama; ?>"> <?php echo $kn->nama_kamar ?> </button>
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

<div class="modal fade bs-example-modal-13" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <?php
      $tanggalcekin ="";
      $tanggalcekout ="";
      $range = "";
 ?>
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-footer">
      <?php foreach ($transit as $ts)
      {
        foreach ($transaksi_pertemuan as $tp)
        {
          if($tp->ruang_id == $ts->id)
          {
            $tanggalcekin = $tp->tgl_checkin;
            $tanggalcekout = $tp->tgl_checkout;
            $range .= "Dipakai Dari : $tanggalcekin  s/d  $tanggalcekout <br>";
          }
        }
      }
      ?>
        <h4><b><p align="center">Ruang Transit</p></b></h4>
        <h5><p align="center"> <?php echo  ($range != "" ?  $range : "Available") ?></p></h5>
    </div>
    <div class="modal-footer">
      <div class="col-lg-12" style="background:#ffffff;">
            <!-- <div class="col-lg-2" style="background:url(assets/dashboard/dist/img/cba.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;"><p align="center"><button type="button" style="margin-top:25px; margin-left:0px;" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" title="Kamar 1"  data-content="Tamu : 2 Orang. Gender : Wanita "> Kamar 1 </button></p></div> -->
            <?php foreach ($transit as $ts)
            {
                $nama ="";
                $ab =0;
                $bgbtn = "";
                foreach ($transaksi_pertemuan as $tp)
                {
                    if($tp->ruang_id == $ts->id)
                    {
                          $aa = $tp->ruang_id;
                          $ab = $aa;
                          $ad = $tp->instansi;
                          $nama .=  "Instansi : $ad <br>";
                    }
                 }

                 if($ab == $ts->id)
                 {
                    $data  = "$ts->nama_ruang";
                    $bgbtn = "red";
               ?>
                <div class="col-lg-3" style="background:red; margin-right:1px; height:90px; margin-bottom:5px; margin-left:310px; border: 2px solid grey;">
                  <?php }else{ $bgbtn = "#00a65a";?>
                <div class="col-lg-3" style="background:#00a65a; margin-right:1px; height:90px; margin-bottom:5px; margin-left:310px; border: 2px solid grey;">
                  <?php } ?>
                  <p align="center">
                    <button type="button" style="margin-top:25px; background-color:<?php echo $bgbtn; ?>; border-color:<?php echo $bgbtn; ?>;" class="btn btn-default" data-container="body" data-toggle="popover" data-trigger="focus" data-html="true" data-placement="top" title="<?php echo  ($nama != "" ?  $data : "Kosong") ?>"  data-content="<?php echo $nama; ?>"> <?php echo $ts->nama_ruang ?> </button>
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

<div class="modal fade bs-example-modal-14" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <?php
      $tanggalcekin ="";
      $tanggalcekout ="";
      $range = "";
 ?>
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-footer">
      <?php foreach ($rmakanbesar as $rmb)
      {
        foreach ($transaksi_pertemuan as $tp)
        {
          if($tp->ruang_id == $rmb->id)
          {
            $tanggalcekin = $tp->tgl_checkin;
            $tanggalcekout = $tp->tgl_checkout;
            $range .= "Dipakai Dari : $tanggalcekin  s/d  $tanggalcekout <br>";
          }
        }
      }
      ?>
        <h4><b><p align="center">Ruang Makan Besar</p></b></h4>
        <h5><p align="center"> <?php echo  ($range != "" ?  $range : "Available") ?></p></h5>
    </div>
    <div class="modal-footer">
      <div class="col-lg-12" style="background:#ffffff;">
            <!-- <div class="col-lg-2" style="background:url(assets/dashboard/dist/img/cba.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;"><p align="center"><button type="button" style="margin-top:25px; margin-left:0px;" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" title="Kamar 1"  data-content="Tamu : 2 Orang. Gender : Wanita "> Kamar 1 </button></p></div> -->
            <?php foreach ($rmakanbesar as $rmb)
            {
                $nama ="";
                $ab =0;
                $bgbtn = "";
                foreach ($transaksi_pertemuan as $tp)
                {
                    if($tp->ruang_id == $rmb->id)
                    {
                          $aa = $tp->ruang_id;
                          $ab = $aa;
                          $ad = $tp->instansi;
                          $nama .=  "Instansi : $ad <br>";
                    }
                 }

                 if($ab == $rmb->id)
                 {
                    $data  = "$rmb->nama_ruang";
                    $bgbtn = "red";
               ?>
                <div class="col-lg-3" style="background:red; margin-right:1px; height:90px; margin-bottom:5px; margin-left:310px; border: 2px solid grey;">
                  <?php }else{ $bgbtn = "#00a65a";?>
                <div class="col-lg-3" style="background:#00a65a; margin-right:1px; height:90px; margin-bottom:5px; margin-left:310px; border: 2px solid grey;">
                  <?php } ?>
                  <p align="center">
                    <button type="button" style="margin-top:25px; background-color:<?php echo $bgbtn; ?>; border-color:<?php echo $bgbtn; ?>;" class="btn btn-default" data-container="body" data-toggle="popover" data-trigger="focus" data-html="true" data-placement="top" title="<?php echo  ($nama != "" ?  $data : "Kosong") ?>"  data-content="<?php echo $nama; ?>"> <?php echo $rmb->nama_ruang ?> </button>
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

<div class="modal fade bs-example-modal-15" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <?php
      $tanggalcekin ="";
      $tanggalcekout ="";
      $range = "";
 ?>
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-footer">
      <?php foreach ($rmakankecil as $rmk)
      {
        foreach ($transaksi_pertemuan as $tp)
        {
          if($tp->ruang_id == $rmk->id)
          {
            $tanggalcekin = $tp->tgl_checkin;
            $tanggalcekout = $tp->tgl_checkout;
            $range .= "Dipakai Dari : $tanggalcekin  s/d  $tanggalcekout <br>";
          }
        }
      }
      ?>
        <h4><b><p align="center">Ruang Makan Kecil</p></b></h4>
        <h5><p align="center"> <?php echo  ($range != "" ?  $range : "Available") ?></p></h5>
    </div>
    <div class="modal-footer">
      <div class="col-lg-12" style="background:#ffffff;">
            <!-- <div class="col-lg-2" style="background:url(assets/dashboard/dist/img/cba.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;"><p align="center"><button type="button" style="margin-top:25px; margin-left:0px;" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" title="Kamar 1"  data-content="Tamu : 2 Orang. Gender : Wanita "> Kamar 1 </button></p></div> -->
            <?php foreach ($rmakankecil as $rmk)
            {
                $nama ="";
                $ab =0;
                $bgbtn = "";
                foreach ($transaksi_pertemuan as $tp)
                {
                    if($tp->ruang_id == $rmk->id)
                    {
                          $aa = $tp->ruang_id;
                          $ab = $aa;
                          $ad = $tp->instansi;
                          $nama .=  "Instansi : $ad <br>";
                    }
                 }

                 if($ab == $rmk->id)
                 {
                    $data  = "$rmk->nama_ruang";
                    $bgbtn = "red";
               ?>
                <div class="col-lg-3" style="background:red; margin-right:1px; height:90px; margin-bottom:5px; margin-left:310px; border: 2px solid grey;">
                  <?php }else{ $bgbtn = "#00a65a";?>
                <div class="col-lg-3" style="background:#00a65a; margin-right:1px; height:90px; margin-bottom:5px; margin-left:310px; border: 2px solid grey;">
                  <?php } ?>
                  <p align="center">
                    <button type="button" style="margin-top:25px; background-color:<?php echo $bgbtn; ?>; border-color:<?php echo $bgbtn; ?>;" class="btn btn-default" data-container="body" data-toggle="popover" data-trigger="focus" data-html="true" data-placement="top" title="<?php echo  ($nama != "" ?  $data : "Kosong") ?>"  data-content="<?php echo $nama; ?>"> <?php echo $rmk->nama_ruang ?> </button>
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

<div class="modal fade bs-example-modal-17" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <?php
      $tanggalcekin ="";
      $tanggalcekout ="";
      $range = "";
 ?>
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-footer">
      <?php foreach ($aula as $a)
      {
        foreach ($transaksi_pertemuanyayasan as $tpy)
        {
          if($tpy->ruangkantor_id == $a->id)
          {
            $tanggalcekin = $tpy->tgl_checkin;
            $tanggalcekout = $tpy->tgl_checkout;
            $range .= "Dipakai Dari : $tanggalcekin  s/d  $tanggalcekout <br>";
          }
        }
      }
      ?>
        <h4><b><p align="center">Ruang Aula</p></b></h4>
        <h5><p align="center"> <?php echo  ($range != "" ?  $range : "Available") ?></p></h5>
    </div>
    <div class="modal-footer">
      <div class="col-lg-12" style="background:#ffffff;">
            <!-- <div class="col-lg-2" style="background:url(assets/dashboard/dist/img/cba.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;"><p align="center"><button type="button" style="margin-top:25px; margin-left:0px;" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" title="Kamar 1"  data-content="Tamu : 2 Orang. Gender : Wanita "> Kamar 1 </button></p></div> -->
            <?php foreach ($aula as $a)
            {
                $nama ="";
                $ab =0;
                $bgbtn = "";
                foreach ($transaksi_pertemuanyayasan as $tpy)
                {
                    if($tpy->ruangkantor_id == $a->id)
                    {
                          $aa = $tpy->ruangkantor_id;
                          $ab = $aa;
                          $ad = $tpy->instansi;
                          $nama .=  "Instansi : $ad <br>";
                    }
                 }

                 if($ab == $a->id)
                 {
                    $data  = "$a->nama_ruang";
                    $bgbtn = "red";
               ?>
                <div class="col-lg-3" style="background:red; margin-right:1px; height:90px; margin-bottom:5px; margin-left:310px; border: 2px solid grey;">
                  <?php }else{ $bgbtn = "#00a65a";?>
                <div class="col-lg-3" style="background:#00a65a; margin-right:1px; height:90px; margin-bottom:5px; margin-left:310px; border: 2px solid grey;">
                  <?php } ?>
                  <p align="center">
                    <button type="button" style="margin-top:25px; background-color:<?php echo $bgbtn; ?>; border-color:<?php echo $bgbtn; ?>;" class="btn btn-default" data-container="body" data-toggle="popover" data-trigger="focus" data-html="true" data-placement="top" title="<?php echo  ($nama != "" ?  $data : "Kosong") ?>"  data-content="<?php echo $nama; ?>"> <?php echo $a->nama_ruang ?> </button>
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

<div class="modal fade bs-example-modal-18" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <?php
      $tanggalcekin ="";
      $tanggalcekout ="";
      $range = "";
 ?>
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-footer">
      <?php foreach ($mensa as $m)
      {
        foreach ($transaksi_pertemuanyayasan as $tpy)
        {
          if($tpy->ruangkantor_id == $m->id)
          {
            $tanggalcekin = $tpy->tgl_checkin;
            $tanggalcekout = $tpy->tgl_checkout;
            $range .= "Dipakai Dari : $tanggalcekin  s/d  $tanggalcekout <br>";
          }
        }
      }
      ?>
        <h4><b><p align="center">Ruang Mensa</p></b></h4>
        <h5><p align="center"> <?php echo  ($range != "" ?  $range : "Available") ?></p></h5>
    </div>
    <div class="modal-footer">
      <div class="col-lg-12" style="background:#ffffff;">
            <!-- <div class="col-lg-2" style="background:url(assets/dashboard/dist/img/cba.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;"><p align="center"><button type="button" style="margin-top:25px; margin-left:0px;" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" title="Kamar 1"  data-content="Tamu : 2 Orang. Gender : Wanita "> Kamar 1 </button></p></div> -->
            <?php foreach ($mensa as $m)
            {
                $nama ="";
                $ab =0;
                $bgbtn = "";
                foreach ($transaksi_pertemuanyayasan as $tpy)
                {
                    if($tpy->ruangkantor_id == $m->id)
                    {
                          $aa = $tpy->ruangkantor_id;
                          $ab = $aa;
                          $ad = $tpy->instansi;
                          $nama .=  "Instansi : $ad <br>";
                    }
                 }

                 if($ab == $m->id)
                 {
                    $data  = "$m->nama_ruang";
                    $bgbtn = "red";
               ?>
                <div class="col-lg-3" style="background:red; margin-right:1px; height:90px; margin-bottom:5px; margin-left:310px; border: 2px solid grey;">
                  <?php }else{ $bgbtn = "#00a65a";?>
                <div class="col-lg-3" style="background:#00a65a; margin-right:1px; height:90px; margin-bottom:5px; margin-left:310px; border: 2px solid grey;">
                  <?php } ?>
                  <p align="center">
                    <button type="button" style="margin-top:25px; background-color:<?php echo $bgbtn; ?>; border-color:<?php echo $bgbtn; ?>;" class="btn btn-default" data-container="body" data-toggle="popover" data-trigger="focus" data-html="true" data-placement="top" title="<?php echo  ($nama != "" ?  $data : "Kosong") ?>"  data-content="<?php echo $nama; ?>"> <?php echo $m->nama_ruang ?> </button>
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

<div class="modal fade bs-example-modal-19" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <?php
      $tanggalcekin ="";
      $tanggalcekout ="";
      $range = "";
 ?>
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-footer">
      <?php foreach ($rapat as $r)
      {
        foreach ($transaksi_pertemuanyayasan as $tpy)
        {
          if($tpy->ruangkantor_id == $r->id)
          {
            $tanggalcekin = $tpy->tgl_checkin;
            $tanggalcekout = $tpy->tgl_checkout;
            $range .= "Dipakai Dari : $tanggalcekin  s/d  $tanggalcekout <br>";
          }
        }
      }
      ?>
        <h4><b><p align="center">Ruang Rapat</p></b></h4>
        <h5><p align="center"> <?php echo  ($range != "" ?  $range : "Available") ?></p></h5>
    </div>
    <div class="modal-footer">
      <div class="col-lg-12" style="background:#ffffff;">
            <!-- <div class="col-lg-2" style="background:url(assets/dashboard/dist/img/cba.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;"><p align="center"><button type="button" style="margin-top:25px; margin-left:0px;" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" title="Kamar 1"  data-content="Tamu : 2 Orang. Gender : Wanita "> Kamar 1 </button></p></div> -->
            <?php foreach ($rapat as $r)
            {
                $nama ="";
                $ab =0;
                $bgbtn = "";
                foreach ($transaksi_pertemuanyayasan as $tpy)
                {
                    if($tpy->ruangkantor_id == $r->id)
                    {
                          $aa = $tpy->ruangkantor_id;
                          $ab = $aa;
                          $ad = $tpy->instansi;
                          $nama .=  "Instansi : $ad <br>";
                    }
                 }

                 if($ab == $r->id)
                 {
                    $data  = "$r->nama_ruang";
                    $bgbtn = "red";
               ?>
                <div class="col-lg-3" style="background:red; margin-right:1px; height:90px; margin-bottom:5px; margin-left:310px; border: 2px solid grey;">
                  <?php }else{ $bgbtn = "#00a65a";?>
                <div class="col-lg-3" style="background:#00a65a; margin-right:1px; height:90px; margin-bottom:5px; margin-left:310px; border: 2px solid grey;">
                  <?php } ?>
                  <p align="center">
                    <button type="button" style="margin-top:25px; background-color:<?php echo $bgbtn; ?>; border-color:<?php echo $bgbtn; ?>;" class="btn btn-default" data-container="body" data-toggle="popover" data-trigger="focus" data-html="true" data-placement="top" title="<?php echo  ($nama != "" ?  $data : "Kosong") ?>"  data-content="<?php echo $nama; ?>"> <?php echo $r->nama_ruang ?> </button>
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

<div class="modal fade bs-example-modal-20" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <?php
      $tanggalcekin ="";
      $tanggalcekout ="";
      $range = "";
 ?>
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-footer">
      <?php foreach ($lobby as $l)
      {
        foreach ($transaksi_pertemuanyayasan as $tpy)
        {
          if($tpy->ruangkantor_id == $l->id)
          {
            $tanggalcekin = $tpy->tgl_checkin;
            $tanggalcekout = $tpy->tgl_checkout;
            $range .= "Dipakai Dari : $tanggalcekin  s/d  $tanggalcekout <br>";
          }
        }
      }
      ?>
        <h4><b><p align="center">Lobby</p></b></h4>
        <h5><p align="center"> <?php echo  ($range != "" ?  $range : "Available") ?></p></h5>
    </div>
    <div class="modal-footer">
      <div class="col-lg-12" style="background:#ffffff;">
            <!-- <div class="col-lg-2" style="background:url(assets/dashboard/dist/img/cba.png); margin-right:1px; height:90px; margin-bottom:5px; margin-left:25px; border: 2px solid grey;"><p align="center"><button type="button" style="margin-top:25px; margin-left:0px;" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="top" title="Kamar 1"  data-content="Tamu : 2 Orang. Gender : Wanita "> Kamar 1 </button></p></div> -->
            <?php foreach ($lobby as $l)
            {
                $nama ="";
                $ab =0;
                $bgbtn = "";
                foreach ($transaksi_pertemuanyayasan as $tpy)
                {
                    if($tpy->ruangkantor_id == $l->id)
                    {
                          $aa = $tpy->ruangkantor_id;
                          $ab = $aa;
                          $ad = $tpy->instansi;
                          $nama .=  "Instansi : $ad <br>";
                    }
                 }

                 if($ab == $l->id)
                 {
                    $data  = "$l->nama_ruang";
                    $bgbtn = "red";
               ?>
                <div class="col-lg-3" style="background:red; margin-right:1px; height:90px; margin-bottom:5px; margin-left:310px; border: 2px solid grey;">
                  <?php }else{ $bgbtn = "#00a65a";?>
                <div class="col-lg-3" style="background:#00a65a; margin-right:1px; height:90px; margin-bottom:5px; margin-left:310px; border: 2px solid grey;">
                  <?php } ?>
                  <p align="center">
                    <button type="button" style="margin-top:25px; background-color:<?php echo $bgbtn; ?>; border-color:<?php echo $bgbtn; ?>;" class="btn btn-default" data-container="body" data-toggle="popover" data-trigger="focus" data-html="true" data-placement="top" title="<?php echo  ($nama != "" ?  $data : "Kosong") ?>"  data-content="<?php echo $nama; ?>"> <?php echo $l->nama_ruang ?> </button>
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
