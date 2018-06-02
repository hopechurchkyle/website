<?php

namespace WPFCManager\WPFCManager;

use WPFCManager\WPFCManager\Ajax\Ajax;
use WPFCManager\WPFCManager\WP\AttachWP;

class Init {
	public function __construct() {
		if ( ! is_admin() ) {
			return;
		}

		if ( ! empty( $_GET['WPFCM'] ) ) {
			$ajax = new Ajax();
			switch ( $_GET['WPFCM'] ) {
				case 'get_view':
					if ( ! empty( $_GET['view'] ) ) {
						$view = $ajax->getView( $_GET['view'] );
						if ( $view !== false ) {
							/** @noinspection PhpIncludeInspection */
							require_once( $view );
						} else {
							echo 'View not found.';
						}
					}
					break;
				case 'activate';
					if ( ! empty( $_GET['license_key'] ) && ! empty( $_GET['dir'] ) ) {
						$product = Product::getProductData( urldecode( $_GET['dir'] ) );

						$licensing = new Licensing\WHMCS( sanitize_title( $product['name'] ), $product['whmcs_md5'], $product['whmcs_path'] );
						$result    = $licensing->activate( $_GET['license_key'] );
						echo $result === true ? '1' : $result;
					}
					break;
			}
			die();
		}

		$AttachWP = AttachWP::getInstance();
		$AttachWP->init();
	}
}