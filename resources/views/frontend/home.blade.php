<!--Extends parent app template-->
@extends('frontend.layout.app')
<!--Content insert section-->
@section('content')

<!-- home page slider add -->
@include('frontend.slider')
<!--home page intro-->
<div class="row">
    <div class="col-md-12" col-sm-2>
        <div class="page_default">
            <h3 class="page_default_title">Micromerchant Landscape Assessment In Bangladesh</h3>
            <p>
                SHIFT-MDDRM project presents a large-scale quantitative survey delving into the socioeconomic profiles, regular business practices and access to technology and financial services.
                Sample design covers both urban and rural areas excluding metropolitan and divisional towns. Aligned with population distribution,
                urban and rural regions are sampled at 25:75 ratio with confidence level of 95%, 50% response distribution and a sampling frame of 62,500 Micromerchants.
                600 Micromerchants are sampled from 4 districts (Jamalpur, Sherpur, Mymensigh and  Sirajgonj) while 1500 Micromerchants from other regions.
                The survey was conducted during Jan-Feb 2018
            </p>
        </div>
    </div>
</div>
@include('frontend.map')
@include('frontend.general_tab_section')
@include('frontend.data_provide')
@include('frontend.data_stories')
@endsection