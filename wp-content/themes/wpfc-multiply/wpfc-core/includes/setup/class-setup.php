<?php

include_once( 'class-activation.php' );
include_once( 'data-import-main.php' );
// configuration.php needs `is_plugin_active()`
if ( ! function_exists( 'is_plugin_active' ) ) {
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}
if ( file_exists( get_template_directory() . '/includes/wpfcm_configuration.php' ) ) {
	include_once get_template_directory() . '/includes/wpfcm_configuration.php';
} elseif ( file_exists( 'configuration.php' ) ) {
	include_once 'configuration.php';
} else {
	wp_die( 'WPFC Error: Configuration file not found for QS setup.' );
}


// add auto calculated data to configuration
global $qs_config;

$qs_config['path'] = substr( __DIR__,
	intval( strpos( __DIR__, basename( get_template_directory() ) ) )
	+ intval( strlen( basename( get_template_directory() ) ) ) + 1 );

$qs_config['language-domain'] = wp_get_theme()->get( 'TextDomain' );

/**
 * Setting up QS
 */
class WPFC_QS_Setup {

	/**
	 * Start things up.
	 *
	 * @since 3.0.0
	 *
	 * @return void
	 */
	public static function init() {
		if ( ! is_admin() ) {
			return;
		}

		self::includes();

		// set early
		add_filter( 'wpfcafy_content_importer_screen', array( __CLASS__, 'screen_id' ) );
		add_filter( 'plugins_api', array( __CLASS__, 'maybe_skip_wp_plugin_data_gathering' ), 10, 3 );
		add_filter( 'plugin_install_action_links', array( __CLASS__, 'maybe_edit_plugin_action_button' ), 10, 2 );

		self::plugin_installer();
		self::setup_guide();
	}

	public static function includes() {
		// load external libs
		include_once( 'vendor/wpfcafy/plugin-installer/wpfcafy-plugininstaller.php' );
		include_once( 'vendor/wpfcafy/setup-guide/wpfcafy-setupguide.php' );
	}

	/**
	 * Create the plugin installer.
	 *
	 * @since 3.5.0
	 */
	public static function plugin_installer() {
		global $qs_config;

		wpfcafy_plugininstaller( array(
			'plugins'       => $qs_config['plugins'],
			'forceActivate' => true,
			'l10n'          => array(
				'buttonActivePlugin'    => __( 'Active', $qs_config['language-domain'] ),
				'buttonErrorActivating' => 'Error',
				'activationFailed'      => 'Activation failed: %s',
				'invalidPlugin'         => 'Invalid plugin supplied.',
				'invalidNonce'          => 'Invalid nonce supplied.',
				'invalidCap'            => 'You do not have permission to install plugins on this site.',
				'activateAll'           => 'Install and Activate All',
				'activateAllComplete'   => 'Complete'
			),
			'install_url'   => 'vendor/wpfcafy/plugin-installer'
		) );
	}

	/**
	 * Create the setup guide.
	 *
	 * @since 3.3.0
	 * @return void
	 */
	public static function setup_guide() {
		global $qs_config;

		add_action( 'wpfcafy_setup_guide_intro', array( __CLASS__, '_setup_guide_intro' ) );
		add_action( 'wpfcafy_setup_guide_after', array( __CLASS__, '_setup_guide_after' ) );

		wpfcafy_setupguide( array(
			'steps'          => include_once( 'steps.php' ),
			'steps_dir'      => __DIR__ . '/steps',
			'strings'        => array(
				'page-title'      => __( 'Setup %s', $qs_config['language-domain'] ),
				'menu-title'      => __( 'Getting Started', $qs_config['language-domain'] ),
				'sub-menu-title'  => __( 'Setup Guide', $qs_config['language-domain'] ),
				'intro-title'     => __( 'Welcome to %s', $qs_config['language-domain'] ),
				'step-complete'   => __( 'Completed', $qs_config['language-domain'] ),
				'step-incomplete' => __( 'Not Complete', $qs_config['language-domain'] )
			),
			'stylesheet_uri' => get_template_directory_uri() . '/' . $qs_config['path'] . '/vendor/wpfcafy/setup-guide/app/assets/css/style.css',
		) );
	}

	/**
	 * Filter the child theme's notice output
	 *
	 * @since 3.3.0
	 *
	 * @param array $screen_ids
	 *
	 * @return array $screen_ids
	 */
	public static function screen_id( $screen_ids ) {
		return array( Wpfcafy_Setup_Guide::get_screen_id() );
	}

	/**
	 * The footer text for the setup guide page.
	 *
	 * @since 3.3.0
	 * @return void
	 */
	public static function _setup_guide_after() {
		if ( get_option( 'wpfc_theme_qs_hidden' ) ) {
			return;
		}
		?>
		<a href="#" id="hide-qs-menu">Hide the Getting Started under the Appearance menu</a>

		<script>
            jQuery('#hide-qs-menu').on('click', function (e) {
                e.preventDefault();
                jQuery.get(WPSITEURL + '/wpfc/v1/wpfc_hide_qs_menu_item');
                jQuery(this).replaceWith('<p id="qs-menu-hidden">Done.</p>');

                // hide toplevel QS page
                jQuery('#toplevel_page_wpfc-multiply-setup').hide();

                // mark Appearance as active
                jQuery('#menu-appearance').addClass('current').addClass('wp-has-current-submenu').addClass('wp-menu-open menu-top');
                jQuery('#menu-appearance > a').addClass('wp-has-current-submenu').addClass('wp-menu-open');
                jQuery('#menu-appearance > ul.wp-submenu').append('<li class="current"><a href="themes.php?page=wpfc-multiply-setup" class="current">Getting Started</a></li>');

                history.pushState(null, null, window.location.href.replace('admin.php', 'themes.php'));
            });
		</script>

		<style>
			#hide-qs-menu, #qs-menu-hidden {
				margin-left: 20px;
				margin-top: 10px;
				display: block;
				font-size: 15px;
			}
		</style>
		<?php
	}

	/**
	 * The introduction text for the setup guide page.
	 *
	 * @since 3.3.0
	 * @return void
	 */
	public static function _setup_guide_intro() {
		global $qs_config;
		global $wp_version;
		if ( version_compare( $wp_version, '4.7.0', '<' ) ) {
			echo '<p><strong>Error: </strong> You need at least WordPress 4.7.0 to continue.</p>';
			die();
		}

		$theme = wp_get_theme();

		?>
		<p class="about-text"
				style="margin-right: 250px"><?php printf( __( 'Setting up your theme is quick and easy, simply follow the steps below to complete your activation, install necessary plugins and even replicate the theme demo (optional). If you have more questions please <a href="%s">review the documentation</a>.', $qs_config['language-domain'] ), $qs_config['documentation-url'] ); ?></p>

		<div class="setup-guide-theme-badge"><img
					src="<?= $theme->get_screenshot(); ?>"
					width="230"
					alt=""/></div>

		<p class="helpful-links">
			<a href="https://wpforchurch.com/my/index.php?rp=/knowledgebase"
					class="button button-primary js-trigger-documentation"><?php _e( 'View Documentation', $qs_config['language-domain'] ); ?></a>&nbsp;
			<a href="https://wpforchurch.com/my/clientarea.php"
					class="button button-secondary"><?php _e( 'Submit a Support Ticket', $qs_config['language-domain'] ); ?></a>&nbsp;
		</p>
		<?php
	}

	/**
	 * Checks if the current plugin is WPFC 3rd party, and if it is, it will make sure WP will skip retrieving data for
	 * it from WP.org
	 *
	 * @param false|object|array $result The result object or array. Default false.
	 * @param string             $action The type of information being requested from the Plugin Install API.
	 * @param object             $args   Plugin API arguments.
	 *
	 * @return object|false Plugin data or false if it's not WPFC plugin
	 */
	public static function maybe_skip_wp_plugin_data_gathering( $result, $action, $args ) {
		// check if the plugin slug is defined
		if ( empty( $args->slug ) ) {
			return $result;
		}

		// check if it's a WPFC plugin
		if ( 'wpfc--' === substr( $args->slug, 0, 6 ) ) {
			// reset license data
			$slug = $domain = $ip = $path = '';

			// if WPFCM is active, set license data
			if ( class_exists( '\WPFCManager\WPFCManager\Product' ) ) {
				$product = \WPFCManager\WPFCManager\Product::getProductData( basename( get_template_directory() ) . '/functions.php' );
				$slug    = sanitize_title( $product['name'] );
				$domain  = $_SERVER['SERVER_NAME'];
				$ip      = isset( $_SERVER['SERVER_ADDR'] ) ? $_SERVER['SERVER_ADDR'] : $_SERVER['LOCAL_ADDR'];
				$path    = $product['whmcs_path'];
			}

			// Set all 3rd party plugin data if it's not set
			if ( ! get_transient( 'wpfc_3rd_party_plugins' ) ) {
				try {
					$response = url_request_all( 'http://www.wpforchurch.com/?WPFC=get_theme_plugin_data&slug=all&license_key=' . urlencode( get_option( $slug . '-license_key', '' ) ) . '&ip=' . urlencode( $ip ) . '&domain=' . urlencode( $domain ) . '&path=' . urlencode( $path ) );
				} catch ( Exception $e ) {
					return $result;
				}

				$response = json_decode( $response, true );

				if ( $response['status'] != 0 ) {
					return $result;
				}

				if ( ! empty( $response['message'] ) ) {
					$all_plugin_data = $response['message'];
					set_transient( 'wpfc_3rd_party_plugins', $all_plugin_data, DAY_IN_SECONDS );
				}
			}

			// Get plugin data
			$all_plugin_data = isset( $all_plugin_data ) ? $all_plugin_data : get_transient( 'wpfc_3rd_party_plugins' );

			if ( ! empty( $all_plugin_data[ substr( $args->slug, 6 ) ] ) && $plugin_data = $all_plugin_data[ substr( $args->slug, 6 ) ] ) {
				if ( empty( $plugin_data['icons']['1x'] ) ) {
					$plugin_data['icons']['1x'] = get_site_url( null, 'wp-includes/images/crystal/archive.png' );
				}

				return (object) $plugin_data;
			}
		}

		return $result;
	}

	/**
	 * Filters into WP's action buttons on the right of plugin card (Install now, details, etc) and edits the slug
	 * so WP could correctly determine if the plugin is installed/activated/etc
	 *
	 * @param array $action_links Default action links
	 * @param array $plugin       Plugin data from WP API
	 *
	 * @return array Modified action links if it's our 3rd party or default links if it's not
	 */
	public static function maybe_edit_plugin_action_button( $action_links, $plugin ) {
		// check if it's 3rd party
		if ( ! isset( $plugin['slug'] ) || substr( $plugin['slug'], 0, 6 ) !== 'wpfc--' ) {
			return $action_links;
		}

		// edit plugin slug to remove `wpfc--` prefix, so WP could get correct data about plugin, required for
		// further steps
		$plugin['slug'] = substr( $plugin['slug'], 6 );

		// remove action links
		$action_links = array();

		if ( current_user_can( 'install_plugins' ) || current_user_can( 'update_plugins' ) ) {
			$plugins_allowedtags = array(
				'a'       => array( 'href' => array(), 'title' => array(), 'target' => array() ),
				'abbr'    => array( 'title' => array() ),
				'acronym' => array( 'title' => array() ),
				'code'    => array(),
				'pre'     => array(),
				'em'      => array(),
				'strong'  => array(),
				'ul'      => array(),
				'ol'      => array(),
				'li'      => array(),
				'p'       => array(),
				'br'      => array()
			);
			$status              = install_plugin_install_status( $plugin );
			$name                = strip_tags( wp_kses( $plugin['name'], $plugins_allowedtags ) . ' ' . wp_kses( $plugin['version'], $plugins_allowedtags ) );

			// revert the slug
			$plugin['slug'] = 'wpfc--' . $plugin['slug'];

			switch ( $status['status'] ) {
				case 'install':
					if ( $status['url'] ) {
						/* translators: 1: Plugin name and version. */
						$action_links[] = '<a class="install-now button" data-slug="' . esc_attr( $plugin['slug'] ) . '" href="' . esc_url( $status['url'] ) . '" aria-label="' . esc_attr( sprintf( __( 'Install %s now' ), $name ) ) . '" data-name="' . esc_attr( $name ) . '">' . __( 'Install Now' ) . '</a>';
					}
					break;

				case 'update_available':
					if ( $status['url'] ) {
						/* translators: 1: Plugin name and version */
						$action_links[] = '<a class="update-now button aria-button-if-js" data-plugin="' . esc_attr( $status['file'] ) . '" data-slug="' . esc_attr( $plugin['slug'] ) . '" href="' . esc_url( $status['url'] ) . '" aria-label="' . esc_attr( sprintf( __( 'Update %s now' ), $name ) ) . '" data-name="' . esc_attr( $name ) . '">' . __( 'Update Now' ) . '</a>';
					}
					break;

				case 'latest_installed':
				case 'newer_installed':
					if ( is_plugin_active( $status['file'] ) ) {
						$action_links[] = '<button type="button" class="button button-disabled" disabled="disabled">' . _x( 'Active', 'plugin' ) . '</button>';
					} elseif ( current_user_can( 'activate_plugins' ) ) {
						$button_text = __( 'Activate' );
						/* translators: %s: Plugin name */
						$button_label = _x( 'Activate %s', 'plugin' );
						$activate_url = add_query_arg( array(
							'_wpnonce' => wp_create_nonce( 'activate-plugin_' . $status['file'] ),
							'action'   => 'activate',
							'plugin'   => $status['file'],
						), network_admin_url( 'plugins.php' ) );

						if ( is_network_admin() ) {
							$button_text = __( 'Network Activate' );
							/* translators: %s: Plugin name */
							$button_label = _x( 'Network Activate %s', 'plugin' );
							$activate_url = add_query_arg( array( 'networkwide' => 1 ), $activate_url );
						}

						$action_links[] = sprintf(
							'<a href="%1$s" class="button activate-now" aria-label="%2$s">%3$s</a>',
							esc_url( $activate_url ),
							esc_attr( sprintf( $button_label, $plugin['name'] ) ),
							$button_text
						);
					} else {
						$action_links[] = '<button type="button" class="button button-disabled" disabled="disabled">' . _x( 'Installed', 'plugin' ) . '</button>';
					}
					break;
			}
		}

		return $action_links;
	}

	/**
	 * Get the name of the current template (not child theme)
	 *
	 * @since 1.5.0
	 * @return string $template
	 */
	public static function get_template_name() {
		// if the current theme is a child theme find the parent
		$current_child_theme = wp_get_theme();

		if ( false !== $current_child_theme->parent() ) {
			$current_theme = wp_get_theme( $current_child_theme->get_template() );
		} else {
			$current_theme = wp_get_theme();
		}

		$template = $current_theme->get_template();

		return $template;
	}

}

WPFC_QS_Setup::init();
