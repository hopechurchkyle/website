<?php
N2Loader::import('libraries.form.element.list');

class N2ElementParticleJSPresets extends N2ElementList {


    protected $fixedMode = false;

    protected $skins = array();

    function fetchElement() {

        $html = parent::fetchElement();

        N2JS::addInline('new N2Classes.FormElementSkin("' . $this->_id . '", "' . str_replace($this->_name, '', $this->_id) . '", ' . json_encode($this->skins) . ', true);');

        return $html;
    }

    function generateOptions(&$xml) {

        $folder    = NEXTEND_SMARTSLIDER_ASSETS . '/js/particlejs/presets/';
        $files     = N2Filesystem::files($folder);
        $extension = 'json';

        $html = '<option value="0" ' . $this->isSelected('0') . '>' . n2_('Disabled') . '</option>';
        for ($i = 0; $i < count($files); $i++) {
            $pathInfo = pathinfo($files[$i]);
            if (isset($pathInfo['extension']) && $pathInfo['extension'] == $extension) {

                $jsProp = json_decode(N2Filesystem::readFile($folder . $pathInfo['filename'] . '.json'), true);

                $this->skins[$pathInfo['filename']] = array(
                    'color'      => substr($jsProp['particles']["color"]["value"], 1) . str_pad(dechex($jsProp['particles']["opacity"]["value"] * 255), 2, "0", STR_PAD_LEFT),
                    'line-color' => substr($jsProp['particles']["line_linked"]["color"], 1) . str_pad(dechex($jsProp['particles']["line_linked"]["opacity"] * 255), 2, "0", STR_PAD_LEFT),
                    'hover'      => $jsProp['interactivity']["events"]["onhover"]['enable'] ? $jsProp['interactivity']["events"]["onhover"]['mode'] : 0,
                    'click'      => $jsProp['interactivity']["events"]["onclick"]['enable'] ? $jsProp['interactivity']["events"]["onclick"]['mode'] : 0,
                    'number'     => $jsProp['particles']["number"]["value"],
                    'speed'      => $jsProp['particles']["move"]["speed"]
                );
                $html .= '<option value="' . $pathInfo['filename'] . '" ' . $this->isSelected($pathInfo['filename']) . '>' . ucfirst($pathInfo['filename']) . '</option>';
            }
        }
        $html .= '<option value="custom" ' . $this->isSelected('custom') . '>' . n2_('Custom') . '</option>';

        return $html;
    }
}
