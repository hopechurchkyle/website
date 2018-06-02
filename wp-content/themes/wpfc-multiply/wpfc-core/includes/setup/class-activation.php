<?php

/**
 * Used on theme Activation
 */
class WPFC_QS_Activation {

	/**
	 * @var object
	 */
	public static $theme;

	/**
	 * @var string
	 */
	public static $version;

	/**
	 * Init, where the magic begins
	 *
	 * @return void
	 */
	public static function init() {
		if ( ! is_admin() ) {
			return;
		}

		self::$theme   = wp_get_theme();
		self::$version = self::$theme->get( 'Version' );

		self::setup_actions();
	}

	/**
	 * Set hooks and callbacks.
	 *
	 * @return void
	 */
	public static function setup_actions() {
		add_action( 'after_switch_theme', array( __CLASS__, 'after_switch_theme' ), 10, 2 );
	}

	/**
	 * When this theme is activated redirect if a new install.
	 * This is only called when a theme is actually switched.
	 *
	 * @param object $theme
	 * @param object $old
	 *
	 * @return void
	 */
	public static function after_switch_theme( $theme, $old = '' ) {
		// Check if it's a new install
		if ( get_option( 'wpfc_qs_done' ) ) {
			return;
		}

		// Don't let WP Job Manager run its setup guide
		update_option( 'wp_job_manager_version', 100 );

		// Don't let WooCommerce run its setup guide (sorry)
		update_option( 'woocommerce_version', 100 );
		update_option( 'woocommerce_cart_page_id', - 1 );

		// Mark QS setup as done
		update_option( 'wpfc_qs_done', 1, false );

		self::redirect();
	}

	/**
	 * Redirect to the theme setup admin page.
	 *
	 * @since 3.0.0
	 *
	 * @return void
	 */
	public static function redirect() {
		unset( $_GET['action'] );

		wp_safe_redirect( admin_url( 'admin.php?page=' . WPFC_QS_Setup::get_template_name() . '-setup' ) );

		exit();
	}
}

$qs = new WPFC_QS_Activation();
$qs->init();
