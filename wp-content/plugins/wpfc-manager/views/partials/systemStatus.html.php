<?php // @formatter:off ?>
<h1>System Status</h1>
<textarea readonly="readonly">
	Manager Version: <?php echo WPFCM_VERSION; ?>


	### WordPress Environment ###
	Home URL: <?php echo get_home_url(); ?>

	Site URL: <?php echo get_site_url(); ?>

	WP Version: <?php echo get_bloginfo( 'version', 'display' ); ?>

	WP Multisite: <?php echo is_multisite() ? 'true' : 'false'; ?>

	PHP Memory Limit: <?php echo ini_get( 'memory_limit' ); ?>

	WP Debug Mode: <?php echo WP_DEBUG ? 'true' : 'false'; ?>


	### Server Environment ###
	Server Info: <?php echo $_SERVER['SERVER_SOFTWARE']; ?>

	PHP Version: <?php echo PHP_VERSION; ?>

	PHP Post Max Size: <?php echo ini_get( 'post_max_size' ); ?>

	PHP Max Execution Time: <?php echo ini_get( 'max_execution_time' ); ?>

	PHP Max Input Time: <?php echo ini_get( 'max_input_time' ); ?>

	PHP Max Input Vars: <?php echo ini_get( 'max_input_vars' ); ?>

	MySQL Version: <?php $mysql = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD );

	if ( mysqli_connect_errno() ) {
		printf( "Connection failed: %s\n", mysqli_connect_error() );
	}

	echo mysqli_get_server_info( $mysql );
	mysqli_close( $mysql ); ?>

	Max Upload Size: <?php echo ini_get( 'upload_max_filesize' ); ?>


	### Active Manager Products ###<?php
	echo "\n";
	$products = \WPFCManager\WPFCManager\Product::getAllProductData();
	foreach ( $products as $id => $product ){
		echo "\t" . $product['name'] . ': ' . "\n";
		if ( $product['licensing'] ) {
			$licensing    = new \WPFCManager\WPFCManager\Licensing\WHMCS( sanitize_title($product['name']), $product['whmcs_md5'], $product['whmcs_path'] );
			$licenseValid = $licensing->isActive();
			echo "\t\t" . 'License: ' . ($licenseValid ? 'Active and valid' : 'Inactive') . "\n";
		}
		foreach ( $product as $product_key => $product_data ){
			echo "\t\t" . $product_key . ': ';
			echo (is_bool($product_data) ? ($product_data ? 'true' : 'false') : $product_data) . "\n";
		}
	} ?>


	### Active WP plugins ###<?php
	echo "\n";
	$active_plugins = get_option( 'active_plugins', array() );
	$plugins        = get_plugins();

	foreach ( $active_plugins as $id ) {
		$plugin = $plugins[ $id ];
		echo "\t" . $id . ':' . "\n";
		foreach ( $plugin as $plugin_key => $plugin_data ) {
			echo "\t\t" . $plugin_key . ': ';
			echo $plugin_data . "\n";
		}
	} ?>


	Active theme:
<?php
	$theme_details = wp_get_theme();
	$details       = array( 'Name', 'Description', 'Author', 'Version', 'ThemeURI', 'AuthorURI', 'Status', 'Tags' );
	foreach ( $details as $detail ) {
		echo "\t\t" . $detail . ': ' . $theme_details->get( $detail ) . "\n";
	}
	?>
</textarea>