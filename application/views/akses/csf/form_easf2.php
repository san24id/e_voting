<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
<style>
td[rowspan="6"] {
  vertical-align: top;
  text-align: left;
}
</style>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           <?php foreach ($payment as $row){ ?>          
            <a class="btn btn-warning" onclick="window.open('Dashboard/report2/<?php echo $row->id_payment; ?>', 'newwindow', 'width=640,height=720'); return false;"> Form SP3</a>
            <button type="button" id="btn_tax" class="btn btn-success" onclick="myPopup('Dashboard/form_info_tax/<?php echo $row->id_payment; ?>', 1050, 550);">View Tax</button>
           <?php } ?>
          </h1>
        </section>
        <!-- Main content -->
        <form id="form_edit" action="#">
          <?php foreach ($ppayment as $get) { ?>  
          <input type="hidden" name="id" class="form-control" value="<?php echo $get->id?>">  
          <input type="hidden" name="handled_by" class="form-control" value="<?php echo $get->handled_by; ?>">
          <input type="hidden" name="status" value="<?php echo $get->status?>">
          <input type="hidden" name="rejected_by" value="<?php echo $get->rejected_by?>">

          <input type="hidden" name="tanggal2" class="form-control" value="<?php echo $get->tanggal2?>">
          <input type="hidden" name="display_name" class="form-control" value="<?php echo $get->display_name ?>">
          <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <!-- /.box -->
                <div class="box">
                  <div class="box-header with-border">
                    
                    <table style="font-family: calibri;" width="100%">
                      <tbody>
                        <tr>
                        <td> </td>
                        <td <b><font size="+2" style="font-family: calibri;">FORMULIR PERTANGGUNGJAWABAN <br> <i> ADVANCE SETTLEMENT FORM (ASF)</i></font></b>                                  
                        <td><img src="assets/dashboard/images/logo.png" alt="Logo Images"></td>
                        </tr>
                      </tbody>
                    </table>
                    
                    <br>

                    <table style="font-family: calibri;" width="100%">
                      <tbody>     
                        <tr>
                          <td><font size="+1">Tanggal : <br> <i>Date</i></td>
                          <td><input type="text" name="tanggal" class="form-control" value="<?php echo $get->tanggal; ?>" readonly> </td>
                          <td> &nbsp;</td>
                          <td><font size="+1">ASF Doc. No : </font></td>
                          <td><input type="text" name="apf_doc" class="form-control" value="<?php echo $get->apf_doc; ?>" readonly></td>
                        </tr>
                        <tr>
                          <td><font size="+1">Direktorat/<br>Divisi Pemohon :<font></td>
                          <td><input type="text" name="division_id" class="form-control" value="<?php echo $get->division_id; ?>" readonly></td>
                          <td> &nbsp;</td>
                          <td><font size="+1">SPPP Doc. No : </font></td>
                          <td><input type="text" name="nomor_surat" class="form-control" value="<?php echo $get->nomor_surat; ?>"readonly></td>
                        </tr>
                        <tr>
                          <td><font size="+1">Kode Proyek : <br> <i>Project Code</i><font></td>
                          <td><input type="text" name="kode_proyek" class="form-control" value="<?php echo $get->kode_proyek; ?>" readonly></td>
                          <td>&nbsp; </td>
                          <td><font size="+1">ARF Doc. No : </font></td>
                          <td><input type="text" name="apf1_doc" class="form-control" value="<?php echo $get->apf1_doc; ?>" readonly></td>
                        </tr>
                        <tr>
                          <td><font size="+1">PR Doc. No : </font></td>
                          <td><input type="text" name="pr_doc" class="form-control" value="<?php echo $get->pr_doc; ?>" readonly></td>
                        </tr>
                      </tbody>
                    </table>

                    <br>

                    <table border="1" style="font-family: calibri;" width="100%">
                        <thead>
                        <tr>
                          <th width="5%"><center>NO. <br> <i>No.</i></center></th>
                          <th height="40%" colspan="2"><center>Uraian atas tujuan penggunaan / <br><i>Description on the purpose</i></center></th>
                          <th width="10%"><center>Mata Uang / <br> <i>Original Currency</i></center></th>
                          <th width="25%"><center>Jumlah / <br><i>Amount</i></center></th>                       
                        </tr> 
                        </thead>
                        <tbody>                      
                        <tr>
                          <td><center> 1 </center></td>
                          <td colspan="2"><textarea type="text" class="form-control" name="description" ><?php echo $get->description;?></textarea></td>                  
                          <td><select id="Select" class="form-control" onchange="myFunction()" name="currency">
                            <option value="<?php echo $get->currency; ?>"> <?php echo $get->currency; ?></option>                         
                            <option value="">--Choose--</option>
                            <?php foreach ($currency as $row) {?>
                            <option value="<?php echo $row->currency; ?>"><?php echo $row->currency; ?></option>

                            <?php } ?>
                            </select>
                          </td>
                          <td><input id="nilai" onkeyup="nominal()" type="text" class="form-control" name="jumlah" value="<?php echo $get->jumlah;?>" ></td>
                        </tr>
                        <tr>
                          <td><center> 2 </center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description2" value="<?php echo $get->description2;?>" ></td>
                          <td><select id="Select1" class="form-control" onchange="myFunction1()" name="currency1">
                            <option value="<?php echo $get->currency1; ?>"> <?php echo $get->currency1; ?></option>                         
                            <option value="">--Choose--</option>
                            <?php foreach ($currency as $row) {?>
                            <option value="<?php echo $row->currency; ?>"><?php echo $row->currency; ?></option>

                            <?php } ?>
                            </select>
                          </td>
                          <td><input id="nilai1" onkeyup="nominal()" type="text" class="form-control" name="jumlah2" value="<?php echo $get->jumlah2;?>" ></td> 
                        </tr>
                        <tr>
                          <td><center> 3 </center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description3" value="<?php echo $get->description3;?>" ></td>
                          <td><select id="Select2" class="form-control" onchange="myFunction2()" name="currency2">
                            <option value="<?php echo $get->currency2; ?>"> <?php echo $get->currency2; ?></option>                              
                            <option value="">--Choose--</option>
                            <?php foreach ($currency as $row) {?>
                            <option value="<?php echo $row->currency; ?>"><?php echo $row->currency; ?></option>

                            <?php } ?>
                            </select>
                          </td>
                          <td><input id="nilai2" onkeyup="nominal()" type="text" class="form-control" name="jumlah3" value="<?php echo $get->jumlah3;?>" ></td> 
                        </tr>
                        <tr>
                          <td><center>4</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description4" value="<?php echo $get->description4;?>" ></td>
                          <td><select id="Select3" class="form-control" onchange="myFunction3()" name="currency3">
                            <option value="<?php echo $get->currency3; ?>"> <?php echo $get->currency3; ?></option>                              
                            <option value="">--Choose--</option>
                            <?php foreach ($currency as $row) {?>
                            <option value="<?php echo $row->currency; ?>"><?php echo $row->currency; ?></option>

                            <?php } ?>
                            </select>
                          </td>
                          <td><input id="nilai3" onkeyup="nominal()" type="text" class="form-control" name="jumlah4" value="<?php echo $get->jumlah4;?>" > </td>
                        </tr>
                        <tr>
                          <td><center>5</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description5" value="<?php echo $get->description5;?>" ></td>
                          <td><select id="Select4" class="form-control" onchange="myFunction4()" name="currency4">
                            <option value="<?php echo $get->currency4; ?>"> <?php echo $get->currency4; ?></option>                         
                            <option value="">--Choose--</option>
                            <?php foreach ($currency as $row) {?>
                            <option value="<?php echo $row->currency; ?>"><?php echo $row->currency; ?></option>

                            <?php } ?>
                            </select>
                          </td>
                          <td><input id="nilai4" onkeyup="nominal()" type="text" class="form-control" name="jumlah5" value="<?php echo $get->jumlah5;?>" > </td> 
                        </tr>
                        <tr>
                          <td><center>6</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description6" value="<?php echo $get->description6;?>" ></td>
                          <td><select id="Select5" class="form-control" onchange="myFunction5()" name="currency5">
                            <option value="<?php echo $get->currency5; ?>"> <?php echo $get->currency5; ?></option>                              
                            <option value="">--Choose--</option>
                            <?php foreach ($currency as $row) {?>
                            <option value="<?php echo $row->currency; ?>"><?php echo $row->currency; ?></option>

                            <?php } ?>
                            </select>
                          </td>
                          <td><input id="nilai5" onkeyup="nominal()" type="text" class="form-control" name="jumlah6" value="<?php echo $get->jumlah6;?>" ></td> 
                        </tr>
                        
                        <tr>
                          <td><center>7</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description7" value="<?php echo $get->description7;?>" ></td>
                          <td><select id="Select6" class="form-control" onchange="myFunction6()" name="currency6">
                            <option value="<?php echo $get->currency6; ?>"> <?php echo $get->currency6; ?></option>                              
                            <option value="">--Choose--</option>
                            <?php foreach ($currency as $row) {?>
                            <option value="<?php echo $row->currency; ?>"><?php echo $row->currency; ?></option>

                            <?php } ?>
                            </select>
                          </td>
                          <td><input id="nilai6" onkeyup="nominal()" type="text" class="form-control" name="jumlah7" value="<?php echo $get->jumlah7;?>" >  </td> 
                        </tr>
                        <tr>
                          <td><center>8</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description8" value="<?php echo $get->description8;?>" ></td>
                          <td><select id="Select7" class="form-control" onchange="myFunction7()" name="currency7">
                            <option value="<?php echo $get->currency7; ?>"> <?php echo $get->currency7; ?></option>                              
                            <option value="">--Choose--</option>
                            <?php foreach ($currency as $row) {?>
                            <option value="<?php echo $row->currency; ?>"><?php echo $row->currency; ?></option>

                            <?php } ?>
                            </select>
                          </td>
                          <td><input id="nilai7" onkeyup="nominal()" type="text" class="form-control" name="jumlah8" value="<?php echo $get->jumlah8;?>"  ></td> 
                        </tr>
                        <tr>
                          <td><center>9</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description9" value="<?php echo $get->description9;?>" ></td>
                          <td><select id="Select8" class="form-control" onchange="myFunction8()" name="currency8">
                            <option value="<?php echo $get->currency8; ?>"> <?php echo $get->currency8; ?></option>                              
                            <option value="">--Choose--</option>
                            <?php foreach ($currency as $row) {?>
                            <option value="<?php echo $row->currency; ?>"><?php echo $row->currency; ?></option>

                            <?php } ?>
                            </select>
                          </td>   
                          <td><input id="nilai8" onkeyup="nominal()" type="text" class="form-control" name="jumlah9" value="<?php echo $get->jumlah9;?>" ></td> 
                        </tr>
                        <tr>
                          <td><center>10</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description10" value="<?php echo $get->description10;?>" ></td>
                          <td><select id="Select9" class="form-control" onchange="myFunction9()" name="currency9">
                            <option value="<?php echo $get->currency9; ?>"> <?php echo $get->currency9; ?></option>                              
                            <option value="">--Choose--</option>
                            <?php foreach ($currency as $row) {?>
                            <option value="<?php echo $row->currency; ?>"><?php echo $row->currency; ?></option>

                            <?php } ?>
                            </select>
                          </td>

                          <td><input id="nilai9" onkeyup="nominal()" type="text" class="form-control" name="jumlah10" value="<?php echo $get->jumlah10;?>" ></td> 
                        </tr>
                        <tr>
                          <td><center>11</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description11" value="<?php echo $get->description11;?>" ></td>
                          <td><select id="Select10" class="form-control" onchange="myFunction10()" name="currency10">
                            <option value="<?php echo $get->currency10; ?>"> <?php echo $get->currency10; ?></option>                              
                            <option value="">--Choose--</option>
                            <?php foreach ($currency as $row) {?>
                            <option value="<?php echo $row->currency; ?>"><?php echo $row->currency; ?></option>

                            <?php } ?>
                            </select>
                          </td>
                          <td><input id="nilai10" onkeyup="nominal()" type="text" class="form-control" name="jumlah11" value="<?php echo $get->jumlah11;?>" ></td> 
                        </tr>
                        <tr>
                          <td><center>12</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description12" value="<?php echo $get->description12;?>" ></td>
                          <td><select id="Select11" class="form-control" onchange="myFunction11()" name="currency11">
                            <option value="<?php echo $get->currency11; ?>"> <?php echo $get->currency11; ?></option>                              
                            <option value="">--Choose--</option>
                            <?php foreach ($currency as $row) {?>
                            <option value="<?php echo $row->currency; ?>"><?php echo $row->currency; ?></option>

                            <?php } ?>
                            </select>
                          </td>
                          <td><input id="nilai11" onkeyup="nominal()" type="text" class="form-control" name="jumlah12" value="<?php echo $get->jumlah12;?>" ></td> 
                        </tr>

                        <tr>
                          <td colspan="3" align="right"> Jumlah Pembayaran/<i>Total Payment</i> </td>
                          <td><center> </center></td>
                          <td><?php echo $get->currency;?>&nbsp;<input id="ulang" type="text" name="total_expenses" value="<?php echo $get->total_expenses;?>" readonly>
                              <?php echo $get->currency4;?>&nbsp;<input id="ulang1" type="text" name="total_expenses2" value="<?php echo $get->total_expenses2;?>" readonly> 
                              <?php echo $get->currency8;?>&nbsp;<input id="ulang2" type="text" name="total_expenses3" value="<?php echo $get->total_expenses3;?>" readonly>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="3"> Jumlah Uang Muka/<i>Cash Advance</i> </td>
                          <td><center>  </center></td>
                          <td><?php echo $get->currency;?>&nbsp;<input id="jumlahuangmuka" onchange="nominal()" type="text" name="cash_advance" value="<?php echo $get->cash_advance; ?>" >
                              <?php echo $get->currency4;?>&nbsp;<input id="jumlahuangmuka2" onchange="nominal()" type="text" name="cash_advance2" value="<?php echo $get->cash_advance2; ?>" >
                              <?php echo $get->currency8;?>&nbsp;<input id="jumlahuangmuka3" onchange="nominal()" type="text" name="cash_advance3" value="<?php echo $get->cash_advance3; ?>" >
                          </td>
                        </tr>
                        <tr>
                          <td colspan="3"> (Negatif) = Piutang/<i>Receivable</i> atau Positif = Hutang/<i>Payable</i> </td>
                          <td><center> </center></td>
                          <td><?php echo $get->currency;?>&nbsp;<input id="negatif" type="text" name="piutang" value="<?php echo $get->piutang; ?>" >
                              <?php echo $get->currency4;?>&nbsp;<input id="negatif2" type="text" name="piutang2" value="<?php echo $get->piutang2; ?>" >
                              <?php echo $get->currency8;?>&nbsp;<input id="negatif3" type="text" name="piutang3" value="<?php echo $get->piutang3; ?>" > 
                          </td>
                        </tr>
                        <tr> 
                          <td>Terbilang/ <i>Say :</i> </td>
                          <td colspan="4"><input type="text" id="terbilang" class="form-control" name="terbilang" value="<?php echo $get->terbilang;?>" readonly>
                                          <input type="text" id="terbilang2" class="form-control" name="terbilang2" value="<?php echo $get->terbilang2;?>" readonly>
                                          <input type="text" id="terbilang3" class="form-control" name="terbilang3" value="<?php echo $get->terbilang3;?>" readonly>
                          </td>
                        </tr>
                        <tr> 
                          <td>Dibayar Kepada/ <i>Paid To :</i> </td>
                          <td colspan="4"><input type="text" name="dibayar_kepada" class="form-control" value="<?php echo $get->dibayar_kepada;?>" readonly></td>
                        </tr>
                        </tbody>
                    </table>
                    
                    <br>

                    <table border="1" style="font-family: calibri;" width="100%">
                      <tbody>
                      <tr> 
                        <td colspan="4" rowspan="2" width="50%">&nbsp; Verifikasi Oleh / <br>&nbsp;<i>Verified By : </i> </td>                           
                        <td rowspan="4">&nbsp; Catatan / :<br>&nbsp;<i>Remarks  </i><textarea type="text" class="form-control" name="catatan" readonly><?php echo $get->catatan;?></textarea></td>
                      </tr>
                      <tr>
                      </tr>
                      <tr align="right">
                        <td width="5%"> <input type="checkbox" name="status" value="7" <?php echo $get->status==7? 'checked':''?> disabled></td>
                        <td width="20%">Tanggal &nbsp;</td>
                        
                        <?php if($this->session->userdata("username") == "i.akmal"){ ?>
                          <td colspan="2" rowspan="2"><input type="date" name="verified_date" class="form-control" value="<?php echo $get->verified_date;?>" readonly></td>   
                        <?php }else if ($this->session->userdata("username") == "h.harlina") { ?>
                          <td colspan="2" rowspan="2"><input type="date" name="verified_date" class="form-control" value="<?php echo $get->verified_date;?>" ></td>   
                        <?php } ?>
                             
                      </tr>
                      <tr align="right">
                        <td width="5%"> <input type="checkbox" name="status" value="8" <?php echo $get->status==8? 'checked':''?> disabled></td>
                        <td width="20%"><i>Date </i> &nbsp;</td>
                      </tr>
                      </tbody>
                    </table>  
                    <table border="1" style="font-family: calibri;" width="50%">  
                      <tbody>
                        <tr>
                          <td>Nama /<i>Name : </i></td>
                          <td><input type="text" class="form-control" name="penanggung_jawab" value="<?php echo $get->penanggung_jawab;?>" readonly></td> 
                        </tr>
                        <tr>
                          <td>Jabatan /<i>Title : </i></td>
                          <td><input type="text" class="form-control" name="jabatan" value="<?php echo $get->jabatan;?>" readonly></td> 
                        </tr>
                      </tbody>  
                    </table>       

                    <table border="1" style="font-family: calibri;" width="100%">
                      <tbody>
                        <tr>
                          <td colspan="6"><center><b>Disetujui oleh <br> <i>Approved by :</i> </b></center></td>
                        </tr>
                        <tr>
                          <td colspan="2"> <br> <br> <br> <br> <br> <br></td>
                          <td colspan="2"> <br> <br> <br> <br> <br> <br></td>
                          <td colspan="2"> <br> <br> <br> <br> <br> <br></td>
                        </tr>
                        <tr>
                          <td width="10%">Nama/ <i>Name</i> </td>
                          <td><input id="approval1" type="text" name="persetujuan_pembayaran1" class="form-control" value="<?php echo $get->persetujuan_pembayaran1;?>" readonly> </td>
                          <td width="10%">Nama/ <i>Name</i> </td>
                          <td><input id="approval2" type="text" name="persetujuan_pembayaran2" class="form-control" value="<?php echo $get->persetujuan_pembayaran2;?>" readonly> </td>
                          <td width="10%">Nama/ <i>Name</i> </td>
                          <td><input id="approval3" type="text" name="persetujuan_pembayaran3" class="form-control" value="<?php echo $get->persetujuan_pembayaran3;?>" readonly> </td>
                        </tr>
                        <tr>
                          <td>Jabatan/ <i>Title</i> </td>
                          <td><input id="jabatan1" type="text" name="jabatan1" class="form-control" value="<?php echo $get->jabatan1;?>" readonly> </td>
                          <td>Jabatan/ <i>Title</i> </td>
                          <td><input id="jabatan2" type="text" name="jabatan2" class="form-control" value="<?php echo $get->jabatan2;?>" readonly> </td>
                          <td>Jabatan/ <i>Title</i> </td>
                          <td><input id="jabatan3" type="text" name="jabatan3" class="form-control" value="<?php echo $get->jabatan3;?>" readonly> </td>
                        </tr> 
                      </tbody>
                    </table>

                    <!----TREASURY---->
                    <table border="1" style="font-family: calibri;" width="100%">
                      <tbody>
                        <tr>
                          <td colspan="4"><center><b>Diisi oleh Divisi Treasury <br> <i>For Treasury Use Only </i> </b></center></td>
                        </tr>
                        <tr>
                          <td colspan="4"><font size="+1"> Metode Pembayaran : <input type="checkbox" name="metode_pembayaran" value="Tunai" <?php echo $get->metode_pembayaran=="Tunai"? 'checked':''?> readonly> Tunai</input></font></td>
                        </tr>
                        <tr>
                          <td width="26%" colspan="2"><center> <input type="checkbox" name="metode_pembayaran" value="Transfer" <?php echo $get->metode_pembayaran=="Transfer"? 'checked':''?> > Transfer Ke :</input> </center></td>

                          <td><font size="+1"> Bank : &nbsp;<input type="text" class="form-control" name="bank" value="<?php echo $get->bank; ?>" readonly> </input></font></td> 
                          <td><font size="+1"> No. Rek : &nbsp;<input type="text" class="form-control" name="no_rek" value="<?php echo $get->no_rek; ?>" readonly> </input></font></td>                        
                        </tr>
                      </tbody>
                    </table>

                    <table border="1" style="font-family: calibri;" width="100%">
                      <tbody>
                        <tr>
                          <td colspan="4" width="30%">Verifikasi Perintah Bayar oleh/<br><i>Payment Instruction Verified by : </i></td>
                          <td colspan="4" width="30%">Pelaksanaan Pembayaran oleh/<br><i>Payment Execution by : </i></td>
                          <td colspan="4" rowspan="6">Catatan : <br><i>Remarks :</i> <textarea type="text" class="form-control" rows="3" name="label2" placeholder="Remarks"></textarea></td>                          
                        </tr>
                        <tr>
                          <td colspan="4"><br><br><br><br> </td>
                          <td colspan="4"><br><br><br><br> </td>
                        </tr>
                        <tr>
                          <td colspan="2"> </td>
                          <td> Tanggal <br><i>Date</i></td>
                          <td width="15%"> </td>
                          <td colspan="2"> </td>
                          <td> Tanggal <br><i>Date</i></td>
                          <td width="15%"> </td>
                        </tr>
                        <tr>
                          <td colspan="2" width="10%">Nama/ <i>Name</i> </td>
                          <td colspan="2">&nbsp; Fitri Dwi Arianawati </td>
                          <td colspan="2" width="10%">Nama/ <i>Name</i> </td>
                          <td colspan="2">&nbsp; Dian Puspitasari </td>        
                        </tr>
                        <tr>
                          <td colspan="2" width="10%">Jabatan/ <i>Title</i> </td>
                          <td colspan="2">&nbsp; VP Treasury </td>
                          <td colspan="2" width="10%">Jabatan/ <i>Title</i> </td>
                          <td colspan="2">&nbsp; Cashier </td>
                        </tr>                      
                      </tbody> 
                    </table>

                    <br>

                    <table border="1" style="font-family: calibri;" width="100%">
                      <tbody>
                        <tr>
                          <td colspan="2">Diterima Oleh/ : <br> <i>Received by :</i></td>
                        </tr>
                        <tr>
                          <td ">Nama/ <i>Name</i> </td>
                        <td> </td>		
                        </tr>
                        <tr>
                          <td width="10%">Tanggal/ <i>Date</i> </td>
                          <td> </td>	
                        </tr>
                      </tbody>
                    </table>

                    <img align="right" src="assets/dashboard/images/footer_form.png" alt="Logo Images">

                  </div>  
                </div>

                <div class="box">
                  <div class="box-header with-border">
                    <a class="btn btn-warning" href="Dashboard/my_task" role="button">Cancel</a>
                    <button type="button" id="buttonSave" onclick="saveapf()" class="btn btn-primary">Save</button>
                  </div>
                </div>                                                 
            </div>
          </section>    
        <?php } ?>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>

<script>
function myPopup(myURL, myWidth, myHeight) {
            var left = (screen.width - myWidth) / 2;
            var top = (screen.height - myHeight) / 4;
            var myWindow = window.open(myURL, '_blank','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + myWidth + ', height=' + myHeight + ', top=' + top + ', left=' + left);
}

// document.querySelector(".third").addEventListener('click', function(){
//   swal("Data Successfully to Update!");
//   function update() {
//   location.reload(true);
//         tr.hide();
//   }
  
// });

function myFunction(){
  var x = document.getElementById("Select").value;
  var x1 = document.getElementById("Select1").value;
  var x2 = document.getElementById("Select2").value;

  document.getElementById("demo").innerHTML = x;
  document.getElementById("demo1").innerHTML = x1;
  document.getElementById("demo2").innerHTML = x2;
  document.getElementById("demo3").innerHTML = x;
  document.getElementById("demo4").innerHTML = x1;
  document.getElementById("demo5").innerHTML = x2;
  document.getElementById("demo6").innerHTML = x;
  document.getElementById("demo7").innerHTML = x1;
  document.getElementById("demo8").innerHTML = x2;
}

function myFunction1(){
  var x = document.getElementById("Select").value;
  var x1 = document.getElementById("Select1").value;
  var x2 = document.getElementById("Select2").value;

  document.getElementById("demo").innerHTML = x;
  document.getElementById("demo1").innerHTML = x1;
  document.getElementById("demo2").innerHTML = x2;
  document.getElementById("demo3").innerHTML = x;
  document.getElementById("demo4").innerHTML = x1;
  document.getElementById("demo5").innerHTML = x2;
  document.getElementById("demo6").innerHTML = x;
  document.getElementById("demo7").innerHTML = x1;
  document.getElementById("demo8").innerHTML = x2;
}

function myFunction2(){
  var x = document.getElementById("Select").value;
  var x1 = document.getElementById("Select1").value;
  var x2 = document.getElementById("Select2").value;

  document.getElementById("demo").innerHTML = x;
  document.getElementById("demo1").innerHTML = x1;
  document.getElementById("demo2").innerHTML = x2;
  document.getElementById("demo3").innerHTML = x;
  document.getElementById("demo4").innerHTML = x1;
  document.getElementById("demo5").innerHTML = x2;
  document.getElementById("demo6").innerHTML = x;
  document.getElementById("demo7").innerHTML = x1;
  document.getElementById("demo8").innerHTML = x2;
}

function nominal(){
  var x = document.getElementById("nilai").value;
  // alert(x);
  var b = document.getElementById("nilai1").value;
  // alert(b);
  var c = document.getElementById("nilai2").value;
  // alert(c);
  var d = document.getElementById("nilai3").value;
  // alert(d);
  var e = document.getElementById("nilai4").value;
  // alert(e);
  var f = document.getElementById("nilai5").value;
  // alert(f);
  var g = document.getElementById("nilai6").value;
  // alert(g);
  var h = document.getElementById("nilai7").value;
  // alert(h);
  var i = document.getElementById("nilai8").value;
  // alert(i);
  var j = document.getElementById("nilai9").value;
  // alert(j);
  var k = document.getElementById("nilai10").value;
  // alert(k);
  var l = document.getElementById("nilai11").value;

  var m = document.getElementById("jumlahuangmuka").value;
  var n = document.getElementById("jumlahuangmuka2").value;
  var o = document.getElementById("jumlahuangmuka3").value;
    
  var get_x = x.replace(/\D+/g, '');
  if ((x.substr(0,1)=="(" && x.substr(x.length-1,1)==")")|| x.substr(0,1)=="-"){		
		get_x= -Math.abs(get_x);		
  }else{
	  get_x= Math.abs(get_x);		
  }
  var get_b = b.replace(/\D+/g, '');
  if ((b.substr(0,1)=="(" && b.substr(b.length-1,1)==")")|| b.substr(0,1)=="-"){		
		get_b= -Math.abs(get_b);		
  }else{
	  get_b= Math.abs(get_b);		
  }
  var get_c = c.replace(/\D+/g, '');
  if ((c.substr(0,1)=="(" && c.substr(c.length-1,1)==")")|| c.substr(0,1)=="-"){		
		get_c= -Math.abs(get_c);		
  }else{
	  get_c= Math.abs(get_c);		
  }
  var get_d = d.replace(/\D+/g, ''); 
  if ((d.substr(0,1)=="(" && d.substr(d.length-1,1)==")")|| d.substr(0,1)=="-"){		
		get_d= -Math.abs(get_d);		
  }else{
	  get_d= Math.abs(get_d);		
  }  
  var get_e = e.replace(/\D+/g, '');
  if ((e.substr(0,1)=="(" && e.substr(e.length-1,1)==")")|| e.substr(0,1)=="-"){		
		get_e= -Math.abs(get_e);		
  }else{
	  get_e= Math.abs(get_e);		
  }
  var get_f = f.replace(/\D+/g, '');
  if ((f.substr(0,1)=="(" && f.substr(f.length-1,1)==")") || f.substr(0,1)=="-"){		
		get_f= -Math.abs(get_f);		
  }else{
	  get_f= Math.abs(get_f);		
  }
  
  var get_g = g.replace(/\D+/g, '');
  if ((g.substr(0,1)=="(" && g.substr(g.length-1,1)==")") || g.substr(0,1)=="-"){		
		get_g= -Math.abs(get_g);		
  }else{
	  get_g= Math.abs(get_g);		
  }
  
  var get_h = h.replace(/\D+/g, '');
  if ((h.substr(0,1)=="(" && h.substr(h.length-1,1)==")") || h.substr(0,1)=="-"){		
		get_h= -Math.abs(get_h);		
  }else{
	  get_h= Math.abs(get_h);		
  }
  
  var get_i = i.replace(/\D+/g, '');
  if ((i.substr(0,1)=="(" && i.substr(i.length-1,1)==")")|| i.substr(0,1)=="-"){		
		get_i= -Math.abs(get_i);		
  }else{
	  get_i= Math.abs(get_i);		
  }
  
  var get_j = j.replace(/\D+/g, '');
  if ((j.substr(0,1)=="(" && j.substr(j.length-1,1)==")") || j.substr(0,1)=="-"){		
		get_j= -Math.abs(get_j);		
  }else{
	  get_j= Math.abs(get_j);		
  }
  
  var get_k = k.replace(/\D+/g, '');
  if ((k.substr(0,1)=="(" && k.substr(k.length-1,1)==")") || k.substr(0,1)=="-"){		
		get_k= -Math.abs(get_k);		
  }else{
	  get_k= Math.abs(get_k);		
  }

  var get_l = l.replace(/\D+/g, '');  
  if ((l.substr(0,1)=="(" && l.substr(l.length-1,1)==")") || l.substr(0,1)=="-"){		
		get_l= -Math.abs(get_l);		
  }else{
	  get_l= Math.abs(get_l);		
  }

  var get_m = m.replace(/\D+/g, '');  
  if ((m.substr(0,1)=="(" && m.substr(m.length-1,1)==")") || m.substr(0,1)=="-"){		
		get_m= -Math.abs(get_m);		
  }else{
	  get_m= Math.abs(get_m);		
  }

  var get_n = n.replace(/\D+/g, '');
  if ((n.substr(0,1)=="(" && n.substr(n.length-1,1)==")") || n.substr(0,1)=="-"){		
		get_n= -Math.abs(get_n);		
  }else{
	get_n= Math.abs(get_n);		
  }

  var get_o = o.replace(/\D+/g,'');
  if ((o.substr(0,1)=="(" && o.substr(o.length-1,1)==")") || o.substr(0,1)=="-"){		
		get_o= -Math.abs(get_o);		
  }else{
	  get_o= Math.abs(get_o);		
  }

  //Currency1
  var jumlah1 = Number(get_x) + 0;
  var jumlah2 = Number(get_b) + 0;
  var jumlah3 = Number(get_c) + 0;
  var jumlah4 = Number(get_d) + 0;
  // Currency2
  var jumlah5 = Number(get_e);
  var jumlah6 = Number(get_f);
  var jumlah7 = Number(get_g);
  var jumlah8 = Number(get_h);
  // Currency3
  var jumlah9 = Number(get_i);
  var jumlah10 = Number(get_j);
  var jumlah11 = Number(get_k);
  var jumlah12 = Number(get_l);
  
  var negatif = Number(get_m) + 0 ;
  var negatif2 = Number(get_n) + 0 ;
  var negatif3 = Number(get_o) + 0 ;

//Jumlah -> Jumlah Pembayaran
  var hasil_jumlah1 = jumlah1+jumlah2+jumlah3+jumlah4;
  var hasil_jumlah2 = jumlah5+jumlah6+jumlah7+jumlah8;
  var hasil_jumlah3 = jumlah9+jumlah10+jumlah11+jumlah12;

// Jumlah Pembayaran - Jumlah Uang Muka
  var hasil = hasil_jumlah1-negatif;
  var hasil2 = hasil_jumlah2-negatif2;
  var hasil3 = hasil_jumlah3-negatif3;

  // Total Expense   
  if (hasil_jumlah1<0){
	  var strhasil_jumlah1=Math.abs(hasil_jumlah1);
	  document.getElementById("ulang").value = "(" + strhasil_jumlah1 + ")" ;
  }else{
	  document.getElementById("ulang").value = hasil_jumlah1 ;
  }
  	
  if (hasil_jumlah2<0){
	  var strhasil_jumlah2=Math.abs(hasil_jumlah2);	  
	  document.getElementById("ulang1").value = "(" + strhasil_jumlah2 + ")" ;
  }else{
	  document.getElementById("ulang1").value = hasil_jumlah2 ;
  }
  
  if (hasil_jumlah3<0){
	  var strhasil_jumlah3=Math.abs(hasil_jumlah3);
	  document.getElementById("ulang2").value = "(" + strhasil_jumlah3 + ")" ;
  }else{
	  document.getElementById("ulang2").value = hasil_jumlah3 ;
  }
// Negatif(piutang)
  if (hasil<0){
	  var strhasil =Math.abs(hasil);
	  document.getElementById("negatif").value = "(" + strhasil  + ")" ;
  }else{
	  document.getElementById("negatif").value = hasil  ;
  }

  if (hasil2<0){
	  var strhasil2 =Math.abs(hasil2);
	  document.getElementById("negatif2").value = "(" + strhasil2  + ")" ;
  }else{
	  document.getElementById("negatif2").value = hasil2  ;
  }

  if (hasil3<0){
	  var strhasil3 =Math.abs(hasil3);
	  document.getElementById("negatif3").value = "(" + strhasil3  + ")" ;
  }else{
	  document.getElementById("negatif3").value = hasil3  ;
  }

  // var pembayaran = currency+ ';' +currency2+ ';' +currency3;
  // var str = pembayaran.replace(/\./g,'');
 
  // if(x && b){
    // document.getElementById("ulang").value = hasil_jumlah1 ;
    // document.getElementById("ulang1").value = hasil_jumlah2 ;
    // document.getElementById("ulang2").value = hasil_jumlah3 ;
    // alert(ulang);    

    var bilangan= ''+Math.abs(hasil)+'';
  // alert(bilangan);
    var kalimat="";
    var angka   = new Array('0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');
    var kata    = new Array('','Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan','Sembilan');
    var tingkat = new Array('','Ribu','Juta','Milyar','Triliun');
    var panjang_bilangan = bilangan.length;
    // alert(panjang_bilangan);
     
    /* pengujian panjang bilangan */
    if(panjang_bilangan > 15){
        kalimat = "Diluar Batas";
    }else{
        /* mengambil angka-angka yang ada dalam bilangan, dimasukkan ke dalam array */
        for(i = 1; i <= panjang_bilangan; i++) {
            angka[i] = bilangan.substr(-(i),1);
        }
         
        var i = 1;
        var j = 0;
         
        /* mulai proses iterasi terhadap array angka */
        while(i <= panjang_bilangan){
            subkalimat = "";
            kata1 = "";
            kata2 = "";
            kata3 = "";
             
            /* untuk Ratusan */
            if(angka[i+2] != "0"){
                if(angka[i+2] == "1"){
                    kata1 = "Seratus";
                }else{
                    kata1 = kata[angka[i+2]] + " Ratus";
                }
            }
             
            /* untuk Puluhan atau Belasan */
            if(angka[i+1] != "0"){
                if(angka[i+1] == "1"){
                    if(angka[i] == "0"){
                        kata2 = "Sepuluh";
                    }else if(angka[i] == "1"){
                        kata2 = "Sebelas";
                    }else{
                        kata2 = kata[angka[i]] + " Belas";
                    }
                }else{
                    kata2 = kata[angka[i+1]] + " Puluh";
                }
            }
             
            /* untuk Satuan */
            if (angka[i] != "0"){
                if (angka[i+1] != "1"){
                    kata3 = kata[angka[i]];
                }
            }
             
            /* pengujian angka apakah tidak nol semua, lalu ditambahkan tingkat */
            if ((angka[i] != "0") || (angka[i+1] != "0") || (angka[i+2] != "0")){
                subkalimat = kata1+" "+kata2+" "+kata3+" "+tingkat[j]+" ";
            }
             
            /* gabungkan variabe sub kalimat (untuk Satu blok 3 angka) ke variabel kalimat */
            kalimat = subkalimat + kalimat;
            i = i + 3;
            j = j + 1;
        }
         
        /* mengganti Satu Ribu jadi Seribu jika diperlukan */
        if ((angka[5] == "0") && (angka[6] == "0")){
            kalimat = kalimat.replace("Satu Ribu","Seribu");
        }
    }

    var matauang = document.getElementById("Select").value;
    // var namamatauang =String(matauang);

    // var splitCur []  		= namamatauang.split("-");
    
    // alert(splitCur[1]);
    switch(matauang){
      case "EUR":
      muncul = "Euro";
      break;
      case "IDR":
      muncul = "Rupiah";
      break;
      case "USD":
      muncul = "Dollar Amerika";
      break;
      case "SGD":
      muncul = "Dollar Singapura";
      break;
      case "GBP":
      muncul = "Pound";
      break;
      case "JPY":
      muncul = "Yen";
      break;
      case "HKD":
      muncul = "Dollar Hongkong";
      break;
      case "KRW":
      muncul = "Won";
      break;

      default:
      muncul = "";
    }

    if (hasil<0){
		  kalimat="( " + kalimat + ") ";
	  }
	 
	 if (hasil==0){
		  kalimat="Nol ";
	  }
    
    document.getElementById("terbilang").value=kalimat+ " " + muncul;
    
    // alert(kalimat);

    var bilangan2= ''+Math.abs(hasil2)+'';
  // alert(bilangan2);
    var kalimat2="";
    var angka2   = new Array('0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');
    var katax    = new Array('','Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan','Sembilan');
    var tingkat2 = new Array('','Ribu','Juta','Milyar','Triliun');
    var panjang_bilangan2 = bilangan2.length;
    // alert(panjang_bilangan2);
     
    /* pengujian panjang bilangan2 */
    if(panjang_bilangan2 > 15){
        kalimat2 = "Diluar Batas";
    }else{
        /* mengambil angka-angka yang ada dalam bilangan2, dimasukkan ke dalam array */
        for(ix = 1; ix <= panjang_bilangan2; ix++) {
            angka2[ix] = bilangan2.substr(-(ix),1);
        }
         
        var ix = 1;
        var jx = 0;
         
        /* mulai proses iterasi terhadap array angka */
        while(ix <= panjang_bilangan2){
            subkalimat2 = "";
            kata12 = "";
            kata22 = "";
            kata32 = "";
             
            /* untuk Ratusan */
            if(angka2[ix+2] != "0"){
                if(angka[ix+2] == "1"){
                    kata12 = "Seratus";
                }else{
                    kata12 = katax[angka2[ix+2]] + " Ratus";
                }
            }
             
            /* untuk Puluhan atau Belasan */
            if(angka2[ix+1] != "0"){
                if(angka2[ix+1] == "1"){
                    if(angka2[ix] == "0"){
                        kata22 = "Sepuluh";
                    }else if(angka2[ix] == "1"){
                        kata22 = "Sebelas";
                    }else{
                        kata22 = katax[angka2[ix]] + " Belas";
                    }
                }else{
                    kata22 = katax[angka2[ix+1]] + " Puluh";
                }
            }
             
            /* untuk Satuan */
            if (angka2[ix] != "0"){
                if (angka2[ix+1] != "1"){
                    kata32 = katax[angka2[ix]];
                }
            }
             
            /* pengujian angka apakah tidak nol semua, lalu ditambahkan tingkat */
            if ((angka2[ix] != "0") || (angka2[ix+1] != "0") || (angka2[ix+2] != "0")){
                subkalimat2 = kata12+" "+kata22+" "+kata32+" "+tingkat2[jx]+" ";
            }
             
            /* gabungkan variabe sub kalimat (untuk Satu blok 3 angka) ke variabel kalimat */
            kalimat2 = subkalimat2 + kalimat2;
            ix = ix + 3;
            jx = jx + 1;
        }
         
        /* mengganti Satu Ribu jadi Seribu jika diperlukan */
        if ((angka2[5] == "0") && (angka2[6] == "0")){
            kalimat2 = kalimat2.replace("Satu Ribu","Seribu");
        }
    }

    var matauang2 = document.getElementById("Select4").value;
    // var namamatauang =String(matauang);

    // var splitCur []  		= namamatauang.split("-");
    
    // alert(splitCur[1]);
    switch(matauang2){
      case "EUR":
      muncul2 = "EURO";
      break;
      case "IDR":
      muncul2 = "Rupiah";
      break;
      case "USD":
      muncul2 = "Dollar Amerika";
      break;
      case "SGD":
      muncul2 = "Dollar Singapura";
      break;
      case "GBP":
      muncul2 = "Pound";
      break;
      case "JPY":
      muncul2 = "Yen";
      break;
      case "HKD":
      muncul2 = "Dollar Hongkong";
      break;
      case "KRW":
      muncul2 = "Won";
      break;

      default:
      muncul2 = "";
    }

  if (hasil2<0){
		kalimat2="( " + kalimat2 + ") ";
	}
	
	if (hasil2==0){
		  kalimat2="Nol ";
	  }

    document.getElementById("terbilang2").value=kalimat2+ " " + muncul2;
    // alert(kalimat2);

    var bilangan3= ''+ Math.abs(hasil3)+'';
  // alert(bilangan3);
    var kalimat3="";
    var angka3   = new Array('0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');
    var kataxx    = new Array('','Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan','Sembilan');
    var tingkat3 = new Array('','Ribu','Juta','Milyar','Triliun');
    var panjang_bilangan3 = bilangan3.length;
    // alert(panjang_bilangan3);
     
    /* pengujian panjang bilangan3 */
    if(panjang_bilangan3 > 15){
        kalimat3 = "Diluar Batas";
    }else{
        /* mengambil angka-angka yang ada dalam bilangan3, dimasukkan ke dalam array */
        for(ixx = 1; ixx <= panjang_bilangan3; ixx++) {
            angka3[ixx] = bilangan3.substr(-(ixx),1);
        }
         
        var ixx = 1;
        var jxx = 0;
         
        /* mulai proses iterasi terhadap array angka */
        while(ixx <= panjang_bilangan3){
            subkalimat3 = "";
            kata13 = "";
            kata23 = "";
            kata33 = "";
             
            /* untuk Ratusan */
            if(angka3[ixx+2] != "0"){
                if(angka[ixx+2] == "1"){
                    kata13 = "Seratus";
                }else{
                    kata13 = kataxx[angka3[ixx+2]] + " Ratus";
                }
            }
             
            /* untuk Puluhan atau Belasan */
            if(angka3[ixx+1] != "0"){
                if(angka3[ixx+1] == "1"){
                    if(angka3[ixx] == "0"){
                        kata23 = "Sepuluh";
                    }else if(angka3[ixx] == "1"){
                        kata23 = "Sebelas";
                    }else{
                        kata23 = kataxx[angka3[ixx]] + " Belas";
                    }
                }else{
                    kata23 = kataxx[angka3[ixx+1]] + " Puluh";
                }
            }
             
            /* untuk Satuan */
            if (angka3[ixx] != "0"){
                if (angka3[ixx+1] != "1"){
                    kata33 = kataxx[angka3[ixx]];
                }
            }
             
            /* pengujian angka apakah tidak nol semua, lalu ditambahkan tingkat */
            if ((angka3[ixx] != "0") || (angka3[ixx+1] != "0") || (angka3[ixx+2] != "0")){
                subkalimat3 = kata13+" "+kata23+" "+kata33+" "+tingkat3[jxx]+" ";
            }
             
            /* gabungkan variabe sub kalimat (untuk Satu blok 3 angka) ke variabel kalimat */
            kalimat3 = subkalimat3 + kalimat3;
            ixx = ixx + 3;
            jxx = jxx + 1;
        }
         
        /* mengganti Satu Ribu jadi Seribu jika diperlukan */
        if ((angka3[5] == "0") && (angka3[6] == "0")){
            kalimat3 = kalimat3.replace("Satu Ribu","Seribu");
        }
    }

    var matauang3 = document.getElementById("Select8").value;
    // var namamatauang =String(matauang);

    // var splitCur []  		= namamatauang.split("-");
    
    // alert(splitCur[1]);
    switch(matauang3){
      case "EUR":
      muncul3 = "EURO";
      break;
      case "IDR":
      muncul3 = "Rupiah";
      break;
      case "USD":
      muncul3 = "Dollar Amerika";
      break;
      case "SGD":
      muncul3 = "Dollar Singapura";
      break;
      case "GBP":
      muncul3 = "Pound";
      break;
      case "JPY":
      muncul3 = "Yen";
      break;
      case "HKD":
      muncul3 = "Dollar Hongkong";
      break;
      case "KRW":
      muncul3 = "Won";
      break;

      default:
      muncul3 = "";
    }

    if (hasil3<0){
		kalimat3="( " + kalimat3 + ") ";
	}

	if (hasil3==0){
		  kalimat3="Nol ";
	  }
    document.getElementById("terbilang3").value=kalimat3+ " " + muncul3;
    // alert(kalimat3);

    // document.getElementById("negatif").value = hasil ;
    // document.getElementById("negatif2").value = hasil2 ; 
    // document.getElementById("negatif3").value = hasil3 ;
  var a = hasil ;
  if (a <= 100000000){
    <?php foreach ($d_wewenang as $pejabat) { ?>
      <?php if ($pejabat->activate == "On" && $pejabat->idapproval == "1"){ ?>
      document.getElementById("approval1").value = '<?= $pejabat->nama_user?>';
      document.getElementById("jabatan1").value = '<?= $pejabat->jabatan?>';

      <?php } else {  ?>
        document.getElementById("approval1").value = "Salusra Satria";;
        document.getElementById("jabatan1").value = "Direktur Eksekutif Keuangan & Penilaian Proyek / CFO";
      <?php } ?>

  }else if (a > 100000000 && a <= 500000000) {
    <?php if ($pejabat->activate == "On" && $pejabat->idapproval == "2"){ ?>
    document.getElementById("approval1").value = '<?= $pejabat->nama_user?>';
    document.getElementById("jabatan1").value = '<?= $pejabat->jabatan?>';

    <?php } else {  ?>
      document.getElementById("approval1").value = "M. Wahid Sutopo";
      document.getElementById("jabatan1").value = "Direktur Utama / CEO";  
    <?php } ?>

  }else if (a > 500000000) {
    document.getElementById("approval1").value = "Salusra Satria";
    document.getElementById("jabatan1").value = "Direktur Eksekutif Keuangan & Penilaian Proyek / CFO";
    
    document.getElementById("approval2").value = "Andre Permana";
    document.getElementById("jabatan2").value = "Direktur Eksekutif Bisnis / COO"; 

    document.getElementById("approval3").value = "M. Wahid Sutopo";
    document.getElementById("jabatan3").value = "Direktur Utama / CEO";  
  <?php }?>

  }
    
  if (hasil_jumlah1<0){
	  hasil_jumlah1=Math.abs(hasil_jumlah1);
	  document.getElementById("ulang").value = "(" + hasil_jumlah1 + ")" ;
  }else{
	  document.getElementById("ulang").value = hasil_jumlah1 ;
  }
  var strulang =ulang.value;
	if (strulang.substr(0,1)=="(" && strulang.substr(strulang.length-1,1)==")"){
		ulang.value = "(" + formatulang(strulang.substr(1,strulang.length-2)) + ")";
	}else{
		ulang.value = formatulang(strulang);
	} 

  if (hasil_jumlah2<0){
	  hasil_jumlah2=Math.abs(hasil_jumlah2);
	  document.getElementById("ulang1").value = "(" + hasil_jumlah2 + ")" ;
  }else{
	  document.getElementById("ulang1").value = hasil_jumlah2 ;
  }
  
  var strulang1 =ulang1.value;
	if (strulang1.substr(0,1)=="(" && strulang1.substr(strulang1.length-1,1)==")"){
		ulang1.value = "(" + formatulang1(strulang1.substr(1,strulang1.length-2)) + ")";
	}else{
		ulang1.value = formatulang1(strulang1);
	} 

  if (hasil_jumlah3<0){
	  hasil_jumlah3=Math.abs(hasil_jumlah3);
	  document.getElementById("ulang2").value = "(" + hasil_jumlah3 + ")" ;
  }else{
	  document.getElementById("ulang2").value = hasil_jumlah3 ;
  }   
  var strulang2 =ulang2.value;
	if (strulang2.substr(0,1)=="(" && strulang2.substr(strulang2.length-1,1)==")"){
		ulang2.value = "(" + formatulang2(strulang2.substr(1,strulang2.length-2)) + ")";
	}else{
		ulang2.value = formatulang2(strulang2);
	} 
 
}

// Format Separator Id Nilai 
var nilai = document.getElementById('nilai');
  nilai.addEventListener('focusout', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai() untuk mengubah angka yang di ketik menjadi format angka
    var strnilai =nilai.value;
	if (strnilai.substr(0,1)=="(" && strnilai.substr(strnilai.length-1,1)==")"){
		nilai.value = "(" + formatnilai(strnilai.substr(1,strnilai.length-2)) + ")";
	}else if(strnilai.substr(0,1)=="-") {
		nilai.value = "(" + formatnilai(strnilai.substr(1,strnilai.length-1)) + ")";
	}else{
		nilai.value = formatnilai(this.value);
	}
    //nilai.value = formatnilai(this.value);
  });

  /* Fungsi formatnilai */
  function formatnilai(angka, prefix){
    var number_string = angka.replace(/[^,\d,-]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    nilai     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      nilai += separator + ribuan.join('.');
    }

    nilai = split[1] != undefined ? nilai + ',' + split[1] : nilai;
    return prefix == undefined ? nilai : (nilai ? + nilai : '');
  }

  // Format Separator Id Nilai 1
  var nilai1 = document.getElementById('nilai1');
  nilai1.addEventListener('focusout', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai1() untuk mengubah angka yang di ketik menjadi format angka
	var strnilai1 =nilai1.value;
	if (strnilai1.substr(0,1)=="(" && strnilai1.substr(strnilai1.length-1,1)==")"){
		nilai1.value = "(" + formatnilai1(strnilai1.substr(1,strnilai1.length-2)) + ")";
	}else if(strnilai1.substr(0,1)=="-") {
		nilai1.value = "(" + formatnilai1(strnilai1.substr(1,strnilai1.length-1)) + ")";
	}else{
		nilai1.value = formatnilai1(this.value);
	}
    //nilai1.value = formatnilai1(this.value);
  });

  /* Fungsi formatnilai1 */
  function formatnilai1(angka, prefix){
    var number_string = angka.replace(/[^,\d,-]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    nilai1     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      nilai1 += separator + ribuan.join('.');
    }

    nilai1 = split[1] != undefined ? nilai1 + ',' + split[1] : nilai1;
    return prefix == undefined ? nilai1 : (nilai1 ? + nilai1 : '');
  }


  // // Format Separator Id Nilai 2
  var nilai2 = document.getElementById('nilai2');
  nilai2.addEventListener('focusout', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai2() untuk mengubah angka yang di ketik menjadi format angka
    var strnilai2 =nilai2.value;
	if (strnilai2.substr(0,1)=="(" && strnilai2.substr(strnilai2.length-1,1)==")"){
		nilai2.value = "(" + formatnilai2(strnilai2.substr(1,strnilai2.length-2)) + ")";
	}else if(strnilai2.substr(0,1)=="-") {
		nilai2.value = "(" + formatnilai2(strnilai2.substr(1,strnilai2.length-1)) + ")";
	}else{
		nilai2.value = formatnilai2(this.value);
	}
    //nilai2.value = formatnilai2(this.value);
  });

  /* Fungsi formatnilai2 */
  function formatnilai2(angka, prefix){
    var number_string = angka.replace(/[^,\d,-]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    nilai2     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      nilai2 += separator + ribuan.join('.');
    }

    nilai2 = split[1] != undefined ? nilai2 + ',' + split[1] : nilai2;
    return prefix == undefined ? nilai2 : (nilai2 ? + nilai2 : '');
  }

  var nilai3 = document.getElementById('nilai3');  
  nilai3.addEventListener('focusout', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai3() untuk mengubah angka yang di ketik menjadi format angka	
	var strnilai3 =nilai3.value;
	if (strnilai3.substr(0,1)=="(" && strnilai3.substr(strnilai3.length-1,1)==")"){
		nilai3.value = "(" + formatnilai3(strnilai3.substr(1,strnilai3.length-2)) + ")";
	}else if(strnilai3.substr(0,1)=="-") {
		nilai3.value = "(" + formatnilai3(strnilai3.substr(1,strnilai3.length-1)) + ")";
	}else{
		nilai3.value = formatnilai3(this.value);
	}
    //nilai3.value = formatnilai3(this.value);
    
  });

  /* Fungsi formatnilai3 */
  function formatnilai3(angka, prefix){	  
	var number_string = angka.replace(/[^,\d,-]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    nilai3     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      nilai3 += separator + ribuan.join('.');
    }

    nilai3 = split[1] != undefined ? nilai3 + ',' + split[1] : nilai3;
    return prefix == undefined ? nilai3 : (nilai3 ? + nilai3 : '');
  }

  var nilai4 = document.getElementById('nilai4');
  nilai4.addEventListener('focusout', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai4() untuk mengubah angka yang di ketik menjadi format angka
    var strnilai4 =nilai4.value;
	if (strnilai4.substr(0,1)=="(" && strnilai4.substr(strnilai4.length-1,1)==")"){
		nilai4.value = "(" + formatnilai4(strnilai4.substr(1,strnilai4.length-2)) + ")";
	}else if(strnilai4.substr(0,1)=="-") {
		nilai4.value = "(" + formatnilai4(strnilai4.substr(1,strnilai4.length-1)) + ")";
	}else{
		nilai4.value = formatnilai4(this.value);
	}
    //nilai4.value = formatnilai4(this.value);
  });

  /* Fungsi formatnilai4 */
  function formatnilai4(angka, prefix){
    var number_string = angka.replace(/[^,\d,-]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    nilai4     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      nilai4 += separator + ribuan.join('.');
    }

    nilai4 = split[1] != undefined ? nilai4 + ',' + split[1] : nilai4;
    return prefix == undefined ? nilai4 : (nilai4 ? + nilai4 : '');
  }

  var nilai5 = document.getElementById('nilai5');
  nilai5.addEventListener('focusout', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai5() untuk mengubah angka yang di ketik menjadi format angka
    var strnilai5 =nilai5.value;
	if (strnilai5.substr(0,1)=="(" && strnilai5.substr(strnilai5.length-1,1)==")"){
		nilai5.value = "(" + formatnilai5(strnilai5.substr(1,strnilai5.length-2)) + ")";
	}else if(strnilai5.substr(0,1)=="-") {
		nilai5.value = "(" + formatnilai5(strnilai5.substr(1,strnilai5.length-1)) + ")";
	}else{
		nilai5.value = formatnilai5(this.value);
	}
    //nilai5.value = formatnilai5(this.value);
  });

  /* Fungsi formatnilai5 */
  function formatnilai5(angka, prefix){
    var number_string = angka.replace(/[^,\d,-]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    nilai5     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      nilai5 += separator + ribuan.join('.');
    }

    nilai5 = split[1] != undefined ? nilai5 + ',' + split[1] : nilai5;
    return prefix == undefined ? nilai5 : (nilai5 ? + nilai5 : '');
  }

  var nilai6 = document.getElementById('nilai6');
  nilai6.addEventListener('focusout', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai6() untuk mengubah angka yang di ketik menjadi format angka
    var strnilai6 =nilai6.value;
	if (strnilai6.substr(0,1)=="(" && strnilai6.substr(strnilai6.length-1,1)==")"){
		nilai6.value = "(" + formatnilai6(strnilai6.substr(1,strnilai6.length-2)) + ")";
	}else if(strnilai6.substr(0,1)=="-") {
		nilai6.value = "(" + formatnilai6(strnilai6.substr(1,strnilai6.length-1)) + ")";
	}else{
		nilai6.value = formatnilai6(this.value);
	}
    //nilai6.value = formatnilai6(this.value);
  });

  /* Fungsi formatnilai6 */
  function formatnilai6(angka, prefix){
    var number_string = angka.replace(/[^,\d,-]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    nilai6     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      nilai6 += separator + ribuan.join('.');
    }

    nilai6 = split[1] != undefined ? nilai6 + ',' + split[1] : nilai6;
    return prefix == undefined ? nilai6 : (nilai6 ? + nilai6 : '');
  }

  var nilai7 = document.getElementById('nilai7');
  nilai7.addEventListener('focusout', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai7() untuk mengubah angka yang di ketik menjadi format angka
    var strnilai7 =nilai7.value;
	if (strnilai7.substr(0,1)=="(" && strnilai7.substr(strnilai7.length-1,1)==")"){
		nilai7.value = "(" + formatnilai7(strnilai7.substr(1,strnilai7.length-2)) + ")";
	}else if(strnilai7.substr(0,1)=="-") {
		nilai7.value = "(" + formatnilai7(strnilai7.substr(1,strnilai7.length-1)) + ")";
	}else{
		nilai7.value = formatnilai7(this.value);
	}
    //nilai7.value = formatnilai7(this.value);
  });

  /* Fungsi formatnilai7 */
  function formatnilai7(angka, prefix){
    var number_string = angka.replace(/[^,\d,-]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    nilai7     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      nilai7 += separator + ribuan.join('.');
    }

    nilai7 = split[1] != undefined ? nilai7 + ',' + split[1] : nilai7;
    return prefix == undefined ? nilai7 : (nilai7 ? + nilai7 : '');
  }

  var nilai8 = document.getElementById('nilai8');
  nilai8.addEventListener('focusout', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai8() untuk mengubah angka yang di ketik menjadi format angka
    var strnilai8 =nilai8.value;
	if (strnilai8.substr(0,1)=="(" && strnilai8.substr(strnilai8.length-1,1)==")"){
		nilai8.value = "(" + formatnilai8(strnilai8.substr(1,strnilai8.length-2)) + ")";
	}else if(strnilai8.substr(0,1)=="-") {
		nilai8.value = "(" + formatnilai8(strnilai8.substr(1,strnilai8.length-1)) + ")";
	}else{
		nilai8.value = formatnilai8(this.value);
	}
    //nilai8.value = formatnilai8(this.value);
  });

  /* Fungsi formatnilai8 */
  function formatnilai8(angka, prefix){
    var number_string = angka.replace(/[^,\d,-]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    nilai8     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      nilai8 += separator + ribuan.join('.');
    }

    nilai8 = split[1] != undefined ? nilai8 + ',' + split[1] : nilai8;
    return prefix == undefined ? nilai8 : (nilai8 ? + nilai8 : '');
  }

  var nilai9 = document.getElementById('nilai9');
  nilai9.addEventListener('focusout', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai9() untuk mengubah angka yang di ketik menjadi format angka
    var strnilai9 =nilai9.value;
	if (strnilai9.substr(0,1)=="(" && strnilai9.substr(strnilai9.length-1,1)==")"){
		nilai9.value = "(" + formatnilai9(strnilai9.substr(1,strnilai9.length-2)) + ")";
	}else if(strnilai9.substr(0,1)=="-") {
		nilai9.value = "(" + formatnilai9(strnilai9.substr(1,strnilai9.length-1)) + ")";
	}else{
		nilai9.value = formatnilai9(this.value);
	}
    //nilai9.value = formatnilai9(this.value);
  });

  /* Fungsi formatnilai9 */
  function formatnilai9(angka, prefix){
    var number_string = angka.replace(/[^,\d,-]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    nilai9     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      nilai9 += separator + ribuan.join('.');
    }

    nilai9 = split[1] != undefined ? nilai9 + ',' + split[1] : nilai9;
    return prefix == undefined ? nilai9 : (nilai9 ? + nilai9 : '');
  }

  var nilai10 = document.getElementById('nilai10');
  nilai10.addEventListener('focusout', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai8() untuk mengubah angka yang di ketik menjadi format angka
    var strnilai10 =nilai10.value;
	if (strnilai10.substr(0,1)=="(" && strnilai10.substr(strnilai10.length-1,1)==")"){
		nilai10.value = "(" + formatnilai10(strnilai10.substr(1,strnilai10.length-2)) + ")";
	}else if(strnilai10.substr(0,1)=="-") {
		nilai10.value = "(" + formatnilai10(strnilai10.substr(1,strnilai10.length-1)) + ")";
	}else{
		nilai10.value = formatnilai10(this.value);
	}
    //nilai10.value = formatnilai8(this.value);
  });

  /* Fungsi formatnilai10 */
  function formatnilai10(angka, prefix){
    var number_string = angka.replace(/[^,\d,-]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    nilai10     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      nilai10 += separator + ribuan.join('.');
    }

    nilai10 = split[1] != undefined ? nilai10 + ',' + split[1] : nilai10;
    return prefix == undefined ? nilai10 : (nilai10 ? + nilai10 : '');
  }

  var nilai11 = document.getElementById('nilai11');
  nilai11.addEventListener('focusout', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai11() untuk mengubah angka yang di ketik menjadi format angka
    var strnilai11 =nilai11.value;
	if (strnilai11.substr(0,1)=="(" && strnilai11.substr(strnilai11.length-1,1)==")"){
		nilai11.value = "(" + formatnilai11(strnilai11.substr(1,strnilai11.length-2)) + ")";
	}else if(strnilai11.substr(0,1)=="-") {
		nilai11.value = "(" + formatnilai11(strnilai11.substr(1,strnilai11.length-1)) + ")";
	}else{
		nilai11.value = formatnilai11(this.value);
	}
	//nilai11.value = formatnilai11(this.value);
  });

  /* Fungsi formatnilai11 */
  function formatnilai11(angka, prefix){
    var number_string = angka.replace(/[^,\d,-]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    nilai11     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      nilai11 += separator + ribuan.join('.');
    }

    nilai11 = split[1] != undefined ? nilai11 + ',' + split[1] : nilai11;
    return prefix == undefined ? nilai11 : (nilai11 ? + nilai11 : '');
  }
  
  // Format Separator Id Ulang (Jumlah Pembayaran)
  var ulang = document.getElementById('ulang');
  ulang.addEventListener('mousemove', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatulang() untuk mengubah angka yang di ketik menjadi format angka
    var strulang =ulang.value;
	if (strulang.substr(0,1)=="(" && strulang.substr(strulang.length-1,1)==")"){
		ulang.value = "(" + formatulang(strulang.substr(1,strulang.length-2)) + ")";
	}else if(strulang.substr(0,1)=="-") {
		ulang.value = "(" + formatulang(strulang.substr(1,strulang.length-1)) + ")";
	}else{
		ulang.value = formatulang(this.value);
	}
	//ulang.value = formatulang(this.value);
  });

  /* Fungsi formatulang */
  function formatulang(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
	split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    ulang     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      ulang += separator + ribuan.join('.');
    }

    ulang = split[1] != undefined ? ulang + ',' + split[1] : ulang;
    return prefix == undefined ? ulang : (ulang ? + ulang : '');
  } 

  // Format Separator Id Ulang (Jumlah Pembayaran)
  var ulang1 = document.getElementById('ulang1');
  ulang1.addEventListener('mousemove', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatulang1() untuk mengubah angka yang di ketik menjadi format angka
    var strulang1 =ulang1.value;
	if (strulang1.substr(0,1)=="(" && strulang1.substr(strulang1.length-1,1)==")"){
		ulang1.value = "(" + formatulang(strulang1.substr(1,strulang1.length-2)) + ")";
	}else if(strulang1.substr(0,1)=="-") {
		ulang1.value = "(" + formatulang1(strulang1.substr(1,strulang1.length-1)) + ")";
	}else{
		ulang1.value = formatulang1(this.value);
	}
  });

  /* Fungsi formatulang1 */
  function formatulang1(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    ulang1     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      ulang1 += separator + ribuan.join('.');
    }

    ulang1 = split[1] != undefined ? ulang1 + ',' + split[1] : ulang1;
    return prefix == undefined ? ulang1 : (ulang1 ? + ulang1 : '');
  }

  // Format Separator Id Ulang (Jumlah Pembayaran)
  var ulang2 = document.getElementById('ulang2');
  ulang2.addEventListener('mousemove', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatulang2() untuk mengubah angka yang di ketik menjadi format angka
    var strulang2 =ulang2.value;
	if (strulang2.substr(0,1)=="(" && strulang2.substr(strulang2.length-1,1)==")"){
		ulang2.value = "(" + formatulang(strulang2.substr(1,strulang2.length-2)) + ")";
	}else if(strulang2.substr(0,1)=="-") {
		ulang2.value = "(" + formatulang2(strulang2.substr(1,strulang2.length-1)) + ")";
	}else{
		ulang2.value = formatulang2(this.value);
	}
  });

  /* Fungsi formatulang2 */
  function formatulang2(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    ulang2     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      ulang2 += separator + ribuan.join('.');
    }

    ulang2 = split[1] != undefined ? ulang2 + ',' + split[1] : ulang2;
    return prefix == undefined ? ulang2 : (ulang2 ? + ulang2 : '');
  }

  // Format Separator Id Jumlah (Jumlah UangMuka)
  var jumlahuangmuka = document.getElementById('jumlahuangmuka');
  jumlahuangmuka.addEventListener('focusout', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatjumlahuangmuka() untuk mengubah angka yang di ketik menjadi format angka
    var strjumlahuangmuka =jumlahuangmuka.value;
	if (strjumlahuangmuka.substr(0,1)=="(" && strjumlahuangmuka.substr(strjumlahuangmuka.length-1,1)==")"){
		jumlahuangmuka.value = "(" + formatjumlahuangmuka(strjumlahuangmuka.substr(1,strjumlahuangmuka.length-2)) + ")";
	}else if(strjumlahuangmuka.substr(0,1)=="-") {
		jumlahuangmuka.value = "(" + formatjumlahuangmuka(strjumlahuangmuka.substr(1,strjumlahuangmuka.length-1)) + ")";
	}else{
		jumlahuangmuka.value = formatjumlahuangmuka(this.value);
	}
  });

  /* Fungsi formatjumlahuangmuka */
  function formatjumlahuangmuka(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    jumlahuangmuka     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      jumlahuangmuka += separator + ribuan.join('.');
    }

    jumlahuangmuka = split[1] != undefined ? jumlahuangmuka + ',' + split[1] : jumlahuangmuka;
    return prefix == undefined ? jumlahuangmuka : (jumlahuangmuka ? + jumlahuangmuka : '');
  }

  var jumlahuangmuka2 = document.getElementById('jumlahuangmuka2');
  jumlahuangmuka2.addEventListener('focusout', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatjumlahuangmuka2() untuk mengubah angka yang di ketik menjadi format angka
    var strjumlahuangmuka2 =jumlahuangmuka2.value;
	if (strjumlahuangmuka2.substr(0,1)=="(" && strjumlahuangmuka2.substr(strjumlahuangmuka2.length-1,1)==")"){
		jumlahuangmuka2.value = "(" + formatjumlahuangmuka2(strjumlahuangmuka2.substr(1,strjumlahuangmuka2.length-2)) + ")";
	}else if(strjumlahuangmuka2.substr(0,1)=="-") {
		jumlahuangmuka2.value = "(" + formatjumlahuangmuka2(strjumlahuangmuka2.substr(1,strjumlahuangmuka2.length-1)) + ")";
	}else{
		jumlahuangmuka2.value = formatjumlahuangmuka2(this.value);
	}
  });

  /* Fungsi formatjumlahuangmuka2 */
  function formatjumlahuangmuka2(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    jumlahuangmuka2     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      jumlahuangmuka2 += separator + ribuan.join('.');
    }

    jumlahuangmuka2 = split[1] != undefined ? jumlahuangmuka2 + ',' + split[1] : jumlahuangmuka2;
    return prefix == undefined ? jumlahuangmuka2 : (jumlahuangmuka2 ? + jumlahuangmuka2 : '');
  }

  var jumlahuangmuka3 = document.getElementById('jumlahuangmuka3');
  jumlahuangmuka3.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatjumlahuangmuka3() untuk mengubah angka yang di ketik menjadi format angka
    var strjumlahuangmuka3 =jumlahuangmuka3.value;
	if (strjumlahuangmuka3.substr(0,1)=="(" && strjumlahuangmuka3.substr(strjumlahuangmuka3.length-1,1)==")"){
		jumlahuangmuka3.value = "(" + formatjumlahuangmuka3(strjumlahuangmuka3.substr(1,strjumlahuangmuka3.length-2)) + ")";
	}else if(strjumlahuangmuka3.substr(0,1)=="-") {
		jumlahuangmuka3.value = "(" + formatjumlahuangmuka3(strjumlahuangmuka3.substr(1,strjumlahuangmuka3.length-1)) + ")";
	}else{
		jumlahuangmuka3.value = formatjumlahuangmuka3(this.value);
	}
  });

  /* Fungsi formatjumlahuangmuka3 */
  function formatjumlahuangmuka3(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    jumlahuangmuka3     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      jumlahuangmuka3 += separator + ribuan.join('.');
    }

    jumlahuangmuka3 = split[1] != undefined ? jumlahuangmuka3 + ',' + split[1] : jumlahuangmuka3;
    return prefix == undefined ? jumlahuangmuka3 : (jumlahuangmuka3 ? + jumlahuangmuka3 : '');
  }
  // Format Separator Id Negarif (Piutang)
  var negatif = document.getElementById('negatif');
  negatif.addEventListener('mousemove', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnegatif() untuk mengubah angka yang di ketik menjadi format angka
	var strnegatif =negatif.value;
	if (strnegatif.substr(0,1)=="(" && strnegatif.substr(strnegatif.length-1,1)==")"){
		negatif.value = "(" + formatnegatif(strnegatif.substr(1,strnegatif.length-2)) + ")";
	}else if(strnegatif.substr(0,1)=="-") {
		negatif.value = "(" + formatnegatif(strnegatif.substr(1,strnegatif.length-1)) + ")";
	}else{
		negatif.value = formatnegatif(this.value);
	}
  });

  /* Fungsi formatnegatif */
  function formatnegatif(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    negatif     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      negatif += separator + ribuan.join('.');
    }

    negatif = split[1] != undefined ? negatif + ',' + split[1] : negatif;
    return prefix == undefined ? negatif : (negatif ? + negatif : '');
  }

  var negatif2 = document.getElementById('negatif2');
  negatif2.addEventListener('mousemove', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnegatif2() untuk mengubah angka yang di ketik menjadi format angka
	var strnegatif2 =negatif2.value;
	if (strnegatif2.substr(0,1)=="(" && strnegatif2.substr(strnegatif2.length-1,1)==")"){
		negatif2.value = "(" + formatnegatif2(strnegatif2.substr(1,strnegatif2.length-2)) + ")";
	}else if(strnegatif2.substr(0,1)=="-") {
		negatif2.value = "(" + formatnegatif2(strnegatif2.substr(1,strnegatif2.length-1)) + ")";
	}else{
		negatif2.value = formatnegatif2(this.value);
	}						 
  });

  /* Fungsi formatnegatif2 */
  function formatnegatif2(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    negatif2     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      negatif2 += separator + ribuan.join('.');
    }

    negatif2 = split[1] != undefined ? negatif2 + ',' + split[1] : negatif2;
    return prefix == undefined ? negatif2 : (negatif2 ? + negatif2 : '');
  }

  var negatif3 = document.getElementById('negatif3');
  negatif3.addEventListener('mousemove', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnegatif3() untuk mengubah angka yang di ketik menjadi format angka
	var strnegatif3 =negatif3.value;
	if (strnegatif3.substr(0,1)=="(" && strnegatif3.substr(strnegatif3.length-1,1)==")"){
		negatif3.value = "(" + formatnegatif3(strnegatif3.substr(1,strnegatif3.length-2)) + ")";
	}else if(strnegatif3.substr(0,1)=="-") {
		negatif3.value = "(" + formatnegatif3(strnegatif3.substr(1,strnegatif3.length-1)) + ")";
	}else{
		negatif3.value = formatnegatif3(this.value);
	}
  });

  /* Fungsi formatnegatif3 */
  function formatnegatif3(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    negatif3     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
      separator = sisa ? '.' : '';
      negatif3 += separator + ribuan.join('.');
    }

    negatif3 = split[1] != undefined ? negatif3 + ',' + split[1] : negatif3;
    return prefix == undefined ? negatif3 : (negatif3 ? + negatif3 : '');
  }

</script>

<script type="text/javascript">

var save_method; 
var url;
function saveapf() {

url="<?php echo base_url('Dashboard/edit_pay')?>"

  $.ajax({
    url : url,
    type : "POST",
    data: $("#form_edit").serialize(),
    dataType: "JSON",
    success: function(data){ // Ketika proses pengiriman berhasil          
    alert('Data Berhasil Di Simpan!');   
    // save_method="edit";
    // $("#id_payment").val(data);
    //window.location = link;
    window.location ="<?php echo base_url('Dashboard/my_task');?>";
  },      
    error: function (data)
    {
    console.log(data);
    alert('Error adding / update data');
    }
  });
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