<!--Extends parent app template-->
@extends('backend.layout.app')

<!--Content insert section-->
@section('content')
<!-- Main component for a primary marketing message or call to action -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            General Post
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

                <form action="{{ url('admin/general_post_data_update') }}" method="post" enctype="multipart/form-data">

                    @include('../backend/pertial/operation_message')
                    {{ csrf_field() }}
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @endif

                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title" value="{{ $post_data->title }}">
                        @if ($errors->has('title'))
                        <br>
                        <div class="alert-error">{{ $errors->first('title') }}</div>
                        @endif
                    </div>




                    <div class="form-group">
                        <label for="short_description">Short Description:</label>
                        <input type="text" name="short_description" class="form-control" value="{{ $post_data->short_description }}">
                    </div>  

                     <div class="form-group">
                        <label for="category">Description:</label>
                        <textarea name="textarea_data" id="textarea_data" cols="30" rows="10">
                        {{ $post_data->textarea_data }}
                        </textarea>

                        <input name="rich_editor_file" type="file" id="upload" class="hidden" onchange="">
                        @if ($errors->has('textarea_data'))
                        <br>
                        <div class="alert-error">{{ $errors->first('textarea_data') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="chart_query_method">Chart Query Method:</label>
                        <input type="text" name="chart_query_method" class="form-control" value="{{ $post_data->chart_query_method }}">
                    </div>  

                    <div class="form-group">
                        <label for="post_type">Post Type:</label>

                        <select class="form-control" name="post_type">

                            @foreach($post_types as $p_type)
                            <option value="{{ $p_type->id }}"
                                    @if ($p_type->id == $post_data->post_type)
                                    selected
                                    @endif 
                                    >
                                    {{ $p_type->name }}
                        </option>
                        @endforeach

                        </select>

                        @if ($errors->has('post_type'))
                        <br>
                        <div class="alert-error">{{ $errors->first('post_type') }}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="chart_id">Chart ID :</label>
                        <input type="text" name="chart_id" class="form-control" value="{{ $post_data->chart_id }}">
                    </div>  
                    <input name="post_edit_id" value="{{ $post_data->id }}" type="hidden" required />
                
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