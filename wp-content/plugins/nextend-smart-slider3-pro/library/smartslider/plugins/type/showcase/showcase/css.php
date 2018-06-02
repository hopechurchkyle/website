<?php
N2Loader::import('libraries.image.color');

class N2SmartSliderCSSShowcase extends N2SmartSliderCSSAbstract {

    protected function renderType(&$context) {
        $params = $this->slider->params;


        $slideDistance = intval($params->get('slide-distance'));
        if ($slideDistance == 0) {
            $slideDistance = -1;
        }

        switch ($params->get('animation-direction')) {
            case 'vertical':
                $context['distanceh'] = 0;
                $context['distancev'] = $slideDistance . 'px';
                break;
            default:
                $context['distancev'] = 0;
                $context['distanceh'] = $slideDistance . 'px';
        }


        $context['perspective'] = intval($params->get('perspective')) . 'px';


        $width  = intval($context['width']);
        $height = intval($context['height']);

        $context['backgroundSize']       = $params->get('background-size');
        $context['backgroundAttachment'] = $params->get('background-fixed') ? 'fixed' : 'scroll';

        $borderWidth             = $params->get('border-width');
        $borderColor             = $params->get('border-color');
        $context['borderRadius'] = $params->get('border-radius') . 'px';


        $context['border'] = $borderWidth . 'px';

        $rgba                  = N2Color::hex2rgba($borderColor);
        $context['borderrgba'] = 'RGBA(' . $rgba[0] . ',' . $rgba[1] . ',' . $rgba[2] . ',' . round($rgba[3] / 127, 2) . ')';
        $context['borderhex']  = '#' . substr($borderColor, 0, 6);

        $width                   = $width - $borderWidth * 2;
        $height                  = $height - $borderWidth * 2;
        $context['inner1height'] = $height . 'px';

        $context['fullcanvaswidth']  = $width . 'px';
        $context['fullcanvasheight'] = $height . 'px';

        $context['canvaswidth']  = min($width, max(50, intval($params->get('slide-width')))) . 'px';
        $context['canvasheight'] = min($height, max(50, intval($params->get('slide-height')))) . 'px';

        N2LESS::addFile(N2Filesystem::translate(dirname(__FILE__) . NDS . 'style.n2less'), $this->slider->cacheId, $context, NEXTEND_SMARTSLIDER_ASSETS . '/less' . NDS);
    }
}