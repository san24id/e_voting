<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<style type="text/css">
   .satu { border: 6px solid orange; border-radius: 6px; background: orange;}
   .dua { border: 6px solid #3399ff; border-radius: 6px; }
   .tiga { border: 6px solid #3399ff; border-radius: 6px; background: #33ccff}
   .empat { border: 6px solid #3399ff; border-radius: 6px; background: #3399ff; }
   .lima { border: 6px solid #228B22; border-radius: 6px; }
   .enam { border: 6px solid #228B22; border-radius: 6px; background: #9ACD32;}
   .tujuh { border: 6px solid #228B22; border-radius: 6px; background: #228B22;}
   .box1{width:250px;
				height:90px;
        background: linear-gradient(#339966, #0066CC) ;
				border: linear-gradient(#339966, #0066CC);
        border-radius: 8px;
				display: inline-block;
				/* margin-left: 10px; */
   }
   .box2{width:200px;
				height:90px;
        background: linear-gradient(#339966, #0066CC);
				border: linear-gradient(#339966, #0066CC);
        border-radius: 8px;
				display: inline-block;
				/* margin-left: 10px; */
   }
   .box3{width:250px;
				height:90px;
        background: linear-gradient(#339966, #0066CC);
				border: linear-gradient(#339966, #0066CC);
        border-radius: 8px;
				display: inline-block;
				/* margin-left: 10px; */
   }  
   .box4{width:100px;
				height:90px;
        background: linear-gradient(#339966, #0066CC);
				border: linear-gradient(#339966, #0066CC);
        border-radius: 8px;
				display: inline-block;
				/* margin-left: 10px; */
   }
   .period { border: 5px solid #008000; border-radius: 5px; background: #008000 }
   	
</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
   <!-- Page Heading -->
   
    </section>

    <section class="content bg-white">
     
    <div class="row">                   
      <div class="alert alert-info">
        <h1><center>Welcometo E-Voting RUTA!</center></h1> </a>
      </div>
      <h5>
        <br>
        <center><img src="assets/login/images/logo.png" width="200px" alt="Logo Images"></center>
        <br>
      </h5>
    </div>  
    </section>
    <!-- /.content -->
    
  </div>
  <!-- /.content-wrapper -->


  <footer class="main-footer">
    <div class="pull-right hidden-xs">
     
    </div>
    <strong>Copyright &copy; 2020 </strong>
  </footer>  

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
 

</div>
<!-- ./wrapper -->
<!-- <script src="assets/dashboard/plugins/jQuery/jquery-2.2.3.min.js"></script> -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
<!-- Bootstrap 3.3.7 -->
<script src="assets/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Sparkline -->
<script src="assets/admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- ChartJS -->
<script src="assets/admin/bower_components/chart.js/Chart.js"></script>
<script src="assets/admin/bower_components/chart.js/canvasjs.min.js"></script>

<script>
function deletedraftpayment(id)
    {
		$.ajax({
				url : "<?php echo base_url('home/draftpaymentdelete')?>/"+id,
				type: "POST",
				dataType: "JSON",
				success: function(data)
				{
					location.reload();
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error deleting data');
				}
			});
    }

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


Highcharts.chart('pieChart', {
      chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie'
      },
      title: {
          text: 'Jumlah Data Payment Request Divisi'
      },
      credits: {
          enabled: false
      },
      tooltip: {
          pointFormat: '{series.name}: <b>{point.y}</b>'
      },
      plotOptions: {
          pie: {
              colors: [
                '#06717C',
                '#0595A3', 
                '#06C4D7', 
                '#8EEBF4'                  
              ],
              allowPointSelect: true,
              cursor: 'pointer',
              dataLabels: {
                  enabled: true,
                  format: '<b>{point.name}</b>: {point.y}'
              },
              point: {
                  events: {
                      click: function() {
                          location.href = this.options.link;
                      }
                  }
                }
          }
      },
      series: [{
          name: 'Total',
          colorByPoint: true,
          data: [

            <?php foreach ($pembayaran as $key) { ?>
              {
                name: '<?php echo $key->dsc; ?>',
                y: <?php echo $key->jmlpembayaran; ?>,
				        link:'<?php echo base_url('Home/'.$key->link.'/'.$start_date.'/'.$end_date);?> '
              },
            <?php } ?>
              ]
      }]
  });
 /* CanvasJS.addColorSet("greenShades",
                [//colorSet Array

                  '#06717C',
                  '#0595A3', 
                  '#06C4D7', 
                  '#8EEBF4'                
                ]);
  var chart = new CanvasJS.Chart('pieChart', {

  colorSet: "greenShades",

  title:{
      text: "Jumlah Data Payment Request Divisi"
  },
  data: [
      {
        type: "pie",
        cursor:"pointer",    
        colors: [
                '#06717C',
                '#0595A3', 
                '#06C4D7', 
                '#8EEBF4'                  
              ],      
        dataPoints: [
          <?php foreach ($pembayaran as $key) { ?>
              {
                label: '<?php echo $key->dsc; ?>',
                y: <?php echo $key->jmlpembayaran; ?>,
                link: '<?php echo base_url('Home/'.$key->link);?> ',

              },
            <?php } ?>
        ]
      }
      ]
    });

chart.options.data[0].click = function(e){ 
    var dataSeries = e.dataSeries;
    var dataPoint = e.dataPoint;
    var dataPointIndex = e.dataPointIndex;
    
    if(!dataPoint.exploded)
        window.open(dataPoint.link,'_blank');  
    
    for(var i = 0; i < dataSeries.dataPoints.length; i++){
            if(i === dataPointIndex){                
                continue;
            }
            
            dataSeries.dataPoints[i].exploded = false;            
    }
};

 chart.render();*/
</script>

<script type="text/javascript"> 
 function caridata()
    {
	  url = "<?php echo base_url('home/caridatadashboard') ?>";
      $.ajax({
            url : url,
            type: "POST",
            data: $('#formCari').serialize(),
            dataType: "JSON",
            success: function(data)
            {
              console.log(data);
			    var status; 
				var istatus;
				var ino=1;
				var tbl1 = $('#example1').DataTable(); 
				tbl1.clear().draw();
                $.each(data, function(key, item) 
                      {       
					    status =  item.status;
						switch(status) {
						  case "0":
							istatus ='<img src="assets/dashboard/images/legend/draft.png">';  
							break;
						  case "1":
							istatus ='<img src="assets/dashboard/images/legend/draftprint.png">';
							break;
						  case "11":
							istatus ='<img src="assets/dashboard/images/legend/draftprint.png">';
							break;
                          case "2":
							istatus ='<img src="assets/dashboard/images/legend/submitted.png">';
							break;
                          case "3":
							istatus ='<img src="assets/dashboard/images/legend/draftprint.png">';
							break;
                          case "4":
							istatus = '<img src="assets/dashboard/images/legend/processing.png">';
							break;
                          case "5":
							istatus ='<img src="assets/dashboard/images/legend/processing.png">';
							break;
                          case "6":
							istatus ='<img src="assets/dashboard/images/legend/processing.png">';
							break;
                          case "7":
							istatus = '<img src="assets/dashboard/images/legend/processing.png">';
							break;
                          case "8":
							istatus = '<img src="assets/dashboard/images/legend/verified.png">';
							break;
                          case "9":
							istatus = '<img src="assets/dashboard/images/legend/approved.png">';
							break; 
                          case "10":
							istatus = '<img src="assets/dashboard/images/legend/paid1.png">';
							break;  
						  default:
							istatus = '';
						}
						
						tbl1.row.add( [
						  ino,
						  istatus,
              item.tanggal,
						  item.jenis_pembayaran,
						  item.nomor_surat,
						  item.label1,
						  item.display_name,
						  item.penerima,
						  item.submit_date,
						  '<a href="home/form_view/' + item.id_payment + '"><button class="btn btn-primary btn-sm">View</button></a>'
                        ] ).draw(false);
						ino++; 
                })  
            },
            error: function (data)
            {
              console.log(data);
                alert('Error get data');
            }
        });
    }
	
</script>

<script>
  $( function() {
    $( "#end_date" ).datepicker();
    $( "#start_date" ).datepicker();
  } );
</script>

<script>
function printThis() {
  window.print();
}
$(document).ready(function() { 
		$('#selsearch').change(function() {
		  if( $(this).val() == '1') {
				$('#selblank').css("display", "none");
				$('#selstatus').css("display", "block");
				$('#seljnspembayaran').css("display", "none");
		  } else if( $(this).val() == '2'){   
			$('#selblank').css("display", "none");
			$('#selstatus').css("display", "none");
			$('#seljnspembayaran').css("display", "block");
		  }else{
			$('#selblank').css("display", "block");
			$('#selstatus').css("display", "none");
			$('#seljnspembayaran').css("display", "none");
		  }
		})
		
		});
</script>
</body>
</html>
