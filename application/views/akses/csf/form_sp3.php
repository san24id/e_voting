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
        <!-- Main content -->
        <!-- <form id="form" method="post" action="Home/updatepayment" onsubmit="update()"> -->

        <!-- <?php $message = $this->session->flashdata('msg');
        if($message){
          echo 'Berhasil disimpan!';
        }?> -->

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
                        <input type="checkbox" checked disabled>Uang Muka/Advance<br>
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
                        <input type="hidden" name="tanggal" class="form-control" value="<<?php echo $row->tanggal; ?>">
                      </tr>
                      <tr>
                      <td>Dari : </td>
                      </tr>             
                      <tr>
                        <td>&nbsp;  Nama Pemohon : &nbsp; <?php echo $row->display_name;?></td>
                        <input type="hidden" name="display_name" class="form-control" value="<?php echo $row->display_name;?>">
                      </tr> 
                      <tr>
                        <td>&nbsp;  Direktorat/Divisi Pemohon : &nbsp; <?php echo $row->division_id;?></td>
                        <input type="hidden" name="division_id" class="form-control" value="<?php echo $row->division_id;?>">                            
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
                        <td colspan="2"><textarea type="text" class="form-control" name="label1" readonly><?php echo $row->label1; ?></textarea></td>
                        <td>
                      </tr>
                      <tr>
                        <td><b>- Jumlah :</b></td>
                        <td><b> : </b></td>
                        <td>&nbsp; <?php echo $row->currency;?></td>
                        <td colspan="2"><input type="text" class="form-control" name="label2" value="<?php echo $row->label2; ?>" readonly></td>
                      </tr>
                      <tr>
                        <td><b>- Perkiraan Tanggal </b></td>
                        <td><b> : </b></td>
                        <td colspan="2"><input type="" class="form-control" name="label3" value="<?php echo $row->label3; ?>" readonly></input></td>     
                      </tr>
                      <tr>
                        <td colspan="4"><b>Selesai Pekerjaan/Terima Barang</b> <br>(Hanya diisi untuk jenis pembayaran <i><b>Permintaan Uang Muka/Request)</b></i></td>
                      </tr>                            
                      </tbody>
                    </table>

                    <br>

                    <table style="font-family: calibri;" width="50%">
                      <tbody>
                      <b><p>- Penyedia Barang / Jasa Penerima Pembayaran</p></b> 
                      <tr>
                        <td>Nama</td>
                        <td> : </td>
                        <td colspan="4"> <input type="text" class="form-control" name="penerima" value="<?php echo $row->penerima;?>" readonly></td>
                      </tr>
                      <tr>  
                        <td>Kode Vendor</td>
                        <td> : </td>
                        <td><input type="text" class="form-control" name="vendor" value="<?php echo $row->vendor;?>" readonly></td>
                        <td>Bank</td>
                        <td>:</td>
                        <td>&nbsp; <?php echo $row->akun_bank; ?> </td>
                      </tr>
                      <tr>
                      <td></td>
                        <td></td>
                        <td></td>
                        <td>Nomor Rekening</td> 
                        <td>:</td>                           
                        <td><input type="text" class="form-control" name="no_rekening" value="<?php echo $row->no_rekening; ?>" readonly></td>                                
                      </tr>
                      <tr>
                        <td colspan="3"><i>(diisi dengan mengacu pada vendor master data-Procurement)</i></td>
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
                        <input type="checkbox" name="label4[]" value="Copy PO/SPK" <?php echo $xxii6=="Copy PO/SPK"? 'checked':''?> >Copy PO/SPK</input><br>
                          <input type="checkbox" name="label4[]" value="Copy Kontrak/Perjanjian" <?php echo $xxii7=="Copy Kontrak/Perjanjian"? 'checked':''?> disabled>Copy Kontrak/Perjanjian</input><br>                            
                          <input type="checkbox" name="label4[]" value="Faktur Pajak Rangkap 2" <?php echo $xxii8=="Faktur Pajak Rangkap 2"? 'checked':''?> disabled>Faktur Pajak Rangkap 2</input><br>                        
                          <input type="checkbox" name="label4[]" value="Form DGT-1 & COD (Jika kode vendor tidak tersedia)" <?php echo $xxii9=="Form DGT-1 & COD (Jika kode vendor tidak tersedia)"? 'checked':''?> disabled>Form DGT-1 & COD (Jika kode vendor tidak tersedia)</input><br>
                          <input type="checkbox" name="label4[]" value="NPWP" <?php echo $xxii10=="NPWP"? 'checked':''?> >NPWP (Jika kode vendor tidak tersedia)</input><br>
                          <input type="checkbox" name="label4[]" value="Lainnya (Jika ada) : Rincian Pengeluaran" <?php echo $xxii11=="Lainnya (Jika ada) : Rincian Pengeluaran"? 'checked':''?> disabled>Lainnya (Jika ada) : Rincian Pengeluaran</input><br>
                        </td>
                      <tr>      
                    </table>

                    <br>

                    <table style="font-family: calibri;" width="50%">
                      <tbody>
                      <b><p>Khusus diisi untuk Jenis Pembayaran Pertanggungjawaban Uang Muka/Settlement:</p></b>
                      <tr>
                        <td><b>- Nomor ARF terkait</b></td>
                        <td>:</td>
                        <td>
                          <input type="text" class="form-control" name="label5" value="<?php echo $row->label5;?>"readonly>                          
                        </td>
                        <td><input type="checkbox" name="label6" value="Lampiran copy ARF tersedia"<?php echo $row->label6=="Lampiran copy ARF tersedia"? 'checked':''?> disabled> Lampiran copy ARF tersedia</input></td>
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
                        <td> </td>
                        <td><input type="text" class="form-control" name="label7" value="<?php echo $row->label7;?>"readonly></input><td>
                      </tr>
                      <td>Jumlah Uang Muka</td>
                        <td>:</td>
                        <td> </td>
                        <td><input type="text" class="form-control" name="label8" value="<?php echo $row->label8; ?>"readonly></input> </td>     
                      <tr>
                      <td>Selisih Kurang/Lebih</td> 
                        <td>:</td>
                        <td> </td>
                        <td><input type="text" class="form-control" name="label9" value="<?php echo $row->label9; ?>"readonly></input></td>                               
                      </tr>                              
                      </tbody>
                    </table>                 
                    <?php if ($row->status >= 4 ){ ?>
                      <hr style=" border: 0.5px solid #000;">
                      <h6>
                      <table border="1" width="50%">
                      <tbody>
                          <tr>
                            <td colspan="5"><center><b>Perhitungan Pajak (*diisi oleh CSF)</b></center></td>
                          </tr>
                          <tr>
                            <td width="20%"><center><b>Jenis Pajak </b></center></td>
                            <td width="10%"><center><b>Tarif </b></center></td>
                            <td width="30%"><center><b>DPP </b></center></td>
                            <td width="20%"><center><b>Gross Up </b></center>  </td>
                            <td width="20%"><center><b>Pajak Terhitung </b></center>  </td>
                          </tr>
                          <tr>
                            <td><font size="3">PPh Pasal 21/26 <input type="text" value="<?php echo $row->PPh_Pasal_21;?>" readonly></td>
                            <td><font size="3"><?php echo $row->tarif1;?> </td>
                            <td><font size="3"><?php echo $row->dpp1;?> </td>
                            <td><font size="3"><?php echo $row->gross_up1;?> </td>
                            <td><font size="3"><?php echo $row->pjt1;?> </td>
                          </tr>
                          <tr>
                            <td><font size="3">PPh Pasal 22 <input type="text" value="<?php echo $row->PPh_Pasal_22;?>" readonly></td>
                            <td><font size="3"><?php echo $row->tarif2;?> </td>
                            <td><font size="3"><?php echo $row->dpp2;?> </td>
                            <td><font size="3"><?php echo $row->gross_up2;?> </td>
                            <td><font size="3"><?php echo $row->pjt2;?> </td>
                          </tr>
                          <tr>
                            <td><font size="3">PPh Pasal 23/26 <input type="text" value="<?php echo $row->PPh_Pasal_23;?>" readonly></td>
                            <td><font size="3"><?php echo $row->tarif3;?> </td>
                            <td><font size="3"><?php echo $row->dpp3;?> </td>
                            <td><font size="3"><?php echo $row->gross_up3;?> </td>
                            <td><font size="3"><?php echo $row->pjt3;?> </td>
                          </tr>
                          <tr>
                            <td><font size="3">PPh Pasal 4(2) <input type="text" value="<?php echo $row->PPh_Pasal_4;?>" readonly></td>
                            <td><font size="3"><?php echo $row->tarif4;?> </td>
                            <td><font size="3"><?php echo $row->dpp4;?> </td>
                            <td><font size="3"><?php echo $row->gross_up4;?> </td>
                            <td><font size="3"><?php echo $row->pjt4;?> </td>
                          </tr>
                          <tr>
                            <td><font size="3">PPN WAPU/PPN Offshore</td>
                            <td><font size="3"><?php echo $row->tarif5;?> </td>
                            <td><font size="3"><?php echo $row->dpp5;?> </td>
                            <td><font size="3"><?php echo $row->gross_up5;?> </td>
                            <td><font size="3"><?php echo $row->pjt5;?> </td>
                          </tr>                                                          
                      </tbody>
                      </table>
                      </h6>
                    <?php } ?>                   
                  </div>  
                </div>                 

                    <div class="box">
                      <div class="box-header with-border">
                        <a class="btn btn-warning" href="Dashboard/monitoring" role="button">Back</a>
                        <?php if($row->status == 1){ ?>
                          <button type="button" data-toggle="modal" data-target="#accept<?php echo $row->id_payment; ?>" class="btn btn-success">Accept</button>
                          <button type="button" data-toggle="modal" data-target="#reject<?php echo $row->id_payment; ?>" class="btn btn-danger">Reject</button>
                        <?php } ?>  
                        <?php if($row->status == 2){ ?>
                          <button type="button" data-toggle="modal" data-target="#processing<?php echo $row->id_payment; ?>" class="btn btn-success">Process</button>
                        <?php } ?>
                        <?php if($row->status == 4){ ?>
                          <a class="btn btn-success" href="Dashboard/form_sp3_2/<?php echo $row->id_payment; ?>" role="button">Tax</a>
                        <?php } ?>
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

<!----.Modal -->
<!----.Accept -->
<div class="modal fade" id="accept<?php echo $row->id_payment; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
   <div class="modal-content">                                        
    <div class="modal-body">
    <form id="accepted" method="post" action="dashboard/accept">
    <input type="hidden" name="id_payment" value="<?php echo $row->id_payment; ?>">
      <p align="justify">Apa kamu yakin telah menerima Form Pengajuan ini :  <?=$row->nomor_surat?></p>
    </div>
    <div class="modal-footer">                        
     <button type="submit" class="btn btn-success bye">Yes</button>
     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </form>
    </div>
   </div>
  </div>
</div>

<!----.Reject -->
<div class="modal fade" id="reject<?php echo $row->id_payment; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">

      <div class="modal-body">
      <form id="rejected" method="post" action="dashboard/rejected">
        <input type="hidden" name="id_payment" value="<?php echo $row->id_payment; ?>">
        <p align="justify">Apa kamu yakin akan me-rejected Form Pengajuan ini : <?=$row->nomor_surat?></p>
        <label>Notes :</label>                
        <input type="text" name="note"></input>
        <input type="hidden" name="rejected_date" value="<?php echo date("l, d-M-Y"); ?>">
        <input type="hidden" name="rejected_by" value="<?php echo $this->session->userdata("display_name"); ?>">
      </div>
      <div class="modal-footer">                        
        <button type="submit" class="btn btn-success bye">Yes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </form>
      </div>
    </div>
  </div>
</div>

<!---.Processing-->          
<div class="modal fade" id="processing<?php echo $row->id_payment; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">                                        
      <div class="modal-body">
      <form id="processed" method="post" action="dashboard/processing">
        <input type="hidden" name="id_payment" value="<?php echo $row->id_payment; ?>">
        <p align="justify">Apa kamu yakin akan mengirim Form Pengajuan ini :  <?=$row->nomor_surat?></p>
        <label>Kepada CSF Tax:</label>                        
        <select class="form-control" name="handled_by">
          <option>--- Choose ---</option>
        <?php foreach ($csf as $get) {?>
          <option value="<?php echo $get->username; ?>"><?php echo $get->username; ?></option>
        <?php } ?>
        </select>
      </div>
      <div class="modal-footer">                        
          <button type="submit" class="btn btn-success bye">Yes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </form>
      </div>
    </div>
  </div>
</div>  
    

<!---.Tax-->          
<div class="modal fade" id="tax<?php echo $row->id_payment; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">                                        
      <div class="modal-body">
      <form id="processed" method="post" action="dashboard/tax">
        <input type="hidden" name="id_payment" value="<?php echo $row->id_payment; ?>">
        <table border="1" width="50%">
          <tbody>
              <tr>
                <td colspan="5"><center><b>Perhitungan Pajak (*diisi oleh CSF)</b></center></td>
              </tr>
              <tr>
                <td width="20%"><center><b>Jenis Pajak </b></center></td>
                <td width="10%"><center><b>Tarif </b></center></td>
                <td width="30%"><center><b>DPP </b></center></td>
                <td width="20%"><center><b>Gross Up </b></center>  </td>
                <td width="20%"><center><b>Pajak Terhitung </b></center>  </td>
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
        <p align="justify">Apa kamu yakin akan mengirim Form Pengajuan ini :  <?=$row->nomor_surat?></p>
        <label>Kepada CSF Finance:</label>                        
        <select class="form-control" name="handled_by">
          <option>--- Choose ---</option>
        <?php foreach ($csf as $get) {?>
          <option value="<?php echo $get->username; ?>"><?php echo $get->username; ?></option>
        <?php } ?>
        </select>
      </div>
      <div class="modal-footer">                        
          <button type="submit" class="btn btn-success bye">Yes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </form>
      </div>
    </div>
  </div>
</div>    
<script>
function printThis() {
  window.print();
}

$(".accept").on('click', function(){
      $.ajax({        
          type: "POST", // Method pengiriman data bisa dengan GET atau POST        
          // url: "<?php echo base_url("index.php/dashboard/accept"); ?>", // Isi dengan url/path file php yang dituju       
          data: $("#accepted").serialize(), // data yang akan dikirim ke file yang dituju        
          success: function(response){ // Ketika proses pengiriman berhasil          
              $("#accept").modal('hide'); // Sembunyikan loadingnya   
               location.reload();       
              alert('Accepted success')
          }      
      });
  });

$(".reject").on('click', function(){
      $.ajax({        
          type: "POST", // Method pengiriman data bisa dengan GET atau POST        
          // url: "<?php echo base_url("index.php/dashboard/rejected"); ?>", // Isi dengan url/path file php yang dituju       
          data: $("#rejected").serialize(), // data yang akan dikirim ke file yang dituju        
          success: function(response){ // Ketika proses pengiriman berhasil          
              $("#reject").modal('hide'); // Sembunyikan loadingnya   
               location.reload();       
              alert('Rejected success')
          }      
      });
  });  
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
