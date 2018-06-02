<?php
/**
 * Plugin Name: WPFC Elementor
 * Description: Custom Elementor Page Builder elements for WP for Church themes
 * Version: 1.3.5
 * Author: WP For Church
 * Author URI: http://www.wpforchurch.com/
 * Contributors: wpforchurch
 * License: GPL2
 */

if ( ! defined( 'ABSPATH' ) ) { 
	exit;
} // Exit if accessed directly

define( 'WPFC_ELEMENTOR_PATH', plugin_dir_path( __FILE__ ) );

/**
 * Load WPFC Elementor
 *
 * Load the plugin after Elementor (and other plugins) are loaded.
 *
 * @since 1.0.0
 */
function wpfc_elementor_load() {
	// Notice if the Elementor is not active
	if ( ! did_action( 'elementor/loaded' ) ) {
		return;
	}

	// Check version required
	$elementor_version_required = '1.0.0';
	if ( ! version_compare( ELEMENTOR_VERSION, $elementor_version_required, '>=' ) ) {
		return;
	}

	// Require the main plugin file
	require( __DIR__ . '/includes/plugin.php' );
}

add_action( 'plugins_loaded', 'wpfc_elementor_load' );
