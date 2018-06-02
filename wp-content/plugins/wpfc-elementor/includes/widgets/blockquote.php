<?php

namespace WPFCElementor\Widgets;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Elementor Blockquote
 *
 * Elementor widget for Blockquotes.
 *
 * @since 1.0.0
 */
 
class Blockquote extends Widget_Base {
    
	public function get_name() {
		return 'wpfc-blockquote';
	}

	public function get_title() {
		return __( 'WPFC Blockquote', 'wpfc-elementor' );
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
	    
		// Begin Layout Section - Content Tab
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'wpfc-elementor' ),
			]
		);
		
		    $this->add_control(
		        'title',
		        [
		            'label' => __('Title', 'wpfc-elementor'),
		            'type' => Controls_Manager::TEXT,
		        ]
		    );
		    
		    $this->add_control(
		        'content',
		        [
		            'label' => __('Content', 'wpfc-elementor'),
		            'type' => Controls_Manager::TEXTAREA,
		        ]
		    );
		    
		    $this->add_control(
		        'source',
		        [
		            'label' => __('Source', 'wpfc-elementor'),
		            'type' => Controls_Manager::TEXT,
		        ]
		    );

		$this->end_controls_section();
		// End Layout Section - Content Tab

	}
	
	protected function render() {
	    $settings = $this->get_settings();
	    
	    $html = '<div class="wpfc-element-blockquote wpfc-style1">';
	        $html .= $this->style1();
	    $html .= '</div>';
	    
	    echo $html;
	}
	
	protected function style1() {
	    $settings = $this->get_settings();
	    
	    $html = '<div class="wpfc-container">';
	        if ($settings['title']) {
	            $html .= '<div class="wpfc-title">'. $settings['title'] .'</div>';
	        }
	        
	        if ($settings['content']) {
	            $html .= '<div class="wpfc-content">'. $settings['content'] .'</div>';
	        }
	        
	        if ($settings['source']) {
	            $html .= '<div class="wpfc-source">'. $settings['source'] .'</div>';
	        }
	    $html .= '</div>';
	    
	    return $html;
	}

}