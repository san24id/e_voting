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

          <?php 
			$nosurat='';
			$totvendor1=0;
			$totvendor2=0;
			$totvendor3=0;
			$strtotvendor1="";	
			$strtotvendor2="";
			$strtotvendor3="";			
			foreach ($ppayment as $row){ 
			$nosurat = $row->nomor_surat;
			?>          
            <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <!-- /.box -->
                <div class="box">
                <input type="hidden" name="id_payment" value="<?php echo $row->id_payment; ?>" >
                <input type="hidden" name="id_user" value="<?php echo $row->id_user; ?>" >
                  <div class="box-header with-border">
                    <p align="right">
                      <b> STATUS : </b>
                      <?php if($row->status == 0){
                          echo "<img src='assets/dashboard/images/legend/draft.png'>&nbsp;Draft";
                        }else if($row->status == 1){
                          echo "<img src='assets/dashboard/images/legend/draftprint.png'> Draft(Print)";
                        }else if($row->status == 11){
                          echo "<img src='assets/dashboard/images/legend/draftprint.png'> Draft(Print)";  
                        }else if($row->status == 99){
                          echo "Deleted File SP3"; 
                        }else if($row->status == 'XXX'){
                          echo "Deleted File SP3"; 
                        }else if($row->status == 2){
                          echo "<img src='assets/dashboard/images/legend/submitted.png'>&nbsp;Submitted";
                        }else if($row->status == 3){
                          echo "<img src='assets/dashboard/images/legend/draftprint.png'> Draft(Print)";
                        }else if($row->status == 4){
                          echo "<img src='assets/dashboard/images/legend/processing.png'> Processing On Tax";
                        }else if($row->status == 5){
                          echo "<img src='assets/dashboard/images/legend/processing.png'> Processing On Finance";
                        }else if($row->status == 6){
                          echo "<img src='assets/dashboard/images/legend/processing.png'> Waiting For Review";
                        }else if($row->status == 7){
                          echo "<img src='assets/dashboard/images/legend/processing.png'> Waiting For Verification";
                        }else if($row->status == 8){
                          echo "<img src='assets/dashboard/images/legend/verified.png'> Waiting For Approval";
                        }else if($row->status == 9){
                          echo "<img src='assets/dashboard/images/legend/approved.png'> Waiting For Payment"; 
                        }else if($row->status == 10){
                          echo "<img src='assets/dashboard/images/legend/paid1.png'> Paid"; 
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
                          <td align="center"><b><font size="4" style="font-family: calibri;">&nbsp;</b></td>						
                          <td align="center"><b><font size="4" style="font-family: calibri;">No   : <?php echo $row->nomor_surat;?></b></td>                        
                        </tr>
                      </tbody>
                    </table>

                    <br>

                    <table style="font-family: calibri;" width="100%">
                      <?php 
                        $test1 = $row->jenis_pembayaran;
                        $chk2='';
						$chk3='';
						$chk4='';
						$chk5='';
						$chk6='';
                        $test1 = trim($row->jenis_pembayaran);
						switch ($test1) {
						  case "2":
							$chk2='checked';							
							break;
						  case "3":
							$chk3='checked';
							break;
						  case "4":
							$chk4='checked';
							break;
						  case "5":
							$chk5='checked';
							break;
						  case "6":
							$chk6='checked';
							$chk4='checked';
							break;
						  default:
							$chk2='';
							$chk3='';
							$chk4='';
							$chk5='';
							$chk6='';
							
						}
						/*$test2 = explode(";", $test1);
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

                          if($test2[$b] == '6'){
                            $xxi6 .= "6";
                          }
                        }*/
                      ?>
                      <tr>
                        <td><b>Jenis Pembayaran <font color="red"> * </font> (pilih salah satu):</b></td>
                        <td> <?php if ($row->jenis_pembayaran == 2 || $row->jenis_pembayaran == 3 ) { $cek="checked" ;
                          }else{
                                $cek=" " ;
                          } ?>
                         <input id="auto" <?php echo $cek;?> type="checkbox" disabled><b>Uang Muka/<i>Advance</i><br>
                        </td>

                        <td>
                          <input id="check" onclick="hide()" type="checkbox" name="jenis_pembayaran[]" value="4" <?php echo $chk4; ?> disabled><b><i>Direct Payment<br>
                        </td>
                        <td>
                          <input id="checked2" onclick="hide()" type="checkbox" name="jenis_pembayaran[]" value="5" <?php echo $chk5; ?> disabled><b><i> Cash Received</input><br>
                        </td>
                      </tr>

                      <tr>
                        <td></td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <input id="checkrequest" onclick="checkUangMuka()" type="checkbox" name="jenis_pembayaran[]" value="2" <?php echo $chk2;?> disabled>Permintaan Uang Muka/<i>Advance Request<br>
                        </td>
                        <td style="display:none">
                            <input id="checkcreditcard"  type="checkbox" name="jenis_pembayaran[]" value="6" <?php echo $chk6;?> disabled> Corporate Credit Card </input><br>
                        </td>
                      </tr>
                      
                      <tr>
                        <td></td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          <input id="checksettlement" onclick="checkUangMuka2()"type="checkbox" name="jenis_pembayaran[]" value="3" <?php echo $chk3; ?> disabled>Pertanggungjawaban Uang Muka/<i>Advance Settlement<br>                            
                        </td>
                      </tr>
                    </table>

                    <br>

                    <table style="font-family: calibri;" width="100%">
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
                        <td width="35%"><b>- Tujuan Penggunaan <font color="red"> * </font> </b></td>
                        <td><b> : </b></td>
                        <td colspan="8" height="50%"><textarea type="text" rows="5" class="form-control" name="label1" readonly><?php echo $row->label1; ?></textarea></td>
                        <td>
                      </tr>
                      <tr>
                        <td><b>- Jumlah <font color="red"> * </font> </b></td>
                        <td><b> : </b></td>

                        <td width="5%"><input type="text" class="form-control" value="<?php echo $row->currency;?>" readonly> </td>
                        <td><input type="text" style="text-align:right" class="form-control" name="label2" value="<?php echo $row->label2; ?>" readonly></td>

                        <td width="5%"><input type="text" class="form-control" value="<?php echo $row->currency2;?>" readonly> </td>
                        <td><input type="text" style="text-align:right" class="form-control" name="jumlah2" value="<?php echo $row->jumlah2; ?>" readonly></td>

                        <td width="5%"><input type="text" class="form-control" value="<?php echo $row->currency3;?>" readonly></td>
                        <td><input type="text" style="text-align:right" class="form-control" name="jumlah3" value="<?php echo $row->jumlah3; ?>" readonly></td>
                      </tr>  
                      <tr>
                        <td colspan="2">&nbsp;</td>
                        <td colspan="8" style="text-align:end"><b><i>Nilai(+) = Pembayaran, Nilai(-) = Pengembalian</i></b></td>
                      </tr>
                      </tbody>
                    </table>

                    <?php if ($row->jenis_pembayaran == 3 || $row->jenis_pembayaran == 4 || $row->jenis_pembayaran == 5 || $row->jenis_pembayaran == 6) { $choosed="style='display: none'" ;
                    }else{
                          $choosed="style=''" ;
                    } ?>

                    <table id="choose" <?php echo $choosed;?> style="font-family: calibri;" width="100%">
                      <tbody>
                      <tr>
                        <td width="36%"><b>- Perkiraan Tanggal Selesai Pekerjaan/Terima Barang <font color="red"> * </font></b>
                        	<br>
                        </td>
                        <td align="right"><b> : </b></td>
                        <td colspan="8" width="65%"><input type="text" class="form-control" name="label3" value="<?php echo date("d-M-Y", strtotime($row->label3)); ?>" readonly></td>     
                      </tr>
                                                  
                      </tbody>
                    </table>

                    <br>

                    <!--<table style="font-family: calibri;" width="100%">
                      <tbody>
                      <b><p>- Penyedia Barang / Jasa Penerima Pembayaran</p></b> 
                      <?php 
                          $sql = "SELECT nama FROM m_honorarium_konsultan WHERE kode_vendor='$row->penerima'";
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
                        <td><input type="text" class="form-control" value="<?php echo $row->akun_bank; ?>" readonly> </td>
                      </tr>
                      <tr>
                      <td></td>
                        <td></td>
                        <td></td>
                        <td>Nomor Rekening</td> 
                        <td>:</td>                           
                        <td><input type="text" class="form-control" name="no_rekening" value="<?php echo $row->no_rekening; ?>" readonly></td>                                
                      </tr>
                      
                      </tbody>
                    </table>-->
					
					<form id="frmvendor" action="#"> 
														<input type="hidden" id="txtcountervendor" name="txtcountervendor" value="1" />
														<input type="hidden" id="strvendor" name="strvendor" value="<?php echo $strvendor; ?>">
														<input type="hidden" id="strbank" name="strbank" value="<?php echo $strbank; ?>">
							
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
															if ($getdatavendor == null){ ?>
																<tr id="tr1">
																<td ><select id="penerimavendor1" onchange="fung('penerimavendor1','kodevendor1','namavendor1')" class="form-control" name="penerimavendor[]" readonly>
																	<option value="">--Choose--</option>
																	<?php foreach ($data_vendor as $nama){?> 
																	  <option value="<?php echo $nama->kode_vendor;?>"><?php echo $nama->nama;?> &nbsp; - <?php echo $nama->kode_vendor;?></option>
																	  
																	<?php } ?>
																	</select>
																	<input id="kodevendor1" type="hidden" name="kodevendor[]"  />
																	<input id="namavendor1" type="hidden" name="namavendor[]"  />
																</td>
																
																<td><select id="bankvendor1" name="bankvendor[]" class="form-control" readonly>
																	<option value="">--- Choose ---</option>
																	<?php foreach ($bank as $get) {?>
																	  <option value="<?php echo $get->bank; ?>"><?php echo $get->bank; ?></option>
																	<?php } ?>
																	</select>
																</td>
																<td><input id="rekeningvendor1" type="text" class="form-control" name="rekeningvendor[]" placeholder="Enter Text" readonly>
																</td> 
																<td><select id="currencyvendor1" name="currencyvendor[]" class="form-control" readonly>
																	<option value="">--- Choose ---</option>
																	<?php foreach ($currency as $cur) {?>
																	  <option value="<?php echo $cur->currency; ?>"><?php echo $cur->currency; ?></option>
																	<?php } ?>
																	</select>
																</td>
																<td><input class="form-control" style="text-align:right" id="nominalvendor1" name="nominalvendor[]" onkeyup="gettotalvendor()" type="text" readonly></td>																
																<td>&nbsp;</td>
																</tr>
															<?php	
															}else{
															foreach($getdatavendor as $gvendor){
																$nomvendor=str_replace(".","",$gvendor->nominal);
																if($gvendor->v_currency==$row->currency){
																	if(substr($gvendor->v_nominal,0,1)=="("){
																		$totvendor1=$totvendor1-intval($nomvendor);
																	}else{
																		$totvendor1=$totvendor1+intval($nomvendor);
																	}
																}
																if($gvendor->v_currency==$row->currency2){
																	if(substr($gvendor->v_nominal,0,1)=="("){
																		$totvendor2=$totvendor2-intval($nomvendor);
																	}else{
																		$totvendor2=$totvendor2+intval($nomvendor);
																	}
																}
																if($gvendor->v_currency==$row->currency3){
																	if(substr($gvendor->v_nominal,0,1)=="("){
																		$totvendor3=$totvendor3-intval($nomvendor);
																	}else{
																		$totvendor3=$totvendor3+intval($nomvendor);
																	}
																}
																
																$ttlnomvendor=$ttlnomvendor+(float)$nomvendor;
																$vendorrow++;
															?>
															<tr id="tr<?php echo $vendorrow; ?>">
															<td ><select id="<?php echo 'penerimavendor'.$vendorrow; ?>" onchange="fung('<?php echo 'penerimavendor'.$vendorrow; ?>','<?php echo 'kodevendor'.$vendorrow; ?>','<?php echo 'namavendor'.$vendorrow; ?>')" class="form-control" name="penerimavendor[]" readonly>
																	<option value="<?php echo $gvendor->kode_vendor; ?>"> <?php echo $gvendor->nama;?> &nbsp; - <?php echo $gvendor->kode_vendor;?></option>
																	</select>
																	<input id="<?php echo 'kodevendor'.$vendorrow; ?>" type="hidden" name="kodevendor[]" value="<?php echo $gvendor->kode_vendor; ?>"  />
																	<input id="<?php echo 'namavendor'.$vendorrow; ?>" type="hidden" name="namavendor[]" value="<?php echo $gvendor->penerima; ?>"   /></td>
															<td><select id="<?php echo 'bankvendor'.$vendorrow; ?>" name="bankvendor[]" class="form-control" readonly >
																	<option value="<?php echo $gvendor->v_bank; ?>"> <?php echo $gvendor->v_bank;?> </option>
																	
																	</select>
																</td>
																<td><input id="<?php echo 'rekeningvendor'.$vendorrow; ?>" type="text" class="form-control" name="rekeningvendor[]" placeholder="Enter Text" value="<?php echo $gvendor->v_account; ?>" readonly>
																</td>
																<td><select id="<?php echo 'currencyvendor'.$vendorrow; ?>" name="currencyvendor[]" class="form-control" readonly >
																	<option value="<?php echo $gvendor->v_currency; ?>"> <?php echo $gvendor->v_currency;?> </option>
						
																	</select>
																</td>
															<td ><input class="form-control" style="text-align:right" id="<?php echo 'nominalvendor'.$vendorrow; ?>" name="nominalvendor[]" onkeyup="gettotalnontax()" type="text" value="<?php echo $gvendor->v_nominal;  ?>" readonly></td>
															
															
															</tr>
															<?php } //number_format($nominal,0,",",".")
																if($totvendor1<0){
																	$strtotvendor1="(" .number_format(substr(strval($totvendor1),1,strlen(strval($totvendor1))-1),0,",","."). ")"; 
																}else if($totvendor1==0){
																	$strtotvendor1=""; 
																}else{
																	$strtotvendor1=strval(number_format($totvendor1,0,",",".")); 
																}
																if($totvendor2<0){
																	$strtotvendor2="(" .number_format(substr(strval($totvendor2),1,strlen(strval($totvendor2))-1),0,",","."). ")";
																}else if($totvendor2==0){
																	$strtotvendor2=""; 
																}else{
																	$strtotvendor2=strval(number_format($totvendor2,0,",","."));  
																}
																if($totvendor3<0){
																	$strtotvendor3="(" .number_format(substr(strval($totvendor3),1,strlen(strval($totvendor3))-1),0,",","."). ")"; 
																}else if($totvendor3==0){
																	$strtotvendor3=""; 
																}else{
																	$strtotvendor3=strval(number_format($totvendor3,0,",",".")); ; 
																}
															}?>
															
														  </tbody>
														  <tfoot>
															<tr>
                                  <th colspan="3">
                                    <div class="col-md-10"><span class="col-md-11" style="text-align:end">Total</span></div>
                                  </th>
                                  <th>
                                    <label class="control-label" id="lblcur1" ><?php echo $row->currency; ?></label><br>
                                    <label class="control-label" id="lblcur2" ><?php echo $row->currency2; ?></label><br>
                                    <label class="control-label" id="lblcur3" ><?php echo $row->currency3; ?></label>
                                  </th>
                                  <th>
                                    <p style="text-align:right" id="lbltotalvendor"><?php echo $strtotvendor1; ?></p><br>
                                    <p style="text-align:right" id="lbltotalvendor2"><?php echo $strtotvendor2; ?></p><br>
                                    <p style="text-align:right" id="lbltotalvendor3"><?php echo $strtotvendor3; ?></p>
                                  </th>
                              </tr>
														</tfoot>
														</table>
														</div> 
														</form>

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
                          <input id="lainnya" onclick="showInput()" type="checkbox" name="label4[]" value="Lainnya (Jika ada) : Rincian Pengeluaran" <?php echo $xxii11=="Lainnya (Jika ada) : Rincian Pengeluaran"? 'checked':''?> disabled>Lainnya (Jika ada <font color="red"> * </font> )</input><br>
                          <?php if ($xxii11=="Lainnya (Jika ada) : Rincian Pengeluaran") { $showing="style=''" ;
                          }else{ 
                                $showing="style='display: none'" ;
                          } ?>
                            <textarea id="text1" <?php echo $showing;?> type="text" class="form-control" name="lainnya1" style="display:none" readonly> <?php echo $row->lainnya1;?></textarea> <br>
                            <!-- <input id="text2" <?php echo $showing;?> type="text" class="form-control" name="lainnya2" style="display:none" value="<?php echo $row->lainnya2;?>" readonly> <br> -->
                        </td>
                      </tr>
                    </table>

                    <br>

                    <?php if ($row->jenis_pembayaran == 2 || $row->jenis_pembayaran == 4 || $row->jenis_pembayaran == 5 || $row->jenis_pembayaran == 6) { $showed="style='display: none'" ;
                    }else{
                          $showed="style=''" ;
                    } ?>
                                                
                    <div id="show" <?php echo $showed;?> class="table-responsive" >
                                               
                    <table style="font-family: calibri;"  width="90%">
                      <tbody>
                      <tr>
                        <td  colspan="6"><b>Khusus diisi untuk Jenis Pembayaran Pertanggungjawaban Uang Muka/Settlement:</b></td>
                      </tr>
				          	  <tr>
                        <td style="width:350px"><b>- Nomor ARF terkait <font color="red"> * </font></b></td>
                        <td>:&nbsp;</td>
                        <td style="width:500px">
                          <input type="text" class="form-control" name="label5" value="<?php echo $row->label5;?>"readonly>                          
                        </td>
                        <td>&nbsp;&nbsp;&nbsp;<input type="checkbox" name="label6" value="Lampiran copy ARF tersedia"<?php echo $row->label6=="Lampiran copy ARF tersedia"? 'checked':''?> disabled> Lampiran copy ARF tersedia</input></td>
                      </tr>
                     </tbody>
                    </table>
                      <table style="font-family: calibri;" width="90%"; >
                        <tbody>
                        <tr>
                          <td colspan="10" >&nbsp;</td>
                        </tr>                      
                        <tr>
                          <td><b>- Perhitungan Penggunaan Uang Muka<b></td>
                          <td colspan="3">&nbsp;</td>
                          <td><center><b> &nbsp;&nbsp;Curr&nbsp;&nbsp;</b></center></td>
                          <td><b> Jumlah/<i>Amount</i></b></td>
                          <td><center><b>&nbsp;&nbsp;Curr&nbsp;&nbsp;</b></center></td>
                          <td><b> Jumlah/<i>Amount</i></b></td>
                          <td><center><b>&nbsp;&nbsp;Curr&nbsp;&nbsp;</b></center></td>
                          <td><b> Jumlah/<i>Amount</i></b></td>
                        </tr>
                        <tr>  
                          <td>Jumlah Biaya <font color="red"> * </font></td>
                          <td>:</td>
                          <td colspan="2">&nbsp;</td>
                          <td align="center"><?php echo $row->curr_settlement1;?></td>
                          <td><input type="text" style="text-align:right" class="form-control" name="label7" value="<?php echo $row->label7;?>" readonly></input></td>
                          <td align="center"><?php echo $row->curr_settlement2;?></td>
                          <td><input type="text" style="text-align:right" class="form-control" name="label7a" value="<?php echo $row->label7a;?>"readonly></input></td>
                          <td align="center"><?php echo $row->curr_settlement3;?></td>
                          <td><input type="text" style="text-align:right" class="form-control" name="label7b" value="<?php echo $row->label7b;?>"readonly></input></td>
                        </tr>

                        <tr>
                        <td>Jumlah Uang Muka <font color="red"> * </font> </td>
                          <td>:</td>
                          <td colspan="2">&nbsp;</td>
                          <td align="center"><?php echo $row->curr_settlement1;?></td>   
                          <td><input type="text" style="text-align:right" class="form-control" name="label8" value="<?php echo $row->label8; ?>"readonly></input> </td> 
                          <td align="center"><?php echo $row->curr_settlement2;?></td>
                          <td><input type="text" style="text-align:right" class="form-control" name="label8a" value="<?php echo $row->label8a; ?>"readonly></input> </td>  
                          <td align="center"><?php echo $row->curr_settlement3;?></td>
                          <td><input type="text" style="text-align:right" class="form-control" name="label8b" value="<?php echo $row->label8b; ?>"readonly></input> </td>  
                        </tr>
                        <tr>
                          <td>Selisih Kurang/(Lebih)</td>
                          <td>:</td>
                          <td colspan="2">&nbsp;</td>
                          <td align="center"><?php echo $row->curr_settlement1;?></td>
                          <td><input type="text" style="text-align:right" class="form-control" name="label9" value="<?php echo $row->label9; ?>"readonly></input></td>  
                          <td align="center"><?php echo $row->curr_settlement2;?></td>
                          <td><input type="text" style="text-align:right" class="form-control" name="label9a" value="<?php echo $row->label9a; ?>"readonly></input></td>  
                          <td align="center"><?php echo $row->curr_settlement3;?></td>
                          <td><input type="text" style="text-align:right" class="form-control" name="label9b" value="<?php echo $row->label9b; ?>"readonly></input></td>  
                        </tr>                              
                        </tbody>
                      </table>
                    </div>
                    
                    <br>
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
                        <?php } ?>                        
                      </tr>
                      <tr>
                        <td>Jabatan : &nbsp; <?php echo $row->jabatan;?></td>
                        <td>Jabatan : &nbsp;  <?php if($divhead->role_id == 4){
                                                echo "SVP"; } ?> <?php echo $divhead->division_id; ?> </td>
                      </tr>                            
                    </tbody>
                    </table>

                  </div>  
                </div>

                    <div class="box">
                      <div class="box-header with-border">
						          <?php if ($row->status == 99 || $row->status == 'XXX') { ?>
                        <a class="btn btn-warning" href="Approval" role="button">Exit</a>

                      <?php }else{ ?>
                        <a class="btn btn-warning" href="Approval" role="button">Exit</a>
                        <?php if ($row->id_user == $this->session->userdata("id_user") && $row->status == 0 || $row->status == 3) { ?>

                          <a class="btn btn-primary" href="Approval/formfinished/<?php echo $row->id_payment; ?>" role="button">Edit</a>
                          <?php 
                                $testl1 = $row->label4;
                                $testl2 = explode(";", $testl1);
                                // var_dump($testl2[0]);exit;
                                if ($row->status == 0 && $row->rejected_by == NULL){ 

                                  if($row->label1 !="" && $row->label2 != "" && $row->penerima != "" ){ ?>
                                  <button type="button" data-toggle="modal" data-target="#setprint<?php echo $row->id_payment; ?>" class="btn btn-success">Set To Print</button>
                                    <div class="modal fade" id="setprint<?php echo $row->id_payment; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                      <div class="modal-dialog modal-xl" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                          <h3 class="modal-title">Message Box</h3>
                                        </div>                                        
                                        <div class="modal-body">
                                          <form id="approve" method="post" action="Approval/draftsent/<?php echo $row->id_payment; ?>">
                                            <input type="hidden" name="id_payment" value="<?php echo $row->id_payment; ?>">
                                            <input type="hidden" name="nomor_surat" class="form-control" value="<?php echo $surat; ?>">  
                                            <p align="justify">Apa anda yakin telah mengisi Form SP3 ini dengan benar?  </p>
                                            <div class="modal-footer">                        
                                              <button type="submit" class="btn btn-success bye">Yes</button>
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                          </form>
                                        </div>
                                      </div>
                                      </div>
                                    </div>  
    
                                  <?php }else{ ?>
    
                                <?php } ?>
                              <?php } ?>
                            <?php } } ?>
    
                            <!--Jika Statusnya telah direject -->
                            <?php if ($row->status == 0 && $row->rejected_by != NULL){ ?>
                              <button type="button" data-toggle="modal" data-target="#setsendback<?php echo $row->id_payment; ?>" class="btn btn-success">Set To Print</button>
                              <div class="modal fade" id="setsendback<?php echo $row->id_payment; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h3 class="modal-title">Message Box</h3>
                                  </div>                                        
                                  <div class="modal-body">
                                    <form id="approve" method="post" action="Approval/draftsent_back/<?php echo $row->id_payment; ?>">
                                      <input type="hidden" name="id_payment" value="<?php echo $row->id_payment; ?>">
                                      <p align="justify">Apa anda yakin akan mengirimkan kembali Form SP3 ini dengan data yang benar?  </p>
                                      <div class="modal-footer">                        
                                        <button type="submit" class="btn btn-success bye">Yes</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                                </div>
                              </div>
                            <?php } ?>   
                        
                        <?php if($row->id_user == $this->session->userdata("id_user") && $row->status != 0 && $row->status != 3  && $row->status != 99  && $row->status != 'XXX'){ ?>
                            <?php if ($row->jenis_pembayaran == 4 || $row->jenis_pembayaran == 5 || $row->jenis_pembayaran == 6 ) { ?>
                                                      
                              <a class="btn btn-primary" href="Approval/report_dp/<?php echo $row->id_payment; ?>" target="_blank" role="button" >Print</a>

                            <?php }else if ($row->jenis_pembayaran == 2 || $row->jenis_pembayaran == 3 ) { ?>
                              
                              <a class="btn btn-primary" href="Approval/report/<?php echo $row->id_payment; ?>" target="_blank" role="button">Print</a>

                            <?php } ?>
                        <?php } ?>

                        <?php if($row->status=="0" || $row->status=="1" || $row->status=="3"){ 
                          if($this->session->userdata("id_user")==$row->id_user){ ?>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#mdldelete" >Delete</button>
                              <div class="modal fade" id="mdldelete" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h3 class="modal-title">Message Box</h3>
                                  </div>

                                  <div class="modal-body">
                                  <form>
                                  <p align="justify">Apa anda yakin akan menghapus Form SP3 ini : <?=$row->nomor_surat?> ?</p>
                                  </div>
                                  <div class="modal-footer">                        
                                  <button type="button" class="btn btn-success bye" onclick="deletedraftpayment('<?php echo $row->id_payment; ?>','<?php echo $this->session->userdata("currentview"); ?>')">Yes</button>
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  </form>
                                  </div>
                                </div>
                                </div>
                              </div> 
                        <?php }} ?>

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
                          <?php if($row->status == 1 && $iya == "ON"){ ?>
                          <button type="button" data-toggle="modal" data-target="#approve<?php echo $row->id_payment; ?>" class="btn btn-success">Approved</button>
                          <!----.Modal -->
                          <!----.Accept -->
                          <div class="modal fade" id="approve<?php echo $row->id_payment; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">                                        
								                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h3 class="modal-title">Message Box</h3>
                                </div> 									  
                              <div class="modal-body">
                                <form id="approve" method="post" action="Approval/setuju">
                                    <input type="hidden" name="id_payment" value="<?php echo $row->id_payment; ?>">  
                                    <input type="hidden" name="submit_date" value="<?php echo date("d-M-Y"); ?>">
                                    <input type="hidden" name="handled_by" value="n.prasetyaningrum">
                                    <p align="justify">Apa anda yakin akan menyetujui Form SP3 ini :  <?=$row->nomor_surat?> ?</p>
                                  <div class="modal-footer">                        
                                    <button type="submit" class="btn btn-success bye">Yes</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								                  </div>
                                </form>
                              </div>
                            </div>
                            </div>
                          </div>

                          <button type="button" data-toggle="modal" data-target="#reject<?php echo $row->id_payment; ?>" class="btn btn-danger">Reject</button>
                            <div class="modal fade" id="reject<?php echo $row->id_payment; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                              <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h3 class="modal-title">Message Box</h3>
                                  </div>

                                  <div class="modal-body">
                                  <form id="rejected" method="post" action="Approval/rejected">
                                    <input type="hidden" name="id_payment" value="<?php echo $row->id_payment; ?>">
                                    <p align="justify">Apa anda yakin akan me-rejected Form SP3 ini : <?=$row->nomor_surat?> ?</p>
                                    <label>Notes :</label>                
                                    <textarea type="text" class="form-control" name="note" required></textarea>
                                    <input type="hidden" name="rejected_date" value="<?php echo date("d-M-Y"); ?>">
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
                                                      
                          <?php } ?>
                        <?php } ?>                            

                        <?php if($row->status == 1 && $iya == "OFF" ){ ?>
                          <?php if($row->display_name == $this->session->userdata("display_name") ) { ?>
                            <!-- <a class="btn btn-primary" href="Approval/formfinished/<?php echo $row->id_payment; ?>" role="button">Edit</a> -->

                            <button type="button" data-toggle="modal" data-target="#submit<?php echo $row->id_payment; ?>" class="btn btn-success">Submit</button>
                            <!----.Modal -->
                            <!----.Accept -->
                            <div class="modal fade" id="submit<?php echo $row->id_payment; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                              <div class="modal-dialog modal-xl" role="document">
                              <div class="modal-content">                                        
                                <div class="modal-body">
                                <form id="accepted" method="post" action="Approval/submit">
                                  <input type="hidden" name="id_payment" value="<?php echo $row->id_payment; ?>">
                                    <input type="hidden" name="submit_date" value="<?php echo date("d-M-Y"); ?>">
                                  <input type="hidden" name="handled_by" value="n.prasetyaningrum">
                                  <p align="justify">Apa anda yakin akan mengirim Form SP3 ini :  <?=$row->nomor_surat?> ?</p>
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
    
<script>
function deletedraftpayment(id,$vscreen)
    {
		$.ajax({
				url : "<?php echo base_url('Approval/draftpaymentdelete')?>/"+id,
				type: "POST",
				dataType: "JSON",
				success: function(data)
				{
					location.href=$vscreen;
					//location.reload();
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error deleting data');
				}
			});
    }

function printThis() {
  window.print();
}
</script>

<script>
function update() {
  alert("Data Successfully to Update");
}

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
  document.getElementById("checkcreditcard").checked = false;
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
