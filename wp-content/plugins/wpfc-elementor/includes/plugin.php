<?php

namespace WPFCElementor;

use WPFCElementor\Widgets\Blockquote;
use WPFCElementor\Widgets\Events;
use WPFCElementor\Widgets\Give;
use WPFCElementor\Widgets\Posts;
use WPFCElementor\Widgets\Sermons;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

/**
 * Main Plugin Class
 *
 * Register new elementor widget.
 *
 * @since 1.0.0
 */
class Plugin {

	/**
	 * Initialize the class
	 *
	 * @since  1.0.0
	 */
	public function __construct() {
		$this->_add_actions();
	}

	/**
	 * Add Actions
	 *
	 * @access private
	 *
	 * @since  1.0.0
	 */
	private function _add_actions() {
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets_init' ] );
		add_action( 'elementor/init', [ $this, 'add_category' ] );
		add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'enqueue_frontend_scripts' ] );
		add_action( 'elementor/frontend/after_enqueue_scripts', [ $this, 'enqueue_plyr_scripts' ] );
	}

	/**
	 * Call required functions for registering widgets
	 *
	 * @param \Elementor\Widgets_Manager $Widgets_Manager
	 *
	 * @since  1.0.0
	 */
	public function register_widgets_init( $Widgets_Manager ) {
		$this->_includes();
		$this->_register_widget( $Widgets_Manager );
	}

	/**
	 * Include required files
	 *
	 * @access private
	 *
	 * @since  1.0.0
	 */
	private function _includes() {
		require __DIR__ . '/widgets/blockquote.php';
		require __DIR__ . '/widgets/events.php';
		require __DIR__ . '/widgets/give.php';
		require __DIR__ . '/widgets/posts.php';
		require __DIR__ . '/widgets/sermons.php';
	}

	/**
	 * Register Widgets
	 *
	 * @since  1.0.0
	 *
	 * @access private
	 *
	 * @param \Elementor\Widgets_Manager $Widgets_Manager
	 */
	private function _register_widget( $Widgets_Manager ) {
		$Widgets_Manager->register_widget_type( new Blockquote() );
		$Widgets_Manager->register_widget_type( new Events() );
		$Widgets_Manager->register_widget_type( new Give() );
		$Widgets_Manager->register_widget_type( new Posts() );
		$Widgets_Manager->register_widget_type( new Sermons() );
	}

	/**
	 * Register our category with Elementor
	 *
	 * @since 1.0.0
	 */
	public function add_category() {
		$elementsManager = \Elementor\Plugin::instance()->elements_manager;
		$elementsManager->add_category(
			'wpfc-elements',
			array(
				'title' => __( 'WP For Church Elements', 'wpfc-elements' ),
				'icon'  => 'font',
			),
			1
		);
	}
	
	/**
	 * Enqueue our scripts
	 *
	 * @since 1.0.0
	 */
	public function enqueue_frontend_scripts() {
		wp_register_style('wpfc-elementor', plugins_url( '../assets/css-compiled/wpfc-elementor.css', __FILE__ ));
		
		wp_enqueue_style('wpfc-elementor');
	}
	
	public function enqueue_plyr_scripts() {
		wp_register_script('plyr-js', 'https://cdn.plyr.io/2.0.16/plyr.js');
		wp_register_script('wpfc-plyr', plugins_url( '../assets/js/plyr.js', __FILE__ ));
		
		wp_enqueue_script('plyr-js');
		wp_enqueue_script('wpfc-plyr');
	}
}

new Plugin();