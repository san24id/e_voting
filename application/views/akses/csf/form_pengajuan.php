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
                    <table style="font-family: calibri;" width="100%">
                      <tbody>
                        <tr>                       
                        <td align="center" width="50%"><b><font size="3" style="font-family: calibri;">No   : <?php echo $surat; ?></b></td>
                            <input type="hidden" name="nomor_surat" class="form-control" value="<?php echo $surat; ?>">                            
                        <!-- <td width="50%"><center><b>No ARF/ASF   :</b></center></td> -->
                        </tr>
                      </tbody>
                    </table>
                    <!-- <table style="font-family: calibri;" width="100%">
                      <tbody>     
                        <tr>
                        
                        <td align="center" width="50%"><b><i><font size="2" style="font-family: calibri;">(dilengkapi oleh Pemohon)</b></td>
                        <td width="50%"><center><b><i><font size="2" style="font-family: calibri;">(dilengkapi oleh CSF, coret salah satu)</b></center></td>
                        </tr>
                      </tbody>
                    </table> -->

                    <br>

                    <table style="font-family: calibri;" width="100%">
                      <tr>
                        <td><b>Jenis Pembayaran (pilih salah satu):</b></td>
                        <td>
                          <input id="auto" type="checkbox" > <b>Uang Muka/Advance</b><br>
                        </td>
                        <td>
                          <input id="checked" onclick="hide()" type="checkbox" name="jenis_pembayaran[]" value="4"> Non-Uang Muka/Non-Advance</input><br>
                        </td>
                        <td>
                          <input id="checked2" onclick="hide2()" type="checkbox" name="jenis_pembayaran[]" value="5"> Cash Received</input><br>
                        </td>
                        </tr>  
                        <tr>
                          <td></td>
                          <td>
                            <input id="checkrequest" onclick="checkUangMuka()" type="checkbox" name="jenis_pembayaran[]" value="2"> Permintaan Uang Muka/Request</input><br>
                          </td>
                          <td>
                            <input id="checkcreditcard"  type="checkbox" name="jenis_pembayaran[]" value="6"> Credit Card Corprate</input><br>
                          </td>
                        </tr>  
                        <tr>
                        <td></td>
                        <td>
                          <input id="checksettlement" onclick="checkUangMuka2()" type="checkbox" name="jenis_pembayaran[]" value="3"> Pertanggung Jawaban Uang Muka/Settlement</input><br>                            
                        </td>
                      </tr>                       
                    </table>

                    <br>

                    <table style="font-family: calibri;" width="100%">
                      <?php
                        $dayList = array(
                              'Sun' => 'Minggu',
                              'Mon' => 'Senin',
                              'Tue' => 'Selasa',
                              'Wed' => 'Rabu',
                              'Thu' => 'Kamis',
                              'Fri' => 'Jumat',
                              'Sat' => 'Sabtu'
                          );
                          $hari_ing = date('D');
                          // echo date("D");
                      ?>              
                      <tbody>                            
                      <tr>
                      <td>Kepada : Divisi CSF</td>
                      <td align="center">Tanggal : <?php echo $dayList[$hari_ing]; ?>, <?php echo date('d-M-Y'); ?></td>
                        <input type="hidden" name="tanggal" class="form-control" value="<?php echo $dayList[$hari_ing]; ?>, <?php echo date('d-M-Y'); ?>">
                        <input type="hidden" name="tanggal2" value="<?php echo date('Y-m-d');?>">
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

                    <table style="font-family: calibri;" width="100%">
                      <tbody>
                      <p>Mohon dapat dilakukan proses pembayaran / pengembalian uang dengan perincian sebagai berikut : </p>
                      <tr>
                        <td width="36%"><b>- Tujuan Penggunaan </b></td>
                        <td><b> : </b></td>
                        <!--<td>-->
                        <td colspan="8"><textarea type="text" class="form-control" rows="5" name="label1" placeholder="Tujuan Penggunaan" required></textarea></td>
                        
                      </tr>
                      <tr>
                        <td><b>- Jumlah </b></td>
                        <td><b> : </b></td>
                        <td><select id="Select" onchange="myFunction()" name="currency" class="form-control">
                                      <option value="">--Choose--</option>
                                      <?php foreach ($currency as $get) {?>
                                  <option value="<?php echo $get->currency; ?>"><?php echo $get->currency; ?></option>
                                <?php } ?>
                              </select>
                          </td>
                        <td colspan="2"><input type="text" id="rupiah" class="form-control" name="label2" placeholder="Jumlah" required> </td>

                        <td><select name="currency2" class="form-control">
                                      <option value="">--Choose--</option>
                                      <?php foreach ($currency as $get) {?>
                                      <option value="<?php echo $get->currency; ?>"><?php echo $get->currency; ?></option>

                                <?php } ?>
                              </select>
                          </td>
                        <td colspan="2"><input type="text" id="rupiah2" class="form-control" name="jumlah2" placeholder="Jumlah" > </td>

                        <td><select name="currency3" class="form-control">
                                      <option value="">--Choose--</option>
                                      <?php foreach ($currency as $get) {?>
                                      <option value="<?php echo $get->currency; ?>"><?php echo $get->currency; ?></option>

                                <?php } ?>
                              </select>
                          </td>
                        <td colspan="2"><input type="text" id="rupiah3" class="form-control" name="jumlah3" placeholder="Jumlah" > </td>
                      </tr>
                      </tbody>
                    </table>
                    
                    <table id="choose" style="font-family: calibri;" width="100%">
                      <tbody>
                      <tr>
                        <td width="36%"><b>- Perkiraan Tanggal Selesai Pekerjaan/Terima Barang</b>
                        	<br>
                        <i>(Hanya diisi untuk jenis pembayaran <i><b>Permintaan Uang Muka/Request)</i></td>
                        <td align="right"><b> : </b></td>
                        <td colspan="8" width="65%"><input type="date" class="form-control" name="label3"></input></td>     
                      </tr>
                                                  
                      </tbody>
                    </table>

                    <br>

                    <table style="font-family: calibri;" width="100%">
                      <tbody>
                      <b><p>- Penyedia Barang / Jasa Penerima Pembayaran</p></b> 
                      <tr>
                        <td width="33%">Nama</td>
                        <td align="right"><b>:</b></td>
                        <td colspan="4"><select id="penerima" onchange="fung()" class="form-control" name="penerima">
                                            <option value="">--Choose--</option>
                                            <?php foreach ($data_vendor as $nama){?> 
                                              <option value="<?php echo $nama->kode_vendor;?>"><?php echo $nama->nama;?> &nbsp; - <?php echo $nama->kode_vendor;?></option>
                                            <?php } ?>
                                        </select>
                        </td>
                      </tr>
                      <tr>  
                        <td>Kode Vendor</td>
                        <td align="right"><b>:</b></td>
                        <td><input id="kode_vendor" type="text" class="form-control" name="vendor" placeholder="Enter Text"></td>
                        <td>Bank</td>
                        <td>:</td>
                        <td><select id="dropdown" name="akun_bank" class="form-control">
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
                        <td><input id="textInput" type="text" class="form-control" name="no_rekening" placeholder="Enter Text"></td>                                
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
                        </td>
                        <td>
                          <input type="checkbox" name="label4[]" value="Copy PO/SPK"> Copy PO/SPK</input><br>
                        </td> 
                      </tr> 

                      <tr>
                        <td>
                          <input type="checkbox" name="label4[]" value="Berita Acara Pemeriksaan (BAP)"> Berita Acara Pemeriksaan (BAP)</input><br>
                        </td>
                        <td>
                          <input type="checkbox" name="label4[]" value="Copy Kontrak/Perjanjian"> Copy Kontrak/Perjanjian</input><br>
                        </td>
                      </tr>

                      <tr>
                      	<td>
                      	  <input type="checkbox" name="label4[]" value="Berita Acara Pemeriksaan (BAST)"> Berita Acara Pemeriksaan (BAST)</input><br> 	
                      	</td>
                      	<td>
                      	  <input type="checkbox" name="label4[]" value="Faktur Pajak Rangkap 2"> Faktur Pajak Rangkap 2</input><br>
                      	</td>
                      </tr> 

                      <tr>
                      	<td>
                      	  <input type="checkbox" name="label4[]" value="Bukti Penerimaan Jasa/Barang (Delivery Order)"> Bukti Penerimaan Jasa/Barang (Delivery Order)</input><br>
                      	</td>
                      	<td>
                      	  <input type="checkbox" name="label4[]" value="Form DGT-1 & COD (Jika kode vendor tidak tersedia)"> Form DGT-1 & COD (Jika kode vendor tidak tersedia)</input><br>
                      	</td>
                      </tr>

                      <tr>
                      	<td>
                      	  <input type="checkbox" name="label4[]" value="Copy Dokumen Permintaan Barang/Jasa terkait (PR/Memo)"> Copy Dokumen Permintaan Barang/Jasa terkait (PR/Memo)</input><br>
                      	</td>
                      	<td>
                      	  <input type="checkbox" name="label4[]" value="NPWP"> NPWP (Jika kode vendor tidak tersedia)</input><br>
                      	</td>
                      </tr>

                      <tr>
                      	<td></td>
                      	<td>
                      	  <input id="lainnya" onclick="showInput()" type="checkbox" name="label4[]" value="Lainnya (Jika ada) : Rincian Pengeluaran"> Lainnya (Jika ada) :
                          <textarea id="text1" type="text" class="form-control" name="lainnya1" placeholder="Enter Text" style="display:none" ></textarea><br>
                      	</td>
                      </tr>
                              
                    </table>

                    <br>

                    <table id="show" style="font-family: calibri;" width="70%">
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
                        <td><input id="biaya" onchange="penjumlahan()" type="text" class="form-control" name="label7" placeholder="Enter Text"></input><td>
                      </tr>
                        <td>Jumlah Uang Muka</td>
                        <td>:</td>
                        <td><center><p id="demo2">  </p></td>
                        <td><input id="uangmuka" onchange="penjumlahan()" type="text" class="form-control" name="label8" placeholder="Enter Text"></input> </td>     
                      <tr>
                        <td>Selisih Kurang/Lebih</td> 
                        <td>:</td>
                        <td><center><p id="demo3">  </p></td>
                        <!--<td><input type="text" name="label19a" class="form-control"></td>-->
                        <td><input type="text" id="hasil" class="form-control" name="label9" placeholder="Enter Text"></input></td>                               
                      </tr>                              
                      </tbody>
                    </table>
                  </div>  
                </div>    

                <div class="box">
                  <div class="box-header with-border">
                    <a class="btn btn-warning" href="Dashboard" role="button">Cancel</a>  
                    <button type="submit" class="btn btn-primary third">Save</button>
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
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> 

<script>

function penjumlahan(){
  var a = document.getElementById("biaya").value;
  var b = document.getElementById("uangmuka").value;
  // var c = document.getElementById("hasil").value;
  var reva = a.replace(/\./g,'');
  var revb = b.replace(/\./g,'');
  // var revc = c.replace(".","");
  // alert(reva);
  var hasil = parseInt(reva)-parseInt(revb);
  // var aa = parseInt(rev).value;
  // var b = parseInt(document.getElementById("uangmuka").value);

  // if(reva && revb){
    document.getElementById("hasil").value = ''+hasil+''; 
  // }
}

function fung(){
  // alert();  
  var data = document.getElementById("penerima").value;
  
  document.getElementById("kode_vendor").value = data;
}

document.querySelector(".third").addEventListener('click', function(){
  swal("Data Successfully to Save!");
  function tambah() {
  location.reload(true);
        tr.hide();
  }
  
});

// function tambah() {
//   alert("Data Successfully to Save!");
// }

function myFunction(){
  var x = document.getElementById("Select").value;

  document.getElementById("demo").innerHTML = x;
  document.getElementById("demo2").innerHTML = x;
  document.getElementById("demo3").innerHTML = x;
}

function hide() {
  var checkBox = document.getElementById("checked");
  var checkBox1 = document.getElementById("auto").disabled = true;
  var checkBox2 = document.getElementById("checked2").disabled = true;
  var checkBox3 = document.getElementById("checksettlement").disabled = true;
  var checkBox4 = document.getElementById("checkrequest").disabled = true;
  var text2 = document.getElementById("choose");
  var text1 = document.getElementById("show");

  if (checkBox.checked == false && checkBox2.checked == false ){
    text1.style.display = "block";
    text2.style.display = "block";
  } else {
     text1.style.display = "none";
     text2.style.display = "none";
  }
  document.getElementById("checkcreditcard").checked = false;
}

function hide2() {
  var checkBox = document.getElementById("checked").disabled = true;
  var checkBox1 = document.getElementById("auto").disabled = true;
  var checkBox2 = document.getElementById("checked2");
  var checkBox3 = document.getElementById("checksettlement").disabled = true;
  var checkBox4 = document.getElementById("checkrequest").disabled = true;
  var text1 = document.getElementById("show");
  var text2 = document.getElementById("choose");

  if (checkBox.checked == false && checkBox2.checked == false ){
    text1.style.display = "block";
    text2.style.display = "block";
  } else {
     text1.style.display = "none";
     text2.style.display = "none";
  }

}

function checkUangMuka() {
  // alert();
  var checkBox1 = document.getElementById("checked").disabled = true;
  var checkBox2 = document.getElementById("checked2").disabled = true;
  var checkBox3 = document.getElementById("checksettlement").disabled = true;
  var text = document.getElementById("show");

  document.getElementById("auto").checked = true;
  if (document.getElementById("checkrequest").checked == false){
    document.getElementById("auto").checked=false
    text.style.display = "block";
  } else {
     text.style.display = "none";
  } 
  // alert(checkrequest);
}

function checkCreditCard() {

  if($("#checkcreditcard").is(':checked')){
    $('#auto').prop('checked', false);
    $('#checkrequest').prop('checked', false);
    $('#checksettlement').prop('checked', false);
    $('#checked').prop('checked', true);
    $('#checked2').prop('checked', false);
  }else{
    $('#auto').prop('checked', false);
    $('#checkrequest').prop('checked', false);
    $('#checksettlement').prop('checked', false);
    $('#checked').prop('checked', false);
    $('#checked2').prop('checked', false);
  }
}


function checkUangMuka2() {
  // alert();
  var checkBox1 = document.getElementById("checked").disabled = true;
  var checkBox2 = document.getElementById("checked2").disabled = true;
  var checkBox3 = document.getElementById("checkrequest").disabled = true;
  var text2 = document.getElementById("choose");
  document.getElementById("auto").checked = true;
  if (document.getElementById("checksettlement").checked == false){
    document.getElementById("auto").checked=false
    text2.style.display = "block";
  } else {
    text2.style.display = "none";
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

  var rupiah2 = document.getElementById('rupiah2');
  rupiah2.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    rupiah2.value = formatRupiah2(this.value);
  });

  /* Fungsi formatRupiah */
  function formatRupiah2(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    rupiah2     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      rupiah2 += separator + ribuan.join('.');
    }

    rupiah2 = split[1] != undefined ? rupiah2 + ',' + split[1] : rupiah2;
    return prefix == undefined ? rupiah2 : (rupiah2 ? + rupiah2 : '');
  }

  var rupiah3 = document.getElementById('rupiah3');
  rupiah3.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    rupiah3.value = formatRupiah3(this.value);
  });

  /* Fungsi formatRupiah */
  function formatRupiah3(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    rupiah3     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      rupiah3 += separator + ribuan.join('.');
    }

    rupiah3 = split[1] != undefined ? rupiah3 + ',' + split[1] : rupiah3;
    return prefix == undefined ? rupiah3 : (rupiah3? + rupiah3 : '');
  }

  var biaya = document.getElementById('biaya');
  biaya.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    biaya.value = formatbiaya(this.value);
  });

  /* Fungsi formatRupiah */
  function formatbiaya(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    biaya     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      biaya += separator + ribuan.join('.');
    }

    biaya = split[1] != undefined ? biaya + ',' + split[1] : biaya;
    return prefix == undefined ? biaya : (biaya? + biaya : '');
  }

  var uangmuka = document.getElementById('uangmuka');
  uangmuka.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    uangmuka.value = formatuangmuka(this.value);
  });

  /* Fungsi formatRupiah */
  function formatuangmuka(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    uangmuka     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      uangmuka += separator + ribuan.join('.');
    }

    uangmuka = split[1] != undefined ? uangmuka + ',' + split[1] : uangmuka;
    return prefix == undefined ? uangmuka : (uangmuka? + uangmuka : '');
  }

  // var hasil = document.getElementById('hasil');
  // hasil.addEventListener('mousemove', function(e){
  //   // tambahkan 'Rp.' pada saat form di ketik
  //   // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
  //   hasil.value = formathasil(this.value);
  // });

  // /* Fungsi formatRupiah */
  // function formathasil(angka, prefix){
  //   var number_string = angka.replace(/[^,\d]/g, '').toString(),
  //   split   		= number_string.split(','),
  //   sisa     		= split[0].length % 3,
  //   hasil     		= split[0].substr(0, sisa),
  //   ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

  //   // tambahkan titik jika yang di input sudah menjadi angka ribuan
  //   if(ribuan){
  //     separator = sisa ? '.' : '';
  //     hasil += separator + ribuan.join('.');
  //   }

  //   hasil = split[1] != undefined ? hasil + ',' + split[1] : hasil;
  //   return prefix == undefined ? '-'+hasil+'' : (hasil? + hasil : '');
  // }

  $(document).ready(function() { 
    $('#dropdown').change(function() {
      if( $(this).val() == 'Tunai') {
            $('#textInput').prop( "disabled", true );
      } else {       
        $('#textInput').prop( "disabled", false );
      }
    });
  });

  $("#checkcreditcard").on( "click", function() {
    if($("#checkcreditcard").is(':checked')){
      $('#auto').prop('checked', false);
      $('#checkrequest').prop('checked', false);
      $('#checksettlement').prop('checked', false);
      $('#checked').prop('checked', true);
      $('#checked2').prop('checked', false);
      $('#show').hide();
      $('#choose').hide();
    }else{
      $('#auto').prop('checked', false);
      $('#checkrequest').prop('checked', false);
      $('#checksettlement').prop('checked', false);
      $('#checked').prop('checked', false);
      $('#checked2').prop('checked', false);
      $('#show').show();
      $('#choose').show();
    }
});

  // $(document).ready(function() { 
  //   $('#penerima').change(function() {
  //         $('#kode_vendor').val() = $(this).val());
  //     alert(kode_vendor);
  //   });

  // });
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
