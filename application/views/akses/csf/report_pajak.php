<style type="text/css">
.period { border: 5px solid #008000; border-radius: 5px; background: #008000 }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        LIST OF REPORT PPh
      </h1>
    </section>

    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->

          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                <!-- Periode   -->
                <table width="50%">
                <?php echo form_open("Dashboard/periode_tax");?>
                  <tr>
                    <td class="period"><font color="white" size="3">Period: </font></td>
                    <td></td>
                    <td class="period"><font color="white" size="3"> Date </font></td>
                    <td class="period"><input type="text" name="start_date" id="start_date"></td>
                    <td><font size="3">s/d</font></td>
                    <td class="period"><font color="white" size="3"> Date </font></td>
                    <td class="period"><input type="text" name="end_date"></td>
                    <td class="period"><input type="submit" name="search" value="Search" id="search"></td>
                  </tr>
                <?php echo form_close();?>  
                </table>
                </div>
              </div>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nomor SP3 </th>
                    <th>Jenis Pajak </th>
                    <th>Kode Objek Pajak</th>
                    <th>MAP</th>
                    <th>Tanggal Pemotongan <br> (dd/MM/yyyy)</th>
                    <th>Masa Pajak</th>
                    <th>Nama</th>
                    <th>No. NPWP/KTP</th>
                    <th>Alamat</th>
                    <th>Mendapatkan Fasilitas ? (Y/N)</th>
                    <th>Nomor SKB</th>
                    <th>Tarif Pajak</th>
                    <th>DPP</th>
                    <th>Nilai Pajak Terutang</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 1;
                    foreach ($report_pph as $row){
                  ?>
                  <tr>
                    <td><?php echo $i++; ?></td>                  
                    <td><?php echo $row->nomor_surat;?> </td>
                    <td><?php echo $row->jenis_pajak; ?></td>
                    <td><?php echo $row->kode_pajak; ?></td>
                    <td><?php echo $row->kode_map; ?></td>
                    <td><?php echo $row->paid_date;?></td>
                    <td><?php echo date("M-Y", strtotime($row->paid_date));?></td>
                    <td><?php echo $row->nama; ?></td>
                    <td><?php echo $row->npwp; ?></td>
                    <td><?php echo $row->alamat; ?></td>
                    <td>Mendapatkan Fasilitas ? (Y/N)</td>
                    <td>Nomor SKB</td>
                    <td><?php echo $row->tarif; ?></td>
                    <td><?php echo $row->dpp; ?></td>
                    <td><?php echo $row->pajak_terutang; ?></td>
                    <td><?php echo $row->keterangan; ?></td>
                    <td>
                      <a href="Dashboard/report_view_pph/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>                    
                    </td>      
                  </tr>
                    <?php } ?>      
                </tbody>
                </table>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>  

      <!-- /.row -->
    </section>
    <!-- /.content -->

    <section class="content-header">
      <h1>
        LIST OF REPORT PPN
      </h1>
    </section>

    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->

          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nomor SP3 </th>
                    <th>Jenis Pajak </th>
                    <th>Masa Pajak</th>
                    <th>Nama</th>
                    <th>NPWP tersedia? <br> (YA/NO)</th>
                    <th>No. NPWP/KTP</th>
                    <th>Alamat </th> 
                    <th>Tarif Pajak</th>
                    <th>DPP</th>
                    <th>Nilai Pajak Terutang</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 1;
                    foreach ($report_ppn as $row){
                  ?>
                  <tr>
                    <td><?php echo $i++; ?></td>                  
                    <td><?php echo $row->nomor_surat;?> </td>
                    <td><?php echo $row->jenis_pajak; ?></td>
                    <td>Masa Pajak</td>
                    <td><?php echo $row->nama; ?></td>
                    <td>NPWP tersedia? <br> (YA/NO)</td>
                    <td><?php echo $row->npwp; ?></td>
                    <td><?php echo $row->alamat; ?></td>
                    <td><?php echo $row->tarif; ?></td>
                    <td><?php echo $row->dpp; ?></td>
                    <td><?php echo $row->pajak_terutang; ?></td>
                    <td><?php echo $row->keterangan; ?></td>                    
                    <td>
                      <a href="Dashboard/report_view_ppn/<?php echo $row->id_payment; ?>"><button class="btn btn-primary btn-sm">View</button></a>                    
                    </td>      
                  </tr>
                    <?php } ?>      
                </tbody>
                </table>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>  

      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


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

<script>
$(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });

</script>
</body>
</html>
