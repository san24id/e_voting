<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css"/> 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.6/css/rowReorder.dataTables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css"/>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

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
                    <td class="period"><input type="date" name="start_date" id="start_date"></td>
                    <td><font size="3">s/d</font></td>
                    <td class="period"><font color="white" size="3"> Date </font></td>
                    <td class="period"><input type="date" name="end_date"></td>
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
                    <th><center>No.</center></th>
                    <th>Nomor SP3 </th>
                    <th>Jenis Pajak </th>
                    <th>Kode Objek Pajak</th>
                    <th>MAP</th>
                    <th>Tanggal Pemotongan <br> (dd/MM/yyyy)</th>
                    <th>Masa Pajak</th>
                    <th>Nama</th>
                    <th>No. NPWP/KTP</th>
                    <th>Alamat</th>
                    <th>Nomor Invoice</th>
                    <th>Tanggal Invoice</th>
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
                    <td><center><?php echo $i++; ?></center></td>                  
                    <td><?php echo $row->nomor_surat;?> </td>
                    <td><?php echo $row->jenis_pajak; ?></td>
                    <td><?php echo $row->kode_pajak; ?></td>
                    <td><?php echo $row->kode_map; ?></td>
                    <td><?php if ($row->paid_date == ''){
                          echo "";
                        }else{
                          echo date("d-M-Y", strtotime($row->paid_date));
                        } 
                          ?></td>
                    <td><?php if ($row->paid_date == ''){
                          echo "";
                        }else{
                          echo date("M Y", strtotime($row->paid_date));
                        } 
                          ?></td>
                    <td><?php echo $row->nama; ?></td>
                    <td><?php echo $row->npwp; ?></td>
                    <td><?php echo $row->alamat; ?></td>
                    <td><?php echo $row->noinvoice; ?></td>
                    <td><?php echo $row->tglinvoice; ?></td>
                    <?php
                      $sql = "SELECT fas_pajak FROM t_tax WHERE fas_pajak IS NOT NULL AND id_payment=$row->id_payment";
                      $query = $this->db->query($sql)->result();
                            // return $query;
                            // var_dump($query[0]->nama);exit; 
                            if ($query[0]->fas_pajak) { 
                              $buka = "Ya";
                            }else{
                              $buka = "No";
                            }
                    ?>
                    <td><?php echo $buka; ?></td>
                    <td><?php echo $row->fas_pajak; ?></td>
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
                <table id="example2" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th><center>No.</center></th>
                    <th>Nomor SP3 </th>
                    <th>Jenis Pajak </th>
                    <th>Masa Pajak</th>
                    <th>Nama</th>
                    <th>NPWP tersedia? <br> (YA/NO)</th>
                    <th>No. NPWP/KTP</th>
                    <th>Alamat </th> 
                    <th>Nomor Invoice</th> 
                    <th>Tanggal Invoice</th> 
                    <th>Nomor Faktur Pajak </th> 
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
                    <td><center><?php echo $i++; ?></center></td>                  
                    <td><?php echo $row->nomor_surat;?> </td>
                    <td><?php echo $row->jenis_pajak; ?></td>
                    <td><?php echo $row->masa_pajak;?></td>
                    <td><?php echo $row->nama; ?></td>

                    <?php
                      $sql = "SELECT npwp FROM t_tax WHERE npwp IS NOT NULL AND id_payment=$row->id_payment";
                      $query = $this->db->query($sql)->result();
                            // return $query;
                            // var_dump($query[0]->nama);exit; 
                            if ($query[0]->npwp) { 
                              $npwp = "Ya";
                            }else{
                              $npwp = "No";
                            }
                    ?>

                    <td><?php echo $npwp; ?></td>
                    <td><?php echo $row->npwp; ?></td>
                    <td><?php echo $row->alamat; ?></td>
                    <td><?php echo $row->noinvoice; ?></td>
				          	<td><?php echo $row->tglinvoice; ?></td>
                    <td><?php echo $row->nofaktur; ?></td>
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

<!-- Export DataTable -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>

<script>
$(function () {
    //$("#example1").DataTable();
	$('#example1').DataTable( {
        dom: '<"html5buttons">Bfrtip',
        lengthMenu: [
          [10, 25, 50, -1],
          [ '10 rows', '25 rows', '50 rows', 'Show All']
        ],
        buttons: [
		{extend: 'excel', text: '<b>Export To Excel</b>', title:'List Of Report PPh',exportOptions: {columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17]}},
		
					],
		 //buttons: [ 'excel', 'pdf'],
        responsive: true

    } );
    $('#example2').DataTable( {
        dom: '<"html5buttons">Bfrtip',
        lengthMenu: [
          [10, 25, 50, -1],
          [ '10 rows', '25 rows', '50 rows', 'Show All']
        ],
        buttons: [
		{extend: 'excel', text: 'Export To Excel', title: 'List Of Report PPN',exportOptions: {columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14]}},
		
					],
		 //buttons: [ 'excel', 'pdf'],
        responsive: true

    } );
	
  });

</script>
</body>
</html>
