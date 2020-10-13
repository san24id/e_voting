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
		// $divcreditcard='';
		// if($this->session->userdata('filter')=='6'){
		// 	$divcreditcard=' ';
		// 	$divpayment='style="display:none;"';
		// }else{
		// 	$divpayment=' ';
		// 	$divcreditcard='style="display:none;"';
		// }
		// ?>     
      </h1> 
    </section>

    <section class="content bg-white">
        
		<div class="box box-default">
			
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
                        <th>Jenis Pembayaran</th>
                        <th>Tanggal Submit</th>
                        <th>APF No</th>
                        <th>Deskripsi</th>
                        <th>Pemohon</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $i = 1;
                        foreach ($approval as $row){                          
                        // $c_jp = count($row->jenis_pembayaran);
                        $test11 = $row->apf;                        
                        $test22 = explode(";", $test11);
                        $test33 = count($test22);                        
                        ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><center> <?php 
                                if($row->status == 8){
                                  echo "<img src='assets/dashboard/images/legend/verified.png'>";  
                                }else if($row->status == 12){
                                  echo "<img src='assets/dashboard/images/legend/verified.png'>"; 
                                }else if($row->status == 13){
                                  echo "<img src='assets/dashboard/images/legend/verified.png'>";
                                }else if($row->status == 3){
                                  echo "<img src='assets/dashboard/images/legend/reject.png'>";
                                }else if($row->status == 9){
                                  echo "<img src='assets/dashboard/images/legend/approved.png'>";
                                }else if($row->status == 10){
                                  echo "<img src='assets/dashboard/images/legend/paid1.png'>";  
                                }
                            ?></center>
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
								  echo "<div class='col-md-2'><img src='assets/dashboard/images/legend/verified.png'> &nbsp;Waiting For Approval</div>";
								break;
							  case "2":
							  	echo "<label class='control-label col-md-1'><i>Legend</i></label>";
			  					echo "<div class='col-md-1'><img src='assets/dashboard/images/legend/approved.png'> &nbsp;Approved</div>";
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
						  '<a href="dashboard/form_sp3/' + item.id_payment + '"><button class="btn btn-primary btn-sm">View</button></a>'
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
