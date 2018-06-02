<?php
N2Loader::import('libraries.plugins.N2SliderGeneratorPluginAbstract', 'smartslider');

class N2SSPluginGeneratorNextGENGallery extends N2PluginBase
{

    private static $group = 'nextgengallery';
    public static $groupLabel = 'NextGEN Gallery';


    function onGeneratorList(&$group, &$list) {
        $installed           = (class_exists('nggGallery', false) || class_exists('C_Component_Registry', false));
        $group[self::$group] = self::$groupLabel;

        if (!isset($list[self::$group])) $list[self::$group] = array();

        $list[self::$group]['gallery'] = N2GeneratorInfo::getInstance(self::$groupLabel, 'Images', $this->getPath() . 'gallery')
                                                        ->setInstalled($installed)
                                                        ->setUrl('https://wordpress.org/plugins/nextgen-gallery/')
                                                        ->setType('image');
    }

    function getPath() {
        return dirname(__FILE__) . DIRECTORY_SEPARATOR;
    }
}

N2Plugin::addPlugin('ssgenerator', 'N2SSPluginGeneratorNextgenGallery');
