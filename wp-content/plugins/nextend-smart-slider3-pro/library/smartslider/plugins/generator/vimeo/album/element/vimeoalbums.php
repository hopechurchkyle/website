<?php

N2Loader::import('libraries.form.element.list');

class N2ElementVimeoAlbums extends N2ElementList {

    function fetchElement() {
        try {
            /** @var N2GeneratorInfo $info */
            $info = $this->_form->get('info');
            /** @var \Vimeo\Vimeo $client */
            $client   = $info->getConfiguration()
                             ->getApi();
            $response = $client->request('/me/albums', array(
                'per_page' => 100
            ));

            if ($response['status'] == 200) {
                $albums = $response['body']['data'];
                foreach ($albums AS $album) {
                    $this->_xml->addChild('option', htmlentities($album['name']))
                               ->addAttribute('value', $album['uri']);
                }

                $this->_default = $albums[0]['uri'];
            }
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }

        return parent::fetchElement();
    }

}
