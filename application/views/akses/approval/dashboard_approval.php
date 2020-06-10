<style type="text/css">
   .satu { border: 8px solid purple; border-radius: 8px; background: purple;}
   .dua { border: 8px solid yellow; border-radius: 8px; }
   .tiga { border: 8px solid lime; border-radius: 8px; }
   .empat { border: 8px solid lime; border-radius: 8px; background: lime; }
   .lima { border: 8px solid turquoise; border-radius: 8px; }
   .enam { border: 8px solid turquoise; border-radius: 8px; background: turquoise;}
   .tujuh { border: 8px solid yellow; border-radius: 8px; background: yellow;}
   .box1{width:150px;
				height:100px;
        background: #132f6d;
				border: solid #132f6d;
        border-radius: 8px;
				display: inline-block;
				margin-left: 10px;
   }
   .box2{width:150px;
				height:100px;
        background: #858e8e;
				border: solid #858e8e;
        border-radius: 8px;
				display: inline-block;
				margin-left: 10px;
   }
   .box3{width:150px;
				height:100px;
        background: #4dce8d;
				border: solid #4dce8d;
        border-radius: 8px;
				display: inline-block;
				margin-left: 10px;
   }  
   .period { border: 5px solid #008000; border-radius: 5px; background: #008000 }
   	
</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- <h1>
        Data Pengajuan Payment        
      </h1> -->
    </section>

    <section class="content bg-white">
        <!-- Info boxes -->
        <div class="row">        
            <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-gray"><img src="assets/dashboard/images/legend/payment.png"></i></span>
                <div class="info-box-content">
                  <?php foreach ($tot_pay_req as $tot_req) { ?>
                  <span class="info-box-number"><center><?php echo $tot_req->totalreq; ?></center></span>
                  <?php } ?>    
                  <span class="info-box-text bg-gray"><center>Total Payment </br>Request</center></span>     
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-gray"><img src="assets/dashboard/images/legend/outstanding.png"></i></span>

                <div class="info-box-content">
                  <span class="info-box-number"><center>20</center></span>
                  <span class="info-box-text bg-gray"><center>Total Outstanding </br> Payment Request</center></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </div>            
            <!-- /.col -->
            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-gray"><img src="assets/dashboard/images/legend/draft.png"></i></span>
                <div class="info-box-content">
                  <?php foreach ($draft as $tot_draft) { ?>
                  <span class="info-box-number"><center><?php echo $tot_draft->totaldraft; ?></center></span>
                  <?php } ?>            
                  <span class="info-box-text bg-gray"><center>Total Draft</center></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-gray"><img src="assets/dashboard/images/legend/user.png"></i></span>
                <div class="info-box-content">
                  <span class="info-box-number"><center><?php echo $this->session->userdata("display_name"); ?></center></span>
                  <span class="info-box-text bg-gray"><center>View By</center></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </div>
        </div>
        
        <div class="row">
          <div class="col-md-6">
            <div class="box-body">
              <!-- USERS LIST -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <div class="box-tools pull-right">
                    <span class="label label-success"></span>
                  </div>
                </div>
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                    <!-- Periode -->
                    <table width="100%">
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
                    </table>
                    </div>
                  </div>
                </div>
                <div class="box-body">
                  <table width="100%"> 
                    <tr><td colspan="45"><font size='6'><center>STATUS</center></font></td></tr>
                  <tr> 
                     
                    
                    <?php foreach ($draft as $tot_draft) { ?>
                    <td><div class="dua"><center><font size='5'> <?php echo $tot_draft->totaldraft; ?> </center></div> </td><td> &nbsp; <td> &nbsp; <td> &nbsp;
                    <?php } ?>   
                    <?php foreach ($draftprint as $draftprint) { ?>                    
                    <td><div class="tiga"><center><font size='5'> <?php echo $draftprint->draftprint; ?> </center></div> </td><td> &nbsp; <td> &nbsp; <td> &nbsp;
                    <?php } ?>               
                    <?php foreach ($submit as $submit) { ?>
                    <td><div class="empat"><center><font size='5'> <?php echo $submit->submit; ?> </div> </td><td> &nbsp; <td> &nbsp; <td> &nbsp;
                    <?php } ?>                  
                    <?php foreach ($process as $process) { ?>
                    <td><div class="lima"><center><font size='5'> <?php echo $process->process; ?> </center></div> </td><td> &nbsp; <td> &nbsp; <td> &nbsp;
                    <?php } ?>
                    <?php foreach ($verifikasi as $verifikasi) { ?>
                    <td><div class="enam"><center><font size='5'> <?php echo $verifikasi->verifikasi; ?> </center></div> </td><td> &nbsp; <td> &nbsp; <td> &nbsp;
                    <?php } ?>
                    <?php foreach ($approval as $approval) { ?>
                    <td><div class="tujuh"><center><font size='5'> <?php echo $approval->approval; ?> </center></div> </td><td> &nbsp;  <td> &nbsp;   <td> &nbsp;
                    <?php } ?>
                    <?php foreach ($paid as $paid) { ?>
                    <td><div class="satu"><center><font size='5'> <?php echo $paid->paid; ?> </div> </td><td> &nbsp; <td> &nbsp; 
                    <?php } ?>
                                     
                  </tr>   
                  </table>
                </div>
                <br><br>               
                <div class="box-body">
                 
                  <td><img src="assets/dashboard/images/legend/yellow_nofull.png"></td>
                  <td>Draft (Draft)</td> &nbsp; &nbsp;

                  <td><img src="assets/dashboard/images/legend/green_nobackground.png"></td>
                  <td>Draft (Print)</td> &nbsp; &nbsp;

                  <td><img src="assets/dashboard/images/legend/green.png"></td>
                  <td>Submitted</td> &nbsp; &nbsp;

                  <td><img src="assets/dashboard/images/legend/blue_nobackground.png"></td>
                  <td>Processing</td> &nbsp; &nbsp;

                  <td><img src="assets/dashboard/images/legend/blue.png"></td>
                  <td>Verified</td> &nbsp; &nbsp;

                  <td><img src="assets/dashboard/images/legend/yellow.png"></td>
                  <td>Approved</td> &nbsp; &nbsp;

                  <td><img src="assets/dashboard/images/legend/purple.png"></td>
                  <td>Paid</td> &nbsp; &nbsp;
                  
                </div>   
              </div>     
            </div>
            
            <div class="row">
              <div class="col-md-12">
                <div class="box-body">
                  <!-- USERS LIST -->
                  <div class="box box-success">
                    <div class="box-header with-border">
                      <div class="box-tools pull-right">
                        <span class="label label-success"></span>
                      </div>
                    </div>
                    <div class="box-body">
                      <table width="100%">
                        <!-- <tr>
                          <td colspan="4"><font size='3'><b><i> *) Total Outstanding = Number Processing + Number Verified + Number Approved  </i></b></font></td>
                        </tr> -->
                        <!-- <tr> 
                          <td width="25%" colspan="2"><center><b>ADVANCE</b></center></td>
                          <td width="25%" colspan="2"><center><b>CREDITCARD</b></center></td>
                        </tr>   -->
                        <tr> 
                          <td align="center" width="25%"><div class="box1"><center><font size='3' color="white">Upcoming Overdue<br> - <br>ADVANCE</center></div></td>
                          
                          <td align="center" width="25%"><div class="box2"><center><font size='4' color="white">Overdue<br> - <br> ADVANCE</center></div></td>
                          
                          <td align="center" width="25%"><div class="box3"><center><font size='3' color="white">Submission in <br> 30 days <br> 20 <br>Credit Card </center></div></td>
                        </tr>  
                      </table>
                    </div>  
                  </div>
                </div>
              </div>      
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
                    <div id="pieChart" style="min-width: 600px; height: 400px; max-width: 600px; margin: 0 auto"></div> 
                  </div>
                  <!-- /.box-body -->               
                </div>
                <!--/.box -->              
            </div>
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
                      <th>Tanggal</th>
                      <th>Jenis Pembayaran</th>
                      <th>Nomor Surat</th>
                      <th>Description</th>
                      <th>Pemohon</th>
                      <th>Bank Account</th>
                      <th>Nama Penerima</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $i = 1;
                        foreach ($payment as $row){                          
                        // $c_jp = count($row->jenis_pembayaran);
                        $test1 = $row->jenis_pembayaran;                        
                        $test2 = explode(";", $test1);
                        $test3 = count($test2);                        
                        ?>
                    <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php if($row->status == 0){
                            echo "<img src='assets/dashboard/images/legend/yellow_nofull.png'>";  
                          }else if($row->status == 1){
                            echo "<img src='assets/dashboard/images/legend/green_nobackground.png'>";  
                          }else if($row->status == 11){
                            echo "<img src='assets/dashboard/images/legend/green_nobackground.png'>";  
                          }else if($row->status == 2){
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
                    </td>                  
                    <td><?php echo $row->tanggal; ?></td>
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
                    <?php 
                          $sql = "SELECT nama FROM m_honorarium_konsultan WHERE npwp='$row->penerima'";
                          $query = $this->db->query($sql)->result();
                          // return $query;
                          // var_dump($query[0]->nama);exit; 
                          if ($query[0]->nama) { $buka = $query[0]->nama;
                          }else{
                            $buka = $row->penerima;
                          }
                        ?>
                    <td><?php echo $buka; ?></td>
                    <td>

                    <a href="Approval/form_view/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a> 
                        
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

<script>
function printThis() {
  window.print();
}
</script>
</body>
</html>
