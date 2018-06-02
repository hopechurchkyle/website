<?php

namespace WPFCManager\WPFCManager\WP;

use WPFCManager\WPFCManager\Product;

class RenderView {
	public static function render() {
		if ( empty( $_POST['page'] ) ) {
			require_once WPFCM_PATH . 'views/main.html.php';

			return;
		}

		switch ( $_POST['page'] ) {
			case 'lau':
				require_once WPFCM_PATH . 'views/partials/licensingAndUpdates.html.php';
				break;
			case 'products':
				require_once WPFCM_PATH . 'views/partials/products.html.php';
				break;
			case 'faq':
				require_once WPFCM_PATH . 'views/partials/faq.html.php';
				break;
			case 'support':
				require_once WPFCM_PATH . 'views/partials/support.html.php';
				break;
			case 'systemstatus':
				require_once WPFCM_PATH . 'views/partials/systemStatus.html.php';
				break;
		}

		die();
	}
}