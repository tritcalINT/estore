$(document).ready(function(){
	$.ajax({

		  url: "../admin/data/chart_data.php",
		  method: "GET",
		  success: function(data) {
			var ch_dt = [];
			var ch_val = [];

			for(var i in data) {
				ch_dt.push(data[i].ch_time);
				ch_val.push(data[i].ch_val);
			}

			  // Get context with jQuery - using jQuery's .get() method.
			  var salesChartCanvas = $('#salesChart').get(0).getContext('2d');
			  // This will get the first returned node in the jQuery collection.
			  var salesChart       = new Chart(salesChartCanvas);

			  var salesChartData = {
				labels  : ch_dt,
				datasets: [
				  {
					label               : 'RC Growth Rate',
					borderColor         : '#E77512',
					strokeColor         : '#E77512',
					pointColor          : '#3b8bba',
					pointStrokeColor    : '#E77512',
					pointHighlightFill  : '#fff',
					pointHighlightStroke: '#E77512',
					data                : ch_val
				  }
				]
			  };

			  var salesChartOptions = {
				// Boolean - If we should show the scale at all
				showScale               : true,
				// Boolean - Whether grid lines are shown across the chart
				scaleShowGridLines      : false,
				// String - Colour of the grid lines
				scaleGridLineColor      : 'rgba(0,0,0,.05)',
				// Number - Width of the grid lines
				scaleGridLineWidth      : 1,
				// Boolean - Whether to show horizontal lines (except X axis)
				scaleShowHorizontalLines: true,
				// Boolean - Whether to show vertical lines (except Y axis)
				scaleShowVerticalLines  : true,
				// Boolean - Whether the line is curved between points
				bezierCurve             : true,
				// Number - Tension of the bezier curve between points
				bezierCurveTension      : 0.4,
				// Boolean - Whether to show a dot for each point
				pointDot                : true,
				// Number - Radius of each point dot in pixels
				pointDotRadius          : 2,
				// Number - Pixel width of point dot stroke
				pointDotStrokeWidth     : 1,
				// Number - amount extra to add to the radius to cater for hit detection outside the drawn point
				pointHitDetectionRadius : 20,
				// Boolean - Whether to show a stroke for datasets
				datasetStroke           : true,
				// Number - Pixel width of dataset stroke
				datasetStrokeWidth      : 2,
				// Boolean - Whether to fill the dataset with a color
				datasetFill             : false,
				// String - A legend template
				legendTemplate          : '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<datasets.length; i++){%><li><span style=\'background-color:<%=datasets[i].lineColor%>\'></span><%=datasets[i].label%></li><%}%></ul>',
				// Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
				maintainAspectRatio     : true,
				// Boolean - whether to make the chart responsive to window resizing
				responsive              : true,
				scaleFontColor			: "#FFFFFF"
			  };

			  // Create the line chart
			  salesChart.Line(salesChartData, salesChartOptions);
		  }
	});
});
