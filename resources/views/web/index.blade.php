@extends('layouts.web')

@section('content')

    <!-- Banner -->
    <section id="iq-home" class="iq-banner-03 overview-block-pt iq-bg-over iq-over-blue-90 jarallax"  data-jarallax-video="m4v:/web/video/01.m4v,webm:/web/video/01.webm,ogv:/web/video/01.ogv">
        <div class="container">
            <div class="banner-text">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="text-uppercase iq-font-white iq-tw-3">Flashcard <b class="iq-tw-7">Creator</b></h2>
                        <p class="iq-font-white iq-pt-15 iq-mb-20">Flash Reference a dedicated tool for creating flashcard study sets for your students. Educators can create and embed reusable study sets to help students memorize key facts.</p>
                        <p class="iq-font-white iq-pt-15 iq-mb-20">With Flash Reference you can protect your content behind a login while still making it easy for students to access. Students can favorite cards they want to return to later, auto play cards in a set, or shuffle the cards to challenge themselves.</p>
                        {{--<p class="iq-font-white iq-pt-15 iq-mb-40"><b class="iq-tw-7">Flashcard:</b> a card bearing information, as words or numbers, on either or both sides, used in classroom drills or in private study. One writes a question on a side and an answer overleaf. Flashcards can bear vocabulary, historical dates, formulae or any subject matter that can be learned via a question-and-answer format. Flashcards are widely used as a learning drill to aid memorization.</p>--}}
                        <a href="{{ route('web.contact') }}" class="button bt-black">Contact</a>
                        <a href="{{ route('admin.register') }}" class="button bt-black">Register for a Trial</a>
                    </div>
                    <div class="col-md-6">
                        <div class="iq-banner-video">
                            {{--<div class="waves-box">--}}
                            {{--<a href="video/01.mp4" class="iq-video popup-youtube"><i class="ion-ios-play-outline"></i></a>--}}
                            {{--<div class="iq-waves">--}}
                            {{--<div class="waves wave-1"></div>--}}
                            {{--<div class="waves wave-2"></div>--}}
                            {{--<div class="waves wave-3"></div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            <img class="banner-img" src="/web/images/screenshots/header.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-objects">
            <span class="banner-objects-01" data-bottom="transform:translatey(50px)" data-top="transform:translatey(-50px);">
                    <img src="/web/images/drive/03.png" alt="drive02">
                </span>
            <span class="banner-objects-04" data-bottom="transform:translatex(100px)" data-top="transform:translatex(-100px);">
                    <img src="/web/images/drive/04.png" alt="drive02">
                </span>
        </div>
    </section>
    <!-- Banner End -->

    <!-- Who is Flash Reference ? -->
    <section id="how-it-works" class="overview-block-ptb how-works">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="iq-tw-6 iq-mb-25">What is Flash Reference?</h2>
                    <p class="iq-font-15">Flash Reference is an educational tool designed for schools and universities.</p>
                    <p class="iq-font-15 iq-mt-20">As an LTI Tool with support for all major Learning MAnagement Systems, system administrators can provide easy access to all of their Teachers and Faculty.</p>
                    <h6 class="iq-tw-6 iq-mt-25">Learn more today</h6>
                    <a href="{{ route('web.features') }}" class="button iq-mt-10">Features</a>
                </div>
                <div class="col-md-6">
                    <img class="iq-works-img" src="/web/images/screenshots/flash-card-flipping.gif" alt="Flashcards">
                </div>
            </div>
        </div>
        <div class="iq-objects">

            <span class="iq-objects-02" data-bottom="transform:translatey(50px)" data-top="transform:translatey(-100px);">
                        <img src="/web/images/drive/03.png" alt="drive02">
                    </span>
            <span class="iq-objects-03" data-bottom="transform:translatex(50px)" data-top="transform:translatex(-100px);">
                        <img src="/web/images/drive/04.png" alt="drive02">
                    </span>
        </div>
    </section>
    <!-- Who is Flash Reference ? END -->
    <!-- Great Screenshots -->
    <section id="great-screenshots" class="overview-block-ptb iq-bg-over  iq-over-blue-80 iq-screenshots iq-parallax" data-jarallax='{"speed": 0.6}' style="background: url(/web/images/bg/07.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="heading-title white">
                        <h3 class="title iq-tw-7">Screenshots</h3>
                        <p class="iq-font-white">Here are just a few examples and images from within the app. To get a better feel, reach out to us for a free trial.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <div class="screenshots-slider popup-gallery">
                        <div class="slider-container">
                            <div class="slider-content">
                                <div class="slider-single">
                                    <a href="/web/images/screenshots/flash-card-front-1.jpg" class="popup-img"><img class="slider-single-image" src="/web/images/screenshots/flash-card-front-1.jpg" alt="1" /></a>
                                </div>
                                <div class="slider-single">
                                    <a href="/web/images/screenshots/flash-card-back-1.jpg" class="popup-img"><img class="slider-single-image" src="/web/images/screenshots/flash-card-back-1.jpg" alt="2" /></a>
                                </div>
                                <div class="slider-single">
                                    <a href="/web/images/screenshots/flash-card-selection-canvas.jpg" class="popup-img"><img class="slider-single-image" src="/web/images/screenshots/flash-card-selection-canvas.jpg" alt="3" /></a>
                                </div>
                                <div class="slider-single">
                                    <a href="/web/images/screenshots/flash-card-canvas.jpg" class="popup-img"><img class="slider-single-image" src="/web/images/screenshots/flash-card-canvas.jpg" alt="4" /></a>
                                </div>
                            </div>
                            <a class="slider-left" href="javascript:void(0);"><i class="fa fa-angle-left"></i></a>
                            <a class="slider-right" href="javascript:void(0);"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Great Screenshots END -->




    <br/>
    <br/>
    <hr />


    {{--
    <!-- Latest Blog Post -->
    <section id="blog" class="overview-block-ptb grey-bg iq-blog">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="heading-title">
                        <h3 class="title iq-tw-7">Latest Blog Posts</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="owl-carousel" data-nav-dots="true" data-nav-arrow="false" data-items="3" data-sm-items="2" data-lg-items="3" data-md-items="3" data-autoplay="true">
                        <div class="item">
                            <div class="iq-blog-box">
                                <div class="iq-blog-image clearfix">
                                    <img class="img-fluid center-block" src="/web/images/blog/idea-is-born.jpg" alt="#">
                                </div>
                                <div class="iq-blog-detail">
                                    <div class="blog-title"> <a href="blog-single.html"><h5 class="iq-tw-6 iq-mb-10">An Idea is Born</h5> </a> </div>
                                    <div class="blog-content">
                                        <p>After a long discussion with a Biology professor, we started working on a new tool for creating Flashcards.</p>
                                    </div>
                                    <div class="iq-blog-meta">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-user-circle" aria-hidden="true"></i> Jon Fackrell</a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> 14 July 2018</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="iq-blog-box">
                                <div class="iq-blog-image clearfix">
                                    <img class="img-fluid center-block" src="/web/images/blog/implementation.jpg" alt="#">
                                </div>
                                <div class="iq-blog-detail">
                                    <div class="blog-title"> <a href="blog-single.html"><h5 class="iq-tw-6 iq-mb-10">Implementation</h5> </a> </div>
                                    <div class="blog-content">
                                        <p>After a quick MVP we decided to push forward by buildign the ncessary infrastructure and fine tuning the code.</p>
                                    </div>
                                    <div class="iq-blog-meta">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-user-circle" aria-hidden="true"></i> Jon Fackrell</a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> 21 July 2018</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="iq-blog-box">
                                <div class="iq-blog-image clearfix">
                                    <img class="img-fluid center-block" src="/web/images/blog/launch.jpg" alt="#">
                                </div>
                                <div class="iq-blog-detail">
                                    <div class="blog-title"> <a href="blog-single.html"><h5 class="iq-tw-6 iq-mb-10">Launch</h5> </a> </div>
                                    <div class="blog-content">
                                        <p>After a quick MVP we decided to push forward by building the necessary infrastructure and fine tuning the code.</p>
                                    </div>
                                    <div class="iq-blog-meta">
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-user-circle" aria-hidden="true"></i> Jon Fackrell</a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> 28 July 2018</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Blog Post END -->
    --}}


@endsection

@push('scripts')

@endpush

@push('styles')

@endpush
