<?php

N2Loader::import('libraries.form.element.list');

class N2ElementTheEventsCalendarVenues extends N2ElementList
{

    function fetchElement() {
        $args   = array(
            'posts_per_page'   => 5,
            'offset'           => 0,
            'category'         => '',
            'category_name'    => '',
            'orderby'          => 'date',
            'order'            => 'DESC',
            'include'          => '',
            'exclude'          => '',
            'meta_key'         => '',
            'meta_value'       => '',
            'post_mime_type'   => '',
            'post_parent'      => '',
            'post_status'      => 'publish',
            'suppress_filters' => true,
            'post_type'        => 'tribe_venue'
        );
        $venues = get_posts($args);

        $this->_xml->addChild('option', 'All')
                   ->addAttribute('value', 0);
        if (count($venues)) {
            foreach ($venues AS $option) {
                $this->_xml->addChild('option', htmlspecialchars(' - ' . $option->post_title))
                           ->addAttribute('value', $option->ID);
            }
        }

        return parent::fetchElement();
    }
}
