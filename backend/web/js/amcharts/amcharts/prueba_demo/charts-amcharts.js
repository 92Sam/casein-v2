var ChartsAmcharts = function() {

    var initChartSample1 = function() {
        var chart = AmCharts.makeChart("chart_1", {
            "type": "serial",
            "theme": "light",
            "pathToImages": Metronic.getGlobalPluginsPath() + "amcharts/amcharts/images/",
            "autoMargins": false,
            "marginLeft": 30,
            "marginRight": 8,
            "marginTop": 10,
            "marginBottom": 26,

            "fontFamily": 'Open Sans',            
            "color":    '#888',
            
            "dataProvider": [{
                "year": 2009,
                "income": 23.5,
                "expenses": 18.1
            }, {
                "year": 2010,
                "income": 26.2,
                "expenses": 22.8
            }, {
                "year": 2011,
                "income": 30.1,
                "expenses": 23.9
            }, {
                "year": 2012,
                "income": 29.5,
                "expenses": 25.1
            }, {
                "year": 2013,
                "income": 30.6,
                "expenses": 27.2,
                "dashLengthLine": 5
            }, {
                "year": 2014,
                "income": 34.1,
                "expenses": 29.9,
                "dashLengthColumn": 5,
                "alpha": 0.2,
                "additional": "(projection)"
            }],
            "valueAxes": [{
                "axisAlpha": 0,
                "position": "left"
            }],
            "startDuration": 1,
            "graphs": [{
                "alphaField": "alpha",
                "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
                "dashLengthField": "dashLengthColumn",
                "fillAlphas": 1,
                "title": "Income",
                "type": "column",
                "valueField": "income"
            }, {
                "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>",
                "bullet": "round",
                "dashLengthField": "dashLengthLine",
                "lineThickness": 3,
                "bulletSize": 7,
                "bulletBorderAlpha": 1,
                "bulletColor": "#FFFFFF",
                "useLineColorForBulletBorder": true,
                "bulletBorderThickness": 3,
                "fillAlphas": 0,
                "lineAlpha": 1,
                "title": "Expenses",
                "valueField": "expenses"
            }],
            "categoryField": "year",
            "categoryAxis": {
                "gridPosition": "start",
                "axisAlpha": 0,
                "tickLength": 0
            }
        });

        $('#chart_1').closest('.portlet').find('.fullscreen').click(function() {
            chart.invalidateSize();
        });
    }

    var initChartSample2 = function() {
        var chart = AmCharts.makeChart("chart_2", {
            "type": "serial",
            "theme": "light",

            "fontFamily": 'Open Sans',
            "color":    '#888888',

            "legend": {
                "equalWidths": false,
                "useGraphSettings": true,
                "valueAlign": "left",
                "valueWidth": 120
            },
            "dataProvider": [{
                "date": "2012-01-01",
                "distance": 227,
                "townName": "New York",
                "townName2": "New York",
                "townSize": 25,
                "latitude": 40.71,
                "duration": 408
            }, {
                "date": "2012-01-02",
                "distance": 371,
                "townName": "Washington",
                "townSize": 14,
                "latitude": 38.89,
                "duration": 482
            }, {
                "date": "2012-01-03",
                "distance": 433,
                "townName": "Wilmington",
                "townSize": 6,
                "latitude": 34.22,
                "duration": 562
            }, {
                "date": "2012-01-04",
                "distance": 345,
                "townName": "Jacksonville",
                "townSize": 7,
                "latitude": 30.35,
                "duration": 379
            }
            //  {
            //     "date": "2012-01-05",
            //     "distance": 480,
            //     "townName": "Miami",
            //     "townName2": "Miami",
            //     "townSize": 10,
            //     "latitude": 25.83,
            //     "duration": 501
            // }, {
            //     "date": "2012-01-06",
            //     "distance": 386,
            //     "townName": "Tallahassee",
            //     "townSize": 7,
            //     "latitude": 30.46,
            //     "duration": 443
            // }, {
            //     "date": "2012-01-07",
            //     "distance": 348,
            //     "townName": "New Orleans",
            //     "townSize": 10,
            //     "latitude": 29.94,
            //     "duration": 405
            // }, {
            //     "date": "2012-01-08",
            //     "distance": 238,
            //     "townName": "Houston",
            //     "townName2": "Houston",
            //     "townSize": 16,
            //     "latitude": 29.76,
            //     "duration": 309
            // }, {
            //     "date": "2012-01-09",
            //     "distance": 218,
            //     "townName": "Dalas",
            //     "townSize": 17,
            //     "latitude": 32.8,
            //     "duration": 287
            // }, {
            //     "date": "2012-01-10",
            //     "distance": 349,
            //     "townName": "Oklahoma City",
            //     "townSize": 11,
            //     "latitude": 35.49,
            //     "duration": 485
            // }, {
            //     "date": "2012-01-11",
            //     "distance": 603,
            //     "townName": "Kansas City",
            //     "townSize": 10,
            //     "latitude": 39.1,
            //     "duration": 890
            // }, {
            //     "date": "2012-01-12",
            //     "distance": 534,
            //     "townName": "Denver",
            //     "townName2": "Denver",
            //     "townSize": 18,
            //     "latitude": 39.74,
            //     "duration": 810
            // }, {
            //     "date": "2012-01-13",
            //     "townName": "Salt Lake City",
            //     "townSize": 12,
            //     "distance": 425,
            //     "duration": 670,
            //     "latitude": 40.75,
            //     "dashLength": 8,
            //     "alpha": 0.4
            // }, {
            //     "date": "2012-01-14",
            //     "latitude": 36.1,
            //     "duration": 470,
            //     "townName": "Las Vegas",
            //     "townName2": "Las Vegas"
            // }
            , {
                "date": "2012-01-15"
            }, {
                "date": "2012-01-16"
            }, {
                "date": "2012-01-17"
            }, {
                "date": "2012-01-18"
            }, {
                "date": "2012-01-19"
            }],
            "valueAxes": [{
                "id": "distanceAxis",
                "axisAlpha": 0,
                "gridAlpha": 0,
                "position": "left",
                //"title": "distance"
                "title": "TITULO IZQUIERDO"
            }, {
                "id": "latitudeAxis",
                "axisAlpha": 0,
                "gridAlpha": 0,
                "labelsEnabled": false,
                "position": "right",
                //"title": "TITULO DERECHO"
            }, {
                "id": "durationAxis",
                "duration": "mm",
                "durationUnits": {
                    "hh": "h ",
                    "mm": "min"
                },
                "axisAlpha": 0,
                "gridAlpha": 0,
                "inside": true,
                "position": "right",
                "title": "duration"
            }],
            // BASE INFERIOR DE LOS GRAFICOS LEGENDAS
            "graphs": [{
                "alphaField": "alpha",
                "balloonText": "[[value]] miles",
                "dashLengthField": "dashLength",
                "fillAlphas": 0.7,
                "legendPeriodValueText": "total: [[value.sum]] mi",
                "legendValueText": "[[value]] mi",
                "title": "distance PRUEBA",
                // BASE INFERIOR
                "type": "column",
                "valueField": "distance",
                "valueAxis": "distanceAxis"
            }, {
                "balloonText": "latitude:[[value]]",
                "bullet": "round",
                "bulletBorderAlpha": 1,
                "useLineColorForBulletBorder": true,
                "bulletColor": "#FFFFFF",
                "bulletSizeField": "townSize",
                "dashLengthField": "dashLength",
                "descriptionField": "townName",
                "labelPosition": "right",
                "labelText": "[[townName2]]",
                "legendValueText": "[[description]]/[[value]]",
                "title": "latitude/city",
                "fillAlphas": 0,
                "valueField": "latitude",
                "valueAxis": "latitudeAxis"
            }, {
                "bullet": "square",
                "bulletBorderAlpha": 1,
                "bulletBorderThickness": 1,
                "dashLengthField": "dashLength",
                "legendValueText": "[[value]]",
                "title": "duration",
                "fillAlphas": 0,
                "valueField": "duration",
                "valueAxis": "durationAxis"
            }],
            "chartCursor": {
                "categoryBalloonDateFormat": "DD",
                "cursorAlpha": 0.1,
                "cursorColor": "#000000",
                "fullWidth": true,
                "valueBalloonsEnabled": false,
                "zoomable": false
            },
            "dataDateFormat": "YYYY-MM-DD",
            "categoryField": "date",
            "categoryAxis": {
                "dateFormats": [{
                    "period": "DD",
                    "format": "DD"
                }, {
                    "period": "WW",
                    "format": "MMM DD"
                }, {
                    "period": "MM",
                    "format": "MMM"
                }, {
                    "period": "YYYY",
                    "format": "YYYY"
                }],
                "parseDates": true,
                "autoGridCount": false,
                "axisColor": "#555555",
                "gridAlpha": 0.1,
                "gridColor": "#FFFFFF",
                "gridCount": 50
            },
            "exportConfig": {
                "menuBottom": "20px",
                "menuRight": "22px",
                "menuItems": [{
                    "icon": Metronic.getGlobalPluginsPath() + "amcharts/amcharts/images/export.png",
                    "format": 'png'
                }]
            }
        });

        $('#chart_2').closest('.portlet').find('.fullscreen').click(function() {
            chart.invalidateSize();
        });
    }

    return {
        //main function to initiate the module

        init: function() {
            initChartSample1();
            initChartSample2();
        }

    };

}();