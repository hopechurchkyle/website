<?php

N2Loader::import('libraries.form.element.list');

class N2ElementYoutubePlaylistByUser extends N2ElementList {

    function fetchElement() {

        N2JS::addInline('
            new N2Classes.FormElementYouTubePlaylists("' . $this->_id . '", "' . N2Base::getApplication('smartslider')->router->createAjaxUrl(array(
                "generator/getData",
                array(
                    'group' => N2Request::getVar('group'),
                    'type'  => N2Request::getVar('type')
                )
            )) . '");
        ');

        try {
            /** @var N2GeneratorInfo $info */
            $info = $this->_form->get('info');

            /** @var N2SliderGeneratorYouTubeConfiguration $config */
            $config = $info->getConfiguration();

            $playlists = $config->getPlaylists($config->getApi(), $this->_form->get('channel-id', ''));

            foreach ($playlists AS $k => $item) {
                $this->_xml->addChild('option', htmlentities($item['snippet']['title']))
                           ->addAttribute('value', $item['id']);
            }

            if (isset($playlists[0])) {
                $this->_default = $playlists[0]['id'];
            }

        } catch (Exception $e) {
            var_dump($e->getMessage());
        }

        return parent::fetchElement();
    }

}
