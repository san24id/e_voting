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
<body class="hold-transition skin-blue sidebar-mini" style="background-image: url('assets/login/images/header2.png');">

<div class="wrapper">
  <header class="main-header">

    <!-- Logo -->
    <a href="Approval" class="logo" style="background-image: url('assets/login/images/header2.png');background-repeat: no-repeat;
  background-size: 300px 100px;">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>C</b>SF</span>
      <!-- logo for regular state and mobile devices -->
      <span><img src="<?=base_url('assets/login/images/headerr.png');?>" /></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background-image: url('assets/login/images/header2.png');background-repeat: repeat;
  background-size: 1200px 100px;">
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
              <img src="assets/dashboard/dist/img/profile24.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><font color="black"><?php echo $this->session->userdata("display_name"); ?></font></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="assets/dashboard/dist/img/profile24.png" class="img-circle" alt="User Image">

                <p>
                 <span class="hidden-xs"><font color="black"><?php echo $this->session->userdata("display_name"); ?></font></span>
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
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  
  <aside class="main-sidebar" style="background-image: url('assets/login/images/side_bar2.png');">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->

      </form>    
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">        
        <?php 
         if($this->session->userdata("id_role_app") == 4){ ?>
         <?php foreach ($w_approval as $notifApproval) { ?>
        <li id="appr" class="<?php echo $l_approval ?>"><a href="Approval"><i class="glyphicon glyphicon-list-alt"></i><span>Approval</span><small class="label pull-right bg-red"><?php echo $notifApproval->w_approval; ?> </small></a></li>
        <?php } ?>
        <li class="treeview" id="li-approval">
          <a href="">
            <i class="glyphicon glyphicon-list"></i>
            <span>Approval Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="wfa" class="<?php echo $wfa?>"><a href="Approval/wfa"><i class="fa fa-circle-o"></i>List of Waiting for Approval</a></li>
            <li id="apr" class="<?php echo $approved?>"><a href="Approval/approvedList"><i class="fa fa-circle-o"></i>List of Approved</a></li>
          </ul>  
        </li> 

        <?php foreach ($reject as $notif) { ?>
        <li class="<?php echo $inbox ?>"><a href="Approval/my_inbox"><i class="glyphicon glyphicon-envelope"></i><span>My Inbox</span><small class="label pull-right bg-red"><?php echo $notif->totrejected; ?> </small></a></li>

        <li class="<?php echo $index?>"><a href="Approval/my_dashboard"><i class="fa fa-dashboard"></i><span>My SP3 Dashboard</a></span></li>
        <li class="treeview" id="li-report">
          <a href="">
            <i class="glyphicon glyphicon-inbox"></i>
            <span>My SP3 Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="ldp"><a href="Approval/ldp"><i class="fa fa-circle-o"></i>List of Direct Payment Request</a></li>
            <li id="lar"><a href="Approval/lar"><i class="fa fa-circle-o"></i>List of Advance Request</a></li>
            <li id="lasr"><a href="Approval/lasr"><i class="fa fa-circle-o"></i>List of Advance Settlement<br><i class="fa"></i>Request</a></li>
            <li id="lcr"><a href="Approval/lcr"><i class="fa fa-circle-o"></i>List of Cash Received Request</a></li>
            <li id="lop"><a href="Approval/lop"><i class="fa fa-circle-o"></i>List of Payment</a></li>
            <li id="op"><a href="Approval/op"><i class="fa fa-circle-o"></i>List of Outstanding Payment<br><i class="fa"></i>Request</a></li>
            <li id="dr"><a href="Approval/dr"><i class="fa fa-circle-o"></i>List of Draft Request</a></li>
          </ul>  
        </li>

        <?php 
          if($this->session->userdata("role_id") == 4){
            $sql = "SELECT activate FROM m_status WHERE id_status=11";
            $query = $this->db->query($sql)->result();
            // return $query;
            // var_dump($query);exit; 
            $iya = "";
            foreach ($query as $signature):
              $iya.= $signature->activate;
            endforeach;

              if ($iya == "ON"){
                foreach ($notif_approval as $notifapproval) {?>
                  <li class="<?php echo $waiting_approval?>"><a href="Approval/wait_for_approval"><i class="glyphicon glyphicon-print"></i><span>Waiting For Approval</span><small class="label pull-right bg-red"><?php echo $notifapproval->taskapproval; ?> </small></a></li>
                <?php } ?> 
              <?php } ?> 
        <?php } ?>
                
        <br>
        <br>
        <br>
        
        <?php 
            // }else{ ?>
               <!-- <li class=""><a href="dashboard"><i class="glyphicon glyphicon-blackboard"></i><span>Dashboard</span></a></li>
               <li class=""><a href=""><i class="glyphicon glyphicon-hdd"></i><span>Master Data</span></a></li>
               <li class="header">Other</li>
               <li class=""><a href="admin/datauser"><i class="glyphicon glyphicon-user"></i><span>User</a></span></li> -->
        <?php 
            } }?>

        <?php if($this->session->userdata("role_id") == 2 || $this->session->userdata("role_id") == 3){ ?>
        <li><center><a href="Approval/form_add"><button type="button" class="btn btn-success btn-lg"><i class="glyphicon glyphicon-plus"></i>&nbsp;CREATE SP3</button></a></center></li>    
        <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>