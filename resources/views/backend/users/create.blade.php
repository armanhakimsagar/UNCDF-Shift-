<!--Extends parent app template-->
@extends('backend.layout.app')

<!--Content insert section-->
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            User
            <small>User Create</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">User</a></li>
            <li class="active">User Create</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        @include('backend/pertial/operation_message')
                        <div class="pull-right add_edit_delete_link">
                            <a href="#">
                                <span class="fa fa-plus add_link"></span>
                            </a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form method="post" action="{{ url('admin/users')}}" enctype="multipart/form-data">
                            {{ csrf_field()}}
                            <div class="form-group">
                                <label class=" required" for="name">Name</label>
                                @if ($errors->has('name'))
                                    <div class="alert-error">{{ $errors->first('name') }}</div>
                                @endif
                                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                            </div>
                            <div class="form-group">
                                <label class=" required" for="email">Email</label>
                                @if ($errors->has('email'))
                                    <div class="alert-error">{{ $errors->first('email') }}</div>
                                @endif
                                <input type="email" class="form-control" id="emal" placeholder="Enter email" name="email">
                            </div>
                            <div class="form-group">
                                <label class=" required" for="password">Password</label>
                                @if ($errors->has('password'))
                                    <div class="alert-error">{{ $errors->first('password') }}</div>
                                @endif
                                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                            </div>
                            <div class="form-group">
                                <label class=" required" for="name">Roles</label>
                                @if ($errors->has('roles'))
                                    <div class="alert-error">{{ $errors->first('roles') }}</div>
                                @endif
                                <select class="form-control" id="roles" name="roles[]" multiple="multiple">
                                    @foreach($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Profile Image</label>
                                <input type="file" name="profile_image" >
                            </div>
                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection