<?php

N2Loader::import('libraries.slider.generator.abstract', 'smartslider');

class N2GeneratorFacebookPostsByPage extends N2GeneratorAbstract {

    protected function _getData($count, $startIndex) {

        $api = $this->info->getConfiguration()
                          ->getApi();

        $data = array();
        try {
            $result = $api->sendRequest('GET', $this->data->get('page', 'nextendweb') . '/' . $this->data->get('endpoint', 'feed'), array(
                'offset' => $startIndex,
                'limit'  => $count,
                'fields' => implode(',', array(
                    'from',
                    'updated_time',
                    'link',
                    'picture',
                    'source',
                    'description',
                    'message',
                    'story',
                    'type',
                    'full_picture'
                ))
            ))
                          ->getDecodedBody();

            for ($i = 0; $i < count($result['data']); $i++) {
                $post                       = $result['data'][$i];
                $record['link']             = isset($post['link']) ? $post['link'] : '';
                $remove_spec_chars          = $this->data->get("remove_spec_chars", 0);
                if($remove_spec_chars){
                    if(isset($post['message']) && !empty($post['message'])){
                        $description            = iconv('UTF-8', 'ISO-8859-1//TRANSLIT//IGNORE', $this->makeClickableLinks($post['message']));
                        $record['description']  = str_replace("\n", "<br/>", $description);                        
                    } else {
                        $record['description'] = "";
                    }
                } else{
                    $record['description']  = isset($post['message']) ? str_replace("\n", "<br/>", $this->makeClickableLinks($post['message'])) : '';
                }
                $record['message']          = $record['description'];
                $record['story']            = isset($post['story']) ? $this->makeClickableLinks($post['story']) : '';
                $record['type']             = $post['type'];
                $record['image']            = isset($post['full_picture']) ? $post['full_picture'] : '';

                $sourceTranslate = $this->data->get('sourcetranslatedate', '');
                $translateValue  = explode('||', $sourceTranslate);
                $translate       = array();
                if ($sourceTranslate != 'January->January||February->February||March->March' && !empty($translateValue)) {
                    foreach ($translateValue AS $tv) {
                        $translateArray = explode('->', $tv);
                        if (!empty($translateArray) && count($translateArray) == 2) {
                            $translate[$translateArray[0]] = $translateArray[1];
                        }
                    }
                }
                $record['date']             = $this->translate(date($this->data->get('dateformat', 'Y-m-d'), strtotime($result['data'][$i]['updated_time'])), $translate);
                $record['time']             = date($this->data->get('timeformat', 'H:i:s'), strtotime($result['data'][$i]['updated_time']));
                

                $data[$i] = &$record;
                unset($record);
            }
        } catch (Exception $e) {
            N2Message::error($e->getMessage());
        }

        return $data;
    }

    private function translate($from, $translate) {
        if (!empty($translate) && !empty($from)) {
            foreach ($translate AS $key => $value) {
                $from = str_replace($key, $value, $from);
            }
        }
        return $from;
    }
}