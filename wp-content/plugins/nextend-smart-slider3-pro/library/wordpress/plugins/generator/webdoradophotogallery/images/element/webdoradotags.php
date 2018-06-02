<?php

N2Loader::import('libraries.form.element.list');

class N2ElementWebDoradoTags extends N2ElementList
{

    function fetchElement() {
        global $wpdb;
        $tags = $wpdb->get_results("SELECT term_id, name FROM wp_terms WHERE term_id IN
                                          (SELECT term_id FROM wp_term_taxonomy WHERE taxonomy = 'bwg_tag')");

        $this->_xml->addChild('option', 'All')
                   ->addAttribute('value', 0);
        foreach ($tags AS $tag) {
            $this->_xml->addChild('option', htmlspecialchars($tag->name))
                       ->addAttribute('value', $tag->term_id);
        }

        return parent::fetchElement();
    }
}
