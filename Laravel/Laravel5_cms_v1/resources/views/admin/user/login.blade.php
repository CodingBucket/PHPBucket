@extends('layouts.admin_login')

@section('title')
    Admin Login!
@endsection

@section('content')

    <div class="login-box">

        <div class="login-logo">
            <a href="#"><b>Laravel 5 CMS</b></a>
        </div>

        <div class="login-box-body">

            @include('includes.message-block')

            <p class="login-box-msg">Sign in to admin panel</p>

            <form action="{{ route('login') }}" method="post">

                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                    <input class="form-control" type="text" name="email" id="email" value="{{ Request::old('email') }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input class="form-control" type="password" name="password" id="password" value="{{ Request::old('password') }}">

                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <input type="hidden" name="_token" value="{{ Session::token() }}">

                <div class="row">

                    <div class="col-xs-8"></div>

                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>

                </div>

            </form>

            <!-- <a href="#">I forgot my password</a><br> -->

        </div>
    </div>

@endsection
