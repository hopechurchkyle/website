<?php
if (N2Platform::$isWordpress) {
    N2Loader::import('libraries.plugins.N2SliderGeneratorPluginAbstract', 'smartslider');

    class N2SSPluginGeneratorMSPosts extends N2SliderGeneratorPluginAbstract {

        public static $_group = 'msposts';
        public static $groupLabel = 'WordPress MultiSite';

        function onGeneratorList(&$group, &$list) {
            if (is_multisite()) {
                $group[self::$_group] = 'Posts';

                if (!isset($list[self::$_group])) $list[self::$_group] = array();

                foreach (get_sites() AS $site) {
                    if ($site->blog_id == get_current_blog_id()) {
                        continue;
                    }
                    $current_blog_details                          = get_blog_details(array('blog_id' => $site->blog_id));
                    $list[self::$_group]['posts' . $site->blog_id] = N2GeneratorInfo::getInstance(self::$groupLabel, n2_('Posts by filter') . ' - ' . $current_blog_details->blogname, $this->getPath() . 'posts')
                                                                                    ->setType('article')
                                                                                    ->setData('blog_id', $site->blog_id);
                    if (!class_exists('N2GeneratorMSPostsPosts' . $site->blog_id)) {
                        require_once($this->getPath() . 'posts' . DIRECTORY_SEPARATOR . 'generator.php');
                        eval('class N2GeneratorMSPostsPosts' . $site->blog_id . ' extends N2GeneratorMSPostsPosts{}');
                    }
                }


            }
        }

        function getPath() {
            return dirname(__FILE__) . DIRECTORY_SEPARATOR;
        }
    }

    N2Plugin::addPlugin('ssgenerator', 'N2SSPluginGeneratorMSPosts');
}
