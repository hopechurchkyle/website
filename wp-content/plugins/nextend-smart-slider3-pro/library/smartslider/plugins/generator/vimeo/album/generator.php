<?php

N2Loader::import('libraries.slider.generator.abstract', 'smartslider');

class N2GeneratorVimeoAlbum extends N2GeneratorAbstract {

    protected function _getData($count, $startIndex) {
        $data = array();
        /** @var \Vimeo\Vimeo $client */
        $client = $this->info->getConfiguration()
                             ->getApi();

        $album = $this->data->get('album', '');
        if (!empty($album)) {
            $response = $client->request($album . '/videos', array(
                'per_page' => $startIndex + $count
            ));

            if ($response['status'] == 200) {
                $videos = array_slice($response['body']['data'], $startIndex, $count);

                foreach ($videos AS $video) {
                    $record = array();

                    $record['title']       = $video['name'];
                    $record['description'] = $video['description'];
                    $record['url']        = $video['link'];

                    foreach ($video['pictures']['sizes'] AS $picture) {
                        $record['image' . $picture['width'] . 'x' . $picture['height']]     = $picture['link'];
                        $record['imageplay' . $picture['width'] . 'x' . $picture['height']] = $picture['link_with_play_button'];
                    }

                    $data[] = &$record;
                    unset($record);
                }
            }
        }

        return $data;
    }
}