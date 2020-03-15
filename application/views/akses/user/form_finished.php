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
        <form id="form" method="post" action="Home/updatepayment">
          <?php foreach ($payment as $get){ ?>          
          <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <!-- /.box -->
                <div class="box">
                  <div class="box-header with-border">
                    <center><h3 class="box-title">Data Pengajuan SP3</h3></center>
                  </div>                    
                    <input type="hidden" name="id_payment" class="form-control" value="<?php echo $get->id_payment?>" readonly> 
                    <div class="box-body">
                      <div class="form-row">
                      <div class="form-group col-md-6">
                             <label>Tanggal</label>
                             <input type="text" name="tanggal" class="form-control" value="<?php echo date("d-m-Y", strtotime($get->tanggal)); ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nomor Surat</label>
                            <input type="text" name="nomor_surat" class="form-control" value="<?php echo $get->nomor_surat?>" readonly>                            
                        </div>
                        <div class="form-group col-md-6">
                            <label>Hari</label>
                            <input type="text" class="form-control" value="<?php echo $get->hari?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nama Pemohon</label>
                            <input type="text" name="nama_user" class="form-control" value="<?php echo $get->nama_user ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Divisi</label>
                            <input type="text" name="divisi" class="form-control" value="<?php echo $get->divisi?>" readonly>                            
                        </div>
                        <div class="form-group col-md-6">
                            <label>Jabatan</label>
                            <input type="text" name="jabatan" class="form-control" value="<?php echo $get->jabatan ?>" readonly>
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
                        <textarea type="text" class="form-control" name="label1"><?php echo $get->label1?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Label : </label>
                        <input type="hidden" name="" value="">
                        <textarea type="text" class="form-control" name="label2"><?php echo $get->label2?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Label : </label>
                        <input type="hidden" name="" value="">
                        <textarea type="text" class="form-control" name="label3"><?php echo $get->label3?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Label : </label>
                        <input type="hidden" name="" value="">
                        <textarea type="text" class="form-control" name="label4"><?php echo $get->label4?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Label : </label>
                        <input type="hidden" name="" value="">
                        <textarea type="text" class="form-control" name="label5"><?php echo $get->label5?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Label : </i></label>
                        <input type="hidden" name="" value="">
                        <textarea type="text" class="form-control" name="label6"><?php echo $get->label6?></textarea>
                    </div>
                                    
                </div>

                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Data Penerima Pembayaran</h3>
                  </div>
                  <div class="box-body">  
                  <div class="form-group">
                        <label>Bank Account</label>
                        
                        <select name="akun_bank" class="form-control">
                            <option value="1" <?php echo $get->akun_bank==1? 'selected':''?> >Choose</option>
                            <option value="BCA" <?php echo $get->akun_bank==BCA? 'selected':''?> >BCA</option>
                            <option value="Mandiri" <?php echo $get->akun_bank==Mandiri? 'selected':''?> >Mandiri</option>
                            <option value="BNI" <?php echo $get->akun_bank==BNI? 'selected':''?> >BNI</option>
                            <option value="BRI" <?php echo $get->akun_bank==BRI? 'selected':''?> >BRI</option>
                            <option value="6" <?php echo $get->akun_bank==6? 'selected':''?> >Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Penerima:</label>
                        <input type="text" class="form-control" name="penerima" value="<?php echo $get->penerima?>"readonly>
                    </div>
                    <div class="form-group">
                        <label>No. Rekening</label>
                        <input type="text" class="form-control" name="no_rekening" value="<?php echo $get->no_rekening?>" readonly>
                    </div>                  

                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Permintaan Permohonan</h3>
                  </div>

                  <div class="box-body">
                      <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Pemohon, </label>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>Nama : &nbsp; <?php echo $get->nama_user?>
                            <br>Jabatan : &nbsp;<?php echo $get->jabatan?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Menyetujui,</label>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>Nama :
                            <br>Jabatan :
                        </div>  
                  </div>
                    <hr style=" border: 1px solid #000;">
                    <a class="btn btn-warning" href="Home" role="button">Cancel</a>
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="button" data-toggle="modal" data-target="#modalNext" class="btn btn-primary">Print</button> 
                </div>

            </div>
          </section>  
          <?php } ?>     
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
<div class="modal fade" id="modalNext" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <div class="col-xs-12">
                <!-- /.box -->
                <div class="box">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  <!-- /.box-header -->
                  <div class="box-body">
                      <input type="hidden" name="id_payment" value="<?php echo $get->id_payment; ?>" />
                      <input type="hidden" name="id_user" value="<?php echo $get->id_user; ?>" />
                      <div class="box-body">
                          <div id="printThis">
                          <h5>
                            <left><img src="assets/dashboard/images/logo.png" alt="Logo Images"></left>
                            <br>
                            <br>
                            <center><b><u><font size="+1" style="font-family: calibri;">SURAT PERMINTAAN PROSES PEMBAYARAN</font></u></b></center>
                          <center><b><font size="3" style="font-family: calibri;">No   : <?php echo $get->nomor_surat;?> &nbsp; No ARF/ASF   : </font></b></center>   
                          <br>
                          <!-- <center><b><i><font size="2" style="font-family: calibri;">(dilengkapi oleh Pemohon) &nbsp; (dilengkapi oleh CSF, coret salah satu)</font></i></b></center> -->
                          <p> Dari   :</p>
                          <p>&nbsp;  Nama Pemohon : &nbsp; <?php echo $get->nama_user;?></p>
                          <!-- <p align="justify" style="font-family: sans-serif;">PT Penjaminan Infrastruktur Indonesia (Persero) akan mereview dan menindaklanjuti dokumen yang telah Saudara sampaikan. <br><br>
                              PT Penjaminan Infrastruktur Indonesia (Persero) akan menghubungi saudara jika pengecekan telah selesai.</p> -->
                          <br>
                          <hr style=" border: 1px solid #000;">
                          <p>Mohon dapat dilakukan proses pembayaran / pengembalian uang dengan perincian sebagai berikut : </p> 
                          <!-- <center><b><font size="+1" style="font-family: sans-serif;">Rekomendasi Penilaian:</font></b></center> -->
                          
                        <table class="table table-bordered table-striped" style="font-family: calibri;">
                          <tbody>
                            <?php foreach ($payment as $ket) { ?>
                            <tr><td><b>Tujuan Penggunaan : </b><?php echo $ket->label1; ?></td></tr>
                            <tr><td><b>Jumlah : </b>IDR &nbsp; <?php echo $ket->label2; ?></td></tr>
                            <tr><td><b>Perkiraan Tanggal : </b> &nbsp; <?php echo $ket->label3; ?></td></tr>
                            <tr><td><b>Penyedia Barang / Jasa Penerima Pembayaran : </b> &nbsp; <?php echo $ket->label4; ?></td></tr>

                            <?php } ?>
                          </tbody>
                        </table>
                        <table class="table table-bordered table-striped" style="font-family: calibri;">
                          <tbody>
                            <?php foreach ($payment as $print) { ?>
                            <tr><td>Penerima : &nbsp; <?php echo $print->penerima; ?></td></tr>
                            <tr><td>Account Bank : &nbsp; <?php echo $print->akun_bank; ?></td></tr>
                            <tr><td>Rekening : &nbsp; <?php echo $print->no_rekening; ?></td></tr>
                            <?php }  ?>
                          </tbody>
                        </table>
                          <br>
                        <table width="100%">
                        <tbody>
                            <tr>
                            <td>Pemohon, </td>
                            <td>Menyetujui, </td></tr>
                            <td>                            
                            <td></tr>
                            <td>Nama : &nbsp; <?php echo $get->nama_user?></td></tr>
                            <td>Jabatan : &nbsp;<?php echo $get->jabatan?></td>
                            <td>
                            <td></tr>
                            <td>Nama Approval : </td></tr>
                            <td>Jabatan : </td>  
                            <td>
                            </tr>
                        </tbody>
                        </table>
                        <hr style=" border: 1px solid #000;">
                        <!-- <img src="assets/dashboard/images/FooterHyperlink.png" width="100%">
                          <center><b><font style="font-family: sans-serif;">Sekretariat:</font></b></center>
                          <br>
                          <center><p style="font-family: sans-serif;">Capital Place Building, 7-8th Floor, Jl. Jenderal Gatot Subroto Kav.18 Jakarta Selatan, DKI Jakarta </p></center>
                          <center><p style="font-family: sans-serif;">Email : info.pppindonesia@gmail.com </p></center> -->
                      </h5>
                    </div>
                      </div>
                  </div>
                </div>
              </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="printThis()">Print</button>
            </div>
          </div>
        </div>
      </div>
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
