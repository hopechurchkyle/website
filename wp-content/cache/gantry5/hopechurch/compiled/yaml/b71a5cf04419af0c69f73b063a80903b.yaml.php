<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/blueprints/content/page/entry-nav.yaml',
    'modified' => 1527866652,
    'data' => [
        'name' => 'Post Navigation',
        'description' => 'Options for displaying post navigation links',
        'type' => 'page',
        'extends@' => [
            0 => [
                'type' => 'single/entry-nav'
            ]
        ],
        'form' => [
            'fields' => [
                'enabled' => [
                    'type' => 'input.checkbox',
                    'label' => 'Post Navigation',
                    'description' => 'Display post nav links.',
                    'default' => 0
                ],
                'prev.prefix' => [
                    'type' => 'input.text',
                    'label' => 'Previous Article Prefix',
                    'description' => NULL,
                    'default' => 'Previous Page'
                ],
                'next.prefix' => [
                    'type' => 'input.text',
                    'label' => 'Next Article Prefix',
                    'description' => NULL,
                    'default' => 'Next Page'
                ]
            ]
        ]
    ]
];
