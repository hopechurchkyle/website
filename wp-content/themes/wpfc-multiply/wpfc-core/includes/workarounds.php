<?php

/**
 * One large file where all miscellaneous workarounds and hacks will be stored
 */

// Prevent Yoast from changing Event Title Tags for Event Views (Month, List, Etc,)
add_action( 'pre_get_posts', 'gpmt_tribe_remove_wpseo_title_rewrite', 20 );
function gpmt_tribe_remove_wpseo_title_rewrite() {
	$remove = false;

	if ( class_exists( 'Tribe__Events__Main' ) && class_exists( 'Tribe__Events__Pro__Main' ) ) {
		if ( tribe_is_month() || tribe_is_upcoming() || tribe_is_past() || tribe_is_day() || tribe_is_map() || tribe_is_photo() || tribe_is_week() ) {
			$remove = true;
		}
	} elseif ( class_exists( 'Tribe__Events__Main' ) && ! class_exists( 'Tribe__Events__Pro__Main' ) ) {
		if ( tribe_is_month() || tribe_is_upcoming() || tribe_is_past() || tribe_is_day() ) {
			$remove = true;
		}
	}

	if ( $remove && class_exists( 'WPSEO_Frontend' ) ) {
		$wpseo_front = WPSEO_Frontend::get_instance();
		remove_filter( 'wp_title', array( $wpseo_front, 'title' ), 15 );
		remove_filter( 'pre_get_document_title', array( $wpseo_front, 'title' ), 15 );
	}
}

// Add custom classes to Gantry so they can be used in twig
if ( ! function_exists( 'render_wpfc_sorting' ) && class_exists( 'Sermon_Manager_Template_Tags' ) ) {
	$gantry['Sermon_Manager_Template_Tags'] = new Sermon_Manager_Template_Tags();
}

// Used to get global wp_query posts count
function gpmt_get_posts_count() {
	global $wp_query;

	if ( isset( $wp_query ) && ! ! $wp_query ) {
		return $wp_query->found_posts;
	}
}

// Change menu icon
function gpmt_menu_icon() {
	echo '<style>#adminmenu #toplevel_page_layout-manager .menu-icon-generic div.wp-menu-image:before {content: url(' . get_template_directory_uri() . '/wpfc-core/images/wpfc/wpfc-logo-small.png);}</style>';
}

add_action( 'admin_head', 'gpmt_menu_icon' );

// Ability to add SVG file types
function gpmt_mime_types( $mime_types ) {
	$mime_types['svg'] = 'image/svg+xml'; //Adding svg extension
	return $mime_types;
}

add_filter( 'upload_mimes', 'gpmt_mime_types', 1, 1 );

// SM Theme Compatibility
function sm_theme_compatibility() {
    update_option( 'sermonmanager_disable_layouts', doing_action( 'after_switch_theme' ) ? 'yes' : 'no' );
}

add_action( 'switch_theme', 'sm_theme_compatibility' );
add_action( 'after_switch_theme', 'sm_theme_compatibility' );
