<?php
/**
 * Steps for the setup guide.
 *
 * @since 3.3.0
 */

global $qs_config;

// validation for the first step
$licenseValid = false;

if ( class_exists( '\WPFCManager\WPFCManager\Init' ) ) {
	$product      = \WPFCManager\WPFCManager\Product::getProductData( basename( get_template_directory() ) . '/functions.php' );
	$licensing    = new \WPFCManager\WPFCManager\Licensing\WHMCS( sanitize_title( $product['name'] ), $product['whmcs_md5'], $product['whmcs_path'] );
	$licenseValid = $licensing->isActive();
}

/** Create the steps */
$steps = array();

$steps['theme-updater'] = array(
	'title'     => __( 'Enable Automatic Updates', $qs_config['language-domain'] ),
	'completed' => $licenseValid, // if license is valid
);

$steps['install-plugins'] = array(
	'title'     => __( 'Install Plugins', $qs_config['language-domain'] ),
	'completed' => 'n/a'
);

if ( current_user_can( 'manage_options' ) ) {
	$steps['import-content'] = array(
		'title'     => __( 'Import Demo Data', $qs_config['language-domain'] ),
		'completed' => get_option( 'wpfc_theme_import_complete' )
	);
}

$steps['support-us'] = array(
	'title'     => __( 'Get Involved', $qs_config['language-domain'] ),
	'completed' => 'n/a'
);

return $steps;
