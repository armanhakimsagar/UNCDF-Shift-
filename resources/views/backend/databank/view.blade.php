<!--Extends parent app template-->
@extends('backend.layout.app')

<!--Content insert section-->
@section('content')




<!-- Main component for a primary marketing message or call to action -->
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

        <a href="{{ url('admin/databankform') }}" class="btn btn-success" style="float: right;">Create Databank <i class="fa fa-plus"></i></a>

    </section>
    <br><br>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">

            <div class="col-lg-12 col-xs-12">
                
                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($collections as $collection)
                        <tr>
                            <td scope="col">{{ $collection->title }}</td>
                            <td scope="col"><img src="{{ asset('project/backend/databank/thumbsnail/'.$collection->image_path) }}" width="50px"></td>
                            <td scope="col">
                                <a href="{{ url('admin/DatasetEdit/'.$collection->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-danger delete" href=""><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>




            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="{{ asset('project/backend/js/sweetalert.min.js')}}"></script>
<link rel="stylesheet" href="{{ asset('project/backend/css/sweetalert.css')}}">



<script>
    $('.delete').click(function (e) {
        e.preventDefault(); // Prevent the href from redirecting directly
        var linkURL = $(this).attr("href");
        warnBeforeRedirect(linkURL);
    });

    function warnBeforeRedirect(linkURL) {
        swal({
            title: "Sure want to delete?",
            text: "If you click 'OK' file will be deleted",
            type: "warning",
            showCancelButton: true,
            cancelButtonText: "Cancel",
            confirmButtonText: "Confirm"
        }, function () {
            // Redirect the user | linkURL is href url
            window.location.href = linkURL;
        });
    }
</script>
<!-- datatables links -->

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>

@endsection