function profile_explorer_chart() {
//Chart 4
Highcharts.chart('explorer1_box_plot_test', {

    chart: {
        type: 'boxplot'
    },

    title: {
        text: 'Number of Household Members'
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

    var required_param  =   {
            table           :   "org_quest_survey",
            fields          :   ["q8","q9"],
            x_axis          :   "name",
            groupBy         :   "Q10",
            return_type     :   "json",
        };

        $.ajax({
            type    :   "GET",
            url     :   "/get_box_chart_data",
            dataType:   "JSON",
            data    :   'param='+JSON.stringify(required_param)+'&'+$("#chart_data_filtering").serialize()+'&csv='+true+'&cmp_field=Q10',
            success:function(response){
                var chartParam  =   {
                    selector_id     :   "explorer1_box_plot_test",
                    chart_type      :   "bar",
                    series_type     :   "column",
                    chart_title     :   "Income Sources of Household",
                    x_axis          :   response.x_axis,
                    y_axis          :   response.y_axis,
                    data            :   response.data,
                    ctegories       :   response.categories,
                    outboundLayer   :   response.outboundLayer,
                };
                drawBoxChart(chartParam);

            }// end of success
        }); // end of ajax call

}

function drawBoxChart(chartParam) {
    Highcharts.chart('explorer1_chart_4', {
        chart: {
            type: 'boxplot'
        },

        title: {
            text: chartParam.chart_title
        },

        legend: {
            enabled: false
        },

        xAxis: {
            categories: chartParam.ctegories,
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
                data: chartParam.data,
                tooltip: {
                    headerFormat: '<em>Experiment No {point.key}</em><br/>'
                }
            }, {
                name: 'Outlier',
                color: Highcharts.getOptions().colors[0],
                type: 'scatter',
                data: chartParam.outboundLayer,
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

