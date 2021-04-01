<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>

<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- <section class="content-header">
          <h1>
            DATA PAYMENT
            <small></small>
          </h1>
        </section> -->
		<?php
		// $arrvendor="";
		// $strvendor="";
		// $counter=0;
		// foreach($data_vendor as $vndr){
        //           $arrvendor= $arrvendor . $vndr->nama ." - " .$vndr->kode_vendor.";" ;
		// 		  $counter=$counter+1;
		// }
		// $strvendor=substr($arrvendor,0,strlen($arrvendor)-1);
		
		// $arrbank="";
		// $strbank="";
		// foreach($bank as $bnk){
        //           $arrbank= $arrbank . $bnk->bank .";" ;
		// }
		// $strbank=substr($arrbank,0,strlen($arrbank)-1);
		// $arrcurrency="";
		// $strcurrency="";
		// foreach($currency as $cur){
        //           $arrcurrency= $arrcurrency . $cur->currency .";" ;
		// }
		// $strcurrency=substr($arrcurrency,0,strlen($arrcurrency)-1);
		?>
        <!-- Main content -->
		
        <form method="post" action="Home/addquestion" >
          <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <!-- /.box -->
                <div class="box">
                  <div class="box-header with-border">
                    <h5>
                      <br>
					 
                      <!-- <left><img src="assets/dashboard/images/logo.png" alt="Logo Images"></left> -->
                      <br>
                      <center><b><u><font size="+2" style="font-family: calibri;">VOTING QUESTION</font></u></b></center>
                    </h5>
                    <legend>  FORM QUESTION</legend>
					<table style="font-family: calibri;" width="50%">
						<tr>
							<td> VOTING TYPE  </td>
							<td><select name='jenis'>
									<option value=''>Choose</option>
									<option value='1'>One Man One Vote</option>
									<option value='2'>NPP</option>
								</select>
							</td>
						</tr>
						<br>
						<tr>
							<td>Question</td>
							<td><textarea type="text" rows="5" class="form-control" name="question" ></textarea></td>
						</tr>
						<tr>
							
							<td> Status </td>
							<td><select name='isactive'>
									<option value=''>Pilih Status</option>
									<option value='1'>Active</option>
									<option value='0'>Not Active</option>
								</select>
							</td>
						</tr>
					</table>
					<br><br><br>
					<table class="center">
						<tr>
							<td><center><button class= "btn btn-success" type="submit" value="Save">Submit</button>
										<button class= "btn btn-danger" onclick="goBack()">Cancel</button>
								</center>
							</td>
						</tr>
                	</table>
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

    <!-- jQuery 2.2.3
<script src="assets/dashboard/plugins/jQuery/jquery-2.2.3.min.js"></script> -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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

<!-- <script src="assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->

    <!-- Select2 -->
<script src="assets/dashboard/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>  
<!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>  -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>

<script>
function goBack() {
  window.history.back();
}
</script>

<script>

function penjumlahan(){
  var a = document.getElementById("biaya").value;
  var b = document.getElementById("uangmuka").value;
  // var c = document.getElementById("hasil").value;
  var reva = a.replace(/[^,\d]/g, '').toString(); //a.replace(/\./g,''); 
  var revb = b.replace(/[^,\d]/g, '').toString(); //b.replace(/\./g,'');
  // var revc = c.replace(".","");
  // alert(revb);
  var hasil = parseInt(reva)-parseInt(revb);
  // var aa = parseInt(rev).value;
  // var b = parseInt(document.getElementById("uangmuka").value);

  // if(reva && revb){
	  if(hasil<0){
		  document.getElementById("hasil").value = '('+Math.abs(hasil)+')'; 
	  }else{
	  	document.getElementById("hasil").value = ''+hasil+''; 
    
	  }
	  
	  var strhasil=document.getElementById("hasil");
	  var strulang1 =strhasil.value;
	if (strulang1.substr(0,1)=="(" && strulang1.substr(strulang1.length-1,1)==")"){
		strhasil.value = "(" + formatuangmuka(strulang1.substr(1,strulang1.length-2)) + ")";
	}else{
		strhasil.value = formatuangmuka(strulang1);
	} 	
	$('#rupiah').val(strhasil.value);	  
  // }
}

function penjumlahana(){
  var a = document.getElementById("biayaa").value;
  var b = document.getElementById("uangmukaa").value;
  // var c = document.getElementById("hasil").value;
  var reva = a.replace(/[^,\d]/g, '').toString(); //a.replace(/\./g,''); 
  var revb = b.replace(/[^,\d]/g, '').toString(); //b.replace(/\./g,'');
  // var revc = c.replace(".","");
  // alert(revb);
  var hasil = parseInt(reva)-parseInt(revb);
  // var aa = parseInt(rev).value;
  // var b = parseInt(document.getElementById("uangmuka").value);

  // if(reva && revb){
	  if(hasil<0){
		  document.getElementById("hasila").value = '('+Math.abs(hasil)+')'; 
	  }else{
	  	document.getElementById("hasila").value = ''+hasil+''; 
    
	  }
	  
	  var strhasil=document.getElementById("hasila");
	  var strulang1 =strhasil.value;
	if (strulang1.substr(0,1)=="(" && strulang1.substr(strulang1.length-1,1)==")"){
		strhasil.value = "(" + formatuangmuka(strulang1.substr(1,strulang1.length-2)) + ")";
	}else{
		strhasil.value = formatuangmuka(strulang1);
	} 
	  
	$('#rupiah2').val(strhasil.value);
  // }
}

function penjumlahanb(){
  var a = document.getElementById("biayab").value;
  var b = document.getElementById("uangmukab").value;
  // var c = document.getElementById("hasil").value;
  var reva = a.replace(/[^,\d]/g, '').toString(); //a.replace(/\./g,''); 
  var revb = b.replace(/[^,\d]/g, '').toString(); //b.replace(/\./g,'');
  // var revc = c.replace(".","");
  // alert(revb);
  var hasil = parseInt(reva)-parseInt(revb);
  // var aa = parseInt(rev).value;
  // var b = parseInt(document.getElementById("uangmuka").value);

  // if(reva && revb){
	  if(hasil<0){
		  document.getElementById("hasilb").value = '('+Math.abs(hasil)+')'; 
	  }else{
	  	document.getElementById("hasilb").value = ''+hasil+''; 
    
	  }
	  
	  var strhasil=document.getElementById("hasilb");
	  var strulang1 =strhasil.value;
	if (strulang1.substr(0,1)=="(" && strulang1.substr(strulang1.length-1,1)==")"){
		strhasil.value = "(" + formatuangmuka(strulang1.substr(1,strulang1.length-2)) + ")";
	}else{
		strhasil.value = formatuangmuka(strulang1);
	} 
	 
	$('#rupiah3').val(strhasil.value);
  // }
}

function fung(param1,param2,param3,param4){
	var data = document.getElementById(""+param1).value; 
  var strdata=$("#"+param1+" option:selected").text().split(" - "); 
  document.getElementById(""+param2).value = data;
  document.getElementById(""+param3).value = strdata[0];
  //alert(data.substr(0,1));
  if(data.substr(0,1)=="1"){
	  $("#bankvendor"+param4).val("-").change();
	  $("#sbankvendor"+param4).val("").change();
	  $("#rekeningvendor"+param4).val("").change();
	  $("#nominalvendor"+param4).val("0").change();
	  $("#currencyvendor"+param4).val("-").change();
	  $("#scurrencyvendor"+param4).val("").change();
	  $("#bankvendor"+param4).prop( "disabled", true );
	  $("#rekeningvendor"+param4).prop( "readonly", true );
	  $("#currencyvendor"+param4).prop( "disabled", true );
	  $("#nominalvendor"+param4).prop( "readonly", true );
  }else if(data.substr(0,1)=="2"){
	  $("#bankvendor"+param4).val("-").change();
	  $("#sbankvendor"+param4).val("").change();
	  $("#rekeningvendor"+param4).val("").change();
	  $("#bankvendor"+param4).prop( "disabled", true );
	  $("#rekeningvendor"+param4).prop( "readonly", true );
	  $("#currencyvendor"+param4).prop( "disabled", false );
	  $("#scurrencyvendor"+param4).val("-").change();
	  $("#nominalvendor"+param4).prop( "readonly", false );
  }else if(data.substr(0,1)=="3"){
	  $("#rekeningvendor"+param4).val("").change(); 
	  $("#bankvendor"+param4).prop( "disabled", false );
	  $("#rekeningvendor"+param4).prop( "readonly", true );
	  $("#currencyvendor"+param4).prop( "disabled", false );
	  $("#scurrencyvendor"+param4).val("-").change();
	  $("#nominalvendor"+param4).prop( "readonly", false );
  }else {
	  $("#bankvendor"+param4).prop( "disabled", false );
	  $("#rekeningvendor"+param4).prop( "readonly", false );
	  $("#nominalvendor"+param4).prop( "readonly", false );
	  $("#currencyvendor"+param4).prop( "disabled", false );
	  
  }
  
}

// document.querySelector(".third").addEventListener('click', function(){
//   swal("Data Successfully to Save!");
//   function tambah() {
//   location.reload(true);
//         tr.hide();
//   }
  
// });

// function tambah() {
//   alert("Data Successfully to Save!");
// }

function myFunction(){
  var x = document.getElementById("Select").value;

  document.getElementById("demo").innerHTML = x;
  document.getElementById("demo2").innerHTML = x;
  document.getElementById("demo3").innerHTML = x;
}

function mycurrency1(){
  var x = document.getElementById("Select").value;

  document.getElementById("demo").innerHTML = x;
  document.getElementById("demo2").innerHTML = x;
  document.getElementById("demo3").innerHTML = x;
  document.getElementById("lblcur1").innerHTML = x+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;";
  $('#curr1').val(x).change();
}

function mycurrency2(){
  var x = document.getElementById("currency2").value;
  document.getElementById("demoa").innerHTML = x;
  document.getElementById("demo2a").innerHTML = x;
  document.getElementById("demo3a").innerHTML = x;
  document.getElementById("lblcur2").innerHTML = x+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;";
  $('#curr2').val(x).change();
}

function mycurrency3(){
  var x = document.getElementById("currency3").value;
  document.getElementById("demob").innerHTML = x;
  document.getElementById("demo2b").innerHTML = x;
  document.getElementById("demo3b").innerHTML = x;
  document.getElementById("lblcur3").innerHTML = x+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;";
  $('#curr3').val(x).change();
}

function mycurrency1a(){
  var x = document.getElementById("curr1").value;
  //document.getElementById("lblcur1").innerHTML = x+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;";
  $('#Select').val(x).change();
  return;
}

function mycurrency2a(){
  var x = document.getElementById("curr2").value;
  //document.getElementById("lblcur2").innerHTML = x+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;";
  $('#currency2').val(x).change();
  return;
}

function mycurrency3a(){
  var x = document.getElementById("curr3").value;
  //document.getElementById("lblcur3").innerHTML = x+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;";
  $('#currency3').val(x).change();
}

/*function hide() {
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
}*/

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
  rupiah.addEventListener('focusout', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    var strrupiah =rupiah.value;
	if (strrupiah.substr(0,1)=="0"){
		rupiah.value = formatRupiah(strrupiah.substr(1,strrupiah.length)) ;
	}else if (strrupiah.substr(0,1)=="(" && strrupiah.substr(strrupiah.length-1,1)==")"){
		rupiah.value = "(" + formatRupiah(strrupiah.substr(1,strrupiah.length-2)) + ")";
	}else if(strrupiah.substr(0,1)=="-") {
		rupiah.value = "(" + formatRupiah(strrupiah.substr(1,strrupiah.length-1)) + ")";
	}else{
    rupiah.value = formatRupiah(this.value);
  }
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
  rupiah2.addEventListener('focusout', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    var strrupiah2 =rupiah2.value;
	if (strrupiah2.substr(0,1)=="0"){
		rupiah2.value = formatRupiah2(strrupiah2.substr(1,strrupiah2.length)) ;
	}else if (strrupiah2.substr(0,1)=="(" && strrupiah2.substr(strrupiah2.length-1,1)==")"){
		rupiah2.value = "(" + formatRupiah2(strrupiah2.substr(1,strrupiah2.length-2)) + ")";
	}else if(strrupiah2.substr(0,1)=="-") {
		rupiah2.value = "(" + formatRupiah2(strrupiah2.substr(1,strrupiah2.length-1)) + ")";
	}else{
    rupiah2.value = formatRupiah2(this.value);
  }
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
  rupiah3.addEventListener('focusout', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    var strrupiah3 =rupiah3.value;
	if (strrupiah3.substr(0,1)=="0"){
		rupiah3.value = formatRupiah3(strrupiah3.substr(1,strrupiah3.length)) ;
	}else if (strrupiah3.substr(0,1)=="(" && strrupiah3.substr(strrupiah3.length-1,1)==")"){
		rupiah3.value = "(" + formatRupiah3(strrupiah3.substr(1,strrupiah3.length-2)) + ")";
	}else if(strrupiah3.substr(0,1)=="-") {
		rupiah3.value = "(" + formatRupiah3(strrupiah3.substr(1,strrupiah3.length-1)) + ")";
	}else{
    rupiah3.value = formatRupiah3(this.value);
  }
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
	var strbiaya=biaya.value.trim();
	if (strbiaya.substr(0,1)=="0" && strbiaya.length>1 ){
		biaya.value = formatbiaya(strbiaya.substr(1,strbiaya)) ;
	}else{
		biaya.value = formatbiaya(this.value);
	}
  });
  
  var biayaa = document.getElementById('biayaa');
  biayaa.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
	var strbiayaa=biayaa.value.trim();
	if (strbiayaa.substr(0,1)=="0" && strbiayaa.length>1 ){
		biayaa.value = formatbiaya(strbiayaa.substr(1,strbiayaa)) ;
	}else{
		biayaa.value = formatbiaya(this.value);
	}
  });
  
  var biayab = document.getElementById('biayab');
  biayab.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
	var strbiayab=biayab.value.trim();
	if (strbiayab.substr(0,1)=="0" && strbiayab.length>1 ){
		biayab.value = formatbiaya(strbiayab.substr(1,strbiayab)) ;
	}else{
		biayab.value = formatbiaya(this.value);
	}
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
  uangmuka.addEventListener('focusout', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    var struangmuka =uangmuka.value.trim();
	if (struangmuka.substr(0,1)=="0" && struangmuka.length>1){
		uangmuka.value = formatuangmuka(struangmuka.substr(1,struangmuka.length)) ;
	}else if (struangmuka.substr(0,1)=="(" && struangmuka.substr(struangmuka.length-1,1)==")"){
		uangmuka.value = "(" + formatuangmuka(struangmuka.substr(1,struangmuka.length-2)) + ")";
	}else if(struangmuka.substr(0,1)=="-") {
		uangmuka.value = "(" + formatuangmuka(struangmuka.substr(1,struangmuka.length-1)) + ")";
	}else{
		if(struangmuka=="0"){
			uangmuka.value = formatuangmuka(this.value);
		}else{
			uangmuka.value = "(" + formatuangmuka(this.value) + ")";
		}
	}
  });
  
  var uangmukaa = document.getElementById('uangmukaa');
  uangmukaa.addEventListener('focusout', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    var struangmukaa =uangmukaa.value.trim();
	if (struangmukaa.substr(0,1)=="0" && struangmukaa.length>1){
		uangmukaa.value = formatuangmuka(struangmukaa.substr(1,struangmukaa.length)) ;
	}else if (struangmukaa.substr(0,1)=="(" && struangmukaa.substr(struangmukaa.length-1,1)==")"){
		uangmukaa.value = "(" + formatuangmuka(struangmukaa.substr(1,struangmukaa.length-2)) + ")";
	}else if(struangmukaa.substr(0,1)=="-") {
		uangmukaa.value = "(" + formatuangmuka(struangmukaa.substr(1,struangmukaa.length-1)) + ")";
	}else{
		if(struangmukaa=="0"){
			uangmukaa.value = formatuangmuka(this.value);
		}else{
			uangmukaa.value = "(" + formatuangmuka(this.value) + ")" ;
		}
	}
  });
  
  var uangmukab = document.getElementById('uangmukab');
  uangmukab.addEventListener('focusout', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    var struangmukab =uangmukab.value.trim();
	if (struangmukab.substr(0,1)=="0"  && struangmukab.length>1){
		uangmukab.value = formatuangmuka(struangmukab.substr(1,struangmukab.length)) ;
	}else if (struangmukab.substr(0,1)=="(" && struangmukab.substr(struangmukab.length-1,1)==")"){
		uangmukab.value = "(" + formatuangmuka(struangmukab.substr(1,struangmukab.length-2)) + ")";
	}else if(struangmukab.substr(0,1)=="-") {
		uangmukab.value = "(" + formatuangmuka(struangmukab.substr(1,struangmukab.length-1)) + ")";
	}else{
		if(struangmukab=="0"){
			uangmukab.value = formatuangmuka(this.value);
		}else{
			uangmukab.value = "(" + formatuangmuka(this.value) + ")";
		}
	}
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

  /*$(document).ready(function() { 
    $('#bankvendor1').change(function() {
      if( $(this).val() == 'Tunai') {
            $('#rekeningvendor1').prop( "disabled", true );
      } else {       
        $('#rekeningvendor1').prop( "disabled", false );
      }
    });
	
  
  });*/

	$("#checkcreditcard").on( "click", function() {
    if($("#checkcreditcard").is(':checked')){
      $('#auto').prop('checked', false);
      $('#checkrequest').prop('checked', false);
      $('#checksettlement').prop('checked', false);
      $('#checked').prop('checked', true);
      $('#checked2').prop('checked', false);
      $('#show').hide();
      $('#choose').hide();	  
	  $('#jns_pembayaran').val('6');
    }else{
      $('#auto').prop('checked', false);
      $('#checkrequest').prop('checked', false);
      $('#checksettlement').prop('checked', false);
      $('#checked').prop('checked', false);
      $('#checked2').prop('checked', false);
      $('#show').show();
      $('#choose').show();
	  $('#jns_pembayaran').val('');
    }
});		

	$("#auto").on( "click", function() {
		$('#checkrequest').prop('checked', false);
		$('#checksettlement').prop('checked', false);
		$('#checked').prop('checked', false);
		$('#checked2').prop('checked', false);
		$('#checkcreditcard').prop('checked', false);
		$('#show').hide();
		
		if($("#auto").is(':checked')){
		  $('#choose').show();
		}else{		  
		  $('#choose').hide();
		}
	});	

	$("#checked").on( "click", function() {	
		$('#checkrequest').prop('checked', false);
		$('#checksettlement').prop('checked', false);
		$('#auto').prop('checked', false);
		$('#checked2').prop('checked', false);
		$('#checkcreditcard').prop('checked', false);
		$('#show').hide();
		$('#choose').hide();
		if($("#checked").is(':checked')){      
			$('#jns_pembayaran').val('4');
		}else{
			$('#jns_pembayaran').val('');
		}
		$('#tujuanPenggunaan').prop('readonly',false);
			$('#Select').prop('disabled',false);
			$('#currency2').prop('disabled',false);
			$('#currency3').prop('disabled',false);
			$('#rupiah').prop('readonly',false);
			$('#rupiah2').prop('readonly',false);
			$('#rupiah3').prop('readonly',false);
	});	

	$("#checked2").on( "click", function() {	
		$('#checkrequest').prop('checked', false);
		$('#checksettlement').prop('checked', false);
		$('#auto').prop('checked', false);
		$('#checked').prop('checked', false);
		$('#checkcreditcard').prop('checked', false);
		$('#show').hide();
		$('#choose').hide();
		if($("#checked2").is(':checked')){      
			$('#jns_pembayaran').val('5');
		}else{
			$('#jns_pembayaran').val('');
		}
		$('#tujuanPenggunaan').prop('readonly',false);
			$('#Select').prop('disabled',false);
			$('#currency2').prop('disabled',false);
			$('#currency3').prop('disabled',false);
			$('#rupiah').prop('readonly',false);
			$('#rupiah2').prop('readonly',false);
			$('#rupiah3').prop('readonly',false);
	});	
	
	$("#checkrequest").on( "click", function() {
		$('#auto').prop('checked', true);
		$('#checksettlement').prop('checked', false);
		$('#checked').prop('checked', false);
		$('#checked2').prop('checked', false);
		$('#checkcreditcard').prop('checked', false);
		$('#show').hide();
		  
		if($("#checkrequest").is(':checked')){
		  $('#choose').show();
		  $('#jns_pembayaran').val('2');
		}else{
		  $('#choose').hide();
		  $('#jns_pembayaran').val('');
		}
		$('#tujuanPenggunaan').prop('readonly',false);
			$('#Select').prop('disabled',false);
			$('#currency2').prop('disabled',false);
			$('#currency3').prop('disabled',false);
			$('#rupiah').prop('readonly',false);
			$('#rupiah2').prop('readonly',false);
			$('#rupiah3').prop('readonly',false);
	});	
	
	$("#checksettlement").on( "click", function() {
		$('#checkrequest').prop('checked', false);
		$('#checked').prop('checked', false);
		$('#checked2').prop('checked', false);
		$('#checkcreditcard').prop('checked', false);
		$('#choose').hide();
		if($("#checksettlement").is(':checked')){
			$('#auto').prop('checked', true);	
			$('#show').show();
			$('#jns_pembayaran').val('3');
			$('#tujuanPenggunaan').prop('readonly',false);
			$('#Select').prop('disabled',true);
			$('#currency2').prop('disabled',true);
			$('#currency3').prop('disabled',true);
			$('#rupiah').prop('readonly',true);
			$('#rupiah2').prop('readonly',true);
			$('#rupiah3').prop('readonly',true);
		}else{
			$('#show').hide();
			$('#jns_pembayaran').val('');
			$('#tujuanPenggunaan').prop('readonly',false);
			$('#Select').prop('disabled',false);
			$('#currency2').prop('disabled',false);
			$('#currency3').prop('disabled',false);
			$('#rupiah').prop('readonly',false);
			$('#rupiah2').prop('readonly',false);
			$('#rupiah3').prop('readonly',false);
		}
		
		
	});	
	
	$( "#perkiraanSelesai" ).datepicker({
		dateFormat: "dd/mm/yy",
		minDate : 0,
		setDate : new Date()
	});
	
	$( "#perkiraanSelesai" ).datepicker('setDate', new Date());
	
	$('#perkiraanSelesai').keydown(function (event) {
		event.preventDefault();
	});	
</script>


<script type="text/javascript">



var save_method; 
var url;


function myFunction2() {
  var input = document.getElementById("tujuanPenggunaan");

  console.log(input);

  // alert("Hello! I am an alert box!");
}

function savedraft() {
  
  	var errmsg="0";
	
	var inps1 = document.getElementsByName('kodevendor[]');
	var inps2 = document.getElementsByName('bankvendor[]');
	var inps3 = document.getElementsByName('rekeningvendor[]');
	var inps4 = document.getElementsByName('nominalvendor[]');
	var inps5 = document.getElementsByName('currencyvendor[]');
	var lbl4 = document.getElementsByName('label4[]');
	
	var strrupiah=$('#rupiah').val();
	var strrupiah2=$('#rupiah2').val();
	var strrupiah3=$('#rupiah3').val();
	var strhasil=$('#hasil').val();
	var strhasila=$('#hasila').val();
	var strhasilb=$('#hasilb').val();
	var currcheck="0";
	
	var struangmuka1=$('#uangmuka').val().replace(/[^,\d]/g, '').toString();
	var struangmuka2=$('#uangmukaa').val().replace(/[^,\d]/g, '').toString();
	var struangmuka3=$('#uangmukab').val().replace(/[^,\d]/g, '').toString();
	var vendorvalidate="0";
	
	if(strrupiah==""){
		strrupiah="0";
	}	
	if(strrupiah2==""){
		strrupiah2="0";
	}	
	if(strrupiah3==""){
		strrupiah3="0";
	}
	
	if(strhasil==""){
		strhasil="0";
	}	
	if(strhasila==""){
		strhasila="0";
	}	
	if(strhasilb==""){
		strhasilb="0";
	}
	
	if($('#jns_pembayaran').val()==""){
		alert('Jenis Pembayaran belum dipilih');
	}else if($('#tujuanPenggunaan').val()==""){
		alert('Tujuan Penggunaan belum di input');
	}else if($('#Select').val()==""){
		alert('Mata Uang Pertama belum dipilih');
	}else if($('#rupiah').val()==""){
		alert('Nominal Jumlah Pertama belum di input');
	}else if ($('#jns_pembayaran').val()=="2" && $('#perkiraanSelesai').val()==""){
			alert('Perkiraan Tanggal Selesai Pekerjaan/Terima Barang belum di input');
	}else{
		var skdvendor='';
		for (var i = 0; i <inps1.length; i++) {
			skdvendor = inps1[i].value;
			if (skdvendor.substring(0, 1)=="1"){
				vendorvalidate="1";
			}
			if(inps1[i].value==""){
				errmsg="Penerima Pembayaran baris ke " + (i+1) + " belum di pilih";
				break;
			};
   
			if(inps2[i].value==""){
				if (skdvendor.substring(0, 1)=="1" || skdvendor.substring(0, 1)=="2"){
					errmsg="0";
				}else{
					errmsg="Kolom Tunai/Transfer baris ke " + (i+1) + " belum di pilih";
					break;
				}
			};
			if(inps3[i].value=="" && inps2[i].value!="Tunai"){
				if(skdvendor.substring(0, 1)=="1" || skdvendor.substring(0, 1)=="2"){// || skdvendor.substring(0, 1)=="3"
					errmsg="0";
				}else{
					errmsg="Nomor Rekening baris ke " + (i+1) + " belum di input";
					break;
				}
			};
			if(inps5[i].value=="" && skdvendor.substring(0, 1)!="1"){
				errmsg="Mata Uang baris ke " + (i+1) + " Harus Dipilih";
				break;
			}else {
				if(inps5[i].value!=$('#Select').val()){				
					if(inps5[i].value!=$('#currency2').val()){
						if(inps5[i].value!=$('#currency3').val()){
							currcheck = "1";
						};
					};
				}
				
				if (currcheck=="1"){
					errmsg="Mata Uang Baris ke " + (i+1) + " Tidak Sesuai";
					break;
				};
				
				
			};
								
			if(inps4[i].value=="" && skdvendor.substring(0, 1)!="1"){
				errmsg="Nominal baris ke " + (i+1) + " belum di input";
				break;
			};
			
			if(inps4[i].value=="0" && skdvendor.substring(0, 1)!="1"){
				errmsg="Nominal baris ke " + (i+1) + " belum di input";
				break;
			};
		}
		var schk=lbl4.length-1;
		/*if (errmsg=="0"){
			for (var x = 0; x <lbl4.length; x++) {
				if(lbl4[x].checked){
					errmsg="0";
					break;
				}else{
					errmsg="Dokumen Lampiran belum di pilih";
					
				};
			}*/
			
			if (errmsg=="0"){
				var val1 = document.getElementById('rupiah').value;
				var val2 = document.getElementById('rupiah2').value;
				var val3 = document.getElementById('rupiah3').value;
				
				var $scur1=$.trim($('#curr1').val());
				var $scur2=$.trim($('#curr2').val());
				var $scur3=$.trim($('#curr3').val());
				var lblcur1 = $.trim($('#Select').val());
				var lblcur2 = $.trim($('#currency2').val());
				var lblcur3 = $.trim($('#currency3').val());
				
				var nomvendor1 = $('#lbltotalvendor').text();
				var nomvendor2 = $('#lbltotalvendor2').text();
				var nomvendor3 = $('#lbltotalvendor3').text();
				
				if(val1==""){val1="0";};			
				if(val2==""){val2="0";};			
				if(val3==""){val3="0";};
				
				if (val1.substr(0,1)=="(" && val1.substr(val1.length-1,1)==")"){
					val1 = val1.replace(/\D+/g, '');
					val1= -Math.abs(val1);	
				}else if (val1.substr(0,1)=="-"){
					val1 = val1.replace(/\D+/g, '');
					val1= -Math.abs(val1);	
				}else{
					val1 = val1.replace(/\D+/g, '');
					val1= Math.abs(val1);	
				}
				
				if (val2.substr(0,1)=="(" && val2.substr(val2.length-1,1)==")"){
					val2 = val2.replace(/\D+/g, '');
					val2= -Math.abs(val2);	
				}else if (val2.substr(0,1)=="-"){
					val2 = val2.replace(/\D+/g, '');
					val2= -Math.abs(val2);	
				}else{
					val2 = val2.replace(/\D+/g, '');
					val2= Math.abs(val2);	
				}
				
				if (val3.substr(0,1)=="(" && val3.substr(val3.length-1,1)==")"){
					val3 = val3.replace(/\D+/g, '');
					val3= -Math.abs(val3);	
				}else if (val3.substr(0,1)=="-"){
					val3 = val3.replace(/\D+/g, '');
					val3= -Math.abs(val3);	
				}else{
					val3 = val3.replace(/\D+/g, '');
					val3= Math.abs(val3);	
				}
				
				/*nomvendor1 = nomvendor1.replace(/\D+/g, '');
				nomvendor2 = nomvendor2.replace(/\D+/g, '');
				nomvendor3 = nomvendor3.replace(/\D+/g, '');*/
				if (nomvendor1.substr(0,1)=="(" && nomvendor1.substr(nomvendor1.length-1,1)==")"){
						nomvendor1 = nomvendor1.replace(/\D+/g, '');
						nomvendor1= -Math.abs(nomvendor1);	
					}else if (nomvendor1.substr(0,1)=="-"){
						nomvendor1 = nomvendor1.replace(/\D+/g, '');
						nomvendor1= -Math.abs(nomvendor1);	
					}else{
						nomvendor1 = nomvendor1.replace(/\D+/g, '');
						nomvendor1= Math.abs(nomvendor1);	
					}
					
					if (nomvendor2.substr(0,1)=="(" && nomvendor2.substr(nomvendor2.length-1,1)==")"){
						nomvendor2 = nomvendor2.replace(/\D+/g, '');
						nomvendor2= -Math.abs(nomvendor2);	
					}else if (nomvendor2.substr(0,1)=="-"){
						nomvendor2 = nomvendor2.replace(/\D+/g, '');
						nomvendor2= -Math.abs(nomvendor2);	
					}else{
						nomvendor2 = nomvendor2.replace(/\D+/g, '');
						nomvendor2= Math.abs(nomvendor2);	
					}
					
					if (nomvendor3.substr(0,1)=="(" && nomvendor3.substr(nomvendor3.length-1,1)==")"){
						nomvendor3 = nomvendor3.replace(/\D+/g, '');
						nomvendor3= -Math.abs(nomvendor3);	
					}else if (nomvendor3.substr(0,1)=="-"){
						nomvendor3 = nomvendor3.replace(/\D+/g, '');
						nomvendor3= -Math.abs(nomvendor3);	
					}else{
						nomvendor3 = nomvendor3.replace(/\D+/g, '');
						nomvendor3= Math.abs(nomvendor3);	
					}
				/*if (skdvendor.substring(0, 1)!="1"){
					if(val1>0 && val1!=nomvendor1){
						errmsg="Jumlah Nominal Mata Uang " + lblcur1 + " tidak sama...!";
						//break;
					}else if(val2>0 && val2!=nomvendor2){
						errmsg="Jumlah Nominal Mata Uang " + lblcur2 + " tidak sama...!";
						//break;
					}else if(val3>0 && val3!=nomvendor3){
						errmsg="Jumlah Nominal Mata Uang " + lblcur3 + " tidak sama...!";
						//break;
					};
				}*/
				/*if($('#jns_pembayaran').val()=="3"){
					if(val1!=nomvendor1){
						errmsg="Total Nominal Penerima Pembayaran Mata Uang " + lblcur1 + " tidak sama dengan Jumlah diatas!";
					}else if(val2>0 && val2!=nomvendor2){
						errmsg="Total Nominal Penerima Pembayaran Mata Uang " + lblcur2 + " tidak sama dengan Jumlah diatas!";
					}else if(val3>0 && val3!=nomvendor3){
						errmsg="Total Nominal Penerima Pembayaran Mata Uang " + lblcur3 + " tidak sama dengan Jumlah diatas!";
					};	
				}else{*/
				if(vendorvalidate=="0"){
					if(val1>0 && val1!=nomvendor1){
						errmsg="Total Nominal Penerima Pembayaran Mata Uang " + lblcur1 + " tidak sama dengan Jumlah diatas!";
					}else if(val2>0 && val2!=nomvendor2){
						errmsg="Total Nominal Penerima Pembayaran Mata Uang " + lblcur2 + " tidak sama dengan Jumlah diatas!";
					}else if(val3>0 && val3!=nomvendor3){
						errmsg="Total Nominal Penerima Pembayaran Mata Uang " + lblcur3 + " tidak sama dengan Jumlah diatas!";
					};
				}
				//}					
					if (errmsg=="0"){
					if(lbl4[schk].checked && $.trim($('#text1').val())==""){
						alert('Dokumen Lampiran Lainnya belum di input');
					}else if ($('#jns_pembayaran').val()=="3" && $('#arf_number').val()==""){
							alert('Nomor ARF Terkait belum di input');
					}else if ($('#jns_pembayaran').val()=="3" && ($("#chkarf").prop('checked') == false)){						
						}else if ($('#jns_pembayaran').val()=="3" && ($("#chkarf").prop('checked') == false)){						
					}else if ($('#jns_pembayaran').val()=="3" && ($("#chkarf").prop('checked') == false)){						
							alert('Lampiran copy ARF belum di beri tanda ceklist');
					}else if($('#jns_pembayaran').val()=="3" && lblcur1!=$scur1){
						alert('Jenis Mata Uang Penggunaan Uang Muka Pertama tidak sama dengan Mata Uang pada kolom Jumlah diatas');
					}else if ($('#jns_pembayaran').val()=="3" && $('#biaya').val()==""){
							alert('Jumlah Biaya Mata Uang Pertama belum di input');
					}else if ($('#jns_pembayaran').val()=="3" && $('#uangmuka').val()==""){
							alert('Jumlah Uang Muka belum di input');
						}else if($('#jns_pembayaran').val()=="3" && struangmuka2!="" && $('#biayaa').val()==""){
							alert('Jumlah Biaya Mata Uang Kedua belum di input');
						}else if($('#jns_pembayaran').val()=="3" && struangmuka3!="" && $('#biayab').val()==""){
							alert('Jumlah Biaya Mata Uang Ketiga belum di input');
						}else if($('#jns_pembayaran').val()=="3" && strrupiah!=strhasil){
						alert('Selisih Kurang/(Lebih) Mata Uang Pertama tidak sama dengan Nilai pada kolom Jumlah diatas');
					}else if($('#jns_pembayaran').val()=="3" && lblcur2!=$scur2){
						alert('Jenis Mata Uang Penggunaan Uang Muka Kedua tidak sama dengan Mata Uang pada kolom Jumlah diatas');
					}else if($('#jns_pembayaran').val()=="3" && strrupiah2!=strhasila){
						alert('Selisih Kurang/(Lebih) Mata Uang Kedua tidak sama dengan Nilai pada kolom Jumlah diatas');
					}else if($('#jns_pembayaran').val()=="3" && lblcur3!=$scur3){
						alert('Jenis Mata Uang Penggunaan Uang Muka Ketiga tidak sama dengan Mata Uang pada kolom Jumlah diatas');
					}else if($('#jns_pembayaran').val()=="3" && strrupiah3!=strhasilb){
						alert('Selisih Kurang/(Lebih) Mata Uang Ketiga tidak sama dengan Nilai pada kolom Jumlah diatas');
					}else{
						<?php foreach ($getID as $key) { ?>
						  var link = "<?php echo base_url('Home/formfinished/'.$key->id_payment);?>";
						<?php } ?>
						  
						if(save_method=="edit"){
							url = "<?php echo base_url('Home/saveeditpayment')?>"; 
						}else{
							url = "<?php echo base_url('Home/saveaddpayment')?>";  
						}
					   
						$.ajax({
						  url : url,
						  type : "POST",
						  data: $("#formadd").serialize(),
						  dataType: "JSON",
						  success: function(data){ // Ketika proses pengiriman berhasil     
							alert('Data Berhasil Di simpan');   
							save_method="edit";
							$("#id_payment").val(data);
							//window.location = link;
							window.location ="<?php echo base_url('Home/formfinished');?>/"+data;
						},      
							     
						  error: function (data)
						  {
							console.log(data);
							alert('Error adding / update data');
						  }
						});
					}
				}else{
					alert(errmsg);
				}
			}else{
				alert(errmsg);
			}
		/*}else{
			alert(errmsg);
		}*/
	}
    
}

function chgarf(param){
	//var $id=param.replace(new RegExp(' ','g'),' ')
	if (param){
		$.ajax({
		  url : "<?php echo base_url('tri/getdetilarf')?>/"+param,
		  type : "GET",
		  dataType: "JSON",
		  success: function(data){
				console.log(data);
				$('#tujuanPenggunaan').text(data[0].label1);
				$('#Select').val(data[0].currency);
				$('#currency2').val(data[0].currency2);
				$('#currency3').val(data[0].currency3);
				$('#cr1').val(data[0].currency);
				$('#cr2').val(data[0].currency2);
				$('#cr3').val(data[0].currency3);
				$('#curr1').val(data[0].currency);
				$('#curr2').val(data[0].currency2);
				$('#curr3').val(data[0].currency3);
				$('#uangmuka').val('('+data[0].label2+')');
				$('#uangmukaa').val('('+data[0].jumlah2+')');
				$('#uangmukab').val('('+data[0].jumlah3+')');
				$('#cr4').val(data[0].currency);
				$('#cr5').val(data[0].currency2);
				$('#cr6').val(data[0].currency3);
				$('#lblcur1').text(data[0].currency);
				$('#lblcur2').text(data[0].currency2);
				$('#lblcur3').text(data[0].currency3);
				
			},      
		  error: function (data)
			{
				console.log(data);
				alert('Error adding / update data');
			}
		});
	
	}
}

var countervendor=1;
var szcountervendor;

function AddIndeks(){
		szcountervendor = parseInt(countervendor)+1;
		var zstr="'tr" + szcountervendor + "'";
		var xpenerimavendor="'penerimavendor" + szcountervendor + "'";
		var xkodevendor="'kodevendor" + szcountervendor + "'";
		var xnamavendor="'namavendor" + szcountervendor + "'";
		var xbankvendor="'bankvendor" + szcountervendor+ "'";
		var xrekeningvendor="'rekeningvendor" + szcountervendor + "'";
		var xnominalvendor="nominalvendor" + szcountervendor ;
		var newTextBoxDiv = $(document.createElement('tr')).attr("id", 'tr' + szcountervendor);
		var strhtml='';	
		var arrkdvendor;
		strhtml=strhtml + '<td class="col-md-4"><select id="penerimavendor'+szcountervendor+'" onchange="fung('+xpenerimavendor+','+xkodevendor+','+xnamavendor+','+szcountervendor+')" class="form-control select2" name="penerimavendor[]" > ' ;
		strhtml=strhtml + '<option value="">--Choose--</option> ';
		
		strvendor =document.getElementById("strvendor").value;
		arrvendor = strvendor.split(";");
	
		for (i=0;i<arrvendor.length; i++){
			arrkdvendor=arrvendor[i].split(" - ");
			strhtml=strhtml + '<option value="' + arrkdvendor[1] + '">' + arrvendor[i] + '</option>';
		}
		strhtml=strhtml + '</select><input id="kodevendor'+szcountervendor+'" type="hidden" name="kodevendor[]"  /><input id="namavendor'+szcountervendor+'" type="hidden" name="namavendor[]"  /></td>'
		
		strhtml=strhtml + '<td class="col-md-2"><select id="bankvendor'+szcountervendor+'" class="form-control select2" name="bankvendor[]" onchange="drpbank('+xbankvendor+','+xrekeningvendor+','+szcountervendor+')" > ' ;
		strhtml=strhtml + '<option value="">--Choose--</option> ';
		
		strbank =document.getElementById("strbank").value;
		arrbank = strbank.split(";");
	
		for (i=0;i<arrbank.length; i++){
			strhtml=strhtml + '<option value="' + arrbank[i] + '">' + arrbank[i] + '</option>';
		}
		strhtml=strhtml + '</select><input id="sbankvendor'+szcountervendor+'" type="hidden" name="sbankvendor[]"  /></td>';
		
		strhtml=strhtml + '<td><input style="height:28px" id="rekeningvendor'+szcountervendor+'" type="text" class="form-control" name="rekeningvendor[]" placeholder="Enter Text" ></td> ' ;
		
		strhtml=strhtml + '<td><select style="height:28px" id="currencyvendor'+szcountervendor+'" class="form-control" onchange="drpcurrency('+szcountervendor+')" name="currencyvendor[]" > ' ;
		strhtml=strhtml + '<option value="">Pilih Mata Uang</option> ';
		strcurrency =document.getElementById("strcurrency").value;
		arrcurrency = strcurrency.split(";");
	
		for (i=0;i<arrcurrency.length; i++){
			strhtml=strhtml + '<option value="' + arrcurrency[i] + '">' + arrcurrency[i] + '</option>';
		}
		strhtml=strhtml + '</select><input id="scurrencyvendor'+szcountervendor+'" type="hidden" name="scurrencyvendor[]"  /></td>';
		
		
		strhtml=strhtml + '<td><input style="height:28px;text-align:right;" class="form-control" id="'+xnominalvendor+'" name="nominalvendor[]" onblur="formatnominalvendor('+szcountervendor+')" onkeyup="gettotalvendor()" type="text" value="0"></td>' +
						  '<td><span class="btn btn-danger btn-xs" title="Hapus Baris" name="removeButton" onclick="RemoveIndeks(' + zstr +')"> ' +
						  '<i class="glyphicon glyphicon-minus"></i></span></td>';
		
		newTextBoxDiv.after().html(strhtml);
				
		$('#show1 tbody').append(newTextBoxDiv);
		$('#txtcountervendor').val(szcountervendor);
		
		countervendor++;		
		$('#penerimavendor'+szcountervendor).select2();
		$('#bankvendor'+szcountervendor).select2();
		
	}
			
    $('#penerimavendor1').select2(); 
	$('#bankvendor1').select2();  
	$('#arf_number').select2();  
	
	   
	function RemoveIndeks(param){
		$('#'+param ).remove();		
		countervendor--;
		$('#txtcountervendor').val(countervendor);		
		gettotalvendor();
		/*var itotal=0;
		var inps = document.getElementsByName('nominalvendor[]');
		for (var i = 0; i <inps.length; i++) {
			var inp=inps[i];
			var xj=inp.value;
			var yz=xj.replace(/[^,\d]/g, '').toString();
			itotal = itotal+parseFloat(yz);
		}
		//alert(itotal.toString());
		$('#lbltotalvendor').text(formatRupiah(itotal.toString()));		*/
    }
	
	function getnominal1(){
		var jml1 = document.getElementsByName('label2');
		var x = document.getElementById('rupiah').value;
		var get_x = x.replace(/\D+/g, '');
			if ((x.substr(0,1)=="(" && x.substr(x.length-1,1)==")")|| x.substr(0,1)=="-"){		
				get_x= -Math.abs(get_x);		
			}else{
				get_x= Math.abs(get_x);		
			}
		
		var errmsg = '0';
		var curr= document.getElementById('Select').value;		
		if (curr.trim()==''){
			alert("Mata Uang Harus Dipilih!");
		}else{
			for (var i = 0; i <jml1.length; i ++){
				var inp1=jml1[i];
				var xj1=inp1.value.trim();

				if(xj1.substr(0,1)=="0" && xj1.length >1){
					xj1=xj1.substr(1,xj1.length);
					jml1[i].value=formatRupiah(xj1.replace(/[^,\d]/g, '').toString());
				}
			}
			
			var bilangan= ''+Math.abs(get_x)+'';
	  
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
			
			// alert(matauang);
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
			
			if(hasil<0){
				kalimat="(" + kalimat + ") ";
			}
			if(hasil==0){
				kalimat="Nol ";
			}
			
			document.getElementById("terbilang").value=kalimat+muncul;
		}
	}
	function get2nominal2(){
		var jml2 = document.getElementsByName('jumlah2');
		var x2 = document.getElementById('rupiah2').value;
		var get_x2 = x2.replace(/\D+/g, '');
			if ((x2.substr(0,1)=="(" && x2.substr(x2.length-1,1)==")")|| x2.substr(0,1)=="-"){		
				get_x2= -Math.abs(get_x2);		
			}else{
				get_x2= Math.abs(get_x2);		
			}

		var errmsg = '0';
		var curr= document.getElementById('currency2').value;		
		if (curr.trim()==''){
			alert("Mata Uang Harus Dipilih!");
		}else{
			for (var a = 0; a <jml2.length; a ++){
				var inp2=jml2[a];
				var xj2=inp2.value.trim();

				if(xj2.substr(0,1)=="0" && xj2.length >1){
					xj2=xj2.substr(1,xj2.length);
					jml2[a].value=formatRupiah(xj2.replace(/[^,\d]/g, '').toString());
				}
			}

			var bilangan= ''+Math.abs(get_x2)+'';
	  
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
			
			var matauang = document.getElementById("currency2").value;
			// var namamatauang =String(matauang);

			// var splitCur []  		= namamatauang.split("-");
			
			// alert(matauang);
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
			
			if(hasil<0){
				kalimat="(" + kalimat + ") ";
			}
			if(hasil==0){
				kalimat="Nol ";
			}
			document.getElementById("terbilang2").value=kalimat+muncul;			
		}
	}
	
	function getnominal3(){
		var jml3 = document.getElementsByName('jumlah3');
		var x3 = document.getElementById('rupiah3').value;
		var get_x3 = x3.replace(/\D+/g, '');
			if ((x3.substr(0,1)=="(" && x3.substr(x3.length-1,1)==")")|| x3.substr(0,1)=="-"){		
				get_x3= -Math.abs(get_x3);		
			}else{
				get_x3= Math.abs(get_x3);		
			}
		
		var errmsg = '0';
		var curr= document.getElementById('currency3').value;		
		if (curr.trim()==''){
			alert("Mata Uang Harus Dipilih!");
		}else{
			for (var d = 0; d <jml3.length; d ++){
				var inp3=jml3[d];
				var xj3=inp3.value.trim();

				if(xj3.substr(0,1)=="0" && xj3.length >1){
					xj3=xj3.substr(1,xj3.length);
					jml3[d].value=formatRupiah(xj3.replace(/[^,\d]/g, '').toString());
				}
			}

			var bilangan= ''+Math.abs(get_x3)+'';
	  
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
			
			var matauang = document.getElementById("currency3").value;
			// var namamatauang =String(matauang);

			// var splitCur []  		= namamatauang.split("-");
			
			// alert(matauang);
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
			
			if(hasil<0){
				kalimat="(" + kalimat + ") ";
			}
			if(hasil==0){
				kalimat="Nol ";
			}
			
			document.getElementById("terbilang3").value=kalimat+muncul;
			
		}
	}
	function gettotalvendor(){
		var itotal1=0;
		var itotal2=0;
		var itotal3=0;
		var inps = document.getElementsByName('nominalvendor[]');
		var inpscur = document.getElementsByName('currencyvendor[]');
		var curr1 = document.getElementById('Select').value;
		var curr2 = document.getElementById('currency2').value;
		var curr3 = document.getElementById('currency3').value;
		var kdv = document.getElementsByName('kodevendor[]');
		var jml1 = document.getElementById('rupiah');
		var jml2 = document.getElementById('rupiah2');
		var jml3 = document.getElementById('rupiah3');
		
		/*var inp1=jml1;//[i];
		var inp2=jml2;//[i];
		var inp3=jml3;//[i];*/
		var xj1=jml1.value.trim();//inp1.value.trim();
		var xj2=jml2.value.trim();//inp2.value.trim();
		var xj3=jml3.value.trim();//inp3.value.trim();
			
		var errmsg = '0';
		for (var i = 0; i <inps.length; i++) {
			var inp=inps[i];
			var inpcur=inpscur[i];
			var inpcurX=inpcur.value;
			var xj=inp.value.trim();
			var kdvX=kdv[i].value;
					

			if(xj.substr(0,1)=="0" && xj.length >1){
				xj=xj.substr(1,xj.length);
				//inps[i].value=formatRupiah(xj.replace(/[^,\d]/g, '').toString());
			}
			
			if(kdvX.substr(0,1)!="1"){
				if(inpcurX.trim()==curr1.trim() && curr1.trim()!=""){
					errmsg="0";
				}else if(inpcurX.trim()==curr2.trim() && curr2.trim()!=""){
					errmsg="0";
				}else if(inpcurX.trim()==curr3.trim() && curr3.trim()!=""){
					errmsg="0";
				}else if(inpcurX.trim()==""){
					errmsg="Mata Uang pada baris ke "+ (i+1) +" Harus Dipilih";
				}else{
					errmsg="Mata Uang pada baris ke "+ (i+1) +" Tidak Sesuai";
				}
			}
			if(errmsg=="0"){
				//var yz=xj.replace(/[^,\d]/g, '').toString();
				var yz=0;
				if(xj.substr(0,1)=="-" && xj.length >1){
					yz=-Math.abs(xj.replace(/[^,\d]/g, '').toString());
					inps[i].value="-" + formatRupiah(yz.toString());
				}else if(xj.substr(0,1)=="-" && xj.length==1){
					yz=0;
					inps[i].value=xj;
				}else{
					yz=Math.abs(xj.replace(/[^,\d]/g, '').toString());
					inps[i].value=formatRupiah(yz.toString());
				}
				
				if(inpcurX.trim()==curr1.trim() && inpcurX.trim()!=""){
					if (yz==""){
						itotal1 = itotal1+0;
					}else{
						itotal1 = itotal1+parseFloat(yz);
					}
				}else if(inpcurX.trim()==curr2.trim() && inpcurX.trim()!=""){
					if (yz==""){
						itotal2 = itotal2+0;
					}else{
						itotal2 = itotal2+parseFloat(yz);
					}
				}else if(inpcurX.trim()==curr3.trim() && inpcurX.trim()!=""){
					if (yz==""){
						itotal3 = itotal3+0;
					}else{
						itotal3 = itotal3+parseFloat(yz);
					}
				}
				//inps[i].value=formatRupiah(yz.toString());
			}else{
				alert(errmsg);
				break;
			}				
		}
		if(itotal1<0){
			$('#lbltotalvendor').text("(" + formatRupiah(itotal1.toString()) + ")");
		}else if(itotal1==0){
			if($('#lblcur1').text()==""){
				$('#lbltotalvendor').text("");
			}else{
				$('#lbltotalvendor').text("0");
			}
		}else{
			$('#lbltotalvendor').text(formatRupiah(itotal1.toString()));
		}
		if(itotal2<0){
			$('#lbltotalvendor2').text("(" + formatRupiah(itotal2.toString()) + ")");
		}else if(itotal2==0){
			if($('#lblcur2').text()==""){
				$('#lbltotalvendor2').text("");
			}else{
				$('#lbltotalvendor2').text("0");
			}
		}else{
			$('#lbltotalvendor2').text(formatRupiah(itotal2.toString()));			
		}
		if(itotal3<0){
			$('#lbltotalvendor3').text("(" + formatRupiah(itotal3.toString()) + ")");
		}else if(itotal3==0){
			if($('#lblcur3').text()==""){
				$('#lbltotalvendor3').text("");
			}else{
				$('#lbltotalvendor3').text("0");
			}
		}else{
			$('#lbltotalvendor3').text(formatRupiah(itotal3.toString()));
		}		
    }
	
	function drpbank(param1,param2,param3){
		
	  var data = document.getElementById(""+param1).value; 
	  var vendor = document.getElementById("kodevendor"+param3).value; 
	  if(vendor.substr(0,1)=="1"){ // || vendor.substr(0,1)=="3"
		  $("#"+param2).prop( "readonly", true );
	  }else{
		  if(data=="Tunai"){
			  $("#"+param2).val("");
			  $("#"+param2).prop( "readonly", true );
		  }else{
			  $("#"+param2).prop( "readonly", false );
		  }	 
	  }	

		$("#sbankvendor"+param3).val(data);
	  
	}
	
	function drpcurrency_old(param1){
		
	  $("#scurrencyvendor"+param1).val($("#currencyvendor"+param1).val());	  
	   	//gettotalvendor();
		var itotal1=0;
		var itotal2=0;
		var itotal3=0;
		var inps = document.getElementsByName('nominalvendor[]');
		var inpscur = document.getElementsByName('scurrencyvendor[]');//document.getElementsByName('currencyvendor[]');
		var curr1 = document.getElementById('Select').value;
		var curr2 = document.getElementById('currency2').value;
		var curr3 = document.getElementById('currency3').value;
		var kdv = document.getElementsByName('kodevendor[]');
		var jml1 = document.getElementById('rupiah');
		var jml2 = document.getElementById('rupiah2');
		var jml3 = document.getElementById('rupiah3');
		
		var xj1=jml1.value.trim();//inp1.value.trim();
		var xj2=jml2.value.trim();//inp2.value.trim();
		var xj3=jml3.value.trim();//inp3.value.trim();
			
		var errmsg = '0';
		for (var i = 0; i <inps.length; i++) {
			var inp=inps[i];
			var inpcur=inpscur[i];
			var inpcurX=inpcur.value;
			var xj=inp.value.trim();
			var kdvX=kdv[i].value;
					

			if(xj.substr(0,1)=="0" && xj.length >1){
				xj=xj.substr(1,xj.length);
				inps[i].value=formatRupiah(xj.replace(/[^,\d]/g, '').toString());
			}
			/*if(xj1.substr(0,1)=="0" && xj1.length >1){
				xj1=xj1.substr(1,xj1.length);
				jml1[i].value=formatRupiah(xj1.replace(/[^,\d]/g, '').toString());
			}
			if(xj2.substr(0,1)=="0" && xj2.length >1){
				xj2=xj2.substr(1,xj2.length);
				jml2[i].value=formatRupiah(xj2.replace(/[^,\d]/g, '').toString());
			}if(xj3.substr(0,1)=="0" && xj3.length >1){
				xj3=xj3.substr(1,xj3.length);
				jml3[i].value=formatRupiah(xj3.replace(/[^,\d]/g, '').toString());
			}*/
			if(kdvX.substr(0,1)!="1"){
				if(inpcurX.trim()==curr1.trim() && curr1.trim()!=""){
					errmsg="0";
				}else if(inpcurX.trim()==curr2.trim() && curr2.trim()!=""){
					errmsg="0";
				}else if(inpcurX.trim()==curr3.trim() && curr3.trim()!=""){
					errmsg="0";
				}else if(inpcurX.trim()==""){
					errmsg="Mata Uang Pada Baris ke "+ (i+1) +" Harus Dipilih";
				}else{
					errmsg="Mata Uang Pada Baris ke "+ (i+1) +" Tidak Sesuai!";
				}
			}
			if(errmsg=="0"){
				var yz=xj.replace(/[^,\d]/g, '').toString();
				if(inpcurX.trim()==curr1.trim() && inpcurX.trim()!=""){
					if (yz==""){
						itotal1 = itotal1+0;
					}else{
						itotal1 = itotal1+parseFloat(yz);
					}
				}else if(inpcurX.trim()==curr2.trim() && inpcurX.trim()!=""){
					if (yz==""){
						itotal2 = itotal2+0;
					}else{
						itotal2 = itotal2+parseFloat(yz);
					}
				}else if(inpcurX.trim()==curr3.trim() && inpcurX.trim()!=""){
					if (yz==""){
						itotal3 = itotal3+0;
					}else{
						itotal3 = itotal3+parseFloat(yz);
					}
				}
				inps[i].value=formatRupiah(yz.toString());
			}else{
				alert(errmsg);
				break;
			}				
		}
		$('#lbltotalvendor').text(formatRupiah(itotal1.toString()));
		$('#lbltotalvendor2').text(formatRupiah(itotal2.toString()));
		$('#lbltotalvendor3').text(formatRupiah(itotal3.toString()));
		
	}
	function formatnominalvendor(param1){
		var fnom=$("#nominalvendor"+param1).val();
		if(fnom.substring(0, 1)=="-"){
			$("#nominalvendor"+param1).val("(" + fnom.substring(1, fnom.length) + ")");
		}
	}	
		
	function drpcurrency(param1){
		$("#scurrencyvendor"+param1).val($("#currencyvendor"+param1).val());	  
		gettotalvendor();
	}	
	
	function drpcurrencyvendor(param){
		
		var curr1 = document.getElementById('Select').value;
		var curr2 = document.getElementById('currency2').value;
		var curr3 = document.getElementById('currency3').value;
		var curvendor =$('#currencyvendor'+param).val();
		if(curvendor!=curr1){
			alert('Mata Uang agar dapat dipilih terlebih dahulu');
		}else if(curvendor!=curr2){
			alert('Mata Uang agar dapat dipilih terlebih dahulu');
		}else if(curvendor!=curr3){
			alert('Mata Uang agar dapat dipilih terlebih dahulu');
		}
	  
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