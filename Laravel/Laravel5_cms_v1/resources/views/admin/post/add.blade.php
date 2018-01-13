@extends('layouts.admin')

@section('content')

<div class="content-wrapper">

    <section class="content-header">

        <h1>Post Create Form</h1>

        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard')  }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Add Post</li>
        </ol>

    </section>

    <section class="content">
        <div class="row">

            <div class="col-md-12">

                <div class="box box-primary">

                    <div class="box-header with-border">
                        <h3 class="box-title">Add Post</h3>
                    </div>

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('post_store') }}" method="post">

                        <div class="box-body">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Title">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <input type="text" class="form-control" name="description" placeholder="Dscription">
                            </div>

                            <input type="hidden" name="_token" value="{{ Session::token() }}">

                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-default cancel">Cancel</button>
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </div>

                    </form>
                </div>


            </div>

        </div>
    </section>

</div>

@stop




