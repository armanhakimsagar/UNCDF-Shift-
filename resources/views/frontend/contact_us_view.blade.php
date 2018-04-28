<!--Extends parent app template-->
@extends('frontend.layout.app')
<!--Content insert section-->
@section('content')
<!--home page intro-->

<div class="row">
    <div class="col-md-12" col-sm-2>
        <div class="page_default">
            <h3 class="page_default_title">Contact Us</h3>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eu metus ut orci facilisis pellentesque.
                Donec in libero magna. Aenean maximus sollicitudin mauris eu accumsan.
                Nulla id elit sodales, volutpat odio suscipit, posuere quam. Proin consectetur iaculis justo viverra volutpat
            </p>
        </div>
    </div>
</div>
<div class="row databank_page contact_us_page">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xm-12">
        <div class="content_body">
            <form>
                <div class="form-group">
                    <label for="exampleInputUsername">Your name</label>
                    <input type="text" class="form-control" id="" placeholder=" Enter Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail">Email Address</label>
                    <input type="email" class="form-control" id="exampleInputEmail" placeholder=" Enter Email id">
                </div>	
                <div class="form-group">
                    <label for="telephone">Mobile No.</label>
                    <input type="tel" class="form-control" id="telephone" placeholder=" Enter 10-digit mobile no.">
                </div>

                <div class="form-group">
                    <label for ="description"> Message</label>
                    <textarea  class="form-control" id="description" placeholder="Enter Your Message"></textarea>
                </div>
                <div>

                    <button type="button" class="btn btn-default submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Send Message</button>
                </div>


            </form>
        </div>
    </div>
</div>
<!-- End logo part -->

@endsection