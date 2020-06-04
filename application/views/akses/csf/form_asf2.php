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
        <?php foreach ($payment as $row){ ?>          
        <!-- Main content -->
        <form id="form" method="post" action="Dashboard/addpay" onsubmit="tambah()">
          <input type="hidden" name="display_name" class="form-control" value="<?php echo $row->display_name;?>">
          <input type="hidden" name="type" class="form-control" value="3"> 
          <input type="hidden" name="id_payment" class="form-control" value="<?php echo $row->id_payment;?>"> 
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
                                $monthList = array(
                                  'Jan' => 'Jan',
                                  'Feb' => 'Feb',
                                  'Mar' => 'Mar',
                                  'Apr' => 'Apr',
                                  'May' => 'Mei',
                                  'Jun' => 'Jun',
                                  'Jul' => 'Jul',
                                  'Aug' => 'Ags',
                                  'Sep' => 'Sep',
                                  'Oct' => 'Okt',
                                  'Nov' => 'Nov',
                                  'Dec' => 'Des'                                    
                                );
                                  $bulan_ing = date('M');
                            ?>     
                        <tr>
                          <td><font size="+1" >Tanggal : </td>
                          <td><input type="text" name="tanggal" class="form-control" value="<?php echo $dayList[$hari_ing]; ?>, <?php echo date('d'); ?>-<?php echo $monthList[$bulan_ing]; ?>-<?php echo date('Y'); ?>" readonly> </td>
                          <td> &nbsp;</td>
                          <td><font size="+1">ASF Doc. No : </font></td>
                          <td><input type="text" name="apf_doc" class="form-control" value="<?php echo $asf_doc; ?>"></td>                          
                        </tr>
                        <tr>
                          <td><font size="+1">Direktorat/<br>Divisi Pemohon :<font></td>
                          <td><input type="text" name="division_id" class="form-control" value="<?php echo $row->division_id;?>"></td>
                          <td> &nbsp;</td>
                          <td><font size="+1">SPPP Doc. No : </font></td>
                          <td><input type="text" name="nomor_surat" class="form-control" value="<?php echo $row->nomor_surat;?>" readonly>
                              <!-- <select class="form-control" name="nomor_surat">
                                <option>--- Choose ---</option>
                              <?php foreach ($surat1 as $got) {?>
                                <option value="<?php echo $got->number1; ?>"><?php echo $got->number1; ?></option>
                              <?php } ?>
                              </select> -->
                          </td>
                        </tr>
                        <tr>
                          <td><font size="+1">Kode Proyek : <br> <i>Project Code</i><font></td>
                          <td><input type="text" name="kode_proyek" class="form-control" placeholder="Kode Proyek" ></td>
                          <td>&nbsp; </td>
                          <td><font size="+1">ARF Doc. No : </font></td>
                          <td><input type="text" name="apf1_doc" class="form-control" value="<?php echo $arf_doc; ?>"></td>
                        </tr>
                        <tr>
                          <td><font size="+1">PR Doc. No : </font></td>
                          <td><input type="text" name="pr_doc" class="form-control" value="PR - /PII/<?php echo date('m/y');?>"></td>
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
                          <th width="30%"><center>Jumlah / <br><i>Amount</i></center></th>                       
                        </tr>
                      </thead>
                      <tbody>                      
                      <tr>
                          <td rowspan="3"><center> 1 </center></td>
                          <td colspan="2"><textarea type="text" class="form-control" name="description" required><?php echo $row->label1;?></textarea></td>                  
                          <td><select id="Select" class="form-control" onchange="myFunction()" name="currency">
                                <option value="<?php echo $row->currency; ?>"><?php echo $row->currency; ?> </option>
                                <option value="">--Choose--</option>
                                <?php foreach ($currency as $get) {?>
                                <option value="<?php echo $get->curr; ?>"><?php echo $get->curr; ?></option>
                                <?php } ?>
                              </select>
                          </td>
                          <td><input id="nilai" onchange="nominal()" type="text" class="form-control" name="jumlah" value="<?php echo $row->label2;?>" required></td>
                        </tr>
                        <tr>
                          <td colspan="2"><input type="text" class="form-control" name="description2" ></td>
                          <td><select id="Select1" class="form-control" onchange="myFunction1()" name="currency1">
                                <option value="">--Choose--</option>
                                <?php foreach ($currency as $get) {?>
                                <option value="<?php echo $get->curr; ?>"><?php echo $get->curr; ?></option>
                                <?php } ?>
                              </select>
                          </td>
                          <td><input id="nilai1" onchange="nominal()" type="text" class="form-control" name="jumlah2"  ></td> 
                        </tr>
                        <tr>
                          <td colspan="2"><input type="text" class="form-control" name="description3" ></td>
                          <td><select id="Select2" class="form-control" onchange="myFunction2()" name="currency2">
                            <!-- <option value="<?php echo $row->currency3; ?>"> <?php echo $row->currency3; ?></option>                               -->
                            <option value="">--Choose--</option>
                            <?php foreach ($currency as $get) {?>
                            <option value="<?php echo $get->curr; ?>"><?php echo $get->curr; ?></option>
                            <?php } ?>
                            </select>
                          </td>
                          <td><input id="nilai2" onchange="nominal()" type="text" class="form-control" name="jumlah3" value="<?php echo $row->jumlah3;?>" ></td> 
                        </tr>
                        <tr>
                          <td><center>2</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description4" ></td>
                          <td><select id="Select3" class="form-control" onchange="myFunction3()" name="currency3">
                            <option value="">--Choose--</option>
                            <?php foreach ($currency as $get) {?>
                            <option value="<?php echo $get->curr; ?>"><?php echo $get->curr; ?></option>
                            <?php } ?>
                            </select>
                          </td>
                          <td><input id="nilai3" onchange="nominal()" type="text" class="form-control" name="jumlah4" > </td>
                        </tr>
                        <tr>
                          <td><center>3</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description5" ></td>
                          <td><select id="Select4" class="form-control" onchange="myFunction4()" name="currency4">
                            <option value="<?php echo $row->currency2; ?>"> <?php echo $row->currency2; ?></option>                         
                            <option value="">--Choose--</option>
                            <?php foreach ($currency as $get) {?>
                            <option value="<?php echo $get->curr; ?>"><?php echo $get->curr; ?></option>
                            <?php } ?>
                            </select>
                          </td>
                          <td><input id="nilai4" onchange="nominal()" type="text" class="form-control" name="jumlah5" value="<?php echo $row->jumlah2;?>"> </td> 
                        </tr>
                        <tr>
                          <td><center>4</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description6" ></td>
                          <td><select id="Select5" class="form-control" onchange="myFunction5()" name="currency5">
                            <!-- <option value="<?php echo $row->currency6; ?>"> <?php echo $row->currency6; ?></option>                               -->
                            <option value="">--Choose--</option>
                            <?php foreach ($currency as $get) {?>
                            <option value="<?php echo $get->curr; ?>"><?php echo $get->curr; ?></option>
                            <?php } ?>
                            </select>
                          </td>
                          <td><input id="nilai5" onchange="nominal()" type="text" class="form-control" name="jumlah6"></td> 
                        </tr>
                        
                        <tr>
                          <td><center>5</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description7" ></td>
                          <td><select id="Select6" class="form-control" onchange="myFunction6()" name="currency6">
                            <!-- <option value="<?php echo $row->currency6; ?>"> <?php echo $row->currency6; ?></option>                               -->
                            <option value="">--Choose--</option>
                            <?php foreach ($currency as $get) {?>
                            <option value="<?php echo $get->curr; ?>"><?php echo $get->curr; ?></option>
                            <?php } ?>
                            </select>
                          </td>
                          <td><input id="nilai6" onchange="nominal()" type="text" class="form-control" name="jumlah7">  </td> 
                        </tr>
                        <tr>
                          <td><center>6</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description8" ></td>
                          <td><select id="Select7" class="form-control" onchange="myFunction7()" name="currency7">
                            <option value="">--Choose--</option>
                            <?php foreach ($currency as $get) {?>
                            <option value="<?php echo $get->curr; ?>"><?php echo $get->curr; ?></option>
                            <?php } ?>
                            </select>
                          </td>
                          <td><input id="nilai7" onchange="nominal()" type="text" class="form-control" name="jumlah8" ></td> 
                        </tr>
                        <tr>
                          <td><center>7</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description9" ></td>
                          <td><select id="Select8" class="form-control" onchange="myFunction8()" name="currency8">
                            <option value="<?php echo $row->currency3; ?>"> <?php echo $row->currency3; ?></option>                              

                            <option value="">--Choose--</option>
                            <?php foreach ($currency as $get) {?>
                            <option value="<?php echo $get->curr; ?>"><?php echo $get->curr; ?></option>
                            <?php } ?>
                            </select>
                          </td>
                          <td><input id="nilai8" onchange="nominal()" type="text" class="form-control" name="jumlah9" value="<?php echo $row->jumlah3;?>"></td> 
                        </tr>
                        <tr>
                          <td><center>8</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description10" ></td>
                          <td><select id="Select9" class="form-control" onchange="myFunction9()" name="currency9">
                            <option value="">--Choose--</option>
                            <?php foreach ($currency as $get) {?>
                            <option value="<?php echo $get->curr; ?>"><?php echo $get->curr; ?></option>
                            <?php } ?>
                            </select>
                          </td>
                          <td><input id="nilai9" onchange="nominal()" type="text" class="form-control" name="jumlah10"></td> 
                        </tr>
                        <tr>
                          <td><center>9</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description11" ></td>
                          <td><select id="Select10" class="form-control" onchange="myFunction10()" name="currency10">
                            <option value="">--Choose--</option>
                            <?php foreach ($currency as $get) {?>
                            <option value="<?php echo $get->curr; ?>"><?php echo $get->curr; ?></option>
                            <?php } ?>
                            </select>
                          </td>
                          <td><input id="nilai10" onchange="nominal()" type="text" class="form-control" name="jumlah11"></td> 
                        </tr>
                        <tr>
                          <td><center>10</center></td>
                          <td colspan="2"><input type="text" class="form-control" name="description12" ></td>
                          <td><select id="Select11" class="form-control" onchange="myFunction11()" name="currency11">
                            <option value="">--Choose--</option>
                            <?php foreach ($currency as $get) {?>
                            <option value="<?php echo $get->curr; ?>"><?php echo $get->curr; ?></option>
                            <?php } ?>
                            </select>
                          </td>
                          <td><input id="nilai11" onchange="nominal()" type="text" class="form-control" name="jumlah12"></td> 
                        </tr>

                        <tr>
                          <td colspan="3"> Jumlah Pembayaran/<i>Total Expenses</i> </td>
                          <td><center><p id="demo"> </p> <p id="demo1"> </p> <p id="demo2"> </p> </center></td>
                          <td><input id="ulang" type="text" name="total_expenses[]">
                              <input id="ulang1" type="text" name="total_expenses[]">
                              <input id="ulang2" type="text" name="total_expenses[]"> 
                          </td>
                        </tr>
                        <tr>
                            <td colspan="3"> Jumlah Uang Muka/<i>Cash Advance</i> </td>
                            <td><center><p id="demo3"> </p> <p id="demo4"> </p> <p id="demo5"> </p> </center></td>
                            <td><input id="jumlahuangmuka" onchange="nominal()" type="text" name="cash_advance" class="form-control"> </td>
                        </tr>
                        <tr>
                          <td colspan="3"> (Negatif) = Piutang/<i>Receivable</i> atau Positif = Hutang/<i>Payable</i> </td>
                          <td><center><p id="demo6"> </p> <p id="demo7"> </p> <p id="demo8"> </p></center></td>
                          <td><input id="negatif" type="text" name="piutang" class="form-control"> </td>
                        </tr>
                        <tr> 
                          <td>Terbilang/ <i>Say :</i> </td>
                          <td colspan="4"><input type="text" id="terbilang" name="terbilang[]" placeholder="Terbilang">
                                          <input type="text" id="terbilang2" name="terbilang[]" placeholder="Terbilang">
                                          <input type="text" id="terbilang3" name="terbilang[]" placeholder="Terbilang">      
                          </td>
                        </tr>
                        <tr> 
                          <td>Dibayar Kepada/ <i>Paid To :</i> </td>
                          <td colspan="4"><input type="text" name="dibayar_kepada" class="form-control" value="<?php echo $row->penerima; ?>"></td>
                        </tr>
                      </tbody>
                    </table>
                    
                    <br>

                    <table border="1" style="font-family: calibri;" width="100%">
                      <tbody>
                      <tr> 
                        <td colspan="4" rowspan="2" width="50%">&nbsp; Verifikasi Oleh / <br>&nbsp;<i>Verified By : </i> </td>                           
                        <td rowspan="4">&nbsp; Catatan / :<br>&nbsp;<i>Remarks  </i><textarea type="text" class="form-control" name="catatan" placeholder="Remarks" ></textarea></td>
                      </tr>
                      <tr>
                      </tr>
                      <tr align="right">
                        <td width="5%"> </td>
                        <td width="20%">Tanggal &nbsp;</td>
                        <td colspan="2" rowspan="2"><input type="date" name="verified_date" class="form-control" required></td>     
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
                            <?php foreach ($divhead as $divhead) { ?>
                          <td>Nama /<i>Name : </i></td>
                          <td><input type="text" class="form-control" name="penanggung_jawab" value="<?php echo $divhead->display_name; ?>" required></td> 
                        </tr>
                        <tr>
                          <td>Jabatan /<i>Title : </i></td>
                          <td><input type="text" class="form-control" name="jabatan" value="SVP Corporate Strategy & Finance" required></td> 
                        </tr>
                            <?php }?>
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
                          <td><input id="approval1" type="text" name="persetujuan_pembayaran1" class="form-control"> </td>
                          <td width="10%">Nama/ <i>Name</i> </td>
                          <td><input id="approval2" type="text" name="persetujuan_pembayaran2" class="form-control"> </td>
                          <td width="10%">Nama/ <i>Name</i> </td>
                          <td><input id="approval3" type="text" name="persetujuan_pembayaran3" class="form-control"> </td>
                        </tr>
                        <tr>
                          <td>Jabatan/ <i>Title</i> </td>
                          <td><input id="jabatan1" type="text" name="jabatan1" class="form-control"> </td>
                          <td>Jabatan/ <i>Title</i> </td>
                          <td><input id="jabatan2" type="text" name="jabatan2" class="form-control"> </td>
                          <td>Jabatan/ <i>Title</i> </td>
                          <td><input id="jabatan3" type="text" name="jabatan3" class="form-control"> </td>
                        </tr>
                      </tbody>
                    </table>

                    <table border="1" style="font-family: calibri;" width="100%">
                      <tbody>
                        <tr>
                          <td colspan="4"><center><b>Diisi oleh Divisi Treasury <br> <i>For Treasury Use Only </i> </b></center></td>
                        </tr>
                        <tr><?php if ($row->akun_bank == 'Tunai') {$ceklis="checked"; 
                        }else{
                              $ceklis=" ";
                        } ?>
                          <td colspan="4"><font size="+1"> Metode Pembayaran : <input type="checkbox" <?php echo $ceklis;?> name="metode_pembayaran" value="Tunai" > Tunai </font></td>
                        </tr>
                        <tr>
                          <td width="26%" colspan="2"><center> <input type="checkbox" name="metode_pembayaran" value="Transfer" > Transfer Ke : </center></td>
                          <td><font size="+1"> Bank : 
                              &nbsp;<input type="text" name="bank" value="<?php echo $row->akun_bank; ?>" > </font>
                          </td> 
                          <td><font size="+1"> No. Rek : 
                              &nbsp;<input type="text" name="no_rek" value="<?php echo $row->no_rekening; ?>" > </font>
                          </td>                        
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

                    <p align="justify">Apa kamu yakin akan mengirimkan Form APF ini :  <?php echo $asf_doc; ?></p>
                    <label>Kepada CSF Reviewer?</label>      
                    <input type="hidden" name="handled_by" value="i.akmal">                       
                    <!-- <select name="handled_by">
                        <option>--- Choose ---</option>
                    <?php foreach ($csf as $get) {?>
                        <option value="<?php echo $get->username; ?>"><?php echo $get->username; ?></option>
                    <?php } ?>
                    </select>             -->
                  </div>  
                </div>
                     

                <div class="box">
                  <div class="box-header with-border">
                    <a class="btn btn-warning" href="Home" role="button">Cancel</a>  
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>                                                 
            </div>
          </section>    

        </form>
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
function tambah() {
  alert("Data Successfully to Submit");
}

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

  var get_x = x.replace(/\./g,'');
  var get_b = b.replace(/\./g,'');
  var get_c = c.replace(/\./g,'');
  var get_d = d.replace(/\./g,'');
  var get_e = e.replace(/\./g,'');
  var get_f = f.replace(/\./g,'');
  var get_g = g.replace(/\./g,'');
  var get_h = h.replace(/\./g,'');
  var get_i = i.replace(/\./g,'');
  var get_j = j.replace(/\./g,'');
  var get_k = k.replace(/\./g,'');
  var get_l = l.replace(/\./g,'');

  var get_m = m.replace(/\./g,'');

  var currency = Number(get_x) + Number(get_b) + Number(get_c) + Number(get_d) ;
  var currency2 =  Number(get_e) + Number(get_f) + Number(get_g) + Number(get_h);
  // alert(sum_b);
  var currency3 =  Number(get_i) + Number(get_j) + Number(get_k) + Number(get_l) ;
  var negatif = Number(get_m) + 0 ;

  var hasil_jumlah1 = currency;
  var hasil_jumlah2 = currency2;
  var hasil_jumlah3 = currency3;

  // var pembayaran = currency+ ';' +currency2+ ';' +currency3;
  // var str = pembayaran.replace(/\./g,'');
 
  // if(x && b){
    document.getElementById("ulang").value = hasil_jumlah1 ;
    document.getElementById("ulang1").value = hasil_jumlah2 ;
    document.getElementById("ulang2").value = hasil_jumlah3 ;
    // alert(ulang);

    var bilangan= ''+hasil_jumlah1+'';
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
    document.getElementById("terbilang").value=kalimat;
    // alert(kalimat);

    var bilangan2= ''+hasil_jumlah2+'';
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
    document.getElementById("terbilang2").value=kalimat2;
    // alert(kalimat2);

    var bilangan3= ''+hasil_jumlah3+'';
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
    document.getElementById("terbilang3").value=kalimat3;
    // alert(kalimat3);


    var hasil = (hasil_jumlah1+hasil_jumlah2+hasil_jumlah3)-negatif;
    document.getElementById("negatif").value = hasil ;
 
  var a = hasil ;
  if (a <= 100000000){
    document.getElementById("approval1").value = "Donny Hamdani";
    document.getElementById("jabatan1").value = "Deputi Direktur Keuangan";
  }
  if (a >= 100000000 && a <= 500000000) {
    document.getElementById("approval1").value = "Donny Hamdani";
    document.getElementById("jabatan1").value = "Deputi Direktur Keuangan";
    
    document.getElementById("approval2").value = "Salusra Satria";
    document.getElementById("jabatan2").value = "Direktur Eksekutif Keuangan & Penilaian Proyek / CFO";
  }
  if (a >= 500000000) {
    document.getElementById("approval1").value = "Salusra Satria";
    document.getElementById("jabatan1").value = "Direktur Eksekutif Keuangan & Penilaian Proyek / CFO";
    
    document.getElementById("approval2").value = "Andre Permana";
    document.getElementById("jabatan2").value = "Direktur Eksekutif Bisnis / COO"; 

    document.getElementById("approval3").value = "M. Wahid Sutopo";
    document.getElementById("jabatan3").value = "Direktur Utama / CEO";  
  }  
}

// Format Separator Id Nilai 
var nilai = document.getElementById('nilai');
  nilai.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai() untuk mengubah angka yang di ketik menjadi format angka
    nilai.value = formatnilai(this.value);
  });

  /* Fungsi formatnilai */
  function formatnilai(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
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
  nilai1.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai1() untuk mengubah angka yang di ketik menjadi format angka
    nilai1.value = formatnilai1(this.value);
  });

  /* Fungsi formatnilai1 */
  function formatnilai1(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
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

  // Format Separator Id Nilai 2
  var nilai2 = document.getElementById('nilai2');
  nilai2.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai2() untuk mengubah angka yang di ketik menjadi format angka
    nilai2.value = formatnilai2(this.value);
  });

  /* Fungsi formatnilai2 */
  function formatnilai2(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
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
  nilai3.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai3() untuk mengubah angka yang di ketik menjadi format angka
    nilai3.value = formatnilai3(this.value);
  });

  /* Fungsi formatnilai3 */
  function formatnilai3(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
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
  nilai4.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai4() untuk mengubah angka yang di ketik menjadi format angka
    nilai4.value = formatnilai4(this.value);
  });

  /* Fungsi formatnilai4 */
  function formatnilai4(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
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
  nilai5.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai5() untuk mengubah angka yang di ketik menjadi format angka
    nilai5.value = formatnilai5(this.value);
  });

  /* Fungsi formatnilai5 */
  function formatnilai5(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
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
  nilai6.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai6() untuk mengubah angka yang di ketik menjadi format angka
    nilai6.value = formatnilai6(this.value);
  });

  /* Fungsi formatnilai6 */
  function formatnilai6(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
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
  nilai7.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai7() untuk mengubah angka yang di ketik menjadi format angka
    nilai7.value = formatnilai7(this.value);
  });

  /* Fungsi formatnilai7 */
  function formatnilai7(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
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
  nilai8.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai8() untuk mengubah angka yang di ketik menjadi format angka
    nilai8.value = formatnilai8(this.value);
  });

  /* Fungsi formatnilai8 */
  function formatnilai8(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
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
  nilai9.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai9() untuk mengubah angka yang di ketik menjadi format angka
    nilai9.value = formatnilai9(this.value);
  });

  /* Fungsi formatnilai9 */
  function formatnilai9(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
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
  nilai10.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai8() untuk mengubah angka yang di ketik menjadi format angka
    nilai10.value = formatnilai8(this.value);
  });

  /* Fungsi formatnilai10 */
  function formatnilai8(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
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
  nilai11.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnilai11() untuk mengubah angka yang di ketik menjadi format angka
    nilai11.value = formatnilai11(this.value);
  });

  /* Fungsi formatnilai11 */
  function formatnilai11(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
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
    ulang.value = formatulang(this.value);
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
    ulang1.value = formatulang1(this.value);
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
    ulang2.value = formatulang2(this.value);
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
  jumlahuangmuka.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatjumlahuangmuka() untuk mengubah angka yang di ketik menjadi format angka
    jumlahuangmuka.value = formatjumlahuangmuka(this.value);
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

  // Format Separator Id Negarif (Piutang)
  var negatif = document.getElementById('negatif');
  negatif.addEventListener('mousemove', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatnegatif() untuk mengubah angka yang di ketik menjadi format angka
    negatif.value = formatnegatif(this.value);
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