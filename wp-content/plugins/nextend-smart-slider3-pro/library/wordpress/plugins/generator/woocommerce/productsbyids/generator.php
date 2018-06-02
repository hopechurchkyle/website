<?php

class N2GeneratorWooCommerceProductsByIds extends N2GeneratorAbstract
{

    public function filterName($name) {
        return $name . N2Translation::getCurrentLocale() . get_woocommerce_currency();
    }

    public static function cacheKey($params) {
        return get_woocommerce_currency();
    }

    protected function _getData($count, $startIndex) {
        $productFactory = new WC_Product_Factory();
        $i              = 0;
        $data           = array();

        foreach ($this->getIDs() AS $id) {
            $product = $productFactory->get_product($id);
            if ($product && $product->is_visible()) {
                $image     = wp_get_attachment_url(get_post_thumbnail_id($id));
                $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($id, 'thumbnail'));
                if ($thumbnail[0] != null) {
                    $thumbnail = $thumbnail[0];
                } else {
                    $thumbnail = $image;
                }

				$product_id = $product->get_id();
                $data[$i] = array(
                    'title'         => $product->get_title(),
                    'url'           => $product->get_permalink(),
                    'description'   => get_post($product_id)->post_content,
                    'image'         => N2ImageHelper::dynamic($image),
                    'thumbnail'     => N2ImageHelper::dynamic($thumbnail),
                    'price'         => wc_price($product->get_price()),
                    'regular_price' => wc_price($product->get_regular_price()),
                    'price_with_tax'      => wc_price(wc_get_price_including_tax($product)),
                    'rating'        => $product->get_average_rating()
                );

                if ($product->is_on_sale()) {
                    $data[$i]['sale_price'] = wc_price($product->get_sale_price());
                } else {
                    $data[$i]['sale_price'] = $data[$i]['price'];
                }

                $data[$i]['ID'] = $product_id;

                $i++;
            }
        }
        return $data;
    }

}
