<div class="row">
    <div class="col-sm-12">
        <br><br>
        @include('frontend.explore.filter')
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="img-wrapper" id = "explorer6_chart_1_mob"></div>                   
        <p class="explore_image_caption_para">
            <a href="#"><img src="{{asset('project/frontend/images/img/icon/if_share_227561.png')}}" /> <span>Share this.</span></a>
        </p>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="img-wrapper" id = "explorer6_chart_2_mob" ></div>                   
        <p class="explore_image_caption_para">
            <a href="#"><img src="{{asset('project/frontend/images/img/icon/if_share_227561.png')}}" /> <span>Share this.</span></a>
        </p>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="img-wrapper" id ="explorer6_chart_3_mob" ></div>                    
        <p class="explore_image_caption_para">
            <a href="#"><img src="{{asset('project/frontend/images/img/icon/if_share_227561.png')}}" /> <span>Share this.</span></a>
        </p>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="img-wrapper" id ="explorer6_chart_5_mob" ></div>                   
        <p class="explore_image_caption_para">
            <a href="#"><img src="{{asset('project/frontend/images/img/icon/if_share_227561.png')}}" /> <span>Share this.</span></a>
        </p>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="img-wrapper" id ="explorer6_chart_6_mob" ></div>                    
        <p class="explore_image_caption_para">
            <a href="#"><img src="{{asset('project/frontend/images/img/icon/if_share_227561.png')}}" /> <span>Share this.</span></a>
        </p>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="img-wrapper" id ="explorer6_chart_7_mob" ></div>                    
        <p class="explore_image_caption_para">
            <a href="#"><img src="{{asset('project/frontend/images/img/icon/if_share_227561.png')}}" /> <span>Share this.</span></a>
        </p>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="img-wrapper" id="explorer6_chart_8_mob" ></div>                     
        <p class="explore_image_caption_para">
            <a href="#"><img src="{{asset('project/frontend/images/img/icon/if_share_227561.png')}}" /> <span>Share this.</span></a>
        </p>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="img-wrapper" id ="explorer6_chart_9_mob" ></div>                     
        <p class="explore_image_caption_para">
            <a href="#"><img src="{{asset('project/frontend/images/img/icon/if_share_227561.png')}}" /> <span>Share this.</span></a>
        </p>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="img-wrapper" id="explorer6_chart_10_mob" ></div>                   
        <p class="explore_image_caption_para">
            <a href="#"><img src="{{asset('project/frontend/images/img/icon/if_share_227561.png')}}" /> <span>Share this.</span></a>
        </p>
    </div>
</div>
@section('footer_js_scrip_area')
    @parent
    <script type="text/javascript" src="{{ asset('project/frontend/js/explorer6_mob_chart.js')}}"></script>
    <script type="text/javascript">
        Sixth_Explorer_Chart_mob();
    </script>
@endsection