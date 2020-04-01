  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- <h1>
        Data Pengajuan Payment        
      </h1> -->
    </section>

    <section class="content">
        <!-- Info boxes -->
        <div class="row">
        <?php foreach ($tot_pay_req as $tot_req) { ?>
            <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-plus-outline"></i></span>

                <div class="info-box-content">
                <span class="info-box-number"><center><?php echo $tot_req->totalreq; ?></center></span>
                <span class="info-box-text"><center>Total Payment Request</center></span>                
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </div>
            <!-- /.col -->
        <?php } ?>    

            <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-gear-outline"></i></span>

                <div class="info-box-content">
                <span class="info-box-number"><center>20</center></span>
                <span class="info-box-text"><center>Total Outstanding Payment Request</center></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </div>            
            <!-- /.col -->
            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
            <?php foreach ($draft as $tot_draft) { ?>
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-files-o"></i></span>
                <div class="info-box-content">
                <span class="info-box-number"><center><?php echo $tot_draft->totaldraft; ?></center></span>
                <span class="info-box-text"><center>Total Draft</center></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </div>
            <?php } ?>            
        </div>
        
        <!-- Info boxes -->
        <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Payment Request Usage</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">

                <div class="col-md-6">
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

                    <div id="pieChart" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                 
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <div class="col-md-4">
                  <ul class="chart-legend clearfix">
                    <li><i class="fa fa-circle-o text-blue"></i> Direct Payment(DP)</li><br>
                    <li><i class="fa fa-circle-o text-black"></i> Advance Request(AR)</li><br>
                    <li><i class="fa fa-circle-o text-green"></i> Advance Settlement(AS)</li><br>
                    <li><i class="fa fa-circle-o text-orange"></i> Non-Advance(NA)</li><br>
                  </ul>
                </div>
            </div>
          </div>  
            <!-- /.footer -->
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
                    <th>Submitted Date</th>
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
                              echo "<img src='assets/dashboard/images/legend/treatment.png'>";  
                          }else if($row->status == 2){
                             echo "<img src='assets/dashboard/images/legend/submit.png'>";
                          }else if($row->status >= 3){
                             echo "<img src='assets/dashboard/images/legend/verified.png'>";
                          }
                        ?>
                    </td>                  
                    <td><?php echo date("d-M-Y", strtotime($row->label3)); ?></td>
                    <td><?php                     
                        for($a=0; $a<$test3; $a++){
                          if($test2[$a]){
                            echo $test2[$a]."<br>";
                          }
                        }  ?>
                    </td>
                    <td><?php echo $row->nomor_surat; ?></td>
                    <td><?php echo $row->label1; ?></td>
                    <td><?php echo $row->nama_user; ?></td>
                    <td><?php echo $row->akun_bank; ?></td>
                    <td><?php echo $row->penerima; ?></td>
                    <td><?php echo date("d-M-Y", strtotime($row->tanggal)); ?></td>
                    <td>
                        <a href=""><button class="btn btn-primary btn-sm">View</button></a>                    
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
        
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
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
                    <td><img src="assets/dashboard/images/legend/treatment.png"></td>
                    <td>Draft</td>
                    </tr>
                    <tr>
                    <td>2</td>
                    <td><img src="assets/dashboard/images/legend/submit.png"></td>
                    <td>Submitted</td>
                    </tr>
                    <tr>
                    <td>3</td>
                    <td><img src="assets/dashboard/images/legend/verified.png"></td>
                    <td>Paid</td>
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
</body>
</html>