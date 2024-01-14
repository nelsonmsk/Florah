(function($) {
  'use strict';
  $(function() {

/** 
*** Dashboard Charts ***
**/
    var host = $('meta[name="env"]').attr('content');
    var dc_url = host + '/Dashboard';
    var $dcData = []; var $dkData = [];
	var $plData = []; var $msData = [];
    $.get(dc_url, function(response) {	
	
		/** 
		*** Orders Line Dashboard Charts ***
		**/	  
		if ($("#orders-line-chart").length) {
			if (response.error){				
				var areaData = {
					labels: ["1","2","3","4","5","6"],
					datasets: [
					  {
						data: [200, 480, 700, 600, 620, 350, 380, 350, 850, ],
						borderColor: [
						  '#4747A1'
						],
						borderWidth: 2,
						fill: false,
						label: "Completed"
					  },
					  {
						data: [400, 450, 410, 500, 480, 600, 450, 550, 460],
						borderColor: [
						  '#F09397'
						],
						borderWidth: 2,
						fill: false,
						label: "Incomplete"
					  },
					  {
						data: [300, 450, 510, 500, 780, 610, 420, 250, 760],
						borderColor: [
						  '#FF4560'
						],
						borderWidth: 2,
						fill: false,
						label: "Pending"
					  },
					 {
						data: [3, 4, 5, 5, 7, 6, 4, 2, 7],
						borderColor: [
						  '#004560'
						],
						borderWidth: 2,
						fill: false,
						label: "cancelled"
					 }	
					]
				};
			}else{ 
			$plData = response.pData;	
			console.log('$plData',$plData);			
				var areaData = {
					labels: ["1","2","3","4", "5", "6"],
					datasets: [
					  {
						data: [$plData['pc0'],$plData['pc1'], $plData['pc2'], $plData['pc3'], $plData['pc4'], $plData['pc5']],
						borderColor: [
						  '#57b657'
						],
						borderWidth: 2,
						fill: false,
						label: "Completed"
					  },
					  {
						data: [$plData['pi0'],$plData['pi1'], $plData['pi2'], $plData['pi3'], $plData['pi4'], $plData['pi5']],
						borderColor: [
						  '#FFC100'
						],
						borderWidth: 2,
						fill: false,
						label: "Active"
					  },
					  {
						data: [$plData['pp0'],$plData['pp1'], $plData['pp2'], $plData['pp3'], $plData['pp4'], $plData['pp5']],
						borderColor: [
						  '#4B49AC'
						],
						borderWidth: 2,
						fill: false,
						label: "Processing"
					  },
					 {
						data: [$plData['pa0'],$plData['pa1'], $plData['pa2'], $plData['pa3'], $plData['pa4'], $plData['pa5']],
						borderColor: [
						  '#FF4747'
						],
						borderWidth: 2,
						fill: false,
						label: "Cancelled"
					 }					  
					]
				};				
			}
			var areaOptions = {
				responsive: true,
				maintainAspectRatio: true,
				plugins: {
				  filler: {
					propagate: false
				  }
				},
				scales: {
				  xAxes: [{
					display: true,
					ticks: {
					  display: true,
					  padding: 10,
					  fontColor:"#6C7383"
					},
					gridLines: {
					  display: false,
					  drawBorder: false,
					  color: 'transparent',
					  zeroLineColor: '#eeeeee'
					}
				  }],
				  yAxes: [{
					display: true,
					ticks: {
					  display: true,
					  autoSkip: false,
					  maxRotation: 0,
					  stepSize: 200,
					  min: 0,
					  max: 1000,
					  padding: 18,
					  fontColor:"#6C7383"
					},
					gridLines: {
					  display: true,
					  color:"#f2f2f2",
					  drawBorder: false
					}
				  }]
				},
				legend: {
				  display: false
				},
				tooltips: {
				  enabled: true
				},
				elements: {
				  line: {
					tension: .35
				  },
				  point: {
					radius: 0
				  }
				}
			}  
			var ordersLineChartCanvas = $("#orders-line-chart").get(0).getContext("2d");
			var ordersLineChart = new Chart(ordersLineChartCanvas, {
				type: 'line',
				data: areaData,
				options: areaOptions
			});
		}


		if ($("#mailsubscriptions-chart").length) {
			var MailsubscriptionsChartCanvas = $("#mailsubscriptions-chart").get(0).getContext("2d");			
			if (response.error){
				var MailsubscriptionsChart = new Chart(MailsubscriptionsChartCanvas, {
					type: 'bar',
					data: {
					  labels: ["Jan", "Feb", "Mar", "Apr", "May"],
					  datasets: [{
						  label: 'Active Subscriptions',
						  data: [480, 230, 870, 210, 330],
						  backgroundColor: '#98BDFF'
						},
						{
						  label: 'Cancelled Subscriptions',
						  data: [400, 340, 850, 480, 170],
						  backgroundColor: '#4B49AC'
						}
					  ]
					},
					options: {
					  cornerRadius: 5,
					  responsive: true,
					  maintainAspectRatio: true,
					  layout: {
						padding: {
						  left: 0,
						  right: 0,
						  top: 20,
						  bottom: 0
						}
					  },
					  scales: {
						yAxes: [{
						  display: true,
						  gridLines: {
							display: true,
							drawBorder: false,
							color: "#F2F2F2"
						  },
						  ticks: {
							display: true,
							min: 0,
							max: 560,
							callback: function(value, index, values) {
							  return  value;
							},
							autoSkip: true,
							maxTicksLimit: 10,
							fontColor:"#6C7383"
						  }
						}],
						xAxes: [{
						  stacked: false,
						  ticks: {
							beginAtZero: true,
							fontColor: "#6C7383"
						  },
						  gridLines: {
							color: "rgba(0, 0, 0, 0)",
							display: false
						  },
						  barPercentage: 1
						}]
					  },
					  legend: {
						display: false
					  },
					  elements: {
						point: {
						  radius: 0
						}
					  }
					},
				});
			}else{
			$msData = response.msData;						
				var MailsubscriptionsChart = new Chart(MailsubscriptionsChartCanvas, {
					type: 'bar',
					data: {
					  labels: [$msData['sm5'],$msData['sm4'], $msData['sm3'], $msData['sm2'], $msData['sm1'], $msData['sm0']],
					  datasets: [{
						  label: 'Active Subscriptions',
						  data:  [$msData['msa0'],$msData['msa1'], $msData['msa2'], $msData['msa3'], $msData['msa4'], $msData['msa5']],
						  backgroundColor: '#98BDFF'
						},
						{
						  label: 'Cancelled Subscriptions',
						  data:  [$msData['msc0'],$msData['msc1'], $msData['msc2'], $msData['msc3'], $msData['msc4'], $msData['msc5']],
						  backgroundColor: '#4B49AC'
						}
					  ]
					},
					options: {
					  cornerRadius: 5,
					  responsive: true,
					  maintainAspectRatio: true,
					  layout: {
						padding: {
						  left: 0,
						  right: 0,
						  top: 20,
						  bottom: 0
						}
					  },
					  scales: {
						yAxes: [{
						  display: true,
						  gridLines: {
							display: true,
							drawBorder: false,
							color: "#F2F2F2"
						  },
						  ticks: {
							display: true,
							min: 0,
							max: 10000,
							callback: function(value, index, values) {
							  return  value ;
							},
							autoSkip: true,
							maxTicksLimit: 10,
							fontColor:"#6C7383"
						  }
						}],
						xAxes: [{
						  stacked: false,
						  ticks: {
							beginAtZero: true,
							fontColor: "#6C7383"
						  },
						  gridLines: {
							color: "rgba(0, 0, 0, 0)",
							display: false
						  },
						  barPercentage: 1
						}]
					  },
					  legend: {
						display: false
					  },
					  elements: {
						point: {
						  radius: 0
						}
					  }
					},
				});				
			}
		   document.getElementById('mailsubscriptions-legend').innerHTML = MailsubscriptionsChart.generateLegend();
		}

	
		/** 
		*** Hires Dashboard Charts ***
		**/
	
		if ($("#hires-chart").length) {
			if (response.error){			
			  var areaData = {
				labels: ["NY", "WDC", "JHB","CT","LN","GA"],
				datasets: [{
					data: [500, 350, 350, 200, 500, 100],
					backgroundColor: [
					   "#4B49AC","#FFC100", "#FF4747", "#248AFD", "#57b657", "#282F3A",
					],
					borderColor: "rgba(0,0,0,0)"
				  }
				]
			  };
			  var areaOptions = {
				responsive: true,
				maintainAspectRatio: true,
				segmentShowStroke: false,
				cutoutPercentage: 76,
				elements: {
				  arc: {
					  borderWidth: 4
				  }
				},      
				legend: {
				  display: false
				},
				tooltips: {
				  enabled: true
				},
				legendCallback: function(chart) { 
				  var text = [];
				  text.push('<div class="report-chart">');
					text.push('<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[0] + '"></div><p class="mb-0">New York</p></div>');
					text.push('<p class="mb-0">' + chart.data.datasets[0].data[0] + '</p>');
					text.push('</div>');
					text.push('<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[1] + '"></div><p class="mb-0">Washington DC</p></div>');
					text.push('<p class="mb-0">' + chart.data.datasets[0].data[1] + '</p>');
					text.push('</div>');
					text.push('<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[2] + '"></div><p class="mb-0">Johannesburg</p></div>');
					text.push('<p class="mb-0">' + chart.data.datasets[0].data[2] + '</p>');
					text.push('</div>');
					text.push('<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[3] + '"></div><p class="mb-0">Cape Town</p></div>');
					text.push('<p class="mb-0">' + chart.data.datasets[0].data[3] + '</p>');
					text.push('</div>');
					text.push('<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[4] + '"></div><p class="mb-0">London</p></div>');
					text.push('<p class="mb-0">' + chart.data.datasets[0].data[4] + '</p>');
					text.push('</div>');
					text.push('<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[5] + '"></div><p class="mb-0">Geneva</p></div>');
					text.push('<p class="mb-0">' + chart.data.datasets[0].data[5] + '</p>');
					text.push('</div>');
				  text.push('</div>');
				  return text.join("");
				},
			  }
			}else{
			$dkData = response.dcData;	
				var areaData = { 
					labels: $dkData['hstatusNames'], 
					datasets: [{
						data:  $dkData['hiresperStatus'],
						backgroundColor:  $dkData['hiresColor'],
						borderColor: "rgba(0,0,0,0)"
					  }
					]
			    };	
				var areaOptions = {
					responsive: true,
					maintainAspectRatio: true,
					segmentShowStroke: false,
					cutoutPercentage: 76,
					elements: {
					  arc: {
						  borderWidth: 4
					  }
					},      
					legend: {
					  display: false
					},
					tooltips: {
					  enabled: true
					},
					legendCallback: function(chart) { 
					  var text = [];
					  text.push('<div class="report-chart">');
						for(var $i = 0; $i < $dkData['hiresbyStatusTotal']; $i++){
							text.push('<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[$i] + '"></div><p class="mb-0">' + ($dkData['hiresbyStatus'] ? $dkData['hstatusNames'][$i] : Pretoria) + '</p></div>');
							text.push('<p class="mb-0">' + chart.data.datasets[0].data[$i] + '</p>');
							text.push('</div>');						  
						}
					  text.push('</div>');
					  return text.join("");
					},
				}				
			}
		    var hiresChartPlugins = {
				beforeDraw: function(chart) {
				  var width = chart.chart.width,
					  height = chart.chart.height,
					  ctx = chart.chart.ctx;
			  
				  ctx.restore();
				  var fontSize = 3.125;
				  ctx.font = "500 " + fontSize + "em sans-serif";
				  ctx.textBaseline = "middle";
				  ctx.fillStyle = "#13381B";
			  
				  var text = "100",
					  textX = Math.round((width - ctx.measureText(text).width) / 2),
					  textY = height / 2;
			  
				  ctx.fillText(text, textX, textY);
				  ctx.save();
				}
		    }
			var hiresChartCanvas = $("#hires-chart").get(0).getContext("2d");
			var hiresChart = new Chart(hiresChartCanvas, {
				type: 'doughnut',
				data: areaData,
				options: areaOptions,
				plugins: hiresChartPlugins
			  });
			document.getElementById('hires-legend').innerHTML = hiresChart.generateLegend();
		}


		/** 
		*** Orders Dashboard Charts ***
		**/
		if ($("#orders-chart").length) {
			if (response.error){			
				var areaData = {
					labels: ["ACC", "TCP", "FS","IP","GF",],
					datasets: [{
						data: [600, 300, 300, 550, 250],
						backgroundColor: [
						  "#4B49AC","#FFC100", "#248AFD", "#FF4747","#57B657",
						],
						borderColor: "rgba(0,0,0,0)"
					  }
					]
				};
				var areaOptions = {
					responsive: true,
					maintainAspectRatio: true,
					segmentShowStroke: false,
					cutoutPercentage: 76,
					elements: {
					  arc: {
						  borderWidth: 4
					  }
					},      
					legend: {
					  display: false
					},
					tooltips: {
					  enabled: true
					},
					legendCallback: function(chart) { 
					  var text = [];
					  text.push('<div class="report-chart">');
						text.push('<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[0] + '"></div><p class="mb-0"> Business Consultancy</p></div>');
						text.push('<p class="mb-0">' + chart.data.datasets[0].data[0] + '</p>');
						text.push('</div>');
						text.push('<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[1] + '"></div><p class="mb-0">Tax,Compliance &amp Payroll</p></div>');
						text.push('<p class="mb-0">' + chart.data.datasets[0].data[1] + '</p>');
						text.push('</div>');
						text.push('<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[2] + '"></div><p class="mb-0">Financial Services</p></div>');
						text.push('<p class="mb-0">' + chart.data.datasets[0].data[2] + '</p>');
						text.push('</div>');
						text.push('<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[3] + '"></div><p class="mb-0">Investment &amp Portfolio</p></div>');
						text.push('<p class="mb-0">' + chart.data.datasets[0].data[3] + '</p>');
						text.push('</div>');
						text.push('<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[4] + '"></div><p class="mb-0">Growth &amp Funding Access</p></div>');
						text.push('<p class="mb-0">' + chart.data.datasets[0].data[4] + '</p>');
						text.push('</div>');
					  text.push('</div>');
					  return text.join("");
					},
					
				}
			}else{
			$dcData = response.dcData;
				var areaData = { 
					labels: $dcData['statusNames'], 
					datasets: [{
						data:  $dcData['ordersperStatus'],
						backgroundColor:  $dcData['ordersColor'],
						borderColor: "rgba(0,0,0,0)"
					  }
					]
			    };	
				var areaOptions = {
					responsive: true,
					maintainAspectRatio: true,
					segmentShowStroke: false,
					cutoutPercentage: 76,
					elements: {
					  arc: {
						  borderWidth: 4
					  }
					},      
					legend: {
					  display: false
					},
					tooltips: {
					  enabled: true
					},
					legendCallback: function(chart) { 
					  var text = [];
					  text.push('<div class="report-chart">');
						for(var $f = 0; $f < $dcData['ordersbyStatusTotal']; $f++){
							text.push('<div class="d-flex justify-content-between mx-4 mx-xl-5 mt-3"><div class="d-flex align-items-center"><div class="mr-3" style="width:20px; height:20px; border-radius: 50%; background-color: ' + chart.data.datasets[0].backgroundColor[$f] + '"></div><p class="mb-0">' + ($dcData['ordersbyStatus'] ? $dcData['statusNames'][$f] : Accounting) + '</p></div>');
							text.push('<p class="mb-0">' + chart.data.datasets[0].data[$f] + '</p>');
							text.push('</div>');						  
						}
					  text.push('</div>');
					  return text.join("");
					},
				}				
			}

		  var ordersChartPlugins = {
			beforeDraw: function(chart) {
			  var width = chart.chart.width,
				  height = chart.chart.height,
				  ctx = chart.chart.ctx;
		  
			  ctx.restore();
			  var fontSize = 3.125;
			  ctx.font = "600 " + fontSize + "em sans-serif";
			  ctx.textBaseline = "middle";
			  ctx.fillStyle = "#000";
		  
			  var text = "100",
				  textX = Math.round((width - ctx.measureText(text).width) / 2),
				  textY = height / 2;
		  
			  ctx.fillText(text, textX, textY);
			  ctx.save();
			}
		  }
		  var ordersChartCanvas = $("#orders-chart").get(0).getContext("2d");
		  var ordersChart = new Chart(ordersChartCanvas, {
			type: 'doughnut',
			data: areaData,
			options: areaOptions,
			plugins: ordersChartPlugins
		  });
		  document.getElementById('orders-legend').innerHTML = ordersChart.generateLegend();
		}
	});		
		
		

		function format ( d ) {
		  // `d` is the original data object for the row
		  return '<table cellpadding="5" cellspacing="0" border="0" style="width:100%;">'+
			  '<tr class="expanded-row">'+
				  '<td colspan="8" class="row-bg"><div><div class="d-flex justify-content-between"><div class="cell-hilighted"><div class="d-flex mb-2"><div class="mr-2 min-width-cell"><p>Policy start date</p><h6>25/04/2020</h6></div><div class="min-width-cell"><p>Policy end date</p><h6>24/04/2021</h6></div></div><div class="d-flex"><div class="mr-2 min-width-cell"><p>Sum insured</p><h5>$26,000</h5></div><div class="min-width-cell"><p>Premium</p><h5>$1200</h5></div></div></div><div class="expanded-table-normal-cell"><div class="mr-2 mb-4"><p>Quote no.</p><h6>Incs234</h6></div><div class="mr-2"><p>Vehicle Reg. No.</p><h6>KL-65-A-7004</h6></div></div><div class="expanded-table-normal-cell"><div class="mr-2 mb-4"><p>Policy number</p><h6>Incsq123456</h6></div><div class="mr-2"><p>Policy number</p><h6>Incsq123456</h6></div></div><div class="expanded-table-normal-cell"><div class="mr-2 mb-3 d-flex"><div class="highlighted-alpha"> A</div><div><p>Agent / Broker</p><h6>Abcd Enterprices</h6></div></div><div class="mr-2 d-flex"> <img src="../../images/faces/face5.jpg" alt="profile"/><div><p>Policy holder Name & ID Number</p><h6>Phillip Harris / 1234567</h6></div></div></div><div class="expanded-table-normal-cell"><div class="mr-2 mb-4"><p>Branch</p><h6>Koramangala, Bangalore</h6></div></div><div class="expanded-table-normal-cell"><div class="mr-2 mb-4"><p>Channel</p><h6>Online</h6></div></div></div></div></td>'
			  '</tr>'+
		  '</table>';
	  }
	  var table = $('#example').DataTable( {
		"ajax": "js/data.txt",
		"columns": [
			{ "data": "Quote" },
			{ "data": "Product" },
			{ "data": "Business" },
			{ "data": "Policy" }, 
			{ "data": "Premium" }, 
			{ "data": "Status" }, 
			{ "data": "Updated" }, 
			{
			  "className":      'details-control',
			  "orderable":      false,
			  "data":           null,
			  "defaultContent": ''
			}
		],
		"order": [[1, 'asc']],
		"paging":   false,
		"ordering": true,
		"info":     false,
		"filter": false,
		columnDefs: [{
		  orderable: false,
		  className: 'select-checkbox',
		  targets: 0
		}],
		select: {
		  style: 'os',
		  selector: 'td:first-child'
		}
	  } );
	$('#example tbody').on('click', 'td.details-control', function () {
	  var tr = $(this).closest('tr');
	  var row = table.row( tr );

	  if ( row.child.isShown() ) {
		  // This row is already open - close it
		  row.child.hide();
		  tr.removeClass('shown');
	  }
	  else {
		  // Open this row
		  row.child( format(row.data()) ).show();
		  tr.addClass('shown');
	  }
	} );
  
  });
})(jQuery);