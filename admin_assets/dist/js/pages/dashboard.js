/*
 * Author: Abdullah A Almsaeed
 * Date: 4 Jan 2014
 * Description:
 *      This is a demo file used only for the main dashboard (index.html)
 **/

$(function () {

  "use strict";
  
  $.post(API_BASE + 'transactiontrend', {merchantid: merchantid, pharmacyid: pharmacyid, createdat: createdat, productid: productid}, function(data_api) 
		{
			var line = new Morris.Line({
			    element: 'line-chart',
			    resize: true,
			    data: data_api,
			    xkey: 'y',
			    ykeys: ['item1'],
			    labels: ['Purchases'],
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
  
  $.post(API_BASE + 'freedrugstrend', {merchantid: merchantid, pharmacyid: pharmacyid, createdat: createdat, productid: productid}, function(data_api) 
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
  
  $.post(API_BASE + 'discounteddrugstrend', {merchantid: merchantid, pharmacyid: pharmacyid, createdat: createdat, productid: productid}, function(data_api) 
			{
		  		
				var line2 = new Morris.Line({
				    element: 'discounteddrugschart',
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
  
  $.post(API_BASE + 'productsharechart', {merchantid: merchantid, pharmacyid: pharmacyid, createdat: createdat, productid: productid}, function(data_api) 
			{
		  		var fusioncharts = new FusionCharts({
				    type: 'pie2d',
				    renderAt: 'chart-container',
				    width: '450',
				    height: '300',
				    dataFormat: 'json',
				    dataSource: {
				        "chart": {
				            "caption": "Product Purchase Share",
				            "showPercentInTooltip": "0",
				            "decimals": "1",
				            "useDataPlotColorForLabels": "1",
				            //Theme
				            "theme": "fint"
				        },
				        "data": data_api
				    }
			  	});
		  		fusioncharts.render();
							
			});
  
  $.post(API_BASE + 'cardassignmentchart', {merchantid: merchantid, pharmacyid: pharmacyid, createdat: createdat, productid: productid}, function(data_api) 
			{
		  		var fusioncharts = new FusionCharts({
				    type: 'pie2d',
				    renderAt: 'chart-container-2',
				    width: '450',
				    height: '300',
				    dataFormat: 'json',
				    dataSource: {
				        "chart": {
				            "caption": "Pharmacy Orange Card Distribution",
				            "showPercentInTooltip": "0",
				            "decimals": "1",
				            "useDataPlotColorForLabels": "1",
				            //Theme
				            "theme": "fint"
				        },
				        "data": data_api
				    }
			  	});
		  		fusioncharts.render();
							
			});
  
  
//-------------
  //- PIE CHART - 
  //-------------
  // Get context with jQuery - using jQuery's .get() method.

});


