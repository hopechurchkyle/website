<?php

namespace WPFCManager\WPFCManager\Ajax;

class Ajax {
	/**
	 * Gets requested view
	 *
	 * @param string $view The view
	 *
	 * @return false|string The path to the view or false if not allowed/found
	 */
	public function getView( $view ) {
		$view_map = array(
			'lau'          => 'licensingAndUpdates',
			'products'     => 'products',
			'faq'          => 'faq',
			'support'      => 'support',
			'systemstatus' => 'systemStatus'
		);

		// check if allowed
		if ( ! array_key_exists( $view, $view_map ) ) {
			return false;
		}

		// create the path
		$view_path = WPFCM_PATH . 'views/partials/' . $view_map[ $view ] . '.html.php';

		// check if view exists
		if ( ! is_file( $view_path ) ) {
			return false;
		}

		return $view_path;
	}
}