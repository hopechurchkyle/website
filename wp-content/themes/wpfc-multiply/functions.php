<?php
defined( 'ABSPATH' ) or die;

// Note: This file must be PHP 5.6 compatible.

// define constants
define( 'GPMT_PATH', get_template_directory() );
define( 'GPMT_VERSION', preg_match( '/^.*Version:.*?(?=[^\s])(.*)$/m', file_get_contents( GPMT_PATH . '/style.css' ), $version ) ? trim( $version[1] ) : '' );

class WPFC_Multiply {

	/**
	 * The single instance of the Multiply object.
	 *
	 * @var object $instance
	 */
	private static $instance;

	/**
	 * @var object $activation
	 */
	public $activation;

	/**
	 * @var object $setup
	 */
	public $setup;

	/**
	 * @var object $integrations
	 */
	public $integrations;

	/**
	 * @var object $template
	 */
	public $template;

	/**
	 * @var object $widgets
	 */
	public $widgets;

	/**
	 * Start things up.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->includes();
		$this->setup();
	}

	/**
	 * Load the necessary files.
	 *
	 * @return void
	 */
	private function includes() {
		$files = array(
			'/includes/wpfcm.php', // WPFC Manager code (must be included before QS setup)
			'/wpfc-core/includes/gantry_check.php', // Frontend gantry check
			'/wpfc-core/includes/helper.php', // General helper file
			'/wpfc-core/includes/sermon-shortcode.php', // Sermon shortcodes
			'/wpfc-core/includes/workarounds.php', // Misc workarounds and hacks
			'/wpfc-core/includes/gantry5-outline-picker/gantry5-outline-picker.php', // Gantry 5 outline picker plugin
			'/wpfc-core/includes/setup/class-setup.php', // Initial setup screen
			//'/wpfc-core/includes/class-wpfc-meta.php', // Meta fields
		);

		foreach ( $files as $file ) {
			if ( file_exists( GPMT_PATH . $file ) ) {
				require_once( GPMT_PATH . $file );
			} else {
				trigger_error( 'Failed to include file' . $file );
			}
		}
	}

	/**
	 * Instantiate necessary classes and assign them to relevant
	 * class properties.
	 *
	 * @return void
	 */
	private function setup() {
		$this->activation = WPFC_QS_Activation::init();
	}

	/**
	 * Find the single instance of the class.
	 */
	public static function instance() {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof WPFC_Multiply ) ) {
			self::$instance = new self;
		}

		return self::$instance;
	}
}

/**
 * Helper function for accessing the main `WPFC_Multiply` class.
 *
 * @return object Multiply The single instance of the `WPFC_Multiply` class.
 */
function wpfc_multiply() {
	return WPFC_Multiply::instance();
}

wpfc_multiply();