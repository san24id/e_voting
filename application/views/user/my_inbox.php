<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        LIST OF REJECTED
      </h1>
    </section>

    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->

          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><center>NO.</center></th>
                  <th>Tanggal Reject</th>
                  <th>Reject Dari</th>
                  <th>Deskripsi</th>
                  <th>Nama Pemohon</th>
                  <th>Note</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 1;
                    foreach ($rejected as $row){
                  ?>
                <tr>
                  <td><center><?php echo $i++; ?></center></td>                  
                  <td><?php echo $row->rejected_date; ?></td>
                  <td><?php echo $row->rejected_by; ?>  </td>
                  <td><?php echo $row->label1;?> </td>
                  <td><?php echo $row->display_name;?> </td>
                  <td><?php echo $row->note;?> </td>
                  <td>
                    <a href="Home/form_view/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a> 
                    <?php if($this->session->userdata("id_user")==$row->id_user){ ?>
                      <button type="button" data-toggle="modal" data-target="#mdldelete" class="btn btn-danger btn-sm" title="Delete" ><i class="glyphicon glyphicon-trash"></i></button>
                        <div class="modal fade" id="mdldelete" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-xl" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title">Message Box</h3>
                            </div>

                            <div class="modal-body">
                            <form>
                            <p align="justify">Apa anda yakin akan menghapus Form SP3 ini : <?=$row->nomor_surat?></p>
                            </div>
                            <div class="modal-footer">                        
                            <button type="button" class="btn btn-success bye" onclick="deletedraftpayment('<?php echo $row->id_payment; ?>')">Yes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </form>
                            </div>
                          </div>
                          </div>
                        </div>                   
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
    <strong>Copyright &copy; 2020 </strong>
  </footer>  

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
 

</div>
<!-- ./wrapper -->

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

  function deletedraftpayment(id)
    {
		$.ajax({
				url : "<?php echo base_url('home/draftpaymentdelete')?>/"+id,
				type: "POST",
				dataType: "JSON",
				success: function(data)
				{
					location.reload();
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error deleting data');
				}
			});
    }
</script>
</body>
</html>
