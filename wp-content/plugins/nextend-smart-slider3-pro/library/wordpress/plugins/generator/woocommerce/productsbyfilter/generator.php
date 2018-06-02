<?php

N2Loader::import('libraries.slider.generator.abstract', 'smartslider');

class N2GeneratorWooCommerceProductsByFilter extends N2GeneratorAbstract {

    public function filterName($name) {
        return $name . N2Translation::getCurrentLocale() . get_woocommerce_currency();
    }

    public static function cacheKey($params) {
        return get_woocommerce_currency();
    }

    public static function floorToFraction($number, $denominator = 1) {
        if( (is_numeric($number) && $number != 0) && (is_numeric($denominator) && $denominator != 0)){
            $x = $number * $denominator;
            $x = round($x);
            $x = $x / $denominator;
            return $x;
        } 

        return $number;        
    }

    protected function _getData($count, $startIndex) {
        $data = array();

        $categories     = explode('||', $this->data->get('categories', ''));
        $fraction       = $this->data->get('fraction', 1);
        $visibility     = $this->data->get('visibility', 0);

        $tax_query = array();
        if (!in_array(0, $categories)) {
            $tax_query[] = array(
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'    => $categories
            );
        }

        $tags = explode('||', $this->data->get('tags', ''));

        if (!in_array(0, $tags)) {
            $tax_query[] = array(
                'taxonomy' => 'product_tag',
                'field'    => 'term_id',
                'terms'    => $tags
            );
        }

        switch ($this->data->get('featured', '0')) {
            case 1:
                $tax_query[] = array(
                    'taxonomy' => 'product_visibility',
                    'field'    => 'name',
                    'terms'    => 'featured',
                    'operator' => 'IN',
                );
                break;
            case -1:
                $tax_query[] = array(
                    'taxonomy' => 'product_visibility',
                    'field'    => 'name',
                    'terms'    => 'featured',
                    'operator' => 'NOT IN',
                );
                break;
        }

        $meta_query = array();

        $order = explode("|*|", $this->data->get('categoryorder', 'creation_date|*|desc'));
        if (substr($order[0], 0, 1) == '_') {
            $orderBy      = 'meta_value_num'; //meta_value = strval, meta_value_num = intval
            $meta_query[] = array(
                'key'     => $order[0],
                'compare' => 'LIKE'
            );
        } else {
            $orderBy = $order[0];
        }

        switch ($this->data->get('instock', '1')) {
            case 1:
                $meta_query[] = array(
                    'key'   => '_stock_status',
                    'value' => 'instock'
                );
                break;
            case -1:
                $meta_query[] = array(
                    'key'   => '_stock_status',
                    'value' => 'outofstock'
                );
                break;
        }

        switch ($this->data->get('downloadable', '0')) {
            case 1:
                $meta_query[] = array(
                    'key'   => '_downloadable',
                    'value' => 'yes'
                );
                break;
            case -1:
                $meta_query[] = array(
                    'key'   => '_downloadable',
                    'value' => 'no'
                );
                break;
        }

        switch ($this->data->get('virtual', '0')) {
            case 1:
                $meta_query[] = array(
                    'key'   => '_virtual',
                    'value' => 'yes'
                );
                break;
            case -1:
                $meta_query[] = array(
                    'key'   => '_virtual',
                    'value' => 'no'
                );
                break;
        }

        $args = array(
            'offset'           => $startIndex,
            'posts_per_page'   => $count,
            'orderby'          => $orderBy,
            'order'            => $order[1],
            'post_type'        => 'product',
            'tax_query'        => $tax_query,
            'meta_query'       => $meta_query,
            'suppress_filters' => 0
        );

        $textVars = $this->data->get('textvars', '');

        $productFactory = new WC_Product_Factory();
        $i              = 0;
        $posts          = get_posts($args);
		$timestampFormat = $this->data->get('timestampformat', 'Y-m-d');
		$timestampVariables = array_map('trim', explode(',', $this->data->get('timestampvariables', '')));
		
        for ($j = 0; $j < count($posts); $j++) {
            $product = $productFactory->get_product($posts[$j]);


            if ($visibility =="default") {
                $is_visible = $product->is_visible();
            } else if ($product->get_catalog_visibility() == "catalog" && $visibility == "catalog") {
                $is_visible = true;
            } else if ($product->get_catalog_visibility() == "search" && $visibility == "search") {
                $is_visible = true;
            } else if($visibility == "all") {
                $is_visible = true;
            } else {
                $is_visible = false;
            }
            if ($product && $is_visible) {
            //if ($product && $product->is_visible()) {
                $product_id = $product->get_id();
                $image      = wp_get_attachment_url(get_post_thumbnail_id($product_id));
                $thumbnail  = wp_get_attachment_image_src(get_post_thumbnail_id($product_id, 'thumbnail'));
                if ($thumbnail[0] != null) {
                    $thumbnail = $thumbnail[0];
                } else {
                    $thumbnail = $image;
                }
                $rating = $product->get_average_rating();
                $data[$i] = array(
                    'title'                  => $product->get_title(),
                    'url'                    => $product->get_permalink(),
                    'description'            => get_post($product_id)->post_content,                    
                    'short_description'      => get_post($product_id)->post_excerpt,
                    'image'                  => N2ImageHelper::dynamic($image),
                    'thumbnail'              => N2ImageHelper::dynamic($thumbnail),
                    'price'                  => $product->get_price_html(),
                    'price_without_currency' => $product->get_price(),
                    'regular_price'          => wc_price($product->get_regular_price()),
                    'price_with_tax'         => wc_price(wc_get_price_including_tax($product)),
                    'rating'                 => $rating,
                    'rating_rounded'         => $this->floorToFraction($rating, $fraction),
                    'tags'                   => wc_get_product_tag_list($product_id)
                );

                if(!class_exists('gpls_woo_rfq_CART')){
                    $data[$i]['add_to_cart_text']= $product->add_to_cart_text();
                }

                $product_type = $product->get_type();
                if ($product->has_child() && $product_type != "grouped") {
                    $data[$i] += array(
                        'variation_min_price'                  => $product->get_variation_regular_price('min'),
                        'variation_min_price_currency'         => wc_price($product->get_variation_regular_price('min')),
                        'variation_min_regular_price'          => $product->get_variation_sale_price('min'),
                        'variation_min_regular_price_currency' => wc_price($product->get_variation_sale_price('min')),
                        'variation_min_sale_price'             => $product->get_variation_price('min'),
                        'variation_min_sale_price_currency'    => wc_price($product->get_variation_price('min')),
                        'variation_max_price'                  => $product->get_variation_regular_price('max'),
                        'variation_max_price_currency'         => wc_price($product->get_variation_regular_price('max')),
                        'variation_max_regular_price'          => $product->get_variation_sale_price('max'),
                        'variation_max_regular_price_currency' => wc_price($product->get_variation_sale_price('max')),
                        'variation_max_sale_price'             => $product->get_variation_price('max'),
                        'variation_max_sale_price_currency'    => wc_price($product->get_variation_price('max'))
                    );
                }

                if ($product->is_on_sale()) {
                    $data[$i]['sale_price'] = wc_price($product->get_sale_price());
                } else {
                    $data[$i]['sale_price'] = $data[$j]['price'];
                }

                $product_meta = get_post_meta($product_id);
                foreach ($product_meta as $meta => $value) {
					if(substr($meta, 0, 1) == '_'){
						$meta = 'meta' . $meta;
					}
                    if (@unserialize($value[0]) !== false || $value[0] === 'b:0;') {
                        $product_attributes = unserialize($value[0]);
                        if (!empty($product_attributes) && is_array($product_attributes)) {
                            foreach ($product_attributes as $key => $value2) {
                                if (is_array($value2)) {
                                    foreach ($value2 as $k => $v) {
                                        if (is_string($v)) {
                                            if (strpos($v, '|') !== false) {
                                                $helper = explode("|", $v);
                                                for ($fv = 0; $fv < count($helper); $fv++) {
                                                    $data[$i][$key . '_' . $k . '_' . $fv] = $helper[$fv];
                                                }
                                            } else {
                                                $data[$i][$key . '_' . $k] = $v;
                                            }
                                        }
                                    }
                                } else {
                                    if(is_numeric($value2) || is_string($value2)){
                                       if($meta == 'dfiFeatured'){
											$parts = explode(',', $value2);
											if(isset($parts[1])){
												$upload_dir = wp_upload_dir();
												$value2 = $upload_dir['baseurl'] . $parts[1];
											}
                                       }
                                       if(!array_key_exists($meta, $data[$i])){
                                            $data[$i][$meta] = $value2;
                                       } else {
                                            $data[$i]['meta_' . $meta] = $value2;
                                       }
                                    }
                                }
                            }
                        } else {
                            if(!array_key_exists($meta, $data[$i])){
                                 $data[$i][$meta] = '';
                            } else {
                                 $data[$i]['meta_' . $meta] = '';
                            }
                        }
                    } else {
                        if (is_array($value) && count($value) > 1) {
                            for ($fv = 0; $fv < count($value); $fv++) {
                                $v                           = $value[$fv];
                                $data[$i][$meta . "_" . $fv] = $v;
                            }
                        } else {
                            if(!array_key_exists($meta, $data[$i])){
                                 $data[$i][$meta] = $value[0];
                            } else {
                                 $data[$i]['meta_' . $meta] = $value[0];
                            }
                        }
                    }

                }

                $categories = wp_get_post_terms($product_id, 'product_cat');

                if (!empty($categories) && is_array($categories)) {
                    $k = 1;
                    foreach ($categories as $category) {
                        $catId                                     = (int)$category->term_id;
                        $data[$i]['category' . $k]                 = $category->name;
                        $data[$i]['category' . $k . 'link']        = get_term_link($catId, 'product_cat');
                        $data[$i]['category' . $k . 'description'] = $category->description;
                        $data[$i]['category' . $k . 'ID']          = $catId;
                        $k++;
                    }
                }

                $data[$i]['ID'] = $product_id;

                if (!empty($textVars)) {
                    $lines = preg_split('/$\R?^/m', $textVars);
                    foreach ($lines AS $line) {
                        $variables = explode('||', $line);
                        if (count($variables) == 4 && isset($data[$i][$variables[0]])) {
                            if ($data[$i][$variables[0]] == $variables[1]) {
                                $data[$i]['text' . $variables[0]] = $variables[2];
                            } else {
                                $data[$i]['text' . $variables[0]] = $variables[3];
                            }
                        }
                    }
                }
				
				if(!empty($timestampVariables)){
					foreach($timestampVariables AS $timestampVariable){
						if(isset($data[$i][$timestampVariable])){
							$data[$i][$timestampVariable] = date($timestampFormat, intval($data[$i][$timestampVariable]));
						}
					}
				}
                $i++;
            }
        }
        return $data;
    }
}