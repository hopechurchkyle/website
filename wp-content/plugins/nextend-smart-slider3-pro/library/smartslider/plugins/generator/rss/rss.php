<?php
N2Loader::import('libraries.plugins.N2SliderGeneratorPluginAbstract', 'smartslider');

class N2SSPluginGeneratorRSS extends N2PluginBase
{

    public static $group = 'rss';
    public static $groupLabel = 'RSS';

    function onGeneratorList(&$group, &$list) {
        $group[self::$group] = self::$groupLabel;

        if (!isset($list[self::$group])) {
            $list[self::$group] = array();
        }

        $list[self::$group]['feed'] = N2GeneratorInfo::getInstance(self::$groupLabel, n2_('Feed'), $this->getPath() . 'feed')
                                                     ->setInstalled(true)
                                                     ->setType('article');
    }

    function getPath() {
        return dirname(__FILE__) . DIRECTORY_SEPARATOR;
    }
}

N2Plugin::addPlugin('ssgenerator', 'N2SSPluginGeneratorRSS');
