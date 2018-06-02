<?php
N2Loader::import('libraries.plugins.N2SliderGeneratorPluginAbstract', 'smartslider');

class N2SSPluginGeneratorAllinOneEventCalendar extends N2SliderGeneratorPluginAbstract
{

    public static $group = 'allinoneeventcalendar';
    public static $groupLabel = 'All-in-One Event Calendar';

    function onGeneratorList(&$group, &$list, $showall = false) {
        $installed           = defined('AI1EC_PATH');
        $group[self::$group] = self::$groupLabel;

        if (!isset($list[self::$group])) {
            $list[self::$group] = array();
        }

        $list[self::$group]['events'] = N2GeneratorInfo::getInstance(self::$groupLabel, n2_('Events'), $this->getPath() . 'events')
                                                       ->setInstalled($installed)
                                                       ->setType('event')
                                                       ->setUrl('https://wordpress.org/plugins/all-in-one-event-calendar/');
    }

    function getPath() {
        return dirname(__FILE__) . DIRECTORY_SEPARATOR;
    }

}

N2Plugin::addPlugin('ssgenerator', 'N2SSPluginGeneratorAllinOneEventCalendar');

