<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>James</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css">

    <!-- Custom Styles -->
    <link href="{{asset('assets/welcome.css')}}" rel="stylesheet">
</head>
<body>

<!-- Navigation -->
<header>
    @include('includes.navigation')
</header>

@yield('content')

{{--
<!-- Header -->
<section class="intro-header">
    @yield('main-page.bigPicture')
</section>

<!-- Page Content -->
<section class="content-section-a">
    @yield('main-page.firstSection')
</section>


<section class="content-section-b">
    @yield('main-page.secondSection')
</section>


<section class="content-section-a">
    @yield('main-page.thirdSection')
</section>
--}}


<!-- Footer -->
<footer>
    @include('includes.footer')
</footer>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<!-- Bootstrap Core JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
