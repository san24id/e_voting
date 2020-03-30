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
        <form id="form" method="post" action="Home/addpayment" onsubmit="tambah()">
          <input type="hidden" name="id_user" class="form-control" value="<?php echo $this->session->userdata('id_user') ?>">           
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
                        <div class="form-group col-md-12">
                            <label>Jenis Pembayaran (pilih salah satu)</label><br>
                            <input type="checkbox" name="jenis_pembayaran[]" value="1">Uang Muka/Advance</input><br>
                            <input type="checkbox" name="jenis_pembayaran[]" value="2">Permintaan Uang Muka/Request</input><br>
                            <input type="checkbox" name="jenis_pembayaran[]" value="3">Pertanggung Jawaban Uang Muka/Settlement</input><br>                            
                            <input type="checkbox" name="jenis_pembayaran[]" value="4">Non-Uang Muka/Non-Advance</input><br>
                        </div>                                                                       
                        <div class="form-group col-md-6">
                             <label>Tanggal</label>
                             <input type="text" name="tanggal" class="form-control" value="<?php echo date("Y-m-d"); ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nomor Surat</label>
                            <input type="text" name="nomor_surat" class="form-control" value="<?= $surat; ?>" readonly>                            
                        </div>
                        <div class="form-group col-md-6">
                            <label>Hari</label>
                            <input type="text" name="hari" class="form-control" value="<?php echo date("l");?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nama Pemohon</label>
                            <input type="text" name="nama_user" class="form-control" value="<?php echo $this->session->userdata('nama_user') ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Divisi</label>
                            <input type="text" name="divisi" class="form-control" value="<?php echo $this->session->userdata('divisi') ?>" readonly>                            
                        </div>
                        <div class="form-group col-md-6">
                            <label>Jabatan</label>
                            <input type="text" name="jabatan" class="form-control" value="<?php echo $this->session->userdata('jabatan') ?>" readonly>
                        </div>                      
                    </div>
                </div>    

                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Detail Pengajuan</h3>
                  </div>  

                  <div class="box-body">
                    <div class="form-group">
                        <label>Tujuan Penggunaan : <i class="glyphicon glyphicon-info-sign" style="color: blue; cursor:pointer;" data-toggle="modal" data-target="#anomor1"></i></label>                        
                        <textarea type="text" class="form-control" name="label1" placeholder="Enter Text" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Jumlah : <i class="glyphicon glyphicon-info-sign" style="color: blue; cursor:pointer;" data-toggle="modal" data-target="#anomor2"></i></label>                        
                        <textarea type="text" class="form-control" name="label2" placeholder="Enter Text" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Perkiraan Tanggal Selesai Pekerjaan/Terima Barang (Hanya diisi untuk jenis pembayaran Permintaan Uang Muka/Request) : <i class="glyphicon glyphicon-info-sign" style="color: blue; cursor:pointer;" data-toggle="modal" data-target="#anomor3"></i></label>                        
                        <input type="date" class="form-control" name="label3" placeholder="Enter Text" required></input>
                    </div>
                    <div class="form-group">
                        <label>Lampiran Dokumen Pendukung (Pilih dan Tandai jika ada) <i class="glyphicon glyphicon-info-sign" style="color: blue; cursor:pointer;" data-toggle="modal" data-target="#anomor4"></i></label><br>                        
                        <input type="checkbox" name="label4[]" value="Bukti Transaksi Asli (a.l : Invoice/Kuitansi, Struk, Nota, Dll)">Bukti Transaksi Asli (a.l : Invoice/Kuitansi, Struk, Nota, Dll)</input><br>
                        <input type="checkbox" name="label4[]" value="Berita Acara Pemeriksaan (BAP)">Berita Acara Pemeriksaan (BAP)</input><br>
                        <input type="checkbox" name="label4[]" value="Berita Acara Pemeriksaan (BAST)">Berita Acara Pemeriksaan (BAST)</input><br>                            
                        <input type="checkbox" name="label4[]" value="Bukti Penerimaan Jasa/Barang (Delivery Order)">Bukti Penerimaan Jasa/Barang (Delivery Order)</input><br>
                        <input type="checkbox" name="label4[]" value="Copy Dokumen Permintaan Barang/Jasa terkait (PR/Memo)">Copy Dokumen Permintaan Barang/Jasa terkait (PR/Memo)</input><br>
                        <input type="checkbox" name="label4[]" value="Copy PO/SPK">Copy PO/SPK</input><br>
                        <input type="checkbox" name="label4[]" value="Copy Kontrak/Perjanjian">Copy Kontrak/Perjanjian</input><br>                            
                        <input type="checkbox" name="label4[]" value="Faktur Pajak Rangkap 2">Faktur Pajak Rangkap 2</input><br>                        
                        <input type="checkbox" name="label4[]" value="Form DGT-1 & COD (Jika kode vendor tidak tersedia)">Form DGT-1 & COD (Jika kode vendor tidak tersedia)</input><br>
                        <input type="checkbox" name="label4[]" value="NPWP">NPWP (Jika kode vendor tidak tersedia)</input><br>
                        <input type="checkbox" name="label4[]" value="Lainnya (Jika ada) : Rincian Pengeluaran">Lainnya (Jika ada) : Rincian Pengeluaran</input><br>
                    </div>                                                      
                </div>

                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Data Penerima Pembayaran <br> <i>(diisi dengan mengacu pada vendor master data-Procurement)</i></h3>
                  </div>
                  <div class="box-body">  
                    <h5 class="box-title"><b>Penyedia Barang / Jasa Penerima Pembayaran :</b></h5>
                    <div class="form-group col-md-6">
                        <label>Bank Account</label>
                        <select name="akun_bank" class="form-control">
                            <option value="1">Choose</option>
                            <option value="BCA">BCA</option>
                            <option value="Mandiri">Mandiri</option>
                            <option value="BNI">BNI</option>
                            <option value="BRI">BRI</option>
                            <option value="6">Other</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nama Penerima:</label>
                        <input type="text" class="form-control" name="penerima" placeholder="Enter Text" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Kode Vendor</label>
                        <input type="text" class="form-control" name="vendor" placeholder="Enter Text" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Nomor Rekening</label>
                        <input type="text" class="form-control" name="no_rekening" placeholder="Enter Text" required>
                    </div>                                 
                </div>

                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Khusus diisi untuk Jenis Pembayaran Pertanggungjawaban Uang Muka/Settlement:</h3>
                  </div>  
                  <div class="box-body">
                    <div class="form-group">
                      <label>Nomor ARF terkait</label>
                      <input type="text" class="form-control" name="label5" placeholder="Enter Text">
                      <input type="checkbox" name="label6" value="Lampiran copy ARF tersedia">Lampiran copy ARF tersedia</input>
                    </div>
                    <div class="form-group">
                      <label>Perhitungan Penggunaan Uang Muka :</label><br>
                      <label>Jumlah Biaya :</label>
                      <input type="text" class="form-control" name="label7" placeholder="Enter Text"></input>
                    
                      <label>Jumlah Uang Muka :</label>
                      <input type="text" class="form-control" name="label8" placeholder="Enter Text"></input>

                      <label>Selisih Kurang/Lebih :</label>
                      <input type="text" class="form-control" name="label9" placeholder="Enter Text"></input>
                    </div>
                    
                    <a class="btn btn-warning" href="Home" role="button">Cancel</a>  
                    <button type="submit" class="btn btn-primary">Submit</button>
                    
                  </div>
                </div>                                                 
            </div>
          </section>  

        </form>
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

<script>
function tambah() {
  alert("Data Successfully to Submit");
}
</script>


<div class="modal fade" id="anomor1" tabindex="-1" role="dialog" aria-labelledby="anomor1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        
        <h5><p align="justify">Konten</p></h5>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="anomor2" tabindex="-1" role="dialog" aria-labelledby="anomor1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        
        <h5><p align="justify">Konten</p></h5>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="anomor3" tabindex="-1" role="dialog" aria-labelledby="anomor1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        
        <h5><p align="justify">Konten</p></h5>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="anomor4" tabindex="-1" role="dialog" aria-labelledby="anomor1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        
        <h5><p align="justify">Konten</p></h5>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="anomor5" tabindex="-1" role="dialog" aria-labelledby="anomor1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        
        <h5><p align="justify">Konten</p></h5>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="anomor6" tabindex="-1" role="dialog" aria-labelledby="anomor1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        
        <h5><p align="justify">Konten</p></h5>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>