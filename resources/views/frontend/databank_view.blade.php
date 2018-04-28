<!--Extends parent app template-->
@extends('frontend.layout.app')

<!--Content insert section-->
@section('content')
<!--home page intro-->
         
<div class="row">
    <div class="col-md-12" col-sm-2>
        <div class="page_default">
            <h3 class="page_default_title">Data Bank</h3>
            <p>
                The data sets cataloged in the Data Bank of the platform are enlisted for quick access and/or reference to the data behind the interesting visualizations and Data Stories. The overarching principle of data inclusion on the website is to facilitate research, evidence-based policies and collaboration among players in retail distributive sub-sector. Hence, any data that sheds light on the socioeconomic, behavioral and business reality of Micromerchants from the region will be made available on the platform.  These data are unit-level data obtained from sample surveys, censuses, and administrative systems. They provide information about characteristics of individual people or entities such as households, business enterprises, facilities, farms or even geographical areas such as villages or towns.
            </p>
        </div>
    </div>
</div>
<div class="row databank_page">
    <div class="col-md-12">
        <!--<h3 class="left_side_page_header">Data Bank</h3>-->
        <div class="tabbable-panel">
            <div class="tabbable-line">
                <ul class="nav nav-tabs ">
                    <li class="active"><a href="#tab_default_1" data-toggle="tab">Collections</a></li>
                    <li><a href="#tab_default_2" data-toggle="tab">Datasets</a></li>
                    <li><a href="#tab_default_3" data-toggle="tab">Citations</a></li>
                </ul>
                
                <div class="tab-content">

                    <!-- Start tab 1-->
                    <div class="tab-pane active" id="tab_default_1">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="collection">
                                    <p style="    padding: 0px 10px 0px 10px;">
                                        Inside data catalog, data from all similar type of surveys, data sets and research are clustered into groups called collections. 
                                    </p>
                                    <div class="collection_post">

                                        <div class="blog_medium">
                                            <div class="collection_list">Collection Lists</div>
                                            @foreach($collections as $r_view)
                                            <article class="post">
                                                <figure class="post_img">
                                                    <a href="{{ url('databank_details/'.$r_view->id) }}">
                                                        <img src="{{ asset('project/backend/databank/thumbsnail/'.$r_view->image_path) }}" alt="blog post">
                                                    </a>
                                                </figure>
                                                
                                                <div class="post_content">
                                                    <div class="post_meta">
                                                        
                                                        <h2>
                                                            <a href="{{ url('databank_details/'.$r_view->id) }}">{{ $r_view->title }}</a>
                                                        </h2>

                                                    </div>
                                                    <p>
                                                        {{ $r_view->description }}    
                                                    </p><a class="btn btn-small btn-default" href="{{ url('databank_details/'.$r_view->id) }}">Read More</a>
                                                </div>
                                                
                                            </article>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="dataset_filter" style="    border-left: 1px solid gainsboro;
                                     border-right: 1px solid gainsboro;
                                     border-top:1px solid gainsboro;">
                                    <div class="headtext" style="    background: linear-gradient(#f8f5f5, #acacac);
                                         padding: 10px;
                                         margin-bottom: 15px;
                                         border-bottom: 1px solid gainsboro;
                                         font-weight: 600;">REFINE LIST</div>
                                    <div class="filter"><p style="font-weight:600;">Filter by Year</p><p>Show studies conducted between</p>
                                        <select>
                                            <option value="1">1999</option>
                                            <option value="2">2000</option>
                                            <option value="3">2001</option>
                                            <option value="4">2002</option>
                                            <option value="4">2003</option>
                                            <option value="4">2004</option>
                                            <option value="4">2005</option>
                                            <option value="4">2006</option>
                                            <option value="4">2007</option>
                                        </select> to
                                        <select>
                                            <option value="1">1999</option>
                                            <option value="2">2000</option>
                                            <option value="3">2001</option>
                                            <option value="4">2002</option>
                                            <option value="4">2003</option>
                                            <option value="4">2004</option>
                                            <option value="4">2005</option>
                                            <option value="4">2006</option>
                                            <option value="4">2007</option>
                                        </select>

                                    </div>
                                   
                                    
                                    
                                    
                                    <div class="filter"><p style="font-weight:600;">Filter by Data Access</p>
                                        <div class="checkbox">
                                            <label  style="color: #002060;"><input type="checkbox" value="">All</label>
                                        </div>
                                        <div class="checkbox">
                                            <label  style="color: #8a26be;"><input type="checkbox" value="">Open data Access</label>
                                        </div>
                                        <div class="checkbox">
                                            <label style="color: greenyellow;"><input type="checkbox" value="">Direct Data Access</label>
                                        </div>
                                        <div class="checkbox">
                                            <label style="color: green;"><input type="checkbox" value="">Public use data files</label>
                                        </div>
                                        <div class="checkbox">
                                            <label style="color: orange;"><input type="checkbox" value="">Licensed data files</label>
                                        </div>
                                        <div class="checkbox">
                                            <label style="color: blue;"><input type="checkbox" value="">Data available from external repository</label>
                                        </div>
                                    </div>
                                    
                                    <div class="filter"><p style="font-weight:600;">Filter by Country</p>
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="">All</label>
                                        </div>



                                    </div>
                                </div>
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
                                    <div class="headtext" style="    background: linear-gradient(#f8f5f5, #acacac);
                                         padding: 10px;
                                         margin-bottom: 15px;
                                         border-bottom: 1px solid gainsboro;
                                         font-weight: 600;">REFINE LIST</div>
                                    <div class="filter"><p style="font-weight:600;">Filter by Year</p><p>Show studies conducted between</p>
                                        <select>
                                            <option value="1">1999</option>
                                            <option value="2">2000</option>
                                            <option value="3">2001</option>
                                            <option value="4">2002</option>
                                            <option value="4">2003</option>
                                            <option value="4">2004</option>
                                            <option value="4">2005</option>
                                            <option value="4">2006</option>
                                            <option value="4">2007</option>
                                        </select> to
                                        <select>
                                            <option value="1">1999</option>
                                            <option value="2">2000</option>
                                            <option value="3">2001</option>
                                            <option value="4">2002</option>
                                            <option value="4">2003</option>
                                            <option value="4">2004</option>
                                            <option value="4">2005</option>
                                            <option value="4">2006</option>
                                            <option value="4">2007</option>
                                        </select>

                                    </div>

                                    <div class="filter"><p style="font-weight:600;">Filter by Data Access</p>
                                        <div class="checkbox">
                                            <label  style="color: #002060;"><input type="checkbox" value="">All</label>
                                        </div>
                                        <div class="checkbox">
                                            <label  style="color: #8a26be;"><input type="checkbox" value="">Open data Access</label>
                                        </div>
                                        <div class="checkbox">
                                            <label style="color: greenyellow;"><input type="checkbox" value="">Direct Data Access</label>
                                        </div>
                                        <div class="checkbox">
                                            <label style="color: green;"><input type="checkbox" value="">Public use data files</label>
                                        </div>
                                        <div class="checkbox">
                                            <label style="color: orange;"><input type="checkbox" value="">Licensed data files</label>
                                        </div>
                                        <div class="checkbox">
                                            <label style="color: blue;"><input type="checkbox" value="">Data available from external repository</label>
                                        </div>
                                    </div>

                                    <div class="filter"><p style="font-weight:600;">Filter by Country</p>
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="">All</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-9">
                                <div class="dataset" style="text-align: justify;
                                     /*box-shadow: 8px 8px 10px 0px #ccc;*/
                                     padding: 5px 5px 5px 5px;">
                                    <p style="    padding: 0px 10px 0px 10px;">
                                        Data sets from a survey, research or administrative source relating to a specific year and country are cataloged under this tab.
                                    </p>
                                    <div class="collection_post">

                                        <div class="blog_medium">
                                            <div class="collection_list">Dataset List</div>
                                            @foreach($datasets as $dataset)
                                            <article class="post_dataset">
                                                <figure class="post_dataset_img">
                                                    <a href="{{ url('dataset_details/'.$dataset->id) }}">
                                                        <img src="{{ asset('project/backend/databank/thumbsnail/dataset.png') }}" alt="blog post">
                                                    </a>
                                                </figure>
                                                <div class="post_dataset_content">
                                                    <div class="post_meta">
                                                        <a href="{{ url('dataset_details/'.$dataset->id) }}">{{ $dataset->dataset_title }}</a>
                                                        <p style="    font-style: italic;
                                                           color: green;
                                                           font-weight: 800;">{{ $dataset->use_type }}</p>
                                                        <p>
                                                            By: {{ $dataset->sponsor }}
                                                        </p>

                                                    </div>
                                                    <div class="crdiv">Created on: {{ $dataset->entry_time }}</div>
                                                </div>
                                            </article>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>                                
                            </div>

                        </div>
                    </div>
                    <!-- End tab 2-->

                    <!-- Start tab 3-->
                    <div class="tab-pane" id="tab_default_3">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="collection" style="text-align: justify; 
                                     /*box-shadow: 8px 8px 10px 0px #ccc;*/
                                     padding: 5px 5px 5px 5px;">
                                    <p style="    padding: 0px 10px 0px 10px;">
                                        Citations enable users to make proper reference of the data source when they use it for their research or administrative purpose.
                                    </p>
                                    <div class="collection_post">
                                        <table id="customers">
                                            <tr>
                                                <th>Serial</th>
                                                <th>Title</th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td><div class="tdlink"><a data-toggle="modal" data-target="#myModal">Micromerchant Landscape Assessment in Bangladesh</a>
                                                        : Dhaka, Bangladesh: United Nations Capital Development Fund, 2018.</div></td>
                                            </tr>


                                        </table>

                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" style="width: 50%;">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                        <h4 class="modal-title" id="myModalLabel" style="font-weight: 600;">Citation Information</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>Title</th>
                                                                    <th>Micromerchant Landscape Assessment in Bangladesh</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Author(s)</td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Publication (Day/Month/Year)</td>
                                                                    <td>28 Feb,2018</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Publisher</td>
                                                                    <td>United Nations Capital Development Fund</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>City</td>
                                                                    <td>Dhaka</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Country/State</td>
                                                                    <td>Bangladesh</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>URL</td>
                                                                    <td><a href="#" style="color: #005983;"></a></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3"></div>
                        </div>
                    </div>
                    <!-- End tab 3-->
                </div>
            
            </div>
        </div>



    </div>


</div>


@endsection