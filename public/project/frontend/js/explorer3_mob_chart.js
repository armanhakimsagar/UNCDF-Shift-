
function Third_Explorer_Chart_mob() {



    //Chart 1

var required_param  =   {};
    required_param  =   {
        table           :   "org_quest_survey",
        fields_name     :   "Q20 as name",
        x_axis          :   "name",
        groupBy         :   "Q20",
        return_type     :   "json",
    };


$.ajax({
        type:"GET",
        url:"/get_chart_data",
        dataType:"JSON",
        data:'param='+JSON.stringify(required_param)+'&'+$("#chart_data_filtering").serialize()+'&csv='+true+'&cmp_field=Q20',
        success:function(response){


            var chartParam  =   {
                selector_id     :   "explorer3_chart_1_mob",
                chart_type      :   "bar",
                series_type     :   "column",
                chart_title     :   "Ownership Of Devices",
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
        fields_name     :   "Q46 as name",
        groupBy         :   "Q46",
        return_type     :   "json",
    };
    
    $.ajax({
        type:"GET",
        url:"/get_chart_data",
        dataType:"JSON",
        data:'param='+JSON.stringify(required_param)+'&'+$("#chart_data_filtering").serialize()+'&csv='+true+'&cmp_field=Q46',
        success:function(response){
            var chartParam  =   {
                selector_id         :   "explorer3_chart_3_mob",
                chart_type          :   "pie",
                chart_title         :   "Intenet Access",
                data                :   response.result,
                showInLegend        :   true,
                dataLabelsEnabled   :   false,
            };
            drawPieChart(chartParam);
            
        }// end of success
    });

//Chart 4
    var required_param  =   {};
    required_param  =   {
        table           :   "org_quest_survey",
        fields_name     :   "Q47 as name",
        x_axis          :   "name",
        groupBy         :   "Q47",
        return_type     :   "json",
    };


$.ajax({
        type:"GET",
        url:"/get_chart_data",
        dataType:"JSON",
        data:'param='+JSON.stringify(required_param)+'&'+$("#chart_data_filtering").serialize()+'&csv='+true+'&cmp_field=Q47',
        success:function(response){


            var chartParam  =   {
                selector_id     :   "explorer3_chart_4_mob",
                chart_type      :   "bar",
                series_type     :   "column",
                chart_title     :   "Challenges in Using Mobile Phone",
                x_axis          :   response.x_axis,
                y_axis          :   response.y_axis,
                data            :   response.result,
            };
            drawBarChart(chartParam);


            }
        });




var chart = Highcharts.chart('explorer3_chart_2_mob', {

    title: {
        text: 'Type of Phone'
    },

    

    xAxis: {
        categories: ['SmartPhone', 'Feature Phone']
    },

    series: [{
        type: 'column',
        colorByPoint: true,
        data: [29.9, 71.5],
        showInLegend: false
    }]

});





}










