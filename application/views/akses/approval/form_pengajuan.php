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
    $dvs = $this->session->userdata('division_id');
    // var_dump($dvs);exit;
		$arrvendor="";
		$strvendor="";
		$counter=0;
		foreach($data_vendor as $vndr){
                  $arrvendor= $arrvendor . $vndr->nama ." - " .$vndr->kode_vendor.";" ;
				  $counter=$counter+1;
		}
		$strvendor=substr($arrvendor,0,strlen($arrvendor)-1);
		
		$arrbank="";
		$strbank="";
		foreach($bank as $bnk){
                  $arrbank= $arrbank . $bnk->bank .";" ;
		}
		$strbank=substr($arrbank,0,strlen($arrbank)-1);
		$arrcurrency="";
		$strcurrency="";
		foreach($currency as $cur){
                  $arrcurrency= $arrcurrency . $cur->currency .";" ;
		}
		$strcurrency=substr($arrcurrency,0,strlen($arrcurrency)-1);
															 
		?>
        <!-- Main content -->
        <form id="formadd" action="#" >
          <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <!-- /.box -->
                <div class="box">
                  <div class="box-header with-border">
                    <h5>
                      <br>
                      <left><img src="assets/dashboard/images/logo.png" alt="Logo Images"></left>
                      <br>
                      <center><b><u><font size="+2" style="font-family: calibri;">SURAT PERMINTAAN PROSES PEMBAYARAN</font></u></b></center>
                    </h5>
                    <table style="font-family: calibri;" width="100%">
                      <tbody>
                        <tr>                       
                          <td align="center" width="50%"><b><font size="3" style="font-family: calibri;">No   : XXXX/<?php echo $dvs?>/SPPP/<?php echo date("my")?></b></td>
                          <!-- <input type="hidden" name="nomor_surat" class="form-control" value="<?php echo $surat; ?>">   -->
                          <input type="hidden" name="id_user" class="form-control" value="<?php echo $this->session->userdata('id_user') ?>">           
                          <input type="hidden" id="id_payment" name="id_payment" >  
                        <!-- <td width="50%"><center><b>No ARF/ASF   :</b></center></td> -->
                        </tr>
                      </tbody>
                    </table>
                    <!-- <table style="font-family: calibri;" width="100%">
                      <tbody>     
                        <tr>
                        
                        <td align="center" width="50%"><b><i><font size="2" style="font-family: calibri;">(dilengkapi oleh Pemohon)</b></td>
                        <td width="50%"><center><b><i><font size="2" style="font-family: calibri;">(dilengkapi oleh CSF, coret salah satu)</b></center></td>
                        </tr>
                      </tbody>
                    </table> -->

                    <br>

                    <table style="font-family: calibri;" width="100%">
                      <tr>
                        <td><b>Jenis Pembayaran <font color="red"> * </font> (pilih salah satu):</b></td>
                        <td>
                          <input id="auto" type="checkbox" disabled> <b>Uang Muka/Advance</b><br>
                        </td>
                        <td>
                          <input id="checked"  type="checkbox" name="jenis_pembayaran[]" value="4"><b><i> Direct Payment</input><br>
                        </td>
                        <td>
                          <input id="checked2"  type="checkbox" name="jenis_pembayaran[]" value="5"><b><i> Cash Received</input><br>
                        </td>
                      </tr>  
                      <tr>
                          <td></td>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input id="checkrequest" type="checkbox" name="jenis_pembayaran[]" value="2"> Permintaan Uang Muka/<i>Advance Request</input><br>
                          </td>
                          <td style="display:none">
                            <input id="checkcreditcard"  type="checkbox" name="jenis_pembayaran[]" value="6" > Corporate Credit Card </input><br>
                          </td>
                      </tr>  
                      <tr>
                        <td></td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <input id="checksettlement"  type="checkbox" name="jenis_pembayaran[]" value="3"> Pertanggungjawaban Uang Muka/<i>Advance Settlement</input><br>                            
                        </td>
                      </tr> 
						<input type="hidden" id="jns_pembayaran" name="jns_pembayaran" >  
                    </table>

                    <br>

                    <table style="font-family: calibri;" width="100%">
                      <?php
                        $dayList = array(
                              'Sun' => 'Minggu',
                              'Mon' => 'Senin',
                              'Tue' => 'Selasa',
                              'Wed' => 'Rabu',
                              'Thu' => 'Kamis',
                              'Fri' => 'Jumat',
                              'Sat' => 'Sabtu'
                          );
                          $hari_ing = date('D');
                          // echo date("D");
                      ?>              
                      <tbody>                            
                      <tr>
                      <td>Kepada : Divisi CSF</td>
                      <td align="right">Tanggal : <?php echo $dayList[$hari_ing]; ?>, <?php echo date('d-M-Y'); ?></td>
                        <input type="hidden" name="tanggal" class="form-control" value="<?php echo $dayList[$hari_ing]; ?>, <?php echo date('d-M-Y'); ?>">
                        <input type="hidden" name="tanggal2" value="<?php echo date('Y-m-d');?>">
                      </tr>
                      <tr>
                      <td>Dari : </td>
                      </tr>             
                      <tr>
                        <td>&nbsp;  Nama Pemohon : &nbsp; <?php echo $this->session->userdata('display_name') ?></td>
                        <input type="hidden" name="display_name" class="form-control" value="<?php echo $this->session->userdata('display_name') ?>">
                        <input type="hidden" name="jabatan" class="form-control" value="<?php echo $this->session->userdata('jabatan') ?>">
                      </tr> 
                      <tr>
                        <td>&nbsp;  Direktorat/Divisi Pemohon : &nbsp; <?php echo $this->session->userdata('division_id') ?></td>
                        <input type="hidden" name="division_id" class="form-control" value="<?php echo $this->session->userdata('division_id') ?>">                            
                      </tr>                                                   
                      </tbody>
                    </table>

                    <hr style=" border: 1px solid #000;">

                    <table style="font-family: calibri;" width="100%">
                      <tbody>
                      <p>Mohon dapat dilakukan proses pembayaran / pengembalian uang dengan perincian sebagai berikut : </p>
                      <tr>
                        <td width="36%"><b>- Tujuan Penggunaan <font color="red"> * </font> </b></td>
                        <td><b> : </b></td>
                        <!--<td>-->
                        <td colspan="8"><textarea type="text" id="tujuanPenggunaan" class="form-control" rows="5" name="label1" placeholder="Tujuan Penggunaan" ></textarea></td>
                        
                      </tr>
                      <tr>
                        <td><b>- Jumlah <font color="red"> * </font> </b> <br> <i>Nilai (+) = Pembayaran, Nilai (-) = Pengembalian</i></td>
                        <td><b> : </b></td>
                        <td><select id="Select" onchange="myFunction()" name="currency" class="form-control" >
                                      <option value="">--Choose--</option>
                                      <?php foreach ($currency as $get) {?>
                                  <option value="<?php echo $get->currency; ?>"><?php echo $get->currency; ?></option>
                                <?php } ?>
                              </select>
                        </td>
                        <td colspan="2"><input type="text" id="rupiah" class="form-control" name="label2" placeholder="Jumlah" > </td>

                        <td><select name="currency2" class="form-control">
                                      <option value="">--Choose--</option>
                                      <?php foreach ($currency as $get) {?>
                                      <option value="<?php echo $get->currency; ?>"><?php echo $get->currency; ?></option>

                                <?php } ?>
                              </select>
                        </td>
                        <td colspan="2"><input type="text" id="rupiah2" class="form-control" name="jumlah2" placeholder="Jumlah" > </td>

                        <td><select name="currency3" class="form-control">
                                      <option value="">--Choose--</option>
                                      <?php foreach ($currency as $get) {?>
                                      <option value="<?php echo $get->currency; ?>"><?php echo $get->currency; ?></option>

                                <?php } ?>
                              </select>
                        </td>
                        <td colspan="2"><input type="text" id="rupiah3" class="form-control" name="jumlah3" placeholder="Jumlah" > </td>
                      </tr>
                      </tbody>
                    </table>
                    
                    <table id="choose" style="font-family: calibri;display:none;" width="100%; ">
                      <tbody>
                      <tr>
                        <td width="36%"><b>- Perkiraan Tanggal Selesai Pekerjaan/Terima Barang <font color="red"> * </font></b>
                        	<br>
                        </td>
                        <td align="right"><b> : </b></td>
                        <td colspan="8" width="65%"><input type="text" id="perkiraanSelesai" name="label3" class="form-control" "></input></td>     
                      </tr>
                                                  
                      </tbody>
                    </table>

                    <br>

                    <!--<table style="font-family: calibri;" width="100%">
                      <tbody>
                      <b><p>- Penyedia Barang / Jasa Penerima Pembayaran</p></b> 
                      <tr>
                        <td width="33%">Nama</td>
                        <td align="right"><b>:</b></td>
                        <td colspan="4"><select id="penerima" onchange="fung()" class="form-control" name="penerima" >
                                            <option value="">--Choose--</option>
                                            <?php foreach ($data_vendor as $nama){?> 
                                              <option value="<?php echo $nama->kode_vendor;?>"><?php echo $nama->nama;?> &nbsp; - <?php echo $nama->kode_vendor;?></option>
                                            <?php } ?>
                                        </select>
                        </td>
                      </tr>
                      <tr>  
                        <td>Kode Vendor</td>
                        <td align="right"><b>:</b></td>
                        <td><input id="kode_vendor" type="text" class="form-control" name="vendor" placeholder="Enter Text" ></td>
                        <td>Bank</td>
                        <td>:</td>
                        <td><select id="dropdown" name="akun_bank" class="form-control" >
                                <option value="">--- Choose ---</option>
                                <?php foreach ($bank as $get) {?>
                                  <option value="<?php echo $get->bank; ?>"><?php echo $get->bank; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Nomor Rekening</td> 
                        <td>:</td>                           
                        <td><input id="textInput" type="text" class="form-control" name="no_rekening" placeholder="Enter Text" ></td>                                
                      </tr>
                      
                      </tbody>
                    </table>-->
					
					
														<form id="frmvendor" action="#"> 
														<input type="hidden" id="txtcountervendor" name="txtcountervendor" value="1" />
														<input type="hidden" id="strvendor" name="strvendor" value="<?php echo $strvendor; ?>">
														<input type="hidden" id="strbank" name="strbank" value="<?php echo $strbank; ?>">
														<input type="hidden" id="strcurrency" name="strcurrency" value="<?php echo $strcurrency; ?>">
							
														<div class="table-responsive" >
														<table id="show1" class="table table-bordered table-striped"> 
														  <thead>
															<tr>
																<th>Penerima Pembayaran <font color="red"> * </font></th>
																<th>Tunai/Transfer <font color="red"> * </font></th>
																<th>Nomor Rekening <font color="red"> * </font></th>
																<th>Mata Uang <font color="red"> * </font></th>
																<th>Nominal <font color="red"> * </font></th>
																<th>&nbsp;</th>
                              </tr>
														  </thead>
														  <tbody>
														  <b><p>- Penyedia Barang / Jasa Penerima Pembayaran</p></b> 
														  <?php 
															$ttlnomvendor=0;
															$nomvendor='';
															$vendorrow=0;
															$fvendor='';
															if ($getdatavendor == null){ ?>
																<tr id="tr1">
																<td ><select id="penerimavendor1" onchange="fung('penerimavendor1','kodevendor1','namavendor1','1')" class="form-control select2" name="penerimavendor[]" >
																	<option value="">--Choose--</option>
																	<?php foreach ($data_vendor as $nama){?> 
																	  <option value="<?php echo $nama->kode_vendor;?>"><?php echo $nama->nama;?> &nbsp; - <?php echo $nama->kode_vendor;?></option>
																	  
																	<?php } ?>
																	</select>
																	<input id="kodevendor1" type="hidden" name="kodevendor[]"  />
																	<input id="namavendor1" type="hidden" name="namavendor[]"  />
																</td>
																
																<td><select id="bankvendor1" name="bankvendor[]" class="form-control select2" onclick="drpbank('bankvendor1','rekeningvendor1','1')">
																	<option value="">--- Choose ---</option>
																	<?php foreach ($bank as $get) {?>
																	  <option value="<?php echo $get->bank; ?>"><?php echo $get->bank; ?></option>
																	<?php } ?>
																	</select>
																</td>
																<td><input id="rekeningvendor1" type="text" class="form-control" name="rekeningvendor[]" placeholder="Enter Text" >
																</td>      
																<td><select id="currencyvendor1" name="currencyvendor[]" class="form-control">
																		  <option value="">--Choose--</option>
																		  <?php foreach ($currency as $cur) {?>
																		  <option value="<?php echo $cur->currency; ?>"><?php echo $cur->currency; ?></option>

																	<?php } ?>
																  </select>
															    </td>							  
																<td><input class="form-control" id="nominalvendor1" name="nominalvendor[]" onkeyup="gettotalvendor()" type="text" value="0"></td>																
																<td>&nbsp;</td>
																</tr>
															<?php	
															}else{
															foreach($getdatavendor as $gvendor){
																$nomvendor=str_replace(".","",$gvendor->nominal);
																$ttlnomvendor=$ttlnomvendor+(float)$nomvendor;
																$vendorrow++;
																if($gvendor->v_bank=="Tunai"){
																	$fvendor='readonly';
																}else{
																	$fvendor='';
																}
															?>
															<tr id="tr<?php echo $vendorrow; ?>">
															<td ><select id="<?php echo 'penerimavendor'.$vendorrow; ?>" onchange="fung('<?php echo 'penerimavendor'.$vendorrow; ?>','<?php echo 'kodevendor'.$vendorrow; ?>','<?php echo 'namavendor'.$vendorrow; ?>','<?php echo $vendorrow; ?>')" class="form-control" name="penerimavendor[]" value='<?php echo $gvendor->kode_vendor; ?>'>
																	<option value="">--Choose--</option>
																	<?php foreach ($data_vendor as $nama){?> 
																	  <option value="<?php echo $nama->kode_vendor;?>"><?php echo $nama->nama;?> &nbsp; - <?php echo $nama->kode_vendor;?></option>
																	<?php } ?>
																	</select>
																	<input id="<?php echo 'kodevendor'.$vendorrow; ?>" type="hidden" name="kodevendor[]"   />
																	<input id="<?php echo 'namavendor'.$vendorrow; ?>" type="hidden" name="namavendor[]"   /></td>
															<td><select id="<?php echo 'bankvendor'.$vendorrow; ?>" onchange="drpbank('<?php echo 'bankvendor'.$vendorrow; ?>','<?php echo 'rekeningvendor'.$vendorrow; ?>','<?php echo $vendorrow; ?>')" name="bankvendor[]" class="form-control" value="<?php echo $gvendor->v_bank; ?>" >
																	<option value="">--- Choose ---</option>
																	<?php foreach ($bank as $get) {?>
																	  <option value="<?php echo $get->bank; ?>"><?php echo $get->bank; ?></option>
																	<?php } ?>
																	</select>
																</td>
																<td><input id="<?php echo 'rekeningvendor'.$vendorrow; ?>" type="text" class="form-control" name="rekeningvendor[]" placeholder="Enter Text" value="<?php echo $gvendor->v_account; ?>" <?php echo $fvendor; ?> >
																</td>   
																<td><select id="<?php echo 'currencyvendor'.$vendorrow; ?>" name="currencyvendor[]" class="form-control">
																		  <option value="">--Choose--</option>
																		  <?php foreach ($currency as $cur) {?>
																		  <option value="<?php echo $cur->currency; ?>"><?php echo $cur->currency; ?></option>

																	<?php } ?>
																  </select>
															    </td>								  
															<td ><input class="form-control" id="<?php echo 'nominalvendor'.$vendorrow; ?>" name="nominalvendor[]" onkeyup="gettotalnontax()" type="text" value="<?php echo number_format($gvendor->nominal,0,",",".");  ?>"></td>
															
															<td><span class="btn btn-danger btn-xs" title="Hapus Baris" name='removeButton' onclick="RemoveIndeks('<?php echo 'tr'.$vendorrow; ?>')"> 
																  <i class="glyphicon glyphicon-minus"></i>
																  </span>
															</td>
															</tr>
															<?php } }?>
															
														  </tbody>
														  <tfoot>
															<tr>
																<th><span class="btn btn-success btn-xs" title="Tambah Baris" id='addButton' onclick="AddIndeks()"> 
																  <i class="glyphicon glyphicon-plus"></i>
																  </span></th>
																  <th colspan="3" style="text-align:end;">Total</th>
																  <th><label class="control-label col-md-3" id="lbltotalvendor"><?php echo number_format($ttlnomvendor,0,",","."); ?></label></th>
																  <input type="text" style="display:none;" name="txttotalvendor" id="txttotalvendor"  value="<?php echo number_format($ttlnomvendor,0,",","."); ?>" />
				
															</tr>
														</tfoot>
														</table>
														</div> 
														</form>

                    <br>

                    <table style="font-family: calibri;" width="100%">
                      <tr>
                        <td><b>- Lampiran Dokumen Pendukung :</b></td>
                        <td><td>
                      </tr>

                      <tr>
                        <td>  
                          <input type="checkbox" name="label4[]" value="Bukti Transaksi Asli (a.l : Invoice/Kuitansi, Struk, Nota, Dll)"> Bukti Transaksi Asli (a.l : Invoice/Kuitansi, Struk, Nota, Dll)</input><br>
                        </td>
                        <td>
                          <input type="checkbox" name="label4[]" value="Copy PO/SPK"> Copy PO/SPK</input><br>
                        </td> 
                      </tr> 

                      <tr>
                        <td>
                          <input type="checkbox" name="label4[]" value="Berita Acara Pemeriksaan (BAP)"> Berita Acara Pemeriksaan (BAP)</input><br>
                        </td>
                        <td>
                          <input type="checkbox" name="label4[]" value="Copy Kontrak/Perjanjian"> Copy Kontrak/Perjanjian</input><br>
                        </td>
                      </tr>

                      <tr>
                      	<td>
                      	  <input type="checkbox" name="label4[]" value="Berita Acara Pemeriksaan (BAST)"> Berita Acara Pemeriksaan (BAST)</input><br> 	
                      	</td>
                      	<td>
                      	  <input type="checkbox" name="label4[]" value="Faktur Pajak Rangkap 2"> Faktur Pajak Rangkap 2</input><br>
                      	</td>
                      </tr> 

                      <tr>
                      	<td>
                      	  <input type="checkbox" name="label4[]" value="Bukti Penerimaan Jasa/Barang (Delivery Order)"> Bukti Penerimaan Jasa/Barang (Delivery Order)</input><br>
                      	</td>
                      	<td>
                      	  <input type="checkbox" name="label4[]" value="Form DGT-1 & COD (Jika kode vendor tidak tersedia)"> Form DGT-1 & COD (Jika kode vendor tidak tersedia)</input><br>
                      	</td>
                      </tr>

                      <tr>
                      	<td>
                      	  <input type="checkbox" name="label4[]" value="Copy Dokumen Permintaan Barang/Jasa terkait (PR/Memo)"> Copy Dokumen Permintaan Barang/Jasa terkait (PR/Memo)</input><br>
                      	</td>
                      	<td>
                      	  <input type="checkbox" name="label4[]" value="NPWP"> NPWP (Jika kode vendor tidak tersedia)</input><br>
                      	</td>
                      </tr>

                      <tr>
                      	<td></td>
                      	<td>
                      	  <input id="lainnya" onclick="showInput()" type="checkbox" name="label4[]" value="Lainnya (Jika ada) : Rincian Pengeluaran"> Lainnya (Jika ada <font color="red"> * </font> ) 
                          <textarea id="text1" type="text" class="form-control" name="lainnya1" placeholder="Enter Text" style="display:none" ></textarea><br>
                      	</td>
                      </tr>
                              
                    </table>

                    <br>

                    <table id="show" style="font-family: calibri;display:none" width="100%"; >
                      <tbody>
                      <tr>
                        <td><b>Khusus diisi untuk Jenis Pembayaran Pertanggungjawaban Uang Muka/Settlement:</b></td>
                      </tr>
                      <tr>
                        <td><b>- Nomor ARF terkait <font color="red"> * </font></b></td>
                        <td>:</td>
                        <td><input id="arf_number" type="text" class="form-control" name="label5" placeholder="Enter Text"></td>
                        <td><input type="checkbox" name="label6" value="Lampiran copy ARF tersedia"> Lampiran copy ARF tersedia</input></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td><b>- Perhitungan Penggunaan Uang Muka : <b></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td><center><b> Curr</b></center></td>
                        <td><b> Jumlah/<i>Amount</i></b></td>
                        <td><center><b> Curr</b></center></td>
                        <td><b> Jumlah/<i>Amount</i></b></td>
                        <td><center><b> Curr</b></center></td>
                        <td><b> Jumlah/<i>Amount</i></b></td>
                      </tr>

                      <!--Biaya-->
                      <tr>  
                        <td><b>Jumlah Biaya</b> <font color="red"> * </font></td>
                        <td>:</td>
                        <td><select id="demo" name="currency4" class="form-control" >
                                      <option value="">--Choose--</option>
                                      <?php foreach ($currency as $get) {?>
                                  <option value="<?php echo $get->currency; ?>"><?php echo $get->currency; ?></option>
                                <?php } ?>
                              </select>
                        </td>
                        <td><input id="biaya" onchange="penjumlahan()" type="text" class="form-control" name="label7" placeholder="Enter Text"></input></td>
                        
                        <td><select id="demo" name="currency5" class="form-control" >0
                                      <option value="">--Choose--</option>
                                      <?php foreach ($currency as $get) {?>
                                  <option value="<?php echo $get->currency; ?>"><?php echo $get->currency; ?></option>
                                <?php } ?>
                              </select>
                        </td>
                        <td><input id="biaya2" onchange="penjumlahan2()" type="text" class="form-control" name="label8" placeholder="Enter Text"></input></td>
                        
                        <td><select id="demo" name="currency6" class="form-control" >
                                      <option value="">--Choose--</option>
                                      <?php foreach ($currency as $get) {?>
                                  <option value="<?php echo $get->currency; ?>"><?php echo $get->currency; ?></option>
                                <?php } ?>
                              </select>
                        </td>
                        <td><input id="biaya3" onchange="penjumlahan3()" type="text" class="form-control" name="label9" placeholder="Enter Text"></input></td>
                      </tr>

                      <!--Uang Muka-->
                      <tr>
                        <td><b>Jumlah Uang Muka <font color="red"> * </font></b> <br><i>(wajib diisi dengan tanda kurung/nilai negatif)</i></td>
                        <td>:</td>
                        <td><select id="demo2" name="currency7" class="form-control" >
                                      <option value="">--Choose--</option>
                                      <?php foreach ($currency as $get) {?>
                                  <option value="<?php echo $get->currency; ?>"><?php echo $get->currency; ?></option>
                                <?php } ?>
                              </select>
                        </td>
                        <td><input id="uangmuka" onchange="penjumlahan()" type="text" class="form-control" name="label10" placeholder="Enter Text"></input> </td>
                        
                        <td><select id="demo2" name="currency8" class="form-control" >
                                      <option value="">--Choose--</option>
                                      <?php foreach ($currency as $get) {?>
                                  <option value="<?php echo $get->currency; ?>"><?php echo $get->currency; ?></option>
                                <?php } ?>
                              </select>
                        </td>
                        <td><input id="uangmuka2" onchange="penjumlahan2()" type="text" class="form-control" name="label11" placeholder="Enter Text"></input> </td>
                        
                        <td><select id="demo2" name="currency9" class="form-control" >
                                      <option value="">--Choose--</option>
                                      <?php foreach ($currency as $get) {?>
                                  <option value="<?php echo $get->currency; ?>"><?php echo $get->currency; ?></option>
                                <?php } ?>
                              </select>
                        </td>
                        <td><input id="uangmuka3" onchange="penjumlahan3()" type="text" class="form-control" name="label12" placeholder="Enter Text"></input> </td>     
                      </tr>

                      <!--SELISIH-->
                      <tr>
                        <td><b>Selisih Kurang/(Lebih)</b> <br><i>(Nilai harus sama dengan nilai pada kolom Jumlah diatas)</i></td> 
                        <td>:</td>
                        <td><select id="demo3" name="currency10" class="form-control" >
                                      <option value="">--Choose--</option>
                                      <?php foreach ($currency as $get) {?>
                                  <option value="<?php echo $get->currency; ?>"><?php echo $get->currency; ?></option>
                                <?php } ?>
                              </select>
                        </td>
                        <td><input type="text" id="hasil" class="form-control" name="label13" placeholder="Enter Text" readonly></input></td>
                        
                        <td><select id="demo3" name="currency11" class="form-control" >
                                      <option value="">--Choose--</option>
                                      <?php foreach ($currency as $get) {?>
                                  <option value="<?php echo $get->currency; ?>"><?php echo $get->currency; ?></option>
                                <?php } ?>
                              </select>
                        </td>
                        <td><input type="text" id="hasil2" class="form-control" name="label14" placeholder="Enter Text" readonly></input></td>
                        
                        <td><select id="demo3" name="currency12" class="form-control" >
                                      <option value="">--Choose--</option>
                                      <?php foreach ($currency as $get) {?>
                                  <option value="<?php echo $get->currency; ?>"><?php echo $get->currency; ?></option>
                                <?php } ?>
                              </select>
                        </td>
                        <td><input type="text" id="hasil3" class="form-control" name="label15" placeholder="Enter Text" readonly></input></td>                               
                      </tr>                              
                      </tbody>
                    </table>
                  </div>  
                </div>    

                <div class="box">
                  <div class="box-header with-border">
                    <a class="btn btn-warning" href="Approval" role="button">Cancel</a>  
                    <button type="button" id="btnSave" onclick="savedraft()" class="btn btn-primary">Save</button>
                  </div>
                </div>                                                 
            </div>
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

<script src="assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Select2 -->
<script src="assets/dashboard/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>  
<!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>  -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>

<script>

function penjumlahan(){
  var a = document.getElementById("biaya").value;
  var b = document.getElementById("uangmuka").value;
  // var c = document.getElementById("hasil").value;
  var reva = a.replace(/\./g,'');
  var revb = b.replace(/\./g,'');
  // var revc = c.replace(".","");
  // alert(reva);
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
	  
  // }
}

function fung(param1,param2,param3,param4){
  // alert();  
  var data = document.getElementById(""+param1).value; 
  var strdata=$("#"+param1+" option:selected").text().split(" - "); 
  document.getElementById(""+param2).value = data;
  document.getElementById(""+param3).value = strdata[0];
  //alert(data.substr(0,1));
  if(data.substr(0,1)=="1"){
	  $("#bankvendor"+param4).val("").change();
	  $("#rekeningvendor"+param4).val("").change();
	  $("#nominalvendor"+param4).val("0").change();
	  $("#currencyvendor"+param4).val("").change();
	  $("#bankvendor"+param4).prop( "disabled", true );
	  $("#rekeningvendor"+param4).prop( "readonly", true );
	  $("#currencyvendor"+param4).prop( "disabled", true );
	  $("#nominalvendor"+param4).prop( "readonly", true );
  }else if(data.substr(0,1)=="2"){
	  $("#bankvendor"+param4).val("").change();
	  $("#rekeningvendor"+param4).val( "").change();
	  $("#bankvendor"+param4).prop( "disabled", true );
	  $("#rekeningvendor"+param4).prop( "readonly", true );
	  $("#nominalvendor"+param4).prop( "readonly", false );
  }else if(data.substr(0,1)=="3"){
	  $("#rekeningvendor"+param4).val( "").change(); 
	  $("#bankvendor"+param4).prop( "disabled", false );
	  $("#rekeningvendor"+param4).prop( "readonly", true );
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
	if (strrupiah.substr(0,1)=="(" && strrupiah.substr(strrupiah.length-1,1)==")"){
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
	if (strrupiah2.substr(0,1)=="(" && strrupiah2.substr(strrupiah2.length-1,1)==")"){
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
	if (strrupiah3.substr(0,1)=="(" && strrupiah3.substr(strrupiah3.length-1,1)==")"){
		rupiah3.value = "(" + formatRupiah3(strrupiah3.substr(1,strrupiah3.length-2)) + ")";
	}else if(strrupiah.substr(0,1)=="-") {
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
    biaya.value = formatbiaya(this.value);
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

  var biaya2 = document.getElementById('biaya2');
  biaya2.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    biaya2.value = formatbiaya2(this.value);
  });

  /* Fungsi formatRupiah */
  function formatbiaya2(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    biaya2     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      biaya2 += separator + ribuan.join('.');
    }

    biaya2 = split[1] != undefined ? biaya2 + ',' + split[1] : biaya2;
    return prefix == undefined ? biaya2 : (biaya2? + biaya2 : '');
  }

  var biaya3 = document.getElementById('biaya3');
  biaya3.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    biaya3.value = formatbiaya3(this.value);
  });

  /* Fungsi formatRupiah */
  function formatbiaya3(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    biaya3     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      biaya3 += separator + ribuan.join('.');
    }

    biaya3 = split[1] != undefined ? biaya3 + ',' + split[1] : biaya3;
    return prefix == undefined ? biaya3 : (biaya3? + biaya3 : '');
  }

  var uangmuka = document.getElementById('uangmuka');
  uangmuka.addEventListener('focusout', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    var struangmuka =uangmuka.value;
	if (struangmuka.substr(0,1)=="(" && struangmuka.substr(struangmuka.length-1,1)==")"){
		uangmuka.value = "(" + formatuangmuka(struangmuka.substr(1,struangmuka.length-2)) + ")";
	}else if(struangmuka.substr(0,1)=="-") {
		uangmuka.value = "(" + formatuangmuka(struangmuka.substr(1,struangmuka.length-1)) + ")";
	}else{
		uangmuka.value = formatuangmuka(this.value);
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

  var uangmuka2 = document.getElementById('uangmuka2');
  uangmuka2.addEventListener('focusout', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    var struangmuka2 =uangmuka2.value;
	if (struangmuka2.substr(0,1)=="(" && struangmuka2.substr(struangmuka2.length-1,1)==")"){
		uangmuka2.value = "(" + formatuangmuka2(struangmuka2.substr(1,struangmuka2.length-2)) + ")";
	}else if(struangmuka2.substr(0,1)=="-") {
		uangmuka2.value = "(" + formatuangmuka2(struangmuka2.substr(1,struangmuka2.length-1)) + ")";
	}else{
		uangmuka2.value = formatuangmuka2(this.value);
	}
  });

  /* Fungsi formatRupiah */
  function formatuangmuka2(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    uangmuka2     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      uangmuka2 += separator + ribuan.join('.');
    }

    uangmuka2 = split[1] != undefined ? uangmuka2 + ',' + split[1] : uangmuka2;
    return prefix == undefined ? uangmuka2 : (uangmuka2? + uangmuka2 : '');
  }

  var uangmuka3 = document.getElementById('uangmuka3');
  uangmuka3.addEventListener('focusout', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    var struangmuka3 =uangmuka3.value;
	if (struangmuka3.substr(0,1)=="(" && struangmuka3.substr(struangmuka3.length-1,1)==")"){
		uangmuka3.value = "(" + formatuangmuka3(struangmuka3.substr(1,struangmuka3.length-2)) + ")";
	}else if(struangmuka3.substr(0,1)=="-") {
		uangmuka3.value = "(" + formatuangmuka3(struangmuka3.substr(1,struangmuka3.length-1)) + ")";
	}else{
		uangmuka3.value = formatuangmuka3(this.value);
	}
  });

  /* Fungsi formatRupiah */
  function formatuangmuka3(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    uangmuka3     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      uangmuka3 += separator + ribuan.join('.');
    }

    uangmuka3 = split[1] != undefined ? uangmuka3 + ',' + split[1] : uangmuka3;
    return prefix == undefined ? uangmuka3 : (uangmuka3? + uangmuka3 : '');
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
		}else{
			$('#show').hide();
			$('#jns_pembayaran').val('');
		}
		
		
	});	
	
	$( "#perkiraanSelesai" ).datepicker({
		dateFormat: "dd/mm/yy",
		minDate : 0
	});
	
	
	
	$('#perkiraanSelesai').keydown(function (event) {
		event.preventDefault();
	});
	
	/*var selcounter=$('#txtcountervendor').val();
	for (var i = 1; i <= selcounter; i++) { 
		$("#penerimavendor"+i).select2();
	}*/
	
	//$(".select2").select2();
  // });
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
			if(inps1[i].value==""){
				errmsg="Nama Vendor baris ke " + (i+1) + " belum di pilih";
				break;
			};
			
			if(inps2[i].value==""){
				if (skdvendor.substring(0, 1)=="1" || skdvendor.substring(0, 1)=="2"){
					errmsg="0";
				}else{
					errmsg="Bank Vendor baris ke " + (i+1) + " belum di pilih";
					break;
				}
			};
			if(inps3[i].value=="" && inps2[i].value!="Tunai"){
				if(skdvendor.substring(0, 1)=="1" || skdvendor.substring(0, 1)=="2" || skdvendor.substring(0, 1)=="3"){
					errmsg="0";
				}else{
					errmsg="Nomor Rekening Vendor baris ke " + (i+1) + " belum di input";
					break;
				}
			};
			if(inps5[i].value=="" && skdvendor.substring(0, 1)!="1"){
				errmsg="Mata Uang Vendor baris ke " + (i+1) + " belum di input";
				break;
			};
			if(inps4[i].value=="" && skdvendor.substring(0, 1)!="1"){
				errmsg="Nominal Vendor baris ke " + (i+1) + " belum di input";
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
					if(lbl4[schk].checked && $('#text1').val()==""){
						alert('Dokumen Lampiran Lainnya belum di input');
					}else if ($('#jns_pembayaran').val()=="3" && $('#arf_number').val()==""){
							alert('Nomor ARF Terkait belum di input');
					}else if ($('#jns_pembayaran').val()=="3" && $('#biaya').val()==""){
							alert('Jumlah Biaya belum di input');
					}else if ($('#jns_pembayaran').val()=="3" && $('#uangmuka').val()==""){
							alert('Jumlah Uang Muka belum di input');
					}else{
						<?php foreach ($getID as $key) { ?>
						  var link = "<?php echo base_url('Approval/formfinished/'.$key->id_payment);?>";
						<?php } ?>
						  
						if(save_method=="edit"){
							url = "<?php echo base_url('Approval/saveeditpayment')?>";  
						}else{
							url = "<?php echo base_url('Approval/saveaddpayment')?>";  
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
							window.location = link;
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
		/*}else{
			alert(errmsg);
		}*/
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
		strhtml=strhtml + '<td><select id="penerimavendor'+szcountervendor+'" onchange="fung('+xpenerimavendor+','+xkodevendor+','+xnamavendor+','+szcountervendor+')" class="form-control select2" name="penerimavendor[]" > ' ;
		strhtml=strhtml + '<option value="">--Choose--</option> ';
		
		strvendor =document.getElementById("strvendor").value;
		arrvendor = strvendor.split(";");
	
		for (i=0;i<arrvendor.length; i++){
			arrkdvendor=arrvendor[i].split(" - ");
			strhtml=strhtml + '<option value="' + arrkdvendor[1] + '">' + arrvendor[i] + '</option>';
		}
		strhtml=strhtml + '</select><input id="kodevendor'+szcountervendor+'" type="hidden" name="kodevendor[]"  /><input id="namavendor'+szcountervendor+'" type="hidden" name="namavendor[]"  /></td>'
		
		strhtml=strhtml + '<td><select id="bankvendor'+szcountervendor+'" class="form-control select2" name="bankvendor[]" onchange="drpbank('+xbankvendor+','+xrekeningvendor+','+szcountervendor+')" > ' ;
		strhtml=strhtml + '<option value="">--Choose--</option> ';
		
		strbank =document.getElementById("strbank").value;
		arrbank = strbank.split(";");
	
		for (i=0;i<arrbank.length; i++){
			strhtml=strhtml + '<option value="' + arrbank[i] + '">' + arrbank[i] + '</option>';
		}
		strhtml=strhtml + '</select></td>';
		
		strhtml=strhtml + '<td><input id="rekeningvendor'+szcountervendor+'" type="text" class="form-control" name="rekeningvendor[]" placeholder="Enter Text" ></td> ' ;
		
		strhtml=strhtml + '<td><select id="currencyvendor'+szcountervendor+'" class="form-control" name="currencyvendor[]" > ' ;
		strhtml=strhtml + '<option value="">--Choose--</option> ';
		strcurrency =document.getElementById("strcurrency").value;
		arrcurrency = strcurrency.split(";");
	
		for (i=0;i<arrcurrency.length; i++){
			strhtml=strhtml + '<option value="' + arrcurrency[i] + '">' + arrcurrency[i] + '</option>';
		}
		strhtml=strhtml + '</select></td>';
		
		
		strhtml=strhtml + '<td><input class="form-control" id="'+xnominalvendor+'" name="nominalvendor[]" onkeyup="gettotalvendor()" type="text" value="0"></td>' +
						  '<td><span class="btn btn-danger btn-xs" title="Hapus Baris" name="removeButton" onclick="RemoveIndeks(' + zstr +')"> ' +
						  '<i class="glyphicon glyphicon-minus"></i></span></td>';
		
		newTextBoxDiv.after().html(strhtml);
				
		$('#show1 tbody').append(newTextBoxDiv);
		$('#txtcountervendor').val(szcountervendor);
		
		countervendor++;		
		
	}
	
	function RemoveIndeks(param){
		$('#'+param ).remove();		
		countervendor--;
		$('#txtcountervendor').val(countervendor);		
		
		var itotal=0;
		var inps = document.getElementsByName('nominalvendor[]');
		for (var i = 0; i <inps.length; i++) {
			var inp=inps[i];
			var xj=inp.value;
			var yz=xj.replace(/[^,\d]/g, '').toString();
			itotal = itotal+parseFloat(yz);
		}
		//alert(itotal.toString());
		$('#lbltotalvendor').text(formatRupiah(itotal.toString()));		
    }
	
	function gettotalvendor(){
		var itotal=0;
		var inps = document.getElementsByName('nominalvendor[]');
		for (var i = 0; i <inps.length; i++) {
			var inp=inps[i];
			var xj=inp.value;
			var yz=xj.replace(/[^,\d]/g, '').toString();
			if (yz==""){
				itotal = itotal+0;
			}else{
			itotal = itotal+parseFloat(yz);
			}
			inps[i].value=formatRupiah(yz.toString());
		}
		$('#lbltotalvendor').text(formatRupiah(itotal.toString()));		
    }
	
	function drpbank(param1,param2,param3){
		
	  var data = document.getElementById(""+param1).value; 
	  var vendor = document.getElementById("kodevendor"+param3).value; 
	  if(vendor.substr(0,1)=="1" || vendor.substr(0,1)=="3"){
		  $("#"+param2).prop( "readonly", true );
	  }else{
		  if(data=="Tunai"){
			  $("#"+param2).prop( "readonly", true );
		  }else{
			  $("#"+param2).prop( "readonly", false );
		  }	 
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