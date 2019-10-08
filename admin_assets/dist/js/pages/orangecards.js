/*
 * Author: Oludele Oluwaseun
 * Date: 20 May 2017
 * Description: Orange cards dashboard
 *      
 **/

$(function () {

  "use strict";
  
  var merchantname = "payporte";
  $.post(API_BASE + 'cardassignmenttrend', {merchantname: merchantname}, function(data_api) 
		{
	  		
			var line = new Morris.Line({
			    element: 'line-chart',
			    resize: true,
			    data: data_api,
			    xkey: 'y',
			    ykeys: ['item1'],
			    labels: ['Cards Assigned'],
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
  
  
  



});
