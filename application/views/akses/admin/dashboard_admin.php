<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DASHBOARD
        <small></small>
      </h1>
    </section>
    <!-- Main content -->

  <section class="content">
      <!-- Info boxes -->

      <!-- Info boxes -->
      <div class="row">

        <?php 

          // $namestatus = array();
          // $jmlstatus = array();

          // foreach ($statusinf as $row => $v) {
          //   array_push($namestatus, $v->status_user);
          //   array_push($jmlstatus, $v->jmlstatus);
          // }
        ?>

        <div class="col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="glyphicon glyphicon-pencil"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><?php
              // echo $namestatus[0]; ?></span>
              <span class="info-box-number"><?php 
                // if( $jmlstatus[0] == NULL ||  $jmlstatus[0] == ''){
                //   echo '0'; 
                // }else{
                //   echo  $jmlstatus[0];
                // }

              ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <div class="col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="glyphicon glyphicon-remove-sign"></i></span>
            
            <div class="info-box-content">
              <span class="info-box-text"><?php 
              // echo $namestatus[1]; ?></span>
              <span class="info-box-number"><?php                 
                // if( $jmlstatus[1] == NULL ||  $jmlstatus[1] == ''){
                //   echo '0'; 
                // }else{
                //   echo  $jmlstatus[1];
                // } ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="glyphicon glyphicon-envelope"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><?php
              // echo $namestatus[2]; ?></span>
              <span class="info-box-number"><?php 
              //    if( $jmlstatus[2] == NULL ||  $jmlstatus[2] == ''){
              //     echo '0'; 
              //   }else{
              //     echo  $jmlstatus[2];
              //   }
              //  ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <!-- /.col -->
        <div class="col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">TOTAL USER</span>
              <span class="info-box-number"><?php
              // echo $usercount; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>

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

                    <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                 
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>

            <div class="col-md-6">
              <!-- USERS LIST -->
              <div class="box box-primary">
                <div class="box-header with-border">

                  <div class="box-tools pull-right">
                    <span class="label label-primary"></span>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <div id="container2" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                 
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>

          <div class="col-md-6">
              <!-- USERS LIST -->
              <div class="box box-primary">
                <div class="box-header with-border">

                  <div class="box-tools pull-right">
                    <span class="label label-primary"></span>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <div id="container3" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                 
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
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
    <strong>Copyright &copy; 2019 </footer>

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
<!-- jQuery 2.2.3 -->
<script src="assets/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="assets/admin/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="assets/admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="assets/admin/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="assets/admin/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/admin/dist/js/demo.js"></script>

<!-- <script>
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



  Highcharts.chart('container', {
      chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie'
      },
      title: {
          text: 'Status Projek'
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
          name: 'Jumlah',
          colorByPoint: true,
          data: [

            <?php foreach ($status as $key) { ?>
              {
                name: '<?php echo $key->status_user; ?>',
                y: <?php echo $key->jmlstatus; ?>
              },
            <?php } ?>
              ]
      }]
  });

  Highcharts.chart('container2', {
      chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie'
      },
      title: {
          text: 'User Projek Kategori'
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

            <?php foreach ($kategoricount as $key) { ?>
              {
                name: '<?php echo $key->nama_kategori; ?>',
                y: <?php echo $key->jmlkategori; ?>
              },
            <?php } ?>
              ]
      }]
  });

    Highcharts.chart('container3', {
      chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie'
      },
      title: {
          text: 'Jumlah Data Sektor Insfrastruktur'
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

            <?php foreach ($sektorcount as $key) { ?>
              {
                name: '<?php echo $key->nsektor; ?>',
                y: <?php echo $key->jmlsektor; ?>
              },
            <?php } ?>
              ]
      }]
  });
</script> -->
</body>
</html>
