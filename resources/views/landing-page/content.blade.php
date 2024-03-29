@extends('landing-page.welcome')

@section('content')

<div class="container">

    <section class="intro-header">
        <div class="intro-message">
            <h1>Landing Page</h1>
            <h3>Login / Register</h3>
            <hr class="intro-divider">
            <ul class="list-inline intro-social-buttons">
                <li class="list-inline-item">
                    <a href="{{url('/admin/login')}}" class="btn btn-secondary btn-lg">
                        <i class="fa fa-twitter fa-fw"></i>
                        <span class="network-name">Admin</span>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="{{url('/company/login')}}" class="btn btn-secondary btn-lg">
                        <i class="fa fa-github fa-fw"></i>
                        <span class="network-name">Company</span>
                    </a>
                </li>
            </ul>
        </div>
    </section>

    <section class="content-section-a" id="about">
        <div class="row">
            <div class="col-lg-5 ml-auto">
                <hr class="section-heading-spacer">
                <div class="clearfix"></div>
                <h2 class="section-heading">Death to the Stock Photo:<br>Special Thanks</h2>
                <p class="lead">A special thanks to
                    <a target="_blank" href="http://join.deathtothestockphoto.com/">Death to the Stock Photo</a>
                    for providing the photographs that you see in this template. Visit their website to become a member.</p>
            </div>
            <div class="col-lg-5 mr-auto">
                <img class="img-fluid" src="{{asset('assets/img/ipad.png')}}" alt="">
            </div>
        </div>
    </section>

    <section class="content-section-b" id="services">
        <div class="row">
            <div class="col-lg-5 mr-auto order-lg-2">
                <hr class="section-heading-spacer">
                <div class="clearfix"></div>
                <h2 class="section-heading">3D Device Mockups<br>by PSDCovers</h2>
                <p class="lead">Turn your 2D designs into high quality, 3D product shots in seconds using free Photoshop actions by
                    <a target="_blank" href="http://www.psdcovers.com/">PSDCovers</a>! Visit their website to download some of their awesome, free photoshop actions!</p>
            </div>
            <div class="col-lg-5 ml-auto order-lg-1">
                <img class="img-fluid" src="{{asset('assets/img/dog.png')}}" alt="">
            </div>
        </div>
    </section>

    <section class="content-section-a" id="contact">
        <div class="row">
            <div class="col-lg-5 ml-auto">
                <hr class="section-heading-spacer">
                <div class="clearfix"></div>
                <h2 class="section-heading">Google Web Fonts and<br>Font Awesome Icons</h2>
                <p class="lead">This template features the 'Lato' font, part of the
                    <a target="_blank" href="http://www.google.com/fonts">Google Web Font library</a>, as well as
                    <a target="_blank" href="http://fontawesome.io">icons from Font Awesome</a>.</p>
            </div>
            <div class="col-lg-5 mr-auto ">
                <img class="img-fluid" src="{{asset('assets/img/phones.png')}}" alt="">
            </div>
        </div>
    </section>
</div>
@endsection
