<?php include_once "header.php";
?>
	<link rel="stylesheet" href="../js/fontawesome/web-fonts-with-css/css/fontawesome.min.css">
	<link rel="stylesheet" href="../js/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">
</head>

<body>
<main class="container">
	<?php $active="report"; include_once "nav.php"; ?>
	<script src="../js/code/highcharts.js"></script>
	<script src="../js/code/modules/exporting.js"></script>
	<div class="row">
		<div class="col-sm-12">
			<ol class="breadcrumb">
			  <li><a href="export.php">Yearly Sales Report</a></li>
			  <li class="active">Monthly Sales Report</li>
			  <li><a href="weekly.php">Weekly Sales Report</a></li>
			  <li><a href="export.php">Export</a></li>
			</ol>
			<input type="text" id="year" value=""/>
			<button  id="search">filter chart <i class="fas fa-chart-bar fa-sm"></i></button>
			<div id="chart1"></div>
		</div>
	</div>
</main>
<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
	(function($){

	 	$(document).ready(function(){

	 		$("#search").on("click", function(){
	 			var year = $("#year").val();

	 			if(year.length>4){
	 				alert("Invalid Year!");
	 				return false;
	 			}

	 			if(year.length<4){
	 				alert("Invalid Year!");
	 				return false;
	 			}

	 			if(isNaN(year)) {
	 				alert("Invalid Year!");
	 				return false;
	 			}

	 			$.ajax({
				    url : "../process.php",
					data : { loadMonthlySale : true, year : year},
					type : 'POST',
					dataType : 'JSON',
					success : function(res){

						Highcharts.chart('chart1', {
						    chart: {
						        type: 'column'
						    },
						    title: {
						        text: 'Monthly Sales Report'
						    },
						    subtitle: {
						        text: 'for the year : ' + year
						    },
						    xAxis: {
						        categories: [
						            'Jan',
						            'Feb',
						            'Mar',
						            'Apr',
						            'May',
						            'Jun',
						            'Jul',
						            'Aug',
						            'Sep',
						            'Oct',
						            'Nov',
						            'Dec'
						        ],
						        crosshair: true
						    },
						    yAxis: {
						        min: 0,
						        title: {
						            text: 'Total'
						        }
						    },
						    tooltip: {
						        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
						        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
						            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
						        footerFormat: '</table>',
						        shared: true,
						        useHTML: true
						    },
						    plotOptions: {
						        column: {
						            pointPadding: 0.2,
						            borderWidth: 0
						        }
						    },
						    series: res
						});
					}
				});	

	 		});

			$.ajax({
			    url : "../process.php",
				data : { loadMonthlySale : true},
				type : 'POST',
				dataType : 'JSON',
				success : function(res){

					Highcharts.chart('chart1', {
					    chart: {
					        type: 'column'
					    },
					    title: {
					        text: 'Monthly Sales Report'
					    },
					    subtitle: {
					        text: 'for the year : 2018'
					    },
					    xAxis: {
					        categories: [
					            'Jan',
					            'Feb',
					            'Mar',
					            'Apr',
					            'May',
					            'Jun',
					            'Jul',
					            'Aug',
					            'Sep',
					            'Oct',
					            'Nov',
					            'Dec'
					        ],
					        crosshair: true
					    },
					    yAxis: {
					        min: 0,
					        title: {
					            text: 'Total'
					        }
					    },
					    tooltip: {
					        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
					        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
					            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
					        footerFormat: '</table>',
					        shared: true,
					        useHTML: true
					    },
					    plotOptions: {
					        column: {
					            pointPadding: 0.2,
					            borderWidth: 0
					        }
					    },
					    series: res
					});
				}
			});			
	 	});
	})(jQuery);

	
</script>
<?php include_once "footer.php"; ?>