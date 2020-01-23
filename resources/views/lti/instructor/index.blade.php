@extends('layouts.lti')

@section('content')

    <div class="ui stackable three column centered grid">
        <div class="three wide column">

        </div>
        <div class="eight wide column">
            <h3 class="ui dividing header">
                Instructor Index
            </h3>
            <div class="ui link list">
                @foreach($sets as $set)
                    <a class="item"
                       {{--data-signature="{{ (new \App\Http\Lti\LtiHelper($institution, session('content_item_return_url')))->getSignature($set->name, "https://flash-reference.com/lti/view/{$set->id}/{$set->uuid}") }}"--}}
                       data-id="{{ $set->id }}"
                       data-uuid="{{ $set->uuid }}"
                    >{{ $set->name }}</a>
                @endforeach
            </div>
        </div>
    </div>

    {!! SemanticForm::open()
                        ->post()
                        ->action(session('content_item_return_url'))
                        ->addClass('link-selection')
                        ->encType('application/x-www-form-urlencoded')
    !!}
        {!! SemanticForm::hidden('lti_message_type', "ContentItemSelection") !!}
        {!! SemanticForm::hidden('lti_version', 'LTI-1p0') !!}
        {!! SemanticForm::hidden('oauth_consumer_key', $institution->consumer_key) !!}
        {!! SemanticForm::hidden('oauth_nonce', null) !!}
        {!! SemanticForm::hidden('oauth_signature_method', 'HMAC-SHA1') !!}
        {!! SemanticForm::hidden('oauth_timestamp', null) !!}
        {!! SemanticForm::hidden('oauth_version', session('oauth_version')) !!}
        {!! SemanticForm::hidden('oauth_signature', null) !!}
        {!! SemanticForm::hidden('content_items', null) !!}
    {!! SemanticForm::close() !!}
@endsection

@push('styles')
    <style>
        .link-selection{
            dsplay: none;
        }
    </style>

@endpush

@push('scripts')
    <script type="text/javascript" charset="utf8" src="/js/oauth-signature.min.js"></script>
    <script>
        var randomString = function(length) {
            var text = "";
            var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
            for(var i = 0; i < length; i++) {
                text += possible.charAt(Math.floor(Math.random() * possible.length));
            }
            return text;
        }

        /**
         * Get the URL parameters
         * source: https://css-tricks.com/snippets/javascript/get-url-variables/
         * @param  {String} url The URL
         * @return {Object}     The URL parameters
         */
        var getParams = function (url) {
            var params = {};
            var parser = document.createElement('a');
            parser.href = url;
            var query = parser.search.substring(1);
            var vars = query.split('&');
            for (var i = 0; i < vars.length; i++) {
                var pair = vars[i].split('=');
                params[pair[0]] = decodeURIComponent(pair[1]);
            }
            return params;
        };

        $(function(){
            $(document).on('click', '.link.list .item', function(e){
                e.preventDefault();

                var link = {
                    "@context" : "http://purl.imsglobal.org/ctx/lti/v1/ContentItem",
                    "@graph" : [
                        {
                            "@type" : "LtiLinkItem",
                            "url" : null,
                            "mediaType" : "application/vnd.ims.lti.v1.ltilink",
                            "title" : null,"placementAdvice": {
                                "presentationDocumentTarget": "frame",
                                "displayWidth": 768,
                                "displayHeight": 1024
                            }
                        }
                    ]
                };
                var httpMethod = 'POST',
                    url = '{!! session('content_item_return_url') !!}',
                    parameters = {
                        oauth_consumer_key : '{{ $institution->consumer_key }}',
                        oauth_nonce : randomString(32),
                        oauth_timestamp : Math.round(Date.now() / 1000),
                        oauth_signature_method : 'HMAC-SHA1',
                        oauth_version : '1.0',
                        lti_message_type: 'ContentItemSelection',
                        lti_version: 'LTI-1p0'
                    },
                    consumerSecret = '{{ $institution->secret }}'
                ;

                $.each(getParams(url), function(i, val){
                    parameters[i] = val;
                });

                var $item = $(this);
                var $form = $('form.link-selection');

                link['@graph'][0]['url'] = 'https://flash-reference.com/lti/view/' + $item.data('id') + '/' + $item.data('uuid');
                link['@graph'][0]['title'] = $item.text().trim();
                parameters["content_items"] = JSON.stringify(link);

                signature = oauthSignature.generate(httpMethod, url, parameters, consumerSecret, null,{ encodeSignature: false});
                $form.find('input[name="oauth_signature"]').val(signature);
                $form.find('input[name="oauth_timestamp"]').val(parameters["oauth_timestamp"]);
                $form.find('input[name="oauth_nonce"]').val(parameters["oauth_nonce"]);
                $form.find('input[name="content_items"]').val(JSON.stringify(link));
                $form.find('input[name="_token"]').remove();

                $form.submit();
            });
        });
    </script>
@endpush
