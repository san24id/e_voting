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
                  <th>Tanggal Submit SP3</th>
                  <th>Deskripsi</th>
                  <th>Pemohon</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 1;
                    foreach ($mytask as $row){
                      $test1 = $row->jenis_pembayaran;                        
                      $test2 = explode(";", $test1);
                      $test3 = count($test2);                        
                  ?>
                <tr>
                    <td><center><?php echo $i++; ?></center></td>
                    <td><center> <?php if($row->status == 0){
                            echo "<img src='assets/dashboard/images/legend/draft.png'>";  
                          }else if($row->status == 1){
                            echo "<img src='assets/dashboard/images/legend/draftprint.png'>";  
                          }else if($row->status == 11){
                            echo "<img src='assets/dashboard/images/legend/draftprint.png'>";  
                          }else if($row->status == 99){
                            echo "<img src='assets/dashboard/images/legend/draftprint.png'>";  
                          }else if($row->status == 2){
                            echo "<img src='assets/dashboard/images/legend/submitted.png'>";
                          }else if($row->status == 3){
                            echo "<img src='assets/dashboard/images/legend/draftprint.png'>";
                          }else if($row->status == 4){
                            echo "<img src='assets/dashboard/images/legend/processing.png'>";
                          }else if($row->status == 5){
                            echo "<img src='assets/dashboard/images/legend/processing.png'>";
                          }else if($row->status == 6){
                            echo "<img src='assets/dashboard/images/legend/processing.png'>";
                          }else if($row->status == 7){
                            echo "<img src='assets/dashboard/images/legend/processing.png'>";
                          }else if($row->status == 8){
                            echo "<img src='assets/dashboard/images/legend/verified.png'>";
                          }else if($row->status == 9){
                            echo "<img src='assets/dashboard/images/legend/approved.png'>"; 
                          }else if($row->status == 10){
                            echo "<img src='assets/dashboard/images/legend/paid1.png'>"; 
                          }   
                        ?></center>
                    </td>
                    <td><?php echo $row->nomor_surat; ?></td>
                    <td><?php                     
                        for($a=0; $a<$test3; $a++){
                          if($test2[$a]){
                            echo $test2[$a]."<br>";
                          }
                        }  ?>
                    </td>
                    <td><?php echo $row->submit_date; ?></td>
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
            <div class="box-footer">  
              <div class="form-group">
                <label class="control-label col-md-1"><i>Legend</i></label> <br>
                <div class='col-md-1'><img src='assets/dashboard/images/legend/submitted.png'> &nbsp;Submitted</div>
                <div class='col-md-1'><img src='assets/dashboard/images/legend/processing.png'> &nbsp;Processing</div>
                <div class='col-md-1'><img src='assets/dashboard/images/legend/verified.png'> &nbsp;Verified</div>
                <div class='col-md-1'><img src='assets/dashboard/images/legend/approved.png'> &nbsp;Approved</div>
                <div class='col-md-1'><img src='assets/dashboard/images/legend/paid1.png'> &nbsp;Paid</div>	
              </div>  
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
                  <th>Status CSF</th>
                  <th>Nomor SP3</th>
                  <th>Jenis Pembayaran</th>
                  <th>Tanggal Submit SP3</th>
                  <th>Deskripsi</th>
                  <th>Nama Pemohon</th>
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
                  <td><center><?php echo $i++; ?></center></td>
                  <td><center><?php 
                          // if($row->status == 2){
                          //   echo "Waiting for processing/ Submitted by users";
                          // }else 
                          if($row->status == 4){
                            echo "<img src='assets/dashboard/images/legend/icon_tax.png'>";
                          }else if($row->status == 5){
                            echo "<img src='assets/dashboard/images/legend/icon_finance.png'>";
                          }else if($row->status == 6){
                            echo "<img src='assets/dashboard/images/legend/icon_file.png'>";
                          }else if($row->status == 7){
                              echo "<img src='assets/dashboard/images/legend/icon_file.png'>";
                          }else if($row->status == 8){
                            echo "<img src='assets/dashboard/images/legend/icon_checklist.png'>";
                          }else if($row->status == 9){
                            echo "<img src='assets/dashboard/images/legend/icon_user.png'>"; 
                          }else if($row->status == 10){
                            echo "<img src='assets/dashboard/images/legend/paid1.png'>"; 
                          }
                        ?></center>
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

                    <?php 
                      if ($row->status <= 5) { ?>
                        <a href="Dashboard/form_sp3/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>
                    <?php } ?>
                     <?php if ($row->status == 6 || $row->status == 7 || $row->status == 8) { ?>                         
                      <?php if ($row->jenis_pembayaran == 2) { ?> 
                        <a href="Dashboard/form_varf/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>
                      <?php } ?>
                      <?php if ($row->jenis_pembayaran == 3) { ?> 
                        <a href="Dashboard/form_vasf/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>                    
                      <?php } ?>
                      <?php if ($row->jenis_pembayaran == 4 || $row->jenis_pembayaran == 6) { ?>   
                        <a href="Dashboard/form_vprf/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>
                      <?php } ?>
                      <?php if ($row->jenis_pembayaran == 5) { ?> 
                        <a href="Dashboard/form_vcrf/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>                    
                      <?php } ?>
                    <?php } ?>

                    <?php 
                        if($row->status == 5 && $row->rejected_by != NULL){ ?>
                      
                      <?php if ($row->jenis_pembayaran == 2) { ?> 
                        <a href="Dashboard/form_earf/<?php echo $row->id_payment; ?>"><button class="btn btn-danger btn-sm">Edit</button></a>
                      <?php } ?>

                      <?php if ($row->jenis_pembayaran == 3) { ?> 
                        <?php if ($row->currency2 == "" && $row->currency3 == "") { ?>                                  
                          <a href="Dashboard/form_easf/<?php echo $row->id_payment; ?>"><button class="btn btn-danger btn-sm">Edit</button></a>
                        <?php } ?>
                        <?php if ($row->currency2 != "" || $row->currency3 != ""){ ?>
                          <a href="Dashboard/form_easf2/<?php echo $row->id_payment; ?>"><button class="btn btn-danger btn-sm">Edit</button></a> 
                        <?php } ?>                      
                      <?php } ?>

                      <?php if ($row->jenis_pembayaran == 4 || $row->jenis_pembayaran == 6 ) { ?>   
                        <a href="Dashboard/form_eprf/<?php echo $row->id_payment; ?>"><button class="btn btn-danger btn-sm">Edit</button></a>
                      <?php } ?>

                      <?php if ($row->jenis_pembayaran == 5) { ?> 
                        <a href="Dashboard/form_ecrf/<?php echo $row->id_payment; ?>"><button class="btn btn-danger btn-sm">Edit</button></a>                    
                      <?php } ?>  
                    <?php } ?>  
                  </td>      
                  </tr>
                    <?php } ?>      
              </tbody>
              </table>
            </div>
            <div class="box-footer">  
              <div class="form-group">
                <label class="control-label col-md-1"><i>Legend</i></label> <br>
                <div class='col-md-2'><img src='assets/dashboard/images/legend/tax12.png'> &nbsp;Processing Tax</div>
                <div class='col-md-2'><img src='assets/dashboard/images/legend/finance12.png'> &nbsp;Processing Finance</div>
                <div class='col-md-2'><img src='assets/dashboard/images/legend/review12.png'> &nbsp;Waiting For Review</div>
                <div class='col-md-2'><img src='assets/dashboard/images/legend/verified12.png'> &nbsp;Waiting For Verified</div>
              </div>  
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
                    <th>Nomor SP3</th>
                    <th>Nomor APF</th>
                    <th>Jenis Pembayaran</th>
                    <th>Deskripsi</th>
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
                  <td><center><?php echo $i++; ?></center></td>
                  <td><center><?php 
                          // if($row->status == 2){
                          //   echo "Waiting for processing/ Submitted by users";
                          // }else 
                          if($row->status == 4){
                            echo "<img src='assets/dashboard/images/legend/icon_tax.png'>";
                          }else if($row->status == 5){
                            echo "<img src='assets/dashboard/images/legend/icon_finance.png'>";
                          }else if($row->status == 6){
                            echo "<img src='assets/dashboard/images/legend/icon_finance.png'>";
                          }else if($row->status == 7){
                              echo "<img src='assets/dashboard/images/legend/icon_file.png'>";
                          }else if($row->status == 8){
                            echo "<img src='assets/dashboard/images/legend/icon_checklist.png'>";
                          }else if($row->status == 9){
                            echo "<img src='assets/dashboard/images/legend/icon_user.png'>"; 
                          }else if($row->status == 10){
                            echo "<img src='assets/dashboard/images/legend/paid1.png'>"; 
                          }
                        ?></center>
                  </td>                        
                  <td><?php echo $row->nomor_surat; ?> </td>
                  <td><?php echo $row->apf_doc;?> </td>
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
                      <?php if ($row->type == 1) { ?>   
                        <a href="Dashboard/report_prf/<?php echo $row->id_payment; ?>" target="_blank" role="button" class="btn btn-danger btn-sm">Print</a>            
                      <?php } ?>
                      <?php if ($row->type == 2) { ?> 
                        <a href="Dashboard/report_arf/<?php echo $row->id_payment; ?>" target="_blank" role="button" class="btn btn-danger btn-sm">Print</a>            
                      <?php } ?>
                      <?php if ($row->type == 3) { ?> 
                        <a href="Dashboard/report_asf/<?php echo $row->id_payment; ?>" target="_blank" role="button" class="btn btn-danger btn-sm">Print</a>                                
                      <?php } ?>
                      <?php if ($row->type == 4) { ?> 
                        <a href="Dashboard/report_crf/<?php echo $row->id_payment; ?>" target="_blank" role="button" class="btn btn-danger btn-sm">Print</a>                                
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
