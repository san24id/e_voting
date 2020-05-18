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
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <!-- /.box -->
              <div class="box">
                <div class="box-header with-border">
                  <h5>
                    <br>
                    <left><img src="assets/dashboard/images/logo.png" alt="Logo Images"></left>
                    <br>
                    <center><b><u><font size="+2" style="font-family: calibri;">REPORT PERPAJAKAN</font></u></b></center>
                  </h5>

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
                          <?php foreach ($vreport as $get){ 

                          ?>
                          <td> 1 </td>   
                          <td> <?php echo $get->nomor_surat;?> </td>    
                          <td> <?php echo $get->jenis_pajak;?>  </td>    
                          <td> <?php echo $get->masa_pajak;?>  </td>    
                          <td> <?php echo $get->tahun_pajak;?>  </td> 
                          <td> <?php echo $get->tgl_pemotongan;?>  </td>    
                          <td> <?php echo $get->ber_npwp;?>  </td>                            
                          <td> <?php echo $get->npwp;?>  </td>                            
                          <td> <?php echo $get->nik;?>  </td>                            
                          <td> <?php echo $get->nama_vendor;?>  </td>                            
                          <td> <?php echo $get->alamat;?>  </td>                            
                          <td> <?php echo $get->kode_pajak;?>  </td>     
                          <td> <?php echo $get->penghasilan_bruto;?>  </td>     
                          <td> <?php echo $get->tarif_pajak;?>  </td>     
                          <td> <?php echo $get->pjk_terutang;?>  </td>     
                          <td> <?php echo $get->fasilitas;?>  </td>     
                          <td> <?php echo $get->nomor_skb;?>  </td>     
                          <td> <?php echo $get->vendor;?>  </td>     
                          <td> <?php echo $get->nilai_ppn;?>  </td>     
                        </tr>
                      </tbody>
                    </table>       
                      
                </div>  
              </div> 

                  <div class="box">
                    <div class="box-header with-border">
                    <a class="btn btn-warning" href="Dashboard/report_pajak" role="button">Back</a>
                      <a class="btn btn-primary" href="Dashboard/form_sp3_2/<?php echo $get->id_payment;?>" target="_blank" role="button">Next</a>  
                    </div>
                  </div>                                                 
            </div>
          </div>  
        </section>    
        <?php } ?>  
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
