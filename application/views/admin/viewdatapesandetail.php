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
              <h3 class="box-title">Data Detail Pesan </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php
              foreach ($pesandetail as $p)
              {
              ?>
              <table class="table table-bordered table-striped">
                <tr>
                  <td width="15%"> Fullname </td>
                  <td width="2%"> : </td>
                  <td> <?php echo $p->fullname ?> </td>
                </tr>
                <tr>
                  <td width="15%"> Email </td>
                  <td width="2%"> : </td>
                  <td> <?php echo $p->email ?> </td>
                </tr>
                <tr>
                  <td width="15%"> Subject </td>
                  <td width="2%"> : </td>
                  <td> <?php echo $p->subject ?> </td>
                </tr>
                <tr>
                  <td width="15%"> Message </td>
                  <td width="2%"> : </td>
                  <td> <?php echo $p->message ?> </td>
                </tr>
                <tr>
                  <td width="15%"> Status </td>
                  <td width="2%"> : </td>
                  <td> <?php echo $p->status ?> </td>
                </tr>
                <tr>
                  <td width="15%"> Date </td>
                  <td width="2%"> : </td>
                  <td> <?php echo $p->created_at ?> </td>
                </tr>
              </table>
              <br>
              <a href="<?php echo base_url('dashboard/admin/data/pesan'); ?>"><button class="btn btn-success btn-sm"><i class="fa fa-chevron-left"></i>&nbsp; Back To Message</button></a>
              <?php if($p->status != "read"){ ?>
                <button class="btn btn-danger btn-sm" onClick='ProsesData(<?= $p->id_pesan ?>)'><i class="glyphicon glyphicon-remove"></i>&nbsp; Read</button>
              <?php } ?>
            </div>
            <?php } ?>
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
              window.location.href = "dashboard/admin/data/pesan";
            });
        });
    }
    function handleClickUpdate(e){
      e.preventDefault();
    }
  </script>

<?php include "Footer.php"; ?>
