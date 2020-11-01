<!DOCTYPE html>
<html>
<head>
  <title><?php echo urldecode($this->session->userdata('judul'));?></title>
  <style type="text/css">
    
    @page rotated { size: landscape; }

    table, td, th { border: 1px solid black; }
    table{
		border-collapse: collapse;
		font-family: arial;
		width: 100%;
    }
 
    thead th{
		text-align: left;
		font-size: 11px;
		padding: 10px;
    }
 
    tbody td{
		border: 1px solid black;
		font-size: 8px;
		padding: 10px;
    }
 
	p.left {
		text-align: left;
		font-size: 14px;
		font-weight: 200px;
		font-family: arial;
		color: black;
	}

	p.center1 {font-size: 6px;}

	p.large {
		font-size: 18px;
		font-family: arial;
		font-weight: 300px;
		text-align: left;
		color: black;
	}

	#wrap{
		width:100%;
		margin:0 auto;
	}
	.box{
		float:right;
		width: 10%;
		height: 10%;
		margin:0px;
	}

	.box1{
		float:left;
		width: 60%x;
		margin:0px;
	}
  </style>
</head>
<body>

<div id="wrap">
  <div class="box"><img src="<?php echo base_url('assets/login/images/headerr.png')?>">
  </div>
  <p>
  <div class="box1"><p class="large"><?php echo urldecode($this->session->userdata('judul'));?></p>
  <p class="center">Asof Date : &nbsp;:&nbsp; <?php echo date("d-F-Y");?></p>
  </div>
</div>
<p class="center1">&nbsp;</p>

	
  <div>
    <table>
      <thead>
        <tr>
			<th>No.</th>
			<th>Status</th>
			<th>Jenis Pembayaran</th>
			<th>Tangal Submit</th>
			<th>APF No</th>
			<th>Deskripsi</th>
			<th>Pemohon</th>
			<th>Approver 1</th>
			<th>Approver 2</th>
			<th>Approver 3</th>  
        </tr>
      </thead>
      <tbody>
		<?php 
			$r=1;
			foreach($transactions as $da){
				
				$sts="";
				if ($da->status=="9"){
					$sts = 'Waiting for Payment';
				}elseif ($da->status=="10"){
					$sts = 'Paid';
				}else{
					$sts = 'Waiting for Approval';
				}
				?>		
				<tr>
					<td><?php echo $r;?></td>
					<td><?php echo $sts;?></td>
					<td><?php echo $da->jenis_pembayaran_desc;?></td>
					<td><?php echo $da->tanggal;?></td>
					<td><?php echo $da->apf_doc;?></td>
					<td><?php echo $da->description;?></td>
					<td><?php echo $da->display_name;?></td>
					<td><?php echo $da->persetujuan_pembayaran1;?></td>
					<td><?php echo $da->persetujuan_pembayaran2;?></td>
					<td><?php echo $da->persetujuan_pembayaran3;?></td>
				</tr>
				<?php $r=$r+1; 
			}?>	
      </tbody>
    </table>
   </div>
</body>
</html>


</body>
</html>
              
            