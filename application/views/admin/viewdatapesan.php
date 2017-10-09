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
              <h3 class="box-title">Data Kontak Pesan </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <a href="<?php echo base_url('dashboard/admin/data/pesan'); ?>">All (<?php echo $this->session->userdata("pesan_jumlah"); ?>)</a> | <a href="<?php echo base_url('dashboard/admin/data/pesan/bin'); ?>">Trash (<?php echo $this->session->userdata("jumlah_sampah_pesan"); ?>)</a>
              <hr>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Fullname</th>
                  <th>Email</th>
                  <th width="15%">Subject</th>
                  <th>Pesan</th>
                  <th>Status</th>
                  <th width="5%">Date </th>
                  <th width="15%">Actions</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    foreach ($pesan as $p)
                    {
                  ?>
                <tr id="row-<?= $p->id_pesan ?>">
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $p->fullname ?></td>
                  <td><?php echo $p->email ?></td>
                  <td><?php echo $p->subject ?></td>
                  <td><?php echo $p->message ?></td>
                  <td><?php echo $p->status ?></td>
                  <td><?php echo $p->created_at ?></td>
                  <td align="center">
                    <table>
                      <tr>
                        <td><button class="btn btn-danger btn-sm" onClick="deleteData(<?= $p->id_pesan ?>)"><i class="glyphicon glyphicon-trash"></i>&nbsp; Delete</button></td>
                        <td width="5%"> </td>
                        <?php if($p->status != "read"){ ?>
                        <td><button class='btn btn-danger btn-sm' onClick='ProsesData(<?= $p->id_pesan ?>)'><i class='glyphicon glyphicon-remove'></i>&nbsp; Read</button</td>
                        <?php }else { ?>
                          <td width="50%"> </td>
                        <?php } ?>
                      </tr>
                    </table>
                  </td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Fullname</th>
                  <th>Email</th>
                  <th>Subject</th>
                  <th>Pesan</th>
                  <th>Status</th>
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
            $.get('<?php echo base_url('PesanController/softdelete/'); ?>', {id:id}, function(data) {
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

  <script>
    function ProsesData(id) {
        swal({
          title: "Are you sure?",
          text: "You will Process this Data!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: 'btn-success',
          confirmButtonText: 'Yes, Process it!',
          closeOnConfirm: false,
          closeOnCancel: true
        },
        function() {
            $.get('<?php echo base_url('PesanController/prosesstatus/'); ?>', {id:id}, function(data) {
              if (data == 'succeed') {
                  swal("Process That!", "Your Data has been Process!", "success");
              }
              window.location.reload();
            });
        });
    }
    function handleClickUpdate(e){
      e.preventDefault();
    }
  </script>

<?php include "Footer.php"; ?>
