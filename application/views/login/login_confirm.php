<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<base href="<?php echo base_url() ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="assets/login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/login/css/main.css">
<!--===============================================================================================-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

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
?>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('assets/login/images/bg-01.jpg');">
			<div class="wrap-login100">

				<form class="login100-form validate-form" action="<?php echo site_url().'Login/auth_confirm'?>"  method="post">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="row">

					<div class="wrap-input100 validate-input col-md-6" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input col-md-6" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
				</div>
				<div class="row">
					<div class="contact100-form-checkbox">
							<i class="fa fa-address-book" aria-hidden="true" style="color: #fff;"></i>
							<a href="register" class="txt1">Register</a>  <font color="#FFF">&nbsp;&nbsp;|&nbsp;&nbsp;</font> <a class="txt1" href="#" data-toggle="modal" data-target="#myModal">
							Forgot Password?
						</a>
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-60">
						<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-2"></div>
						</div>
					</div>
				</form>
			</div>
			<div class="row">
						

						<?php 

							if($this->session->flashdata('msg') == 'invalid'){
							echo '<script type="text/javascript">';
							echo ' alert("Invalid username or password")';  //not showing an alert box.
							echo '</script>';
							}else if($this->session->flashdata('msg') == 'status_0'){
							echo '<script type="text/javascript">';
							echo ' alert("Anda belum melakukan login melalui link email")';  //not showing an alert box.
							echo '</script>';
							}else if($this->session->flashdata('msg') == 'gagal'){
							echo '<script type="text/javascript">';
							echo ' alert("Email invalid")';  //not showing an alert box.
							echo '</script>';
							}else if($this->session->flashdata('msg') == 'terdaftar'){
							echo '<script type="text/javascript">';
							echo ' alert("Email tidak terdaftar")';  //not showing an alert box.
							echo '</script>';
							}
						?>
						
					</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>

	<!-- The Modal -->
  <div class="modal fade" id="myModal">
   	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Forgot Password?</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div>
		<div class="modal-body">
	<div class="modal-body">
	<form action="<?php echo site_url().'Login/fpasword'?>"  method="post">
		<div class="form-group">
			<label for="email" class="col-form-label">Please Enter your Email Address</label>
			<p class="card-text"><small class="text-muted">Please enter your email address. The new password will be sent to your email address.</small></p>
				<input type="text" class="form-control" name="email" placeholder="example@domain.com" required="required">
				<input type="hidden" name="password" value="<?php echo acakangkahuruf(6); ?>">
				<input type="hidden" name="status" value="0">
		</div>
		</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Reset Now</button>
				</div>
			</div>
		</div>
	</form>
  </div>
	
<!--===============================================================================================-->
	<script src="assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="assets/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="assets/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="assets/login/js/main.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>