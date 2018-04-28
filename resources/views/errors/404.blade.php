<!--Extends parent app template-->
@extends('frontend.layout.app')

<!--Content insert section-->
@section('content')
<!--home page intro-->



<!-- Example row of slider -->

<div class="row">
    <div class="col-md-12" col-sm-2>
        <div class="page_default">
            <h1 style="text-align: center"> 404 NOT FOUND </h1>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.js"></script>
<script type="text/javascript">
 $(function() {
        $('.lazy').lazy();
    });
</script>
@endsection
