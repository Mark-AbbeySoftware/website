<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>Awesome Landing Page by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite([
     'resources/css/app.css',
     'resources/css/bootstrap.css',
     'resources/css/landing-page.css',
     'resources/css/pe-icon-7-stroke.css',
     'resources/js/app.js',
     ])
    @endif

    <!--     Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400,300' rel='stylesheet'
          type='text/css'>


</head>
<body class="landing-page landing-page2">
{{--
<nav class="navbar navbar-transparent navbar-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button id="menu-toggle" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
            <a href="http://www.creative-tim.com">
                <div class="logo-container">
                    <div class="logo">
                        <img src="{{ asset('build/img/new_logo.png') }}" alt="Creative Tim Logo">
                    </div>
                    <div class="brand">
                        Creative Tim
                    </div>
                </div>
            </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="example">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#">
                        <i class="fa fa-facebook-square"></i>
                        Like
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-twitter"></i>
                        Tweet
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-pinterest"></i>
                        Pin
                    </a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
</nav>
--}}
<div class="wrapper">
    <div class="parallax filter-gradient blue" data-color="blue">
        <div class="container">
            <div class="row">
                <div class="col-md-7  hidden-xs">
                    <div class="parallax-image">
                        <img src="{{asset('build/img/showcases/showcase-2/mac1.png')}}"/>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="description text-center">
                        <h2>Showcase 2 - Your webapp</h2>
                        <br>
                        <h5>This template was built closely to our current layout as of June 2016. You can download a
                            free demo below. Please share the webpage with others. Hope this template makes a good
                            preview of what we are building here!</h5>
                        <div class="buttons">
                            <a href="http://www.creative-tim.com/product/awesome-landing-page"
                               class="btn btn-fill btn-neutral">
                                <i class="fa fa-download"></i> Download
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section section-gray section-clients">
        <div class="container text-center">
            <h4 class="header-text">Happy Customers</h4>
            <p>
                Designing in Photoshop became a trend. Change, save, redo. Change, save, redo. After searching
                thoroughly for an alternative to create something great, it was clear that there weren’t any great
                solutions or intentions by anyone to create a pixel-perfect template for anyone to use. We don't do
                pixel-perfect, we focus on client-perfect projects.<br>
            </p>
            <div class="logos">
                <ul class="list-unstyled">
                    <li><img src="{{asset('build/img/logos/adobe.png')}}"/></li>
                    <li><img src="{{asset('build/img/logos/zendesk.png')}}"/></li>
                    <li><img src="{{asset('build/img/logos/ebay.png')}}"/></li>
                    <li><img src="{{asset('build/img/logos/evernote.png')}}"/></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="section section-presentation">
        <div class="container">
            <div class="row">
                <div class="col-md-5 hidden-xs">
                    <div class="description">
                        <h4 class="header-text">It's beautiful</h4>
                        <p>This pack is a demo of our latest product. You can download it and use it in any project of
                            yours. By downloading the resource with a Personal License you are granted the use of it
                            under the conditions featured in the above table. Ownership stays with Creative Tim, along
                            with the copyright holders and you must abide the following rights and restrictions. </p>
                        <p>Rights:
                        <p>
                        <ol>
                            <li>You have rights for royalty free use of our resources for your personal project.</li>
                            <li>You may modify the resources according to your requirements and use them royalty free
                                for your personal project. For example, you may include this resource in a website you
                                will be designing for you.
                            </li>
                            <li>You are not required to attribute or link to <a href="http://www.creative-tim.com">Creative
                                    Tim</a> in project.
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <img src="{{ asset('build/img/showcases/showcase-2/mac2.png') }}" style="margin-top:-50px"/>
                </div>
            </div>
        </div>
    </div>
    <div class="section section-demo">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="demo-image">
                        <img src="{{asset('build/img/showcase-2/examples/home_4.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-md-5 col-md-offset-1">
                    <h4 class="header-text">Beautiful colors</h4>
                    <p>
                        Each color has a strong pigment and was chosen to make your design shine. Each component from
                        our product can have one of these colors. Try on different combinations and be sure that
                        everything works together.
                    </p>
                    <p>
                        PSD Custom focuses on conveying the attention of your users to the important parts of the page
                        and the actions. While keeping a light feel, the colors give the page an extra push.
                    </p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-5">
                    <h4 class="header-text">Pixel Perfect</h4>
                    <p>
                        Each color has a strong pigment and was chosen to make your design shine. Each component from
                        our product can have one of these colors. Try on different combinations and be sure that
                        everything works together.
                    </p>
                    <p>
                        PSD Custom focuses on conveying the attention of your users to the important parts of the page
                        and the actions. While keeping a light feel, the colors give the page an extra push.
                    </p>
                </div>
                <div class="col-md-6 col-md-offset-1">
                    <div class="demo-image">
                        <img src="{{asset('build/img/showcase-2/examples/home_6.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section section-features">
        <div class="container">
            <h4 class="header-text text-center">Features</h4>
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-blue">
                        <div class="icon">
                            <i class="pe-7s-pen"></i>
                        </div>
                        <div class="text">
                            <h4>Client-Perfect Draws</h4>
                            <p>All appointments sync with your Google calendar so your availability is always up to
                                date. See your schedule at a glance from any device.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-blue">
                        <div class="icon">
                            <i class="pe-7s-look"></i>
                        </div>
                        <h4>Retina Ready</h4>
                        <p>Automatic text and email reminders make sure customers always remember their upcoming
                            appointments.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-blue">
                        <div class="icon">
                            <i class="pe-7s-like"></i>
                        </div>
                        <h4>You'll love it</h4>
                        <p>You'll Love It, you will find dining room sets, couches, chairs and pre-owned furniture of
                            all kinds as well as lamps, rugs and accessories.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-blue">
                        <div class="icon">
                            <i class="pe-7s-piggy"></i>
                        </div>
                        <h4>Big Discount</h4>
                        <p>Take payments and run your business on the go, in your store and then see how it all adds up
                            with analytics.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section section-testimonial">
        <div class="container">
            <h4 class="header-text text-center">What people think</h4>
            <div id="carousel-example-generic" class="carousel fade" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item">
                        <div class="mask">§
                            <img src="{{asset('build/img/faces/face-4.jpg')}}">
                        </div>
                        <div class="carousel-testimonial-caption">
                            <p>Jay Z, Producer</p>
                            <h3>"I absolutely love your app! It's truly amazing and looks awesome!"</h3>
                        </div>
                    </div>
                    <div class="item active">
                        <div class="mask">
                            <img src="{{asset('build/img/faces/face-3.jpg')}}">
                        </div>
                        <div class="carousel-testimonial-caption">
                            <p>Drake, Artist</p>
                            <h3>"This is one of the most awesome apps I've ever seen! Wish you luck Creative Tim!"</h3>
                        </div>
                    </div>
                    <div class="item">
                        <div class="mask">
                            <img src="{{asset('build/img/faces/face-2.jpg')}}">
                        </div>
                        <div class="carousel-testimonial-caption">
                            <p>Rick Ross, Musician</p>
                            <h3>"Loving this! Just picked it up the other day. Thank you for the work you put into
                                this."</h3>
                        </div>
                    </div>
                </div>
                <ol class="carousel-indicators carousel-indicators-blue">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>
            </div>
        </div>
    </div>
    <div class="section section-no-padding">
        <div class="parallax filter-gradient blue" data-color="blue">
            <div class="parallax-background">
                <img class="parallax-background-image" src="{{asset('build/img/showcases/showcase-2/bg2.jpg')}}">
            </div>
            <div class="info">
                <h1>Download this landing page for free!</h1>
                <p>Beautiful multipurpose bootstrap landing page.</p>
                <a href="http://www.creative-tim.com/product/awesome-landing-page"
                   class="btn btn-neutral btn-lg btn-fill">DOWNLOAD</a>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <nav class="pull-left">
                <ul>
                    <li>
                        <a href="#">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Company
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Portfolio
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Blog
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="social-area pull-right">
                <a class="btn btn-social btn-facebook btn-simple">
                    <i class="fa fa-facebook-square"></i>
                </a>
                <a class="btn btn-social btn-twitter btn-simple">
                    <i class="fa fa-twitter"></i>
                </a>
                <a class="btn btn-social btn-pinterest btn-simple">
                    <i class="fa fa-pinterest"></i>
                </a>
            </div>
            <div class="copyright">
                &copy; 2016 <a href="http://www.creative-tim.com">Creative Tim</a>, made with love
            </div>
        </div>
    </footer>
</div>
{{--
<div class="fixed-plugin">
    <div class="dropdown open">
        <a href="#" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
        </a>
        <ul class="dropdown-menu">
            <li class="header-title">Adjustments</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger">
                    <p class="pull-right">Filter</p>
                    <div class="pull-left">
                        <span class="badge selector badge-blue active" data-color="blue" data-button="info"></span>
                        <span class="badge selector badge-green" data-color="green" data-button="success"></span>
                        <span class="badge selector badge-orange" data-color="orange" data-button="warning"></span>
                        <span class="badge selector badge-red" data-color="red" data-button="danger"></span>
                        <span class="badge selector badge-black" data-color="gray" data-button="default"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="header-title">Template</li>
            <li class="">
                <a href="index.html" class="switch">
                    <img alt="..." src="{{asset('build/img/blue.jpg')}}">
                    <p class="pull-left">Awesome Landing Page</p>
                </a>
            </li>
            <li class="header-title">Showcases</li>
            <li class="">
                <a href="phone_app.html" class="switch">
                    <img alt="..." src="{{asset('build/img/phone_app.jpg')}}">
                    <p class="pull-left">Showcase 1</p>
                </a>
            </li>
            <li class="active">
                <a href="web_app.html" class="switch">
                    <img alt="..." src="{{asset('build/img/web_app.jpg')}}">
                    <p class="pull-left">Showcase 2</p>
                </a>
            </li>
        </ul>
    </div>
</div>
--}}
</body>

</html>
