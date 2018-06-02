<?php

N2Loader::import('libraries.form.element.list');

class N2ElementBestWebSoftGalleries extends N2ElementList
{

    function fetchElement() {
        $args      = array(
            'post_type'    => 'gallery',
            'child_of'     => 0,
            'parent'       => '',
            'orderby'      => 'name',
            'order'        => 'ASC',
            'hide_empty'   => 0,
            'hierarchical' => 1,
            'exclude'      => '',
            'include'      => '',
            'number'       => '',
            'pad_counts'   => false
        );
        $galleries = get_posts($args);
        if (count($galleries)) {
            foreach ($galleries AS $gallery) {
                $this->_xml->addChild('option', htmlspecialchars($gallery->post_title))
                           ->addAttribute('value', $gallery->ID);
            }
            if ($this->getValue() == '') {
                $this->_form->set($this->_name, $galleries[0]->ID);
            }
        }

        return parent::fetchElement();
    }
}
