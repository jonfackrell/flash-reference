@extends('layouts.web')

@section('content')

    <section id="pricing" class="overview-block-ptb grey-bg iq-price-table">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <br />
                    <div class="heading-title">
                        <h3 class="title iq-tw-7">Contact Us</h3>
                        {{--<p>We try to be upfront about our pricing and keep it simple. Don't see a plan fits your needs? Don't hesitate to contact us.</p>--}}
                    </div>
                    <section id="contact" class="footer-info white-bg">
                        <br />
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-lg-12">

                                    <div id="omni-form-container" data-widgetid="7"></div>

                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>





@endsection

@push('scripts')
    <script type='text/javascript'>
        var _omni = _omni || {}; _omni.account = 'app'; _omni.widgetid = '7';
        var dc = document.createElement('script');
        dc.type = 'text/javascript'; dc.async = true;
        dc.src = '//app.omnireference.com/js/omniwidget.js';
        document.getElementsByTagName('body')[0].appendChild(dc);
    </script>
@endpush

@push('styles')

@endpush
