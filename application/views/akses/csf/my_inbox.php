<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!--.SECTION 1 -->
    <section class="content-header">
      <h1>
        My Inbox
      </h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
				<div class="box-header">
				<div class="col-md-12">
				<!-- Custom Tabs -->
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
						  <li class="active"><a href="#tab_1" data-toggle="tab"><b>LIST OF REJECTED (AS USERS)</b></a></li>
						  <li><a href="#tab_2" data-toggle="tab"><b>LIST OF RETURNED (AS VERIFICATOR)</b></a></li>
						  <li><a href="#tab_3" data-toggle="tab"><b>LIST OF REJECTED (BY APPROVER)</b></a></li>
						  <li><a href="#tab_4" data-toggle="tab"><b>LIST OF REJECT (AS VERIFICATOR TO USERS)</b></a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1">						  
								<div class="modal-body form">	
									<div class="box-body">
									<div class="table-responsive">
										<table id="example1" class="table table-bordered table-striped">
										<thead>
										<tr>
										  <th>NO.</th>
										  <th>Rejected Date</th>
										  <th>From</th>
										  <th>To</th>
										  <th>Nomor SP3</th>
										  <th>Deskripsi</th>
										  <th>Nama Pemohon</th>
										  <th>Reason</th>
										  <th>Action</th>
										</tr>
										</thead>
										<tbody>
										  <?php 
											$i = 1;
											foreach ($rejected as $row){
										  ?>
										<tr>
										  <td><?php echo $i++; ?></td>                  
										  <td><?php echo $row->rejected_date; ?></td>
										  <td><?php echo $row->rejected_by; ?>  </td>
										  <td><?php echo $row->division_id; ?> </td>
										  <td><?php echo $row->nomor_surat; ?> </td>
										  <td><?php echo $row->label1;?> </td>
										  <td><?php echo $row->display_name;?> </td>
										  <td><?php echo $row->note;?> </td>
										  <td>
											<!-- <a href="Dashboard/deletepayment/<?php echo $row->id_payment; ?>"><button class="btn btn-danger btn-sm">Clear</button></a> -->
											<a href="Dashboard/form_view/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>                    
										  </td>      
										  </tr>
											<?php } ?>      
									  </tbody>
									  </table>
									</div>
									</div>
								</div>
							</div>

							<div class="tab-pane" id="tab_2">                
								<div class="modal-body form">
									<div class="box-body">
									<div class="table-responsive">
										<table id="example2" class="table table-bordered table-striped">
										<thead>
										<tr>
										  <th>NO.</th>
										  <th>Rejected Date</th>
										  <th>From</th>
										  <th>To</th>
										  <th>Nomor SP3</th>
										  <th>Deskripsi</th>
										  <th>Reason</th>
										  <th>Action</th>
										</tr>
										</thead>
										<tbody>
										  <?php 
											$i = 1;
											foreach ($returnedverif as $row){
										  ?>
										<tr>
										  <td><?php echo $i++; ?></td>                  
										  <td><?php echo $row->rejected_date; ?></td>
										 	<?php 
												$sql = "SELECT display_name FROM m_user WHERE username = '$row->rejected_by'";
												$query = $this->db->query($sql)->result();
												// return $query;
												// var_dump($query[0]->nama);exit; 
												if ($query[0]->display_name) { $buka = $query[0]->display_name;
												}else{
												$buka = $row->rejected_by;
												}
											?>
										  <td><?php echo $buka; ?>  </td>
										  <td><?php echo $row->division_id; ?> </td>
										  <td><?php echo $row->nomor_surat; ?> </td>
										  <td><?php echo $row->label1;?> </td>
										  <td><?php echo $row->note;?> </td>
										  <td>
											<!-- <a href="Dashboard/deletepayment/<?php echo $row->id_payment; ?>"><button class="btn btn-danger btn-sm">Clear</button></a> -->
											
										   	<?php 
											   if($row->status == 5 && $row->rejected_by != NULL){ ?>
												<?php if ($row->jenis_pembayaran == 1) { ?>   
													<a href="Dashboard/form_eprf/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">Edit</button></a>
												<?php } ?>
												<?php if ($row->jenis_pembayaran == 2) { ?> 
													<a href="Dashboard/form_earf/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">Edit</button></a>
												<?php } ?>
												<?php if ($row->jenis_pembayaran == 3) { ?> 
													<?php if ($row->currency2 == "" && $row->currency3 == "") { ?>                                  
														<a class="btn btn-primary" href="Dashboard/form_easf/<?php echo $row->id_payment; ?>" target="_blank" role="button">Edit</a>
													<?php } ?>
													<?php if ($row->currency2 != "" || $row->currency3 != ""){ ?>
														<a class="btn btn-primary" href="Dashboard/form_easf2/<?php echo $row->id_payment; ?>" target="_blank" role="button">Edit</a> 
													<?php } ?>                      
												<?php } ?>                   
												<?php if ($row->jenis_pembayaran == 4) { ?> 
													<a href="Dashboard/form_ecrf/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">Edit</button></a>                    
												<?php } ?>  
										   	<?php } ?>                 
										  </td>      
										  </tr>
											<?php } ?>      
									  </tbody>
									  </table>
									</div>
									</div>
								</div>
							</div>

							<div class="tab-pane" id="tab_3">				
								<div class="modal-body form">
									<div class="box-body">
									<div class="table-responsive">
										<table id="example3" class="table table-bordered table-striped">
										<thead>
										<tr>
										  <th>NO.</th>
										  <th>Rejected Date</th>
										  <th>From</th>
										  <th>To</th>
										  <th>Nomor SP3</th>
										  <th>Nomor APF</th>
										  <th>Deskripsi</th>
										  <th>Reason</th>
										  <th>Action</th>
										</tr>
										</thead>
										<tbody>
										  <?php 
											$i = 1;
											foreach ($returnedapprov as $row){
										  ?>
										<tr>
										  <td><?php echo $i++; ?></td>                  
										  <td><?php echo $row->rejected_date; ?></td>
										  	<?php 
												$sql = "SELECT display_name FROM m_user WHERE username = '$row->rejected_by'";
												$query = $this->db->query($sql)->result();
												// return $query;
												// var_dump($query[0]->nama);exit; 
												if ($query[0]->display_name) { $buka = $query[0]->display_name;
												}else{
												$buka = $row->rejected_by;
												}
											?>
										  <td><?php echo $buka; ?>  </td>
										  <td><?php echo $row->division_id; ?> </td>
										  <td><?php echo $row->nomor_surat; ?> </td>
										  <td> <?php echo $row->apf_doc;?> </td>
										  <td><?php echo $row->description;?> </td>
										  <td><?php echo $row->note;?> </td>
										  <td>
											<!-- <a href="Dashboard/deletepayment/<?php echo $row->id_payment; ?>"><button class="btn btn-danger btn-sm">Clear</button></a> -->
											<a href="Dashboard/form_view/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>                    
										  </td>      
										</tr>
											<?php } ?>      
									  </tbody>
									  </table>
									</div>
									</div>
								</div>
							</div>

							<div class="tab-pane" id="tab_4">				
								<div class="modal-body form">
									<div class="box-body">
									<div class="table-responsive">
										<table id="example4" class="table table-bordered table-striped">
										<thead>
										<tr>
										  <th>NO.</th>
										  <th>Rejected Date</th>
										  <th>From</th>
										  <th>To</th>
										  <th>Nomor SP3</th>
										  <th>Deskripsi</th>
										  <th>Reason</th>
										</tr>
										</thead>
										<tbody>
										  <?php 
											$i = 1;
											foreach ($returnedusr as $row){
										  ?>
										<tr>
										  <td><?php echo $i++; ?></td>                  
										  <td><?php echo $row->rejected_date; ?></td>
										  <td><?php echo $row->rejected_by; ?>  </td>
										  <td><?php echo $row->division_id; ?> </td>
										  <td><?php echo $row->nomor_surat; ?> </td>
										  <td><?php echo $row->label1;?> </td>
										  <td><?php echo $row->note;?> </td>
											  
										</tr>
											<?php } ?>      
									  </tbody>
									  </table>
									</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>	
		</div>	
		</div>
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
    $("#example2").DataTable();
    $("#example3").DataTable();
    $("#example4").DataTable();
    $('#example5').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });

</script>
</body>
</html>
