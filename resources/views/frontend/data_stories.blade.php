<style>
    .text{
        text-align: justify; padding: 15px 50px 10px 50px;
    }
    .text p{
        color: #262626;
        font-size: 16px;
        text-align: justify;
    }
    .text h4{
        color: #262626;
        font-family: Georgia, "Times New Roman", Times, serif;
        font-size: 18px;
        text-align: justify;
        font-weight: 600;
    }

    .table{
        width: 80%;
    }

    .table tbody tr td span{
        color: #000;
        font-size: 15px;
        font-weight: 600;
    }

    .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th{
        border: 2px solid #626262;
    }

</style>
<div class="row">
    <div class="col-md-12" col-sm-2>
        <div class="page_default">
            <h3 class="page_default_title">DataStories</h3>
            <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
        </div>
    </div>
</div>   
<div class="row">   
    <div class="col-lg-12">
        <!-- Tabs -->
        <div class="accordion_panel">
            <?php

            $dataParam['table'] =   "general_post_data";
            $dataParam['where'] =   [
                'post_type' =>  1
            ];
            $guidelinesData   =   get_table_data_by_where($dataParam);
            if(isset($guidelinesData) && !empty($guidelinesData)){
                foreach($guidelinesData as $data_key => $datas){
             ?>
            <div class="accordion_panelbox {{ (($data_key==0)? 'in active':"")}}">
                <div class="accordion_title toggle">
                    <h4>{{ $datas->title }}</h4>                
                </div>
                <div class="accordion_content">
                    <div class="row">
                        <?php if (isset($datas->chart_query_method)) { ?>
                            <div class="col-lg-6">
                                {!!html_entity_decode($datas->textarea_data)!!}
                            </div>
                            <div class="col-lg-6" id="{{ $datas->chart_id }}" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto">

                            </div>
                            @section('footer_js_scrip_area')
                            @parent
                            <script type="text/javascript">
                            {{ $datas->chart_query_method }}
                            </script>
                            @endsection

                        <?php } else { ?>
                            <div class="col-lg-12">
                                {!!html_entity_decode($datas->textarea_data)!!}
                            </div>
                        <?php } ?>                       

                    </div>                    
                </div>
            </div>  <!-- end of accordian -->
            <?php }} ?>
        </div>
    </div>
</div>
@section('footer_js_scrip_area')
@parent
<script type="text/javascript" src="{{ asset('project/frontend/js/general_post.js')}}"></script>
@endsection