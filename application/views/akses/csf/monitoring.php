<style type="text/css">
		.lingkaran1{
			width: 200px;
			height: 200px;
			/* background: #4dce8d;  */
			border-radius: 80%;
      border: 5px solid #4dce8d;
		}
   
    .satu { border: 5px solid lime; border-radius: 25px; background: lime; }
   .dua { border: 5px solid turquoise; border-radius: 25px}
   .tiga { border: 5px solid turquoise;border-radius: 25px; background: turquoise; }
   .empat { border: 5px solid yellow; border-radius: 25px}
   .lima { border: 5px solid purple; border-radius: 25px }
   .enam {background:lime;  border: 5px solid lime; border-radius: 6px }
   .tujuh {background:turquoise; border: 4px solid turquoise; border-radius: 6px }
   .delapan {width: 120px; background:lime; border: 5px solid lime; border-radius: 6px }
   .sembilan { border: 5px solid #4dce8d; border-radius: 5px; background: #4dce8d }
   .sepuluh { border: 5px solid white; border-radius: 15px; background: lavender }
   .tax { width: 80px; height: 80px; border-radius: 80%; border: 5px solid turquoise; background: #DDA0DD }
   .finance { width: 80px; height: 80px; border-radius: 80%; border: 5px solid turquoise; background: #FFA500 }
   .review { width: 80px; height: 80px; border-radius: 80%; border: 5px solid turquoise; background: #00FF00 }
   .verification { width: 80px; height: 80px; border-radius: 80%; border: 5px solid #1E90FF; background: #1E90FF }
   .approval { width: 80px; height: 80px; border-radius: 80%; border: 5px solid yellow; background: yellow }
   .paid { width: 80px; height: 80px; border-radius: 80%; border: 5px solid purple; background: purple }
   .period { border: 5px solid #008000; border-radius: 5px; background: #008000 }
</style>
<style type="text/css">
    #outtable{
      padding: 20px;
      border:1px solid #e3e3e3;
      width:600px;
      border-radius: 5px;
    }
 
    .short{
      width: 50px;
    }
 
    .normal{
      width: 150px;
    }
      table{
        border-collapse: collapse;
        font-family: arial;
        color:#5E5B5C;
      }
 
      thead th{
        text-align: left;
        padding: 10px;

      }
 
      tbody td{
        border-top: 1px solid #e3e3e3;
        padding: 10px;
      }
 
      tbody tr:nth-child(even){
        
      }
 
      tbody tr:hover{
        background: #EAE9F5
      }
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
                      <div class="col-md-12">
                      <!-- Periode   -->
                      <table width="100%">
                      <?php echo form_open("Dashboard/periode");?>
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
                  </div>
                  <div class="box-body">      
                    <div class="row">
                      <div class="col-md-4"><!--Lingkaran-->
                          <div class="lingkaran1 panel panel-primary">
                            <br><br><br>
                            <?php foreach ($tot_pay_req as $tot_req) { ?>
                            <center><font size="10"><?php echo $tot_req->totalreq; ?> </font></center>
                            <?php } ?>
                          </div>
                          
                            <div class="sembilan"><center><font size='5' color="white"> TOTAL REQUEST </font></center></div>
                          
                      </div>
                      <div class="col-md-8"><!--Status-->
                        <!-- <?php foreach ($tot_pay_req as $tot_req) { ?>
                        <font size='5'> TOTAL REQUEST : </font><font size="10"><?php echo $tot_req->totalreq; ?> </font><br>
                        <?php } ?> -->
                          <div>
                          <table width="100%"> 
                            <tr> 
                              <td colspan="2"><font size='5'> STATUS : </font> </td>
                            </tr>
                            <tr>
                              <td><font size="3">&nbsp; &nbsp; Waiting for processing / Submitted by users </font></td>
                              <?php foreach ($processing as $process) { ?>
                              <td width="15%"><div class="satu"><font size='5'><center><?php echo $process->process; ?></center></div> </td>
                              
                              <?php } ?>
                            </tr>
                            <tr>
                              <td><font size="3">&nbsp; &nbsp; Processing</font></td>
                              <?php foreach ($gprocess as $tot_process) { ?>
                              <td><div class="dua"><font size='5'><center><?php echo $tot_process->totalstatus; ?></center></div> </td>
                               
                              <?php } ?>
                            </tr>
                            <tr>
                              <td><font size="3">&nbsp; &nbsp; Verified</font></td>
                              <?php foreach ($verifikasi as $verifikasi) { ?>
                              <td><div class="tiga"><font size='5'><center><?php echo $verifikasi->verifikasi; ?></center></div> </td>
                              
                              <?php } ?>
                            </tr>
                            <tr>
                              <td><font size="3">&nbsp; &nbsp; Approved</font></td>
                              <?php foreach ($approval as $approval) { ?>
                              <td><div class="empat"><font size='5'><center><?php echo $approval->approval; ?></center></div> </td>
                                 
                              <?php } ?>
                            </tr>
                            <tr>
                              <td><font size="3">&nbsp; &nbsp; Paid</font></td>
                              <?php foreach ($Paid as $Paid) { ?>
                              <td><div class="lima"><font size='5'><center><?php echo $Paid->paid;?></center></div> </td>
                              <?php } ?>
                            </tr>

                          </table>
                          </div>
                          <br><br> 
                                        
                        <!-- <div class ="col-md-12"> <!-- icon status -->
                          <!-- <td><img src="assets/dashboard/images/legend/Green_nobackground.png"></td>
                          <td>Draft</td> &nbsp;  -->

                         <!--  <td><img src="assets/dashboard/images/legend/green.png"></td>
                          <td>Waiting for processing/ Submitted by users</td> &nbsp; &nbsp;

                          <br>

                          <td><img src="assets/dashboard/images/legend/blue_nobackground.png"></td>
                          <td>Processing</td> &nbsp; &nbsp;

                          <td><img src="assets/dashboard/images/legend/blue.png"></td>
                          <td>Verified</td> &nbsp; &nbsp;

                          <td><img src="assets/dashboard/images/legend/yellow.png"></td>
                          <td>Approved</td> &nbsp; &nbsp;

                          <td><img src="assets/dashboard/images/legend/purple.png"></td>
                          <td>Paid</td> &nbsp;

                        </div>  -->


                      </div>

                     </div>

                     <div class="col-md-18"> <!--waiting for-->
                      <div>
                      <table width="100%">                        
                        <tr>
                          <td><center>
                            <div class="tax">
                              <!-- <center>Tax</center> -->
                            <?php foreach ($tax as $tax){ ?>
                            <font size='7' color="white"><center><?php echo $tax->tax;?></center></font>
                            <?php } ?>
                            </div></center>
                          </td>
                          <td><center>
                            <div class="finance">
                              <!-- <center>Finance</center> -->
                            <?php foreach ($finance as $finance){ ?>
                            <font size='7' color="white"><center><?php echo $finance->finance;?></center></font>
                            <?php } ?>
                          </div></center>
                          </td>
                          <td><center>
                            <div class="review">
                            <!-- <center>Waiting For Review</center> -->
                            <?php foreach ($review as $review) { ?>
                            <font size='7' color="white"><center> <?php echo $review->wreview; ?> </center></font>
                            <?php } ?>
                            </div></center>
                          </td>
                          <td><center>
                            <div class="verification">
                            <!-- <center>Waiting For Verification</center> -->
                            <?php foreach ($wverifikasi as $wverifikasi) { ?>
                            <font size='7' color="white"><center><?php echo $wverifikasi->wverifikasi; ?></center></font>
                            <?php } ?>
                          </div></center>
                          </td>
                          <td><center>
                            <div class="approval">
                            <!-- <center>Waiting For Approval</center> -->
                            <?php foreach ($wApproval as $wApproval) { ?>
                            <center><font size='7' color="white"> <?php echo $wApproval->wapproval; ?> </font></center>
                            <?php } ?>
                          </div></center>
                          </td>
                          <td><center>
                            <div class="paid">
                            <!-- <center>Waiting For Payment</center> -->
                              <?php foreach ($wPaid as $wPaid) { ?>
                              <center><font size='7' color="white"> <?php echo $wPaid->wpaid; ?> </font></center>
                              
                              <?php } ?>
                            </div></center>
                          </td>
                        </tr>
                        <!-- <td colspan="6"><center><font size="5">Unde Processing</font></center></td> -->
                        <tr>
                          <td align="center"><font size="3"> Tax (A1)</font></td>
                          <td align="center"><font size="3"> Finance (A2) </font></td>
                          <td rowspan="2"><center><font size="3"> Waiting <br> For <br> Review (B) </font></center></td>
                          <td rowspan="2"><center><font size="3"> Waiting <br> For <br> Verification (C) </font></center></td>
                          <td rowspan="2"><center><font size="3"> Waiting <br> For <br> Approval </font></center></td>
                          <td rowspan="2"><center><font size="3"> Waiting <br> For <br> Payment </font></center></td>
                        </tr>
                        <tr>
                          <td colspan="2"><center><font size="3"> Under Processing (A) </font></center></td>
                        </tr>                   
                      </table>
                    </div>
                        <!-- <div class="tujuh"><center><font color='white' size='3'> Under Processing (A) </font></center></div>
                          <div>
                           <br>
                            <table>
                            <tr>
                              <?php foreach ($tax as $tax){ ?>
                              <td width="50%"> <div class="enam"><center><font size='5'> <?php echo $tax->tax;?> </font><br> <font size="3">Tax<br>(A1) </font></center></div><td> &nbsp;
                              <?php } ?>
                              <?php foreach ($finance as $finance){ ?>
                              <td width="50%"> <div class="enam"><center><font size='5'> <?php echo $finance->finance;?></font> <br><font size="3">Finance<br>(A2) </font></center></div><td> &nbsp;
                              <?php } ?>
                            </tr>
                            </table>
                          </div> -->
                      </div>
                     <!--  <div class="col-md-9"> <!-- Waiting for...-->
                          <!--<div>
                            <table>
                            <tr>
                              <?php foreach ($review as $review) { ?>
                              <td> <div class="delapan"><center><font size='8'> <?php echo $review->wreview; ?> <br></font> <font size="4">Waiting <br>for<br>Review(B) </font></center></div><td> &nbsp;&nbsp;&nbsp;&nbsp;
                              <?php } ?>
                              <?php foreach ($wverifikasi as $verifikasi) { ?>
                              <td> <div class="delapan"><center><font size='8'> <?php echo $verifikasi->wverifikasi; ?></font> <br><font size="4"> Waiting <br>for<br>Verification(C) </font></center></div><td> &nbsp;&nbsp;&nbsp;&nbsp;
                              <?php } ?>
                              <?php foreach ($wApproval as $wApproval) { ?>
                              <td> <div class="delapan"><center><font size='8'> <?php echo $wApproval->wapproval; ?> </font><br><font size="4">Waiting <br>for<br>Approval </font></center></div><td> &nbsp;&nbsp;&nbsp;&nbsp;
                              <?php } ?>
                              <?php foreach ($wPaid as $wPaid) { ?>
                              <td> <div class="delapan"><center><font size='8'> <?php echo $wPaid->wpaid; ?> </font><br> <font size="4">Waiting <br>for<br>Payment </font></center></div><td> &nbsp;
                              <?php } ?>
                            </tr>
                            </table>
                          </div>
                      </div> -->
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
                      <div id="pieChart" style="min-width: 600px; height: 425px; max-width: 400px; margin: 0 auto"></div>  
                      
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
                    <!-- <th>Status</th> -->
                    <th>Status CSF</th>
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
                        foreach ($list_monitoring as $row){                          
                        // $c_jp = count($row->jenis_pembayaran);
                        $test1 = $row->dsc;                        
                        $test2 = explode(";", $test1);
                        $test3 = count($test2);                        
                        ?>
                    <tr>
                    <td><?php echo $i++; ?></td>
                    <!--<td> <?php 
                          // if($row->status == 1){
                          //     echo "<img src='assets/dashboard/images/legend/green_nobackground.png'>";  
                          // }else
                          if($row->status == 2){
                             echo "<img src='assets/dashboard/images/legend/green.png'>";
                          }else if($row->status == 3){
                             echo "<img src='assets/dashboard/images/legend/rejected.png'>";
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
                            echo "<img src='assets/dashboard/images/legend/yellow.png'>"; 
                          }else if($row->status == 10){
                            echo "<img src='assets/dashboard/images/legend/purple.png'>"; 
                          }  

                        ?>
                    </td>-->
                    <td><center><?php 
                          if($row->status == 2){
                            echo "<img src='assets/dashboard/images/legend/green.png'>";
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
                    <td><?php echo $row->tanggal; ?></td>
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
        
        <!--  -->
        
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
                '#006400',
                '#ADFF2F', 
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

</script>