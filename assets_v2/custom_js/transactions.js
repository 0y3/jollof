/*
 * Author: Abdullah A Almsaeed
 * Date: 4 Jan 2014
 * Description:
 *      This is a demo file used only for the main dashboard (index.html)
 **/

$(function () {

  "use strict";
  
  var merchantname = "payporte";
  $.post(API_BASE + 'transactiontrend', {merchantname: merchantname}, function(data_api) 
		{
	  		
			var line = new Morris.Line({
			    element: 'line-chart',
			    resize: true,
			    data: data_api,
			    xkey: 'y',
			    ykeys: ['item1'],
			    labels: ['Total Purchases'],
			    lineColors: ['#efefef'],
			    lineWidth: 2,
			    hideHover: 'auto',
			    gridTextColor: "#fff",
			    gridStrokeWidth: 0.4,
			    pointSize: 4,
			    pointStrokeColors: ["#efefef"],
			    gridLineColor: "#efefef",
			    gridTextFamily: "Open Sans",
			    gridTextSize: 10
			  });
						
		});
  
  $.post(API_BASE + 'freedrugstrend', {merchantname: merchantname}, function(data_api) 
			{
		  		
				var line2 = new Morris.Line({
				    element: 'freedrugschart',
				    resize: true,
				    data: data_api,
				    xkey: 'y',
				    ykeys: ['item1'],
				    labels: ['Free Drugs'],
				    lineColors: ['#efefef'],
				    lineWidth: 2,
				    hideHover: 'auto',
				    gridTextColor: "#fff",
				    gridStrokeWidth: 0.4,
				    pointSize: 4,
				    pointStrokeColors: ["#efefef"],
				    gridLineColor: "#efefef",
				    gridTextFamily: "Open Sans",
				    gridTextSize: 10
				  });
							
			});
  
  $.post(API_BASE + 'productsharechart', {merchantname: merchantname}, function(data_api) 
			{
		  		
			  var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
			  var pieChart = new Chart(pieChartCanvas);
			  var PieData = data_api;
			  var pieOptions = {
			    //Boolean - Whether we should show a stroke on each segment
			    segmentShowStroke: true,
			    //String - The colour of each segment stroke
			    segmentStrokeColor: "#fff",
			    //Number - The width of each segment stroke
			    segmentStrokeWidth: 2,
			    //Number - The percentage of the chart that we cut out of the middle
			    percentageInnerCutout: 50, // This is 0 for Pie charts
			    //Number - Amount of animation steps
			    animationSteps: 100,
			    //String - Animation easing effect
			    animationEasing: "easeOutBounce",
			    //Boolean - Whether we animate the rotation of the Doughnut
			    animateRotate: true,
			    //Boolean - Whether we animate scaling the Doughnut from the centre
			    animateScale: false,
			    //Boolean - whether to make the chart responsive to window resizing
			    responsive: true,
			    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
			    maintainAspectRatio: true,
			    //String - A legend template
			    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
			  };
			  //Create pie or douhnut chart
			  // You can switch between pie and douhnut using the method below.
			  pieChart.Doughnut(PieData, pieOptions);
							
			});
  
  
//-------------
  //- PIE CHART - 
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  
  
  



});
