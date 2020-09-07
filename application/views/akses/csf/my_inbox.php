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
						<ul class="nav nav-pills">
						<?php if($this->session->userdata("role_id") == 4){ ?>
						 	<li class="active"><a class="nav-link active" href="#tab_33" data-toggle="tab"><b>LIST OF REJECTED (BY APPROVER)</b></a></li>
						<?php }else{ ?>
							<li class="active"><a class="nav-link active" href="#tab_1" data-toggle="tab"><b>LIST OF REJECTED (TO USERS)</b></a></li>
							<li><a href="#tab_5" data-toggle="tab"><b>LIST OF REJECTED SP3</b></a></li>
							<li><a href="#tab_2" data-toggle="tab"><b>LIST OF RETURNED (APF FORM)</b></a></li>
							<li><a href="#tab_3" data-toggle="tab"><b>LIST OF REJECTED (BY APPROVER)</b></a></li>
							<li><a href="#tab_4" data-toggle="tab"><b>LIST OF REJECTED (AS VERIFICATOR TO USERS)</b></a></li>
						<?php } ?>
						</ul>
						<?php if($this->session->userdata("role_id") == 4){ ?>
							<div class="tab-pane active" id="tab_33">				
								<div class="modal-body form">
									<div class="box-body">
									<div class="table-responsive">
										<table id="example33" class="table table-bordered table-striped">
										<thead>
										<tr>
										<th>NO.</th>
										<th>Tanggal Reject</th>
										<th>Reject Dari</th>
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
										<td><?php echo $row->nomor_surat; ?> </td>
										<td> <?php echo $row->apf_doc;?> </td>
										<td><?php echo $row->description;?> </td>
										<td><?php echo $row->note;?> </td>
										<td>
											<!-- <a href="Dashboard/deletepayment/<?php echo $row->id_payment; ?>"><button class="btn btn-danger btn-sm">Clear</button></a> -->
											<?php if ($row->jenis_pembayaran == 2) { ?> 
												<a href="Dashboard/form_varf/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>
											<?php } ?>
											<?php if ($row->jenis_pembayaran == 3) { ?> 
												<a href="Dashboard/form_vasf/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>                    
											<?php } ?>
											<?php if ($row->jenis_pembayaran == 4 || $row->jenis_pembayaran == 6) { ?>   
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
									</div>
								</div>
							</div>
						<?php }else{ ?>

							<div class="tab-content">
								<div class="tab-pane active" id="tab_1">						  
									<div class="modal-body form">	
										<div class="box-body">
										<div class="table-responsive">
											<table id="example1" class="table table-bordered table-striped">
											<thead>
											<tr>
											<th>NO.</th>
											<th>Tanggal Reject</th>
											<th>Reject Dari</th>
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
											<td><?php echo $row->nomor_surat; ?> </td>
											<td><?php echo $row->label1;?> </td>
											<td><?php echo $row->display_name;?> </td>
											<td><?php echo $row->note;?> </td>
											<td>
												<a href="Dashboard/form_view/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>   
												<?php if($this->session->userdata("id_user")==$row->id_user){ ?>
												<button class="btn btn-danger" data-toggle="modal" data-target="#mdldelete" >Delete</button>
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
														<button type="button" class="btn btn-success bye" onclick="deletedraftpayment('<?php echo $row->id_payment; ?>','<?php echo $this->session->userdata("currentview"); ?>')">Yes</button>
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
														</form>
														</div>
														</div>
														</div>
													</div>                  
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

								<div class="tab-pane fade" id="tab_2">                
									<div class="modal-body form">
										<div class="box-body">
										<div class="table-responsive">
											<table id="example2" class="table table-bordered table-striped">
											<thead>
											<tr>
											<th>NO.</th>
											<th>Tanggal Reject</th>
											<th>Reject Dari</th>
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
								
								
								<div class="tab-pane fade" id="tab_3">				
									<div class="modal-body form">
										<div class="box-body">
										<div class="table-responsive">
											<table id="example3" class="table table-bordered table-striped">
											<thead>
											<tr>
											<th>NO.</th>
											<th>Tanggal Reject</th>
											<th>Reject Dari</th>
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
													$test11 = $row->type;                        
													$test22 = explode(";", $test11);
													$test33 = count($test22);
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
											<td><?php echo $row->nomor_surat; ?> </td>
											<td> <?php echo $row->apf_doc;?> </td>
											<td><?php echo $row->description;?> </td>
											<td><?php echo $row->note;?> </td>
											<td>
												<!-- <a href="Dashboard/deletepayment/<?php echo $row->id_payment; ?>"><button class="btn btn-danger btn-sm">Clear</button></a> -->
												<?php if ($row->type == 2) { ?> 
													<a href="Dashboard/form_varf/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>
												<?php } ?>
												<?php if ($row->type == 3) { ?> 
													<a href="Dashboard/form_vasf/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>                    
												<?php } ?>
												<?php if ($row->type == 4 || $row->type == 6) { ?>   
													<a href="Dashboard/form_vprf/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>
												<?php } ?>
												<?php if ($row->type == 5) { ?> 
													<a href="Dashboard/form_vcrf/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>                    
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
							

								<div class="tab-pane fade" id="tab_4">				
									<div class="modal-body form">
										<div class="box-body">
										<div class="table-responsive">
											<table id="example4" class="table table-bordered table-striped">
											<thead>
											<tr>
											<th>NO.</th>
											<th>Tanggal Reject</th>
											<th>Reject Dari</th>
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

								<div class="tab-pane" id="tab_5">                
									<div class="modal-body form">
										<div class="box-body">
										<div class="table-responsive">
											<table id="example5" class="table table-bordered table-striped">
											<thead>
											<tr>
												<th>NO.</th>
												<th>Tanggal Reject</th>
												<th>Reject Dari</th>
												<th>Nomor SP3</th>
												<th>Deskripsi</th>
												<!-- <th>Nama Pemohon</th> -->
												<th>Penerima Pembayaran</th>
												<th>Reason</th>
												<th>Action</th>
											</tr>	
											</thead>
											<tbody>
												<?php 
													$i = 1;
													foreach ($rejectedtax as $row){
													$test1 = $row->jenis_pembayaran;                        
													$test2 = explode(";", $test1);
													$test3 = count($test2);                        
												?>
												<tr>
													<td><?php echo $i++; ?></td>                  
													<td><?php echo date('d-M-Y', strtotime($row->rejected_date)); ?></td>
													<td><?php echo $row->rejected_by; ?></td>                  
													<td><?php echo $row->nomor_surat; ?></td>
													<td><?php echo $row->label1; ?></td>
													<!-- <td><?php echo $row->display_name; ?><td> -->
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
													<td><?php echo $row->note; ?></td>
													<td>
														<a href="Dashboard/form_sp3/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>                    
													</td>      
												</tr>
												<?php } ?>      
											</tbody>
										</table>
										</div>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
				</div>
			</div>	
		</div>	
		</div>
	  </div>
    </section>
    <!-- /.content -->

	<?php if($this->session->userdata("role_id") == 4){ ?>
		<section class="content-header">
		<h1>
			My Outbox
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
						<ul class="nav nav-pills">
						  <li class="active"><a class="nav-link active" href="#tab_11" data-toggle="tab"><b>LIST OF REJECTED SP3 </b></a></li>
						  <li><a href="#tab_55" data-toggle="tab"><b>LIST OF REJECTED SP3</b></a></li>
						  <li><a href="#tab_22" data-toggle="tab"><b>LIST OF RETURNED (APF FORM)</b></a></li>
						  <li><a href="#tab_44" data-toggle="tab"><b>LIST OF REJECTED (AS VERIFICATOR TO USERS)</b></a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_11">						  
								<div class="modal-body form">	
									<div class="box-body">
									<div class="table-responsive">
										<table id="example11" class="table table-bordered table-striped">
										<thead>
										<tr>
										  <th>NO.</th>
										  <th>Tanggal Reject</th>
										  <th>Reject Dari</th>
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
										  <td><?php echo $row->nomor_surat; ?> </td>
										  <td><?php echo $row->label1;?> </td>
										  <td><?php echo $row->display_name;?> </td>
										  <td><?php echo $row->note;?> </td>
										  <td>
											<a href="Dashboard/form_view/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>   
											<?php if($this->session->userdata("id_user")==$row->id_user){ ?>
											<button class="btn btn-danger" data-toggle="modal" data-target="#mdldelete" >Delete</button>
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
													<button type="button" class="btn btn-success bye" onclick="deletedraftpayment('<?php echo $row->id_payment; ?>','<?php echo $this->session->userdata("currentview"); ?>')">Yes</button>
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													</form>
													</div>
													</div>
													</div>
												</div>                  
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

							<div class="tab-pane fade" id="tab_22">                
								<div class="modal-body form">
									<div class="box-body">
									<div class="table-responsive">
										<table id="example22" class="table table-bordered table-striped">
										<thead>
										<tr>
										  <th>NO.</th>
										  <th>Tanggal Reject</th>
										  <th>Reject Dari</th>
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

							<div class="tab-pane fade" id="tab_44">				
								<div class="modal-body form">
									<div class="box-body">
									<div class="table-responsive">
										<table id="example44" class="table table-bordered table-striped">
										<thead>
										<tr>
										  <th>NO.</th>
										  <th>Tanggal Reject</th>
										  <th>Reject Dari</th>
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

							<div class="tab-pane" id="tab_55">                
								<div class="modal-body form">
									<div class="box-body">
									<div class="table-responsive">
										<table id="example55" class="table table-bordered table-striped">
										<thead>
										<tr>
												<th>NO.</th>
												<th>Tanggal Reject</th>
												<th>Reject Dari</th>
												<th>Nomor SP3</th>
												<th>Deskripsi</th>
												<th>Reason</th>
												<th>Action</th>
										</tr>	
										</thead>
										<tbody>
											<?php 
													$i = 1;
													foreach ($rejectedtax as $row){
													$test1 = $row->jenis_pembayaran;                        
													$test2 = explode(";", $test1);
													$test3 = count($test2);                        
												?>
												<tr>
													<td><?php echo $i++; ?></td>                  
													<td><?php echo date('d-M-Y', strtotime($row->tanggal2)); ?></td>
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
													<td>
														<a href="Dashboard/form_sp3/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>                    
													</td>      
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
	<?php } ?>
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
    $("#example5").DataTable();
    $("#example11").DataTable();
    $("#example22").DataTable();
    $("#example33").DataTable();
    $("#example44").DataTable();
    $("#example55").DataTable();
    $('#example6').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });

  function deletedraftpayment(id,$vscreen)
    {
		$.ajax({
				url : "<?php echo base_url('dashboard/draftpaymentdelete')?>/"+id,
				type: "POST",
				dataType: "JSON",
				success: function(data)
				{
					location.href=$vscreen;
					//location.reload();
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error deleting data');
				}
			});
    }
</script>
</body>
</html>
