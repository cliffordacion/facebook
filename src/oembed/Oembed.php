<?php

namespace cliffordacion\facebook\oembed;

use Facebook\Facebook;
use Facebook\Facebook\Exceptions as FbExceptions;


class Oembed 
{
    public function __construct(
        $appId,
        $appSecret,
        $graphVersion = 'v2.10'
    ) {
        $this->appId = $appId;
        $this->appSecret = $appSecret;
        $this->graphVersion = $graphVersion;

        $this->fb = new Facebook([
            'app_id' => $this->appId,
            'app_secret' => $this->appSecret,
            'default_graph_version' => $this->graphVersion,
        ]);
    }

    public function html($accessToken, Array $params)
    {

        $params = http_build_query($params);

            // Returns a `FacebookFacebookResponse` object
        $response = $fb->get(
            '/oembed_page?' . $params,
            $accessToken
        );

        $graphNode = $response->getGraphNode();

        $html = $graphNode->getField('html');

        return $html;
    }
}