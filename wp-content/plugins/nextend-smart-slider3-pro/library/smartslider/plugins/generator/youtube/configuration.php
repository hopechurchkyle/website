<?php

class N2SliderGeneratorYouTubeConfiguration {

    private $configuration;

    /**
     * @param $info N2GeneratorInfo
     */
    public function __construct($info) {
        $this->configuration = new N2Data(array(
            'apiKey'      => '',
            'apiSecret'   => '',
            'accessToken' => 'W10='
        ));

        $this->configuration->loadJSON(N2Base::getApplication('smartslider')->storage->get('youtube'));

    }

    public function wellConfigured() {
        if (!$this->configuration->get('apiKey') || !$this->configuration->get('apiSecret') || !$this->configuration->get('accessToken')) {
            return false;
        }

        $api = $this->getApi();
        try {
            if ($api->isAccessTokenExpired()) {
                return false;
            }

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function getApi() {


        require_once dirname(__FILE__) . '/googleclient/Exception.php';
        require_once dirname(__FILE__) . '/googleclient/Auth/Abstract.php';
        require_once dirname(__FILE__) . '/googleclient/Auth/OAuth2.php';
        require_once dirname(__FILE__) . '/googleclient/Auth/Exception.php';
        require_once dirname(__FILE__) . '/googleclient/Config.php';
        require_once dirname(__FILE__) . '/googleclient/Service.php';
        require_once dirname(__FILE__) . '/googleclient/Client.php';
        require_once dirname(__FILE__) . '/googleclient/Service/Resource.php';
        require_once dirname(__FILE__) . '/googleclient/Model.php';
        require_once dirname(__FILE__) . '/googleclient/Collection.php';
        require_once dirname(__FILE__) . '/googleclient/Task/Retryable.php';
        require_once dirname(__FILE__) . '/googleclient/Service/Exception.php';
        require_once dirname(__FILE__) . '/googleclient/Service/YouTube.php';
        require_once dirname(__FILE__) . '/googleclient/Http/Request.php';
        require_once dirname(__FILE__) . '/googleclient/Http/CacheParser.php';
        require_once dirname(__FILE__) . '/googleclient/Http/REST.php';
        require_once dirname(__FILE__) . '/googleclient/IO/Exception.php';
        require_once dirname(__FILE__) . '/googleclient/IO/Abstract.php';
        require_once dirname(__FILE__) . '/googleclient/IO/Curl.php';
        require_once dirname(__FILE__) . '/googleclient/Logger/Abstract.php';
        require_once dirname(__FILE__) . '/googleclient/Logger/Null.php';
        require_once dirname(__FILE__) . '/googleclient/Utils.php';

        require_once dirname(__FILE__) . '/googleclient/Task/Exception.php';
        require_once dirname(__FILE__) . '/googleclient/Task/Runner.php';

        $client = new Google_Client();
        $client->setAccessType('offline');
        $client->setClientId(trim($this->configuration->get('apiKey')));
        $client->setClientSecret(trim($this->configuration->get('apiSecret')));
        $client->addScope(array(
            Google_Service_YouTube::YOUTUBE,
            Google_Service_YouTube::YOUTUBE_READONLY
        ));


        $client->setRedirectUri(N2Base::getApplication('smartslider')->router->createUrl(array(
            "generator/finishAuth",
            array(
                'group' => N2Request::getVar('group')
            )
        )));

        $token = n2_base64_decode($this->configuration->get('accessToken', null));
        try {
            if ($token) {
                $client->setAccessToken($token);
                if ($client->isAccessTokenExpired()) {
                    $refreshToken = $client->getRefreshToken();
                    if (!empty($refreshToken)) {
                        $client->refreshToken($refreshToken);

                        try {
                            $oldAccessToken = json_decode(n2_base64_decode($this->configuration->get('accessToken')), true);
                            if (!is_array($oldAccessToken)) {
                                $oldAccessToken = array();
                            }
                        } catch (Exception $e) {
                            $oldAccessToken = array();
                        }

                        $this->configuration->set('accessToken', n2_base64_encode(json_encode(array_merge($oldAccessToken, json_decode($client->getAccessToken(), true)))));
                        $this->addData($this->configuration->toArray());
                    }
                }
            }
        } catch (Exception $e) {
            N2Message::error($e->getMessage());
        }

        return $client;
    }

    public function getData() {
        return $this->configuration->toArray();
    }

    public function addData($data, $store = true) {
        $this->configuration->loadArray($data);
        if ($store) {
            N2Base::getApplication('smartslider')->storage->set('youtube', null, json_encode($this->configuration->toArray()));
        }
    }

    public function render() {
        $form = new N2Form();
        $form->loadArray($this->getData());

        $form->loadXMLFile(dirname(__FILE__) . '/configuration.xml');

        echo $form->render('generator');

        try {
            $this->getApi();
        } catch (Exception $e) {
            N2Message::error($e->getMessage());
        }
    }

    public function startAuth($approvalPrompt = 'auto') {
        if (session_id() == "") {
            session_start();
        }
        $this->addData(N2Request::getVar('generator'), false);

        $_SESSION['data'] = $this->getData();

        $client = $this->getApi();
        $client->setApprovalPrompt($approvalPrompt);
        $client->setAccessType('offline');

        return $client->createAuthUrl();
    }

    public function finishAuth() {
        if (session_id() == "") {
            session_start();
        }
        $this->addData($_SESSION['data'], false);
        unset($_SESSION['data']);
        try {
            $client = $this->getApi();
            $client->authenticate($_GET['code']);
            $accessToken = $client->getAccessToken();

            if (!$accessToken) {
                return false;
            } else {
                $data = $this->getData();

                try {
                    $oldAccessToken = json_decode(n2_base64_decode($data['accessToken']), true);
                    if (!is_array($oldAccessToken)) {
                        $oldAccessToken = array();
                    }
                } catch (Exception $e) {
                    $oldAccessToken = array();
                }

                $newAccessToken = array_merge($oldAccessToken, json_decode($accessToken, true));

                if (!isset($newAccessToken['refresh_token'])) {
                    header('Location: ' . $this->startAuth('force'));
                    exit;
                }

                $data['accessToken'] = n2_base64_encode(json_encode($newAccessToken));
                $this->addData($data);

                return true;
            }

            return false;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function getPlayListsAjax() {
        $channelID = N2Request::getVar('channelID');

        $api = $this->getApi();

        $playLists = $this->getPlaylists($api, $channelID);


        $response = array();
        if (count($playLists)) {
            foreach ($playLists AS $playlist) {
                $response[$playlist['id']] = $playlist['snippet']['title'];
            }
        }

        return $response;
    }


    public function getPlaylists($api, $channelID) {
        $channelID     = trim($channelID);
        $youtubeClient = new Google_Service_YouTube($api);
        $request       = array(
            'mine'       => true,
            'maxResults' => 50
        );
        if (!empty($channelID)) {
            $request = array(
                'channelId'  => $channelID,
                'maxResults' => 50
            );
        }

        /** @var Google_Service_YouTube_PlaylistListResponse $playlists */
        $playlists = $youtubeClient->playlists->listPlaylists('id,snippet', $request);
        $items     = $playlists['items'];

        while ($nextPageToken = $playlists->getNextPageToken()) {
            $request['pageToken'] = $nextPageToken;
            /** @var Google_Service_YouTube_PlaylistListResponse $playlists */
            $playlists = $youtubeClient->playlists->listPlaylists('id,snippet', $request);
            $items     = array_merge($items, $playlists['items']);
        }

        return $items;

    }

}