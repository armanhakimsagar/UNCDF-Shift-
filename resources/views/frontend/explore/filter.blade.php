<style>

    .tab_explorer .styled-select {
        background: url(http://i62.tinypic.com/15xvbd5.png) no-repeat 96% 0;
        height: 45px;
        overflow: hidden;
        width: 245px;
    }

    .tab_explorer .styled-select select {
        background: transparent;
        border: none;
        font-size: 14px;
        height: 45px;
        padding: 5px; /* If you add too much padding here, the options won't show in IE */
        width: 245px;
    }
    /*.styled-select select option{
       width: 305px !important;
    }*/

    .tab_explorer .styled-select.slate {
        background: url(img/map/2e3ybe2.jpg) no-repeat right center;
        height: 45px;
        width: 226px;
    }


    .tab_explorer .styled-select.slate select {
        border: 1px solid #ccc;
        font-size: 14px;
        height: 45px;
        width: 245px;
    }
    
    .tab_explorer  .slider_container_holder{
        width: 75%;
        padding: 7px;
    }
    
</style>
<form id="chart_data_filtering" method="post" class="form-inline pull-right" action="">
    <div class="form-group">
        <label class="sr-only" for="email">Email:</label>
        <!--Load location type data-->
        @php
        $option_data =   get_table_data_by_table('location_types');
        @endphp
        <select class="form-control" id="location_type" name="location_type" onchange="applyChartFilter(this.value);">
            <option value="">Location Type</option>
            @if(isset($option_data) && !empty($option_data))
            @foreach($option_data as $data)
            <option value="{{$data->id}}">{{$data->name}}</option>
            @endforeach
            @endif
        </select>
    </div>
    <div class="form-group">
        <label class="sr-only" for="pwd">Password:</label>
        <!--Load gender data-->
        @php
        $option_data =   get_table_data_by_table('genders');
        @endphp
        <select class="form-control" id="gender" name="gender" onchange="applyChartFilter(this.value);">
            <option value="">Gender</option>
            @if(isset($option_data) && !empty($option_data))
            @foreach($option_data as $data)
            <option value="{{$data->id}}">{{$data->name}}</option>
            @endforeach
            @endif
        </select>
    </div>
    <div class="form-group">
        <label class="sr-only" for="pwd">Password:</label>
        <!--Load Generation data-->
        @php
        $option_data =   get_table_data_by_table('generation_types');
        @endphp
        <select class="form-control" id="generation" name="generation" onchange="applyChartFilter(this.value);">
            <option value="">Generation</option>
            @if(isset($option_data) && !empty($option_data))
            @foreach($option_data as $data)
            <option value="{{$data->id}}">{{$data->name}}</option>
            @endforeach
            @endif
        </select>
    </div>
    <div class="form-group">
        <label class="sr-only" for="email">Email:</label>
        <!--Load Businss Type data-->
        @php
        $option_data =   get_table_data_by_table('business_types');
        @endphp
        <select class="form-control" id="business_type" name="business_type" onchange="applyChartFilter(this.value);">
            <option value="">Business Type</option>
            @if(isset($option_data) && !empty($option_data))
            @foreach($option_data as $data)
            <option value="{{$data->id}}">{{$data->name}}</option>
            @endforeach
            @endif
        </select>
    </div>    
</form>
<script type="text/javascript">

    function applyChartFilter(){
        var redirectMethod  =   $("#method_selector").val();
        switch(redirectMethod){
            case "tab_1" :
                profile_explorer_chart();
                break;
            case "tab_2" :
                Second_Explorer_Chart();
                break;
            case "tab_3" :
                Third_Explorer_Chart();
                break;
            case "tab_4" :
                profile_explorer_chart();
                break;
            case "tab_5" :
                Fifth_Explorer_Chart();
                break;
            case "tab_6" :
                Sixth_Explorer_Chart();
                break;
            default:
                console.log("Sorry there is no supported tab");
                break;
        }
    }

</script>