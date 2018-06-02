<?php

N2Loader::import('libraries.form.element.list');

class N2ElementPosttypes extends N2ElementList
{
    function fetchElement() {

        $this->_xml->addChild('option', n2_('All'))
                   ->addAttribute('value', 0);

        $postTypes = get_post_types();
        foreach ($postTypes AS $postType) {
            $this->_xml->addChild('option', '- ' . $postType)
                       ->addAttribute('value', $postType);
        }

        return parent::fetchElement();
    }
}