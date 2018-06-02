<?php
/**
 * Install required and recommended plugins.
 *
 * @since unknown
 */

wpfcafy_plugininstaller_enqueue_scripts();

if ( class_exists( '\WPFCManager\WPFCManager\Init' ) ) {
	$product      = \WPFCManager\WPFCManager\Product::getProductData( basename( get_template_directory() ) . '/functions.php' );
	$licensing    = new \WPFCManager\WPFCManager\Licensing\WHMCS( sanitize_title( $product['name'] ), $product['whmcs_md5'], $product['whmcs_path'] );
	$licenseValid = $licensing->isActive();
	$show_plugins = $licenseValid ? true : null;
}
?>

<div class="wpfcafy-setupguide-install-plugins-more">
    <div class="wpfcafy-setupguide-install-plugins-list">
		<?php if ( empty( $show_plugins ) ): ?>
            <h2 style="padding-left: 0; padding-top: 0;">
                Since we are allowing you to install some 3rd party premium plugins, we need to verify your license:
            </h2>
            <p style="margin-top: 0;">
                <a href="#" id="clear-plugin-cache" class="button button-primary">Access Plugins</a>
            </p>
		<?php else: ?>
            <p style="margin-top: 0;">
                <a href="#" id="clear-plugin-cache">If you experience errors during plugin installation, please click
                    here</a>
            </p>
			<?php wpfcafy_plugininstaller_list(); ?>
		<?php endif; ?>
    </div>
</div>

<script>
    jQuery('#clear-plugin-cache').on('click', function (e) {
        e.preventDefault();

        var plugin_list = jQuery('.wpfcafy-setupguide-install-plugins-more');

        plugin_list.empty();

        plugin_list.html('<h2>Please wait...</h2>');

        jQuery.get(WPSITEURL + '/wpfc/v1/clear_plugin_cache', function (data) {
            if (data == 1) {
                plugin_list.html('<h2 style="color:green">Thanks, we are refreshing the page so you can continue setup.</h2>');
                window.location.reload(true);
            } else {
                plugin_list.html('<h2 style="color:red">Error. Please contact support.</h2>');
            }
        });
    })

    function enable_disable_plugin_install() {
        if (jQuery('#step-status-theme-updater').hasClass('step-incomplete')) {
            jQuery('.plugin-card').each(function () {
                if (~this.className.indexOf('wpfc--')) {
                    jQuery(this).find('a.install-now.button')
                        .addClass('button-disabled').on('click', function stop(e) {
                        e.preventDefault();
                        return false;
                    });
                }
            });
        } else {
            jQuery('.plugin-card').each(function () {
                if (~this.className.indexOf('wpfc--')) {
                    jQuery(this).find('a.install-now.button')
                        .removeClass('button-disabled')
                        .off('click', 'stop');
                }
            });
        }

        jQuery('.plugin-card').each(function () {
            if (~this.className.indexOf('wpfc--')) {
                jQuery(this).find('.plugin-card-bottom')
                    .empty()
                    .html('This is a 3rd party plugin provided by WP for Church. <a href="https://wpforchurch.com/my/knowledgebase/87/3rd-Party-Plugins.html" target="_blank">Read more about 3rd party plugins</a>.');
            }
        });
    }

    enable_disable_plugin_install();

    jQuery('#plugin-filter .activate-now, #plugin-filter .install-now').each(function () {
        jQuery(this).on('click', function (e) {
            if (this.classList.contains('activate-now')) {
                this.classList.add('updating-message');

                e.preventDefault();
                var button = this,
                    plugin_path = getParameterByName('plugin', this.href),
                    plugin_slug = plugin_path.substring(0, plugin_path.indexOf('/'));

                button.classList.remove('wpfc-button-failed');

                jQuery.ajax({
                    url: WPSITEURL + '/wpfc/v1/wpfc_activate_theme_plugin/' + plugin_path.slice(0, -4),
                    type: 'GET',
                    success: function (data) {
                        console.log(data);
                        if (data === 1) {
                            button.className = 'button button-disabled';

                            jQuery('#required-plugins-import > .plugin-' + plugin_slug).addClass('active');
                        } else {
                            button.classList.add('wpfc-button-failed');
                            button.innerHTML = 'Failed';
                        }

                        button.classList.remove('updating-message');
                    },
                    error: function () {
                        button.classList.add('wpfc-button-failed');
                        button.classList.remove('updating-message');
                        button.innerHTML = 'Failed';
                    }
                });
            }
        });
    });

    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
    }
</script>

<style>
    .wpfc-button-failed {
        background-color: #cc0000 !important;
        color: #fff !important;
        border-color: #9c0000 !important;
        -webkit-box-shadow: 0 1px 0 #9c0000 !important;
        box-shadow: 0 1px 0 #9c0000 !important;
        content: 'Failed' !important;
    }
</style>
