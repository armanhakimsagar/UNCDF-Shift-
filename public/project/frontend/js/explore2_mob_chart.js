
function Second_Explorer_Chart_mob() {
    
    //Chart 1

    var required_param  =   {
        table           :   "org_quest_survey",
        fields_name     :   "Q49 as name",
        groupBy         :   "Q49",
        return_type     :   "json",
    };
    
    $.ajax({
        type:"GET",
        url:"/get_chart_data",
        dataType:"JSON",
        data:'param='+JSON.stringify(required_param)+'&'+$("#chart_data_filtering").serialize(),
        success:function(response){
            var chartParam  =   {
                selector_id         :   "explorer2_chart_1_mob",
                chart_type          :   "pie",
                chart_title         :   "Type of Bank Account",
                data                :   response.result,
                showInLegend        :   true,
                dataLabelsEnabled   :   false,
            };
            drawPieChart(chartParam);
            
        }// end of success
    }); // end of ajax call

//Chart 2
var required_param  =   {};
    required_param  =   {
        table           :   "org_quest_survey",
        fields_name     :   "Q51 as name",
        x_axis          :   "name",
        groupBy         :   "Q51",
        return_type     :   "json",
    };

$.ajax({
        type:"GET",
        url:"/get_chart_data",
        dataType:"JSON",
        data:'param='+JSON.stringify(required_param)+'&'+$("#chart_data_filtering").serialize(),
        success:function(response){


            var chartParam  =   {
                selector_id     :   "explorer2_chart_2_mob",
                chart_type      :   "bar",
                series_type     :   "column",
                chart_title     :   "Most Common Interfaces with Bank",
                x_axis          :   response.x_axis,
                y_axis          :   response.y_axis,
                data            :   response.result,
            };
            drawBarChart(chartParam);


            }
        });

//Chart 3

var required_param  =   {};
    required_param  =   {
        table           :   "org_quest_survey",
        fields_name     :   "Q54 as name",
        x_axis          :   "name",
        groupBy         :   "Q54",
        return_type     :   "json",
    };


$.ajax({
        type:"GET",
        url:"/get_chart_data",
        dataType:"JSON",
        data:'param='+JSON.stringify(required_param)+'&'+$("#chart_data_filtering").serialize(),
        success:function(response){


            var chartParam  =   {
                selector_id     :   "explorer2_chart_3_mob",
                chart_type      :   "bar",
                series_type     :   "column",
                chart_title     :   "Major reason of not using Bank Account",
                x_axis          :   response.x_axis,
                y_axis          :   response.y_axis,
                data            :   response.result,
            };
            drawBarChart(chartParam);


            }
        });


//Chart 4

var required_param  =   {};
    required_param  =   {
        table           :   "org_quest_survey",
        fields_name     :   "Q58 as name",
        x_axis          :   "name",
        groupBy         :   "Q58",
        return_type     :   "json",
    };


$.ajax({
        type:"GET",
        url:"/get_chart_data",
        dataType:"JSON",
        data:'param='+JSON.stringify(required_param)+'&'+$("#chart_data_filtering").serialize()+'&csv='+true+'&cmp_field=Q58',
        success:function(response){


            var chartParam  =   {
                selector_id     :   "explorer2_chart_4_mob",
                chart_type      :   "bar",
                series_type     :   "column",
                chart_title     :   "Type of MFS Account",
                x_axis          :   response.x_axis,
                y_axis          :   response.y_axis,
                data            :   response.result,
            };
            drawBarChart(chartParam);


            }
        });



    
//Chart 5

var required_param  =   {};
    required_param  =   {
        table           :   "org_quest_survey",
        fields_name     :   "Q63 as name",
        x_axis          :   "name",
        groupBy         :   "Q63",
        return_type     :   "json",
    };


$.ajax({
        type:"GET",
        url:"/get_chart_data",
        dataType:"JSON",
        data:'param='+JSON.stringify(required_param)+'&'+$("#chart_data_filtering").serialize()+'&csv='+true+'&cmp_field=Q63',
        success:function(response){


            var chartParam  =   {
                selector_id     :   "explorer2_chart_5_mob",
                chart_type      :   "bar",
                series_type     :   "column",
                chart_title     :   "Major Challenges in using MFS",
                x_axis          :   response.x_axis,
                y_axis          :   response.y_axis,
                data            :   response.result,
            };
            drawBarChart(chartParam);


            }
        });

    //Chart 6



Highcharts.chart('explorer2_chart_6_mob', {

    chart: {
        type: 'boxplot'
    },

    title: {
        text: 'Ease of Accessing Bank Services'
    },

     subtitle: {
        text: 'Time & Cost to reach the nearest Agent Banking Point/Branch'
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




