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


                <form action="{{ route('ResearchValidation') }}" method="post" enctype="multipart/form-data">
                    @include('../backend/pertial/operation_message')
                    {{ csrf_field() }}
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @endif
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title">
                        @if ($errors->has('title'))
                        <br>
                        <div class="alert-error">{{ $errors->first('title') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="category">Category:</label>

                        <select class="form-control" name="category">

                            @foreach($Category_data as $data)
                            <option value="{{ $data->id }}">
                                {{ $data->category_name }}
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
                        <textarea name="textarea_data" id="textarea_data" cols="30" rows="10"></textarea>

                        <input name="rich_editor_file" type="file" id="upload" class="hidden" onchange="">

                    </div>

                    <div class="form-group">
                        <label for="category">Short Description:</label>
                        <input type="text" name="short_description" class="form-control">
                        @if ($errors->has('short_description'))
                        <br>
                        <div class="alert-error">{{ $errors->first('short_description') }}</div>
                        @endif
                    </div>  


                    <div class="form-group">
                        <label for="status">Satus:</label>
                        Free : <input type="radio" name="status" value="1">
                        Paid : <input type="radio" name="status" value="2">

                        @if ($errors->has('status'))
                        <br>
                        <div class="alert-error">{{ $errors->first('status') }}</div>
                        @endif

                    </div> 





                    <div class="form-group">
                        <label for="short_tag">Short Tag:</label>
                        <input type="text" class="form-control" id="short_tag" name="short_tag">
                        @if ($errors->has('short_tag'))
                        <br>
                        <div class="alert-error">{{ $errors->first('short_tag') }}</div>
                        @endif
                    </div>


                    <div class="form-group">
                        <label for="short_tag">Related Files: ( Optional )</label>
                        <input type="file" class="form-control" name="files[]" placeholder="address" multiple> <small> ( Formant :  PDF | Docs ) </small>
                        @if ($errors->has('files'))
                        <br><br>
                        <div class="alert-error">{{ $errors->first('files') }}</div>
                        @endif
                    </div>


                    <div class="form-group">
                        <label for="short_tag">Related Audio Files: ( Optional )</label>
                        <input type="file" class="form-control" name="audios[]" placeholder="address" multiple> <small>  ( Formant : Mp3 | Wav ) </small>
                        @if ($errors->has('audios'))
                        <br><br>
                        <div class="alert-error">{{ $errors->first('audios') }}</div>
                        @endif
                    </div>



                    <div class="form-group">
                        <label for="short_tag">Related Video Files: ( Optional )</label>
                        <input type="file" class="form-control" name="videos[]" placeholder="address" multiple> <small>  ( Formant : Mp4 | Wav ) </small>
                        @if ($errors->has('videos'))
                        <br><br>
                        <div class="alert-error">{{ $errors->first('videos') }}</div>
                        @endif
                    </div>



                    <div class="form-group box_style">

                        <label for="training_video">Research Youtube Video Link  ( Optional ) :</label> 
                        <input placeholder="Give here youtube link" name="research_youtube" type="text" id="training_youtube" class="form-control">

                    </div>


                    <div class="form-group">
                        <label for="cover_image">Thumbnail Image:</label>
                        <input type="file" class="form-control" id="cover_image" name="cover_image">
                        @if ($errors->has('cover_image'))
                        <br>
                        <div class="alert-error">{{ $errors->first('cover_image') }}</div>
                        @endif
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

</script>

@endsection
@endsection