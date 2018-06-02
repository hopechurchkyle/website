<?php
N2Loader::import('libraries.plugins.N2SliderGeneratorPluginAbstract', 'smartslider');

class N2SSPluginGeneratorTheEventsCalendar extends N2SliderGeneratorPluginAbstract
{

    public static $group = 'theeventscalendar';
    public static $groupLabel = 'The Events Calendar';

    function onGeneratorList(&$group, &$list) {
        $installed           = class_exists('Tribe__Events__Main', false);
        $group[self::$group] = self::$groupLabel;

        if (!isset($list[self::$group])) {
            $list[self::$group] = array();
        }
        $list[self::$group]['events'] = N2GeneratorInfo::getInstance(self::$groupLabel, n2_('Events'), $this->getPath() . 'events')
                                                       ->setInstalled($installed)
                                                       ->setUrl('https://wordpress.org/plugins/the-events-calendar/')
                                                       ->setType('event');
    }

    function getPath() {
        return dirname(__FILE__) . DIRECTORY_SEPARATOR;
    }

}

N2Plugin::addPlugin('ssgenerator', 'N2SSPluginGeneratorTheEventsCalendar');

