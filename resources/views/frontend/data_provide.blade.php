<!-- Start knowledge center Part -->
<div class="row">
    <!-- knowledge center Start description -->

    <!-- End description -->
</div>
<div class="row">
    <!-- knowledge center slider -->
    <div class="col-lg-12">  

        <div id="myCarousel" class="carousel slide">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="row">
                    <div class="data_provide">
                        <h1> Research Metarial </h1>
                        
                        <P>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</P>
                    </div>
                        <div class="col-lg-12 col-md-6 col-sm-6">
                            <div class="pcontent_holder_main">
                                <div class="row">
                                    <div class="col-md-4 col-sm-1">
                                        <div class="pcontent_holder">
                                            <a href="#">
                                                <img alt="" src="{{asset('project/frontend/images/img/logo/pdf.png')}}" class="img-responsive" title="PDF"/>
                                            </a>
                                            <p class="data_provide_type">PDF (<?php echo training_file_count('training_file_details','1'); ?>)</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-1">
                                        <div class="pcontent_holder">
                                            <a href="#">
                                                <img alt="" src="{{asset('project/frontend/images/img/logo/video.png')}}" class="img-responsive" title="Video"/>
                                            </a>
                                            <p class="data_provide_type">Video (<?php echo training_file_count('training_file_details','3'); ?>)</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-1">
                                        <div class="pcontent_holder">
                                            <a href="#">
                                                <img alt="" src="{{asset('project/frontend/images/img/logo/image.png')}}" class="img-responsive" title="Image"/>
                                            </a>
                                            <p class="data_provide_type">Image (<?php echo training_file_count('training_file_details','2'); ?>)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end of column -->
                    </div>
                </div>
                <div class="item">
                    <div class="row">
                    <div class="data_provide">
                        <h1> Training Metarial </h1>
                        <P>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</P>
                    </div>
                        <div class="col-lg-12 col-md-6 col-sm-6">
                            <div class="pcontent_holder_main">
                                <div class="row">
                                    <div class="col-md-4 col-sm-1">
                                        <div class="pcontent_holder">
                                            <a href="#">
                                                <img alt="PDF" src="{{asset('project/frontend/images/img/logo/pdf.png')}}" class="img-responsive" title="PDF"/>
                                            </a>
                                            <p class="data_provide_type">PDF (<?php echo training_file_count('research_file_details','1'); ?>)</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-1">
                                        <div class="pcontent_holder">
                                            <a href="#">
                                                <img alt="Video" src="{{asset('project/frontend/images/img/logo/video.png')}}" class="img-responsive" title="Video"/>
                                            </a>
                                            <p class="data_provide_type">Video (<?php echo training_file_count('research_file_details','3'); ?>)</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-1">
                                        <div class="pcontent_holder">
                                            <a href="#">
                                                <img alt="Image" src="{{asset('project/frontend/images/img/logo/image.png')}}" class="img-responsive" title="Image"/>
                                            </a>
                                            <p class="data_provide_type">Image (<?php echo training_file_count('research_file_details','2'); ?>)</p>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div> <!--end of column --> 
                    </div>
                </div>
            </div> 
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</div>
