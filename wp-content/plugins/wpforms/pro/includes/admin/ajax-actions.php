<?php
/**
 * PRO Ajax actions used in by admin.
 *
 * @package    WPForms
 * @author     WPForms
 * @since      1.2.1
 * @license    GPL-2.0+
 * @copyright  Copyright (c) 2016, WPForms LLC
 */

/**
 * Deactivate addon.
 *
 * @since 1.0.0
 */
function wpforms_deactivate_addon() {

	// Run a security check.
	check_ajax_referer( 'wpforms-admin', 'nonce' );

	if ( isset( $_POST['plugin'] ) ) {
		deactivate_plugins( $_POST['plugin'] );
		wp_send_json_success( esc_html__( 'Addon deactivated.', 'wpforms' ) );
	} else {
		wp_send_json_error( esc_html__( 'Could not deactivate addon. Please deactivate from the Plugins page.', 'wpforms' ) );
	}
}
add_action( 'wp_ajax_wpforms_deactivate_addon', 'wpforms_deactivate_addon' );

/**
 * Activate addon.
 *
 * @since 1.0.0
 */
function wpforms_activate_addon() {

	// Run a security check.
	check_ajax_referer( 'wpforms-admin', 'nonce' );

	if ( isset( $_POST['plugin'] ) ) {

		$activate = activate_plugins( $_POST['plugin'] );

		if ( ! is_wp_error( $activate ) ) {
			wp_send_json_success( esc_html__( 'Addon activated.', 'wpforms' ) );
		}
	}

	wp_send_json_error( esc_html__( 'Could not activate addon. Please activate from the Plugins page.', 'wpforms' ) );
}
add_action( 'wp_ajax_wpforms_activate_addon', 'wpforms_activate_addon' );

/**
 * Install addon.
 *
 * @since 1.0.0
 */
function wpforms_install_addon() {

	// Run a security check.
	check_ajax_referer( 'wpforms-admin', 'nonce' );

	$error = esc_html__( 'Could not install addon. Please download from wpforms.com and install manually.', 'wpforms' );

	if ( empty( $_POST['plugin'] ) ) {
		wp_send_json_error(  );
	}

	// Set the current screen to avoid undefined notices.
	set_current_screen();

	// Prepare variables.
	$url = esc_url_raw(
		add_query_arg(
			array(
				'page' => 'wpforms-addons',
			),
			admin_url( 'admin.php' )
		)
	);

	$creds = request_filesystem_credentials( $url, '', false, false, null );

	// Check for file system permissions.
	if ( false === $creds ) {
		wp_send_json_error( $error );
	}

	if ( ! WP_Filesystem( $creds ) ) {
		wp_send_json_error( $error );
	}

	// We do not need any extra credentials if we have gotten this far, so let's install the plugin.
	require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
	require_once WPFORMS_PLUGIN_DIR . 'pro/includes/admin/class-install-skin.php';

	// Create the plugin upgrader with our custom skin.
	$installer = new Plugin_Upgrader( new WPForms_Install_Skin() );

	// Error check.
	if ( ! method_exists( $installer, 'install' ) || empty( $_POST['plugin'] ) ) {
		wp_send_json_error( $error );
	}

	$download_url = $_POST['plugin'];

	$installer->install( $download_url );

	// Flush the cache and return the newly installed plugin basename.
	wp_cache_flush();

	if ( $installer->plugin_info() ) {

		$plugin_basename = $installer->plugin_info();

		wp_send_json_success(
			array(
				'msg'      => esc_html__( 'Addon installed.', 'wpforms' ),
				'basename' => $plugin_basename,
			)
		);
	}

	wp_send_json_error( $error );
}
add_action( 'wp_ajax_wpforms_install_addon', 'wpforms_install_addon' );

/**
 * Toggle entry stars from Entries table.
 *
 * @since 1.1.6
 */
function wpforms_entry_list_star() {

	// Run a security check.
	check_ajax_referer( 'wpforms-admin', 'nonce' );

	// Check for permissions.
	if ( ! wpforms_current_user_can() ) {
		wp_send_json_error();
	}

	if ( empty( $_POST['entry_id'] ) || empty( $_POST['task'] ) ) {
		wp_send_json_error();
	}

	$task       = $_POST['task'];
	$entry_id   = absint( $_POST['entry_id'] );
	$is_success = false;

	if ( 'star' === $task ) {
		$is_success = wpforms()->entry->update(
			$entry_id,
			array(
				'starred' => '1',
			)
		);
	} elseif ( 'unstar' === $task ) {
		$is_success = wpforms()->entry->update(
			$entry_id,
			array(
				'starred' => '0',
			)
		);
	}

	$is_success ? wp_send_json_success() : wp_send_json_error();
}
add_action( 'wp_ajax_wpforms_entry_list_star', 'wpforms_entry_list_star' );

/**
 * Toggle entry read state from Entries table.
 *
 * @since 1.1.6
 */
function wpforms_entry_list_read() {

	// Run a security check.
	check_ajax_referer( 'wpforms-admin', 'nonce' );

	// Check for permissions.
	if ( ! wpforms_current_user_can() ) {
		wp_send_json_error();
	}

	if ( empty( $_POST['entry_id'] ) || empty( $_POST['task'] ) ) {
		wp_send_json_error();
	}

	$task       = $_POST['task'];
	$entry_id   = absint( $_POST['entry_id'] );
	$is_success = false;

	if ( 'read' === $task ) {
		$is_success = wpforms()->entry->update(
			$entry_id,
			array(
				'viewed' => '1',
			)
		);
	} elseif ( 'unread' === $task ) {
		$is_success = wpforms()->entry->update(
			$entry_id,
			array(
				'viewed' => '0',
			)
		);
	}

	$is_success ? wp_send_json_success() : wp_send_json_error();
}
add_action( 'wp_ajax_wpforms_entry_list_read', 'wpforms_entry_list_read' );

/**
 * Verify license.
 *
 * @since 1.3.9
 */
function wpforms_verify_license() {

	// Run a security check.
	check_ajax_referer( 'wpforms-admin', 'nonce' );

	// Check for permissions.
	if ( ! wpforms_current_user_can() ) {
		wp_send_json_error();
	}

	// Check for license key.
	if ( empty( $_POST['license'] ) ) {
		wp_send_json_error( esc_html__( 'Please enter a license key.', 'wpforms' ) );
	}

	wpforms()->license->verify_key( $_POST['license'], true );
}
add_action( 'wp_ajax_wpforms_verify_license', 'wpforms_verify_license' );

/**
 * Deactivate license.
 *
 * @since 1.3.9
 */
function wpforms_deactivate_license() {

	// Run a security check.
	check_ajax_referer( 'wpforms-admin', 'nonce' );

	// Check for permissions.
	if ( ! wpforms_current_user_can() ) {
		wp_send_json_error();
	}

	wpforms()->license->deactivate_key( true );
}
add_action( 'wp_ajax_wpforms_deactivate_license', 'wpforms_deactivate_license' );

/**
 * Refresh license.
 *
 * @since 1.3.9
 */
function wpforms_refresh_license() {

	// Run a security check.
	check_ajax_referer( 'wpforms-admin', 'nonce' );

	// Check for permissions.
	if ( ! wpforms_current_user_can() ) {
		wp_send_json_error();
	}

	// Check for license key.
	if ( empty( $_POST['license'] ) ) {
		wp_send_json_error( esc_html__( 'Please enter a license key.', 'wpforms' ) );
	}

	wpforms()->license->validate_key( $_POST['license'], true, true );
}
add_action( 'wp_ajax_wpforms_refresh_license', 'wpforms_refresh_license' );

/**
 * Save a single notification state (opened or closed) for a form for a currently logged in user.
 *
 * @since 1.4.1
 */
function wpforms_builder_notification_state_save() {

	// Run a security check.
	check_ajax_referer( 'wpforms-builder', 'nonce' );

	if ( empty( $_POST ) ) {
		wp_send_json_error();
	}

	$form_id         = absint( $_POST['form_id'] );
	$notification_id = absint( $_POST['notification_id'] );
	$state           = sanitize_key( $_POST['state'] );

	if (
		empty( $form_id ) ||
		empty( $notification_id ) ||
		( empty( $state ) || ! in_array( $state, array( 'opened', 'closed' ), true ) )
	) {
		wp_send_json_error();
	}

	$all_states = get_user_meta( get_current_user_id(), 'wpforms_builder_notification_states', true );

	$all_states[ $form_id ][ $notification_id ] = $state;

	update_user_meta( get_current_user_id(), 'wpforms_builder_notification_states', $all_states );

	wp_send_json_success();
}
add_action( 'wp_ajax_wpforms_builder_notification_state_save', 'wpforms_builder_notification_state_save' );

/**
 * Remove a single notification state (opened or closed) for a form for a currently logged in user.
 *
 * @since 1.4.1
 */
function wpforms_builder_notification_state_remove() {

	// Run a security check.
	check_ajax_referer( 'wpforms-builder', 'nonce' );

	if ( empty( $_POST ) ) {
		wp_send_json_error();
	}

	$form_id         = absint( $_POST['form_id'] );
	$notification_id = absint( $_POST['notification_id'] );

	if ( empty( $form_id ) || empty( $notification_id ) ) {
		wp_send_json_error();
	}

	$all_states = get_user_meta( get_current_user_id(), 'wpforms_builder_notification_states', true );

	if ( isset( $all_states[ $form_id ] ) && isset( $all_states[ $form_id ][ $notification_id ] ) ) {
		unset( $all_states[ $form_id ][ $notification_id ] );

		update_user_meta( get_current_user_id(), 'wpforms_builder_notification_states', $all_states );

		wp_send_json_success();
	}

	wp_send_json_error();
}
add_action( 'wp_ajax_wpforms_builder_notification_state_remove', 'wpforms_builder_notification_state_remove' );
