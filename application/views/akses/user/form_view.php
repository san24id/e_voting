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
        <!-- <section class="content-header">
          <h1>
            EDIT DATA PAYMENT
            <small></small>
          </h1>
        </section> -->
        <!-- Main content -->
        <form id="form" method="post" action="Home/updatepayment" onsubmit="update()">

          <?php foreach ($ppayment as $row){ ?>          
            <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <!-- /.box -->
                <div class="box">
                <input type="hidden" name="id_payment" value="<?php echo $row->id_payment; ?>" >
                <input type="hidden" name="id_user" value="<?php echo $row->id_user; ?>" >
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
                        <td align="center"><b><font size="3" style="font-family: calibri;">No   : <?php echo $row->nomor_surat;?></b></td>
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

                    <table style="font-family: calibri;" width="50%">
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
                      <td align="center"><b>Jenis Pembayaran (pilih salah satu):</b></td>
                      <td>
                        <input type="checkbox" name="jenis_pembayaran[]" value="1" <?php echo $xxi1=="1"? 'checked':''?> disabled>Uang Muka/Advance<br>
                      </td>
                      <td>
                        <input type="checkbox" name="jenis_pembayaran[]" value="2" <?php echo $xxi2=="2"? 'checked':''?> disabled>Permintaan Uang Muka/Request<br>
                      </td>
                      </tr>    
                      <tr>
                      <td></td>
                      <td>
                        <input type="checkbox" name="jenis_pembayaran[]" value="3" <?php echo $xxi3=="3"? 'checked':''?> disabled>Pertanggung Jawaban Uang Muka/Settlement<br>                            
                      </td>
                      <td>
                        <input type="checkbox" name="jenis_pembayaran[]" value="4" <?php echo $xxi4=="4"? 'checked':''?> disabled>Non-Uang Muka/Non-Advance<br>
                      </td>
                      </tr>                       
                    </table>

                    <br>

                    <table style="font-family: calibri;" width="50%">
                      <tbody>                            
                      <tr>
                      <td>Kepada : Divisi CSF</td>
                      <td align="right">Tanggal : <?php echo $row->tanggal; ?></td>
                      </tr>
                      <tr>
                      <td>Dari : </td>
                      </tr>             
                      <tr>
                        <td>&nbsp;  Nama Pemohon : &nbsp; <?php echo $row->display_name;?></td>
                      </tr> 
                      <tr>
                        <td>&nbsp;  Direktorat/Divisi Pemohon : &nbsp; <?php echo $row->division_id;?></td>
                      </tr>                                                   
                      </tbody>
                    </table>

                    <hr style=" border: 1px solid #000;">

                    <table style="font-family: calibri;" width="75%">
                      <tbody>
                      <p>Mohon dapat dilakukan proses pembayaran / pengembalian uang dengan perincian sebagai berikut : </p>
                      <tr>
                        <td><b>- Tujuan Penggunaan :</b></td>
                        <td>
                        <td><textarea type="text" class="form-control" name="label1" readonly><?php echo $row->label1; ?></textarea></td>
                        <td>
                      </tr>
                      <tr>
                        <td><b>- Jumlah :</b></td>
                        <td><select name="currency" class="form-control">
                                      <option>Choose</option>
                                      <option value="EUR"<?php echo $row->currency==EUR? 'selected':''?> >EUR</option>
                                      <option value="GBP"<?php echo $row->currency==GBP? 'selected':''?> >GBP</option>
                                      <option value="HKD"<?php echo $row->currency==HKD? 'selected':''?> >HKD</option>
                                      <option value="IDR"<?php echo $row->currency==IDR? 'selected':''?> >IDR</option>
                                      <option value="JPY"<?php echo $row->currency==JPY? 'selected':''?> >JPY</option>
                                      <option value="KRW"<?php echo $row->currency==KRW? 'selected':''?> >KRW</option>
                                      <option value="SGD"<?php echo $row->currency==SGD? 'selected':''?> >SGD</option>
                                      <option value="USD"<?php echo $row->currency==USD? 'selected':''?> >USD</option>
                              </select>
                          </td>
                        <td colspan="2"><textarea type="text" class="form-control" name="label2" value="Jumlah" readonly><?php echo $row->label2; ?></textarea></td>
                      </tr>
                      <tr>
                        <td><b>- Perkiraan Tanggal :</b></td>
                        <td>
                        <td><input type="" class="form-control" name="label3" value="<?php echo $row->label3; ?>" ></input></td>     
                      </tr>
                      <tr>
                        <td colspan="2"><b>Selesai Pekerjaan/Terima Barang</b> <br>(Hanya diisi untuk jenis pembayaran <i><b>Permintaan Uang Muka/Request)</b></i></td>
                      </tr>                            
                      </tbody>
                    </table>

                    <br>

                    <table style="font-family: calibri;" width="50%">
                      <tbody>
                      <b><p>- Penyedia Barang / Jasa Penerima Pembayaran</p></b> 
                      <tr>
                        <td>&nbsp; Nama : <input type="text" class="form-control" name="penerima" value="<?php echo $row->penerima;?>" readonly></td>
                      </tr>
                      <tr>  
                        <td>&nbsp; Kode Vendor : <input type="text" class="form-control" name="vendor" value="<?php echo $row->vendor;?>" readonly></td>
                        <td>&nbsp; Bank : <select name="akun_bank" class="form-control">
                                            <option>---Choose---</option>
                                            <option value="BCA" <?php echo $row->akun_bank==BCA? 'selected':''?> >BCA</option>
                                            <option value="Mandiri" <?php echo $row->akun_bank==Mandiri? 'selected':''?> >Mandiri</option>
                                            <option value="BNI" <?php echo $row->akun_bank==BNI? 'selected':''?> >BNI</option>
                                            <option value="BRI" <?php echo $row->akun_bank==BRI? 'selected':''?> >BRI</option>
                                            <option value="6" <?php echo $row->akun_bank==6? 'selected':''?> >Other</option>
                                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>                            
                        <td>&nbsp; Nomor Rekening : <input type="text" class="form-control" name="no_rekening" value="<?php echo $row->no_rekening; ?>" readonly></td>                                
                      </tr>
                      <tr>
                        <td colspan="2"><i>(diisi dengan mengacu pada vendor master data-Procurement)</i></td>
                      </tr>
                      </tbody>
                    </table>

                    <br>

                    <table style="font-family: calibri;" width="100%">
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
                        <td><b>- Lampiran Dokumen Pendukung :</b></td>
                        <td><td>
                      </tr>
                      <tr>
                        <td>  
                          <input type="checkbox" name="label4[]" value="Bukti Transaksi Asli (a.l : Invoice/Kuitansi, Struk, Nota, Dll)" <?php echo $xxii1=="Bukti Transaksi Asli (a.l : Invoice/Kuitansi, Struk, Nota, Dll)"? 'checked':''?> disabled>Bukti Transaksi Asli (a.l : Invoice/Kuitansi, Struk, Nota, Dll)</input><br>
                          <input type="checkbox" name="label4[]" value="Berita Acara Pemeriksaan (BAP)" <?php echo $xxii2=="Berita Acara Pemeriksaan (BAP)"? 'checked':''?> disabled>Berita Acara Pemeriksaan (BAP)</input><br>
                          <input type="checkbox" name="label4[]" value="Berita Acara Pemeriksaan (BAST)" <?php echo $xxii3=="Berita Acara Pemeriksaan (BAST)"? 'checked':''?> disabled>Berita Acara Pemeriksaan (BAST)</input><br>                            
                          <input type="checkbox" name="label4[]" value="Bukti Penerimaan Jasa/Barang (Delivery Order)" <?php echo $xxii4=="Bukti Penerimaan Jasa/Barang (Delivery Order)"? 'checked':''?> disabled>Bukti Penerimaan Jasa/Barang (Delivery Order)</input><br>
                          <input type="checkbox" name="label4[]" value="Copy Dokumen Permintaan Barang/Jasa terkait (PR/Memo)" <?php echo $xxii5=="Copy Dokumen Permintaan Barang/Jasa terkait (PR/Memo)"? 'checked':''?> disabled>Copy Dokumen Permintaan Barang/Jasa terkait (PR/Memo)</input><br>
                        </td>
                        <td>
                        <input type="checkbox" name="label4[]" value="Copy PO/SPK" <?php echo $xxii6=="Copy PO/SPK"? 'checked':''?> disabled>Copy PO/SPK</input><br>
                          <input type="checkbox" name="label4[]" value="Copy Kontrak/Perjanjian" <?php echo $xxii7=="Copy Kontrak/Perjanjian"? 'checked':''?> disabled>Copy Kontrak/Perjanjian</input><br>                            
                          <input type="checkbox" name="label4[]" value="Faktur Pajak Rangkap 2" <?php echo $xxii8=="Faktur Pajak Rangkap 2"? 'checked':''?> disabled>Faktur Pajak Rangkap 2</input><br>                        
                          <input type="checkbox" name="label4[]" value="Form DGT-1 & COD (Jika kode vendor tidak tersedia)" <?php echo $xxii9=="Form DGT-1 & COD (Jika kode vendor tidak tersedia)"? 'checked':''?> disabled>Form DGT-1 & COD (Jika kode vendor tidak tersedia)</input><br>
                          <input type="checkbox" name="label4[]" value="NPWP" <?php echo $xxii10=="NPWP"? 'checked':''?> disabled>NPWP (Jika kode vendor tidak tersedia)</input><br>
                          <input type="checkbox" name="label4[]" value="Lainnya (Jika ada) : Rincian Pengeluaran" <?php echo $xxii11=="Lainnya (Jika ada) : Rincian Pengeluaran"? 'checked':''?> disabled>Lainnya (Jika ada) : Rincian Pengeluaran</input><br>
                        </td>
                      <tr>      
                    </table>

                    <br>

                    <table style="font-family: calibri;" width="50%">
                      <tbody>
                      <b><p>Khusus diisi untuk Jenis Pembayaran Pertanggungjawaban Uang Muka/Settlement:</p></b>
                      <tr>
                        <td><b>- Nomor ARF terkait : </b></td>
                        <td>
                          <input type="text" class="form-control" name="label5" value="<?php echo $row->label5;?>" readonly>                          
                        </td>
                        <td><input type="checkbox" name="label6" value="Lampiran copy ARF tersedia"<?php echo $row->label6=="Lampiran copy ARF tersedia"? 'checked':''?> disabled> Lampiran copy ARF tersedia</input></td>
                      </tr>
                      <tr>
                        <td><b>- Perhitungan Penggunaan Uang Muka : <b></td>
                      </tr>
                      <tr>
                        <td>
                        <td><b> Curr</b></td>
                        <td><b> Jumlah/<i>Amount</i></b></td>
                      </tr>
                      <tr>  
                        <td>Jumlah Biaya : </td>
                        <td>
                        <td><input type="text" class="form-control" name="label7" value="<?php echo $row->label7;?>" readonly></input><td>
                      </tr>
                        <td>Jumlah Uang Muka : </td>
                        <td>
                        <td><input type="text" class="form-control" name="label8" value="<?php echo $row->label8; ?>" readonly></input> </td>     
                      <tr>
                        <td>Selisih Kurang/Lebih : </td> 
                        <td>
                        <td><input type="text" class="form-control" name="label9" value="<?php echo $row->label9; ?>" readonly></input></td>                               
                      </tr>                              
                      </tbody>
                    </table>

                    <br>
                    
                    <table style="font-family: calibri;" width="100%">
                    <tbody>
                      <tr>
                        <td>Pemohon, <br><br><br><br></td>
                        <td>Menyetujui, <br><br><br><br></td>
                      </tr>
                      <tr>
                        <td>Nama : &nbsp; <?php echo $row->display_name?></td>
                        <?php foreach ($divhead as $divhead) { ?>
                        <td>Nama : &nbsp; <?php echo $divhead->display_name; ?> </td>
                      </tr>
                      <tr>
                        <td>Jabatan : &nbsp; <?php echo $row->jabatan?></td>
                        <td>Jabatan : &nbsp;  <?php if($divhead->role_id == 4){
                                                echo "Division Head of"; } ?> <?php echo $divhead->division_id; ?> </td>
                        <?php } ?>                        
                      </tr>                            
                    </tbody>
                    </table>

                  </div>  
                </div>                 

                    <div class="box">
                      <div class="box-header with-border">
                        <a class="btn btn-warning" href="Home" role="button">Back</a>
                        <!-- <button type="submit" class="btn btn-success">Save</button> -->
                        <!-- <button type="button" data-toggle="modal" data-target="#modalNext" class="btn btn-primary">View</button>  -->
                    </div>
            </div>
          </section>  
          <?php } ?>
        </form>       
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
                        <br>
                        <left><img src="assets/dashboard/images/logo.png" width="140px" alt="Logo Images"></left>
                        <br>
                        <center><b><u><font size="+1" style="font-family: calibri;">SURAT PERMINTAAN PROSES PEMBAYARAN</font></u></b></center>
                      </h5>
                      <table width="100%">
                      <tbody>
                        <tr>
                          <td>
                          <td align="center"><b><font size="3" style="font-family: calibri;">No   : <?php echo $get->nomor_surat;?></b></td>
                          <td><b>No ARF/ASF   :</b></td>
                        </tr> 
                        <!-- <tr>
                          <td>
                          <td align="center"><b><i><font size="2" style="font-family: calibri;">(dilengkapi oleh Pemohon)</b></td>
                          <td><b><i><font size="2" style="font-family: calibri;">(dilengkapi oleh CSF, coret salah satu)</b></td>
                        </tr>-->
                      </tbody>
                      </table>

                      <table width="100%">
                        <tr>
                            <td><b>Jenis Pembayaran (pilih salah satu)</b></td>
                            <td>
                              <input type="checkbox" name="jenis_pembayaran[]" value="1" <?php echo $xxi1=="1"? 'checked':''?> disabled>Uang Muka/Advance</label>
                            </td>
                            <td>
                              <input type="checkbox" name="jenis_pembayaran[]" value="2" <?php echo $xxi2=="2"? 'checked':''?> disabled>Permintaan Uang Muka/Request</label>                     
                            </td>
                        </tr>    
                        <tr>
                            <td></td>
                            <td>
                              <input type="checkbox" name="jenis_pembayaran[]" value="3" <?php echo $xxi3=="3"? 'checked':''?> disabled>Pertanggung Jawaban Uang Muka/Settlement</label>
                            </td>
                            <td>
                              <input type="checkbox" name="jenis_pembayaran[]" value="4" <?php echo $xxi4=="4"? 'checked':''?> disabled>Non-Uang Muka/Non-Advance</label>
                            </td>
                        </tr>                       
                      </table>

                      <table width="100%">
                      <tbody>                            
                        <tr>
                          <td>Kepada : Divisi CSF</td>
                          <td align="right">Tanggal : <?php echo date("d-M-Y", strtotime($get->tanggal)); ?></td>
                        </tr>
                        <tr>
                          <td>Dari : </td>
                        </tr>             
                        <tr>
                          <td>&nbsp;  Nama Pemohon : &nbsp; <?php echo $get->display_name;?></td>
                        </tr> 
                        <tr>
                          <td>&nbsp;  Direktorat/Divisi Pemohon : &nbsp; <?php echo $get->division_id;?></td>
                        </tr>                                                   
                      </tbody>
                      </table>
                                                
                      <hr style=" border: 1px solid #000;">
                                                  
                      <table style="font-family: calibri;" width="100%">
                        <tbody>
                        <p>Mohon dapat dilakukan proses pembayaran / pengembalian uang dengan perincian sebagai berikut : </p>
                          <?php foreach ($ppayment as $ket) { ?>
                          <tr>
                            <td><b>Tujuan Penggunaan :</b></td>
                            <td>&nbsp; <?php echo $ket->label1; ?></td>
                          </tr>
                          <tr>
                            <td><b>Jumlah :</b></td>
                            <td>IDR &nbsp; <?php echo $ket->label2; ?></td>
                          </tr>
                          <tr>
                            <td><b>Perkiraan Tanggal :</b></td>
                            <td>&nbsp; <?php echo $ket->label3; ?></td>     
                          </tr>
                          <!-- <tr>
                            <td colspan="2"><b>Selesai Pekerjaan/Terima Barang</b> (Hanya diisi untuk jenis pembayaran <i><b>Permintaan Uang Muka/Request)</b></i></td>
                          </tr>                               -->
                          <?php } ?>
                        </tbody>
                      </table>

                      <table style="font-family: calibri;" width="100%">
                        <tbody>
                          <b><p>Penyedia Barang / Jasa Penerima Pembayaran</p></b>
                          <?php foreach ($ppayment as $print) { ?>
                          <tr>
                            <td>Nama : &nbsp; <?php echo $print->penerima;?></td>
                            <td>Bank : &nbsp; <?php echo $print->akun_bank;?></td>
                          </tr>
                          <tr>
                            <td>Kode Vendor : &nbsp; <?php echo $print->vendor;?></td>
                            <td>Nomor Rekening : &nbsp; <?php echo $print->no_rekening; ?></td>                                
                          </tr>
                          <tr>
                            <td colspan="2"><i>(diisi dengan mengacu pada vendor master data-Procurement)</i></td>
                          </tr>
                          <?php }  ?>
                        </tbody>
                      </table>

                      <table>
                        <tr>
                            <td><b>Lampiran Dokumen Pendukung :</b></td>
                            <td>&nbsp;
                              <?php if($get->label4){
                                echo $get->label4;
                              }?>
                            </td>
                        <tr>      
                      </table>

                      <table style="font-family: calibri;" width="125%">
                        <tbody>
                          <b><p>Khusus diisi untuk Jenis Pembayaran Pertanggungjawaban Uang Muka/Settlement:</p></b>
                          <?php foreach ($ppayment as $print) { ?>
                          <tr>
                            <td>Nomor ARF terkait : &nbsp; <?php echo $print->label5;?></td>
                            <input type="checkbox" name="label6" value="Lampiran copy ARF tersedia"<?php echo $get->label6=="Lampiran copy ARF tersedia"? 'checked':''?> >Lampiran copy ARF tersedia</input>
                            <td>
                          </tr>
                          <tr>
                            <td>Perhitungan Penggunaan Uang Muka :</td>
                          </tr>
                          <tr?>  
                            <td>Jumlah Biaya : &nbsp; <?php echo $print->label7;?></td>
                          </tr>
                            <td>Jumlah Uang Muka : &nbsp; <?php echo $print->label8; ?></td>     
                          <tr>
                            <td>Selisih Kurang/Lebih : &nbsp; <?php echo $print->label9; ?></td>                                
                          </tr>                              
                          <?php }  ?>
                        </tbody>
                      </table>
                      <br>
                      <table width="100%">
                      <tbody>
                          <tr>
                            <td>Pemohon, <br><br><br><br></td>
                            <td>Menyetujui, <br><br><br><br></td>
                          </tr>
                          <tr>
                            <td>Nama : &nbsp; <?php echo $get->display_name?></td>
                            <td>Nama Approval : </td>
                          </tr>
                          <tr>
                            <td>Jabatan : &nbsp; <?php echo $get->jabatan?></td>
                            <td>Jabatan : &nbsp; </td>
                          </tr>                            
                      </tbody>
                      </table>
                      </h5>
                      <hr style=" border: 0.5px solid #000;">
                      <h6>
                      <table style="font-family: calibri;" width="100%">
                      <tbody>
                          <tr>
                            <td colspan="5"><center><b>Perhitungan Pajak (*diisi oleh CSF)</b></center></td>
                          </tr>
                          <tr>
                            <td><center><b>Jenis Pajak </b></center></td>
                            <td><center><b>Tarif </b></center></td>
                            <td width="100"><center><b>DPP </b></center></td>
                            <td width="100"><center><b>Gross Up </b></center>  </td>
                            <td><center><b>Pajak Terhitung </b></center>  </td>
                          </tr>
                          <tr>
                            <td>PPh Pasal 21/26</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>PPh Pasal 22</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>PPh Pasal 23/26</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>PPh Pasal 4(2)</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>PPN WAPU/PPN Offshore</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>                                                          
                      </tbody>
                      </table>
                    </h6>
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

<script>
function update() {
  alert("Data Successfully to Update");
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
