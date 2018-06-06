<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/blueprints/styles/width.yaml',
    'modified' => 1527866652,
    'data' => [
        'name' => 'Width',
        'description' => NULL,
        'type' => 'configuration',
        'form' => [
            'fields' => [
                'large-desktop-container' => [
                    'type' => 'input.text',
                    'label' => 'Large Desktop',
                    'description' => NULL,
                    'default' => '100%'
                ],
                'desktop-container' => [
                    'type' => 'input.text',
                    'label' => 'Desktop',
                    'description' => NULL,
                    'default' => '100%'
                ],
                'tablet-container' => [
                    'type' => 'input.text',
                    'label' => 'Tablet',
                    'description' => NULL,
                    'default' => '100%'
                ],
                'large-mobile-container' => [
                    'type' => 'input.text',
                    'label' => 'Large Mobile',
                    'description' => NULL,
                    'default' => '100%'
                ],
                'mobile-container' => [
                    'type' => 'input.text',
                    'label' => 'Mobile',
                    'description' => NULL,
                    'default' => '100%'
                ]
            ]
        ]
    ]
];
