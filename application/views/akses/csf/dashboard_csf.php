<style type="text/css">
   .satu { border: 6px solid orange; border-radius: 6px; background: orange;}
   .dua { border: 6px solid #3399ff; border-radius: 6px; }
   .tiga { border: 6px solid #3399ff; border-radius: 6px; background: #33ccff}
   .empat { border: 6px solid #3399ff; border-radius: 6px; background: #3399ff; }
   .lima { border: 6px solid #228B22; border-radius: 6px; }
   .enam { border: 6px solid #228B22; border-radius: 6px; background: #9ACD32;}
   .tujuh { border: 6px solid #228B22; border-radius: 6px; background: #228B22;}
   .box1{width:250px;
				height:90px;
        background: linear-gradient(#339966, #0066CC) ;
				border: linear-gradient(#339966, #0066CC);
        border-radius: 8px;
				display: inline-block;
				/* margin-left: 10px; */
   }
   .box2{width:200px;
				height:90px;
        background: linear-gradient(#339966, #0066CC);
				border: linear-gradient(#339966, #0066CC);
        border-radius: 8px;
				display: inline-block;
				/* margin-left: 10px; */
   }
   .box3{width:250px;
				height:90px;
        background: linear-gradient(#339966, #0066CC);
				border: linear-gradient(#339966, #0066CC);
        border-radius: 8px;
				display: inline-block;
				/* margin-left: 10px; */
   }
   .box4{width:100px;
				height:90px;
        background: linear-gradient(#339966, #0066CC);
				border: linear-gradient(#339966, #0066CC);
        border-radius: 8px;
				display: inline-block;
				/* margin-left: 10px; */
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
          <div class="col-md-3">
          <div class="info-box bg-gray">
            <span class="info-box-icon box4"><img align="center" src="assets/dashboard/images/legend/Total_payment_request.png"></i></span>
            <div class="info-box-content bg-gray">
              <br>
              <?php foreach ($tot_pay_req as $tot_req) { ?>
              <a href="<?php echo base_url('dashboard/all_detail_payment/1')?>"><span class="info-box-number"><font size='5' color="green"><center> <?php echo $tot_req->totalreq; ?></center></font></span></a>
              <?php } ?>    
              <span class="info-box-text"><font color="green"><center>Total Payment Request(*)</center></font></span>  
            </div>            
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <p>*) seluruh sp3 yang telah dibuat dan belum dibayar</p>

          </div>
          <!-- /.col -->

          <div class="col-md-3">
          <div class="info-box bg-gray">
              <span class="info-box-icon box4"><img src="assets/dashboard/images/legend/Total_outstanding.png"></i></span>
              <div class="info-box-content bg-gray">
                <br>
                <?php foreach ($outstanding as $tot_outstanding) { ?>  
                <a href="<?php echo base_url('dashboard/all_detail_payment/2')?>"><span class="info-box-number"><font size='5' color="green"><center><?php echo $tot_outstanding->outstanding; ?></center></font></span></a>
                <?php } ?>            
                <span class="info-box-text "><font color="green"><center>&nbsp; Total Outstanding Payment Request (**)</center></font></span>
              </div>
              <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <p>**) seluruh sp3 yang sudah di submit ke CSF dan belum dibayar</p>

          </div>            
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix visible-sm-block"></div>

          <div class="col-md-3">
          <div class="info-box bg-gray">
              <span class="info-box-icon box4"><img src="assets/dashboard/images/legend/Total_draft.png"></i></span>
              <div class="info-box-content bg-gray">
                <br>  
                <?php foreach ($draft as $tot_draft) { ?>
                <a href="<?php echo base_url('dashboard/all_detail_payment/3')?>"><span class="info-box-number"><font size='5' color="green"><center><?php echo $tot_draft->totaldraft; ?></center></font></span></a>
                <?php } ?>            
                <span class="info-box-text "><font color="green"><center>Total Draft (***) </center></font></span>
            </div>
            <!-- /.info-box-content -->
            
          </div>
          <!-- /.info-box -->
          <p>***)seluruh draft sp3 yang belum disubmit ke CSF</p>

          </div>


          <div class="col-md-3">
          <div class="info-box bg-gray">
              <span class="info-box-icon box4"><img src="assets/dashboard/images/legend/user.png"></i></span>
              <div class="info-box-content bg-gray">
                <br>
                <span class="info-box-number"><font size='5' color="green"><center><?php echo $this->session->userdata("display_name"); ?></center></font></span>
                <span class="info-box-text "><font color="green"><center>View By</center></font></span>
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
                    <!-- periode -->
                    <table width="100%">
                      <?php echo form_open("Dashboard/periode_dashboard");?>
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
                  <table width="100%"> 
                    <tr>
                      <td colspan="45"><font size='6'><center>STATUS</center></font></td>
                    </tr>
                    <tr>
                      <?php foreach ($draft1 as $tot_draft) { ?>
                      <td width="12%"><div class="dua"><center><a href="<?php echo base_url('dashboard/all_detail_payment/7')?>"><font size='5' color="black"> <?php echo $tot_draft->totdraft; ?> </font> </center></div></a> </td><td> &nbsp; 
                      <?php } ?>   
                      <?php foreach ($draftprint as $draftprint) { ?>                    
                      <td width="12%"><div class="tiga"><center><a href="<?php echo base_url('dashboard/all_detail_payment/8')?>"><font size='5' color="black"> <?php echo $draftprint->draftprint; ?> </font></center></div></a> </td> <td> &nbsp;
                      <?php } ?>               
                      <?php foreach ($submit as $submit) { ?>
                      <td width="12%"><div class="empat"><center><a href="<?php echo base_url('dashboard/all_detail_payment/9')?>"><font size='5' color="black"> <?php echo $submit->submit; ?> </font> </div></a> </td> <td> &nbsp;
                      <?php } ?>                  
                      <?php foreach ($process as $process) { ?>
                      <td width="12%"><div class="lima"><center><a href="<?php echo base_url('dashboard/all_detail_payment/10')?>"><font size='5' color="black"> <?php echo $process->process; ?> </font></center></div></a> </td> <td> &nbsp;
                      <?php } ?>
                      <?php foreach ($verifikasi as $verifikasi) { ?>
                      <td width="12%"><div class="enam"><center><a href="<?php echo base_url('dashboard/all_detail_payment/11')?>"><font size='5' color="black"> <?php echo $verifikasi->verifikasi; ?> </font></center></div></a> </td> <td> &nbsp;
                      <?php } ?>
                      <?php foreach ($approval as $approval) { ?>
                      <td width="12%"><div class="tujuh"><center><a href="<?php echo base_url('dashboard/all_detail_payment/12')?>"><font size='5' color="white"> <?php echo $approval->approval; ?> </font></center></div></a> </td> <td> &nbsp;
                      <?php } ?>
                      <?php foreach ($paid as $paid) { ?>
                      <td width="12%"><div class="satu"><center><a href="<?php echo base_url('dashboard/all_detail_payment/13')?>"><font size='5' color="white"> <?php echo $paid->paid; ?> </font></div></a> </td><td> &nbsp;  
                      <?php } ?>
                    </tr>
                    <tr>   
                      
                      <td><center><font size='3'> Draft </center></div> </td> <td> &nbsp;
                                      
                      <td><center><font size='3'> Draft(Print) </center></div> </td> <td> &nbsp;
                      
                      <td><center><font size='3'> Submitted </div> </td> <td> &nbsp;
                      
                      <td><center><font size='3'> Processing </center></div> </td> <td> &nbsp;
                      
                      <td><center><font size='3'> Verified </center></div> </td> <td> &nbsp;
                      
                      <td><center><font size='3' > Approved </center></div> </font></td> <td> &nbsp;
                      
                      <td><center><font size='3' > Paid </div> </font></td> <td> &nbsp;
                      
                    </tr>
                  </table>
                </div>
                <br><br>               
                
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
                      <?php foreach ($upcoming_over as $sebentar) { $tanggal_sekarang = date('Ymd');   ?>
                        <?php 
                              $string = $sebentar->upcoming;
                              $stringBuka = str_replace("-", "", $string);
                              // echo $stringBuka;              
                        ?>

                        <?php if ($tanggal_sekarang >= $stringBuka) {
                              $count_overdue += 1;
                              }else{
                              $count_upcoming += 1;
                              }
                        ?>                        
                      <?php } ?>
                        <tr> 
                          <td align="center" width="25%"><div class="info-box box1">
                            <span class="info-box-icon"><img align="center" src="assets/dashboard/images/legend/calender.png"></i></span>
                            <center><font size='3' color="white">ADVANCE<br> Upcoming Overdue <br> </font> 
                            <a href="<?php echo base_url('dashboard/all_detail_payment/4')?>"><font size='5' color="white"><?php echo $count_upcoming; ?> </font></a></center></div>
                          </td>                          
                          <td align="center" width="25%"><div class="info-box box2">
                            <span class="info-box-icon"><img align="center" src="assets/dashboard/images/legend/calender.png"></i></span>
                            <center><font size='3' color="white">ADVANCE<br> Overdue <br> </font>
                            <a href="<?php echo base_url('dashboard/all_detail_payment/5')?>"><font size='5' color="white"><?php echo $count_overdue; ?> </font></a> </center></div>
                          </td>

                          <td align="center" width="25%"><div class="info-box box3">
                            <span class="info-box-icon"><img align="center" src="assets/dashboard/images/legend/creditcard.png"></i></span>
                            <center><font size='3' color="white"> Credit Card <br> Submission in 30 days <br> </font>
                            <?php foreach ($creditcard as $cc) { ?>
                            <a href="<?php echo base_url('dashboard/all_detail_payment/6')?>"><font size='5' color="white"><?php echo $cc->creditcard_pay;?> </font> </a></center></div>
                            <?php } ?>
                          </td>  
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

                  <div class="col-md-6">
                    <div id="pieChart" style="min-width: 580px; height: 400px; max-width: 600px; margin: 0 auto"></div> 
                    </div>
                  </div>
                  <!-- /.box-body -->               
                </div>
                <!--/.box -->              
            </div>
          </div>
        </div>

		<div class="box box-default">
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
											<option value='5'> Penerima </option>
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
                      <th>Tanggal SP3</th>
                      <th>Jenis Pembayaran</th>
                      <th>Nomor SP3</th>
                      <th>Deskripsi</th>
                      <th>Nama Pemohon</th>
                      <th>Nama Penerima</th>
                      <th>Tanggal Submit SP3</th>
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
                      <td><center><?php echo $i++; ?></center></td>
                      <td><center><?php if($row->status == 0){
                              echo "<img src='assets/dashboard/images/legend/draft.png'>";  
                            }else if($row->status == 1){
                              echo "<img src='assets/dashboard/images/legend/draftprint.png'>";  
                            }else if($row->status == 11){
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
                      <?php 
                            $sql = "SELECT nama FROM m_honorarium_konsultan WHERE kode_vendor='$row->penerima'";
                            $query = $this->db->query($sql)->result();
                            // return $query;
                            // var_dump($query[0]->nama);exit; 
                            if ($query[0]->nama) { $buka = $query[0]->nama;
                            }else{
                              $buka = $row->penerima;
                            }
                          ?>
                      <td><?php echo $buka; ?></td>
                      <td><?php echo $row->submit_date;?></td>
                      <td>
                        <a href="dashboard/form_view/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a> 
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
                name: '<?php echo $key->dsc; ?>',
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
	  url = "<?php echo base_url('dashboard/caridatadashboard') ?>";
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
              item.tanggal,
						  item.jenis_pembayaran,
						  item.nomor_surat,
						  item.label1,
						  item.display_name,
						  item.penerima,
						  item.submit_date,
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

<script>
function printThis() {
  window.print();
}
</script>
</body>
</html>
