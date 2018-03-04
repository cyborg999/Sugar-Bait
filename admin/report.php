<?php include_once "header.php"; ?>
  <link rel="stylesheet" href="../js/fontawesome/web-fonts-with-css/css/fontawesome.min.css">
  <link rel="stylesheet" href="../js/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">
  
<main class="container">
	<?php $active="report"; include_once "nav.php"; ?>
	<script src="../js/code/highcharts.js"></script>
	<script src="../js/code/modules/series-label.js"></script>
	<script src="../js/code/modules/exporting.js"></script>
	<div class="row">
		<div class="col-sm-12">
			<ol class="breadcrumb">
			  <li class="active">Yearly Sales Report</li>
			  <li><a href="monthly.php">Monthly Sales Report</a></li>
			  <li><a href="weekly.php">Weekly Sales Report</a></li>
			  <li><a href="export.php">Export</a></li>
			</ol>
			<div id="chart1"></div>
		</div>
	</div>
</main>
<script src="reports/chosen/chosen.jquery.js" type="text/javascript"></script>
<script type="text/javascript">
	(function($){
	 	$(document).ready(function(){
				$.ajax({
				    url : "../process.php",
					data : { loadYearlySale : true},
					type : 'POST',
					dataType : 'JSON',
					success : function(res){
						var data = JSON.parse(res);
						var start,end;
						console.log(data);

						for(var i in data){
							start = data[i].start;
							end = data[i].end;
						}

						Highcharts.chart('chart1', {
						    title: {
						        text: 'Yearly Sales Report'
						    },
						    subtitle: {
						        text: 'from the year : '+ start+' to '+end
						    },
						    yAxis: {
						        title: {
						            text: 'Item Count'
						        }
						    },
						    legend: {
						        layout: 'vertical',
						        align: 'right',
						        verticalAlign: 'middle'
						    },
						    plotOptions: {
						        series: {
						            label: {
						                connectorAllowed: false
						            },
						            pointStart: parseInt(start)
						        }
						    },

						    series: JSON.parse(res),

						    responsive: {
						        rules: [{
						            condition: {
						                maxWidth: 500
						            },
						            chartOptions: {
						                legend: {
						                    layout: 'horizontal',
						                    align: 'center',
						                    verticalAlign: 'bottom'
						                }
						            }
						        }]
						    }

						});
					}
				})	 			
	 	});
	})(jQuery);

	
</script>
<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>

<?php include_once "footer.php"; ?>