<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/hopechurch/gantry/theme.yaml',
    'modified' => 1527876576,
    'data' => [
        'details' => [
            'name' => 'HopeChurch',
            'version' => '1.0.0',
            'icon' => 'fa-css3',
            'date' => 'May 16, 2018',
            'author' => [
                'name' => 'David Mathis',
                'email' => 'david@hopechurchkyle.org',
                'link' => 'https://hopechurchkyle.org'
            ],
            'documentation' => [
                'link' => 'https://wpforchurch.com/my/knowledgebase.php'
            ],
            'support' => [
                'link' => 'https://wpforchurch.com/my/knowledgebase.php'
            ],
            'updates' => [
                'link' => NULL
            ],
            'copyright' => '(C) 2018 Hope Church',
            'license' => 'GPLv2',
            'description' => 'Hope Church Custom Theme',
            'images' => [
                'thumbnail' => NULL,
                'preview' => NULL
            ]
        ],
        'configuration' => [
            'gantry' => [
                'platform' => 'wordpress',
                'engine' => 'nucleus'
            ],
            'theme' => [
                'parent' => 'wpfc-multiply',
                'base' => 'gantry-theme://common',
                'file' => 'gantry-theme://includes/theme.php',
                'class' => '\\Gantry\\Framework\\Theme',
                'textdomain' => 'wpfc-multiply'
            ],
            'css' => [
                'compiler' => '\\Gantry\\Component\\Stylesheet\\ScssCompiler',
                'target' => 'gantry-theme://css-compiled',
                'paths' => [
                    0 => 'gantry-theme://scss',
                    1 => 'gantry-engine://scss'
                ],
                'files' => [
                    0 => 'multiply',
                    1 => 'multiply-wordpress',
                    2 => 'custom'
                ],
                'persistent' => [
                    0 => 'multiply'
                ],
                'overrides' => [
                    0 => 'multiply-wordpress',
                    1 => 'custom'
                ]
            ],
            'dependencies' => [
                'gantry' => '5.3.*'
            ],
            'block-variations' => [
                'Alignment' => [
                    'center' => 'Center',
                    'center-mobile' => 'Center Mobile',
                    'align-right' => 'Align Right',
                    'align-left' => 'Align Left',
                    'align-self' => 'Align Vertically'
                ],
                'Spacing' => [
                    'nomarginall' => 'No Margin',
                    'nopaddingall' => 'No Padding',
                    'nopaddingtop' => 'No Padding Top',
                    'nopaddingbottom' => 'No Padding Bottom',
                    'nomargintop' => 'No Margin Top',
                    'nomarginbottom' => 'No Margin Bottom',
                    'nopaddingleft' => 'No Padding Left',
                    'nopaddingright' => 'No Padding Right',
                    'nomarginleft' => 'No Margin Left',
                    'nomarginright' => 'No Margin Right'
                ],
                'Utility' => [
                    'equal-height' => 'Equal Height',
                    'disabled' => 'Disabled'
                ]
            ]
        ],
        'chrome' => [
            'gantry' => [
                'before_widget' => '<div id="%1$s" class="widget %2$s chrome-gantry">',
                'after_widget' => '</div>',
                'before_title' => '<h4 class="widget-title wpfc-widget-title"><span>',
                'after_title' => '</span></h4>'
            ]
        ]
    ]
];