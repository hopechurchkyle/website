<?php

N2Loader::import('libraries.slider.generator.abstract', 'smartslider');

class N2GeneratorAllinOneEventCalendarEvents extends N2GeneratorAbstract {

    private $where = array();
    private $order = array(
        'start',
        'asc'
    );

    private function translate($from, $translate) {
        if (!empty($translate) && !empty($from)) {
            foreach ($translate AS $key => $value) {
                $from = str_replace($key, $value, $from);
            }
        }
        return $from;
    }

    protected function _getData($count, $startIndex) {

        $tax_query = array();

        $categories = explode('||', $this->data->get('categories', 0));
        if (!in_array(0, $categories)) {
            $tax_query[] = array(
                'taxonomy' => 'events_categories',
                'field'    => 'term_id',
                'terms'    => $categories
            );
        }

        $tags = explode('||', $this->data->get('tags', 0));
        if (!in_array(0, $tags)) {
            $tax_query[] = array(
                'taxonomy' => 'events_tags',
                'field'    => 'term_id',
                'terms'    => $tags
            );
        }

        $today = current_time('timestamp');

        if (!$this->data->get('recurring', '0')) {
            switch ($this->data->get('started', '0')) {
                case 1:
                    $this->where[] = 'events.start < ' . $today;
                    break;
                case -1:
                    $this->where[] = 'events.start >= ' . $today;
                    break;
            }


            switch ($this->data->get('ended', '-1')) {
                case 1:
                    $this->where[] = 'events.end < ' . $today;
                    break;
                case -1:
                    $this->where[] = 'events.end >= ' . $today;
                    break;
            }
        } else {
            $this->where[] = "events.recurrence_rules <> ''";
        }

        if ($this->data->get('excluderecurring', '0')) {
            $this->where[] = "events.recurrence_rules = ''";
        }

        $args = array(
            'offset'           => $startIndex,
            'posts_per_page'   => $count,
            'post_parent'      => '',
            'post_status'      => 'publish',
            'suppress_filters' => false,
            'post_type'        => 'ai1ec_event',
            'tax_query'        => $tax_query
        );

        $this->order = explode("|*|", $this->data->get('order', 'start|*|asc'));

        add_filter('posts_orderby', array(
            $this,
            'posts_orderby'
        ));
        add_filter('posts_fields', array(
            $this,
            'posts_fields'
        ));
        add_filter('posts_where', array(
            $this,
            'posts_where'
        ));
        add_filter('posts_join', array(
            $this,
            'posts_join'
        ));

        $posts_array = get_posts($args);

        remove_filter('posts_orderby', array(
            $this,
            'posts_orderby'
        ));
        remove_filter('posts_fields', array(
            $this,
            'posts_fields'
        ));
        remove_filter('posts_where', array(
            $this,
            'posts_where'
        ));
        remove_filter('posts_join', array(
            $this,
            'posts_join'
        ));

        $data = array();

        $prev_timezone = date_default_timezone_get();
        date_default_timezone_set(get_option('timezone_string'));

        $custom_dates           = $this->data->get('customdates', '');
        $translate_custom_dates = $this->data->get('translatecustomdates', '');

        $translateValue = preg_split('/$\R?^/m', $translate_custom_dates);
        $translate      = array();
        if (!empty($translateValue)) {
            foreach ($translateValue AS $tv) {
                $translateArray = explode('||', $tv);
                if (!empty($translateArray) && count($translateArray) == 2) {
                    $translate[$translateArray[0]] = $translateArray[1];
                }
            }
        }

        $date_function = $this->data->get('datefunction', 'date_i18n');

        for ($i = 0; $i < count($posts_array); $i++) {
            $event = $posts_array[$i];

            $data[$i]['title']       = $event->post_title;
            $data[$i]['description'] = $event->post_content;
            $data[$i]['image']       = N2ImageHelper::dynamic(wp_get_attachment_url(get_post_thumbnail_id($event->ID)));
            $thumbnail               = wp_get_attachment_image_src(get_post_thumbnail_id($event->ID, 'thumbnail'));
            if ($thumbnail[0]) {
                $data[$i]['thumbnail'] = N2ImageHelper::dynamic($thumbnail[0]);
            } else {
                $data[$i]['thumbnail'] = $data[$i]['image'];
            }
            $data[$i]['url'] = get_permalink($event->ID);

            $data[$i]['start_date'] = date_i18n(get_option('date_format'), $event->start);
            $data[$i]['start_time'] = date_i18n(get_option('time_format'), $event->start);

            $data[$i]['end_date'] = date_i18n(get_option('date_format'), $event->end);
            $data[$i]['end_time'] = date_i18n(get_option('time_format'), $event->end);

            $data[$i]['start'] = date("Y-m-d h:i:s", $event->start);
            $data[$i]['end']   = date("Y-m-d h:i:s", $event->end);

            $data[$i]['ID'] = $event->ID;

            $data[$i]['timezone_name'] = $event->timezone_name;
            $data[$i]['venue']         = $event->venue;
            $data[$i]['country']       = $event->country;
            $data[$i]['address']       = $event->address;
            $data[$i]['city']          = $event->city;
            $data[$i]['province']      = $event->province;
            $data[$i]['postal_code']   = $event->postal_code;
            $data[$i]['contact_name']  = $event->contact_name;
            $data[$i]['contact_phone'] = $event->contact_phone;
            $data[$i]['contact_email'] = $event->contact_email;
            $data[$i]['contact_url']   = $event->contact_url;
            $cost                      = unserialize($event->cost);
            if ($cost['is_free']) {
                $data[$i]['cost'] = 0;
            } else {
                $data[$i]['cost'] = $cost['cost'];
            }
            $data[$i]['ticket_url'] = $event->ticket_url;
            $data[$i]['latitude']   = round($event->latitude, 6);
            $data[$i]['longitude']  = round($event->longitude, 6);
            if (!empty($custom_dates)) {
                $j     = 1;
                $dates = preg_split('/$\R?^/m', $custom_dates);
                foreach ($dates AS $date) {
                    if ($date_function == 'date_i18n') {
                        $data[$i]['custom_date_start_' . $j] = $this->translate(date_i18n($date, $event->start), $translate);
                        $data[$i]['custom_date_end_' . $j]   = $this->translate(date_i18n($date, $event->end), $translate);
                    } else {
                        $data[$i]['custom_date_start_' . $j] = $this->translate(date($date, $event->start), $translate);
                        $data[$i]['custom_date_end_' . $j]   = $this->translate(date($date, $event->end), $translate);
                    }
                    $j++;
                }
            }

        }
        date_default_timezone_set($prev_timezone);
        return $data;
    }

    public function posts_fields($fields) {
        return $fields . ', events.*';
    }

    public function posts_join($join) {
        global $wpdb;
        return $join . "LEFT JOIN {$wpdb->prefix}ai1ec_events AS events ON $wpdb->posts . ID = events.post_id ";
    }

    public function posts_where($where) {
        if (count($this->where)) {
            $where .= ' AND ' . implode(' AND ', $this->where) . ' ';
        }
        return $where;
    }

    public function posts_orderby($orderby) {
        $orderby = ' ';
        if ($this->order[0] == 'title') {
            $this->order[0] = 'post_title'; //fallback for old version selections
        }
        if ($this->order[0] == 'start' || $this->order[0] == 'end') {
            $orderby = 'events';
        } else {
            global $wpdb;
            $orderby = $wpdb->prefix . 'posts';
        }
        $orderby .= "." . $this->order[0] . ' ' . $this->order[1];
        return $orderby;
    }

}
