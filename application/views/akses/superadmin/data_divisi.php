  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DATA DIVISI
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
                  <th>Divisi ID</th>
                  <th>Division Name</th>
                  <th>Short Divisi</th>
                  <th>Created BY</th>
                  <th>Date Created</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 1;
                    foreach ($division as $row){
                   ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $row->division_id; ?></td>
                  <td><?php echo $row->division_name; ?></td>
                  <td><?php echo $row->short_division; ?></td>
                  <td><?php echo $row->created_by; ?></td>
                  <td><?php echo $row->created_date; ?></td>
                  <td><?php echo $row->status; ?></td>
                  <td>
                      <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#ubah<?php echo $row->id_div; ?>">Ubah</button>
                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?php echo $row->id_div; ?>">Hapus</button>
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
          <h4 class="modal-title">Tambah Data Divisi</h4>
        </div>
        <div class="modal-body">
          <h5>
            <form id="acc" method="post" action="SuperAdm/adddivisi">
             <table class="table">
              <tr>
                <th>Division ID</th>
                <td>:</td>
                <td><select id="divisi" name="division_id" class="form-control" onchange="chgadd();">
                            <option value="">--Choose--</option>
                            <?php foreach ($getDivisi as $dvs) { ?>
                            <option value="<?php echo $dvs->division_id; ?>"><?php echo $dvs->division_name; ?> - <?php echo $dvs->division_id; ?></option>
                            <?php } ?>                                 
                    </select>
                </td>
              </tr>
              <tr>
                <th>Division Name</th>
                <td>:</td>
                <td><input id="dvs" type="text" name="division_name" class="form-control"></td>
              </tr>
              <tr>
                <th>Short Divisi</th>
                <td>:</td>
                <td><input type="text" name="short_division" class="form-control"></td>
              </tr>
              <tr>
                <th>Status</th>
                <td>:</td>
                <td><input type="text" name="status" class="form-control"></td>
              </tr>
              <input type="hidden" name="created_date" value="<?php echo date("d-M-Y h:i:s");?>" >      
              <input type="hidden" name="created_by" value="<?php echo $this->session->userdata("display_name"); ?>" >      
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
  foreach ($division as $row){
?>

<!-- Modal -->
  <div class="modal fade" id="ubah<?php echo $row->id_div; ?>" role="dialog" aria-hidden="true"  tabindex="-1"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ubah Nama Divisi</h4>
           
        </div>
        <div class="modal-body">
          <h5>
            <form id="ganti" method="post" action="SuperAdm/updatedivisi">
              <input type="hidden" name="id_div" value="<?php echo $row->id_div; ?>">
             <table class="table">  
             <tr>
                <th>Division ID</th>
                <td>:</td>
                <td><select id="divisi2" name="division_id" class="form-control" onchange="chgupdate();">
                        <option value="<?php echo $row->division_id; ?>"><?php echo $row->division_id; ?></option>
                          <option value="">--Choose--</option>
                            <?php foreach ($getDivisi as $dvs) { ?>
                            <option value="<?php echo $dvs->division_id; ?>"><?php echo $dvs->division_name; ?> - <?php echo $dvs->division_id; ?></option>
                            <?php } ?>                                 
                        </select>
                </td>
            </tr>
            <tr>
                <th>Division Name</th>
                <td>:</td>
                <td><input type="text" id="dvs2" name="division_name" class="form-control" value="<?php echo $row->division_name; ?>"></td>
            </tr>
            <tr>
                <th>Short Divisi</th>
                <td>:</td>
                <td><input type="text" name="short_division" class="form-control" value="<?php echo $row->short_division; ?>"></td>
            </tr>
            <tr>
                <th>Status</th>
                <td>:</td>
                <td><input type="text" name="status" class="form-control" value="<?php echo $row->status; ?>"></td>
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

  <div class="modal fade" id="hapus<?php echo $row->id_div; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">

      <div class="modal-body">
       <p align="justify">Apa Anda yakin akan menghapus Data Divisi ini :  <?=$row->division_name?></p>
       <p> Division ID : <?=$row->division_id?> </p>
      </div>
      <div class="modal-footer">
      <form id="deleted" method="post" action="SuperAdm/deletedivisi">
          <input type="hidden" name="id_div" value="<?php echo $row->id_div; ?>">
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
              alert('Create Division success')
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
              alert('Update Division success')
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
              alert('Deleted Division success')
          }      
      });
  });  
</script>

<script>
function chgadd(){
	 if($("#divisi option:selected").val()==""){
		document.getElementById("dvs").value=""; 
	 }else{
		var strdata=$("#divisi option:selected").text().split(" - "); 
		document.getElementById("dvs").value = '' + strdata[1] +''; 
	 }  
}

function chgupdate(){
	 if($("#divisi2 option:selected").val()==""){
		document.getElementById("dvs2").value=""; 
	 }else{
		var strdata=$("#divisi2 option:selected").text().split(" - "); 
		document.getElementById("dvs2").value = '' + strdata[1] +''; 
	 }  
}

</script>
</body>