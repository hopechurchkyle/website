<?php
// Step 1-1
global $wp_version;
$wpfcm_installed = is_file( ABSPATH . 'wp-content/plugins/wpfc-manager/wpfc-manager.php' );
$wpfcm_activated = class_exists( '\WPFCManager\WPFCManager\Init' );

// step 1-2
$license_key  = '';
$licenseValid = false;

if ( $wpfcm_activated ) {
	$product      = \WPFCManager\WPFCManager\Product::getProductData( basename( get_template_directory() ) . '/functions.php' );
	$licensing    = new \WPFCManager\WPFCManager\Licensing\WHMCS( sanitize_title( $product['name'] ), $product['whmcs_md5'], $product['whmcs_path'] );
	$licenseValid = $licensing->isActive();
	$license_key  = get_option( sanitize_title( $product['name'] ) . '-license_key', '' );
}
?>
<div class="step-1-1">
    <h4>1. Install and activate <i>WP For Church Manager</i></h4>
    <table>
        <tr>
            <td>Installed:</td>
            <td><span class="sub-step sub-step-<?php echo $wpfcm_installed ? '' : 'in'; ?>complete"></span></td>
			<?php if ( ! $wpfcm_installed ): ?>
                <td>
                    <form class="ajax-form" id="wpfcm-install">
						<?php submit_button( 'Install Manager', 'primary', 'wpfcm-install', false ); ?>
                    </form>
                </td>
			<?php endif; ?>
        </tr>
        <tr>
            <td>Activated:</td>
            <td><span class="sub-step sub-step-<?php echo $wpfcm_activated ? '' : 'in'; ?>complete"></span></td>
			<?php if ( ! $wpfcm_activated ): ?>
                <td>
                    <form class="ajax-form" id="wpfcm-activate">
						<?php submit_button( 'Activate Manager', 'primary', 'wpfcm-activate', false ); ?>
                    </form>
                </td>
			<?php endif; ?>
        </tr>
    </table>
</div>


<div class="step-1-2">
    <h4>2. Activate the theme</h4>
    <form class="ajax-form" id="theme-activate">
        <input type="text"
               value="<?php echo $license_key; ?>"
               placeholder="wpfc-XXXXXXXXXX"
               name="theme-license-key" <?php echo $wpfcm_activated && ! $licenseValid ? '' : 'disabled="disabled"'; ?>>
		<?php submit_button( 'Activate Theme', $wpfcm_activated && ! $licenseValid ? 'primary' : 'disabled', 'wpfcm-activate-theme', false ) ?>
    </form>
    <div id="theme-activation-message"></div>
</div>

<style>
    .sub-step-incomplete::after {
        content: 'No';
        color: #cc0000;
    }

    .sub-step-complete::after {
        content: 'Yes';
        color: green;
    }

    .sub-step-failed::after {
        content: 'Failed' !important;
    }

    .step-1-1 .ajax-form {
        display: inline;
        margin-left: 15px;
    }
</style>

<script>
    var WPSITEURL = '<?php echo get_site_url() . ( empty( trim( get_option( 'permalink_structure' ) ) ) ? '/?rest_route=' : '/wp-json' ); ?>';

    jQuery('form.ajax-form').on('submit', function (e) {
        e.preventDefault();

        var route = '',
            key = '',
            id = this.id,
            button = jQuery(this).find('input[type=submit]');

        if (this.id === 'wpfcm-activate' || this.id === 'wpfcm-install') {
            var tr = button;
            while (!tr.is('tr')) {
                tr = tr.parent();
            }
        }

        button.removeClass('button-primary').addClass('button-disabled');

        switch (id) {
            case 'wpfcm-activate':
                route = '/wpfc/v1/wpfcm/activate';
                break;
            case 'wpfcm-install':
                route = '/wpfc/v1/wpfcm/install';
                break;
            case 'theme-activate':
                route = '/wpfc/v1/wpfcm/activate_theme';
                key = jQuery('input[name=theme-license-key]').val();
                break;
        }

        if (route === '' && typeof tr !== 'undefined') {
            tr.find('.sub-step').addClass('.sub-step-failed');
        }

        jQuery.get(WPSITEURL + route + '/' + key, function (data) {
            if (data === 1) {
                if (typeof tr === 'undefined') {
                    jQuery('#step-status-theme-updater').removeClass('step-incomplete').addClass('step-complete').text('Completed');
                    button.parent().find('input[type=text]').prop('disabled', 'disabled');
                    jQuery.get(WPSITEURL + '/wpfc/v1/clear_plugin_cache');
                } else {
                    if (id === 'wpfcm-activate') {
                        tr.find('.sub-step').removeClass('sub-step-incomplete').addClass('sub-step-complete');

                        var licenseForm = jQuery('#theme-activate');
                        licenseForm.find('input[type=submit]').removeClass('button-primary').addClass('disabled').addClass('button-disabled')
                        licenseForm.find('input[type=text]').prop('disabled', 'disabled');

                        button.hide();

                        jQuery('#theme-activate').children().each(function () {
                            jQuery(this).prop('disabled', false);
                            jQuery(this).removeClass('disabled').removeClass('button-disabled');
                        });
                    } else if (id === 'wpfcm-install') {
                        button.hide();
                        tr.find('.sub-step').removeClass('sub-step-incomplete').addClass('sub-step-complete');
                    } else if (id === 'theme-activate') {
                        jQuery('#theme-activation-message').text('');
                    } else {
                        tr.find('.sub-step').removeClass('sub-step-incomplete').addClass('sub-step-complete');
                    }
                }

                enable_disable_plugin_install();
            } else {
                if (typeof tr !== 'undefined') {
                    tr.find('.sub-step').addClass('sub-step-failed');
                }

                if (id === 'theme-activate') {
                    jQuery('#theme-activation-message').html('Error. Try to reissue your license via <a href="http://wpforchurch.com/my" target="_blank">client area</a>. If that doesn\'t help, please <a href="mailto:support@wpforchurch.com">contact support</a>.');
                    var licenseForm = jQuery('#theme-activate');
                    licenseForm.find('input[type=submit]').addClass('button-primary').removeClass('disabled').removeClass('button-disabled')
                    licenseForm.find('input[type=text]').prop('disabled', false);
                }
            }
        }).fail(function () {
            if (typeof tr !== 'undefined') {
                tr.find('.sub-step').removeClass('sub-step-complete').addClass('sub-step-incomplete');
            }

            if (id === 'theme-activate') {
                var licenseForm = jQuery('#theme-activate');
                licenseForm.find('input[type=submit]').removeClass('button-disabled').removeClass('disabled').addClass('button-primary')
                licenseForm.find('input[type=text]').prop('disabled', false);

                jQuery('#theme-activation-message').text('Blank license key is not allowed.');
            }
        });
    })
</script>
