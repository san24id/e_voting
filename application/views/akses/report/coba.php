<html>
<body>
<div class="container">
<div class="row">

<?php foreach ($ppayment as $row) { ?>
        <div class="col-xs-12">
        <!-- <div id="printThis"> -->
        <!-- /.box -->
        <div class="box">
        <input type="hidden" name="id_payment" value="<?php echo $row->id_payment; ?>" >
        <input type="hidden" name="id_user" value="<?php echo $row->id_user; ?>" >
            <div class="box-header with-border">
            <h5>
                <left><img src="<?php echo base_url(); ?>/assets/dashboard/images/logo.png" alt="Logo Images"></left>
                <br>
                <center><b><u>SURAT PERMINTAAN PROSES PEMBAYARAN</font></u></b></center>
            </h5>
            <table width="100%">
                <tbody>
                <tr>
                <td> </td>
                <td align="center"><b>No   : <?php echo $row->nomor_surat;?></b></td>
        
                <td><b>No ARF/ASF   :</b></td>
                </tr>
                </tbody>
            </table>
            <table width="100%">
                <tbody>     
                <tr>
                <td></td>
                <td align="center"><b><i>(dilengkapi oleh Pemohon)</b></td>
                <td><b><i>(dilengkapi oleh CSF, coret salah satu)</b></td>
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

            <table width="100%">
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

            <table width="100%">
                <tbody>
                <p>Mohon dapat dilakukan proses pembayaran / pengembalian uang dengan perincian sebagai berikut : </p>
                <tr>
                <td><b>- Tujuan Penggunaan :</b></td>
                <td>
                <td colspan="2">&nbsp; <?php echo $row->label1; ?></td>
                
                </tr>
                <tr>
                <td><b>- Jumlah :</b></td>
                <td><select name="currency" class="form-control">
                        <option value="EUR"<?php echo $row->currency==EUR? 'selected':''?> disabled>EUR</option>
                        <option value="GBP"<?php echo $row->currency==GBP? 'selected':''?>disabled>GBP</option>
                        <option value="HKD"<?php echo $row->currency==HKD? 'selected':''?>disabled>HKD</option>
                        <option value="IDR"<?php echo $row->currency==IDR? 'selected':''?>disabled>IDR</option>
                        <option value="JPY"<?php echo $row->currency==JPY? 'selected':''?>disabled>JPY</option>
                        <option value="KRW"<?php echo $row->currency==KRW? 'selected':''?>disabled>KRW</option>
                        <option value="SGD"<?php echo $row->currency==SGD? 'selected':''?>disabled>SGD</option>
                        <option value="USD"<?php echo $row->currency==USD? 'selected':''?>disabled>USD</option>
                        </select>
                    </td>
                <td colspan="2">&nbsp; <?php echo $row->label2; ?></td>
                </tr>
                <tr>
                <td><b>- Perkiraan Tanggal :</b></td>
                <td></td>
                <td> &nbsp; <?php echo $row->label3; ?></td>     
                </tr>
                <tr>
                <td colspan="2"><b>Selesai Pekerjaan/Terima Barang</b> <br>(Hanya diisi untuk jenis pembayaran <i><b>Permintaan Uang Muka/Request)</b></i></td>
                </tr>                            
                </tbody>
            </table>

            <br>

            <table width="100%">
                <tbody>
                <b><p>- Penyedia Barang / Jasa Penerima Pembayaran</p></b> 
                <tr>
                <td>&nbsp; Nama : &nbsp; <?php echo $row->penerima;?></td>
                </tr>
                <tr>  
                <td>&nbsp; Kode Vendor : &nbsp; <?php echo $row->vendor;?></td>
                <td>&nbsp; Bank : &nbsp; <?php echo $row->akun_bank;?>
                </td>
                </tr>
                <tr>
                <td>                            
                <td>&nbsp; Nomor Rekening : &nbsp; <?php echo $row->no_rekening; ?></td>                                
                </tr>
                <tr>
                <td colspan="2"><i>(diisi dengan mengacu pada vendor master data-Procurement)</i></td>
                </tr>
                </tbody>
            </table>

            <br>

            <table width="100%">
                <tr>
                <td><b>- Lampiran Dokumen Pendukung :</b></td>
                <td><td>
                </tr>
                <tr>
                <td>  
                <?php if($row->label4){
                    echo $row->label4;
                }?>
                </td>
                <tr>      
            </table>

            <br>

            <table width="100%">
                <tbody>
                <b><p>Khusus diisi untuk Jenis Pembayaran Pertanggungjawaban Uang Muka/Settlement:</p></b>
                <tr>
                <td><b>- Nomor ARF terkait : </b></td>
                <td>
                    &nbsp; <?php echo $row->label5;?>                          
                </td>
                <td><input type="checkbox" name="label6" value="Lampiran copy ARF tersedia"<?php echo $row->label6=="Lampiran copy ARF tersedia"? 'checked':''?> disabled>Lampiran copy ARF tersedia</td>
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
                <td>&nbsp; <?php echo $row->label7;?><td>
                </tr>
                <td>Jumlah Uang Muka : </td>
                <td>
                <td>&nbsp; <?php echo $row->label8; ?> </td>     
                <tr>
                <td>Selisih Kurang/Lebih : </td> 
                <td>
                <td>&nbsp; <?php echo $row->label9; ?></td>                               
                </tr>                              
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
                <td>Nama : &nbsp; <?php echo $row->display_name?></td>
                <td>Nama Approval : </td>
                </tr>
                <tr>
                <td>Jabatan : &nbsp; <?php echo $row->jabatan?></td>
                <td>Jabatan : &nbsp; </td>
                </tr>                            
            </tbody>
            </table>

            <hr style=" border: 0.5px solid #000;">
            <h6>
            <table border="1" width="100%">
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
</div>
</body>
</html>