<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="assets/login/images/logo.png"/>

	<title>E-Voting Bellezza</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	/* table, th, td {
		border: 1px solid black;
		border-collapse: collapse;
	} */

	table.center {
		margin-left: auto; 
		margin-right: auto;
	}


	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}

	/* Modal Header */
		.modal-header {
		padding: 2px 16px;
		background-color: #5cb85c;
		color: white;
		}

		/* Modal Body */
		.modal-body {padding: 2px 16px;}

		/* Modal Footer */
		.modal-footer {
		padding: 2px 16px;
		background-color: #5cb85c;
		color: white;
		}

		/* Modal Content */
		.modal-content {
		position: relative;
		background-color: #fefefe;
		margin: auto;
		padding: 0;
		border: 1px solid #888;
		width: 80%;
		box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
		animation-name: animatetop;
		animation-duration: 0.4s
		}

		/* Add Animation */
		@keyframes animatetop {
		from {top: -300px; opacity: 0}
		to {top: 0; opacity: 1}
		}
	</style>
</head>
<body>

<div id="container">
	<h1><center>Welcome to E-Voting Bellezza!</h1>

	<div id="body">
		<form method="post" action="Home/addvoter">

          <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <!-- /.box -->
                <div class="box">
                  <div class="box-header with-border">
                    <h5>
                      <br>
                      <center><img src="assets/login/images/logo.png" width="200px" alt="Logo Images"></center>
                      <br>
                      <center><b><u><font size="+2" style="font-family: calibri;">FORM E-VOTING</font></u></b></center>
                    </h5>

					<div class="modal-content">
						<div class="modal-header">
							<h2><center>QUESTION</center></h2>
						</div>

						<div class="modal-body">
						<table class="center">
							<?php 
							foreach ($question as $list){ ?>
							<input type="hidden" name="id_question" value="<?php echo $list->id_question;?>"> 
							<tr>
								<td>Jenis: <?php if($list->jenis == '1'){
													echo "One Man One Vote";
												}else if($list->jenis == '2'){
													echo "NPP";		
												}?>
								</td>
							</tr>
							<tr>
								<td>Question: <?php echo $list->question;?></td>
							</tr>							
						</table>
						</div>
						
					</div>
					
			<br><br><br>

					<?php if($list->isactive == 1){?>			
						<table class="center">
							<tr>
								<td>Nama :</td>
								<td><input type="text" name="nama"></td>
							</tr>
							<tr>
								<td>Email :</td>
								<td><input type="email" name="email"></td>
							</tr>
							<tr>
								<td>PIN :</td>
								<td><input type="text" name="pin"></td>		
							</tr>
							</tr>
								<td>Choice :</td>
								<td><select name="choice">
										<option value="1">YES</option>
										<option value="2">NO</option>
									</select>
								</td>	
							</tr>
							<tr>
								<td><center><input type="submit" name="tombol" value="Save"/></center></td>
							</tr>
						</table>

					<?php }else if($list->isactive == 0){
						echo "Vote is Closed";
					}?>
					<?php }?>
														
				</div>
			</div>
          </section>  

        </form>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'Bellezza E-Voting Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>