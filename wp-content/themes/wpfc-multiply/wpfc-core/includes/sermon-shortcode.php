<?php


add_shortcode( 'wpfc_sermons_hover', 'wpfc_display_sermons_hover_shortcode' );
add_shortcode( 'wpfc_sermons_series', 'wpfc_display_sermons_series_shortcode' );
add_shortcode( 'wpfc_sermons_list', 'wpfc_display_sermons_series_list_shortcode' );

function wpfc_display_sermons_hover_shortcode( $atts ) {
	echo wpfc_display_sermons( 'hover', $atts );
}

function wpfc_display_sermons_series_shortcode( $atts ) {
	echo wpfc_display_sermons( 'series', $atts );
}

function wpfc_display_sermons_series_list_shortcode( $atts ) {
	echo wpfc_display_sermons( 'list', $atts );
}

/**
 * Sermons shortcode
 *
 * @param string $type hover|series|list
 * @param array $atts Settings
 *
 * @return string HTML
 *
 * @since 1.0.0
 */
function wpfc_display_sermons( $type, $atts ) {
	$array_atts = array(
		'tax'       => 'wpfc_sermon_series',
		'order'     => 'ASC',
		'size'      => 'sermon_wide',
		'show_desc' => 'false',
		'grid'      => 'size-50',
		'posts'     => 6,
		'sermons'   => 3,
		'orderby'   => 'meta_value'
	);

	if ( $type == 'series' ) {
		$array_atts['image'] = 'yes';
	}

	extract( shortcode_atts( $array_atts, $atts ) );

	if ( get_query_var( 'paged' ) ) {
		$paged = get_query_var( 'paged' );
	} elseif ( get_query_var( 'page' ) ) {
		$paged = get_query_var( 'page' );
	} else {
		$paged = 1;
	}

	$series_count     = count( get_terms( 'wpfc_sermon_series' ) );
	$per_page         = esc_attr( $posts );
	$offset           = $per_page * ( $paged - 1 );
	$big              = 999999999; // need an unlikely integer
	$sermons_per_page = esc_attr( $sermons );
	$sermon_taxonomy  = esc_attr( $tax );

	if ( $type != 'list' ) {
		$terms = apply_filters( 'sermon-images-get-terms', '', array(
			'taxonomy'  => $tax,
			'term_args' => array(
				'order'   => $order,
				'orderby' => $orderby,
				'offset'  => $offset,
				'number'  => $per_page
			)
		) );
	} else {
		$terms = get_terms( array(
			'taxonomy' => $tax,
			'order'    => $order,
			'orderby'  => $orderby,
			'offset'   => $offset,
			'number'   => $per_page
		) );
	}

	$counter_args = array(
		'post_type'      => 'wpfc_sermon',
		'posts_per_page' => - 1,
		'meta_key'       => 'sermon_date',
		'meta_value'     => date( "m/d/Y" ),
		'meta_compare'   => '>=',
		'orderby'        => 'meta_value',
	);

	$items = get_posts( $counter_args );

	if ( ! empty( $terms ) ) {
		$string = ( $type != 'hover' ) ? '<div class="g-grid wpfc-shortcode-sermons-list">' : '<div class="g-grid wpfc-shortcode-sermons-hover">';

		foreach ( $terms as $term ) {
			$args = array(
				'post_type'      => 'wpfc_sermon',
				'posts_per_page' => $sermons_per_page,
				'meta_key'       => 'sermon_date',
				'meta_value'     => date( "m/d/Y" ),
				'meta_compare'   => '>=',
				'orderby'        => 'meta_value',
				'tax_query'      => array(
					array(
						'taxonomy' => $sermon_taxonomy,
						'field'    => 'id',
						'terms'    => $term
					)
				)
			);

			if ( $type == 'hover' ) {
				$args['wpfc_sermon_series'] = $term->name;
			}

			$posts        = get_posts( $args );
			$post_counter = 0;

			foreach ( $items as $item ) {
				$post_counter ++;
				$counter_post_date = date_i18n( get_option( 'date_format' ), get_post_meta( $item->ID, 'sermon_date', 'true' ) );
				$counter_nr        = $term->count;
				if ( $post_counter == 1 ) {
					$latest_post_date = $counter_post_date;
				}
				if ( $post_counter == $counter_nr ) {
					$first_post_date = $counter_post_date;
				}
			}

			if ( $type == 'hover' ) {
				$string .= '<div class="g-block equal-height ' . esc_attr( $grid ) . '">';
				$string .= '<div class="g-content">';
				$string .= '<div class="wpfc-sermon-hover-wrap">';
				$string .= wp_get_attachment_image( $term->image_id, $size );
				$string .= '<div class="wpfc-sermon-hover-desc">';
				foreach ( $posts as $post ) {
					$post_date = date_i18n( get_option( 'date_format' ), get_post_meta( $post->ID, 'sermon_date', 'true' ) );
					$string .= '<div class="wpfc-sermon-item">';
					$string .= '<div class="wpfc-sermon-date">' . $post_date . '</div>';
					$string .= '<a href="' . get_permalink( $post->ID ) . '">' . $post->post_title . '</a>';
					$string .= '</div>';
				}
				$string .= '</div>';
				$string .= '</div>';
				$string .= '<div class="wpfc-sermon-container">';
				$string .= '<h3 class="wpfc-sermon-hover-title"><a href="' . esc_url( get_term_link( $term, $term->taxonomy ) ) . '">' . $term->name . '</a></h3>';
				$string .= '<div class="wpfc-sermon-hover-count">Sermons: ' . $term->count . '</div>';
				$string .= '<div class="wpfc-sermon-hover-count">Date: ' . $first_post_date . ' - ' . $latest_post_date . '</div>';
				$string .= '</div>';
				$string .= '</div>';
				$string .= '</div>';
			} else {
				$string .= '<div class="g-block equal-height ' . esc_attr( $grid ) . ' ">';
				$string .= '<div class="g-content">';
				if ( $type == 'series' ) {
					if ( esc_attr( $image ) == 'yes' ) {
						$string .= wp_get_attachment_image( $term->image_id, $size );
					}
				}
				$string .= '<div class="wpfc-sermon-container">';

				$string .= '<h3 class="wpfc-sermons-list-title"><a href="' . esc_url( get_term_link( $term, $term->taxonomy ) ) . '">' . $term->name . '</a></h3>';
				$string .= '<div class="wpfc-sermons-list-details">';
				$string .= '<div class="wpfc-sermons-list-count">Sermons: ' . $term->count . '</div>';
				$string .= '<div class="wpfc-sermons-list-date">Date: ' . $first_post_date . ' - ' . $latest_post_date . '</div>';
				$string .= '</div>';

				$string .= '<div class="wpfc-sermons-list-wrap">';
				if ( esc_attr( $sermons ) != 'none' ) {
					foreach ( $posts as $post ) {
						$post_date = date_i18n( get_option( 'date_format' ), get_post_meta( $post->ID, 'sermon_date', 'true' ) );
						$string .= '<div class="wpfc-sermons-item">';
						$string .= '<a href="' . get_permalink( $post->ID ) . '">' . $post->post_title . '</a>';
						$string .= '<div class="wpfc-sermons-date">' . $post_date . '</div>';
						$string .= '</div>';
					}
				}
				$string .= '</div>';

				$string .= '</div>';
				$string .= '</div>';
				$string .= '</div>';
			}
		}
		$string .= '</div>';

		// Pagination
		$pag = array(
			'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'current' => $paged,
			'total'   => ceil( $series_count / $per_page ),
		);

		$string .= '<div class="wpfc-sermons-shortcode-pagination">' . paginate_links( $pag ) . '</div>';
	}

	return $string;
}