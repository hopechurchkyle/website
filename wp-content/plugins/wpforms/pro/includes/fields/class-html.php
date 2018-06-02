<?php

/**
 * HTML block text field.
 *
 * @package    WPForms
 * @author     WPForms
 * @since      1.0.0
 * @license    GPL-2.0+
 * @copyright  Copyright (c) 2016, WPForms LLC
 */
class WPForms_Field_HTML extends WPForms_Field {

	/**
	 * Primary class constructor.
	 *
	 * @since 1.0.0
	 */
	public function init() {

		// Define field type information.
		$this->name  = esc_html__( 'HTML', 'wpforms' );
		$this->type  = 'html';
		$this->icon  = 'fa-code';
		$this->order = 15;
		$this->group = 'fancy';

		// Define additional field properties.
		add_filter( 'wpforms_field_properties_html', array( $this, 'field_properties' ), 5, 3 );
	}

	/**
	 * Define additional field properties.
	 *
	 * @since 1.3.7
	 *
	 * @param array $properties
	 * @param array $field
	 * @param array $form_data
	 *
	 * @return array
	 */
	public function field_properties( $properties, $field, $form_data ) {

		// Remove input attributes references.
		$properties['inputs']['primary']['attr'] = array();

		// Add code value.
		$properties['inputs']['primary']['code'] = ! empty( $field['code'] ) ? $field['code'] : '';

		return $properties;
	}

	/**
	 * Field options panel inside the builder.
	 *
	 * @since 1.0.0
	 *
	 * @param array $field
	 */
	public function field_options( $field ) {
		/*
		 * Basic field options.
		 */

		// Options open markup.
		$args = array(
			'markup' => 'open',
		);
		$this->field_option( 'basic-options', $field, $args );

		// Code.
		$this->field_option( 'code', $field );

		// Set label to disabled.
		$args = array(
			'type'  => 'hidden',
			'slug'  => 'label_disable',
			'value' => '1',
		);
		$this->field_element( 'text', $field, $args );

		// Options close markup.
		$args = array(
			'markup' => 'close',
		);
		$this->field_option( 'basic-options', $field, $args );

		/*
		 * Advanced field options.
		 */

		// Options open markup.
		$args = array(
			'markup' => 'open',
		);
		$this->field_option( 'advanced-options', $field, $args );

		// Custom CSS classes.
		$this->field_option( 'css', $field );

		// Options close markup.
		$args = array(
			'markup' => 'close',
		);
		$this->field_option( 'advanced-options', $field, $args );
	}

	/**
	 * Field preview inside the builder.
	 *
	 * @since 1.0.0
	 *
	 * @param array $field
	 */
	public function field_preview( $field ) {

		?>

		<div class="code-block">
			<label class="label-title"> <i class="fa fa-code"></i> <?php esc_html_e( 'HTML / Code Block', 'wpforms' ); ?></label>
			<div class="description"><?php esc_html_e( 'Contents of this field are not displayed in the admin area.', 'wpforms' ); ?></div>
		</div>

		<?php
	}

	/**
	 * Field display on the form front-end.
	 *
	 * @since 1.0.0
	 *
	 * @param array $field
	 * @param array $deprecated
	 * @param array $form_data
	 */
	public function field_display( $field, $deprecated, $form_data ) {

		// Define data.
		$primary = $field['properties']['inputs']['primary'];

		// Primary field.
		printf(
			'<div %s>%s</div>',
			wpforms_html_attributes( $primary['id'], $primary['class'], $primary['data'], $primary['attr'] ),
			do_shortcode( $primary['code'] )
		);
	}

	/**
	 * Formats field.
	 *
	 * @since 1.0.0
	 *
	 * @param int $field_id
	 * @param array $field_submit
	 * @param array $form_data
	 */
	public function format( $field_id, $field_submit, $form_data ) {
	}
}

new WPForms_Field_HTML;
