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
       

          <?php foreach ($ppayment as $row){ ?>          
            <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <!-- /.box -->
                <div class="box">
                <input type="hidden" name="id_payment" value="<?php echo $row->id_payment; ?>" >
                <input type="hidden" name="id_user" value="<?php echo $row->id_user; ?>" >
                  <div class="box-header with-border">
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
                        <td align="center"><b><font size="3" style="font-family: calibri;">No Surat : &nbsp; <?php echo $row->nomor_surat;?></b></td>
                        </tr>
                      </tbody>
                    </table>
                                     
					          </br>
                       

                    <?php if ($row->status == 5 ){ ?>
                       
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
                       <?php foreach ($process_tax as $tampil) {?>
                        <!-- //Baris 1 -->
                        <tr>
                          <td><?php echo $tampil->jenis_pajak;?></td>
                          <td><?php echo $tampil->kode_pajak;?></td>
                          <td><?php echo $tampil->kode_map;?>
                          </td>
                          <td><?php echo $tampil->nama;?></td>
                          <td><?php echo $tampil->npwp;?></td>
                          <td><?php echo $tampil->alamat;?></td>
                          <td><?php echo $tampil->tarif;?></td>
                          <td><?php echo $tampil->fas_pajak;?></td>
                          <td><?php echo $tampil->special_tarif;?></td>
                          <td><?php echo $tampil->gross;?></td>
                          <td><?php echo $tampil->dpp;?></td>
                          <td><?php echo $tampil->dpp_gross;?></td>
                          <td><?php echo $tampil->pajak_terutang;?></td>
                          <td><?php echo $tampil->masa_pajak;?></td>
                          <td><?php echo $tampil->tahun;?></td>
                          <td><?php echo $tampil->keterangan;?></td>
                        </tr>
                        
                      </tbody>
                       <?php } ?>  
                      </table>
                      </h6>
                    <?php } ?>                   
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
