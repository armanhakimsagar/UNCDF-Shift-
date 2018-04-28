<!--Extends parent app template-->
@extends('frontend.layout.app')

<!--Content insert section-->
@section('content')    

<div class="row">
    <div class="col-md-12">
        <div class="col-md-8">
            <h3 style="padding-left: 1px;
                padding-bottom: 15px;
                font-size: 27px;
                color: #1e1a53;
                font-weight: 600;">Micromerchant Landscape Assessment In Bangladesh</h3>

            <div class="container_dataset" style="border-top: 2px solid #9D0909;
                 margin-top: 10px;">            
                <table class="table">
                    @foreach($datasets as $dataset)
                    <thead>
                        <tr>
                            <th>Reference_ID</th>
                            <th>{{ $dataset->ref_id }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>Year</td><td>{{ $dataset->year }}</td></tr>
                        <tr><td>Country</td><td>	{{ $dataset->country }}</td></tr>
                        <tr><td>Producer(s)</td><td>{{ $dataset->producers }}</td></tr>
                        <tr><td>Sponsor(s)</td><td>{{ $dataset->sponsor }}</td></tr>
                        <tr><td>Collection(s)</td><td>{{ $dataset->collection }}</td></tr>

                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <table class="table table-bordered">

                <tr>
                    <td>
                        Created on</td>
                    <td>Last modified</td>
                </tr>
                <tr>
                    <td>28 Feb, 2018</td>
                    <td>28 Feb,2018</td>
                </tr>
                <tr>

                </tr>
                </tbody>
            </table>
            <div class="metadata" style="    padding: 10px 40px 15px 40px;
                 border-left: 2px solid #ede8e8;
                 border-bottom: 2px solid #ede8e8;
                 border-top: 2px solid #ede8e8;
                 border-right: 2px solid #ede8e8;">
                <h2 style="padding-bottom: 10px;
                    border-bottom: 2px solid #f1d711;
                    font-size: 20px;
                    font-weight: 600;
                    color: #505050;">META Data</h2>
                <p><a href="#" style="font-size: 15px;"><img src="img/blog/p1.png" alt="blog post" style="width: 50px;
                                                             padding-right: 10px;">Document in PDF</a></p>
                <p> <a href="#" style="font-size: 15px;"><img src="img/blog/p2.png" alt="blog post" style="width: 50px;
                                                              padding-right: 10px;">Interactive visualization</a></p>
                <p> <a href="http://shift.uncdf.org/asean-financial-inclusion-what" style="font-size: 15px;"><img src="img/blog/p3.png" alt="blog post" style="width: 50px;
                                                                                                                  padding-right: 10px;">Study Website</a></p>

            </div>
        </div>
    </div>
    <div class="col-md-12">


        <div class="tabbable-panel">
            <div class="tabbable-line">
                <ul class="nav nav-tabs ">
                    <li class="active"><a href="#tab_default_1" data-toggle="tab">Related Materials</a></li>
                    <li><a href="#tab_default_2" data-toggle="tab">Study Description</a></li>
                    <li><a href="#tab_default_3" data-toggle="tab">Data Dictionary</a></li>
                    <li><a href="#tab_default_4" data-toggle="tab">Get Microdata</a></li>
                </ul>
                <div class="tab-content">

                    <!-- Start tab 1-->
                    <div class="tab-pane active" id="tab_default_1">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="collection" style="text-align: justify;    box-shadow: 8px 8px 10px 0px #ccc;
                                     padding: 5px 5px 5px 12px;">
                                    <p style="font-size: 25px;">Related Materials</p>
                                    Download the questionnaires, technical documents and reports that describe the survey process and the key results for this study.
                                    <div class="collection_post">
                                        @foreach($metarial_categories as $m_c) 
                                            <div class="fieldset">
                                                <legend> {{ $m_c->cat_name }} </legend>
                                                <table class="table table-bordered">
                                                   @foreach($dbcollectionsdetails as $db_details) 
                                                        <?php if($db_details->post_subtype_id == $m_c->id){ ?>
                                                         <tr>
                                                             <td>{{ $db_details->post_title }}</td>
                                                             
                                                         </tr>
                                                        <?php } ?>
                                                    @endforeach
                                                </table>
                                            </div>
                                        @endforeach
                                        
                                        

                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-3">

                            </div>
                        </div>

                    </div>
                    <!-- End tab 1-->

                    <!-- Start tab 2-->
                    <div class="tab-pane" id="tab_default_2">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="dataset_filter" style="    border-left: 1px solid gainsboro;
                                     border-right: 1px solid gainsboro;
                                     border-top:1px solid gainsboro;">

                                    <div class="filter2" style=" text-align: right;    border-bottom: 1px solid gainsboro;
                                         padding: 20px 20px 20px 20px;
                                         color: #9d0909;
                                         font-weight: 600;">
                                        @foreach($studies as $study)
                                        
                                            <p><a href="#{{ $study->post_title }}">{{ $study->post_title }}</a></p>
                                            
                                        @endforeach
                                        


                                    </div>



                                </div>

                            </div>
                            <div class="col-lg-9">
                                <div class="studydes">
                                    
                                    @foreach($studies as $study)
                                    <h2 id="{{ $study->post_title }}">{{ $study->post_title }}</h2>
                                    
                                        {!!html_entity_decode($study->post_description)!!}
                                        
                                    @endforeach
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End tab 2-->

                    <!-- Start tab 3-->
                    <div class="tab-pane" id="tab_default_3">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="dataset_filter" style="    border-left: 1px solid gainsboro;
                                     border-right: 1px solid gainsboro;
                                     border-top:1px solid gainsboro;">

                                    <div class="filter2" style=" text-align: right;border-bottom: 1px solid gainsboro;
                                         padding: 20px 20px 20px 20px;
                                         color: #9d0909;
                                         font-weight: 600;">
                                        @foreach($directories as $directory)
                                        
                                            <p><a href="#{{ $directory->post_title }}">{{ $directory->post_title }}</a></p>
                                            
                                        @endforeach
                                        

                                    </div>



                                </div>

                            </div>
                            <div class="col-lg-9">
                                <div class="collection" style="text-align: justify;    box-shadow: 8px 8px 10px 0px #ccc;
                                     padding: 5px 5px 5px 5px;">
                                    
                                    @foreach($directories as $directory)
                                        <h2 id="{{ $directory->post_title }}">{{ $directory->post_title }}</h2>

                                            {!!html_entity_decode($directory->post_description)!!}

                                        {{ $directory->post_title }}
                                    @endforeach
                                    
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <ul class="pagination">
                                        <li class="disabled"><a href="#">«</a></li>
                                        <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">»</a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End tab 3-->

                    <!-- Start tab 4-->
                    <div class="tab-pane" id="tab_default_4">
                        <div class="row">
                            <div class="col-lg-2">


                            </div>
                            <div class="col-lg-8">

                                <div class="containerform" style="padding: 0px 50px 0px 10px;">
                                    <h2>Registration form</h2>
                                    <form class="form-horizontal" action="/action_page.php">
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="email">First Name*:</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="email" placeholder="Enter First Name" name="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="email">Last Name:</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="email" placeholder="Enter Last Name" name="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="email">Email:</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="email" placeholder="Enter email address" name="email">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="pwd">Country:</label>
                                            <div class="col-sm-10">
                                                <select name="country" class="form-control">
                                                    <option value="-">-</option>
                                                    <option value="Afghanistan">Afghanistan</option><option value="Africa">Africa</option><option value="Albania">Albania</option>
                                                    <option value="Algeria">Algeria</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option>
                                                    <option value="Belarus">Belarus</option><option value="Belgium">Belgium</option><option value="Belize">Belize</option>
                                                    <option value="Benin">Benin</option><option value="Bermuda">Bermuda</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="email">Purpose of Access:</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="email" placeholder="" name="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="email">Password:</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="email" placeholder="Enter password" name="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="email">Password Confirm:</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="email" placeholder="Re-password" name="email">
                                            </div>
                                        </div>

                                        <div class="form-group">        
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <div class="checkbox">
                                                    <label><input type="checkbox" name="remember"> Remember me</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">        
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-default">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <div class="col-lg-2">


                            </div>

                        </div>
                    </div>
                    <!-- End tab 4-->

                </div>
            </div>
        </div>



    </div>


</div>
@endsection
