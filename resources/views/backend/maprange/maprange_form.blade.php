<!--Extends parent app template-->
@extends('backend.layout.app')

<!--Content insert section-->
@section('content')
<!-- Main component for a primary marketing message or call to action -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Map Range
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

      
      <form action="{{ url('admin/map_color_range_data_insert') }}" method="post" enctype="multipart/form-data">
      @include('../backend/pertial/operation_message')
      {{ csrf_field() }}
      @if(session()->has('message'))
          <div class="alert alert-success">
        {{ session()->get('message') }}
          </div>
      @endif
      <div class="form-group">
        <label for="from">From:</label>
        <input required type="text" class="form-control" id="from" placeholder="Enter From" name="from">
        @if ($errors->has('title'))
        <br>
            <div class="alert-error">{{ $errors->first('from') }}</div>
        @endif
      </div>
      <div class="form-group">
        <label for="to">To:</label>
        <input required type="int" class="form-control" id="to" placeholder="Enter To" name="to">
        @if ($errors->has('topic'))
        <br>
            <div class="alert-error">{{ $errors->first('to') }}</div>
        @endif
      </div>
      
      <div class="form-group">
        <label for="color">Color Code: </label>
        <input required type="text" class="form-control" id="to" placeholder="Enter Color Code" name="color" > 
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


@endsection