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

      
      <form action="{{ url('admin/general_post_data_insert') }}" method="post" enctype="multipart/form-data">
      @include('../backend/pertial/operation_message')
      {{ csrf_field() }}
      @if(session()->has('message'))
          <div class="alert alert-success">
        {{ session()->get('message') }}
          </div>
      @endif
      
      
      <div class="form-group">
        <label for="title">Title: </label>
        <input required type="text" class="form-control"  placeholder="Enter Title" name="title" > 
      </div>

      <div class="form-group">
        <label for="short_description">Short Description: </label>
        <input required type="textarea" class="form-control"  placeholder="Enter Short description" name="short_description" > 
      </div>

      <div class="form-group">
        <label for="description"> Description: </label>
         <textarea name="textarea_data" id="textarea_data" cols="30" rows="10"></textarea>
         <input name="rich_editor_file" type="file" id="upload" class="hidden" onchange="">

      </div>

       <div class="form-group">
        <label for="chart_query_method"> Chart Query Method: </label>
        <input required type="text" class="form-control"  placeholder="Enter  Chart Query Method" name="chart_query_method" > 
      </div>

      <div class="form-group">
        <label for="post_type"> Post Type : </label>
        <select name="post_type" class="form-control" id ="post_type">
              <option value="">Select</option>
              @foreach($categories as $categorie)
                <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
               @endforeach                                   
        </select>



      </div>

      <div class="form-group">
        <label for="chart_id"> Chart ID: </label>
        <input required type="text" class="form-control"  placeholder="Enter  Chart Id" name="chart_id" > 
      </div>

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

@endsection
@endsection