<?php
/**
 * Helper/wrapper functions to allow internals to remain more dynamic.
 *
 * @package Wpfcafy
 * @subpackage PluginInstaller
 * @since 1.0.0
 */

/**
 * Get all options from configuration.
 *
 * @since 1.0.0
 *
 * @return array $options
 */
function wpfcafy_plugininstaller_get_options() {
	return Wpfcafy_PluginInstaller_Manager::get_options();
}

/**
 * Set multiple options.
 *
 * @since 1.0.0
 *
 * @param array $options
 * @return array $options
 */
function wpfcafy_plugininstaller_set_options( $options ) {
	return Wpfcafy_PluginInstaller_Manager::set_options( $options );
}

/**
 * Get an option from configuration.
 *
 * @since 1.0.0
 *
 * @param string $key
 * @return mixed
 */
function wpfcafy_plugininstaller_get_option( $option ) {
	return Wpfcafy_PluginInstaller_Manager::get_option( $option );
}

/**
 * Set a configuration option.
 *
 * @since 1.0.0
 *
 * @param array $options
 * @return mixed
 */
function wpfcafy_plugininstaller_set_option( $option, $option_value ) {
	return Wpfcafy_PluginInstaller_Manager::set_option( $option, $option_value );
}

/**
 * Display the list of plugins.
 *
 * @since 1.0.0
 */
function wpfcafy_plugininstaller_list() {
	$plugins = wpfcafy_plugininstaller_get_listtable();
	$plugins->display();
}

/**
 * Get the list table to output plugins that need to be installed/activated.
 *
 * Return a prepared WP_List_Table instance ready to be displayed.
 *
 * @since 1.0.0
 *
 * @return object Wpfcafy_PluginInstaller_ListTable_Manager
 */
function wpfcafy_plugininstaller_get_listtable() {
	/**
	 * Make sure plugin installation API is available.
	 */
	require_once( ABSPATH . 'wp-admin/includes/plugin-install.php' );

	/**
	 * WP_Plugin_Install_List_Table isn't always available. If it isn't available we load it here.
	 */
	if ( ! class_exists( 'WP_List_Table_Plugin_Install' ) ) {
		require_once( ABSPATH . 'wp-admin/includes/class-wp-plugin-install-list-table.php' );
	}

	$wp_list_table = new Wpfcafy_PluginInstaller_ListTable();
	$wp_list_table->prepare_items();

	return $wp_list_table;
}

/**
 * Enqueue the necessary scripts and JS templates for AJAX installs/updates.
 *
 * @since 1.0.0
 */
function wpfcafy_plugininstaller_enqueue_scripts() {
	add_thickbox();
	wp_enqueue_script( 'updates' );

	// print JS templates
	wp_print_request_filesystem_credentials_modal();
	wp_print_admin_notice_templates();
}

/**
 * Get the list of plugins to install.
 *
 * @since 1.0.0
 *
 * @return array $plugins
 */
function wpfcafy_plugininstaller_get_plugins() {
	return wpfcafy_plugininstaller_get_option( 'plugins' );
}

/**
 * Get JS localization strings.
 *
 * @since 1.0.0
 *
 * @return array $strings
 */
function wpfcafy_plugininstaller_get_l10n() {
	return wp_parse_args( wpfcafy_plugininstaller_get_option( 'l10n' ), array(
		'buttonActivePlugin' => 'Active',
		'buttonErrorActivating' => 'Error',
		'buttonUpdate' => 'Update',
		'activationFailed' => 'Activation failed: %s',
		'invalidPlugin' => 'Invalid plugin supplied.',
		'invalidNonce' => 'Invalid nonce supplied.',
		'invalidCap' => 'You do not have permission to install plugins on this site.',
		'bulkStart' => 'Install and Activate All',
		'bulkComplete' => 'Complete'
	) );
}

/**
 * Get a specific l10n string.
 *
 * @since 1.0.0
 *
 * @param string $string
 * @return string
 */
function wpfcafy_plugininstallere_get_string( $string ) {
	$strings = wpfcafy_plugininstaller_get_l10n();

	if ( ! isset( $strings[ $string ] ) ) {
		return '';
	}

	return $strings[ $string ];
}

/**
 * Output a button to start bulk installing/actiavting.
 *
 * @since 1.0.0
 */
function wpfcafy_plugininstaller_activate_all_button() {
	$needs_activations = wpfcafy_plugininstaller_needs_activations();

	if ( $needs_activations ) {
?>

<button class="wpfcafy-plugininstaller-install-activate-all button button-primary"><?php echo esc_attr( wpfcafy_plugininstallere_get_string( 'bulkStart' ) ); ?></button>

<?php
	}
}

/**
 * Determine if all listed plugins are active
 *
 * This is very finicky as it assumes plugin directory and name are the same.
 *
 * @since 1.0.0
 */
function wpfcafy_plugininstaller_needs_activations() {
	$needs = false;
	$plugins = wpfcafy_plugininstaller_get_plugins();

	foreach ( $plugins as $plugin ) {
		if ( is_plugin_active( $plugin . '/' . $plugin . '.php' ) ) {
			continue;
		}

		$needs = true;
	}

	return $needs;
}
