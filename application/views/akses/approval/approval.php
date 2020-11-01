<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
    <?php if ($start_date && $end_date){
              $start_date = $start_date;
              $end_date = $end_date;
          }else{
              $start_date = 1;
              $end_date = 1;
          } ?>
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
                <td class="period"><input type="text" name="start_date" id="start_date" value="<?php echo $start_date; ?>"></td>
                <td><font size="3">s/d</font></td>
                <td class="period"><font color="white" size="3"> Date </font></td>
                <td class="period"><input type="text" name="end_date" id="end_date" value="<?php echo $end_date; ?>"></td>
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
                    <span class="info-box-icon"><img align="center" src="assets/dashboard/images/legend/approval.png"></i></span>
                      <br>
                      <?php foreach ($wApproval as $wApproval) { ?>
                        <a href="<?php echo base_url('Approval/all_detail_approval/1/'.$start_date.'/'.$end_date)?>"><font size='5' color="white"><center><?php echo $wApproval->approval; ?></center></font></a>
                      <?php } ?>
                      <center><font size='3' color="white">Waiting for Approval </center> 
                      <br>
                      <p><center><font size='3' color="black">*) Jumlah Form APF yang belum di Approved </center></p> 
                  </div>
                </td>
                <td align="center" width="10%">
                  <div class="info-box box1">
                    <span class="info-box-icon"><img align="center" src="assets/dashboard/images/legend/paid.png"></i></span>
                      <br>
                      <?php foreach ($tot_approved as $tot_approved) { ?>

                        <a href="<?php echo base_url('Approval/all_detail_approval/2/'.$start_date.'/'.$end_date)?>"><font size='5' color="white"><center><?php echo $tot_approved->tot_approved; ?></center></font></a>
                      <?php } ?>
                      <center><font size='3' color="white">Waiting For Payment</center>
                      <br>
                      <p><center><font size='3' color="black">*) Jumlah Form APF yang sudah di Approved, dan belum dibayarkan</center></p> 
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
				<div class="box-header with-border">
					<button class="btn btn-default" data-toggle="collapse" data-target="#cari"><i class="fa fa-search"></i>&nbsp;&nbsp;Filter By</button>
					&nbsp;&nbsp;&nbsp;
					<button class="btn btn-success" id="btnexcel" onclick="exportexcel()"><i class="fa fa-download"></i>&nbsp;&nbsp;Excel</button>
					<button class="btn btn-success" id="btnpdf" onclick="exportpdf()"><i class="fa fa-download"></i>&nbsp;&nbsp;PDF</button>
				</div>
				
					<div id="cari" class="collapse">
						<div class="box-header with-border">
							<div class="row">
								<form id="formCari">		
									<div class="col-md-12">
										<div class="form-group">
											<label class="col-md-1">Criteria</label>
											<div class="col-md-2">
												 <select class="form-control select2" id="selsearch" name="selsearch" style="width: 100%;">
													<option value='0'>== Pilih ==</option>
													<option value='1'> Status </option>
													<option value='2'> Jenis Pembayaran </option>
												</select>
											</div> 	
											<div class="col-md-3">
												<select class="form-control" id="selstatus" name="selstatus" style="display:none" >
													<option value=''>== Pilih ==</option>
													<option value='8'> Waiting For Approval </option>
													<option value='9'> Waiting For Payment </option>
													<option value='10'> Paid </option>
												</select>
												
												<select class="form-control" id="seljnspembayaran" name="seljnspembayaran" style="display:none" >
													<option value=''>== Pilih ==</option>
													<option value='4'> Direct Payment </option> 
													<option value='2'> Advance Request </option>
													<option value='3'> Advance Settlement </option>
													<option value='5'> Cash Received </option>
												</select>
												
												<select class="form-control" id="selblank" name="selblank"  >
													<option value=''>== Pilih ==</option>
												</select>
											</div>		
												
											<div class="col-md-3">
										<!-- <div class="form-group">
											<label>&nbsp;</label>      -->        
											<span class="input-group-btn">
												<button type="button" id="btnCari" class="btn btn-success btn-flat" onclick="caridata()" ><i class="glyphicon glyphicon-search"></i>&nbsp;&nbsp;Filter</button>
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
				
				
			  <div class="box-body">
              <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>NO.</th>
                  <th>Status</th>
                  <th>Jenis Pembayaran</th>
                  <th>Tanggal Submit</th>
                  <th>APF No</th>
                  <th>Deskripsi</th>
                  <th>Pemohon</th>
                  <th>Approver 1</th>
                  <th>Approver 2</th>
                  <th>Approver 3</th>
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
                            echo "<img src='assets/dashboard/images/legend/icon_approval.png'>";  
                        }else if($row->status == 12){
                          echo "<img src='assets/dashboard/images/legend/icon_approval.png'>"; 
                        }else if($row->status == 13){
                          echo "<img src='assets/dashboard/images/legend/icon_approval.png'>";
                        }else if($row->status == 3){
                            echo "<img src='assets/dashboard/images/legend/reject.png'>";
                        }else if($row->status == 9){
                          echo "<img src='assets/dashboard/images/legend/icon_payment.png'>";
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
                  <td><?php echo $row->display_name; ?></td>
                  <td><?php echo $row->persetujuan_pembayaran1; ?></td>
                  <td><?php echo $row->persetujuan_pembayaran2; ?></td>
                  <td><?php echo $row->persetujuan_pembayaran3; ?></td>
                  <td>
                      <!-- <a href="approval/form_view/<?php echo $row->id_pay; ?>"><button class="btn btn-primary btn-sm">View</button></a> -->
                      <?php if ($row->jenis_pembayaran == 4) { ?>   
                        <a href="approval/form_vprf/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>
                      <?php } ?>
                      <?php if ($row->jenis_pembayaran == 2) { ?> 
                        <a href="approval/form_varf/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>
                      <?php } ?>
                      <?php if ($row->jenis_pembayaran == 3) { ?> 
                        <a href="approval/form_vasf/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>                    
                      <?php } ?>
                      <?php if ($row->jenis_pembayaran == 5) { ?> 
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
                        <p align="justify">Apa Anda yakin akan Menyetujui Form Pengajuan ini :  <?=$row->nomor_surat?></p>
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
                        <p align="justify">Apa Anda yakin akan me-rejected Form Pengajuan ini : <?=$row->nomor_surat?></p>
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
                <div class="box-footer">  
                  <div class="form-group">
                    <label class="control-label col-md-1"><i>Legend</i></label> <br>
                    <div class='col-md-2'><img src='assets/dashboard/images/legend/icon_approval.png'> &nbsp;Waiting For Approval</div>
                    <div class='col-md-2'><img src='assets/dashboard/images/legend/icon_payment.png'> &nbsp;Waiting For Payment</div>
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

$('#selsearch').change(function() {
		  if( $(this).val() == '1') {
				$('#selblank').css("display", "none");
				$('#selstatus').css("display", "block");
				$('#seljnspembayaran').css("display", "none");
		  } else if( $(this).val() == '2'){   
			$('#selblank').css("display", "none");
			$('#selstatus').css("display", "none");
			$('#seljnspembayaran').css("display", "block");
		  }else{
			$('#selblank').css("display", "block");
			$('#selstatus').css("display", "none");
			$('#seljnspembayaran').css("display", "none");
		  }
		})
		
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
              },
			   point: {
					events: {
                    click: function() {
                        location.href = this.options.link;
                    }
                }
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
                y: <?php echo $key->jmlpembayaran; ?>,
				        link:'<?php echo base_url('Approval/'.$key->link.'_new/'.$start_date.'/'.$end_date);?> '
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

	function caridata()
    {
	  url = "<?php echo base_url('approval/caridataapproval') ?>";
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
				var ipmt;
				var ino=1;
				var tbl1 = $('#example1').DataTable(); 
				tbl1.clear().draw();
                $.each(data, function(key, item) 
                      {       
					    status =  item.status;
						pmt = item.jenis_pembayaran;
						switch(status) {						
						  case "8":
							istatus ='<img src="assets/dashboard/images/legend/icon_approval.png">';  
							break;
						  case "9":
							istatus ='<img src="assets/dashboard/images/legend/icon_payment.png">';
							break;
						  case "10":
							istatus ='<img src="assets/dashboard/images/legend/paid1.png">';
							break;
                          case "12":
							istatus ='<img src="assets/dashboard/images/legend/icon_approval.png">';
							break;
                          case "13":
							istatus ='<img src="assets/dashboard/images/legend/icon_approval.png">';
							break;  
						  default:
							istatus = '';
						}
						
						switch(pmt) {						
						  case "2":
							ipmt ='<a href="approval/form_varf/' + item.id_payment + '"><button class="btn btn-primary btn-sm">View</button></a>';  
							break;
						  case "3":
							ipmt ='<a href="approval/form_vasf/' + item.id_payment + '"><button class="btn btn-primary btn-sm">View</button></a>';
							break;
						  case "4":
							ipmt ='<a href="approval/form_vprf/' + item.id_payment + '"><button class="btn btn-primary btn-sm">View</button></a>';
							break;
                          case "5":
							ipmt ='<a href="approval/form_vcrf/' + item.id_payment + '"><button class="btn btn-primary btn-sm">View</button></a>';
							break;
						  default:
							ipmt = '';
						}
						
						tbl1.row.add( [
						  ino,
						  istatus,
						  item.jenis_pembayaran_desc,
						  item.tanggal,
						  item.apf_doc,
						  item.description,
						  item.display_name,
						  item.persetujuan_pembayaran1,
						  item.persetujuan_pembayaran2,
						  item.persetujuan_pembayaran3,
						  ipmt
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
	
	function exportexcel()
    {
		$.ajax({
			url : "<?php echo base_url('approval/exportapprovallist')?>",
			type: "POST",
			data: $('#formCari').serialize(),
			dataType: "JSON",
			success: function(data)
			{
			  console.log(data);
			},
			error: function (data)
			{
			  console.log(data);
				alert('Error Download data');
				return;
			}
		});				
		window.location.href="<?php echo base_url('approval/exportexcelapprovalreport')?>";
    }
	
	function exportpdf()
    {
		$.ajax({
			url : "<?php echo base_url('approval/exportapprovallist')?>",
			type: "POST",
            data: $('#formCari').serialize(),
            dataType: "JSON",
            success: function(data)
            {
              console.log(data); 
              window.location.href="<?php echo base_url('approval/exportapprovalpdf')?>";
            },
            error: function (data)
            {
              console.log(data);
                alert('Error export data');
            }
        });
    }
</script>
