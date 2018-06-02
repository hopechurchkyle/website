<?php

N2Loader::import('libraries.slider.generator.abstract', 'smartslider');

class N2GeneratorPostsCustomPosts extends N2GeneratorAbstract {

    protected function _getData($count, $startIndex) {
        global $post, $wp_the_query;
        $tmpPost         = $post;
        $tmpWp_the_query = $wp_the_query;
        $wp_the_query    = null;
        if (has_filter( 'the_content', 'siteorigin_panels_filter_content' )){
        	$siteorigin_panels_filter_content = true;
        	remove_filter( 'the_content', 'siteorigin_panels_filter_content' );
        } else {
            $siteorigin_panels_filter_content = false;
        }

        $taxonomies = explode('||', $this->data->get('taxonomies', ''));
        if (!in_array('0', $taxonomies)) {
            $tax_array = array();
            foreach ($taxonomies AS $tax) {
                $parts = explode('|*|', $tax);
                if (!is_array(@$tax_array[$parts[0]]) || !in_array($parts[1], $tax_array[$parts[0]])) {
                    $tax_array[$parts[0]][] = $parts[1];
                }
            }

            $tax_query = array();
            foreach ($tax_array AS $taxonomy => $terms) {
                $tax_query[] = array(
                    'taxonomy' => $taxonomy,
                    'terms'    => $terms,
                    'field'    => 'id'
                );
            }
            $tax_query['relation'] = 'OR';
        } else {
            $tax_query = '';
        }

        list($orderBy, $order) = N2Parse::parse($this->data->get('postsorder', 'post_date|*|desc'));

        $compare       = array();
        $compare_value = $this->data->get('postmetacompare', '');
        if (!empty($compare_value)) {
            $compare = array( 'compare' => $compare_value );
        }

        $postMetaKey = $this->data->get('postmetakey', '0');
        if (!empty($postMetaKey)) {
            $postMetaValue = $this->data->get('postmetavalue', '');
            $getPostMeta   = array(
                'meta_query' => array(
                    array(
                        'key'   => $postMetaKey,
                        'value' => $postMetaValue,
                    ) + $compare ) );
        } else {
            $getPostMeta = array();
        }

        $post_status = explode(",", $this->data->get('poststatus', 'publish'));

        $meta_order_key = $this->data->get('meta_order_key');
        $meta_key       = '';
        if (!empty($meta_order_key)) {
            $orderBy  = $this->data->get('meta_orderby', 'meta_value_num');
            $meta_key = $meta_order_key;
        }

        $getPosts = array(
            'include'          => '',
            'exclude'          => '',
            'meta_key'         => $meta_key,
            'meta_value'       => '',
            'post_type'        => $this->info->post_type,
            'post_mime_type'   => '',
            'post_parent'      => '',
            'post_status'      => $post_status,
            'suppress_filters' => false,
            'offset'           => $startIndex,
            'posts_per_page'   => $count,
            'orderby'          => $orderBy,
            'order'            => $order,
            'tax_query'        => $tax_query
        );

        $getPosts = array_merge($getPosts, $getPostMeta);

        $ids = $this->getIDs();

        if (count($ids) <> 1 || $ids[0] <> 0) {
            $getPosts += array(
                'post__in' => $ids
            );
        }

        $posts = get_posts($getPosts);

        $data = array();

        for ($i = 0; $i < count($posts); $i++) {
            $record = array();

            $post = $posts[$i];
            setup_postdata($post);

            $record['id'] = $post->ID;


            $record['url']         = get_permalink();
            $record['title']       = apply_filters('the_title', get_the_title());
            $record['description'] = $record['content'] = get_the_content();
            $record['author_name'] = $record['author'] = get_the_author();
            $record['author_url']  = get_the_author_meta('url');
            $record['date']        = get_the_date();
            $record['modified']    = get_the_modified_date();

            $thumbnail_id             = get_post_thumbnail_id($post->ID);
            $record['featured_image'] = wp_get_attachment_url($thumbnail_id);
            if (!$record['featured_image']) {
                $record['featured_image'] = '';
            } else {
                $thumbnail_meta = get_post_meta($thumbnail_id, '_wp_attachment_metadata', true);
                if (isset($thumbnail_meta['sizes'])) {
                    $sizes  = $this->getImageSizes($thumbnail_id, $thumbnail_meta['sizes']);
                    $record = array_merge($record, $sizes);
                }
                $record['alt'] = '';
                $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                if(isset($alt)){
                    $record['alt'] = $alt;
                }
            }

            $record['thumbnail'] = $record['image'] = $record['featured_image'];
            $record['url_label'] = 'View';

            $post_meta = get_post_meta($post->ID);
            if (count($post_meta)) {
                foreach ($post_meta AS $key => $value) {
                    foreach ($value AS $v) {
                        if (!empty($v)) {
                            $key = str_replace(array(
                                '_',
                                '-'
                            ), array(
                                '',
                                ''
                            ), $key);
                            if (array_key_exists($key, $record)) {
                                $key = 'meta' . $key;
                            }
                            $record[$key] = $v;
                        }
                    }
                }
            }

            if (class_exists('acf')) {
                $fields = get_fields($post->ID);
                if (count($fields) && is_array($fields) && !empty($fields)) {
                    foreach ($fields AS $k => $v) {
                        $type = $this->getACFType($k, $post->ID);
                        $k    = str_replace('-', '', $k);

                        while (isset($record[$k])) {
                            $k = 'acf_' . $k;
                        };
                        if (!is_array($v) && !is_object($v)) {
                            if ($type['type'] == "image" && is_numeric($type["value"])) {
                                $thumbnail_meta = wp_get_attachment_metadata($type["value"]);
                                $src            = wp_get_attachment_image_src($v, $thumbnail_meta['file']);
                                $v              = $src[0];
                            }
                            $record[$k] = $v;
                        } else if (!is_object($v)) {
                            if (isset($v['url'])) {
                                $record[$k] = $v['url'];
                            } else if (is_array($v)) {
                                foreach ($v AS $v_v => $k_k) {
                                    if (isset($k_k['url'])) {
                                        $record[$k . $v_v] = $k_k['url'];
                                    }
                                }
                            }
                        }
                        if ($type['type'] == "image" && (is_numeric($type["value"]) || is_array($type['value']))) {
                            if (is_array($type['value'])) {
                                $sizes = $this->getImageSizes($type["value"]["id"], $type["value"]["sizes"], $k);
                            } else {
                                $thumbnail_meta = wp_get_attachment_metadata($type["value"]);
                                $sizes          = $this->getImageSizes($type["value"], $thumbnail_meta['sizes'], $k);
                            }
                            $record = array_merge($record, $sizes);
                        }
                    }
                }
            }
            
            $record['excerpt']     = get_the_excerpt();

            $data[$i] = &$record;
            unset($record);
        }
        if ($siteorigin_panels_filter_content){
        	add_filter( 'the_content', 'siteorigin_panels_filter_content' );
        }

        $wp_the_query = $tmpWp_the_query;

        wp_reset_postdata();
        $post = $tmpPost;
        if ($post) setup_postdata($post);

        return $data;
    }

    protected function getImageSizes($thumbnail_id, $sizes, $prefix = false) {
        $data = array();
        if (!$prefix) {
            $prefix = "";
        } else {
            $prefix = $prefix . "_";
        }
        foreach ($sizes AS $size => $image) {
            $imageSrc                         = wp_get_attachment_image_src($thumbnail_id, $size);
            $data[$prefix . 'image_' . $this->clearSizeName($size)] = $imageSrc[0];
        }
        return $data;
    }

    protected function clearSizeName ($size){
        return preg_replace("/-/", "_", $size);
    }

    protected function getACFType($key, $post_id) {
        $type = get_field_object($key, $post_id);
        return $type;
    }
}