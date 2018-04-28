<!--Extends parent app template-->
@extends('frontend.layout.app')

<!--Content insert section-->
@section('content')
<!--home page intro-->
<!-- Example row of slider -->

<?php // include 'slider.php'; ?>
<style>
    #page_background_platform{
        background-color: #f6f7f9;
        padding: 50px 10%;
    }
    #page_background_platform p{
        line-height: 28px;
        color: #5D5E5E;
    }
    #page_background_platform p.para_1{
        font-size: 16pt;
        /*font-weight: bold;*/
    }
    #page_background_platform p.para_2{
        font-size: 13px;
    }
    .background_journey_holder{
        height: 1400px;
        padding: 20px 0; 
        background-color: #f6f7f9;
    }
    .background_journey{
        padding: 0 10%;
        margin: 3% 0%;
    }
    p.journey_prominnt_para{
        margin: -2px 135px -12px 0;
        padding: 0 0;
        line-height: 0;
        text-align: right;
        font-weight: 800;
        text-transform: uppercase;
        line-height: 15px;
        letter-spacing: 2px;
    }
    .journey_1{
        margin: 0 12% 0 16%;
    }
    .journey_1 ul li{
        list-style: square;
        margin-top: 1%;
        line-height: 14px;
        font-size: 12px;
    }
    .journey_2{
        margin: 0 12% 0 16%;
        padding: 7% 10%;
        font-size: 12px;
    }
    .journey_3{
        margin: 29px 12% 0 16%;
padding: 0% 10%;
font-size: 12px;
    }
    .journey_4{
        margin: 0 12% 0 16%;
        padding: 11% 10%;
        font-size: 12px;
    }
    .journey_5{
        margin: -100px 12% 0 16%;
        padding: 11% 10%;
        font-size: 12px;
    }
    .journey_6{
        margin: -100px 12% 0 16%;
padding: 11% 10%;
font-size: 12px;
    }
        .project_priotize_img{
    text-align: center;
    display: block;
    margin: 0 auto;
    padding: 26px 0;
    width: 75%;
    }
</style>
<div class="row">
    <div class="col-md-12" col-sm-2>
        <div class="page_default">
            <h3 class="page_default_title">Background</h3>
            <p>
                Micro-Merchant Asia is a data analytics and information hub about small merchants 
                specializing in the trade of FMCG products with annual turnover of under 0.3 million BDT. 
                This platform thrives in the spirit of open data and collaboration with the objective of 
                facilitating data-driven decision-making about the business growth of Micro Merchants. 
                Private sector players especially in FMCG and Digital Financial Service, researchers and 
                policy makers are the intended user of this platform
            </p>
        </div>
    </div>
</div>
<div class="row" style="margin-top: 10px;">
    <div class="col-md-12">
        <div id="page_background_platform">
            <p class="para_2">
                Micro Merchant Asia data platform arose from implementing a three-year long project named “Shaping Inclusive Finance Transformations in SAARC: Merchants Development Driving Rural Markets in Bangladesh (SHIFT-MDDRM)” funded by the European Union. UNCDF spearheads the implementation of the project with Dnet,
                The Federation of Bangladesh Chambers of Commerce and Industry [FBCCI] and Bangladesh Dokan Malik Samity [BDMS]. The project aims to enhance growth and competitiveness of retail merchants in rural Bangladesh through vertical integration with FMCG value chains and horizontal integration with financial service value chains,
                especially through introduction and use of digital business technologies and services. MDDRM targets to reach 10,000 Micro Merchants, particularly women, in four districts (Sirajgonj, Tangail, Jamalpur, and Sherpur) by 2020-21.  In creating the desired impact on Micro Merchants, the project prioritizes the following 4 areas:
                <br>
                <img src="{{asset('project/frontend/images/img/page/backgorund_01.png')}}" class="project_priotize_img">
            </p>
            
            <div class="background_journey_holder" style="background:url('{{asset("project/frontend/images/img/page/background_page.png")}}') no-repeat center center /cover">
                <p class="journey_prominnt_para" style="margin-bottom: -33px;">micromerchant asia</p>
                <div class="background_journey journey_1">
                    <p style="line-height: 15px;margin: 0 !important;padding-top: 11%;font-weight: bold;">Through multiple phases of innovative research, the project will bring to light issues pertaining to Micro Merchants from the angles of business portfolio, practices, capacity needs and innovations as below:</p>
                    <ul>
                        <li>
                            <strong>Micro Merchant Landscape Assessment in Bangladesh</strong><br>
                            A large-scale quantitative survey delving into the socioeconomic profiles, regular business practices 
                            and access to technology and financial services.
                        </li>
                        <li>
                            <strong>Capacity Development Need Assessment Study for Business Growth</strong><br> 
                            A qualitative research exploring the capacity development needs for business growth of 
                            micro-merchants.
                        </li>
                        <li>
                            <strong>Study of Transactions Behavior of Micro-merchants and Consumers</strong><br>
                            A qualitative research attempting to understand the day-to-day business practices, cultural and behav  
                            ioral patterns behind their financial decisions of micro-merchants and consumers.
                        </li>
                        <li>
                            <strong>Communications and educational strategy to advance micro-merchant business</strong><br>
                            A qualitative research attempting to devise a communication and educational strategy through a sys  
                            tematic research to disseminate the required knowledge and information among the targeted 
                            micro-merchants and retail customers for business and service awareness.
                        </li>
                        <li>
                            <strong>Mapping of Business Development Service Providers</strong><br> 
                            An exploratory research defining, identifying and profiling the ideal set of business development ser 
                            vice providers for Micro Merchants in light of the findings from researches above.
                        </li>
                    </ul>
                </div>
                
                <div class="background_journey journey_2">
                    As committed in the project goals, authorities came up with this visualization and exploration platform 
                    as a way of effectively making information and data set(s) on Micro Merchants available to 
                    decision makers.
                </div>
                
                <div class="background_journey journey_3">
                    The platform starts out offering visual exploration of insights from the large-scale quantitative survey, 
                    based on a representative sample of 2100 Micro Merchants across Bangladesh and opens up the 
                    data set for purposes aligned with the overarching objectives of the platform.
                </div>
                
                <div class="background_journey journey_4">
                    Besides, an unprecedented repository of research documents and training materials resulting from 
                    rigorous research is also made available in the platform’s Knowledge Center.  
                </div>
                
                <div class="background_journey journey_5">
                    Gradually, the platform will engage state and non-state actors from other south Asian countries to open up data sets and information on respective Micromerchant communities. 
                </div>
                
                <div class="background_journey journey_6">
                    Collaborating with a wide swathe of country-level and regional bodies and institutions interested in Micromerchants, Micromerchant Asia will open up data sets and propagate insights for data-driven policy making, innovations and investment in the retail distributive sub sector.
                </div>
            </div>
        </div>
    </div>        
</div>
@endsection