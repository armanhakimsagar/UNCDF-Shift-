<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Micro Merchant Asia</title>
        
        @section('header_css_js_scrip_area')
        <!-- Bootstrap core CSS -->
        <link href="{{ asset('project/common/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- Fontawesome core CSS -->
        <link href="{{ asset('project/common/css/font-awesome.min.css')}}" rel="stylesheet">
        <!-- Lato font CSS -->
        <link href="{{ asset('project/frontend/css/latofonts.css')}}" rel="stylesheet">
        <link href="{{ asset('project/frontend/css/latostyle.css')}}" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="{{ asset('project/frontend/css/navbar-fixed-top.css')}}" rel="stylesheet">
        
        <!-- Custom styles for login template -->
        <link rel="stylesheet" href="{{ asset('project/backend/css/AdminLTE.min.css')}}">
        <!--front side required style sheet-->
        <link href="{{ asset('project/frontend/css/site_style.css')}}" rel="stylesheet">
        
        @show
    </head>

    <body>        
        <div class="container">
            <div id="socialIconHolder" class="a2a_kit a2a_kit_size_32 a2a_floating_style a2a_vertical_style" style="right:4%; top:300px;">
                <span id="socialIconSpan">
                    <a class="" data-toggle="tooltip" title="Facebook Share"><img src="{{ asset('project/frontend/images/img/social_icons/facebook.png') }}" /></a>
                    <a class="" data-toggle="tooltip" title="Twitter Share"><img src="{{ asset('project/frontend/images/img/social_icons/twiter.png') }}" /></a>
                    <a class="" data-toggle="tooltip" title="Google Plus  Share"><img src="{{ asset('project/frontend/images/img/social_icons/gmail.png') }}" /></a>
                    <a class="" data-toggle="tooltip" title="Pinterest Share"><img src="{{ asset('project/frontend/images/img/social_icons/pinterest.png') }}" /></a>
                </span>                
            </div>
        <!--Start Navigation Area-->
            @include('frontend.layout.nav')
        <!--End Navigation Area-->           
            <!--Start Main Content Area-->
            
            @yield('content')
            <!--End Main Content Area-->
            
           <!--Start Footer Area-->
            @include('frontend.layout.footer')
            <!--End Footer Area-->
            
        </div><!--End Main Content Area-->        
        @section('footer_js_scrip_area')
            <!--All footer script are in this page-->
            @include('frontend.layout.footer_script')
        @show 
        
    </body>
</html>
