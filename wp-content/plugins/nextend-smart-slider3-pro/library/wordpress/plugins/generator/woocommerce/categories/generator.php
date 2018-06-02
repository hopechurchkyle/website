<?php

N2Loader::import('libraries.slider.generator.abstract', 'smartslider');

class N2GeneratorWooCommerceCategories extends N2GeneratorAbstract
{

    var $categories = array();

    public function filterName($name) {
        return $name . N2Translation::getCurrentLocale() . get_woocommerce_currency();
    }

    public static function cacheKey($params) {
        return get_woocommerce_currency();
    }

    function getAllCategories($parent, $args, $level, $limit = 0) {
        $args['parent'] = $parent;

        $limit++;
        if ($level == 0 || $limit <= $level) {
            $cats = get_categories($args);
        } else {
            $cats = array();
        }

        foreach ($cats as $cat) {
            if ($cat->parent == $parent) {
                $this->categories[] = $cat;
                $this->getAllCategories($cat->cat_ID, $args, $level, $limit);
            }
        }
    }

    protected function _getData($count, $startIndex) {
        $mainCat = $this->data->get('categories', '0');
        $args    = array(
            'child_of'     => 0,
            'hide_empty'   => 0,
            'hierarchical' => 1,
            'exclude'      => '',
            'include'      => '',
            'number'       => '',
            'taxonomy'     => 'product_cat',
            'pad_counts'   => false
        );

        $level = $this->data->get('level', '0');

        $this->getAllCategories($mainCat, $args, $level);
        $this->categories = array_slice($this->categories, $startIndex, $count);
        $data             = array();
        foreach ($this->categories AS $category) {
            $image = wp_get_attachment_url(get_woocommerce_term_meta($category->term_id, 'thumbnail_id', true));
            if (!$image) $image = '';
            $r      = array(
                'title'       => $category->name,
                'description' => $category->description,
                'image'       => $image,
                'count'       => $category->count,
                'url'         => get_category_link($category->term_id),
                'id'          => $category->term_id
            );
            $data[] = $r;
        }

        return $data;
    }

}
