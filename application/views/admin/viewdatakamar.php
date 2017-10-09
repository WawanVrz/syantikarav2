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
              <h3 class="box-title">Master Data Kamar &nbsp;&nbsp;<a href="<?php echo base_url('dashboard/admin/data/kamar/add'); ?>"><button class="btn btn-primary tambah-form btn-sm btn-flat" ><i class="fa fa-plus"></i>&nbsp; Tambah Data</button></a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <a href="<?php echo base_url('dashboard/admin/data/kamar'); ?>">All (<?php echo $this->session->userdata("kamar_jumlah"); ?>)</a> | <a href="<?php echo base_url('dashboard/admin/data/kamar/bin'); ?>">Trash (<?php echo $this->session->userdata("jumlah_sampah_kamar"); ?>)</a>
              <hr>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Ruang</th>
                  <th>Nama Kamar</th>
                  <th>Kapasitas Kamar</th>
                  <th>Keterangan</th>
                  <th width="20%">Actions</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    foreach ($view_kamar as $k) {
                  ?>
                <tr id="row-<?= $k->id_kamar ?>">
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $k->nama_ruang ?></td>
                  <td><?php echo $k->nama_kamar ?></td>
                  <td><?php echo $k->kapasitas_kamar." Orang" ?></td>
                  <td><?php echo $k->keterangan ?></td>
                  <td align="center">
                    <a href="<?php echo base_url('dashboard/admin/data/kamar/edit/'.$k->id_kamar); ?>"><button class="btn btn-warning btn-sm" ><i class="glyphicon glyphicon-edit"></i>&nbsp; Update</button></a>&nbsp;&nbsp;
                    <button class="btn btn-danger btn-sm" onClick="deleteData(<?= $k->id_kamar ?>)"><i class="glyphicon glyphicon-trash"></i>&nbsp; Delete</button>
                  </td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama Ruang</th>
                  <th>Nama Kamar</th>
                  <th>Kapasitas Kamar</th>
                  <th>Keterangan</th>
                  <th width="20%">Actions</th>
                </tr>
                </tfoot>
              </table>
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

  <script>
    function deleteData(id) {
        swal({
          title: "Are you sure?",
          text: "You will not be able to recover this Data!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: 'btn-danger',
          confirmButtonText: 'Yes, delete it!',
          closeOnConfirm: false,
          closeOnCancel: true
        },
        function() {
            $.get('<?php echo base_url('KamarController/softdelete/'); ?>', {id:id}, function(data) {
              if (data == 'succeed') {
                  $('#row-' + id).remove();
                  swal("Deleted!", "Your Data has been deleted!", "success");
              }
            });
        });
    }
    function handleClickUpdate(e){
      e.preventDefault();
    }
  </script>

<?php include "Footer.php"; ?>
