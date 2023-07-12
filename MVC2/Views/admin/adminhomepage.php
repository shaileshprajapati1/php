
<div id="page-wrapper">
			<div class="main-page">
				<div class="four-grids">
					<div class="col-md-3 four-grid">
						<div class="four-grid1">
							<div class="icon">
								<i class="glyphicon glyphicon-user" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>User</h3>
								<h4> 266  </h4>
								<p> <span class="inlinebar">1,3,4,5,3,5</span> </p>
							</div>
							<a href="#" data-toggle="modal" data-target="#myModal1">More Info</a>
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-grid2">
							<div class="icon">
								<i class="glyphicon glyphicon-align-justify " aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>Tasks</h3>
								<h4>15</h4>
								<p><span class="dynamicbar">Loading..</span></p>
							</div>
							<a href="#" data-toggle="modal" data-target="#myModal1">More Info</a>
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-grid3">
							<div class="icon">
								<i class="glyphicon glyphicon-bell" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>Alerts</h3>
								<h4>9 New</h4>
								<p> <span class="inlinebar">1,3,4,5,3,5</span> </p>
							</div>
							<a href="#" data-toggle="modal" data-target="#myModal1">More Info</a>
						</div>
					</div>
					<div class="col-md-3 four-grid">
						<div class="four-grid4">
							<div class="icon">
								<i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
							</div>
							<div class="four-text">
								<h3>Orders</h3>
								<h4>26</h4>
								<p><span class="dynamicbar">Loading..</span></p>
							</div>
							<a href="#" data-toggle="modal" data-target="#myModal1">More Info</a>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="play-grid">
				<script src="<?php echo $this->baseURL ;?>Assets/admin/js/amcharts.js" type="text/javascript"></script>
		<script src="<?php echo $this->baseURL ;?>Assets/admin/js/serial.js" type="text/javascript"></script>
		<script src="<?php echo $this->baseURL ;?>Assets/admin/js/amstock.js" type="text/javascript"></script>

		<script>
			AmCharts.ready(function () {
				generateChartData();
				createStockChart();
			});

			var chart;
			var chartData = [];
			var newPanel;
			var stockPanel;

			function generateChartData() {
				var firstDate = new Date();
				firstDate.setHours(0, 0, 0, 0);
				firstDate.setDate(firstDate.getDate() - 2000);

				for (var i = 0; i < 2000; i++) {
					var newDate = new Date(firstDate);

					newDate.setDate(newDate.getDate() + i);

					var open = Math.round(Math.random() * (30) + 100);
					var close = open + Math.round(Math.random() * (15) - Math.random() * 10);

					var low;
					if (open < close) {
						low = open - Math.round(Math.random() * 5);
					} else {
						low = close - Math.round(Math.random() * 5);
					}

					var high;
					if (open < close) {
						high = close + Math.round(Math.random() * 5);
					} else {
						high = open + Math.round(Math.random() * 5);
					}

					var volume = Math.round(Math.random() * (1000 + i)) + 100 + i;


					chartData[i] = ({
						date: newDate,
						open: open,
						close: close,
						high: high,
						low: low,
						volume: volume
					});
				}
			}

			function createStockChart() {
				chart = new AmCharts.AmStockChart();

				chart.balloon.horizontalPadding = 13;

				// DATASET //////////////////////////////////////////
				var dataSet = new AmCharts.DataSet();
				dataSet.fieldMappings = [{
					fromField: "open",
					toField: "open"
				}, {
					fromField: "close",
					toField: "close"
				}, {
					fromField: "high",
					toField: "high"
				}, {
					fromField: "low",
					toField: "low"
				}, {
					fromField: "volume",
					toField: "volume"
				}, {
					fromField: "value",
					toField: "value"
				}];
				dataSet.color = "#7f8da9";
				dataSet.dataProvider = chartData;
				dataSet.categoryField = "date";

				chart.dataSets = [dataSet];

				// PANELS ///////////////////////////////////////////
				stockPanel = new AmCharts.StockPanel();
				stockPanel.title = "Value";

				// graph of first stock panel
				var graph = new AmCharts.StockGraph();
				graph.type = "candlestick";
				graph.openField = "open";
				graph.closeField = "close";
				graph.highField = "high";
				graph.lowField = "low";
				graph.valueField = "close";
				graph.lineColor = "#f7aa47";
				graph.fillColors = "#f7aa47";
				graph.negativeLineColor = "#68b828";
				graph.negativeFillColors = "#68b828";
				graph.fillAlphas = 1;
				graph.balloonText = "open:<b>[[open]]</b><br>close:<b>[[close]]</b><br>low:<b>[[low]]</b><br>high:<b>[[high]]</b>";
				graph.useDataSetColors = false;
				stockPanel.addStockGraph(graph);

				var stockLegend = new AmCharts.StockLegend();
				stockLegend.markerType = "none";
				stockLegend.markerSize = 0;
				stockLegend.valueTextRegular = undefined;
				stockLegend.valueWidth = 250;
				stockPanel.stockLegend = stockLegend;

				chart.panels = [stockPanel];


				// OTHER SETTINGS ////////////////////////////////////
				var sbsettings = new AmCharts.ChartScrollbarSettings();
				sbsettings.graph = graph;
				sbsettings.graphType = "line";
				sbsettings.usePeriod = "WW";
				chart.chartScrollbarSettings = sbsettings;

				// Enable pan events
				var panelsSettings = new AmCharts.PanelsSettings();
				panelsSettings.panEventsEnabled = true;
				chart.panelsSettings = panelsSettings;

				// CURSOR
				var cursorSettings = new AmCharts.ChartCursorSettings();
				cursorSettings.valueBalloonsEnabled = true;
				cursorSettings.fullWidth = true;
				cursorSettings.cursorAlpha = 0.1;
				chart.chartCursorSettings = cursorSettings;

				// PERIOD SELECTOR ///////////////////////////////////
				var periodSelector = new AmCharts.PeriodSelector();
				periodSelector.position = "bottom";
				periodSelector.periods = [{
					period: "DD",
					count: 10,
					label: "10 days"
				}, {
					period: "MM",
					selected: true,
					count: 1,
					label: "1 month"
				}, {
					period: "YYYY",
					count: 1,
					label: "1 year"
				}, {
					period: "YTD",
					label: "YTD"
				}, {
					period: "MAX",
					label: "MAX"
				}];
				chart.periodSelector = periodSelector;


				chart.write('chartdiv');
			}



			function addPanel() {
				newPanel = new AmCharts.StockPanel();
				newPanel.allowTurningOff = true;
				newPanel.title = "Volume";
				newPanel.showCategoryAxis = false;

				var graph = new AmCharts.StockGraph();
				graph.valueField = "volume";
				graph.fillAlphas = 0.15;
				newPanel.addStockGraph(graph);

				var legend = new AmCharts.StockLegend();
				legend.markerType = "none";
				legend.markerSize = 0;
				newPanel.stockLegend = legend;

				chart.addPanelAt(newPanel, 1);
				chart.validateNow();

				document.getElementById("addPanelButton").disabled = true;
				document.getElementById("removePanelButton").disabled = false;
			}

			function removePanel() {
				chart.removePanel(newPanel);
				chart.validateNow();

				document.getElementById("addPanelButton").disabled = false;
				document.getElementById("removePanelButton").disabled = true;
			}

		</script>
		
	<input type="button" id="addPanelButton" onclick="addPanel()" value="add panel">
		<input type="button" disabled="true" id="removePanelButton" onclick="removePanel()"
		value="remove panel">
		<div id="chartdiv"></div>
				</div>
				<div class="chat-grids">
					<div class="col-md-6 chat-grid">
					<div class="grid-1">
									<h3>Bar</h3>
									<canvas id="bar1" height="250" width="700" style="width: 500px; height: 300px;"></canvas>
									<script>
										var barChartData = {
											labels : ["Mon","Tue","Wed","Thu","Fri","Sat","Mon","Tue","Wed","Thu"],
											datasets : [
												{
													fillColor : "#7c38bc",
													strokeColor : "#7c38bc",
													data : [25,40,50,65,55,30,20,10,6,4]
												},
												{
													fillColor : "#7c38bc",
													strokeColor : "#7c38bc",
													data : [30,45,55,70,40,25,15,8,5,2]
												}
											]
											
										};
											new Chart(document.getElementById("bar1").getContext("2d")).Bar(barChartData);
									</script>
								</div>
					</div>
					<div class="col-md-6 chat-grid1">
						<div class="grid-1">
								<h3>Line</h3>
								<canvas id="line1" height="300" width="700" style="width: 500px; height: 300px;"></canvas>
								<script>
										var lineChartData = {
											labels : ["Mon","Tue","Wed","Thu","Fri","Sat","Mon"],
											datasets : [
												{
													fillColor : "#fff",
													strokeColor : "#0e62c7",
													pointColor : "#0e62c7",
													pointStrokeColor : "#0e62c7",
													data : [20,35,45,30,10,65,40]
												}
											]
											
										};
										new Chart(document.getElementById("line1").getContext("2d")).Line(lineChartData);
								</script>
							</div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="weathers-grids">
					<div class="col-md-6 weather-grid">
					<div class="main-info">
					<div class="weather-top">	
						<div class="weather-grids">
							<h3 class="fri">Friday </h3>
							<h3>Weather</h3>
						</div>
						<div class="weather-grids weather-mdl">
							<canvas id="clear-day" width="70" height="70"></canvas>
						</div>
						<div class="weather-grids">
							<h4>Max 27°</h4>
							<h2>21°C</h2>
							<h4>Min 10°</h4>
						</div>
						<div class="clearfix"> </div>
					</div>
				<div class="weather-bottom">	
				<ul>
					<li class="bg"><h4>FRI</h4>
						<figure class="icons">
							<canvas id="clear-night" width="40" height="40"></canvas>
						</figure>
						<h5>27°C</h5>
						<h6>17°C</h6>
					</li>
					<li><h4>SAT</h4>
						<figure class="icons">
							<canvas id="partly-cloudy-day" width="40" height="40"></canvas>
						</figure>
						<h5>20°C</h5>
						<h6>15°C</h6>
					</li>
					<li class="bg"><h4>SUN</h4>
						<figure class="icons">
							<canvas id="cloudy" width="40" height="40"></canvas>
						</figure>
						<h5>18°C</h5>
						<h6>12°C</h6>
					</li>
					<li><h4>MON</h4>
						<figure class="icons">
							<canvas id="sleet" width="40" height="40"></canvas>
						</figure>
						<h5>17°C</h5>
						<h6>12°C</h6>
					</li>
					<li class="bg"><h4>TUE</h4>
						<figure class="icons">
							<canvas id="rain" width="40" height="40"></canvas>
						</figure>
						<h5>17°C</h5>
						<h6>10°C</h6>
					</li>
					<li><h4>WED</h4>
						<figure class="icons">
							<canvas id="snow" width="40" height="40"></canvas>
						</figure>
						<h5>24°C</h5>
						<h6>10°C</h6>
					</li>
					<li class="bg"><h4>THR</h4>
						<figure class="icons">
							<canvas id="wind" width="40" height="40"></canvas>
						</figure>
						<h5>25°C</h5>
						<h6>15°C</h6>
					</li>
				</ul>
				<div class="clearfix"> </div>
			</div>
				<script>
					 var icons = new Skycons({"color": "#68b828"}),
						  list  = [
							"clear-day"
						  ],
						  i;

					  for(i = list.length; i--; )
						icons.set(list[i], list[i]);

					  icons.play();
				</script>
				<script>
					 var icons = new Skycons({"color": "#f7aa47"}),
						  list  = [
							"clear-night", "partly-cloudy-day",
							"partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
							"fog"
						  ],
						  i;

					  for(i = list.length; i--; )
						icons.set(list[i], list[i]);

					  icons.play();
				</script>
			</div>
					</div>
					<div class="col-md-6 graph-grid">
						<div class="mani-grp">
						<canvas id="bar" height="330" width="650"></canvas>
						<script>

							var barChartData = {
								labels : ["January","February","March","April","May","June","July"],
								datasets : [
									{
										fillColor : "#f7aa47",
										strokeColor : "#FFF",
										data : [65,59,90,81,56,55,40]
									},
									{
										fillColor : "#0e62c7",
										strokeColor : "#FFF",
										data : [28,48,40,19,96,27,100]
									}
								]
								
							}

						var myLine = new Chart(document.getElementById("bar").getContext("2d")).Bar(barChartData);
						
						</script>
					</div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="piechat-section">
					<div class="col-md-4 pie-chat">
						<div class="content-top-1">
							<div class="col-md-6 top-content">
								<h5>Tasks</h5>
								<label>9836</label>
							</div>
							<div class="col-md-6 top-content1">	   
								<div id="demo-pie-1" class="pie-title-center" data-percent="25"> <span class="pie-value"></span> </div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="col-md-4 pie-chat">
						<div class="content-top-1">
							<div class="col-md-6 top-content">
								<h5>Points</h5>
								<label>9836</label>
							</div>
							<div class="col-md-6 top-content1">	   
								<div id="demo-pie-2" class="pie-title-center" data-percent="50"> <span class="pie-value"></span> </div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="col-md-4 pie-chat">
						<div class="content-top-1">
							<div class="col-md-6 top-content">
								<h5>Cards</h5>
								<label>5689</label>
							</div>
							<div class="col-md-6 top-content1">	   
								<div id="demo-pie-3" class="pie-title-center" data-percent="75"> <span class="pie-value"></span> </div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
					<div class="photoday-section">
						<div class="col-md-4 photoday-grid">
							<div class="photoday">
								<img src="<?php echo $this->baseURL ;?>Assets/admin/images/p.jpg" class="img-responsive" alt=""/>
								<div class="photo-text">
									<h4>Strawhat In The Beach</h4>
									<p><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i> San Franciso, California, Uk</p>
									<p>By: <a href="#">ThemePixabay</a></p>
								</div>
								<div class="photo1">
									<div class="col-md-4 phot-grid">
										<p><i class="glyphicon glyphicon-eye-open" aria-hidden="true"></i> 32,102 </p>
									</div>
									<div class="col-md-4 phot-grid">
										<p><a href="#"><i class="glyphicon glyphicon-heart" aria-hidden="true"></i> 1005 </a></p>
									</div>
									<div class="col-md-4 phot-grid">
										<p><a href="#"><i class="glyphicon glyphicon-comment" aria-hidden="true"></i> 70 </a></p>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
						<div class="col-md-4 photoday-grid">
							<div class="message-top">
								<div class="message-left">
								<h3>Messaging</h3>
								</div>
								<div class="message-right">
								<i class="glyphicon glyphicon-edit" aria-hidden="true"></i>
								</div>
								<div class="clearfix"></div>
								</div>
								<div class="message-bottom">
									<div class="message1-left">
										<h4>Holly Golightly</h4>
										<p>Lorem ipsum dolor sit amet...</p>
									</div>
									<div class="message1-right">
										<p>Feb 10</p>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="message-bottom">
									<div class="message1-left">
										<h4>Marsha Mellow</h4>
										<p>Lorem ipsum dolor sit amet...</p>
									</div>
									<div class="message1-right">
										<p>Aug 9</p>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="message-bottom">
									<div class="message1-left">
										<h4>Holly Golightly</h4>
										<p>Lorem ipsum dolor sit amet...</p>
									</div>
									<div class="message1-right">
										<p>Jan 5</p>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="message-bottom">
									<div class="message1-left">
										<h4>Marsha Mellow</h4>
										<p>Lorem ipsum dolor sit amet...</p>
									</div>
									<div class="message1-right">
										<p>Dec 10</p>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="message-bottom">
									<div class="message1-left">
										<h4>Holly Golightly</h4>
										<p>Lorem ipsum dolor sit amet...</p>
									</div>
									<div class="message1-right">
										<p>Dec 10</p>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="col-md-4 photoday-grid">
								<div class="progress-top">
									<h4>CPU Usage <span>(40.05 - 32 cpus)</span></h4>
									<div class="progress">
									  <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
										<span class="sr-only">60% Complete (success)</span>
									  </div>
									</div>
									<h4>Memory Usage <span>(32.2%) </span></h4>
									<div class="progress">
									  <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
										<span class="sr-only">40% Complete</span>
									  </div>
									</div>
									<h4>Disk Usage <span>(82.2%) </span></h4>
									<div class="progress">
									  <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
										<span class="sr-only">60% Complete (warning)</span>
									  </div>
									</div>
									<h4>Databases <span>(63/100)</span> </h4>
									<div class="progress">
									   <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
										<span class="sr-only">20% Complete (warning)</span>
									  </div>
									</div>
								</div>
								<div class="progress-bottom">
									<div class="cal-left">
										<div class="cal">
											<i class="glyphicon glyphicon-calendar" aria-hidden="true"></i>
										</div>
										<div class="cal-text">
											<h4>Sat, Dec 13</h4>
										</div>
									</div>
									<div class="time-right">
									<div class="cal">
									<i class="glyphicon glyphicon-time" aria-hidden="true"></i>
									</div>
									<div class="cal-text">
									<h4>4:50AM PST</h4>
									</div>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
					</div>
						<div class="row calender widget-shadow">
					<h4 class="title">Calender</h4>
					<div class="cal1">
						
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			</div>
			<div class="copy-section">
		<p>&copy; 2016 Ultra Modern. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
		</div>
	</div>
			<!-- Classie -->
				<script src="<?php echo $this->baseURL ;?>Assets/admin/js/classie.js"></script>
				<script>
					var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
						showLeftPush = document.getElementById( 'showLeftPush' ),
						body = document.body;
						
					showLeftPush.onclick = function() {
						classie.toggle( this, 'active' );
						classie.toggle( body, 'cbp-spmenu-push-toright' );
						classie.toggle( menuLeft, 'cbp-spmenu-open' );
						disableOther( 'showLeftPush' );
					};
					

					function disableOther( button ) {
						if( button !== 'showLeftPush' ) {
							classie.toggle( showLeftPush, 'disabled' );
						}
					}
				</script>
			<!-- Bootstrap Core JavaScript --> 
				
				<script type="text/javascript" src="<?php echo $this->baseURL ;?>Assets/admin/js/bootstrap.min.js"></script>
				<!--scrolling js-->
				<script src="<?php echo $this->baseURL ;?>Assets/admin/js/jquery.nicescroll.js"></script>
				<script src="<?php echo $this->baseURL ;?>Assets/admin/js/scripts.js"></script>
				<link href="<?php echo $this->baseURL ;?>Assets/admin/css/bootstrap.min.css" rel="stylesheet">

				<!--//scrolling js-->
				<div class="modal fade" id="myModal1" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body">
							<div class="more-grids">
									<h3>New Message </h3>
									<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
									  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button
								
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- //Register -->


</body>
</html>
