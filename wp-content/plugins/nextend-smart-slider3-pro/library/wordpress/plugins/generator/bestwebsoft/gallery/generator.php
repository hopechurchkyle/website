<?php

class N2GeneratorBestWebSoftGallery extends N2GeneratorAbstract
{

    protected function _getData($count, $startIndex) {
        $data = array();

        $posts = get_posts(array(
            'posts_per_page' => -1,
            "post_status"    => "inherit",
            "post_type"      => "attachment",
            "orderby"        => "menu_order",
            "order"          => "ASC",
            "post_mime_type" => "image/jpeg,image/gif,image/jpg,image/png",
            'post_parent'    => $this->data->get('gallery', ''),
            'offset'         => $startIndex,
            'posts_per_page' => $count,
        ));

        $i = 0;
        foreach ($posts as $p) {
            $meta = get_post_meta($p->ID);

            $src = wp_get_attachment_image_src($p->ID, "full");
            $data[$i]['image'] = N2ImageHelper::dynamic($src[0]);
            $thumbnail         = wp_get_attachment_image_src($p->ID, "thumbnail");
            if ($thumbnail[0] != null) {
                $data[$i]['thumbnail'] = N2ImageHelper::dynamic($thumbnail[0]);
            } else {
                $data[$i]['thumbnail'] = $data['image'];
            }

            if (array_key_exists('gllr_image_text', $meta)) {
                $data[$i]['title'] = $meta['gllr_image_text'][0];
            } else {
                $data[$i]['title'] = $p->post_title;
            }

            if (array_key_exists('gllr_image_alt_tag', $meta)) {
                $data[$i]['description'] = $meta['gllr_image_alt_tag'][0];
            }
            $data[$i]['url']       = get_permalink($p->post_parent);
            $data[$i]['url_label'] = sprintf(n2_('View %s'), n2_('gallery'));

            if (array_key_exists('gllr_link_url', $meta)) {
                $data[$i]['external_url'] = $meta['gllr_link_url'][0];
            } else {
                $data[$i]['external_url'] = '#';
            }

            $data[$i]['comment_count'] = $p->comment_count;
            $data[$i]['ID']            = $p->ID;

            $i++;
        }

        return $data;
    }

}
