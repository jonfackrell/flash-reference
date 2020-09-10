@extends('layouts.web')

@section('content')

    <!-- Flash Reference Specialities -->
    <section class="overview-block-ptb grey-bg" style="padding-bottom: 20px;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <br />
                    <div class="heading-title">
                        <h3 class="title iq-tw-7">Flash Reference Features </h3>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-3 col-md-6 r4-mt-30">
                    <div class="iq-fancy-box text-center">
                        <div class="iq-icon">
                            <i aria-hidden="true" class="ion-ios-settings"></i>
                        </div>
                        <div class="fancy-content">
                            <h5 class="iq-tw-6 iq-pt-20 iq-pb-10">Options</h5>
                            <p>Students can randomize the order and favorite cards they want to return to later.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3 col-md-6 r-mt-30">
                    <div class="iq-fancy-box text-center">
                        <div class="iq-icon">
                            <i aria-hidden="true" class="ion-ios-heart-outline"></i>
                        </div>
                        <div class="fancy-content">
                            <h5 class="iq-tw-6 iq-pt-20 iq-pb-10">Feel the Love</h5>
                            <p>Students love to have study materials created by their teachers.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3 col-md-6 r4-mt-30">
                    <div class="iq-fancy-box text-center">
                        <div class="iq-icon">
                            <i aria-hidden="true" class="ion-ios-checkmark-outline"></i>
                        </div>
                        <div class="fancy-content">
                            <h5 class="iq-tw-6 iq-pt-20 iq-pb-10">Responsive Design</h5>
                            <p>Flashcards adjust to match any devices size so that students can study at a computer or on the go.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3 col-md-6 r-mt-30">
                    <div class="iq-fancy-box text-center">
                        <div class="iq-icon">
                            <i aria-hidden="true" class="ion-share"></i>
                        </div>
                        <div class="fancy-content">
                            <h5 class="iq-tw-6 iq-pt-20 iq-pb-10">Sharing</h5>
                            <p>Share your study sets with other educators in your own institution or kee them 100% private.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3 col-md-6 iq-mt-30">
                    <div class="iq-fancy-box text-center">
                        <div class="iq-icon">
                            <i aria-hidden="true" class="ion-ios-color-wand-outline"></i>
                        </div>
                        <div class="fancy-content">
                            <h5 class="iq-tw-6 iq-pt-20 iq-pb-10">Easy to Use</h5>
                            <p>Teachers will be creating flashcard study sets in no time. The interface is easy and intuitive for students.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3 col-md-6 iq-mt-30">
                    <div class="iq-fancy-box text-center">
                        <div class="iq-icon">
                            <i aria-hidden="true" class="ion-ios-monitor-outline"></i>
                        </div>
                        <div class="fancy-content">
                            <h5 class="iq-tw-6 iq-pt-20 iq-pb-10">Learning Tools Interoperability</h5>
                            <p>Integrates semalessly with most Learning Management Systems.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3 col-md-6 iq-mt-30">
                    <div class="iq-fancy-box text-center">
                        <div class="iq-icon">
                            <i aria-hidden="true" class="ion-ios-photos-outline"></i>
                        </div>
                        <div class="fancy-content">
                            <h5 class="iq-tw-6 iq-pt-20 iq-pb-10">Copyright</h5>
                            <p>Keep your flashcards behind authentication to prevent content from being exposed ot the world.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-3 col-md-6 iq-mt-30">
                    <div class="iq-fancy-box text-center">
                        <div class="iq-icon">
                            <i aria-hidden="true" class="ion-stats-bars"></i>
                        </div>
                        <div class="fancy-content">
                            <h5 class="iq-tw-6 iq-pt-20 iq-pb-10">Stats</h5>
                            <p>Get detailed usage stats at all levels so you can see what students are studying.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-sm-12">
                <br />
                <div class="heading-title">
                    <a href="{{ route('admin.register') }}" class="button bt-black">Register for a Trial</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Flash Reference Specialities END -->
    <!-- Counter -->
    <div class="iq-pt-40 iq-counter-box iq-bg-over iq-over-blue-90 iq-font-white iq-parallax" data-jarallax='{"speed": 0.6}' style="background: url(/web/images/bg/02.jpg);">
        <div class="container">
            <div class="counter-info iq-mt-60 iq-pt-40">
                <div class="row">
                    <div class="col-lg-6">
                        <p>Flashcards are organized by classes and study sets to make it easy to manage through the administration side.</p>
                        <p class="iq-mt-30">Teachers can create their own study sets, collaborate with other teachers from their school, or get help from a TA.</p>
                        <p class="iq-mt-30">Each study set can be optionally shared within the institution for use by other educators without granting edit priviledges.</p>
                        <a href="#contact" class="button bt-black iq-mt-15 iq-mb-30">Contact</a>
                    </div>
                    <div class="col-lg-6">
                        <div class="counter-info-img">
                            <img class="center-block" src="/web/images/screenshots/bottom-banner.jpg" alt="#">
                            {{--<div class="waves-box">--}}
                            {{--<a href="video/01.m4v" class="iq-video popup-youtube"><i class="ion-ios-play-outline"></i></a>--}}
                            {{--<div class="iq-waves">--}}
                            {{--<div class="waves wave-1"></div>--}}
                            {{--<div class="waves wave-2"></div>--}}
                            {{--<div class="waves wave-3"></div>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Counter END -->




@endsection

@push('scripts')

@endpush

@push('styles')

@endpush
