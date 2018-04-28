
function Sixth_Explorer_Chart() {
   
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
                selector_id     :   "explorer6_chart_1",
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
                selector_id     :   "explorer6_chart_2",
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
                selector_id         :   "explorer6_chart_3",
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
                selector_id     :   "explorer6_chart_5",
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
                selector_id     :   "explorer6_chart_6",
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
                selector_id     :   "explorer6_chart_7",
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



    //chart 9


Highcharts.chart('explorer6_chart_9', {

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
        categories: ['Distributor', 'Directly from company', 'Wholeseller', 'Large stores', 'Independent distributor']
    },

    yAxis: {
        categories: ['Less than Once a month', 'Once in a month', 'Once in every 2 weeks', 'Once a week', 'Twice a week','3 Times a week','Everyday'],
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
        data: [[0, 0, 1], [0, 1, 2], [0, 2, 10], [0, 3, 139], [0, 4, 138],[0,5,261],[0,6,1517], [1, 0, 0], [1, 1, 8], [1, 2, 13], [1, 3, 129], [1, 4, 176],[1, 5, 344],[1, 6, 573], [2, 0, 4], [2, 1, 89], [2, 2, 113], [2, 3, 380], [2, 4, 364],[2, 5, 247],[2, 6, 103], [3, 0, 15], [3, 1, 64], [3, 2, 102], [3, 3, 287], [3, 4, 329],[3, 5, 243],[3, 6, 95], [4, 0, 2], [4, 1, 16], [4, 2, 33], [4, 3, 89], [4, 4, 55],[4,5,30],[4,6,54]],
        dataLabels: {
            enabled: true,
            color: '#000000'
        }
    }]

});

//Chart 10

 var required_param = {
        table: "org_quest_survey",
        fields: ["Q23_1", "Q23_2"],
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
                selector_id: "explorer6_chart_10",
                chart_type: "bar",
                series_type: "column",
                chart_title: "Median Daily Customer Visits ",
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





















