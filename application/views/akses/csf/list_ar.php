<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        LIST OF ADVANCE REQUEST
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
                  <th>NO.</th>
                  <th>Status</th>
                  <th>Tanggal</th>
                  <th>Jenis Pembayaran</th>
                  <th>Nomor Surat</th>
                  <th>Description</th>
                  <th>Pemohon</th>
                  <th>Bank Account</th>
                  <th>Nama Penerima</th>
                  <th>Submitted Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 1;
                    foreach ($advancerequest as $row){
                      $test1 = $row->jenis_pembayaran;                        
                      $test2 = explode(";", $test1);
                      $test3 = count($test2);                        
                  ?>
                <tr>
                  <td><?php echo $i++; ?></td>                  
                  <td><?php 
                          if($row->status == 1){
                              echo "<img src='assets/dashboard/images/legend/green_nobackground.png'>";  
                          }else if($row->status == 2){
                             echo "<img src='assets/dashboard/images/legend/green.png'>";
                          }else if($row->status == 3){
                             echo "<img src='assets/dashboard/images/legend/reject.png'>";
                          }else if($row->status == 4){
                            echo "<img src='assets/dashboard/images/legend/blue_nobackground.png'>";
                          }else if($row->status == 5){
                            echo "<img src='assets/dashboard/images/legend/blue_nobackground.png'>";
                          }else if($row->status == 6){
                            echo "<img src='assets/dashboard/images/legend/blue_nobackground.png'>";
                          }else if($row->status == 7){
                              echo "<img src='assets/dashboard/images/legend/blue_nobackground.png'>";
                          }else if($row->status == 8){
                            echo "<img src='assets/dashboard/images/legend/blue.png'>";
                          }else if($row->status == 9){
                            echo "<img src='assets/dashboard/images/legend/orange.png'>"; 
                          }else if($row->status == 10){
                            echo "<img src='assets/dashboard/images/legend/purple.png'>"; 
                          }   
                        ?>
                  </td>
                  <td><?php echo $row->label3; ?></td>
                  <td><?php                     
                        for($a=0; $a<$test3; $a++){
                          if($test2[$a]){
                            echo $test2[$a]."<br>";
                          }
                        }  ?>
                  </td>
                  <td><?php echo $row->nomor_surat; ?></td>
                  <td><?php echo $row->label1; ?></td>
                  <td><?php echo $row->display_name; ?></td>
                  <td><?php echo $row->akun_bank; ?></td>
                  <td><?php echo $row->penerima; ?></td>
                  <td><?php echo date("d-M-Y", strtotime($row->tanggal)); ?></td>
                  <td>
                    <a href="Home/deletepayment/<?php echo $row->id_payment; ?>"><button class="btn btn-danger btn-sm">Clear</button></a>
                    <a href="Home/form_view/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">Open</button></a>                    
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

</script>
</body>
</html>
