<footer>
	<a href="https://wpforchurch.com">Made with <span class="dashicons dashicons-heart"></span> by WPFC</a>
	<div class="version">
		<?php echo get_plugin_data( WPFCM_PATH . 'wpfc-manager.php' )['Version']; ?>
		<span class="date">
		(<?php echo date( 'Y-m-d', filemtime( WPFCM_PATH . 'wpfc-manager.php' ) ); ?>)
	</span>
	</div>
</footer>