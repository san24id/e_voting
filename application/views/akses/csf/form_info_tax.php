<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <base href="<?php echo base_url() ?>">
  <title>Corporate Strategy and Finance</title>
  
  <link rel="icon" type="image/png" href="assets/login/images/menu_app_logo2.png"/>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="assets/admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="assets/admin/plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="assets/admin/dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="assets/admin/plugins/iCheck/all.css">
    <!-- Select2 -->
  <link rel="stylesheet" href="assets/admin/bower_components/select2/dist/css/select2.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<style type="text/css">
    @media print {
      body * {
        visibility: hidden;
      }
      #printThis * {
        visibility: visible;
      }
      #printThis {
        position: absolute;
        left: 0;
        top: 0;
      }
      .modal-footer * {
        visibility: hidden;
      }
      .modal-admin {
      /* new custom width */
      width: 75%;
      }
    }
    
</style>   
  
      <!-- Content Wrapper. Contains page content -->
      <div >
           <?php 
						
						$deN='unchecked';
						$deY='unchecked';
						$nde='unchecked';
						$nde50='unchecked';
						$part='unchecked';
						$objY='unchecked';
						$objN='unchecked';
						$objE='unchecked';
						$objT='unchecked';
						
					   $de='0';
					   $opsi='0';
					   $objek='0';
					   $nilai='0';
					   
					   foreach ($process_tax_H as $taxH) {
						   
					   $de= $taxH->de;
					   $opsi= $taxH->opsional;
					   $objek= $taxH->objek_pajak;
					   $nilai= $taxH->nilai;
						   
					   }
					   if($de=='1'){
						   $deY='checked';
					   }else{
						   $deN='checked';
					   }
					   
					   if($opsi=='1'){
						   $nde='checked';
					   }
					   
					   if($opsi=='2'){
						   $nde50='checked';
					   }
						
						if($opsi=='3'){
						   $part='checked';
					   }

						if($objek=='1'){
							$objY='checked';
						}
						if($objek=='0'){
							$objN='checked';
						}
						
						if($objek=='2'){
							$objE='checked';
						}
						
						if($objek=='3'){
							$objT='checked';
						}
						//var_dump($objek);
						//exit();

			foreach ($ppayment as $row){ ?>          
            <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <!-- /.box -->
                <div class="box">
                <input type="hidden" name="id_payment" value="<?php echo $row->id_payment; ?>" >
                <input type="hidden" name="id_user" value="<?php echo $row->id_user; ?>" >
                  <div class="box-header with-border">
                    <p align="right">
                      <?php if($row->status == 0){
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
                    </p>
                    <h5>
                      <br>                        
                      <left><img src="assets/dashboard/images/logo.png" alt="Logo Images"></left>
                      <br>
                      <center><b><u><font size="+2" style="font-family: calibri;">INFORMASI PAJAK</u></b></center>
                       
                    </h5>
                    <table style="font-family: calibri;" width="100%">
                      <tbody>
                        <tr>
                        <td> </td>
                        <td align="center"><b><font size="3" style="font-family: calibri;">No Surat : &nbsp; <?php echo $row->nomor_surat;?></font></b></td>
                        </tr>
                      </tbody>
                    </table>
                                     
					</br>
					</br>
                       
					   <form id="form" action="#"> 
					 
					   <font size="3" style="font-family: calibri;">
					    <table width="70%">
                <tr>
                  <td><b>Deductible Expense</b></td>
                  <td>
                    <input type="checkbox" id="chkdeY" name="de"  <?php echo $deY; ?>  disabled> Ya<br>
                  </td>
                  <td>
                    <input type="checkbox" id="chkdeN" name="de" <?php echo $deN; ?>  disabled> Tidak</input><br>
                  </td>
                  </tr>  
                  <tr>
                    <td></td>
                    <td></td>
                    <td>
                      &nbsp; &nbsp; <input type="checkbox" id="chkNDE" name="chkNDE"  <?php echo $nde; ?> disabled> NDE</input><br>
                    </td>
                  </tr>  
                  <tr>
                  <td></td>
                  <td></td>
                  <td>
                    &nbsp; &nbsp; <input type="checkbox" id="chkNDE50" name="chkNDE50" <?php echo $nde50; ?>  disabled> NDE50</input><br>                            
                  </td>
                  </tr> 
                  <tr>
                  <td></td>
                  <td></td>
                  <td>
                    &nbsp; &nbsp; <input type="checkbox" id="chkPARTNDE" name="chkPARTNDE" <?php echo $part; ?>  disabled> PARTNDE</input><br>                            
                  </td>
                  <td><font size="3">Rp</font></td>
                  <td><input type="text" class="form-control" id="nilai" name="nilai" placeholder="Enter Text" value='<?php echo $nilai; ?>' disabled></td>
                  </tr>
              </table>
              <br>
              <table width="70%">   
                <tr>
                  <td><b>Objek Pajak</b></td>
                  <td><input id="chkObjPjkY" type="checkbox" name="chkObjPjkY" <?php echo $objY; ?>  disabled > Ya </td>
                  <td> <input id="chkObjPjkN"  type="checkbox" name="chkObjPjkN" <?php echo $objN; ?>  disabled> Tidak</input> </td>
                  <td><input id="chkObjPjkE" type="checkbox" name="chkObjPjkE" <?php echo $objE; ?>  disabled> Employee</input> </td>
                  <td><input id="chkObjPjkT" type="checkbox" name="chkObjPjkT" <?php echo $objT; ?>  disabled> Tax at Settlement</input> </td>
                </tr>                        
              </table>
					</font>
					</form>
					</br>
                       
                      <h6>
                      <table border="1" class="table table-bordered table-striped" width="50%">
                      <thead>
                        <tr>
                          <th width="9%">Jenis Pajak</th>
                          <th width="8%">Kode Pajak</th>
                          <th width="9%">Kode MAP</th>
                          <th width="10%">Nama</th>
                          <th width="10%">NPWP/ID</th>
                          <th width="8%">Alamat</th>
                          <th width="6%">Tarif</th>
                          <th width="3%">Fasilitas Pajak</th>
                          <th>Special Tarif</th>
                          <th>Gross Up</th>
                          <th>DPP</th>
                          <th>DPP <br>(Gross Up)</th>
                          <th>Pajak Terutang</th>
                          <th>Masa Pajak PPN</th>
                          <th>Tahun Pajak</th>
                          <th>Keterangan</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php 
                        $ttlpjk=0;
                        $pjkH='';
                        foreach ($process_tax as $tampil) {
                          $pjkH=str_replace(".","",$tampil->pajak_terutang);
                          $ttlpjk=$ttlpjk+(float)$pjkH;  
                        ?>
                        <!-- //Baris 1 -->
                        <tr>
                          <td><?php echo $tampil->jenis_pajak;?></td>
                          <td><?php echo $tampil->kode_pajak;?></td>
                          <td><?php echo $tampil->kode_map;?></td>
                          <td><?php echo $tampil->nama;?></td>
                          <td><?php echo $tampil->npwp;?></td>
                          <td><?php echo $tampil->alamat;?></td>
                          <td><?php echo $tampil->tarif;?></td>
                          <td><?php echo $tampil->fas_pajak;?></td>
                          <td><?php echo $tampil->special_tarif;?></td>
                          <td><?php echo $tampil->gross;?></td>
                          <td><?php echo $tampil->dpp;?></td>
                          <td><?php echo $tampil->dpp_gross;?></td>
                          <td><center><?php echo $tampil->pajak_terutang;?></center></td>
                          <td><?php echo $tampil->masa_pajak;?></td>
                          <td><?php echo $tampil->tahun;?></td>
                          <td><?php echo $tampil->keterangan;?></td>
                        </tr>
                       <?php } ?>  
                        
                      </tbody>
                       <tfoot align="right">
                          <tr> 
                            <th colspan="12" style="text-align:center;"> Total Pajak</th>
                            <th><label class="control-label col-md-3" id="lbltotal"><?php echo number_format($ttlpjk,0,",","."); ?></label></th>
                            <th colspan="3"></th>
                          </tr>
                        </tfoot>
                      </table>
                      </h6>
                  </div>  
                </div>                 

				<div class="row">
					<div class="col-xs-12">
						<div >
						<h5>Copyright &copy; 2020 </h5>
						</div>
					</div>
                </div>    
            </section>
			
          <?php } ?>  
        <!-- </form> -->
        <!-- /.content -->
		
		
	 
  <!-- Control Sidebar -->
 
</div>


<script>
function printThis() {
  window.print();
}

</script>
<script>

var $totpjkx=0;
var pjktrx;

pjktrx=item.pajak_terutang.replace(/[^,\d]/g, '').toString();
$totpjkx=$totpjkx+parseFloat(pjktrx);

$('#lbltotal').text(formatRupiah($totpjkx.toString()));

</script>

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
