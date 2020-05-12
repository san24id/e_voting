<html>
<body onload="window.print()">
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
                    <h5>
                      <left><img src="<?php echo base_url(); ?>/assets/dashboard/images/logo.png" width="150px" alt="Logo Images"></left>
                      <br>
                      <center><b><u><font size="2"> SURAT PERMINTAAN PROSES PEMBAYARAN</u></b></center>
                    </h5>
                    <table width="100%">
                      <tbody>
                        <tr>
                        <td> </td>
                        <td align="center"><font size="1"><b>No   : <?php echo $row->nomor_surat;?></b></td>
              
                        <td><font size="1"><b>No ARF/ASF   :</b></td>
                        </tr>
                      </tbody>
                    </table>
                    <table width="100%">
                      <tbody>     
                        <tr>
                        <td></td>
                        <td align="center"><font size="1"><b><i>(dilengkapi oleh Pemohon)</b></td>
                        <td><font size="1"><b><i>(dilengkapi oleh CSF, coret salah satu)</b></td>
                        </tr>
                      </tbody>
                    </table>

                    <br>

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
                            }
                        ?>
                      <tr>
                      <td align="center"><font size="1"><b>Jenis Pembayaran (pilih salah satu):</b></td>
                      <td>
                        <input type="checkbox" name="jenis_pembayaran[]" value="1" <?php echo $xxi1=="1"? 'checked':''?> disabled><font size="1">Uang Muka/Advance<br>
                      </td>
                      <td>
                        <input type="checkbox" name="jenis_pembayaran[]" value="2" <?php echo $xxi2=="2"? 'checked':''?> disabled><font size="1">Permintaan Uang Muka/Request<br>
                      </td>
                      </tr>    
                      <tr>
                      <td></td>
                      <td>
                        <input type="checkbox" name="jenis_pembayaran[]" value="3" <?php echo $xxi3=="3"? 'checked':''?> disabled><font size="1">Pertanggung Jawaban Uang Muka/Settlement<br>                            
                      </td>
                      <td>
                        <input type="checkbox" name="jenis_pembayaran[]" value="4" <?php echo $xxi4=="4"? 'checked':''?> disabled><font size="1">Non-Uang Muka/Non-Advance<br>
                      </td>
                      </tr>                       
                    </table>

                    <br>

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
                        <td><font size="1"><b>- Tujuan Penggunaan :</b></td>
                        <td>
                        <td colspan="2"><font size="1">&nbsp; <?php echo $row->label1; ?></td>
                        
                      </tr>
                      <tr>
                        <td><font size="1"><b>- Jumlah :</b></td>
                        <td><select name="currency" class="form-control">
                                <option value="EUR"<?php echo $row->currency==EUR? 'selected':''?> disabled><font size="1">EUR</option>
                                <option value="GBP"<?php echo $row->currency==GBP? 'selected':''?>disabled><font size="1">GBP</option>
                                <option value="HKD"<?php echo $row->currency==HKD? 'selected':''?>disabled><font size="1">HKD</option>
                                <option value="IDR"<?php echo $row->currency==IDR? 'selected':''?>disabled><font size="1">IDR</option>
                                <option value="JPY"<?php echo $row->currency==JPY? 'selected':''?>disabled><font size="1">JPY</option>
                                <option value="KRW"<?php echo $row->currency==KRW? 'selected':''?>disabled><font size="1">KRW</option>
                                <option value="SGD"<?php echo $row->currency==SGD? 'selected':''?>disabled><font size="1">SGD</option>
                                <option value="USD"<?php echo $row->currency==USD? 'selected':''?>disabled><font size="1">USD</option>
                              </select>
                          </td>
                        <td colspan="2"><font size="1">&nbsp; <?php echo $row->label2; ?></td>
                      </tr>
                      <tr>
                        <td><font size="1"><b>- Perkiraan Tanggal :</b></td>
                        <td></td>
                        <td><font size="1"> &nbsp; <?php echo $row->label3; ?></td>     
                      </tr>
                      <tr>
                        <td colspan="2"><font size="1"><b>Selesai Pekerjaan/Terima Barang</b> <br>(Hanya diisi untuk jenis pembayaran <i><b>Permintaan Uang Muka/Request)</b></i></td>
                      </tr>                            
                      </tbody>
                    </table>

                    <br>

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

                    <br>

                    <table width="100%">
                      <tr>
                        <td><font size="1"><b>- Lampiran Dokumen Pendukung :</b></td>
                        <td><td>
                      </tr>
                      <tr>
                        <td><font size="1">  
                        <?php if($row->label4){
                            echo $row->label4;
                        }?>
                        </td>
                      <tr>      
                    </table>

                    <br>

                    <table width="100%">
                      <tbody>
                      <font size="1"><b><p>Khusus diisi untuk Jenis Pembayaran Pertanggungjawaban Uang Muka/Settlement:</p></b>
                      <tr>
                        <td><font size="1"><b>- Nomor ARF terkait : </b></td>
                        <td><font size="1">
                            &nbsp; <?php echo $row->label5;?>                          
                        </td>
                        <td><input type="checkbox" name="label6" value="Lampiran copy ARF tersedia"<?php echo $row->label6=="Lampiran copy ARF tersedia"? 'checked':''?> disabled><font size="1">Lampiran copy ARF tersedia</td>
                      </tr>
                      <tr>
                        <td><font size="1"><b>- Perhitungan Penggunaan Uang Muka : <b></td>
                      </tr>
                      <tr>
                        <td>
                        <td><font size="1"><b> Curr</b></td>
                        <td><font size="1"><b> Jumlah/<i>Amount</i></b></td>
                      </tr>
                      <tr>  
                        <td><font size="1">Jumlah Biaya : </td>
                        <td>
                        <td><font size="1">&nbsp; <?php echo $row->label7;?><td>
                      </tr>
                        <td><font size="1">Jumlah Uang Muka : </td>
                        <td>
                        <td><font size="1">&nbsp; <?php echo $row->label8; ?> </td>     
                      <tr>
                        <td><font size="1">Selisih Kurang/Lebih : </td> 
                        <td>
                        <td><font size="1">&nbsp; <?php echo $row->label9; ?></td>                               
                      </tr>                              
                      </tbody>
                    </table>
                    
                    <br>
                    
                    <table width="100%">
                    <tbody>
                      <tr>
                        <td><font size="1">Pemohon, <br><br><br><br></td>
                        <td><font size="1">Menyetujui, <br><br><br><br></td>
                      </tr>
                      <tr>
                        <td><font size="1">Nama : &nbsp; <?php echo $row->display_name?></td>
                        <?php foreach ($divhead as $divhead) { ?>
                        <td><font size="1">Nama : &nbsp; <?php echo $divhead->display_name; ?> </td>
                      </tr>
                      <tr>
                        <td><font size="1">Jabatan : &nbsp; <?php echo $row->jabatan?></td>
                        <td><font size="1">Jabatan : &nbsp;  <?php if($divhead->role_id == 4){
                                                echo "Division Head of"; } ?> <?php echo $divhead->division_id; ?> </td>
                        <?php } ?>                        
                      </tr>                            
                    </tbody>
                    </table>
                     
                    <hr style=" border: 0.5px solid #000;">
                    <h6>
                    <table border="1" width="100%">
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
                    </h6>
                        <?php } ?>        

                  </div>  
                </div>    

                <!-- <div class="box">
                  <div class="box-header with-border">
                    <a class="btn btn-warning" href="Home" role="button">Cancel</a>  
                    <button type="button" class="btn btn-primary" target="_blank" onclick="printThis()">Print</button>
                  </div>
                </div>                                                  -->
            </div>
          </section>  

        <!-- /.content -->
      </div>

<!-- <footer class="main-footer">
    <div class="pull-right hidden-xs">

    </div>
    <strong>Copyright &copy; 2020 </strong>
</footer>-->


</body>
</html>
<!-- 
<script>
    function printThis() {
        window.print();
    }
</script> -->