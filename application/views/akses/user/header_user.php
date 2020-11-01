<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <base href="<?php echo base_url() ?>">
   <title>Corporate Strategy and Finance</title>
  
  <link rel="icon" type="image/png" href="<?=base_url('assets/login/images/menu_app_logo2.png');?>"/>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="assets/dashboard/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="assets/dashboard/plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dashboard/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="assets/dashboard/dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="assets/dashboard/plugins/iCheck/all.css">
    <!-- Select2 -->
  <link rel="stylesheet" href="assets/dashboard/bower_components/select2/dist/css/select2.min.css">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini" style="background-image: url('assets/login/images/header2.png');">
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
    <a href="Home" class="logo" style="background-image: url('assets/login/images/header2.png');background-repeat: no-repeat;
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
                   <?php echo $this->session->userdata("display_name"); ?>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#"></a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="Home/myprofile" class="btn btn-primary btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="login/logout" class="btn btn-success btn-flat">Sign out</a>
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
    <section class="sidebar" >

      <!-- Sidebar user panel -->

      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="<?php echo $active1?>"><a href="Home"><i class="fa fa-dashboard"></i><span>My Dashboard</a></span></li>
        
        <li class="treeview" id="li-report">
          <a href="">
            <i class="glyphicon glyphicon-inbox"></i>
            <span>My Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="ldp" class="<?php echo $dp?>"><a href="Home/ldp"><i class="fa fa-circle-o"></i>List of Direct Payment Request</a></li>
            <li id="lar" class="<?php echo $ar?>"><a href="Home/lar"><i class="fa fa-circle-o"></i>List of Advance Request</a></li>
            <li id="lasr" class="<?php echo $asr?>"><a href="Home/lasr"><i class="fa fa-circle-o"></i>List of Advance Settlement<br><i class="fa"></i>Request</a></li>
            <li id="lcr"><a href="Home/lcr"><i class="fa fa-circle-o"></i>List of Cash Received Request</a></li>
            <li id="lop" class="<?php echo $lop?>"><a href="Home/lop"><i class="fa fa-circle-o"></i>List of Payment</a></li>
            <li id="op" class="<?php echo $op?>"><a href="Home/op"><i class="fa fa-circle-o"></i>List of Outstanding Payment<br><i class="fa"></i>Request</a></li>
            <li id="dr" class="<?php echo $dr?>"><a href="Home/dr"><i class="fa fa-circle-o"></i>List of Draft Request</a></li>
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
                  <li class="<?php echo $waiting_approval?>"><a href="Home/wait_for_approval"><i class="glyphicon glyphicon-print"></i><span>Waiting For Approval</span><small class="label pull-right bg-red"><?php echo $notifapproval->taskapproval; ?> </small></a></li>
                <?php } ?> 
              <?php } ?> 
        <?php } ?>


        <?php foreach ($reject as $notif) { ?>
          <li class="<?php echo $active3?>"><a href="Home/my_inbox"><i class="glyphicon glyphicon-user"></i><span>My Inbox</span><small class="label pull-right bg-red"><?php echo $notif->totrejected; ?> </small></a></li>
        <?php } ?>
        <br>
        <br>
        <br>
        <?php if($this->session->userdata("role_id") == 2 || $this->session->userdata("role_id") == 3){ ?>
          <li><center><a href="Home/form_add"><button type="button" class="btn btn-success btn-lg"><i class="glyphicon glyphicon-plus"></i>&nbsp;CREATE SP3</button></a></center></li>
        <?php } ?>
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  