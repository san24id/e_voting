<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
                <font color="#00008B"><b>LIST OF ATTANDANCE</b></font>

      </h1>
    </section>

    <section class="content">
    <div class="box box-default">
			<!-- <div class="box-header with-border">
				<h3 class="box-title">Pencarian</h3>
				<button class="btn btn-default" data-toggle="collapse" data-target="#cari"><i class="fa fa-search"></i>&nbsp;&nbsp;Filter By</button>
				<a href="home/export_ar"><button class="btn btn-success"><i class="fa fa-download"></i>&nbsp;&nbsp;Export</button></a>
				&nbsp;&nbsp;&nbsp;
				<button class="btn btn-success" id="btnexcel" onclick="exportexcel()"><i class="fa fa-download"></i>&nbsp;&nbsp;Excel</button>
				<button class="btn btn-success" id="btnpdf" onclick="exportpdf()"><i class="fa fa-download"></i>&nbsp;&nbsp;PDF</button>
				
			</div> -->
			
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
							<th>Question</th>
							<th>Nama</th>
							<th>Email</th>
							<th>PIN</th>
							<th>Choice</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$i = 1;
						foreach ($attandance as $row){
												
					?>
						<tr>
							<td><?php echo $i++; ?></td>                  
							<td><?php echo $row->question;?></td>
							<td><?php echo $row->nama;?></td>
							<td><?php echo $row->email;?></td>
							<td><?php echo $row->pin;?></td>
							<td><?php if ($row->choice == '1') {
									echo "YES";
									}else if ($row->choice == '2') {
									echo "NO";
								};?>
							</td>
							<td>
								<a href="href"><button class="btn btn-primary btn-sm">View</button></a>                    
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
				$('#lar').addClass("active");
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
	  url = "<?php echo base_url('home/caridataMyReport') ?>"; //caridataAR
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
