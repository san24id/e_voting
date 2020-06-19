<style>
td[rowspan="3"] {
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
        <form id="form" method="post" action="Dashboard/edit_pay" onsubmit="update()">
          <?php foreach ($ppayment as $get) { ?>  
            <input type="hidden" name="id" class="form-control" value="<?php echo $get->id?>">  

          <input type="hidden" name="display_name" class="form-control" value="<?php echo $this->session->userdata('display_name') ?>">
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
                        <td <b><font size="+2" style="font-family: calibri;">FORMULIR PENERIMAAN KAS <br> <i> CASH RECEIVED FORM (PRF)</i></font></b>                                  
                        <td><img src="assets/dashboard/images/logo.png" alt="Logo Images"></td>
                        </tr>
                      </tbody>
                    </table>
                    
                    <br>

                    <table style="font-family: calibri;" width="100%">
                      <tbody>     
                        <tr>
                          <td><font size="+1" >Tanggal : </td>
                          <td><input type="text" name="tanggal" class="form-control" value="<?php echo $get->tanggal; ?>" readonly> </td>
                          <td> &nbsp;</td>
                          <td><font size="+1" >CRF Doc. No : </font></td>
                          <td><input type="text" name="apf_doc" class="form-control" value="<?php echo $get->apf_doc; ?>"></td>
                        </tr>
                        <tr>
                          <td><font size="+1" >Dir/Sub/Div :<br><i>Dir/Sub/Div </i><font></td>
                          <td><input type="text" name="division_id" class="form-control" value="<?php echo $get->division_id; ?>"></td>
                          <td> &nbsp;</td>
                          <td><font size="+1" >Kode Proyek : <br> <i>Project Code</i><font></td>
                          <td><input type="text" name="kode_proyek" class="form-control" value="<?php echo $get->kode_proyek; ?>"></td>
                        </tr>
                        <tr>
                          <td><font size="+1">PR Doc. No : </font></td>
                          <td><input type="text" name="pr_doc" class="form-control" value="<?php echo $get->pr_doc; ?>" readonly></td>
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
                          <td><center> 1 </center></td>
                          <td colspan="2"><textarea type="text" class="form-control" name="description"><?php echo $get->description;?></textarea></td>                  
                          <td><center><?php echo $get->currency;?></center> </td>
                          <td><input id="nilai" onchange="nominal()" type="text" class="form-control" name="jumlah" value="<?php echo $get->jumlah;?>"></td>
                        </tr>
                        <tr>
                          <td><center> 2 </center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description2" value="<?php echo $get->description2;?>"></td>
                          <td><center><?php echo $get->currency1;?></center> </td>
                          <td><input id="nilai1" onchange="nominal()" type="text" class="form-control" name="jumlah2" value="<?php echo $get->jumlah2;?>"></td> 
                        </tr>
                        <tr>
                          <td><center> 3 </center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description3" value="<?php echo $get->description3;?>"></td>
                          <td><center><?php echo $get->currency2;?> </center> </td>
                          <td><input id="nilai2" onchange="nominal()" type="text" class="form-control" name="jumlah3" value="<?php echo $get->jumlah3;?>"></td> 
                        </tr>
                        <tr>
                          <td><center>4</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description4" value="<?php echo $get->description4;?>"></td>
                          <td><center>  <?php echo $get->currency3;?></center> </td>
                          <td><input id="nilai3" onchange="nominal()" type="text" class="form-control" name="jumlah4" value="<?php echo $get->jumlah4;?>"> </td>
                        </tr>
                        <tr>
                          <td><center>5</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description5" value="<?php echo $get->description5;?>"></td>
                          <td><center>  <?php echo $get->currency4;?></center> </td>
                          <td><input id="nilai4" onchange="nominal()" type="text" class="form-control" name="jumlah5" value="<?php echo $get->jumlah5;?>"> </td> 
                        </tr>
                        <tr>
                          <td><center>6</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description6" value="<?php echo $get->description6;?>" ></td>
                          <td><center>  <?php echo $get->currency5;?></center></td>
                          <td><input id="nilai5" onchange="nominal()" type="text" class="form-control" name="jumlah6" value="<?php echo $get->jumlah6;?>"></td> 
                        </tr>
                        
                        <tr>
                          <td><center>7</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description7" value="<?php echo $get->description7;?>"></td>
                          <td><center>  <?php echo $get->currency6;?></center></td>
                          <td><input id="nilai6" onchange="nominal()" type="text" class="form-control" name="jumlah7" value="<?php echo $get->jumlah7;?>">  </td> 
                        </tr>
                        <tr>
                          <td><center>8</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description8" value="<?php echo $get->description8;?>"></td>
                          <td><center>  <?php echo $get->currency7;?></center></td>
                          <td><input id="nilai7" onchange="nominal()" type="text" class="form-control" name="jumlah8" value="<?php echo $get->jumlah8;?>" ></td> 
                        </tr>
                        <tr>
                          <td><center>9</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description9" value="<?php echo $get->description9;?>" ></td>
                          <td><center>  <?php echo $get->currency8;?></center></td>
                          <td><input id="nilai8" onchange="nominal()" type="text" class="form-control" name="jumlah9" value="<?php echo $get->jumlah9;?>"></td> 
                        </tr>
                        <tr>
                          <td><center>10</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description10" value="<?php echo $get->description10;?>"></td>
                          <td><center>  <?php echo $get->currency9;?></center></td>
                          <td><input id="nilai9" onchange="nominal()" type="text" class="form-control" name="jumlah10" value="<?php echo $get->jumlah10;?>"></td> 
                        </tr>
                        <tr>
                          <td><center>11</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description11" value="<?php echo $get->description11;?>"></td>
                          <td><center>  <?php echo $get->currency10;?></center></td>
                          <td><input id="nilai10" onchange="nominal()" type="text" class="form-control" name="jumlah11" value="<?php echo $get->jumlah11;?>"></td> 
                        </tr>
                        <tr>
                          <td><center>12</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description12" value="<?php echo $get->description12;?>"></td>
                          <td><center>  <?php echo $get->currency11;?></center></td>
                          <td><input id="nilai11" onchange="nominal()" type="text" class="form-control" name="jumlah12" value="<?php echo $get->jumlah12;?>"></td> 
                        </tr>

                        <tr>
                          <td colspan="3" align="right"> Jumlah Pembayaran/<i>Total Payment</i> </td>
                          <td><center><?php echo $get->currency;?>  <?php echo $get->currency1;?> <?php echo $get->currency2;?> </center></td>
                          <td><input id="ulang" type="text" class="form-control" name="total_expenses" value="<?php echo $get->total_expenses;?>"> </td>
                        </tr>
                        <tr> 
                          <td>Terbilang/ <i>Say :</i> </td>
                          <td colspan="4"><input id="terbilang" type="text" name="terbilang" class="form-control" placeholder="Terbilang" value="<?php echo $get->terbilang;?>"></td>
                        </tr>
                        <tr> 
                          <td>Dibayar Kepada/ <i>Paid To :</i> </td>
                          <td colspan="4"><input type="text" name="dibayar_kepada" class="form-control" value="<?php echo $get->dibayar_kepada; ?>"></td>
                        </tr>
                      </tbody>
                    </table>
                    
                    <br>

                    <table border="1" style="font-family: calibri;" width="100%">
                      <tbody>
                      <tr> 
                        <td colspan="4" rowspan="2" width="50%">&nbsp; Verifikasi Oleh / <br>&nbsp;<i>Verified By : </i> </td>                           
                        <td rowspan="4">&nbsp; Catatan / :<br>&nbsp;<i>Remarks  </i><textarea type="text" class="form-control" name="catatan" readonly><?php echo $get->catatan;?></textarea></td>
                      </tr>
                      <tr>
                      </tr>
                      <tr align="right">
                        <td width="5%"> </td>
                        <td width="20%">Tanggal &nbsp;</td>
                        <td colspan="2" rowspan="2"><input type="text" name="verified_date" class="form-control" value="<?php echo $get->verified_date;?>" readonly></td>     
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
                          <td>Nama /<i>Name : </i></td>
                          <td><input type="text" class="form-control" name="penanggung_jawab" value="<?php echo $get->penanggung_jawab;?>" readonly></td> 
                        </tr>
                        <tr>
                          <td>Jabatan /<i>Title : </i></td>
                          <td><input type="text" class="form-control" name="jabatan" value="<?php echo $get->jabatan;?>" readonly></td> 
                        </tr>
                      </tbody>  
                    </table>   

                    <table border="1" style="font-family: calibri;" width="100%">
                      <tbody>
                        <tr>
                          <td colspan="6"><center><b>Disetujui oleh <br> <i>Approved by :</i> </b></center></td>
                        </tr>
                        <tr>
                          <td colspan="2"> <br> <br> <br> <br> <br> <br></td>
                          <td colspan="2"> <br> <br> <br> <br> <br> <br></td>
                          <td colspan="2"> <br> <br> <br> <br> <br> <br></td>
                        </tr>
                        <tr>
                          <td width="10%">Nama/ <i>Name</i> </td>
                          <td><input type="text" name="persetujuan_pembayaran1" class="form-control" value="<?php echo $get->persetujuan_pembayaran1;?>" readonly> </td>
                          <td width="10%">Nama/ <i>Name</i> </td>
                          <td><input type="text" name="persetujuan_pembayaran2" class="form-control" value="<?php echo $get->persetujuan_pembayaran2;?>" readonly> </td>
                          <td width="10%">Nama/ <i>Name</i> </td>
                          <td><input type="text" name="persetujuan_pembayaran3" class="form-control" value="<?php echo $get->persetujuan_pembayaran3;?>" readonly> </td>
                        </tr>
                        <tr>
                          <td>Jabatan/ <i>Title</i> </td>
                          <td><input type="text" name="jabatan1" class="form-control" value="<?php echo $get->jabatan1;?>" readonly> </td>
                          <td>Jabatan/ <i>Title</i> </td>
                          <td><input type="text" name="jabatan2" class="form-control" value="<?php echo $get->jabatan2;?>" readonly> </td>
                          <td>Jabatan/ <i>Title</i> </td>
                          <td><input type="text" name="jabatan3" class="form-control" value="<?php echo $get->jabatan3;?>" readonly> </td>
                        </tr> 
                      </tbody>
                    </table>

                    <!---TREASURY--->
                    <table border="1" style="font-family: calibri;" width="100%">
                      <tbody>
                        <tr>
                          <td colspan="12"><center><b>Diisi oleh Divisi Treasury <br> <i>For Treasury Use Only </i> </b></center></td>
                        </tr>
                        <tr>
                          <td colspan="4" width="30%">Verifikasi Perintah Bayar oleh/<br><i>Payment Instruction Verified by : </i></td>
                          <td colspan="4" width="30%">Pelaksanaan Pembayaran oleh/<br><i>Payment Execution by : </i></td>
                          <td colspan="4" rowspan="3">Catatan : <br><i>Remarks :</i> <textarea type="text" class="form-control" name="label2" placeholder="Remarks"></textarea></td>                          
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
                          <td colspan="2"> </td>
                          <td colspan="2" width="10%">Nama/ <i>Name</i> </td>
                          <td colspan="2"> </td>
                          <td colspan="2" width="10%">No. Bilyet: </td>
                          <td colspan="2"> </td>
                        </tr>
                        <tr>
                          <td colspan="2" width="10%">Jabatan/ <i>Title</i> </td>
                          <td colspan="2"> </td>
                          <td colspan="2" width="10%">Jabatan/ <i>Title</i> </td>
                          <td colspan="2"> </td>
                          <td colspan="2" width="10%"><i>Check No.:</i> </td>
                          <td colspan="2"> </td>
                        </tr>
                      </tbody>
                    </table>

                    <br>

                    <table border="1" style="font-family: calibri;" width="100%">
                      <tbody>
                        <tr>
                          <td colspan="2">Penerima : <br> <i>Received by :</i></td>
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

                    <img align="right" src="assets/dashboard/images/footer_form2.png" alt="Logo Images">    
                    
                    </div>  
                </div>                     

                <div class="box">
                  <div class="box-header with-border">
                    <a class="btn btn-warning" href="Dashboard/my_task" role="button">Cancel</a>
                    <button type="submit" class="btn btn-primary third">Save</button>
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

<script>
document.querySelector(".third").addEventListener('click', function(){
  swal("Data Successfully to Update!");
  function update() {
  location.reload(true);
        tr.hide();
  }
  
});

function myFunction(){
  var x = document.getElementById("Select").value;

  document.getElementById("demo").innerHTML = x;
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
  var j = document.getElementById("nilai9").value;
  // alert(j);
  var k = document.getElementById("nilai10").value;
  // alert(k);
  var l = document.getElementById("nilai11").value;
  // alert(l);

  var get_x = x.replace(/\D+/g, '');
  if (x.substr(0,1)=="(" && x.substr(x.length-1,1)==")"){		
		get_x= -Math.abs(get_x);		
  }else{
	  get_x= Math.abs(get_x);		
  }
  var get_b = b.replace(/\D+/g, '');
  if (b.substr(0,1)=="(" && b.substr(b.length-1,1)==")"){		
		get_b= -Math.abs(get_b);		
  }else{
	  get_b= Math.abs(get_b);		
  }
  var get_c = c.replace(/\D+/g, '');
  if (c.substr(0,1)=="(" && c.substr(c.length-1,1)==")"){		
		get_c= -Math.abs(get_c);		
  }else{
	  get_c= Math.abs(get_c);		
  }
  var get_d = d.replace(/\D+/g, ''); 
  if (d.substr(0,1)=="(" && d.substr(d.length-1,1)==")"){		
		get_d= -Math.abs(get_d);		
  }else{
	  get_d= Math.abs(get_d);		
  }  
  var get_e = e.replace(/\D+/g, '');
  if (e.substr(0,1)=="(" && e.substr(e.length-1,1)==")"){		
		get_e= -Math.abs(get_e);		
  }else{
	  get_e= Math.abs(get_e);		
  }
  var get_f = f.replace(/\D+/g, '');
  if (f.substr(0,1)=="" && f.substr(f.length-1,1)==")"){		
		get_f= -Math.abs(get_f);		
  }else{
	  get_f= Math.abs(get_f);		
  }
  
  var get_g = g.replace(/\D+/g, '');
  if (g.substr(0,1)=="(" && g.substr(g.length-1,1)==")"){		
		get_g= -Math.abs(get_g);		
  }else{
	  get_g= Math.abs(get_g);		
  }
  
  var get_h = h.replace(/\D+/g, '');
  if (h.substr(0,1)=="(" && h.substr(h.length-1,1)==")"){		
		get_h= -Math.abs(get_h);		
  }else{
	  get_h= Math.abs(get_h);		
  }
  
  var get_i = i.replace(/\D+/g, '');
  if (i.substr(0,1)=="(" && i.substr(i.length-1,1)==")"){		
		get_i= -Math.abs(get_i);		
  }else{
	  get_i= Math.abs(get_i);		
  }
  
  var get_j = j.replace(/\D+/g, '');
  if (j.substr(0,1)=="(" && j.substr(j.length-1,1)==")"){		
		get_j= -Math.abs(get_j);		
  }else{
	  get_j= Math.abs(get_j);		
  }
  
  var get_k = k.replace(/\D+/g, '');
  if (k.substr(0,1)=="(" && k.substr(k.length-1,1)==")"){		
		get_k= -Math.abs(get_k);		
  }else{
	  get_k= Math.abs(get_k);		
  }

  var get_l = l.replace(/\D+/g, '');  
  if (l.substr(0,1)=="(" && l.substr(l.length-1,1)==")"){		
		get_l= -Math.abs(get_l);		
  }else{
	  get_l= Math.abs(get_l);		
  }

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
  var sum_j = Number(get_j) + 0 ;
  var sum_k = Number(get_k) + 0 ;
  var sum_l = Number(get_l) + 0 ;

  var hasil = sum_x+sum_b+sum_c+sum_d+sum_e+sum_f+sum_g+sum_h+sum_i+sum_j+sum_k+sum_l;
  // alert(b)
  // if(x && b && c){
    // document.getElementById("ulang").value = hasil ;
  // }  
    
  var bilangan= ''+hasil+'';
  // alert(bilangan);
    var kalimat="";
    var angka   = new Array('0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');
    var kata    = new Array('','Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan','Sembilan');
    var tingkat = new Array('','Ribu','Juta','Milyar','Triliun');
    var panjang_bilangan = bilangan.length;
    // alert(panjang_bilangan);
     
    /* pengujian panjang bilangan */
    if(panjang_bilangan > 15){
        kalimat = "Diluar Batas";
    }else{
        /* mengambil angka-angka yang ada dalam bilangan, dimasukkan ke dalam array */
        for(i = 1; i <= panjang_bilangan; i++) {
            angka[i] = bilangan.substr(-(i),1);
        }
         
        var i = 1;
        var j = 0;
         
        /* mulai proses iterasi terhadap array angka */
        while(i <= panjang_bilangan){
            subkalimat = "";
            kata1 = "";
            kata2 = "";
            kata3 = "";
             
            /* untuk Ratusan */
            if(angka[i+2] != "0"){
                if(angka[i+2] == "1"){
                    kata1 = "Seratus";
                }else{
                    kata1 = kata[angka[i+2]] + " Ratus";
                }
            }
             
            /* untuk Puluhan atau Belasan */
            if(angka[i+1] != "0"){
                if(angka[i+1] == "1"){
                    if(angka[i] == "0"){
                        kata2 = "Sepuluh";
                    }else if(angka[i] == "1"){
                        kata2 = "Sebelas";
                    }else{
                        kata2 = kata[angka[i]] + " Belas";
                    }
                }else{
                    kata2 = kata[angka[i+1]] + " Puluh";
                }
            }
             
            /* untuk Satuan */
            if (angka[i] != "0"){
                if (angka[i+1] != "1"){
                    kata3 = kata[angka[i]];
                }
            }
             
            /* pengujian angka apakah tidak nol semua, lalu ditambahkan tingkat */
            if ((angka[i] != "0") || (angka[i+1] != "0") || (angka[i+2] != "0")){
                subkalimat = kata1+" "+kata2+" "+kata3+" "+tingkat[j]+" ";
            }
             
            /* gabungkan variabe sub kalimat (untuk Satu blok 3 angka) ke variabel kalimat */
            kalimat = subkalimat + kalimat;
            i = i + 3;
            j = j + 1;
        }
         
        /* mengganti Satu Ribu jadi Seribu jika diperlukan */
        if ((angka[5] == "0") && (angka[6] == "0")){
            kalimat = kalimat.replace("Satu Ribu","Seribu");
        }
    }
    
    var matauang = document.getElementById("Select").value;
    // var namamatauang =String(matauang);

    // var splitCur []  		= namamatauang.split("-");
    
    // alert(splitCur[1]);
    switch(matauang){
      case "EUR":
      muncul = "EURO";
      break;
      case "IDR":
      muncul = "Rupiah";
      break;
      case "USD":
      muncul = "Dollar Amerika";
      break;
      case "SGD":
      muncul = "Dollar Singapura";
      break;
      case "GBP":
      muncul = "Pound";
      break;
      case "JPY":
      muncul = "Yen";
      break;
      case "HKD":
      muncul = "Dollar Hongkong";
      break;
      case "KRW":
      muncul = "Won";
      break;

      default:
      muncul = "";
    }
    
    document.getElementById("terbilang").value=kalimat+muncul;
    // alert(kalimat);

  var a = hasil ;
  if (a <= 100000000){
    document.getElementById("approval1").value = "Donny Hamdani";
    document.getElementById("jabatan1").value = "Deputi Direktur Keuangan";
    <?php if ($row->display_name == "Donny Hamdani"){ ?>
      document.getElementById("approval1").value = "Salusra Satria";
      document.getElementById("jabatan1").value = "Direktur Eksekutif Keuangan & Penilaian Proyek / CFO";
    <?php } ?>
  }

  if (a >= 100000000 && a <= 500000000) {
    // document.getElementById("approval1").value = "Donny Hamdani";
    // document.getElementById("jabatan1").value = "Deputi Direktur Keuangan";
    
    document.getElementById("approval1").value = "Salusra Satria";
    document.getElementById("jabatan1").value = "Direktur Eksekutif Keuangan & Penilaian Proyek / CFO";

    <?php if ($row->display_name == "Salusra Satria"){ ?>
      document.getElementById("approval1").value = "M. Wahid Sutopo";
      document.getElementById("jabatan1").value = "Direktur Utama / CEO";
    <?php } ?>
  }
  
  if (a >= 500000000) {
    document.getElementById("approval1").value = "Salusra Satria";
    document.getElementById("jabatan1").value = "Direktur Eksekutif Keuangan & Penilaian Proyek / CFO";
    
    document.getElementById("approval2").value = "Andre Permana";
    document.getElementById("jabatan2").value = "Direktur Eksekutif Bisnis / COO"; 

    document.getElementById("approval3").value = "M. Wahid Sutopo";
    document.getElementById("jabatan3").value = "Direktur Utama / CEO";  
  }

  if (hasil<0){
	  hasil=Math.abs(hasil);
	  document.getElementById("ulang").value = "(" + hasil + ")" ;
  }else{
	  document.getElementById("ulang").value = hasil ;
  }
  
  var strulang =ulang.value;
	if (strulang.substr(0,1)=="(" && strulang.substr(strulang.length-1,1)==")"){
		ulang.value = "(" + formatulang(strulang.substr(1,strulang.length-2)) + ")";
	}else{
		ulang.value = formatulang(this.value);
	}  
}

  // Format Separator Id Nilai 
  var nilai = document.getElementById('nilai');
  nilai.addEventListener('focusout', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai() untuk mengubah angka yang di ketik menjadi format angka
    var strnilai =nilai.value;
	if (strnilai.substr(0,1)=="(" && strnilai.substr(strnilai.length-1,1)==")"){
		nilai.value = "(" + formatnilai(strnilai.substr(1,strnilai.length-2)) + ")";
	}else{
		nilai.value = formatnilai(this.value);
	}
  });

  /* Fungsi formatnilai */
  function formatnilai(angka, prefix){
    var number_string = angka.replace(/[^,\d,-]/g, '').toString(),
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
  nilai1.addEventListener('focusout', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai1() untuk mengubah angka yang di ketik menjadi format angka
	var strnilai1 =nilai1.value;
	if (strnilai1.substr(0,1)=="(" && strnilai1.substr(strnilai1.length-1,1)==")"){
		nilai1.value = "(" + formatnilai1(strnilai1.substr(1,strnilai1.length-2)) + ")";
	}else{
		nilai1.value = formatnilai1(this.value);
	}
  });

  /* Fungsi formatnilai1 */
  function formatnilai1(angka, prefix){
    var number_string = angka.replace(/[^,\d,-]/g, '').toString(),
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
  nilai2.addEventListener('focusout', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai2() untuk mengubah angka yang di ketik menjadi format angka
    var strnilai2 =nilai2.value;
	if (strnilai2.substr(0,1)=="(" && strnilai2.substr(strnilai2.length-1,1)==")"){
		nilai2.value = "(" + formatnilai2(strnilai2.substr(1,strnilai2.length-2)) + ")";
	}else{
		nilai2.value = formatnilai2(this.value);
	}
  });

  /* Fungsi formatnilai2 */
  function formatnilai2(angka, prefix){
    var number_string = angka.replace(/[^,\d,-]/g, '').toString(),
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
  nilai3.addEventListener('focusout', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai3() untuk mengubah angka yang di ketik menjadi format angka	
	var strnilai3 =nilai3.value;
	if (strnilai3.substr(0,1)=="(" && strnilai3.substr(strnilai3.length-1,1)==")"){
		nilai3.value = "(" + formatnilai3(strnilai3.substr(1,strnilai3.length-2)) + ")";
	}else{
		nilai3.value = formatnilai3(this.value);
	}
  });

  /* Fungsi formatnilai3 */
  function formatnilai3(angka, prefix){
    var number_string = angka.replace(/[^,\d,-]/g, '').toString(),
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
  nilai4.addEventListener('focusout', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai4() untuk mengubah angka yang di ketik menjadi format angka
    var strnilai4 =nilai4.value;
	if (strnilai4.substr(0,1)=="(" && strnilai4.substr(strnilai4.length-1,1)==")"){
		nilai4.value = "(" + formatnilai4(strnilai4.substr(1,strnilai4.length-2)) + ")";
	}else{
		nilai4.value = formatnilai4(this.value);
	}
  });

  /* Fungsi formatnilai4 */
  function formatnilai4(angka, prefix){
    var number_string = angka.replace(/[^,\d,-]/g, '').toString(),
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
  nilai5.addEventListener('focusout', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai5() untuk mengubah angka yang di ketik menjadi format angka
    var strnilai5 =nilai5.value;
	if (strnilai5.substr(0,1)=="(" && strnilai5.substr(strnilai5.length-1,1)==")"){
		nilai5.value = "(" + formatnilai5(strnilai5.substr(1,strnilai5.length-2)) + ")";
	}else{
		nilai5.value = formatnilai5(this.value);
	}
  });

  /* Fungsi formatnilai5 */
  function formatnilai5(angka, prefix){
    var number_string = angka.replace(/[^,\d,-]/g, '').toString(),
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
  nilai6.addEventListener('focusout', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai6() untuk mengubah angka yang di ketik menjadi format angka
    var strnilai6 =nilai6.value;
	if (strnilai6.substr(0,1)=="(" && strnilai6.substr(strnilai6.length-1,1)==")"){
		nilai6.value = "(" + formatnilai6(strnilai6.substr(1,strnilai6.length-2)) + ")";
	}else{
		nilai6.value = formatnilai6(this.value);
	}
  });

  /* Fungsi formatnilai6 */
  function formatnilai6(angka, prefix){
    var number_string = angka.replace(/[^,\d,-]/g, '').toString(),
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
  nilai7.addEventListener('focusout', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai7() untuk mengubah angka yang di ketik menjadi format angka
    var strnilai7 =nilai7.value;
	if (strnilai7.substr(0,1)=="(" && strnilai7.substr(strnilai7.length-1,1)==")"){
		nilai7.value = "(" + formatnilai7(strnilai7.substr(1,strnilai7.length-2)) + ")";
	}else{
		nilai7.value = formatnilai7(this.value);
	}
  });

  /* Fungsi formatnilai7 */
  function formatnilai7(angka, prefix){
    var number_string = angka.replace(/[^,\d,-]/g, '').toString(),
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
  nilai8.addEventListener('focusout', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai8() untuk mengubah angka yang di ketik menjadi format angka
    var strnilai8 =nilai8.value;
	if (strnilai8.substr(0,1)=="(" && strnilai8.substr(strnilai8.length-1,1)==")"){
		nilai8.value = "(" + formatnilai8(strnilai8.substr(1,strnilai8.length-2)) + ")";
	}else{
		nilai8.value = formatnilai8(this.value);
	}
  });

  /* Fungsi formatnilai8 */
  function formatnilai8(angka, prefix){
    var number_string = angka.replace(/[^,\d,-]/g, '').toString(),
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

  var nilai9 = document.getElementById('nilai9');
  nilai9.addEventListener('focusout', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai9() untuk mengubah angka yang di ketik menjadi format angka
    var strnilai9 =nilai9.value;
	if (strnilai9.substr(0,1)=="(" && strnilai9.substr(strnilai9.length-1,1)==")"){
		nilai9.value = "(" + formatnilai9(strnilai9.substr(1,strnilai9.length-2)) + ")";
	}else{
		nilai9.value = formatnilai9(this.value);
	}
  });

  /* Fungsi formatnilai9 */
  function formatnilai9(angka, prefix){
    var number_string = angka.replace(/[^,\d,-]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    nilai9     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      nilai9 += separator + ribuan.join('.');
    }

    nilai9 = split[1] != undefined ? nilai9 + ',' + split[1] : nilai9;
    return prefix == undefined ? nilai9 : (nilai9 ? + nilai9 : '');
  }

  var nilai10 = document.getElementById('nilai10');
  nilai10.addEventListener('focusout', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai8() untuk mengubah angka yang di ketik menjadi format angka
    var strnilai10 =nilai10.value;
	if (strnilai10.substr(0,1)=="(" && strnilai10.substr(strnilai10.length-1,1)==")"){
		nilai10.value = "(" + formatnilai10(strnilai10.substr(1,strnilai10.length-2)) + ")";
	}else{
		nilai10.value = formatnilai10(this.value);
	}

  /* Fungsi formatnilai8 */
  function formatnilai10(angka, prefix){
    var number_string = angka.replace(/[^,\d,-]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    nilai10     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      nilai10 += separator + ribuan.join('.');
    }

    nilai10 = split[1] != undefined ? nilai10 + ',' + split[1] : nilai10;
    return prefix == undefined ? nilai10 : (nilai10 ? + nilai10 : '');
  }

  var nilai11 = document.getElementById('nilai11');
  nilai11.addEventListener('focusout', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai11() untuk mengubah angka yang di ketik menjadi format angka
    var strnilai11 =nilai11.value;
	if (strnilai11.substr(0,1)=="(" && strnilai11.substr(strnilai11.length-1,1)==")"){
		nilai11.value = "(" + formatnilai11(strnilai11.substr(1,strnilai11.length-2)) + ")";
	}else{
		nilai11.value = formatnilai11(this.value);
	}
  });

  /* Fungsi formatnilai11 */
  function formatnilai11(angka, prefix){
    var number_string = angka.replace(/[^,\d,-]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    nilai11     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      nilai11 += separator + ribuan.join('.');
    }

    nilai11 = split[1] != undefined ? nilai11 + ',' + split[1] : nilai11;
    return prefix == undefined ? nilai11 : (nilai11 ? + nilai11 : '');
  }

  // Format Separator Id Ulang (Jumlah Pembayaran)
  var ulang = document.getElementById('ulang');
  ulang.addEventListener('mousemove', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatulang() untuk mengubah angka yang di ketik menjadi format angka
    var strulang =ulang.value;
	if (strulang.substr(0,1)=="(" && strulang.substr(strulang.length-1,1)==")"){
		ulang.value = "(" + formatulang(strulang.substr(1,strulang.length-2)) + ")";
	}else{
		ulang.value = formatulang(this.value);
	}
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