<style>
td[rowspan="3"] {
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
                        <td <b><font size="+2" style="font-family: calibri;">FORMULIR PENERIMAAN KAS <br> <i> CASH RECEIVED FORM (PRF)</i></font></b>                                  
                        <td><img src="assets/dashboard/images/logo.png" alt="Logo Images"></td>
                        </tr>
                      </tbody>
                    </table>
                    
                    <br>

                    <table style="font-family: calibri;" width="100%">
                      <tbody>     
                        <tr>
                          <td><font size="+1" >Tanggal : </td>
                          <td><input type="text" name="tanggal" class="form-control" value="<?php echo $get->tanggal; ?>" readonly> </td>
                          <td> &nbsp;</td>
                          <td><font size="+1" >ARF Doc. No : </font></td>
                          <td><input type="text" name="crf_doc" class="form-control" value="<?php echo $get->apf_doc; ?>"></td>
                        </tr>
                        <tr>
                          <td><font size="+1" >Dir/Sub/Div :<br><i>Dir/Sub/Div </i><font></td>
                          <td><input type="text" name="division_id" class="form-control" value="<?php echo $get->division_id; ?>"></td>
                          <td> &nbsp;</td>
                          <td><font size="+1" >Kode Proyek : <br> <i>Project Code</i><font></td>
                          <td><input type="text" name="kode_proyek" class="form-control" value="<?php echo $get->kode_proyek; ?>"></td>
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
                          <th height="50%"><center>Uraian atas tujuan penggunaan / <br><i>Description on the purpose</i></center></th>
                          <th width="5%"><center>Mata Uang / <br> <i>Original Currency</i></center></th>
                          <th width="25%"><center>Jumlah / <br><i>Amount</i></center></th>                       
                        </tr>
                        </thead>
                        <tbody>                      
                        <tr>
                          <tr>
                          <td><center> 1 </center></td>
                          <td><textarea type="text" class="form-control" name="description" readonly ><?php echo $get->description;?></textarea>
                              <textarea type="text" class="form-control" name="description2" readonly ><?php echo $get->description2;?></textarea>
                              <textarea type="text" class="form-control" name="description3" readonly ><?php echo $get->description3;?></textarea>
                          </td>                  
                          <td><center><?php echo $get->currency;?>
                              <br>
                              <?php echo $get->currency1;?>
                              <br>
                              <?php echo $get->currency2;?></center>  
                          </td>
                          <td><input id="nilai" onchange="nominal()" type="text" class="form-control" name="jumlah" value="<?php echo $get->jumlah;?>" readonly> 
                              <input id="nilai1" onchange="nominal()" type="text" class="form-control" name="jumlah1" value="<?php echo $get->jumlah1;?>" readonly>
                              <input id="nilai2" onchange="nominal()" type="text" class="form-control" name="jumlah2" value="<?php echo $get->jumlah2;?>" readonly>

                          </td>
                        </tr>
                        <tr>
                          <td colspan="2" align="right"> Jumlah Pembayaran/<i>Total Payment</i> </td>
                          <td><center><?php echo $get->currency;?>  <?php echo $get->currency1;?> <?php echo $get->currency2;?> </center></td>
                          <td><input id="nilai1" onchange="nominal()" type="text" class="form-control" name="total_expenses" value="<?php echo $get->total_expenses;?>" readonly> </td>
                        </tr>
                        <tr> 
                          <td>Terbilang/ <i>Say :</i> </td>
                          <td colspan="3"><input type="text" name="terbilang" class="form-control" value="<?php echo $get->terbilang;?>" readonly></td>
                        </tr>
                        <tr> 
                          <td>Dibayar Kepada/ <i>Paid To :</i> </td>
                          <td colspan="3"><input type="text" name="dibayar_kepada" class="form-control" value="<?php echo $get->dibayar_kepada;?>"readonly></td>
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
                        <td width="5%"> </td>
                        <td width="20%">Tanggal &nbsp;</td>
                        <td colspan="2" rowspan="2"><input type="text" name="verified_date" class="form-control" value="<?php echo date("d-m-Y", strtotime($get->verified_date));?>" readonly></td>     
                      </tr>
                      <tr align="right">
                        <td width="5%"> </td>
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

                    <!---TREASURY--->
                    <table border="1" style="font-family: calibri;" width="100%">
                      <tbody>
                        <tr>
                          <td colspan="12"><center><b>Diisi oleh Divisi Treasury <br> <i>For Treasury Use Only </i> </b></center></td>
                        </tr>
                        <tr>
                          <td colspan="4" width="30%">Verifikasi Perintah Bayar oleh/<br><i>Payment Instruction Verified by : </i></td>
                          <td colspan="4" width="30%">Pelaksanaan Pembayaran oleh/<br><i>Payment Execution by : </i></td>
                          <td colspan="4" rowspan="3">Catatan : <br><i>Remarks :</i> <textarea type="text" class="form-control" name="label2" placeholder="Remarks"></textarea></td>                          
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
                          <td colspan="2" width="10%">No. Bilyet: </td>
                          <td colspan="2"> </td>
                        </tr>
                        <tr>
                          <td colspan="2" width="10%">Jabatan/ <i>Title</i> </td>
                          <td colspan="2"> </td>
                          <td colspan="2" width="10%">Jabatan/ <i>Title</i> </td>
                          <td colspan="2"> </td>
                          <td colspan="2" width="10%"><i>Check No.:</i> </td>
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

                    <img align="right" src="assets/dashboard/images/footer_form2.png" alt="Logo Images">    
                    
                    </div>  
                </div>
                     

                <div class="box">
                  <div class="box-header with-border">
                    <a class="btn btn-warning" href="Dashboard/my_task" role="button">Cancel</a>

                    <?php if($get->status == 8){ ?>                      
                    <a href="Dashboard/report_arf/<?php echo $get->id_payment; ?>" target="_blank" role="button" class="btn btn-primary">Print</a>
                    <?php } ?>

                    <?php if($get->status == 6){ ?>  
                      <a href="Dashboard/form_ecrf/<?php echo $get->id_payment; ?>" role="button" class="btn btn-primary">Edit</a>
                      <button type="submit" data-toggle="modal" data-target="#accept<?php echo $get->id; ?>" class="btn btn-success">Accept</button>
                      <!---Modal Accept--->
                      <div class="modal fade" id="accept<?php echo $get->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">                                        
                          <div class="modal-body">
                          <form id="processed" method="post" action="dashboard/updpay">
                            <input type="hidden" name="nomor_surat" value="<?php echo $get->nomor_surat; ?>">
                            <input type="hidden" name="id" value="<?php echo $get->id; ?>">
                            <input type="hidden" name="status" value="7">
                            <p align="justify">Apa kamu yakin akan mengirim Form APF ini : <?=$get->apf_doc?></p>
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
                      
                      <button type="submit" data-toggle="modal" data-target="#rejectreq<?php echo $get->id; ?>" class="btn btn-success">Rejected to Requestor</button>
                      <!---Modal RejectRequestor-->
                      <div class="modal fade" id="rejectreq<?php echo $get->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">

                          <div class="modal-body">
                          <form id="rejected" method="post" action="dashboard/rejected">
                            <input type="hidden" name="id" value="<?php echo $get->id; ?>">
                            <input type="hidden" name="status" value="3">
                            <p align="justify">Apa kamu yakin akan me-rejected Form Pengajuan kepada Requestor : <?=$get->nomor_surat?></p>
                            <label>Notes :</label>                
                            <textarea type="text" class="form-control" name="note"></textarea>
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

                      <button type="submit" data-toggle="modal" data-target="#reject<?php echo $get->id; ?>" class="btn btn-success">Returned to Finance</button>
                      <!---Modal RejectedFinance--> 
                      <div class="modal fade" id="reject<?php echo $get->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">

                          <div class="modal-body">
                          <form id="rejected2" method="post" action="dashboard/updpay">
                            <input type="hidden" name="id" value="<?php echo $get->id; ?>">
                            <input type="hidden" name="status" value="4">
                            <p align="justify">Apa kamu yakin akan me-rejected Form Pengajuan ini : <?=$get->nomor_surat?></p>
                            <label>Kepada CSF Finance:</label>
                            <input type="hidden" name="handled_by" value="n.prasetyaningrum">

                            <!-- <select class="form-control" name="handled_by">
                              <option>--- Choose ---</option>
                            <?php foreach ($csf as $get) {?>
                              <option value="<?php echo $get->username; ?>"><?php echo $get->username; ?></option>
                            <?php } ?>
                            </select> -->
                            <label>Notes :</label>                
                            <textarea type="text" class="form-control" name="note"></textarea>
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

                    <?php if($get->status == 7){ ?>  
                    <button type="submit" data-toggle="modal" data-target="#verificator<?php echo $get->id; ?>" class="btn btn-success">Submit</button>
                    <!--Modal SendApproval-->
                    <div class="modal fade" id="verificator<?php echo $get->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                      <div class="modal-content">                                        
                        <div class="modal-body">
                        <form id="processed1" method="post" action="dashboard/updpay">
                          <input type="hidden" name="id" value="<?php echo $get->id; ?>">
                          <input type="hidden" name="nomor_surat" value="<?php echo $get->nomor_surat; ?>">
                          <input type="hidden" name="status" value="8">
                          <p align="justify">Apa kamu yakin akan menyetujui Form APF ini : <?=$get->apf_doc?></p>
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

                    <button type="submit" data-toggle="modal" data-target="#rejectreq<?php echo $get->id; ?>" class="btn btn-success">Rejected to Requestor</button>
                    <!---Modal RejectRequestor-->
                    <div class="modal fade" id="rejectreq<?php echo $get->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                      <div class="modal-content">

                        <div class="modal-body">
                        <form id="rejected" method="post" action="dashboard/rejected">
                          <input type="hidden" name="id" value="<?php echo $get->id; ?>">
                          <input type="hidden" name="status" value="3">
                          <p align="justify">Apa kamu yakin akan me-rejected Form SPPP kepada Requestor : <?=$get->nomor_surat?></p>
                          <label>Notes :</label>                
                          <textarea type="text" class="form-control" name="note"></textarea>
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

                    <button type="submit" data-toggle="modal" data-target="#reject<?php echo $get->id; ?>" class="btn btn-success">Returned to Finance</button>
                    <!---Modal RejectedFinance--> 
                    <div class="modal fade" id="reject<?php echo $get->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                      <div class="modal-content">

                        <div class="modal-body">
                        <form id="rejected2" method="post" action="dashboard/updpay">
                          <input type="hidden" name="id" value="<?php echo $get->id; ?>">
                          <input type="hidden" name="status" value="4">
                          <p align="justify">Apa kamu yakin akan me-rejected Form APF ini : <?=$get->apf_doc?></p>
                          <label>Kepada CSF Finance:</label>                        
                          <input type="hidden" name="handled_by" value="n.prasetyaningrum">
                          <!-- <select class="form-control" name="handled_by">
                            <option>--- Choose ---</option>
                          <?php foreach ($csf as $get) {?>
                            <option value="<?php echo $get->username; ?>"><?php echo $get->username; ?></option>
                          <?php } ?>
                          </select> -->
                          <label>Notes :</label>                
                          <textarea type="text" class="form-control" name="note"></textarea>
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
  alert("Data Successfully to Update");
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