  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DATA SUPPLIER
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
                  <th>Kode Supplier</th>
                  <th>Nama Supplier</th>
                  <th>NPWP</th>
                  <th>Badan Usaha</th>
                  <th>PIC</th>
                  <th>Direktur</th>
                  <th>Alamat</th>
                  <th>Telepon</th>
                  <th>Nama Bank</th>
                  <th>No. Rekening</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 1;
                    foreach ($supplier as $row){
                   ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $row->kode_supplier; ?></td>
                  <td><?php echo $row->nama_supplier; ?></td>
                  <td><?php echo $row->npwp; ?></td>
                  <td><?php echo $row->badan_usaha; ?></td>
                  <td><?php echo $row->pic; ?></td>
                  <td><?php echo $row->direktur; ?></td>
                  <td><?php echo $row->alamat; ?> </td>
                  <td><?php echo $row->telepon; ?> </td>
                  <td><?php echo $row->nama_bank; ?> </td>
                  <td><?php echo $row->no_rek; ?> </td>
                  <td>
                    <?php if($row->id_role_app == 1){ ?>
                      <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#ubah<?php echo $row->id_supplier; ?>">Ubah</button>
                    <?php }else{ ?>
                      <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#ubah<?php echo $row->id_supplier; ?>">Ubah</button>
                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?php echo $row->id_supplier; ?>">Hapus</button>
                    <?php } ?>
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
    <strong>Copyright &copy; 2020 </footer>

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
          <h4 class="modal-title">Tambah Data Supplier</h4>
        </div>
        <div class="modal-body">
          <h5>
            <form id="acc" method="post" action="superadm/addsupplier">
             <table class="table">
                <tr>
                  <th>Kode Supplier</th>
                  <td>:</td>
                  <td><input type="text" name="kode_supplier" class="form-control"></td>
                </tr>
                <tr>
                  <th>Nama Supplier</th>
                  <td>:</td>
                  <td><input type="text" name="nama_supplier" class="form-control"></td>
                </tr>
                <tr>
                  <th>NPWP</th>
                  <td>:</td>
                  <td><input type="text" name="npwp" class="form-control"></td>
                </tr>
                <tr>
                  <th>Badan Usaha</th>
                  <td>:</td>
                  <td><input type="text" name="badan_usaha" class="form-control"></td>
                </tr>
                <tr>
                  <th>PIC</th>
                  <td>:</td>
                  <td><input type="text" name="pic" class="form-control"></td>
                </tr>
                <tr>
                  <th>Direktur</th>
                  <td>:</td>
                  <td><input type="text" name="direktur" class="form-control"></td>
                </tr>
                <tr>
                  <th>Alamat</th>
                  <td>:</td>
                  <td><input type="text" name="alamat" class="form-control"></td>
                </tr>
                <tr>
                  <th>Telepon</th>
                  <td>:</td>
                  <td><input type="text" name="telepon" class="form-control"></td>
                </tr>
                <tr>
                  <th>Nama Bank</th>
                  <td>:</td>
                  <td><input type="text" name="nama_bank" class="form-control"></td>
                </tr>
                <tr>
                  <th>Mata Uang</th>
                  <td>:</td>
                  <td><input type="text" name="mata_uang" class="form-control"></td>
                </tr>
                <tr>
                  <th>No. Rekening</th>
                  <td>:</td>
                  <td><input type="text" name="no_rekening" class="form-control"></td>
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
  foreach ($supplier as $row){
?>

<!-- Modal -->
  <div class="modal fade" id="ubah<?php echo $row->id_supplier; ?>" role="dialog" aria-hidden="true"  tabindex="-1"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ubah Supplier</h4>
           
        </div>
        <div class="modal-body">
          <h5>
            <form id="ganti" method="post" action="superadm/updatesupplier">
              <input type="hidden" name="id_supplier" value="<?php echo $row->id_supplier; ?>">
             <table class="table">  
             <tr>
                <th>Kode Supplier</th>
                <td>:</td>
                <td><input type="text" name="kode_supplier" class="form-control" value="<?php echo $row->kode_supplier; ?>"></td>
                </tr>
            <tr>
                <th>Nama Supplier</th>
                <td>:</td>
                <td><input type="text" name="nama_supplier" class="form-control" value="<?php echo $row->nama_supplier; ?>"></td>
            </tr>
            <tr>
                <th>NPWP</th>
                <td>:</td>
                <td><input type="text" name="npwp" class="form-control" value="<?php echo $row->npwp; ?>"></td>
            </tr>
            <tr>
                <th>Badan Usaha</th>
                <td>:</td>
                <td><input type="text" name="badan_usaha" class="form-control" value="<?php echo $row->badan_usaha; ?>"></td>
                </tr>
            <tr>
                <th>PIC</th>
                <td>:</td>
                <td><input type="text" name="pic" class="form-control" value="<?php echo $row->pic; ?>"></td>
            </tr>
            <tr>
                <th>Direktur</th>
                <td>:</td>
                <td><input type="text" name="direktur" class="form-control" value="<?php echo $row->direktur; ?>"></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>:</td>
                <td><input type="text" name="alamat" class="form-control" value="<?php echo $row->alamat; ?>"></td>
                </tr>
            <tr>
                <th>Telepon</th>
                <td>:</td>
                <td><input type="text" name="telepon" class="form-control" value="<?php echo $row->telepon; ?>"></td>
            </tr>
            <tr>
                <th>Nama Bank</th>
                <td>:</td>
                <td><input type="text" name="nama_bank" class="form-control" value="<?php echo $row->nama_bank; ?>"></td>
            </tr>
            <tr>
                <th>Mata Uang</th>
                <td>:</td>
                <td><input type="text" name="mata_uang" class="form-control" value="<?php echo $row->mata_uang; ?>"></td>
            </tr>
            <tr>
                <th>No. Rekening</th>
                <td>:</td>
                <td><input type="text" name="no_rek" class="form-control" value="<?php echo $row->no_rek; ?>"></td>
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

  <div class="modal fade" id="hapus<?php echo $row->supplier; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">

      <div class="modal-body">
       <p align="justify">Apa kamu yakin akan menghapus Data Supplier ini :  <?=$row->nama_supplier?></p>
       <p> Kode Supplier : <?=$row->kode_supplier?> </p>
      </div>
      <div class="modal-footer">
      <form id="deleted" method="post" action="superadm/deletesupplier">
          <input type="hidden" name="supplier" value="<?php echo $row->supplier; ?>">
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
          // url: "<?php echo base_url("index.php/superadm/addstaff"); ?>", // Isi dengan url/path file php yang dituju       
          data: $("#acc").serialize(), // data yang akan dikirim ke file yang dituju        
          success: function(response){ // Ketika proses pengiriman berhasil          
              $("#tambah").modal('hide'); // Sembunyikan loadingnya   
               location.reload();       
              alert('Create User success')
          }      
      });
    });

  $(".rubah").on('click', function(){
      $.ajax({        
          type: "POST", // Method pengiriman data bisa dengan GET atau POST        
          // url: "<?php echo base_url("index.php/superadm/updatestaff"); ?>", // Isi dengan url/path file php yang dituju       
          data: $("#ganti").serialize(), // data yang akan dikirim ke file yang dituju        
          success: function(response){ // Ketika proses pengiriman berhasil          
              $("#ubah").modal('hide'); // Sembunyikan loadingnya   
               location.reload();       
              alert('Update User success')
          }      
      });
  });  

  $(".bye").on('click', function(){
      $.ajax({        
          type: "POST", // Method pengiriman data bisa dengan GET atau POST        
          // url: "<?php echo base_url("index.php/superadm/deletestaff"); ?>", // Isi dengan url/path file php yang dituju       
          data: $("#deleted").serialize(), // data yang akan dikirim ke file yang dituju        
          success: function(response){ // Ketika proses pengiriman berhasil          
              $("#hapus").modal('hide'); // Sembunyikan loadingnya   
               location.reload();       
              alert('Deleted User success')
          }      
      });
  });  
</script>
</body>