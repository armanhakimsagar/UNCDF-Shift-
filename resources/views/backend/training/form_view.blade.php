<!--Extends parent app template-->
@extends('backend.layout.app')

<!--Content insert section-->
@section('content')

<!-- Main component for a primary marketing message or call to action -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            TRAINING
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>


    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-12 col-xs-12">


                <form action="{{ url('admin/training_insert') }}" method="post" enctype="multipart/form-data">

                    @include('../backend/pertial/operation_message')
                    {{ csrf_field() }}

                    <br>

                    Title : 
                    <input type="text" name="title" class="form-control">

                    <br>

                    @if ($errors->has('title'))

                    <div class="alert-error">{{ $errors->first('title') }}</div>
                    <br>
                    @endif

                    Category : 
                    <select name="category_id" class="form-control">
                        <option value="">Select a static category</option>
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>


                    @if ($errors->has('category'))
                    <br>
                    <div class="alert-error">{{ $errors->first('category') }}</div>
                    <br>
                    @endif
                    
                    <br>
                    <div class="form-group">
                        <label for="Overview">Overview:</label>
                        <textarea name="textarea_data" id="textarea_data" cols="30" rows="10">
            
                        </textarea>

                        <input name="rich_editor_file" type="file" id="upload" class="hidden" onchange="">

                    </div>


                    <div class="form-group">
                        <label for="Overview">Short Description:</label>
                        <input type="text" name="short_description" class="form-control">

                    </div>

                    @if ($errors->has('short_description'))

                    <div class="alert-error">{{ $errors->first('short_description') }}</div>
                    <br>
                    @endif


                    <div class="form-group box_style">

                        <label for="target_audience">Free :</label> <input name="paid" type="radio" id="free" value="No">
                        <label for="target_audience">Paid :</label> <input name="paid" type="radio" id="paid" value="Yes">

                    </div>


                    @if ($errors->has('paid'))

                    <div class="alert-error">{{ $errors->first('paid') }}</div>
                    <br>
                    @endif

                    


                    <div class="form-group box_style">

                        <label for="Internal">Thumbnail Image :</label> 
                        <input name="cover_image" type="file" id="cover_image">

                    </div>


                    @if ($errors->has('cover_image'))

                    <div class="alert-error">{{ $errors->first('cover_image') }}</div>
                    <br>
                    @endif



                    <div class="form-group box_style">

                        <label for="training_video">Training Video  ( Optional ) :</label> 
                        <input name="training_video[]" type="file" id="training_video" multiple>

                    </div>
                    
                    <div class="form-group box_style">

                        <label for="training_video">Training Youtube Video Link  ( Optional ) :</label> 
                        <input placeholder="Give here youtube link" name="training_youtube" type="text" id="training_youtube" class="form-control">

                    </div>

                    <div class="form-group box_style">

                        <label for="training_audio">Training Audio  ( Optional ) :</label> 
                        <input name="training_audio[]" type="file" id="training_audio" multiple>

                    </div>


                    <div class="form-group box_style">

                        <label for="training_audio">Training Files  ( Optional ) :</label> 
                        <input name="training_file[]" type="file" id="training_file" multiple>

                    </div>





                    <button type="submit" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-success">Submit</button>
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
<!--rich editor js-->

<script src="{{ asset('project/backend/js/tinymce.min.js') }}"></script>
<script src="{{ asset('project/backend/js/rich_editor.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>

    $(function () {
        $("#datepicker,#datepicker1").datepicker({
            dateFormat: 'yy-mm-dd'
        });

    });

    $("#target_show").hide();
    $("#datepicker").hide();
    $("#datepicker1").hide();

    $("#target_audience").on('change', function ()
    {
        if ($(this).is(':checked')) {
            $("#target_show").show(1000);
        } else {
            $("#target_show").hide(1000);
        }
    });



    $("#series_yes").on('change', function ()
    {
        if ($(this).is(':checked')) {
            $("#datepicker1").show(1000);
            $("#datepicker").show(1000);
        }

    });
    $("#series_no").on('change', function ()
    {
        if ($(this).is(':checked')) {
            $("#datepicker1").hide(1000);
            $("#datepicker").hide(1000);
        }

    });

</script>

@endsection
@endsection