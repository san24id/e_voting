<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <link rel="icon" type="image/png" href="<?=base_url('assets/login/images/sip1.png');?>"/>
  <meta charset="UTF-8">
  <base href="<?php echo base_url() ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="assets/register/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="assets/register/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="assets/register/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="assets/register/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="assets/register/css/main.css" rel="stylesheet" media="all">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>

  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>

</head>

<?php
function acakangkahuruf($panjang)
{
    $karakter= 'abcdefghijklmnopqrstuvwzyz1234567890';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
      $pos = rand(0, strlen($karakter)-1);
      $string .= $karakter{$pos};
    }
    return $string;
}

function acakangka($panjang)
{
    $karakter= '1234567890';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
      $pos = rand(0, strlen($karakter)-1);
      $string .= $karakter{$pos};
    }
    return $string;
}
?>



<body>
    <div class="page-wrapper bg-blue p-b-100 font-robo" style="padding-top: 20px;">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Buat Akun Baru</h2>
                    
                   <?php if (validation_errors()) { ?>
                    <div style="background: orange; color: white; padding: 5px; padding-left: 25px; padding-top: 15px; margin-bottom: 15px;">
                      <ul>
                        <?php echo validation_errors('<li>', '</li>') ?>
                      </ul>
                    </div>
                    <?php } ?>

                    <form method="POST" action="register/newmember" enctype="multipart/form-data">
                        <div class="input-group" style="width: 100%">
                            <input class="input--style-1" type="text" placeholder="NIK" name="nik" value="<?php echo $this->session->flashdata('nik') ?>" required="required" style="width: 100%; border: none;">
                        </div>
                        <div class="input-group" style="width: 100%">
                        <p>Upload NIK</p>
                            <input type="file" placeholder="Upload NIK" name="foto" required="required">
                        </div>
                        <div class="input-group" style="width: 100%">
                            <input class="input--style-1" type="text" placeholder="Nama Lengkap" name="nama_user" value="<?php echo $this->session->flashdata('nama_user') ?>" required="required" style="width: 100%; border: none;">
                        </div>
                         <div class="input-group" style="width: 100%">
                            <input class="input--style-1" type="text" placeholder="Instansi" name="instansi" value="<?php echo $this->session->flashdata('instansi') ?>" required="required" style="width: 100%; border: none;">
                        </div>
                         <div class="input-group" style="width: 100%">
                            <input class="input--style-1" type="text" placeholder="Jabatan" name="jabatan" value="<?php echo $this->session->flashdata('jabatan') ?>" required="required" style="width: 100%; border: none;">
                        </div>
                    
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group" style="width: 100%">
                                    <input class="input--style-1" type="text" placeholder="Nomor Telepon" onkeypress="return wajibAngka(event)" required="required" name="telepon" value="<?php echo $this->session->flashdata('telepon') ?>" style="width: 100%; border: none;">
                                </div>
                            </div>
                          <div class="col-2">
                                <div class="input-group" style="width: 100%">
                                    <input class="input--style-1" type="text" placeholder="Alamat Email" name="email" value="<?php echo $this->session->flashdata('email') ?>" required="required" style="width: 100%; border: none;">
                                </div>
                           </div>
                         </div>
                        <div class="input-group" style="width: 100%">
                            <input class="input--style-1" type="text" placeholder="Username (minimal 6 karakter)" name="username" required="required" value="<?php echo $this->session->flashdata('username') ?>" style="width: 100%; border: none;">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group" style="width: 100%">
                                    <input class="input--style-1" type="password" placeholder="Password (minimal 6 karakter)" name="password" required="required" style="width: 100%; border: none;">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group" style="width: 100%">
                                    <input class="input--style-1" type="password" placeholder="Konfirmasi Password" name="confirm_pass" required="required" style="width: 100%; border: none;">
                                </div>
                           </div>
                         </div>
                        <div>
                            <div class="col-2">
                                <div class="input-group" style="width: 100%; border-bottom: none;">
                                    <?php echo $img; ?>
                                    <input type="hidden" name="img_name" value="<?php echo $img_name; ?>">
                                    <input type="text" name="captcha" class="form-control" placeholder="Input Captcha" style="margin-top: 6px;">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                        <div class="col-2">
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" style="width: 100%">Daftar</button>
                        </div>
                      </div>
                      <div class="col-2">
                        <div class="p-t-20">
                            <a href="Login" class="pull-right">Kembali Login</a>
                        </div>
                      </div>
                       </div>

                       <script type="text/javascript">
                            function wajibAngka(evt) {
                            var charCode = (evt.which) ? evt.which : event.keyCode
                            if (charCode > 31 && (charCode < 48 || charCode > 57))
                            return false;
                            }
                        </script>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php 
      if($this->session->flashdata('msg') == 'gagal_kirim'){
              echo '<script type="text/javascript">';
              echo ' alert("Send mail failed")';  //not showing an alert box.
              echo '</script>';
          }
    ?>

</div>
    <!-- Jquery JS-->
    <!-- Vendor JS-->
    <script src="assets/register/vendor/select2/select2.min.js"></script>
    <script src="assets/register/vendor/datepicker/moment.min.js"></script>
    <script src="assets/register/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="assets/register/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

<script type="text/javascript">


</script>
</html>