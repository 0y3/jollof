/*
 * Author: Abdullah A Almsaeed
 * Date: 4 Jan 2014
 * Description:
 *      This is a demo file used only for the main dashboard (index.html)
 **/

$(function () {

  "use strict";
  
  var merchantname = "payporte";
  $.post(API_BASE + 'transactiontrend', {merchantid: merchantid, pharmacyid: pharmacyid, createdat: createdat, productid: productid, 
	  paymenttype: paymenttype, customerid: customerid}, function(data_api) 
		{
	  		console.log("P: " + paymenttype);
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
  
  
  
//-------------
  //- PIE CHART - 
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  
  
  



});
