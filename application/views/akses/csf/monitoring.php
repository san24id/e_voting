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
                            <?php foreach ($processing as $tot_process) { ?>
                            <center> <font size='7'> <?php echo $tot_process->process; ?> </font> </center> 
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
                              <td><div class="satu"><font size='5'>  </div> </td><td> &nbsp; <td> &nbsp; <td> &nbsp;
                              <td><div class="dua"><font size='5'>  </div> </td><td> &nbsp; <td> &nbsp; <td> &nbsp;
                              <td><div class="tiga"><font size='5'>  </div> </td><td> &nbsp; <td> &nbsp; <td> &nbsp;
                              <td><div class="empat"><font size='5'>  </div> </td><td> &nbsp; <td> &nbsp; <td> &nbsp;
                              <td><div class="lima"><font size='5'>  </div> </td><td> &nbsp;                        
                            </tr>  
                          </table>
                          </div>
                          <br><br>               
                        <div class ="col-md-12">
                          <td><img src="assets/dashboard/images/legend/treatment.png"></td>
                          <td>Draft</td> &nbsp; &nbsp;

                          <td><img src="assets/dashboard/images/legend/submit.png"></td>
                          <td>Accepted</td> &nbsp; &nbsp;

                          <td><img src="assets/dashboard/images/legend/Default.png"></td>
                          <td>Rejected</td>
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
                              <td width="50%"> <div class="tujuh"><center><font size='3'>  <br> Tax<br>(A1) </font></center></div><td> &nbsp;
                              <td width="50%"> <div class="tujuh"><center><font size='3'>  <br> Finance<br>(A2) </font></center></div><td> &nbsp;
                            </tr>
                            </table>
                          </div>
                      </div>
                      <div class="col-md-9">
                          <div>
                            <table>
                            <tr>
                            <td width="25%"> <div class="tujuh"><center><font size='5'>  <br> Waiting for<br>Review(B) </font></center></div><td> &nbsp;
                            <td width="25%"> <div class="tujuh"><center><font size='5'>  <br> Waiting for<br>Verification(C) </font></center></div><td> &nbsp;
                            <td width="25%"> <div class="tujuh"><center><font size='5'>  <br> Waiting for<br>Approval </font></center></div><td> &nbsp;
                            <td width="25%"> <div class="tujuh"><center><font size='5'>  <br> Waiting for<br>Payment </font></center></div><td> &nbsp;
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
                      <li><i class="fa fa-circle-o text-orange"></i> Non-Advance(NA)</li><br>
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
                    <th>Submitted Date</th>
                    <th>Type</th>
                    <th>Nomor Surat</th>
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
                              echo "<img src='assets/dashboard/images/legend/treatment.png'>";  
                          }else if($row->status == 2){
                             echo "<img src='assets/dashboard/images/legend/submit.png'>";
                          }else if($row->status >= 3){
                             echo "<img src='assets/dashboard/images/legend/default.png'>";
                          }
                        ?>
                    </td>
                    <td> </td>                  
                    <td><?php echo date("d-M-Y", strtotime($row->tanggal)); ?></td>
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
                    <td>XXX</td>
                    <td>
                        <a href="dashboard/form_sp3/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>
                        <?php if($row->status == 1){ ?>                                           
                        <button type="button" data-toggle="modal" data-target="#accept<?php echo $row->id_payment; ?>" class="btn btn-success">Accept</button>   
                        <button type="button" data-toggle="modal" data-target="#reject<?php echo $row->id_payment; ?>" class="btn btn-danger">Reject</button>  
                    </td>      
                    </tr><!--.Modal-->
                    <div class="modal fade" id="accept<?php echo $row->id_payment; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                      <div class="modal-content">                                        
                        <div class="modal-body">
                        <form id="accepted" method="post" action="dashboard/accept">
                          <input type="hidden" name="id_payment" value="<?php echo $row->id_payment; ?>">
                          <p align="justify">Apa kamu yakin akan mengirim Form Pengajuan ini :  <?=$row->nomor_surat?></p>
                          <label>Kepada :</label>                        
                          <select class="form-control" name="handled_by">
                            <option>--- Choose ---</option>
                          <?php foreach ($csf as $get) {?>
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

                    <div class="modal fade" id="reject<?php echo $row->id_payment; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                      <div class="modal-content">                                        
                        <div class="modal-body">
                        <form id="rejected" method="post" action="dashboard/rejected">
                          <input type="hidden" name="id_payment" value="<?php echo $row->id_payment; ?>">
                          <p align="justify">Apa kamu yakin akan me-rejected Form Pengajuan ini : <?=$row->nomor_surat?></p>
                          <label>Notes :</label>                
                          <input type="text" name="note"></input>
                          <input type="hidden" name="rejected_by" value="<?php echo $this->session->userdata("display_name"); ?>">
                          <input type="text" name="rejected_date" value="<?php echo date("d-M-Y"); ?>">  
                        </div>
                        <div class="modal-footer">                        
                            <button type="submit" class="btn btn-success bye">Yes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php  }} ?>
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
