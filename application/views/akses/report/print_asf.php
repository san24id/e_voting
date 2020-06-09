<html>
<body onload="window.print()">
<style type="text/css">
@print {
    @page :footer {
        display: none
    }

    @page :header {
        display: none
    }
}
</style>
<style>
td[rowspan="6"] {
  vertical-align: top;
  text-align: left;
}
</style>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- <section class="content-header">
          <h1>
          FORMULIR PERMINTAAN PEMBAYARAN <br> <i> PAYMENT REQUEST FORM (PRF)</i>
            <small></small>
          </h1>
        </section> -->
        <!-- Main content -->
        
          <?php foreach ($ppayment as $get) { ?>  
            <input type="hidden" name="id" class="form-control" value="<?php echo $get->id?>">  

          <input type="hidden" name="display_name" class="form-control" value="<?php echo $this->session->userdata('display_name') ?>">
          <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <!-- /.box -->
                <div class="box">
                  <div class="box-header with-border">
                    
                    <table width="100%">
                      <tbody>
                        <tr>
                        <td> </td>
                        <td <b><font size="2">FORMULIR PERTANGGUNGJAWABAN <br> <i> ADVANCE SETTLEMENT FORM (ASF)</i></font></b>                                  
                        <td><img src="<?php echo base_url(); ?>assets/dashboard/images/logo.png" width="150px" alt="Logo Images"></td>

                        </tr>
                      </tbody>
                    </table>
                   
                    <table width="100%">
                      <tbody>     
                        <tr>
                          <td><font size="1">Tanggal : <br> <i>Date</i></td>
                          <td><font size="1"><?php echo $get->tanggal; ?> </td>
                          <td> &nbsp;</td>
                          <td><font size="1">ASF Doc. No : </font></td>
                          <td><font size="1"><?php echo $get->apf_doc; ?></td>
                        </tr>
                        <tr>
                          <td><font size="1">Direktorat/<br>Divisi Pemohon :<font></td>
                          <td><font size="1"><?php echo $get->division_id; ?></td>
                          <td> &nbsp;</td>
                          <td><font size="1">SPPP Doc. No : </font></td>
                          <td><font size="1"><?php echo $get->nomor_surat; ?></td>
                        </tr>
                        <tr>
                          <td><font size="1">Kode Proyek : <br> <i>Project Code</i><font></td>
                          <td><font size="1"><?php echo $get->kode_proyek; ?></td>
                          <td>&nbsp; </td>
                          <td><font size="1">ARF Doc. No : </font></td>
                          <td><font size="1"><?php echo $get->apf1_doc; ?></td>
                        </tr>
                        <tr>
                          <td><font size="1">PR Doc. No : </font></td>
                          <td><font size="1"><?php echo $get->pr_doc; ?></td>
                        </tr>
                      </tbody>
                    </table>
                                      
                    <table border="1" width="100%">
                        <thead>
                        <tr>
                          <th width="5%"><font size="1"><center>NO. <br> <i>No.</i></center></th>
                          <th height="40%" colspan="2"><font size="1"><center>Uraian atas tujuan penggunaan / <br><i>Description on the purpose</i></center></th>
                          <th width="7%"><font size="1"><center>Mata Uang / <br> <i>Original Currency</i></center></th>
                          <th width="33%"><font size="1"><center>Jumlah / <br><i>Amount</i></center></th>                       
                        </tr>
                        </thead>
                        <tbody>                      
                        <tr>
                          <td rowspan="3"><font size="1"><center> 1 </center></td>
                          <td colspan="2"><font size="1"><?php echo $get->description;?></td>                  
                          <td><center><font size="1"><?php echo $get->currency;?></center> </td>
                          <td><font size="1"><?php echo $get->jumlah;?></td>
                        </tr>
                        <tr>
                          <td colspan="2"><font size="1"><?php echo $get->description2;?></td>
                          <td><center><font size="1"><?php echo $get->currency1;?></center> </td>
                          <td><font size="1"><?php echo $get->jumlah2;?> </td> 
                        </tr>
                        <tr>
                          <td colspan="2"><font size="1"><?php echo $get->description3;?> </td>
                          <td><center><font size="1"><?php echo $get->currency2;?> </center> </td>
                          <td><font size="1"><?php echo $get->jumlah3;?> </td> 
                        </tr>
                        <tr>
                          <td><center><font size="1">2</center></td>
                          <td colspan="2"><font size="1"><?php echo $get->description4;?> </td>
                          <td><center><font size="1">  <?php echo $get->currency3;?></center> </td>
                          <td><font size="1"><?php echo $get->jumlah4;?> </td>
                        </tr>
                        <tr>
                          <td><center><font size="1">3</center></td>
                          <td colspan="2"><font size="1"><?php echo $get->description5;?> </td>
                          <td><center><font size="1">  <?php echo $get->currency4;?></center> </td>
                          <td><font size="1"><?php echo $get->jumlah5;?>  </td> 
                        </tr>
                        <tr>
                          <td><font size="1"><center>4</center></td>
                          <td colspan="2"><font size="1"><?php echo $get->description6;?> </td>
                          <td><center><font size="1">  <?php echo $get->currency5;?></center></td>
                          <td><font size="1"><?php echo $get->jumlah6;?> </td> 
                        </tr>
                        
                        <tr>
                          <td><center><font size="1">5</center></td>
                          <td colspan="2"><font size="1"><?php echo $get->description7;?> </td>
                          <td><center><font size="1">  <?php echo $get->currency6;?></center></td>
                          <td><font size="1"><?php echo $get->jumlah7;?>  </td> 
                        </tr>
                        <tr>
                          <td><center><font size="1">6</center></td>
                          <td colspan="2"><font size="1"><?php echo $get->description8;?> </td>
                          <td><center><font size="1">  <?php echo $get->currency7;?></center></td>
                          <td><font size="1"><?php echo $get->jumlah8;?></td> 
                        </tr>
                        <tr>
                          <td><center><font size="1">7</center></td>
                          <td colspan="2"><font size="1"><?php echo $get->description9;?> </td>
                          <td><center><font size="1">  <?php echo $get->currency8;?></center></td>
                          <td><font size="1"><?php echo $get->jumlah9;?> </td> 
                        </tr>
                        <tr>
                          <td><center><font size="1">8</center></td>
                          <td colspan="2"><font size="1"><?php echo $get->description10;?> </td>
                          <td><center><font size="1">  <?php echo $get->currency9;?></center></td>
                          <td><font size="1"><?php echo $get->jumlah10;?> </td> 
                        </tr>
                        <tr>
                          <td><font size="1"><center>9</center></td>
                          <td colspan="2"><font size="1"><?php echo $get->description11;?></td>
                          <td><font size="1"><center>  <?php echo $get->currency10;?></center></td>
                          <td><font size="1"><?php echo $get->jumlah11;?></td> 
                        </tr>
                        <tr>
                          <td><font size="1"><center>10</center></td>
                          <td colspan="2"><font size="1"><?php echo $get->description12;?></td>
                          <td><font size="1"><center>  <?php echo $get->currency11;?></center></td>
                          <td><font size="1"><?php echo $get->jumlah12;?></td> 
                        </tr>

                        <tr>
                          <td colspan="3" ><font size="1"> Jumlah Pembayaran/<i>Total Payment</i> </td>
                          <td><center>    </center></td>
                          <td><font size="1"><?php echo $get->currency;?>&nbsp;<?php echo $get->total_expenses;?> 
                              <font size="1"><?php echo $get->currency4;?>&nbsp;<?php echo $get->total_expenses2;?>
                              <font size="1"><?php echo $get->currency8;?>&nbsp;<?php echo $get->total_expenses3;?>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="3"><font size="1"> Jumlah Uang Muka/<i>Cash Advance</i> </td>
                          <td><center> </center></td>
                          <td><font size="1"><?php echo $get->currency;?>&nbsp;<?php echo $get->cash_advance; ?>
                              <font size="1"><?php echo $get->currency4;?>&nbsp;<?php echo $get->cash_advance2; ?>
                              <font size="1"><?php echo $get->currency8;?>&nbsp;<?php echo $get->cash_advance3; ?>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="3"><font size="1"> (Negatif) = Piutang/<i>Receivable</i> atau Positif = Hutang/<i>Payable</i> </td>
                          <td><center> </center></td>
                          <td><font size="1"><?php echo $get->currency;?>&nbsp;<?php echo $get->piutang; ?>  
                              <font size="1"><?php echo $get->currency4;?>&nbsp;<?php echo $get->piutang2; ?>
                              <font size="1"><?php echo $get->currency8;?>&nbsp;<?php echo $get->piutang3; ?>
                          </td>
                        </tr>
                        <tr> 
                          <td><font size="1">Terbilang/ <i>Say :</i> </td>
                          <td colspan="4"><font size="1"><?php echo $get->terbilang;?> &nbsp;
                                          <font size="1"><?php echo $get->terbilang2;?> &nbsp;
                                          <font size="1"><?php echo $get->terbilang3;?>
                          </td>
                        </tr>
                        <tr> 
                          <td><font size="1">Dibayar Kepada/ <i>Paid To :</i> </td>
                          <td colspan="4"><font size="1"><?php echo $get->dibayar_kepada;?></td>
                        </tr>
                        </tbody>
                    </table>

                    <table border="1" width="100%">
                      <tbody>
                      <tr> 
                        <td colspan="4" rowspan="2" width="50%"><font size="1"> &nbsp; Verifikasi Oleh / <br>&nbsp;<i>Verified By : </i> </td>                           
                        <td rowspan="4"><font size="1">&nbsp; Catatan / :<br>&nbsp;<i>Remarks  </i><?php echo $get->catatan;?></td>
                      </tr>
                      <tr>
                      </tr>
                      <tr align="right">
                        <td width="5%"> </td>
                        <td width="20%"><font size="1">Tanggal &nbsp;</td>
                        <td colspan="2" rowspan="2"><font size="1"><?php echo date("d-M-Y", strtotime($get->verified_date));?></td>     
                      </tr>
                      <tr align="right">
                        <td width="5%"> </td>
                        <td width="20%"><font size="1"><i>Date </i> &nbsp;</td>
                      </tr>
                      </tbody>
                    </table>  
                    <table border="1" width="50%">  
                      <tbody>
                        <tr>
                          <td><font size="1">Nama /<i>Name : </i></td>
                          <td><font size="1"> <?php echo $get->penanggung_jawab;?></td> 
                        </tr>
                        <tr>
                          <td><font size="1">Jabatan /<i>Title : </i></td>
                          <td><font size="1"><?php echo $get->jabatan;?></td> 
                        </tr>
                      </tbody>  
                    </table>       

                    <table border="1" width="100%">
                      <tbody>
                        <tr>
                          <td colspan="6"><font size="1"><center><b>Disetujui oleh <br> <i>Approved by :</i> </b></center></td>
                        </tr>
                        <tr>
                          <td colspan="2"> <br> <br>  </td>
                          <td colspan="2"> <br> <br> </td>
                          <td colspan="2"> <br> <br> </td>
                        </tr>
                        <tr>
                          <td width="10%"><font size="1">Nama/ <i>Name</i> </td>
                          <td width="10%"><font size="1"> <?php echo $get->persetujuan_pembayaran1;?> </td>
                          <td width="10%"><font size="1">Nama/ <i>Name</i> </td>
                          <td width="10%"><font size="1"> <?php echo $get->persetujuan_pembayaran2;?> </td>
                          <td width="10%"><font size="1">Nama/ <i>Name</i> </td>
                          <td width="10%"><font size="1"><?php echo $get->persetujuan_pembayaran3;?> </td>
                        </tr>
                        <tr>
                          <td><font size="1">Jabatan/ <i>Title</i> </td>
                          <td><font size="1"> <?php echo $get->jabatan1;?> </td>
                          <td><font size="1">Jabatan/ <i>Title</i> </td>
                          <td><font size="1"> <?php echo $get->jabatan2;?> </td>
                          <td><font size="1">Jabatan/ <i>Title</i> </td>
                          <td><font size="1"><?php echo $get->jabatan3;?> </td>
                        </tr> 
                      </tbody>
                    </table>

                    <!----TREASURY---->
                    <table border="1" width="100%">
                      <tbody>
                        <tr>
                          <td colspan="4"><font size="1"><center><b>Diisi oleh Divisi Treasury <br> <i>For Treasury Use Only </i> </b></center></td>
                        </tr>
                        <tr>
                          <td colspan="4"><font size="1"> Metode Pembayaran : <input type="checkbox" name="metode_pembayaran" value="Tunai" <?php echo $get->metode_pembayaran=="Tunai"? 'checked':''?> disabled> Tunai</input></font></td>
                        </tr>
                        <tr>
                          <td width="26%" colspan="2"><font size="1"><center> <input type="checkbox" name="metode_pembayaran" value="Transfer" <?php echo $get->metode_pembayaran=="Transfer"? 'checked':''?> disabled> Transfer Ke :</input> </center></td>
                          <!-- <input type="checkbox" name="label1" value="Akumulasi > Rp. 20 Juta" <?php echo $get->label1=="Akumulasi > Rp. 20 Juta"? 'checked':''?> disabled> <i>Akumulasi > Rp. 20 Juta</i></input><br> -->

                          <td><font size="1"> Bank : &nbsp;<?php echo $get->bank; ?> </font></td> 
                          <td><font size="1"> No. Rek : &nbsp;<?php echo $get->no_rek; ?></font></td>                        
                        </tr>
                      </tbody>
                    </table>

                    <table border="1" width="100%">
                      <tbody>
                        <tr>
                          <td colspan="4" width="30%"><font size="1">Verifikasi Perintah Bayar oleh/<br><i>Payment Instruction Verified by : </i></td>
                          <td colspan="4" width="30%"><font size="1">Pelaksanaan Pembayaran oleh/<br><i>Payment Execution by : </i></td>
                          <td colspan="4" rowspan="6"><font size="1">Catatan : <br><i>Remarks :</i> <?php echo $get->label2; ?></td>                          
                        </tr>
                        <tr>
                          <td colspan="4"><br><br> </td>
                          <td colspan="4"><br><br> </td>
                        </tr>
                        <tr>
                          <td colspan="2"> </td>
                          <td><font size="1"> Tanggal <br><i>Date</i></td>
                          <td width="15%"> </td>
                          <td colspan="2"> </td>
                          <td><font size="1"> Tanggal <br><i>Date</i></td>
                          <td width="15%"> </td>
                        </tr>
                        <tr>
                          <td colspan="2" width="10%"><font size="1">Nama/ <i>Name</i> </td>
                          <td colspan="2"><font size="1">&nbsp; Fitri Dwi Arianawati </td>
                          <td colspan="2" width="10%"><font size="1">Nama/ <i>Name</i> </td>
                          <td colspan="2"><font size="1">&nbsp; Dian Puspitasari </td>        
                        </tr>
                        <tr>
                          <td colspan="2" width="10%"><font size="1">Jabatan/ <i>Title</i> </td>
                          <td colspan="2"><font size="1">&nbsp; VP Treasury </td>
                          <td colspan="2" width="10%"><font size="1">Jabatan/ <i>Title</i> </td>
                          <td colspan="2"><font size="1">&nbsp; Cashier </td>
                        </tr>                        
                      </tbody> 
                    </table>

                    <table border="1" width="100%">
                      <tbody>
                        <tr>
                          <td colspan="2"><font size="1">Diterima Oleh/ : <br> <i>Received by :</i></td>
                        </tr>
                        <tr>
                          <td><font size="1">Nama/ <i>Name</i> </td>
                        <td> </td>		
                        </tr>
                        <tr>
                          <td width="10%"><font size="1">Tanggal/ <i>Date</i> </td>
                          <td> </td>	
                        </tr>
                      </tbody>
                    </table>

                    <img align="right" src="<?php echo base_url(); ?>assets/dashboard/images/footer_form.png" width="150px" alt="Logo Images">

                  </div>  
                </div>
                                                                
            </div>
          </section>    
        <?php } ?>
        
        <!-- /.content -->
      </div>

</body>
</html>      