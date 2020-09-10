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


@push('scripts')
    <script type="text/javascript" charset="utf8" src="/js/oauth-signature.min.js"></script>
    <script>
        var app = app || {};

        app.schema = {
            "@context" : "http://purl.imsglobal.org/ctx/lti/v1/ContentItem",
            "@graph" : [
                {
                    "@type" : "LtiLinkItem",
                    "url" : null,
                    "mediaType" : "application/vnd.ims.lti.v1.ltilink",
                    "title" : null,
                    "placementAdvice": {
                        "presentationDocumentTarget": "frame",
                        "displayWidth": 768,
                        "displayHeight": 1024
                    }
                }
            ]
        };

        app.randomString = function(length) {
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
        app.getUrlParams = function (url) {
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

        app.returnLtiLink = function(title, link){

            var $form = $('form.link-selection');
            var httpMethod = 'POST';
            var return_url = '{!! session('content_item_return_url') !!}';

            app.schema['@graph'][0]['url'] = link;
            app.schema['@graph'][0]['title'] = title;

            var parameters = {
                    oauth_consumer_key : '{{ $institution->consumer_key }}',
                    oauth_nonce : app.randomString(32),
                    oauth_timestamp : Math.round(Date.now() / 1000),
                    oauth_signature_method : 'HMAC-SHA1',
                    oauth_version : '1.0',
                    lti_message_type: 'ContentItemSelection',
                    lti_version: 'LTI-1p0',
                    content_items:JSON.stringify(app.schema)
                };
            var consumerSecret = '{{ $institution->secret }}';

            $.each(app.getUrlParams(return_url), function(i, val){
                parameters[i] = val;
            });

            signature = oauthSignature.generate(httpMethod, return_url, parameters, consumerSecret, null, { encodeSignature: false});

            $form.find('input[name="oauth_signature"]').val(signature);
            $form.find('input[name="oauth_timestamp"]').val(parameters["oauth_timestamp"]);
            $form.find('input[name="oauth_nonce"]').val(parameters["oauth_nonce"]);
            $form.find('input[name="content_items"]').val(JSON.stringify(app.schema));
            $form.find('input[name="_token"]').remove();
            $form.submit();
        }
    </script>
@endpush

@push('styles')
    <style>
        .link-selection{
            dsplay: none;
        }
    </style>
@endpush
