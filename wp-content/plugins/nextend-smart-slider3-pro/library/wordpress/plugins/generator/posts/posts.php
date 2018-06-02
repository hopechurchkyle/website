<?php

if (N2Platform::$isWordpress) {
    N2Loader::import('libraries.plugins.N2SliderGeneratorPluginAbstract', 'smartslider');

    class N2SSPluginGeneratorPosts extends N2SliderGeneratorPluginAbstract
    {

        public static $_group = 'posts';
        public static $groupLabel = 'WordPress';

        function onGeneratorList(&$group, &$list) {
            $group[self::$_group] = 'Posts';

            if (!isset($list[self::$_group])) $list[self::$_group] = array();

            $list[self::$_group]['posts'] = N2GeneratorInfo::getInstance(self::$groupLabel, n2_('Posts by filter'), $this->getPath() . 'posts')
                                                           ->setType('article');

            $list[self::$_group]['postsbyids'] = N2GeneratorInfo::getInstance(self::$groupLabel, n2_('Posts by IDs'), $this->getPath() . 'postsbyids')
                                                                ->setType('article');
            $customPosts = get_post_types();
            if (isset($customPosts['post'])) {
                unset($customPosts['post']);
            }
            if (isset($customPosts['nav_menu_item'])) {
                unset($customPosts['nav_menu_item']);
            }
            if (isset($customPosts['revision'])) {
                unset($customPosts['revision']);
            }
            if (isset($customPosts['attachment'])) {
                unset($customPosts['attachment']);
            }
            foreach ($customPosts AS $post_type) {
                $post_type_object = get_post_type_object($post_type);
                if ($post_type_object->public) {
                    $post_type = preg_replace('/[^a-zA-Z0-9_\x7f-\xff]*/', '', $post_type);

                    $list[self::$_group]['customposts__' . $post_type] = N2GeneratorInfo::getInstance(self::$groupLabel, n2_('Custom') . ' - ' . @get_post_type_object($post_type)->labels->name . ' (' . $post_type . ')', $this->getPath() . 'customposts')
                                                                                        ->setType('article')
                                                                                        ->setData('post_type', $post_type);

                    if (!class_exists('NextendGeneratorPostsCustomPosts__' . $post_type)) {
                        require_once($this->getPath() . 'customposts' . DIRECTORY_SEPARATOR . 'generator.php');
                        eval('class N2GeneratorPostsCustomPosts__' . $post_type . ' extends N2GeneratorPostsCustomPosts{}');
                    }
                }
            }
            
            $list[self::$_group]['allcustomposts'] = N2GeneratorInfo::getInstance(self::$groupLabel, n2_('All custom posts'), $this->getPath() . 'allcustomposts')
                                                            ->setType('article');                
        
        }

        function getPath() {
            return dirname(__FILE__) . DIRECTORY_SEPARATOR;
        }
    }

    N2Plugin::addPlugin('ssgenerator', 'N2SSPluginGeneratorPosts');
}