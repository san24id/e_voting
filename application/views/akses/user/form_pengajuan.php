      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            DATA PAYMENT
            <small></small>
          </h1>
        </section>
        <!-- Main content -->
        <form id="form" method="post" action="Home/action_addprofil">

          <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <!-- /.box -->
                <div class="box">
                  <div class="box-header with-border">
                    <center><h3 class="box-title">Data Pengajuan SP3</h3></center>
                  </div>  
                  
                    <div class="box-body">
                      <div class="form-row">
                        <div class="form-group col-md-6">
                             <label>Tanggal</label>
                             <input type="text" class="form-control" placeholder="dd/mm/yyyy" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Divisi</label>
                            <input type="text" class="form-control" id="inputPassword4" placeholder="Divisi" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Hari</label>
                            <input type="text" class="form-control" placeholder="Hari" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Nama Pemohon</label>
                            <input type="text" class="form-control" id="inputPassword4" placeholder="Pemohon" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nomor Surat</label>
                            <input type="text" class="form-control" placeholder="Nomor Surat" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Jabatan</label>
                            <input type="text" class="form-control" id="inputPassword4" placeholder="Jabatan" readonly>
                        </div>
                      </div>
                    </div>
                </div>    

                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">Detail Pengajuan</h3>
                  </div>  

                  <div class="box-body">
                    <div class="form-group">
                        <label>Label : <i class="glyphicon glyphicon-info-sign" style="color: blue; cursor:pointer;" data-toggle="modal" data-target="#anomor1"></i></label>
                        <input type="hidden" name="" value="">
                        <textarea type="text" class="form-control" name="" value="" placeholder="Enter Text"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Label : <i class="glyphicon glyphicon-info-sign" style="color: blue; cursor:pointer;" data-toggle="modal" data-target="#anomor2"></i></label>
                        <input type="hidden" name="" value="">
                        <textarea type="text" class="form-control" name="" value="" placeholder="Enter Text"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Label : <i class="glyphicon glyphicon-info-sign" style="color: blue; cursor:pointer;" data-toggle="modal" data-target="#anomor3"></i></label>
                        <input type="hidden" name="" value="">
                        <textarea type="text" class="form-control" name="" value="" placeholder="Enter Text"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Label : <i class="glyphicon glyphicon-info-sign" style="color: blue; cursor:pointer;" data-toggle="modal" data-target="#anomor4"></i></label>
                        <input type="hidden" name="" value="">
                        <textarea type="text" class="form-control" name="" value="" placeholder="Enter Text"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Label : <i class="glyphicon glyphicon-info-sign" style="color: blue; cursor:pointer;" data-toggle="modal" data-target="#anomor5"></i></label>
                        <input type="hidden" name="" value="">
                        <textarea type="text" class="form-control" name="" value="" placeholder="Enter Text"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Label : <i class="glyphicon glyphicon-info-sign" style="color: blue; cursor:pointer;" data-toggle="modal" data-target="#anomor6"></i></label>
                        <input type="hidden" name="" value="">
                        <textarea type="text" class="form-control" name="" value="" placeholder="Enter Text"></textarea>
                    </div>
                  </div>                  
                </div>

                <div class="box">
                  <div class="box-header with-border">
                  <h3 class="box-title">Data Penerima Pembayaran</h3>

                  <div class="box-body">  
                    <div class="form-group">
                        <label>Nama Penerima :</label>
                        <select name="bank" class="form-control">
                            <option value="2">BCA</option>
                            <option value="3">Mandiri</option>
                            <option value="4">BNI</option>
                            <option value="5">BRI</option>
                            <option value="6">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Bank Account</label>
                        <input type="hidden" name="" value="">
                        <input type="text" class="form-control" name="" value="" placeholder="Auto" readonly>
                    </div>

                    <div class="form-group">
                        <label>No. Rekening</label>
                        <input type="hidden" name="" value="">
                        <input type="text" class="form-control" name="" value="" placeholder="Auto" readonly>
                    </div>
                    <a class="btn btn-warning" href="Home" role="button">Cancel</a>  
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>
                </div>                  
              </div>                       
            </div>
          </section>  

        </form>
        <!-- /.content -->
      </div>

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