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
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            DATA PAYMENT
            <small></small>
          </h1>
        </section>
        <!-- Main content -->
        <!-- <form id="form" method="post" action="Home/action_addppayment"> -->

          <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <!-- /.box -->
                <div class="box">
                  <div class="box-header with-border">
                    <center><h3 class="box-title">Data Pengajuan SP3</h3></center>
                  </div>  
                  
                    <div class="box-body">
                      <div class="form-row">
                      <div class="form-group col-md-6">
                             <label>Tanggal</label>
                             <input type="text" name="tanggal" class="form-control" value="<?php echo date("d-m-Y"); ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nomor Surat</label>
                            <input type="text" name="nomor_surat" class="form-control" value="<?= $surat; ?>" readonly>                            
                        </div>
                        <div class="form-group col-md-6">
                            <label>Hari</label>
                            <input type="text" class="form-control" value="<?php echo date("l");?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nama Pemohon</label>
                            <input type="text" name="nama_user" class="form-control" value="<?php echo $this->session->userdata('nama_user') ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Divisi</label>
                            <input type="text" name="divisi" class="form-control" value="<?php echo $this->session->userdata("divisi") ?>" placeholder="Divisi" readonly>                            
                        </div>
                        <div class="form-group col-md-6">
                            <label>Jabatan</label>
                            <input type="text" name="jabatan" class="form-control" value="<?php echo $this->session->userdata('jabatan') ?>" placeholder="Jabatan" readonly>
                        </div>
                      
                    </div>
                </div>    

                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Detail Pengajuan</h3>
                  </div>  

                  <div class="box-body">
                    <div class="form-group">
                        <label>Label : </label>
                        <input type="hidden" name="" value="">
                        <textarea type="text" class="form-control" name="" value="" placeholder="Enter Text" readonly ></textarea>
                    </div>
                    <div class="form-group">
                        <label>Label : </label>
                        <input type="hidden" name="" value="">
                        <textarea type="text" class="form-control" name="" value="" placeholder="Enter Text" readonly ></textarea>
                    </div>
                    <div class="form-group">
                        <label>Label : </label>
                        <input type="hidden" name="" value="">
                        <textarea type="text" class="form-control" name="" value="" placeholder="Enter Text" readonly></textarea>
                    </div>
                    <div class="form-group">
                        <label>Label : </label>
                        <input type="hidden" name="" value="">
                        <textarea type="text" class="form-control" name="" value="" placeholder="Enter Text" readonly></textarea>
                    </div>
                    <div class="form-group">
                        <label>Label : </label>
                        <input type="hidden" name="" value="">
                        <textarea type="text" class="form-control" name="" value="" placeholder="Enter Text" readonly></textarea>
                    </div>
                    <div class="form-group">
                        <label>Label : </i></label>
                        <input type="hidden" name="" value="">
                        <textarea type="text" class="form-control" name="" value="" placeholder="Enter Text" readonly></textarea>
                    </div>
                                    
                </div>

                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Data Penerima Pembayaran</h3>
                  </div>

                  <div class="box-body">  
                    <div class="form-group">
                        <label>Nama Penerima :</label>
                        <select name="bank" class="form-control" readonly>
                            <option value="1">Choose</option>
                            <option value="2">BCA</option>
                            <option value="3">Mandiri</option>
                            <option value="4">BNI</option>
                            <option value="5">BRI</option>
                            <option value="6">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Bank Account</label>
                        <input type="hidden" name="" value="">
                        <input type="text" class="form-control" name="" value="" placeholder="Auto" readonly>
                    </div>
                    <div class="form-group">
                        <label>No. Rekening</label>
                        <input type="hidden" name="" value="">
                        <input type="text" class="form-control" name="" value="" placeholder="Auto" readonly>
                    </div>             
                </div>                  

                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Approval</h3>
                  </div>

                  <div class="box-body">
                      <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Pemohon, </label>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br><?php echo $this->session->userdata('nama_user') ?>
                            <br><?php echo $this->session->userdata('jabatan') ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Approval</label>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>Nama Approval
                            <br>Jabatan
                        </div>  
                  </div>
                    <hr style=" border: 1px solid #000;">
                    <a class="btn btn-warning" href="Home" role="button">Cancel</a>  
                    <button class="btn btn-primary" onclick="printThis()">Print</button>
                  
                </div>

            </div>
          </section>  

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
