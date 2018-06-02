<?php

/**
 * This file serves as an example product registration code.
 *
 * Change `PREFIX_` to something unique and place it in main plugin file (i.e.
 * `~/wp-content/plugins/my_plugin/my_plugin.php`) if it's a plugin or in theme's `functions.php` if it's a theme.
 *
 * Product will be registered on two events:
 * 1) When the product is activated (or if the code was added while the product was activated - on reactivation)
 * 2) When WPFC Manager is reactivated
 */

/**
 * Changelog:
 * = 1.0.2 =
 * * Improve directory/file paths automatic resolution
 *
 * = 1.0.1 =
 * - Fix crashing on older PHP version
 *
 * = 1.0.0 =
 * - Initial version
 */

// Required code to copy starts here //


/* WPFC MANAGER START */
$prefix = 'PREFIX_'; // change this (don't remove the underscore)
if ( ! class_exists( $prefix . 'WPFCManagerRegister' ) ) {
	class PREFIX_WPFCManagerRegister { // put the same prefix here. (don't remove the underscore)

		/**
		 * @var array Product data
		 */
		public static $product_data = array( // modify this array too
			'isPlugin'    => true,
			'licensing'   => false,
			'updates'     => false,
			'whmcs_md5'   => '',
			'gpu_version' => '1.0.0',
			'img'         => '',
		);

		/**
		 * The usual path to WPFC Manager.
		 *
		 * @var string
		 */

		public $wpfcm_path;

		/**
		 * The path to current plugin/theme
		 *
		 * @var string
		 */

		public $product_path = '';

		public function __construct() {
			$this->product_path = self::$product_data['isPlugin'] ? basename( __DIR__ ) . '/' . basename( __FILE__ ) : basename( get_template_directory() ) . '/functions.php';
			$this->wpfcm_path   = ABSPATH . 'wp-content/plugins/wpfc-manager';
		}

		/**
		 * This function hooks to WPFCM filter and adds this product to it
		 *
		 * @param array $products All existing products
		 *
		 * @return array
		 */
		public static function registerProduct( $products ) {
			$product_details               = self::$product_data;
			$product_details['dir']        = self::$product_data['isPlugin'] ? basename( __DIR__ ) . '/' . basename( __FILE__ ) : basename( get_template_directory() ) . '/functions.php'; // TODO: Remove this hardcoded value
			$product_details['whmcs_path'] = self::$product_data['isPlugin'] ? dirname( __FILE__ ) : get_template_directory();
			$products[]                    = $product_details;

			return $products;
		}

		/**
		 * @param bool $installed Set to true if the plugin is installed and not active. False if it's not installed.
		 */
		public static function renderNotice( $installed ) {
			global $pagenow;
			if ( $pagenow !== 'update.php' ) {
				$self        = new self;
				$name        = '';
				$text_domain = '';

				if ( self::$product_data['isPlugin'] ) {
					$product_data = $self->getCurrentPluginData();
					if ( $product_data ) {
						$name        = $product_data['Name'];
						$text_domain = $product_data['TextDomain'];
					}
				} else {
					$product_data = $self->getCurrentThemeData();
					if ( $product_data ) {
						$name        = $product_data->name;
						$text_domain = '';
					}
				}
				?>
				<div class="notice notice-warning is-dismissible">
					<?php if ( $product_data !== false ): ?>
						<p><strong><?php echo $name; ?>:</strong>
							<?php _e( '"WP for Church Manager" plugin is not ' . ( $installed ? 'activated' : 'installed' ) . '. Please activate this plugin to receive updates.', $text_domain ); ?>
							<br>
							<?php if ( ! $installed ): ?>
								<a href="https://wpfc-releases.s3.amazonaws.com/wpfc-manager.zip"><?php _e( 'Click here', $text_domain ); ?></a>
								to download it
							<?php else: ?>
								<a href="plugins.php"><?php _e( 'Click here', $text_domain ); ?></a> to open plugins page and activate it
							<?php endif; ?>
						</p>
					<?php else: ?>
						<p><?php echo '"WP for Church Manager" plugin is not activated. You won\'t get updates.'; ?></p>
					<?php endif; ?>
				</div>
				<?php
			}
		}

		/**
		 * Renders the notice. Do not call directly.
		 */
		public static function renderNoticeWPFCMNotActive() {
			self::renderNotice( true );
		}

		/**
		 * Renders the notice. Do not call directly.
		 */
		public static function renderNoticeWPFCMNotInstalled() {
			self::renderNotice( false );
		}

		/**
		 * Returns only current plugin data from `get_plugins()`.
		 *
		 * @return array|false
		 */
		public function getCurrentPluginData() {
			$plugins = get_plugins();

			return empty( $plugins[ $this->product_path ] ) ? false : $plugins[ $this->product_path ];
		}

		/**
		 * Returns only current theme data from `wp_get_themes()`
		 *
		 * @return array|false
		 */
		public function getCurrentThemeData() {
			$themes = wp_get_themes();

			return empty( $themes[ basename( get_template_directory() ) ] ) ? false : $themes[ basename( get_template_directory() ) ];
		}

		/**
		 * All functions should be executed here.
		 * All fatal errors should be outputted in an admin notice.
		 *
		 * @since 1.0.0
		 */

		public function init() {
			global $prefix;
			$WPFC_active = $this->checkForManager();

			// if not already done
			if ( ! get_option( $prefix . 'manager_done', '0' ) ) {
				// if the plugin is already there, show a notice that it should be activated
				if ( $WPFC_active === true ) {
					require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
					activate_plugin( $this->wpfcm_path . '/wpfc-manager.php' );
				} else if ( $WPFC_active === false ) {
					$this->downloadWPFCM();
				}

				update_option( $prefix . 'manager_done', '1', true );
			} else {
				if ( $WPFC_active === true ) {
					$this->noticeWPFCMNotActive();
				} else if ( $WPFC_active === false ) {
					$this->noticeWPFCMNotInstalled();
				}
			}
		}

		/**
		 * Checks if WPFC Manager is already installed.
		 * If it's installed but not activated, it will return true.
		 * If it's installed and activated, it will return its version.
		 * If it's not installed, it will return false.
		 *
		 * @return bool|string
		 * @since 1.0.0
		 */

		public function checkForManager() {
			// if activated return version
			if ( defined( 'WPFCM_VERSION' ) ) {
				return WPFCM_VERSION;
			}

			// if installed return true
			if ( is_dir( $this->wpfcm_path ) || is_link( $this->wpfcm_path ) ) {
				return true;
			}

			return false;
		}

		/**
		 * Shows notice that WPFCM is not active.
		 *
		 * @return void
		 * @since 1.0.0
		 */
		public function noticeWPFCMNotActive() {
			add_action( 'admin_notices', array( get_class(), 'renderNoticeWPFCMNotActive' ) );
		}

		/**
		 * Shows notice that WPFCM is not active.
		 *
		 * @return void
		 * @since 1.0.0
		 */
		public function noticeWPFCMNotInstalled() {
			add_action( 'admin_notices', array( get_class(), 'renderNoticeWPFCMNotInstalled' ) );
		}

		/**
		 * Downloads and unpacks WPFCM to `~/wp/wp-content/plugins/wpfc-manager`
		 *
		 * @return bool True on success, false otherwise.
		 */
		public function downloadWPFCM() {
			// download the zip
			try {
				if ( file_put_contents( $this->wpfcm_path . '.zip', \url_request_all( 'https://wpfc-releases.s3.amazonaws.com/wpfc-manager.zip' ) ) === false ) {
					return false;
				}
			} catch ( Exception $exception ) {
				return false;
			}

			if ( mkdir( $this->wpfcm_path ) === false ) {
				return false;
			}

			// extract the zip
			require_once( ABSPATH . 'wp-admin/includes/file.php' );
			WP_Filesystem();
			if ( unzip_file( $this->wpfcm_path . '.zip', $this->wpfcm_path ) === false ) {
				return false;
			}

			// move plugin to main dir if it's already in a subdir
			$files = array_diff( scandir( $this->wpfcm_path ), array( '.', '..' ) );
			// if there is a single directory in the dir, assume that is the plugin subdir
			if ( count( $files ) === 1 && is_dir( $this->wpfcm_path . '/' . $files[2] ) ) {
				// move subdir out from the main dir
				rename( $this->wpfcm_path . '/' . $files[2], $this->wpfcm_path . '1' );
				// rename it to main dir
				rename( $this->wpfcm_path . '1', $this->wpfcm_path );
			}

			// remove zip
			unlink( $this->wpfcm_path . '.zip' );

			return true;
		}

		/**
		 * Creates download URL for plugins that are used by themes
		 *
		 * @param string|array $plugin Plugin name or array of names
		 *
		 * @return string|array|false Download URL; Or array of URLs in [plugin_name] => [URL] pairs; Or false if
		 *                            license is invalid
		 */
		public static function generatePluginDownloadUrl( $plugin ) {
			$self = new self;

			if ( self::$product_data['isPlugin'] ) {
				$product_data = $self->getCurrentPluginData();
				$slug         = sanitize_title( $product_data['Name'] );
			} else {
				$product_data = $self->getCurrentThemeData();
				$slug         = sanitize_title( $product_data->name );
			}

			if ( get_transient( $slug . '-plugin_urls' ) ) {
				return get_transient( $slug . '-plugin_urls' );
			} else {
				if ( ! get_option( $slug . '-license_key', '' ) ) {
					return false;
				}

				$domain = $_SERVER['SERVER_NAME'];
				$ip     = isset( $_SERVER['SERVER_ADDR'] ) ? $_SERVER['SERVER_ADDR'] : $_SERVER['LOCAL_ADDR'];
				$path   = dirname( __FILE__ );

				try {
					$response = json_decode( \url_request_all( 'https://www.wpforchurch.com/?WPFC=get_plugin_download_url&plugin=' . urlencode( ( is_array( $plugin ) ? json_encode( $plugin ) : $plugin ) ) . '&license_key=' . urlencode( get_option( $slug . '-license_key', '' ) ) . '&ip=' . urlencode( $ip ) . '&domain=' . urlencode( $domain ) . '&path=' . urlencode( $path ) ) );
				} catch ( Exception $exception ) {
					return $exception->getMessage();
				}

				if ( $response !== null && $response->status == 0 ) {
					$response = is_object( $response->message ) ? (array) $response->message : $response->message;

					// cache the urls
					if ( is_array( $plugin ) ) {
						set_transient( $slug . '-plugin_urls', $response, 5 * MINUTE_IN_SECONDS );
					}

					return $response;
				}
			}

			return false;
		}

		/**
		 * Restore theme `custom` folder after update
		 *
		 * @param bool  $response   Install response.
		 * @param array $hook_extra Extra arguments passed to hooked filters.
		 * @param array $result     Installation result data.
		 *
		 * @return bool|WP_Error;
		 */
		public static function restoreUserFolder( $response, $hook_extra, $result ) {
			global $pagenow;

			// check response - not returning true for some reason.
			/*if ( $response !== true ) {
				return $response;
			}*/

			// check if it's our theme
			if ( ( isset( $hook_extra['theme'] ) && basename( get_theme_file_path() ) !== $hook_extra['theme'] ) || $pagenow !== 'update.php' ) {
				return $response;
			}

			$custom_dir_path      = $result['destination'] . 'custom';
			$custom_dir_temp_path = $result['local_destination'] . '/' . $result['destination_name'] . '_data';

			echo 'Restoring template data...<br>';

			// check if data for restoring exists
			if ( ! @is_dir( $custom_dir_temp_path ) ) {
				echo 'Uh oh, temporary template data does not exist.<br>';

				return $response;
			}

			// create custom dir in theme if it does not exist (it never will)
			if ( ! @is_dir( $custom_dir_path ) ) {
				wp_mkdir_p( $custom_dir_path );
			} else {
				if ( count( scandir( $custom_dir_path ) ) > 2 ) {
					echo 'Template data already exists, skipping import.<br>';

					return $response;
				}
			}

			// copy custom data back
			if ( copy_dir( $custom_dir_temp_path, $custom_dir_path ) !== true ) {
				echo 'Could not copy temporary data, please copy manually from [' . $custom_dir_temp_path . '] to [' . $custom_dir_path . '].<br>';
			}

			// remove temp dir
			global $wp_filesystem;
			if ( ! $wp_filesystem->rmdir( $custom_dir_temp_path, true ) ) {
				echo 'Could not remove temporary custom dir, please remove manually: ' . $custom_dir_temp_path;
			}

			echo 'Restore complete.<br>';

			return $response;
		}

		/**
		 * Save `custom` folder before the update
		 *
		 * @param string      $source        File source location.
		 * @param string      $remote_source Remote file source location.
		 * @param WP_Upgrader $WP_Upgrader   WP_Upgrader instance.
		 * @param array       $hook_extra    Extra arguments passed to hooked filters.
		 *
		 * @return WP_Error|string;
		 */
		public static function backupUserFolder( $source, $remote_source, $WP_Upgrader, $hook_extra ) {
			global $pagenow;
			// check if it's our theme
			if ( ( isset( $hook_extra['theme'] ) && basename( get_theme_file_path() ) !== $hook_extra['theme'] ) || $pagenow !== 'update.php' ) {
				return $source;
			}

			$themes_dir           = WP_CONTENT_DIR . '/themes/';
			$custom_dir_path      = $themes_dir . $hook_extra['theme'] . '/custom';
			$custom_dir_temp_path = $themes_dir . $hook_extra['theme'] . '_data';

			// if custom dir doesn't exist, don't do anything
			if ( ! @is_dir( $custom_dir_path ) ) {
				return $source;
			}

			// check if previous dir was not removed
			if ( @is_dir( $custom_dir_temp_path ) ) {
				echo 'Found previous temporary template data directory, removing...<br>';

				global $wp_filesystem;
				if ( ! $wp_filesystem->rmdir( $custom_dir_temp_path, true ) ) {
					return new WP_Error( 'broke', 'Could not remove temporary custom dir, please remove manually: ' . $custom_dir_temp_path );
				}
			}

			// create temp dir
			wp_mkdir_p( $custom_dir_temp_path );

			echo 'Copying user data...<br>';

			// copy data to temporary dir
			if ( copy_dir( $custom_dir_path, $custom_dir_temp_path ) !== true ) {
				return new WP_Error( 'broke', 'Could not create temporary template data directory. Please contact GospelPowered support.' );
			}

			return $source;
		}
	}

	$WPFCM = $prefix . 'WPFCManagerRegister';
	add_action( 'admin_init', array( new $WPFCM, 'init' ) );
	add_filter( 'wpfcm_register', array( new $WPFCM, 'registerProduct' ) );
	add_filter( 'upgrader_post_install', array( new $WPFCM, 'restoreUserFolder' ), 10, 3 );
	add_filter( 'upgrader_source_selection', array( new $WPFCM, 'backupUserFolder' ), 10, 4 );
}
/* WPFCM END */