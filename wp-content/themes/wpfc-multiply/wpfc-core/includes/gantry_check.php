<?php

// Check min. required version of Gantry 5
$requiredGantryVersion = '5.3.1';

// Bootstrap Gantry framework or fail gracefully.
$gantry_include = get_stylesheet_directory() . '/wpfc-core/includes/gantry.php';
if ( ! file_exists( $gantry_include ) ) {
	$gantry_include = get_template_directory() . '/wpfc-core/includes/gantry.php';
}

$gantry = include_once $gantry_include;

if ( $gantry ) {
	if ( ! $gantry->isCompatible( $requiredGantryVersion ) ) {
		$current_theme = wp_get_theme();
		$error         = sprintf( __( 'Please upgrade Gantry 5 Framework to v%s (or later) before using %s theme!', 'wpfc-core' ), strtoupper( $requiredGantryVersion ), $current_theme->get( 'Name' ) );

		if ( ! is_admin() ) {
			wp_die( $error );
		}
	}

	/** @var \Gantry\Framework\Theme $theme */
	$theme = $gantry['theme'];
} else {
	global $pagenow;

	if ( ! is_admin() && strpos( $_SERVER['REQUEST_URI'], '/wp-json/' ) === false && $pagenow !== 'wp-login.php' && ! isset( $_GET['rest_route'] ) ) {
		$error = 'Error. Failed loading Gantry 5 plugin.';

		if ( ! function_exists( 'is_plugin_active' ) ) {
			@require_once ABSPATH . '/wp-admin/includes/plugin.php';
		}

		if ( function_exists( 'is_plugin_active' ) && ! is_plugin_active( 'gantry5' ) ) {
			$error .= '<h4>Plugin not active!</h4>';
		}

		wp_die( $error );
	}
}