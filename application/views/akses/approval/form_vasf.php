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
                          <td><input type="text" name="asf_doc" class="form-control" value="<?php echo $get->apf_doc; ?>" readonly></td>
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
                          <td><input type="text" name="arf_doc" class="form-control" value="<?php echo $get->apf1_doc; ?>" readonly></td>
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
                          <th width="7%"><center>Mata Uang / <br> <i>Original Currency</i></center></th>
                          <th width="33%"><center>Jumlah / <br><i>Amount</i></center></th>                       
                        </tr>
                      </thead>
                      <tbody>                      
                        <tr>
                          <td><center> 1 </center></td>
                          <td colspan="2"><textarea type="text" class="form-control" name="description" readonly><?php echo $get->description;?></textarea></td>                  
                          <td><center><?php echo $get->currency;?></center> </td>
                          <td><input id="nilai" onchange="nominal()" type="text" class="form-control" name="jumlah" value="<?php echo $get->jumlah;?>" readonly></td>
                        </tr>
                        <tr>
                          <td><center> 2 </center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description2" value="<?php echo $get->description2;?>" readonly></td>
                          <td><center><?php echo $get->currency1;?></center> </td>
                          <td><input id="nilai1" onchange="nominal()" type="text" class="form-control" name="jumlah2" value="<?php echo $get->jumlah2;?>" readonly></td> 
                        </tr>
                        <tr>
                          <td><center> 3 </center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description3" value="<?php echo $get->description3;?>" readonly></td>
                          <td><center><?php echo $get->currency2;?> </center> </td>
                          <td><input id="nilai2" onchange="nominal()" type="text" class="form-control" name="jumlah3" value="<?php echo $get->jumlah3;?>" readonly></td> 
                        </tr>
                        <tr>
                          <td><center>4</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description4" value="<?php echo $get->description4;?>" readonly></td>
                          <td><center>  <?php echo $get->currency3;?></center> </td>
                          <td><input id="nilai3" onchange="nominal()" type="text" class="form-control" name="jumlah4" value="<?php echo $get->jumlah4;?>" readonly> </td>
                        </tr>
                        <tr>
                          <td><center>5</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description5" value="<?php echo $get->description5;?>" readonly></td>
                          <td><center>  <?php echo $get->currency4;?></center> </td>
                          <td><input id="nilai4" onchange="nominal()" type="text" class="form-control" name="jumlah5" value="<?php echo $get->jumlah5;?>" readonly> </td> 
                        </tr>
                        <tr>
                          <td><center>6</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description6" value="<?php echo $get->description6;?>" readonly></td>
                          <td><center>  <?php echo $get->currency5;?></center></td>
                          <td><input id="nilai5" onchange="nominal()" type="text" class="form-control" name="jumlah6" value="<?php echo $get->jumlah6;?>" readonly></td> 
                        </tr>
                        
                        <tr>
                          <td><center>7</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description7" value="<?php echo $get->description7;?>" readonly></td>
                          <td><center>  <?php echo $get->currency6;?></center></td>
                          <td><input id="nilai6" onchange="nominal()" type="text" class="form-control" name="jumlah7" value="<?php echo $get->jumlah7;?>" readonly>  </td> 
                        </tr>
                        <tr>
                          <td><center>8</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description8" value="<?php echo $get->description8;?>" readonly></td>
                          <td><center>  <?php echo $get->currency7;?></center></td>
                          <td><input id="nilai7" onchange="nominal()" type="text" class="form-control" name="jumlah8" value="<?php echo $get->jumlah8;?>" readonly ></td> 
                        </tr>
                        <tr>
                          <td><center>9</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description9" value="<?php echo $get->description9;?>" readonly></td>
                          <td><center>  <?php echo $get->currency8;?></center></td>

                          <td><input id="nilai8" onchange="nominal()" type="text" class="form-control" name="jumlah9" value="<?php echo $get->jumlah9;?>" readonly></td> 
                        </tr>
                        <tr>
                          <td><center>10</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description10" value="<?php echo $get->description10;?>" readonly></td>
                          <td><center>  <?php echo $get->currency9;?></center></td>

                          <td><input id="nilai9" onchange="nominal()" type="text" class="form-control" name="jumlah10" value="<?php echo $get->jumlah10;?>" readonly></td> 
                        </tr>
                        <tr>
                          <td><center>11</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description11" value="<?php echo $get->description11;?>" readonly></td>
                          <td><center>  <?php echo $get->currency10;?></center></td>
                          <td><input id="nilai10" onchange="nominal()" type="text" class="form-control" name="jumlah11" value="<?php echo $get->jumlah11;?>" readonly></td> 
                        </tr>
                        <tr>
                          <td><center>12</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description12" value="<?php echo $get->description12;?>" readonly></td>
                          <td><center>  <?php echo $get->currency11;?></center></td>
                          <td><input id="nilai11" onchange="nominal()" type="text" class="form-control" name="jumlah12" value="<?php echo $get->jumlah12;?>" readonly></td> 
                        </tr>

                        <tr>
                          <td colspan="3" > Jumlah Pembayaran/<i>Total Payment</i> </td>
                          <td><center>    </center></td>
                          <td><?php echo $get->currency;?>&nbsp;<input id="ulang" type="text" name="total_expenses" value="<?php echo $get->total_expenses;?>" readonly> 
                              <?php echo $get->currency4;?>&nbsp;<input id="ulang2" type="text" name="total_expenses2" value="<?php echo $get->total_expenses2;?>" readonly>
                              <?php echo $get->currency8;?>&nbsp;<input id="ulang3" type="text" name="total_expenses3" value="<?php echo $get->total_expenses3;?>" readonly>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="3"> Jumlah Uang Muka/<i>Cash Advance</i> </td>
                          <td><center> </center></td>
                          <td><?php echo $get->currency;?>&nbsp;<input id="jumlah" onchange="nominal()" type="text" name="cash_advance" value="<?php echo $get->cash_advance; ?>" readonly> 
                              <?php echo $get->currency4;?>&nbsp;<input id="jumlah2" onchange="nominal()" type="text" name="cash_advance2" value="<?php echo $get->cash_advance2; ?>" readonly>
                              <?php echo $get->currency8;?>&nbsp;<input id="jumlah3" onchange="nominal()" type="text" name="cash_advance3" value="<?php echo $get->cash_advance3; ?>" readonly>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="3"> (Negatif) = Piutang/<i>Receivable</i> atau Positif = Hutang/<i>Payable</i> </td>
                          <td><center> </center></td>
                          <td><?php echo $get->currency;?>&nbsp;<input id="negatif" type="text" name="piutang" value="<?php echo $get->piutang; ?>" readonly> 
                              <?php echo $get->currency4;?>&nbsp;<input id="negatif2" type="text" name="piutang2" value="<?php echo $get->piutang2; ?>" readonly>
                              <?php echo $get->currency8;?>&nbsp;<input id="negatif3" type="text" name="piutang3" value="<?php echo $get->piutang3; ?>" readonly>
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
                        <td colspan="2" rowspan="2"><input type="text" name="verified_date" class="form-control" value="<?php echo date("d-M-Y", strtotime($get->verified_date));?>" readonly></td>     
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
                          <!-- <input type="checkbox" name="label1" value="Akumulasi > Rp. 20 Juta" <?php echo $get->label1=="Akumulasi > Rp. 20 Juta"? 'checked':''?> disabled> <i>Akumulasi > Rp. 20 Juta</i></input><br> -->

                          <td><font size="+1"> Bank : &nbsp;<input type="text" name="bank" value="<?php echo $get->bank; ?>" readonly> </input></font></td> 
                          <td><font size="+1"> No. Rek : &nbsp;<input type="text" name="no_rek" value="<?php echo $get->no_rek; ?>" readonly> </input></font></td>                        
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
                          <td colspan="2"> </td>
                          <td colspan="2" width="10%">Nama/ <i>Name</i> </td>
                          <td colspan="2"> </td>        
                        </tr>
                        <tr>
                          <td colspan="2" width="10%">Jabatan/ <i>Title</i> </td>
                          <td colspan="2"> </td>
                          <td colspan="2" width="10%">Jabatan/ <i>Title</i> </td>
                          <td colspan="2"> </td>
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
                    <a class="btn btn-warning" href="Approval/listApproval" role="button">Cancel</a>                   

                    <?php if ($row->status = 8){ ?>
                    <button type="submit" data-toggle="modal" data-target="#approved<?php echo $get->id; ?>" class="btn btn-success">Proceed For Payment - Approved</button>
                    <!--Modal SendApproval-->
                    <div class="modal fade" id="approved<?php echo $get->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                      <div class="modal-content">                                        
                        <div class="modal-body">
                        <form id="processed1" method="post" action="approval/approve">
                          <input type="hidden" name="id" value="<?php echo $get->id; ?>">
                          <input type="hidden" name="status" value="9">
                          <input type="hidden" name="nomor_surat" value="<?php echo $get->nomor_surat; ?>">
                          <input type="hidden" name="handled_by" value="<?php echo $this->session->userdata("display_name"); ?>">
                          <p align="justify">Apa anda yakin akan menyetujui Form APF ini : <?=$get->apf_doc?></p>
                          <label>Notes :</label>                
                          <p><b>Jika setuju, Form APF ini akan dilanjutkan ke Proses Pembayaran</b></p>                       
                        </div>
                        <div class="modal-footer">                        
                            <button type="submit" class="btn btn-success bye">Yes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </form>
                        </div>
                      </div>
                    </div>
                    </div>

                    <button type="submit" data-toggle="modal" data-target="#rejectreq<?php echo $get->id; ?>" class="btn btn-success">Rejected to Finance</button>
                    <!---Modal RejectRequestor-->
                    <div class="modal fade" id="rejectreq<?php echo $get->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                      <div class="modal-content">

                        <div class="modal-body">
                        <form id="rejected" method="post" action="approval/rejected">
                          <input type="hidden" name="id" value="<?php echo $get->id; ?>">
                          <input type="hidden" name="status" value="5">
                          <p align="justify">Apa anda yakin akan me-rejected Form APF kepada Finance : <?=$get->apf_doc?></p>
                          <label>Notes :</label>                
                          <textarea type="text" name="note" class="form-control" required></textarea>
                          <input type="hidden" name="handled_by" value="n.prasetyaningrum">
                          <input type="hidden" name="rejected_date" value="<?php echo date("d-M-Y");?>">
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

<div class="modal fade" id="accept<?php echo $get->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">                                        
      <div class="modal-body">
      <form id="processed" method="post" action="dashboard/updpay">
        <input type="hidden" name="id" value="<?php echo $get->id; ?>">
        <input type="hidden" name="status" value="7">
        <p align="justify">Apa kamu yakin akan mengirim Form Pengajuan ini : <?=$get->nomor_surat?></p>
        <label>Kepada CSF Verificator:</label>                        
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

<div class="modal fade" id="verificator<?php echo $get->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">                                        
      <div class="modal-body">
      <form id="processed1" method="post" action="dashboard/updpay">
        <input type="hidden" name="id" value="<?php echo $get->id; ?>">
        <input type="hidden" name="status" value="8">
        <p align="justify">Apa kamu yakin akan menyetujui Form Pengajuan ini : <?=$get->nomor_surat?></p>
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

<div class="modal fade" id="rejectreq<?php echo $get->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">

      <div class="modal-body">
      <form id="rejected" method="post" action="dashboard/rejected">
        <input type="hidden" name="id" value="<?php echo $get->id; ?>">
        <input type="hidden" name="id" value="3">
        <p align="justify">Apa kamu yakin akan me-rejected Form Pengajuan kepada Requestor : <?=$get->nomor_surat?></p>
        <label>Notes :</label>                
        <input type="text" name="note"></input>
        <input type="hidden" name="handled_by" value="<?php echo $this->session->userdata("display_name"); ?>">
      </div>
      <div class="modal-footer">                        
        <button type="submit" class="btn btn-success bye">Yes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="reject<?php echo $get->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">

      <div class="modal-body">
      <form id="rejected2" method="post" action="dashboard/updpay">
        <input type="hidden" name="id" value="<?php echo $get->id; ?>">
        <input type="hidden" name="id" value="4">
        <p align="justify">Apa kamu yakin akan me-rejected Form Pengajuan ini : <?=$get->nomor_surat?></p>
        <label>Kepada CSF Finance:</label>                        
        <select class="form-control" name="handled_by">
          <option>--- Choose ---</option>
        <?php foreach ($csf as $get) {?>
          <option value="<?php echo $get->username; ?>"><?php echo $get->username; ?></option>
        <?php } ?>
        </select>
        <label>Notes :</label>                
        <input type="text" name="note"></input>
        <input type="hidden" name="handled_by" value="<?php echo $this->session->userdata("display_name"); ?>">
      </div>
      <div class="modal-footer">                        
        <button type="submit" class="btn btn-success bye">Yes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </form>
      </div>
    </div>
  </div>
</div>


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