<?php
$products = \WPFCManager\WPFCManager\Product::getAllProductData()
?>
<div class="intro">
	<h1>Licensing and Updates</h1>
	<p>You can manage all your WP for Church licenses here.</p>
</div>
<div class="<?php echo empty( $products ) ? 'no' : ''; ?> products">
	<?php if ( ! empty( $products ) ): ?>
		<?php foreach ( $products as $product ): ?>
			<?php // set variables
			$image   = ! empty( $product['img'] ) ? $product['img'] : WPFCM_URL . 'assets/img/default-placeholder.png';
			$name    = ! empty( $product['name'] ) ? $product['name'] : 'N/A';
			$slug    = sanitize_title( $name );
			$version = ! empty( $product['version'] ) ? $product['version'] : 'N/A';
			if ( $product['licensing'] ) {
				$licensing    = new \WPFCManager\WPFCManager\Licensing\WHMCS( $slug, $product['whmcs_md5'], $product['whmcs_path'] );
				$licenseValid = $licensing->isActive();
			}
			?>
			<div class="product">
				<div class="image" style="background-image: url(<?php echo $image; ?>)"></div>
				<div class="details">
					<h2 class="name">
						<?php echo $name; ?> (<?php echo $product['isPlugin'] ? 'plugin' : 'theme'; ?>)
					</h2>
					<div class="info">
						<span>Version: <?php echo $version; ?></span>
						<?php if ( $product['licensing'] ) : ?>
							<span>License:
								<span class="license <?php echo $licenseValid ? '' : 'in' ?>valid"></span>
							</span>
						<?php endif; ?>
						<span>Updates:
							<?php
							if ( ! $product['updates'] ) {
								$class = 'active wp';
							} else if ( ! $product['licensing'] || ( $product['licensing'] && $licenseValid && $product['updates'] ) ) {
								$class = 'active';
							} else {
								$class = 'inactive';
							}
							?>
							<span
								class="updates <?php echo $class; ?>"></span>
						</span>
					</div>
					<?php if ( $product['licensing'] ) : ?>
						<form class="licensing">
							<label for="<?php echo $slug; ?>-license_key">License key:</label>
							<input id="<?php echo $slug; ?>-license_key" name="license_key"
							       value="<?php echo get_option( $slug . '-license_key', '' ); ?>"
							       placeholder="wpfc-XXXXXXXXXX">
							<input type="button" class="license_activate" value="Check License"
							       name="<?php echo $slug; ?>-check_license">
							<input type="hidden" name="dir" value="<?php echo urlencode( $product['dir'] ); ?>">
							<input type="hidden" name="WPFCM" value="activate">
							<div class="activation_response"></div>
						</form>
					<?php endif; ?>
				</div>
			</div>
		<?php endforeach; ?>
	<?php else: ?>
		<em>No products found :(</em>
	<?php endif; ?>
</div>
