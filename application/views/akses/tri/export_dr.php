<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css"/> 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.6/css/rowReorder.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css"/>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DATA READY TO EXPORT
      </h1>
    </section>

    <section class="content">
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
											<option value='1'> Status </option>
											<!-- <option value='2'> Jenis Pembayaran </option> -->
											<!-- <option value='3'> Nomor SP3 </option>
											<option value='4'> Pemohon </option>
											<option value='5'> Penerima </option> -->
										</select>
									</div> 	
									<div class="col-md-3">
										<!--<input name="txtpencarian" id="txtpencarian" placeholder="Kata Pencarian" class="form-control" type="text" >-->
										<select class="form-control" id="selstatus" name="selstatus" style="display:none" >
											<option value=''>== Pilih ==</option>
											<option value='0'> Draft </option>
											<option value='1'> Draft Print </option>
											<option value='2'> Submitted </option>
											<option value='4'> Processing</option>
											<option value='8'> Verified </option>
											<option value='9'> Approved </option>
											<option value='10'> Paid </option>
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

      <!-- Info boxes -->
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
                  <th>Description</th>
                  <th>Pemohon</th>
                  <th>Bank Account</th>
                  <th>Nama Penerima</th>
                  <!-- <th>Action</th> -->
                </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 1;
                    foreach ($draftreq as $row){
                      $test1 = $row->jenis_pembayaran;                        
                      $test2 = explode(";", $test1);
                      $test3 = count($test2);                        
                  ?>
                <tr>
                  <td><?php echo $i++; ?></td>                  
                  <td><?php if($row->status == 0){
                          echo "Draft";  
                        }else if($row->status == 1){
                          echo "Draft (Print)";  
                        }else if($row->status == 11){
                          echo "Draft (Print)";  
                        }else if($row->status == 99){
                          echo "Draft (Print)";  
                        }else if($row->status == 2){
                          echo "Submitted";
                        }else if($row->status == 3){
                          echo "Draft (Print)";
                        }else if($row->status == 4){
                          echo "Processing";
                        }else if($row->status == 5){
                          echo "Processing";
                        }else if($row->status == 6){
                          echo "Processing";
                        }else if($row->status == 7){
                          echo "Processing";
                        }else if($row->status == 8){
                          echo "Verified";
                        }else if($row->status == 9){
                          echo "Approved"; 
                        }else if($row->status == 10){
                          echo "Paid"; 
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
                  <!-- <td>
                    <a href="Dashboard/form_view/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>                    
                  </td>       -->
                  </tr>
                    <?php } ?>      
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
<!-- Bootstrap 3.3.6 -->
<script src="assets/dashboard/bootstrap/js/bootstrap.min.js"></script>
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

<!-- Export DataTable -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>

<script>
$(function () {
    $(document).ready(function() {
    $('#example1').DataTable( {
        dom: 'Bfrtip',
        lengthMenu: [
          [10, 25, 50, -1],
          [ '10 rows', '25 rows', '50 rows', 'Show All']
        ],
        
        buttons: [ 'excel', 'pdf'],
        responsive: true

    } );
} );

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });

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

<script type="text/javascript"> 
 function caridata()
    {
	  url = "<?php echo base_url('Tri/caridataDR') ?>";
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
							istatus ='Draft';  
							break;
						  case "1":
							istatus ='Draft Print';
							break;
						  case "11":
							istatus ='<img src="assets/dashboard/images/legend/draftprint.png">';
							break;
              case "99":
							istatus ='<img src="assets/dashboard/images/legend/draftprint.png">';
							break;
                          case "2":
							istatus ='Submitted';
							break;
                          case "3":
							istatus ='<img src="assets/dashboard/images/legend/rejected.png">';
							break;
                          case "4":
							istatus = 'Processing';
							break;
                          case "5":
							istatus ='Processing';
							break;
                          case "6":
							istatus ='Processing';
							break;
                          case "7":
							istatus = 'Processing';
							break;
                          case "8":
							istatus = 'Verified';
							break;
                          case "9":
							istatus = 'Approved';
							break; 
                          case "10":
							istatus = 'Paid';
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
</body>
</html>
