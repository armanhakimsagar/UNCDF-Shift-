function Sixth_Explorer_Chart_mob() {
   
    //Chart 1

   var required_param  =   {
        table           :   "org_quest_survey",
        fields_name     :   "Q12 as name",
        x_axis          :   "name",
        groupBy         :   "Q12",
        return_type     :   "json",
    };
    
    $.ajax({
        type:"GET",
        url:"/get_chart_data",
        dataType:"JSON",
        data:'param='+JSON.stringify(required_param)+'&'+$("#chart_data_filtering").serialize()+'&csv='+true+'&cmp_field=Q12',
        success:function(response){
             var chartParam  =   {
                selector_id     :   "explorer6_chart_1_mob",
                chart_type      :   "bar",
                series_type     :   "column",
                chart_title     :   "Mostly Sold Items",
                x_axis          :   response.x_axis,
                y_axis          :   response.y_axis,
                data            :   response.result,
            };
            drawBarChart(chartParam);
            
        }// end of success
    }); // end of ajax call

    var required_param  =   {};
    required_param  =   {
        table           :   "org_quest_survey",
        fields_name     :   "Bus_Exp_2 as name",
        x_axis          :   "name",
        groupBy         :   "Bus_Exp_2",
        return_type     :   "json",
    };


$.ajax({
        type:"GET",
        url:"/get_chart_data",
        dataType:"JSON",
        data:'param='+JSON.stringify(required_param)+'&'+$("#chart_data_filtering").serialize(),
        success:function(response){
                var chartParam  =   {
                selector_id     :   "explorer6_chart_2_mob",
                chart_type      :   "column",
                chart_title     :   "Business Experience",
                x_axis          :   response.x_axis,
                y_axis          :   response.y_axis,
                data            :   response.result,
            };
            drawBarChart(chartParam);
        }
        });


    //chart 3
    var required_param  =   {
        table           :   "org_quest_survey",
        fields_name     :   "Q18 as name",
        groupBy         :   "Q18",
        return_type     :   "json",
    };
    
    $.ajax({
        type:"GET",
        url:"/get_chart_data",
        dataType:"JSON",
        data:'param='+JSON.stringify(required_param)+'&'+$("#chart_data_filtering").serialize(),
        success:function(response){
            var chartParam  =   {
                selector_id         :   "explorer6_chart_3_mob",
                chart_type          :   "pie",
                chart_title         :   "Ownership Types",
                data                :   response.result,
                showInLegend        :   true,
                dataLabelsEnabled   :   false,
            };
            drawPieChart(chartParam);
            
        }// end of success
    }); // end of ajax call

    //chart 5
    var required_param  =   {
        table           :   "org_quest_survey",
        fields_name     :   "Q17 as name",
        x_axis          :   "name",
        groupBy         :   "Q17",
        return_type     :   "json",
    };
    
    $.ajax({
        type:"GET",
        url:"/get_chart_data",
        dataType:"JSON",
        data:'param='+JSON.stringify(required_param)+'&'+$("#chart_data_filtering").serialize()+'&csv='+true+'&cmp_field=Q17',
       success:function(response){


            var chartParam  =   {
                selector_id     :   "explorer6_chart_5_mob",
                chart_type      :   "bar",
                series_type     :   "column",
                chart_title     :   "Main Barriers & Challenges ",
                x_axis          :   response.x_axis,
                y_axis          :   response.y_axis,
                data            :   response.result,
            };
            drawBarChart(chartParam);


            }
    }); // end of ajax call

    //chart 6
    var required_param  =   {};
    required_param  =   {
        table           :   "org_quest_survey",
        fields_name     :   "Q24 as name",
        x_axis          :   "name",
        groupBy         :   "Q24",
        return_type     :   "json",
    };

$.ajax({
        type:"GET",
        url:"/get_chart_data",
        dataType:"JSON",
        data:'param='+JSON.stringify(required_param)+'&'+$("#chart_data_filtering").serialize()+'&csv='+true+'&cmp_field=Q24',
        success:function(response){


            var chartParam  =   {
                selector_id     :   "explorer6_chart_6_mob",
                chart_type      :   "bar",
                series_type     :   "column",
                chart_title     :   "Trainings Needed",
                x_axis          :   response.x_axis,
                y_axis          :   response.y_axis,
                data            :   response.result,
            };
            drawBarChart(chartParam);


            }
        });

    //chart 7
    var required_param  =   {};
    required_param  =   {
        table           :   "org_quest_survey",
        fields_name     :   "Q25 as name",
        x_axis          :   "name",
        groupBy         :   "Q25",
        return_type     :   "json",
    };


$.ajax({
        type:"GET",
        url:"/get_chart_data",
        dataType:"JSON",
        data:'param='+JSON.stringify(required_param)+'&'+$("#chart_data_filtering").serialize()+'&csv='+true+'&cmp_field=Q25',
        success:function(response){
                var chartParam  =   {
                selector_id     :   "explorer6_chart_7_mob",
                chart_type      :   "bar",
                series_type     :   "column",
                chart_title     :   "Support Services Needed",
                x_axis          :   response.x_axis,
                y_axis          :   response.y_axis,
                data            :   response.result,
            };
            drawBarChart(chartParam);
        }
        });

    //chart 8

Highcharts.chart('explorer6_chart_8_mob', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'Average Footfall Per Hour Estimated from Observation'
    },
    
    xAxis: {
        allowDecimals: false,
        labels: {
            formatter: function () {
                return this.value; // clean, unformatted number for year
            }
        }
    },
    yAxis: {
        title: {
            text: 'Values'
        },
        labels: {
            formatter: function () {
                return this.value / 1000 + 'k';
            }
        }
    },
    tooltip: {
        pointFormat: '{series.name} had stockpiled <b>{point.y:,.0f}</b><br/>warheads in {point.x}'
    },
    plotOptions: {
        area: {
            pointStart: 1940,
            marker: {
                enabled: false,
                symbol: 'circle',
                radius: 2,
                states: {
                    hover: {
                        enabled: true
                    }
                }
            }
        }
    },
    series: [{
       
        data: [
            null, null, null, null, null, 6, 11, 32, 110, 235,
            369, 640, 1005, 1436, 2063, 3057, 4618, 6444, 9822, 15468,
            20434, 24126, 27387, 29459, 31056, 31982, 32040, 31233, 29224, 27342,
            26662, 26956, 27912, 28999, 28965, 27826, 25579, 25722, 24826, 24605,
            24304, 23464, 23708, 24099, 24357, 24237, 24401, 24344, 23586, 22380,
            21004, 17287, 14747, 13076, 12555, 12144, 11009, 10950, 10871, 10824,
            10577, 10527, 10475, 10421, 10358, 10295, 10104, 9914, 9620, 9326,
            5113, 5113, 4954, 4804, 4761, 4717, 4368, 4018
        ]
    },]
});

    //chart 9


Highcharts.chart('explorer6_chart_9_mob', {

    chart: {
        type: 'heatmap',
        marginTop: 40,
        marginBottom: 80,
        plotBorderWidth: 1
    },


    title: {
        text: 'Supply Chain Modalities'
    },

    xAxis: {
        categories: ['Alexander', 'Marie', 'Maximilian', 'Sophia', 'Lukas', 'Maria', 'Leon', 'Anna', 'Tim', 'Laura']
    },

    yAxis: {
        categories: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
        title: null
    },

    colorAxis: {
        min: 0,
        minColor: '#FFFFFF',
        maxColor: Highcharts.getOptions().colors[0]
    },

    legend: {
        align: 'right',
        layout: 'vertical',
        margin: 0,
        verticalAlign: 'top',
        y: 25,
        symbolHeight: 280
    },

    tooltip: {
        formatter: function () {
            return '<b>' + this.series.xAxis.categories[this.point.x] + '</b> sold <br><b>' +
                this.point.value + '</b> items on <br><b>' + this.series.yAxis.categories[this.point.y] + '</b>';
        }
    },

    series: [{
        name: 'Sales per employee',
        borderWidth: 1,
        data: [[0, 0, 10], [0, 1, 19], [0, 2, 8], [0, 3, 24], [0, 4, 67], [1, 0, 92], [1, 1, 58], [1, 2, 78], [1, 3, 117], [1, 4, 48], [2, 0, 35], [2, 1, 15], [2, 2, 123], [2, 3, 64], [2, 4, 52], [3, 0, 72], [3, 1, 132], [3, 2, 114], [3, 3, 19], [3, 4, 16], [4, 0, 38], [4, 1, 5], [4, 2, 8], [4, 3, 117], [4, 4, 115], [5, 0, 88], [5, 1, 32], [5, 2, 12], [5, 3, 6], [5, 4, 120], [6, 0, 13], [6, 1, 44], [6, 2, 88], [6, 3, 98], [6, 4, 96], [7, 0, 31], [7, 1, 1], [7, 2, 82], [7, 3, 32], [7, 4, 30], [8, 0, 85], [8, 1, 97], [8, 2, 123], [8, 3, 64], [8, 4, 84], [9, 0, 47], [9, 1, 114], [9, 2, 31], [9, 3, 48], [9, 4, 91]],
        dataLabels: {
            enabled: true,
            color: '#000000'
        }
    }]

});

//Chart 10

Highcharts.chart('explorer6_chart_10_mob', {

    chart: {
        type: 'boxplot'
    },

    title: {
        text: 'Median Daily Customer Visits'
    },

     
    legend: {
        enabled: false
    },

    xAxis: {
        categories: ['1', '2'],
        title: {
            text: 'Experiment No.'
        }
    },

    yAxis: {
        title: {
            text: 'Observations'
        },
        
    },

    series: [{
        name: 'Observations',
        data: [
            [760, 801, 848, 895, 965],
            [733, 853, 939, 980, 1080],
            
        ],
        tooltip: {
            headerFormat: '<em>Experiment No {point.key}</em><br/>'
        }
    }, {
        name: 'Outlier',
        color: Highcharts.getOptions().colors[0],
        type: 'scatter',
        data: [ // x, y positions where 0 is the first category
            [0, 644],
            [4, 718],
            [4, 951],
            [4, 969]
        ],
        marker: {
            fillColor: 'white',
            lineWidth: 1,
            lineColor: Highcharts.getOptions().colors[0]
        },
        tooltip: {
            pointFormat: 'Observation: {point.y}'
        }
    }]

});

}
















