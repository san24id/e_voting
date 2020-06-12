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
        <form id="form" method="post" action="Tri/updatepayment" onsubmit="update()">

          <?php foreach ($ppayment as $row){ ?>          
            <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <!-- /.box -->
                <div class="box">
                <input type="hidden" name="id_payment" value="<?php echo $row->id_payment; ?>" >
                <input type="hidden" name="id_user" value="<?php echo $row->id_user; ?>" >
                  <div class="box-header with-border">
                    <p align="right">
                      <?php if($row->status == 0){
                          echo "<img src='assets/dashboard/images/legend/draft.png'>";  
                        }else if($row->status == 1){
                          echo "<img src='assets/dashboard/images/legend/draftprint.png'>";  
                        }else if($row->status == 11){
                          echo "<img src='assets/dashboard/images/legend/draftprint.png'>";  
                        }else if($row->status == 2){
                          echo "<img src='assets/dashboard/images/legend/submitted.png'>";
                        }else if($row->status == 3){
                          echo "<img src='assets/dashboard/images/legend/rejected.png'>";
                        }else if($row->status == 4){
                          echo "<img src='assets/dashboard/images/legend/processing.png'>";
                        }else if($row->status == 5){
                          echo "<img src='assets/dashboard/images/legend/processing.png'>";
                        }else if($row->status == 6){
                          echo "<img src='assets/dashboard/images/legend/processing.png'>";
                        }else if($row->status == 7){
                          echo "<img src='assets/dashboard/images/legend/processing.png'>";
                        }else if($row->status == 8){
                          echo "<img src='assets/dashboard/images/legend/verified.png'>";
                        }else if($row->status == 9){
                          echo "<img src='assets/dashboard/images/legend/approved.png'>"; 
                        }else if($row->status == 10){
                          echo "<img src='assets/dashboard/images/legend/paid1.png'>"; 
                        }   
                      ?>
                    </p>
                    <h5>
                      <br>
                      <left><img src="assets/dashboard/images/logo.png" alt="Logo Images"></left>
                      <br>
                      <center><b><font size="+2" style="font-family: calibri;">SURAT PERMINTAAN PROSES PEMBAYARAN</font></b></center>
                    </h5>
                    <table style="font-family: calibri;" width="100%">
                      <tbody>
                        <tr>
                        <td> </td>
                        <td align="center"><b><font size="4" style="font-family: calibri;">No   : <?php echo $row->nomor_surat;?></b></td>
                        
                        </tr>
                      </tbody>
                    </table>

                    <br>

                    <table style="font-family: calibri;" width="100%">
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
                        <td><b>Jenis Pembayaran (pilih salah satu):</b></td>
                        <td> <?php if ($row->jenis_pembayaran == 2 || $row->jenis_pembayaran == 3 ) { $cek="checked" ;
                          }else{
                                $cek=" " ;
                          } ?>
                          <input id="auto" <?php echo $cek;?> type="checkbox" disabled>Uang Muka/Advance<br>
                        </td>

                        <td>
                          <input id="check" onclick="hide()" type="checkbox" name="jenis_pembayaran[]" value="4" <?php echo $xxi4=="4"? 'checked':''?> disabled>Non-Uang Muka/Non-Advance<br>
                        </td>
                        <td>
                          <input id="checked2" onclick="hide()" type="checkbox" name="jenis_pembayaran[]" value="5" <?php echo $xxi5=="5"? 'checked':''?> disabled> Cash Received</input><br>
                        </td>
                      </tr>

                      <tr>
                        <td></td>
                        <td>
                          <input id="checkrequest" onclick="checkUangMuka()" type="checkbox" name="jenis_pembayaran[]" value="2" <?php echo $xxi2=="2"? 'checked':''?> disabled>Permintaan Uang Muka/Request<br>
                        <td>
                      </tr>
                      
                      <tr>
                        <td></td>
                        <td>
                          <input id="checksettlement" onclick="checkUangMuka2()"type="checkbox" name="jenis_pembayaran[]" value="3" <?php echo $xxi3=="3"? 'checked':''?> disabled>Pertanggung Jawaban Uang Muka/Settlement<br>                            
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

                    <table style="font-family: calibri;" width="100%">
                      <tbody>
                      <p>Mohon dapat dilakukan proses pembayaran / pengembalian uang dengan perincian sebagai berikut : </p>
                      <tr>
                        <td width="35%"><b>- Tujuan Penggunaan </b></td>
                        <td><b> : </b></td>
                        <td colspan="8"><textarea type="text" class="form-control" name="label1" readonly><?php echo $row->label1; ?></textarea></td>
                        <td>
                      </tr>
                      <tr>
                        <td><b>- Jumlah :</b></td>
                        <td><b> : </b></td>

                        <td> <?php echo $row->currency;?> </td>
                        <td><input type="text" class="form-control" name="label2" value="<?php echo $row->label2; ?>" readonly></td>

                        <td> <?php echo $row->currency2;?> </td>
                        <td><input type="text" class="form-control" name="jumlah2" value="<?php echo $row->jumlah2; ?>" readonly></td>

                        <td> <?php echo $row->currency3;?> </td>
                        <td><input type="text" class="form-control" name="jumlah3" value="<?php echo $row->jumlah3; ?>" readonly></td>
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
                        <td width="36%"><b>- Perkiraan Tanggal Selesai Pekerjaan/Terima Barang</b>
                        	<br>
                        <i>(Hanya diisi untuk jenis pembayaran <i><b>Permintaan Uang Muka/Request)</i></td>
                        <td align="right"><b> : </b></td>
                        <td colspan="8" width="65%"><input type="date" class="form-control" name="label3" value="<?php echo $row->label3; ?>"></td>     
                      </tr>
                                                  
                      </tbody>
                    </table>

                    <br>

                    <table style="font-family: calibri;" width="100%">
                      <tbody>
                      <b><p>- Penyedia Barang / Jasa Penerima Pembayaran</p></b> 
                      <?php 
                          $sql = "SELECT nama FROM m_honorarium_konsultan WHERE npwp='$row->penerima'";
                          $query = $this->db->query($sql)->result();
                          // return $query;
                          // var_dump($query[0]->nama);exit; 
                          if ($query[0]->nama) { $buka = $query[0]->nama;
                          }else{
                            $buka = $row->penerima;
                          }
                        ?>
                      <tr>
                        <td width="35%"> &nbsp; &nbsp; Nama</td>
                        <td><b> : </b></td>
                        <td colspan="4"> <input type="text" class="form-control" name="penerima" value="<?php echo $buka;?>" readonly></td>
                      </tr>
                      <tr>  
                        <td> &nbsp; &nbsp; Kode Vendor</td>
                        <td><b> : </b></td>
                        <td><input type="text" class="form-control" name="vendor" value="<?php echo $row->vendor;?>" readonly></td>
                        <td>Bank</td>
                        <td>:</td>
                        <td><?php echo $row->akun_bank; ?> </td>
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
                        </td>
                        <td>
                          <input type="checkbox" name="label4[]" value="Copy PO/SPK" <?php echo $xxii6=="Copy PO/SPK"? 'checked':''?> disabled>Copy PO/SPK</input><br>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <input type="checkbox" name="label4[]" value="Berita Acara Pemeriksaan (BAP)" <?php echo $xxii2=="Berita Acara Pemeriksaan (BAP)"? 'checked':''?> disabled>Berita Acara Pemeriksaan (BAP)</input><br>
                        </td>
                        <td>
                          <input type="checkbox" name="label4[]" value="Copy Kontrak/Perjanjian" <?php echo $xxii7=="Copy Kontrak/Perjanjian"? 'checked':''?> disabled>Copy Kontrak/Perjanjian</input><br>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <input type="checkbox" name="label4[]" value="Berita Acara Pemeriksaan (BAST)" <?php echo $xxii3=="Berita Acara Pemeriksaan (BAST)"? 'checked':''?> disabled>Berita Acara Pemeriksaan (BAST)</input><br> 
                        </td>
                        <td>
                          <input type="checkbox" name="label4[]" value="Faktur Pajak Rangkap 2" <?php echo $xxii8=="Faktur Pajak Rangkap 2"? 'checked':''?> disabled>Faktur Pajak Rangkap 2</input><br>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <input type="checkbox" name="label4[]" value="Bukti Penerimaan Jasa/Barang (Delivery Order)" <?php echo $xxii4=="Bukti Penerimaan Jasa/Barang (Delivery Order)"? 'checked':''?> disabled>Bukti Penerimaan Jasa/Barang (Delivery Order)</input><br>
                        </td>
                        <td>
                          <input type="checkbox" name="label4[]" value="Form DGT-1 & COD (Jika kode vendor tidak tersedia)" <?php echo $xxii9=="Form DGT-1 & COD (Jika kode vendor tidak tersedia)"? 'checked':''?> disabled>Form DGT-1 & COD (Jika kode vendor tidak tersedia)</input><br>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <input type="checkbox" name="label4[]" value="Copy Dokumen Permintaan Barang/Jasa terkait (PR/Memo)" <?php echo $xxii5=="Copy Dokumen Permintaan Barang/Jasa terkait (PR/Memo)"? 'checked':''?> disabled>Copy Dokumen Permintaan Barang/Jasa terkait (PR/Memo)</input><br>
                        </td>
                        <td>
                          <input type="checkbox" name="label4[]" value="NPWP" <?php echo $xxii10=="NPWP"? 'checked':''?> disabled>NPWP (Jika kode vendor tidak tersedia)</input><br>
                        </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td>
                          <input id="lainnya" onclick="showInput()" type="checkbox" name="label4[]" value="Lainnya (Jika ada) : Rincian Pengeluaran" <?php echo $xxii11=="Lainnya (Jika ada) : Rincian Pengeluaran"? 'checked':''?> disabled>Lainnya (Jika ada) : Rincian Pengeluaran</input><br>
                          <?php if ($row->label4->$xxii11) { $showing="style='display: none'" ;
                          }else{ 
                                $showing="style=''" ;
                          } ?>
                            <textarea id="text1" <?php echo $showing;?> type="text" class="form-control" name="lainnya1" style="display:none" readonly> <?php echo $row->lainnya1;?></textarea> <br>
                            <!-- <input id="text2" <?php echo $showing;?> type="text" class="form-control" name="lainnya2" style="display:none" value="<?php echo $row->lainnya2;?>" readonly> <br> -->
                        </td>
                      </tr>       
                    </table>

                    <br>

                    <?php if ($row->jenis_pembayaran == 2 || $row->jenis_pembayaran == 4 || $row->jenis_pembayaran == 5) { $showed="style='display: none'" ;
                    }else{
                          $showed="style=''" ;
                    } ?>
                                                
                    <table width="70%" id="show" <?php echo $showed;?> >
                      <tbody>
                      <tr>
                        <td><b>Khusus diisi untuk Jenis Pembayaran Pertanggungjawaban Uang Muka/Settlement:</b></td>
                      </tr>
                        <td width="50%"><b>- Nomor ARF terkait</b></td>
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
                                                echo "SVP"; } ?> <?php echo $divhead->division_id; ?> </td>
                        <?php } ?>                        
                      </tr>                            
                    </tbody>
                    </table>

                  </div>  
                </div>                 

                    <div class="box">
                      <div class="box-header with-border">
                        <a class="btn btn-warning" href="Tri" role="button">Back</a>
                        <?php if ($row->status == 0) { ?>
                          <a class="btn btn-primary" href="Tri/formfinished/<?php echo $row->id_payment; ?>" role="button">Edit</a>
                            <?php if ($row->jenis_pembayaran == 4 || $row->jenis_pembayaran == 5) { ?>
                              <!-- <form id="form" method="post" action="Home/draftprintdp" target="_blank" onsubmit="update()">
                                <input type='hidden' value='<?php echo $row->id_payment; ?>' name='id_payment' id='id_payment'>
                                <button type="submit" class="btn btn-danger">Print</button>
                              </form>       -->
                              <a class="btn btn-danger" href="Tri/draftprintdp/<?php echo $row->id_payment; ?>" target="_blank" role="button" >Set To Print</a>

                            <?php }else if ($row->jenis_pembayaran == 2 || $row->jenis_pembayaran == 3 ) { ?>
                              <!-- <form id="form" method="post" action="Tri/draftprint" target="_blank" onsubmit="update()">
                                <input type='hidden' value='<?php echo $row->id_payment; ?>' name='id_payment' id='id_payment'>
                                <button type="submit" class="btn btn-primary">Print</button>
                              </form>  -->
                              <a class="btn btn-danger" href="Tri/draftprint/<?php echo $row->id_payment; ?>" target="_blank" role="button">Set To Print</a>
                              <!-- <a class="btn btn-danger" href="Home/report/<?php echo $row->id_payment; ?>" target="_blank" role="button">Print</a>     -->
                            <?php } ?>    
                            <!-- <button type="submit" class="btn btn-success">Save</button> -->
                            <!-- <button type="button" data-toggle="modal" data-target="#modalNext" class="btn btn-primary">View</button>  -->
                        <?php } ?>
                        
                        <?php 
                          $sql = "SELECT activate FROM m_status WHERE id_status=11";
                          $query = $this->db->query($sql)->result();
                          // return $query;
                          // var_dump($query);exit; 
                          $iya = "";
                          foreach ($query as $signature):
                            $iya.= $signature->activate;
                            endforeach;
                        ?>
                        
                        <?php 
                          if($this->session->userdata("role_id") == 4){ ?>      
                          <?php if($row->status == 1 && $iya == "On"){ ?>
                          <button type="button" data-toggle="modal" data-target="#approve<?php echo $row->id_payment; ?>" class="btn btn-success">Approved</button>
                          <!----.Modal -->
                          <!----.Accept -->
                          <div class="modal fade" id="approve<?php echo $row->id_payment; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">                                        
                              <div class="modal-body">
                              <form id="approve" method="post" action="Tri/approve">
                                <input type="hidden" name="id_payment" value="<?php echo $row->id_payment; ?>">
                                <p align="justify">Apa kamu yakin akan menyetujui Form SP3 ini :  <?=$row->nomor_surat?></p>
                              </div>
                              <div class="modal-footer">                        
                              <button type="submit" class="btn btn-success bye">Yes</button>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </form>
                              </div>
                            </div>
                            </div>
                          </div>
                                                      
                          <?php } ?>
                        <?php } ?>  

                        <?php if($row->status == 11){ ?>
                          <button type="button" data-toggle="modal" data-target="#submit<?php echo $row->id_payment; ?>" class="btn btn-success">Submit</button>
                          <!----.Modal -->
                          <!----.Accept -->
                          <div class="modal fade" id="submit<?php echo $row->id_payment; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">                                        
                              <div class="modal-body">
                              <form id="accepted" method="post" action="Tri/submit">
                                <input type="hidden" name="id_payment" value="<?php echo $row->id_payment; ?>">
                                <input type="hidden" name="handled_by" value="n.prasetyaningrum">
                                <p align="justify">Apa kamu yakin akan mengirim Form SP3 ini :  <?=$row->nomor_surat?></p>
                              </div>
                              <div class="modal-footer">                        
                              <button type="submit" class="btn btn-success bye">Yes</button>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </form>
                              </div>
                            </div>
                            </div>
                          </div>  
                        <?php } ?>  

                        <?php if($row->status == 1 && $iya == "Off" ){ ?>
                          <button type="button" data-toggle="modal" data-target="#submit<?php echo $row->id_payment; ?>" class="btn btn-success">Submit</button>
                          <!----.Modal -->
                          <!----.Accept -->
                          <div class="modal fade" id="submit<?php echo $row->id_payment; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">                                        
                              <div class="modal-body">
                              <form id="accepted" method="post" action="Tri/submit">
                                <input type="hidden" name="id_payment" value="<?php echo $row->id_payment; ?>">
                                <input type="hidden" name="handled_by" value="n.prasetyaningrum">
                                <p align="justify">Apa kamu yakin akan mengirim Form SP3 ini :  <?=$row->nomor_surat?></p>
                              </div>
                              <div class="modal-footer">                        
                              <button type="submit" class="btn btn-success bye">Yes</button>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </form>
                              </div>
                            </div>
                            </div>
                          </div>  
                        <?php } ?>  
                      </div>
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
