<?php

N2Loader::import('libraries.form.element.list');

class N2ElementNGGalleries extends N2ElementList
{

    function fetchElement() {
        global $wpdb;

        $galleries = $wpdb->get_results("SELECT * FROM " . $wpdb->base_prefix . "ngg_gallery ORDER BY name");

        if (count($galleries)) {
            foreach ($galleries AS $gallery) {
                $this->_xml->addChild('option', htmlspecialchars($gallery->title))
                           ->addAttribute('value', $gallery->gid);
            }

            if ($this->getValue() == '') {
                $this->_form->set($this->_name, $galleries[0]->gid);
            }
        }
        return parent::fetchElement();
    }
}
