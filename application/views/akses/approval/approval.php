<style type="text/css">
	.lingkaran1{
	width: 200px;
	height: 200px;
	/* background: #dac52c;  */
	border-radius: 80%;
	}
   
  .satu { border: 5px solid purple; }
  .dua { border: 5px solid green; }
  .tiga { border: 5px solid blue; }
  .empat { border: 5px double blue; }
  .lima { border: 5px solid orange; }
  .enam {background:green; border: 5px solid green; }
  .tujuh {background:aqua; border: 4px solid green; }
  .period { border: 5px solid #008000; border-radius: 5px; background: #008000 }

  .box1{
    width:260px;
    height:90px;
    background: linear-gradient(#339966, #0066CC) ;
    border: linear-gradient(#339966, #0066CC);
    border-radius: 8px;
    display: inline-block;
    margin-left: 10px;
  }
   	
</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <section class="content">    
      <div class="col-md-6">
        <div class="box-body">
          <!-- USERS LIST -->
          <div class="box box-success">
            <div class="box-header with-border">
              <div class="box-tools pull-right">
                <span class="label label-success"></span>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body"> 
            <!-- Periode -->
            <div class="row">
              <div class="col-md-12">
              <!-- Periode   -->
              <table width="100%">
              <?php echo form_open("Approval/periode_approval");?>
                <tr>
                  <td class="period"><font color="white" size="3">Period: </font></td>
                  <td></td>
                  <td class="period"><font color="white" size="3"> Date </font></td>
                  <td class="period"><input type="date" name="start_date" id="start_date"></td>
                  <td><font size="3">s/d</font></td>
                  <td class="period"><font color="white" size="3"> Date </font></td>
                  <td class="period"><input type="date" name="end_date"></td>
                  <td class="period"><input type="submit" name="search" value="Search" id="search"></td>
                </tr>
              <?php echo form_close();?>  
              </table>
              </div>
            </div>    
            <br>

            <table width="100%">
              <tr>
                <td align="center" width="10%">
                  <div class="info-box box1">
                    <span class="info-box-icon"><img align="center" src="assets/dashboard/images/legend/verified.png"></i></span>
                      <br>
                      <?php foreach ($wApproval as $wApproval) { ?>
                      <font size='5' color="white"><center><?php echo $wApproval->approval; ?></center></font>
                      <?php } ?>
                      <center><font size='3' color="white">Waiting for Approval </center>
                  </div>
                </td>
                <td align="center" width="10%">
                  <div class="info-box box1">
                    <span class="info-box-icon"><img align="center" src="assets/dashboard/images/legend/approved.png"></i></span>
                      <br>
                      <?php foreach ($tot_approved as $tot_approved) { ?>

                      <font size='5' color="white"><center><?php echo $tot_approved->tot_approved; ?></center></font>
                      <?php } ?>
                      <center><font size='3' color="white">Total Approved </center>
                  </div>
                </td>                                 
              </tr>
            </table>  
                
            </div>
            <!-- /.box-body -->               
          </div>
          <!--/.box -->
        </div>            
      </div>

        <div class="col-md-6"><!--PieChart-->
          <div class="box-body">
            <!-- USERS LIST -->
            <div class="box box-success">
              <div class="box-header with-border">
                <div class="box-tools pull-right">
                  <span class="label label-success"></span>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body no-padding">
              <script src="https://code.highcharts.com/highcharts.js"></script>
              <!-- <script src="https://code.highcharts.com/highcharts-3d.js"></script> -->
              <script src="https://code.highcharts.com/modules/exporting.js"></script>
              <script src="https://code.highcharts.com/modules/export-data.js"></script>
              <script src="https://code.highcharts.com/modules/accessibility.js"></script>

              <div class="col-md-9">
                <div id="pieChart" style="min-width: 610px; height: 400px; max-width: 600px; margin: 0 auto"></div>  
              </div>
              <!-- /.box-body -->               
            </div>
            <!--/.box -->              
          </div>
        </div>            
    </section>

    <section class="content">
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
                  <th>Type</th>
                  <th>Submitted Date</th>
                  <th>APF No</th>
                  <th>Description</th>
                  <th>Pemohon</th>
                  <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php 
                        $i = 1;
                        foreach ($approved as $row){  
                        $test11 = $row->apf;                        
                        $test22 = explode(";", $test11);
                        $test33 = count($test22);                        
                      ?>                           
                  
                  <tr>
                  <td><?php echo $i++; ?></td>
                  <td> <?php 
                        if($row->status == 8){
                            echo "<img src='assets/dashboard/images/legend/verified.png'>";  
                        }else if($row->status == 3){
                            echo "<img src='assets/dashboard/images/legend/reject.png'>";
                        }else if($row->status == 9){
                          echo "<img src='assets/dashboard/images/legend/approved.png'>";
                        }else if($row->status == 10){
                          echo "<img src='assets/dashboard/images/legend/paid1.png'>";  
                        }
                      ?>
                  </td>
                  <td><?php                     
                      for($b=0; $b<$test33; $b++){
                        if($test22[$b]){
                          echo $test22[$b]."<br>";
                        }
                      }  ?>
                  </td>                  
                  <td><?php echo $row->tanggal; ?></td>
                  <td> <?php echo $row->apf_doc; ?> </td>
                  <td><?php echo $row->description; ?></td>
                  <td><?php echo $row->division_id; ?></td>
                  <td>
                      <!-- <a href="approval/form_view/<?php echo $row->id_pay; ?>"><button class="btn btn-primary btn-sm">View</button></a> -->
                      <?php if ($row->type == 1) { ?>   
                        <a href="approval/form_vprf/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>
                      <?php } ?>
                      <?php if ($row->type == 2) { ?> 
                        <a href="approval/form_varf/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>
                      <?php } ?>
                      <?php if ($row->type == 3) { ?> 
                        <a href="approval/form_vasf/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>                    
                      <?php } ?>
                      <?php if ($row->type == 4) { ?> 
                        <a href="approval/form_vcrf/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>                    
                      <?php } ?>
                  </td>
                  </tr>                    
                  <!--.Modal-->
                  <div class="modal fade" id="approve<?php echo $row->id_pay; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">                                        
                      <div class="modal-body">
                      <form id="approved" method="post" action="approval/approve">
                        <input type="hidden" name="id_pay" value="<?php echo $row->id_pay; ?>">
                        <p align="justify">Apa kamu yakin akan Menyetujui Form Pengajuan ini :  <?=$row->nomor_surat?></p>
                        <label>Kepada :</label>                        
                        <select class="form-control" name="handled_by">
                          <option>--- Choose ---</option>
                        <?php foreach ($tri as $get) {?>
                          <option value="<?php echo $get->username; ?>"><?php echo $get->username; ?></option>
                        <?php } ?>
                        </select>
                      </div>
                      <div class="modal-footer">                        
                          <button type="submit" class="btn btn-success bye">Yes</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </form>
                      </div>
                    </div>
                  </div>
                  </div>

                  <div class="modal fade" id="reject<?php echo $row->id_pay; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">                                        
                      <div class="modal-body">
                      <form id="rejected" method="post" action="approval/rejected">
                        <input type="hidden" name="id_pay" value="<?php echo $row->id_pay; ?>">
                        <p align="justify">Apa kamu yakin akan me-rejected Form Pengajuan ini : <?=$row->nomor_surat?></p>
                        <label>Notes :</label>                
                        <input type="text" name="note"></input>
                        <select class="form-control" name="handled_by">
                          <option>--- Choose ---</option>
                        <?php foreach ($csf as $get) {?>
                          <option value="<?php echo $get->username; ?>"><?php echo $get->username; ?></option>
                        <?php } ?>
                        </select>
                        <input type="hidden" name="rejected_by" value="<?php echo $this->session->userdata("display_name"); ?>">
                        <input type="hidden" name="rejected_date" value="<?php echo date("d-M-Y"); ?>">  
                      </div>
                      <div class="modal-footer">                        
                          <button type="submit" class="btn btn-success bye">Yes</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </form>
                      </div>
                    </div>
                  </div>
                  </div>    
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
<!----.Modal -->


<!-- jQuery 2.2.3 -->
<script src="assets/dashboard/plugins/jQuery/jquery-2.2.3.min.js"></script>
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
<!-- Bootstrap 3.3.7 -->
<script src="assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Sparkline -->
<script src="assets/admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- ChartJS -->
<script src="assets/admin/bower_components/chart.js/Chart.js"></script>

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

  Highcharts.chart('pieChart', {
      chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie'
      },
      title: {
          text: 'Jumlah Data Payment Request Divisi'
      },
      credits: {
          enabled: false
      },
      tooltip: {
          pointFormat: '{series.name}: <b>{point.y}</b>'
      },
      plotOptions: {
          pie: {
              colors: [
                '#339933',
                '#00cc00', 
                '#808080', 
                '#90EE90'               
              ],
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                  enabled: true,
                  format: '<b>{point.name}</b>: {point.y}'
              }
          }
      },
      series: [{
          name: 'Total',
          colorByPoint: true,
          data: [

            <?php foreach ($pembayaran as $key) { ?>
              {
                name: '<?php echo $key->dsc; ?>',
                y: <?php echo $key->jmlpembayaran; ?>
              },
            <?php } ?>
              ]
      }]
  });

  $(".reject").on('click', function(){
      $.ajax({        
          type: "POST", // Method pengiriman data bisa dengan GET atau POST        
          // url: "<?php echo base_url("index.php/superadm/deletestaff"); ?>", // Isi dengan url/path file php yang dituju       
          data: $("#rejected").serialize(), // data yang akan dikirim ke file yang dituju        
          success: function(response){ // Ketika proses pengiriman berhasil          
              $("#reject").modal('hide'); // Sembunyikan loadingnya   
               location.reload();       
              alert('Rejected success')
          }      
      });
  });    

  $(".approve").on('click', function(){
      $.ajax({        
          type: "POST", // Method pengiriman data bisa dengan GET atau POST        
          // url: "<?php echo base_url("index.php/superadm/deletestaff"); ?>", // Isi dengan url/path file php yang dituju       
          data: $("#approved").serialize(), // data yang akan dikirim ke file yang dituju        
          success: function(response){ // Ketika proses pengiriman berhasil          
              $("#approve").modal('hide'); // Sembunyikan loadingnya   
               location.reload();       
              alert('Accepted success')
          }      
      });
  });      
</script>
