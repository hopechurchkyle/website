<?php

class N2SliderGeneratorFlickrConfiguration {

    private $configuration;

    public function __construct() {
        $this->configuration = new N2Data(array(
            'api_key'    => '',
            'api_secret' => '',
            'token'      => ''
        ));

        $this->configuration->loadJSON(N2Base::getApplication('smartslider')->storage->get('flickr'));
    }

    public function wellConfigured() {
        if (!$this->configuration->get('api_key') || !$this->configuration->get('api_secret') || !$this->configuration->get('token')) {
            return false;
        }
        $api = $this->getApi();

        if ($api->call('flickr.test.login') === false) {
            return false;
        }

        return true;
    }


    public function getApi() {
        require_once(dirname(__FILE__) . "/api/DPZFlickr.php");

        $api_key    = $this->configuration->get('api_key');
        $api_secret = $this->configuration->get('api_secret');

        $api = new DPZFlickr($api_key, $api_secret, N2Base::getApplication('smartslider')->router->createUrl(array(
            "generator/finishAuth",
            array(
                'group' => N2Request::getVar('group'),
                'type'  => N2Request::getVar('type')
            )
        )));

        $token = json_decode($this->configuration->get('token'), true);
        $api->setData($token);

        return $api;
    }

    public function getData() {
        return $this->configuration->toArray();
    }

    public function addData($data, $store = true) {
        $this->configuration->loadArray($data);
        if ($store) {
            N2Base::getApplication('smartslider')->storage->set('flickr', null, json_encode($this->configuration->toArray()));
        }
    }

    public function render() {
        $form = new N2Form();
        $form->loadArray($this->getData());

        $form->loadXMLFile(dirname(__FILE__) . '/configuration.xml');
        $api = $this->getApi();
        if ($api->call('flickr.test.login') === false) {
            N2Message::error(n2_('The key and secret is not valid!'));
        }

        echo $form->render('generator');
    }

    public function startAuth() {
        if (session_id() == "") {
            session_start();
        }
        $this->addData(N2Request::getVar('generator'), false);

        $_SESSION['data'] = $this->getData();
        $api              = $this->getApi();
        $api->setData(array());

        return $api->authenticate();
    }

    public function finishAuth() {
        if (session_id() == "") {
            session_start();
        }
        try {
            $api = $this->getApi();
            $api->setData(array());
            $api->authenticateStep2();

            $this->configuration->loadArray($_SESSION['data']);
            $data          = $this->getData();
            $data['token'] = json_encode(array(
                'oauth_request_token'        => $api->getOauthData('oauth_request_token'),
                'oauth_request_token_secret' => $api->getOauthData('oauth_request_token_secret'),
                'oauth_access_token'         => $api->getOauthData('oauth_access_token'),
                'oauth_access_token_secret'  => $api->getOauthData('oauth_access_token_secret'),
                'user_nsid'                  => $api->getOauthData('user_nsid')
            ));
            $this->addData($data);

            unset($_SESSION['FlickrSessionOauthData']);
            unset($_SESSION['data']);

            return true;
        } catch (Exception $e) {
            return $e;
        }
    }

}
