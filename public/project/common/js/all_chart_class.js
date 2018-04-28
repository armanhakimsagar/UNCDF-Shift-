function drawPieChart(param) {
    Highcharts.chart(param.selector_id, {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: param.chart_type,
            // height                  : 500
        },
        title: {
            text: param.chart_title
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: param.dataLabelsEnabled,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                },
                showInLegend: param.showInLegend
            }
        },
        series: [{

                data: param.data
            }]
    });// end of highchart
}// end of function

function drawColumnChart(param) {
    var chart = Highcharts.chart(param.selector_id, {

        chart: {

            //height                  : 500
        },
        title: {
            text: param.chart_title
        },
        xAxis: {
            categories: param.x_axis
        },
        series: [{
                type: param.chart_type,
                colorByPoint: true,
                data: param.y_axis,
                showInLegend: false
            }]

    });
}

function drawBarChart(param) {
    Highcharts.chart(param.selector_id, {
        chart: {
            type: param.chart_type,
            // height: 500
        },
        title: {
            text: param.chart_title,
        },
        xAxis: {
            categories: param.x_axis
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        series: [{

                name: 'Total No',
                data: param.y_axis,

            }]
    });
}

function drawBarColumnChart(param) {
    var chart = Highcharts.chart(param.selector_id, {
        chart: {
            type: param.chart_type,
            // height: 500
        },
        title: {
            text: param.chart_title
        },
        xAxis: {
            categories: param.x_axis
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        series: [{
                type: param.series_type,
                colorByPoint: true,
                data: param.y_axis,
                showInLegend: false
            }]

    });
}

function drawBoxChart(chartParam) {
    Highcharts.chart(chartParam.selector_id, {
        chart: {
            type: 'boxplot'
        },

        title: {
            text: chartParam.chart_title
        },
        
         subtitle: {
            text: chartParam.chart_sub_title
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
            }
            ]

    });
}