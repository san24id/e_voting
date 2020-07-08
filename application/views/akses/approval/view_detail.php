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
                      <th>Penerima Pembayaran</th>
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
                      <th>Pemegang Karut</th>
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
	
</script>

<script>
function printThis() {
  window.print();
}
</script>
</body>
</html>
