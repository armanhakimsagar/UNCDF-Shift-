@section('header_css_js_scrip_area')
@parent
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/pivottable/2.13.0/pivot.min.css"> 
@endsection
<style>
    .tab_inside_row_height{
        height: 330px !important;
        padding: 2% 0;
    }
</style>
<div id="inside_tab_elements" class="carousel slide carousel-fade">
    <div id="output"></div>
</div>

@section('footer_js_scrip_area')
@parent
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pivottable/2.13.0/pivot.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pivottable/2.6.0/tips_data.min.js"></script>
    <script type="text/javascript">
        $("#output").pivotUI(

          $.pivotUtilities.tipsData, {

                // how many data will show in row (it will show for action)

                rows: ["sex", "smoker","total_bill"],

                // how many data will show in column (it will hide for action)

                cols: ["day", "time"],

                // how many data will cal or sum for value

                vals: ["tip", "total_bill"],

                aggregatorName: "Sum over Sum",

                rendererName: "Heatmap"

          });

        </script>
@endsection