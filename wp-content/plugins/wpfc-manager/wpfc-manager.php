<?php
/*
Plugin Name: WP for Church Manager
Description: This plugin takes care of all your WP for Church product licensing and it also contains FAQ's, support options and more.
Version:     1.2.9
Author:      WP for Church
Author URI:  https://www.wpforchurch.com/
Text Domain: wpfcm
Domain Path: /languages
*/

// exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/*
 * Load class if it doesn't exist
 */
spl_autoload_register( function ( $class ) {
	$prefix   = 'WPFCManager';
	$base_dir = __DIR__;
	$len      = strlen( $prefix );
	if ( strncmp( $prefix, $class, $len ) !== 0 ) {
		return;
	}
	$relative_class = substr( $class, $len );
	$file           = $base_dir . '/classes' . str_replace( '\\', '/', $relative_class ) . '.php';
	if ( file_exists( $file ) ) {
		/** @noinspection PhpIncludeInspection */
		require $file;
	}
} );

// fix path if it's me - the developer :)
// fixes symlinks issues
if ( is_file( ABSPATH . 'LOCALTEST' ) ) {
	wp_register_plugin_realpath( ABSPATH . 'wp-content/plugins/wpfc-manager' );
}

// define constants
define( 'WPFCM_PATH', plugin_dir_path( __FILE__ ) );
define( 'WPFCM_URL', plugin_dir_url( __FILE__ ) );
define( 'WPFCM_VERSION', preg_match( '/^.*Version: (.*)$/m', file_get_contents( __FILE__ ), $version ) ? trim( $version[1] ) : 'N/A' );

// todo: move it to proper place
if ( ! function_exists( 'url_request_all' ) ) {
	/**
	 * Tries to get data by curl and file_get_contents, so we can avoid allow_url_fopen problem
	 *
	 * @param string $url The URL
	 *
	 * @todo setup Exceptions throwing
	 *
	 * @return mixed|null The response or null if we can't get data
	 *
	 * @throws Exception
	 */
	function url_request_all( $url ) {
		if ( function_exists( 'curl_version' ) ) {
			$curl = curl_init();

			if ( false === $curl ) {
				throw new Exception( 'err: failed to initialize curl', 0 );
			}

			curl_setopt( $curl, CURLOPT_URL, $url );
			curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt( $curl, CURLOPT_FOLLOWLOCATION, true );
			curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, true );
			curl_setopt( $curl, CURLOPT_SSL_VERIFYHOST, 2 );
			curl_setopt( $curl, CURLOPT_CAINFO, __DIR__ . '/assets/CAcerts/cacert.pem' );

			$content = curl_exec( $curl );

			if ( false === $content ) {
				throw new Exception( curl_error( $curl ), curl_errno( $curl ) );
			}

			curl_close( $curl );

			return $content;
		} else if ( file_get_contents( __FILE__ ) && ini_get( 'allow_url_fopen' ) ) {
			return file_get_contents( $url );
		} else {
			return null;
		}
	}
}

// Load initializer
new \WPFCManager\WPFCManager\Init();
