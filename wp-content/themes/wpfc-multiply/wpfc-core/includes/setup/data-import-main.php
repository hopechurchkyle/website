<?php

/**
 * Import demo data
 */
function wpfc_import_theme_demo_data() {
	global $wpdb;

	ini_set( 'max_execution_time', 600 );
	ob_implicit_flush();
	@ob_end_flush();

	$GLOBALS['gp_start_time'] = microtime( true );

	define( 'WP_LOAD_IMPORTERS', true );

	// Import WP XML export data
	require_once 'data-import-wordpress.php';

	// create import content dir if it doesn't exist
	if ( ! is_dir( __DIR__ . '/import-content/' ) ) {
		mkdir( __DIR__ . '/import-content/' );
	}

	// remove demo files
	$files = glob( __DIR__ . '/import-content/*' );

	foreach ( $files as $file ) {
		if ( is_file( $file ) ) {
			unlink( $file );
		}
	}

	// download demo data
	echo wpfc_import_log_message( 0, 'Starting download of demo data.' );

	$remote_root_url = 'https://wpfc-theme-demo-data.s3.amazonaws.com/';

	try {
		$response = url_request_all( $remote_root_url );
	} catch ( Exception $e ) {
		echo wpfc_import_log_message( - 1, 'Error downloading demo data: ' . $e->getMessage() );
		die();
	}

	if ( function_exists( 'simplexml_load_file' ) ) {
		$xml = simplexml_load_string( $response );
	} else {
		$parser = xml_parser_create();
		$xml    = xml_parse( $parser, $response, true );
	}

	if ( ! empty( $xml->Contents ) ) {
		foreach ( $xml->Contents as $object ) {
			$path  = $object->Key;
			$theme = explode( '/', $path )[0];

			if ( $theme === basename( get_template_directory() ) && ! empty( explode( '/', $path )[1] ) ) {
				try {
					$response = url_request_all( $remote_root_url . $path );
				} catch ( Exception $e ) {
					echo wpfc_import_log_message( - 1, 'Demo data could not be downloaded #2. Error: ' . $e->getMessage() );
					die();
				}

				file_put_contents(
					__DIR__ . '/import-content/' . explode( '/', $path )[1],
					$response
				);
			}
		}
	} else {
		echo wpfc_import_log_message( - 1, 'Demo data could not be downloaded.' );
		die();
	}

	echo wpfc_import_log_message( null, 'Demo data download finished.' );

	$sample_files = scandir( __DIR__ . '/import-content/' );

	if ( count( $sample_files ) > 2 ) {
		$importer = new WP_Import();

		foreach ( $sample_files as $sample_file ) {
			$sample_file_path = __DIR__ . '/import-content/' . $sample_file;
			if ( $sample_file !== '.' && $sample_file !== '..' && is_file( $sample_file_path ) && strtolower( pathinfo( $sample_file_path, PATHINFO_EXTENSION ) ) === 'xml' ) {
				require_once( ABSPATH . 'wp-admin/includes/media.php' );
				$importer->import( wpfc_import_replace_url_placeholders( $sample_file_path ), $sample_file_path );
			}
		}

		$importer->import_end();
	}

	// import widgets
	$widgets_file = __DIR__ . '/import-content/widgets.json';
	if ( file_exists( $widgets_file ) ) {
		echo wpfc_import_log_message( 0, 'Starting import of widgets.' );
		wpfc_import_widgets( $widgets_file );
		echo wpfc_import_log_message( null, 'Done.' );
	}

	// import widgets data
	$widgets_file = __DIR__ . '/import-content/widgets_data.json';
	if ( file_exists( $widgets_file ) ) {
		echo wpfc_import_log_message( 0, 'Starting import of widgets data.' );
		wpfc_import_widgets_data( $widgets_file );
		echo wpfc_import_log_message( null, 'Done.' );
	}

	// Import WPForms forms
	$wpforms_file = __DIR__ . '/import-content/wpforms.json';
	if ( file_exists( $wpforms_file ) ) {
		if ( ! function_exists( 'is_plugin_active' ) ) {
			include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		}

		if ( is_plugin_active( 'wpforms/wpforms.php' ) ) {
			echo wpfc_import_log_message( 0, 'Starting import of WPForms.' );
			wpfc_import_wpforms( $wpforms_file );
			echo wpfc_import_log_message( null, 'Done.' );
		} else {
			echo wpfc_import_log_message( 0, 'WPForms not activated, skipping.' );
		}
	}

	// Import Elementor
	$elementor_file = __DIR__ . '/import-content/elementor.json';
	if ( file_exists( $elementor_file ) ) {
		if ( $elementor_data = json_decode( file_get_contents( $elementor_file ), true ) ) {
			echo wpfc_import_log_message( 0, 'Starting import of Elementor data.' );
			$sof = get_option( 'show_on_front' );
			$fp  = get_option( 'page_on_front' );

			foreach ( $elementor_data as $new_page_data ) {
				// check if post exists
				if ( $wpdb->get_row( "SELECT * FROM $wpdb->posts WHERE id = '" . $new_page_data['import_id'] . "'", 'ARRAY_A' ) ) {
					// update meta
					foreach ( $new_page_data['meta_input'] as $meta_key => $meta_data ) {
						update_metadata( 'post', $new_page_data['import_id'], $meta_key, $meta_data );
					}

					// update post only when there's data - we sometimes maybe just want to update meta
					if ( isset( $new_page_data['post_content'] ) ) {
						// update post content
						wp_update_post( array(
							'ID'           => $new_page_data['import_id'],
							'post_content' => $new_page_data['post_content']
						), false );
					}
				}
			}

			update_option( 'page_on_front', $fp );
			update_option( 'show_on_front', $sof );

			update_option( 'elementor_disable_color_schemes', 'yes' );
			update_option( 'elementor_disable_typography_schemes', 'yes' );
			update_option( 'elementor_container_width', '1200' );
			update_option( 'elementor_space_between_widgets', '24' );

			echo wpfc_import_log_message( null, 'Done.' );
		} else {
			echo wpfc_import_log_message( - 1, 'Could not import Elementor data. Error decoding file.' );
		}
	}

	echo wpfc_import_log_message( null, 'Import complete. Everything done.' );
	update_option( 'wpfc_theme_import_complete', 1 );
	die();
}

/**
 * Function used to replace URL placeholders with actual URL
 *
 * @param string $file Path to file
 *
 * @return string Path to temp file
 */
function wpfc_import_replace_url_placeholders( $file ) {
	$tempfile = tempnam( sys_get_temp_dir(), 'wpfc_' );
	$xml      = file_get_contents( $file );
	$xml      = str_replace( '$GP_SITE_URL$', get_site_url(), $xml );
	file_put_contents( $tempfile, $xml );

	return $tempfile;
}

/**
 * Function used for creating log messages.
 *
 * @param int|string $level      Message level. "0" Info, "1" Warning, "-1" Error. null to have it blank.
 * @param string     $message    The message.
 * @param int        $start_time Start time. For logging the time.
 * @param bool       $html       Set to true if the message should be rendered as part of HTML response. (will add
 *                               "<br>")
 *
 * @return string The message.
 */
function wpfc_import_log_message( $level, $message, $start_time = 0, $html = true ) {
	// Check if start time has been initialized
	if ( $start_time == 0 ) {
		if ( isset( $GLOBALS['gp_start_time'] ) ) {
			$start_time = $GLOBALS['gp_start_time'];
		} else {
			$GLOBALS['gp_start_time'] = microtime( true );
			$start_time               = $GLOBALS['gp_start_time'];
		}
	}

	// Change error level if int used
	if ( is_int( $level ) ) {
		switch ( $level ) {
			case 0:
				$level = 'II';
				break;
			case 1:
				$level = 'WW';
				break;
			case - 1:
				$level = 'EE';
				break;
		}
	}
	// Current time since start
	$time = round( microtime( true ) - $start_time, 2 );
	// Prepend spaces to fill 6 character time
	$time_split      = explode( '.', $time );
	$sec_char_length = strlen( isset( $time_split[0] ) ? $time_split[0] : '' );
	$ms_char_length  = strlen( isset( $time_split[1] ) ? $time_split[1] : '' );
	if ( $sec_char_length < 3 ) {
		$time = str_repeat( ' ', 3 - $sec_char_length ) . $time;
	}
	switch ( $ms_char_length ) {
		case '0':
			$time = $time . '.00';
			break;
		case '1':
			$time = $time . '0';
			break;
	}

	return '[ ' . $time . ' ]' . ( $level !== null ? ' (' . $level . ') ' : '      ' ) . $message . ( $html ? '<br>' : PHP_EOL );
}

/**
 * Import WPForms data
 *
 * @author     WPForms (https://wpforms.com)
 * @license    GPL-2.0+
 * @copyright  Copyright (c) 2016, WPForms LLC
 *
 * @param string $file          Path to export file.
 */
function wpfc_import_wpforms( $file ) {
	$ext = strtolower( pathinfo( $file, PATHINFO_EXTENSION ) );
	if ( 'json' != $ext ) {
		echo wpfc_import_log_message( - 1, 'Not valid WPForms export file.' );
	}
	$forms = json_decode( file_get_contents( $file ), true );
	if ( ! empty( $forms ) ) {
		foreach ( $forms as $form ) {
			$title = ! empty( $form['settings']['form_title'] ) ? $form['settings']['form_title'] : '';
			$desc  = ! empty( $form['settings']['form_desc'] ) ? $form['settings']['form_desc'] : '';

			if ( post_exists( $title ) ) {
				echo wpfc_import_log_message( 0, 'WPForm "' . $title . '" already exists, skipping.' );
				continue;
			}

			$new_id = wp_insert_post( array(
				'post_title'   => $title,
				'post_status'  => 'publish',
				'post_type'    => 'wpforms',
				'post_excerpt' => $desc,
			) );
			if ( $new_id ) {
				$form['id'] = $new_id;
				$new        = array(
					'ID'           => $new_id,
					'post_content' => wp_slash( json_encode( $form ) ),
				);
				wp_update_post( $new );

				if ( strpos( strtolower( $title ), 'contact' ) ) {
					$pages = get_pages();

					foreach ( $pages as $page ) {
						if ( strpos( strtolower( $page->post_title ), 'contact' ) !== false ) {
							if ( strpos( $page->post_content, 'wpforms id' ) ) {
								$page->post_content = preg_replace( '/wpforms id="\d+?(?=")"/', 'wpforms id="' . $new_id . '"', $page->post_content );
								wp_update_post( $page );
								break;
							}
						}
					}
				}

				$new_arr = get_option( 'wpfc_import_reset_wpforms', array() );
				if ( ! in_array( (int) $new_id, $new_arr ) ) {
					$new_arr[] = $new_id;

					update_option( 'wpfc_import_reset_wpforms', $new_arr );
				}
			}
		}
	}
}

function wpfc_import_widgets( $file ) {
	$data = json_decode( file_get_contents( $file ), true );

	if ( get_option( 'sidebars_widgets' ) ) {
		update_option( 'sidebars_widgets_original', get_option( 'sidebars_widgets' ) );
	}

	if ( ! update_option( 'sidebars_widgets', $data ) ) {
		echo wpfc_import_log_message( - 1, 'Failed to import widgets.' );
	}
}

function wpfc_import_widgets_data( $file ) {
	$widgets = json_decode( file_get_contents( $file ), true );
	global $wpdb;

	foreach ( $widgets as $widget ) {
		$replace = $wpdb->replace( $wpdb->prefix . 'options', array(
			'option_name'  => $widget[0],
			'option_value' => $widget[1],
		) );

		if ( ! $replace ) {
			echo wpfc_import_log_message( - 1, 'Failed to import widget ' . $widget[0] . '.' );
		}
	}
}

/**
 * Reset theme data, i.e. undo import
 */
function wpfc_reset_theme_demo_data() {
	ini_set( 'max_execution_time', 600 );
	ob_implicit_flush();
	@ob_end_flush();

	$removal_data = array(
		'posts',
		'tags',
		'terms',
		'categories',
		'wpforms',
	);

	echo wpfc_import_log_message( 0, 'Starting reset.' );

	foreach ( $removal_data as $type ) {
		switch ( $type ) {
			case 'posts':
				echo wpfc_import_log_message( 0, 'Starting post removal.' );

				$posts_to_remove = array_unique( get_option( 'wpfc_import_reset_posts', array() ) );

				if ( empty( $posts_to_remove ) ) {
					echo wpfc_import_log_message( null, 'Done. No posts to remove.' );
					break;
				}

				$all_posts = count( $posts_to_remove );
				$counter   = 0;
				foreach ( $posts_to_remove as $post_id ) {
					$current_percent = round( ( 100 / $all_posts ) * $counter );
					echo wpfc_import_log_message( '%%', $current_percent . '%' . ' (' . $post_id . ')' );
					$counter ++;

					if ( ! wp_delete_post( $post_id, true ) ) {
						echo wpfc_import_log_message( - 1, 'Failed to remove the post with ID ' . $post_id );
					}
				}

				update_option( 'wpfc_import_reset_posts', array() );

				echo wpfc_import_log_message( null, 'Done.' );

				break;
			case 'tags':
				echo wpfc_import_log_message( 0, 'Starting tag removal.' );
				$tags_to_remove = array_unique( get_option( 'wpfc_import_reset_tags', array() ) );

				if ( empty( $tags_to_remove ) ) {
					echo wpfc_import_log_message( null, 'Done. No tags to remove.' );
					break;
				}

				foreach ( $tags_to_remove as $tag_id ) {
					if ( is_array( $tag_id ) ) {
						$tag_id = $tag_id['term_id'];
					}

					if ( ! wp_delete_term( $tag_id, 'post_tag' ) ) {
						echo wpfc_import_log_message( - 1, 'Failed to remove the tag with ID ' . $tag_id );
					}
				}

				update_option( 'wpfc_import_reset_tags', array() );

				echo wpfc_import_log_message( null, 'Done.' );
				break;
			case 'terms':
				echo wpfc_import_log_message( 0, 'Starting term removal.' );
				$terms_to_remove = array_unique( get_option( 'wpfc_import_reset_terms', array() ), SORT_REGULAR );

				if ( empty( $terms_to_remove ) ) {
					echo wpfc_import_log_message( null, 'Done. No terms to remove.' );
					break;
				}

				foreach ( $terms_to_remove as $term_data ) {
					if ( ! @wp_delete_term( $term_data['term_id'], $term_data['taxonomy'] ) ) {
						echo wpfc_import_log_message( - 1, 'Failed to remove the term with ID ' . $term_data['term_id'] );
					}
				}

				update_option( 'wpfc_import_reset_terms', array() );

				echo wpfc_import_log_message( null, 'Done.' );
				break;
			case 'categories':
				echo wpfc_import_log_message( 0, 'Starting categories removal.' );
				$categories_to_remove = array_unique( get_option( 'wpfc_import_reset_categories', array() ) );

				if ( empty( $categories_to_remove ) ) {
					echo wpfc_import_log_message( null, 'Done. No categories to remove.' );
					break;
				}

				foreach ( $categories_to_remove as $category_id ) {
					if ( ! wp_delete_term( $category_id, 'category' ) ) {
						echo wpfc_import_log_message( - 1, 'Failed to remove the category with ID ' . $category_id );
					}
				}

				update_option( 'wpfc_import_reset_categories', array() );

				echo wpfc_import_log_message( null, 'Done.' );
				break;
			case 'wpforms':
				echo wpfc_import_log_message( 0, 'Starting WPForms removal.' );

				$forms_to_remove = array_unique( get_option( 'wpfc_import_reset_wpforms', array() ) );

				if ( empty( $forms_to_remove ) ) {
					echo wpfc_import_log_message( null, 'Done. No WPForms to remove.' );
					break;
				}

				foreach ( $forms_to_remove as $form_id ) {
					if ( ! wp_delete_post( $form_id, true ) ) {
						echo wpfc_import_log_message( - 1, 'Failed to remove the form with ID ' . $form_id );
					}
				}

				update_option( 'wpfc_import_reset_wpforms', array() );

				echo wpfc_import_log_message( null, 'Done.' );

				break;
		}
	}

	echo wpfc_import_log_message( 0, 'Reset finished.' );
	update_option( 'wpfc_theme_import_complete', 0 );
	die();
}

// Add REST stuff

add_action( 'rest_api_init', 'wpfc_theme_register_rest_api' );

/**
 * Registers REST API routes
 */
function wpfc_theme_register_rest_api() {
	register_rest_route( 'wpfc/v1', '/wpfcm/activate', array(
		'methods'  => 'GET',
		'callback' => 'wpfc_theme_wpfcm_activate',
	) );

	register_rest_route( 'wpfc/v1', '/wpfcm/install', array(
		'methods'  => 'GET',
		'callback' => 'wpfc_theme_wpfcm_install',
	) );

	register_rest_route( 'wpfc/v1', '/wpfcm/activate_theme/(?P<key>.*)', array(
		'methods'  => 'GET',
		'callback' => 'wpfc_activate_theme',
	) );

	register_rest_route( 'wpfc/v1', '/clear_plugin_cache', array(
		'methods'  => 'GET',
		'callback' => 'wpfc_clear_plugin_cache',
	) );

	register_rest_route( 'wpfc/v1', '/wpfc_import_theme_demo_data', array(
		'methods'  => 'GET',
		'callback' => 'wpfc_import_theme_demo_data',
	) );

	register_rest_route( 'wpfc/v1', '/wpfc_reset_theme_demo_data', array(
		'methods'  => 'GET',
		'callback' => 'wpfc_reset_theme_demo_data',
	) );

	register_rest_route( 'wpfc/v1', '/wpfc_activate_theme_plugin/(?P<slug>.*)', array(
		'methods'  => 'GET',
		'callback' => 'wpfc_activate_theme_plugin',
	) );

	register_rest_route( 'wpfc/v1', '/wpfc_hide_qs_menu_item', array(
		'methods'  => 'GET',
		'callback' => 'wpfc_hide_qs_menu_item',
	) );
}

/**
 * Activates WPFCM
 *
 * @return bool True on success, false on error
 */
function wpfc_theme_wpfcm_activate() {
	require_once( ABSPATH . 'wp-admin/includes/plugin.php' );

	return activate_plugin( 'wpfc-manager/wpfc-manager.php' ) === null ? 1 : 0;
}

/**
 * Download and installs WPFCM
 *
 * @return bool True on success, false on error
 */
function wpfc_theme_wpfcm_install() {
	try {
		$wpfcm_path = ABSPATH . 'wp-content/plugins/wpfc-manager';

		// download zip
		try {
			$zip_contents = url_request_all( 'http://wpfc-releases.s3.amazonaws.com/wpfc-manager.zip' );
		} catch ( Exception $e ) {
			return json_encode( array(
				'status'  => 'err',
				'message' => 'Could not download data. Error: ' . $e->getMessage(),
			) );
		}

		if ( $zip_contents === false ) {
			return json_encode( array(
				'status'  => 'err',
				'message' => 'Could not download data. Unknown error.',
			) );
		}

		// save the zip
		if ( file_put_contents( $wpfcm_path . '.zip', $zip_contents ) === false ) {
			return json_encode( array(
				'status'  => 'err',
				'message' => 'Could not save the zip file to the filesystem.',
			) );
		}

		// extract the zip
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		WP_Filesystem();
		if ( unzip_file( $wpfcm_path . '.zip', ABSPATH . 'wp-content/plugins' ) === false ) {
			return json_encode( array(
				'status'  => 'err',
				'message' => 'Could not extract the zip file.',
			) );
		}

		// move plugin to main dir if it's already in a subdir
		$files = array_diff( scandir( $wpfcm_path ), array( '.', '..' ) );
		// if there is a single directory in the dir, assume that is the plugin subdir
		if ( count( $files ) === 1 && is_dir( $wpfcm_path . '/' . $files[2] ) ) {
			// move subdir out from the main dir
			rename( $wpfcm_path . '/' . $files[2], $wpfcm_path . '1' );
			// remove main dir
			rmdir( $wpfcm_path );
			// rename it to main dir
			rename( $wpfcm_path . '1', $wpfcm_path );
		}

		// remove zip
		unlink( $wpfcm_path . '.zip' );
	} catch ( Exception $exception ) {
		return json_encode( array(
			'status'  => 'err',
			'message' => 'Caught exception: ' . $exception->getMessage(),
		) );
	}

	return 1;
}

/**
 * Activates the current theme
 *
 * @param WP_REST_Request $request Containing theme's license key
 *
 * @return bool|null|true
 */
function wpfc_activate_theme( $request ) {
	$product   = \WPFCManager\WPFCManager\Product::getProductData( basename( get_template_directory() ) . '/functions.php' );
	$licensing = new \WPFCManager\WPFCManager\Licensing\WHMCS( sanitize_title( $product['name'] ), $product['whmcs_md5'], $product['whmcs_path'] );
	$status    = $licensing->activate( $request->get_param( 'key' ), true );

	return $status === true ? 1 : $status;
}

/**
 * Clears plugin cache from the database
 */
function wpfc_clear_plugin_cache() {
	$success1 = true;
	if ( get_transient( get_transient( 'wpfc_3rd_party_plugins_data' ) ) ) {
		$success1 = delete_transient( get_transient( 'wpfc_3rd_party_plugins_data' ) );
	}

	$success2 = true;
	if ( get_transient( 'wpfc_3rd_party_plugins' ) ) {
		$success2 = delete_transient( 'wpfc_3rd_party_plugins' );
	}

	return $success1 && $success2 ? 1 : 0;
}

/**
 * Activates the requested plugin
 *
 * @param WP_REST_Request $request Containing the plugin's slug
 *
 * @return int|WP_Error 1 on success, WP_Error on failure
 */
function wpfc_activate_theme_plugin( $request ) {
	if ( ! function_exists( 'activate_plugin' ) ) {
		include_once ABSPATH . '/wp-admin/includes/plugin.php';
	}

	// these plugins have problems with normal activation, we will have to force a silent one for them
	$blacklist = array(
		'monarch/monarch',
	);

	ob_start();
	$result = activate_plugin( $request->get_param( 'slug' ) . '.php', '', false, in_array( $request->get_params()[1], $blacklist ) );
	@ob_clean();

	return $result === null ? 1 : $result;
}

function wpfc_hide_qs_menu_item() {
	return update_option( 'wpfc_theme_qs_hidden', 1 ) ? 1 : 0;
}

if ( ! function_exists( 'url_request_all' ) ) {
	/**
	 * Tries to get data by curl and file_get_contents, so we can avoid allow_url_fopen problem
	 *
	 * @param string $url The URL
	 *
	 * @todo setup Exceptions throwing
	 *
	 * @return mixed|null The response or null if we can't get data
	 *
	 * @throws Exception
	 */
	function url_request_all( $url ) {
		if ( function_exists( 'curl_version' ) ) {
			$curl = curl_init();

			if ( false === $curl ) {
				throw new Exception( 'err: failed to initialize curl', 0 );
			}

			curl_setopt( $curl, CURLOPT_URL, $url );
			curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt( $curl, CURLOPT_FOLLOWLOCATION, true );
			curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, true );
			curl_setopt( $curl, CURLOPT_SSL_VERIFYHOST, 2 );
			curl_setopt( $curl, CURLOPT_CAINFO, __DIR__ . '/assets/CAcerts/cacert.pem' );

			$content = curl_exec( $curl );

			if ( false === $content ) {
				throw new Exception( curl_error( $curl ), curl_errno( $curl ) );
			}

			curl_close( $curl );

			return $content;
		} else if ( file_get_contents( __FILE__ ) && ini_get( 'allow_url_fopen' ) ) {
			return file_get_contents( $url );
		} else {
			return null;
		}
	}
}
