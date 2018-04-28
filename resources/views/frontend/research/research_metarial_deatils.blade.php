<!--Extends parent app template-->
@extends('frontend.layout.app')

<!--Content insert section-->
@section('content')

<!--home page intro-->
<style>
    #research_rich_editor img{
        width: 100%
    }
</style>
<!-- Example row of slider -->
<div class="row">
    <div class="col-md-12 col-sm-2 margin_bottom_5">
        <div class="page_default">
            <h3 class="page_default_title">RESEARCH MATERIALS</h3>
            <p>
            Micromerchant Asia hosts an unprecedented repository of interesting research materials on issues pertaining to Micromerchants. The catalogued researches explore diverse questions with state-of-the-art qualitative and quantitative  techniques. 
            </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xm-12">
        <h2> {{ $Research_details->title }} </h2>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xm-12">
        <div class="trainingpost" style=" background-image: url(' {{ asset('project/backend/research/cover_image/'.$Research_details->cover_image) }}')">
            
        </div>
       
    </div>
</div>


<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="author">
            <i class="fa fa-user"></i> Posted BY : Admin | 
            <i class="fa fa-clock-o"></i> {{ $Research_details->start_time }}
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 research_rich_editor_style" id="research_rich_editor" style="width:100%">

        
        {!! html_entity_decode($Research_details->textarea_data) !!}
               
        <a id="read_more" class="research_readmore">Read More
            <i class="fa fa-plus"></i>
        </a>   
    </div>



    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="toggle">

            <div class="row">
                <ul class="nav nav-tabs">
                  <li class="active">
                    <a id="">Files</a>
                  </li>
                </ul>
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="">
                            <i class="fa fa-file"></i>
                            {{ $count_file }} FILES
                        </div>
                        <div class="">
                            <i class="fa fa-music"></i>
                            {{ $count_audio }} AUDIO
                        </div>
                        <div class="">
                            <i class="fa fa-video-camera"></i>
                            {{ $count_video }} VIDEO
                        </div>
                        <div class="">
                            <i class="fa fa-image"></i>
                            {{ $count_picture }} PICTURE
                        </div>
                 </div>
            </div>

       
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
    
    $(document).ready(function(){
        $("#toggle").hide();
        $("#read_more").click(function(){
            $("#toggle").toggle();
        });
    })

</script>



@endsection