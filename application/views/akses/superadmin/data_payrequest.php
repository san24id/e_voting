  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DATA STAFF
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
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah">Tambah</button>
                <br><br>
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NO.</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Username</th>
                  <th>Role</th>
                  <th>Jabatan</th>
                  <th>Divisi</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 1;
                    foreach ($profil as $row){
                   ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $row->display_name; ?></td>
                  <td><?php echo $row->email; ?></td>
                  <td><?php echo $row->username; ?></td>
                  <td><?php if($row->id_role_app == 1){
                              echo "Administrator";
                            }else if($row->id_role_app == 2){
                              echo "Admin CSF";
                            }else if($row->id_role_app == 3){
                              echo "User";
                            }else if($row->id_role_app == 4){
                              echo "Approval";
                            }else if($row->id_role_app == 5){
                              echo "TRI";                            
                            } ?>
                  </td>
                  <td><?php if($row->role_id == 1){
                              echo "Administrator";
                            }else if($row->role_id == 2){
                              echo "Admin CSF";
                            }else if($row->role_id == 3){
                              echo "User";
                            }else if($row->role_id == 4){
                              echo "Division Head";
                            }else if($row->role_id == 5){
                              echo "PIC"; 
                            }else if($row->role_id == 6){
                                echo "Direksi CEO"; 
                            }else if($row->role_id == 7){
                                echo "Direksi RAC"; 
                            }else if($row->role_id == 8){
                                echo "Direksi COO";
                            }else if($row->role_id == 9){
                                echo "Direksi CFO";

                            } ?>
                  </td>
                  <td><?php echo $row->division_id; ?></td>
                  <td><?php echo $row->role_status; ?> </td>
                  <td>
                    <?php if($row->id_role_app == 1){ ?>
                      <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#ubah<?php echo $row->id_user; ?>">Ubah</button>
                    <?php }else{ ?>
                      <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#ubah<?php echo $row->id_user; ?>">Ubah</button>
                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?php echo $row->id_user; ?>">Hapus</button>
                    <?php } ?>
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
    <strong> Copyright &copy; 2020 </footer>

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
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->

<!-- Modal -->
  <div class="modal fade" id="tambah" role="dialog" aria-hidden="true"  tabindex="-1"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Admin Staff</h4>
        </div>
        <div class="modal-body">
          <h5>
            <form id="acc" method="post" action="superadm/addstaff">
             <table class="table">
                <tr>
                  <th>Nama</th>
                  <td>:</td>
                  <td><input type="text" name="display_name" class="form-control"></td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td>:</td>
                  <td><input type="text" name="email" class="form-control"></td>
                </tr>
                <tr>
                  <th>Username</th>
                  <td>:</td>
                  <td><input type="text" name="username" class="form-control"></td>
                </tr>
                <tr>
                  <th>Divisi</th>
                  <td>:</td>
                  <td><select id="divisi" name="division_id" class="form-control">
                            <option value="">--Choose--</option>
                            <?php foreach ($getDivisi as $dvs) { ?>
                            <option value="<?php echo $dvs->division_id; ?>"><?php echo $dvs->division_name; ?> - <?php echo $dvs->division_id; ?></option>
                            <?php } ?>                                 
                      </select>
                  </td>
                </tr>
                <tr>
                  <th>Role</th>
                  <td>:</td>
                  <td>
                    <select name="id_role_app" class="form-control">
                         <option value="1">Administrator</option>
                         <option value="2">Admin CSF</option>
                         <option value="3">User</option>
                         <option value="4">Approval</option>
                         <option value="5">TRI</option>
                                     
                    </select>
                      <input type="hidden" name="password" class="form form-control" value="123456">
                  </td>
                </tr>
                <tr>
                  <th>Jabatan</th>
                  <td>:</td>
                  <td><select name="role_id" class="form-control">
                       <option value="2">Admin CSF</option>
                       <option value="3">User</option>
                       <option value="4">Division Head</option>
                       <option value="5">PIC</option>
                       <option value="6">Direksi CEO</option>
                       <option value="7">Direksi RAC</option>
                       <option value="8">Direksi COO</option>
                       <option value="9">Direksi CFO</option>   
                  </td>
                </tr>
                <tr>
                  <th>Status</th>
                  <td>:</td>
                  <td><input type="text" name="role_status" class="form-control"></td>
                </tr>
                <tr>                  
                  <td><input type="hidden" name="status" value="1" class="form-control"></td>
                  <td><input type="hidden" name="created_by" value="Sistem" class="form-control"></td>
                  <td><input type="hidden" name="created_date" value="<?php echo date("Y-m-d"); ?>" class="form-control"></td>
                  <td><input type="hidden" name="status_login" value="0" class="form-control"></td>
                  <td><input type="hidden" name="status_mail1" value="0" class="form-control"></td>
                  <td><input type="hidden" name="status_mail2" value="0" class="form-control"></td>
                  <input type="hidden" name="password" class="form form-control" value="123456">

                </tr>
             </table>
          </h5>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" id="nambah">Add</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </form>
        </div>
      </div>
      
    </div>
  </div>

<?php 
  foreach ($profil as $row){
?>

<!-- Modal -->
  <div class="modal fade" id="ubah<?php echo $row->id_user; ?>" role="dialog" aria-hidden="true"  tabindex="-1"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ubah Staff</h4>
           
        </div>
        <div class="modal-body">
          <h5>
            <form id="ganti" method="post" action="superadm/updatestaff">
              <input type="hidden" name="id_user" value="<?php echo $row->id_user; ?>">
             <table class="table">
                <tr>
                  <th>Nama</th>
                  <td>:</td>
                  <td><input type="text" name="display_name" class="form-control" value="<?php echo $row->display_name; ?>"></td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td>:</td>
                  <td><input type="text" name="email" class="form-control" value="<?php echo $row->email; ?>"></td>
                </tr>
                <tr>
                  <th>Username</th>
                  <td>:</td>
                  <td><input type="text" name="username" class="form-control" value="<?php echo $row->username; ?>"></td>
                </tr>
                <?php if($row->id_role_app != 1){ ?>
                <tr>
                  <th>Role</th>
                  <td>:</td>
                  <td>
                  <select name="id_role_app" class="form-control">                    
                    <?php if($row->id_role_app == 2){ ?>                         
                       <option value="2"<?php echo $row->id_role_app==2? 'selected':''?>>Admin CSF</option>
                       <option value="3" <?php echo $row->id_role_app==3? 'selected':''?>>User</option>
                       <option value="4" <?php echo $row->id_role_app==4? 'selected':''?>>Approval</option>
                       <option value="5"<?php echo $row->id_role_app==5? 'selected':''?>>TRI</option>
                       <!-- <option value="6">Direksi CEO</option>
                       <option value="7">Direksi RAC</option>
                       <option value="8">Direksi COO</option>
                       <option value="9">Direksi CFO</option>   --> 
                    <?php }else if($row->id_role_app == 3){ ?>
                       <option value="2"<?php echo $row->id_role_app==2? 'selected':''?>>Admin CSF</option>
                       <option value="3" <?php echo $row->id_role_app==3? 'selected':''?>>User</option>
                       <option value="4" <?php echo $row->id_role_app==4? 'selected':''?>>Approval</option>
                       <option value="5"<?php echo $row->id_role_app==5? 'selected':''?>>TRI</option>
                       <!-- <option value="6">Direksi CEO</option>
                       <option value="7">Direksi RAC</option>
                       <option value="8">Direksi COO</option>
                       <option value="9">Direksi CFO</option>   -->  
                    <?php }else if($row->id_role_app == 4){ ?>
                       <option value="2"<?php echo $row->id_role_app==2? 'selected':''?>>Admin CSF</option>
                       <option value="3" <?php echo $row->id_role_app==3? 'selected':''?>>User</option>
                       <option value="4" <?php echo $row->id_role_app==4? 'selected':''?>>Approval</option>
                       <option value="5"<?php echo $row->id_role_app==5? 'selected':''?>>TRI</option>
                       <!-- <option value="6">Direksi CEO</option>
                       <option value="7">Direksi RAC</option>
                       <option value="8">Direksi COO</option>
                       <option value="9">Direksi CFO</option>   -->                       
                    <?php }else if($row->id_role_app == 5){ ?>
                       <option value="2"<?php echo $row->id_role_app==2? 'selected':''?>>Admin CSF</option>
                       <option value="3" <?php echo $row->id_role_app==3? 'selected':''?>>User</option>
                       <option value="4" <?php echo $row->id_role_app==4? 'selected':''?>>Approval</option>
                       <option value="5"<?php echo $row->id_role_app==5? 'selected':''?>>TRI</option>
                       <!-- <option value="6">Direksi CEO</option>
                       <option value="7">Direksi RAC</option>
                       <option value="8">Direksi COO</option>
                       <option value="9">Direksi CFO</option>   -->                    
                    <?php }else{ ?>
                       <option value="2"<?php echo $row->id_role_app==2? 'selected':''?>>Admin CSF</option>
                       <option value="3" <?php echo $row->id_role_app==3? 'selected':''?>>User</option>
                       <option value="4" <?php echo $row->id_role_app==4? 'selected':''?>>Approval</option>
                       <option value="5"<?php echo $row->id_role_app==5? 'selected':''?>>TRI</option>
                       <!-- <option value="6">Direksi CEO</option>
                       <option value="7">Direksi RAC</option>
                       <option value="8">Direksi COO</option>
                       <option value="9">Direksi CFO</option>   -->
                    <?php } ?>
                  </select>                      
                  </td>
                </tr>                 
                <tr>
                  <th>Divisi</th>
                  <td>:</td>
                  <td><select id="divisi" name="division_id" class="form-control" onchange="chgadd();">
                            <option value="<?php echo $row->division_id; ?>"><?php echo $row->division_id; ?></option>
                            <option value="">--Choose--</option>
                            <?php foreach ($getDivisi as $dvs) { ?>
                            <option value="<?php echo $dvs->division_id; ?>"><?php echo $dvs->division_name; ?> - <?php echo $dvs->division_id; ?></option>
                            <?php } ?>                                 
                      </select>
                  </td>
                </tr>
                <?php if($row->role_id != 1){ ?>
                <tr>
                  <th>Jabatan</th>
                  <td>:</td>
                  <td>
                  <select name="role_id" class="form-control">                    
                    <?php if($row->role_id == 2){ ?>                         
                       <option value="2"<?php echo $row->role_id==2? 'selected':''?>>Admin CSF</option>
                       <option value="3"<?php echo $row->role_id==3? 'selected':''?>>User</option>
                       <option value="4"<?php echo $row->role_id==4? 'selected':''?>>Division Head</option>
                       <option value="5"<?php echo $row->role_id==5? 'selected':''?>>PIC</option>
                       <option value="6"<?php echo $row->role_id==6? 'selected':''?>>Direksi CEO</option>
                       <option value="7"<?php echo $row->role_id==7? 'selected':''?>>Direksi RAC</option>
                       <option value="8"<?php echo $row->role_id==8? 'selected':''?>>Direksi COO</option>
                       <option value="9"<?php echo $row->role_id==9? 'selected':''?>>Direksi CFO</option>   
                    <?php }else if($row->role_id == 3){ ?>
                       <option value="2"<?php echo $row->role_id==2? 'selected':''?>>Admin CSF</option>
                       <option value="3"<?php echo $row->role_id==3? 'selected':''?>>User</option>
                       <option value="4"<?php echo $row->role_id==4? 'selected':''?>>Division Head</option>
                       <option value="5"<?php echo $row->role_id==5? 'selected':''?>>PIC</option>
                       <option value="6"<?php echo $row->role_id==6? 'selected':''?>>Direksi CEO</option>
                       <option value="7"<?php echo $row->role_id==7? 'selected':''?>>Direksi RAC</option>
                       <option value="8"<?php echo $row->role_id==8? 'selected':''?>>Direksi COO</option>
                       <option value="9"<?php echo $row->role_id==9? 'selected':''?>>Direksi CFO</option>  
                    <?php }else if($row->role_id == 4){ ?>
                       <option value="2"<?php echo $row->role_id==2? 'selected':''?>>Admin CSF</option>
                       <option value="3"<?php echo $row->role_id==3? 'selected':''?>>User</option>
                       <option value="4"<?php echo $row->role_id==4? 'selected':''?>>Division Head</option>
                       <option value="5"<?php echo $row->role_id==5? 'selected':''?>>PIC</option>
                       <option value="6"<?php echo $row->role_id==6? 'selected':''?>>Direksi CEO</option>
                       <option value="7"<?php echo $row->role_id==7? 'selected':''?>>Direksi RAC</option>
                       <option value="8"<?php echo $row->role_id==8? 'selected':''?>>Direksi COO</option>
                       <option value="9"<?php echo $row->role_id==9? 'selected':''?>>Direksi CFO</option>                        
                    <?php }else if($row->role_id == 5){ ?>
                       <option value="2"<?php echo $row->role_id==2? 'selected':''?>>Admin CSF</option>
                       <option value="3"<?php echo $row->role_id==3? 'selected':''?>>User</option>
                       <option value="4"<?php echo $row->role_id==4? 'selected':''?>>Division Head</option>
                       <option value="5"<?php echo $row->role_id==5? 'selected':''?>>PIC</option>
                       <option value="6"<?php echo $row->role_id==6? 'selected':''?>>Direksi CEO</option>
                       <option value="7"<?php echo $row->role_id==7? 'selected':''?>>Direksi RAC</option>
                       <option value="8"<?php echo $row->role_id==8? 'selected':''?>>Direksi COO</option>
                       <option value="9"<?php echo $row->role_id==9? 'selected':''?>>Direksi CFO</option>  
                    <?php }else if($row->role_id == 6){ ?>
                       <option value="2"<?php echo $row->role_id==2? 'selected':''?>>Admin CSF</option>
                       <option value="3"<?php echo $row->role_id==3? 'selected':''?>>User</option>
                       <option value="4"<?php echo $row->role_id==4? 'selected':''?>>Division Head</option>
                       <option value="5"<?php echo $row->role_id==5? 'selected':''?>>PIC</option>
                       <option value="6"<?php echo $row->role_id==6? 'selected':''?>>Direksi CEO</option>
                       <option value="7"<?php echo $row->role_id==7? 'selected':''?>>Direksi RAC</option>
                       <option value="8"<?php echo $row->role_id==8? 'selected':''?>>Direksi COO</option>
                       <option value="9"<?php echo $row->role_id==9? 'selected':''?>>Direksi CFO</option>  
                    <?php }else if($row->role_id == 7){ ?>
                       <option value="2"<?php echo $row->role_id==2? 'selected':''?>>Admin CSF</option>
                       <option value="3"<?php echo $row->role_id==3? 'selected':''?>>User</option>
                       <option value="4"<?php echo $row->role_id==4? 'selected':''?>>Division Head</option>
                       <option value="5"<?php echo $row->role_id==5? 'selected':''?>>PIC</option>
                       <option value="6"<?php echo $row->role_id==6? 'selected':''?>>Direksi CEO</option>
                       <option value="7"<?php echo $row->role_id==7? 'selected':''?>>Direksi RAC</option>
                       <option value="8"<?php echo $row->role_id==8? 'selected':''?>>Direksi COO</option>
                       <option value="9"<?php echo $row->role_id==9? 'selected':''?>>Direksi CFO</option>  
                    <?php }else if($row->role_id == 8){ ?>
                      <option value="2"<?php echo $row->role_id==2? 'selected':''?>>Admin CSF</option>
                       <option value="3"<?php echo $row->role_id==3? 'selected':''?>>User</option>
                       <option value="4"<?php echo $row->role_id==4? 'selected':''?>>Division Head</option>
                       <option value="5"<?php echo $row->role_id==5? 'selected':''?>>PIC</option>
                       <option value="6"<?php echo $row->role_id==6? 'selected':''?>>Direksi CEO</option>
                       <option value="7"<?php echo $row->role_id==7? 'selected':''?>>Direksi RAC</option>
                       <option value="8"<?php echo $row->role_id==8? 'selected':''?>>Direksi COO</option>
                       <option value="9"<?php echo $row->role_id==9? 'selected':''?>>Direksi CFO</option>  
                    <?php }else if($row->role_id == 9){ ?>
                      <option value="2"<?php echo $row->role_id==2? 'selected':''?>>Admin CSF</option>
                       <option value="3"<?php echo $row->role_id==3? 'selected':''?>>User</option>
                       <option value="4"<?php echo $row->role_id==4? 'selected':''?>>Division Head</option>
                       <option value="5"<?php echo $row->role_id==5? 'selected':''?>>PIC</option>
                       <option value="6"<?php echo $row->role_id==6? 'selected':''?>>Direksi CEO</option>
                       <option value="7"<?php echo $row->role_id==7? 'selected':''?>>Direksi RAC</option>
                       <option value="8"<?php echo $row->role_id==8? 'selected':''?>>Direksi COO</option>
                       <option value="9"<?php echo $row->role_id==9? 'selected':''?>>Direksi CFO</option>                  
                    <?php }else{ ?>
                       <option value="2"<?php echo $row->role_id==2? 'selected':''?>>Admin CSF</option>
                       <option value="3"<?php echo $row->role_id==3? 'selected':''?>>User</option>
                       <option value="4"<?php echo $row->role_id==4? 'selected':''?>>Division Head</option>
                       <option value="5"<?php echo $row->role_id==5? 'selected':''?>>PIC</option>
                       <option value="6"<?php echo $row->role_id==6? 'selected':''?>>Direksi CEO</option>
                       <option value="7"<?php echo $row->role_id==7? 'selected':''?>>Direksi RAC</option>
                       <option value="8"<?php echo $row->role_id==8? 'selected':''?>>Direksi COO</option>
                       <option value="9"<?php echo $row->role_id==9? 'selected':''?>>Direksi CFO</option>                         
                    <?php }} ?>
                </select>
                </td>
                </tr>
                <tr>
                  <th>Status</th>
                  <td>:</td>
                  <td><input type="text" name="role_status" class="form-control" value="<?php echo $row->role_status; ?>"></td>
                </tr>
                <tr>
                  <th>Aktif</th>
                  <td>:</td>
                  <td><input type="checkbox" name="status" value="1" <?php echo $row->$status==1? 'checked':''?> >Ya</label><br>
                      <input type="checkbox" name="status" value="0" <?php echo $row->$status==0? 'checked':''?> >Tidak</label><br>
                  </td>
                </tr>
              <?php } ?>
             </table>
          </h5>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success rubah" >Save</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </form>
        </div>
      </div>
      
    </div>
  </div>

<div class="modal fade" id="hapus<?php echo $row->id_user; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">

      <div class="modal-body">
       <p align="justify">Apa Anda yakin akan menghapus dengan Nama :  <?=$row->display_name?></p>
       <p> Username : <?=$row->username?> </p>
      </div>
      <div class="modal-footer">
      <form id="deleted" method="post" action="superadm/deletestaff">
          <input type="hidden" name="id_user" value="<?php echo $row->id_user; ?>">
          <button type="submit" class="btn btn-success bye">Yes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url(); ?>assets/dashboard/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url(); ?>assets/dashboard/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/dashboard/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dashboard/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url(); ?>assets/dashboard/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/dashboard/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dashboard/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dashboard/dist/js/demo.js"></script>
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

  $("#nambah").on('click', function(){
      $.ajax({        
          type: "POST", // Method pengiriman data bisa dengan GET atau POST        
          // url: "<?php echo base_url("index.php/superadm/addstaff"); ?>", // Isi dengan url/path file php yang dituju       
          data: $("#acc").serialize(), // data yang akan dikirim ke file yang dituju        
          success: function(response){ // Ketika proses pengiriman berhasil          
              $("#tambah").modal('hide'); // Sembunyikan loadingnya   
               location.reload();       
              alert('Create User success')
          }      
      });
    });

  $(".rubah").on('click', function(){
      $.ajax({        
          type: "POST", // Method pengiriman data bisa dengan GET atau POST        
          // url: "<?php echo base_url("index.php/superadm/updatestaff"); ?>", // Isi dengan url/path file php yang dituju       
          data: $("#ganti").serialize(), // data yang akan dikirim ke file yang dituju        
          success: function(response){ // Ketika proses pengiriman berhasil          
              $("#ubah").modal('hide'); // Sembunyikan loadingnya   
               location.reload();       
              alert('Update User success')
          }      
      });
  });  

  $(".bye").on('click', function(){
      $.ajax({        
          type: "POST", // Method pengiriman data bisa dengan GET atau POST        
          // url: "<?php echo base_url("index.php/superadm/deletestaff"); ?>", // Isi dengan url/path file php yang dituju       
          data: $("#deleted").serialize(), // data yang akan dikirim ke file yang dituju        
          success: function(response){ // Ketika proses pengiriman berhasil          
              $("#hapus").modal('hide'); // Sembunyikan loadingnya   
               location.reload();       
              alert('Deleted User success')
          }      
      });
  });  
</script>
</body>