<div class="row" class="chart_filter_style">
    <div class="col-md-12">
        @include('frontend.explore.filter')
    </div>
</div>
<div id="inside_tab5_elements" class="carousel slide carousel-fade">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#inside_tab5_elements" data-slide-to="0" class="active"></li>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <!--Start Tab Elements-->
        <div class="tabi_explore item active slide1">
            <div class="row tab_inside_row_height">
                <div class="col-lg-12">
                    <div class="row" style="padding:10px">
                        
                        <div class="col-lg-6">
                            <div class="img-wrapper" id = "explorer5_chart_1">
                                
                            </div>                    
                            <p class="explore_image_caption_para">
                                <a href="#"><img src="{{asset('project/frontend/images/img/icon/if_share_227561.png')}}" /> <span>Share this.</span></a>
                            </p>
                        </div>
                        
                    </div>            
                </div>        
            </div>
        </div>

        <!--End Tab Elements-->
    </div>
    <a class="left carousel-control" href="#inside_tab5_elements" role="button" data-slide="prev">
        <i class="fa fa-angle-left"></i><span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#inside_tab5_elements" role="button" data-slide="next">
        <i class="fa fa-angle-right"></i><span class="sr-only">Next</span>
    </a>
</div>