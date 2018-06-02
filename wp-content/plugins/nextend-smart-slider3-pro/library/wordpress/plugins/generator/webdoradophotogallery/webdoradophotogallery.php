<?php
N2Loader::import('libraries.plugins.N2SliderGeneratorPluginAbstract', 'smartslider');

class N2SSPluginGeneratorWebDoradoPhotoGallery extends N2SliderGeneratorPluginAbstract
{

public static $group = 'webdorado';
public static $groupLabel = 'Web-Dorado Photo Gallery';

function onGeneratorList(&$group, &$list) {
    $installed           = defined('WD_BWG_DIR');
    $url                 = 'https://wordpress.org/plugins/photo-gallery/';
    $group[self::$group] = self::$groupLabel;

    if (!isset($list[self::$group])) {
        $list[self::$group] = array();
    }

    $list[self::$group]['images'] = N2GeneratorInfo::getInstance(self::$groupLabel, 'Images', $this->getPath() . 'images')
                                                   ->setInstalled($installed)
                                                   ->setUrl($url)
                                                   ->setType('image');
}

function getPath() {
    return dirname(__FILE__) . DIRECTORY_SEPARATOR;
}

}

N2Plugin::addPlugin('ssgenerator', 'N2SSPluginGeneratorWebDoradoPhotoGallery');
