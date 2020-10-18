<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        MONITORING REPORT WAITING FOR APPROVAL
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
                        <?php
                          $criteria=$this->session->userdata('filter');
                          
                          switch ($criteria) {
                            case "1":
                            // echo "<option value='1'> Status </option>";									
                            break;
                            case "2":
                            echo "<option value='1'> Status </option>";										
                            break;
                            
                            default:
                            echo "";										
                            
                          }
                        ?>
                        <option value='2'> Jenis Pembayaran  </option>
                        <!--<option value='1'> Status </option>
                        <option value='2'> Jenis Pembayaran </option>
                        <option value='3'> Nomor SP3 </option>
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
                            echo "<option value='2'> Submitted </option>";
                            break;
                            case "2":
                            echo "<option value='2'> Submitted </option>";
                            echo "<option value='4'> Processing</option>";
                            echo "<option value='8'> Verified </option>";
                            echo "<option value='9'> Approved </option>";											
                            echo "<option value='10'> Paid </option>";											
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
        <!-- /.box-body -->        
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
                  <th>Nomor APF</th>
                  <th>Deskripsi</th>
                  <th>Pemohon</th>
                  <th>Divisi</th>
                  <th>Nama Penerima</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 1;
                    foreach ($vwaitapprov as $row){
                      $test1 = $row->dsc;                        
                      $test2 = explode(";", $test1);
                      $test3 = count($test2);                        
                  ?>
                <tr>
                  <td><?php echo $i++; ?></td>                  
                  <td> <center><?php if($row->status == 0){
                            echo "<img src='assets/dashboard/images/legend/draft.png'>";  
                          }else if($row->status == 1){
                            echo "<img src='assets/dashboard/images/legend/draftprint.png'>";  
                          }else if($row->status == 11){
                            echo "<img src='assets/dashboard/images/legend/draftprint.png'>";  
                          }else if($row->status == 99){
                            echo "<img src='assets/dashboard/images/legend/draftprint.png'>"; 
                          }else if($row->status == 2){
                            echo "<img src='assets/dashboard/images/legend/submitted.png'>";
                          }else if($row->status == 3){
                            echo "<img src='assets/dashboard/images/legend/draftprint.png'>";
                          }else if($row->status == 4){
                            echo "<img src='assets/dashboard/images/legend/icon_tax.png'>";
                          }else if($row->status == 5){
                            echo "<img src='assets/dashboard/images/legend/icon_finance.png'>";
                          }else if($row->status == 6){
                            echo "<img src='assets/dashboard/images/legend/icon_reviewer.png'>";
                          }else if($row->status == 7){
                            echo "<img src='assets/dashboard/images/legend/icon_verified.png'>";
                          }else if($row->status == 8){
                            echo "<img src='assets/dashboard/images/legend/icon_approval.png'>";
                          }else if($row->status == 12){
                            echo "<img src='assets/dashboard/images/legend/icon_approval.png'>"; 
                          }else if($row->status == 13){
                            echo "<img src='assets/dashboard/images/legend/icon_approval.png'>";
                          }else if($row->status == 9){
                            echo "<img src='assets/dashboard/images/legend/icon_payment.png'>"; 
                          }else if($row->status == 10){
                            echo "<img src='assets/dashboard/images/legend/paid1.png'>"; 
                          }   
                        ?></center>
                  </td>
                  <td><?php echo date('d-M-Y', strtotime($row->tanggal2)); ?></td>
                  <td><?php                     
                        for($a=0; $a<$test3; $a++){
                          if($test2[$a]){
                            echo $test2[$a]."<br>";
                          }
                        }  ?>
                  </td>
                  <td><?php echo $row->nomor_surat; ?></td>
                  <td><?php echo $row->apf_doc; ?></td>
                  <td><?php echo $row->description; ?></td>
                  <td><?php echo $row->display_name; ?></td>
                  <td><?php echo $row->division_id; ?></td>
                  <td><?php echo $row->dibayar_kepada; ?></td>
                  <td>
                      <?php if ($row->jenis_pembayaran == 2) { ?> 
                        <a href="Dashboard/form_varf/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>
                      <?php } ?>
                      <?php if ($row->jenis_pembayaran == 3) { ?> 
                        <a href="Dashboard/form_vasf/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>                    
                      <?php } ?>
                      <?php if ($row->jenis_pembayaran == 4) { ?>   
                        <a href="Dashboard/form_vprf/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>
                      <?php } ?>
                      <?php if ($row->jenis_pembayaran == 5) { ?> 
                        <a href="Dashboard/form_vcrf/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>                    
                      <?php } ?>                    
                  </td>      
                  </tr>
                      <?php } ?>      
              </tbody>
              </table>
            </div>
              <div class="box-footer">  
                <div class="form-group">
                  <label class="control-label col-md-1"><i>Legend</i></label> <br>
                  <div class='col-md-2'><img src='assets/dashboard/images/legend/icon_approval.png'> &nbsp;Waiting For Approval</div>
                </div>  
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

</script>

<script type="text/javascript"> 
 function caridata()
    {
	  url = "<?php echo base_url('dashboard/caridatamonitoringwapprove') ?>";
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
				var strlink='';
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
							istatus = '<img src="assets/dashboard/images/legend/icon_tax.png">';
							break;
                          case "5":
							istatus ='<img src="assets/dashboard/images/legend/icon_finance.png">';
							break;
                          case "6":
							istatus ='<img src="assets/dashboard/images/legend/icon_reviewer.png">';
							break;
                          case "7":
							istatus = '<img src="assets/dashboard/images/legend/icon_verified.png">';
							break;
                          case "8":
							istatus = '<center><img src="assets/dashboard/images/legend/icon_approval.png"></center>';
							break;
                          case "9":
							istatus = '<img src="assets/dashboard/images/legend/icon_payment.png">';
							break; 
                          case "10":
							istatus = '<img src="assets/dashboard/images/legend/paid1.png">';
							break;  
						  default:
							istatus = '';
						}
		
						if(status.trim() == "6" || status.trim() == "7" || status.trim() == "8" || status.trim() == "9" || status.trim() == "10"){
							if (item.id_pay == "2") { 
								strlink="Dashboard/form_varf/";
							}else if(item.id_pay == "3") { 
								strlink='Dashboard/form_vasf/';
							}else if(item.id_pay == "4") { 
								strlink='Dashboard/form_vprf/';
							}else if(item.id_pay == "5") { 
								strlink='Dashboard/form_vcrf/';
							}
						}else{
							strlink="Dashboard/form_sp3/";
						}							
						
						tbl1.row.add( [
						  ino,
						  istatus,
						  item.tanggal,
						  item.jenis_pembayaran,
						  item.nomor_surat,
						  item.apf_doc,
						  item.description,
						  item.display_name,
						  item.bank,
						  item.dibayar_kepada,
							'<a href="' + strlink + item.id_payment + '"><button class="btn btn-primary btn-sm">View</button></a>'
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
