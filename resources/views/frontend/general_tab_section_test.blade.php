<div class="row">
    <div class="col-lg-12 col-sm-2">
        <div class="row" style="padding:10px">                        
            <div class="col-lg-6 col-sm-12">
                <div class="img-wrapper" id ="explorer1_chart_4" >
                </div>                    
                <p class="explore_image_caption_para">
                    <a href="#"><img src="{{asset('project/frontend/images/img/icon/if_share_227561.png')}}" /> <span>Share this.</span></a>
                </p>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="img-wrapper" id ="explorer1_box_plot_test">
                </div>                    
                <p class="explore_image_caption_para">
                    <a href="#"><img src="{{asset('project/frontend/images/img/icon/if_share_227561.png')}}" /> <span>Share this.</span></a>
                </p>
            </div>                        
        </div>            
    </div>
</div>
@section('footer_js_scrip_area')
@parent
<script type="text/javascript">

    profile_explorer_chart();

</script>
@endsection