<style type="text/css">
    #loading {
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 100;
        width: 290px;
        height: 30px;
        margin-left: 40%;
        margin-top: 170px;
        background-color: rgba(192, 192, 192, 0.5);
        /*background-image: url("/loader.gif");*/
        background-image: url("/project/frontend/images/img/ajax-loader.gif");
        background-repeat: no-repeat;
        background-position: center;
    }
    
    #progress_bar{
        background-color: #00FF00;
        position: relative;
        width: 0px;
        height: 29px;
        opacity: .4;
        padding: 3% 0%;
        font-weight: bold;
        font-size: 10px;
        text-align: right;
        font-weight: bold;
    }
    
</style>
<!-- Example row of Map -->
<div class="row">
    <div class="col-lg-12">
        <!-- Tabs -->
        <div class="data_stories tab_title_style">
            Sample Of
            @php
                $pd['table']  =   'org_quest_survey';
                $count_data     =   count_table_data($pd);
                echo $count_data->total_count
            @endphp
            Micromerchants            
        </div>                
        <div class="map_section_area" style="position: relative;">
            <div id="map" class="global_map_style"></div>
            <div id="loading">
                <div id="progress_bar"></div>
            </div>
            <div id="categoryFilter" class="categoryFilter">
                <form id="map_data_filtering" method="post" name="map_data_filtering" action=""> 
                    <div class="styled-select rounded cream slate">
                        <!--Load location type data-->
                        @php
                        $option_data =   get_table_data_by_table('location_types');
                        @endphp
                        <select id="location_type" name="location_type" onchange="get_map_data_by_filter(this.value);">
                            <option value="">Location Type</option>
                            @if(isset($option_data) && !empty($option_data))
                            @foreach($option_data as $data)
                            <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="styled-select rounded cream slate">
                        <!--Load gender data-->
                        @php
                        $option_data =   get_table_data_by_table('genders');
                        @endphp
                        <select id="gender" name="gender" onchange="get_map_data_by_filter(this.value);">
                            <option value="">Gender</option>
                            @if(isset($option_data) && !empty($option_data))
                            @foreach($option_data as $data)
                            <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="styled-select rounded cream slate">
                        <!--Load Generation data-->
                        @php
                        $option_data =   get_table_data_by_table('generation_types');
                        @endphp
                        <select id="generation" name="generation" onchange="get_map_data_by_filter(this.value);">
                            <option value="">Generation</option>
                            @if(isset($option_data) && !empty($option_data))
                            @foreach($option_data as $data)
                            <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="slider_container_holder">
                        <p class="slider_range_paragrapg">Progress out of poverty Index</p>
                        <div class="slidecontainer">
                            <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
                            <input id="ex1" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="1" data-slider-step=".1" data-slider-value="14"/>
                            <div>
                                <ul class="input_range">
                                    <li>Poorest</li>
                                    <li>Richest</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="map_search_submit">
                        <!--<input type="reset" class="pull-right btn btn-primary" name="reset" value="Reset Filter">-->
                        <button type="button" class="pull-right btn btn-primary" name="submit" onclick="mapReloadMethod(true);">Reset Map</button>
                    </div>
                    <!--the following fields will check map depth for applying filtering-->
                        <input type="hidden" id="level_check" value="">
                        <input type="hidden" id="div_name" value="">
                        <input type="hidden" id="div_id" value="">
                        <input type="hidden" id="dis_name" value="">
                        <input type="hidden" id="lat" value="">
                        <input type="hidden" id="lon" value="">
                        <input type="hidden" id="dis_id" value="">
                    <!--end checking-->
                </form>
            </div>
            <div class="categoryFilterTotalSummery">
                <div class="color_code_range_holder">
                    <?php
                    $colorRange = get_table_data_by_table("msi_ranges");
                    foreach ($colorRange as $data) {
                        ?>
                        <div class="range_box" style="background-color: {{$data->color}}">{{$data->from."-".$data->to}}</div>
                    <?php } ?>
                </div>
                <p class="total_number" id='zone_name'>Number of <br>Micro-merchants<br></p>
                <p class="all_total" id="all_total">
                    @php
                        $pd['table']  =   'org_quest_survey';
                        $count_data     =   count_table_data($pd);
                        echo $count_data->total_count
                    @endphp                    
                </p>
                <hr class="summery_total_hr">
                <p class="all_total" id="all_total_percentage"> 100% Of Total</p>
            </div>
        </div>
    </div>
</div>    
    <!--
        here is the general ajaxcommon method call
        to retrive filter data
    -->
    @section('footer_js_scrip_area')
        @parent
        <script>
            function doAjaxCheckTest(){
                var testParam   =   {
                    type        :   "POST",
                    url         :   "/check_url",
                    dataType    :   "json",
                    data        :   "abc="+12
                };
                var ajaxResponse    =   commonAjaxRequest(testParam);
            }
            
            function get_map_data_by_filter(do_filter){
                if(do_filter){
                    var filterStatus    =   true;
                    //this variable is for map level checking
                    
                    var checkLevel      =   $("#level_check").val();
                    if(checkLevel==2){
                        
                        // the following param is used for 
                        // statble upazila level filtering
                        var UpazilaParam = {
                            div_name    : $("#div_name").val(),
                            div_id      : "",
                            dis_name    : $("#dis_name").val(),
                            lat         : parseFloat($("#lat").val()),
                            lon         : parseFloat($("#lon").val()),
                            dis_id      : $("#dis_id").val(),
                        };
                        goUpazilaBylayerDown(UpazilaParam)
                    }else{
                        firstpageload(filterStatus);
                    }
                    $.ajax({
                        url         :"filter_wise_result",
                        type        :"get",
                        dataType    :"JSON",
                        data        :$("#map_data_filtering").serialize(),
                        success     :function(response){
                            $("#all_total").html(response.total_count);
                            $("#all_total_percentage").html(response.percentage);
                            $("#zone_name").html(response.loc_name);                                
                        }
                    });
                }
            }
        </script>        
    @endsection
