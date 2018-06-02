<?php

namespace WPFCManager\WPFCManager\WP;

use WPFCManager\WPFCManager\Product;
use WPFCManager\WPFCManager\Updates\Updates;

/**
 * Has all actions/filters
 *
 * @package WPFCManager\WPFCManager\WP
 * @since   1.0.0
 */
class AttachWP {
	/**
	 * Instance of this class
	 *
	 * @since 1.0.0
	 * @var null
	 */
	private static $instance = null;

	/**
	 * Enqueues scripts and styles in admin area
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public static function enqueueScriptsStyles() {
		global $pagenow;
		if ( $pagenow === 'index.php' && ! empty( $_GET['page'] ) && $_GET['page'] === 'wpfc-manager' ) {
			wp_enqueue_style( 'wpfcm-main', WPFCM_URL . 'assets/css-compiled/wpfcm.min.css', false, WPFCM_VERSION );
			wp_enqueue_style( 'wpfcm-google-fonts', 'https://fonts.googleapis.com/css?family=Dosis', false, WPFCM_VERSION );
			wp_enqueue_script( 'wpfc-main', WPFCM_URL . 'assets/js/wpfcm.js', false, WPFCM_VERSION );
		}
	}

	/**
	 * Add admin menu pages
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function addMenu() {
		add_submenu_page( 'index.php', 'WPFC Manager', 'WPFC Manager', 'update_plugins', 'wpfc-manager', array(
			new RenderView,
			'render'
		) );
	}

	/**
	 * Do all add_action and add_filter functions
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function init() {
		add_action( 'admin_menu', array( self::getInstance(), 'addMenu' ) );
		add_action( 'activated_plugin', array( new Product(), 'clearTempData' ) );
		add_action( 'deactivated_plugin', array( new Product(), 'clearTempData' ) );
		add_action( 'upgrader_post_install', array( new Product(), 'clearTempData' ) );
		add_action( 'admin_enqueue_scripts', array( self::getInstance(), 'enqueueScriptsStyles' ) );
		add_action( 'pre_set_site_transient_update_plugins', array( new Updates(), 'checkPluginsUpdates' ) );
		add_action( 'pre_set_site_transient_update_themes', array( new Updates(), 'checkThemesUpdates' ) );
		add_action( 'wp_ajax_wpfcm_get_view', array( new RenderView(), 'render' ) );
		add_action( 'wp_ajax_wpfcm_reload_products', array( new Product(), 'clearTempData' ) );
	}

	/**
	 * Get new instance self or current one if exists
	 *
	 * @since 1.0.0
	 * @return AttachWP
	 */
	public static function getInstance() {
		if ( null === self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}
}