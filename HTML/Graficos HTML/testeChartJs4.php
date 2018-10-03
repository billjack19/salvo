<?php

if (!empty($_REQUEST['data'])) {
	echo "
<script>
	alert(\"".$_REQUEST['data']."\")
</script>";
}

?>

<html>
<head>
	<title>Graficos em HTML</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script> -->
	<script src="Chart2.js"></script>
	<script src="utils.js"></script>
</head>
<body style="margin-top: 2%;">
	<!-- <div class="col-md-8"> -->
	<center>
		<h1>Gráfico Evolução Resultados</h1>
	<!-- <div style="width: 100%;text-align: center;"> -->
		<div id="id_div" style="width: 80%;">
			<canvas id="myChart" style="border-style: solid;"></canvas>
		</div>
	<!-- </div> -->
	</center>
	<!-- </div> -->
	<!-- <div class="col-md-4 hidden"> -->
		<!-- <input type="text" class="hidden" id='infoToolsCampo'> -->
		<!-- <div id="infoTools" style="background: lightblue;"> -->
			<!-- <thead>
				<tr>
					<th>01/07/2018</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<span style="background:rgba(0, 0, 0, 0); border-color:rgb(0, 117, 0); border-width: 2px"></span> PERC_B_ATUAL: 3.5679503906946
					</td>
				</tr>
			</tbody> -->
		</div>
	<!-- </div> -->
<script>
	var dadosGraficos_Global = "";
	// $("#id_div")[0].style.height = window.innerWidth * 0.6;

	// Define a plugin to provide data labels
	Chart.plugins.register({
		afterDatasetsDraw: function(chart) {
			var ctx = chart.ctx;

			chart.data.datasets.forEach(function(dataset, i) {
				var meta = chart.getDatasetMeta(i);
				if (!meta.hidden) {
					meta.data.forEach(function(element, index) {
						// Draw the text in black, with the specified font
						ctx.fillStyle = 'rgb(0, 0, 0)';

						var fontSize = 15;
						var fontStyle = 'normal';
						var fontFamily = 'Calibri'; //Helvetica Neue';
						ctx.font = Chart.helpers.fontString(fontSize, fontStyle, fontFamily);

						// Just naively convert to string for now
						var dataString = dataset.data[index].toString();

						// Make sure alignment settings are correct
						ctx.textAlign = 'center';
						ctx.textBaseline = 'middle';

						var padding = 5;
						var position = element.tooltipPosition();
						ctx.fillText(dataString, position.x, position.y - (fontSize / 2) - padding);
					});
				}
			});
		}
	});


	$.ajax({
		url: "http://localhost:8088/intranet_linux/lb/controllerGrafico.php",
		type: "POST",
		dataType: "text",
		data: { "exemploGrafico": true },
		error: function(){
			alert("Falha ao fazer a requisição");
		}
	}).done( function(data){
		console.log(data);
		try {
			data = JSON.parse(data);
			dadosGraficos_Global = data;
			// data.labels = data.labels.replace("[", "").replace("]", "").split(",") ;

			// for (var i = data.datasets.length - 1; i >= 0; i--) {
				// data.datasets[i].data = JSON.parse(data.datasets[i].data);
				// data.datasets[i].backgroundColor = data.datasets[i].backgroundColor.split(",");
			// }

			console.log(data);
			var ctx = document.getElementById('myChart').getContext('2d');
			var chart = new Chart(ctx, {
				/* tipo do graficos de linha, barra, pizza... */
				// type: 'line',
				type: 'bar',
				/* dados do graficoss */
				data: data,

				/* configurções gerais */
				options: {
					scales: {
						yAxes: [{
							ticks: {
								// Include a dollar sign in the ticks
								callback: function(value, index, values) {
									return '' + value;
								},
								min: 0,
								// max: 13
							}
						}]
					},

					/* opções de animação */
					animation: {
						onProgress: function(animation) { /* progress.value = animation.animationObject.currentStep / animation.animationObject.numSteps;  */ },
						onComplete: function(animation) { },
						duration: 1000,
						easing:'easeInQuad',
						// 'linear'					// 'easeInQuad'				// 'easeOutQuad'			// 'easeInOutQuad'			// 'easeInCubic'			
						// 'easeOutCubic'			// 'easeInOutCubic'			// 'easeInQuart'			// 'easeOutQuart'			// 'easeInOutQuart'			
						// 'easeInQuint'			// 'easeOutQuint'			// 'easeInOutQuint'			// 'easeInSine'				// 'easeOutSine'			
						// 'easeInOutSine'			// 'easeInExpo'				// 'easeOutExpo'			// 'easeInOutExpo'			// 'easeInCirc'
						// 'easeOutCirc'			// 'easeInOutCirc'			// 'easeInElastic'			// 'easeOutElastic'			// 'easeInOutElastic'		
						// 'easeInBack'				// 'easeOutBack'			// 'easeInOutBack'			// 'easeInBounce'			// 'easeOutBounce'			
						// 'easeInOutBounce'
					},
					// layout: {// padding: {// left: 50, // right: 0, // top: 0, // bottom: -80 // } // },
					/* estilo da legenda */
					legend: {
						display: true,
						position: "bottom",
						onHover: function(e, legendItem){
							/*var index = legendItem.datasetIndex;
							var ci = this.chart;
							var meta = ci.getDatasetMeta(index);

							// See controller.isDatasetVisible comment
							meta.hidden = meta.hidden === null? !ci.data.datasets[index].hidden : null;

							// We hid a dataset ... rerender the chart
							ci.update();*/
						},
						// labels: { fontColor: 'gray' }
					},
					title: {
						display: false,
						text: 'Gráfico Evolução Resultados',
						fontSize: 25,
						fullWidth: false,
						fontColor: "black",
					},
					responsive: true,
					tooltips: {
						enabled: true,
						// mode: 'index',
						// intersect: true
						custom: function(tooltipModel) {
			                // Tooltip Element
			                var tooltipEl = document.getElementById('chartjs-tooltip');

			                // Create element on first render
			                if (!tooltipEl) {
			                    tooltipEl = document.createElement('div');
			                    tooltipEl.id = 'chartjs-tooltip';
			                    tooltipEl.innerHTML = "<table></table>";
			                    document.body.appendChild(tooltipEl);
			                }

			                // Hide if no tooltip
			                if (tooltipModel.opacity === 0) {
			                    tooltipEl.style.opacity = 0;
			                    return;
			                }

			                // Set caret Position
			                tooltipEl.classList.remove('above', 'below', 'no-transform');
			                if (tooltipModel.yAlign) {
			                    tooltipEl.classList.add(tooltipModel.yAlign);
			                } else {
			                    tooltipEl.classList.add('no-transform');
			                }

			                function getBody(bodyItem) {
			                    return bodyItem.lines;
			                }

			                // Set Text
			                if (tooltipModel.body) {
								console.log("tooltipModel");
								console.log(tooltipModel);

			                    var titleLines = tooltipModel.title || [];
			                    var bodyLines = tooltipModel.body.map(getBody);

			                    var innerHtml = '<thead>';

			                    titleLines.forEach(function(title) {
			                        innerHtml += '<tr><th>' + title + '</th></tr>';
			                    });
			                    innerHtml += '</thead><tbody>';

			                    bodyLines.forEach(function(body, i) {
			                        var colors = tooltipModel.labelColors[i];
			                        var style = 'background:' + colors.backgroundColor;
			                        style += '; border-color:' + colors.borderColor;
			                        style += '; border-width: 2px';
			                        var span = '<span style="' + style + '"></span>';
			                        innerHtml += '<tr><td>' + span + body + '</td></tr>';
			                    });
			                    innerHtml += '</tbody>';

			                    var tableRoot = tooltipEl.querySelector('table');
			                    // tableRoot.innerHTML = innerHtml;
			                    // document.getElementById("infoTools").innerHTML = "<table>" + innerHtml + "</table>";
			                    // document.getElementById("infoToolsCampo").value = innerHtml;
			                    // console.log(innerHtml);
			                }

			                // `this` will be the overall tooltip
			                var position = this._chart.canvas.getBoundingClientRect();

			                // Display, position, and set styles for font
			                tooltipEl.style.opacity = 1;
			                tooltipEl.style.position = 'absolute';
			                tooltipEl.style.left = position.left + tooltipModel.caretX + 'px';
			                tooltipEl.style.top = position.top + tooltipModel.caretY + 'px';
			                tooltipEl.style.fontFamily = tooltipModel._bodyFontFamily;
			                tooltipEl.style.fontSize = tooltipModel.bodyFontSize + 'px';
			                tooltipEl.style.fontStyle = tooltipModel._bodyFontStyle;
			                tooltipEl.style.padding = tooltipModel.yPadding + 'px ' + tooltipModel.xPadding + 'px';
			            }
					}
				}
			});
		} catch(erro){
			alert("não conseguiu conveter resultado em objeto JSON");
			console.error(erro);
		}
	});
</script>
</body>
</html>


<!-- 
{
	labels: ["January", "February", "March", "April", "May", "June", "July"],
	/*datasets: [
		{
			type: 'line',
			label: "My First dataset",
			borderWidth: 2,
			backgroundColor: 'rgb(0, 0, 0, 0)', // rgb(255, 99, 132)
			borderColor: '#40e0d0', // rgb(255, 99, 132)
			data: [0, 10, 5, 2, 20, 30, 45],
		}*/
	// ]
	datasets: [
		{
			type: 'line',
			label: 'Dataset 1',
			borderWidth: 2,
			backgroundColor: 'rgb(0, 0, 0, 0)', // rgb(255, 99, 132)
			// fill: false,
			data: [0, 10, 5, 2, 20, 30, 45],
			borderColor: "blue",
		},{
			type: 'line',
			label: 'Dataset 2',
			backgroundColor: 'rgb(0, 0, 0, 0)', // rgb(255, 99, 132)
			data: [ 15, 35, 55, 5, 7, 56, 35],
			borderColor: 'red',
			borderWidth: 2,
		},{
			type: 'bar',
			label: 'Dataset 3',
			backgroundColor: "green",
			data: [ 14, 24, 34, 25, 14, 10, 34],
		},{
			type: 'bar',
			label: 'Dataset 4',
			borderWidth: 2,
			backgroundColor: 'rgb(0, 0, 0, 0)', // rgb(255, 99, 132)
			// fill: false,
			data: [10, 0, 2, 5, 30, 40, 20],
			backgroundColor: "orange",
			borderColor: "orange",
		}
	]
}


 -->