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
              <h3 class="box-title">Master Data Ruang &nbsp;&nbsp;<a href="<?php echo base_url('dashboard/admin/data/ruang/add'); ?>"><button class="btn btn-primary tambah-form btn-sm btn-flat" ><i class="fa fa-plus"></i>&nbsp; Tambah Data</button></a></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <a href="<?php echo base_url('dashboard/admin/data/ruang'); ?>">All (<?php echo $this->session->userdata("jenis_ruang_jumlah"); ?>)</a> | <a href="<?php echo base_url('dashboard/admin/data/ruang/bin'); ?>">Trash (<?php echo $this->session->userdata("jumlah_sampah_ruang"); ?>)</a>
              <hr>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Ruang</th>
                  <th>Type</th>
                  <th width="25%">Keterangan</th>
                  <th>Created At</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    foreach ($jenis_ruang as $jr)
                    {
                      $tipe = $jr->type;
                      if($tipe == "NK")
                      {
                          $tipe1 = "Non Kamar";
                      }
                      elseif ($tipe == "K") {
                          $tipe1 = "Kamar";
                      }
                      elseif ($tipe == "KNT") {
                          $tipe1 = "Kantor";
                      }
                      else {
                          $tipe1 = "Ruang Makan";
                      }
                  ?>
                <tr id="row-<?= $jr->id ?>">
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $jr->nama_ruang ?></td>
                  <td><?php echo $tipe1 ?></td>
                  <td><?php echo $jr->keterangan ?></td>
                  <td><?php echo $jr->created_at ?></td>
                  <td align="center">
                    <a href="<?php echo base_url('dashboard/admin/data/ruang/edit/'.$jr->id); ?>"><button class="btn btn-warning btn-sm" ><i class="glyphicon glyphicon-edit"></i>&nbsp; Update</button></a>&nbsp;&nbsp;
                    <button class="btn btn-danger btn-sm" onClick="deleteData(<?= $jr->id ?>)"><i class="glyphicon glyphicon-trash"></i>&nbsp; Delete</button>
                  </td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama Ruang</th>
                  <th>Type</th>
                  <th>Keterangan</th>
                  <th>Created At</th>
                  <th>Actions</th>
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
            $.get('<?php echo base_url('RuangController/softdelete/'); ?>', {id:id}, function(data) {
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
