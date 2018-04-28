<!--Extends parent app template-->
@extends('backend.layout.app')

<!--Content insert section-->
@section('content')
<!-- Main component for a primary marketing message or call to action -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Research
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

                <form action="{{ route('Research_Update') }}" method="post" enctype="multipart/form-data">

                    @include('../backend/pertial/operation_message')
                    {{ csrf_field() }}
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @endif

                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title" value="{{ $research_edit->title }}">
                        @if ($errors->has('title'))
                        <br>
                        <div class="alert-error">{{ $errors->first('title') }}</div>
                        @endif
                    </div>


                    <div class="form-group">
                        <label for="category">Category:</label>

                        <select class="form-control" name="category">

                            @foreach($Category_data as $cat)
                            <option value="{{ $cat->id }}"
                                    @if ($cat->id == $research_edit->category)
                                    selected
                                    @endif 
                                    >
                                    {{ $cat->category_name }}
                        </option>
                        @endforeach

                    </select>

                    @if ($errors->has('category'))
                    <br>
                    <div class="alert-error">{{ $errors->first('category') }}</div>
                    @endif
                    </div>


                <div class="form-group">
                    <label for="category">Description:</label>
                    <textarea name="textarea_data" id="textarea_data" cols="30" rows="10">
                    {{ $research_edit->textarea_data }}
                    </textarea>

                    <input name="rich_editor_file" type="file" id="upload" class="hidden" onchange="">
                    @if ($errors->has('textarea_data'))
                    <br>
                    <div class="alert-error">{{ $errors->first('textarea_data') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="category">Short Description:</label>
                    <input type="text" name="short_description" class="form-control" value="{{ $research_edit->short_description }}">
                </div>  


                <div class="form-group">
                    <label for="status">Status:</label>
                    Free : <input type="radio" name="status" value="1" 
                    @if ($research_edit->status == 1)
                    checked
                    @endif
                    >
                    Paid : <input type="radio" name="status" value="2"
                    @if ($research_edit->status == 2)
                    checked
                    @endif
                    >
                </div> 



                <div class="form-group">
                    <label for="short_tag">Short Tag:</label>
                    <input type="text" class="form-control" id="short_tag" name="short_tag" value="{{ $research_edit->short_tag }}">
                    @if ($errors->has('short_tag'))
                    <br>
                    <div class="alert-error">{{ $errors->first('short_tag') }}</div>
                    @endif
                </div>


                @foreach($Research_file as $files)

                @if($files->path)

                <button type="button" class="btn btn-success" id="{{ $files->id }}" onclick="delete_data_check({{ $files -> id }})">

                    {{ $files->path }}

                    <img src="{{ asset('project/backend/research/icons/delete.png') }}" height="20px" style="cursor: pointer;">

                </button>

                @else

                <button type="button" class="btn btn-success">

                    You have no file

                </button>


                @endif



                @endforeach

                @if ($errors->has('files'))
                <br>
                <br>
                <div class="alert-error">{{ $errors->first('files') }}</div>
                <br>

                @endif

                <div class="form-group">
                    <label for="short_tag">Related Files: ( Optional )</label>
                    <input type="file" class="form-control" name="files[]" placeholder="address" multiple> <small> ( Formant :  PDF | Docs ) </small>
                </div>





                @foreach($Research_audio as $audio)

                @if($audio->path)

                <button type="button" id="<?php echo $audio->id ?>" class="btn btn-success" onclick="delete_data_check({{ $audio -> id }});">

                    <?php echo $audio->path ?>

                    <img src="{{ asset('project/backend/research/icons/delete.png') }}" height="20px" style="cursor: pointer;">

                </button>

                @else

                <button type="button" class="btn btn-success">

                    You have no file

                </button>


                @endif



                @endforeach

                @if ($errors->has('audio'))
                <br>
                <br>
                <div class="alert-error">{{ $errors->first('audio') }}</div>
                <br>

                @endif


                <div class="form-group">
                    <label for="short_tag">Related Audio Files: ( Optional )</label>
                    <input type="file" class="form-control" name="audio[]" placeholder="address" multiple> <small>  ( Formant : Mp3 | Wav ) </small>
                </div>




                @foreach($Research_video as $video)
                
                
                
                @if($video->path)

                <button type="button" class="btn btn-success" id="<?php echo $video->id ?>" onclick="delete_data_check({{ $video-> id }});" >

                    <?php echo $video->path ?>

                    <img src="{{ asset('project/backend/research/icons/delete.png') }}" height="20px" style="cursor: pointer;">

                </button>

                @else

                <button type="button" class="btn btn-success">

                    You have no file

                </button>


                @endif



                @endforeach



                <div class="form-group">
                    <label for="short_tag">Related Video Files: ( Optional )</label>
                    <input type="file" class="form-control" name="video[]" placeholder="address" multiple> <small>  ( Formant : Mp4 | Wav ) </small>
                </div>

                @if ($errors->has('video'))

                <div class="alert-error">{{ $errors->first('video') }}</div>
                <br>

                @endif


                <div class="form-group box_style">

                    <label for="training_video">Research Youtube Video Link  ( Optional ) :</label>
                    
                   
                    @if($Research_youtube != null)
                    @foreach($Research_youtube as $youtube)
                    
                        <input placeholder="Give here youtube link" name="research_youtube" type="text" id="training_youtube" value="{{ $youtube->path }}" class="form-control">
                    
                    @endforeach
                    @else
                      
                        <input placeholder="Give here youtube link" name="research_youtube" type="text" id="training_youtube" class="form-control">
                    
                    @endif
                </div>
                
                
                <button type="button" class="btn btn-success" height="100px" style="background-color: #fff">

                    <img src="{{ asset('project/backend/research/cover_image/'.$research_edit->cover_image) }}" height="100px">

                </button>



                <div class="form-group">
                    <label for="cover_image">Cover Image:</label>
                    <input type="file" class="form-control" id="cover_image" name="cover_image" value="{{ $research_edit->cover_image }}" >
                    @if ($errors->has('cover_image'))
                    <br>
                    <div class="alert-error">{{ $errors->first('cover_image') }}</div>
                    @endif
                </div>



                <input type="hidden" name="old_id" value="{{ $research_edit->id }}">

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

<script src="{{ asset('project/backend/js/sweetalert.min.js')}}"></script>
<link rel="stylesheet" href="{{ asset('project/backend/css/sweetalert.css')}}">
<script src="{{ asset('project/backend/js/tinymce.min.js') }}"></script>
<script src="{{ asset('project/backend/js/rich_editor.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">

                      document.getElementsByTagName("input").required = false;</script>

<script>
    $(function() {
    $("#datepicker,#datepicker1").datepicker({
    dateFormat:'yy-mm-dd'
    });
    });</script>
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
            url: '../research_ajax_delete/' + id,
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