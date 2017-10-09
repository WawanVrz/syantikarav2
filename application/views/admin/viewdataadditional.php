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
              <h3 class="box-title">Master Data Additional &nbsp;&nbsp;<a href="<?php echo base_url('dashboard/admin/data/additional/add'); ?>"><button class="btn btn-primary tambah-form btn-sm btn-flat" ><i class="fa fa-plus"></i>&nbsp; Tambah Data</button></a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <a href="<?php echo base_url('dashboard/admin/data/additional'); ?>">All (<?php echo $this->session->userdata("jenis_additional_jumlah"); ?>)</a> | <a href="<?php echo base_url('dashboard/admin/data/additional/bin'); ?>">Trash (<?php echo $this->session->userdata("jumlah_sampah_additional"); ?>)</a>
              <hr>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Jenis Additional</th>
                  <th>Jenis Jasa</th>
                  <th width="15%">Harga</th>
                  <th>Keterangan</th>
                  <th>Created At</th>
                  <th width="20%">Actions</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    foreach ($jenis_additional as $jk) {

                      $angka = $jk->harga;
                      $angka_format = number_format($angka,2,",",".");
                  ?>
                <tr id="row-<?= $jk->id_additional ?>">
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $jk->jenis_additional ?></td>
                  <td><?php echo $jk->nama_jasa ?></td>
                  <td><?php echo "Rp ".$angka_format?></td>
                  <td><?php echo $jk->keterangan ?></td>
                  <td><?php echo $jk->created_at ?></td>
                  <td align="center">
                    <a href="<?php echo base_url('dashboard/admin/data/additional/edit/'.$jk->id_additional); ?>"><button class="btn btn-warning btn-sm" ><i class="glyphicon glyphicon-edit"></i>&nbsp; Update</button></a>&nbsp;&nbsp;
                    <button class="btn btn-danger btn-sm" onClick="deleteData(<?= $jk->id_additional ?>)"><i class="glyphicon glyphicon-trash"></i>&nbsp; Delete</button>
                  </td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Jenis Additional</th>
                  <th>Jenis Jasa</th>
                  <th width="15%">Harga</th>
                  <th>Keterangan</th>
                  <th>Created At</th>
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
            $.get('<?php echo base_url('AdditionalController/softdelete/'); ?>', {id:id}, function(data) {
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
