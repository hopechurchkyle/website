<?php
N2Loader::import('libraries.plugins.N2SliderGeneratorPluginAbstract', 'smartslider');

class N2SSPluginGeneratorWooCommerce extends N2SliderGeneratorPluginAbstract
{

    public static $_group = 'woocommerce';
    public static $groupLabel = 'WooCommerce';

    function onGeneratorList(&$group, &$list) {
        $installed = class_exists('WooCommerce', false);
        $url       = 'http://www.woothemes.com/woocommerce/';

        $group[self::$_group] = self::$groupLabel;

        if (!isset($list[self::$_group])) {
            $list[self::$_group] = array();
        }

        $list[self::$_group]['productsbyfilter'] = N2GeneratorInfo::getInstance(self::$groupLabel, n2_('Products by filter'), $this->getPath() . 'productsbyfilter')
                                                                  ->setInstalled($installed)
                                                                  ->setUrl($url)
                                                                  ->setType('product');

        $list[self::$_group]['productsbyids'] = N2GeneratorInfo::getInstance(self::$groupLabel, n2_('Products by IDs'), $this->getPath() . 'productsbyids')
                                                               ->setInstalled($installed)
                                                               ->setUrl($url)
                                                               ->setType('product');

        $list[self::$_group]['categories'] = N2GeneratorInfo::getInstance(self::$groupLabel, n2_('Categories'), $this->getPath() . 'categories')
                                                                ->setInstalled($installed)
                                                                ->setUrl($url)
                                                                ->setType('article');
    }

    function getPath() {
        return dirname(__FILE__) . DIRECTORY_SEPARATOR;
    }
}

N2Plugin::addPlugin('ssgenerator', 'N2SSPluginGeneratorWooCommerce');

