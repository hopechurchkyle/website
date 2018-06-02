<?php
N2Loader::import('libraries.settings.settings', 'smartslider');

class N2SSPluginGeneratorVimeo extends N2PluginBase {

    public static $group = 'vimeo';
    public static $groupLabel = 'Vimeo';

    protected $configurationClass = 'N2SliderGeneratorVimeoConfiguration';

    function onGeneratorList(&$group, &$list) {
        $group[self::$group] = self::$groupLabel;

        if (!isset($list[self::$group])) {
            $list[self::$group] = array();
        }

        $list[self::$group]['album'] = N2GeneratorInfo::getInstance(self::$groupLabel, 'Album', $this->getPath() . 'album')
                                                      ->setType('vimeo')
                                                      ->setConfiguration($this->configurationClass);
    }

    function onSmartSliderConfigurationList(&$list) {

        require_once dirname(__FILE__) . '/configuration.php';
        $class         = $this->configurationClass;
        $configuration = new $class(null);

        $list[self::$group] = array(
            'title'         => n2_('Vimeo generator'),
            'configuration' => $configuration,
            'url'           => array(
                'generator/configure',
                array(
                    'group' => 'vimeo'
                )
            )
        );
    }

    function onNextendGeneratorConfiguration(&$group, &$path) {
        if ($group == self::$group) {
            $path = $this->getPath();
        }
    }

    function getPath() {
        return dirname(__FILE__) . DIRECTORY_SEPARATOR;
    }
}

N2Plugin::addPlugin('ssgenerator', 'N2SSPluginGeneratorVimeo');
