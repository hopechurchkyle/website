<?php
/**
 * Helper class G5ThemeHelper containing useful theme functions and hooks
 */

defined('ABSPATH') or die;

// Extend Timber context
add_filter('timber_context', array('G5ThemeHelper', 'add_to_context'));

// Modify Tag Cloud Widget
add_filter('widget_tag_cloud_args', array('G5ThemeHelper', 'tag_cloud_widget_modified_args'));

// Modify the default Admin Bar margins to render properly in the mobile mode
add_theme_support('admin-bar', array('callback' => array('G5ThemeHelper', 'admin_bar_margins')));

// Remove Navigation section when the page is edited with Elementor
add_action('admin_head', array('G5ThemeHelper', 'admin_custom_css'));

class G5ThemeHelper
{
    /**
     * Extend the Timber context
     *
     * @param array $context
     *
     * @return array
     */
    public static function add_to_context(array $context)
    {
        $context['is_user_logged_in'] = is_user_logged_in();
        $context['pagination']        = Timber\Timber::get_pagination();

        return $context;
    }
	
    // Remove Navigation section when the page is edited with Elementor
    public static function admin_custom_css()
    {
        ?>
        <style>
	    .elementor-editor-active #g-navigation.headroom { display: none; }
        </style>
        <?php
    }

    // Modify Tag Cloud Widget
    public static function tag_cloud_widget_modified_args($args)
    {
        $new_args = array(
            'smallest' => '.875',
            'largest'  => '.875',
            'unit'     => 'rem',
        );

        $args = wp_parse_args($new_args, $args);
        return $args;
    }

    // Modify the default Admin Bar margins to render properly in the mobile mode
    public static function admin_bar_margins()
    { ?>
        <style type="text/css" media="screen">
            html {
                margin-top: 32px !important;
            }

            * html body {
                margin-top: 32px !important;
            }

            #g-offcanvas {
                margin-top: 32px !important;
            }

            @media screen and ( max-width: 782px ) {
                html {
                    margin-top: 45px !important;
                }

                * html body {
                    margin-top: 45px !important;
                }

                #g-offcanvas {
                    margin-top: 45px !important;
                }
            }

            @media screen and ( max-width: 600px ) {
                html {
                    margin-top: 0 !important;
                }

                * html body {
                    margin-top: 0 !important;
                }

                #g-page-surround {
                    margin-top: 45px !important;
                }
            }
        </style>
        <?php
    }
}

if ( ! function_exists( 'wpfc_clean' ) ) {
	/**
	 * Clean variables using sanitize_text_field. Arrays are cleaned recursively.
	 * Non-scalar values are ignored.
	 *
	 * @param string|array $var
	 *
	 * @return string|array
	 * @since 2017-10-25
	 */
	function wpfc_clean( $var ) {
		if ( is_array( $var ) ) {
			return array_map( 'wpfc_clean', $var );
		} else {
			return is_scalar( $var ) ? sanitize_text_field( $var ) : $var;
		}
	}
}
