<style>
td[rowspan="6"] {
  vertical-align: top;
  text-align: left;
}
</style>

      <!-- Content Wrapper. Contains page content -->
      <?php foreach ($ppayment as $get) { ?>  
      
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <a class="btn btn-warning" onclick="window.open('Dashboard/report2/<?php echo $get->id_payment; ?>', 'newwindow', 'width=640,height=720'); return false;"> Form SP3</a>
            <button type="button" id="btn_tax" class="btn btn-success" onclick="myPopup('Dashboard/form_info_tax/<?php echo $get->id_payment; ?>', 1050, 550);">View Tax</button>
          </h1>
        </section>
        <!-- Main content -->
        <!-- <form id="form" method="post" action="Dashboard/updpay" onsubmit="update()"> -->
            <input type="hidden" name="id" class="form-control" value="<?php echo $get->id?>">  

          <input type="hidden" name="display_name" class="form-control" value="<?php echo $get->display_name; ?>">
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
                        <td <b><font size="+2" style="font-family: calibri;">FORMULIR PERMINTAAN PEMBAYARAN <br> <i> PAYMENT REQUEST FORM (PRF)</i></font></b>                                  
                        <td><img src="assets/dashboard/images/logo.png" alt="Logo Images"></td>
                        </tr>
                      </tbody>
                    </table>
                    
                    <br>

                    <table style="font-family: calibri;" width="100%">
                      <tbody>     
                        <tr>
                          <td><font size="+1" style="font-family: calibri;">Tanggal : </td>
                          <td><input type="text" name="tanggal" class="form-control" value="<?php echo $get->tanggal; ?>" readonly></td>
                          <td> &nbsp;</td>
                          <td><font size="+1" style="font-family: calibri;">PRF Doc. No : </font></td>
                          <td><input type="text" name="apf_doc" class="form-control" value="<?php echo $get->apf_doc; ?>" readonly></td>
                        </tr>
                        <tr>
                          <td><font size="+1" style="font-family: calibri;">Direktorat/<br>Divisi Pemohon :<font></td>
                          <td><input type="text" name="division_id" class="form-control" value="<?php echo $get->division_id; ?>" readonly></td>
                          <td> &nbsp;</td>
                          <td><font size="+1" style="font-family: calibri;">SPPP Doc. No : </font></td>
                          <td><input type="text" name="nomor_surat" class="form-control" value="<?php echo $get->nomor_surat; ?>" readonly></td>
                        </tr>
                        <tr>
                          <td><font size="+1">PR Doc. No : </font></td> 
                          <td><input type="text" name="pr_doc" class="form-control" value="<?php echo $get->pr_doc; ?>" readonly></td>
                          <td> &nbsp;</td>
                          <td><font size="+1" style="font-family: calibri;">Kode Proyek : <br> <i>Project Code</i><font></td>
                          <td><input type="text" name="kode_proyek" class="form-control" value="<?php echo $get->kode_proyek; ?>" readonly></td>
                        </tr>
                      </tbody>
                    </table>

                    <br>

                    <table border="1" style="font-family: calibri;" width="100%">
                      <thead>
                        <tr>
                          <th width="5%"><center>NO. <br> <i>No.</i></center></th>
                          <th height="40%" colspan="2"><center>Uraian atas tujuan penggunaan / <br><i>Description on the purpose</i></center></th>
                          <th width="5%"><center>Mata Uang / <br> <i>Original Currency</i></center></th>
                          <th width="35%"><center>Jumlah / <br><i>Amount</i></center></th>                       
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><center> 1 </center></td>
                          <td colspan="2"><textarea type="text" class="form-control" name="description" readonly><?php echo $get->description;?></textarea></td>                  
                          <td><center><?php echo $get->currency;?></center> </td>
                          <td><input id="nilai"style="text-align:right" onchange="nominal()" type="text" class="form-control" name="jumlah" value="<?php echo $get->jumlah;?>" readonly></td>
                        </tr>
                        <tr>
                          <td><center> 2 </center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description2" value="<?php echo $get->description2;?>" readonly></td>
                          <td><center><?php echo $get->currency1;?></center> </td>
                          <td><input id="nilai1" style="text-align:right" onchange="nominal()" type="text" class="form-control" name="jumlah2" value="<?php echo $get->jumlah2;?>" readonly></td> 
                        </tr>
                        <tr>
                          <td><center> 3 </center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description3" value="<?php echo $get->description3;?>" readonly></td>
                          <td><center><?php echo $get->currency2;?> </center> </td>
                          <td><input id="nilai2" style="text-align:right" onchange="nominal()" type="text" class="form-control" name="jumlah3" value="<?php echo $get->jumlah3;?>" readonly></td> 
                        </tr>
                        <tr>
                          <td><center>4</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description4" value="<?php echo $get->description4;?>" readonly></td>
                          <td><center>  <?php echo $get->currency3;?></center> </td>
                          <td><input id="nilai3" style="text-align:right" onchange="nominal()" type="text" class="form-control" name="jumlah4" value="<?php echo $get->jumlah4;?>" readonly> </td>
                        </tr>
                        <tr>
                          <td><center>5</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description5" value="<?php echo $get->description5;?>" readonly></td>
                          <td><center>  <?php echo $get->currency4;?></center> </td>
                          <td><input id="nilai4" style="text-align:right" onchange="nominal()" type="text" class="form-control" name="jumlah5" value="<?php echo $get->jumlah5;?>" readonly> </td> 
                        </tr>
                        <tr>
                          <td><center>6</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description6" value="<?php echo $get->description6;?>" readonly></td>
                          <td><center>  <?php echo $get->currency5;?></center></td>
                          <td><input id="nilai5" style="text-align:right" onchange="nominal()" type="text" class="form-control" name="jumlah6" value="<?php echo $get->jumlah6;?>" readonly></td> 
                        </tr>
                        
                        <tr>
                          <td><center>7</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description7" value="<?php echo $get->description7;?>" readonly></td>
                          <td><center>  <?php echo $get->currency6;?></center></td>
                          <td><input id="nilai6" style="text-align:right" onchange="nominal()" type="text" class="form-control" name="jumlah7" value="<?php echo $get->jumlah7;?>" readonly>  </td> 
                        </tr>
                        <tr>
                          <td><center>8</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description8" value="<?php echo $get->description8;?>" readonly></td>
                          <td><center>  <?php echo $get->currency7;?></center></td>
                          <td><input id="nilai7" style="text-align:right" onchange="nominal()" type="text" class="form-control" name="jumlah8" value="<?php echo $get->jumlah8;?>" readonly ></td> 
                        </tr>
                        <tr>
                          <td><center>9</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description9" value="<?php echo $get->description9;?>" readonly></td>
                          <td><center>  <?php echo $get->currency8;?></center></td>
                          <td><input id="nilai8" style="text-align:right" onchange="nominal()" type="text" class="form-control" name="jumlah9" value="<?php echo $get->jumlah9;?>" readonly></td> 
                        </tr>
                        <tr>
                          <td><center>10</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description10" value="<?php echo $get->description10;?>" readonly></td>
                          <td><center>  <?php echo $get->currency9;?></center></td>
                          <td><input id="nilai9" style="text-align:right" onchange="nominal()" type="text" class="form-control" name="jumlah10" value="<?php echo $get->jumlah10;?>" readonly></td> 
                        </tr>
                        <tr>
                          <td><center>11</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description11" value="<?php echo $get->description11;?>" readonly></td>
                          <td><center>  <?php echo $get->currency10;?></center></td>
                          <td><input id="nilai10" style="text-align:right" onchange="nominal()" type="text" class="form-control" name="jumlah11" value="<?php echo $get->jumlah11;?>" readonly></td> 
                        </tr>
                        <tr>
                          <td><center>12</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description12" value="<?php echo $get->description12;?>" readonly></td>
                          <td><center>  <?php echo $get->currency11;?></center></td>
                          <td><input id="nilai11" style="text-align:right" onchange="nominal()" type="text" class="form-control" name="jumlah12" value="<?php echo $get->jumlah12;?>" readonly></td> 
                        </tr>

                        <tr>
                          <td colspan="3" align="right"> Jumlah Pembayaran/<i>Total Payment</i> </td>
                          <td><input style="text-align:center" class="form-control" value="<?php echo $get->currency;?>" readonly> 
                              <input style="text-align:center" class="form-control" value="<?php echo $get->currency4;?>" readonly> 
                              <input style="text-align:center" class="form-control" value="<?php echo $get->currency8;?>" readonly> 
                          </td>
                          <td><input id="ulang" style="text-align:right" type="text" class="form-control" name="total_expenses" value="<?php echo $get->total_expenses;?>" readonly>
                              <input id="ulang1" style="text-align:right" type="text" class="form-control" name="total_expenses2" value="<?php echo $get->total_expenses2;?>" readonly>
                              <input id="ulang2" style="text-align:right" type="text" class="form-control" name="total_expenses3" value="<?php echo $get->total_expenses3;?>" readonly> 
                          </td>
                        </tr>
                        <tr> 
                          <td>Terbilang/ <i>Say :</i> </td>
                          <td colspan="4"><input type="text" name="terbilang" class="form-control" value="<?php echo $get->terbilang;?>" readonly>
                                          <input type="text" name="terbilang2" class="form-control" value="<?php echo $get->terbilang2;?>" readonly>
                                          <input type="text" name="terbilang3" class="form-control" value="<?php echo $get->terbilang3;?>" readonly>
                          </td>
                        </tr>
                        <tr> 
                          <td>Dibayar Kepada/ <i>Paid To :</i> </td>
                          <td colspan="4"><input type="text" name="dibayar_kepada" class="form-control" value="<?php echo $get->dibayar_kepada; ?>" readonly></td>
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
                        <td width="5%" align="center"> <input type="checkbox" name="status" value="7" <?php echo $get->status==7? 'checked':''?> disabled></td>
                        <td width="20%">Tanggal &nbsp;</td>
                        <td colspan="2" rowspan="2"><input type="text" name="verified_date" class="form-control" value="<?php echo $get->verified_date;?>" readonly></td>     
                      </tr>
                      <tr align="right">
                        <td width="5%" align="center"> <input type="checkbox" name="status" value="8" <?php echo $get->status==8? 'checked':''?> disabled></td>
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
                          <td colspan="6"><center><b>Persetujuan Pembayaran </b></center></td>
                        </tr>
                        <tr>
                          <td colspan="2"> <br> <br> <br> <br> <br> <br></td>
                          <td colspan="2"> <br> <br> <br> <br> <br> <br></td>
                          <td colspan="2"> <br> <br> <br> <br> <br> <br></td>
                        </tr>
                        <tr>
                          <td width="10%">Nama/ <i>Name</i> </td>
                          <td><input type="text" name="persetujuan_pembayaran1" class="form-control" value="<?php echo $get->persetujuan_pembayaran1;?>" readonly> </td>
                          <td width="10%">Nama/ <i>Name</i> </td>
                          <td><input type="text" name="persetujuan_pembayaran2" class="form-control" value="<?php echo $get->persetujuan_pembayaran2;?>" readonly> </td>
                          <td width="10%">Nama/ <i>Name</i> </td>
                          <td><input type="text" name="persetujuan_pembayaran3" class="form-control" value="<?php echo $get->persetujuan_pembayaran3;?>" readonly> </td>
                        </tr>
                        <tr>
                          <td>Jabatan/ <i>Title</i> </td>
                          <td><input type="text" name="jabatan1" class="form-control" value="<?php echo $get->jabatan1;?>" readonly> </td>
                          <td>Jabatan/ <i>Title</i> </td>
                          <td><input type="text" name="jabatan2" class="form-control" value="<?php echo $get->jabatan2;?>" readonly> </td>
                          <td>Jabatan/ <i>Title</i> </td>
                          <td><input type="text" name="jabatan3" class="form-control" value="<?php echo $get->jabatan3;?>" readonly> </td>
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
                          <td colspan="4"><font size="+1"> Metode Pembayaran : <input type="checkbox" name="metode_pembayaran" value="Tunai" <?php echo $get->metode_pembayaran=="Tunai"? 'checked':''?> disabled> Tunai</input></font></td>
                        </tr>
                        <tr>
                          <td width="26%" colspan="2"><center> <input type="checkbox" name="metode_pembayaran" value="Transfer" <?php echo $get->metode_pembayaran=="Transfer"? 'checked':''?> disabled> Transfer Ke :</input> </center></td>

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
                          <td colspan="4" rowspan="6">Catatan : <br><i>Remarks :</i> <textarea type="text" class="form-control" rows="3" name="label2" placeholder="Remarks" readonly></textarea></td>                          
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
                          <td>Nama/ <i>Name</i> </td>
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
                    <!-- <a href="Dashboard/report_prf/<?php echo $get->id_payment; ?>" target="_blank" role="button" class="btn btn-danger">Print</a> -->

                    <?php if($get->status == 5 && $get->rejected_by != NULL && $this->session->userdata("username") == "n.prasetyaningrum"){ ?>
                        <?php if ($get->currency4 == "" && $get->currency8 == "") { ?>                                  
                          <a href="Dashboard/form_eprf/<?php echo $get->id_payment; ?>"><button class="btn btn-primary">Edit</button></a>
                        <?php } else if ($get->currency4 != "" || $get->currency8 != ""){ ?>
                          <a href="Dashboard/form_eprf2/<?php echo $get->id_payment; ?>"><button class="btn btn-primary">Edit</button></a> 
                        <?php } ?>
                        <button type="submit" data-toggle="modal" data-target="#accept<?php echo $get->id; ?>" class="btn btn-success">Send Back To Reviewer</button>
                        <!---Modal Accept--->
                        <div class="modal fade" id="accept<?php echo $get->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content"> 
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title">Message Box</h3>
                              </div>                                       
                              <div class="modal-body">
                              <form id="processed" method="post" action="dashboard/send_back">
                                <input type="hidden" name="nomor_surat" value="<?php echo $get->nomor_surat; ?>">
                                <input type="hidden" name="id" value="<?php echo $get->id; ?>">
                                <input type="hidden" name="status" value="6">
                                <p align="justify">Apa Anda yakin akan mengirim kembali Form APF ini : <?=$get->apf_doc?> ?</p>
                                <label>Kepada CSF Reviewer:</label>    
                                <input type="hidden" name="handled_by" value="i.akmal">                    
                                <input type="hidden" name="nomor_surat" value="<?php echo $get->nomor_surat; ?>">
                                <input type="hidden" name="id" value="<?php echo $get->id; ?>">
                                <input type="hidden" name="status" value="6">
                              </div>
                              <div class="modal-footer">                        
                                  <button type="submit" class="btn btn-success bye">Yes</button>
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </form>
                              </div>
                            </div>
                          </div>
                        </div>

                        <button type="button" data-toggle="modal" data-target="#rejecttax<?php echo $get->id_payment; ?>" class="btn btn-danger">Returned To Tax</button>
                        <!-- Rejected To Tax -->
                        <div class="modal fade" id="rejecttax<?php echo $get->id_payment; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title">Message Box</h3>
                              </div>
                              <div class="modal-body">
                              <form id="rejectedtax" method="post" action="dashboard/rejectedtax">
                                <input type="hidden" name="id_payment" value="<?php echo $get->id_payment; ?>">
                                <p align="justify">Apakah anda yakin akan mengembalikan Form SP3 ini : <?=$get->nomor_surat?> ke Bagian Tax?</p>
                                <label>Notes :</label>                
                                <textarea type="text" class="form-control" name="note" required></textarea>
                                <input type="hidden" name="handled_by" value="a.ester">
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
                   
                    <?php if($get->status == 6 && $this->session->userdata("username") == "i.akmal"){ ?>  
                      <?php if ($get->currency4 == "" && $get->currency8 == "") { ?>                                  
                          <a href="Dashboard/form_eprf/<?php echo $get->id_payment; ?>"><button class="btn btn-primary">Edit</button></a>
                        <?php } else if ($get->currency4 != "" || $get->currency8 != ""){ ?>
                          <a href="Dashboard/form_eprf2/<?php echo $get->id_payment; ?>"><button class="btn btn-primary">Edit</button></a> 
                        <?php } ?>
                      <button type="submit" data-toggle="modal" data-target="#accept<?php echo $get->id; ?>" class="btn btn-success">Proceed For Verification</button>
                      <!---Modal Accept--->
                      <div class="modal fade" id="accept<?php echo $get->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                          <div class="modal-content">     
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h3 class="modal-title">Message Box</h3>
                            </div>                                   
                            <div class="modal-body">
                            <form id="processed" method="post" action="dashboard/updpay">
                              <input type="hidden" name="nomor_surat" value="<?php echo $get->nomor_surat; ?>">
                              <input type="hidden" name="id" value="<?php echo $get->id; ?>">
                              <input type="hidden" name="status" value="7">
                              <p align="justify">Apa Anda yakin akan mengirim Form APF ini : <?=$get->apf_doc?></p>
                              <label>Kepada CSF Verificator:</label>    
                              <input type="hidden" name="handled_by" value="h.harlina"> 
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
                      
                      <button type="submit" data-toggle="modal" data-target="#rejectreq<?php echo $get->id; ?>" class="btn btn-danger">Rejected to Requestor</button>
                      <!---Modal RejectRequestor-->
                      <div class="modal fade" id="rejectreq<?php echo $get->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h3 class="modal-title">Message Box</h3>
                            </div>
                            <div class="modal-body">
                            <form id="rejected" method="post" action="dashboard/rejectreq">
                            <?php foreach ($ppayment as $get){ ?>
                              <input type="hidden" name="id" value="<?php echo $get->id; ?>">
                              <input type="hidden" name="status" value="3">
                              <p align="justify">Apa Anda yakin akan me-rejected Form APF kepada Requestor : <?=$get->nomor_surat?></p>
                              <label>Notes :</label>                
                              <textarea type="text" class="form-control" name="note" required></textarea>
                              <input type="hidden" name="nomor_surat" value="<?php echo $get->nomor_surat;?>">
                              <input type="hidden" name="rejected_date" value="<?php echo date('d-M-Y'); ?>">
                              <input type="hidden" name="rejected_by" value="<?php echo $this->session->userdata("display_name"); ?>">
                            <?php } ?>
                            </div>
                            <div class="modal-footer">                        
                              <button type="submit" class="btn btn-success bye">Yes</button>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </form>
                            </div>
                          </div>
                        </div>
                      </div> 

                      <button type="submit" data-toggle="modal" data-target="#reject<?php echo $get->id; ?>" class="btn btn-danger">Returned to Finance</button>
                      <!---Modal RejectedFinance--> 
                      <div class="modal fade" id="reject<?php echo $get->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h3 class="modal-title">Message Box</h3>
                            </div>
                            <div class="modal-body">
                            <form id="rejected2" method="post" action="dashboard/rejectapf">
                            <?php foreach ($ppayment as $get){ ?>
                              <input type="hidden" name="id" value="<?php echo $get->id; ?>">
                              <input type="hidden" name="status" value="5">
                              <p align="justify">Apa Anda yakin akan mengembalikan Form APF ini : <?=$get->apf_doc?></p>
                              <label>Kepada CSF Finance:</label>
                              <br>
                              <input type="hidden" name="handled_by" value="n.prasetyaningrum">
                              <input type="hidden" name="nomor_surat" value="<?php echo $get->nomor_surat;?>">                            
                              <label>Notes :</label>                
                              <textarea type="text" class="form-control" name="note" required></textarea>
                              <input type="hidden" name="rejected_date" value="<?php echo date('d-M-Y'); ?>">
                              <input type="hidden" name="rejected_by" value="<?php echo $this->session->userdata("display_name"); ?>">
                            <?php } ?>
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

                    <?php if($get->status == 7 && $this->session->userdata("username") == "h.harlina"){ ?>  
                        <?php if ($get->currency4 == "" && $get->currency8 == "") { ?>                                  
                          <a href="Dashboard/form_eprf/<?php echo $get->id_payment; ?>"><button class="btn btn-primary">Edit</button></a>
                        <?php } else if ($get->currency4 != "" || $get->currency8 != ""){ ?>
                          <a href="Dashboard/form_eprf2/<?php echo $get->id_payment; ?>"><button class="btn btn-primary">Edit</button></a> 
                        <?php } ?>
                    
                    <button type="submit" data-toggle="modal" data-target="#verificator<?php echo $get->id; ?>" class="btn btn-success">Proceed For Approval</button>
                    <!--Modal SendApproval-->
                    <div class="modal fade" id="verificator<?php echo $get->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content"> 
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title">Message Box</h3>
                          </div>                                       
                          <div class="modal-body">
                          <form id="processed1" method="post" action="dashboard/updpay">
                            <input type="hidden" name="id" value="<?php echo $get->id; ?>">
                            <input type="hidden" name="nomor_surat" value="<?php echo $get->nomor_surat; ?>">
                            <input type="hidden" name="status" value="8">
                            <input type="hidden" name="verified_date" value="<?php echo date('d-M-Y'); ?>">
                            <p align="justify">Apa Anda yakin akan menyetujui Form APF ini : <?=$get->apf_doc?></p>
                            <label>Kepada Approval? </label>                        
                          </div>
                          <div class="modal-footer">                        
                              <button type="submit" class="btn btn-success bye">Yes</button>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <button type="submit" data-toggle="modal" data-target="#rejectreq<?php echo $get->id; ?>" class="btn btn-danger">Rejected to Requestor</button>
                    <!---Modal RejectRequestor-->
                    <div class="modal fade" id="rejectreq<?php echo $get->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title">Message Box</h3>
                          </div>
                          <div class="modal-body">
                          <form id="rejected" method="post" action="dashboard/rejectreq">
                            <input type="hidden" name="id" value="<?php echo $get->id; ?>">
                            <input type="hidden" name="status" value="3">
                            <p align="justify">Apa Anda yakin akan me-rejected Form APF kepada Requestor : <?=$get->nomor_surat?></p>
                            <label>Notes :</label>                
                            <textarea type="text" class="form-control" name="note" required></textarea>
                            <input type="hidden" name="nomor_surat" value="<?php echo $get->nomor_surat;?>">
                            <input type="hidden" name="rejected_date" value="<?php echo date('d-M-Y'); ?>">
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

                    <button type="submit" data-toggle="modal" data-target="#reject<?php echo $get->id; ?>" class="btn btn-danger">Returned to Finance</button>
                    <!---Modal RejectedFinance--> 
                    <div class="modal fade" id="reject<?php echo $get->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title">Message Box</h3>
                          </div>
                          <div class="modal-body">
                          <form id="rejected2" method="post" action="dashboard/rejectapf">
                            <input type="hidden" name="id" value="<?php echo $get->id; ?>">
                            <input type="hidden" name="status" value="5">
                            <p align="justify">Apa Anda yakin akan mengembalikan Form APF ini : <?=$get->apf_doc?></p>
                            <label>Kepada CSF Finance:</label>                        
                            <input type="hidden" name="handled_by" value="n.prasetyaningrum">
                            <input type="hidden" name="nomor_surat" value="<?php echo $get->nomor_surat;?>">
                            <!-- <select class="form-control" name="handled_by">
                              <option>--- Choose ---</option>
                            <?php foreach ($csf as $get) {?>
                              <option value="<?php echo $get->username; ?>"><?php echo $get->username; ?></option>
                            <?php } ?>
                            </select> -->
                            <label>Notes :</label>                
                            <textarea type="text" class="form-control" name="note" required></textarea>
                            <input type="hidden" name="rejected_date" value="<?php echo date('d-M-Y'); ?>">
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
                  </div>
                </div>   
                                                                
            </div>
          </section>    
          <?php } ?>
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

<script>

function myPopup(myURL, myWidth, myHeight) {
            var left = (screen.width - myWidth) / 2;
            var top = (screen.height - myHeight) / 4;
            var myWindow = window.open(myURL, '_blank','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + myWidth + ', height=' + myHeight + ', top=' + top + ', left=' + left);
}

function update() {
  alert("Data Successfully to Update!");
}

function myFunction(){
  var x = document.getElementById("Select").value;

  document.getElementById("demo").innerHTML = x;
}

function nominal(){
  var x = document.getElementById("nilai").value;

  document.getElementById("ulang").innerHTML = x;
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