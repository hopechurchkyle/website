<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/blueprints/content/single/featured-image.yaml',
    'modified' => 1527866652,
    'data' => [
        'name' => 'Featured Image',
        'description' => 'Options for displaying featured image',
        'type' => 'single',
        'extends@' => [
            0 => [
                'type' => 'archive/featured-image'
            ]
        ],
        'form' => [
            'fields' => [
                'enabled' => [
                    'type' => 'input.checkbox',
                    'label' => 'Enabled',
                    'description' => 'Display featured image on archive type page.',
                    'default' => 0
                ],
                'link' => [
                    'unser@' => true
                ]
            ]
        ]
    ]
];
