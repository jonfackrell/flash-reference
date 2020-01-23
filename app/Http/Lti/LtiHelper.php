<?php


namespace App\Http\Lti;


class LtiHelper
{

    public $params;
    protected $institution;
    protected $returnUrl;

    public function __construct($institution, $returnUrl)
    {
        $this->institution = $institution;
        $this->returnUrl = $returnUrl;
    }

    private function getConsumer()
    {
        return new \OAuthConsumer($this->institution->consumer_key, $this->institution->secret, null);
    }

    public function getSignature($name, $url)
    {
        $hmacMethod = new \OAuthSignatureMethod_HMAC_SHA1();

        $queryParams = array();
        $queryString = parse_url($this->returnUrl, PHP_URL_QUERY);
        if (!is_null($queryString)) {
            $queryItems = explode('&', $queryString);
            foreach ($queryItems as $item) {
                if (strpos($item, '=') !== false) {
                    list($name, $value) = explode('=', $item);
                    $queryParams[urldecode($name)] = urldecode($value);
                } else {
                    $queryParams[urldecode($item)] = '';
                }
            }
        }

        $this->params = array();
        // Add standard parameters
        $this->params['lti_version'] = 'LTI-1p0';
        $this->params['lti_message_type'] = "ContentItemSelection";

        //$params['oauth_callback'] = 'about:blank';
        $this->params = $this->params + $queryParams;
        // Add OAuth signature

        $graph = [
            "@type" => "LtiLinkItem",
            "url" => $url,
            "mediaType" => "text/html",
            "title" => $name
        ];
        $this->params['content_items'] =  json_encode( (object)["@context" => "http://purl.imsglobal.org/ctx/lti/v1/ContentItem",
            "@graph" => [
                (object) $graph
            ]] ) ;
        $consumer = $this->getConsumer();
        $req = \OAuthRequest::from_consumer_and_token($consumer, null, 'POST', $this->returnUrl, $this->params);
        $signature = $req->build_signature($hmacMethod, $consumer, null);
        $this->params = $req->get_parameters();
        return $signature;
    }
}
