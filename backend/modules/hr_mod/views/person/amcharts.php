<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $personData backend\modules\hr_mod\personDatas\Person */
/* @var $form ActiveForm */
?>
<div class="row">
  <div class="col-md-12">
    <div ui-view="" class="fade-in-up ng-scope">
      <div class="portlet light">
        <div class="portlet-title">
          <div class="caption ">
            <!-- <i class="fa fa-cogs"></i>
            <span >Genera una nueva cuenta para una empresa</span> -->
            <i class="fa fa-institution"></i>
            <span class="caption-subject bold uppercase"> Crear Nueva Persona </span>
          </div>
        </div>
    <div class="portlet-body form">

                        <!-- BEGIN ROW -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN CHART PORTLET-->
                            <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bar-chart font-green-haze"></i>
                                        <span class="caption-subject bold uppercase font-green-haze"> Line & Area</span>
                                        <span class="caption-helper">duration on value axis</span>
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse">
                                        </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config">
                                        </a>
                                        <a href="javascript:;" class="reload">
                                        </a>
                                        <a href="javascript:;" class="fullscreen">
                                        </a>
                                        <a href="javascript:;" class="remove">
                                        </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div id="chartdiv" style="width: 100%; height: 400px; background-color: #FFFFFF;" ></div>
                                </div>
                            </div>
                            <!-- END CHART PORTLET-->
                        </div>
                    </div>
                    <!-- END ROW -->

</div><!-- index2 -->
</div>
        </div>
        </div>
      </div> <!-- create_account -->
        <script type="text/javascript" src="http://www.amcharts.com/lib/3/amcharts.js"></script>
        <script type="text/javascript" src="http://www.amcharts.com/lib/3/serial.js"></script>
        <!--<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
             amCharts javascript code -->
        <script type="text/javascript">

            var dataAmchart = <?PHP echo $queryDataAmchart ?>;
            var sicknessArray = [];
            var dateArray = [];
            var dataGraphs = [];

            $.each(dataAmchart, function( index, element ){
            //    // console.log(element);
            //     // sicknessArray.push(element.sickness_id);
            //     // sicknessArray.push(element.evaluation_date);
                console.log(element);
            });

            // $.each($.unique(sicknessArray), function( index, element ){
            //     values = {
            //                  "bullet": "bullet",
            //                  "id": element.sickness_id,
            //                  "title": "graph "+element.sickness_id,
            //                  "valueField": element.sickness_id
            //             };
            //     //dataGraphs.push(values);
            //     //AmCharts.makeChart.graphs.push(values);
            // });
            // console.log(AmCharts.makeChart.type);

            var grahpsP =  {
                    "type": "serial",
                    "categoryField": "date",
                    "dataDateFormat": "YYYY-MM",
                    "theme": "default",
                    "categoryAxis": {
                        "minPeriod": "MM",
                        "parseDates": true
                    },
                    "chartCursor": {
                        "enabled": true,
                        "categoryBalloonDateFormat": "MMM YYYY"
                    },
                    "chartScrollbar": {
                        "enabled": true
                    },
                    "trendLines": [],
                    "graphs": [
                        {
                            "data-1": "hola",
                            "data-2": "",
                            "bullet": "round",
                            "id": "AmGraph-1",
                            "title": "graph 1 Prueba",
                            "valueField": "column-1"
                        },
                        {
                            "data-1": "hola1",
                            "data-2": "hola1.2",
                            "bullet": "square",
                            "id": "AmGraph-2",
                            "title": "graph 2",
                            "valueField": "column-2"
                        },
                        {
                            "data-1": "hola2",
                            "data-2": "hola2.1",
                            "id": "AmGraph-3",
                            "title": "graph 3",
                            "valueField": "column-3"
                        },
                        {
                            "id": "AmGraph-4",
                            "title": "graph 4",
                            "valueField": "column-4"
                        }
                    ],
                    "guides": [],
                    "valueAxes": [
                        {
                            "id": "ValueAxis-1",
                            "title": "Axis title"
                        }
                    ],
                    "allLabels": [],
                    "balloon": {},
                    "legend": {
                        "enabled": true,
                        "useGraphSettings": true
                    },
                    "titles": [
                        {
                            "id": "Title-1",
                            "size": 15,
                            "text": "Chart Title"
                        }
                    ],
                    "dataProvider": [
                        {
                            "date": "2014-01",
                            "column-1": 8,
                            "column-2": 5,
                            "column-3": 40,
                            "column-4": 19
                        },
                        {
                            "date": "2014-02",
                            "column-1": 6,
                            "column-2": 7,
                            "column-3": 31,
                            "column-4": 7
                        },
                        {
                            "date": "2014-03",
                            "column-1": 2,
                            "column-2": 3,
                            "column-3": 18,
                            "column-4": 37
                        },
                        {
                            "date": "2014-04",
                            "column-1": 1,
                            "column-2": 3,
                            "column-3": 27,
                            "column-4": 11
                        },
                        {
                            "date": "2014-05",
                            "column-1": 2,
                            "column-2": 1,
                            "column-3": 49,
                            "column-4": 21
                        },
                        {
                            "date": "2014-06",
                            "column-1": 3,
                            "column-2": 2,
                            "column-3": 42,
                            "column-4": 15
                        },
                        {
                            "date": "2014-07",
                            "column-1": 6,
                            "column-2": 8,
                            "column-3": 26,
                            "column-4": 31
                        },
                         {
                            "date": "2015-07",
                            "column-1": 22,
                            "column-3": 10,
                            "column-4": 23
                        }
                    ]
                };

            AmCharts.makeChart("chartdiv",
                grahpsP
            );
        //console.log(AmCharts.makeChart.)
        </script>
