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
    }
</style>   
  
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <?php foreach ($ppayment as $row){ ?>          
            <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <!-- /.box -->
                <div class="box">
                <input type="hidden" name="id_user" value="<?php echo $row->id_user; ?>" >
                  <div class="box-header with-border">
                    <h5>
                      <br>
                      <left><img src="assets/dashboard/images/logo.png" alt="Logo Images"></left>
                      <br>
                      <center><b><u><font size="+2" style="font-family: calibri;">REPORT PERPAJAKAN</font></u></b></center>
                    </h5>

        <form id="form" method="post" action="Dashboard/tax" onsubmit="tambah()" target="_blank">    
              <hr style=" border: 0.5px solid #000;">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <th>No.</th>
                      <th>SPPP No. </th>
                      <th>Jenis Pajak </th>
                      <th>Masa Pajak </th>
                      <th>Tahun Pajak</th>
                      <th>Tgl Pemotongan (dd/MM/yyyy)</th>
                      <th>NPWP ? (Y/N)</th>
                      <th>NPWP (tanpa format/tanda baca)   </th> 
                      <th>NIK (tanpa format/tanda baca) </th>
                      <th>Nama Vendor</th>
                      <th>Alamat</th>
                      <th>Kode Objek Pajak</th>
                      <th>Penghasilan Bruto</th>
                      <th>Tarif Pajak</th>
                      <th>Nilai Pajak Terutang</th>
                      <th>Mendapatkan Fasilitas? (N/SKB/DTP)</th>
                      <th>Nomor SKB</th>
                      <th>Vendor PKP (Y/N)</th>
                      <th>Nilai PPN WAPU/OFFSHORE</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td> 1 </td>   
                        <td> <input type="text" class="form-control" name="nomor_surat" value="<?php echo $row->nomor_surat;?>"> </td>    
                        <td> <input type="text" class="form-control" name="jenis_pajak">  </td>    
                        <td> <input type="text" class="form-control" name="masa_pajak"> </td>    
                        <td> <input type="text" class="form-control" name="tahun_pajak"> </td>    
                        <td> <input type="text" class="form-control" name="tgl_pemotongan"> </td>    
                        <td> <input type="text" class="form-control" name="ber_npwp"> </td>    
                        <td> <input type="text" class="form-control" name="npwp"> </td>    
                        <td> <input type="text" class="form-control" name="nik"> </td>    
                        <td> <input type="text" class="form-control" name="nama_vendor"> </td>    
                        <td> <input type="text" class="form-control" name="alamat"> </td>    
                        <td> <input type="text" class="form-control" name="kode_pajak"> </td>    
                        <td> <input id="1" type="text" class="form-control" onchange="math()" name="penghasilan_bruto"> </td>    
                        <td> <input id="2" type="text" class="form-control" onchange="math()" name="tarif_pajak"> </td>    
                        <td> <input id="msg" name="pjk_terutang" class="form-control"> </td>    
                        <td> <input type="text" class="form-control" name="fasilitas"> </td>    
                        <td> <input type="text" class="form-control" name="nomor_skb"> </td>    
                        <td> <input type="text" class="form-control" name="vendor"> </td>    
                        <td> <input id="msg2" type="text" class="form-control" name="nilai_ppn"> </td>    
                        <input type="hidden" name="id_payment" value="<?php echo $row->id_payment; ?>" >

                      </tr>
                    </tbody>
                  </table>       
                    <!-- <hr style=" border: 0.5px solid #000;">
                    <h6>
                    <table border="1" width="50%">
                    <input type="hidden" name="id_payment" value="<?php echo $row->id_payment; ?>" >

                    <tbody>
                        <tr>
                        <td colspan="5"><center><b>Perhitungan Pajak (*diisi oleh CSF)</b></center></td>
                        </tr>
                        <tr>
                            <td width="20%"><center><b>Jenis Pajak </b></center></td>
                            <td width="10%"><center><b>Tarif </b></center></td>
                            <td width="30%"><center><b>DPP </b></center></td>
                            <td width="20%"><center><b>Gross Up </b></center>  </td>
                            <td width="20%"><center><b>Pajak Terhitung </b></center>  </td>
                        </tr>
                        <tr>
                            <td><font size="2">PPh Pasal 21/26 <input type="text" name="PPh_Pasal_21"></td>
                            <td><input type="text" class="form-control" name="tarif1"></td>
                            <td><input type="text" class="form-control" name="dpp1"></td>
                            <td><input type="text" class="form-control" name="gross_up1"></td>
                            <td><input type="text" class="form-control" name="pjt1"></td>
                        </tr>
                        <tr>
                            <td><font size="2">PPh Pasal 22 <input type="text" name="PPh_Pasal_22"></td>
                            <td><input type="text" class="form-control" name="tarif2"></td>
                            <td><input type="text" class="form-control" name="dpp2"></td>
                            <td><input type="text" class="form-control" name="gross_up2"></td>
                            <td><input type="text" class="form-control" name="pjt2"></td>
                        </tr>
                        <tr>
                            <td><font size="2">PPh Pasal 23/26<input type="text" name="PPh_Pasal_23"></td>
                            <td><input type="text" class="form-control" name="tarif3"></td>
                            <td><input type="text" class="form-control" name="dpp3"></td>
                            <td><input type="text" class="form-control" name="gross_up3"></td>
                            <td><input type="text" class="form-control" name="pjt3"></td>
                        </tr>
                        <tr>
                            <td><font size="2">PPh Pasal 4(2) <input type="text" name="PPh_Pasal_4"></td>
                            <td><input type="text" class="form-control" name="tarif4"></td>
                            <td><input type="text" class="form-control" name="dpp4"></td>
                            <td><input type="text" class="form-control" name="gross_up4"></td>
                            <td><input type="text" class="form-control" name="pjt4"></td>
                        </tr>
                        <tr>
                            <td><font size="2">PPN WAPU/PPN Offshore </td>
                            <td><input type="text" class="form-control" name="tarif5"></td>
                            <td><input type="text" class="form-control" name="dpp5"></td>
                            <td><input type="text" class="form-control" name="gross_up5"></td>
                            <td><input type="text" class="form-control" name="pjt5"></td>
                        </tr>                                                          
                    </tbody>
                    </table>
                    </h6>
                    <p align="justify">Apa Anda yakin                  akan mengirimkan TAX Form Pengajuan ini :  <?=$row->nomor_surat?></p>
                    <label>Kepada CSF Finance:</label>                        
                    <select name="handled_by">
                        <option>--- Choose ---</option>
                    <?php foreach ($csf as $get) {?>
                        <option value="<?php echo $get->username; ?>"><?php echo $get->username; ?></option>
                    <?php } ?>
                    </select> -->
                  </div>  
                </div>                 

                <div class="box">
                    <div class="box-header with-border">
                    <a class="btn btn-warning" href="Dashboard/form_sp3/<?php echo $row->id_payment;?>" role="button">Back</a>                        
                    <button type="submit" class="btn btn-primary" >Submit</button>   
                    </div>    
                </div>
            </section>
          <?php } ?>  
        </form>       
        <!-- </form> -->
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


<script>
function printThis() {
  window.print();
}

function math() {
	var a = parseInt(document.getElementById("1").value);
  // alert(a);
	var b = parseInt(document.getElementById("2").value);
  // alert(b);
	if(a && b){
    document.getElementById("msg").value= a*(b/100);
  }		
  if(a){
    document.getElementById("msg2").value= a*(10/100);
  }  
}

$(function () {
    $("#example1").DataTable();
});

function tambah() {
  alert("Report Pajak Successfully to Submit!");
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
