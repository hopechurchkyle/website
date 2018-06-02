<?php

N2Loader::import('libraries.form.element.list');

class N2ElementWebDoradoGalleries extends N2ElementList
{
    function fetchElement() {
        global $wpdb;
        $galleries = $wpdb->get_results("SELECT id, name FROM " . $wpdb->base_prefix . "bwg_gallery WHERE published = 1");

        $this->_xml->addChild('option', 'All')
                   ->addAttribute('value', 0);
        foreach ($galleries AS $gallery) {
            $this->_xml->addChild('option', htmlspecialchars($gallery->name))
                       ->addAttribute('value', $gallery->id);
        }
        return parent::fetchElement();
    }
}
