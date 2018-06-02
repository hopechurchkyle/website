<?php

namespace WPFCManager\WPFCManager\Updates;

use WPFCManager\WPFCManager\Product;

/**
 * Class Updates
 *
 * @package WPFCManager\WPFCManager\Updates
 * @since   1.0.0
 */
class Updates {

	/**
	 * Executed on `update_plugins` transient
	 *
	 * @param $data
	 *
	 * @return mixed
	 */
	public static function checkPluginsUpdates( $data ) {
		return self::checkUpdates( $data, true );
	}

	/**
	 * @param bool $plugins Set to true to return only plugins data
	 *
	 * @return mixed
	 */
	public static function checkUpdates( $data, $plugins ) {
		// this is not the data we should edit
		if ( ! isset( $data->checked ) && ! isset( $data->response ) ) {
			return $data;
		}

		// get our products
		$products = Product::getAllProductData();

		foreach ( $products as $product ) {
			if ( $product['isPlugin'] !== $plugins ) {
				continue;
			}

			if ( $product['updates'] === false ) {
				continue;
			}

			if ( $plugins ) {
				// If response for our product is already set, remove it
				// Sometimes WP finds another product with the same name in WP.org
				if ( isset( $response[ $product['dir'] ] ) ) {
					unset( $response[ $product['dir'] ] );
				}

				if ( self::isUpdateAvailable( $product['dir'] ) ) {
					$plugin_slug                       = explode( '/', $product['dir'] );
					$data->response[ $product['dir'] ] = (object) array(
						'slug'        => $plugin_slug ? $plugin_slug[0] : sanitize_title( $product['name'] ),
						'plugin'      => $product['dir'],
						'new_version' => self::getLatestVersion( $product['dir'] ),
						'package'     => self::getUpdateUrl( $product['dir'] ),
					);
				} else {
					$data->no_update[ $product['dir'] ] = (object) array(
						'slug'        => sanitize_title( $product['name'] ),
						'plugin'      => $product['dir'],
						'new_version' => $product['version'],
						'url'         => '',
						'package'     => ''
					);
				}
			} else {
				$wp_slug = basename( $product['whmcs_path'] );

				// If response for our product is already set, remove it
				// Sometimes WP finds another product with the same name in WP.org
				if ( isset( $response[ $wp_slug ] ) ) {
					unset( $response[ $wp_slug ] );
				}

				if ( self::isUpdateAvailable( $product['dir'] ) ) {
					$data->response[ $wp_slug ] = array(
						'theme'       => $wp_slug,
						'new_version' => self::getLatestVersion( $product['dir'] ),
						'url'         => '',
						'package'     => self::getUpdateUrl( $product['dir'] ),
					);
				} else {
					$data->checked[ $wp_slug ] = $product['version'];
				}
			}
		}

		return $data;
	}

	/**
	 * Checks if there is an update available
	 *
	 * @param string $product_dir
	 *
	 * @return bool|null True if it is, false otherwise. Null on failure.
	 */

	public static function isUpdateAvailable( $product_dir ) {
		if ( self::getLatestVersion( $product_dir ) !== null &&
		     self::getCurrentVersion( $product_dir ) !== null
		) {
			if ( version_compare( self::getLatestVersion( $product_dir ), self::getCurrentVersion( $product_dir ), '>' ) ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Gets latest remote version
	 *
	 * @param string $product_dir
	 *
	 * @return null|string Version on success, null on failure.
	 */

	public static function getLatestVersion( $product_dir ) {
		$product = Product::getProductData( $product_dir );
		$slug    = sanitize_title( $product['name'] );

		if ( get_transient( $slug . '-remote_version' ) !== false ) {
			$new_version = get_transient( $slug . '-remote_version' );
		} else {
			try {
				// get the latest version
				$version_response = json_decode( \url_request_all( 'https://www.wpforchurch.com/?GPAPI=get_product_version&product=' . $slug ) );
			} catch ( \Exception $exception ) {
				return null;
			}

			if ( ! ! $version_response ) {
				$new_version = $version_response->message;

				set_transient( $slug . '-remote_version', $new_version, 5 * MINUTE_IN_SECONDS );
			} else {
				return null;
			}
		}

		return $new_version;
	}

	/**
	 * Gets current product version
	 *
	 * @param string $product_dir
	 *
	 * @return null|string Version on success, null on failure.
	 */

	public static function getCurrentVersion( $product_dir ) {
		$product = Product::getProductData( $product_dir );

		return $product['version'];
	}

	/**
	 * Gets temporary update URL from
	 *
	 * @param $plugin_dir
	 *
	 * @return mixed|string
	 */
	public static function getUpdateUrl( $plugin_dir ) {
		$product = Product::getProductData( $plugin_dir );
		$slug    = sanitize_title( $product['name'] );

		if ( get_transient( $slug . '-update_url' ) !== false ) {
			$package = get_transient( $slug . '-update_url' );
		} else {
			// get temporary download URL
			$request_url = 'https://www.wpforchurch.com/?GPAPI=get_product_update_url&product=' . $slug;

			if ( $product['licensing'] ) {
				$package = '';
				$domain  = $_SERVER['SERVER_NAME'];
				$ip      = isset( $_SERVER['SERVER_ADDR'] ) ? $_SERVER['SERVER_ADDR'] : $_SERVER['LOCAL_ADDR'];
				$path    = $product['whmcs_path'];

				$request_url .= '&license_key=' . get_option( $slug . '-license_key', '' ) . '&ip=' . $ip . '&domain=' . urlencode( $domain ) . '&path=' . urlencode( $path );
			}

			try {
				$package_response = json_decode( \url_request_all( $request_url ) );
			} catch ( \Exception $exception ) {
				return isset( $package ) ? $package : '';
			}

			if ( ! ! $package_response && $package_response->status == 0 ) {
				$package            = $package_response->message;
				$package_data       = explode( '&', substr( $package, strpos( $package, '?' ) + 1 ) );
				$package_expiration = intval( substr( $package_data[1], 8 ) ) - time();

				set_transient( $slug . '-update_url', $package, $package_expiration );
			}
		}

		return isset( $package ) ? $package : '';
	}

	/**
	 * Executed on `update_themes` transient
	 *
	 * @param $data
	 *
	 * @return mixed
	 */
	public static function checkThemesUpdates( $data ) {
		return self::checkUpdates( $data, false );
	}
}