<?php

class N2SliderGeneratorVimeoConfiguration {

    private $configuration;

    /**
     * @param $info N2GeneratorInfo
     */
    public function __construct($info) {
        $this->configuration = new N2Data(array(
            'client_id'     => '',
            'client_secret' => '',
            'access_token'  => ''
        ));

        $this->configuration->loadJSON(N2Base::getApplication('smartslider')->storage->get('vimeo'));

    }

    public function wellConfigured() {
        if (!$this->configuration->get('client_id') || !$this->configuration->get('client_secret') || !$this->configuration->get('access_token')) {
            return false;
        }
        $client = $this->getApi();

        $response = $client->request('/oauth/verify');
        if ($response['status'] == 200) {
            return true;
        }

        return false;
    }

    /**
     *
     * @return \Vimeo\Vimeo
     */
    public function getApi() {

        require_once(dirname(__FILE__) . "/api/Exceptions/ExceptionInterface.php");
        require_once(dirname(__FILE__) . "/api/Exceptions/VimeoRequestException.php");
        require_once(dirname(__FILE__) . "/api/Exceptions/VimeoUploadException.php");
        require_once(dirname(__FILE__) . "/api/Vimeo.php");

        $client = new \Vimeo\Vimeo($this->configuration->get('client_id'), $this->configuration->get('client_secret'));

        $client->clientCredentials('private');

        $client->setToken($this->configuration->get('access_token'));

        return $client;
    }

    public function getData() {
        return $this->configuration->toArray();
    }

    public function addData($data, $store = true) {
        $this->configuration->loadArray($data);
        if ($store) {
            N2Base::getApplication('smartslider')->storage->set('vimeo', null, json_encode($this->configuration->toArray()));
        }
    }

    public function render() {
        $form = new N2Form();
        $form->loadArray($this->getData());

        $form->loadXMLFile(dirname(__FILE__) . '/configuration.xml');

        echo $form->render('generator');

        try {
            $client = $this->getApi();

            $response = $client->request('/oauth/verify');
            if ($response['status'] != 200) {
                if (!empty($response['body']['error'])) {
                    N2Message::error($response['body']['error']);
                }
            }
        } catch (Exception $e) {
            N2Message::error($e->getMessage());
        }
    }

    public function startAuth() {
        if (session_id() == "") {
            session_start();
        }
        $this->addData(N2Request::getVar('generator'), false);

        $_SESSION['data']       = $this->getData();
        $_SESSION['vimeostate'] = rand();

        $client = $this->getApi();

        return $client->buildAuthorizationEndpoint(N2Base::getApplication('smartslider')->router->createUrl(array(
            "generator/finishauth",
            array(
                'group' => 'vimeo'
            )
        )), array('private'), $_SESSION['vimeostate']);
    }

    public function finishAuth() {
        if (session_id() == "") {
            session_start();
        }
        if (isset($_REQUEST['state']) && isset($_SESSION['vimeostate']) && $_REQUEST['state'] == $_SESSION['vimeostate']) {
            $this->addData($_SESSION['data'], false);
            unset($_SESSION['data']);
            unset($_SESSION['vimeostate']);
            try {
                $client = $this->getApi();
                $client->setToken('');
                $response = $client->accessToken($_REQUEST['code'], N2Base::getApplication('smartslider')->router->createUrl(array(
                    "generator/finishauth",
                    array(
                        'group' => 'vimeo'
                    )
                )));

                if ($response['status'] == 200) {
                    $this->configuration->set('access_token', $response['body']['access_token']);
                    $client->setToken($response['body']['access_token']);
                    $this->addData($this->getData());

                    return true;
                } else {
                    return $client->response['body']['error_description'];
                }
            } catch (Exception $e) {
                return $e->getMessage();
            }
        } else {
            return 'State does not match!';
        }
    }

}