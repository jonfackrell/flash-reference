@extends('layouts.web')

@section('content')

    <!-- Affordable Price -->
    <section id="pricing" class="overview-block-ptb grey-bg iq-price-table">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <br />
                    <div class="heading-title">
                        <h3 class="title iq-tw-7">Affordable Price</h3>
                        <p>We try to be upfront about our pricing and keep it simple. Don't see a plan fits your needs? Don't hesitate to contact us.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-lg-4">
                    <div class="iq-pricing pricing-03 text-center">
                        <div class="price-title iq-parallax iq-over-blue-80" data-jarallax='{"speed": 0.6}' style="background: url(/web/images/bg/08.jpg);">
                            <h2 class="iq-font-white iq-tw-7"><small>$</small>1,995<small>/year</small></h2>
                            <span class="text-uppercase iq-tw-4 iq-font-white">BASIC</span>
                        </div>
                        <ul>
                            <li>1 to 2,500 students</li>
                            <li>Unlimited Flashcards</li>
                            <li>Learning Tools Interoperability (LTI)</li>
                        </ul>
                        <div class="price-footer">
                            <a class="button" href="{{ route('web.contact') }} ">Contact</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 wow flipInY r4-mt-30" data-wow-duration="1s">
                    <div class="iq-pricing pricing-03 text-center">
                        <div class="price-title iq-parallax iq-over-blue-80" data-jarallax='{"speed": 0.6}' style="background: url(/web/images/bg/08.jpg);">
                            <h2 class="iq-font-white iq-tw-7"><small>$</small>4,995<small>/year</small></h2>
                            <span class="text-uppercase iq-tw-4 iq-font-white">STANDARD</span>
                        </div>
                        <ul>
                            <li>2,501 to 10,000 students</li>
                            <li>Unlimited Flashcards</li>
                            <li>Learning Tools Interoperability (LTI)</li>
                        </ul>
                        <div class="price-footer">
                            <a class="button" href="{{ route('web.contact') }}">Contact</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 r4-mt-30">
                    <div class="iq-pricing pricing-03 text-center">
                        <div class="price-title iq-parallax iq-over-blue-80" data-jarallax='{"speed": 0.6}' style="background: url(/web/images/bg/08.jpg);">
                            <h2 class="iq-font-white iq-tw-7"><small>ASK US</small></h2>
                            <span class="text-uppercase iq-tw-4 iq-font-white">CUSTOM</span>
                        </div>
                        <ul>
                            <li>10,001+ students</li>
                            <li>Unlimited Flashcards</li>
                            <li>Learning Tools Interoperability (LTI)</li>
                        </ul>
                        <div class="price-footer">
                            <a class="button" href="{{ route('web.contact') }}">Contact</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Affordable Price END -->


@endsection

@push('scripts')

@endpush

@push('styles')

@endpush
