<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <base href="<?php echo base_url() ?>">
  <title>Corporate Strategy and Finance</title>
  
  <link rel="icon" type="image/png" href="assets/login/images/menu_app_logo2.png"/>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="assets/admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="assets/admin/plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="assets/admin/dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="assets/admin/plugins/iCheck/all.css">
    <!-- Select2 -->
  <link rel="stylesheet" href="assets/admin/bower_components/select2/dist/css/select2.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<style type="text/css">
/*
.cbx {
  position: relative;
  display: block;
  float: left;
  width: 18px;
  height: 18px;
  border-radius: 4px;
  background-color: #606062;
  background-image: linear-gradient(#474749, #606062);
  box-shadow: inset 0 1px 1px rgba(255,255,255,0.15), inset 0 -1px 1px rgba(0,0,0,0.15);
  transition: all 0.15s ease;
}
.cbx svg {
  position: absolute;
  top: 3px;
  left: 3px;
  fill: none;
  stroke-linecap: round;
  stroke-linejoin: round;
  stroke: #fff;
  stroke-width: 2;
  stroke-dasharray: 17;
  stroke-dashoffset: 17;
  transform: translate3d(0, 0, 0);
}
.rdo {
  position: relative;
  display: block;
  float: left;
  width: 18px;
  height: 18px;
  border-radius: 10px;
  background-color: #606062;
  background-image: linear-gradient(#474749, #606062);
  box-shadow: inset 0 1px 1px rgba(255,255,255,0.15), inset 0 -1px 1px rgba(0,0,0,0.15);
  transition: all 0.15s ease;
}
.rdo:after {
  content: "";
  position: absolute;
  display: block;
  top: 6px;
  left: 6px;
  width: 6px;
  height: 6px;
  border-radius: 50%;
  background: #fff;
  opacity: 0;
  transform: scale(0);
}
.cbx + span,
.rdo + span {
  float: left;
  margin-left: 6px;
}
.forms {
  margin: auto;
  user-select: none;
}
.forms label {
  display: inline-block;
  margin: 10px;
  cursor: pointer;
}
.forms input[type="checkbox"],
.forms input[type="radio"] {
  position: absolute;
  opacity: 0;
}
.forms input[type="radio"]:checked + .rdo {
  background-color: #606062;
  background-image: linear-gradient(#255cd2, #1d52c1);
}
.forms input[type="radio"]:checked + .rdo:after {
  opacity: 1;
  transform: scale(1);
  transition: all 0.15s ease;
}
.forms input[type="checkbox"]:checked + .cbx {
  background-color: #606062;
  background-image: linear-gradient(#255cd2, #1d52c1);
}
.forms input[type="checkbox"]:checked + .cbx svg {
  stroke-dashoffset: 0;
  transition: all 0.15s ease;
}
*/
</style>
<div class="wrapper">
  <header class="main-header">

    <!-- Logo -->
    <a href="Dashboard" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>C</b>SF</span>
      <!-- logo for regular state and mobile devices -->
      <span><img width="60px" height="35px;" src="<?=base_url('assets/admin/images/login_app_logo.png');?>" /></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
 
          <!-- Tasks: style can be found in dropdown.less -->

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="assets/admin/dist/img/avatar5.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata("display_name"); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="assets/admin/dist/img/avatar5.png" class="img-circle" alt="User Image">

                <p>
                 <span class="hidden-xs"><?php echo $this->session->userdata("display_name"); ?></span>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#"></a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#"></a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#"></a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                   
                </div>
                <div class="pull-right">
                  <!-- <a href="http://application.iigf.co.id/portal" class="btn btn-success btn-flat">Kembali ke portal</a> -->
                  <a href="login/logout" class="btn btn-success btn-flat">Logout</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->

      </form>    
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">        
        
        <li class="<?php echo $dashboard?>"><a href="Dashboard"><i class="fa fa-dashboard"></i><span>My Dashboard</a></span></li>
        <li class="treeview">
          <a href="">
            <i class="glyphicon glyphicon-inbox"></i>
            <span>My Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="Dashboard/dp"><i class="fa fa-circle-o"></i>List of Direct Payment Request</a></li>
            <li><a href="Dashboard/ar"><i class="fa fa-circle-o"></i>List of Advance Request</a></li>
            <li><a href="Dashboard/asr"><i class="fa fa-circle-o"></i>List of Advance <br>Settlement Request</a></li>
            <li><a href="Dashboard/lop"><i class="fa fa-circle-o"></i>List of Payment</a></li>
            <li><a href="Dashboard/op"><i class="fa fa-circle-o"></i>List of Outstanding Payment</a></li>
            <li><a href="Dashboard/dr"><i class="fa fa-circle-o"></i>List of Draft Request</a></li>
          </ul>  
        </li>
        <li class="<?php echo $monitoring?>"><a href="Dashboard/monitoring"><i class="glyphicon glyphicon-list-alt"></i><span>Monitoring</a></span></li>
        <li class="treeview">
          <a href="">
            <i class="glyphicon glyphicon-console"></i>
            <span>Monitoring Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="Dashboard/List_or"><i class="fa fa-circle-o"></i>List of Outstanding Request</a></li>
            <li><a href="Dashboard/List_upt"><i class="fa fa-circle-o"></i>List of Under Processing (Tax)</a></li>
            <li><a href="Dashboard/List_upf"><i class="fa fa-circle-o"></i>List of Under <br>Processing (Finance)</a></li>
            <li><a href="Dashboard/List_wfr"><i class="fa fa-circle-o"></i>List of Waiting for Review</a></li>
            <li><a href="Dashboard/List_wfv"><i class="fa fa-circle-o"></i>List of Waiting for Verification</a></li>
            <li><a href="Dashboard/List_wfa"><i class="fa fa-circle-o"></i>List of Waiting for Approval</a></li>
            <li><a href="Dashboard/List_wfp"><i class="fa fa-circle-o"></i>List of Waiting for Payment</a></li>
            <li><a href="Dashboard/List_pr"><i class="fa fa-circle-o"></i>List of Paid Request</a></li>
          </ul>  
        </li>
        <li class="<?php echo $task?>"><a href="Dashboard/my_task"><i class="glyphicon glyphicon-list-alt"></i><span>My Task</a></span></li>
        <?php foreach ($reject as $notif) { ?>
        <li class="<?php echo $inbox?>"><a href="Dashboard/my_inbox"><i class="glyphicon glyphicon-envelope"></i><span>My Inbox</span><small class="label pull-right bg-red"><?php echo $notif->totrejected; ?> </small></a></li>
        <?php } ?>
        <li class="<?php echo $report_pajak?>" ><a href="Dashboard/report_pajak"><i class="glyphicon glyphicon-list-alt"></i><span>Report Pajak</a></span></li>
        <!-- <li class="header">MASTER DATA</li>
          <li class="<?php echo $currency?>"><a href="Dashboard/currency"><i class="glyphicon glyphicon-user"></i><span>Currency</a></span></li>
          <li class="<?php echo $bank?>"><a href="Dashboard/bank"><i class="glyphicon glyphicon-user"></i><span>Bank Account</a></span></li> -->
        <br>
        <?php 
         if($this->session->userdata("role_id") == 4){ ?>
        <li><center><button type="button" data-toggle="modal" data-target="#activate" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i>&nbsp;ACTIVATED APPROVAL</button></a></center></li>
        <?php } ?> 
        <br>
        <br>
        
        <?php 
            // }else{ ?>
               <!-- <li class=""><a href="dashboard"><i class="glyphicon glyphicon-blackboard"></i><span>Dashboard</span></a></li>
               <li class=""><a href=""><i class="glyphicon glyphicon-hdd"></i><span>Master Data</span></a></li>
               <li class="header">Other</li>
               <li class=""><a href="admin/datauser"><i class="glyphicon glyphicon-user"></i><span>User</a></span></li> -->
        <?php 
            // } ?>
        <li><center><a href="Dashboard/form_add" target="_blank"><button type="button" class="btn btn-success btn-lg"><i class="glyphicon glyphicon-plus"></i>&nbsp;CREATE SP3</button></a></center></li>
        <!-- <li><center><button type="button" data-toggle="modal" data-target="#modalNext" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i>&nbsp;CREATE FORM</button></a></center></li>       -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

<div class="modal fade" id="activate" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
   <div class="modal-content">                                        
    <div class="modal-body">
    <form id="activated" method="post" action="dashboard/activated">
      <p align="justify">Apakah anda ingin mengaktifkan/menon-aktifkan Approval Requestor Signature?</p>
      <input type="radio" name="activate" value="On"> ON</input><br>
      <input type="radio" name="activate" value="Off"> OFF</input><br>
    </div>
    <div class="modal-footer">                        
     <button type="submit" class="btn btn-success bye">Yes</button>
     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </form>
    </div>
   </div>
  </div>
</div>

  <div class="modal fade" id="modalNext" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <div class="col-xs-12">
                <!-- /.box -->
                <div class="box">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <div class="box-body">
                      <h5>
                        <br>
                        <center><img src="assets/dashboard/images/logo.png" alt="Logo Images"></center>
                        <br>
                        <center><b><u><font size="+1" style="font-family: calibri;">CREATE FORM</font></u></b></center>
                      </h5>

                      <a href="Dashboard/form_add" target="_blank"><button type="button" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i>&nbsp; FORM SPPP</button></a> &nbsp;&nbsp;&nbsp;
                      <br><br>
                      <a href="Dashboard/form_arf" target="_blank"><button type="button" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i>&nbsp; FORM ARF</button></a> &nbsp;&nbsp;&nbsp;
                      <a href="Dashboard/form_asf" target="_blank"><button type="button" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i>&nbsp; FORM ASF</button></a>
                      <br><br>
                      <a href="Dashboard/form_prf" target="_blank"><button type="button" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i>&nbsp; FORM PRF</button></a>&nbsp;&nbsp;&nbsp;
                      <a href="Dashboard/form_crf" target="_blank"><button type="button" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i>&nbsp; FORM CRF</button></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
          </div>
        </div>
      </div>
  </div>
