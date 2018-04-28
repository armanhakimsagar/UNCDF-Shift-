<!--site logo area-->
<div class="row">
    <div class="col-md-6">
        <div class="logo_head">
            <a class="" style="color: gray;" href="{{ url('/') }}">Micromerchant Asia</a>
        </div>
    </div>
    <div class="col-md-6" id="contatct_us_map_style">
        <div class="nav2"> 
            <a href="{{ url('/contact_us_view') }}">Contact Us </a> &nbsp;
        </div>        
    </div>
</div>

<!--site navigation area-->

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-home"></i></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class=""><a href="{{ url('/background_view') }}">BACKGROUND</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">KNOWLEDGE CENTER<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a class="checkClass" href="{{ url('/research') }}">Research Materials</a></li>
                        <li><a class="checkClass" href="{{ url('training') }}">Training Materials</a></li>
                    </ul>
                </li>
                <li><a class="checkClass" href="/#data_stories_section">DATA STORIES</a></li>
                <li><a href="{{ url('/guideline_view') }}">GUIDELINES</a></li>
                <li><a href="{{ url('/databank_view') }}">DATA BANK</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <div class="search">
                    <input type="text" class="form-control input-sm top_search_style" id="search_input" onkeypress="return runScript(event)" maxlength="64" placeholder="Search" />
                    <button id="search_btn" class="btn1 btn1-primary btn1-sm" onclick="SearchFunction()" ><i class="fa fa-search" ></i></button>                    
                </div>
               
            </ul>
        </div>
    </div>
    
</nav>

<div id="view_search_container" class="row" style="display: none;">
    <div class="col-md-12">
        <div id="view_search"></div>
    </div>
</div>
@section('footer_js_scrip_area')
    @parent

<script type="text/javascript" src="{{ asset('project/frontend/js/search.js')}}"></script>

<script>
$(document).ready(function(){
    
    $("#search_btn").click(function(){
        $("#view_search").show();
    });
});

function runScript(e) {
    if (e.keyCode == 13) {
//        var tb = document.getElementById("search_input");
//        eval(tb.value);
//        return false;
         SearchFunction();
    }
}
</script>
    
@endsection

