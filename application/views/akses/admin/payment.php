  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DATA PROYEK VERIFY &nbsp; <a href="Dashboard/submissionpagePDF?<?php echo $_SERVER['QUERY_STRING']; ?>" target="_blank"><button class="btn btn-primary btn-sm">Export to PDF</button></a>
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->

          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <div style="float: right;">
                  <select id="filter_status" class="form-control">
                    <option value="0">All</option>
                    <?php 
                      foreach ($statusinf as $key => $value)
                      {
                        if($this->session->userdata('role') == 2)
                        {
                          if ( $value->id > 0 )
                          {
                    ?>
                            <option value="<?php echo $value->id; ?>" 
                              <?php echo ($_GET['filter_status'] == $value->id) ? 'selected' : ''; ?>
                              ><?php echo $value->status_admin; ?></option>
                    <?php
                          }
                        }else{
                    ?>
                            <option value="<?php echo $value->id; ?>" 
                              <?php echo ($_GET['filter_status'] == $value->id) ? 'selected' : ''; ?>
                              ><?php echo $value->status_admin; ?></option>
                    <?php
                        }
                      }
                    ?>
                  </select>
                </div>

                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO.</th>
                  <th>Status</th>
                  <th>Kode Proyek</th>
                  <th>Penanggung Jawab</th>
                  <th>Kategori</th>
                  <th>Sektor</th>
                  <th>Nama Proyek</th>
                  <th>Lokasi</th>
                  <th>Estimasi Nilai</th>
                  <th>Skor</th>
                  <th>Status Pengerjaan</th>                  
                  <th>Log Update</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <!-- <?php 
                    $i = 1;
                    foreach ($profil as $row){
                   ?>
                <tr> -->
                  <td><?php echo $i++; ?></td>
                  <td>  
                  <?php 
                          if($row->status == 1){
                              echo "<img src='assets/dashboard/images/legend/treatment.png'>";  
                          }else if($row->status == 2){
                             echo "<img src='assets/dashboard/images/legend/submit.png'>";
                          }else if($row->status == 3){
                             echo "<img src='assets/dashboard/images/legend/verified.png'>";
                          }else if($row->status == 4){
                             echo "<img src='assets/dashboard/images/legend/sendtoadminapp.png'>";
                          }else if($row->status == 5){
                             echo "<img src='assets/dashboard/images/legend/default.png'>";
                          }else if($row->status == 6 || $row->status == 7){
                             echo "<img src='assets/dashboard/images/legend/sendtoadminuser.png'>";
                          }else if($row->status == 8){
                             echo "<img src='assets/dashboard/images/legend/respontoadminuser.png'>";
                          }else if($row->status == 9 || $row->status == 10){
                             echo "<img src='assets/dashboard/images/legend/responformpp.png'>";
                          }    
                        ?>
                  <!-- <?php echo $row->status; ?>  -->
                  </td>
                  <td><?php echo $row->nomor_projek; ?></td>
                  <td><?php echo $row->nama_pj; ?></td>
                  <td><?php echo $row->nama_kategori; ?></td>
                  <td><?php echo $row->nama_sektor; ?></td>
                  <td><?php echo $row->nama_projek; ?></td>
                  <td><?php echo $row->lokasi ?></td>
                  <td><?php echo $row->estimasi; ?></td>
                  <td><?php echo $row->total_skor; ?></td>
                  <td>  
                  <?php 
                          if($row->status == 1){
                              echo "Not Send To Admin";  
                          }else if($row->status == 2){
                             echo "Not Send To Admin";
                          }else if($row->status == 3){
                             echo "On Admin All";
                          }else if($row->status == 4){
                             echo "On Admin Approval";
                          }else if($row->status == 5){
                             echo "Back To Admin";
                          }else if($row->status == 6){
                             echo "Progress on Admin User PB";
                          }else if($row->status == 7){
                            echo "Progress on Admin User GC";                                                   
                          }else if($row->status == 8){
                             echo "Finish on Admin User";
                          }else if($row->status == 9 || $row->status == 10){
                             echo "Finish on Admin Approval";
                          // }else if($row->status == 10){
                          //   echo "Finish on Admin Approval GC";
                          }
                        ?>                  
                  </td>
                  <td><?php echo date("d-m-Y H:i:s", strtotime($row->log_update)); ?></td>
                  <td>

                    <?php if($this->session->userdata('role') == 2){ ?>
                        <a href="Dashboard/formview/<?php echo $row->id_projek; ?>"><button class="btn btn-primary btn-sm">View</button></a>
                        <?php 
                          if($row->status == 3 || $row->status == 5 ){
                        ?>
                          <!-- <a href="javascript:;"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#mdl-approval" onclick="setHdn('<?php echo $row->id_projek; ?>')">Send to Approval</button></a> -->
                        <?php 
                          }
                        ?>

                    <?php }else if($this->session->userdata('role') == 3 || $this->session->userdata('role') == 4 || $this->session->userdata('role') == 5 || $this->session->userdata('role') == 6){ ?>
                         <a href="Dashboard/formfinalsadminview/<?php echo $row->id_projek; ?>"><button class="btn btn-primary btn-sm">View</button></a>
                    <?php }else{ ?>

                      <?php if($row->status == 3){ ?>
                          <a href="Dashboard/formfinished/<?php echo $row->id_projek; ?>"><button class="btn btn-primary btn-sm">Review</button></a>
                      <?php }else if($row->status >= 4){ ?>
                          <a href="Dashboard/formview/<?php echo $row->id_projek; ?>"><button class="btn btn-primary btn-sm">View</button></a>
                      <?php }else if($row->status < 3){ ?>
                          <a href="Dashboard/formedit/<?php echo $row->id_projek; ?>"><button class="btn btn-primary btn-sm">View</button></a>
                    <?php }} ?>

                  </td>
                </tr>
              <?php  } ?>
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

      <div class="row">
        <div class="col-xs-6">
          <!-- /.box -->

          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                 <table id="" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO.</th>
                  <th>Status</th>
                  <th>Keterangan</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1</td>
                  <td><img src="assets/dashboard/images/legend/treatment.png"></td>
                  <td>Draft</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td><img src="assets/dashboard/images/legend/submit.png"></td>
                  <td>Incomplete</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td><img src="assets/dashboard/images/legend/verified.png"></td>
                  <td>Complete</td>
                </tr>
                <!-- <tr>
                  <td>4</td>
                  <td><img src="assets/dashboard/images/legend/sendtoadminapp.png"></td>
                  <td>Send to Admin Approval</td>
                </tr>
                <tr>
                  <td>5</td>
                  <td><img src="assets/dashboard/images/legend/sendtoadminuser.png"></td>
                  <td>Send to Admin User</td>
                </tr>
                <tr>
                  <td>6</td>
                  <td><img src="assets/dashboard/images/legend/respontoadminuser.png"></td>
                  <td>Respon From Admin User</td>
                </tr>
                <tr>
                  <td>7</td>
                  <td><img src="assets/dashboard/images/legend/responformpp.png"></td>
                  <td>Respon From Admin Approval</td>
                </tr>
                <tr>
                  <td>8</td>
                  <td><img src="assets/dashboard/images/legend/default.png"></td>
                  <td>Back to Admin</td>
                </tr> -->
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
    <strong>Copyright &copy; 2019 </footer>

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
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->

      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<div class="modal fade" id="modal_view" tabindex="-1" role="dialog"  data-backdrop="static" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <b class="modal-title" style="font-size: 25px;">VIEW</b>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="box-body">
              <div class="fetched-data"></div>       
         </div>
      </div>
      <div class="modal-footer">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">CLOSE</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="mdl-approval" tabindex="-1" role="dialog" aria-labelledby="anomor1" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <form id="form-approval">
        <input type="hidden" name="id_project" class="hdnid_project" value="">
        <div class="modal-body">
          Pilih Admin Approval
          <div class="radio">
            <label>
            <input type="radio" name="role" value="3" checked>
            Admin Approval PB
            </label>
          </div>

          <div class="radio">
            <label>
            <input type="radio" name="role" value="4">
            Admin Approval GC
            </label>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="sbmt-approval">Send Approval</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="mdl-approval-user" tabindex="-1" role="dialog" aria-labelledby="anomor1" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <form id="form-approval-user">
        <input type="hidden" name="id_project" class="hdnid_project" value="">
        <div class="modal-body">
          <table class="table">
            <tr>
              <th></th>
              <th>Username</th>
              <th>Display Name</th>
            </tr>
          <?php 
            foreach ($adminpii as $key => $value) {
          ?>
          <tr>

              <td><input type="checkbox" name="username[]" value="<?php echo $value->username; ?>"></td>
              <td><?php echo $value->username; ?> 
              <td><?php echo $value->username; ?>
          </tr>
          <?php
            }
          ?>
        </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="sbmt-approval-user">Send Admin User</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
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
<!-- <script>
  $(function () {
    $("#example1").DataTable();
    $("#send").DataTable();

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });


    function view_daily($id)
    {


        $.ajax({
         type : 'post',
         url : 'Report/getreport/'+$id,
        success: function(data)
        {
            $('.fetched-data').html(data);//menampilkan data ke dalam modal
            $('#modal_view').modal('show'); // show bootstrap modal when complete loaded

        }
      });
    }

    function delete_daily($id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data from database
          $.ajax({
            url : "<?php echo site_url('dashboard/remove_daily')?>/"+ $id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               
               location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting');
            }
        });

      }
    }

    $('#filter_status').on('change', function(){
      if ( $(this).val() == 0 ) {
        window.location = "<?php echo site_url('dashboard/submissionpage')?>";
      }else{
        window.location = "<?php echo site_url('dashboard/submissionpage')?>?filter_status="+$(this).val();
      }
    });

    $("#sbmt-approval").on('click', function(){
      $.ajax({        
          type: "POST", // Method pengiriman data bisa dengan GET atau POST        
          url: "<?php echo base_url("index.php/dashboard/saveapproval"); ?>", // Isi dengan url/path file php yang dituju       
          data: $("#form-approval").serialize(), // data yang akan dikirim ke file yang dituju        
          success: function(response){ // Ketika proses pengiriman berhasil          
              $("#mdl-approval").modal('hide'); // Sembunyikan loadingnya   
               location.reload();       
              alert('Send Approval success')
          }      
      });
    });

    $("#sbmt-approval-user").on('click', function(){
      $.ajax({        
          type: "POST", // Method pengiriman data bisa dengan GET atau POST        
          url: "<?php echo base_url("index.php/dashboard/saveapprovaluser"); ?>", // Isi dengan url/path file php yang dituju       
          data: $("#form-approval-user").serialize(), // data yang akan dikirim ke file yang dituju        
          success: function(response){ // Ketika proses pengiriman berhasil          
              $("#mdl-approval-user").modal('hide'); // Sembunyikan loadingnya  
              location.reload();      
              alert('Send Approval success')
          }      
      });
    });

    function setHdn(value){
      $(".hdnid_project").val(value);
    }

    function backAdmin(value){
      $.ajax({
                  
          type: "POST", // Method pengiriman data bisa dengan GET atau POST        
          url: "<?php echo base_url("index.php/dashboard/backtoadmin"); ?>", // Isi dengan url/path file php yang dituju       
          data: "id_project=" + value, // data yang akan dikirim ke file yang dituju        
          success: function(response){ // Ketika proses pengiriman berhasil 
              location.reload();           
              alert('Back to Admin success')
          }      
      });
    }
</script> -->
</body>
</html>
