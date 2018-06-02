<?php
N2Loader::import('libraries.plugins.N2SliderGeneratorPluginAbstract', 'smartslider');

class N2SSPluginGeneratorBestWebSoft extends N2SliderGeneratorPluginAbstract
{

    public static $_group = 'bestwebsoft';
    public static $groupLabel = 'BestWebSoft Gallery';

    function onGeneratorList(&$group, &$list) {
        $installed            = function_exists('gllr_plugin_activate');
        $group[self::$_group] = self::$groupLabel;

        if (!isset($list[self::$_group])) {
            $list[self::$_group] = array();
        }

        $list[self::$_group]['gallery'] = N2GeneratorInfo::getInstance(self::$groupLabel, 'Images', $this->getPath() . 'gallery')
                                                         ->setInstalled($installed)
                                                         ->setUrl('https://wordpress.org/plugins/gallery-plugin/')
                                                         ->setType('image_extended');
    }

    function getPath() {
        return dirname(__FILE__) . DIRECTORY_SEPARATOR;
    }

}

N2Plugin::addPlugin('ssgenerator', 'N2SSPluginGeneratorBestWebSoft');

