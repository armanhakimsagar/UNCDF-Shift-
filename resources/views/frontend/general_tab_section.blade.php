<div class="row">
    <div class="col-lg-12">
        <div class="about_part"style="background:transparent url({{asset('project/frontend/images/img/sliders/s2.png')}}) no-repeat center center /cover">
            <div class="col-lg-9"></div>

            <div class="col-lg-3">
                <div class="about_text">
                    <span style="font-size: 16px;font-weight: 600;">ABOUT SHIFT</span>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,when an unknown printer took a galley of type

                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Example row of General Section -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <!-- start tab -->
        <div id="tabs" class="tabs">
            <!-- start nav -->
            <nav style="margin: 0;">
                <ul>
                    <li><a href="#section-1" class="" onclick="assignTabId('tab_1')"><span>Profile</span></a></li>
                    <li><a href="#section-2" class="" onclick="assignTabId('tab_2')"><span>Access to Financial Service</span></a></li>
                    <li><a href="#section-3" class="" onclick="assignTabId('tab_3')"><span>Finance & Internet</span></a></li>
                    <li><a href="#section-4" class="" onclick="assignTabId('tab_4')"><span>Finance & Accounts</span></a></li>
                    <li><a href="#section-5" class="" onclick="assignTabId('tab_5')"><span>Payments</span></a></li>
                    <li><a href="#section-6" class="" onclick="assignTabId('tab_6')"><span>Business & Needs</span></a></li>
                </ul>
            </nav>
            <div class="content">
                <span id="method_selector_span">
                    <input type="hidden" id="method_selector" value="tab_1">
                </span>
                <!-- start section 1 -->
                <section id="section-1">
                    <div class="mediabox">
                        <div class="col-lg-12">
                            <div class="heading demoToolTip">
                                <p>
                                    <a class="tooltip_link_style" href="#" data-tooltip="Gender split means the representative percentage of female and male micro merchants are existing throughout the country.">Gender Split</a>
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 fix_responsive">
                                    <div class="box2">  68.32% <br>Female</div>
                                </div>
                                <div class="col-lg-6 fix_responsive">
                                    <div class="box2">31.68%<br> Male</div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="mediabox">
                        <div class="col-lg-12">
                            <div class="heading demoToolTip">
                                <p>
                                    <a class="tooltip_link_style" href="#" data-tooltip="Baby Boomers means the representative percentage of female and male micro merchants are existing throughout the country.">Baby-Boomers</a> <br>
                                    <span>(25-34 Years)</span>
                                </p>
                            </div>
                            <div class="box">  56.03% <br><span style="font-size:15px;">of Micro-merchants</span></div>
                        </div>
                    </div>

                    <div class="mediabox">
                        <div class="heading demoToolTip">
                            <p>
                                <a class="tooltip_link_style" href="#" data-tooltip="Proportion of the sample of the sample of Micromerchants who don’t have any formal education "> No formal education</a> <br>
                                <span>(25-34 Years)</span>
                            </p>
                        </div>
                        <div class="box">  616.03%<br><span style="font-size:15px;"> Of Micro-merchants</span></div>
                    </div>

                    <div class="col-lg-12">
                        <!-- start Explore -->
                        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo" onclick="profile_explorer_chart();" >More</button>
                        <button type="button" class="btn btn-info pull-right" data-toggle="collapse" data-target="#custom_profile_demo">Custom chart</button>
                        <div id="demo" class="collapse">
                            <div class="explorar_contain_holder">
                                <div class="web_explorar">
                                    @include('frontend.explore.explore1')
                                </div>
                                <div class="mobile_explorar">
                                    @include('frontend.explore.explore1_mobile')
                                </div>
                            </div>
                        </div>
                        
                        <div id="custom_profile_demo" class="collapse">
                            <div class="explorar_contain_holder">
                                @include('frontend.explore.generel_pivot')
                            </div>
                        </div>

                        <!-- End Explore -->
                    </div>
                    <!-- End section 1 -->
                </section>
                <section id="section-2">
                    <!-- start section 2 -->
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mediabox">
                                <div class="heading demoToolTip">
                                    <p>
                                        <a class="tooltip_link_style" href="#" data-tooltip="Proportion of the sample of Micromerchants who owns a Bank Account">Owns Bank Account</a>
                                    </p>
                                </div>
                                <div class="box">  56.03% <br><span style="font-size:15px;">of Micro-merchants</span></div>
                            </div>
                        </div>

                         <div class="col-lg-4">
                            <div class="mediabox">
                                <div class="heading demoToolTip">
                                    <p>
                                        <a class="tooltip_link_style" href="#" data-tooltip="Proportion of the sample of Micromerchants who owns a Bank Account">Recency of Bank Account Usage</a>
                                    </p>
                                </div>
                                <div class="box">  In the Past 7 Days 23% <br><span style="font-size:15px;">of those MMs who have Bank Accounts</span></div>
                            </div>
                        </div>
                       
                        <div class="col-lg-4">
                            <div class="mediabox">
                                <div class="heading demoToolTip">
                                    <p>
                                        <a class="tooltip_link_style" href="#" data-tooltip="Proportion of the sample of Micromerchants who owns an MFS account">Owns an MFS account</a>
                                    </p>
                                </div>
                                <div class="box">  76.03% <br><span style="font-size:15px;"> Of Micro-merchants</span></div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mediabox">
                                <div class="heading demoToolTip">
                                    <p>
                                        <a class="tooltip_link_style" href="#" data-tooltip="Maor Reasons of using Bank Account">Most Common Uses of  Bank Accounts </a>
                                    </p>
                                </div>
                                <div class="box">  56.03% <br><span style="font-size:15px;">of Micro-merchants</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- End section 2 -->
                        <div class="col-lg-12">
                            <!-- start Explore -->
                            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo1"  onclick="Second_Explorer_Chart('')" >Explore</button>
                            <div id="demo1" class="collapse">
                                <div class="web_explorar">
                                    @include('frontend.explore.explore2')
                                </div>
                                <div class="mobile_explorar">
                                    <?php // include 'explore/explore2_mobile.php'; ?>
                                    @include('frontend.explore.explore2_mobile')
                                </div>
                            </div> 

                            <!-- End Explore -->
                        </div>
                    </div>
                </section>
                <section id="section-3">
                    <!-- start section 3 -->
                    <div class="mediabox">
                        <div class="col-lg-12">
                            <div class="heading demoToolTip">
                                <p>
                                    <a class="tooltip_link_style" href="#" data-tooltip="Proportion of those who have  a mobile phone reporting smart phone ownership">Owns a Smart-phone</a>
                                </p>
                            </div>
                            <div class="box"> 36.03%<br><span style="font-size:15px;">of Micro-merchants</span></div>
                        </div>
                    </div>
                     <div class="mediabox">
                        <div class="col-lg-12">
                            <div class="heading demoToolTip">
                                <p>
                                    <a class="tooltip_link_style" href="#" data-tooltip="Gender split means the representative percentage of female and male micro merchants are existing throughout the country.">Median Weekly Internet Consumption</a>
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 fix_responsive">
                                    <div class="box2">  Mobile <br>30 MB</div>
                                </div>
                                <div class="col-lg-6 fix_responsive">
                                    <div class="box2">BroadBand<br> 30 BDT</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    

                    <div class="mediabox">
                        <div class="col-lg-12">
                            <div class="heading demoToolTip">
                                <p>
                                    <a class="tooltip_link_style" href="#" data-tooltip="50th percentile of the distribution of weekly airtime consumption reported by those who own a mobile phone">Median Weekly Airtime Consumption</a>
                                </p>
                            </div>
                            <div class="box">30 BDT</div>
                        </div>
                    </div>

                     <div class="mediabox">
                        <div class="col-lg-12">
                            <div class="heading demoToolTip">
                                <p>
                                    <a class="tooltip_link_style" href="#" data-tooltip="Gender split means the representative percentage of female and male micro merchants are existing throughout the country.">Median Weekly Airtime Consumption</a>
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 fix_responsive">
                                    <div class="box2">  Basic <br>30 BDT</div>
                                </div>
                                <div class="col-lg-6 fix_responsive">
                                    <div class="box2">SmartPhone<br> 30 BDT</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mediabox">
                        <div class="col-lg-12">
                            <div class="heading demoToolTip">
                                <p>
                                    <a class="tooltip_link_style" href="#" data-tooltip="Proportion of the sample of Micromerchants who accesses internet from anywhere"> Access to Internet</a>
                                </p>
                            </div>
                            <div class="box">76.03% <br><span style="font-size:15px;"> Of Micro-merchants</span></div>
                        </div>
                    </div>



                    <div class="col-lg-12">
                        <!-- start Explore -->
                        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo2" onclick="Third_Explorer_Chart('')" >Explore</button>
                        <div id="demo2" class="collapse">
                            <div class="web_explorar">
                                @include('frontend.explore.explore3')
                            </div>
                            <div class="mobile_explorar">
                                <?php // include 'explore/explore3_mobile.php'; ?>
                                @include('frontend.explore.explore3_mobile')
                            </div>
                        </div> 

                        <!-- End Explore -->
                    </div>
                    <!-- End section 3 -->
                </section>
                <section id="section-4">
                    <!-- start section 4 -->
                    <div class="mediabox">
                        <div class="col-lg-12">
                            <div class="heading demoToolTip">
                                <p>
                                    <a class="tooltip_link_style" href="#" data-tooltip="Proportion of the sample of Micromerchants who sells on credit">Sales on Credit</a>
                                </p>
                            </div>
                            <div class="box"> 46.32% <br><span style="font-size:15px;">of Micro-merchants</span></div>
                        </div>
                    </div>
                    <div class="mediabox">
                        <div class="col-lg-12">
                            <div class="heading demoToolTip">
                                <p>
                                    <a class="tooltip_link_style" href="#" data-tooltip="Proportion of the sample of Micromerchants who took a business/personal loan in the last one year">Maintains a Loan</a>
                                </p>
                            </div>
                            <div class="box">30000 BDT</div>
                        </div>
                    </div>
                    <div class="mediabox">
                        <div class="col-lg-12">
                            <div class="heading demoToolTip">
                                <p>
                                    <a class="tooltip_link_style" href="#" data-tooltip="Proportion of the sample of Micromerchants citing the most common use of daily cash residuals">Most common use of daily cast residuals</a>
                                </p>
                            </div>
                            <div class="box">Consumed 38.65% <br><span style="font-size:15px;">of Micro-merchants</span></div>
                        </div>
                    </div>

                    
                    <div class="mediabox">
                        <div class="col-lg-12">
                            <div class="heading demoToolTip">
                                <p>
                                    <a class="tooltip_link_style" href="#" data-tooltip="Proportion of those who procures  on credit citing different ranges of monthly procurement on credit">Procurement on Credit</a>
                                </p>
                            </div>
                            <div class="box"> 76.65%  <br><span style="font-size:15px;">of Micro-merchants</span></div>
                        </div>
                    </div>
                    <div class="mediabox">
                        <div class="col-lg-12">
                            <div class="heading demoToolTip">
                                <p>
                                    <a class="tooltip_link_style" href="#" data-tooltip="Proportion of the sample of Micromerchants who records transactions daily">Records Transactions daily</a>
                                </p>
                            </div>
                            <div class="box">54.55%<br><span style="font-size:15px;">of Micro-merchants</span> </div>
                        </div>
                    </div>	
                    <div class="mediabox">	
                        <div class="col-lg-12">
                            <div class="heading demoToolTip">
                                <p>
                                    <a class="tooltip_link_style" href="#" data-tooltip="Proportion of the sample of Micromerchants who maintains separate business records">Maintain separate business records</a>
                                </p>
                            </div>
                            <div class="box">24.55%  <br><span style="font-size:15px;">of Micro-merchants</span></div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <!-- start Explore -->
                        <button type="button" class="btn btn-info" onclick="Fourth_Explorer_Chart('')" data-toggle="collapse" data-target="#demo3">Explore</button>
                        <div id="demo3" class="collapse">
                            <div class="web_explorar">
                                @include('frontend.explore.explore4')
                            </div>
                            <div class="mobile_explorar">
                                @include('frontend.explore.explore4_mobile')
                            </div>
                        </div> 

                        <!-- End Explore -->
                    </div>
                    <!-- End section 4 -->
                </section>
                <section id="section-5">
                    <!-- start section 5 -->
                    <div class="mediabox">
                        <div class="col-lg-12">
                            <div class="heading demoToolTip">
                                <p>
                                    <a class="tooltip_link_style" href="#" data-tooltip="Proportion of the sample of Micromerchants who uses MFS for supply payments.">Uses MFS for supply payments</a>
                                </p>
                            </div>
                            <div class="box">36.03% <br><span style="font-size:15px;">of Micro-merchants</span></div>
                        </div>
                    </div>
                    <div class="mediabox">
                        <div class="col-lg-12">
                            <div class="heading demoToolTip">
                                <p>
                                    <a class="tooltip_link_style" href="#" data-tooltip="Proportion of the sample of Micromerchants who uses MFS for customer payments.">Access MFS for customer payments</a>
                                </p>
                            </div>
                            <div class="box">26.63% <br><span style="font-size:15px;">of Micro-merchants</span></div>
                        </div>
                    </div>
                    <div class="mediabox">
                        <div class="col-lg-12">
                            <div class="heading demoToolTip">
                                <p>
                                    <a class="tooltip_link_style" href="#" data-tooltip="50th percentile of the distribution of duration of using MFS reported by those who use MFS for business">Median Duration Of Using MFS For Business</a>
                                </p>
                            </div>
                            <div class="box"> 2.5 years</div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <!-- start Explore -->
                        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo4" onclick="Fifth_Explorer_Chart('')" >Explore</button>
                        <div id="demo4" class="collapse">
                            <div class="web_explorar">
                                @include('frontend.explore.explore5')
                            </div>
                            <div class="mobile_explorar">
                                @include('frontend.explore.explore5_mobile')
                            </div>
                        </div> 

                        <!-- End Explore -->
                    </div>
                    <!-- End section 5 -->
                </section>
                <section id="section-6">
                    <!-- start section 6 -->
                    <div class="mediabox">
                        <div class="col-lg-12">
                            <div class="heading demoToolTip">
                                <p>
                                    <a class="tooltip_link_style" href="#" data-tooltip="Proportions of the sample of Micromerchants operating different  business types">Most common type of business </a>
                                </p>
                            </div>
                            <div class="box">
                                <span style="font-size:15px;">Retail</span>
                                <br>87.56% <br>
                                <p style="font-size:15px;">of Micro-merchants</p>
                            </div>
                        </div>
                    </div>
                    <div class="mediabox">
                        <div class="col-lg-12">
                            <div class="heading demoToolTip">
                                <p>
                                    <a class="tooltip_link_style" href="#" data-tooltip="50th percentile of the distribution of number of salaried employees reported by each Micromerchant">Median Number Of Salaried Employees</a>
                                </p>
                            </div>
                            <div class="box">3.4 per store</div>
                        </div>
                    </div>
                    <div class="mediabox">
                        <div class="col-lg-12">
                            <div class="heading demoToolTip">
                                <p>
                                    <a class="tooltip_link_style" href="#" data-tooltip="50th percentile of the distribution of average monthly sales reported by each Micromerchant">Median Monthly Sales</a>
                                </p>
                            </div>
                            <div class="box"> 28000 per month </div>
                        </div>
                    </div>
                    <div class="mediabox">
                        <div class="col-lg-12">
                            <div class="heading demoToolTip">
                                <p>
                                    <a class="tooltip_link_style" href="#" data-tooltip="50th percentile of the distribution of average frequency of replenishment by each Micromerchant">Median frequency of replenishments
                                    </a>
                                </p>
                            </div>
                            <div class="box">
                                <span style="font-size:15px;">Retail</span>
                                <br>87.56% <br>
                                <p style="font-size:15px;">of Micro-merchants</p>
                            </div>
                        </div>
                    </div>
                    <div class="mediabox">
                        <div class="col-lg-12">
                            <div class="heading demoToolTip">
                                <p>
                                    <a class="tooltip_link_style" href="#" data-tooltip="Proportion of the sample of Micromerchants citing the most common mode of supply payments">Most common mode of supply payments</a>
                                </p>
                            </div>
                            <div class="box">3.4 per store</div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <!-- start Explore -->
                        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo5" onclick="Sixth_Explorer_Chart('')" >Explore</button>
                        <div id="demo5" class="collapse">
                            <div class="web_explorar">
                                @include('frontend.explore.explore6') 
                            </div>
                            <div class="mobile_explorar">
                                @include('frontend.explore.explore6_mobile') 
                            </div>
                        </div> 

                        <!-- End Explore -->
                    </div>
                    <!-- End section 6 -->
                </section>
            </div><!-- /content -->
        </div><!-- /tabs -->
    </div>    
</div>
<script type="text/javascript">

    function assignTabId(tab_id){
        console.log(tab_id);
        $("#method_selector").val(tab_id);
    }

</script>
@section('footer_js_scrip_area')
@parent
<script type="text/javascript" src="{{ asset('project/frontend/js/highcharts.js')}}"></script>
<script type="text/javascript" src="{{ asset('project/frontend/js/highcharts-3d.js')}}"></script>
<script type="text/javascript" src="{{ asset('project/frontend/js/highcharts-more.js')}}"></script>
<script type="text/javascript" src="{{ asset('project/frontend/js/exporting.js')}}"></script>
<script type="text/javascript" src="{{ asset('project/frontend/js/heatmap.js')}}"></script>
<script type="text/javascript" src="{{ asset('project/frontend/js/treemap.js')}}"></script>
<script type="text/javascript" src="{{ asset('project/frontend/js/pie.js')}}"></script>

<script type="text/javascript" src="{{ asset('project/common/js/all_chart_class.js')}}"></script>
<script type="text/javascript" src="{{ asset('project/frontend/js/explore1_piechart.js')}}"></script>
<script type="text/javascript" src="{{ asset('project/frontend/js/explore2_chart.js')}}"></script>
<script type="text/javascript" src="{{ asset('project/frontend/js/explorer3_chart.js')}}"></script>
<script type="text/javascript" src="{{ asset('project/frontend/js/explorer4_chart.js')}}"></script>
<script type="text/javascript" src="{{ asset('project/frontend/js/explorer5_chart.js')}}"></script>
<script type="text/javascript" src="{{ asset('project/frontend/js/explorer6_chart.js')}}"></script>
<script type="text/javascript" src="{{ asset('project/frontend/js/general_post.js')}}"></script>
@endsection
