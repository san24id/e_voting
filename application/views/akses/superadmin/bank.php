  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        BANK ACCOUNT
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->

          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah">Tambah</button>
                <br><br>
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO.</th>
                  <th>Nama Bank</th>
                  <th>Alias</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 1;
                    foreach ($bank as $row){
                   ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $row->nama_bank; ?></td>
                  <td><?php echo $row->singkatan; ?></td>
                  <td>
                      <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#ubah<?php echo $row->id_bank; ?>">Ubah</button>
                      <!-- <a href="SuperAdm/deletecurr/<?php echo $row->id_bank; ?>"><button class="btn btn-danger btn-sm">Hapus</button> -->
                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?php echo $row->id_bank; ?>">Hapus</button>
                  </td>
                </tr>
              <?php } ?>
              </tbody>
              </table>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>

      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
     
    </div>
    <strong>Copyright &copy; 2019 </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <!--<li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>-->
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
       
       
        <!-- /.control-sidebar-menu -->

     
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->

      <!-- Settings tab content -->
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- Modal -->
  <div class="modal fade" id="tambah" role="dialog" aria-hidden="true"  tabindex="-1"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Bank Account</h4>
        </div>
        <div class="modal-body">
          <h5>
            <form id="acc" method="post" action="superadm/addbank">
             <table class="table">
                <tr>
                  <th>Nama Bank</th>
                  <td>:</td>
                  <td><input type="text" name="nama_bank" class="form-control"></td>
                </tr>
                <tr>
                  <th>Alias</th>
                  <td>:</td>
                  <td><input type="text" name="singkatan" class="form-control"></td>
                </tr>
             </table>
          </h5>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" id="nambah">Add</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </form>
        </div>
      </div>
      
    </div>
  </div>

<?php 
  foreach ($bank as $row){
?>

<!-- Modal -->
  <div class="modal fade" id="ubah<?php echo $row->id_bank; ?>" role="dialog" aria-hidden="true"  tabindex="-1"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ubah Bank Account</h4>
           
        </div>
        <div class="modal-body">
          <h5>
            <form id="ganti" method="post" action="superadm/updatebank">
              <input type="hidden" name="id_bank" value="<?php echo $row->id_bank; ?> ?>">
             <table class="table">
             <table class="table">
                <tr>
                  <th>Nama Bank</th>
                  <td>:</td>
                  <td><input type="text" name="nama_bank" class="form-control" value="<?php echo $row->nama_bank; ?>"></td>
                </tr>
                <tr>
                  <th>Alias</th>
                  <td>:</td>
                  <td><input type="text" name="singkatan" class="form-control" value="<?php echo $row->singkatan; ?>"></td>
                </tr>
             </table>
          </h5>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success rubah" >Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </form>
        </div>
      </div>
      
    </div>
  </div>

<div class="modal fade" id="hapus<?php echo $row->id_bank; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">

      <div class="modal-body">
       <p align="justify">Apa kamu yakin akan menghapus Bank Account ini :  <?=$row->nama_bank?></p>
      </div>
      <div class="modal-footer">
      <form id="deleted" method="post" action="superadm/deletebak">
          <input type="hidden" name="id_bank" value="<?php echo $row->id_bank; ?> ?>">
          <button type="submit" class="btn btn-success bye">Yes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<!-- jQuery 2.2.3 -->
<script src="assets/dashboard/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="assets/dashboard/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="assets/dashboard/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/dashboard/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="assets/dashboard/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="assets/dashboard/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="assets/dashboard/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dashboard/dist/js/demo.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });

  $("#nambah").on('click', function(){
      $.ajax({        
          type: "POST", // Method pengiriman data bisa dengan GET atau POST        
          // url: "<?php echo base_url("index.php/superadm/addcurr"); ?>", // Isi dengan url/path file php yang dituju       
          data: $("#acc").serialize(), // data yang akan dikirim ke file yang dituju        
          success: function(response){ // Ketika proses pengiriman berhasil          
              $("#tambah").modal('hide'); // Sembunyikan loadingnya   
               location.reload();       
              alert('Create Mata Uang success')
          }      
      });
    });

  $(".rubah").on('click', function(){
      $.ajax({        
          type: "POST", // Method pengiriman data bisa dengan GET atau POST        
          // url: "<?php echo base_url("index.php/superadm/updatecurr"); ?>", // Isi dengan url/path file php yang dituju       
          data: $("#ganti").serialize(), // data yang akan dikirim ke file yang dituju        
          success: function(response){ // Ketika proses pengiriman berhasil          
              $("#ubah").modal('hide'); // Sembunyikan loadingnya   
               location.reload();       
              alert('Update Mata Uang success')
          }      
      });
  });  

  $(".bye").on('click', function(){
      $.ajax({        
          type: "POST", // Method pengiriman data bisa dengan GET atau POST        
          // url: "<?php echo base_url("index.php/superadm/deletecurr"); ?>", // Isi dengan url/path file php yang dituju       
          data: $("#deleted").serialize(), // data yang akan dikirim ke file yang dituju        
          success: function(response){ // Ketika proses pengiriman berhasil          
              $("#hapus").modal('hide'); // Sembunyikan loadingnya   
               location.reload();       
              alert('Deleted Mata Uang success')
          }      
      });
  });  
</script>
</body>