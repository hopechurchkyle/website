<?php
/**
 * Core Functions
 *
 * General core functions available on both the front-end and admin.
 */

defined( 'ABSPATH' ) or die;

/**
 * Retrieve the date on which the sermon was preached
 *
 * Unlike sm_the_date() this function will always return the date.
 * Modify output with the {@see 'sm_get_the_date'} filter.
 *
 * @param string $d
 * @param null   $post
 *
 * @return false|string
 */
function sm_get_the_date( $d = '', $post = null ) {
	if ( ! $the_date = SM_Dates::get( $d, $post ) ) {
		$post = get_post( $post );

		if ( ! $post ) {
			return false;
		}

		if ( '' == $d ) {
			$the_date = mysql2date( get_option( 'date_format' ), $post->post_date, true );
		} else {
			$the_date = mysql2date( $d, $post->post_date, true );
		}
	}

	/**
	 * Filters the date a sermon was preached.
	 *
	 * @since 2.6
	 *
	 * @param string      $the_date The formatted date.
	 * @param string      $d        PHP date format. Defaults to 'date_format' option
	 *                              if not specified.
	 * @param int|WP_Post $post     The post object or ID.
	 */
	return apply_filters( 'sm_get_the_date', $the_date, $d, $post );
}

/**
 * Display or Retrieve the date the current sermon was preached (once per date).
 *
 * Made to replace `wpfc_sermon_date()`
 *
 * HTML output can be filtered with 'sm_the_date'.
 * Date string output can be filtered with 'sm_get_the_date'.
 *
 * @since 2.6
 * @since 2.12 Added $post parameter
 *
 * @param string      $d      Optional. PHP date format. Defaults to the date_format option if not specified.
 * @param string      $before Optional. Output before the date.
 * @param string      $after  Optional. Output after the date.
 * @param int|WP_Post $post   Required if function is not used within The Loop; otherwise optional.
 *
 * @return void
 */

function sm_the_date( $d = '', $before = '', $after = '', $post = null ) {
	$the_date = $before . sm_get_the_date( $d, $post ) . $after;

	/**
	 * Filters the date a post was preached
	 *
	 * @since 2.6
	 *
	 * @param string      $the_date The formatted date string.
	 * @param string      $d        PHP date format. Defaults to 'date_format' option
	 *                              if not specified.
	 * @param string      $before   HTML output before the date.
	 * @param string      $after    HTML output after the date.
	 * @param int|WP_Post $post     Sermon post object or ID
	 */
	echo apply_filters( 'the_date', $the_date, $d, $before, $after, $post );
}

/**
 * Get permalink settings for Sermon Manager independent of the user locale.
 *
 * @since 2.7
 * @since 2.12.3 added filter to easily modify slugs
 *
 * @return array
 */
function sm_get_permalink_structure() {
	if ( did_action( 'admin_init' ) ) {
		sm_switch_to_site_locale();
	}

	$permalinks = wp_parse_args( (array) get_option( 'sm_permalinks', array() ), array(
		'wpfc_preacher'          => trim( sanitize_title( \SermonManager::getOption( 'preacher_label' ) ) ),
		'wpfc_sermon_series'     => '',
		'wpfc_sermon_topics'     => '',
		'wpfc_bible_book'        => '',
		'wpfc_service_type'      => '',
		'wpfc_sermon'            => trim( \SermonManager::getOption( 'archive_slug' ) ),
		'use_verbose_page_rules' => false,
	) );

	// Ensure rewrite slugs are set.
	$permalinks['wpfc_preacher']      = untrailingslashit( empty( $permalinks['wpfc_preacher'] ) ? _x( 'preacher', 'slug', 'sermon-manager-for-wordpress' ) : $permalinks['wpfc_preacher'] );
	$permalinks['wpfc_sermon_series'] = untrailingslashit( empty( $permalinks['wpfc_sermon_series'] ) ? _x( 'series', 'slug', 'sermon-manager-for-wordpress' ) : $permalinks['wpfc_sermon_series'] );
	$permalinks['wpfc_sermon_topics'] = untrailingslashit( empty( $permalinks['wpfc_sermon_topics'] ) ? _x( 'topics', 'slug', 'sermon-manager-for-wordpress' ) : $permalinks['wpfc_sermon_topics'] );
	$permalinks['wpfc_bible_book']    = untrailingslashit( empty( $permalinks['wpfc_bible_book'] ) ? _x( 'book', 'slug', 'sermon-manager-for-wordpress' ) : $permalinks['wpfc_bible_book'] );
	$permalinks['wpfc_service_type']  = untrailingslashit( empty( $permalinks['wpfc_service_type'] ) ? _x( 'service-type', 'slug', 'sermon-manager-for-wordpress' ) : $permalinks['wpfc_service_type'] );
	$permalinks['wpfc_sermon']        = untrailingslashit( empty( $permalinks['wpfc_sermon'] ) ? _x( 'sermons', 'slug', 'sermon-manager-for-wordpress' ) : $permalinks['wpfc_sermon'] );

	if ( \SermonManager::getOption( 'common_base_slug' ) ) {
		foreach ( $permalinks as $name => &$permalink ) {
			if ( $name === 'wpfc_sermon' ) {
				continue;
			}

			$permalink = $permalinks['wpfc_sermon'] . '/' . $permalink;
		}
	}

	if ( did_action( 'admin_init' ) ) {
		sm_restore_locale();
	}

	/**
	 * Allows to easily modify the slugs of sermons and taxonomies
	 *
	 * @param array $permalinks Existing permalinks structure
	 *
	 * @since 2.12.3
	 */
	return apply_filters( 'wpfc_sm_permalink_structure', $permalinks );
}

/**
 * Switch Sermon Manager to site language.
 *
 * @since 2.7
 */
function sm_switch_to_site_locale() {
	if ( function_exists( 'switch_to_locale' ) ) {
		switch_to_locale( get_locale() );

		// Filter on plugin_locale so load_plugin_textdomain loads the correct locale.
		add_filter( 'plugin_locale', 'get_locale' );

		// Init Sermon Manager locale.
		SermonManager::load_translations();
	}
}

/**
 * Switch Sermon Manager language to original.
 *
 * @since 2.7
 */
function sm_restore_locale() {
	if ( function_exists( 'restore_previous_locale' ) ) {
		restore_previous_locale();

		// Remove filter.
		remove_filter( 'plugin_locale', 'get_locale' );

		// Init Sermon Manager locale.
		SermonManager::load_translations();
	}
}

/**
 * Display a Sermon Manager help tip.
 *
 * @param  string $tip        Help tip text
 * @param  bool   $allow_html Allow sanitized HTML if true or escape
 *
 * @return string
 * @since 2.9
 */
function sm_help_tip( $tip, $allow_html = false ) {
	if ( $allow_html ) {
		$tip = sm_sanitize_tooltip( $tip );
	} else {
		$tip = esc_attr( $tip );
	}

	return '<span class="sm-help-tip" data-tip="' . $tip . '"></span>';
}

/**
 * Get an image size.
 *
 * Variable is filtered by sm_get_image_size_{image_size}.
 *
 * @param array|string $image_size
 *
 * @return array
 * @since 2.9
 */
function sm_get_image_size( $image_size ) {
	if ( is_array( $image_size ) ) {
		$width  = isset( $image_size[0] ) ? $image_size[0] : 300;
		$height = isset( $image_size[1] ) ? $image_size[1] : 200;
		$crop   = isset( $image_size[2] ) ? $image_size[2] : true;

		$size = array(
			'width'  => $width,
			'height' => $height,
			'crop'   => $crop,
		);

		$image_size = $width . '_' . $height;

	} elseif ( in_array( $image_size, array( 'sermon_small', 'sermon_medium', 'sermon_wide' ) ) ) {
		// reset variables
		$w = $h = $c = null;

		switch ( $image_size ) {
			case 'sermon_small':
				$w = 75;
				$h = 75;
				$c = true;

				break;
			case 'sermon_medium':
				$w = 300;
				$h = 200;
				$c = true;

				break;
			case 'sermon_wide':
				$w = 940;
				$h = 350;
				$c = true;

				break;
		}

		$size           = get_option( $image_size . '_image_size', array() );
		$size['width']  = isset( $size['width'] ) ? $size['width'] : $w;
		$size['height'] = isset( $size['height'] ) ? $size['height'] : $h;
		$size['crop']   = isset( $size['crop'] ) ? $size['crop'] : $c;

	} else {
		$size = array(
			'width'  => 300,
			'height' => 200,
			'crop'   => true,
		);
	}

	return apply_filters( 'sm_get_image_size_' . $image_size, $size );
}

/**
 * Checks the file extension and gets image size based on filetype.
 *
 * @param string $img_loc Image URL
 *
 * @return array|false Array with first item as width and second as height of false if unable to get data
 *
 * @since 2.10
 */
function sm_get_image_dimensions( $img_loc ) {
	// check if url is set
	if ( trim( $img_loc ) === '' ) {
		return false;
	}

	switch ( pathinfo( strtolower( $img_loc ), PATHINFO_EXTENSION ) ) {
		case 'jpg':
		case 'jpeg':
			return sm_get_jpeg_dimensions( $img_loc );
		case 'png':
			return sm_get_png_dimensions( $img_loc );
	}

	return false;
}

/**
 * Retrieve PNG width and height without downloading/reading entire image.
 * Adapted from http://php.net/manual/en/function.getimagesize.php#88793
 *
 * @param string $img_loc Image URL
 *
 * @return array|false Array with first item as width and second as height of false if unable to get data
 *
 * @since 2.10
 */
function sm_get_png_dimensions( $img_loc ) {
	$handle = @fopen( $img_loc, "rb" );

	// check if url is accessible or fail gracefully
	if ( $handle === false ) {
		return false;
	}

	if ( ! feof( $handle ) ) {
		$new_block = fread( $handle, 24 );
		if ( $new_block[0] == "\x89" &&
		     $new_block[1] == "\x50" &&
		     $new_block[2] == "\x4E" &&
		     $new_block[3] == "\x47" &&
		     $new_block[4] == "\x0D" &&
		     $new_block[5] == "\x0A" &&
		     $new_block[6] == "\x1A" &&
		     $new_block[7] == "\x0A" ) {
			if ( $new_block[12] . $new_block[13] . $new_block[14] . $new_block[15] === "\x49\x48\x44\x52" ) {
				$width = unpack( 'H*', $new_block[16] . $new_block[17] . $new_block[18] . $new_block[19] );
				$width = hexdec( $width[1] );

				$height = unpack( 'H*', $new_block[20] . $new_block[21] . $new_block[22] . $new_block[23] );
				$height = hexdec( $height[1] );

				return array( $width, $height );
			}
		}
	}

	return false;
}

/**
 * Retrieve JPEG width and height without downloading/reading entire image.
 *
 * @param string $img_loc Image URL
 *
 * @return array|false
 * @since 2.9
 *
 * @see   http://php.net/manual/en/function.getimagesize.php#88793
 */
function sm_get_jpeg_dimensions( $img_loc ) {
	$handle = @fopen( $img_loc, "rb" );

	// check if url is accessible or fail gracefully
	if ( $handle === false ) {
		return false;
	}

	$new_block = null;
	if ( ! feof( $handle ) ) {
		$new_block = fread( $handle, 32 );
		$i         = 0;
		if ( $new_block[ $i ] == "\xFF" && $new_block[ $i + 1 ] == "\xD8" && $new_block[ $i + 2 ] == "\xFF" && $new_block[ $i + 3 ] == "\xE0" ) {
			$i += 4;
			if ( $new_block[ $i + 2 ] == "\x4A" && $new_block[ $i + 3 ] == "\x46" && $new_block[ $i + 4 ] == "\x49" && $new_block[ $i + 5 ] == "\x46" && $new_block[ $i + 6 ] == "\x00" ) {
				// Read block size and skip ahead to begin cycling through blocks in search of SOF marker
				$block_size = unpack( "H*", $new_block[ $i ] . $new_block[ $i + 1 ] );
				$block_size = hexdec( $block_size[1] );
				while ( ! feof( $handle ) ) {
					$i         += $block_size;
					$new_block .= fread( $handle, $block_size );
					if ( $new_block[ $i ] == "\xFF" ) {
						// New block detected, check for SOF marker
						$sof_marker = array(
							"\xC0",
							"\xC1",
							"\xC2",
							"\xC3",
							"\xC5",
							"\xC6",
							"\xC7",
							"\xC8",
							"\xC9",
							"\xCA",
							"\xCB",
							"\xCD",
							"\xCE",
							"\xCF"
						);
						if ( in_array( $new_block[ $i + 1 ], $sof_marker ) ) {
							// SOF marker detected. Width and height information is contained in bytes 4-7 after this byte.
							$size_data = $new_block[ $i + 2 ] . $new_block[ $i + 3 ] . $new_block[ $i + 4 ] . $new_block[ $i + 5 ] . $new_block[ $i + 6 ] . $new_block[ $i + 7 ] . $new_block[ $i + 8 ];
							$unpacked  = unpack( "H*", $size_data );
							$unpacked  = $unpacked[1];
							$height    = hexdec( $unpacked[6] . $unpacked[7] . $unpacked[8] . $unpacked[9] );
							$width     = hexdec( $unpacked[10] . $unpacked[11] . $unpacked[12] . $unpacked[13] );

							return array( $width, $height );
						} else {
							// Skip block marker and read block size
							$i          += 2;
							$block_size = unpack( "H*", $new_block[ $i ] . $new_block[ $i + 1 ] );
							$block_size = hexdec( $block_size[1] );
						}
					} else {
						return false;
					}
				}
			}
		}
	}

	return false;
}

/**
 * Import and assign thumbnail to sermon (or any other post/CPT)
 *
 * Accepts remote or local image URL.
 *
 * - If it is a local URL and it's pointing to a path under WP uploads directory, it will check for
 *   database attachment existence - if it exists, it will use it.
 *   If database attachment does not exist - it will create it without moving the image, and will use it.
 * - If it is a local URL and is not under WP uploads directory, it will act like it is a remote URL.
 * - If it is a remote URL, it will save it as such.
 *
 * (remote URLs are not supported by default in WP, but we have a piece of code that makes them usable)
 *
 * @param string $image_url The URL of the image to use (local or remote)
 * @param int    $post_id   Sermon/post to attach the image to; Passing 0 won't assign the image, it will
 *                          just import it and return the ID of the attachment
 *
 * @return bool|int If $post_id is set to 0 - returns attachment ID; True|false otherwise, depending on success
 * @since 2.9
 */
function sm_import_and_set_post_thumbnail( $image_url, $post_id = 0 ) {
	global $wpdb;

	if ( empty( $image_url ) || trim( $image_url ) === '' ) {
		return false;
	}

	if ( ( $attachment_id = attachment_url_to_postid( $image_url ) ) && 0 !== $attachment_id ) {
		// continue
	} elseif ( ( $upload = wp_upload_dir() ) && strpos( $image_url, $upload['baseurl'] ) !== false ) {
		global $doing_sm_upload;

		$doing_sm_upload = true;

		if ( ! function_exists( 'media_handle_sideload' ) ) {
			require_once( ABSPATH . 'wp-admin' . '/includes/image.php' );
			require_once( ABSPATH . 'wp-admin' . '/includes/file.php' );
			require_once( ABSPATH . 'wp-admin' . '/includes/media.php' );
		}

		$url = str_replace( $upload['baseurl'], $upload['basedir'], $image_url );
		preg_match( '/[^\?]+\.(jpg|jpe|jpeg|gif|png)/i', $url, $matches );

		$attachment_id = media_handle_sideload( array(
			'name'     => basename( $matches[0] ),
			'tmp_name' => $url
		), 0 );

		$doing_sm_upload = false;
	} else {
		$file = wp_check_filetype( $image_url );

		preg_match( '/[^\?]+\.(jpg|jpe|jpeg|gif|png)/i', $image_url, $matches );

		$wpdb->insert( $wpdb->prefix . 'posts', array(
			'post_author'       => get_current_user_id(),
			'post_date'         => current_time( 'mysql' ),
			'post_date_gmt'     => get_gmt_from_date( current_time( 'mysql' ) ),
			'post_title'        => pathinfo( $matches[0], PATHINFO_FILENAME ),
			'post_status'       => 'inherit',
			'comment_status'    => get_default_comment_status( 'attachment' ),
			'ping_status'       => get_default_comment_status( 'attachment', 'pingback' ),
			'post_name'         => sanitize_title( pathinfo( $matches[0], PATHINFO_FILENAME ) ),
			'post_modified'     => current_time( 'mysql' ),
			'post_modified_gmt' => get_gmt_from_date( current_time( 'mysql' ) ),
			'post_parent'       => 0,
			'guid'              => $image_url,
			'menu_order'        => 0,
			'post_type'         => 'attachment',
			'post_mime_type'    => $file['type'],
			'comment_count'     => 0
		), array(
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%d',
			'%s',
			'%d',
			'%s',
			'%s',
			'%d',
		) );

		$attachment_id = $wpdb->insert_id;

		update_post_meta( $attachment_id, '_wp_attached_file', $image_url );

		$size = sm_get_image_dimensions( $image_url );
		if ( is_array( $size ) ) {
			update_post_meta( $attachment_id, '_wp_attachment_metadata', array(
				'width'  => $size[0],
				'height' => $size[1],
			) );
		}
	}

	if ( $post_id === 0 ) {
		return $attachment_id;

	}

	return set_post_thumbnail( $post_id, $attachment_id );
}

/**
 * Get real image path in upload directory before it's overwritten
 * And disable image moving
 *
 * @since 2.9
 */
add_filter( 'pre_move_uploaded_file', function ( $null, $file ) {
	global $upload_dir_file_path, $doing_sm_upload;

	if ( $doing_sm_upload === true ) {
		$uploads              = wp_get_upload_dir();
		$upload_dir_file_path = str_replace( $uploads['basedir'], '', $file['tmp_name'] );

		return false;
	}

	return $null;
}, 10, 2 );

/**
 * Update image upload URL and path to the real image path location,
 * only if executed by sm_import_and_set_post_thumbnail()
 *
 * @since 2.9
 */
add_filter( 'wp_handle_upload', function ( $data ) {
	global $upload_dir_file_path, $doing_sm_upload;

	if ( $doing_sm_upload === true ) {
		$uploads = wp_get_upload_dir();
		$data    = array(
			'file' => $uploads['basedir'] . $upload_dir_file_path,
			'url'  => $uploads['baseurl'] . $upload_dir_file_path,
			'type' => $data['type']
		);
	}

	return $data;
} );

/**
 * Gets sermon series image url
 *
 * @param int $series_id ID of the series
 *
 * @return string|null Image URL; null if image not set or invalid/not set series id
 *
 * @since 2.11.0
 */
function get_sermon_series_image_url( $series_id = 0 ) {
	if ( ! ( is_int( $series_id ) && $series_id !== 0 ) ) {
		return null;
	}

	$associations = sermon_image_plugin_get_associations();

	return ! empty( $associations[ $series_id ] ) ? wp_get_attachment_image_url( $associations[ $series_id ] ) : null;
}

/**
 * Gets dropdown options for a setting in "Debug" tab of Sermon Manager Settings
 *
 * @return array
 *
 * @since 2.11.0
 */
function sm_debug_get_update_functions() {
	$options = array(
		'' => '---',
	);

	foreach ( \SM_Install::$db_updates as $version => $functions ) {
		foreach ( $functions as $function ) {
			if ( get_option( 'wp_sm_updater_' . $function . '_done', 0 ) ) {
				$name = '[AE]';
			} else {
				$name = '[NE]';
			}

			$name .= ' ' . $function . ' ';
			$name .= "($version)";

			$options[ $function ] = $name;
		}
	}

	return $options;
}

/**
 * Returns sermon image URL
 *
 * @param bool $fallback If set to true, it will try to get series image URL if sermon image URL is not set
 *
 * @return string Image URL or empty string
 *
 * @since 2.12.0
 */
function get_sermon_image_url( $fallback = true ) {
	if ( get_the_post_thumbnail_url() ) {
		return get_the_post_thumbnail_url();
	}

	if ( $fallback ) {
		foreach (
			apply_filters( 'sermon-images-get-the-terms', '', array(
				'post_id'    => get_the_ID(),
				'image_size' => 'medium',
			) ) as $term
		) {
			if ( isset( $term->image_id ) && $term->image_id !== 0 ) {
				$image = wp_get_attachment_image_url( $term->image_id, 'full' );
				if ( $image ) {
					return $image;
				}
			}
		}
	}

	return '';
}

/**
 * Converts different video URL time formats to seconds. Examples:
 * "?t=2m12s" => 132
 * "?t=1h2s" => 3602
 * "#t=1m" => 60
 * "#t=25s" => 25
 * "?t=56" => 56
 * "?t=10:45" => 645
 * "?t=01:00:01" => 3601
 *
 * @param string $url The URL to the video file
 *
 * @return false|int|null Seconds if successful, null if it couldn't decode the format, and false if the parameter is
 *                        not set
 *
 * @since 2.12.3
 */
function wpfc_get_media_url_seconds( $url ) {
	$seconds = 0;

	if ( strpos( $url, '?t=' ) === false && strpos( $url, '#t=' ) === false ) {
		return false;
	}

	// try out hms format first (example: 1h2m3s)
	preg_match( '/t=(\d+h)?(\d+m)?(\d+s)+?/', $url, $hms );
	if ( ! empty( $hms ) ) {
		for ( $i = 1; $i <= 3; $i ++ ) {
			if ( $hms[ $i ] === '' ) {
				continue;
			}

			switch ( $i ) {
				case 1:
					$multiplication = HOUR_IN_SECONDS;
					break;
				case 2:
					$multiplication = MINUTE_IN_SECONDS;
					break;
				default:
					$multiplication = 1;
			}

			$seconds += intval( substr( $hms[ $i ], 0, - 1 ) ) * $multiplication;
		}

		return $seconds;
	}

	// try out colon (example: 25:12)
	preg_match( '/t=(\d+:)?(\d+:)?(\d+)+?/', $url, $colons );
	if ( ! empty( $colons ) ) {
		// fix hours and minutes if needed
		if ( empty( $colons[2] ) && ! empty( $colons[1] ) ) {
			$colons[2] = $colons[1];
			$colons[1] = '';
		}

		for ( $i = 1; $i <= 3; $i ++ ) {
			if ( $colons[ $i ] === '' ) {
				continue;
			}

			switch ( $i ) {
				case 1:
					$multiplication = HOUR_IN_SECONDS;
					$colons[ $i ]   = substr( $colons[ $i ], 0, - 1 );
					break;
				case 2:
					$multiplication = MINUTE_IN_SECONDS;
					$colons[ $i ]   = substr( $colons[ $i ], 0, - 1 );
					break;
				default:
					$multiplication = 1;
			}

			$seconds += intval( $colons[ $i ] ) * $multiplication;
		}

		return $seconds;
	}

	// try out seconds (example: 12 (or 12s))
	preg_match( '/t=(\d+)/', $url, $seconds );
	if ( ! empty( $seconds ) && ! empty( $seconds[1] ) ) {
		return intval( $seconds[1] );
	}

	return null;
}

/**
 * Gets previous latest sermon. I.e. orders sermons by meta and finds the previous one
 *
 * @param $post WP_Post The current sermon, will use global if not defined
 *
 * @since 2.12.5
 *
 * @return WP_Post|null The sermon if found, null otherwise
 */
function sm_get_previous_sermon( $post = null ) {
	if ( $post === null ) {
		global $post;
	}

	if ( ! $post instanceof WP_Post || $post->post_type !== 'wpfc_sermon' ) {
		_doing_it_wrong( __FUNCTION__, '$post must be an instance of WP_Post', '2.12.5' );
	}

	$current_sermon_id = $post->ID;

	$query = new WP_Query( array(
		'post_type'      => 'wpfc_sermon',
		'meta_key'       => 'sermon_date',
		'meta_value_num' => time(),
		'meta_compare'   => '<=',
		'orderby'        => 'meta_value_num',
		'order'          => 'DESC',
		'posts_per_page' => - 1
	) );

	for ( $p = 0; $p < count( $query->posts ); $p ++ ) {
		if ( $query->posts[ $p ]->ID === $current_sermon_id ) {
			$the_post = isset( $query->posts[ $p - 1 ] ) ? $query->posts[ $p - 1 ] : null;
		}
	}

	/**
	 * Allows to filter the return value
	 *
	 * @param $the_post WP_Post|null The post if found
	 */
	return apply_filters( 'sm_get_previous_sermon', isset( $the_post ) ? $the_post : null );
}

/**
 * Gets next latest sermon. I.e. orders sermons by meta and finds the next one
 *
 * @param $post WP_Post The current sermon, will use global if not defined
 *
 * @since 2.12.5
 *
 * @return WP_Post|null The sermon if found, null otherwise
 */
function sm_get_next_sermon( $post = null ) {
	if ( $post === null ) {
		global $post;
	}

	if ( ! $post instanceof WP_Post || $post->post_type !== 'wpfc_sermon' ) {
		_doing_it_wrong( __FUNCTION__, '$post must be an instance of WP_Post', '2.12.5' );
	}

	$current_sermon_id = $post->ID;

	$query = new WP_Query( array(
		'post_type'      => 'wpfc_sermon',
		'meta_key'       => 'sermon_date',
		'meta_value_num' => time(),
		'meta_compare'   => '<=',
		'orderby'        => 'meta_value_num',
		'order'          => 'DESC',
		'posts_per_page' => - 1
	) );

	for ( $p = 0; $p < count( $query->posts ); $p ++ ) {
		if ( $query->posts[ $p ]->ID === $current_sermon_id ) {
			$the_post = isset( $query->posts[ $p + 1 ] ) ? $query->posts[ $p + 1 ] : null;
		}
	}

	/**
	 * Allows to filter the return value
	 *
	 * @param $the_post WP_Post|null The post if found
	 */
	return apply_filters( 'sm_get_next_sermon', isset( $the_post ) ? $the_post : null );
}