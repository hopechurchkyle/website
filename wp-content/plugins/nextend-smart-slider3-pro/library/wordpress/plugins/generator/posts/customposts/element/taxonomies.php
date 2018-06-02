<?php

N2Loader::import('libraries.form.element.list');

class N2ElementTaxonomies extends N2ElementList
{

    function fetchElement() {

        $this->_xml->addChild('option', n2_('Any'))
                   ->addAttribute('value', 0);


        $taxonomies = get_object_taxonomies($this->_form->get('info')->post_type);
        foreach ($taxonomies AS $taxonomy) {
            $terms = get_terms($taxonomy);
            if (count($terms)) {
                $group = $this->_xml->addChild('optgroup', '');
                $group->addAttribute('label', htmlspecialchars(get_taxonomy($taxonomy)->label));
                foreach ($terms AS $term) {
                    $this->addTerm($group, $term);
                }
            }
        }

        return parent::fetchElement();
    }


    protected function addTerm($group, $term) {
        $group->addChild('option', htmlspecialchars($term->name))
              ->addAttribute('value', $term->taxonomy . '|*|' . $term->term_id);
    }
}