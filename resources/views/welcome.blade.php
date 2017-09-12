<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>James</title>

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Raleway:100,600">
  {{--  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    <!-- Custom Styles -->
    <link  rel="stylesheet" type="text/css" href="{{asset('assets/welcome.css')}}">
    {{--bootstrap--}}
    <link  type="text/css" href="{{asset('assets/bootstrap/bootstrap.css')}}" rel="stylesheet">
    <link  type="text/css" href="{{asset('assets/bootstrap/bootstrap-grid.css')}}" rel="stylesheet">
    <link  type="text/css" href="{{asset('assets/bootstrap/bootstrap-reboot.css')}}" rel="stylesheet">

</head>
<body>

<!-- Navigation -->
<header>
    @include('includes.navigation')
</header>

<div id="content">
    @yield('content')
</div>


<!-- Footer -->
<footer>
    @include('includes.footer')
</footer>

<!-- jQuery -->
<script src="{{asset('bower_components/bower_components/jquery/dist/jquery.min.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
