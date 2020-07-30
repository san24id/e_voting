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
				margin-left: 10px;
   }
   .box2{width:200px;
				height:90px;
        background: linear-gradient(#339966, #0066CC);
				border: linear-gradient(#339966, #0066CC);
        border-radius: 8px;
				display: inline-block;
				margin-left: 10px;
   }
   .box3{width:250px;
				height:90px;
        background: linear-gradient(#339966, #0066CC);
				border: linear-gradient(#339966, #0066CC);
        border-radius: 8px;
				display: inline-block;
				margin-left: 10px;
   }
   .box4{width:100px;
				height:90px;
        background: linear-gradient(#339966, #0066CC);
				border: linear-gradient(#339966, #0066CC);
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
       <h1>
        <?php echo $this->session->userdata("titleHeader"); 
		
		$divpayment='';
		$divcreditcard='';
		if($this->session->userdata('filter')=='6'){
			$divcreditcard=' ';
			$divpayment='style="display:none;"';
		}else{
			$divpayment=' ';
			$divcreditcard='style="display:none;"';
		}
		?>     
      </h1> 
    </section>

    <section class="content bg-white">
        
		<div id="divPayment" <?php echo $divpayment;?>>
		<div class="box box-default">
			<div class="box-header with-border">
				<!-- <h3 class="box-title">Pencarian</h3> -->
				<button class="btn btn-default" data-toggle="collapse" data-target="#cari"><i class="fa fa-search"></i>&nbsp;&nbsp;Filter By</button>
				
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
											<?php
												$criteria=$this->session->userdata('filter');
												
												switch ($criteria) {
												  case "1":
													echo "<option value='1'> Status </option>";									
													break;
												  case "2":
													echo "<option value='1'> Status </option>";										
													break;
												  case "3":
													echo "<option value='1'> Status </option>";
													break;
												  default:
													echo "";										
													
												}
											?>
											<option value='2'> Jenis Pembayaran  </option>
											<!--<option value='1'> Status </option>
											<option value='2'> Jenis Pembayaran </option>
											<option value='3'> Nomor Surat </option>
											<option value='4'> Pemohon </option>
											<option value='5'> Penerima </option> -->
										</select>
									</div> 	
									<div class="col-md-6">
										<!--<input name="txtpencarian" id="txtpencarian" placeholder="Kata Pencarian" class="form-control" type="text" >-->
										<select class="form-control" id="selstatus" name="selstatus" style="display:none" >
											<option value=''>== Pilih ==</option>
											<?php 
												$filter=$this->session->userdata('filter');
												
												switch ($filter) {
												  case "1":
													echo "<option value='0'> Draft </option>";
													echo "<option value='1'> Draft Print </option>";
													echo "<option value='2'> Submitted </option>";
													echo "<option value='4'> Processing</option>";
													echo "<option value='8'> Verified </option>";
													echo "<option value='9'> Approved </option>";										
													break;
												  case "2":
													echo "<option value='2'> Submitted </option>";
													echo "<option value='4'> Processing</option>";
													echo "<option value='8'> Verified </option>";
													echo "<option value='9'> Approved </option>";											
													break;
												  case "3":
													echo "<option value='0'> Draft </option>";
													echo "<option value='1'> Draft Print  </option>";
													break;
												  default:
													echo "";											
													
												}
											?>
											<!-- <option value='0'> Draft </option>
											<option value='1'> Draft Print </option>
											<option value='2'> Submitted </option>
											<option value='3'> Rejected </option>
											<option value='4'> Processing Tax </option>
											<option value='5'> Processing Finance </option>
											<option value='6'> Waiting for Review </option>
											<option value='7'> Waiting for Verivication </option>
											<option value='8'> Waiting for Approved </option>
											<option value='9'> Waiting for Payment </option>
											<option value='10'> Paid </option>-->
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
		<?php 
					  $trdisplay='';
					  if($this->session->userdata("statuspayment")=="3" || $this->session->userdata("statuspayment")=="7" || $this->session->userdata("statuspayment")=="8"){
						  $trdisplay="style='display:none'";
					  }else{
						  $trdisplay='';
					  }
					  ?>
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
                      <th>Penerima Pembayaran</th>
					            <th <?php echo $trdisplay; ?>>Tanggal Submit SP3</th>
												 
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
                        ?>
                    </td>                  
                    <td><?php echo $row->tanggal_new; ?></td>
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
                    <td <?php echo $trdisplay; ?>><?php echo $row->submit_date;?></td>
                    <td>
                      <a href="dashboard/form_view/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a> &nbsp;
                      <?php if($row->status=="0" || $row->status=="1"){ 
                      if($this->session->userdata("display_name")==$row->display_name){  ?>
                      <!--<button class="btn btn-danger btn-sm" title="Delete" onclick="deletedraftpayment('<?php echo $row->id_payment; ?>')"><i class="glyphicon glyphicon-trash"></i></button>-->
                      <button type="button" data-toggle="modal" data-target="#mdldelete" class="btn btn-danger btn-sm" title="Delete" ><i class="glyphicon glyphicon-trash"></i></button>
                        <div class="modal fade" id="mdldelete" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-xl" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title">Message Box</h3>
                            </div>

                            <div class="modal-body">
                            <form>
                            <p align="justify">Apa anda yakin akan menghapus Form SP3 ini : <?=$row->nomor_surat?></p>
                            </div>
                            <div class="modal-footer">                        
                            <button type="button" class="btn btn-success bye" onclick="deletedraftpayment('<?php echo $row->id_payment; ?>')">Yes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </form>
                            </div>
                          </div>
                          </div>
                        </div>
                      <?php }} ?>
                    </td>      
                    </tr>
                    <?php  } ?>
                    </tbody>
                  </table>
                </div>
				<div class="box-footer">  
					<div class="form-group">
						<?php 
							$filter=$this->session->userdata('filter');
						
						
							switch ($filter) {
							  case "1":
								echo "<label class='control-label col-md-1'><i>Legend</i></label>";
								echo "<div class='col-md-1'><img src='assets/dashboard/images/legend/draft.png'> &nbsp; Draft</div>";
								echo "<div class='col-md-1'><img src='assets/dashboard/images/legend/draftprint.png'> &nbsp;Draft(Print)</div>";
								echo "<div class='col-md-1'><img src='assets/dashboard/images/legend/submitted.png'> &nbsp;Submitted</div>";
								echo "<div class='col-md-1'><img src='assets/dashboard/images/legend/processing.png'> &nbsp;Processing</div>";
								echo "<div class='col-md-1'><img src='assets/dashboard/images/legend/verified.png'> &nbsp;Verified</div>";
								echo "<div class='col-md-1'><img src='assets/dashboard/images/legend/approved.png'> &nbsp;Approved</div>";
								break;
							  case "2":
								echo "<label class='control-label col-md-1'><i>Legend</i></label>";
								echo "<div class='col-md-1'><img src='assets/dashboard/images/legend/submitted.png'> &nbsp;Submitted</div>";
								echo "<div class='col-md-1'><img src='assets/dashboard/images/legend/processing.png'> &nbsp;Processing</div>";
								echo "<div class='col-md-1'><img src='assets/dashboard/images/legend/verified.png'> &nbsp;Verified</div>";
								echo "<div class='col-md-1'><img src='assets/dashboard/images/legend/approved.png'> &nbsp;Approved</div>";
								break;
							  case "3":
								echo "<label class='control-label col-md-1'><i>Legend</i></label>";
								echo "<div class='col-md-1'><img src='assets/dashboard/images/legend/draft.png'> &nbsp;Draft</div>";
								echo "<div class='col-md-2'><img src='assets/dashboard/images/legend/draftprint.png'> &nbsp;Draft(Print)</div>";
								break;
							  default:
								echo "";																				
							}
						?>					  
					</div>  
				</div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>  
		</div>
		
		<div class="row" id="divCreditCard" <?php echo $divcreditcard;?>>
            <div class="col-xs-12">
            <!-- /.box -->
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>No.</th>
                      <th>Divisi</th>
                      <th>Pemegang Kartu</th>
                      <th>Nama PIC</th>
                      <th>Target Submission</th>
                      <th>Jatuh Tempo</th>
                      <th>Jumlah</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $i = 1;
                        foreach ($creditcard as $row){ 
                        ?>
                    <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row->division_id; ?></td>                  
                    <td><?php echo $row->pemegang_kartu; ?></td>
                    <td><?php echo $row->nama_pic; ?></td>
                    <td><?php echo $row->target_submission; ?></td>
                    <td><?php echo $row->tempo; ?></td>
                    <td><?php echo $row->jatah; ?></td> 
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
    
<!-- <section class="content">
      <div class="row">
        <div class="col-xs-12 col-md-4">
          <div class="box">
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
			</div>
			</div>
			</div>
			</section> -->
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
    $('#example2').DataTable();
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
						  item.akun_bank,
						  item.penerima,
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
	
	function deletedraftpayment(id)
    {
		$.ajax({
				url : "<?php echo base_url('dashboard/draftpaymentdelete')?>/"+id,
				type: "POST",
				dataType: "JSON",
				success: function(data)
				{               
					location.reload();
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error deleting data');
				}
			});
    }
</script>

<script>
function printThis() {
  window.print();
}


$(document).ready(function() { 
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
		
		});
</script>
</body>
</html>
