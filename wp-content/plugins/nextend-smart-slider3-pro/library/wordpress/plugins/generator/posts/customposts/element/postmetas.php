<?php

N2Loader::import('libraries.form.element.list');

class N2ElementPostmetas extends N2ElementList {

    function fetchElement() {

        $this->_xml->addChild('option', n2_('Nothing'))
            ->addAttribute('value', 0);

        $metaKeys = $this->generate_meta_keys();
        foreach ($metaKeys AS $metaKey) {
            $this->_xml->addChild('option', $metaKey)
                ->addAttribute('value', $metaKey);
        }

        return parent::fetchElement();
    }

    function generate_meta_keys() {
        global $wpdb;
        $post_type = $this->_form->get('info')->post_type;
        $query     = "
        SELECT DISTINCT($wpdb->postmeta.meta_key)
        FROM $wpdb->posts
        LEFT JOIN $wpdb->postmeta
        ON $wpdb->posts.ID = $wpdb->postmeta.post_id
        WHERE $wpdb->posts.post_type = '%s'
    ";
        $meta_keys = $wpdb->get_col($wpdb->prepare($query, $post_type));
        return $meta_keys;
    }
}