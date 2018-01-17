$(document).ready(function () {

	/**
	 * call the data.php file to fetch the result from db table.
	 */
	$.ajax({
		url: "http://localhost/teste/api/data.php",
		type: "GET",
		success: function (data) {
			console.log(data);

			var total = {
				totalusers: [],
				totalorders: [],
				totalticketdelayed: [],
				marketing: []

			};

			var len = data.length;

			for (var i = 0; i < len; i++) {
				if (data[i].subject == "totalusers") {
					total.totalusers.push(data[i].total);
				}
				if (data[i].subject == "totalorders") {
					total.totalorders.push(data[i].total);
				}
				if (data[i].subject == "totalticketdelayed") {
					total.totalticketdelayed.push(data[i].total);
				} else if (data[i].subject == "marketing") {
					total.marketing.push(data[i].total);
				}

			}


			//get canvas
			var ctx = $("#line-chartcanvas");

			var data = {
				labels: ["January", "February", "March", "April", "May", "June", "Jully", "August", "September", "October", "November", "December"],
				datasets: [{
						label: "Total Users",
						data: total.totalusers,
						backgroundColor: "blue",
						borderColor: "blue",
						fill: false,
						lineTension: 0,
						pointRadius: 5
					},
					{
						label: "Total Orders",
						data: total.totalorders,
						backgroundColor: "green",
						borderColor: "green",
						fill: false,
						lineTension: 0,
						pointRadius: 5
					},
					{
						label: "Ticket Delayed",
						data: total.totalticketdelayed,
						backgroundColor: "red",
						borderColor: "rede",
						fill: false,
						lineTension: 0,
						pointRadius: 5
					},
					{
						label: "Marketing Campain",
						data: total.marketing,
						backgroundColor: "gray",
						borderColor: "gray",
						fill: false,
						lineTension: 0,
						pointRadius: 5
					}

				]
			};

			var options = {
				title: {
					display: true,
					position: "top",
					text: "Visual Analitics Report",
					fontSize: 18,
					fontColor: "#111"
				},
				legend: {
					display: true,
					position: "bottom"
				}
			};

			var chart = new Chart(ctx, {
				type: "line",
				data: data,
				options: options
			});

		},
		error: function (data) {
			console.log(data);
		}
	});

});