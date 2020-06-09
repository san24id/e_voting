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
        <form id="form" method="post" action="Dashboard/procees_tax" onsubmit="tambah()">  
        <?php foreach ($ppayment as $row) { ?>
          <input type="hidden" name="id_payment" value="<?php echo $row->id_payment; ?>" >
          <input type="hidden" name="nomor_surat" value="<?php echo $row->nomor_surat; ?>" >
          <input type="hidden" name="status" >
           
          <section class="content">
            <div class="row">
              <div class="col-md-12">
                <!-- /.box -->
                <div class="box">
                  <div class="box-header with-border">
                    <h5>
                      <br>
                      <left><img src="assets/dashboard/images/logo.png" alt="Logo Images"></left>
                      <br>
                      <center><b><u><font size="+2" style="font-family: calibri;">FORM VERIFIKASI PAJAK</font></u></b></center>
                    </h5>
                    
                    <!-- <table style="font-family: calibri;" width="100%">
                      <tbody>     
                        <tr>
                        
                        <td align="center" width="50%"><b><i><font size="2" style="font-family: calibri;">(dilengkapi oleh Pemohon)</b></td>
                        <td width="50%"><center><b><i><font size="2" style="font-family: calibri;">(dilengkapi oleh CSF, coret salah satu)</b></center></td>
                        </tr>
                      </tbody>
                    </table> -->

                    <br>

                    <table style="font-family: calibri;" width="70%">
                      <tr>
                        <td><b>Deductible Expense?</b></td>
                        <td>
                          <input type="checkbox" name="de" value="1" checked> Ya<br>
                        </td>
                        <td>
                          <input type="checkbox" name="de" value="0"> Tidak</input><br>
                        </td>
                        </tr>  
                        <tr>
                          <td></td>
                          <td></td>
                          <td>
                            &nbsp; &nbsp; <input type="checkbox" name="opsional[]" value="1"> NDE</input><br>
                          </td>
                        </tr>  
                        <tr>
                        <td></td>
                        <td></td>
                        <td>
                          &nbsp; &nbsp; <input type="checkbox" name="opsional[]" value="2"> NDE50</input><br>                            
                        </td>
                        </tr> 
                        <tr>
                        <td></td>
                        <td></td>
                        <td width="8%">
                          &nbsp; &nbsp; <input type="checkbox" name="opsional[]" value="3"> PARTNDE</input><br>                            
                        </td>
                        <td width="2%"><font size="3">Rp</font></td>
                        <td><input type="text" class="form-control" name="nilai" placeholder="Enter Text" ></td>
                        </tr>
                    </table>
                    <table width=70%>   
                      <tr>
                        <td><b>Objek Pajak</b></td>
                        <td><input id="ya" onclick="showed()" type="checkbox" name="objek_pajak[]" value="1"> Ya </td>
                        <td> <input id="tidak" onclick="showed()" type="checkbox" name="objek_pajak[]" value=0"> Tidak</input> </td>
                        <td><input type="checkbox" name="objek_pajak[]" value="2" > Internal</input> </td>
                        <td><input type="checkbox" name="objek_pajak[]" value="3" > Tax-Settlement</input> </td>
                      </tr>                        
                    </table>
                    
                    <br>
                    
                    <hr style=" border: 1px solid #000;">
                    
                    <br>
              
                  <div class="box">
                    <table id="show" class="table table-bordered table-striped" width="100%">
                      <thead>
                        <tr>
                          <th width="9%">Jenis Pajak</th>
                          <th width="8%">Kode Pajak</th>
                          <th width="9%">Kode MAP</th>
                          <th width="10%">Nama</th>
                          <th width="10%">NPWP/ID</th>
                          <th width="10%">Alamat</th>
                          <th>Tarif</th>
                          <th width="3%">Fasilitas Pajak</th>
                          <th>Special Tarif</th>
                          <th>Gross Up</th>
                          <th>DPP</th>
                          <th>DPP <br>(Gross Up)</th>
                          <th>Pajak Terutang</th>
                          <th>Masa Pajak PPN</th>
                          <th>Keterangan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><select id="jenis_pajak" name="jenis_pajak[]" class="form-control">
                                <option value="">Choose</option>
                                <?php foreach ($jenispajak as $get) {?>
                                  <option value="<?php echo $get->jenis_pajak; ?>"><?php echo $get->jenis_pajak; ?></option>
                                <?php } ?>
                            </select>
                          </td>
                          <td><select id="kode_pajak" name="kode_pajak[]" class="form-control">
                                <option value="">Choose</option>
                                <?php foreach ($kodePajak as $kode) {?>
                                  <option value="<?php echo $kode->kode_objek_pajak; ?>"><?php echo $kode->kode_objek_pajak; ?></option>
                                <?php } ?>
                            </select>
                          </td>
                          <td><select id="dropdown2" name="kode_map[]" class="form-control">
                                <option value="">Choose</option>
                                <?php foreach ($kodeMap as $map) {?>
                                  <option value="<?php echo $map->kode_map; ?>"><?php echo $map->kode_map; ?></option>
                                <?php } ?>
                            </select>
                          </td>
                          <td><textarea type="text" class="form-control" name="nama[]"></textarea></td>
                          <td><textarea type="text" class="form-control" name="npwp[]"></textarea></td>
                          <td><textarea type="text" class="form-control" name="alamat[]" placeholder="Enter Text" required></textarea></td>
                          <td><input id="tarif" class="form-control" name="tarif[]" onchange="penjumlahan()" type="text"></td>
                          <td><input type="checkbox" name="fas_pajak[]" value="Ya"></td>
                          <td><input type="text" class="form-control" name="special_tarif[]" placeholder="Enter Text" ></td>
                          <td><input type="checkbox" name="gross[]" value="Ya"></td>
                          <td><input id="dpp" onchange="penjumlahan()" type="text" class="form-control" name="dpp[]" placeholder="Enter Text" required></td>
                          <td><input type="text" class="form-control" name="dpp_gross[]" placeholder="Enter Text" ></td>
                          <td><input id="hasil" type="text" class="form-control" name="pajak_terutang[]" placeholder="Enter Text" required></td>
                          <td><input type="text" class="form-control" name="masa_pajak[]" placeholder="Enter Text" ></td>
                          <td><textarea type="text" class="form-control" name="keterangan[]" placeholder="Enter Text" required></textarea></td>
                        </tr>                        
                      </tbody>
                      <tfoot>
                        <td colspan="3"><input type="button" value="Tambah" onclick="tambah_baris()" ></td>
                      </tfoot>  
                    </table>
                  </div>             

                   <p align="justify">Apa kamu yakin akan mengirimkan Form Tax ini : &nbsp; <?php echo $row->nomor_surat; ?></p>
                    <label>Kepada CSF Finance?</label>   
                    <input type="hidden" name="handled_by" value="n.prasetyaningrum">   
           
                </div>  

                <div class="box">
                  <div class="box-header with-border">
                    <a class="btn btn-warning" href="Dashboard" role="button">Cancel</a>  
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </div>                                                 
            </div>
          </section>  
        <?php } ?>
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
   
function tambah_baris()
{
	html='<tr>'
        + '<td><select id="jenis_pajak" name="jenis_pajak[]" class="form-control"><option value="">Choose</option><?php foreach ($jenispajak as $get) {?><option value="<?php echo $get->jenis_pajak; ?>"><?php echo $get->jenis_pajak; ?></option><?php } ?></select> </td>'
        + '<td><select id="kode_pajak" name="kode_pajak[]" class="form-control"><option value="">Choose</option><?php foreach ($kodePajak as $kode) {?><option value="<?php echo $kode->kode_objek_pajak; ?>"><?php echo $kode->kode_objek_pajak; ?></option><?php } ?></select> </td>'
        + '<td><input id="dropdown2" class="form-control" name="kode_map[]" onchange="penjumlahan()" type="text"> </td>'
        + '<td><textarea type="text" class="form-control" name="nama[]"></textarea> </td>'
        + '<td><textarea type="text" class="form-control" name="npwp[]"></textarea> </td>'
        + '<td><textarea type="text" class="form-control" name="alamat[]" placeholder="Enter Text" required></textarea> </td>'
        + '<td><input id="tarif" class="form-control" name="tarif[]" onchange="penjumlahan()" type="text"> </td>'
        + '<td><input type="checkbox" name="fas_pajak[]" value="Ya"> </td>'
        + '<td><input type="text" class="form-control" name="special_tarif[]" placeholder="Enter Text" > </td>'
        + '<td><input type="checkbox" name="gross[]" value="Ya"> </td>'
        + '<td><input id="dpp" onchange="penjumlahan()" type="text" class="form-control" name="dpp[]" placeholder="Enter Text" required></td>'
        + '<td><input type="text" class="form-control" name="dpp_gross[]" placeholder="Enter Text" ></td>'
        + '<td><input id="hasil" type="text" class="form-control" name="pajak_terutang[]" placeholder="Enter Text" required></td>'
        + '<td><input type="text" class="form-control" name="masa_pajak[]" placeholder="Enter Text" ></td>'
        + '<td><textarea type="text" class="form-control" name="keterangan[]" placeholder="Enter Text" required></textarea></td>'
        + '</tr>';
	$('#show tbody').append(html);
}     
        
</script>

<script>
function penjumlahan(){
  var a = parseFloat(document.getElementById("tarif").value);
  // alert(a);
  var b = parseFloat(document.getElementById("dpp").value);
 
  if(a && b){
    document.getElementById("hasil").value = b*(a/100); 
  }
  
  
}

function tambah() {
  alert("Data Successfully to Save!");
}

function myFunction(){
  var x = document.getElementById("Select").value;

  document.getElementById("demo").innerHTML = x;
  document.getElementById("demo2").innerHTML = x;
  document.getElementById("demo3").innerHTML = x;
}

function showed() {
  // alert();
  var text1 = document.getElementById("show");
  var text2 = document.getElementById("hide");

  if (document.getElementById("tidak").checked == false){
    text1.style.display = "block";
    text2.style.display = "block";
  } else {
     text1.style.display = "none";
     text2.style.display = "none";
  } 
  // alert(checkrequest);
}
</script>

<script type="text/javascript">
  
  $(document).ready(function() { 
    $('#jenis_pajak').change(function() {
      if( $(this).val() == 'PPh Pasal 21') {
            $('#kode_pajak').prop( "disabled", true );
      } else {       
        $('#kode_pajak').prop( "disabled", false );
      }
    });

  });  

  var rupiah = document.getElementById('rupiah');
  rupiah.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    rupiah.value = formatRupiah(this.value);
  });

  /* Fungsi formatRupiah */
  function formatRupiah(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split       = number_string.split(','),
    sisa        = split[0].length % 3,
    rupiah        = split[0].substr(0, sisa),
    ribuan        = split[0].substr(sisa).match(/\d{3}/gi);

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
    split       = number_string.split(','),
    sisa        = split[0].length % 3,
    rupiah2         = split[0].substr(0, sisa),
    ribuan        = split[0].substr(sisa).match(/\d{3}/gi);

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
    split       = number_string.split(','),
    sisa        = split[0].length % 3,
    rupiah3         = split[0].substr(0, sisa),
    ribuan        = split[0].substr(sisa).match(/\d{3}/gi);

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
    split       = number_string.split(','),
    sisa        = split[0].length % 3,
    biaya         = split[0].substr(0, sisa),
    ribuan        = split[0].substr(sisa).match(/\d{3}/gi);

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
    split       = number_string.split(','),
    sisa        = split[0].length % 3,
    uangmuka        = split[0].substr(0, sisa),
    ribuan        = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      uangmuka += separator + ribuan.join('.');
    }

    uangmuka = split[1] != undefined ? uangmuka + ',' + split[1] : uangmuka;
    return prefix == undefined ? uangmuka : (uangmuka? + uangmuka : '');
  }
</script>
