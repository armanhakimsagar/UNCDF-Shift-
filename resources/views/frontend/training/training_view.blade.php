<!--Extends parent app template-->
@extends('frontend.layout.app')

<!--Content insert section-->
@section('content')
<!--home page intro-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    .research_about_detail img{
        max-width: 100%
    }
</style>
<div class="row">
    <div class="col-md-12" col-sm-2>
        <div class="page_default">
            <h3 class="page_default_title">Training MATERIALS</h3>
            <p>
            Micromerchant Asia hosts an unprecedented repository of interesting research materials on issues pertaining to Micromerchants. The catalogued researches explore diverse questions with state-of-the-art qualitative and quantitative  techniques. 
            </p>
        </div>

    </div>
</div>
<!-- Example row of slider -->

<div class="row">
    <div class="col-md-12 col-sm-2">
            
            
            @if($training != "")

            @foreach($training as $t)

                <div class="col-md-12 col-sm-2 page_default_2" id="training_area_{{ $t->id }}">
                    

                    
                    <div class="col-md-4 col-sm-12 page_default_2" style="margin-top: 20px">
                        <img src="{{ asset('project/backend/training/cover_image/'.$t->cover_image) }}" class="training_title">
                    </div>
                    <div class="col-md-8 col-sm-12 page_default_2">
                        <h3  style="text-align: left; padding-top: 0px"> {{  str_limit($t->title, $limit = 150) }} </h3>
                        <div class="userlogo">  <i class="fa fa-user"></i> Admin</span> </div>
                        <p class="training_desc"> {{ str_limit($t->short_description, $limit = 1000) }}
                        </p> 
                    </div>
                      
                    <div class="col-md-12 col-sm-12 page_default_2">

                       
                       <span style="float: right">
                           <a class="training_readmore" id="{{ $t->id }}" onclick="read_more_function({{ $t->id }})">
                                Read More 
                             <i class="fa fa-plus"></i>
                           </a>
                       </span>

                    </div>
                       
                       
                      
                       
                       


                       <div class="col-md-12 col-sm-12 page_default_2 section" id="section_{{ $t->id }}" style="height: 100%">

                        

                        <ul class="nav nav-tabs">
                          <li class="about_head active"><a id="about_head_{{ $t->id }}" onclick="about_head_toggle( {{$t->id}} )">About</a></li>
                          <li class="document_head"><a id="document_head_{{ $t->id }}" onclick="detail_head_toggle( {{$t->id}} )">Related Documents</a></li>
                        </ul>
                       

                           <div class="col-md-12 col-sm-12">
                           <span class="about_detail research_about_detail" id="about_detail_{{ $t->id }}"> 
                              
                            {!!html_entity_decode($t->textarea_data)!!}

                            
                           </span>
                        </div>

                        <div class="col-md-12 col-sm-12 document_detail" id="document_detail_{{ $t->id }}">
                           
                        </div>

                    </div>

                    </div>
                    

                    

                    <!--- -->

                    
            @endforeach

            @else
                <br><br>
                <div class="alert alert-danger">
                  <strong>Danger!</strong> We don't have any records now!
                </div>
            @endif

    </div>

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
                url: 'training_ajax_file_view/'+id,
                success: function (response) 
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