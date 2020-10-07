<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DATA CORPORATE CREDIT CARD
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
                  <th><center>NO.</center></th>
                  <th>Nama Pemegang Kartu</th>
                  <th>No. Billing</th>
                  <th>Division</th>
                  <th>Nama PIC</th>
                  <th>Target Submission Credit Card</th>
                  <th>Jatuh Tempo</th>
                  <th><center>Credit Card Submission</center></th>
                  <th>Status</th>
				          <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 1;
                    foreach ($creditcard as $row){
                   ?>
                <tr>
                  <td><center><?php echo $i++; ?></center></td>
                  <td><?php echo $row->pemegang_kartu;?></td>
                  <td><?php echo $row->no_billing;?></td>
                  <td><?php echo $row->division_id; ?></td>
                  <td><?php echo $row->nama_pic;?></td>
                  
                  <td><?php echo $row->target_submission;?></td>

                  <td><?php echo $row->tempo; ?></td>
                  <td><center><?php echo $row->jatah; ?></center></td>
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
    <strong> Copyright &copy; 2020 </footer>

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
          <h4 class="modal-title">Tambah Data Corporate Credit Card</h4>
        </div>
        <div class="modal-body">
          <h5>
            <form id="acc" method="post" action="Dashboard/addcc">
             <table class="table">
                <tr>
                  <th>Nama Pemegang Kartu</th>
                    <td>:</td>
                    <td><input id="kartu" type="text" name="pemegang_kartu" class="form-control" required></td>
                </tr>
                <tr>
                  <th>No. Billing</th>
                    <td>:</td>
                    <td><input id="billing" type="number" name="no_billing" class="form-control" required></td>
                </tr>
                <tr>
                  <th>Divisi</th>
                    <td>:</td>
                    <td><select id="divisi" name="division_id" class="form-control">
                            <option value="">--Choose--</option>
                            <?php foreach ($division as $dvs) { ?>
                            <option value="<?php echo $dvs->division_id; ?>"><?php echo $dvs->division_name; ?> - <?php echo $dvs->division_id; ?></option>
                            <?php } ?>                                 
                        </select>
                    </td>
                </tr>
                <tr>
                  <th>Nama PIC</th>
                    <td>:</td>
                    <td><select name="nama_pic" class="form-control">
                            <option value="">--Choose--</option>
                            <?php foreach ($pic as $get) { ?>
                            <option value="<?php echo $get->display_name; ?>"><?php echo $get->display_name; ?> - <?php echo $get->division_id; ?></option>
                            <?php } ?>                                 
                        </select>
                        <input type="hidden" name="id_user">
                    </td>
                </tr>
                <tr>
                  <th>Target Submission Credit Card</th>
                    <td>:</td>
                    <td><input id="target" type="date" name="target_submission" class="form-control" required></td>
                </tr>
                <tr>
                  <th>Jatuh Tempo</th>
                    <td>:</td>
                    <td><input id="tempo" type="date" name="tempo" class="form-control" required></td>
                </tr>
                <tr>
                  <th>Credit Card Submission</th>
                    <td>:</td>
                    <td><input id="cc" type="number" name="jatah" class="form-control" required min=0></td>
                </tr>
				        <tr>
                  <th>Status (Aktif/Non-Aktif)</th>
                  <td>:</td>
                  <td><select id="statusadd" name="statusadd" class="form-control" required>
                            <option value="Aktif">Aktif</option>
                            <option value="Non-Aktif">Non-Aktif</option>                               
                        </select></td>
                </tr>
             </table>
          </h5>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success third" id="nambah">Add</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </form>
        </div>
      </div>
      
    </div>
  </div>

<?php 
  foreach ($creditcard as $row){
?>

<!-- Modal -->
  <div class="modal fade" id="ubah<?php echo $row->id_div; ?>" role="dialog" aria-hidden="true"  tabindex="-1"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ubah Data Corporate Credit Card</h4>           
        </div>
        <div class="modal-body">
          <h5>
            <form id="ganti" method="post" action="Dashboard/updatecc">
            <input type="hidden" name="id_div" value="<?php echo $row->id_div; ?>">
             <table class="table">
                <tr>
                  <th>Nama Pemegang Kartu</th>
                  <td>:</td>
                  <td><input type="text" name="pemegang_kartu" class="form-control" value="<?php echo $row->pemegang_kartu; ?>"></td>
                </tr>
                <tr>
                  <th>No. Billing</th>
                  <td>:</td>
                  <td><input type="number" name="no_billing" class="form-control" value="<?php echo $row->no_billing; ?>"></td>
                </tr>
                <tr>
                  <th>Divisi</th>
                  <td>:</td>
                  <td><select name="division_id" class="form-control">
                            <option value="<?php echo $row->division_id;?>"><?php echo $row->division_id;?></option>
                            <option value="">--Choose--</option>
                            <?php foreach ($division as $dvs) { ?>
                            <option value="<?php echo $dvs->division_id; ?>"><?php echo $dvs->division_name; ?> - <?php echo $dvs->division_id; ?></option>
                            <?php } ?>                                 
                        </select></td>
                </tr>
                <tr>
                  <th>Nama PIC</th>
                  <td>:</td>
                  <td><select name="nama_pic" class="form-control">
                          <option value="<?php echo $row->nama_pic;?>"><?php echo $row->nama_pic;?></option>
                          <option value="">--Choose--</option>
                            <?php foreach ($pic as $get) { ?>
                            <option value="<?php echo $get->display_name; ?>"><?php echo $get->display_name; ?> - <?php echo $get->division_id; ?></option>
                            <?php } ?>                                 
                        </select>
                        <input type="hidden" name="id_user" value="<?php echo $row->id_user; ?>">
                  </td>
                </tr>
                <tr>
                  <th>Target Submission Credit Card</th>
                  <td>:</td>
                  <td><input type="text" id="utarget" name="target_submission" class="form-control" value="<?php echo $row->target_submission; ?>"></td>
                </tr>
                <tr>
                  <th>Jatuh Tempo</th>
                  <td>:</td>
                  <td><input type="text" id="utempo" name="tempo" class="form-control" value="<?php echo $row->tempo; ?>"></td>
                </tr>
                <tr>
                  <th>Credit Card Submission</th>
                  <td>:</td>
                  <td><input type="number" name="jatah" class="form-control" value="<?php echo $row->jatah; ?>" required min=0></td>
                </tr>
				        <tr>
                  <th>Status (Aktif/Non-Aktif)</th>
                  <td>:</td>
				          <td><select id="statusupd" name="statusupd" class="form-control" required>
                            <?php 
                                $selected1='';
                                $selected2='';
                                if($row->status=='Aktif'){
                                  $selected1='selected';
                                  $selected2='';		
                                }else{
                                  $selected1='';
                                  $selected2='selected';
                                }
                              ?>
                              <option value="Aktif" <?php echo $selected1; ?>>Aktif</option>
                              <option value="Non-Aktif" <?php echo $selected2; ?>>Non-Aktif</option>                               
                      </select></td>
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
       <p align="justify">Apa Anda yakin akan menghapus dengan Data Corporate Credit Card ini? </p>
       <p> Divisi : <?=$row->division_id?> </p>
      </div>
      <div class="modal-footer">
      <form id="deleted" method="post" action="Dashboard/deletecc">
          <input type="hidden" name="id_div" value="<?php echo $row->id_div; ?>">
          <button type="submit" class="btn btn-success bye">Yes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<!-- jQuery 2.2.3 
<script src="<?php echo base_url(); ?>assets/dashboard/plugins/jQuery/jquery-2.2.3.min.js"></script>-->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>assets/dashboard/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/dashboard/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/dashboard/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/dashboard/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dashboard/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dashboard/dist/js/demo.js"></script>
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
</script>
<script>
  $("#nambah").on('click', function(){
      var acc = $('#acc').val();
      $.ajax({        
          type: "POST", // Method pengiriman data bisa dengan GET atau POST        
          // url: "<?php echo base_url("index.php/superadm/addstaff"); ?>", // Isi dengan url/path file php yang dituju       
          data: $("#acc").serialize(), // data yang akan dikirim ke file yang dituju        
          success: function(response){ // Ketika proses pengiriman berhasil          
              $("#tambah").modal('hide'); // Sembunyikan loadingnya               
              location.reload();       
              alert('Create Data Corporate Credit Card Success!')
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
              alert('Update Data Corporate Credit Card Success!')
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
              alert('Deleted Data Corporate Credit Card Success!')
          }      
      });
  });  
  
  $( "#target" ).datepicker({
		dateFormat: "dd/mm/yy"
	});	
	
	$('#target').keydown(function (event) {
		event.preventDefault();
	});
	
	 $( "#tempo" ).datepicker({
		dateFormat: "dd/mm/yy"
	});	
	
	$('#tempo').keydown(function (event) {
		event.preventDefault();
	});
	
	$( "#utarget" ).datepicker({
		dateFormat: "dd/mm/yy"
	});	
	
	$('#utarget').keydown(function (event) {
		event.preventDefault();
	});
	
	 $( "#utempo" ).datepicker({
		dateFormat: "dd/mm/yy"
	});	
	
	$('#utempo').keydown(function (event) {
		event.preventDefault();
	});
</script>
</body>