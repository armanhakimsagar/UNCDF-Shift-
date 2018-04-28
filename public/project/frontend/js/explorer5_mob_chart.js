function Fifth_Explorer_Chart_mob() {
    
    var required_param  =   {
        table           :   "org_quest_survey",
        fields_name     :   "Q34 as name",
        groupBy         :   "Q34",
        return_type     :   "json",
    };
    
    $.ajax({
        type:"GET",
        url:"/get_chart_data",
        dataType:"JSON",
        data:'param='+JSON.stringify(required_param)+'&'+$("#chart_data_filtering").serialize(),
        success:function(response){
            var chartParam  =   {
                selector_id         :   "explorer5_chart_1_mob",
                chart_type          :   "pie",
                chart_title         :   "Payment Mode",
                data                :   response.result,
                showInLegend        :   true,
                dataLabelsEnabled   :   false,
            };
            drawPieChart(chartParam);
            
        }// end of success
    }); // end of ajax call







}
















