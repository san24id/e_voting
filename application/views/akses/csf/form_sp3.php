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
                  <p align="right">
                      <?php 
                        if($row->status == 0){
                            echo "Draft (Draft)";
                        }else if($row->status == 1){
                          echo "<img src='assets/dashboard/images/legend/green_nobackground.png'>";  
                        }else if($row->status == 2){
                          echo "<img src='assets/dashboard/images/legend/green.png'>";
                        }else if($row->status == 3){
                          echo "<img src='assets/dashboard/images/legend/rejected.png'>";
                        }else if($row->status == 4){
                          echo "<img src='assets/dashboard/images/legend/tax1.png'>";
                        }else if($row->status == 5){
                          echo "<img src='assets/dashboard/images/legend/finance1.png'>";
                        }else if($row->status == 6){
                          echo "<img src='assets/dashboard/images/legend/review1.png'>";
                        }else if($row->status == 7){
                            echo "<img src='assets/dashboard/images/legend/blue.png'>";
                        }else if($row->status == 8){
                          echo "<img src='assets/dashboard/images/legend/yellow.png'>";
                        }else if($row->status == 9){
                          echo "<img src='assets/dashboard/images/legend/purple.png'>"; 
                        }else if($row->status == 10){
                          echo "<img src='assets/dashboard/images/legend/purple.png'>"; 
                        }
                      ?>
                    </p>
                    <h5>
                      <br>                        
                      <left><img src="assets/dashboard/images/logo.png" alt="Logo Images"></left>
                      <br>
                      <center><b><u><font size="+2" style="font-family: calibri;">SURAT PERMINTAAN PROSES PEMBAYARAN</font></u></b></center>
                       
                    </h5>
                    <table style="font-family: calibri;" width="100%">
                      <tbody>
                        <tr>
                        <td> </td>
                        <td align="center"><b><font size="3" style="font-family: calibri;">No   : <?php echo $row->nomor_surat;?></b></td>
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
                      <td align="center"><b>Jenis Pembayaran (pilih salah satu):</b></td>
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
                      </td>
                      </tr>   
                      <tr>
                      <td></td>
                      <td>
                        <input id="checksettlement" onclick="checkUangMuka2()"type="checkbox" name="jenis_pembayaran[]" value="3" <?php echo $xxi3=="3"? 'checked':''?> disabled>Pertanggung Jawaban Uang Muka/Settlement<br>                            
                      </td>
                      </tr>                         
                    </table>

                    <br>

                    <table style="font-family: calibri;" width="100%">
                      <tbody>                            
                      <tr>
                      <td>Kepada : Divisi CSF</td>
                      <td align="center">Tanggal : <?php echo $row->tanggal; ?></td>
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
                        <td width="36%"><b>- Tujuan Penggunaan </b></td>
                        <td><b> : </b></td>
                        <td colspan="6"><textarea type="text" class="form-control" name="label1" readonly><?php echo $row->label1; ?></textarea></td>
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
                      <tr>
                        <td width="36%">Nama</td>
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
                        <td><b>Khusus diisi untuk Jenis Pembayaran Pertanggungjawaban Uang Muka/Settlement:</b></td>
                      </tr>
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

                    <?php if ($row->status == 5 ){ ?>
                      <hr style=" border: 0.5px solid #000;">
                      <h6>
                      
                      <table border="1" class="table table-bordered table-striped" width="50%">
                      <thead>
                        <tr>
                          <th width="9%">Jenis Pajak</th>
                          <th width="8%">Kode Pajak</th>
                          <th width="9%">Kode MAP</th>
                          <th width="10%">Nama</th>
                          <th width="10%">NPWP/ID</th>
                          <th width="8%">Alamat</th>
                          <th width="6%">Tarif</th>
                          <th width="3%">Fasilitas Pajak</th>
                          <th>Special Tarif</th>
                          <th>Gross Up</th>
                          <th>DPP</th>
                          <th>DPP <br>(Gross Up)</th>
                          <th>Pajak Terutang</th>
                          <th>Masa Pajak PPN</th>
                          <th>Tahun Pajak</th>
                          <th>Keterangan</th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php foreach ($process_tax as $tampil) {?>
                        <!-- //Baris 1 -->
                        <tr>
                          <td><?php echo $tampil->jenis_pajak1;?></td>
                          <td><?php echo $tampil->kode_pajak1;?></td>
                          <td><?php echo $tampil->kode_map1;?>
                          </td>
                          <td><?php echo $tampil->nama1;?></td>
                          <td><?php echo $tampil->npwp1;?></td>
                          <td><?php echo $tampil->alamat1;?></td>
                          <td><?php echo $tampil->tarif1;?></td>
                          <td><?php echo $tampil->fas_pajak1;?></td>
                          <td><?php echo $tampil->special_tarif1;?></td>
                          <td><?php echo $tampil->gross1;?></td>
                          <td><?php echo $tampil->dpp1;?></td>
                          <td><?php echo $tampil->dpp_gross1;?></td>
                          <td><?php echo $tampil->pajak_terutang1;?></td>
                          <td><?php echo $tampil->masa_pajak1;?></td>
                          <td><?php echo $tampil->tahun1;?></td>
                          <td><?php echo $tampil->keterangan1;?></td>
                        </tr>
                        <!-- //Baris 2 -->
                        <tr>
                          <td><?php echo $tampil->jenis_pajak2;?></td>
                          <td><?php echo $tampil->kode_pajak2;?></td>
                          <td><?php echo $tampil->kode_map;?>
                          </td>
                          <td><?php echo $tampil->nama2;?></td>
                          <td><?php echo $tampil->npwp2;?></td>
                          <td><?php echo $tampil->alamat2;?></td>
                          <td><?php echo $tampil->tarif2;?></td>
                          <td><?php echo $tampil->fas_pajak2;?></td>
                          <td><?php echo $tampil->special_tarif2;?></td>
                          <td><?php echo $tampil->gross2;?></td>
                          <td><?php echo $tampil->dpp2;?></td>
                          <td><?php echo $tampil->dpp_gross2;?></td>
                          <td><?php echo $tampil->pajak_terutang2;?></td>
                          <td><?php echo $tampil->masa_pajak2;?></td>
                          <td><?php echo $tampil->tahun2;?></td>
                          <td><?php echo $tampil->keterangan2;?></td>
                        </tr>
                        <!-- //Baris 3 -->
                        <tr>
                          <td><?php echo $tampil->jenis_pajak3;?></td>
                          <td><?php echo $tampil->kode_pajak3;?></td>
                          <td><?php echo $tampil->kode_map;?>
                          </td>
                          <td><?php echo $tampil->nama3;?></td>
                          <td><?php echo $tampil->npwp3;?></td>
                          <td><?php echo $tampil->alamat3;?></td>
                          <td><?php echo $tampil->tarif3;?></td>
                          <td><?php echo $tampil->fas_pajak3;?></td>
                          <td><?php echo $tampil->special_tarif3;?></td>
                          <td><?php echo $tampil->gross3;?></td>
                          <td><?php echo $tampil->dpp3;?></td>
                          <td><?php echo $tampil->dpp_gross3;?></td>
                          <td><?php echo $tampil->pajak_terutang3;?></td>
                          <td><?php echo $tampil->masa_pajak3;?></td>
                          <td><?php echo $tampil->tahun3;?></td>
                          <td><?php echo $tampil->keterangan3;?></td>
                        </tr>
                        <!-- //Baris 4 -->
                        <tr>
                          <td><?php echo $tampil->jenis_pajak4;?></td>
                          <td><?php echo $tampil->kode_pajak4;?></td>
                          <td><?php echo $tampil->kode_map;?>
                          </td>
                          <td><?php echo $tampil->nama4;?></td>
                          <td><?php echo $tampil->npwp4;?></td>
                          <td><?php echo $tampil->alamat4;?></td>
                          <td><?php echo $tampil->tarif4;?></td>
                          <td><?php echo $tampil->fas_pajak4;?></td>
                          <td><?php echo $tampil->special_tarif4;?></td>
                          <td><?php echo $tampil->gross4;?></td>
                          <td><?php echo $tampil->dpp4;?></td>
                          <td><?php echo $tampil->dpp_gross4;?></td>
                          <td><?php echo $tampil->pajak_terutang4;?></td>
                          <td><?php echo $tampil->masa_pajak4;?></td>
                          <td><?php echo $tampil->tahun4;?></td>
                          <td><?php echo $tampil->keterangan4;?></td>
                        </tr>
                        <!-- //Baris 5 -->
                        <tr>
                          <td><?php echo $tampil->jenis_pajak5;?></td>
                          <td><?php echo $tampil->kode_pajak5;?></td>
                          <td><?php echo $tampil->kode_map;?>
                          </td>
                          <td><?php echo $tampil->nama5;?></td>
                          <td><?php echo $tampil->npwp5;?></td>
                          <td><?php echo $tampil->alamat5;?></td>
                          <td><?php echo $tampil->tarif5;?></td>
                          <td><?php echo $tampil->fas_pajak5;?></td>
                          <td><?php echo $tampil->special_tarif5;?></td>
                          <td><?php echo $tampil->gross5;?></td>
                          <td><?php echo $tampil->dpp5;?></td>
                          <td><?php echo $tampil->dpp_gross5;?></td>
                          <td><?php echo $tampil->pajak_terutang5;?></td>
                          <td><?php echo $tampil->masa_pajak5;?></td>
                          <td><?php echo $tampil->tahun5;?></td>
                          <td><?php echo $tampil->keterangan5;?></td>
                        </tr>
                        <!-- //Baris 6 -->
                        <tr>
                          <td><?php echo $tampil->jenis_pajak6;?></td>
                          <td><?php echo $tampil->kode_pajak6;?></td>
                          <td><?php echo $tampil->kode_map;?>
                          </td>
                          <td><?php echo $tampil->nama6;?></td>
                          <td><?php echo $tampil->npwp6;?></td>
                          <td><?php echo $tampil->alamat6;?></td>
                          <td><?php echo $tampil->tarif6;?></td>
                          <td><?php echo $tampil->fas_pajak6;?></td>
                          <td><?php echo $tampil->special_tarif6;?></td>
                          <td><?php echo $tampil->gross6;?></td>
                          <td><?php echo $tampil->dpp6;?></td>
                          <td><?php echo $tampil->dpp_gross6;?></td>
                          <td><?php echo $tampil->pajak_terutang6;?></td>
                          <td><?php echo $tampil->masa_pajak6;?></td>
                          <td><?php echo $tampil->tahun6;?></td>
                          <td><?php echo $tampil->keterangan6;?></td>
                        </tr>
                        <!-- //Baris 7 -->
                        <tr>
                          <td><?php echo $tampil->jenis_pajak7;?></td>
                          <td><?php echo $tampil->kode_pajak7;?></td>
                          <td><?php echo $tampil->kode_map;?>
                          </td>
                          <td><?php echo $tampil->nama7;?></td>
                          <td><?php echo $tampil->npwp7;?></td>
                          <td><?php echo $tampil->alamat7;?></td>
                          <td><?php echo $tampil->tarif7;?></td>
                          <td><?php echo $tampil->fas_pajak7;?></td>
                          <td><?php echo $tampil->special_tarif7;?></td>
                          <td><?php echo $tampil->gross7;?></td>
                          <td><?php echo $tampil->dpp7;?></td>
                          <td><?php echo $tampil->dpp_gross7;?></td>
                          <td><?php echo $tampil->pajak_terutang7;?></td>
                          <td><?php echo $tampil->masa_pajak7;?></td>
                          <td><?php echo $tampil->tahun7;?></td>
                          <td><?php echo $tampil->keterangan7;?></td>
                        </tr>
                      </tbody>
                       <?php } ?>  
                      </table>
                      </h6>
                    <?php } ?>                   
                  </div>  
                </div>                 

                    <div class="box">
                      <div class="box-header with-border">
                        <a class="btn btn-warning" href="Dashboard/monitoring" role="button">Back</a>
                        <!-- <?php if($row->status == 1){ ?>
                          <button type="button" data-toggle="modal" data-target="#accept<?php echo $row->id_payment; ?>" class="btn btn-success">Accept</button>
                        <?php } ?>   -->

                        <?php if($this->session->userdata("username") == "n.prasetyaningrum"){ ?>
                          <?php if($row->status == 2){ ?>
                            <button type="button" data-toggle="modal" data-target="#processing<?php echo $row->id_payment; ?>" class="btn btn-success">Proceed To Tax</button>
                            <button type="button" data-toggle="modal" data-target="#reject<?php echo $row->id_payment; ?>" class="btn btn-danger">Reject</button>
                          <?php } ?>
                        <?php } ?>  

                        <?php if($this->session->userdata("username") == "a.ester"){ ?>
                          <?php if($row->status == 4){ ?>
                            <a class="btn btn-success" href="Dashboard/form_sp3_2/<?php echo $row->id_payment; ?>" role="button">Procees To Tax</a>
                          <?php } ?>
                        <?php } ?>  

                        <?php if($this->session->userdata("username") == "n.prasetyaningrum"){ ?>
                          <?php if ($row->jenis_pembayaran == 2) { ?> 
                            <?php if ($row->status == 5) { ?> 
                              <a class="btn btn-primary" href="Dashboard/form_arf/<?php echo $row->id_payment; ?>" target="_blank" role="button">Create APF Form</a>
                            <?php } ?>                        
                          <?php } ?>
                          <?php if ($row->jenis_pembayaran == 3) { ?> 
                            <?php if ($row->status == 5) { ?> 
                              <?php if ($row->currency2 == "" && $row->currency3 == "") { ?>
                                  
                              <a class="btn btn-primary" href="Dashboard/form_asf/<?php echo $row->id_payment; ?>" target="_blank" role="button">Create APF Form</a>
                              <?php } ?>

                              <?php if ($row->currency2 != "" || $row->currency3 != ""){ ?>
                                <a class="btn btn-primary" href="Dashboard/form_asf2/<?php echo $row->id_payment; ?>" target="_blank" role="button">Create APF Form</a> 
                              <?php } ?>  
                            <?php } ?>                       
                          <?php } ?>
                          <?php if ($row->jenis_pembayaran == 4) { ?> 
                            <?php if ($row->status == 5) { ?> 
                              <a class="btn btn-primary" href="Dashboard/form_prf/<?php echo $row->id_payment; ?>" target="_blank" role="button">Create APF Form</a>
                            <?php } ?>                        
                          <?php } ?>
                          <?php if ($row->jenis_pembayaran == 5) { ?> 
                            <?php if ($row->status == 5) { ?> 
                              <a class="btn btn-primary" href="Dashboard/form_crf/<?php echo $row->id_payment; ?>" target="_blank" role="button">Create APF Form</a>
                            <?php } ?>                        
                          <?php } ?>    
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
      <p align="justify">Apa kamu yakin telah menerima Form SP3 ini :  <?=$row->nomor_surat?></p>
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
        <p align="justify">Apa kamu yakin akan me-rejected Form SP3 ini : <?=$row->nomor_surat?></p>
        <label>Notes :</label>                
        <textarea type="text" class="form-control" name="note"></textarea>
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
        <p align="justify">Apa kamu yakin telah menerima Form SP3 ini :  <?=$row->nomor_surat?> ?</p>
        <label>Dan akan mengirimkan Form SP3 ini Kepada CSF Tax?</label> 
        <input type="hidden" name="handled_by" value="a.ester">                       
        <!-- <select class="form-control" name="handled_by">
          <option>--- Choose ---</option>
        <?php foreach ($csf as $get) {?>
          <option value="<?php echo $get->username; ?>"><?php echo $get->username; ?></option>
        <?php } ?>
        </select> -->
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

function hide() {
  var checkBox = document.getElementById("checked");
  var checkBox2 = document.getElementById("checked2");
  var text = document.getElementById("show");
  if (checkBox.checked == false && checkBox2.checked == false ){
    text.style.display = "block";
  } else {
     text.style.display = "none";
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

function checkUangMuka() {
  // alert();
  // var checkBox1 = document.getElementById("checkrequest");
  // var checkBox2 = document.getElementById("checksettlement");
  document.getElementById("auto").checked = true;
  if (document.getElementById("checkrequest").checked == false){
    document.getElementById("auto").checked=false
  } 
}

function checkUangMuka2() {
  // alert();
  // var checkBox1 = document.getElementById("checkrequest");
  // var checkBox2 = document.getElementById("checksettlement");
  document.getElementById("auto").checked = true;
  if (document.getElementById("checksettlement").checked == false){
    document.getElementById("auto").checked=false
  } 
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
