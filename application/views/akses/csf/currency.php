  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        CURRENCY
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
                <button class="btn btn-primary btn-sm" data-toggle="modal" onclick="add_currency()">Tambah</button>
                <br><br>
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><center>NO.</center></th>
                  <th>Currency Code</th>
                  <th>Mata Uang</th>
                  <th>Kurs</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 1;
                    foreach ($currency as $row){
                   ?>
                <tr>
                  <td><center><?php echo $i++; ?></center></td>
                  <td><?php echo $row->currency; ?></td>
                  <td><?php echo $row->mata_uang; ?></td>
                  <td><?php echo $row->kurs; ?></td>
                  <td>
                      <!-- <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#ubah<?php echo $row->id_curr; ?>">Ubah</button>
                      <a href="SuperAdm/deletecurr/<?php echo $row->id_curr; ?>"><button class="btn btn-danger btn-sm">Hapus</button> -->
					          <button class="btn btn-success btn-sm" data-toggle="modal" onclick="edit_currency(<?php echo $row->id_curr; ?>)">Ubah</button>
                    <button class="btn btn-danger btn-sm" data-toggle="modal" onclick="delete_currency(<?php echo $row->id_curr; ?>,'<?php echo $row->mata_uang; ?>')">Hapus</button>
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
  <div class="modal fade" id="mdlcurrency" role="dialog" aria-hidden="true"  tabindex="-1"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog"> 
	
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Currency</h4>
        </div>
        <div class="modal-body">
          <h5>
            <form id="frmcurrency" action="#">  
              <input type="hidden" id="curr_code" name="curr_code" class="form-control">
              <table class="table">
                <tr>
                  <th>Currency</th>
                  <td>:</td>
                  <td><input type="text" id="currency" name="currency" class="form-control" require></td>
                </tr>
                <tr>
                  <th>Mata Uang</th>
                  <td>:</td>
                  <td><input type="text" id="mata_uang" name="mata_uang" class="form-control" require></td>
                </tr>
                <tr>
                  <th>Kurs</th>
                  <td>:</td>
                  <td><input id="kurs" type="text" name="kurs" class="form-control" require></td>
                </tr>
              </table>
          </h5>
        </div>
        <div class="modal-footer">
          <button type="button" id="btnSave" onclick="save()" class="btn btn-success">Add</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </form>
        </div>
      </div>
      
    </div>
  </div>


<div class="modal fade" id="mdldeletecurrency" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">

      <div class="modal-body">
       <p align="justify">Apa kamu yakin akan menghapus dengan Mata Uang ini : <span id="spancurrency"></span> </p>
      </div>
      <div class="modal-footer">
      <form id="frmdeletecurrency" action="#">
          <input type="hidden" name="id_curr" id="id_curr">
          <input type="hidden" name="curr_desc" id="curr_desc">
          <button type="button" class="btn btn-success bye" onclick="deletecurr()">Yes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </form>
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
</script>

<script>

 /*  $("#nambah").on('click', function(){
    // var acc = $('#acc').val():
      $.ajax({        
          type: "POST", // Method pengiriman data bisa dengan GET atau POST        
          // url: "<?php echo base_url("index.php/superadm/addcurr"); ?>", // Isi dengan url/path file php yang dituju       
          data: $("#acc").serialize(), // data yang akan dikirim ke file yang dituju        
          success: function(response){ // Ketika proses pengiriman berhasil          
              $("#tambah").modal('hide'); // Sembunyikan loadingnya   
               location.reload();       
              alert('Create Mata Uang success')
          }      
      });
    });

 $(".rubah").on('click', function(){
      $.ajax({        
          type: "POST", // Method pengiriman data bisa dengan GET atau POST        
          // url: "<?php echo base_url("index.php/superadm/updatecurr"); ?>", // Isi dengan url/path file php yang dituju       
          data: $("#ganti").serialize(), // data yang akan dikirim ke file yang dituju        
          success: function(response){ // Ketika proses pengiriman berhasil          
              $("#ubah").modal('hide'); // Sembunyikan loadingnya   
               location.reload();       
              alert('Update Mata Uang success')
          }      
      });
  });  

(".bye").on('click', function(){
      $.ajax({        
          type: "POST", // Method pengiriman data bisa dengan GET atau POST        
          // url: "<?php echo base_url("index.php/superadm/deletecurr"); ?>", // Isi dengan url/path file php yang dituju       
          data: $("#deleted").serialize(), // data yang akan dikirim ke file yang dituju        
          success: function(response){ // Ketika proses pengiriman berhasil          
              $("#hapus").modal('hide'); // Sembunyikan loadingnya   
               location.reload();       
              alert('Deleted Mata Uang success')
          }      
      });
  }); */
  
  
	var save_method;
    var table;


    function add_currency()
    {
      save_method = 'add';
      $('#frmcurrency')[0].reset();
      $('#mdlcurrency').modal('show'); 
      $('.modal-title').text('Tambah Currency'); 
    }

    function edit_currency(id)
    {
      save_method = 'update';
      $('#frmcurrency')[0].reset();
	  $.ajax({
        url : "<?php echo base_url('dashboard/currency_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
			$('[name="curr_code"]').val(data.id_curr);
            $('[name="currency"]').val(data.currency);
            $('[name="mata_uang"]').val(data.mata_uang);
            $('[name="kurs"]').val(data.kurs);
            $('#mdlcurrency').modal('show');
            $('.modal-title').text('Ubah Currency'); 

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

    function save()
    {
      var url;

      if ($('#subsidiary').val()=="" || $('#subsidiary').val()=="0"){
        alert("Unit Kerja belum di pilih");
      }else{
        if(save_method == 'add')
        {
            url = "<?php echo base_url('dashboard/addcurr')?>";
        }
        else
        {
          url = "<?php echo base_url('dashboard/updatecurr')?>";
        }
			
			$.ajax({
            url : url,
            type: "POST",
            data: $('#frmcurrency').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               $('#modal_form').modal('hide');
               location.reload();// for reload a page
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
			});
		}
    }

	function delete_currency(id,mu)
    {
		$('#frmdeletecurrency')[0].reset();
		$('#spancurrency').text(mu);
		$('#curr_desc').val(mu);
		$('#id_curr').val(id);
		$('#mdldeletecurrency').modal('show'); 		
	}
	
    function deletecurr()
    {
      var mtu=$('#curr_desc').val();
	  $.ajax({
            url : "<?php echo base_url('dashboard/deletecurr')?>",
            type: "POST",
            data: $('#frmdeletecurrency').serialize(),
            dataType: "JSON",
            success: function(data)
            {
				$('#mdldeletecurrency').modal('hide');
				alert('Mata Uang '+ mtu + ' telah dihapus');
                location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
      });
      
    }
</script>

<script>

  var rupiah = document.getElementById('kurs');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value);
		});
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
  }

  /*var rupiah2 = document.getElementById('kursupdate');
		rupiah2.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah2() untuk mengubah angka yang di ketik menjadi format angka
			rupiah2.value = formatRupiah2(this.value);
		});
 
		/* Fungsi formatRupiah2 */
		/*function formatRupiah2(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah2     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah2 += separator + ribuan.join('.');
			}
 
			rupiah2 = split[1] != undefined ? rupiah2 + ',' + split[1] : rupiah2;
			return prefix == undefined ? rupiah2 : (rupiah2 ? '' + rupiah2 : '');
  }*/
</script>
</body>