
function Fourth_Explorer_Chart() {
//Chart 2
var required_param  =   {
        table           :   "org_quest_survey",
        fields_name     :   "Q28 as name",
        groupBy         :   "Q28",
        return_type     :   "json",
    };
    
   
    
    $.ajax({
        type:"GET",
        url:"/get_chart_data",
        dataType:"JSON",
        data:'param='+JSON.stringify(required_param)+'&'+$("#chart_data_filtering").serialize()+'&csv='+true+'&cmp_field=Q28',
         success:function(response){
            var chartParam  =   {
                selector_id         :   "explorer4_chart_2",
                chart_type          :   "pie",
                chart_title         :   "Usage of Cash Residuals",
                data                :   response.result,
                showInLegend        :   true,
                dataLabelsEnabled   :   false,
            };
            drawPieChart(chartParam);
            
        }// end of success
    }); // end of ajax call


    //Chart 4
    var required_param  =   {
        table           :   "org_quest_survey",
        fields_name     :   "Q39 as name",
        x_axis          :   "name",
        groupBy         :   "Q39",
        return_type     :   "json",
    };
$.ajax({
        type:"GET",
        url:"/get_chart_data",
        dataType:"JSON",
        data:'param='+JSON.stringify(required_param)+'&'+$("#chart_data_filtering").serialize(),
        success:function(response){
            var chartParam  =   {
                selector_id         :   "explorer4_chart_4",
                chart_type          :   "pie",
                chart_title         :   "Sources of Loan",
                data                :   response.result,
                showInLegend        :   true,
                dataLabelsEnabled   :   false,
            };
            drawPieChart(chartParam);
            
        }// end of success
    });
    
    required_param = {
        table: "org_quest_survey",
        fields_name: "Q27 as name",
        x_axis: "name",
        groupBy: "Q27",
        return_type: "json",
    };


    $.ajax({
        type: "GET",
        url: "/get_chart_data",
        dataType: "JSON",
        data: 'param=' + JSON.stringify(required_param) + '&' + $("#chart_data_filtering").serialize(),
        success: function (response) {


            var chartParam = {
                selector_id: "explorer4_chart_1",
                chart_type: "bar",
                series_type: "column",
                chart_title: "% of Sales on Credit",
                x_axis: response.x_axis,
                y_axis: response.y_axis,
                data: response.result,
            };
            drawBarChart(chartParam);


        }
    });
    //Chart 4
    
      required_param = {
        table: "org_quest_survey",
        fields_name: "Q37 as name",
        x_axis: "name",
        groupBy: "Q37",
        return_type: "json",
    };


    $.ajax({
        type: "GET",
        url: "/get_chart_data",
        dataType: "JSON",
        data: 'param=' + JSON.stringify(required_param) + '&' + $("#chart_data_filtering").serialize(),
        success: function (response) {


            var chartParam = {
                selector_id: "explorer4_chart_3",
                chart_type: "bar",
                series_type: "column",
                chart_title: "% of Procurement on Credit",
                x_axis: response.x_axis,
                y_axis: response.y_axis,
                data: response.result,
            };
            drawBarChart(chartParam);


        }
    });
//Chart 2

/*//Test For bar chart with % 

// Create the chart
Highcharts.chart('explorer4_chart_4', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Browser market shares. January, 2018'
    },
    subtitle: {
        text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total percent market share'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}%'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    "series": [
        {
            "name": "Browsers",
            "colorByPoint": true,
            "data": [
                {
                    "name": "Chrome",
                    "y": 62.74,
                    "drilldown": "Chrome"
                },
                {
                    "name": "Firefox",
                    "y": 10.57,
                    "drilldown": "Firefox"
                },
                {
                    "name": "Internet Explorer",
                    "y": 7.23,
                    "drilldown": "Internet Explorer"
                },
                {
                    "name": "Safari",
                    "y": 5.58,
                    "drilldown": "Safari"
                },
                {
                    "name": "Edge",
                    "y": 4.02,
                    "drilldown": "Edge"
                },
                {
                    "name": "Opera",
                    "y": 1.92,
                    "drilldown": "Opera"
                },
                {
                    "name": "Other",
                    "y": 7.62,
                    "drilldown": null
                }
            ]
        }
    ],
    
});
//End Test*/


}











