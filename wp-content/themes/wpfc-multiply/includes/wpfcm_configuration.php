<?php

$GLOBALS['qs_config'] = apply_filters( 'wpfc_qs_config', array(
	// plugins that will be shown on the third step; prefix external plugins with `wpfc--`
	'plugins'           => array(
		'gantry5',
		'elementor',
		'sermon-manager-for-wordpress',
		'breadcrumb-navxt',
		'the-events-calendar',
		'wpfc--wpforms',
		'wpfc--nextend-smart-slider3-pro',
		'wpfc--wpfc-elementor',
		'wpfc--user-role-editor-pro',
		'wpfc--bloom',
		'wpfc--monarch',
	),
	// required plugins for data import
	'required-plugins'  => array(
		array(
			'name'   => 'WPForms',
			'active' => is_plugin_active( 'wpforms/wpforms.php' )
		)
	),
	// the URL to the theme documentation
	'documentation-url' => 'https://wpforchurch.com/my/index.php?rp=/knowledgebase/16/Multiply-Theme',
) );
