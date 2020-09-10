<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Flash Reference') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/favicon.ico" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&amp;Raleway:300,400,500,600,700,800,900" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/web/css/bootstrap.min.css">
    <!-- owl-carousel -->
    <link rel="stylesheet" href="/web/css/owl-carousel/owl.carousel.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/web/css/font-awesome.css" />
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="/web/css/magnific-popup/magnific-popup.css" />
    <!-- media element player -->
    <link href="/web/css/mediaelementplayer.min.css" rel="stylesheet" type="text/css" />
    <!-- Animate -->
    <link rel="stylesheet" href="/web/css/animate.css" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="/web/css/ionicons.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="/web/css/style.css">
    <!-- Responsive -->
    <link rel="stylesheet" href="/web/css/responsive.css">
    <!-- custom style -->
    <link rel="stylesheet" href="/web/css/custom.css" />
    <style>
        #omni-form-panel .inline.fields{display:none !important;}
        .mfp-title small{display:none !important;}
    </style>
@stack('styles')

</head>

<body data-spy="scroll" data-offset="80">
<!-- loading -->
{{--<div id="loading">--}}
{{--<div id="loading-center">--}}
{{--<div class="loader">--}}
{{--<div class="cube">--}}
{{--<div class="sides">--}}
{{--<div class="top"></div>--}}
{{--<div class="right"></div>--}}
{{--<div class="bottom"></div>--}}
{{--<div class="left"></div>--}}
{{--<div class="front"></div>--}}
{{--<div class="back"></div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
<!-- loading End -->
<!-- Header -->
<header id="main-header" class="header-white">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="/">
                        <img class="img-fluid" src="/web/images/flash-reference-logo.jpg" alt="#">
                        <span class="text-uppercase iq-tw-3" style="color: #44bff0; font-size: 38px; vertical-align: middle;">Flash <b class="iq-tw-7">Reference</b></span>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="ion-navicon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto w-100 justify-content-end">
                            <li class="nav-item">
                                <a class="nav-link @if(Route::currentRouteName() == 'web.home') active @endif" href="{{ route('web.home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(Route::currentRouteName() == 'web.features') active @endif" href="{{ route('web.features') }}">Features</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(Route::currentRouteName() == 'web.pricing') active @endif" href="{{ route('web.pricing') }}">Pricing</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(Route::currentRouteName() == 'web.learn') active @endif" href="{{ route('web.learn') }}">Learn</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(Route::currentRouteName() == 'web.contact') active @endif" href="{{ route('web.contact') }}">Contact</a>
                            </li>
                            {{--
                            <li class="nav-item">
                                <a class="nav-link" href="#blog">Blog</a>
                            </li>
                            --}}
                        </ul>

                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->



<!-- Main Content -->
<div class="main-content">
    @yield('content')
</div>
<!-- Main Content END -->

<!-- Footer -->
<footer>
    {{--<!-- Subscribe Our Newsletter -->
    <section class="iq-ptb-80 iq-newsletter iq-bg-over iq-over-blue-90 jarallax" data-jarallax-video="m4v:./video/01.m4v,webm:./video/01.webm,ogv:./video/01.ogv">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="heading-title white iq-mb-40">
                        <h3 class="title iq-tw-7">Subscribe To Our Newsletter</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    --}}{{--<form class="form-inline">--}}{{--
                        --}}{{--<div class="form-group">--}}{{--
                            --}}{{--<label for="inputPassword2" class="sr-only">Password</label>--}}{{--
                            --}}{{--<input type="password" class="form-control" id="inputPassword2" placeholder="Password">--}}{{--
                        --}}{{--</div>--}}{{--
                        --}}{{--<a class="button bt-white iq-ml-25" href="#">subscribe</a>--}}{{--
                    --}}{{--</form>--}}{{--
                    <form class="form-inline" action="https://www.getdrip.com/forms/683888583/submissions" method="post" data-drip-embedded-form="683888583">
                        <div class="form-group">
                            <input class="form-control" type="email" id="drip-email" name="fields[email]" value="" placeholder="Email"/>
                        </div>
                        <div>
                            <input class="button bt-white iq-ml-25" type="submit" value="Subscribe" data-drip-attribute="sign-up-button" />
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <!-- Subscribe Our Newsletter END -->--}}

    {{--<section class="footer-info iq-pt-60">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="iq-footer-box text-left">
                        <div class="iq-icon">
                            <i aria-hidden="true" class="ion-ios-location-outline"></i>
                        </div>
                        <div class="footer-content">
                            <h4 class="iq-tw-6 iq-pb-10">Address</h4>
                            <p>Rigby, ID 83442</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 r4-mt-30">
                    <div class="iq-footer-box text-left">
                        <div class="iq-icon">
                            <i aria-hidden="true" class="ion-ios-telephone-outline"></i>
                        </div>
                        <div class="footer-content">
                            <h4 class="iq-tw-6 iq-pb-10">Phone</h4>
                            <p>(801) 471-3646
                                <br>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 r-mt-30">
                    <div class="iq-footer-box text-left">
                        <div class="iq-icon">
                            <i aria-hidden="true" class="ion-ios-email-outline"></i>
                        </div>
                        <div class="footer-content">
                            <h4 class="iq-tw-6 iq-pb-10">Mail</h4>
                            <p>
                                <a href="mailto:&#115;&#117;&#112;&#112;&#111;&#114;&#116;&#064;&#114;&#101;&#102;&#098;&#121;&#116;&#101;&#115;&#046;&#099;&#111;&#109;">
                                    &#115;&#117;&#112;&#112;&#111;&#114;&#116;&#064;&#114;&#101;&#102;&#098;&#121;&#116;&#101;&#115;&#046;&#099;&#111;&#109;
                                </a>
                                <br>
                                <br>
                            </p>
                        </div>
                    </div>
                </div>
                --}}{{--<div class="col-md-6 col-lg-3 align-self-center">
                    <ul class="info-share">
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-google"></i></a></li>
                    </ul>
                </div>--}}{{--
            </div>
            <div class="row iq-mt-40">
                <div class="col-sm-12 text-center">
                    <div class="footer-copyright iq-ptb-20">&copy; Copyright {{ now()->year }} <b>RefBytes</b></div>
                </div>
            </div>
        </div>
    </section>--}}
    <!-- Footer Info END -->
</footer>
<!-- Footer END -->
<!-- back-to-top -->
<div id="back-to-top">
    <a class="top" id="top" href="#top"> <i class="ion-ios-upload-outline"></i> </a>
</div>
<!-- back-to-top End -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="/web/js/jquery.min.js"></script>
<script src="/web/js/popper.min.js"></script>
<script src="/web/js/bootstrap.min.js"></script>
<!-- Main js -->
<script src="/web/js/main.js"></script>
<!-- Google captcha code Js -->
<script src='https://www.google.com/recaptcha/api.js'></script>
<!-- Custom -->
<script src="/web/js/custom.js"></script>
@stack('scripts')
<!-- Drip -->
<script type="text/javascript">
    var _dcq = _dcq || [];
    var _dcs = _dcs || {};
    _dcs.account = '1419610';

    (function() {
        var dc = document.createElement('script');
        dc.type = 'text/javascript'; dc.async = true;
        dc.src = '//tag.getdrip.com/1419610.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(dc, s);
    })();
</script>
<!-- end Drip -->
<script type="text/javascript">
    var clicky_site_ids = clicky_site_ids || [];
    clicky_site_ids.push(101131966);
    (function() {
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = '//static.getclicky.com/js';
        ( document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0] ).appendChild( s );
    })();
</script>
<noscript><p><img alt="Clicky" width="1" height="1" src="//in.getclicky.com/101131966ns.gif" /></p></noscript>
</body>

</html>
