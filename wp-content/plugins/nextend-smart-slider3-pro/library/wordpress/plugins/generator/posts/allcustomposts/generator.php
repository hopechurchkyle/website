<?php

N2Loader::import('libraries.slider.generator.abstract', 'smartslider');

class N2GeneratorPostsAllCustomPosts extends N2GeneratorAbstract
{

    protected function _getData($count, $startIndex) {
        global $post, $wp_the_query;
        $tmpPost         = $post;
        $tmpWp_the_query = $wp_the_query;
        $wp_the_query = null;
        if (has_filter( 'the_content', 'siteorigin_panels_filter_content' )){
        	$siteorigin_panels_filter_content = true;
        	remove_filter( 'the_content', 'siteorigin_panels_filter_content' );
        } else {
        	$siteorigin_panels_filter_content = false;
        }

        $postTypes = explode('||', $this->data->get('posttypes', ''));

        list($orderBy, $order) = N2Parse::parse($this->data->get('postsorder', 'post_date|*|desc'));

        $getPosts = array(
            'include'          => '',
            'exclude'          => '',
            'meta_key'         => '',
            'meta_value'       => '',
            'post_type'        => $postTypes,
            'post_mime_type'   => '',
            'post_parent'      => '',
            'post_status'      => 'publish',
            'suppress_filters' => false,
            'offset'           => $startIndex,
            'posts_per_page'   => $count,
            'orderby'          => $orderBy,
            'order'            => $order
        );

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
            $category = get_the_category();
            if(isset($category[0]->name)){
              $record['category_name'] = $category[0]->name;
            }

            $thumbnail_id             = get_post_thumbnail_id($post->ID);
            $record['featured_image'] = wp_get_attachment_url($thumbnail_id);
            if (!$record['featured_image']) {
                $record['featured_image'] = '';
            } else {
                $thumbnail_meta = get_post_meta($thumbnail_id, '_wp_attachment_metadata', true);
                if (isset($thumbnail_meta['sizes'])) {
                    $sizes = $this->getImageSizes($thumbnail_id, $thumbnail_meta['sizes']);
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
                            $key          = str_replace(array(
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
                        $type   = $this->getACFType($k,$post->ID);
                        $k      = str_replace('-', '', $k);

                        while (isset($record[$k])) {
                            $k  = 'acf_' . $k;
                        };
                        if (!is_array($v) && !is_object($v)) {
                            if($type['type'] == "image" && is_numeric($type["value"])){
                                $thumbnail_meta = wp_get_attachment_metadata($type["value"]);
                                $src = wp_get_attachment_image_src($v, $thumbnail_meta['file']);
                                $v = $src[0];
                            }
                            $record[$k] = $v;
                        } else if (!is_object($v)) {
                            if(isset($v['url'])){
                                $record[$k] = $v['url'];
                            } else if(is_array($v)){
                                foreach($v AS $v_v => $k_k){
                                    if(isset($k_k['url'])){
                                        $record[$k . $v_v] = $k_k['url'];
                                    }
                                }
                            }
                        }
                        if($type['type'] == "image" && (is_numeric($type["value"]) || is_array($type['value']))){
                            if(is_array($type['value'])){
                                $sizes              = $this->getImageSizes($type["value"]["id"], $type["value"]["sizes"], $k);
                            } else {
                                $thumbnail_meta     = wp_get_attachment_metadata($type["value"]);
                                $sizes              = $this->getImageSizes($type["value"], $thumbnail_meta['sizes'], $k);
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
        if(!$prefix){
            $prefix = "";
        } else {
            $prefix = $prefix . "_";
        }
        foreach ($sizes AS $size => $image) {
            $imageSrc               = wp_get_attachment_image_src($thumbnail_id, $size);
            $data[$prefix.'image_' . $this->clearSizeName($size)] = $imageSrc[0];
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
