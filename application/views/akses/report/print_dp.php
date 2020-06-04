<html>
<body onload="window.print()">
<style type="text/css">
@print {
    @page :footer {
        display: none
    }

    @page :header {
        display: none
    }
}
</style>
<!-- <style type="text/css">
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
      .page {
        width: 210mm;
        min-height: 297mm;
        padding: 20mm;
        margin: 10mm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
      }
      @page {
        size: A4;
        margin: 250mm;
        margin-right: 450mm;
      }
      @media print {
          html, body {
              width: 210mm;
              height: 297mm;        
          }
          .page {
              margin: 0;
              border: initial;
              border-radius: initial;
              width: initial;
              min-height: initial;
              box-shadow: initial;
              background: initial;
              page-break-after: always;
          }
      }      
    }
</style>  -->
 
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
        <form id="form" method="post" action="Dashboard/draftprintdp" onsubmit="update()">

        <?php foreach ($ppayment as $row) { ?>
          
          <section class="content">
            <div class="row">
              <div class="col-xs-12">
              <!-- <div id="printThis"> -->
                <!-- /.box -->
                <div class="box">
                <input type="hidden" name="id_payment" value="<?php echo $row->id_payment; ?>" >
                <input type="hidden" name="id_user" value="<?php echo $row->id_user; ?>" >
                  <div class="box-header with-border">
                  
                      <left><img src="<?php echo base_url(); ?>/assets/dashboard/images/logo.png" width="150px" alt="Logo Images"></left>
                      <center><b><u><font size="2"> SURAT PERMINTAAN PROSES PEMBAYARAN</u></b></center>
                    
                    <table width="100%">
                      <tbody>
                        <tr>
                        <td> </td>
                          <td align="center"><font size="1"><b>No   : <?php echo $row->nomor_surat;?></b></td>
                        </tr>
                      </tbody>
                    </table>

                    <table width="100%">
                        <?php 
                            $test1 = $row->jenis_pembayaran;
                            $test2 = explode(";", $test1);
                            $test3 = count($test2);
                                    
                            for($b=0; $b<$test3; $b++){
                            if($test2[$b] == '1'){
                            $xxi1 .= "1";
                            }
                            
                            if($test2[$b] == '2'){
                            $xxi2 .= "2";
                            }
                            
                            if($test2[$b] == '3'){
                            $xxi3 .= "3";
                            }
                            
                            if($test2[$b] == '4'){
                            $xxi4 .= "4";
                            }

                            if($test2[$b] == '5'){
                              $xxi5 .= "5";
                            }
                            }
                        ?>
                      <tr>
                        <td align="center"><font size="1"><b>Jenis Pembayaran (pilih salah satu):</b></td>
                        <td> <?php if ($row->jenis_pembayaran == 2 || $row->jenis_pembayaran == 3 ) { $cek="checked" ;
                          }else{
                                $cek=" " ;
                          } ?>
                         <font size="1"> <input id="auto" <?php echo $cek;?> type="checkbox" disabled>Uang Muka/Advance<br>
                        </td>

                        <td><font size="1">
                          <input id="check" onclick="hide()" type="checkbox" name="jenis_pembayaran[]" value="4" <?php echo $xxi4=="4"? 'checked':''?> disabled>Non-Uang Muka/Non-Advance<br>
                        </td>
                        <td><font size="1">
                          <input id="checked2" onclick="hide()" type="checkbox" name="jenis_pembayaran[]" value="5" <?php echo $xxi5=="5"? 'checked':''?> disabled> Cash Received</input><br>
                        </td>
                      </tr>

                      <tr>
                        <td></td>
                        <td><font size="1">
                          <input id="checkrequest" onclick="checkUangMuka()" type="checkbox" name="jenis_pembayaran[]" value="2" <?php echo $xxi2=="2"? 'checked':''?> disabled>Permintaan Uang Muka/Request<br>
                        <td>
                      </tr>
                      
                      <tr>
                        <td></td>
                        <td><font size="1">
                          <input id="checksettlement" onclick="checkUangMuka2()"type="checkbox" name="jenis_pembayaran[]" value="3" <?php echo $xxi3=="3"? 'checked':''?> disabled>Pertanggung Jawaban Uang Muka/Settlement<br>                            
                        </td>
                      </tr>                        
                    </table>

                    <table width="100%">
                      <tbody>                            
                      <tr>
                      <td><font size="1">Kepada : Divisi CSF</td>
                      <td align="right"><font size="1">Tanggal : <?php echo $row->tanggal; ?></td>
                      </tr>
                      <tr>
                      <td><font size="1">Dari : </td>
                      </tr>             
                      <tr>
                        <td><font size="1">&nbsp;  Nama Pemohon : &nbsp; <?php echo $row->display_name;?></td>
                      </tr> 
                      <tr>
                        <td><font size="1">&nbsp;  Direktorat/Divisi Pemohon : &nbsp; <?php echo $row->division_id;?></td>
                      </tr>                                                   
                      </tbody>
                    </table>

                    <hr style=" border: 1px solid #000;">

                    <table width="100%">
                      <tbody>
                      <p><font size="1">Mohon dapat dilakukan proses pembayaran / pengembalian uang dengan perincian sebagai berikut : </p>
                      <tr>
                        <td><font size="1"><b>- Tujuan Penggunaan </b></td>
                        <td><font size="1"><b> : </b></td>
                        <td colspan="8"><font size="1">&nbsp; <?php echo $row->label1; ?></td>
                        
                      </tr>
                      <tr>
                        <td><font size="1"><b>- Jumlah :</b></td>
                        <td><font size="1"><b> : </b></td>

                        <td><font size="1"> <?php echo $row->currency;?> </td>
                        <td><font size="1"><?php echo $row->label2; ?></td>

                        <td><font size="1"> <?php echo $row->currency2;?> </td>
                        <td><font size="1"><?php echo $row->jumlah2; ?></td>

                        <td><font size="1"> <?php echo $row->currency3;?> </td>
                        <td><font size="1"><?php echo $row->jumlah3; ?></td>
                      </tr>
                      </tbody>
                    </table>

                    <?php if ($row->jenis_pembayaran == 3 || $row->jenis_pembayaran == 4 || $row->jenis_pembayaran == 5) { $choosed="style='display: none'" ;
                    }else{
                          $choosed="style=''" ;
                    } ?>

                    <table id="choose" <?php echo $choosed;?> style="font-family: calibri;" width="100%">
                      <tbody>
                      <tr>
                        <td width="48.5%"><font size="1"><b>- Perkiraan Tanggal Selesai Pekerjaan/Terima Barang</b>
                        	<br>
                        </td>
                        <td align="right"><font size="1"><b> : </b></td>
                        <td colspan="8" width="65%"><font size="1"><?php echo $row->label3; ?></td>     
                      </tr> 
                      <tr>
                        <td><i><font size="1">(Hanya diisi untuk jenis pembayaran <i><b>Permintaan Uang Muka/Request)</i></td>
                      </tr>                                                  
                      </tbody>
                    </table>

                    <table width="100%">
                      <tbody>
                      <font size="1"><b><p>- Penyedia Barang / Jasa Penerima Pembayaran</p></b> 
                      <tr>
                        <td><font size="1">&nbsp; Nama : &nbsp; <?php echo $row->penerima;?></td>
                      </tr>
                      <tr>  
                        <td><font size="1">&nbsp; Kode Vendor : &nbsp; <?php echo $row->vendor;?></td>
                        <td><font size="1">&nbsp; Bank : &nbsp; <?php echo $row->akun_bank;?>
                        </td>
                      </tr>
                      <tr>
                        <td>                            
                        <td><font size="1">&nbsp; Nomor Rekening : &nbsp; <?php echo $row->no_rekening; ?></td>                                
                      </tr>
                      <tr>
                        <td colspan="2"><font size="1"><i>(diisi dengan mengacu pada vendor master data-Procurement)</i></td>
                      </tr>
                      </tbody>
                    </table>

                    <table width="100%">
                    <?php 
                          $testl1 = $row->label4;
                          $testl2 = explode(";", $testl1);
                          $testl3 = count($testl2);
                                 
                          for($i=0; $i<$testl3; $i++){
                            if($testl2[$i] == 'Bukti Transaksi Asli (a.l : Invoice/Kuitansi, Struk, Nota, Dll)'){
                              $xxii1 .= "Bukti Transaksi Asli (a.l : Invoice/Kuitansi, Struk, Nota, Dll)";
                            }
                            
                            if($testl2[$i] == 'Berita Acara Pemeriksaan (BAP)'){
                              $xxii2 .= "Berita Acara Pemeriksaan (BAP)";
                            }
                            
                            if($testl2[$i] == 'Berita Acara Pemeriksaan (BAST)'){
                              $xxii3 .= "Berita Acara Pemeriksaan (BAST)";
                            }
                            
                            if($testl2[$i] == 'Bukti Penerimaan Jasa/Barang (Delivery Order)'){
                              $xxii4 .= "Bukti Penerimaan Jasa/Barang (Delivery Order)";
                            }
                            if($testl2[$i] == 'Copy Dokumen Permintaan Barang/Jasa terkait (PR/Memo)'){
                              $xxii5 .= "Copy Dokumen Permintaan Barang/Jasa terkait (PR/Memo)";
                            }
                            
                            if($testl2[$i] == 'Copy PO/SPK'){
                              $xxii6 .= "Copy PO/SPK";
                            }
                            
                            if($testl2[$i] == 'Copy Kontrak/Perjanjian'){
                              $xxii7 .= "Copy Kontrak/Perjanjian";
                            }
                            
                            if($testl2[$i] == 'Faktur Pajak Rangkap 2'){
                              $xxii8 .= "Faktur Pajak Rangkap 2";
                            }
                            if($testl2[$i] == 'Form DGT-1 & COD (Jika kode vendor tidak tersedia)'){
                              $xxii9 .= "Form DGT-1 & COD (Jika kode vendor tidak tersedia)";
                            }
                            
                            if($testl2[$i] == 'NPWP'){
                              $xxii10 .= "NPWP";
                            }
                            
                            if($testl2[$i] == 'Lainnya (Jika ada) : Rincian Pengeluaran'){
                              $xxii11 .= "Lainnya (Jika ada) : Rincian Pengeluaran";
                            }
                          }
                      ?> 
                      <tr>
                        <td><font size="1"><b>- Lampiran Dokumen Pendukung :</b></td>
                        <td><td>
                      </tr>
                      <tr>
                        <td><font size="1">  
                          <input type="checkbox" name="label4[]" value="Bukti Transaksi Asli (a.l : Invoice/Kuitansi, Struk, Nota, Dll)" <?php echo $xxii1=="Bukti Transaksi Asli (a.l : Invoice/Kuitansi, Struk, Nota, Dll)"? 'checked':''?> disabled>Bukti Transaksi Asli (a.l : Invoice/Kuitansi, Struk, Nota, Dll)</input><br>
                        </td>
                        <td><font size="1">
                          <input type="checkbox" name="label4[]" value="Copy PO/SPK" <?php echo $xxii6=="Copy PO/SPK"? 'checked':''?> disabled>Copy PO/SPK</input><br>
                        </td>
                      </tr>
                      <tr>
                        <td><font size="1">
                          <input type="checkbox" name="label4[]" value="Berita Acara Pemeriksaan (BAP)" <?php echo $xxii2=="Berita Acara Pemeriksaan (BAP)"? 'checked':''?> disabled>Berita Acara Pemeriksaan (BAP)</input><br>
                        </td>
                        <td><font size="1">
                          <input type="checkbox" name="label4[]" value="Copy Kontrak/Perjanjian" <?php echo $xxii7=="Copy Kontrak/Perjanjian"? 'checked':''?> disabled>Copy Kontrak/Perjanjian</input><br>
                        </td>
                      </tr>
                      <tr>
                        <td><font size="1">
                          <input type="checkbox" name="label4[]" value="Berita Acara Pemeriksaan (BAST)" <?php echo $xxii3=="Berita Acara Pemeriksaan (BAST)"? 'checked':''?> disabled>Berita Acara Pemeriksaan (BAST)</input><br> 
                        </td>
                        <td><font size="1">
                          <input type="checkbox" name="label4[]" value="Faktur Pajak Rangkap 2" <?php echo $xxii8=="Faktur Pajak Rangkap 2"? 'checked':''?> disabled>Faktur Pajak Rangkap 2</input><br>
                        </td>
                      </tr>
                      <tr>
                        <td><font size="1">
                          <input type="checkbox" name="label4[]" value="Bukti Penerimaan Jasa/Barang (Delivery Order)" <?php echo $xxii4=="Bukti Penerimaan Jasa/Barang (Delivery Order)"? 'checked':''?> disabled>Bukti Penerimaan Jasa/Barang (Delivery Order)</input><br>
                        </td>
                        <td><font size="1">
                          <input type="checkbox" name="label4[]" value="Form DGT-1 & COD (Jika kode vendor tidak tersedia)" <?php echo $xxii9=="Form DGT-1 & COD (Jika kode vendor tidak tersedia)"? 'checked':''?> disabled>Form DGT-1 & COD (Jika kode vendor tidak tersedia)</input><br>
                        </td>
                      </tr>
                      <tr>
                        <td><font size="1">
                          <input type="checkbox" name="label4[]" value="Copy Dokumen Permintaan Barang/Jasa terkait (PR/Memo)" <?php echo $xxii5=="Copy Dokumen Permintaan Barang/Jasa terkait (PR/Memo)"? 'checked':''?> disabled>Copy Dokumen Permintaan Barang/Jasa terkait (PR/Memo)</input><br>
                        </td>
                        <td><font size="1">
                          <input type="checkbox" name="label4[]" value="NPWP" <?php echo $xxii10=="NPWP"? 'checked':''?> disabled>NPWP (Jika kode vendor tidak tersedia)</input><br>
                        </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td><font size="1">
                          <input id="lainnya" onclick="showInput()" type="checkbox" name="label4[]" value="Lainnya (Jika ada) : Rincian Pengeluaran" <?php echo $xxii11=="Lainnya (Jika ada) : Rincian Pengeluaran"? 'checked':''?> disabled>Lainnya (Jika ada) : Rincian Pengeluaran</input><br>
                          <?php if ($row->label4->$xxii11) { $showing="style='display: none'" ;
                          }else{ 
                                $showing="style=''" ;
                          } ?>
                            <p id="text1" <?php echo $showing;?> style="display:none" > <?php echo $row->lainnya1;?></p> <br>

                            <!-- <input id="text2" <?php echo $showing;?> type="text" class="form-control" name="lainnya2" style="display:none" value="<?php echo $row->lainnya2;?>" readonly> <br> -->
                        </td>
                      </tr>      
                    </table>

                    <br>

                    <?php if ($row->jenis_pembayaran == 2 || $row->jenis_pembayaran == 4 || $row->jenis_pembayaran == 5) { $showed="style='display: none'" ;
                    }else{
                          $showed="style=''" ;
                    } ?>
                                                
                    <table id="show" <?php echo $showed;?> width="50%">
                      <tbody>
                      <tr>
                        <td><font size="1"><b><p>Khusus diisi untuk Jenis Pembayaran Pertanggungjawaban Uang Muka/Settlement:</p></b></td>
                      </tr>  
                      <tr>
                        <td><font size="1"><b>- Nomor ARF terkait</b></td>
                        <td>:</td>
                        <td><font size="1"> &nbsp; <?php echo $row->label5;?> </td>
                        <td><input type="checkbox" name="label6" value="Lampiran copy ARF tersedia"<?php echo $row->label6=="Lampiran copy ARF tersedia"? 'checked':''?> disabled><font size="1">Lampiran copy ARF tersedia</td>
                      </tr>
                      <tr>
                        <td><font size="1"><b>- Perhitungan Penggunaan Uang Muka : <b></td>
                      </tr>
                      <tr>
                        <td>
                        <td>
                        <td><font size="1"><center><b> Curr</b></center></td>
                        <td><font size="1"><center><b> Jumlah/<i>Amount</i></b></center></td>
                      </tr>
                      <tr>  
                        <td><font size="1">Jumlah Biaya : </td>
                        <td>:</td>
                        <td> </td>
                        <td><font size="1">&nbsp; <?php echo $row->label7;?><td>
                      </tr>
                        <td><font size="1">Jumlah Uang Muka : </td>
                        <td>:</td>
                        <td> </td>
                        <td><font size="1">&nbsp; <?php echo $row->label8; ?> </td>     
                      <tr>
                        <td><font size="1">Selisih Kurang/Lebih : </td> 
                        <td>:</td>
                        <td> </td>
                        <td><font size="1">&nbsp; <?php echo $row->label9; ?></td>                               
                      </tr>                              
                      </tbody>
                    </table>          
                  
                    <table width="100%">
                    <tbody>
                      <tr>
                        <td><font size="1">Pemohon, <br><br><br><br><br></td>
                        <td><font size="1">Menyetujui, <br><br><br><br><br></td>
                      </tr>
                      <tr>
                        <td><font size="1">Nama : &nbsp; <?php echo $row->display_name?></td>
                        <?php foreach ($divhead as $divhead) { ?>
                        <td><font size="1">Nama : &nbsp; <?php echo $divhead->display_name; ?> </td>
                      </tr>
                      <tr>
                        <td><font size="1">Jabatan : &nbsp; <?php echo $row->jabatan?></td>
                        <td><font size="1">Jabatan : &nbsp;  <?php if($divhead->role_id == 4){
                                                echo "SVP"; } ?> <?php echo $divhead->division_id; ?> </td>
                        <?php } ?>                        
                      </tr>                            
                    </tbody>
                    </table>
                     
                    <!-- <hr style=" border: 0.5px solid #000;">
                    <h6>
                    <table border="1" width="70%">
                    <tbody>
                        <tr>
                          <td colspan="5"><font size="1"><center><b>Perhitungan Pajak (*diisi oleh CSF)</b></center></td>
                        </tr>
                        <tr>
                          <td><font size="1"><center><b>Jenis Pajak </b></center></td>
                          <td><font size="1"><center><b>Tarif </b></center></td>
                          <td width="100"><font size="1"><center><b>DPP </b></center></td>
                          <td width="100"><font size="1"><center><b>Gross Up </b></center>  </td>
                          <td><font size="1"><center><b>Pajak Terhitung </b></center>  </td>
                        </tr>
                        <tr>
                            <td><font size="1"><font size="1">PPh Pasal 21/26</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        <td></td>
                        </tr>
                        <tr>
                            <td><font size="1">PPh Pasal 22</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        <td></td>
                        </tr>
                        <tr>
                            <td><font size="1">PPh Pasal 23/26</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        <td></td>
                        </tr>
                        <tr>
                            <td><font size="1">PPh Pasal 4(2)</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        <td></td>
                        </tr>
                        <tr>
                            <td><font size="1">PPN WAPU/PPN Offshore</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>                                                          
                    </tbody>
                    </table>
                    </h6> -->
                        <?php } ?>        

                  </div>  
                </div>    

            </div>
          </section>  
        </form>                  
        <!-- /.content -->
      </div>

<!-- <footer class="main-footer">
    <div class="pull-right hidden-xs">

    </div>
    <strong>Copyright &copy; 2020 </strong>
</footer>-->


</body>
</html>
<script>

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