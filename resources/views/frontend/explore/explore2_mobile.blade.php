<div class="row">
    <div class="col-sm-12">
        <br><br>
        @include('frontend.explore.filter_mobile')
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="img-wrapper" id ="explorer2_chart_1_mob"></div>                    
        <p class="explore_image_caption_para">
            <a href="#"><img src="{{asset('project/frontend/images/img/icon/if_share_227561.png')}}" /> <span>Share this.</span></a>
        </p>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="img-wrapper" id= "explorer2_chart_2_mob"></div>                   
        <p class="explore_image_caption_para">
            <a href="#"><img src="{{asset('project/frontend/images/img/icon/if_share_227561.png')}}" /> <span>Share this.</span></a>
        </p>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="img-wrapper" id= "explorer2_chart_4_mob" ></div>                    
        <p class="explore_image_caption_para">
            <a href="#"><img src="{{asset('project/frontend/images/img/icon/if_share_227561.png')}}" /> <span>Share this.</span></a>
        </p>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="img-wrapper" id= "explorer2_chart_3_mob"></div>                    
        <p class="explore_image_caption_para">
            <a href="#"><img src="{{asset('project/frontend/images/img/icon/if_share_227561.png')}}" /> <span>Share this.</span></a>
        </p>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="img-wrapper" id="explorer2_chart_5_mob"></div>                    
        <p class="explore_image_caption_para">
            <a href="#"><img src="{{asset('project/frontend/images/img/icon/if_share_227561.png')}}" /> <span>Share this.</span></a>
        </p>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="img-wrapper" id= "explorer2_chart_6_mob"></div>                    
        <p class="explore_image_caption_para">
            <a href="#"><img src="{{asset('project/frontend/images/img/icon/if_share_227561.png')}}" /> <span>Share this.</span></a>
        </p>
    </div>
</div>
@section('footer_js_scrip_area')
        @parent
        <script type="text/javascript" src="{{ asset('project/frontend/js/explore2_mob_chart.js')}}"></script>
        <script type="text/javascript">
            Second_Explorer_Chart_mob();
        </script>
@endsection