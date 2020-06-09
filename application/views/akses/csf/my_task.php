<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php 
      if($this->session->userdata("username") == "n.prasetyaningrum"){ ?>
    <section class="content-header">
      <h1>
        INCOMING DOCUMENT
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
                  <th>CSF</th>
                  <th>SP3 No</th>
                  <th>Jenis Pembayaran</th>
                  <th>SP3 Submitted Date</th>
                  <th>Description</th>
                  <th>Pemohon</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 1;
                    foreach ($mytask as $row){
                      $test1 = $row->dsc;                        
                      $test2 = explode(";", $test1);
                      $test3 = count($test2);                        
                  ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td> <?php 
                          if($row->status == 1){
                              echo "<img src='assets/dashboard/images/legend/green_nobackground.png'>";  
                          }else if($row->status == 2){
                             echo "<img src='assets/dashboard/images/legend/green.png'>";
                          }else if($row->status == 3){
                             echo "<img src='assets/dashboard/images/legend/rejected.png'>";
                          }else if($row->status == 4){
                            echo "<img src='assets/dashboard/images/legend/tax1.png'>";
                          }else if($row->status == 5){
                            echo "<img src='assets/dashboard/images/legend/finance1.png'>";
                          }else if($row->status == 6){
                            echo "<img src='assets/dashboard/images/legend/review1.png'>";
                          }else if($row->status == 7){
                              echo "<img src='assets/dashboard/images/legend/blue.png'>";
                          }else if($row->status == 8){
                            echo "<img src='assets/dashboard/images/legend/yellow.png'>";
                          }else if($row->status == 9){
                            echo "<img src='assets/dashboard/images/legend/purple.png'>"; 
                          }else if($row->status == 10){
                            echo "<img src='assets/dashboard/images/legend/purple.png'>"; 
                          }  

                        ?>
                    </td>
                    <td><?php echo $row->nomor_surat; ?></td>
                    <td><?php                     
                        for($a=0; $a<$test3; $a++){
                          if($test2[$a]){
                            echo $test2[$a]."<br>";
                          }
                        }  ?>
                    </td>
                    <td><?php echo $row->tanggal; ?></td>
                    <td><?php echo $row->label1; ?></td>
                    <td><?php echo $row->display_name; ?></td>
                    <td>
                        <a href="dashboard/form_sp3/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>
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
    <?php } ?>
    
    <section class="content-header">
      <h1>
        Waiting For APF Processing
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
                <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO.</th>
                  <th>CSF</th>
                  <th>SP3 No</th>
                  <th>Jenis Pembayaran</th>
                  <th>SP3 Submitted Date</th>
                  <th>Description</th>
                  <th>Pemohon</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 1;
                    foreach ($mytask1 as $row){
                      $test11 = $row->dsc;                        
                      $test22 = explode(";", $test11);
                      $test33 = count($test22);                        
                      ?>  
                  <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php 
                          // if($row->status == 2){
                          //   echo "Waiting for processing/ Submitted by users";
                          // }else 
                          if($row->status == 4){
                            echo "<img src='assets/dashboard/images/legend/tax1.png'>";
                          }else if($row->status == 5){
                            echo "<img src='assets/dashboard/images/legend/finance1.png'>";
                          }else if($row->status == 6){
                            echo "<img src='assets/dashboard/images/legend/review1.png'>";
                          }else if($row->status == 7){
                              echo "<img src='assets/dashboard/images/legend/blue.png'>";
                          }else if($row->status == 8){
                            echo "<img src='assets/dashboard/images/legend/yellow.png'>";
                          }else if($row->status == 9){
                            echo "<img src='assets/dashboard/images/legend/purple.png'>"; 
                          }else if($row->status == 10){
                            echo "<img src='assets/dashboard/images/legend/purple.png'>"; 
                          }
                        ?>
                  </td>                        
                  <td><?php echo $row->nomor_surat; ?> </td>
                  <td><?php                     
                        for($b=0; $b<$test33; $b++){
                          if($test22[$b]){
                            echo $test22[$b]."<br>";
                          }
                        }  ?> 
                  </td>
                  <td><?php echo $row->tanggal;?></td>
                  <td><?php echo $row->label1; ?></td>
                  <td><?php echo $row->display_name; ?></td>
                  <td>
                    <?php if ($row->status <= 5) { ?>
                    <a href="dashboard/form_sp3/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>
                    <?php } ?>
                    <?php if ($row->status == 6 || $row->status == 7 || $row->status == 8) { ?>   
                      <?php if ($row->jenis_pembayaran == 1) { ?>   
                        <a href="Dashboard/form_vprf/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>
                      <?php } ?>
                      <?php if ($row->jenis_pembayaran == 2) { ?> 
                        <a href="Dashboard/form_varf/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>
                      <?php } ?>
                      <?php if ($row->jenis_pembayaran == 3) { ?> 
                        <a href="Dashboard/form_vasf/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>                    
                      <?php } ?>
                      <?php if ($row->jenis_pembayaran == 4) { ?> 
                        <a href="Dashboard/form_vcrf/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>                    
                      <?php } ?>
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
    </section>  

    <?php 
      if($this->session->userdata("username") == "n.prasetyaningrum"){ ?>                    
    <section class="content-header">
      <h1>
        APF READY TO PRINT
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
                <table id="example" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>NO.</th>
                    <th>Status</th>
                    <th>SP3 No</th>
                    <th>APF No</th>
                    <th>APF Created Date</th>
                    <th>Jenis Pembayaran</th>
                    <th>Description</th>
                    <th>Divisi Pemohon</th>
                    <th>Currency</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 1;
                    foreach ($mytask2 as $row){
                      $test11 = $row->apf;                        
                      $test22 = explode(";", $test11);
                      $test33 = count($test22);                        
                      ?>  
                  <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php 
                          // if($row->status == 2){
                          //   echo "Waiting for processing/ Submitted by users";
                          // }else 
                          if($row->status == 4){
                            echo "<img src='assets/dashboard/images/legend/tax1.png'>";
                          }else if($row->status == 5){
                            echo "<img src='assets/dashboard/images/legend/finance1.png'>";
                          }else if($row->status == 6){
                            echo "<img src='assets/dashboard/images/legend/review1.png'>";
                          }else if($row->status == 7){
                              echo "<img src='assets/dashboard/images/legend/blue.png'>";
                          }else if($row->status == 8){
                            echo "<img src='assets/dashboard/images/legend/yellow.png'>";
                          }else if($row->status == 9){
                            echo "<img src='assets/dashboard/images/legend/purple.png'>"; 
                          }else if($row->status == 10){
                            echo "<img src='assets/dashboard/images/legend/purple.png'>"; 
                          }
                        ?>
                  </td>                        
                  <td><?php echo $row->nomor_surat; ?> </td>
                  <td><?php echo $row->apf_doc;?> </td>
                  <td><?php echo $row->tanggal; ?></td>
                  <td><?php                     
                        for($b=0; $b<$test33; $b++){
                          if($test22[$b]){
                            echo $test22[$b]."<br>";
                          }
                        }  ?> 
                  </td>
                  <td><?php echo $row->description; ?></td>
                  <td><?php echo $row->division_id; ?></td>
                  <td><?php echo $row->currency; ?></td>
                  <td><?php echo $row->jumlah; ?> </td>
                  <td>
                    
                    <?php if ($row->status == 8) { ?>   
                      <?php if ($row->jenis_pembayaran == 1) { ?>   
                        <a href="Dashboard/report_prf/<?php echo $get->id_payment; ?>" target="_blank" role="button" class="btn btn-danger">Print</a>            
                      <?php } ?>
                      <?php if ($row->jenis_pembayaran == 2) { ?> 
                        <a href="Dashboard/report_arf/<?php echo $get->id_payment; ?>" target="_blank" role="button" class="btn btn-danger">Print</a>            
                      <?php } ?>
                      <?php if ($row->jenis_pembayaran == 3) { ?> 
                        <a href="Dashboard/report_asf/<?php echo $get->id_payment; ?>" target="_blank" role="button" class="btn btn-danger">Print</a>                                
                      <?php } ?>
                      <?php if ($row->jenis_pembayaran == 4) { ?> 
                        <a href="Dashboard/report_crf/<?php echo $get->id_payment; ?>" target="_blank" role="button" class="btn btn-danger">Print</a>                                
                      <?php } ?>
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
    <?php } ?>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12 col-md-4">
          <!-- /.box -->
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
            
                <table id="" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 10%">NO.</th>
                  <th style="width: 10%">Status</th>
                  <th>Keterangan</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1</td>
                  <td><img src="assets/dashboard/images/legend/finance1.png"></td>
                  <td>Proceed On Finance</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td><img src="assets/dashboard/images/legend/tax1.png"></td>
                  <td>Proceed On Tax</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td><img src="assets/dashboard/images/legend/review1.png"></td>
                  <td>Proceed On Review</td>
                </tr>
                <tr>
                  <td>4</td>
                  <td><img src="assets/dashboard/images/legend/blue.png"></td>
                  <td>Proceed On Verification</td>
                </tr>
              </tbody>
              </table>
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
    $("#example").DataTable();
    $("#example1").DataTable();
    $("#example2").DataTable();
    $('#example3').DataTable({
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
