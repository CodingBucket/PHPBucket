<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Laravel5 CMS</title>

        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        @include('includes.admin.styles')

    </head>

    <body class="hold-transition login-page">

        @yield('content')

        @include('includes.admin.scripts')

    </body>

</html>
