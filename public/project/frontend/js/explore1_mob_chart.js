function profile_explorer_chart_mob() {
    
    //chart 1
    var required_param  =   {
        table           :   "org_quest_survey",
        fields_name     :   "Q5 as name",
        groupBy         :   "Q5",
        return_type     :   "json",
    };
    
   
    
    $.ajax({
        type:"GET",
        url:"/get_chart_data",
        dataType:"JSON",
        data:'param='+JSON.stringify(required_param)+'&'+$("#chart_data_filtering").serialize(),
        success:function(response){
            var chartParam  =   {
                selector_id         :   "mob_chart_1",
                chart_type          :   "pie",
                chart_title         :   "Marital Status",
                data                :   response.result,
                showInLegend        :   false,
                dataLabelsEnabled   :   true,
            };
            drawPieChart(chartParam);            
        }// end of success
    }); // end of ajax call
//Chart 2
var required_param  =   {};
    required_param  =   {
        table           :   "org_quest_survey",
        fields_name     :   "Q6 as name",
        x_axis          :   "name",
        groupBy         :   "Q6",
        return_type     :   "json",
    };

    $.ajax({
            type:"GET",
            url:"/get_chart_data",
            dataType:"JSON",
            data:'param='+JSON.stringify(required_param)+'&'+$("#chart_data_filtering").serialize(),
            success:function(response){
                var chartParam  =   {
                selector_id     :   "mob_chart_2",
                chart_type      :   "column",
                chart_title     :   "Able To Read Bangla News Paper",
                x_axis          :   response.x_axis,
                y_axis          :   response.y_axis,
                data            :   response.result,
            };
            drawColumnChart(chartParam);
        }
    });

//Chart 3
var required_param  =   {};
    required_param  =   {
        table           :   "org_quest_survey",
        fields_name     :   "Q7 as name",
        x_axis          :   "name",
        groupBy         :   "Q7",
        return_type     :   "json",
    };


$.ajax({
        type:"GET",
        url:"/get_chart_data",
        dataType:"JSON",
        data:'param='+JSON.stringify(required_param)+'&'+$("#chart_data_filtering").serialize(),
        success:function(response){


            var chartParam  =   {
                selector_id     :   "mob_chart_3",
                chart_type      :   "bar",
                series_type     :   "column",
                chart_title     :   "Education Status",
                x_axis          :   response.x_axis,
                y_axis          :   response.y_axis,
                data            :   response.result,
            };
            drawBarChart(chartParam);


            }
        });



//Chart 5

    var required_param  =   {
        table           :   "org_quest_survey",
        fields_name     :   "Q10 as name",
        x_axis          :   "name",
        groupBy         :   "Q10",
        return_type     :   "json",
    };
    
    $.ajax({
        type:"GET",
        url:"/get_chart_data",
        dataType:"JSON",
        data:'param='+JSON.stringify(required_param)+'&'+$("#chart_data_filtering").serialize()+'&csv='+true+'&cmp_field=Q10',
        success:function(response){
            
            var chartParam  =   {
                selector_id     :   "mob_explorer1_chart_5",
                chart_type      :   "bar",
                series_type     :   "column",
                chart_title     :   "Income Sources of Household",
                x_axis          :   response.x_axis,
                y_axis          :   response.y_axis,
                data            :   response.result,
            };
            drawBarChart(chartParam);
            
        }// end of success
    }); // end of ajax call


//Chart 4
Highcharts.chart('mob_explorer1_chart_4', {

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

}

