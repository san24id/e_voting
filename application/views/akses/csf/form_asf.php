      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          FORMULIR PERTANGGUNGJAWABAN <br> <i> ADVANCE SETTLEMENT FORM (ASF)</i>
            <small></small>
          </h1>
        </section>
        <!-- Main content -->
        <form id="form" method="post" action="Dashboard/addarf" onsubmit="tambah()">
          <input type="hidden" name="id_user" class="form-control" value="<?php echo $this->session->userdata('id_user') ?>">           
          <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <!-- /.box -->
                <div class="box">
                  <div class="box-header with-border">
                    <center><h3 class="box-title"><i>FORM ADVANCE SETTLEMENT FORM (ASF)</i></h3></center>
                  </div>  
                  
                    <div class="box-body">                      
                      <div class="form-row">                 
                        <div class="form-group col-md-6">
                            <label>Tanggal</label>
                            <input type="text" name="tanggal" class="form-control" value="<?php echo date("l, Y-m-d"); ?>" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label>ASF Doc No</label>
                            <input type="text" name="nomor_surat" class="form-control" value="">                            
                        </div>
                        <div class="form-group col-md-6">
                            <label>Direktorat/Divisi Pemohon</label>
                            <input type="text" name="divisi" class="form-control" value="">                            
                        </div>
                        <div class="form-group col-md-6">
                            <label>SPPP Doc No</label>
                            <input type="text" name="nama_user" class="form-control" value="">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Kode Proyek </label>
                            <input type="text" name="nama_user" class="form-control" value="">
                        </div>                        
                        <div class="form-group col-md-6">
                            <label>ARF Doc No</label>
                            <input type="text" name="jabatan" class="form-control" value="" >
                        </div>
                    </div>
                </div>    

                <div class="box">
                  <div class="box-header with-border">
                    <h3 class="box-title">DETAIL <i> ADVANCE SETTLEMENT FORM (ASF)</i></h3>
                  </div>  

                  <div class="box-body">
                    <div class="form-group">
                        <label>Deskripsi : <i class="glyphicon glyphicon-info-sign" style="color: blue; cursor:pointer;" data-toggle="modal" data-target="#anomor1"></i></label>                        
                        <textarea type="text" class="form-control" name="label1" placeholder="Enter Text" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Mata Uang : <i class="glyphicon glyphicon-info-sign" style="color: blue; cursor:pointer;" data-toggle="modal" data-target="#anomor2"></i></label>                        
                        <textarea type="text" class="form-control" name="label2" placeholder="Enter Text" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Jumlah : <i class="glyphicon glyphicon-info-sign" style="color: blue; cursor:pointer;" data-toggle="modal" data-target="#anomor3"></i></label>                        
                        <input type="text" class="form-control" name="label3" placeholder="Enter Text" required></input>
                    </div>
                    <div class="form-group">
                        <label>Terbilang : <i class="glyphicon glyphicon-info-sign" style="color: blue; cursor:pointer;" data-toggle="modal" data-target="#anomor3"></i></label>                        
                        <input type="text" class="form-control" name="label3" placeholder="Enter Text" required></input>
                    </div>   
                    <div class="form-group">
                        <label>Dibayar kepada : <i class="glyphicon glyphicon-info-sign" style="color: blue; cursor:pointer;" data-toggle="modal" data-target="#anomor3"></i></label>                        
                        <input type="text" class="form-control" name="label3" placeholder="Enter Text" required></input>
                    </div> 
                    <div class="form-group">
                        <label>Catatan : <i class="glyphicon glyphicon-info-sign" style="color: blue; cursor:pointer;" data-toggle="modal" data-target="#anomor3"></i></label>                        
                        <input type="text" class="form-control" name="label3" placeholder="Enter Text" required></input>
                    </div> 

                    <a class="btn btn-warning" href="Home" role="button">Cancel</a>  
                    <button type="submit" class="btn btn-primary">Submit</button>                                                  
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