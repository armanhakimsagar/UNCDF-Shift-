<!--Extends parent app template-->
@extends('backend.layout.app')

<!--Content insert section-->
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Role
            <small>Role Edit</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Role</a></li>
            <li class="active">Role Edit</li>
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
                        <form method="post" action="{{ url('admin/roles/'.$role->id) }}">
                            <input type="hidden" name="_method" value="PUT">
                            {{ csrf_field()}}
                            <div class="form-group">
                                <label class=" required" for="name">Name</label>
                                @if ($errors->has('name'))
                                    <div class="alert-error">{{ $errors->first('name') }}</div>
                                @endif
                                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ old('name', isset($role->name) ? $role->name:'') }}">
                            </div>
                            <div class="form-group">
                                <label class=" required" for="name">Permission</label>
                                @if ($errors->has('permission'))
                                    <div class="alert-error">{{ $errors->first('permission') }}</div>
                                @endif
                                <select class="form-control" id="permission" name="permission[]" multiple="multiple">
                                    @foreach($permissions as $permission)
                                    <option value="{{ $permission->name }}"
                                            <?php if(is_array(old('permission')) && in_array($permission->name, old('permission')) || in_array($permission->name, $role->permissions()->pluck('name', 'name')->all())){ ?> selected <?php } ?>
                                            >{{ $permission->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Udate</button>
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