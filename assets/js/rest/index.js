/*
 *  Document   : index.js
 *  Author     : david stakle
 */

var Index=function() {
    return {
        init:function() {
            var t= {
                type:"bar",
                barWidth:8,
                barSpacing:6,
                height:"64px",
                tooltipOffsetX:-25,
                tooltipOffsetY:20,
                barColor:"#999999",
                tooltipPrefix:"+ ",
                tooltipSuffix:" Sales",
                tooltipFormat:"{{prefix}}{{value}}{{suffix}}"
            }
            ;
            $("#mini-chart-sales").sparkline([8, 3, 1, 5, 4, 8, 9, 6, 5, 7, 10, 5, 8, 9], t),
            t.tooltipSuffix="%",
            $("#mini-chart-brand").sparkline([50, 65, 70, 90, 95, 110, 140, 160, 190, 200, 220, 230, 260], t),
            $(".gmap").css("height", "220px"),
            new GMaps( {
                div: "#gmap-timeline", lat: -33.863, lng: 151.202, zoom: 15, disableDefaultUI: !0, scrollwheel: !1
            }
            ).addMarkers([ {
                lat:-33.863, lng:151.202, animation:google.maps.Animation.DROP, infoWindow: {
                    content: "<strong>Cafe-Bar: Example Address</strong>"
                }
            }
            ]);
            var o=$("#dash-widget-chart"),
            i=[[1,
            1560],
            [2,
            1650],
            [3,
            1320],
            [4,
            1950],
            [5,
            1800],
            [6,
            2400],
            [7,
            2100],
            [8,
            2550],
            [9,
            3300],
            [10,
            3900],
            [11,
            4200],
            [12,
            4500]],
            a=[[1,
            500],
            [2,
            420],
            [3,
            480],
            [4,
            350],
            [5,
            600],
            [6,
            850],
            [7,
            1100],
            [8,
            950],
            [9,
            1220],
            [10,
            1300],
            [11,
            1500],
            [12,
            1700]],
            e=[[1,
            "January"],
            [2,
            "February"],
            [3,
            "March"],
            [4,
            "April"],
            [5,
            "May"],
            [6,
            "June"],
            [7,
            "July"],
            [8,
            "August"],
            [9,
            "September"],
            [10,
            "October"],
            [11,
            "November"],
            [12,
            "December"]];
            $.plot(o, [ {
                data:i, lines: {
                    show: !0, fill: !1
                }
                , points: {
                    show: !0, radius: 6, fillColor: "#cccccc"
                }
            }
            , {
                data:a, lines: {
                    show: !0, fill: !1
                }
                , points: {
                    show: !0, radius: 6, fillColor: "#ffffff"
                }
            }
            ], {
                colors:["#ffffff", "#353535"], legend: {
                    show: !1
                }
                , grid: {
                    borderWidth: 0, hoverable: !0, clickable: !0
                }
                , yaxis: {
                    show: !1
                }
                , xaxis: {
                    show: !1, ticks: e
                }
            }
            );
            var r=null,
            s=null;
            o.bind("plothover", function(t, o, i) {
                if(i) {
                    if(r!==i.dataIndex) {
                        r=i.dataIndex, $("#chart-tooltip").remove();
                        var a=(i.datapoint[0], i.datapoint[1]), e=i.series.xaxis.options.ticks[i.dataIndex][1];
                        s=1===i.seriesIndex?"<strong>"+a+"</strong> sales in <strong>"+e+"</strong>":"$ <strong>"+a+"</strong> in <strong>"+e+"</strong>", $('<div id="chart-tooltip" class="chart-tooltip">'+s+"</div>").css( {
                            top: i.pageY-50, left: i.pageX-50
                        }
                        ).appendTo("body").show()
                    }
                }
                else $("#chart-tooltip").remove(), r=null
            }
            )
        }
    }
}

();