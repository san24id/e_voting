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
        <form id="form" method="post" action="Dashboard/addpayment" onsubmit="tambah()">
          <input type="hidden" name="id_user" class="form-control" value="<?php echo $this->session->userdata('id_user') ?>">           
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
                      <center><b><u><font size="+2" style="font-family: calibri;">SURAT PERMINTAAN PROSES PEMBAYARAN</font></u></b></center>
                    </h5>
                    <table style="font-family: calibri;" width="75%">
                      <tbody>
                        <tr>
                        <td> </td>
                        <td align="center"><b><font size="3" style="font-family: calibri;">No   : <?php echo $surat; ?></b></td>
                            <input type="hidden" name="nomor_surat" class="form-control" value="<?php echo $surat; ?>">                            
              
                        <td><b>No ARF/ASF   :</b></td>
                        </tr>
                      </tbody>
                    </table>
                    <table style="font-family: calibri;" width="120%">
                      <tbody>     
                        <tr>
                        <td></td>
                        <td align="center"><b><i><font size="2" style="font-family: calibri;">(dilengkapi oleh Pemohon)</b></td>
                        <td><b><i><font size="2" style="font-family: calibri;">(dilengkapi oleh CSF, coret salah satu)</b></td>
                        </tr>
                      </tbody>
                    </table>

                    <br>

                    <table style="font-family: calibri;" width="60%">
                      <tr>
                      <td align="center"><b>Jenis Pembayaran (pilih salah satu):</b></td>
                      <td>
                        <input id="auto" type="checkbox" > <b>Uang Muka/Advance</b><br>
                      </td>
                      <td>
                        <input id="checkrequest" onclick="checkUangMuka()" type="checkbox" name="jenis_pembayaran[]" value="2"> Permintaan Uang Muka/Request</input><br>
                      </td>
                      </tr>    
                      <tr>
                      <td></td>
                      <td>
                        <input id="checksettlement" onclick="checkUangMuka2()" type="checkbox" name="jenis_pembayaran[]" value="3"> Pertanggung Jawaban Uang Muka/Settlement</input><br>                            
                      </td>
                      <td>
                        <input id="checked" onclick="hide()" type="checkbox" name="jenis_pembayaran[]" value="4"> Non-Uang Muka/Non-Advance</input><br>
                      </td>
                      </tr>                       
                    </table>

                    <br>

                    <table style="font-family: calibri;" width="50%">
                      <tbody>                            
                      <tr>
                      <td>Kepada : Divisi CSF</td>
                      <td align="right">Tanggal : <?php echo date("l, d-M-Y"); ?></td>
                        <input type="hidden" name="tanggal" class="form-control" value="<?php echo date("l, d-M-Y"); ?>">
                      </tr>
                      <tr>
                      <td>Dari : </td>
                      </tr>             
                      <tr>
                        <td>&nbsp;  Nama Pemohon : &nbsp; <?php echo $this->session->userdata('display_name') ?></td>
                        <input type="hidden" name="display_name" class="form-control" value="<?php echo $this->session->userdata('display_name') ?>">
                      </tr> 
                      <tr>
                        <td>&nbsp;  Direktorat/Divisi Pemohon : &nbsp; <?php echo $this->session->userdata('division_id') ?></td>
                        <input type="hidden" name="division_id" class="form-control" value="<?php echo $this->session->userdata('division_id') ?>">                            
                      </tr>                                                   
                      </tbody>
                    </table>

                    <hr style=" border: 1px solid #000;">

                    <table style="font-family: calibri;" width="75%">
                      <tbody>
                      <p>Mohon dapat dilakukan proses pembayaran / pengembalian uang dengan perincian sebagai berikut : </p>
                      <tr>
                        <td><b>- Tujuan Penggunaan </b></td>
                        <td><b> : </b></td>
                        <!--<td>-->
                        <td colspan="2"><textarea type="text" class="form-control" rows="5" name="label1" placeholder="Tujuan Penggunaan" required></textarea></td>
                        <td>
                      </tr>
                      <tr>
                        <td><b>- Jumlah </b></td>
                        <td><b> : </b></td>
                        <td><select id="Select" onchange="myFunction()" name="currency" class="form-control">
                                      <option>--Choose--</option>
                                      <?php foreach ($currency as $get) {?>
                                  <option value="<?php echo $get->curr; ?>"><?php echo $get->curr; ?></option>
                                <?php } ?>
                              </select>
                          </td>
                        <td colspan="2"><input type="text" id="rupiah" class="form-control" name="label2" placeholder="Jumlah" required> </td>
                      </tr>
                      <tr>
                        <td><b>- Perkiraan Tanggal </b></td>
                        <td><b> : </b></td>
                        <!--<td>-->
                        <td colspan="2"><input type="date" class="form-control" name="label3" required></input></td>     
                      </tr>
                      <tr>
                        <td colspan="4"><b>Selesai Pekerjaan/Terima Barang</b> <br>(Hanya diisi untuk jenis pembayaran <i><b>Permintaan Uang Muka/Request)</b></i></td>
                      </tr>                            
                      </tbody>
                    </table>

                    <br>

                    <table style="font-family: calibri;" width="55%">
                      <tbody>
                      <b><p>- Penyedia Barang / Jasa Penerima Pembayaran</p></b> 
                      <tr>
                        <td>Nama</td>
                        <td> : </td>
                        <td colspan="4"><input type="text" class="form-control" name="penerima" placeholder="Enter Text" required></td>
                      </tr>
                      <tr>  
                        <td>Kode Vendor</td>
                        <td> : </td>
                        <td><input type="text" class="form-control" name="vendor" placeholder="Enter Text"></td>
                        <td>Bank</td>
                        <td>:</td>
                        <td><select name="akun_bank" class="form-control">
                                <option>--- Choose ---</option>
                                <?php foreach ($bank as $get) {?>
                                  <option value="<?php echo $get->bank; ?>"><?php echo $get->bank; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Nomor Rekening</td> 
                        <td>:</td>                           
                        <td><input type="text" class="form-control" name="no_rekening" placeholder="Enter Text"></td>                                
                      </tr>
                      <tr>
                        <td colspan="3"><i>(diisi dengan mengacu pada vendor master data-Procurement)</i></td>
                      </tr>
                      </tbody>
                    </table>

                    <br>

                    <table style="font-family: calibri;" width="100%">
                      <tr>
                        <td><b>- Lampiran Dokumen Pendukung :</b></td>
                        <td><td>
                      </tr>
                      <tr>
                        <td>  
                          <input type="checkbox" name="label4[]" value="Bukti Transaksi Asli (a.l : Invoice/Kuitansi, Struk, Nota, Dll)"> Bukti Transaksi Asli (a.l : Invoice/Kuitansi, Struk, Nota, Dll)</input><br>
                          <input type="checkbox" name="label4[]" value="Berita Acara Pemeriksaan (BAP)"> Berita Acara Pemeriksaan (BAP)</input><br>
                          <input type="checkbox" name="label4[]" value="Berita Acara Pemeriksaan (BAST)"> Berita Acara Pemeriksaan (BAST)</input><br>                            
                          <input type="checkbox" name="label4[]" value="Bukti Penerimaan Jasa/Barang (Delivery Order)"> Bukti Penerimaan Jasa/Barang (Delivery Order)</input><br>
                          <input type="checkbox" name="label4[]" value="Copy Dokumen Permintaan Barang/Jasa terkait (PR/Memo)"> Copy Dokumen Permintaan Barang/Jasa terkait (PR/Memo)</input><br>
                        </td>
                        <td>
                          <input type="checkbox" name="label4[]" value="Copy PO/SPK"> Copy PO/SPK</input><br>
                          <input type="checkbox" name="label4[]" value="Copy Kontrak/Perjanjian"> Copy Kontrak/Perjanjian</input><br>                            
                          <input type="checkbox" name="label4[]" value="Faktur Pajak Rangkap 2"> Faktur Pajak Rangkap 2</input><br>                        
                          <input type="checkbox" name="label4[]" value="Form DGT-1 & COD (Jika kode vendor tidak tersedia)"> Form DGT-1 & COD (Jika kode vendor tidak tersedia)</input><br>
                          <input type="checkbox" name="label4[]" value="NPWP"> NPWP (Jika kode vendor tidak tersedia)</input><br>
                          <input id="lainnya" onclick="showInput()" type="checkbox" name="label4[]" value="Lainnya (Jika ada) : Rincian Pengeluaran"> Lainnya (Jika ada) : Rincian Pengeluaran</input><br>
                            <input id="text1" type="text" name="lainnya1" style="display:none"> <br>
                            <input id="text2" type="text" name="lainnya2" style="display:none"> <br>
                        </td>
                      <tr>      
                    </table>

                    <br>

                    <table id="show" style="font-family: calibri;" width="50%">
                      <tbody>
                      <tr>
                        <td><b>Khusus diisi untuk Jenis Pembayaran Pertanggungjawaban Uang Muka/Settlement:</b></td>
                      </tr>
                      <tr>
                        <td><b>- Nomor ARF terkait</b></td>
                        <td>:</td>
                        <td>
                          <input type="text" class="form-control" name="label5" placeholder="Enter Text">                          
                        </td>
                        <td><input type="checkbox" name="label6" value="Lampiran copy ARF tersedia"> Lampiran copy ARF tersedia</input></td>
                      </tr>
                      <tr>
                        <td><b>- Perhitungan Penggunaan Uang Muka : <b></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td><center><b> Curr</b></center></td>
                        <td><b> Jumlah/<i>Amount</i></b></td>
                      </tr>
                      <tr>  
                        <td>Jumlah Biaya</td>
                        <td>:</td>
                        <td><center><p id="demo">  </p></td>
                        <!--<td><input type="text" name="label17a" class="form-control"></td>-->
                        <td><input type="text" class="form-control" name="label7" placeholder="Enter Text"></input><td>
                      </tr>
                        <td>Jumlah Uang Muka</td>
                        <td>:</td>
                        <td><center><p id="demo2">  </p></td>
                        <td><input type="text" class="form-control" name="label8" placeholder="Enter Text"></input> </td>     
                      <tr>
                        <td>Selisih Kurang/Lebih</td> 
                        <td>:</td>
                        <td><center><p id="demo3">  </p></td>
                        <!--<td><input type="text" name="label19a" class="form-control"></td>-->
                        <td><input type="text" class="form-control" name="label9" placeholder="Enter Text"></input></td>                               
                      </tr>                              
                      </tbody>
                    </table>
                  </div>  
                </div>    

                <div class="box">
                  <div class="box-header with-border">
                    <a class="btn btn-warning" href="Dashboard" role="button">Cancel</a>  
                    <button type="submit" class="btn btn-primary">Save</button>
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

function myFunction(){
  var x = document.getElementById("Select").value;

  document.getElementById("demo").innerHTML = x;
  document.getElementById("demo2").innerHTML = x;
  document.getElementById("demo3").innerHTML = x;
}

function hide() {
  var checkBox = document.getElementById("checked");
  var text = document.getElementById("show");
  if (checkBox.checked == false){
    text.style.display = "block";
  } else {
     text.style.display = "none";
  }
}

function showInput() {
  var checkBox = document.getElementById("lainnya");
  var text = document.getElementById("text1");
  var text2 = document.getElementById("text2");
  if (checkBox.checked == true){
    text.style.display = "block";
    text2.style.display = "block";
  } else {
     text.style.display = "none"; 
     text2.style.display = "none";

  }
}

function checkUangMuka() {
  // alert();
  // var checkBox1 = document.getElementById("checkrequest");
  // var checkBox2 = document.getElementById("checksettlement");
  document.getElementById("auto").checked = true;
  if (document.getElementById("checkrequest").checked == false){
    document.getElementById("auto").checked=false
  } 
}

function checkUangMuka2() {
  // alert();
  // var checkBox1 = document.getElementById("checkrequest");
  // var checkBox2 = document.getElementById("checksettlement");
  document.getElementById("auto").checked = true;
  if (document.getElementById("checksettlement").checked == false){
    document.getElementById("auto").checked=false
  } 
}
</script>

<script type="text/javascript">
  
  var rupiah = document.getElementById('rupiah');
  rupiah.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    rupiah.value = formatRupiah(this.value);
  });

  /* Fungsi formatRupiah */
  function formatRupiah(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    rupiah     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? + rupiah : '');
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