@extends('layouts.admin')

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <h1>All Posts</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Posts</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">

            <div class="col-xs-12">

                @include('includes.admin.success_msg_block')

                <div class="page-header">
                    <a href="{{ route('post_add') }}" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add Post</a>
                </div>

                <div class="box">
                    <div class="box-header">

                        <h3 class="box-title">All Posts</h3>

                        <div class="box-tools">
                            <div class="input-group" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>

                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $key)
                                <tr>
                                    <th scope="row">{{ $key->id }}</th>
                                    <td>{{ $key->title }}</td>
                                    <td>{{ $key->description }}</td>
                                    <td><a href="{{route('post_edit',$key->id)}}" type="button" class="btn btn-success btn-xs">Edit</a>
                                    <td>
                                        <a href="{{route('post.destroy',$key->id)}}" type="button" class="btn btn-danger btn-xs">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div><!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            <li><a href="#">&laquo;</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div><!-- /.box -->
            </div>
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


@stop
