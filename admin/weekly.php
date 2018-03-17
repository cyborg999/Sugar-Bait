<?php include_once "header.php"; ?>
<?php 

	$packages = $model->getAllPackages(); 
	$first = reset($packages);
	$defaultPackage = $model->loadWeeklySale($first['id']);
?>

<link rel="stylesheet" href="reports/chosen/docsupport/style.css">
	<link rel="stylesheet" href="reports/chosen/docsupport/prism.css">
	<link rel="stylesheet" href="reports/chosen/chosen.css">
	<link rel="stylesheet" href="../js/fontawesome/web-fonts-with-css/css/fontawesome.min.css">
	<link rel="stylesheet" href="../js/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">
	<style type="text/css">
		a {
		  color: #337ab7;
		  font-size: 15px;
		  font-weight: lighter;
		}
	</style>
</head>

<body>
<main class="container">
	<?php $active="report"; include_once "nav.php"; ?>
	<script src="../js/code/highcharts.js"></script>
	<script src="../js/code/modules/exporting.js"></script>
	<script src="../js/code/modules/data.js"></script>
	<script src="../js/code/modules/series-label.js"></script>
	<!-- Additional files for the Highslide popup effect -->
	<script src="https://www.highcharts.com/media/com_demo/js/highslide-full.min.js"></script>
	<script src="https://www.highcharts.com/media/com_demo/js/highslide.config.js" charset="utf-8"></script>
	<link rel="stylesheet" type="text/css" href="https://www.highcharts.com/media/com_demo/css/highslide.css" />

	<div class="row">
		<div class="col-sm-12">
			<ol class="breadcrumb">
			  <li><a href="export.php">Yearly Sales Report</a></li>
			  <li><a href="monthly.php">Monthly Sales Report</a></li>
			  <li class="active">Weekly Sales Report</li>
			  <li><a href="export.php">Export</a></li>
			</ol>
			<select id="products" data-placeholder="Select Package" class="chosen-select" tabindex="8">
	            <option value=""></option>
	            <?php foreach($packages as $idx => $package) : ?>
	            <option <?=($idx == 0) ? "selected" : "";?> value="<?= $package['id']; ?>"><?= $package['name']; ?></option>
	            <?php endforeach ?>
	          </select>
			<button  id="search">filter chart <i class="fas fa-chart-bar fa-sm"></i></button>
			<div id="chart1"></div>
		</div>
	</div>
</main>
<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
<script src="reports/chosen/chosen.jquery.js" type="text/javascript"></script>
<script src="reports/chosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
<script src="reports/chosen/docsupport/init.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
(function($){

	$(document).ready(function(){
		$("#search").on("click", function(){
			var id = $("#products").val();
			
			$.ajax({
	          url : "../process.php",
	          data : { loadWeeklySales : true,id : id},
	          type : 'POST',
	          dataType : 'JSON',
	          success : function(res){
	          	console.log(res);
	          	if(res == "") {
	          		res = "Date,On_Process,Pending,Deal\n";
	          	}

	          	Highcharts.chart('chart1', {
			            data: {
			                csv: res.replace(/\n\n/g, '\n')
			            },
			            title: {
			                text: 'Weekly Package Sales Report'
			            },

			            subtitle: {
			                text: 'per status'
			            },

			            xAxis: {
			                tickInterval: 7 * 24 * 3600 * 1000, // one week
			                tickWidth: 0,
			                gridLineWidth: 1,
			                labels: {
			                    align: 'left',
			                    x: 3,
			                    y: -3
			                }
			            },

			            yAxis: [{ // left y axis
			                title: {
			                    text: null
			                },
			                labels: {
			                    align: 'left',
			                    x: 3,
			                    y: 16,
			                    format: '{value:.,0f}'
			                },
			                showFirstLabel: false
			            }, { // right y axis
			                linkedTo: 0,
			                gridLineWidth: 0,
			                opposite: true,
			                title: {
			                    text: null
			                },
			                labels: {
			                    align: 'right',
			                    x: -3,
			                    y: 16,
			                    format: '{value:.,0f}'
			                },
			                showFirstLabel: false
			            }],

			            legend: {
			                align: 'left',
			                verticalAlign: 'top',
			                borderWidth: 0
			            },

			            tooltip: {
			                shared: true,
			                crosshairs: true
			            },

			            plotOptions: {
			                series: {
			                    cursor: 'pointer',
			                    point: {
			                        events: {
			                            click: function (e) {
			                                hs.htmlExpand(null, {
			                                    pageOrigin: {
			                                        x: e.pageX || e.clientX,
			                                        y: e.pageY || e.clientY
			                                    },
			                                    headingText: this.series.name,
			                                    maincontentText: Highcharts.dateFormat('%A, %b %e, %Y', this.x) + ':<br/> ' +
			                                        this.y + ' package(s) sold',
			                                    width: 200
			                                });
			                            }
			                        }
			                    },
			                    marker: {
			                        lineWidth: 1
			                    }
			                }
			            },

			            series: [{
			                name: 'All visits',
			                lineWidth: 4,
			                marker: {
			                    radius: 4
			                }
			            }, {
			                name: 'New visitors'
			            }]
			        });
	          }
      		});
		});

		$("#search").trigger("click");
		loadChart();
		function loadChart(){
			// Get the CSV and create the chart
			$.ajax({
			    url: 'weekly.csv',
			    success: function (csv) {
			        Highcharts.chart('chart1', {
			            data: {
			                csv: csv.replace(/\n\n/g, '\n')
			            },
			            title: {
			                text: 'Weekly Package Sales Report'
			            },

			            subtitle: {
			                text: 'per status'
			            },

			            xAxis: {
			                tickInterval: 7 * 24 * 3600 * 1000, // one week
			                tickWidth: 0,
			                gridLineWidth: 1,
			                labels: {
			                    align: 'left',
			                    x: 3,
			                    y: -3
			                }
			            },

			            yAxis: [{ // left y axis
			                title: {
			                    text: null
			                },
			                labels: {
			                    align: 'left',
			                    x: 3,
			                    y: 16,
			                    format: '{value:.,0f}'
			                },
			                showFirstLabel: false
			            }, { // right y axis
			                linkedTo: 0,
			                gridLineWidth: 0,
			                opposite: true,
			                title: {
			                    text: null
			                },
			                labels: {
			                    align: 'right',
			                    x: -3,
			                    y: 16,
			                    format: '{value:.,0f}'
			                },
			                showFirstLabel: false
			            }],

			            legend: {
			                align: 'left',
			                verticalAlign: 'top',
			                borderWidth: 0
			            },

			            tooltip: {
			                shared: true,
			                crosshairs: true
			            },

			            plotOptions: {
			                series: {
			                    cursor: 'pointer',
			                    point: {
			                        events: {
			                            click: function (e) {
			                                hs.htmlExpand(null, {
			                                    pageOrigin: {
			                                        x: e.pageX || e.clientX,
			                                        y: e.pageY || e.clientY
			                                    },
			                                    headingText: this.series.name,
			                                    maincontentText: Highcharts.dateFormat('%A, %b %e, %Y', this.x) + ':<br/> ' +
			                                        this.y + ' package(s) sold',
			                                    width: 200
			                                });
			                            }
			                        }
			                    },
			                    marker: {
			                        lineWidth: 1
			                    }
			                }
			            },

			            series: [{
			                name: 'All visits',
			                lineWidth: 4,
			                marker: {
			                    radius: 4
			                }
			            }, {
			                name: 'New visitors'
			            }]
			        });
			    }
			});
		}	
	});
})(jQuery);

	
</script>
<?php include_once "footer.php"; ?>