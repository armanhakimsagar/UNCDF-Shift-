<!DOCTYPE html>      
<table class="table" style="width:100%">

    <tbody style="background-color: #FFFFFF">
        <?php //dd($search_data);
        if (isset($search_data) || !empty($search_data) ) {
            foreach ($search_data as $key_val) {
                $tableName = $key_val['table_name_url'];
                $url = "";
                if ($tableName == "researches") {
                    $url = "/research#reserach_area_";
                } elseif ($tableName == "trainings") {
                    $url = "/training#training_area_";
                }
                foreach ($key_val['data'] as $linkData) {
                    $terget_page = $linkData->id;
                    
                    if(isset($linkData)  || !empty($linkData)){
                    ?>
        
                    <tr>
                        <td>
                            <a style = "color:#000000"  href="{{$url.$terget_page}}">
                                <span style="color:#8080C0; font-size: 13px;">
                                    {{  str_limit($linkData->title, $limit = 50, $end = '...')  }}
                                </span>
                                <br>
                                {!!html_entity_decode(str_limit($linkData->textarea_data, $limit = 250, $end = '...'))!!}
                            </a>
                        </td>

                    </tr>
                <?php 
                    }
                }
            }
        } else { ?>
                    
                    fdfdgdfgdfgdfgdfgdfgdfgdfgdfgdfgdfg
<!--            <tr>
                <td> ABCD</td>

            </tr>-->
<?php } ?>

    </tbody>
</table>

