<?php

namespace WPFCElementor\Widgets;

use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Widget_Base;


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Sermons extends Widget_Base {

	public function get_name() {
		return 'wpfc-sermons';
	}

	public function get_title() {
		return __( 'WPFC Sermons', 'wpfc-elementor' );
	}

	public function get_icon() {
		return 'eicon-headphones';
	}

	public function get_categories() {
		return [ 'wpfc-elements' ];
	}

	public function get_script_depends() {
		return [ 'wpfc-sermons' ];
	}
	
	protected function _register_controls() {
		$this->start_controls_section(
			'section_content_Layout',
			[
				'label' => __( 'Layout', 'wpfc-elementor' ),
			]
		);
		
		$this->add_control(
			'layout_style',
			[
				'label'   => __( 'Layout Style', 'wpfc-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'style-1',
				'options' => [
					'style-1' => __( 'Style 1', 'wpfc-elementor' ),
					'style-2' => __( 'Style 2', 'wpfc-elementor' ),
					'style-3' => __( 'Style 3', 'wpfc-elementor' ),
					'style-4' => __( 'Style 4', 'wpfc-elementor' ),
					'style-5' => __( 'Style 5', 'wpfc-elementor' ),
					'style-6' => __( 'Style 6', 'wpfc-elementor' ),
					'style-7' => __( 'Style 7', 'wpfc-elementor' ),
				],
			]
		);
		
		$this->add_control(
			'no_posts',
			[
				'label'   => __( 'Number of Posts', 'wpfc-elementor' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
			]
		);
		
		$this->add_control(
			'sort',
			[
				'label'   => __( 'Sort', 'wpfc-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'ASC',
				'options' => [
					'ASC'  => __( 'Ascending', 'wpfc-elementor' ),
					'DESC' => __( 'Descending', 'wpfc-elementor' ),
				],
			]
		);

		$this->add_responsive_control(
			'no_columns',
			[
				'label'     => __( 'Columns', 'wpfc-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '33.3333',
				'options'   => [
					'100' => __( 'One Column', 'wpfc-elementor' ),
					'50'  => __( 'Two Columns', 'wpfc-elementor' ),
					'33.3333'  => __( 'Three Columns', 'wpfc-elementor' ),
					'25'  => __( 'Four Columns', 'wpfc-elementor' ),
				],
				'selectors' => [
					'{{WRAPPER}} .wpfc-block' => 'flex-basis: {{VALUE}}%; width: {{VALUE}}%; max-width: {{VALUE}}%',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_content_options',
			[
				'label' => __( 'Options', 'wpfc-elementor' ),
			]
		);

		$this->add_control(
			'show_date',
			[
				'label'        => __( 'Show Date', 'wpfc-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'separator'    => 'before',
				'default'      => 'yes',
				'label_on'     => __( 'Yes', 'wpfc-elementor' ),
				'label_off'    => __( 'No', 'wpfc-elementor' ),
				'return_value' => 'yes',
				'condition' => [
					'layout_style' => [
					    'style-1',
					    'style-2',
					    'style-3',
					    'style-4',
					    'style-5',
					    'style-6'
					],
				],
			]
		);

		$this->add_control(
			'show_preacher',
			[
				'label'        => __( 'Show Preacher', 'wpfc-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'yes',
				'label_on'     => __( 'Yes', 'wpfc-elementor' ),
				'label_off'    => __( 'No', 'wpfc-elementor' ),
				'return_value' => 'yes',
				'condition' => [
					'layout_style' => [
					    'style-1',
					    'style-2',
					    'style-3',
					    'style-4',
					    'style-5',
					    'style-6'
					],
				],
			]
		);

		$this->add_control(
			'show_series',
			[
				'label'        => __( 'Show Series', 'wpfc-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'yes',
				'label_on'     => __( 'Yes', 'wpfc-elementor' ),
				'label_off'    => __( 'No', 'wpfc-elementor' ),
				'return_value' => 'yes',
				'condition' => [
					'layout_style' => [
					    'style-1',
					    'style-2',
					    'style-3',
					    'style-4',
					    'style-5',
					    'style-6'
					],
				],
			]
		);

		$this->add_control(
			'show_image',
			[
				'label'        => __( 'Show Image', 'wpfc-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'separator'    => 'before',
				'default'      => 'yes',
				'label_on'     => __( 'Yes', 'wpfc-elementor' ),
				'label_off'    => __( 'No', 'wpfc-elementor' ),
				'return_value' => 'yes',
				'condition' => [
					'layout_style' => [
					    'style-1',
					    'style-2',
					    'style-3',
					    'style-4',
					    'style-5',
					    'style-6'
					],
				],
			]
		);

		$this->add_control(
			'img_height',
			[
				'label'              => __( 'Image Height', 'wpfc-elementor' ),
				'type'               => Controls_Manager::TEXT,
				'default'            => '280px',
				'condition'          => [
					'show_image'   => 'yes',
				],
				'selectors'          => [
					'{{WRAPPER}} .wpfc-entry-image'  => 'height: {{VALUE}}',
				],
				'condition' => [
					'layout_style' => [
					    'style-1',
					    'style-2',
					    'style-3',
					    'style-4',
					    'style-6'
					],
				],
			]
		);

		$this->add_control(
			'show_separator',
			[
				'label'        => __( 'Show Separator', 'wpfc-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'yes',
				'separator'    => 'before',
				'label_on'     => __( 'Yes', 'wpfc-elementor' ),
				'label_off'    => __( 'No', 'wpfc-elementor' ),
				'return_value' => 'yes',
				'condition' => [
					'layout_style' => [
						'style-1',
					    'style-2',
					    'style-4',
					    'style-5',
					    'style-6'
					],
				],
			]
		);

		$this->add_control(
			'separator',
			[
				'label'              => __( 'Separator', 'wpfc-elementor' ),
				'type'               => Controls_Manager::TEXT,
				'default'            => '|',
				'selectors'          => [
					'{{WRAPPER}} .wpfc-entry-meta > div:not(:last-child):after' => 'content: "{{VALUE}}"',
				],
				'condition'          => [
					'show_separator' => 'yes',
					'layout_style' => [
						'style-1',
					    'style-2',
					    'style-4',
					    'style-5',
					    'style-6'
					],
				],
			]
		);
		$this->add_control(
			'show_description',
			[
				'label'        => __( 'Show Description', 'wpfc-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'yes',
				'separator'    => 'before',
				'label_on'     => __( 'Yes', 'wpfc-elementor' ),
				'label_off'    => __( 'No', 'wpfc-elementor' ),
				'return_value' => 'yes',
				'condition' => [
					'layout_style' => [
					    'style-1',
					    'style-2',
					    'style-3',
					    'style-7'
					],
				],
			]
		);

		$this->add_control(
			'description_length',
			[
				'label'              => __( 'Description Length', 'wpfc-elementor' ),
				'type'               => Controls_Manager::TEXT,
				'default'            => '150',
				'condition'          => [
					'show_description' => 'yes',
				],
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_content_header',
			[
				'label' => __( 'Header', 'wpfc-elementor' ),
				'condition' => [
					'layout_style' => [
					    'style-1',
					    'style-2',
					    'style-3',
					    'style-4',
					    'style-5',
					    'style-6'
					],
				],
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'wpfc-elementor' ),
				'type'  => Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'header_size',
			[
				'label'   => __( 'HTML Tag', 'wpfc-elementor' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'h1'   => __( 'H1', 'wpfc-elementor' ),
					'h2'   => __( 'H2', 'wpfc-elementor' ),
					'h3'   => __( 'H3', 'wpfc-elementor' ),
					'h4'   => __( 'H4', 'wpfc-elementor' ),
					'h5'   => __( 'H5', 'wpfc-elementor' ),
					'h6'   => __( 'H6', 'wpfc-elementor' ),
					'div'  => __( 'div', 'wpfc-elementor' ),
					'span' => __( 'span', 'wpfc-elementor' ),
					'p'    => __( 'p', 'wpfc-elementor' ),
				],
				'default' => 'h2',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_sermon_layout',
			[
				'label' => __( 'Layout', 'wpfc-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_responsive_control(
			'card_margin',
			[
				'label'      => __( 'Card Margin', 'wpfc-elementor' ),
				'type'       => Controls_Manager::SLIDER,
				'separator'  => 'before',
				'default'    => [
					'size' => '12',
				],
				'size_units' => [ 'px', 'rem' ],
				'range'      => [
					'px'  => [
						'min' => 0,
						'max' => 50,
					],
					'rem' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .wpfc-block-content' => 'margin: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .wpfc-grid' => 'margin: -{{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'layout_style' => [
					    'style-1',
					    'style-2',
					    'style-3',
					    'style-4',
					    'style-5',
					    'style-6'
					],
				],
			]
		);
		
		$this->add_control(
			'card_bg',
			[
				'label'              => __( 'Card Background', 'wpfc-elementor' ),
				'type'               => Controls_Manager::COLOR,
				'default'            => '',
				'selectors'          => [
					'{{WRAPPER}} .wpfc-block-content' => 'background-color: {{VALUE}};',
				],
				'condition' => [
					'layout_style' => [
					    'style-1',
					    'style-2',
					    'style-3',
					    'style-4',
					    'style-5',
					    'style-6'
					],
				],
			]
		);
		
		$this->add_control(
			'card_height_5',
			[
				'label'              => __( 'Card Height', 'wpfc-elementor' ),
				'type'               => Controls_Manager::TEXT,
				'default'            => '200px',
				'selectors'          => [
					'{{WRAPPER}} .wpfc-block-content'  => 'height: {{VALUE}}',
				],
				'condition' => [
					'layout_style' => [
					    'style-5',
					],
				],
			]
		);
		
		$this->add_responsive_control(
			'inside_content_padding_1',
			[
				'label'      => __( 'Content Padding', 'elementor-pro' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'rem' ],
				'selectors'  => [
					'{{WRAPPER}} .wpfc-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'default'    => [
					'top'    => 32,
					'right'  => 24,
					'bottom' => 32,
					'left'   => 24,
				],
				'condition' => [
					'layout_style' => [
					    'style-1',
					    'style-2',
					    'style-3',
					],
				],
			]
		);
		
		$this->add_responsive_control(
			'inside_content_padding_5',
			[
				'label'      => __( 'Content Padding', 'elementor-pro' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'rem' ],
				'selectors'  => [
					'{{WRAPPER}} .wpfc-block-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'default'    => [
					'top'    => 0,
					'right'  => 0,
					'bottom' => 0,
					'left'   => 0,
				],
				'condition' => [
					'layout_style' => [
					    'style-5',
					],
				],
			]
		);
		
		$this->add_responsive_control(
			'inside_content_padding_6',
			[
				'label'      => __( 'Content Padding', 'elementor-pro' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'rem' ],
				'selectors'  => [
					'{{WRAPPER}} .wpfc-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'default'    => [
					'top'    => 32,
					'right'  => 24,
					'bottom' => 32,
					'left'   => 24,
				],
				'condition' => [
					'layout_style' => [
					    'style-6',
					],
				],
			]
		);
		
		$this->add_responsive_control(
			'inside_content_padding_7',
			[
				'label'      => __( 'Content Padding', 'elementor-pro' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'rem' ],
				'selectors'  => [
					'{{WRAPPER}} .wpfc-block-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'default'    => [
					'top'    => 0,
					'right'  => 0,
					'bottom' => 0,
					'left'   => 0,
				],
				'condition' => [
					'layout_style' => [
					    'style-7',
					],
				],
			]
		);
		
		$this->add_control(
			'link_color_7',
			[
				'label'     => __( 'Link Color', 'wpfc-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#fff',
				'selectors' => [
					'{{WRAPPER}} .wpfclink a' => 'color: {{VALUE}};',
				],
				'condition' => [
					'layout_style' => [
					    'style-7',
					],
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_sermon_borders_shadows',
			[
				'label' => __( 'Borders and Shadows', 'wpfc-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout_style' => [
					    'style-1',
					    'style-2',
					    'style-3',
					    'style-4',
					    'style-5',
					    'style-6'
					],
				],
			]
		);

		$this->add_control(
			'add_box_shadow',
			[
				'label'        => __( 'Box Shadow', 'wpfc-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'no',
				'label_on'     => __( 'Yes', 'wpfc-elementor' ),
				'label_off'    => __( 'No', 'wpfc-elementor' ),
				'return_value' => 'yes',
			]
		);

		$this->add_control(
			'box_shadow_type',
			[
				'label'     => _x( 'Box Shadow', 'Box Shadow Control', 'elementor' ),
				'type'      => Controls_Manager::BOX_SHADOW,
				'selectors' => [
					'{{WRAPPER}} .wpfc-block-content' => 'box-shadow: {{HORIZONTAL}}px {{VERTICAL}}px {{BLUR}}px {{SPREAD}}px {{COLOR}} {{box_shadow_position.VALUE}};',
				],
				'defaults'  => [
					'horizontal' => 0,
					'vertical'   => 2,
					'blur'       => 4,
					'spread'     => 0,
					'color'      => 'rgba(0,0,0,0.08)',
				],
				'condition' => [
					'add_box_shadow' => 'yes',
				],
				'separator' => 'after'
			]
		);

		$this->add_control(
			'add_box_border',
			[
				'label'        => __( 'Box Border', 'wpfc-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'yes',
				'label_on'     => __( 'Yes', 'wpfc-elementor' ),
				'label_off'    => __( 'No', 'wpfc-elementor' ),
				'return_value' => 'yes',
			]
		);

		$this->add_control(
			'box_border_type',
			[
				'label'     => _x( 'Border Type', 'Border Control', 'wpfc-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'none'   => _x( 'None', 'Border Control', 'wpfc-elementor' ),
					'solid'  => _x( 'Solid', 'Border Control', 'wpfc-elementor' ),
					'double' => _x( 'Double', 'Border Control', 'wpfc-elementor' ),
					'dotted' => _x( 'Dotted', 'Border Control', 'wpfc-elementor' ),
					'dashed' => _x( 'Dashed', 'Border Control', 'wpfc-elementor' ),
				],
				'selectors' => [
					'{{WRAPPER}} .wpfc-block-content' => 'border-style: {{VALUE}};',
				],
				'condition' => [
					'add_box_border' => 'yes',
				],
				'default'   => 'solid'
			]
		);

		$this->add_control(
			'box_border_width',
			[
				'label'     => _x( 'Border Width', 'Border Control', 'wpfc-elementor' ),
				'type'      => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .wpfc-block-content' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'add_box_border' => 'yes',
				],
				'default'   => [
					'top'    => 1,
					'right'  => 1,
					'bottom' => 1,
					'left'   => 1,
				],
			]
		);

		$this->add_control(
			'box_border_color',
			[
				'label'     => _x( 'Border Color', 'Border Control', 'wpfc-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ddd',
				'selectors' => [
					'{{WRAPPER}} .wpfc-block-content' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'add_box_border' => 'yes',
				],
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_sermon_title',
			[
				'label' => __( 'Title', 'wpfc-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'sermon_title_alignment',
			[
				'label'     => __( 'Title Alignment', 'wpfc-elementor' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'left'   => [
						'title' => __( 'Left', 'wpfc-elementor' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'wpfc-elementor' ),
						'icon'  => 'fa fa-align-center',
					],
					'right'  => [
						'title' => __( 'Right', 'wpfc-elementor' ),
						'icon'  => 'fa fa-align-right',
					],
				],
				'default'   => 'left',
				'selectors' => [
					'{{WRAPPER}} .wpfc-entry-title' => 'text-align: {{VALUE}};',
				],
				'condition' => [
					'layout_style' => [
					    'style-1',
					    'style-2',
					    'style-3',
					    'style-4',
					    'style-5',
					    'style-6'
					],
				],
			]
		);
		
		$this->add_responsive_control(
			'line_height_title',
			[
				'label'      => __( 'Title Line Height', 'wpfc-elementor' ),
				'type'       => Controls_Manager::SLIDER,
				'separator'  => 'before',
				'default'    => [
					'size' => 1.5,
					'unit' => 'rem',
				],
				'size_units' => [ 'px', 'rem' ],
				'range'      => [
					'px'  => [
						'min' => 0,
						'max' => 50,
					],
					'rem' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .wpfc-entry-title' => 'line-height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'font_size_title',
			[
				'label'      => __( 'Title Font Size', 'wpfc-elementor' ),
				'type'       => Controls_Manager::SLIDER,
				'separator'  => 'before',
				'default'    => [
					'size' => 1.5,
					'unit' => 'rem',
				],
				'size_units' => [ 'px', 'rem' ],
				'range'      => [
					'px'  => [
						'min' => 0,
						'max' => 50,
					],
					'rem' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .wpfc-entry-title' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'color_sermon_title',
			[
				'label'     => __( 'Sermon Title Color', 'wpfc-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .wpfc-entry-title-link' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'color_sermon_title_hover',
			[
				'label'     => __( 'Sermon Title Color Hover', 'wpfc-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .wpfc-entry-title-link:hover' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'sermon_title_padding',
			[
				'label'              => __( 'Sermon Title Padding', 'wpfc-elementor' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'selectors'          => [
					'{{WRAPPER}} .wpfc-entry-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'default'            => [
					'top'    => 0,
					'right'  => 0,
					'bottom' => 0,
					'left'   => 0,
				],
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_sermon_date',
			[
				'label'     => __( 'Date', 'wpfc-elementor' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout_style' => [
						'style-3'
					],
				],
			]
		);
		
		$this->add_control(
			'sermon_date_padding',
			[
				'label'              => __( 'Sermon Date Padding', 'wpfc-elementor' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'selectors'          => [
					'{{WRAPPER}} .wpfc-entry-date' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'default'            => [
					'top'    => 0,
					'right'  => 0,
					'bottom' => 12,
					'left'   => 0,
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_sermon_meta',
			[
				'label' => __( 'Meta', 'wpfc-elementor' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout_style' => [
					    'style-1',
					    'style-2',
					    'style-3',
					    'style-4',
					    'style-5',
					    'style-6'
					],
				],
			]
		);

		$this->add_control(
			'color_sermon_meta',
			[
				'label'     => __( 'Sermon Meta Color', 'wpfc-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .wpfc-entry-meta a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .wpfc-entry-meta > div:after' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_control(
			'color_sermon_meta_hover',
			[
				'label'     => __( 'Sermon Meta Color Hover', 'wpfc-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .wpfc-entry-meta a:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'sermon_meta_alignment',
			[
				'label'     => __( 'Meta Alignment', 'wpfc-elementor' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'left'   => [
						'title' => __( 'Left', 'wpfc-elementor' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'wpfc-elementor' ),
						'icon'  => 'fa fa-align-center',
					],
					'right'  => [
						'title' => __( 'Right', 'wpfc-elementor' ),
						'icon'  => 'fa fa-align-right',
					],
				],
				'default'   => 'left',
				'selectors' => [
					'{{WRAPPER}} .wpfc-entry-meta' => 'text-align: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'meta_padding_1',
			[
				'label'              => __( 'Meta Padding', 'wpfc-elementor' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px', 'rem' ],
				'selectors'          => [
					'{{WRAPPER}} .wpfc-entry-meta' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'default'            => [
					'top'    => 12,
					'right' => 0,
					'bottom' => 0,
					'left' => 0,
				],
				'condition' => [
					'layout_style' => [
					    'style-1',
					    'style-2',
					    'style-5',
					    'style-6'
					],
				],
			]
		);
		
		$this->add_responsive_control(
			'meta_padding_3',
			[
				'label'              => __( 'Meta Padding', 'wpfc-elementor' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px', 'rem' ],
				'selectors'          => [
					'{{WRAPPER}} .wpfc-entry-meta' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'default'            => [
					'top'    => 24,
					'right' => 0,
					'bottom' => 24,
					'left' => 0,
				],
				'condition' => [
					'layout_style' => [
					    'style-3',
					],
				],
			]
		);
		
		$this->add_responsive_control(
			'meta_padding_4',
			[
				'label'              => __( 'Meta Padding', 'wpfc-elementor' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'size_units'         => [ 'px', 'rem' ],
				'selectors'          => [
					'{{WRAPPER}} .wpfc-entry-meta' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'default'            => [
					'top'    => 14,
					'right' => 0,
					'bottom' => 0,
					'left' => 0,
				],
				'condition' => [
					'layout_style' => [
					    'style-4',
					],
				],
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_sermon_image',
			[
				'label'     => __( 'Image', 'wpfc-elementor' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'add_overlay',
			[
				'label'        => __( 'Add Overlay', 'wpfc-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'no',
				'label_on'     => __( 'Yes', 'wpfc-elementor' ),
				'label_off'    => __( 'No', 'wpfc-elementor' ),
				'return_value' => 'yes',
			]
		);
		
		$this->add_control(
			'overlay_bg',
			[
				'label'              => __( 'Overlay Background', 'wpfc-elementor' ),
				'type'               => Controls_Manager::COLOR,
				'default'            => 'rgba(0,0,0,0.25)',
				'selectors'          => [
					'{{WRAPPER}} .wpfc-entry-image-overlay' => 'background-color: {{VALUE}};',
				],
				'condition'          => [
					'add_overlay'   => 'yes',
					'layout_style' => [
					    'style-1',
					    'style-2',
					    'style-3',
					    'style-4',
					    'style-5',
					    'style-6'
					],
				],
			]
		);
		
		$this->add_control(
			'overlay_color',
			[
				'label'              => __( 'Icon Color', 'wpfc-elementor' ),
				'type'               => Controls_Manager::COLOR,
				'separator'          => 'after',
				'default'            => '#cecece',
				'selectors'          => [
					'{{WRAPPER}} .wpfc-entry-image-overlay' => 'color: {{VALUE}}',
				],
				'condition'          => [
					'add_overlay'   => 'yes',
					'layout_style' => [
					    'style-1',
					    'style-2',
					    'style-3',
					    'style-4',
					    'style-5',
					    'style-6'
					],
				],
			]
		);
		
		$this->add_control(
			'overlay_icon',
			[
				'label'   => __( 'Overlay Icon', 'wpfc-elementor' ),
				'type'    => Controls_Manager::ICON,
				'default' => 'fa fa-play',
				'condition' => [
					'add_overlay'  => 'yes',
					'layout_style' => [
					    'style-1',
					    'style-2',
					    'style-3',
					    'style-4',
					    'style-5',
					    'style-6'
					],
				],
			]
		);
		
		$this->add_responsive_control(
			'overlay_icon_size',
			[
				'label'      => __( 'Overlay Icon Size', 'wpfc-elementor' ),
				'type'       => Controls_Manager::SLIDER,
				'separator'  => 'before',
				'default'    => [
					'size' => 1.5,
					'unit' => 'rem',
				],
				'size_units' => [ 'px', 'rem' ],
				'range'      => [
					'px'  => [
						'min' => 0,
						'max' => 50,
					],
					'rem' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .wpfc-entry-image-overlay' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition'          => [
					'add_overlay'   => 'yes',
					'layout_style' => [
					    'style-1',
					    'style-2',
					    'style-3',
					    'style-4',
					    'style-5',
					    'style-6'
					],
				],
			]
		);
		
		$this->add_responsive_control(
			'img_wrapper_width',
			[
				'label'      => __( 'Image Width', 'wpfc-elementor' ),
				'type'       => Controls_Manager::SLIDER,
				'default'    => [
					'size' => 30,
					'unit' => '%',
				],
				'size_units' => [ '%', 'px' ],
				'range'      => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .wpfc-entry-image-wrapper ' => 'max-width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'layout_style' => [
					    'style-5',
					],
				],
			]
		);
		
		$this->add_control(
			'img_background_size',
			[
				'label'     => _x( 'Image Size', 'Background Size', 'wpfc-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'contain' => _x( 'Contain', 'Background Size', 'wpfc-elementor' ),
					'cover'   => _x( 'Cover', 'Background Size', 'wpfc-elementor' ),
				],
				'selectors' => [
					'{{WRAPPER}} .wpfc-entry-image'   => 'background-size: {{VALUE}};',

				],
				'default'   => 'cover',
				'condition'          => [
					'layout_style' => [
					    'style-1',
					    'style-2',
					    'style-3',
					    'style-4',
					    'style-5',
					    'style-6'
					],
				],
			]
		);

		$this->add_control(
			'img_background_position',
			[
				'label'     => _x( 'Image Position', 'Background Position', 'wpfc-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'center'        => _x( 'Center', 'Background Position', 'wpfc-elementor' ),
					'left top'      => _x( 'Left Top', 'Background Position', 'wpfc-elementor' ),
					'left center'   => _x( 'Left Center', 'Background Position', 'wpfc-elementor' ),
					'left bottom'   => _x( 'Left Bottom', 'Background Position', 'wpfc-elementor' ),
					'right top'     => _x( 'Right Top', 'Background Position', 'wpfc-elementor' ),
					'right center'  => _x( 'Right Center', 'Background Position', 'wpfc-elementor' ),
					'right bottom'  => _x( 'Right Bottom', 'Background Position', 'wpfc-elementor' ),
					'center top'    => _x( 'Center Top', 'Background Position', 'wpfc-elementor' ),
					'center bottom' => _x( 'Center Bottom', 'Background Position', 'wpfc-elementor' ),
				],
				'selectors' => [
					'{{WRAPPER}} .wpfc-entry-image' => 'background-position: {{VALUE}};',

				],
				'default'   => 'center',
				'condition'          => [
					'layout_style' => [
					    'style-1',
					    'style-2',
					    'style-3',
					    'style-4',
					    'style-5',
					    'style-6'
					],
				],
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_sermon_content',
			[
				'label'     => __( 'Content', 'wpfc-elementor' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout_style' => [
						'style-5'
					],
				],
			]
		);
		
		$this->add_responsive_control(
			'content_padding',
			[
				'label'      => __( 'Copntent Padding', 'wpfc-elementor' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'separator'  => 'before',
				'size_units'         => [ 'px', 'rem' ],
				'selectors'          => [
					'{{WRAPPER}} .wpfc-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'default'            => [
					'top'    => 24,
					'right'  => 24,
					'bottom' => 24,
					'left'   => 24,
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_sermon_description',
			[
				'label'     => __( 'Description', 'wpfc-elementor' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'sermon_description_alignment',
			[
				'label'     => __( 'Description Alignment', 'wpfc-elementor' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'left'   => [
						'title' => __( 'Left', 'wpfc-elementor' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'wpfc-elementor' ),
						'icon'  => 'fa fa-align-center',
					],
					'right'  => [
						'title' => __( 'Right', 'wpfc-elementor' ),
						'icon'  => 'fa fa-align-right',
					],
				],
				'default'   => 'left',
				'selectors' => [
					'{{WRAPPER}} .wpfc-entry-description' => 'text-align: {{VALUE}};',
				],
				'condition' => [
					'layout_style' => [
					    'style-1',
					    'style-2',
					    'style-3',
					    'style-4',
					    'style-5',
					    'style-6'
					],
				],
			]
		);
		
		$this->add_control(
			'color_sermon_description',
			[
				'label'     => __( 'Sermon Description Color', 'wpfc-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => [
					'{{WRAPPER}} .wpfc-entry-description' => 'color: {{VALUE}};',
				],
			]
		);
		
		$this->add_responsive_control(
			'description_padding_1',
			[
				'label'      => __( 'Description Padding', 'wpfc-elementor' ),
				'type'               => Controls_Manager::DIMENSIONS,
				'separator'  => 'before',
				'size_units'         => [ 'px', 'rem' ],
				'selectors'          => [
					'{{WRAPPER}} .wpfc-entry-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'default'            => [
					'top'    => 24,
					'right'  => 0,
					'bottom' => 0,
					'left'   => 0,
				],
				'condition' => [
					'layout_style' => [
					    'style-1',
					    'style-2',
					    'style-3'
					],
				],
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_sermon_download',
			[
				'label'     => __( 'Download', 'wpfc-elementor' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'add_download_icon',
			[
				'label'        => __( 'Add Download Icon', 'wpfc-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'yes',
				'label_on'     => __( 'Yes', 'wpfc-elementor' ),
				'label_off'    => __( 'No', 'wpfc-elementor' ),
				'return_value' => 'yes',
				'condition' => [
					'layout_style' => ['style-1', 'style-3', 'style-6', 'style-7',],
				],
			]
		);
		
		$this->add_control(
			'download_icon',
			[
				'label'   => __( 'Download Icon', 'wpfc-elementor' ),
				'type'    => Controls_Manager::ICON,
				'default' => 'fa fa-arrow-down',
				'condition' => [
					'add_download_icon' => 'yes',
					'layout_style' => ['style-1', 'style-3', 'style-6', 'style-7',],
				],
			]
		);
		
		$this->add_control(
			'download_icon_background_1',
			[
				'label'     => __( 'Download Icon Background', 'wpfc-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .wpfc-download-button' => 'background: {{VALUE}};',
				],
				'condition' => [
					'add_download_icon' => 'yes',
					'layout_style' => ['style-1', 'style-3'],
				],
			]
		);
		
		$this->add_control(
			'download_icon_color_1',
			[
				'label'     => __( 'Download Icon Color', 'wpfc-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#222222',
				'selectors' => [
					'{{WRAPPER}} .wpfc-download-button' => 'color: {{VALUE}};',
				],
				'condition' => [
					'add_download_icon' => 'yes',
					'layout_style' => ['style-1', 'style-3'],
				],
			]
		);
		
		$this->add_control(
			'download_icon_background_6',
			[
				'label'     => __( 'Download Icon Background', 'wpfc-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#50d1e6',
				'selectors' => [
					'{{WRAPPER}} .wpfc-download-button' => 'background: {{VALUE}};',
				],
				'condition' => [
					'add_download_icon' => 'yes',
					'layout_style' => ['style-6']
				],
			]
		);
		
		$this->add_control(
			'download_icon_color_6',
			[
				'label'     => __( 'Download Icon Color', 'wpfc-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .wpfc-download-button' => 'color: {{VALUE}};',
				],
				'condition' => [
					'add_download_icon' => 'yes',
					'layout_style' => ['style-6']
				],
			]
		);
		
		$this->add_control(
			'download_icon_background_hover_6',
			[
				'label'     => __( 'Download Icon Background Hover', 'wpfc-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#034752',
				'selectors' => [
					'{{WRAPPER}} .wpfc-download-button:hover' => 'background: {{VALUE}};',
				],
				'condition' => [
					'add_download_icon' => 'yes',
					'layout_style' => ['style-6']
				],
			]
		);
		
		$this->add_control(
			'download_icon_color_hover_6',
			[
				'label'     => __( 'Download Icon Color Hover', 'wpfc-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .wpfc-download-button:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'add_download_icon' => 'yes',
					'layout_style' => ['style-6']
				],
			]
		);
		
		$this->add_control(
			'download_icon_color_7',
			[
				'label'     => __( 'Download Icon Color', 'wpfc-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .wpfc-download-button' => 'color: {{VALUE}};',
				],
				'condition' => [
					'add_download_icon' => 'yes',
					'layout_style' => ['style-7']
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_style_sermon_audio',
			[
				'label'     => __( 'Audio', 'wpfc-elementor' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'add_audio',
			[
				'label'        => __( 'Show/Hide Audio', 'wpfc-elementor' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'yes',
				'label_on'     => __( 'Show', 'wpfc-elementor' ),
				'label_off'    => __( 'Hide', 'wpfc-elementor' ),
				'return_value' => 'yes',
				'condition' => [
					'layout_style' => ['style-4', 'style-5', 'style-6', 'style-7']
				]
			]
		);
		
		$this->add_control(
			'play_button_color_4_5',
			[
				'label'     => __( 'Play Icon Color', 'wpfc-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#181818',
				'selectors' => [
					'{{WRAPPER}} .wpfc-play-button-wrapper button' => 'color: {{VALUE}};',
				],
				'condition' => [
					'add_audio' => 'yes',
					'layout_style' => [
					    'style-4',
					    'style-5',
					],
				],
			]
		);
		
		$this->add_responsive_control(
			'font_size_play_button_4_5',
			[
				'label'      => __( 'Play Icon Font Size', 'wpfc-elementor' ),
				'type'       => Controls_Manager::SLIDER,
				'separator'  => 'before',
				'default'    => [
					'size' => 1.5,
					'unit' => 'rem',
				],
				'size_units' => [ 'px', 'rem' ],
				'range'      => [
					'px'  => [
						'min' => 0,
						'max' => 50,
					],
					'rem' => [
						'min' => 0,
						'max' => 50,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .wpfc-play-button-wrapper button' => 'font-size: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'add_audio' => 'yes',
					'layout_style' => [
					    'style-4',
					    'style-5'
					],
				],
			]
		);
		
		$this->add_control(
			'play_button_background_6',
			[
				'label'     => __( 'Play Icon Background', 'wpfc-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#50d1e6',
				'selectors' => [
					'{{WRAPPER}} .wpfc-play-button-wrapper button' => 'background: {{VALUE}};',
				],
				'condition' => [
					'add_audio' => 'yes',
					'layout_style' => [
					    'style-6'
					],
				],
			]
		);
		
		$this->add_control(
			'play_button_color_6',
			[
				'label'     => __( 'Play Icon Color', 'wpfc-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .wpfc-play-button-wrapper button' => 'color: {{VALUE}};',
				],
				'condition' => [
					'add_audio' => 'yes',
					'layout_style' => [
					    'style-6',
					],
				],
			]
		);
		
		$this->add_control(
			'play_button_background_hover_6',
			[
				'label'     => __( 'Play Icon Background Hover', 'wpfc-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#034752',
				'selectors' => [
					'{{WRAPPER}} .wpfc-play-button-wrapper button:hover' => 'background: {{VALUE}};',
				],
				'condition' => [
					'add_audio' => 'yes',
					'layout_style' => [
					    'style-6'
					],
				],
			]
		);
		
		$this->add_control(
			'play_button_color_hover_6',
			[
				'label'     => __( 'Play Icon Color Hover', 'wpfc-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .wpfc-play-button-wrapper button:hover' => 'color: {{VALUE}};',
				],
				'condition' => [
					'add_audio' => 'yes',
					'layout_style' => [
					    'style-6',
					],
				],
			]
		);
		
		$this->add_control(
			'play_button_color_7',
			[
				'label'     => __( 'Play Icon Color', 'wpfc-elementor' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .wpfc-play-button-wrapper button' => 'color: {{VALUE}};',
				],
				'condition' => [
					'add_audio' => 'yes',
					'layout_style' => [
					    'style-7',
					],
				],
			]
		);

		$this->end_controls_section();
		
	}
	
	protected function render() {
		$settings = $this->get_settings();
		$html = '';
		
		$sermons_args = array(
		    'post_type'           => 'wpfc_sermon',
		    'post_status'         => 'publish',
		    'posts_per_page'      => $settings['no_posts'],
		    'ignore_sticky_posts' => 1,
		    'orderby'             => 'meta_value',
		    'order'               => $settings['sort'],
		    'meta_key'            => 'sermon_date'
		);
		$sermons = new \WP_Query($sermons_args);
		
		if ($sermons->have_posts()) {
			$html .= '<div class="wpfc-elementor-sermons wpfc-'. $settings['layout_style'] .'">';
			
		        if ($settings['title']) {
			        $html .= '<'. $settings['header_size'] .' class="wpfc-elementor-sermon-title">'. $settings['title'] .'</'. $settings['header_size'] .'>';
		        }
		        
			    $html .= '<div class="wpfc-grid">';
			        while ($sermons->have_posts()) : $sermons->the_post();
			            $html .= '<div class="wpfc-block wpfc-equal-height">';
			                $html .= '<div class="wpfc-block-content">';
			                    if ($settings['layout_style'] == 'style-1') {
			                    	$html .= $this->style1();
			                    } else if ($settings['layout_style'] == 'style-2') {
			                    	$html .= $this->style2();
			                    } else if ($settings['layout_style'] == 'style-3') {
			                    	$html .= $this->style3();
			                    } else if ($settings['layout_style'] == 'style-4') {
			                    	$html .= $this->style4();
			                    } else if ($settings['layout_style'] == 'style-5') {
			                    	$html .= $this->style5();
			                    } else if ($settings['layout_style'] == 'style-6') {
			                    	$html .= $this->style6();
			                    } else if ($settings['layout_style'] == 'style-7') {
			                    	$html .= $this->style7();
			                    }
			                $html .= '</div>';
			            $html .= '</div>';
			        endwhile;
			    $html .= '</div>';
			$html .= '</div>';
		}
		wp_reset_postdata();
		
		echo $html;
	}
	
	protected function style1() {
		$html = $this->entry_image();
		$html .= '<div class="wpfc-wrapper">';
		    $html .= $this->download_button();
		    $html .= $this->entry_title();
		    $html .= $this->entry_meta();
		    $html .= $this->entry_description();
		$html .= '</div>';
		
		return $html;
	}
	
	protected function style2() {
		$settings = $this->get_settings();
		
		$html = $this->entry_image();
		$html .= $this->entry_date();
		$html .= '<div class="wpfc-wrapper">';
		    $html .= $this->entry_title();
		    if ($settings['show_preacher'] == 'yes' || $settings['show_series'] == 'yes') {
		    	$html .= '<div class="wpfc-entry-meta">';
		    	    $html .= $this->entry_preacher();
		    	    $html .= $this->entry_series();
		    	$html .= '</div>';
		    }
		    $html .= $this->entry_description();
		$html .= '</div>';
		
		return $html;
	}
	
	protected function style3() {
		$settings = $this->get_settings();
		
		$html = $this->entry_image();
		$html .= '<div class="wpfc-wrapper">';
		    $html .= $this->download_button();
		    $html .= $this->entry_date();
		    $html .= $this->entry_title();
		    if ($settings['show_preacher'] == 'yes' || $settings['show_series'] == 'yes') {
		    	$html .= '<div class="wpfc-entry-meta">';
		    	    $html .= $this->entry_preacher();
		    	    $html .= $this->entry_series();
		    	$html .= '</div>';
		    }
		    $html .= $this->entry_description();
		$html .= '</div>';
		
		return $html;
	}
	
	protected function style4() {
		$html = '<div class="wpfc-wrapper">';
		    $html .= $this->play_button();
		    $html .= '<div class="wpfc-content">';
		        $html .= $this->entry_title();
		        $html .= $this->entry_meta();
		    $html .= '</div>';
		$html .= '</div>';
		
		return $html;
	}
	
	protected function style5() {
		$html = $this->entry_image();
		$html .= '<div class="wpfc-wrapper">';
		    $html .= $this->entry_title();
		    $html .= $this->entry_meta();
		$html .= '</div>';
		$html .= $this->play_button();
		
		return $html;
	}
	
	protected function style6() {
		$settings = $this->get_settings();
		
		$html = '<div class="wpfc-wrapper">';
		    $html .= '<div class="wpfc-content">';
		        $html .= $this->entry_title();
		        $html .= $this->entry_meta();
		    $html .= '</div>';
		    
		    $html .= '<div class="wpfc-actions">';
		        $html .= $this->play_button();
		        $html .= $this->download_button();
		    $html .= '</div>';
		$html .= '</div>';
		
		return $html;
	}
	
	protected function style7() {
	    global $post;
		$settings = $this->get_settings();
		
		$html = '<div class="wpfc-wrapper">';
		    $html .= $this->entry_title();
		    $html .= $this->entry_description();
		    
		    $html .= '<div class="wpfc-link">';
		        $html .= '<a href=" '. get_post_permalink( $post->ID ) .' ">More from our latest sermon</a>';
		    $html .= '</div>';
		    
		    $html .= '<div class="wpfc-actions">';
		        $html .= $this->download_button();
		        $html .= $this->play_button();
		    $html .= '</div>';
		$html .= '</div>';
		
		return $html;
	}
	
	protected function entry_image() {
		global $post;
		$settings = $this->get_settings();
		
		if (get_sermon_image_url() && $settings['show_image'] === 'yes') {
		    $html = '<div class="wpfc-entry-image-wrapper">';
		        $html .= '<a class="wpfc-entry-image-link" href=" '. get_post_permalink( $post->ID ) .' ">';
		            $html .= '<div class="wpfc-entry-image" style="background-image: url(' . get_sermon_image_url() . ')"></div>';
		            
		            if ($settings['add_overlay'] == 'yes') {
		            	$html .= '<div class="wpfc-entry-image-overlay">';
		            	    $html .= '<i class="'. $settings['overlay_icon'] .'"></i>';
		            	$html .= '</div>';
		            }
		        $html .= '</a>';
		    $html .= '</div>';
		    
		    return $html;
		}
	}
	
	protected function entry_title() {
		global $post;
		$settings = $this->get_settings();
		
		if ($post->post_title) {
		    $html = '<h3 class="wpfc-entry-title">';
		        $html .= '<a class="wpfc-entry-title-link" href=" '. get_post_permalink( $post->ID ) .' ">';
		            $html .= '<span>'. $post->post_title .'</span>';
		        $html .= '</a>';
		    $html .= '</h3>';
		
		    return $html;
		}
	}
	
	protected function entry_description() {
		global $post;
		$settings = $this->get_settings();
		$truncate = $settings['description_length'];
		$entry_description = strip_tags( get_post_meta( $post->ID, 'sermon_description', true ) );
		$description = $truncate ? substr($entry_description, 0, $truncate) : $entry_description;
		
		if ($entry_description && $settings['show_description'] === 'yes') {
		    $html = '<div class="wpfc-entry-description">'. $description .'</div>';
		    return $html;
		}
	}
	
	protected function entry_date() {
		global $post;
		$settings = $this->get_settings();
		
		if ($settings['show_date'] === 'yes') {
		    $html = '<div class="wpfc-entry-date">';
		        $html .= '<a class="wpfc-entry-date-link" href=" '. get_post_permalink( $post->ID ) .' ">';
		            $html .= sm_get_the_date();
		        $html .= '</a>';
		    $html .= '</div>';
		    return $html;
		}
	}
	
	protected function entry_preacher() {
		global $post;
		$settings = $this->get_settings();
		$entry_preacher = get_the_terms( $post->ID, 'wpfc_preacher' );
		
		if ($entry_preacher && $settings['show_preacher'] === 'yes') {
		    $html = '<div class="wpfc-entry-preacher">';
		        foreach ($entry_preacher as $term) {
		    	    $html .= '<a class="wpfc-entry-preacher-link" href="'. get_term_link( $term ) .'">'. $term->name .'</a>';
		        }
		    $html .= '</div>';
		
		   return $html;
		}
	}
	
	protected function entry_series() {
		global $post;
		$settings = $this->get_settings();
		$entry_series = get_the_terms( $post->ID, 'wpfc_sermon_series' );
		
		if ($entry_series && $settings['show_series'] === 'yes') {
		    $html = '<div class="wpfc-entry-series">';
		        foreach ($entry_series as $term) {
		    	    $html .= '<a class="wpfc-entry-series-link" href="'. get_term_link( $term ) .'">'. $term->name .'</a>';
		        }
		    $html .= '</div>';
		
		    return $html;
		}
	}
	
	protected function entry_meta() {
		global $post;
		$settings = $this->get_settings();
		
		if ($settings['show_date'] == 'yes' || $settings['show_preacher'] == 'yes' || $settings['show_series'] == 'yes') {
			$html = '<div class="wpfc-entry-meta">';
			    $html .= $this->entry_date();
			    $html .= $this->entry_preacher();
			    $html .= $this->entry_series();
			$html .= '</div>';
			
			return $html;
		}
	}
	
	protected function download_button() {
		$settings = $this->get_settings();
		global $post;
		
		if ($settings['add_download_icon'] == 'yes' && get_wpfc_sermon_meta( 'sermon_audio' )) {
			$html = '<div class="wpfc-download-button">';
			    $html .= '<a href="' . get_wpfc_sermon_meta( 'sermon_audio' ) . '" class="wpfc-download-link" download>';
			        $html .= '<i class="'. $settings['download_icon'] .'"></i>';
			    $html .= '</a>';
			$html .= '</div>';
			
			return $html;
		}
	}
	
	protected function play_button() {
		$settings = $this->get_settings();
		global $post;
		$entry_audio = wpfc_get_sermon_audio( $post->ID );
		
		if ($settings['add_audio'] == 'yes' && $entry_audio) {
			$html = '<div class="wpfc-play-button-wrapper">';
			    $html .= '<audio controls preload="none">';
			        $html .= '<source src="' . wpfc_get_sermon_audio( $post->ID ) . '">';
			    $html .= '</audio>';
			$html .= '</div>';
			
			return $html;
		}
	}
}