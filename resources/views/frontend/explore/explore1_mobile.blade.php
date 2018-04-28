<div class="row">
    <div class="col-sm-12">
        <br><br>
        @include('frontend.explore.filter_mobile')
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="img-wrapper" id ="mob_chart_1" ></div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="img-wrapper" id ="mob_chart_2"></div>                    
        <p class="explore_image_caption_para">
            <a href="#"><img src="{{asset('project/frontend/images/img/icon/if_share_227561.png')}}" /> <span>Share this.</span></a>
        </p>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="img-wrapper" id ="mob_explorer1_chart_4" ></div>                    
        <p class="explore_image_caption_para">
            <a href="#"><img src="{{asset('project/frontend/images/img/icon/if_share_227561.png')}}" /> <span>Share this.</span></a>
        </p>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="img-wrapper" id ="mob_chart_3"></div>                    
        <p class="explore_image_caption_para">
            <a href="#"><img src="{{asset('project/frontend/images/img/icon/if_share_227561.png')}}" /> <span>Share this.</span></a>
        </p>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="img-wrapper" id ="mob_explorer1_chart_5"></div>                    
        <p class="explore_image_caption_para">
            <a href="#"><img src="{{asset('project/frontend/images/img/icon/if_share_227561.png')}}" /> <span>Share this.</span></a>
        </p>
    </div>
</div>
@section('footer_js_scrip_area')
        @parent
        <script type="text/javascript" src="{{ asset('project/frontend/js/explore1_mob_chart.js')}}"></script>
        <script type="text/javascript">
            profile_explorer_chart_mob();
        </script>
@endsection