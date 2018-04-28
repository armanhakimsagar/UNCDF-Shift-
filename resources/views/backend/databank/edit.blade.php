<!--Extends parent app template-->
@extends('backend.layout.app')

<!--Content insert section-->
@section('content')
<style>
    .related{
        border:1px solid #ccc; padding: 4px
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Databank
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>


    </section>

    <!-- Main content -->
    <section class="content" style="background-color:#fff; margin-top: 10px">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-12 col-xs-12">

                <div id="example-basic">

                    <!-- databank section -->
                    <h3>Collections</h3>
                    <section>
                        @if(session()->has('collection_msg'))
                            <div class="alert alert-success">
                                {{ session()->get('collection_msg') }}
                                <script> dataset() </script>
                            </div>
                        @endif
                        <h3 id="collectionshow"></h3>
                        <form id="uploadimage" name="collection_form" method="post" action="{{ url('admin/CollectionUpdate') }}"  enctype="multipart/form-data">
                            {{ csrf_field() }}
                            
                            @foreach($collections as $collection)
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" class="form-control" id="CollectionTitle" value="{{ $collection->title }}" placeholder="Enter Title" name="CollectionTitle" id="databanktitle">
                                @if ($errors->has('CollectionTitle'))
                                    <br><br>
                                    <div class="alert-error">{{ $errors->first('CollectionTitle') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="title">Description:</label>
                                <input class="form-control" type="text" id="CollectionDescription" value="{{ $collection->description }}" name="CollectionDescription">
                                @if ($errors->has('CollectionDescription'))
                                    <br><br>
                                    <div class="alert-error">{{ $errors->first('CollectionDescription') }}</div>
                                @endif
                            </div>
                            <input type="hidden" name="old_collection_id" value="{{ $collection->id }}">
                            <div class="form-group">
                                <label for="title">Thumbnail image:</label>
                                <input type="file" name="CollectionFile" id="CollectionFile" class="form-control"> <br><br>
                                <img width="200px" src="{{ asset('project/backend/databank/thumbsnail/'.$collection->image_path) }}">
                                
                            </div>
                            @endforeach
                            <div class="form-group">

                                <input value="Update" type="submit" name="updatecollection" class="btn btn-success">

                            </div>
                        </form>
                    </section>

                    <!-- Details section -->
                    <h3>Datasets</h3>
                    
                    <section>
                        
                        @if(session()->has('dataset_msg'))
                            <div class="alert alert-success">
                                {{ session()->get('dataset_msg') }}
                            </div>
                        @endif
                        
                        
                        <form name="dataset_form" method="post" action="{{ url('admin/DatasetUpdate') }}"  enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <select class="form-control" name="collection_list_for_dataset" id="collection_list_for_dataset">
                                <option value="">Select Collection</option>
                                <?php if(isset($collections)){ ?>
                                @foreach($allcollections as $c)
                                <option value="{{ $c->id }}">
                                    {{ $c->title }}
                                </option>
                                @endforeach
                                <?php } ?>
                            </select> <br>
                            @if ($errors->has('collection_list_for_dataset'))
                                <div class="alert-error">{{ $errors->first('collection_list_for_dataset') }}</div>
                                <br>
                            @endif
                            <div class="form_holder">	
                                <div class="form-group">
                                    <label for="title">Title:</label>
                                    <input type="text" name="DatasetTitle" id="DatasetTitle" class="form-control" required>
                                    @if ($errors->has('DatasetTitle'))
                                    <br><br>
                                        <div class="alert-error">{{ $errors->first('DatasetTitle') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="title">Reference ID :</label>
                                    <input type="text" name="DatasetReference" id="DatasetReference" class="form-control" required>
                                    @if ($errors->has('DatasetReference'))
                                    <br><br>
                                        <div class="alert-error">{{ $errors->first('DatasetReference') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="title">Year :</label>
                                    <input type="number"  min="1900" max="2099" step="1" value="2016" name="DatasetYear" id="DatasetYear" class="form-control" required>
                                    @if ($errors->has('DatasetYear'))
                                    <br><br>
                                        <div class="alert-error">{{ $errors->first('DatasetYear') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="title">Country :</label>
                                    <input type="text" name="DatasetCountry" id="DatasetCountry" class="form-control" required>
                                    @if ($errors->has('DatasetCountry'))
                                    <br><br>
                                        <div class="alert-error">{{ $errors->first('DatasetCountry') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="title">Producer(s) :</label>
                                    <input type="text" name="DatasetProducers" id="DatasetProducers" class="form-control" required>
                                    @if ($errors->has('DatasetProducers'))
                                    <br><br>
                                        <div class="alert-error">{{ $errors->first('DatasetProducers') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="title">Sponsor(s) :</label>
                                    <input type="text" name="DatasetSponsor" id="DatasetSponsor" class="form-control" required>
                                    @if ($errors->has('DatasetSponsor'))
                                    <br><br>
                                        <div class="alert-error">{{ $errors->first('DatasetSponsor') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="title">Collection(s) :</label>
                                    <input type="text" name="DatasetCollection" id="DatasetCollection" class="form-control" required>
                                    @if ($errors->has('DatasetCollection'))
                                    <br><br>
                                        <div class="alert-error">{{ $errors->first('DatasetCollection') }}</div>
                                    @endif
                                </div>
                                
                                <div class="form-group">
                                    <label for="title">Type of user :</label> <br>
                                    Public  <input type="radio" name="DatasetUser" id="DatasetUser1" value="public">
                                    Private <input type="radio" name="DatasetUser" id="DatasetUser2" value="private">
                                    @if ($errors->has('DatasetUser'))
                                    <br><br>
                                        <div class="alert-error">{{ $errors->first('DatasetUser') }}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="title">Created at:</label>
                                    <input type="date" name="DatasetCreated" id="DatasetCreated" class="form-control" id="DatasetCreated" required>
                                    @if ($errors->has('DatasetCreated'))
                                    <br><br>
                                        <div class="alert-error">{{ $errors->first('DatasetCreated') }}</div>
                                    @endif
                                </div>
                                <input type="hidden" name="old_dataset_id" id="old_dataset_id" value="">
                                <div class="form-group">

                                    <input type="submit" id="DatasetUpdate" class="btn btn-success" value="Update">
                                    
                                </div>
                            </div>
                        </form>
                        
                        
                        <h3>Related Dataset</h3>
                        <table>
                            <thead>
                              <tr>
                                <th class='related' width='400px'>Title</th>
                                <th class='related'>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($datasets as $dataset)

                            <tr style="text-align:center">
                                  <td class='related'>{{ $dataset->dataset_title }}</td>
                                  <td class='related'>
                                      <a class="btn btn-success" onclick="single_dataset({{ $dataset->id }})"><i class="fa fa-edit"></i></a>
                                      <a class="btn btn-danger delete"  onclick=""><i class="fa fa-trash"></i></a>
                                  </td>
                                </tr>
                                  
                            @endforeach
                            </tbody>
                        </table>
                        
                    </section>




                    <h3>Metarials</h3>

                    <section>
                        <form name="metarials_form" method="post" action="{{ url('admin/MetarialUpdate') }}"  enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <h3>Add Metarials</h3>
                            
                            @if(session()->has('metarial_msg'))
                                <div class="alert alert-success">
                                    {{ session()->get('metarial_msg') }}
                                </div>
                            @endif
                            <input type="hidden" name="old_dbcollectionsdetail_id" id="old_dbcollectionsdetail_id" value="">
                            <select class="form-control" name="collection_list" id="collection_list" required>
                                <option value="">Select Collection</option>
                                <?php if(isset($allcollections)){ ?>
                                @foreach($allcollections as $c)
                                <option value="{{ $c->id }}">
                                    {{ $c->title }}
                                </option>
                                @endforeach
                                <?php } ?>
                            </select> 
                            @if ($errors->has('collection_list'))
                             <br>
                                <div class="alert-error">{{ $errors->first('collection_list') }}</div>
                            @endif
                            
                            <br>
                            
                            <select class="form-control" name="dataset_list" id="dataset_list" required>
                                <option value="">Select Datasets</option>
                                <?php if(isset($alldatasets)){ ?>
                                @foreach($alldatasets as $dl)
                                <option value="{{ $dl->id }}">
                                    {{ $dl->dataset_title }}
                                </option>
                                @endforeach
                                <?php } ?>
                            </select> 
                            
                            @if ($errors->has('dataset_list'))
                                 <br>
                                <div class="alert-error">{{ $errors->first('dataset_list') }}</div>
                            @endif
                            <br>

                            <select class="form-control" name="dataset_metarials" id="dataset_metarials" required>
                                <option value="">Related Materials</option>
                                <?php if(isset($metarial_categories)){ ?>
                                    @foreach($metarial_categories as $m_c)
                                    <option value="{{ $m_c->id }}">
                                        {{ $m_c->cat_name }}
                                    </option>
                                    @endforeach
                                <?php } ?>
                            </select> 
                            
                            @if ($errors->has('dataset_metarials'))
                            <br>
                                <div class="alert-error">{{ $errors->first('dataset_metarials') }}</div>
                            @endif
                            <br>
                            <div class="form-group">

                                <label for="title">File title :</label>
                                <input type="text" class="form-control" name="metarial_title0" id="metarial_title0" required>
                                @if ($errors->has('metarial_title0'))
                                <br><br>
                                    <div class="alert-error">{{ $errors->first('metarial_title0') }}</div>
                                @endif
                            </div>
                            

                            <div class="form-group">

                                <label for="title">Browse file :</label>
                                <input type="file" name="metarial_file0" id="metarial_file0" class="form-control" required>
                                @if ($errors->has('metarial_file0'))
                                <br>
                                    <div class="alert-error">{{ $errors->first('metarial_file0') }}</div>
                                @endif
                            </div>

                            <div id="addresses"></div>


                            <div class="form-group" style="margin-top:50px">

                                <input type="submit" class="btn btn-success" value="Update">

                            </div>
                        </form>
                        <h3>Related Metarials</h3>
                        <table>
                            <thead>
                              <tr>
                                <th class='related' width='400px'>Title</th>
                                <th class='related'>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($single_metarials as $single_metarial)
                                
                                <tr style="text-align:center">
                                      <td class='related'>{{ $single_metarial->post_title }}</td>
                                      <td class='related'>
                                          <a class="btn btn-success" onclick="single_metarial({{ $single_metarial->id }})"><i class="fa fa-edit"></i></a>
                                          <a class="btn btn-danger delete"  onclick=""><i class="fa fa-trash"></i></a>
                                      </td>
                                    </tr>

                                @endforeach
                                  
                            </tbody>
                        </table>
                    </section>




                    <h3>Study</h3>

                    <section>
                        <form method="post" action="{{ url('admin/StudyUpdate') }}"  enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <h3>Add Study Description</h3>
                            
                            @if(session()->has('study_msg'))
                                <div class="alert alert-success">
                                    {{ session()->get('study_msg') }}
                                </div>
                            @endif
                            <input type="hidden" name="old_studydetail_id" id="old_studydetail_id" value="">
                            <select class="form-control" name="study_collection_list" id="study_collection_list" required>
                                <option value="">Select Collection</option>
                                <?php if(isset($allcollections)){ ?>
                                @foreach($allcollections as $c)
                                <option value="{{ $c->id }}">
                                    {{ $c->title }}
                                </option>
                                @endforeach
                                <?php } ?>
                            </select>
                            <br>
                            @if ($errors->has('study_collection_list'))
                                <br>
                                <div class="alert-error">{{ $errors->first('study_collection_list') }}</div>
                                <br>
                                
                            @endif
                            
                            <select class="form-control" name="study_dataset_list" id="study_dataset_list" required>
                                <option value="">Select Datasets</option>
                                <?php if(isset($alldatasets)){ ?>
                                @foreach($alldatasets as $dl)
                                <option value="{{ $dl->id }}">
                                    {{ $dl->dataset_title }}
                                </option>
                                @endforeach
                                <?php } ?>
                            </select> 

                            @if ($errors->has('study_dataset_list'))
                            <br>
                                <div class="alert-error">{{ $errors->first('study_dataset_list') }}</div>
                            <br>
                            @endif
                            
                                <div class="study_section">
                                    <div class="form-group">

                                        <label for="title">Title :</label>
                                        <input type="text" class="form-control" name="study_title0" id="study_title" required>
                                        @if ($errors->has('study_title0'))
                                        <br><br>
                                            <div class="alert-error">{{ $errors->first('study_title0') }}</div>
                                        @endif
                                    </div> 

                                    <div class="form-group">

                                        <label for="title">Add description :</label>
                                        <textarea name="study_textarea_data0" id="study_description"  cols="30" rows="10"></textarea>
                                        <input name="image" type="file" name="study_textarea_file0" id="study_file" class="hidden" onchange="" style="visibility:hidden">
                                        @if ($errors->has('study_textarea_data0'))
                                        <br>
                                            <div class="alert-error">{{ $errors->first('study_textarea_data0') }}</div>
                                        @endif
                                    </div> 

                                </div>
                                <div class="study_show"></div>

                                <div class="form-group" style="margin-top:50px">

                                    <input type="submit" class="btn btn-success" value="Update">

                                </div>


                            </form>


                        <table>
                            <thead>
                              <tr>
                                <th class='related' width='400px'>Title</th>
                                <th class='related'>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($single_studies as $single_study)

                                    <tr style="text-align:center">
                                      <td class='related'>{{ $single_study->post_title }}</td>
                                      <td class='related'>
                                          <a class="btn btn-success" onclick="single_study({{ $single_study->id }})"><i class="fa fa-edit"></i></a>
                                          <a class="btn btn-danger delete"  onclick=""><i class="fa fa-trash"></i></a>
                                      </td>
                                    </tr>

                                @endforeach
                                  
                            </tbody>
                        </table>
                        

                    </section>



                    <h3>Directory</h3>
                    <section>
                        <h3> Add Directory </h3>
                        <form  method="post" action="{{ url('admin/DirectoryUpdate') }}"  enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @if(session()->has('directory_msg'))
                                <div class="alert alert-success">
                                    {{ session()->get('directory_msg') }}
                                </div>
                            @endif
                            <input type="hidden" name="old_directorydetail_id" id="old_directorydetail_id" value="">
                            <select class="form-control" name="directory_collection_list" id="directory_collection_list" required>
                                <option value="">Select Collection</option>
                                <?php if(isset($allcollections)){ ?>
                                @foreach($allcollections as $c)
                                <option value="{{ $c->id }}">
                                    {{ $c->title }}
                                </option>
                                @endforeach
                                <?php } ?>
                            </select> 
                            <br>
                            @if ($errors->has('directory_collection_list'))
                            
                                <div class="alert-error">{{ $errors->first('directory_collection_list') }}</div>
                            <br>
                            @endif
                            
                            <select class="form-control" name="directory_dataset_list" id="directory_dataset_list" required>
                                <option value="">Select Datasets</option>
                                <?php if(isset($alldatasets)){ ?>
                                @foreach($alldatasets as $dl)
                                <option value="{{ $dl->id }}">
                                    {{ $dl->dataset_title }}
                                </option>
                                @endforeach
                                <?php } ?>
                            </select> 
                            @if ($errors->has('directory_dataset_list'))
                            <br>
                                <div class="alert-error">{{ $errors->first('directory_dataset_list') }}</div>
                            @endif
                            
                            <div class="directory_section">
                                <div class="form-group">

                                    <label for="title">Title :</label>
                                    <input type="text" class="form-control" name="directory_title0" id="directory_title0" required>
                                    @if ($errors->has('directory_title0'))
                                    <br><br>
                                        <div class="alert-error">{{ $errors->first('directory_title0') }}</div>
                                    @endif
                                </div> 

                                <div class="form-group">

                                    <label for="title">Add description :</label>
                                    <textarea name="directory_textarea_data0" id="directory_description"  cols="30" rows="10"></textarea>
                                    <input type="file" name="directory_textarea_file0" id="directory_file" class="hidden" onchange="" style="visibility:hidden">
                                    @if ($errors->has('directory_textarea_data0'))
                                    <br><br>
                                        <div class="alert-error">{{ $errors->first('directory_textarea_data0') }}</div>
                                    @endif
                                </div> 
                            </div>
                            <div class="directory_show"></div>

                            <div class="form-group" style="margin-top:50px">

                                <input type="submit" class="btn btn-success" value="Update">

                            </div>


                        </form>
                        
                        
                        <table>
                            <thead>
                              <tr>
                                <th class='related' width='400px'>Title</th>
                                <th class='related'>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($single_directories as $single_directory)

                                    <tr style="text-align:center">
                                      <td class='related'>{{ $single_directory->post_title }}</td>
                                      <td class='related'>
                                          <a class="btn btn-success" onclick="single_directories({{ $single_directory->id }})"><i class="fa fa-edit"></i></a>
                                          <a class="btn btn-danger delete"  onclick=""><i class="fa fa-trash"></i></a>
                                      </td>
                                    </tr>

                                @endforeach
                                  
                            </tbody>
                        </table>
                    </section>
                </div>
                </form>

            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>



@section('footer_js_scrip_area')

@parent

<script src="{{ asset('project/backend/js/steps.js') }}"></script>

<script type="text/javascript">      
    
    var checkSteps  =   $("#example-basic").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        autoFocus: true,
        stepsOrientation: "vertical",
        startIndex: <?php echo (($step_index =   session()->get('step_index')) ? session()->get('step_index'):0) ?>,
        labels:
                {
                    next: "Save",
                    finish: "Save",
                },

        onStepChanging: function (event, newIndex, priorIndex)
        {

            return true;

        },
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        autoFocus: true,
        stepsOrientation: "vertical",

        labels:
        {
            next: "next",
        },

        onStepChanging: function (event, newIndex, priorIndex)
        {

            console.log("Index");
            console.log(newIndex);
            return true;

        },

    });
    
</script>
<style>
    body{ position: relative; }
    .wizard > .steps > ul > li{
        width: 20% !important
    }

    .wizard > .content > .body input{
        display: inline !important
    }
    .radio_style{
        background-color: #fff; padding: 10px
    }
    .wizard > .steps .current a, .wizard > .steps .current a:hover, .wizard > .steps .current a:active{
        width: 200px
    }
    .wizard > .steps .done a, .wizard > .steps .done a:hover, .wizard > .steps .done a:active{
        width: 200px
    }
    .wizard ul, .tabcontrol ul{
        margin-top: 40px !important;
    }
    .wizard > .steps .disabled a, .wizard > .steps .disabled a:hover, .wizard > .steps .disabled a:active{
        width:200px
    }
    .wizard > .content > .body{
        position: relative !important;
    }
</style>
<link href="{{ asset('project/backend/css/normalize.css') }}" rel="stylesheet" type="text/css">		
<link href="{{ asset('project/backend/css/jquery.steps.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('project/backend/css/main.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('project/backend/js/tinymce.min.js') }}"></script>
<script src="{{ asset('project/backend/js/rich_editor.js') }}"></script>
<script>

    // metarial add more button 
    var count = 1;
    $("#add").click(function () {
        var html = "<div class='form-group div" + count + "'><label for='title'>File title :</label><input type='text' name='metarial_title" + count + "' class='form-control'></div><div class='form-group div" + count + "'> <label for='title'>Browse file :</label><input type='file' class='form-control' name='metarial_file" + count + "'> </div><span class='btn btn-danger  div" + count + "' onclick=foo('" + count + "')>-</span><br><br></div>";
        $("#addresses").append(html);

        count++;
    });


    function foo(which) {
        $(".div" + which).hide();
    }


    // study description

    var study = 1;
    $("#add_study").click(function () {
        tinymce.init({
            selector: 'textarea'
        });
        var study_data = "<div class='form-group'><label for='title'>File title :</label><input type='text' name='study_title" + study + "' class='form-control'></div><textarea name='study_textarea_data" + study + "' cols='30' rows='10'></textarea><input type='file' name='study_textarea_file" + study + "' id='study_file' class='hidden' onchange='' style='visibility:hidden'> <br>";

        $(".study_show").prepend(study_data);
        reloadTextareaEditor();
        function reloadTextareaEditor() {
            $(document).ready(function () {
                tinymce.init({
                    selector: "textarea",
                    mode: "specific_textareas",
                    editor_selector: "mceEditor",
                    theme: "modern",
                    paste_data_images: true,
                    plugins: [
                        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                        "searchreplace wordcount visualblocks visualchars code fullscreen",
                        "insertdatetime media nonbreaking save table contextmenu directionality",
                        "emoticons template paste textcolor colorpicker textpattern"
                    ],
                    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
                    toolbar2: "print preview media | forecolor backcolor emoticons",
                    image_advtab: true,
                    file_picker_callback: function (callback, value, meta) {
                        if (meta.filetype == 'image') {
                            $('#upload').trigger('click');
                            $('#upload').on('change', function () {
                                var file = this.files[0];
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    callback(e.target.result, {
                                        alt: ''
                                    });
                                };
                                reader.readAsDataURL(file);
                            });
                        }
                    },
                    templates: [{
                            title: 'Test template 1',
                            content: 'Test 1'
                        }, {
                            title: 'Test template 2',
                            content: 'Test 2'
                        }]
                });
            });
        }

        study++;
    });


    function study_foo(which) {
        $(".div" + which).remove();
    }


    // directory part

    var directory = 1;

    $("#add_directory").click(function () {

        tinymce.init({
            selector: 'textarea'
        });
        
        var directory_data = "<div class='form-group'><label for='title'>File title :</label><input type='text' class='form-control' name='directory_title" + directory + "'></div><textarea name='directory_textarea_data" + directory + "' cols='30' rows='10'></textarea><input type='file' name='directory_textarea_file" + directory + "' id='study_file' class='hidden' onchange='' style='visibility:hidden'> <br>";

        $(".directory_show").append(directory_data);

        reloadTextareaEditor();

        function reloadTextareaEditor() {
            $(document).ready(function () {
                tinymce.init({
                    selector: "textarea",
                    mode: "specific_textareas",
                    editor_selector: "mceEditor",
                    theme: "modern",
                    paste_data_images: true,
                    plugins: [
                        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                        "searchreplace wordcount visualblocks visualchars code fullscreen",
                        "insertdatetime media nonbreaking save table contextmenu directionality",
                        "emoticons template paste textcolor colorpicker textpattern"
                    ],
                    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
                    toolbar2: "print preview media | forecolor backcolor emoticons",
                    image_advtab: true,
                    file_picker_callback: function (callback, value, meta) {
                        if (meta.filetype == 'image') {
                            $('#upload').trigger('click');
                            $('#upload').on('change', function () {
                                var file = this.files[0];
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    callback(e.target.result, {
                                        alt: ''
                                    });
                                };
                                reader.readAsDataURL(file);
                            });
                        }
                    },
                    templates: [{
                            title: 'Test template 1',
                            content: 'Test 1'
                        }, {
                            title: 'Test template 2',
                            content: 'Test 2'
                        }]
                });
            });
        }
        directory++;

    });


    function directory_hide(which) {
        $(".div" + which).remove();
    }


    // single_dataset viewfor edit
    
    function single_dataset(id){
        
        $.ajax({
            type:"GET",
            url:"dataset/"+id,
            dataType:"JSON",
            success:function(response){
                 console.log(response);
                $("#DatasetTitle").val(response.dataset_title);
                $("#DatasetReference").val(response.ref_id);
                $("#DatasetCountry").val(response.country);
                $("#DatasetYear").val(response.year);
                $("#DatasetProducers").val(response.producers);
                $("#DatasetSponsor").val(response.sponsor);
                $("#DatasetCollection").val(response.collection);
                $("#DatasetUser").val(response.use_type);
                $("#DatasetCountry").val(response.country);
                $("#DatasetCreated").val(response.entry_time);
                $("#collection_list_for_dataset").val(response.collection_id);
                $("#old_dataset_id").val(response.id);
                if(response.use_type == "public")
                {
                    $("#DatasetUser1").attr('checked','checked');
                }
                else
                {
                    $("#DatasetUser2").attr("checked","checked");
                }
                
            },error: function (request, status, error) {
                console.log(error);
            }
        })
   }




    function single_metarial(id){
        
        $.ajax({
            type:"GET",
            url:"metarial/"+id,
            dataType:"JSON",
            success:function(response){
               
               $("#metarial_title0").val(response.post_title);
               $("#old_dbcollectionsdetail_id").val(response.id);
               //$("#metarial_file0").val(response.fileoriginalname);
               $("#collection_list option[value="+response.collection_id+"]").attr('selected','selected');
               $("#dataset_list option[value="+response.dataset_id+"]").attr('selected','selected');
               $("#dataset_metarials option[value="+response.post_subtype_id+"]").attr('selected','selected');
               
            },error: function (request, status, error) {
                console.log(error);
            }
        })
        
    }
    
    
    function single_study(id){
        
        $.ajax({
            type:"GET",
            url:"study/"+id,
            dataType:"JSON",
            success:function(response){
                
               $("#old_studydetail_id").val(response.id);
               $("#study_title").val(response.post_title);
               $("#study_collection_list option[value="+response.collection_id+"]").attr('selected','selected');
               $("#study_dataset_list option[value="+response.dataset_id+"]").attr('selected','selected');
               
            },error: function (request, status, error) {
                console.log(error);
            }
        })
    }
 
 
     
    function single_directories(id){
        
        $.ajax({
            type:"GET",
            url:"directory/"+id,
            dataType:"JSON",
            success:function(response){
               
               $("#old_directorydetail_id").val(response.id);
               $("#directory_title0").val(response.post_title);
               $("#directory_description").val(response.post_description);
               $("#directory_collection_list option[value="+response.collection_id+"]").attr('selected','selected');
               $("#directory_dataset_list option[value="+response.dataset_id+"]").attr('selected','selected');
               
            },error: function (request, status, error) {
                console.log(error);
            }
        })
    }

</script>    

@endsection
@endsection
