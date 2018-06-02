<?php
/*
 * Plugin Name: Setup Guide
 * Plugin URI: https://wpfcafy.com
 * Description: Create an easy to follow Setup Guide for a WordPress theme.
 * Version: 1.1.0
 * Author: Wpfcafy
 * Author URI: http://wpfcafy.com
 */

// require app
require_once( 'app/class-wpfcafy-setup-guide.php' );

/**
 * Return Wpfcafy_Setup_Guide instance.
 *
 * @since 1.1.0
 *
 * @return Wpfcafy_ContentImporter
 */
function wpfcafy_setupguide( $args = array() ) {
	return Wpfcafy_Setup_Guide::init( $args );
}
