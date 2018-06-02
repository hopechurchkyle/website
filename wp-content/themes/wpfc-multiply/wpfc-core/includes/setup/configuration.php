<?php

$GLOBALS['qs_config'] = apply_filters( 'wpfc_qs_config', array(
	// plugins that will be shown on the third step; prefix external plugins with `wpfc--`
	'plugins'           => array(
		'sermon-manager-for-wordpress',
		'gantry5',
		'the-events-calendar',
		'breadcrumb-navxt',
		'gantry5-outline-picker',
		'wpfc--bloom',
		'wpfc--monarch',
		'wpfc--js_composer',
		'wpfc--wpforms',
		'wpfc--wp-rocket',
		'wpfc--nextend-smart-slider3-pro',
		'wpfc--user-role-editor-pro',
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

