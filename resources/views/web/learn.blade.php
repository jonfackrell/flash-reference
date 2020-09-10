@extends('layouts.web')

@section('content')


    <!-- Frequently Asked Questions -->
    <section class="overview-block-ptb grey-bg  iq-asked">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <br />
                    <div class="heading-title">
                        <h3 class="title iq-tw-7">Frequently Asked Questions</h3>
                        <p>We've tried to compile a list of common questions below. If you still have questions don't hesitate to reach out to us.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                {{--<div class="col-md-12 col-lg-6">
                    <img class="img-fluid center-block" src="/web/images/screenshots/bottom-banner.jpg" alt="drive10" style="z-index: 9; position: relative;">
                </div>
                <div class="col-md-12 col-lg-6">

                    <div class="iq-accordion iq-mt-50">
                        <div class="iq-ad-block ad-active"> <a href="#" class="ad-title iq-tw-6 iq-font-grey">I'm just a student, can I purchase Flash Reference?</a>
                            <div class="ad-details">
                                Currently we work with schools and universities to provide access to our Flashcard application.
                            </div>
                        </div>
                        <div class="iq-ad-block ad-active"> <a href="#" class="ad-title iq-tw-6 iq-font-grey">How is Flash Reference different?</a>
                            <div class="ad-details">We're sure you've seen many other Flashcard applications and many of them are free. Flash reference gives Teachers and Professors the ability to create study decks for the students in their classes and protects the content behind a login.</div>
                        </div>
                        <div class="iq-ad-block ad-active"> <a href="#" class="ad-title iq-tw-6 iq-font-grey">How do I add Flashcards to my class?</a>
                            <div class="ad-details">
                                Flash Reference connects to your Learning Management System with LTI. Once a Flashcard study set has been created, you simply add it from with your LMS.
                            </div>
                        </div>
                        <div class="iq-ad-block ad-active"> <a href="#" class="ad-title iq-tw-6 iq-font-grey">Do you provide usage statistics?</a>
                            <div class="ad-details">Of course! System administrators can view overall stats for their institution and teachers can see stats for the classes they have set up.</div>
                        </div>
                    </div>
                </div>--}}

                <div class="iq-blog-box iq-mt-10" style="width: 100%">
                    {{--<div class="iq-blog-image clearfix">
                        <img class="img-responsive center-block" src="http://via.placeholder.com/800x541" alt="#">
                    </div>--}}
                    <div class="iq-blog-detail">
                        <div class="blog-title"> <h5 class="iq-tw-6 iq-mb-10">I'm just a student, can I purchase Flash Reference?</h5>  </div>
                        <div class="blog-content">
                            <p>Currently we work with schools and universities to provide access to our Flashcard application.</p>
                        </div>
                        {{--<div class="iq-blog-meta">
                            <ul class="list-inline">
                                <li><a href="#"><i class="fa fa-user-circle" aria-hidden="true"></i> Tom Tilak</a></li>
                                <li><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> 12 Aug 2017</a></li>
                                <li><a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 5</a></li>
                            </ul>
                        </div>--}}
                    </div>
                </div>

                <div class="iq-blog-box iq-mt-10" style="width: 100%">
                    {{--<div class="iq-blog-image clearfix">
                        <img class="img-responsive center-block" src="http://via.placeholder.com/800x541" alt="#">
                    </div>--}}
                    <div class="iq-blog-detail">
                        <div class="blog-title"> <h5 class="iq-tw-6 iq-mb-10">How is Flash Reference different?</h5>  </div>
                        <div class="blog-content">
                            <p>We're sure you've seen many other Flashcard applications and many of them are free. Flash reference gives Teachers and Professors the ability to create study decks for the students in their classes and protects the content behind a login.</p>
                        </div>
                        {{--<div class="iq-blog-meta">
                            <ul class="list-inline">
                                <li><a href="#"><i class="fa fa-user-circle" aria-hidden="true"></i> Tom Tilak</a></li>
                                <li><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> 12 Aug 2017</a></li>
                                <li><a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 5</a></li>
                            </ul>
                        </div>--}}
                    </div>
                </div>

                <div class="iq-blog-box iq-mt-10" style="width: 100%">
                    {{--<div class="iq-blog-image clearfix">
                        <img class="img-responsive center-block" src="http://via.placeholder.com/800x541" alt="#">
                    </div>--}}
                    <div class="iq-blog-detail">
                        <div class="blog-title"> <h5 class="iq-tw-6 iq-mb-10">How do I add Flashcards to my class?</h5>  </div>
                        <div class="blog-content">
                            <p>Flash Reference connects to your Learning Management System with LTI. Once a Flashcard study set has been created, you simply add it from with your LMS.</p>
                        </div>
                        {{--<div class="iq-blog-meta">
                            <ul class="list-inline">
                                <li><a href="#"><i class="fa fa-user-circle" aria-hidden="true"></i> Tom Tilak</a></li>
                                <li><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> 12 Aug 2017</a></li>
                                <li><a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 5</a></li>
                            </ul>
                        </div>--}}
                    </div>
                </div>

                <div class="iq-blog-box iq-mt-10" style="width: 100%">
                    {{--<div class="iq-blog-image clearfix">
                        <img class="img-responsive center-block" src="http://via.placeholder.com/800x541" alt="#">
                    </div>--}}
                    <div class="iq-blog-detail">
                        <div class="blog-title"> <h5 class="iq-tw-6 iq-mb-10">Do you provide usage statistics?</h5>  </div>
                        <div class="blog-content">
                            <p>Of course! System administrators can view overall stats for their institution and teachers can see stats for the classes they have set up.</p>
                        </div>
                        {{--<div class="iq-blog-meta">
                            <ul class="list-inline">
                                <li><a href="#"><i class="fa fa-user-circle" aria-hidden="true"></i> Tom Tilak</a></li>
                                <li><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> 12 Aug 2017</a></li>
                                <li><a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 5</a></li>
                            </ul>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Frequently Asked Questions END -->

@endsection

@push('scripts')

@endpush

@push('styles')

@endpush
