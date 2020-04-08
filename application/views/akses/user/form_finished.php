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
        <section class="content-header">
          <h1>
            EDIT DATA PAYMENT
            <small></small>
          </h1>
        </section>
        <!-- Main content -->
        <form id="form" method="post" action="Home/updatepayment" onsubmit="update()">

        <!-- <?php $message = $this->session->flashdata('msg');
        if($message){
          echo 'Berhasil disimpan!';
        }?> -->

          <?php foreach ($ppayment as $get){ ?>          
          <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <!-- /.box -->
                <div class="box">
                  <div class="box-header with-border">
                    <center><h3 class="box-title">Data Pengajuan SP3</h3></center>
                  </div>                    
                    <input type="hidden" name="id_payment" class="form-control" value="<?php echo $get->id_payment?>" readonly> 
                    <div class="box-body">
                      <div class="form-row">
                      <?php 
                          $test1 = $get->jenis_pembayaran;
                          $test2 = explode(";", $test1);
                          $test3 = count($test2);
                                 
                          for($i=0; $i<$test3; $i++){
                            if($test2[$i] == '1'){
                              $xxi1 .= "1";
                            }
                            
                            if($test2[$i] == '2'){
                              $xxi2 .= "2";
                            }
                            
                            if($test2[$i] == '3'){
                              $xxi3 .= "3";
                            }
                            
                            if($test2[$i] == '4'){
                              $xxi4 .= "4";
                            }
                          }
                      ?>
                      <div class="form-group col-md-12">
                            <label>Jenis Pembayaran (pilih salah satu)</label><br>
                            <input type="checkbox" name="jenis_pembayaran[]" value="1" <?php echo $xxi1=="1"? 'checked':''?> >Uang Muka/Advance</label><br>
                            <input type="checkbox" name="jenis_pembayaran[]" value="2" <?php echo $xxi2=="2"? 'checked':''?> >Permintaan Uang Muka/Request</label><br>
                            <input type="checkbox" name="jenis_pembayaran[]" value="3" <?php echo $xxi3=="3"? 'checked':''?> >Pertanggung Jawaban Uang Muka/Settlement</label><br>                            
                            <input type="checkbox" name="jenis_pembayaran[]" value="4" <?php echo $xxi4=="4"? 'checked':''?> >Non-Uang Muka/Non-Advance</label><br>
                        </div>
                      <div class="form-group col-md-6">
                             <label>Tanggal</label>
                             <input type="text" name="tanggal" class="form-control" value="<?php echo date("d-m-Y", strtotime($get->tanggal)); ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nomor Surat</label>
                            <input type="text" name="nomor_surat" class="form-control" value="<?php echo $get->nomor_surat?>" readonly>                            
                        </div>
                        <div class="form-group col-md-6">
                            <label>Hari</label>
                            <input type="text" class="form-control" value="<?php echo $get->hari?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nama Pemohon</label>
                            <input type="text" name="nama_user" class="form-control" value="<?php echo $get->display_name ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Divisi</label>
                            <input type="text" name="divisi" class="form-control" value="<?php echo $get->division_id?>" readonly>                            
                        </div>
                        <div class="form-group col-md-6">
                            <label>Jabatan</label>
                            <input type="text" name="jabatan" class="form-control" value="<?php echo $get->jabatan ?>" readonly>
                        </div>
                      </div>                    
                    </div>

                    <div class="box">
                      <div class="box-header with-border">
                        <h3 class="box-title">Detail Pengajuan</h3>
                      </div>  

                      <div class="box-body">
                        <div class="form-group">
                            <label>Tujuan Penggunaan :</label>                        
                            <textarea type="text" class="form-control" name="label1"><?php echo $get->label1?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Jumlah : </label>                        
                            <textarea type="text" class="form-control" name="label2"><?php echo $get->label2?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Perkiraan Tanggal : </label>                        
                            <textarea type="text" class="form-control" name="label3"><?php echo $get->label3?></textarea>
                        </div>
                        <?php 
                          $testl1 = $get->label4;
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
                        <div class="form-group">
                            <label>Lampiran Dokumen Pendukung (Pilih dan Tandai jika ada) <i class="glyphicon glyphicon-info-sign" style="color: blue; cursor:pointer;" data-toggle="modal" data-target="#anomor4"></i></label><br>                        
                            <input type="checkbox" name="label4[]" value="Bukti Transaksi Asli (a.l : Invoice/Kuitansi, Struk, Nota, Dll)" <?php echo $xxii1=="Bukti Transaksi Asli (a.l : Invoice/Kuitansi, Struk, Nota, Dll)"? 'checked':''?> >Bukti Transaksi Asli (a.l : Invoice/Kuitansi, Struk, Nota, Dll)</input><br>
                            <input type="checkbox" name="label4[]" value="Berita Acara Pemeriksaan (BAP)" <?php echo $xxii2=="Berita Acara Pemeriksaan (BAP)"? 'checked':''?> >Berita Acara Pemeriksaan (BAP)</input><br>
                            <input type="checkbox" name="label4[]" value="Berita Acara Pemeriksaan (BAST)" <?php echo $xxii3=="Berita Acara Pemeriksaan (BAST)"? 'checked':''?> >Berita Acara Pemeriksaan (BAST)</input><br>                            
                            <input type="checkbox" name="label4[]" value="Bukti Penerimaan Jasa/Barang (Delivery Order)" <?php echo $xxii4=="Bukti Penerimaan Jasa/Barang (Delivery Order)"? 'checked':''?> >Bukti Penerimaan Jasa/Barang (Delivery Order)</input><br>
                            <input type="checkbox" name="label4[]" value="Copy Dokumen Permintaan Barang/Jasa terkait (PR/Memo)" <?php echo $xxii5=="Copy Dokumen Permintaan Barang/Jasa terkait (PR/Memo)"? 'checked':''?> >Copy Dokumen Permintaan Barang/Jasa terkait (PR/Memo)</input><br>
                            <input type="checkbox" name="label4[]" value="Copy PO/SPK" <?php echo $xxii6=="Copy PO/SPK"? 'checked':''?> >Copy PO/SPK</input><br>
                            <input type="checkbox" name="label4[]" value="Copy Kontrak/Perjanjian" <?php echo $xxii7=="Copy Kontrak/Perjanjian"? 'checked':''?> >Copy Kontrak/Perjanjian</input><br>                            
                            <input type="checkbox" name="label4[]" value="Faktur Pajak Rangkap 2" <?php echo $xxii8=="Faktur Pajak Rangkap 2"? 'checked':''?> >Faktur Pajak Rangkap 2</input><br>                        
                            <input type="checkbox" name="label4[]" value="Form DGT-1 & COD (Jika kode vendor tidak tersedia)" <?php echo $xxii9=="Form DGT-1 & COD (Jika kode vendor tidak tersedia)"? 'checked':''?> >Form DGT-1 & COD (Jika kode vendor tidak tersedia)</input><br>
                            <input type="checkbox" name="label4[]" value="NPWP" <?php echo $xxii10=="NPWP"? 'checked':''?> >NPWP (Jika kode vendor tidak tersedia)</input><br>
                            <input type="checkbox" name="label4[]" value="Lainnya (Jika ada) : Rincian Pengeluaran" <?php echo $xxii11=="Lainnya (Jika ada) : Rincian Pengeluaran"? 'checked':''?> >Lainnya (Jika ada) : Rincian Pengeluaran</input><br>
                        </div>
                       </div>
                    
                    <div class="box">
                      <div class="box-header with-border">
                        <h3 class="box-title">Data Penerima Pembayaran <br> <i>(diisi dengan mengacu pada vendor master data-Procurement)</i></h3>
                      </div>                  
                      <div class="box-body">
                        <h5 class="box-title"><b>Penyedia Barang / Jasa Penerima Pembayaran :</b></h5>  
                      <div class="form-group">
                            <label>Bank Account</label>                        
                            <select name="akun_bank" class="form-control">
                                <option value="1" <?php echo $get->akun_bank==1? 'selected':''?> >Choose</option>
                                <option value="BCA" <?php echo $get->akun_bank==BCA? 'selected':''?> >BCA</option>
                                <option value="Mandiri" <?php echo $get->akun_bank==Mandiri? 'selected':''?> >Mandiri</option>
                                <option value="BNI" <?php echo $get->akun_bank==BNI? 'selected':''?> >BNI</option>
                                <option value="BRI" <?php echo $get->akun_bank==BRI? 'selected':''?> >BRI</option>
                                <option value="6" <?php echo $get->akun_bank==6? 'selected':''?> >Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Penerima:</label>
                            <input type="text" class="form-control" name="penerima" value="<?php echo $get->penerima?>"readonly>
                        </div>
                        <div class="form-group">
                            <label>Kode Vendor:</label>
                            <input type="text" class="form-control" name="vendor" value="<?php echo $get->vendor?>"readonly>
                        </div>
                        <div class="form-group">
                            <label>No. Rekening</label>
                            <input type="text" class="form-control" name="no_rekening" value="<?php echo $get->no_rekening?>" readonly>
                        </div>                                 
                    </div>

                    <div class="box">
                      <div class="box-header with-border">
                        <h3 class="box-title">Khusus diisi untuk Jenis Pembayaran Pertanggungjawaban Uang Muka/Settlement:</h3>
                      </div>  
                      <div class="box-body">
                        <div class="form-group">
                          <label>Nomor ARF terkait</label>
                          <input type="text" class="form-control" name="label5" value="<?php echo $get->label5 ?>">
                          <input type="checkbox" name="label6" value="Lampiran copy ARF tersedia"<?php echo $get->label6=="Lampiran copy ARF tersedia"? 'checked':''?> >Lampiran copy ARF tersedia</input>
                        </div>
                        <div class="form-group">
                          <label>Perhitungan Penggunaan Uang Muka :</label><br>
                          <label>Jumlah Biaya :</label>
                          <input type="text" class="form-control" name="label7" value="<?php echo $get->label7?>"></input>
                        
                          <label>Jumlah Uang Muka :</label>
                          <input type="text" class="form-control" name="label8" value="<?php echo $get->label8?>"></input>

                          <label>Selisih Kurang/Lebih :</label>
                          <input type="text" class="form-control" name="label9" value="<?php echo $get->label9?>"></input>
                        </div>                  

                    <div class="box">
                      <div class="box-header with-border">
                        <h3 class="box-title">Permintaan Permohonan</h3>
                      </div>
                      <div class="box-body">
                          <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Pemohon, </label>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>Nama : &nbsp; <?php echo $get->display_name?>
                                <br>Jabatan : &nbsp;<?php echo $get->jabatan?>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Menyetujui,</label>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>Nama :
                                <br>Jabatan :
                            </div>  
                      </div>
                        <hr style=" border: 1px solid #000;">
                        <a class="btn btn-warning" href="Home" role="button">Cancel</a>
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="button" data-toggle="modal" data-target="#modalNext" class="btn btn-primary">View</button> 
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
                              <td>&nbsp;  Nama Pemohon : &nbsp; <?php echo $get->nama_user;?></td>
                            </tr> 
                            <tr>
                              <td>&nbsp;  Direktorat/Divisi Pemohon : &nbsp; <?php echo $get->divisi;?></td>
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
                              </tr>
                              <tr>
                                <td>Perhitungan Penggunaan Uang Muka :</td>
                              </tr>
                              <tr?>  
                                <td>Jumlah Biaya : &nbsp; <?php echo $print->label6;?></td>
                              </tr>
                                <td>Jumlah Uang Muka : &nbsp; <?php echo $print->label7; ?></td>     
                              <tr>
                                <td>Selisih Kurang/Lebih : &nbsp; <?php echo $print->label8; ?></td>                                
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
