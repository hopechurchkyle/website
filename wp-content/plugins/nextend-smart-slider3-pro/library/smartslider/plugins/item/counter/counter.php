<?php
N2Loader::import('libraries.slider.slides.slide.item.itemFactoryAbstract', 'smartslider');
N2Loader::import('libraries.image.color');

class N2SSPluginItemFactoryCounter extends N2SSPluginItemFactoryAbstract {

    var $type = 'counter';

    protected $priority = 11;

    protected $layerProperties = array();

    protected $group = 'Content';

    protected $class = 'N2SSItemCounter';

    private static $font = '{"name":"Static","data":[{"extra":"","color":"ffffffff","size":"40||px","tshadow":"0|*|0|*|0|*|000000ff","lineheight":"1","bold":0,"italic":0,"underline":0,"align":"center","letterspacing":"normal","wordspacing":"normal","texttransform":"none"}]}';

    private static $fontLabel = '{"name":"Static","data":[{"extra":"","color":"ffffffff","size":"16||px","tshadow":"0|*|0|*|0|*|000000ff","lineheight":"2","bold":0,"italic":0,"underline":0,"align":"center","letterspacing":"normal","wordspacing":"normal","texttransform":"none"}]}';


    public function __construct() {
        $this->_title = n2_x('Counter', 'Slide item');
    }

    function getValues() {
        self::initDefault();

        return array(
            'value'             => 50,
            'startvalue'        => 0,
            'pre'               => '',
            'post'              => '%',
            'label'             => '',
            'font'              => self::$font,
            'fontlabel'         => self::$fontLabel,
            'labelplacement'    => 'after',
            'animationduration' => 1000,
            'animationdelay'    => 0
        );
    }

    function getPath() {
        return dirname(__FILE__) . DIRECTORY_SEPARATOR . $this->type . DIRECTORY_SEPARATOR;
    }

    public static function getFilled($slide, $data) {
        $data->set('label', $slide->fill($data->get('label', '')));

        return $data;
    }

    public function prepareExport($export, $data) {
        $export->addVisual($data->get('font'));
        $export->addVisual($data->get('fontlabel'));
    }

    public function prepareImport($import, $data) {
        $data->set('font', $import->fixSection($data->get('font')));
        $data->set('fontlabel', $import->fixSection($data->get('fontlabel')));

        return $data;
    }

    private static function initDefault() {
        static $inited = false;
        if (!$inited) {
            $res = N2StorageSectionAdmin::get('smartslider', 'default', 'item-counter-font');
            if (is_array($res)) {
                self::$font = $res['value'];
            }
            if (is_numeric(self::$font)) {
                N2FontRenderer::preLoad(self::$font);
            }

            $res = N2StorageSectionAdmin::get('smartslider', 'default', 'item-counter-fontlabel');
            if (is_array($res)) {
                self::$fontLabel = $res['value'];
            }
            if (is_numeric(self::$fontLabel)) {
                N2FontRenderer::preLoad(self::$fontLabel);
            }
            $inited = true;
        }
    }

    public static function onSmartsliderDefaultSettings(&$settings) {
        self::initDefault();
        $settings['font'][] = '<param name="item-counter-font" type="font" previewmode="simple" label="' . n2_('Item') . ' - ' . n2_('Counter') . '" default="' . htmlspecialchars(self::$font, ENT_QUOTES) . '" />';
        $settings['font'][] = '<param name="item-counter-fontlabel" type="font" previewmode="simple" label="' . n2_('Item') . ' - ' . n2_('Counter label') . '" default="' . htmlspecialchars(self::$fontLabel, ENT_QUOTES) . '" />';
    }

}

N2Plugin::addPlugin('ssitem', 'N2SSPluginItemFactoryCounter');

N2Pluggable::addAction('smartsliderDefault', 'N2SSPluginItemFactoryCounter::onSmartsliderDefaultSettings');

