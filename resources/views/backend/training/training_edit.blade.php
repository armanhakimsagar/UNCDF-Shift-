<!--Extends parent app template-->
@extends('backend.layout.app')

<!--Content insert section-->
@section('content')
<!-- Main component for a primary marketing message or call to action -->
<style type="text/css">
    .box_style{
        background-color: #fff;
        display: block;
        padding: 10px;
        border: 1px solid #ccc
    }
    .button_style{
        margin-bottom: 10px;
        background-color: #fff;
        border: 1px solid #ccc;
        color: #000
    }
</style>


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


                <form action="{{ url('admin/training_update') }}" method="post" enctype="multipart/form-data">

                    @include('../backend/pertial/operation_message')
                    {{ csrf_field() }}

                    <br>

                    Title : 
                    <input type="text" name="title" class="form-control" value="{{ $training_edit->title }}">

                    <br>

                    @if ($errors->has('title'))

                    <div class="alert-error">{{ $errors->first('title') }}</div>

                    @endif

                    Category : 
                    <select name="category_id" class="form-control" required>
                        <option value="">Select a static category</option>
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>


                    <input type="hidden" name="old_id" value="{{ $training_edit->id }}">


                    <div class="form-group">
                        <label for="Overview">Overview:</label>
                        <textarea name="textarea_data" id="textarea_data" cols="30" rows="10">
            {{ $training_edit->textarea_data }}
                        </textarea>

                        <input name="rich_editor_file" type="file" id="upload" class="hidden" onchange="">

                    </div>


                    <div class="form-group">
                        <label for="Overview">Short Description:</label>
                        <input type="text" name="short_description" class="form-control" value="{{ $training_edit->short_description }}">
                        @if ($errors->has('target_show'))
                        <br>
                        <div class="alert-error">{{ $errors->first('target_show') }}</div>
                        @endif
                    </div>



                    <div class="form-group box_style">

                        <label for="target_audience">Free :</label> <input name="paid" type="radio" id="free" value="No" 
                            @if($training_edit->paid == "No") 
                            checked 
                            @endif>
                            <label for="target_audience">Paid :</label> <input name="paid" type="radio" id="paid" value="Yes" 
                            @if($training_edit->paid == "Yes") 
                            checked 
                            @endif>
                            @if ($errors->has('paid'))
                            <br>
                        <div class="alert-error">{{ $errors->first('paid') }}</div>
                        @endif
                    </div>

                    


                    <button type="button" class="btn btn-success button_style" style="background-color: #fff">

                        <img src="{{ asset('project/backend/training/cover_image/'.$training_edit->cover_image) }}" height="100px">



                    </button>

                    <div class="form-group box_style">

                        <label for="Internal">Cover Image :</label> 
                        <input name="cover_image" type="file" id="cover_image">

                    </div>




                                  
                    
                    
                     <div class="form-group box_style">

                        <label for="training_video">Training Youtube Video Link  ( Optional ) :</label>

                        @if($training_youtube != null)
                        @foreach($training_youtube as $youtube)

                            <input placeholder="Give here youtube link" name="training_youtube" type="text" id="training_youtube" value="{{ $youtube->file }}" class="form-control">

                        @endforeach
                        @else

                            <input placeholder="Give here youtube link" name="training_youtube" type="text" id="training_youtube" class="form-control">

                        @endif
                    </div>

                    
                    
                    @foreach($training_video as $v)


                    @if($v->file)

                    <button type="button" class="btn btn-success button_style" id="<?php echo $v->id ?>" onclick="delete_data_check({{$v -> id}});" >

                        <?php echo $v->file ?>

                        <img src="{{ asset('project/backend/research/icons/delete.png') }}" height="20px" style="cursor: pointer;">

                    </button>


                    @endif



                    @endforeach
                    @if ($errors->has('training_video'))
                    <br>
                    <div class="alert-error">{{ $errors->first('training_video') }}</div>
                    <br>
                    @endif
                    <div class="form-group box_style">

                        <label for="training_video">Training Video  ( Optional ) :</label> 
                        <input name="training_video[]" type="file" id="training_video" multiple>

                    </div>



                    @foreach($training_audio as $a)


                    @if($a->file)

                    <button type="button" class="btn btn-success button_style" id="<?php echo $a->id ?>"  onclick="delete_data_check({{$a -> id}});">

                        <?php echo $a->file ?>

                        <img src="{{ asset('project/backend/research/icons/delete.png') }}" height="20px" style="cursor: pointer;">

                    </button>


                    @endif



                    @endforeach
                    @if ($errors->has('training_audio'))
                    <br>
                    <div class="alert-error">{{ $errors->first('training_audio') }}</div>
                    <br>
                    @endif

                    <div class="form-group box_style">

                        <label for="training_audio">Training Audio  ( Optional ) :</label> 
                        <input name="training_audio[]" type="file" id="training_audio" multiple>

                    </div>







                    @foreach($training_file as $f)


                    @if($f->file)

                    <button type="button" class="btn btn-success button_style" id="<?php echo $f->id ?>" onclick="delete_data_check({{$f -> id}});" >

                        <?php echo $f->file ?>

                        <img src="{{ asset('project/backend/research/icons/delete.png') }}" height="20px" style="cursor: pointer;">

                    </button>


                    @endif



                    @endforeach

                    @if ($errors->has('training_file'))
                    <br>
                    <div class="alert-error">{{ $errors->first('training_file') }}</div>
                    <br>
                    @endif


                    <div class="form-group box_style">

                        <label for="training_file">Training File  ( Optional ) :</label> 
                        <input name="training_file[]" type="file" id="training_file" multiple>

                    </div>



                    <button type="submit" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-success">Update</button>
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

    $(function() {
        $("#datepicker,#datepicker1").datepicker({
        dateFormat:'yy-mm-dd'
    });
    });
        $("#target_audience").on('change', function()
    {
    if ($(this).is(':checked')){
        $("#target_show").show(1000);
    } else{
        $("#target_show").hide(1000);
    }
    });
        $("#series_yes").on('change', function()
    {
    if ($(this).is(':checked')){
        $("#datepicker1").show(1000);
        $("#datepicker").show(1000);
    }

    });
    $("#series_no").on('change', function()
    {
    if ($(this).is(':checked')){
        $("#datepicker1").hide(1000);
        $("#datepicker").hide(1000);
        $("#datepicker,#datepicker1").val('');
    }

    });
</script>
<script type="text/javascript">


    function delete_data_check(id) {
    swal({
    title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: true,
            cancelButtonText: "Cancel",
            confirmButtonText: "Confirm"
    }, function (isConfirm) {
    if (!isConfirm) return;
    $.ajax({
    type: "get",
            url: '../training_ajax_delete/' + id,
            success: function(msg) {
            $("#" + id).fadeOut(1000);
            },
            error: function () {
            alert('ok');
            }
    });
    });
    }


</script>

@endsection
@endsection