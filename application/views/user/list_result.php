<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <font color="#00008B"><b>RESULT VOTE</b></font>
      </h1>
    </section>

    <section class="content">
    <div class="box box-default">
			<!-- <div class="box-header with-border">
				<h3 class="box-title">Pencarian</h3>
				<button class="btn btn-default" data-toggle="collapse" data-target="#cari"><i class="fa fa-search"></i>&nbsp;&nbsp;Filter By</button>
        <a href="home/export_cr"><button class="btn btn-success"><i class="fa fa-download"></i>&nbsp;&nbsp;Export</button></a>
        &nbsp;&nbsp;&nbsp;
        <button class="btn btn-success" id="btnexcel" onclick="exportexcel()"><i class="fa fa-download"></i>&nbsp;&nbsp;Excel</button>
        <button class="btn btn-success" id="btnpdf" onclick="exportpdf()"><i class="fa fa-download"></i>&nbsp;&nbsp;PDF</button>
				
			</div> -->
			<!-- /.box-header -->
			<div id="cari" class="collapse">
				<div class="box-body">
					<form id="formCari">		 
					<div class="row">
							
							<div class="col-md-12">
								<div class="form-group">
									<label class="col-md-1">Status</label>
									<!-- <div class="col-md-2">
										<select class="form-control select2" id="selsearch" name="selsearch" style="width: 100%;">
											<option value='0'>== Pilih ==</option>
											<option value='1'> Status </option>
																																														   
																																							
																							  
																																		
										</select>
									</div> -->	
									<div class="col-md-2">
										<!--<input name="txtpencarian" id="txtpencarian" placeholder="Kata Pencarian" class="form-control" type="text" >-->
										<select class="form-control" id="selstatus" name="selstatus" style="display:block" >
											<option value=''>All Status</option>
											<option value='0'> Draft </option>
											<option value='1'> Draft Print </option>
											<option value='2'> Submitted </option>
											<option value='4'> Processing</option>
											<option value='8'> Verified </option>
											<option value='9'> Approved </option>
											<option value='10'> Paid </option>
										</select>
                    
										<select class="form-control" id="selblank" name="selblank" style="display:none"  >
											<option value=''>== Pilih ==</option>
										</select>
                  </div>										
								</div> 
							</div>
					</div>
					</br>
					<div class="row">	
							<div class="col-md-12">
								<div class="form-group">
									<label class="col-md-1">Periode</label>										
									<div class="col-md-2">
										<input type="text" id="periode1" name="periode1" placeholder="Start Date" class="form-control" ></input>
									</div> 	
									<label class="col-md-1" style="width:4%">to</label>			
									<div class="col-md-2">
										<input type="text" id="periode2" name="periode2" placeholder="End Date" class="form-control" ></input>
									</div> 	
									
									<div class="col-md-3">
								<!-- <div class="form-group">
									<label>&nbsp;</label>            
									<span class="input-group-btn"> --> 
										<button type="button" id="btnCari" class="btn btn-success btn-flat" onclick="caridata()" ><i class="glyphicon glyphicon-search"></i>&nbsp;&nbsp;Filter</button>
									<!--</span>  
									<span class="input-group-btn"> --> 
										&nbsp;<button type="button" id="btnReset" class="btn btn-info btn-flat" onclick="resetdata()" ><i class="glyphicon glyphicon-refresh"></i>&nbsp;&nbsp;Reset</button>
									<!--</span>  

									 </div> -->
									<!-- /.form-group -->
									</div>
								</div>
								
								
							</div>
						
						<!-- /.col -->
					 </div>
					 
					<input type="hidden" id="txtprofile" name="txtprofile" value="5" ></input>
					</form>
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
                  <!-- <th>Jenis Pembayaran</th>-->
                  <th>Nomor SP3</th>
                  <th>Deskripsi</th>
                  <th>Pemohon</th>
                  <!-- <th>Bank Account</th>
                  <th>Penerima Pembayaran</th> -->
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 1;
                    foreach ($cashreceived as $row){
                                           
                  ?>
                <tr>
                  <td><?php echo $i++; ?></td>                  
                  
                  <td>
                    <a href="Home/form_view/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>                    
                  </td>      
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

    <!-- jQuery 2.2.3
<script src="assets/dashboard/plugins/jQuery/jquery-2.2.3.min.js"></script> -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
<script src="assets/dashboard/plugins/iCheck/icheck.min.js"></script>

<!--<script src="assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->

    <!-- Select2 -->
<script src="assets/dashboard/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>  
<!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>  -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>


<script type="text/javascript">
            $(document).ready(function(){
				$('#li-report').addClass("active");
				$('#lcr').addClass("active");
			});
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

$( "#periode1" ).datepicker({
		dateFormat: "dd/mm/yy"//,
		//setDate : new Date()
	});
	
	//$( "#periode1" ).datepicker('setDate', new Date());
	
	$('#periode1').keydown(function (event) {
		event.preventDefault();
	});
	
 $( "#periode2" ).datepicker({
		dateFormat: "dd/mm/yy"//,
		//setDate : new Date()
	});
	
	//$( "#periode2" ).datepicker('setDate', new Date());
	
	$('#periode2').keydown(function (event) {
		event.preventDefault();
	}); 
	
</script>

<script type="text/javascript">
function resetdata()
    {
		$('#selstatus').val('');
		$('#periode1').val('');
		$('#periode2').val('');
		url = "<?php echo base_url('home/resetMyReport') ?>";
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
							istatus ='<img src="assets/dashboard/images/legend/draftprint.png">';
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
						nom1=item.currency+' - '+item.label2;
						nom2='';
						nom3='';
						if (item.currency2!=''){
							nom2 = '</br>'+item.currency2+' - '+item.jumlah2;
						}
						
						if (item.currency3!=''){
							nom3 = '</br>'+item.currency3+' - '+item.jumlah3;
						}
						nominalAll=nom1+nom2+nom3;
						
						tbl1.row.add( [
						  ino,
						  istatus,
              item.tanggal,
						  //item.jenis_pembayaran,
						  item.nomor_surat,
						  nominalAll,
						  item.label1,
						  item.display_name,
						  // item.akun_bank,
						  // item.penerima,
						  '<a href="home/form_view/' + item.id_payment + '"><button class="btn btn-primary btn-sm">View</button></a>'
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
	
  
  
 function caridata()
    {
	  url = "<?php echo base_url('home/caridataMyReport') ?>"; //caridataCR
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
              case "99":
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
						
						nom1=item.currency+' - '+item.label2;
						nom2='';
						nom3='';
						if (item.currency2!=''){
							nom2 = '</br>'+item.currency2+' - '+item.jumlah2;
						}
						
						if (item.currency3!=''){
							nom3 = '</br>'+item.currency3+' - '+item.jumlah3;
						}
						nominalAll=nom1+nom2+nom3;
						
						tbl1.row.add( [
						  ino,
						  istatus,
              item.tanggal,
						  //item.jenis_pembayaran,
						  item.nomor_surat,
						  nominalAll,
						  item.label1,
						  item.display_name,
						  // item.akun_bank,
						  // item.penerima,
						  '<a href="home/form_view/' + item.id_payment + '"><button class="btn btn-primary btn-sm">View</button></a>'
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
			url : "<?php echo base_url('home/exportlist')?>",
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
		window.location.href="<?php echo base_url('home/exportexcelreport')?>";
    }
	
	function exportpdf()
    {
		$.ajax({
			url : "<?php echo base_url('home/exportlist')?>",
			type: "POST",
            data: $('#formCari').serialize(),
            dataType: "JSON",
            success: function(data)
            {
              console.log(data); 
              window.location.href="<?php echo base_url('home/exportpdf')?>";
            },
            error: function (data)
            {
              console.log(data);
                alert('Error export data');
            }
        });
    }
	
	
</script>
</body>
</html>
