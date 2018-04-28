function profile_explorer_chart() {

    //chart 1
    var required_param = {
        table: "org_quest_survey",
        fields_name: "Q5 as name",
        groupBy: "Q5",
        return_type: "json",
    };



    $.ajax({
        type: "GET",
        url: "/get_chart_data",
        dataType: "JSON",
        data: 'param=' + JSON.stringify(required_param) + '&' + $("#chart_data_filtering").serialize(),
        success: function (response) {
            var chartParam = {
                selector_id: "chart_1",
                chart_type: "pie",
                chart_title: "Marital Status",
                data: response.result,
                showInLegend: false,
                dataLabelsEnabled: true,
            };
            drawPieChart(chartParam);
        }// end of success
    }); // end of ajax call
//Chart 2
    var required_param = {};
    required_param = {
        table: "org_quest_survey",
        fields_name: "Q6 as name",
        x_axis: "name",
        groupBy: "Q6",
        return_type: "json",
    };

    $.ajax({
        type: "GET",
        url: "/get_chart_data",
        dataType: "JSON",
        data: 'param=' + JSON.stringify(required_param) + '&' + $("#chart_data_filtering").serialize(),
        success: function (response) {
            console.log(response);
            var chartParam = {
                selector_id: "chart_2",
                chart_type: "column",
                chart_title: "Able To Read Bangla News Paper",
                x_axis: response.x_axis,
                y_axis: response.y_axis,
                data: response.result,
            };
            drawColumnChart(chartParam);
        }
    });

//Chart 3
    var required_param = {};
    required_param = {
        table: "org_quest_survey",
        fields_name: "Q7 as name",
        x_axis: "name",
        groupBy: "Q7",
        return_type: "json",
    };


    $.ajax({
        type: "GET",
        url: "/get_chart_data",
        dataType: "JSON",
        data: 'param=' + JSON.stringify(required_param) + '&' + $("#chart_data_filtering").serialize(),
        success: function (response) {


            var chartParam = {
                selector_id: "chart_3",
                chart_type: "bar",
                series_type: "column",
                chart_title: "Education Status",
                x_axis: response.x_axis,
                y_axis: response.y_axis,
                data: response.result,
            };
            drawBarChart(chartParam);


        }
    });



//Chart 5

    var required_param = {
        table: "org_quest_survey",
        fields_name: "Q10 as name",
        x_axis: "name",
        groupBy: "Q10",
        return_type: "json",
    };

    $.ajax({
        type: "GET",
        url: "/get_chart_data",
        dataType: "JSON",
        data: 'param=' + JSON.stringify(required_param) + '&' + $("#chart_data_filtering").serialize() + '&csv=' + true + '&cmp_field=Q10',
        success: function (response) {

            var chartParam = {
                selector_id: "explorer1_chart_5",
                chart_type: "bar",
                series_type: "column",
                chart_title: "Income Sources of Household",
                x_axis: response.x_axis,
                y_axis: response.y_axis,
                data: response.result,
            };
            drawBarChart(chartParam);

        }// end of success
    }); // end of ajax call

    var required_param = {
        table: "org_quest_survey",
        fields: ["q8", "q9"],
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
                selector_id: "explorer1_chart_4",
                chart_type: "bar",
                series_type: "column",
                chart_title: "Number of Househol Members",
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

