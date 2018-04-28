
function Second_Explorer_Chart() {
    
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
                selector_id         :   "explorer2_chart_1",
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
                selector_id     :   "explorer2_chart_2",
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
                selector_id     :   "explorer2_chart_3",
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
                selector_id     :   "explorer2_chart_4",
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
                selector_id     :   "explorer2_chart_5",
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

var required_param = {
        table: "org_quest_survey",
        fields: ["Q55_TIME", "Q55_COST"],
        x_axis: "name",
        groupBy: "Q10",
        return_type: "json",
    };

    $.ajax({
        type: "GET",
        url: "/get_box_chart_data",
        dataType: "JSON",
        data: 'param=' + JSON.stringify(required_param) + '&' + $("#chart_data_filtering").serialize() + '&csv=' + true + '&cmp_field=Q10',
        success: function (response) {
            var chartParam = {
                selector_id: "explorer2_chart_6",
                chart_type: "bar",
                series_type: "column",
                chart_title: "Ease of Accessing Bank services",
                chart_sub_title: "Time & Cost to Reaach the nearset Agent Banking Point/Branch ",
                
                x_axis: response.x_axis,
                y_axis: response.y_axis,
                data: response.data,
                ctegories: response.categories,
                outboundLayer: response.outboundLayer,
            };
            drawBoxChart(chartParam);

        }// end of success
    }); // end of ajax call


}




