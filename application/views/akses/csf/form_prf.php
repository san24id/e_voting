<style>
td[rowspan="6"] {
  vertical-align: top;
  text-align: left;
}
</style>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- <section class="content-header">
          <h1>
          FORMULIR PERMINTAAN PEMBAYARAN <br> <i> PAYMENT REQUEST FORM (PRF)</i>
            <small></small>
          </h1>
        </section> -->
        <!-- Main content -->
        <?php foreach ($ppayment as $row){ ?>          
        <form id="form" method="post" action="Dashboard/addpay" onsubmit="tambah()">
          <input type="hidden" name="display_name" class="form-control" value="<?php echo $this->session->userdata('display_name') ?>">
          <input type="hidden" name="type" class="form-control" value="1"> 
          <input type="hidden" name="id_payment" class="form-control" value="<?php echo $row->id_payment;?>"> 
          <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <!-- /.box -->
                <div class="box">
                  <div class="box-header with-border">
                    
                    <table style="font-family: calibri;" width="100%">
                      <tbody>
                        <tr>
                        <td> </td>
                        <td <b><font size="+2" style="font-family: calibri;">FORMULIR PERMINTAAN PEMBAYARAN <br> <i> PAYMENT REQUEST FORM (PRF)</i></font></b>                                  
                        <td><img src="assets/dashboard/images/logo.png" alt="Logo Images"></td>
                        </tr>
                      </tbody>
                    </table>
                    
                    <br>

                    <table style="font-family: calibri;" width="100%">
                    <tbody>
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
                              $monthList = array(
                                    'Jan' => 'Jan',
                                    'Feb' => 'Feb',
                                    'Mar' => 'Mar',
                                    'Apr' => 'Apr',
                                    'May' => 'Mei',
                                    'Jun' => 'Jun',
                                    'Jul' => 'Jul',
                                    'Aug' => 'Ags',
                                    'Sep' => 'Sep',
                                    'Oct' => 'Okt',
                                    'Nov' => 'Nov',
                                    'Dec' => 'Des'                                    
                              );
                                $bulan_ing = date('M');  
                            ?>     
                        <tr>
                          <td><font size="+1" >Tanggal : </td>
                          <td><input type="text" name="tanggal" class="form-control" value="<?php echo $dayList[$hari_ing]; ?>, <?php echo date('d'); ?>-<?php echo $monthList[$bulan_ing]; ?>-<?php echo date('Y'); ?>" readonly> </td>
                          <td> &nbsp;</td>
                          <td><font size="+1" style="font-family: calibri;">PRF Doc. No : </font></td>
                          <td><input type="text" name="apf_doc" class="form-control" value="<?php echo $prf_doc; ?>"></td>
                        </tr>
                        <tr>
                          <td><font size="+1" style="font-family: calibri;">Direktorat/<br>Divisi Pemohon :<font></td>
                          <td><input type="text" name="division_id" class="form-control" value="<?php echo $row->division_id;?>"></td>
                          <td> &nbsp;</td>
                          <td><font size="+1" style="font-family: calibri;">SPPP Doc. No : </font></td>
                          <td><input type="text" name="nomor_surat" class="form-control" value="<?php echo $row->nomor_surat;?>" readonly>
                              <!-- <select class="form-control" name="nomor_surat">
                                <option>--- Choose ---</option>
                              <?php foreach ($surat1 as $got) {?>
                                <option value="<?php echo $got->number1; ?>"><?php echo $got->number1; ?></option>
                              <?php } ?>
                              </select> -->
                          </td>
                        </tr>
                        <tr>
                          <td><font size="+1" >PR Doc. No : </font></td>
                          <td><input type="text" name="pr_doc" class="form-control" value="PR - /PII/<?php echo date('m/y');?>"></td>
                          <td> &nbsp;</td>
                          <td><font size="+1" style="font-family: calibri;">Kode Proyek : <br> <i>Project Code</i><font></td>
                          <td><input type="text" name="kode_proyek" class="form-control" placeholder="Project Code"></td>
                        </tr>
                      </tbody>
                    </table>

                    <br>

                    <table border="1" style="font-family: calibri;" width="100%">
                      <thead>
                        <tr>
                          <th width="5%"><center>NO. <br> <i>No.</i></center></th>
                          <th height="50%" colspan="2"><center>Uraian atas tujuan penggunaan / <br><i>Description on the purpose</i></center></th>
                          <th width="5%"><center>Mata Uang / <br> <i>Original Currency</i></center></th>
                          <th width="25%"><center>Jumlah / <br><i>Amount</i></center></th>                       
                        </tr>
                      </thead>
                      <tbody>                      
                      <tr>
                          <td rowspan="9"><center> 1 </center></td>
                          <td colspan="2"><textarea type="text" class="form-control" name="description" required><?php echo $row->label1;?></textarea></td>                  
                          <td><select id="Select" class="form-control" onchange="myFunction()" name="currency">
                                <option value="<?php echo $row->currency; ?>"><?php echo $row->currency; ?> </option>
                                <option value="">--Choose--</option>
                                <?php foreach ($currency as $get) {?>
                                <option value="<?php echo $get->curr; ?>"><?php echo $get->curr; ?></option>
                                <?php } ?>
                              </select>
                          </td>
                          <td><input id="nilai" onchange="nominal()" type="text" class="form-control" name="jumlah" value="<?php echo $row->label2;?>" required></td>
                        </tr>
                        <tr>
                          <td colspan="2"><input type="text" class="form-control" name="description2" ></td>
                          <td> </td>
                          <td><input id="nilai1" onchange="nominal()" type="text" class="form-control" name="jumlah1" > </td>
                        </tr>

                        <tr>
                          <td colspan="2"><input type="text" class="form-control" name="description3" ></td>
                          <td><select id="Select1" onchange="myFunction1()" name="currency2">
                                <option value="<?php echo $row->currency2; ?>"> <?php echo $row->currency2; ?></option>
                                <option value="">--Choose--</option>
                                <?php foreach ($currency as $get) {?>
                                <option value="<?php echo $get->curr; ?>"><?php echo $get->curr; ?></option>
                                <?php } ?>
                              </select>
                          </td>
                          <td><input id="nilai2" onchange="nominal()" type="text" class="form-control" name="jumlah2" value="<?php echo $row->jumlah2;?>" ></td> 
                        </tr>
                        <tr>
                          <td colspan="2"><input type="text" class="form-control" name="description3" ></td>
                          <td>  </td>
                          <td><input id="nilai3" onchange="nominal()" type="text" class="form-control" name="jumlah3" > </td> 
                        </tr>
                        <tr>
                          <td colspan="2"><input type="text" class="form-control" name="description3" ></td>
                          <td>                         </td>
                          <td><input id="nilai4" onchange="nominal()" type="text" class="form-control" name="jumlah4"></td> 
                        </tr>
                        
                        <tr>
                          <td colspan="2"><input type="text" class="form-control" name="description3" ></td>
                          <td>     </td>
                          <td><input id="nilai5" onchange="nominal()" type="text" class="form-control" name="jumlah5">  </td> 
                        </tr>

                        <tr>
                          <td colspan="2"><input type="text" class="form-control" name="description3" ></td>
                          <td><select id="Select2" onchange="myFunction2()" name="currency3">
                            <option value="<?php echo $row->currency3; ?>"> <?php echo $row->currency3; ?></option>                              
                            <option value="">--Choose--</option>
                            <?php foreach ($currency as $get) {?>
                            <option value="<?php echo $get->curr; ?>"><?php echo $get->curr; ?></option>
                            <?php } ?>
                            </select>
                          </td>
                          <td><input id="nilai6" onchange="nominal()" type="text" class="form-control" name="jumlah6" value="<?php echo $row->jumlah3;?>" ></td> 
                        </tr>
                        <tr>
                          <td colspan="2"><input type="text" class="form-control" name="description3" ></td>
                          <td>       </td>
                          <td><input id="nilai7" onchange="nominal()" type="text" class="form-control" name="jumlah7" ></td> 
                        </tr>
                        <tr>
                          <td colspan="2"><input type="text" class="form-control" name="description3" ></td>
                          <td> </td>
                          <td><input id="nilai8" onchange="nominal()" type="text" class="form-control" name="jumlah8"></td> 
                        </tr>

                        <tr>
                          <td colspan="2" align="right"> Jumlah Pembayaran/<i>Total Payment</i> </td>
                          <td><center><p id="demo"> </p> <p id="demo1"> </p></center></td>
                          <td><input id="ulang" type="text" class="form-control" name="total_expenses">  </td>
                        </tr>
                        <tr> 
                          <td>Terbilang/ <i>Say :</i> </td>
                          <td colspan="4"><input type="text" name="terbilang" class="form-control" placeholder="Terbilang" required></td>
                        </tr>
                        <tr> 
                          <td>Dibayar Kepada/ <i>Paid To :</i> </td>
                          <td colspan="4"><input type="text" name="dibayar_kepada" class="form-control" value="<?php echo $row->penerima;?>" required></td>
                        </tr>
                      </tbody>
                    </table>
                    
                    <br>

                    <table border="1" style="font-family: calibri;" width="100%">
                      <tbody>
                      <tr> 
                        <td colspan="4" rowspan="2" width="50%">&nbsp; Verifikasi Oleh / <br>&nbsp;<i>Verified By : </i> </td>                           
                        <td rowspan="4">&nbsp; Catatan / :<br>&nbsp;<i>Remarks  </i><textarea type="text" class="form-control" name="catatan" placeholder="Remarks" required></textarea></td>
                      </tr>
                      <tr>
                      </tr>
                      <tr align="right">
                        <td width="5%"> </td>
                        <td width="20%">Tanggal &nbsp;</td>
                        <td colspan="2" rowspan="2"><input type="date" name="verified_date" class="form-control"></td>     
                      </tr>
                      <tr align="right">
                        <td width="5%"> </td>
                        <td width="20%"><i>Date </i> &nbsp;</td>
                      </tr>
                      </tbody>
                    </table>  
                    <table border="1" style="font-family: calibri;" width="50%">  
                      <tbody>
                        <tr>
                            <?php foreach ($divhead as $divhead) { ?>
                          <td>Nama /<i>Name : </i></td>
                          <td><input type="text" class="form-control" name="penanggung_jawab" value="<?php echo $divhead->display_name; ?>" required></td> 
                        </tr>
                        <tr>
                          <td>Jabatan /<i>Title : </i></td>
                          <td><input type="text" class="form-control" name="jabatan" value="SVP Corporate Strategy & Finance" required></td> 
                        </tr>
                            <?php }?>
                      </tbody>  
                    </table>    

                    <table border="1" style="font-family: calibri;" width="100%">
                      <tbody>
                        <tr>
                          <td colspan="6"><center><b>Persetujuan Pembayaran </b></center></td>
                        </tr>
                        <tr>
                          <td colspan="2"> <br> <br> <br> <br> <br> <br></td>
                          <td colspan="2"> <br> <br> <br> <br> <br> <br></td>
                          <td colspan="2"> <br> <br> <br> <br> <br> <br></td>
                        </tr>
                        <tr>
                          <td width="10%">Nama/ <i>Name</i> </td>
                          <td><input id="approval1" type="text" name="persetujuan_pembayaran1" class="form-control"> </td>
                          <td width="10%">Nama/ <i>Name</i> </td>
                          <td><input id="approval2" type="text" name="persetujuan_pembayaran2" class="form-control"> </td>
                          <td width="10%">Nama/ <i>Name</i> </td>
                          <td><input id="approval3" type="text" name="persetujuan_pembayaran3" class="form-control"> </td>
                        </tr>
                        <tr>
                          <td>Jabatan/ <i>Title</i> </td>
                          <td><input id="jabatan1" type="text" name="jabatan1" class="form-control"> </td>
                          <td>Jabatan/ <i>Title</i> </td>
                          <td><input id="jabatan2" type="text" name="jabatan2" class="form-control"> </td>
                          <td>Jabatan/ <i>Title</i> </td>
                          <td><input id="jabatan3" type="text" name="jabatan3" class="form-control"> </td>
                        </tr>  
                      </tbody>
                    </table>

                    <table border="1" style="font-family: calibri;" width="100%">
                      <tbody>
                        <tr>
                          <td colspan="4"><center><b>Diisi oleh Divisi Treasury <br> <i>For Treasury Use Only </i> </b></center></td>
                        </tr>
                        <tr><?php if ($row->akun_bank == 'Tunai') {$ceklis="checked"; 
                        }else{
                              $ceklis=" ";
                        } ?>
                          <td colspan="4"><font size="+1"> Metode Pembayaran : <input type="checkbox" <?php echo $ceklis;?> name="metode_pembayaran" value="Tunai" > Tunai </font></td>
                        </tr>
                        <tr>
                          <td width="26%" colspan="2"><center> <input type="checkbox" name="metode_pembayaran" value="Transfer" > Transfer Ke : </center></td>
                          <td><font size="+1"> Bank : 
                              &nbsp;<input type="text" name="bank" value="<?php echo $row->akun_bank;?>" > </font>
                          </td> 
                          <td><font size="+1"> No. Rek : 
                              &nbsp;<input type="text" name="no_rek" value="<?php echo $row->no_rekening;?>" > </font>
                          </td>                        
                        </tr>
                      </tbody>
                    </table>
                    
                    <table border="1" style="font-family: calibri;" width="100%">
                      <tbody>
                        <tr>
                          <td colspan="4" width="30%">Verifikasi Perintah Bayar oleh/<br><i>Payment Instruction Verified by : </i></td>
                          <td colspan="4" width="30%">Pelaksanaan Pembayaran oleh/<br><i>Payment Execution by : </i></td>
                          <td colspan="4" rowspan="6">Catatan : <br><i>Remarks :</i> <textarea type="text" class="form-control" rows="3" name="label2" placeholder="Remarks"></textarea></td>                          
                        </tr>
                        <tr>
                          <td colspan="4"><br><br><br><br> </td>
                          <td colspan="4"><br><br><br><br> </td>
                        </tr>
                        <tr>
                          <td colspan="2"> </td>
                          <td> Tanggal <br><i>Date</i></td>
                          <td width="15%"> </td>
                          <td colspan="2"> </td>
                          <td> Tanggal <br><i>Date</i></td>
                          <td width="15%"> </td>
                        </tr>
                        <tr>
                          <td colspan="2" width="10%">Nama/ <i>Name</i> </td>
                          <td colspan="2">&nbsp; Fitri Dwi Arianawati </td>
                          <td colspan="2" width="10%">Nama/ <i>Name</i> </td>
                          <td colspan="2">&nbsp; Dian Puspitasari </td>        
                        </tr>
                        <tr>
                          <td colspan="2" width="10%">Jabatan/ <i>Title</i> </td>
                          <td colspan="2">&nbsp; VP Treasury </td>
                          <td colspan="2" width="10%">Jabatan/ <i>Title</i> </td>
                          <td colspan="2">&nbsp; Cashier </td>
                        </tr>                      
                      </tbody> 
                    </table>

                    <br>

                    <table border="1" style="font-family: calibri;" width="100%">
                      <tbody>
                        <tr>
                          <td colspan="2">Diterima Oleh/ : <br> <i>Received by :</i></td>
                        </tr>
                        <tr>
                          <td ">Nama/ <i>Name</i> </td>
                        <td> </td>		
                        </tr>
                        <tr>
                          <td width="10%">Tanggal/ <i>Date</i> </td>
                          <td> </td>	
                        </tr>
                      </tbody>
                    </table>

                    <img align="right" src="assets/dashboard/images/footer_form.png" alt="Logo Images">

                    <p align="justify">Apa kamu yakin akan mengirimkan Form APF ini :  <?=$row->nomor_surat?></p>
                    <label>Kepada CSF Reviewer?</label>            
                    <input type="hidden" name="handled_by" value="i.akmal">                       

                    <!-- <select name="handled_by">
                        <option>--- Choose ---</option>
                    <?php foreach ($csf as $get) {?>
                        <option value="<?php echo $get->username; ?>"><?php echo $get->username; ?></option>
                    <?php } ?>
                    </select>             -->
                  </div>  
                </div>
                     

                <div class="box">
                  <div class="box-header with-border">
                    <a class="btn btn-warning" href="Dashboard/my_task" role="button">Cancel</a>  
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>                                                 
            </div>
          </section>    

        </form>
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
}

function myFunction1(){
  var x = document.getElementById("Select1").value;

  document.getElementById("demo1").innerHTML = x;
}

function myFunction2(){
  var x = document.getElementById("Select2").value;

  document.getElementById("demo2").innerHTML = x;
}

function nominal(){
  var x = document.getElementById("nilai").value;
  // alert(x);
  var b = document.getElementById("nilai1").value;
  // alert(b);
  var c = document.getElementById("nilai2").value;
  // alert(c);
  var d = document.getElementById("nilai3").value;
  // alert(d);
  var e = document.getElementById("nilai4").value;
  // alert(e);
  var f = document.getElementById("nilai5").value;
  // alert(f);
  var g = document.getElementById("nilai6").value;
  // alert(g);
  var h = document.getElementById("nilai7").value;
  // alert(h);
  var i = document.getElementById("nilai8").value;
  // alert(i);

  var get_x = x.replace(/\./g,'');
  // alert(get_x);
  var get_b = b.replace(/\./g,'');
  var get_c = c.replace(/\./g,'');
  var get_d = d.replace(/\./g,'');
  var get_e = e.replace(/\./g,'');
  var get_f = f.replace(/\./g,'');
  var get_g = g.replace(/\./g,'');
  var get_h = h.replace(/\./g,'');
  var get_i = i.replace(/\./g,'');

  var sum_x = Number(get_x) + 0 ;
  var sum_b = Number(get_b) + 0 ;
  // alert(sum_b);
  var sum_c = Number(get_c) + 0 ;
  var sum_d = Number(get_d) + 0 ;
  var sum_e = Number(get_e) + 0 ;
  var sum_f = Number(get_f) + 0 ;
  var sum_g = Number(get_g) + 0 ;
  var sum_h = Number(get_h) + 0 ;
  var sum_i = Number(get_i) + 0 ;

  var hasil = sum_x+sum_b+sum_c+sum_d+sum_e+sum_f+sum_g+sum_h+sum_i;
  // alert(b)
  // if(x && b && c){
    document.getElementById("ulang").value = hasil ;
  // }  

  var a = hasil ;
  if (a <= 100000000){
    document.getElementById("approval1").value = "Donny Hamdani";
    document.getElementById("jabatan1").value = "Deputi Direktur Keuangan";
  }
  if (a >= 100000000 && a <= 500000000) {
    document.getElementById("approval1").value = "Donny Hamdani";
    document.getElementById("jabatan1").value = "Deputi Direktur Keuangan";
    
    document.getElementById("approval2").value = "Salusra Satria";
    document.getElementById("jabatan2").value = "Direktur Eksekutif Keuangan & Penilaian Proyek / CFO";
  }
  if (a >= 500000000) {
    document.getElementById("approval1").value = "Salusra Satria";
    document.getElementById("jabatan1").value = "Direktur Eksekutif Keuangan & Penilaian Proyek / CFO";
    
    document.getElementById("approval2").value = "Andre Permana";
    document.getElementById("jabatan2").value = "Direktur Eksekutif Bisnis / COO"; 

    document.getElementById("approval3").value = "M. Wahid Sutopo";
    document.getElementById("jabatan3").value = "Direktur Utama / CEO";  
  }  
}

 // Format Separator Id Nilai 
 var nilai = document.getElementById('nilai');
  nilai.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai() untuk mengubah angka yang di ketik menjadi format angka
    nilai.value = formatnilai(this.value);
  });

  /* Fungsi formatnilai */
  function formatnilai(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    nilai     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      nilai += separator + ribuan.join('.');
    }

    nilai = split[1] != undefined ? nilai + ',' + split[1] : nilai;
    return prefix == undefined ? nilai : (nilai ? + nilai : '');
  }

  // Format Separator Id Nilai 1
  var nilai1 = document.getElementById('nilai1');
  nilai1.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai1() untuk mengubah angka yang di ketik menjadi format angka
    nilai1.value = formatnilai1(this.value);
  });

  /* Fungsi formatnilai1 */
  function formatnilai1(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    nilai1     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      nilai1 += separator + ribuan.join('.');
    }

    nilai1 = split[1] != undefined ? nilai1 + ',' + split[1] : nilai1;
    return prefix == undefined ? nilai1 : (nilai1 ? + nilai1 : '');
  }

  // Format Separator Id Nilai 2
  var nilai2 = document.getElementById('nilai2');
  nilai2.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai2() untuk mengubah angka yang di ketik menjadi format angka
    nilai2.value = formatnilai2(this.value);
  });

  /* Fungsi formatnilai2 */
  function formatnilai2(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    nilai2     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      nilai2 += separator + ribuan.join('.');
    }

    nilai2 = split[1] != undefined ? nilai2 + ',' + split[1] : nilai2;
    return prefix == undefined ? nilai2 : (nilai2 ? + nilai2 : '');
  }

  var nilai3 = document.getElementById('nilai3');
  nilai3.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai3() untuk mengubah angka yang di ketik menjadi format angka
    nilai3.value = formatnilai3(this.value);
  });

  /* Fungsi formatnilai3 */
  function formatnilai3(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    nilai3     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      nilai3 += separator + ribuan.join('.');
    }

    nilai3 = split[1] != undefined ? nilai3 + ',' + split[1] : nilai3;
    return prefix == undefined ? nilai3 : (nilai3 ? + nilai3 : '');
  }

  var nilai4 = document.getElementById('nilai4');
  nilai4.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai4() untuk mengubah angka yang di ketik menjadi format angka
    nilai4.value = formatnilai4(this.value);
  });

  /* Fungsi formatnilai4 */
  function formatnilai4(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    nilai4     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      nilai4 += separator + ribuan.join('.');
    }

    nilai4 = split[1] != undefined ? nilai4 + ',' + split[1] : nilai4;
    return prefix == undefined ? nilai4 : (nilai4 ? + nilai4 : '');
  }

  var nilai5 = document.getElementById('nilai5');
  nilai5.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai5() untuk mengubah angka yang di ketik menjadi format angka
    nilai5.value = formatnilai5(this.value);
  });

  /* Fungsi formatnilai5 */
  function formatnilai5(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    nilai5     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      nilai5 += separator + ribuan.join('.');
    }

    nilai5 = split[1] != undefined ? nilai5 + ',' + split[1] : nilai5;
    return prefix == undefined ? nilai5 : (nilai5 ? + nilai5 : '');
  }

  var nilai6 = document.getElementById('nilai6');
  nilai6.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai6() untuk mengubah angka yang di ketik menjadi format angka
    nilai6.value = formatnilai6(this.value);
  });

  /* Fungsi formatnilai6 */
  function formatnilai6(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    nilai6     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      nilai6 += separator + ribuan.join('.');
    }

    nilai6 = split[1] != undefined ? nilai6 + ',' + split[1] : nilai6;
    return prefix == undefined ? nilai6 : (nilai6 ? + nilai6 : '');
  }

  var nilai7 = document.getElementById('nilai7');
  nilai7.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai7() untuk mengubah angka yang di ketik menjadi format angka
    nilai7.value = formatnilai7(this.value);
  });

  /* Fungsi formatnilai7 */
  function formatnilai7(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    nilai7     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      nilai7 += separator + ribuan.join('.');
    }

    nilai7 = split[1] != undefined ? nilai7 + ',' + split[1] : nilai7;
    return prefix == undefined ? nilai7 : (nilai7 ? + nilai7 : '');
  }

  var nilai8 = document.getElementById('nilai8');
  nilai8.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai8() untuk mengubah angka yang di ketik menjadi format angka
    nilai8.value = formatnilai8(this.value);
  });

  /* Fungsi formatnilai8 */
  function formatnilai8(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    nilai8     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      nilai8 += separator + ribuan.join('.');
    }

    nilai8 = split[1] != undefined ? nilai8 + ',' + split[1] : nilai8;
    return prefix == undefined ? nilai8 : (nilai8 ? + nilai8 : '');
  }

  // Format Separator Id Ulang (Jumlah Pembayaran)
  var ulang = document.getElementById('ulang');
  ulang.addEventListener('mousemove', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatulang() untuk mengubah angka yang di ketik menjadi format angka
    ulang.value = formatulang(this.value);
  });

  /* Fungsi formatulang */
  function formatulang(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    ulang     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      ulang += separator + ribuan.join('.');
    }

    ulang = split[1] != undefined ? ulang + ',' + split[1] : ulang;
    return prefix == undefined ? ulang : (ulang ? + ulang : '');
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