<!--Extends parent app template-->
@extends('frontend.layout.app')

<!--Content insert section-->
@section('content')
<!--home page intro-->
<style>
    iframe{
        width: 100%
    }
</style>


<!-- Example row of slider -->

<div class="row">
    <div class="col-md-12" col-sm-2>
        <div class="page_default">
            <h3 class="page_default_title">RESEARCH MATERIALS</h3>
            <p>
            Micromerchant Asia hosts an unprecedented repository of interesting research materials on issues pertaining to Micromerchants. The catalogued researches explore diverse questions with state-of-the-art qualitative and quantitative  techniques. 
            </p>
        </div>
    </div>
</div>

<div class="row">
    

        @foreach($Research as $r_view)
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xm-12 " id="reserach_area_{{ $r_view->id }}">
                
            
                
                <div class="col-lg-4 col-md-4 col-sm-12 col-xm-12 page_default" style="height: 300px; padding:10px">

                    
                        <img style="height: 300px; width: 400px; padding: 30px 10px 10px 10px" src="{{ asset('project/backend/research/cover_image/'.$r_view->cover_image) }}" data-src="{{ asset('project/backend/research/cover_image/'.$r_view->cover_image) }}" height="200px" class="img-responsive" alt="Blog image">
                </div>
                
                <div class="col-lg-8 col-md-8 col-sm-12 col-xm-12 page_default" style="height: 300px; padding:25px 5px 5px 5px; overflow:hidden  ">

                    <h3 style="font-weight: lighter; text-align: left">{{  str_limit($r_view->title, $limit = 100) }}</h3>
                    
                    <div class="userlogo">  <i class="fa fa-user"></i> Admin</span> </div>


                    <p style="text-align: left; padding: 0px">{{  str_limit($r_view->short_description, $limit = 300) }}</p>  
                    
                    
                </div>
            
                <div class="col-md-12 col-sm-12" style=" background-color: #fff; margin: -5px 0px 5px 0px; padding: 10px">
                    <span style="float: right; background-color: #fff">
                        <a class="training_readmore" id="{{ $r_view->id }}" onclick="read_more_function({{ $r_view->id }})">
                             Read More 
                          <i class="fa fa-plus"></i>
                        </a>
                    </span>
                </div>
            
                <div class="col-md-12 col-sm-12 page_default_2 section" id="section_{{ $r_view->id }}" style="height: 100%">

                        

                        <ul class="nav nav-tabs">
                          <li class="about_head active"><a id="about_head_{{ $r_view->id }}" onclick="about_head_toggle( {{$r_view->id}} )">About</a></li>
                          <li class="document_head"><a id="document_head_{{ $r_view->id }}" onclick="detail_head_toggle( {{$r_view->id}} )">Related Documents</a></li>
                        </ul>
                       

                           <div class="col-md-12 col-sm-12">
                               <span class="about_detail research_about_detail" id="about_detail_{{ $r_view->id }}" style="text-align:left"> 
                              
                            
                               {!!html_entity_decode($r_view->textarea_data)!!}
                            
                           </span>
                        </div>

                        <div class="col-md-12 col-sm-12 document_detail" id="document_detail_{{ $r_view->id }}">
                           
                        </div>

                    </div>
                
            
                
           </div>

        @endforeach

</div>


<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.js"></script>
<script type="text/javascript">
 $(function() {
        $('.lazy').lazy();
    });
</script>




<script type="text/javascript">


    $(".section,.document_detail").hide();

    function read_more_function(id){

        $("#section_"+id).toggle();

    }

    function about_head_toggle(id){

        $("#document_detail_"+id).hide();
        $("#about_detail_"+id).show();
        $(".about_head").addClass('active');
        $(".document_head").removeClass('active');
    
    }

    function detail_head_toggle(id){

        $("#about_detail_"+id).hide();
        $("#document_detail_"+id).show();
        $(".document_head").addClass('active');
        $(".about_head").removeClass('active');
        
        
        if(id)
            {
              $.ajax
              ({
                type: 'get',
                url: 'research_ajax_file_view/'+id,
                success: function(response) 
                {
                   
                 document.getElementById("document_detail_"+id).innerHTML = response;

                }
              });
            }else{
                alert('not ok');
            }

    }   

</script>

@endsection