<?php
  $in = $this->session->userdata("type");
  if($in == 'Super Admin')
  {
?>
<ul class="sidebar-menu">
  <li class="header">MAIN NAVIGATION</li>
  <li>
    <a href="#">
      <i class="fa fa-dashboard"></i> <span>Dashboard</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="<?php echo base_url('dashboard/admin'); ?>"><i class="fa fa-circle-o"></i> Dashboard </a></li>
    </ul>
  </li>

  <li>
    <a href="#">
      <i class="fa fa-database"></i> <span>Master Data</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="<?php echo base_url('dashboard/admin/data/jenistamu'); ?>"><i class="fa fa-circle-o"></i> Master Jenis Tamu </a></li>
      <li class="active"><a href="<?php echo base_url('dashboard/admin/data/jenistarif'); ?>"><i class="fa fa-circle-o"></i> Master Jenis Tarif </a></li>
      <li class="active"><a href="<?php echo base_url('dashboard/admin/data/tarif'); ?>"><i class="fa fa-circle-o"></i> Master Tarif </a></li>
      <li class="active"><a href="<?php echo base_url('dashboard/admin/data/additional'); ?>"><i class="fa fa-circle-o"></i> Master Additional </a></li>
      <li class="active"><a href="<?php echo base_url('dashboard/admin/data/ruang'); ?>"><i class="fa fa-circle-o"></i> Master Nama Ruang </a></li>
      <li class="active"><a href="<?php echo base_url('dashboard/admin/data/kamar'); ?>"><i class="fa fa-circle-o"></i> Master Kamar </a></li>
      <li class="active"><a href="<?php echo base_url('dashboard/admin/data/ruangan'); ?>"><i class="fa fa-circle-o"></i> Master Ruang Pertemuan</a></li>
      <li class="active"><a href="<?php echo base_url('dashboard/admin/data/jasa'); ?>"><i class="fa fa-circle-o"></i> Master Jasa </a></li>
      <li class="active"><a href="<?php echo base_url('dashboard/admin/data/user'); ?>"><i class="fa fa-circle-o"></i> Master Users </a></li>
    </ul>
  </li>

  <li>
    <a href="#">
      <i class="fa fa-bookmark"></i> <span>Reservasi</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="<?php echo base_url('dashboard/admin/data/reservasi/add'); ?>"><i class="fa fa-circle-o"></i> Add Reservasi </a></li>
      <li class="active"><a href="<?php echo base_url('dashboard/admin/data/reservasi'); ?>"><i class="fa fa-circle-o"></i> List Reservasi </a></li>
      <li class="active"><a href="<?php echo base_url('dashboard/admin/denah/ruangan'); ?>"><i class="fa fa-circle-o"></i> Denah Ruangan </a></li>
    </ul>
  </li>

  <li>
    <a href="#">
      <i class="fa fa-credit-card"></i> <span>Pembayaran</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="<?php echo base_url('dashboard/admin/data/reservasi/pembayaran'); ?>"><i class="fa fa-circle-o"></i> List Pembayaran </a></li>
    </ul>
 </li>

  <li>
    <a href="#">
      <i class="fa fa-users"></i> <span>Kehadiran</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="<?php echo base_url('dashboard/admin/data/konfirmasi/checkin'); ?>"><i class="fa fa-circle-o"></i> Check In </a></li>
      <li class="active"><a href="<?php echo base_url('dashboard/admin/data/konfirmasi/checkout'); ?>"><i class="fa fa-circle-o"></i> Check Out </a></li>
    </ul>
 </li>

 <li>
   <a href="#">
     <i class="glyphicon glyphicon-stats"></i> <span>Report</span>
     <span class="pull-right-container">
       <i class="fa fa-angle-left pull-right"></i>
     </span>
   </a>
   <ul class="treeview-menu">
     <li class="active"><a href="<?php echo base_url('dashboard/admin/data/laporan/tahunan'); ?>"><i class="fa fa-circle-o"></i> Reporting Tahunan</a></li>
     <li class="active"><a href="<?php echo base_url('dashboard/admin/data/laporan/bulanan'); ?>"><i class="fa fa-circle-o"></i> Reporting Bulanan</a></li>
     <li class="active"><a href="<?php echo base_url('dashboard/admin/data/laporan/harian'); ?>"><i class="fa fa-circle-o"></i> Reporting Harian</a></li>
   </ul>
 </li>

 <li>
   <a href="#">
     <i class="fa fa-users"></i> <span>Member</span>
     <span class="pull-right-container">
       <i class="fa fa-angle-left pull-right"></i>
     </span>
   </a>
   <ul class="treeview-menu">
     <li class="active"><a href="<?php echo base_url('dashboard/admin/data/member'); ?>"><i class="fa fa-circle-o"></i> List Member </a></li>
   </ul>
 </li>

 <li>
   <a href="#">
     <i class="fa fa-newspaper-o"></i> <span>News</span>
     <span class="pull-right-container">
       <i class="fa fa-angle-left pull-right"></i>
     </span>
   </a>
   <ul class="treeview-menu">
     <li class="active"><a href="<?php echo base_url('dashboard/admin/data/berita/kategori'); ?>"><i class="fa fa-circle-o"></i> News Category</a></li>
     <li class="active"><a href="<?php echo base_url('dashboard/admin/data/berita'); ?>"><i class="fa fa-circle-o"></i> News List </a></li>
   </ul>
 </li>

 <li>
   <a href="#">
     <i class="fa fa-wifi"></i> <span>Fasilitas</span>
     <span class="pull-right-container">
       <i class="fa fa-angle-left pull-right"></i>
     </span>
   </a>
   <ul class="treeview-menu">
     <li class="active"><a href="<?php echo base_url('dashboard/admin/data/fasilitas/add'); ?>"><i class="fa fa-circle-o"></i> Add Fasilitas</a></li>
     <li class="active"><a href="<?php echo base_url('dashboard/admin/data/fasilitas'); ?>"><i class="fa fa-circle-o"></i> List Fasilitas </a></li>
   </ul>
 </li>

 <li>
   <a href="#">
     <i class="fa fa-image"></i> <span>Gallery</span>
     <span class="pull-right-container">
       <i class="fa fa-angle-left pull-right"></i>
     </span>
   </a>
   <ul class="treeview-menu">
     <li class="active"><a href="<?php echo base_url('dashboard/admin/data/gallery/add'); ?>"><i class="fa fa-circle-o"></i> Add Gallery</a></li>
     <li class="active"><a href="<?php echo base_url('dashboard/admin/data/gallery'); ?>"><i class="fa fa-circle-o"></i> List Gallery </a></li>
   </ul>
 </li>

 <li>
   <a href="#">
     <i class="glyphicon glyphicon-cog"></i> <span>Settings</span>
     <span class="pull-right-container">
       <i class="fa fa-angle-left pull-right"></i>
     </span>
   </a>
   <ul class="treeview-menu">
     <li class="active"><a href="<?php echo base_url('dashboard/admin/data/setting'); ?>"><i class="fa fa-circle-o"></i> Konten Website</a></li>
   </ul>
 </li>
</ul>
<?php
  }
  elseif ($in == 'Admin')
  {
?>
<ul class="sidebar-menu">
  <li class="header">MAIN NAVIGATION</li>
  <li>
    <a href="#">
      <i class="fa fa-dashboard"></i> <span>Dashboard</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="<?php echo base_url('dashboard/admin'); ?>"><i class="fa fa-circle-o"></i> Dashboard </a></li>
    </ul>
  </li>

  <li>
    <a href="#">
      <i class="fa fa-database"></i> <span>Master Data</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="<?php echo base_url('dashboard/admin/data/jenistamu'); ?>"><i class="fa fa-circle-o"></i> Master Jenis Tamu </a></li>
      <li class="active"><a href="<?php echo base_url('dashboard/admin/data/jenistarif'); ?>"><i class="fa fa-circle-o"></i> Master Jenis Tarif </a></li>
      <li class="active"><a href="<?php echo base_url('dashboard/admin/data/tarif'); ?>"><i class="fa fa-circle-o"></i> Master Tarif </a></li>
      <li class="active"><a href="<?php echo base_url('dashboard/admin/data/additional'); ?>"><i class="fa fa-circle-o"></i> Master Additional </a></li>
      <li class="active"><a href="<?php echo base_url('dashboard/admin/data/ruang'); ?>"><i class="fa fa-circle-o"></i> Master Nama Ruang </a></li>
      <li class="active"><a href="<?php echo base_url('dashboard/admin/data/kamar'); ?>"><i class="fa fa-circle-o"></i> Master Kamar </a></li>
      <li class="active"><a href="<?php echo base_url('dashboard/admin/data/ruangan'); ?>"><i class="fa fa-circle-o"></i> Master Ruang Pertemuan</a></li>
      <li class="active"><a href="<?php echo base_url('dashboard/admin/data/jasa'); ?>"><i class="fa fa-circle-o"></i> Master Jasa </a></li>
      <li class="active"><a href="<?php echo base_url('dashboard/admin/data/user'); ?>"><i class="fa fa-circle-o"></i> Master Users </a></li>
    </ul>
  </li>

  <li>
    <a href="#">
      <i class="fa fa-bookmark"></i> <span>Reservasi</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="<?php echo base_url('dashboard/admin/data/reservasi/add'); ?>"><i class="fa fa-circle-o"></i> Add Reservasi </a></li>
      <li class="active"><a href="<?php echo base_url('dashboard/admin/data/reservasi'); ?>"><i class="fa fa-circle-o"></i> List Reservasi </a></li>
      <li class="active"><a href="<?php echo base_url('dashboard/admin/denah/ruangan'); ?>"><i class="fa fa-circle-o"></i> Denah Ruangan </a></li>
    </ul>
  </li>

  <li>
    <a href="#">
      <i class="fa fa-credit-card"></i> <span>Pembayaran</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="<?php echo base_url('dashboard/admin/data/reservasi/pembayaran'); ?>"><i class="fa fa-circle-o"></i> List Pembayaran </a></li>
    </ul>
 </li>

  <li>
    <a href="#">
      <i class="fa fa-users"></i> <span>Kehadiran</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="<?php echo base_url('dashboard/admin/data/konfirmasi/checkin'); ?>"><i class="fa fa-circle-o"></i> Check In </a></li>
      <li class="active"><a href="<?php echo base_url('dashboard/admin/data/konfirmasi/checkout'); ?>"><i class="fa fa-circle-o"></i> Check Out </a></li>
    </ul>
 </li>

 <li>
   <a href="#">
     <i class="glyphicon glyphicon-stats"></i> <span>Report</span>
     <span class="pull-right-container">
       <i class="fa fa-angle-left pull-right"></i>
     </span>
   </a>
   <ul class="treeview-menu">
     <li class="active"><a href="<?php echo base_url('dashboard/admin/data/laporan/tahunan'); ?>"><i class="fa fa-circle-o"></i> Reporting Tahunan</a></li>
     <li class="active"><a href="<?php echo base_url('dashboard/admin/data/laporan/bulanan'); ?>"><i class="fa fa-circle-o"></i> Reporting Bulanan</a></li>
     <li class="active"><a href="<?php echo base_url('dashboard/admin/data/laporan/harian'); ?>"><i class="fa fa-circle-o"></i> Reporting Harian</a></li>
   </ul>
 </li>

 <li>
   <a href="#">
     <i class="glyphicon glyphicon-cog"></i> <span>Settings</span>
     <span class="pull-right-container">
       <i class="fa fa-angle-left pull-right"></i>
     </span>
   </a>
   <ul class="treeview-menu">
     <li class="active"><a href="<?php echo base_url('dashboard/admin/profile'); ?>"><i class="fa fa-circle-o"></i> Your Profile </a></li>
   </ul>
 </li>
</ul>

<?php
  }
  elseif ($in == 'Frontoffice')
  {
?>
<ul class="sidebar-menu">
  <li class="header">MAIN NAVIGATION</li>
  <li>
    <a href="#">
      <i class="fa fa-dashboard"></i> <span>Dashboard</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="<?php echo base_url('dashboard/admin'); ?>"><i class="fa fa-circle-o"></i> Dashboard </a></li>
    </ul>
  </li>
  <li>
    <a href="#">
      <i class="fa fa-bookmark"></i> <span>Reservasi</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="<?php echo base_url('dashboard/admin/data/reservasi/add'); ?>"><i class="fa fa-circle-o"></i> Add Reservasi </a></li>
      <li class="active"><a href="<?php echo base_url('dashboard/admin/data/reservasi'); ?>"><i class="fa fa-circle-o"></i> List Reservasi </a></li>
      <li class="active"><a href="<?php echo base_url('dashboard/admin/denah/ruangan'); ?>"><i class="fa fa-circle-o"></i> Denah Ruangan </a></li>
    </ul>
  </li>

  <li>
    <a href="#">
      <i class="fa fa-credit-card"></i> <span>Pembayaran</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="<?php echo base_url('dashboard/admin/data/reservasi/pembayaran'); ?>"><i class="fa fa-circle-o"></i> List Pembayaran </a></li>
    </ul>
 </li>

  <li>
    <a href="#">
      <i class="fa fa-users"></i> <span>Kehadiran</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="<?php echo base_url('dashboard/admin/data/konfirmasi/checkin'); ?>"><i class="fa fa-circle-o"></i> Check In </a></li>
      <li class="active"><a href="<?php echo base_url('dashboard/admin/data/konfirmasi/checkout'); ?>"><i class="fa fa-circle-o"></i> Check Out </a></li>
    </ul>
 </li>
 <li>
   <a href="#">
     <i class="glyphicon glyphicon-cog"></i> <span>Settings</span>
     <span class="pull-right-container">
       <i class="fa fa-angle-left pull-right"></i>
     </span>
   </a>
   <ul class="treeview-menu">
     <li class="active"><a href="<?php echo base_url('dashboard/admin/profile'); ?>"><i class="fa fa-circle-o"></i> Your Profile </a></li>
   </ul>
 </li>
</ul>
<?php
  }else{
?>
<ul class="sidebar-menu">
  <li class="header">MAIN NAVIGATION</li>
  <li>
    <a href="#">
      <i class="fa fa-dashboard"></i> <span>Dashboard</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="active"><a href="<?php echo base_url('dashboard/admin'); ?>"><i class="fa fa-circle-o"></i> Dashboard </a></li>
    </ul>
  </li>
 <li>
   <a href="#">
     <i class="glyphicon glyphicon-stats"></i> <span>Report</span>
     <span class="pull-right-container">
       <i class="fa fa-angle-left pull-right"></i>
     </span>
   </a>
   <ul class="treeview-menu">
      <li class="active"><a href="<?php echo base_url('dashboard/admin/data/laporan/harian'); ?>"><i class="fa fa-circle-o"></i> Reporting Harian</a></li>
     <!-- <li class="active"><a href=""><i class="fa fa-circle-o"></i> Reporting Bulanan</a></li> -->
   </ul>
 </li>
 <li>
   <a href="#">
     <i class="glyphicon glyphicon-cog"></i> <span>Settings</span>
     <span class="pull-right-container">
       <i class="fa fa-angle-left pull-right"></i>
     </span>
   </a>
   <ul class="treeview-menu">
     <li class="active"><a href="<?php echo base_url('dashboard/admin/profile'); ?>"><i class="fa fa-circle-o"></i> Your Profile </a></li>
   </ul>
 </li>
</ul>
<?php } ?>
