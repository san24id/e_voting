<style type="text/css">
		.lingkaran1{
			width: 200px;
			height: 200px;
			/* background: #dac52c;  */
			border-radius: 80%;
		}
   .satu { border: 5px solid purple; }
   .dua { border: 5px solid green; background: green; }
   .tiga { border: 5px solid blue; }
   .empat { border: 5px solid blue; background: blue; }
   .lima { border: 5px solid orange; }
   .enam {background:green; border: 5px solid green; }
   .tujuh {background:aqua; border: 4px solid green; }
   	
</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- <h1>
        Data Pengajuan Payment        
      </h1> -->
    </section>

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
                    <div class="row">
                      <div class="col-md-4"><!--Lingkaran-->
                          <div class="lingkaran1 panel panel-primary">
                            <br><br>
                            <?php foreach ($processing as $process) { ?>
                            <center> <font size='7'> <?php echo $process->process; ?> </font> </center> 
                            <center> <font size='3'> Waiting for Processing </font> </center>
                            <?php } ?>
                          </div>
                        </div>
                      <div class="col-md-8"><!--Status-->
                        <?php foreach ($tot_pay_req as $tot_req) { ?>
                        <center> <font size='5'> Total Request : <?php echo $tot_req->totalreq; ?> </font> </center> <br>
                        <?php } ?>
                          <div>
                          <table> 
                            <tr> 
                              <td><font size='5'> STATUS | </font> </td><td> &nbsp;
                              <?php foreach ($Paid as $Paid) { ?>
                              <td><div class="satu"><font size='5'> <?php echo $Paid->paid;?> </div> </td><td> &nbsp; <td> &nbsp; <td> &nbsp;
                              <?php } ?>
                              <?php foreach ($processing as $process) { ?>
                              <td><div class="dua"><font size='5'> <?php echo $process->process; ?> </div> </td><td> &nbsp; <td> &nbsp; <td> &nbsp;
                              <?php } ?>
                              <?php foreach ($gprocess as $tot_process) { ?>
                              <td><div class="tiga"><font size='5'> <?php echo $tot_process->totalstatus; ?> </div> </td><td> &nbsp; <td> &nbsp; <td> &nbsp;
                              <?php } ?>
                              <?php foreach ($verifikasi as $verifikasi) { ?>
                              <td><div class="empat"><font size='5'> <?php echo $verifikasi->verifikasi; ?> </div> </td><td> &nbsp; <td> &nbsp; <td> &nbsp;
                              <?php } ?>
                              <?php foreach ($approval as $approval) { ?>
                              <td><div class="lima"><font size='5'> <?php echo $approval->approval; ?> </div> </td><td> &nbsp;   
                              <?php } ?>
                            </tr>  
                          </table>
                          </div>
                          <br><br>               
                        <div class ="col-md-12">
                          <td><img src="assets/dashboard/images/legend/green_nobackground.png"></td>
                          <td>Draft</td> &nbsp; &nbsp;

                          <td><img src="assets/dashboard/images/legend/purple.png"></td>
                          <td>Paid</td> &nbsp; &nbsp;

                          <td><img src="assets/dashboard/images/legend/green.png"></td>
                          <td>Waiting for processing/ Submitted by users</td> &nbsp; &nbsp;

                          <br>

                          <td><img src="assets/dashboard/images/legend/blue_nobackground.png"></td>
                          <td>Processing</td> &nbsp; &nbsp;

                          <td><img src="assets/dashboard/images/legend/blue.png"></td>
                          <td>Verified</td> &nbsp; &nbsp;

                          <td><img src="assets/dashboard/images/legend/orange.png"></td>
                          <td>Approved</td> &nbsp; &nbsp;
                        </div>  
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-3"> <!--UnderProcessing-->
                        <div class="enam"><center><font color='white' size='3'> Under Processing <br>(A) </font></center></div>
                          <div>
                           <br>
                            <table>
                            <tr>
                              <?php foreach ($tax as $tax){ ?>
                              <td width="50%"> <div class="tujuh"><center><font size='3'> <?php echo $tax->tax;?> <br> Tax<br>(A1) </font></center></div><td> &nbsp;
                              <?php } ?>
                              <?php foreach ($finance as $finance){ ?>
                              <td width="50%"> <div class="tujuh"><center><font size='3'> <?php echo $finance->finance;?> <br> Finance<br>(A2) </font></center></div><td> &nbsp;
                              <?php } ?>
                            </tr>
                            </table>
                          </div>
                      </div>
                      <div class="col-md-9">
                          <div>
                            <table>
                            <tr>
                              <?php foreach ($review as $review) { ?>
                              <td width="25%"> <div class="tujuh"><center><font size='5'> <?php echo $review->wreview; ?> <br> Waiting for<br>Review(B) </font></center></div><td> &nbsp;
                              <?php } ?>
                              <?php foreach ($wverifikasi as $verifikasi) { ?>
                              <td width="25%"> <div class="tujuh"><center><font size='5'> <?php echo $verifikasi->wverifikasi; ?> <br> Waiting for<br>Verification(C) </font></center></div><td> &nbsp;
                              <?php } ?>
                              <?php foreach ($wApproval as $wApproval) { ?>
                              <td width="25%"> <div class="tujuh"><center><font size='5'> <?php echo $wApproval->wapproval; ?> <br> Waiting for<br>Approval </font></center></div><td> &nbsp;
                              <?php } ?>
                              <?php foreach ($wPaid as $wPaid) { ?>
                              <td width="25%"> <div class="tujuh"><center><font size='5'> <?php echo $wPaid->wpaid; ?> <br> Waiting for<br>Payment </font></center></div><td> &nbsp;
                              <?php } ?>
                            </tr>
                            </table>
                          </div>
                      </div>
                    </div>
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
                      <script src="https://code.highcharts.com/modules/exporting.js"></script>
                      <script src="https://code.highcharts.com/modules/export-data.js"></script>

                      <div class="col-md-9">
                      <div id="pieChart" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>        
                      </div>          
                    <!-- /.users-list -->
                    <div class="col-md-3">
                    <ul class="chart-legend clearfix">
                      <li><i class="fa fa-circle-o text-blue"></i> Direct Payment(DP)</li><br>
                      <li><i class="fa fa-circle-o text-black"></i> Advance Request(AR)</li><br>
                      <li><i class="fa fa-circle-o text-green"></i> Advance Settlement(AS)</li><br>
                    </ul>
                    </div>
                  </div>
                  <!-- /.box-body -->               
                </div>
                <!--/.box -->              
              </div>
            </div>            

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
                    <th>CSF</th>
                    <th>Nomor SP3</th>
                    <th>Type</th>
                    <th>SP3 Submitted Date</th>
                    <th>Description</th>
                    <th>Pemohon</th>
                    <th>APF No</th>
                    <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $i = 1;
                        foreach ($payment as $row){                          
                        // $c_jp = count($row->jenis_pembayaran);
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
                    <td><?php 
                          if($row->status == 4){
                            echo "Processing Tax/Waiting for Review";
                          }else if($row->status == 5){
                            echo "Processing Finance";
                          }else if($row->status == 6){
                            echo "Waiting for Review";
                          }else if($row->status == 7){
                              echo "Waiting for Verification";
                          }else if($row->status == 8){
                            echo "Waiting for Approval";
                          }else if($row->status == 9){
                            echo "Waiting for Payment";  
                          }else if($row->status == 10){
                            echo "Paid";  
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
                    <td><?php echo date("d-M-Y", strtotime($row->tanggal)); ?></td>
                    <td><?php echo $row->label1; ?></td>
                    <td><?php echo $row->display_name; ?></td>
                    <td>XXX</td>
                    <td>
                        <a href="dashboard/form_sp3/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>
                          
                    </td>      
                    </tr>                    
                <?php  } ?>
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
</script>
