<?php
N2Loader::import('libraries.plugins.N2SliderGeneratorPluginAbstract', 'smartslider');

class N2SSPluginGeneratorEventsManager extends N2SliderGeneratorPluginAbstract
{

    public static $_group = 'eventsmanager';
    public static $groupLabel = 'Events Manager';

    function onGeneratorList(&$group, &$list) {
        $installed = class_exists('EM_Events', false);

        $group[self::$_group] = self::$groupLabel;

        if (!isset($list[self::$_group])) {
            $list[self::$_group] = array();
        }

        $list[self::$_group]['events'] = N2GeneratorInfo::getInstance(self::$groupLabel, 'Events', $this->getPath() . 'events')
                                                        ->setInstalled($installed)
                                                        ->setType('event')
                                                        ->setUrl('https://wordpress.org/plugins/events-manager/');
    }

    function getPath() {
        return dirname(__FILE__) . DIRECTORY_SEPARATOR;
    }

}

N2Plugin::addPlugin('ssgenerator', 'N2SSPluginGeneratorEventsManager');

