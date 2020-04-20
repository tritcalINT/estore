$(document).ready(function(){
	displayChart();
	setInterval(function(){displayChart()}, 1000 * 60 * 1);
});


function displayChart(){
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
			
			var speedCanvas = document.getElementById("salesChart");

			var dataFirst = {
				label: "RC Growth Rate",
				data: ch_val,
				lineTension: 0.3,
				fill: false,
				borderColor: '#E77512',
				backgroundColor: 'transparent',
				pointBorderColor: '#949BA2',
				pointBackgroundColor: '#E77512',
				pointRadius: 3,
				pointHoverRadius: 5,
				pointHitRadius: 20,
				pointBorderWidth: 2,
				pointStyle: 'rect'
			  };

			var speedData = {
			  labels: ch_dt,
			  datasets: [dataFirst]
			};

			var chartOptions = {
			  legend: {
				display: false,
				position: 'top',
				labels: {
				  boxWidth: 20,
				  fontColor: 'white'
				}
			  }
			};

			var lineChart = new Chart(speedCanvas, {
			  type: 'line',
			  data: speedData,
			  options: chartOptions
			});


		  }
	});
}
