<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- <section class="content-header">
          <h1>
            DATA PAYMENT
            <small></small>
          </h1>
        </section> -->
        <!-- Main content -->
		<?php
		$arrjnspjk="";
		$strjnspjk="";
		$counter=0;
		foreach($jenispajak as $jnspjk){
                  $arrjnspjk= $arrjnspjk . $jnspjk->jenis_pajak .";" ;
				  $counter=$counter+1;
		}
		$strjnspjk=substr($arrjnspjk,0,strlen($arrjnspjk)-1);
		
		$arrobjpjk="";
		$strobjpjk="";
		foreach($kodePajak as $kdpjk){
                  $arrobjpjk= $arrobjpjk . $kdpjk->kode_objek_pajak .";" ;
		}
		$strobjpjk=substr($arrobjpjk,0,strlen($arrobjpjk)-1);
		
		$arrmappjk="";
		$strmappjk="";
		foreach($kodeMap as $kdmap){
                  $arrmappjk= $arrmappjk . $kdmap->kode_map .";" ;
		}
		$strmappjk=substr($arrmappjk,0,strlen($arrmappjk)-1);
		
		
		$nonpwp ="";
		$namanpwp ="";
		$alamatnpwp ="";
		foreach ($getnpwp as $vndr){
			$nonpwp = $vndr->npwp ;
			$namanpwp = $vndr->nama ;
			$alamatnpwp = $vndr->alamat ;
		}
		
		$nourut="";
		foreach ($getnouruttax as $no){
					$nourut = $no->no_urut ;
				}
		
		if($nourut==""){
			$nourut="1";
		}
		
		$chkDY='checked';
		$chkDN='unchecked';
		$chkY='unchecked';
		$chkN='unchecked';
		$chkE='unchecked';
		$chkT='unchecked';
		$chkopsi1='unchecked';
		$chkopsi2='unchecked';
		$chkopsi3='unchecked';
		$disabled1='disabled';
		$disabled2='disabled';
		$disabled3='disabled';
		$disablednilai='disabled';
		$divtax='style="display:none;"';
		$nilai='0';
		foreach($getdatataxFlag as $gtaxFlag){
			switch ($gtaxFlag->objek_pajak) {
			  case "0":
				$chkN='checked';
				break;
			  case "1":
				$chkY='checked';
				$divtax='style="display:block;"';
				break;
			  case "2":
				$chkE='checked';
				break;
			  case "3":
				$chkT='checked';
				break;
			  default:
				$chkY='unchecked';
				$chkN='unchecked';
				$chkE='unchecked';
				$chkT='unchecked';	
				$divtax='style="display:none;"';
		
			}
			switch ($gtaxFlag->de) {
			  case "0":
				$chkDN='checked';
				$disabled1='';
				$disabled2='';
				$disabled3='';
				break;
			  case "1":
				$chkDY='checked';
				$disabled1='disabled';
				$disabled2='disabled';
				$disabled3='disabled';
				break;
			  default:
				$chkDY='unchecked';
				$chkDN='unchecked';	
				$disabled1='disabled';
				$disabled2='disabled';
				$disabled3='disabled';
			}
			
			switch ($gtaxFlag->opsional) {
			  case "1":
				$chkopsi1='checked';
				$disablednilai='disabled';
				break;
			  case "2":
				$chkopsi2='checked';
				$disablednilai='disabled';
				break;
			  case "3":
				$chkopsi3='checked';
				$disablednilai='';
				$nilai=$gtaxFlag->nilai;	
				break;
			  default:
				$chkopsi1='unchecked';
				$chkopsi2='unchecked';
				$chkopsi3='unchecked';	
				$disablednilai='disabled';
				$nilai='0';
			}
			
		}
		?>
         
		
          <section class="content">
          	<h1>
			  <?php foreach ($payment as $row1) { ?>
			  <a class="btn btn-warning" onclick="window.open('Dashboard/report2/<?php echo $row1->id_payment; ?>', 'newwindow', 'width=640,height=720'); return false;"> Form SP3</a>
			  <?php } ?>	
			</h1>
            <div class="row">
              <div class="col-md-12">
                <!-- /.box -->
                <div class="box">
                  <div class="box-header with-border">
                    <h5>
                      <br>
                      <left><img src="assets/dashboard/images/logo.png" alt="Logo Images"></left>
                      <br>
                      <center><b><u><font size="+2" style="font-family: calibri;">FORM VERIFIKASI PAJAK</font></u></b></center>
                    </h5>                    
                    
                    <br>
					<!-- <form id="form" method="post" action="Dashboard/procees_tax" onsubmit="tambah()">  -->
					<form id="form" action="#"> 
						
					
                    <table style="font-family: calibri;" width="70%">
                      <tr>
                        <td><b>Deductible Expense?</b></td>
                        <td>
                          <input type="checkbox" id="chkdeY" name="de" value="1" <?php echo $chkDY; ?>> Ya<br>
                        </td>
                        <td>
                          <input type="checkbox" id="chkdeN" name="de" value="0" <?php echo $chkDN; ?> > Tidak</input><br>
                        </td>
                        </tr>  
                        <tr>
                          <td></td>
                          <td></td>
                          <td>
                            &nbsp; &nbsp; <input type="checkbox" id="chkNDE" name="opsional[]" value="1" <?php echo $chkopsi1 .'  '.$disabled1; ?> > NDE</input><br>
                          </td>
                        </tr>  
                        <tr>
                        <td></td>
                        <td></td>
                        <td>
                          &nbsp; &nbsp; <input type="checkbox" id="chkNDE50" name="opsional[]" value="2" <?php echo $chkopsi2.'  '.$disabled2;?>> NDE50</input><br>                            
                        </td>
                        </tr> 
                        <tr>
                        <td></td>
                        <td></td>
                        <td width="8%">
                          &nbsp; &nbsp; <input type="checkbox" id="chkPARTNDE" name="opsional[]" value="3" <?php echo $chkopsi3.'  '.$disabled3;?>> PARTNDE</input><br>                            
                        </td>
                        <td width="2%"><font size="3">Rp</font></td>
                        <td><input type="text" class="form-control" id="nilai" name="nilai" placeholder="Enter Text" value="<?php echo $nilai; ?>" <?php echo $disablednilai; ?> ></td>
                        </tr>
                    </table>
                    <table width=70%>   
                      <tr>
                        <td><b>Objek Pajak</b></td>
                        <td><input id="chkObjPjkY" type="checkbox" name="objek_pajak[]" value="1" <?php echo $chkY; ?> > Ya </td>
                        <td> <input id="chkObjPjkN"  type="checkbox" name="objek_pajak[]" value="0" <?php echo $chkN; ?> > Tidak</input> </td>
                        <td><input id="chkObjPjkE" type="checkbox" name="objek_pajak[]" value="2" <?php echo $chkE; ?> > Employee</input> </td>
                        <td><input id="chkObjPjkT" type="checkbox" name="objek_pajak[]" value="3" <?php echo $chkT; ?> > Tax at Settlement</input> </td>
                      </tr>                        
                    </table>
                    </form> 
                    <br>
                    
                    
                    <br>
				
				<div id="divObjPjk" class="row" <?php echo $divtax; ?> >
					<div class="col-xs-12">
					<!-- /.box -->
					<div class="box">
						<!-- /.box-header -->
						<div class="box-body">
						<div><button type="button" class="btn btn-success" onclick="view_tax()">&nbsp;&nbsp;Add Tax&nbsp;&nbsp;  </button>
						</div>
					<div class="table-responsive">
                    <table id="show" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Action</th>
                          <th>No Urut</th>
                          <th>Jenis Pajak</th>
                          <th>Kode Pajak</th>
                          <th>Kode MAP</th>
                          <th>Nama</th>
                          <th>NPWP/ID</th>
                          <th>Alamat</th>
                          <th>Tarif</th>
                          <th>Fasilitas Pajak</th>
                          <th>Special Tarif</th>
                          <th>Gross Up</th>
                          <th>DPP</th>
                          <th>DPP <br>(Gross Up)</th>
                          <th>Pajak Terutang</th>
                          <th>Masa Pajak PPN</th>
                          <th>Tahun</th>
                          <th>Keterangan</th>
                        </tr>
                      </thead>
                      <tbody>
						<?php foreach($getdatatax as $gtax){?>
						 <tr>
						 
						  	<td style="text-align: center">	  						  					  
								<button class="btn btn-default btn-xs" data-toggle="tooltip" title="Edit"  onclick="edit_tax(<?php echo $gtax->id_tax;?>)"><i class="glyphicon glyphicon-pencil"></i></button>
								<button class="btn btn-danger btn-xs" data-toggle="tooltip" title="Hapus" <?php echo $btndelete; ?> onclick="delete_tax(<?php echo $gtax->id_tax;?>,<?php echo $gtax->id_payment;?>)"><i class="glyphicon glyphicon-trash"></i></button>
							</td>
							<td> <?php echo $gtax->no_urut;?></td>
						    <td><?php echo $gtax->jenis_pajak;?></td>
							<td><?php echo $gtax->kode_pajak;?></td>
							<td><?php echo $gtax->kode_map;?></td>
							<td><?php echo $gtax->nama;?></td>
							<td><?php echo $gtax->npwp;?></td>
							<td><?php echo $gtax->alamat;?></td>
							<td><?php echo $gtax->tarif;?></td>
							<td><?php echo $gtax->fas_pajak;?></td>
							<td><?php echo $gtax->special_tarif;?></td>
							<td><?php echo $gtax->gross;?></td>
							<td><?php echo $gtax->dpp;?></td>
							<td><?php echo $gtax->dpp_gross;?></td>
							<td><?php echo $gtax->pajak_terutang;?></td>
							<td><?php echo $gtax->masa_pajak;?></td>
							<td><?php echo $gtax->tahun;?></td>
							<td><?php echo $gtax->keterangan;?></td>
						  </tr>
						 <?php }?>
                                           
                      </tbody> 
                      
                    </table>
                  </div>             

                    </div> 
					 </div> 
					  </div> 
					   </div> 
                <div class="box">
                  <div class="box-header with-border">
                    <a class="btn btn-warning" href="Dashboard/my_task" role="button">Cancel</a>  
                    <button type="button" onclick="submittax()" class="btn btn-primary">Proceed For Finance</button>
                  </div>
                </div>                                                 
            </div>
			</div>
			</div>
			</div>
          </section>  
        
        <!-- /.content -->
      </div>

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
<script src="assets/dashboard/plugins/iCheck/icheck.min.js"></script>
    <!-- Select2 -->
<script src="assets/dashboard/bower_components/select2/dist/js/select2.full.min.js"></script>

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>   

<!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> -->


<script>

var save_method; 
    //$("#show").DataTable();



    $('#show').DataTable({
      "paging": false,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": false,
      "autoWidth": false
    });
	
 
$("#chkdeY").on( "click", function() {
  if($("#chkdeY").is(':checked')){
	  $('#chkdeN').prop('checked', false);
	  $('#chkNDE').prop('checked', false);
	  $('#chkNDE50').prop('checked', false);
	  $('#chkPARTNDE').prop('checked', false);
	  $('#chkNDE').attr("disabled", "disabled"); 
	  $('#chkNDE50').attr("disabled", "disabled"); 
	  $('#chkPARTNDE').attr("disabled", "disabled"); 	  
	  $("#nilai").attr("disabled", "disabled"); 
	  $("#vdeductible").val('1');
	}else{
		$("#vdeductible").val('');
	}
});

$("#chkdeN").on( "click", function() {
  if($("#chkdeN").is(':checked')){
	  $('#chkdeY').prop('checked', false);
	  $('#chkNDE').removeAttr("disabled"); 
	  $('#chkNDE50').removeAttr("disabled"); 
	  $('#chkPARTNDE').removeAttr("disabled"); 	  
	  $("#nilai").attr("disabled", "disabled"); 
	  $("#vdeductible").val('0');
	}else{
	  $('#chkNDE').attr("disabled", "disabled"); 
	  $('#chkNDE50').attr("disabled", "disabled"); 
	  $('#chkPARTNDE').attr("disabled", "disabled"); 
	  $('#chkNDE').prop('checked', false);
	  $('#chkNDE50').prop('checked', false);
	  $('#chkPARTNDE').prop('checked', false);		  
	  $("#nilai").attr("disabled", "disabled"); 
	  $("#vdeductible").val('');
	}
});

$("#chkNDE").on( "click", function() {
  if($("#chkNDE").is(':checked')){
	  $('#chkdeN').prop('checked', true);
	  $('#chkNDE50').prop('checked', false);
	  $('#chkPARTNDE').prop('checked', false);	  
	  $("#nilai").attr("disabled", "disabled"); 
	  $("#voptional").val('1');
	}else{
	  $('#chkdeN').prop('checked', false);
	  $("#voptional").val('');
	}
});

$("#chkNDE50").on( "click", function() {
  if($("#chkNDE50").is(':checked')){
	  $('#chkdeN').prop('checked', true);
	  $('#chkNDE').prop('checked', false);	 
	  $('#chkPARTNDE').prop('checked', false);	 
	  $("#nilai").attr("disabled", "disabled"); 
	  $("#voptional").val('2');
	}else{
	  $('#chkdeN').prop('checked', false);
	  $("#voptional").val('');
	}
});

$("#chkPARTNDE").on( "click", function() {
  if($("#chkPARTNDE").is(':checked')){
	  $('#chkdeN').prop('checked', true);
	  $('#chkNDE').prop('checked', false);	 
	  $('#chkNDE50').prop('checked', false);	 
	  $("#nilai").removeAttr("disabled"); 
	  $("#voptional").val('3');
	}else{
	  $('#chkdeN').prop('checked', false);
	  $("#nilai").attr("disabled", "disabled"); 
	  $("#voptional").val('');
	}
});

$("#chkObjPjkY").on( "click", function() {
  if($("#chkObjPjkY").is(':checked')){
	  $('#chkObjPjkN').prop('checked', false);	 
	  $('#chkObjPjkE').prop('checked', false);	 
	  $('#chkObjPjkT').prop('checked', false);	 
	  $('#divObjPjk').show();	  
	  $('#vobjekpajak').val('1');
	}else{
	  $('#divObjPjk').hide();
	}
});

$("#chkObjPjkN").on( "click", function() {
  if($("#chkObjPjkN").is(':checked')){
	  $('#chkObjPjkY').prop('checked', false);	 
	  $('#chkObjPjkE').prop('checked', false);	 
	  $('#chkObjPjkT').prop('checked', false);
	  $('#divObjPjk').hide();
	  $('#vobjekpajak').val('0');
	}
});

$("#chkObjPjkE").on( "click", function() {
  if($("#chkObjPjkE").is(':checked')){
	  $('#chkObjPjkY').prop('checked', false);	 
	  $('#chkObjPjkN').prop('checked', false);	 
	  $('#chkObjPjkT').prop('checked', false);
	  $('#divObjPjk').hide();
	  $('#vobjekpajak').val('2');
	}
});

$("#chkObjPjkT").on( "click", function() {
  if($("#chkObjPjkT").is(':checked')){
	  $('#chkObjPjkY').prop('checked', false);	 
	  $('#chkObjPjkN').prop('checked', false);	 
	  $('#chkObjPjkE').prop('checked', false);
	  $('#divObjPjk').hide();
	  $('#vobjekpajak').val('3');
	}
});




function view_tax()
{
	save_method = 'add';
	$('#txtrealtrf').val('0');
	$('#vjnspjk').val('');
	$('#selJnsPjk').val('').change();
	$('#vkdpjk').val('');
	$('#selKdPjk').val('').change();
	$('#vkdmap').val('');
	$('#selKdMap').val('').change();
	$('#vgross').val('');
	$('#vtarif').val('');
	$('#seltarif').val('').change();
	$('#vtarifspesial').val('');
	$('#vpajakterhutang').val('0');
	$('#txtnourutold').val('');
	$('#txtnourut').val('1');
	$('#txttarif').val('');
	$('#txtfasilitas').val('');
	$('#txtdpp').val('0');
	$('#txtdppgross').val('0');
	$('#txtpajakterhutang').val('0');					
	$('#txtketerangan').val('');	
	id=$('#id_payment').val();
	$.ajax({
        url : "<?php echo base_url('dashboard/getnourut/')?>/" + id,
        type: "GET",
		dataType: "JSON",
        success: function(data)
        {
			var nourut =data[0].no_urut;
			if(!nourut){
				$('[name="txtnourut"]').val('1');
			}else{
				$('[name="txtnourut"]').val(data[0].no_urut);
			}
			
            
        },
        error: function (data)
        {
            console.log(data);
            alert('Error get data from ajax');
        }
    });
	
	$('#modal_tax').modal('show');
}

function submittax()
    {
		var nmr_srt = $('#nomor_surat').val();
		if ($('#vobjekpajak').val()==""){
			alert("Objek Pajak belum di pilih");
		}else{
			var r = confirm("Anda Akan mengirimkan Form Tax : " + nmr_srt + " ?");
			  if (r == true) {
			
			var url = "<?php echo base_url('dashboard/submittax')?>";
			$.ajax({
                url : url,
                type: "POST",
                data: $("#form1,#form").serialize(),
                dataType: "JSON",
                success: function(data)
                { 
                  console.log(data);
				   window.location = "<?php echo base_url('dashboard/my_task') ?>";    
                },
                error: function (data)
                {
					console.log(data);
                  alert('Error adding / update data');
                }
              });
			 } 
		}
		
	}
	
	function delete_tax(idtax,idpayment)
    {
		var r = confirm('Apakah anda yakin akan menghapus data ini..?');
		if (r == true) {
			var form_data = new FormData();
			form_data.append('id_tax', idtax);
			form_data.append('id_payment', idpayment);
			$.ajax({
				url : "<?php echo base_url('dashboard/delete_tax')?>",
				type: "POST",
				cache: false,
			  contentType: false,
			  processData: false,
				data: form_data,
				dataType: "json",
				success: function(data)
				{
				   var tbl1 = $('#show').DataTable(); 
						  tbl1.clear().draw();
							$.each(data, function(key, item) 
								  {       
							  tbl1.row.add( [
									'<button class="btn btn-default btn-xs" data-toggle="tooltip" title="Edit"  onclick="edit_tax(' + item.id_tax +')"><i class="glyphicon glyphicon-pencil"></i></button>&nbsp;<button class="btn btn-danger btn-xs" data-toggle="tooltip" title="Delete"  onclick="delete_tax(' + item.id_tax + ',' + item.id_payment + ')"><i class="glyphicon glyphicon-trash"></i></button>',
                        			item.no_urut,
									item.jenis_pajak,
									item.kode_pajak,
									item.kode_map,
									item.nama,
									item.npwp,
									item.alamat,
									item.tarif,
									item.fas_pajak,
									item.special_tarif,
									item.gross,
									item.dpp,
									item.dpp_gross,
									item.pajak_terutang,
									item.masa_pajak,
									item.tahun,
									item.keterangan
										
									  ] ).draw(false);

							})  
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error deleting data');
				}
			});
		  } 
    }

function edit_tax(id)
    {
		save_method = 'update';			
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo base_url('dashboard/tax_edit/')?>/" + id,
        type: "GET",
		dataType: "JSON",
        success: function(data)
        {
			console.log(data);
			$('[name="id_tax"]').val(data[0].id_tax);
			$('[name="handled_by"]').val('n.prasetyaningrum');
			$('[name="id_payment"]').val(data[0].id_payment);
			//$('[name="nilai"]').val(data[0].nilai);
			//$('[name="voptional"]').val(data[0].opsional);
			$('[name="vobjekpajak"]').val(data[0].objek_pajak);
			$('[name="vjnspjk"]').val(data[0].jenis_pajak);
			$('[name="selJnsPjk"]').val(data[0].id_jenis_pjk).change();
			$('[name="txtnamanpwp"]').val(data[0].nama);			
			$('[name="txtnonpwp"]').val(data[0].npwp);			
			$('[name="txtalamat"]').val(data[0].alamat);			
			$strid=data[0].jenis_pajak;
			if( $strid == 'PPh Pasal 21') {
				
					$("#txtnamanpwp").prop('readonly', false);
					$('#txtnonpwp').prop('readonly', false);	
					$('#txtalamat').prop('readonly', false);		
					$('#divKdMap').show(); 
					$('#divKdPjk').hide(); 
			} else{
					$("#txtnamanpwp").prop('readonly', true);
					$('#txtnonpwp').prop('readonly', true);	
					$('#txtalamat').prop('readonly', true);	
					
					if($strid.substring(0, 3)=='PPN'){
						$('#divKdMap').hide();
					}else{
						$('#divKdMap').show(); 
					};
				  if( $strid == 'PPN' || $strid == 'PPN WAPU' || $strid == 'PPN PKP') {
						$('#divmasappn').show();
					}else{
						$('#divmasappn').hide();
					}
					
					if( $strid == 'PPh Pasal 23') {
						$('#divKdPjk').show(); 			
					}else{
						$('#divKdPjk').hide(); 
					}
			  }
			  
			
			
			$('[name="vkdpjk"]').val(data[0].kode_pajak);
			$('[name="vgross"]').val(data[0].gross);
			$('[name="vtarifspesial"]').val(data[0].spesial_tarif);
			$('[name="txtnourut"]').val(data[0].no_urut);
			$('[name="txtnourutold"]').val(data[0].no_urut);
			$fas_pajak=data[0].fas_pajak;
			$('[name="txtfasilitas"]').val(data[0].fas_pajak);
			if($fas_pajak==""){
				$('#chkfasilitas').prop('checked', false);	
				$('#divfasilitas').hide(); 
			}else{
				$('#chkfasilitas').prop('checked', true);	
				$('#divfasilitas').show(); 
			}
			
			$trf=data[0].tarif;
			
			
			if(!$trf){
				$('#chktarifnormal').prop('checked', false);	
				$('#divtarifnormal').hide();
				$('#divtarifspesial').show();
			}else{
				$('#chktarifnormal').prop('checked', true);	
				$('#divtarifnormal').show();
				$('#divtarifspesial').hide();
			}
			$spctrf=data[0].special_tarif;
			if($spctrf==""){
				$('#chktarifspesial').prop('checked', false);	
			}else{
				$('#chktarifspesial').prop('checked', true);	
			}
			$gross=data[0].gross;
			if($gross=="Ya"){
				$('#chkgross').prop('checked', true);	
			}else{
				$('#chkgross').prop('checked', false);	
			}
			$('[name="txtdpp"]').val(data[0].dpp);
			$('[name="txtdppgross"]').val(data[0].dpp_gross);	
			$('#selmasappn').val(data[0].masa_pajak).change();
			$('#seltahunppn').val(data[0].tahun).change();		
			$('[name="txtketerangan"]').val(data[0].keterangan);	
            $('[name="txtrealtrf"]').val(data[0].tarif);
			$('[name="vdeductible"]').val(data[0].de);
			$('[name="voptional"]').val(data[0].opsional);
			$('[name="vobjekpajak"]').val(data[0].objek_pajak);
			$('[name="nomor_surat"]').val(data[0].nomor_surat);
			$('[name="selKdPjk"]').val(data[0].kode_pajak).change();
			$('[name="vkdmap"]').val(data[0].kode_map);
			$('#seltarif').val(data[0].tarif).change();
			$('#vtarif').val(data[0].tarif.trim());
			$('[name="txttarif"]').val(data[0].special_tarif);			
			
			$('[name="txtpajakterhutang"]').val(data[0].pajak_terutang);	
			$('[name="vpajakterhutang"]').val(data[0].pajak_terutang);
			
			$('#modal_tax').modal('show');
			
             // show bootstrap modal when complete loaded
            
        },
        error: function (data)
        {
            console.log(data);
            alert('Error get data from ajax');
        }
    });
    }



function savetaxdraft()
    { 		
	var $id = $('#id_payment').val();
		if ($('#selJnsPjk').val()==""){
			alert("Jenis Pajak belum di pilih");
		  }/*else if ($('#selKdMap').val()==""){
			alert("Kode MAP belum di pilih");    
		  }*/else if ($('#txtnamanpwp').val()==""){
			alert("Nama NPWP belum di input");
		  }else if ($('#txtnonpwp').val()==""){
			alert("Nomor NPWP belum di input");
		  }else if ($('#txtrealtrf').val()=="0"){
			alert("Tarif Pajak belum di pilih");		  
		}else if ($('#txtdpp').val()==""){
			alert("DPP belum di input");		  
		}else if ($('#txtdppgross').val()==""){
			alert("DPP Gross Up kosong");		  
		}else{
			var url ;
			 if(save_method == 'add')
				{
					url = "<?php echo base_url('dashboard/savetaxdraft')?>";
				}
				else
				{
				  url = "<?php echo base_url('dashboard/updatetaxdraft')?>";
				}
			//var url = "<?php echo base_url('dashboard/savetaxdraft')?>";
			$.ajax({
                url : url,
                type: "POST",
                data: $("#form1,#form").serialize(),
                dataType: "JSON",
                success: function(data)
                { 
                  /*url : "<?php echo base_url('dashboard/gettabletax/')?>/" + $id,
				  //Ajax Load data from ajax
				  $.ajax({
						url : url,
						type: "GET",
						data: $('#form1').serialize(),
						dataType: "JSON",
						success: function(data)
						{*/

						var tbl1 = $('#show').DataTable(); 
						  tbl1.clear().draw();
							$.each(data, function(key, item) 
								  {       
							  tbl1.row.add( [
									'<button class="btn btn-default btn-xs" data-toggle="tooltip" title="Edit"  onclick="edit_tax(' + item.id_tax +')"><i class="glyphicon glyphicon-pencil"></i></button>&nbsp;<button class="btn btn-danger btn-xs" data-toggle="tooltip" title="Delete"  onclick="delete_tax(' + item.id_tax + ',' + item.id_payment + ')"><i class="glyphicon glyphicon-trash"></i></button>',
                        			item.no_urut,
									  item.jenis_pajak,
									  item.kode_pajak,
									  item.kode_map,
									  item.nama,
									  item.npwp,
									  item.alamat,
										item.tarif,
										item.fas_pajak,
										item.special_tarif,
										item.gross,
										item.dpp,
										item.dpp_gross,
										item.pajak_terutang,
										item.masa_pajak,
										item.tahun,
										item.keterangan										
									  ] ).draw(false);

							})  
						/*},
						error: function (data)
						{
						  console.log(data);
							alert('Error adding / update data');
						}
					});*/
				  
				  
				  $('#modal_tax').modal('hide');
				  //location.reload();   
                },
                error: function (data)
                {
					console.log(data);
                  alert('Error adding / update data');
                }
              });
        }      
    }
	
function tambah_baris()
{
	var strcounter=document.getElementById("strcounter").value;
	var intcounter=parseInt(strcounter)+1;
	document.getElementById("strcounter").value=intcounter;
	strhtml='<tr>';
	strhtml=strhtml + '<td><select id="jenis_pajak" name="jenis_pajak[]" class="form-control"><option value="">Choose</option>';
	strjnspjk =document.getElementById("strjnspjk").value;
	arrjnspjk = strjnspjk.split(";");
	
	for (i=0;i<arrjnspjk.length; i++){
		strhtml=strhtml + '<option value=' + arrjnspjk[i] + '>' + arrjnspjk[i] + '</option>';
	}
	strhtml=strhtml + '</select></td>'
	
	strhtml=strhtml + '<td><select id="kode_pajak" name="kode_pajak[]" class="form-control"><option value="">Choose</option>';
	strobjpjk =document.getElementById("strobjpjk").value;
	arrobjpjk = strobjpjk.split(";");
	
	for (i=0;i<arrobjpjk.length; i++){
		strhtml=strhtml + '<option value=' + arrobjpjk[i] + '>' + arrobjpjk[i] + '</option>';
	}
	strhtml=strhtml + '</select></td>'
	
	strhtml=strhtml + '<td><select  name="kode_map[]" class="form-control"><option value="">Choose</option>';
	strmappjk =document.getElementById("strmappjk").value;
	arrmappjk = strmappjk.split(";");
	
	for (i=0;i<arrmappjk.length; i++){
		strhtml=strhtml + '<option value=' + arrmappjk[i] + '>' + arrmappjk[i] + '</option>';
	}
	strhtml=strhtml + '</select></td>'
	
	strhtml=strhtml + '<td><textarea type="text" class="form-control" name="nama[]"></textarea> </td>'
        + '<td><textarea type="text" class="form-control" name="npwp[]"></textarea> </td>'
        + '<td><textarea type="text" class="form-control" name="alamat[]" placeholder="Enter Text" required></textarea> </td>'
        + '<td><input id="tarif" class="form-control" name="tarif[]" onchange="penjumlahan()" type="text"> </td>'
        + '<td><input type="checkbox" name="fas_pajak[]" value="Ya"> </td>'
        + '<td><input type="text" class="form-control" name="special_tarif[]" placeholder="Enter Text" > </td>'
        + '<td><input type="checkbox" name="gross[]" value="Ya"> </td>'
        + '<td><input id="dpp" onchange="penjumlahan()" type="text" class="form-control" name="dpp[]" placeholder="Enter Text" required></td>'
        + '<td><input type="text" class="form-control" name="dpp_gross[]" placeholder="Enter Text" ></td>'
        + '<td><input id="hasil" type="text" class="form-control" name="pajak_terutang[]" placeholder="Enter Text" required></td>'
        + '<td><input type="text" class="form-control" name="masa_pajak[]" placeholder="Enter Text" ></td>'
		+ '<td><input type="text" class="form-control" name="tahun[]" placeholder="Enter Text" ></td>'                          
        + '<td><textarea type="text" class="form-control" name="keterangan[]" placeholder="Enter Text" required></textarea></td>'
	
	strhtml=strhtml +'</tr>';
		
	/*for (i=1;i<=arrhtsl.length; i++){
		html=html+ '<option value=' + arrhtsl[i]) + '>' + arrhtsl[i]) + '</option>';
	}	
	html='<tr>'
        + '<td><select id="jenis_pajak" name="jenis_pajak[]" class="form-control"><option value="">Choose</option><?php foreach ($jenispajak as $get) {?><option value="<?php echo $get->jenis_pajak; ?>"><?php echo $get->jenis_pajak; ?></option><?php } ?></select> </td>'
        + '<td><select id="kode_pajak" name="kode_pajak[]" class="form-control"><option value="">Choose</option><?php foreach ($jenispajak as $kode1) {?><option value="<?php echo $kode1->jenis_pajak; ?>"><?php echo $kode1->jenis_pajak; ?></option><?php } ?></select> </td>'
        + '<td><input id="dropdown2" class="form-control" name="kode_map[]" onchange="penjumlahan()" type="text"> </td>'
        + '<td><textarea type="text" class="form-control" name="nama[]"></textarea> </td>'
        + '<td><textarea type="text" class="form-control" name="npwp[]"></textarea> </td>'
        + '<td><textarea type="text" class="form-control" name="alamat[]" placeholder="Enter Text" required></textarea> </td>'
        + '<td><input id="tarif" class="form-control" name="tarif[]" onchange="penjumlahan()" type="text"> </td>'
        + '<td><input type="checkbox" name="fas_pajak[]" value="Ya"> </td>'
        + '<td><input type="text" class="form-control" name="special_tarif[]" placeholder="Enter Text" > </td>'
        + '<td><input type="checkbox" name="gross[]" value="Ya"> </td>'
        + '<td><input id="dpp" onchange="penjumlahan()" type="text" class="form-control" name="dpp[]" placeholder="Enter Text" required></td>'
        + '<td><input type="text" class="form-control" name="dpp_gross[]" placeholder="Enter Text" ></td>'
        + '<td><input id="hasil" type="text" class="form-control" name="pajak_terutang[]" placeholder="Enter Text" required></td>'
        + '<td><input type="text" class="form-control" name="masa_pajak[]" placeholder="Enter Text" ></td>'
        + '<td><textarea type="text" class="form-control" name="keterangan[]" placeholder="Enter Text" required></textarea></td>'
        + '</tr>';*/
	$('#show tbody').append(strhtml);
}     
        

function penjumlahan(){
  var a = parseFloat(document.getElementById("tarif").value);
  // alert(a);
  var b = parseFloat(document.getElementById("dpp").value);
 
  if(a && b){
    document.getElementById("hasil").value = b*(a/100); 
  }
  
  
}


function tambah() {
  alert("Data Successfully to Save!");
}

function myFunction(){
  var x = document.getElementById("Select").value;

  document.getElementById("demo").innerHTML = x;
  document.getElementById("demo2").innerHTML = x;
  document.getElementById("demo3").innerHTML = x;
}

function showed() {
  // alert();
  var text1 = document.getElementById("show");
  var text2 = document.getElementById("hide");

  if (document.getElementById("tidak").checked == false || document.getElementById("tidak2").checked == false || document.getElementById("tidak3").checked == false ){
    text1.style.display = "block";
    text2.style.display = "block";
  } else {
     text1.style.display = "none";
     text2.style.display = "none";
  } 
  // alert(checkrequest);
}

  
  
  


  $(document).ready(function() { 
  
  
		$('#jenis_pajak').change(function() {
      if( $(this).val() == 'PPh Pasal 21') {
            $('#kode_pajak').prop( "disabled", true );
      } else {       
        $('#kode_pajak').prop( "disabled", false );
      }
    });
	
	$('#selKdPjk').change(function() {
		$("#vkdpjk").val($("#selKdPjk option:selected").val());
	});
	
	$('#selKdMap').change(function() {
		$("#vkdmap").val($("#selKdMap option:selected").val());
	});
	
	
	$('#selJnsPjk').change(function() {
	  var $strid = $("#selJnsPjk option:selected").text();
	  $("#vjnspjk").val($strid);
	  
	  var $id = $(this).val();
	 
	  if( $strid.trim() == 'PPh Pasal 21') {
		  $('#divKdMap').show(); 
		    $("#txtnamanpwp").prop('readonly', false);
            //$('#txtnamanpwp').removeAttr("disabled"); 
			$('#txtnonpwp').prop('readonly', false);	
			$('#txtalamat').prop('readonly', false);		
			
      } else{
		  $("#txtnamanpwp").prop('readonly', true);
            //$('#txtnamanpwp').removeAttr("disabled"); 
			$('#txtnonpwp').prop('readonly', true);	
			$('#txtalamat').prop('readonly', true);	
			
			if($strid.substring(0, 3)=='PPN'){
				$('#divKdMap').hide();
			}else{
				$('#divKdMap').show(); 
			};
		  if( $strid == 'PPN' || $strid == 'PPN WAPU' || $strid == 'PPN PKP') {
				$('#divmasappn').show();
			}else{
				$('#divmasappn').hide();
			}
			
			if( $strid == 'PPh Pasal 23') {
				$('#divKdPjk').show(); 			
			}else{
				$('#divKdPjk').hide(); 
			}
		/*$("#txtnamanpwp").attr("disabled", "disabled"); 
		$("#txtnonpwp").attr("disabled", "disabled"); 
		$("#txtalamat").attr("disabled", "disabled"); */
	  }
	  
	  $.ajax({
        url : "<?php echo base_url('dashboard/gettarifbytax/')?>/" + $id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
			{
				var options =  '<option value="0"><strong>Tarif</strong></option>'; 
				$(data.tarif).each(function(index, value){ 
					if(value.id_jenis_pjk == $id){ 
						options += '<option value="'+value.tarif+'">'+value.tarif+'</option>'; //add the option element as a string
					}
				});

				$('#seltarif').html(options); 
				  
			},
			error: function (data)
			{
				console.log(data);
				// alert('Error get data from ajax');
			}
		});
		
		$.ajax({
        url : "<?php echo base_url('dashboard/getkodemapbytax/')?>/" + $id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
			{
				var options =  '<option value=""><strong>Kode Map</strong></option>'; 
				$(data.kodemap).each(function(index, value){ 
					if(value.id_jenis_pjk == $id){ 
						options += '<option value="'+value.kode_map+'">'+value.kode_map+ ' ( ' + value.keterangan + ' )</option>'; //add the option element as a string
					}
				});

				$('#selKdMap').html(options); 
				  
			},
			error: function (data)
			{
				console.log(data);
				// alert('Error get data from ajax');
			}
		});
		
	
    });
	
	$("#chkfasilitas").on( "click", function() {
	  if($("#chkfasilitas").is(':checked')){
		  $('#divfasilitas').show();
		}else{
			$('#divfasilitas').hide();
		}
	});
	
	$("#chktarifnormal").on( "click", function() {
	  if($("#chktarifnormal").is(':checked')){
		  $('#divtarifnormal').show();
		  $('#divtarifspesial').hide();
		  $('#chktarifspesial').prop('checked', false);
		}else{
			$('#divtarifnormal').hide();
			$('#txtrealtrf').val('0');
		}
	});
	
	$("#chktarifspesial").on( "click", function() {
	  if($("#chktarifspesial").is(':checked')){
		  $('#divtarifnormal').hide();
		  $('#divtarifspesial').show();
		  $('#chktarifnormal').prop('checked', false);
		}else{
			$('#txtrealtrf').val('0');
		  $('#divtarifspesial').hide();
		}
	});
	
	$("#chkgross").on( "click", function() {	
	  if($("#chkgross").is(':checked')){
		  $('#txtdppgross').val('0');
		   $('#vgross').val('Ya');
		   $('#txtdppgross').val('0');
	  $('#vpajakterhutang').val('0');	
	  }else{
		 $('#txtdppgross').val('0'); 
		 $('#vgross').val('Ya');
		  $('#txtdppgross').val('0');
	  $('#txtpajakterhutang').val('0');	
	  $('#vpajakterhutang').val('0');	
	  }
	  $("#txtpajakterhutang").attr("placeholder", "0");
		$("#txtdppgross").attr("placeholder", "0");
		PajakTerhutang();
	});

	
  }); 

function PajakTerhutang(){
	var trf;
	var dpp=$('#txtdpp').val();
	
	$('#txtdppgross').val('0');
	$('#txtpajakterhutang').val('0');	
	$('#vpajakterhutang').val('0');	
		
	if(dpp){
		dpp = $('#txtdpp').val().replace(/[^,\d]/g, '').toString();
	}else{
		dpp="0";
	}
	if($("#chktarifspesial").is(':checked')){
		trf =  $('#txttarif').val();	
		$('#vtarifspesial').val(trf);
	}else if($("#chktarifnormal").is(':checked')){
		//$('#vtarif').val($('#seltarif').val()); 
		$('#vtarif').val($("#seltarif option:selected").text());
		trf =  $('#vtarif').val();
		if (!trf){
			trf ="0";
		}else{
			trf = trf.replace('%','');
		}
		
	}
	$('#txtrealtrf').val(trf);
	var intrf = (parseFloat(trf)/100);
	var pjkutang = parseFloat(dpp)*intrf;
	if (trf && dpp){
		if($("#chkgross").is(':checked')){
			var trfgross = parseFloat(1-parseFloat(intrf));
			if(trfgross==0){
				$('#txtdppgross').val('0');
			}else{
				var dppgross = Math.round(parseFloat(dpp)/trfgross); //-parseFloat(dpp);
				if(parseFloat(dppgross)<0){
					$('#txtdppgross').val('(' + formatRupiah(dppgross.toString()) +')');
				}else{
					$('#txtdppgross').val(formatRupiah(dppgross.toString()));
					
				}
			}
			pjkutang=Math.round(parseFloat(dpp)/trfgross)-parseFloat(dpp);
		}else{
			$('#txtdppgross').val('0');
		}
		$('#txtpajakterhutang').prop('readonly', false);
	  $('#txtpajakterhutang').val('0');	
	  $('#vpajakterhutang').val('0');	
		$("#txtpajakterhutang").val(formatRupiah(pjkutang.toString()));	
		//$('#txtpajakterhutang').prop('readonly', true);
		$("#vpajakterhutang").val(formatRupiah(pjkutang.toString()));	
		$('#txtdpp').val(formatRupiah(dpp.toString()))
		$('#txtpajakterhutang').prop('readonly', true);
	}
	
				
}  


  /*var rupiah = document.getElementById('rupiah');
  rupiah.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    rupiah.value = formatRupiah(this.value);
  });*/

  /* Fungsi formatRupiah */
  function formatRupiah(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split       = number_string.split(','),
    sisa        = split[0].length % 3,
    rupiah        = split[0].substr(0, sisa),
    ribuan        = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? + rupiah : '');
  }

  /*var rupiah2 = document.getElementById('rupiah2');
  rupiah2.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    rupiah2.value = formatRupiah2(this.value);
  });*/

  /* Fungsi formatRupiah */
  function formatRupiah2(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split       = number_string.split(','),
    sisa        = split[0].length % 3,
    rupiah2         = split[0].substr(0, sisa),
    ribuan        = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      rupiah2 += separator + ribuan.join('.');
    }

    rupiah2 = split[1] != undefined ? rupiah2 + ',' + split[1] : rupiah2;
    return prefix == undefined ? rupiah2 : (rupiah2 ? + rupiah2 : '');
  }

  /*var rupiah3 = document.getElementById('rupiah3');
  rupiah3.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    rupiah3.value = formatRupiah3(this.value);
  });*/

  /* Fungsi formatRupiah */
  function formatRupiah3(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split       = number_string.split(','),
    sisa        = split[0].length % 3,
    rupiah3         = split[0].substr(0, sisa),
    ribuan        = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      rupiah3 += separator + ribuan.join('.');
    }

    rupiah3 = split[1] != undefined ? rupiah3 + ',' + split[1] : rupiah3;
    return prefix == undefined ? rupiah3 : (rupiah3? + rupiah3 : '');
  }

  /*var biaya = document.getElementById('biaya');
  biaya.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    biaya.value = formatbiaya(this.value);
  });*/

  /* Fungsi formatRupiah */
  function formatbiaya(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split       = number_string.split(','),
    sisa        = split[0].length % 3,
    biaya         = split[0].substr(0, sisa),
    ribuan        = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      biaya += separator + ribuan.join('.');
    }

    biaya = split[1] != undefined ? biaya + ',' + split[1] : biaya;
    return prefix == undefined ? biaya : (biaya? + biaya : '');
  }

  /*var uangmuka = document.getElementById('uangmuka');
  uangmuka.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    uangmuka.value = formatuangmuka(this.value);
  });*/

  /* Fungsi formatRupiah */
  function formatuangmuka(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split       = number_string.split(','),
    sisa        = split[0].length % 3,
    uangmuka        = split[0].substr(0, sisa),
    ribuan        = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      uangmuka += separator + ribuan.join('.');
    }

    uangmuka = split[1] != undefined ? uangmuka + ',' + split[1] : uangmuka;
    return prefix == undefined ? uangmuka : (uangmuka? + uangmuka : '');
  }
  
  
  //Script modal
  /*$("#selJnsPjk").on('change', function() {
	  var jnspjk = $(this).val();
  alert( jnspjk );
  if(jnspjk == "PPh Pasal 21"){ 
            alert(jnspjk);
        }
});*/
  
  function getvalJnsPjk(sel)
{
	var jnspjk = sel.value;
	if(jnspjk == "PPh Pasal 21"){
            $("#txtnamanpwp").prop('readonly', false);
            //$('#txtnamanpwp').removeAttr("disabled"); 
			$('#txtnonpwp').prop('readonly', false);	
			$('#txtalamat').prop('readonly', false);	 			
    }else{
		$("#txtnamanpwp").prop('readonly', true);
            //$('#txtnamanpwp').removeAttr("disabled"); 
			$('#txtnonpwp').prop('readonly', true);	
			$('#txtalamat').prop('readonly', true);
	}
}
  //===========
</script>

<!-- View Tax -->
<div class="modal fade" id="modal_tax" role="dialog">
    <div class="modal-dialog" style="width:1200px">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title">Tax Information</h3>
        </div>
        <div class="modal-body form" >
          <div class="row">
        <div class="col-xs-12">
          
          <div >   
            <div class="box-body" style="width:1170px;overflow-y: auto;max-height: 75vh">         
              <div class="col-md-12">
          <!-- Custom Tabs -->
          <div >
            
            <div class="tab-content">              
              
                <div class="modal-body form">
                  <form action="#" id="form1" class="form-horizontal">
					<input type="hidden" name="handled_by" value="n.prasetyaningrum"> 
					<?php foreach ($payment as $row) { ?>
					<input type="hidden" name="id_tax" id="id_tax" value="<?php echo $row->id_tax; ?>" >
					<input type="hidden" name="id_payment" id="id_payment" value="<?php echo $row->id_payment; ?>" >
					<input type="hidden" name="nomor_surat" id="nomor_surat" value="<?php echo $row->nomor_surat; ?>" >
					<?php } ?>
					<input type="hidden" name="txtrealtrf" id="txtrealtrf" value='0' />
					<input type="hidden" name="vdeductible" id="vdeductible"   />
					<input type="hidden" name="voptional" id="voptional"  />
					<input type="hidden" name="vobjekpajak" id="vobjekpajak" value='' />
					<input type="hidden" name="vjnspjk" id="vjnspjk" />
					<input type="hidden" name="vkdpjk" id="vkdpjk" />
					<input type="hidden" name="vkdmap" id="vkdmap" />
					<input type="hidden" name="vgross" id="vgross" />
					<input type="hidden" name="vtarif" id="vtarif" />
					<input type="hidden" name="vtarifspesial" id="vtarifspesial" />
					<input type="hidden" name="vpajakterhutang" id="vpajakterhutang" />
					<input type="hidden" name="txtnourutold" id="txtnourutold"  />
					                      
                    <div class="form-body">
						<div class="form-group">
							<label class="control-label col-md-3">No Urut</label>
								<div class="col-md-9">
									<input name="txtnourut" id="txtnourut" value="<?php echo $nourut; ?>"  placeholder="No Urut" class="form-control" type="text" >
								</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Jenis Pajak</label>
								<div class="col-md-2">
									<select class="form-control select2"  id="selJnsPjk" name="selJnsPjk" style="width: 100%;">
										<option value=''>== Pilih ==</option>
										<?php 										
										foreach($jenispajak as $jnspjk)
										  { 
											echo '<option value="'.$jnspjk->id_jenis_pjk.'">'.$jnspjk->jenis_pajak.'</option>';
										  }
										?> 
									</select>
								</div>
						</div>
																		
						<div class="form-group" id="divKdPjk" style="display:none;">
							<label class="control-label col-md-3">Kode Pajak</label>
								<div class="col-md-9">
									<select class="form-control select2" id="selKdPjk" name="selKdPjk" style="width: 100%;">
										<option value=''>== Pilih ==</option>
										<?php 										
										foreach($kodePajak as $kdpjk)
										  { 
											echo '<option value="'.$kdpjk->kode_objek_pajak.'">'.$kdpjk->kode_objek_pajak.'-'.$kdpjk->nama_objek_pajak.'</option>';
										  }
										?> 
									</select>
								</div>
						</div>
						
						<div class="form-group" id="divKdMap" style="display:none;">
							<label class="control-label col-md-3">Kode MAP</label>
								<div class="col-md-9">
									<select class="form-control select2" id="selKdMap" name="selKdMap" style="width: 100%;">
										<option value=''>== Pilih ==</option>										
									</select>
								</div>
						</div>
						
					
						<div class="form-group">
								<label class="control-label col-md-3">Nama NPWP</label>
								<div class="col-md-9">
								  <input name="txtnamanpwp" id="txtnamanpwp" value="<?php echo $namanpwp ; ?>"  placeholder="Nama NPWP" class="form-control" type="text" >
								</div>
							</div>

						<div class="form-group">
								<label class="control-label col-md-3">No NPWP</label>
								<div class="col-md-9">
								  <input name="txtnonpwp" id="txtnonpwp" value="<?php echo $nonpwp; ?>"   placeholder="Nomor NPWP" class="form-control" type="text" >
								</div>
						</div>
						
						<div class="form-group">
								<label class="control-label col-md-3">Alamat</label>
								<div class="col-md-9">
								  <textarea id="txtalamat" name="txtalamat"  value="<?php echo $alamatnpwp; ?>"  class="form-control" rows="3" placeholder="Alamat NPWP" ><?php echo $alamatnpwp; ?></textarea>
								</div>
						</div>
						
						
						<div class="form-group">
								<label class="control-label col-md-3">Tarif Pajak</label>
								<div class="col-md-2">
									<span id="radiobutt">
									  <input id="chktarifnormal" type="checkbox" name="tarif[]" value="0" checked> Normal</input> 
									  </br>
									  <input id="chktarifspesial" type="checkbox" name="tarif[]" value="1" > Spesial</input> 								  
									</span>									
								</div>
								<div id="divtarifspesial" class="col-md-2" style="display:none;">
									<input name="txttarif" id="txttarif"  placeholder="Spesial Tarif" onkeyup="PajakTerhutang()" class="form-control" type="text"/>
								</div>
								<div id="divtarifnormal" class="col-md-2" >
								<select class="form-control select2" id="seltarif" onchange="PajakTerhutang()" name="seltarif" style="width: 100%;">
										<option value='0'>== Pilih ==</option>										
									</select>
								</div>
								
						</div>
						
						<div class="form-group">
								<label class="control-label col-md-3">Fasilitas Pajak</label>
								<div class="col-md-2">
									<input id="chkfasilitas" type="checkbox" name="chkfasilitas" value="1" > Ya </input>
								</div>
								<div id="divfasilitas" class="col-md-7" style="display:none;">
								  <input name="txtfasilitas" id="txtfasilitas"  placeholder="Fasilitas Pajak" class="form-control" type="text">
								</div>
						</div>
						
						<div class="form-group">
								<label class="control-label col-md-3">Gross Up</label>
								<div class="col-md-9">
								  <input id="chkgross" type="checkbox" name="chkgross"  > Ya </input>
								</div>
						</div>
						
						<div class="form-group">
								<label class="control-label col-md-3">DPP</label>
								<div class="col-md-9">
								  <input name="txtdpp" id="txtdpp" onkeyup="PajakTerhutang()" placeholder="DPP Kumulatif" value='0' class="form-control" type="text">
								</div>
						</div>
						
						<div class="form-group">
								<label class="control-label col-md-3">DPP (Gross Up)</label>
								<div class="col-md-9">
								  <input name="txtdppgross" id="txtdppgross"  placeholder="DPP Kumulatif (Gross Up)" value='0' class="form-control" type="text">
								</div>
						</div>
						
						<div class="form-group">
								<label class="control-label col-md-3">Pajak Terhutang</label>
								<div class="col-md-9">
								  <input name="txtpajakterhutang" id="txtpajakterhutang"  placeholder="Pajak Terhutang" value='0' class="form-control" type="text" readonly>
								</div>
						</div>
							
						<div id="divmasappn" class="form-group" style="display:none;">
							<label class="control-label col-md-3">Masa Pajak (PPN)</label>
								<div class="col-md-3">
									<select class="form-control select2" id="selmasappn" name="selmasappn" style="width: 100%;">
										<option value=''>== Pilih ==</option>
										<option value='Januari'>Januari</option>
										<option value='Februari'>Februari</option>
										<option value='Maret'>Maret</option>
										<option value='April'>April</option>
										<option value='Mei'>Mei</option>
										<option value='Juni'>Juni</option>
										<option value='Juli'>Juli</option>
										<option value='Agustus'>Agustus</option>
										<option value='September'>September</option>
										<option value='Oktober'>Oktober</option>
										<option value='Nopember'>Nopember</option>
										<option value='Desember'>Desember</option>
									</select>
								</div>
								<label class="control-label col-md-3">Tahun</label>
								<div class="col-md-3">
									<select class="form-control select2" id="seltahunppn" name="seltahunppn" style="width: 100%;">
										<option value=''>== Pilih ==</option>
										<?php 			
										$curryear = date("Y");
										$period = 5;
										$minyear = intval($curryear)-intval($period);
										for($i=$curryear; $i>=intval($minyear); $i--){
											echo '<option value="'.$i.'">'.$i.'</option>';
										}
										?> 
									</select>
								</div>
						</div>
						
						<div class="form-group">
								<label class="control-label col-md-3">Keterangan</label>
								<div class="col-md-9">
								  <textarea id="txtketerangan" name="txtketerangan" class="form-control" rows="3" placeholder="Keterangan"></textarea>
								</div>
							</div>
						  </div>
                    </div>
                  </form>
                </div>

             
              
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>

              </div>
            <!-- /.box -->
            <div class="modal-footer">            
            <button type="button" id="btnSave" onclick="savetaxdraft()" class="btn btn-primary">Save Draft</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </div>
            </div>
        </div>
        <!-- /.col -->
      </div>
        </div>
        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->