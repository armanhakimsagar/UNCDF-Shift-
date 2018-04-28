<!--Extends parent app template-->
@extends('frontend.layout.app')

<!--Content insert section-->
@section('content')
<!--home page intro-->

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
            <h3 class="page_default_title">Guidelines</h3>
            <p>
                Micromerchant Asia makes available high-quality data and information related to the ground realities of Micro Merchants.
                Guidelines clearly stipulate the possibilities,
                safeguards and caveats around access, use and privacy issues of the data and information made available.
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
                'post_type' =>  2
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
                        <div class="col-lg-12">
                            {!!html_entity_decode($datas->textarea_data)!!}
                        </div>
                    </div>
                    
                </div>
            </div>  <!-- end of accordian -->

            <?php }} ?>
        </div>

    </div>

</div>



@endsection