<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style type="text/css">
		.lingkaran1{
			width: 200px;
			height: 200px;
			/* background: #4dce8d;  */
			border-radius: 80%;
      border: 5px solid #4dce8d;
		}

    .sekian { border: 5px solid #4dce8d; border-radius: 10px; background: #4dce8d; }
    .satu { border: 5px solid #3399ff; border-radius: 10px; background: #3399ff; }
   .dua { border: 5px solid #228B22; border-radius: 10px}
   .tiga { border: 5px solid #228B22;border-radius: 10px; background: #9ACD32; }
   .empat { border: 5px solid #228B22; border-radius: 10px; background: #228B22;}
   .lima { border: 5px solid orange; border-radius: 10px; background:orange; }
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

   .box1{width:230px;
				height:90px;
        background: linear-gradient(#339966, #0066CC) ;
				border: linear-gradient(#339966, #0066CC);
        border-radius: 8px;
				display: inline-block;
				margin-left: 10px;
   }
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
          <div class="col-md-7">
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
                    <?php echo form_open("Dashboard/periode_monitoring");?>
                      <tr>
                        <td class="period"><font color="white" size="3">Period: </font></td>
                        <td></td>
                        <td class="period"><font color="white" size="3"> Date </font></td>
                        <td class="period"><input type="text" name="start_date" id="start_date" value="<?php echo date("01-01-Y"); ?>"></td>
                        <td><font size="3">s/d</font></td>
                        <td class="period"><font color="white" size="3"> Date </font></td>
                        <td class="period"><input type="text" name="end_date" id="end_date" value="<?php echo date("d-m-Y"); ?>"></td>
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
                    <center>
                      <div class="lingkaran1 panel panel-primary">
                        <br><br><br>
                        <?php foreach ($processing as $process) { ?>
                        <center><font size="10"> <?php echo $process->process; ?> </font></center>
                        <?php } ?>
                      </div>
                      <div class="sembilan"><center><font size='5' color="white"> Waiting for Processing </font></center></div>
                    </center>
                    </div>

                    <div class="col-md-8"><!--Status-->
                      <!-- <?php foreach ($tot_pay_req as $tot_req) { ?>
                      <font size='5'> TOTAL REQUEST : </font><font size="10"><?php echo $tot_req->totalreq; ?> </font><br>
                      <?php } ?> -->
                      <div>
                        <table width="100%"> 
                          <tr>
                            <td><font size="5">&nbsp; &nbsp; <b>TOTAL REQUEST</b> </font></td>
                            <?php foreach ($tot_pay_req as $tot_req) { ?>
                            <td width="15%"><font size='6'><center><b><?php echo $tot_req->totalreq; ?><b></center></font> </td>                              
                            <?php } ?>
                          </tr>
                          <tr> 
                            <td colspan="2"><font size='5'> STATUS : </font> </td>
                          </tr>
                          
                          <tr>
                            <td><font size="3">&nbsp; &nbsp; Waiting for processing / Submitted by users </font></td>
                            <?php foreach ($processing as $process) { ?>
                            <td width="15%"><div class="satu"><font size='5' color="white"><center><?php echo $process->process; ?></center></div> </td>
                            
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
                            <td><div class="empat"><font size='5' color="white"><center><?php echo $approval->approval; ?></center></div> </td>
                                
                            <?php } ?>
                          </tr>
                          <tr>
                            <td><font size="3">&nbsp; &nbsp; Paid</font></td>
                            <?php foreach ($Paid as $Paid) { ?>
                            <td><div class="lima"><font size='5' color="white"><center><?php echo $Paid->paid;?></center></div> </td>
                            <?php } ?>
                          </tr>

                        </table>
                      </div>
                    </div>
                  </div>
                  <!--row  -->
                </div>
                <!-- /.box-body -->

                <div class="row">
                  <div class="box-body">
                  <div class="col-md-12"> <!--waiting for-->
                    <table width="10%">                        
                      <tr>
                        <td align="center" width="10%">
                          <div class="info-box box1">
                            <span class="info-box-icon"><img align="center" src="assets/dashboard/images/legend/tax.png"></i></span>
                              <br>
                              <?php foreach ($tax as $tax){ ?>
                              <font size='3' color="white"><center><?php echo $tax->tax;?></center></font>
                              <?php } ?>
                              <center><font size='3' color="white">Under Processing <br> Tax </center>
                          </div>
                        </td>
                        <td align="center" width="10%">
                          <div class="info-box box1">
                            <span class="info-box-icon"><img align="center" src="assets/dashboard/images/legend/review.png"></i></span>
                              <br>
                              <?php foreach ($review as $review) { ?>
                              <font size='3' color="white"><center><?php echo $review->wreview; ?></center></font>
                              <?php } ?>
                              <center><font size='3' color="white">Waiting For <br> Review </center>
                          </div>
                        </td>
                        <td align="center" width="10%">
                          <div class="info-box box1">
                            <span class="info-box-icon"><img align="center" src="assets/dashboard/images/legend/approval.png"></i></span>
                              <br>
                              <?php foreach ($wApproval as $wApproval) { ?>
                              <font size='3' color="white"><center><?php echo $wApproval->wapproval; ?></center></font>
                              <?php } ?>
                              <center><font size='3' color="white">Waiting For <br> Approval </center>
                          </div>
                        </td>                    
                      </tr>
                      <tr>
                        <td align="center" width="10%">
                          <div class="info-box box1">
                            <span class="info-box-icon"><img align="center" src="assets/dashboard/images/legend/finance.png"></i></span>
                              <br>
                              <?php foreach ($finance as $finance){ ?>
                              <font size='3' color="white"><center><?php echo $finance->finance;?></center></font>
                              <?php } ?>
                              <center><font size='3' color="white">Under Processing <br>Finance </center>
                          </div>
                        </td>
                        <td align="center" width="10%">
                          <div class="info-box box1">
                            <span class="info-box-icon"><img align="center" src="assets/dashboard/images/legend/verified1.png"></i></span>
                              <br>
                              <?php foreach ($wverifikasi as $wverifikasi) { ?>
                              <font size='3' color="white"><center><?php echo $wverifikasi->wverifikasi; ?></center></font>
                              <?php } ?>
                              <center><font size='3' color="white">Waiting For <br> Verification</center>
                          </div>
                        </td>
                        <td align="center" width="10%">
                          <div class="info-box box1">
                            <span class="info-box-icon"><img align="center" src="assets/dashboard/images/legend/paid.png"></i></span>
                              <br>
                              <?php foreach ($wPaid as $wPaid) { ?>
                              <font size='3' color="white"><center><?php echo $wPaid->wpaid; ?></center></font>
                              <?php } ?>
                              <center><font size='3' color="white">Waiting For <br> Payment</center>
                          </div>
                        </td>

                      </tr>
                      <!-- <td colspan="6"><center><font size="5">Unde Processing</font></center></td> -->
                      <!-- <tr>
                        <td align="center"><font size="3"> Tax (A1)</font></td>
                        <td align="center"><font size="3"> Finance (A2) </font></td>
                        <td rowspan="2"><center><font size="3"> Waiting <br> For <br> Review (B) </font></center></td>
                        <td rowspan="2"><center><font size="3"> Waiting <br> For <br> Verification (C) </font></center></td>
                        <td rowspan="2"><center><font size="3"> Waiting <br> For <br> Approval </font></center></td>
                        <td rowspan="2"><center><font size="3"> Waiting <br> For <br> Payment </font></center></td>
                      </tr> -->
                      <!-- <tr>
                        <td colspan="2"><center><font size="3"> Under Processing (A) </font></center></td>
                      </tr>                    -->
                    </table>
                  </div>  
                  </div>  
                </div>              
                              
              </div>
              <!--/.box success-->
            </div>            
          </div>             

          <div class="col-md-5"><!--PieChart-->
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
                    <div id="pieChart" style="min-width: 580px; height: 400px; max-width: 400px; margin: 0 auto"></div>  
                    <br><br><br>        
                    
                    </div>  
                  </div>
                <!-- /.box-body -->               
              </div>
              <!--/.box -->              
            </div>
          </div>

		      <div class="col-md-12"><!--Filter BY-->
            <div class="box-body">
              <!-- USERS LIST -->
              <div class="box box-success">           
                <div class="box-header with-border">
                  <!-- <h3 class="box-title">Pencarian</h3> -->
                  <button class="btn btn-default" data-toggle="collapse" data-target="#cari"><i class="fa fa-search"></i>&nbsp;&nbsp;Advanced Search</button>
                </div>
                <!-- /.box-header -->
                <div id="cari" class="collapse">
                  <div class="box-body">
                    <div class="row">
                      <form id="formCari">		
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="col-md-1">Criteria</label>
                            <div class="col-md-2">
                                <select class="form-control select2" id="selsearch" name="selsearch" style="width: 100%;">
                                <option value='0'>== Pilih ==</option>
                                <option value='1'> Tanggal </option>
                                <option value='2'> Jenis Pembayaran </option>
                                <option value='3'> Nomor Surat </option>
                                <option value='4'> Pemohon </option>
                              </select>
                            </div> 	
                            <div class="col-md-6">
                              <input name="txtpencarian" id="txtpencarian" placeholder="Kata Pencarian" class="form-control" type="text" >
                            </div>		
                              
                            <div class="col-md-3">
                          <!-- <div class="form-group">
                            <label>&nbsp;</label>      -->        
                            <span class="input-group-btn">
                              <button type="button" id="btnCari" class="btn btn-success btn-flat" onclick="caridata()" ><i class="glyphicon glyphicon-search"></i>&nbsp;&nbsp;Search</button>
                            </span>   

                          <!-- </div> -->
                          <!-- /.form-group -->
                        </div>
                          </div>     
                          
                        </div>
                      </form>
                      <!-- /.col -->
                      </div>
                    <!-- /.row -->
                  </div>
                </div>
                <!-- /.box-body -->  
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
                    <th>Status CSF</th>
                    <th>Nomor SP3</th>
                    <th>Type</th>
                    <th>Tanggal SP3 Submit</th>
                    <th>Deskripsi</th>
                    <th>Pemohon</th>
                    <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $i = 1;
                        foreach ($list_monitoring as $row){                          
                        // $c_jp = count($row->jenis_pembayaran);
                        $test1 = $row->jenis_pembayaran;                        
                        $test2 = explode(";", $test1);
                        $test3 = count($test2);                        
                        ?>
                    <tr>
                    <td><center><?php echo $i++; ?></center></td>
                    <td><center><?php 
                          if($row->status == 2){
                            echo "<img src='assets/dashboard/images/legend/submitted.png'>";
                          }else if($row->status == 4){
                            echo "<img src='assets/dashboard/images/legend/icon_tax.png'>";
                          }else if($row->status == 5){
                            echo "<img src='assets/dashboard/images/legend/icon_finance.png'>";
                          }else if($row->status == 6){
                            echo "<img src='assets/dashboard/images/legend/icon_file.png'>";
                          }else if($row->status == 7){
                              echo "<img src='assets/dashboard/images/legend/icon_checklist.png'>";
                          }else if($row->status == 8){
                            echo "<img src='assets/dashboard/images/legend/icon_user.png'>";
                          }else if($row->status == 9){
                            echo "<img src='assets/dashboard/images/legend/paid2.png'>"; 
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
                    <td><?php echo $row->tanggal_new; ?></td>
                    <td><?php echo $row->label1; ?></td>
                    <td><?php echo $row->display_name; ?></td>
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

    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <!-- /.box -->
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">            
              <table id="" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width: 10%" >NO.</th>
                    <th style="width: 20%" >Status</th>
                    <th>Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td><img src="assets/dashboard/images/legend/draft.png"></td>
                    <td>Draft</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td><img src="assets/dashboard/images/legend/draftprint.png"></td>
                    <td>Draft(Print)</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td><img src="assets/dashboard/images/legend/processing.png"></td>
                    <td>Proceesing</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td><img src="assets/dashboard/images/legend/verified.png"></td>
                    <td>Verified</td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td><img src="assets/dashboard/images/legend/approved.png"></td>
                    <td>Approved</td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td><img src="assets/dashboard/images/legend/paid1.png"></td>
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
<!-- <script src="assets/dashboard/plugins/jQuery/jquery-2.2.3.min.js"></script> -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
  $( function() {
    $( "#end_date" ).datepicker();
    $( "#start_date" ).datepicker();
  } );
</script>

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
                '#06717C',
                '#0595A3', 
                '#06C4D7', 
                '#8EEBF4'                
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
                name: '<?php echo $key->jenis_pembayaran; ?>',
                y: <?php echo $key->jmlpembayaran; ?>
              },
            <?php } ?>
              ]
      }]
  });

</script>

<script type="text/javascript"> 
 function caridata()
    {
	  url = "<?php echo base_url('dashboard/caridatadashboard2') ?>";
      $.ajax({
            url : url,
            type: "POST",
            data: $('#formCari').serialize(),
            dataType: "JSON",
            success: function(data)
            {
              console.log(data);
			    var status; 
				var istatus;
				var ino=1;
				var tbl1 = $('#example1').DataTable(); 
				tbl1.clear().draw();
                $.each(data, function(key, item) 
                      {       
					    status =  item.status;
						switch(status) {
						  case "0":
							istatus ='<img src="assets/dashboard/images/legend/draft.png">';  
							break;
						  case "1":
							istatus ='<img src="assets/dashboard/images/legend/draftprint.png">';
							break;
						  case "11":
							istatus ='<img src="assets/dashboard/images/legend/draftprint.png">';
							break;
                          case "2":
							istatus ='<img src="assets/dashboard/images/legend/submitted.png">';
							break;
                          case "3":
							istatus ='<img src="assets/dashboard/images/legend/rejected.png">';
							break;
                          case "4":
							istatus = '<img src="assets/dashboard/images/legend/processing.png">';
							break;
                          case "5":
							istatus ='<img src="assets/dashboard/images/legend/processing.png">';
							break;
                          case "6":
							istatus ='<img src="assets/dashboard/images/legend/processing.png">';
							break;
                          case "7":
							istatus = '<img src="assets/dashboard/images/legend/processing.png">';
							break;
                          case "8":
							istatus = '<img src="assets/dashboard/images/legend/verified.png">';
							break;
                          case "9":
							istatus = '<img src="assets/dashboard/images/legend/approved.png">';
							break; 
                          case "10":
							istatus = '<img src="assets/dashboard/images/legend/paid1.png">';
							break;  
						  default:
							istatus = '';
						}
						
						tbl1.row.add( [
						  ino,
						  istatus,
						  item.jenis_pembayaran,
						  item.nomor_surat,
              item.submit_date,
						  item.label1,
						  item.display_name,
						  '<a href="dashboard/form_view/' + item.id_payment + '"><button class="btn btn-primary btn-sm">View</button></a>'
                        ] ).draw(false);
						ino++; 
                })  
            },
            error: function (data)
            {
              console.log(data);
                alert('Error get data');
            }
        });
    }
	
</script>