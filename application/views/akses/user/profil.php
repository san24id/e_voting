  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        My Profile
        <small></small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
    
       <div class="row">
          <div class="col-xs-12">
          <!-- /.box -->

          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="post" action="Home/updatemyprofil">
                <?php foreach ($profil as $row):?>
                <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user') ?>">
              <div class="box-body">
                <div class="form-group">
                  <label>1. Nama Lengkap :</label>
                  <input type="text" class="form-control" name="display_name" required="required" value="<?php echo $row->display_name; ?>">
                </div>            
                <div class="form-group">
                  <label>2. Divisi :</label>
                  <input type="text" class="form-control" name="division_id" required="required" value="<?php echo $row->division_id; ?>">
                </div>
                <div class="form-group">
                  <label>3. Jabatan :</label>
                  <input type="text" class="form-control" name="role_status" required="required" value="<?php echo $row->role_status; ?>">
                </div>                
                <div class="form-group">
                  <label>4. Alamat Email :</label>
                  <input type="text" class="form-control" name="email" value="<?php echo $row->email; ?>" readonly>                
                </div>
                <div class="form-group">
                  <label>5. Username :</label>
                  <input type="text" class="form-control" name="username" value="<?php echo $row->username; ?>" readonly>
                </div>
                <div class="form-group">
                  <label>6. Ubah Password</label>
                </div>               
                <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Password Lama">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password_baru" placeholder="Password Baru (minimal 6 karakter)">
                </div>    
               
              <script type="text/javascript">
                    function wajibAngka(evt) {
                    var charCode = (evt.which) ? evt.which : event.keyCode
                    if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
                   }
              </script>

        <button type="submit" class="btn btn-primary">Save</button>
    <?php endforeach; ?>


      </form>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

            <div class="row">
            
            <?php 

              if($this->session->flashdata('msg') == 'gagal_password'){
              echo '<script type="text/javascript">';
              echo ' alert("Password lama anda salah")';  //not showing an alert box.
              echo '</script>';
              }else if($this->session->flashdata('msg') == 'newpassword'){
              echo '<script type="text/javascript">';
              echo ' alert("Password baru minimal 6 karakter")';  //not showing an alert box.
              echo '</script>';
              }else if($this->session->flashdata('msg') == 'sukses'){
              echo '<script type="text/javascript">';
              echo ' alert("Data telah diperbarui")';  //not showing an alert box.
              echo '</script>';
              }
            ?>
            
          </div>
        
      </div>


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
        <b class="modal-title" style="font-size: 25px;">Success</b>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="box-body">
              Sukses 
              <a href="#">LINK1, 
              <a href="#">LINK2      
         </div>
      </div>
      <div class="modal-footer">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">CLOSE</button>
      </div>
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

<script src="assets/dashboard/plugins/iCheck/icheck.min.js"></script>

<!-- Select2 -->
<script src="assets/dashboard/bower_components/select2/dist/js/select2.full.min.js"></script>

<script>
  $('.select2').select2()

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

  $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })


$('#kemen').show();
$('#lemba').hide();
$('#jenis').change(function(){

  var jenis = $('#jenis').val();

  if(jenis == 'Kementerian'){
      $('#kemen').show();
      $('#lemba').hide();
  }else if(jenis == 'Lembaga'){
      $('#kemen').hide();
      $('#lemba').show();
  }

});

$('#rkota').show();
$('#rkabupaten').hide();

$('#daerah').change(function(){
  var daerah = $('#daerah').val();

  if(daerah == 'Kota' ){
     $('#rkota').show();
     $('#rkabupaten').hide();
  }
  else if(daerah == 'Kabupaten' ){
     $('#rkota').hide();
     $('#rkabupaten').show();
  }
});

 $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)    // Kita sembunyikan dulu untuk loadingnya    
          $("#loading").hide(); 
                $("#loading2").hide();        
          $("#provinsi").change(function(){ // Ketika user mengganti atau memilih data provinsi      
            $("#kota").hide(); // Sembunyikan dulu combobox kota nya   
                    $("#kabupaten").hide();   
            $("#loading").show(); // Tampilkan loadingnya          
            $.ajax({        
              type: "POST", // Method pengiriman data bisa dengan GET atau POST        
              url: "<?php echo base_url("index.php/Home/listKota"); ?>", // Isi dengan url/path file php yang dituju       
              data: {
                  id_provinsi : $("#provinsi").val()
                  }, // data yang akan dikirim ke file yang dituju        
              dataType: "json",        
              beforeSend: function(e) {          
                if(e && e.overrideMimeType) {            
                  e.overrideMimeType("application/json;charset=UTF-8");          
                }        
              },        
              success: function(response){ // Ketika proses pengiriman berhasil          
                $("#loading").hide(); // Sembunyikan loadingnya          // set isi dari combobox kota          // lalu munculkan kembali combobox kotanya         
                 $("#kota").html(response.list_kota).show();       
              },        
              error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error          
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error        
              }      
            });

                    $.ajax({        
                        type: "POST", // Method pengiriman data bisa dengan GET atau POST        
                        url: "<?php echo base_url("index.php/Home/listKabupaten"); ?>", // Isi dengan url/path file php yang dituju       
                        data: {
                                id_provinsi : $("#provinsi").val()
                              }, // data yang akan dikirim ke file yang dituju        
                        dataType: "json",        
                        beforeSend: function(e) {          
                            if(e && e.overrideMimeType) {            
                                e.overrideMimeType("application/json;charset=UTF-8");          
                            }        
                        },        
                        success: function(response){ // Ketika proses pengiriman berhasil          
                            $("#loading").hide(); // Sembunyikan loadingnya          // set isi dari combobox kota          // lalu munculkan kembali combobox kotanya         
                             $("#kabupaten").html(response.list_kabupaten).show();       
                        },        
                        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error          
                            alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error        
                        }      
                    });       
          });  
        });  


</script>
</body>
</html>
