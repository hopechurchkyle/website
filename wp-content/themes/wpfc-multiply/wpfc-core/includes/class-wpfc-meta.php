<?php

/**
 * Adds meta boxes on pages and handles their data
 *
 * @since 1.0.0
 */
class WPFC_Meta {
	static $options = array(
		array(
			'title' => '',
			'type'  => 'title',
			'id'    => 'page_header',
			'desc'  => 'Here you can configure how your page header will appear.',
		),
		array(
			'title'       => 'Page Header Title',
			'id'          => 'page_header_title',
			'type'        => 'text',
			'desc'        => 'Enter the page header title. <br/>Defaults to page name.',
			'css'         => '',
			'placeholder' => '',
			'class'       => '',
			'default'     => '',
		),
		array(
			'title' => 'Page Header Description',
			'id'    => 'page_header_description',
			'type'  => 'text',
			'desc'  => 'Enter the page header description/subtitle.',
		),
		array(
			'title' => 'Page Header Content Width',
			'id'    => 'page_header_content_width',
			'type'  => 'text',
			'desc' => 'Set content width include "px, rem, %"'
		),
		array(
			'title' => 'Page Header Height',
			'id'    => 'page_header_height',
			'type'  => 'text',
			'desc'  => 'How tall do you want your header? <br/>Include "px, rem" in the string. e.g. 450px, 450rem',
		),
		array(
			'title' => 'Page Header Padding',
			'id'    => 'page_header_padding',
			'type'  => 'text',
			'desc'  => 'Include "px, rem" in the string. e.g. 100px, 10rem',
		),
		array(
			'title' => 'Page Header Background',
			'id'    => 'page_header_background',
			'type'  => 'color',
			'desc'  => '',
		),
		array(
			'title' => 'Page Header Color',
			'id'    => 'page_header_color',
			'type'  => 'color',
			'desc'  => '',
		),
		array(
			'title'   => 'Page Header Vertical Align',
			'id'      => 'page_header_vertical_align',
			'type'    => 'select',
			'desc'    => 'Default is Center',
			'options' => array(
				''           => 'Default',
				'flex-start' => 'Top',
				'center'     => 'Center',
				'flex-end'   => 'Bottom'
			),
		),
		array(
			'title'   => 'Page Header Text Align',
			'id'      => 'page_header_text_align',
			'type'    => 'select',
			'desc'    => 'Default is Left',
			'options' => array(
				''       => 'Default',
				'left'   => 'Left',
				'center' => 'Center',
				'right'  => 'Right'
			),
		),
		array(
			'title'   => 'Page Header Background Size',
			'id'      => 'page_header_background_size',
			'type'    => 'select',
			'desc'    => 'Default is Cover',
			'options' => array(
				''        => 'Default',
				'auto'    => 'Auto',
				'cover'   => 'Cover',
				'contain' => 'Contain'
			),
		),
		array(
			'title'   => 'Page Header Background Repeat',
			'id'      => 'page_header_background_repeat',
			'type'    => 'select',
			'desc'    => 'Default is No Repeat',
			'options' => array(
				''          => 'Default',
				'no-repeat' => 'No Repeat',
				'repeat'    => 'Repeat',
				'repeat-x'  => 'Repeat X',
				'repeat-y'  => 'Repeat Y'
			),
		),
		array(
			'title'   => 'Page Header Background Position',
			'id'      => 'page_header_background_position',
			'type'    => 'select',
			'desc'    => 'Default is Center',
			'options' => array(
				''              => 'Default',
				'left top'      => 'Left Top',
				'left center'   => 'Left Center',
				'left bottom'   => 'Left Bottom',
				'right top'     => 'Right Top',
				'right center'  => 'Right Center',
				'right bottom'  => 'Right Bottom',
				'center top'    => 'Center Top',
				'center'        => 'Center',
				'center bottom' => 'Center Bottom'
			),
		),
		array(
			'title' => 'Page Header Background Overlay',
			'id'    => 'page_header_background_overlay',
			'type'  => 'color',
			'desc'  => '',
		),

		array( 'type' => 'sectionend', 'id' => 'page_hero' ),
	);

	/**
	 * WPFC_Meta constructor.
	 */
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'register' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}

	/**
	 * Loops though the meta array and saves each field.
	 *
	 * @param int $page_ID The ID of the page that is being saved
	 *
	 * @return bool
	 */
	public static function save( $page_ID ) {
		$data = $_POST;

		if ( empty( $data ) ) {
			return false;
		}

		// Options to update will be stored here and saved later.
		$update_options = array();

		// Loop options and get values to save.
		foreach ( self::$options as $option ) {
			if ( ! isset( $option['id'] ) || ! isset( $option['type'] ) ) {
				continue;
			}

			if ( substr( $option['id'], 0, 2 ) === '__' && strlen( $option['id'] ) > 2 ) {
				continue;
			}

			// Get posted value.
			if ( strstr( $option['id'], '[' ) ) {
				parse_str( $option['id'], $option_name_array );
				$option_name  = current( array_keys( $option_name_array ) );
				$setting_name = key( $option_name_array[ $option_name ] );
				$raw_value    = isset( $data[ $option_name ][ $setting_name ] ) ? wp_unslash( $data[ $option_name ][ $setting_name ] ) : null;
			} else {
				$option_name  = $option['id'];
				$setting_name = '';
				$raw_value    = isset( $data[ $option['id'] ] ) ? wp_unslash( $data[ $option['id'] ] ) : null;
			}

			// Format the value based on option type.
			switch ( $option['type'] ) {
				case 'checkbox' :
					$value = '1' === $raw_value || 'yes' === $raw_value ? 'yes' : 'no';
					break;
				case 'textarea' :
					$value = wp_kses_post( trim( $raw_value ) );
					break;
				case 'multiselect' :
					$value = array_filter( array_map( 'wpfc_clean', (array) $raw_value ) );
					break;
				case 'select':
					$allowed_values = empty( $option['options'] ) ? array() : array_keys( $option['options'] );
					if ( empty( $option['default'] ) && empty( $allowed_values ) ) {
						$value = null;
						break;
					}
					$default = ( empty( $option['default'] ) ? $allowed_values[0] : $option['default'] );
					$value   = in_array( $raw_value, $allowed_values ) ? $raw_value : $default;
					break;
				default :
					$value = wpfc_clean( $raw_value );
					break;
			}

			if ( is_null( $value ) ) {
				continue;
			}

			// Check if option is an array and handle that differently to single values.
			if ( $option_name && $setting_name ) {
				if ( ! isset( $update_options[ $option_name ] ) ) {
					$update_options[ $option_name ] = get_option( $option_name, array() );
				}
				if ( ! is_array( $update_options[ $option_name ] ) ) {
					$update_options[ $option_name ] = array();
				}
				$update_options[ $option_name ][ $setting_name ] = $value;
			} else {
				$update_options[ $option_name ] = $value;
			}
		}

		// Save all options in our array.
		foreach ( $update_options as $name => $value ) {
			update_metadata( 'post', $page_ID, 'wpfc_' . $name, $value );
		}

		return true;
	}

	/**
	 * Outputs the HTML
	 */
	public static function output() {
		foreach ( self::$options as $value ) {
			if ( ! isset( $value['type'] ) ) {
				continue;
			}
			if ( ! isset( $value['id'] ) ) {
				$value['id'] = '';
			}
			if ( ! isset( $value['title'] ) ) {
				$value['title'] = isset( $value['name'] ) ? $value['name'] : '';
			}
			if ( ! isset( $value['class'] ) ) {
				$value['class'] = '';
			}
			if ( ! isset( $value['css'] ) ) {
				$value['css'] = '';
			}
			if ( ! isset( $value['default'] ) ) {
				$value['default'] = '';
			}
			if ( ! isset( $value['desc'] ) ) {
				$value['desc'] = '';
			}
			if ( ! isset( $value['desc_tip'] ) ) {
				$value['desc_tip'] = false;
			}
			if ( ! isset( $value['placeholder'] ) ) {
				$value['placeholder'] = '';
			}

			// Custom attribute handling
			$custom_attributes = array();
			if ( ! empty( $value['custom_attributes'] ) && is_array( $value['custom_attributes'] ) ) {
				foreach ( $value['custom_attributes'] as $attribute => $attribute_value ) {
					$custom_attributes[] = esc_attr( $attribute ) . '="' . esc_attr( $attribute_value ) . '"';
				}
			}

			// Description handling
			// Reset variables
			$tooltip_html = $description = '';
			// Get descriptions
			$field_description       = self::get_field_description( $value );
			extract( $field_description );

			switch ( $value['type'] ) {
				// Title of the section, and section start
				case 'title':
					if ( ! empty( $value['title'] ) ) {
						?>
                        <h2
                                id="<?php echo esc_attr( $value['id'] ); ?>"
                                class="<?php echo esc_attr( $value['class'] ); ?>"
                                style="<?php echo esc_attr( $value['css'] ); ?>"
							<?php echo implode( ' ', $custom_attributes ); ?>
                        ><?= esc_html( $value['title'] ) ?></h2>
						<?php
					}
					if ( ! empty( $value['desc'] ) ) {
						echo wpautop( wptexturize( wp_kses_post( $value['desc'] ) ) );
					}
					echo '<table class="meta-table">' . "\n\n";
					break;

				// End of the section
				case 'sectionend':
					echo '</table>';
					break;

				// Standard text inputs and subtypes like 'number'
				case 'text':
				case 'email':
				case 'number':
				case 'password' :
					if ( substr( $value['id'], 0, 2 ) === '__' && strlen( $value['id'] ) > 2 ) {
						$option_value = $value['value'];
					} else {
						$option_value = self::get_option( $value['id'], $value['default'] );
					}
					?>
                    <tr valign="top">
                    <!--suppress XmlDefaultAttributeValue -->
                    <th scope="row" class="titledesc">
                        <label for="<?php echo esc_attr( $value['id'] ); ?>"><?php echo esc_html( $value['title'] ); ?></label>
						<?php echo $tooltip_html; ?>
						<?php echo $description; ?>
                    </th>
                    <td class="forminp forminp-<?php echo sanitize_title( $value['type'] ) ?>">
                        <input
                                name="<?php echo esc_attr( $value['id'] ); ?>"
                                id="<?php echo esc_attr( $value['id'] ); ?>"
                                type="<?php echo esc_attr( $value['type'] ); ?>"
                                style="<?php echo esc_attr( $value['css'] ); ?>"
                                value="<?php echo esc_attr( $option_value ); ?>"
                                class="<?php echo esc_attr( $value['class'] ); ?>"
                                placeholder="<?php echo esc_attr( $value['placeholder'] ); ?>"
							<?php echo implode( ' ', $custom_attributes ); ?>
                        />
                    </td>
                    </tr><?php
					break;

				// Textarea
				case 'textarea':
					$option_value = self::get_option( $value['id'], $value['default'] );
					?>
                    <tr valign="top">
                    <!--suppress XmlDefaultAttributeValue -->
                    <th scope="row" class="titledesc">
                        <label for="<?php echo esc_attr( $value['id'] ); ?>"><?php echo esc_html( $value['title'] ); ?></label>
						<?php echo $tooltip_html; ?>
						<?php echo $description; ?>
                    </th>
                    <td class="forminp forminp-<?php echo sanitize_title( $value['type'] ) ?>">
                        <textarea
                                name="<?php echo esc_attr( $value['id'] ); ?>"
                                id="<?php echo esc_attr( $value['id'] ); ?>"
                                style="<?php echo esc_attr( $value['css'] ); ?>"
                                class="<?php echo esc_attr( $value['class'] ); ?>"
                                placeholder="<?php echo esc_attr( $value['placeholder'] ); ?>"
	                        <?php echo implode( ' ', $custom_attributes ); ?>
                        ><?php echo esc_textarea( $option_value ); ?></textarea>
                    </td>
                    </tr><?php
					break;

				// Select boxes
				case 'select' :
				case 'multiselect' :
					$option_value = self::get_option( $value['id'], $value['default'] );
					?>
                    <tr valign="top">
                    <!--suppress XmlDefaultAttributeValue -->
                    <th scope="row" class="titledesc">
                        <label for="<?php echo esc_attr( $value['id'] ); ?>"><?php echo esc_html( $value['title'] ); ?></label>
						<?php echo $tooltip_html; ?>
						<?php echo $description; ?>
                    </th>
                    <td class="forminp forminp-<?php echo sanitize_title( $value['type'] ) ?>">
                        <select
                                name="<?php echo esc_attr( $value['id'] ); ?><?php echo ( 'multiselect' === $value['type'] ) ? '[]' : ''; ?>"
                                id="<?php echo esc_attr( $value['id'] ); ?>"
                                style="<?php echo esc_attr( $value['css'] ); ?>"
                                class="<?php echo esc_attr( $value['class'] ); ?>"
							<?php echo implode( ' ', $custom_attributes ); ?>
							<?php echo ( 'multiselect' == $value['type'] ) ? 'multiple="multiple"' : ''; ?>
                        >
							<?php
							foreach ( $value['options'] as $key => $val ) {
								?>
                                <option value="<?php echo esc_attr( $key ); ?>" <?php
								if ( is_array( $option_value ) ) {
									selected( in_array( $key, $option_value ), true );
								} else {
									selected( $option_value, $key );
								}
								?>><?php echo $val ?></option>
								<?php
							}
							?>
                        </select>
                    </td>
                    </tr><?php
					break;

				// Radio inputs
				case 'radio' :
					$option_value = self::get_option( $value['id'], $value['default'] );
					?>
                    <tr valign="top">
                    <!--suppress XmlDefaultAttributeValue -->
                    <th scope="row" class="titledesc">
                        <label for="<?php echo esc_attr( $value['id'] ); ?>"><?php echo esc_html( $value['title'] ); ?></label>
						<?php echo $tooltip_html; ?>
						<?php echo $description; ?>
                    </th>
                    <td class="forminp forminp-<?php echo sanitize_title( $value['type'] ) ?>">
                        <fieldset>
                            <ul>
								<?php
								foreach ( $value['options'] as $key => $val ) {
									?>
                                    <li>
                                        <label><input
                                                    name="<?php echo esc_attr( $value['id'] ); ?>"
                                                    value="<?php echo $key; ?>"
                                                    type="radio"
                                                    style="<?php echo esc_attr( $value['css'] ); ?>"
                                                    class="<?php echo esc_attr( $value['class'] ); ?>"
												<?php echo implode( ' ', $custom_attributes ); ?>
												<?php checked( $key, $option_value ); ?>
                                            /> <?php echo $val ?></label>
                                    </li>
									<?php
								}
								?>
                            </ul>
                        </fieldset>
                    </td>
                    </tr><?php
					break;

				// Checkbox inputs
				case 'checkbox' :
					$option_value = self::get_option( $value['id'], $value['default'] );
					$visbility_class = array();
					if ( ! isset( $value['hide_if_checked'] ) ) {
						$value['hide_if_checked'] = false;
					}
					if ( ! isset( $value['show_if_checked'] ) ) {
						$value['show_if_checked'] = false;
					}
					if ( 'yes' == $value['hide_if_checked'] || 'yes' == $value['show_if_checked'] ) {
						$visbility_class[] = 'hidden_option';
					}
					if ( 'option' == $value['hide_if_checked'] ) {
						$visbility_class[] = 'hide_options_if_checked';
					}
					if ( 'option' == $value['show_if_checked'] ) {
						$visbility_class[] = 'show_options_if_checked';
					}
					?>
                    <tr valign="top" class="<?php echo esc_attr( implode( ' ', $visbility_class ) ); ?>">
                        <!--suppress XmlDefaultAttributeValue -->
                        <th scope="row" class="titledesc">
							<?php echo esc_html( $value['title'] ) ?>
							<?php echo $description ?>
                        </th>
                        <td class="forminp forminp-checkbox">
                            <fieldset>
								<?php

								if ( ! empty( $value['title'] ) ) {
									?>
                                    <legend class="screen-reader-text">
                                        <span><?php echo esc_html( $value['title'] ) ?></span>
                                    </legend>
									<?php
								}
								?>
                                <label for="<?php echo $value['id'] ?>">
                                    <input
                                            name="<?php echo esc_attr( $value['id'] ); ?>"
                                            id="<?php echo esc_attr( $value['id'] ); ?>"
                                            type="checkbox"
                                            class="<?php echo esc_attr( isset( $value['class'] ) ? $value['class'] : '' ); ?>"
                                            value="1"
										<?php checked( $option_value, 'yes' ); ?>
										<?php echo implode( ' ', $custom_attributes ); ?>
                                    />
                                </label> <?php echo $tooltip_html; ?>
                            </fieldset>
                        </td>
                    </tr>
					<?php
					break;

				// Color inputs
				case 'color':
					$option_value = self::get_option( $value['id'], $value['default'] );

					?>
                    <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for="<?php echo esc_attr( $value['id'] ); ?>"><?php echo esc_html( $value['title'] ); ?></label>
						<?php echo $tooltip_html; ?>
						<?php echo $description; ?>
                    </th>
                    <td class="forminp forminp-<?php echo sanitize_title( $value['type'] ) ?>">&lrm;
                        <input
                                name="<?php echo esc_attr( $value['id'] ); ?>"
                                id="<?php echo esc_attr( $value['id'] ); ?>"
                                type="text"
                                dir="ltr"
                                style="<?php echo esc_attr( $value['css'] ); ?>"
                                value="<?php echo esc_attr( $option_value ); ?>"
                                class="<?php echo esc_attr( $value['class'] ); ?> cs-wp-color-picker"
                                placeholder="<?php echo esc_attr( $value['placeholder'] ); ?>"
							<?php echo implode( ' ', $custom_attributes ); ?>
                        />&lrm;
                    </td>
                    </tr><?php
					break;
			}
		}
	}

	/**
	 * Helper function to get the formatted description and tip HTML for a
	 * given form field
	 *
	 * @param  array $value The form field value array
	 *
	 * @return array The description and tip as a 2 element array
	 */
	public static function get_field_description( $value ) {
		$description  = '';
		$tooltip_html = '';
		if ( true === $value['desc_tip'] ) {
			$tooltip_html = $value['desc'];
		} elseif ( ! empty( $value['desc_tip'] ) ) {
			$description  = $value['desc'];
			$tooltip_html = $value['desc_tip'];
		} elseif ( ! empty( $value['desc'] ) ) {
			$description = $value['desc'];
		}
		if ( $description && in_array( $value['type'], array( 'textarea', 'radio' ) ) ) {
			$description = '<p style="margin-top:0">' . wp_kses_post( $description ) . '</p>';
		} elseif ( $description && in_array( $value['type'], array( 'checkbox' ) ) ) {
			$description = wp_kses_post( $description );
		} elseif ( $description ) {
			$description = '<span class="description">' . wp_kses_post( $description ) . '</span>';
		}
		if ( $tooltip_html && in_array( $value['type'], array( 'checkbox' ) ) ) {
			$tooltip_html = '<p class="description">' . $tooltip_html . '</p>';
		} elseif ( $tooltip_html ) {
			$tooltip_html = '<span class="nh-help-tip" data-tip="' . esc_attr( $tooltip_html ) . '"></span>';
		}

		return array(
			'description'  => $description,
			'tooltip_html' => $tooltip_html,
		);
	}

	/**
	 * Get a meta value
	 *
	 * @param string $option_name
	 * @param mixed  $default
	 *
	 * @return mixed
	 */
	public static function get_option( $option_name, $default = '' ) {
		if ( empty( $_GET['post'] ) ) {
			return $default;
		}

		// Array value
		if ( strstr( $option_name, '[' ) ) {
			parse_str( $option_name, $option_array );
			// Option name is first key
			$option_name = current( array_keys( $option_array ) );
			// Get value
			$option_values = get_post_meta( $_GET['post'], 'wpfc_' . $option_name, true );
			$key           = key( $option_array[ $option_name ] );
			if ( isset( $option_values[ $key ] ) ) {
				$option_value = $option_values[ $key ];
			} else {
				$option_value = '';
			}
			// Single value
		} else {
			$option_value = get_post_meta( $_GET['post'], 'wpfc_' . $option_name, true );

			if ( $option_value === 'on' || $option_value === 'off' ) {
				$option_value = $option_value === 'on' ? true : false;
			}
		}
		if ( is_array( $option_value ) ) {
			$option_value = array_map( 'stripslashes', $option_value );
		} elseif ( ! is_null( $option_value ) ) {
			$option_value = stripslashes( $option_value );
		}

		return ( '' === $option_value ) ? $default : $option_value;
	}

	/**
	 * Registers the meta box(es) with WordPress
	 */
	public function register() {
		add_meta_box( 'wpfc-metabox', 'Page Header', array( __CLASS__, 'output' ), 'page' );
		wp_enqueue_style( 'wpfc-metabox', get_template_directory_uri() . '/wpfc-core/includes/assets/meta.css', array(), '1.0.0' );

		// color picker styles
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style( 'cs-wp-color-picker', get_template_directory_uri() . '/wpfc-core/includes/assets/codestar-wp-color-picker-master/css/cs-wp-color-picker.min.css', array( 'wp-color-picker' ), '1.0.0', 'all' );

		// color picker scripts
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'cs-wp-color-picker', get_template_directory_uri() . '/wpfc-core/includes/assets/codestar-wp-color-picker-master/js/cs-wp-color-picker.min.js', array( 'wp-color-picker' ), '1.0.0', true );
	}
}

# G1:3
new WPFC_Meta();
