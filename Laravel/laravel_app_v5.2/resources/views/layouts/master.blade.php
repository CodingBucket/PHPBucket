<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Narrow Jumbotron Template for Bootstrap</title>

    <link href="{{ URL::to('src/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('src/css/jumbotron-narrow.css') }}" rel="stylesheet">

    <script src="{{ URL::to('src/js/bootstrap.min.js') }}"></script>

</head>

<body>

<div class="container">

    @include('includes.header')

    @yield('content')

    @include('includes.footer')

</div>

</body>
</html>
