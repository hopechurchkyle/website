<?php

namespace WPFCManager\WPFCManager;

class Product {

	/**
	 * Gets single product data
	 *
	 * @param string $dir_name Product path, i.e. (`gp_studies/gp_studies.php`)
	 *
	 * @return array|null Product data if it exists, null otherwise
	 * @since 1.0.0
	 */
	public static function getProductData( $dir_name ) {
		$products = self::getAllProductData();

		foreach ( $products as $product ) {
			if ( ! empty( $product['dir'] ) && $product['dir'] === $dir_name ) {
				return $product;
			}
		}

		return null;
	}

	/**
	 * Gets all product data. If the data is already cached, it will return cached data.
	 * Else, it will create new data, based on `wpfc_register` filter.
	 *
	 * Transient will invalidate in 6 hours max. It might disappear before that.
	 * Nothing to worry about, data will be recreated if cache does not exist.
	 *
	 * @param bool $fresh True if it should get fresh data (and delete cached)
	 *
	 * @return array Products or empty array if there are no valid products (default false)
	 *
	 * @since 1.0.0
	 */
	public static function getAllProductData( $fresh = false ) {
		// force clear cache if requested
		if ( $fresh ) {
			self::clearTempData();
		} else {
			// get cached data
			$products = get_transient( 'wpfcm_products' );

			if ( $products !== false ) {
				return $products;
			}
		}

		$products = array(
			array(
				'isPlugin'  => true,
				'updates'   => true,
				'licensing' => false,
				'dir'       => basename( WPFCM_PATH ) . '/wpfc-manager.php',
				'img'       => ''
			)
		);

		/**
		 * Product should add its own data at the end of the array and return newly created array.
		 * Array data structure:
		 *
		 * @var array   $products []
		 * @type bool   $products ['isPlugin'] - True if it is, false otherwise
		 * @type string $products ['dir'] - Product location (i.e. `gp_studies/gp_studies.php`)
		 * @type string $products ['name'] - Product name
		 * @type string $products ['version'] - Product version
		 * @type bool   $products ['licensing'] - True if product uses licensing
		 * @type bool   $products ['updates'] - True if product uses custom updates
		 * @type string $products ['whmcs_md5'] - MD5 secret for WHMCS licensing
		 * @type string $products ['gpu_version'] - Version of the GP Updater when the code was created
		 */
		$products = apply_filters( 'wpfcm_register', $products );

		// validate dir, if it's not set and valid, do not accept the product
		foreach ( $products as $key => $product ) {
			if ( empty( $product['dir'] ) ) {
				unset( $products[ $product ] );
				continue;
			}

			if ( $product['isPlugin'] === true ) {
				$path = ABSPATH . 'wp-content/plugins/';
			} else {
				$path = ABSPATH . 'wp-content/themes/';
			}

			if ( ! is_file( $path . $product['dir'] ) ) {
				unset( $products[ $key ] );
			}
		}

		// fill out rest of the data
		if ( ! empty( $products ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
			$plugins = \get_plugins();
			$themes  = \wp_get_themes();

			foreach ( $products as $key => $product ) {
				if ( $product['isPlugin'] ) {
					$plugin = $plugins[ $product['dir'] ];
					$products[ $key ] += array(
						'version' => $plugin['Version'],
						'name'    => $plugin['Name']
					);
				} else {
					$theme = $themes[ basename( $product['whmcs_path'] ) ];
					$products[ $key ] += array(
						'version' => $theme->version,
						'name'    => $theme->name,
					);
				}
			}

			// update cache
			set_transient( 'wpfcm_products', $products, 6 * HOUR_IN_SECONDS );

			return $products;
		}

		return array();
	}

	/**
	 * Clears transient data
	 *
	 * @since 1.0.0
	 */
	public static function clearTempData() {
		delete_transient( 'wpfcm_products' );
	}
}