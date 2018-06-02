<?php
/*
 * Plugin Name: Wpfcafy Plugin Installer
 * Plugin URI: https://wpfcafy.com
 * Description: Easy inline plugin installation.
 * Version: 1.0.1
 * Author: Wpfcafy
 * Author URI: http://wpfcafy.com
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

require_once( dirname( __FILE__ ) . '/vendor/wpfcafy/module-loader/wpfcafy-moduleloader.php' );

/**
 * Autoloader for Modules
 *
 * @since 1.0.0
 *
 * @param string $class
 */
function wpfcafy_plugininstaller_moduleloader( $class ) {
	$prefix = 'Wpfcafy_PluginInstaller_';
	$base_dir = dirname( __FILE__ ) . '/app/';
	
	wpfcafy_moduleloader_autoload( $class, $prefix, $base_dir );
}
spl_autoload_register( 'wpfcafy_plugininstaller_moduleloader' );

/**
 * Start up the installer. Can pass initial configuration options.
 *
 * Included early so it can be referenced immediately when this file is included.
 *
 * @since 1.0.0
 *
 * @param array $options
 */
function wpfcafy_plugininstaller( $options = array() ) {
	$wpfcafy_plugininstaller = new Wpfcafy_PluginInstaller_Manager();
	call_user_func( array( $wpfcafy_plugininstaller, 'set_options' ), $options );
}