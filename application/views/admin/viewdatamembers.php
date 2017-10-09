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
              <h3 class="box-title">Data Member</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <hr>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Image</th>
                  <th>Fullname</th>
                  <th>Type</th>
                  <th>Location</th>
                  <th>Register Date</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    foreach ($members as $m) {

                    if($m->status == 1)
                    {
                      $mz = "Aktif";
                    }else {
                      $mz = "Non Aktif";
                    }
                  ?>
                <tr id="row-<?= $m->id_user ?>">
                  <td><?php echo $no++ ?></td>
                  <td><img class="profile-user-img img-responsive img-circle" src="assets/dashboard/dist/img/<?php echo $m->image ?>"></td>
                  <td><?php echo $m->name ?></td>
                  <td><?php echo $m->type ?></td>
                  <td><?php echo "$m->namakota, $m->namaprovinsi"; ?></td>
                  <td><?php echo $m->tgl_daftar ?></td>
                  <td><?php echo  $mz ?></td>
                  <td align="center">

                    <?php
                      if($m->status != 1)
                      {
                        echo "<button class='btn btn-danger btn-sm' onClick='deleteData1($m->id_user)'><i class='glyphicon glyphicon-remove'></i>&nbsp; Aktif</button>";
                      }else {
                        echo "<button class='btn btn-danger btn-sm' onClick='deleteData2($m->id_user)'><i class='glyphicon glyphicon-remove'></i>&nbsp; Non Aktif</button>";
                      }
                    ?>

                  </td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Image</th>
                  <th>Fullname</th>
                  <th>Type</th>
                  <th>Location</th>
                  <th>Register Date</th>
                  <th>Status</th>
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
    function deleteData1(id) {
        swal({
          title: "Are you sure?",
          text: "You will not be able to recover this Data!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: 'btn-danger',
          confirmButtonText: 'Yes, Aktif it!',
          closeOnConfirm: false,
          closeOnCancel: true
        },
        function() {
            $.get('<?php echo base_url('MemberController/softdelete/'); ?>', {id:id}, function(data) {
              if (data == 'succeed') {
                  swal("Aktivated!", "Your Data has been adktif!", "success");
              }
            });
        });
    }
    function handleClickUpdate(e){
      e.preventDefault();
    }
  </script>

  <script>
    function deleteData2(id) {
        swal({
          title: "Are you sure?",
          text: "You will not be able to recover this Data!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: 'btn-danger',
          confirmButtonText: 'Yes, Non Aktif it!',
          closeOnConfirm: false,
          closeOnCancel: true
        },
        function() {
            $.get('<?php echo base_url('MemberController/restoredelete/'); ?>', {id:id}, function(data) {
              if (data == 'succeed') {
                  swal("Non Aktivated!", "Your Data has been Non Aktif!", "success");
              }
            });
        });
    }
    function handleClickUpdate(e){
      e.preventDefault();
    }
  </script>

<?php include "Footer.php"; ?>
