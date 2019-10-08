/*
 * Author: Oludele Oluwaseun
 * Date: 21 June, 2018
 * Description:
 *      Javascript fetches for Blooms dashboard
 **/

$(function () {

  "use strict";
  
  $.post(API_BASE + 'problemcategorychart', {}, function(data_api) 
			{
		  		var fusioncharts = new FusionCharts({
				    type: 'pie2d',
				    renderAt: 'chart-container',
				    width: '450',
				    height: '300',
				    dataFormat: 'json',
				    dataSource: {
				        "chart": {
				            "showPercentInTooltip": "1",
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
  
  $.post(API_BASE + 'problemcategorychart/1', {}, function(data_api) 
			{
		  		var fusioncharts = new FusionCharts({
				    type: 'pie2d',
				    renderAt: 'chart-container-2',
				    width: '450',
				    height: '300',
				    dataFormat: 'json',
				    dataSource: {
				        "chart": {
				            "showPercentInTooltip": "1",
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
