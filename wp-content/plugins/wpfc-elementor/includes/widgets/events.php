<?php

namespace WPFCElementor\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Elementor Events
 *
 * Elementor widget for Events.
 *
 * @since 1.0.0
 */
class Events extends Widget_Base {

	public function get_name() {
		return 'wpfc-events';
	}

	public function get_title() {
		return __( 'WPFC Events', 'wpfc-elementor' );
	}

	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	public function get_categories() {
		return [ 'wpfc-elements' ];
	}

	/**
	 * A list of scripts that the widgets is depended in
	 *
	 * @since 1.3.0
	 **/
	public function get_script_depends() {
		return [ 'wpfc-elementor' ];
	}

	protected function _register_controls() {
		// Do not add the widget if plugin is not active
		if ( ! function_exists( 'tribe_get_start_date' ) ) {
			return;
		}

		// Begin Layout Section - Content Tab
		$this->start_controls_section(
			'section_layout',
			[
				'label' => __( 'Layout', 'wpfc-elementor' ),
			]
		);

		$this->add_control(
			'layout_style',
			[
				'label'   => __( 'Style', 'wpfc-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'wpfc-style1',
				'options' => [
					'wpfc-style1' => __( 'Style 1', 'wpfc-elementor' ),
					'wpfc-style2' => __( 'Style 2', 'wpfc-elementor' ),
					'wpfc-style3' => __( 'Style 3', 'wpfc-elementor' ),
					'wpfc-style4' => __( 'Style 4', 'wpfc-elementor' ),
				],
			]
		);

		$this->add_control(
			'layout_equal_height',
			[
				'label'     => __( 'Equal Height', 'wpfc-elementor' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'yes',
				'label_on'  => __( 'Yes', 'wpfc-elementor' ),
				'label_off' => __( 'No', 'wpfc-elementor' ),
			]
		);

		$this->end_controls_section();
		// End Layout Section - Content Tab

		// Begin Query Section - Content Tab
		$this->start_controls_section(
			'section_query',
			[
				'label' => __( 'Query', 'wpfc-elementor' ),
			]
		);

		$this->add_control(
			'query_posts',
			[
				'label'   => __( 'Number of Posts', 'wpfc-elementor' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '3',

			]
		);

		$this->add_control(
			'query_sort',
			[
				'label'   => __( 'Sort', 'wpfc-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'ASC'  => __( 'Ascending', 'wpfc-elementor' ),
					'DESC' => __( 'Descending', 'wpfc-elementor' ),
				],

			]
		);
		
		$this->add_control(
			'query_categories',
			[
				'label'   => __( 'Categories', 'wpfc-elementor' ),
				'type'    => Controls_Manager::TEXT,
			]
		);

		$this->end_controls_section();
		// End Query Section - Content Tab

		// Begin Grid Section - Content Tab
		$this->start_controls_section(
			'section_grid',
			[
				'label' => __( 'Grid', 'wpfc-elementor' ),
			]
		);

		$this->add_responsive_control(
			'grid_columns', [
				'label'     => __( 'Columns', 'wpfc-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '33.3333',
				'options'   => [
					'100'     => __( 'One Column', 'wpfc-elementor' ),
					'50'      => __( 'Two Columns', 'wpfc-elementor' ),
					'33.3333' => __( 'Three Columns', 'wpfc-elementor' ),
					'25'      => __( 'Four Columns', 'wpfc-elementor' )
				],
				'selectors' => [
					'{{WRAPPER}} .wpfc-size' => 'flex-basis: {{VALUE}}%; width: {{VALUE}}%; max-width: {{VALUE}}%',
				],
			]
		);

		$this->add_responsive_control(
			'grid_spacing', [
				'label'      => __( 'Spacing', 'wpfc-elementor' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'rem' ],
				'range'      => [
					'px'  => [
						'min' => 0,
						'max' => 100,
					],
					'rem' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'default'    => [
					'size' => '15',
					'unit' => 'px',
				],
				'selectors'  => [
					'{{WRAPPER}} .wpfc-block-content' => 'margin: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .wpfc-grid'          => 'margin: -{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Grid Section - Content Tab

		// Begin Display Section - Content Tab
		$this->start_controls_section(
			'section_display',
			[
				'label' => __( 'Display', 'wpfc-elementor' ),
			]
		);

		$this->add_control(
			'display_title', [
				'label'     => __( 'Display Title', 'wpfc-elementor' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'yes',
				'label_on'  => __( 'Yes', 'wpfc-elementor' ),
				'label_off' => __( 'No', 'wpfc-elementor' ),
			]
		);

		$this->add_control(
			'display_image', [
				'label'     => __( 'Display Image', 'wpfc-elementor' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'yes',
				'label_on'  => __( 'Yes', 'wpfc-elementor' ),
				'label_off' => __( 'No', 'wpfc-elementor' ),
				'condition' => [
					'layout_style' => [
					    'wpfc-style1',
					    'wpfc-style3'
					],
				],
			]
		);

		$this->add_control(
			'display_date', [
				'label'     => __( 'Display Date', 'wpfc-elementor' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'yes',
				'label_on'  => __( 'Yes', 'wpfc-elementor' ),
				'label_off' => __( 'No', 'wpfc-elementor' ),
			]
		);

		$this->add_control(
			'display_content', [
				'label'     => __( 'Display Content', 'wpfc-elementor' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'yes',
				'label_on'  => __( 'Yes', 'wpfc-elementor' ),
				'label_off' => __( 'No', 'wpfc-elementor' ),
				'condition' => [
					'layout_style' => 'wpfc-style1',
				],
			]
		);

		$this->add_control(
			'display_address', [
				'label'     => __( 'Display Address', 'wpfc-elementor' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'yes',
				'label_on'  => __( 'Yes', 'wpfc-elementor' ),
				'label_off' => __( 'No', 'wpfc-elementor' ),
				'condition' => [
					'layout_style' => 'wpfc-style1',
				],
			]
		);
		
		$this->add_control(
			'display_read_more', [
				'label'     => __( 'Display Read More', 'wpfc-elementor' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'yes',
				'label_on'  => __( 'Yes', 'wpfc-elementor' ),
				'label_off' => __( 'No', 'wpfc-elementor' ),
				'condition' => [
					'layout_style' => 'wpfc-style3',
				],
			]
		);

		$this->end_controls_section();
		// End Display Section - Content Tab

		// Begin Card Section - Style Tab
		$this->start_controls_section(
			'section_card',
			[
				'label' => __( 'Card', 'wpfc-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'card_background',
			[
				'label'     => __( 'Background', 'wpfc-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .wpfc-block-content' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'layout_style' => 'wpfc-style1',
				],
			]
		);
		
		$this->add_control(
			'card_background_3',
			[
				'label'     => __( 'Background', 'wpfc-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#242424',
				'selectors' => [
					'{{WRAPPER}} .wpfc-block-content' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'layout_style' => 'wpfc-style3',
				],
			]
		);
		
		$this->add_control(
			'card_background_4',
			[
				'label'     => __( 'Background', 'wpfc-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .wpfc-block-content' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'layout_style' => 'wpfc-style4',
				],
			]
		);

		$this->add_control(
			'card_color',
			[
				'label'     => __( 'Color', 'wpfc-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#242424',
				'selectors' => [
					'{{WRAPPER}} .wpfc-block-content' => 'color: {{VALUE}};',
				],
				'condition' => [
					'layout_style' => 'wpfc-style1',
				],
			]
		);
		
		$this->add_control(
			'card_color_3',
			[
				'label'     => __( 'Color', 'wpfc-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .wpfc-block-content' => 'color: {{VALUE}};',
				],
				'condition' => [
					'layout_style' => 'wpfc-style3',
				],
			]
		);
		
		$this->add_control(
			'card_color_4',
			[
				'label'     => __( 'Color', 'wpfc-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#242424',
				'selectors' => [
					'{{WRAPPER}} .wpfc-block-content' => 'color: {{VALUE}};',
				],
				'condition' => [
					'layout_style' => 'wpfc-style4',
				],
			]
		);
		
		$this->add_control(
			'card_date_color_4',
			[
				'label'     => __( 'Date Color', 'wpfc-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#242424',
				'selectors' => [
					'{{WRAPPER}} .wpfc-start-date-day' => 'color: {{VALUE}};',
				],
				'condition' => [
					'layout_style' => 'wpfc-style4',
				],
			]
		);
		
		$this->add_control(
			'card_elements_color',
			[
				'label'     => __( 'Elements Color', 'wpfc-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#242424',
				'selectors' => [
					'{{WRAPPER}} .wpfc-block-content:before' => 'background: {{VALUE}};',
					'{{WRAPPER}} .wpfc-style2' => 'border-top: 1px solid {{VALUE}};',
				],
				'condition' => [
					'layout_style' => 'wpfc-style2',
				],
			]
		);

		$this->add_control(
			'card_padding', [
				'label'      => __( 'Padding', 'wpfc-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'rem' ],
				'default'    => [
					'top'    => '40',
					'right'  => '20',
					'bottom' => '40',
					'left'   => '20',
				],
				'selectors'  => [
					'{{WRAPPER}} .wpfc-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'layout_style' => [
					    'wpfc-style1',
					    'wpfc-style2',
					    'wpfc-style3'
					],
				],
			]
		);
		
		$this->add_control(
			'card_padding_4', [
				'label'      => __( 'Padding', 'wpfc-elementor' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'rem' ],
				'default'    => [
					'top'    => '24',
					'right'  => '24',
					'bottom' => '24',
					'left'   => '24',
				],
				'selectors'  => [
					'{{WRAPPER}} .wpfc-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'layout_style' => [
					    'wpfc-style4',
					],
				],
			]
		);

		$this->end_controls_section();
		// End Card Section - Style Tab

		// Begin Box Shadow Section - Style Tab
		$this->start_controls_section(
			'section_box_shadow',
			[
				'label' => __( 'Box Shadow', 'wpfc-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout_style' => [
						'wpfc-style1',
						'wpfc-style3'
					]
				],
			]
		);

		$this->add_control(
			'box_shadow_enabled',
			[
				'label'        => __( 'Box Shadow', 'wpfc-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'yes',
				'label_on'     => __( 'Yes', 'wpfc-elementor' ),
				'label_off'    => __( 'No', 'wpfc-elementor' ),
				'return_value' => 'yes',

			]
		);

		$this->add_control(
			'box_shadow_select',
			[
				'label'     => __( 'Box Shadow', 'wpfc-elementor' ),
				'type'      => Controls_Manager::BOX_SHADOW,
				'defaults'  => [
					'color'      => 'rgba(0,0,0,0.08)',
					'blur'       => 10,
					'spread'     => 0,
					'horizontal' => 0,
					'vertical'   => 0,
				],
				'condition' => [
					'box_shadow_enabled' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .wpfc-block-content' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{box_shadow_position.VALUE}};',
				],

			]
		);

		$this->end_controls_section();
		// End Box Shadow Section - Style Tab

		// Begin Border Section - Style Tab
		$this->start_controls_section(
			'section_border',
			[
				'label' => __( 'Border', 'wpfc-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout_style' => [
					    'wpfc-style1',
					    'wpfc-style3'
					],
				],
			]
		);

		$this->add_control(
			'border_enabled',
			[
				'label'     => __( 'Border', 'wpfc-elementor' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => '',
				'label_on'  => __( 'Yes', 'wpfc-elementor' ),
				'label_off' => __( 'No', 'wpfc-elementor' ),
			]
		);

		$this->add_control(
			'border_type',
			[
				'label'     => __( 'Border Type', 'wpfc-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'none'   => __( 'None', 'wpfc-elementor' ),
					'solid'  => __( 'Solid', 'wpfc-elementor' ),
					'double' => __( 'Double', 'wpfc-elementor' ),
					'dotted' => __( 'Dotted', 'wpfc-elementor' ),
					'dashed' => __( 'Dashed', 'wpfc-elementor' ),
				],
				'default'   => 'solid',
				'condition' => [
					'border_enabled' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .wpfc-block-content ' => 'border-style: {{VALUE}};',

				],

			]
		);

		$this->add_control(
			'border_width',
			[
				'label'     => __( 'Border Width', 'wpfc-elementor' ),
				'type'      => Controls_Manager::DIMENSIONS,
				'condition' => [
					'border_enabled' => 'yes',
				],
				'default'   => [
					'top'    => 1,
					'right'  => 1,
					'bottom' => 1,
					'left'   => 1,
				],
				'selectors' => [
					'{{WRAPPER}} .wpfc-block-content' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],
			]
		);

		$this->add_control(
			'border_color',
			[
				'label'     => __( 'Border Color', 'wpfc-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ebebeb',
				'condition' => [
					'border_enabled' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .wpfc-block-content' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		// End Border Section - Style Tab

		// Begin Image Section - Style Tab
		$this->start_controls_section(
			'section_image', [
				'label' => __( 'Image', 'wpfc-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout_style' => [
					    'wpfc-style1',
					    'wpfc-style3'
					],
				],
			]
		);

		$this->add_control(
			'image_height',
			[
				'label'   => __( 'Image Height', 'wpfc-elementor' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '300px',
			]
		);

		$this->add_control(
			'image_size', [
				'label'   => __( 'Size', 'wpfc-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'cover',
				'options' => [
					'auto'    => 'Auto',
					'cover'   => 'Cover',
					'contain' => 'Contain',
				],
			]
		);

		$this->add_control(
			'image_repeat', [
				'label'   => __( 'Repeat', 'wpfc-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'no-repeat',
				'options' => [
					'no-repeat' => 'No Repeat',
					'repeat'    => 'Repeat',
					'repeat-x'  => 'Repeat X',
					'repeat-y'  => 'Repeat Y',
				],
			]
		);
		
		$this->add_control(
			'image_position', [
				'label'   => __( 'Position', 'wpfc-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'left top',
				'options' => [
					'left top' => 'Left Top',
					'left center' => 'Left Center',
					'left bottom' => 'Left Bottom',
					'right top' => 'Right Top',
					'right center' => 'Right Center',
					'right bottom' => 'Right Bottom',
					'center top' => 'Center Top',
					'center' => 'Center',
					'center bottom' => 'Center Bottom'
				],
				'selectors' => [
				    '{{WRAPPER}} .wpfc-image ' => 'background-position: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		// End Image Section - Style Tab

		// Begin Title Section - Style Tab
		$this->start_controls_section(
			'section_title', [
				'label' => __( 'Title', 'wpfc-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_css_class', [
				'label' => __( 'CSS Class', 'wpfc-elementor' ),
				'type'  => Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'title_tag', [
				'label'   => __( 'Tag', 'wpfc-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'h3',
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5'
				],
			]
		);
		
		$this->add_responsive_control(
			'title_font_size', [
				'label'   => __( 'Font Size', 'wpfc-elementor' ),
				'type'    => Controls_Manager::SLIDER,
				'default' => [
				    'size' => '',
				    'unit' => 'px',
				],
				'range' => [
				    'px' => [
				        'min' => 0,
				        'max' => 60,
				    ],
				],
				'selectors' => [
				    '{{WRAPPER}} .wpfc-title ' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'title_truncate',
			[
				'label'   => __( 'Truncate', 'wpfc-elementor' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '',
			]
		);
		
		$this->add_control(
			'title_color',
			[
				'label'     => __( 'Title Color', 'wpfc-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .wpfc-title a' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'title_color_hover',
			[
				'label'     => __( 'Title Color Hover', 'wpfc-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .wpfc-title a:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		// End Title Section - Style Tab
		
		// Begin Meta Section - Style Tab
		$this->start_controls_section(
			'section_meta', [
				'label' => __( 'Meta', 'wpfc-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_responsive_control(
			'meta_font_size', [
				'label'   => __( 'Font Size', 'wpfc-elementor' ),
				'type'    => Controls_Manager::SLIDER,
				'default' => [
				    'size' => '',
				    'unit' => 'px',
				],
				'range' => [
				    'px' => [
				        'min' => 0,
				        'max' => 60,
				    ],
				],
				'selectors' => [
				    '{{WRAPPER}} .wpfc-date ' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();
		// End Title Section - Style Tab

		// Begin Content Section - Style Tab
		$this->start_controls_section(
			'section_content', [
				'label' => __( 'Content', 'wpfc-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout_style' => 'wpfc-style1',
				],
			]
		);
		
		$this->add_responsive_control(
			'content_font_size', [
				'label'   => __( 'Font Size', 'wpfc-elementor' ),
				'type'    => Controls_Manager::SLIDER,
				'default' => [
				    'size' => '',
				    'unit' => 'px',
				],
				'range' => [
				    'px' => [
				        'min' => 0,
				        'max' => 60,
				    ],
				],
				'selectors' => [
				    '{{WRAPPER}} .wpfc-content ' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'content_type',
			[
				'label'   => __( 'Content Type', 'wpfc-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'content',
				'options' => [
					'content' => __( 'Content', 'wpfc-elementor' ),
					'excerpt' => __( 'Excerpt', 'wpfc-elementor' ),
				],
			]
		);

		$this->add_control(
			'content_truncate',
			[
				'label'   => __( 'Truncate', 'wpfc-elementor' ),
				'type'    => Controls_Manager::TEXT,
				'default' => '100',
			]
		);

		$this->end_controls_section();
		// End Content Section - Style Tab

	}

	protected function render() {
		// Do not add the widget if plugin is not active
		if ( ! function_exists( 'tribe_get_start_date' ) ) {
			return;
		}

		$settings = $this->get_settings();
		$per_page = $settings['query_posts'];
		$sort     = $settings['query_sort'];
		$style    = $settings['layout_style'];
		$columns  = $settings['grid_columns'];

		$equal_height = $settings['layout_equal_height'] == 'yes' ? 'wpfc-equal-height' : '';

		$events = new \WP_Query( array(
			'post_type'           => 'tribe_events',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true,
			'posts_per_page'      => $per_page,
			'order'               => $sort,
			'category_name' => $settings['query_categories']
		) );

		if ( $events->have_posts() ) :
			$html = '<div class="wpfc-elementor-events ' . $style . '">';
			$html .= '<div class="wpfc-grid">';
			while ( $events->have_posts() ) : $events->the_post();
				$html .= '<div class="wpfc-block wpfc-size wpfc-size-' . $columns . ' ' . $equal_height . ' ">';
				$html .= '<div class="wpfc-block-content">';

				if ( $style === 'wpfc-style1' ) :
					$html .= $this->style1();
				elseif ( $style === 'wpfc-style2' ) :
					$html .= $this->style2();
				elseif ( $style === 'wpfc-style3' ) :
					$html .= $this->style3();
				elseif ( $style === 'wpfc-style4' ) :
					$html .= $this->style4();
				endif;

				$html .= '</div>';
				$html .= '</div>';
			endwhile;
			$html .= '</div>';
			$html .= '</div>';

			echo $html;
		endif;

	}

	protected function style1() {
		$html = $this->entry_image();
		$html .= '<div class="wpfc-wrapper">';
		    $html .= $this->entry_title();
		    $html .= $this->entry_date();
		    $html .= $this->entry_content();
		    $html .= $this->entry_address();
		$html .= '</div>';

		return $html;
	}
	
	protected function style2() {
		$html = '<div class="wpfc-wrapper">';
		    $html .= $this->entry_date();
	 	    $html .= $this->entry_title();
		$html .= '</div>';

		return $html;
	}
	
	protected function style3() {
		$html = $this->entry_image();
		$html .= '<div class="wpfc-wrapper">';
	 	    $html .= $this->entry_title();
	 	    $html .= $this->entry_date();
	 	    $html .= $this->entry_read_more();
		$html .= '</div>';

		return $html;
	}
	
	protected function style4() {
		$html .= '<div class="wpfc-wrapper">';
		    $html .= '<div class="wpfc-main">';
	 	        $html .= $this->entry_title();
	 	        $html .= $this->entry_date();
		    $html .= '</div>';
		    
		    $html .= '<div class="wpfc-aside">';
		        $html .= $this->entry_start_date();
		    $html .= '</div>';
		$html .= '</div>';

		return $html;
	}

	protected function entry_image() {
		global $post;
		$settings = $this->get_settings();

		if ( has_post_thumbnail( $post->ID ) && $settings['display_image'] == 'yes' ) {
			$html = '<div class="wpfc-image-wrapper">';
			$html .= '<a href=" ' . get_post_permalink( $post->ID ) . ' ">';
			$html .= '<div class="wpfc-image" style="background-image: url( ' . get_the_post_thumbnail_url( $post->ID ) . ' ); height: ' . $settings['image_height'] . '; background-size: ' . $settings['image_size'] . '; background-repeat: ' . $settings['image_repeat'] . '"></div>';
			$html .= '</a>';
			$html .= '</div>';

			return $html;
		}

	}

	protected function entry_title() {
		global $post;
		$settings = $this->get_settings();
		$tag      = $settings['title_tag'];
		$truncate = $settings['title_truncate'];

		if ( $settings['display_title'] == 'yes' ) {
			$entry_title = $truncate !== '' ? substr( $post->post_title, 0, $truncate ) : $post->post_title;

			$html = '<' . $tag . ' class="wpfc-title">';
			$html .= '<a href=" ' . get_post_permalink( $post->ID ) . ' ">' . $entry_title . '</a>';
			$html .= '</' . $tag . '>';

			return $html;
		}
	}
	
	protected function entry_start_date() {
		global $post;
		$settings = $this->get_settings();
		$start_date = tribe_get_start_date( $post->ID, false, 'U' );
		$day = date(d, $start_date);
		$month = date(M, $start_date);
		
		$html .= '<div class="wpfc-start-date">';
		    $html .= '<span class="wpfc-start-date-day">'. $day .'</span>';
		    $html .= '<span class="wpfc-start-date-month">'. $month .'</span>';
		$html .= '</div>';
		
		return $html;
	}

	protected function entry_date() {
		global $post;
		$settings = $this->get_settings();

		/* Date */
		// get unix timestamp
		$start_date = tribe_get_start_date( $post->ID, false, 'U' );
		$end_date   = tribe_get_end_date( $post->ID, false, 'U' );

		// if it's a whole day event
		if ( tribe_event_is_all_day( $post->ID ) ) {
			$date_format = 'jS F Y';

			// if it's a current year, don't show it
			if ( date( 'Y', $start_date ) == date( 'Y' ) ) {
				$date_format = 'jS F';
			}

			$date = date( $date_format, $start_date );
		} else {
			// if it's a multi day event
			if ( tribe_event_is_multiday( $post->ID ) ) {
				$start_date_format = 'jS F Y -';
				$end_date_format   = ' jS F Y';
				$same_year         = date( 'Y', $start_date ) == date( 'Y', $end_date );
				$same_month        = $same_year ? date( 'm', $start_date ) == date( 'm', $end_date ) : false;
				$current_year      = $same_year && date( 'Y', $start_date ) == date( 'Y' );

				if ( $same_year ) {
					$start_date_format = 'jS F -';
					$end_date_format   = ' jS F';
				}

				// it will be false if the years are different
				if ( $same_month ) {
					$start_date_format = 'jS -';
				}

				$date = date( $start_date_format, $start_date ) . date( $end_date_format, $end_date );
			} else {
				$date_format = 'jS F Y @ g:i A';

				// if it's a current year, don't show it
				if ( date( 'Y', $start_date ) == date( 'Y' ) ) {
					$date_format = 'jS F @ g:i A';
				}

				$date = date( $date_format, $start_date ) . date( ' - g:i A', $end_date );
			}
		}

		if ( $settings['display_date'] == 'yes' ) {
			$html = '<div class="wpfc-date">' . $date . '</div>';

			return $html;
		}
	}

	protected function entry_content() {
		$settings = $this->get_settings();
		$type     = $settings['content_type'];
		$truncate = $settings['content_truncate'];
		global $post;

		if ( $settings['display_content'] == 'yes' ) {
			$content_type = $type == 'content' ? $post->post_content : tribe_events_get_the_excerpt( $post->ID );
			$content      = $truncate !== '' ? substr( $content_type, 0, $truncate ) : $content_type;

			$html = '<div class="wpfc-content">' . $content . '</div>';

			return $html;
		}
	}

	protected function entry_address() {
		global $post;
		$settings = $this->get_settings();

		if ( $settings['display_address'] == 'yes' and tribe_address_exists() ) {
			$event_address = tribe_get_full_address( $post->ID );
			$html          = '<div class="wpfc-address">' . $event_address . '</div>';

			return $html;
		}
	}
	
	protected function entry_read_more() {
		global $post;
		$settings = $this->get_settings();
		
		if ( $settings['display_read_more'] == 'yes' ) {
			$html = '<a class="wpfc-read-more" href=" ' . get_post_permalink( $post->ID ) . ' ">Read More</a>';
			
			return $html;
		}
	}
}