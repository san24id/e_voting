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
  <p class="center">Periode&nbsp;:&nbsp; <?php echo $this->session->userdata('tgl1');?> &nbsp;s/d&nbsp; <?php echo $this->session->userdata('tgl2');?></p>
  </div>
</div>
<p class="center1">&nbsp;</p>

	
  <div>
    <table>
      <thead>
        <tr>
			 <th>No.</th>
                  <th>Status</th>
                  <th>Tanggal SP3</th>
                  <th>Jenis Pembayaran</th>
				  <th>Nomor SP3</th>
				  <?php if($this->session->userdata('jdl')=="4" || $this->session->userdata('jdl')=="5"){ ?>
					<th>Deskripsi</th>
					<th>Pemohon</th>
					<th>Divisi</th>
					<th>Nama Penerima</th>
					<th>Submitted Date</th>  
				  <?php }else{?>
				  <th>Nomor APF</th>
					<th>Deskripsi</th>
					<th>Pemohon</th>
					<th>Divisi</th>
					<th>Nama Penerima</th>  
				  <?php }?>
        </tr>
      </thead>
      <tbody>
		<?php 
			$r=1;
			foreach($transactions as $da){	
				?>		
				<tr>
					<td><?php echo $r;?></td>
					<td><?php echo $da->status_laporan;?></td>
					<td><?php echo $da->tanggal_new;?></td>
					<td><?php echo $da->jenis_pembayaran;?></td>
					<td><?php echo $da->nomor_surat;?></td>
					<?php if($this->session->userdata('jdl')=="4" || $this->session->userdata('jdl')=="5"){ ?>
					<td><?php echo $da->label1;?></td>
					<td><?php echo $da->display_name;?></td>
					<td><?php echo $da->akun_bank;?></td>
					<td><?php echo $da->penerima;?></td>
					<td><?php echo $da->submit_date;?></td>
					<?php }else{ ?>
					<td><?php echo $da->apf_doc;?></td>
					<td><?php echo $da->description;?></td>
					<td><?php echo $da->display_name;?></td>
					<td><?php echo $da->division_id;?></td>
					<td><?php echo $da->dibayar_kepada;?></td>
					<?php } ?>
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
              
            