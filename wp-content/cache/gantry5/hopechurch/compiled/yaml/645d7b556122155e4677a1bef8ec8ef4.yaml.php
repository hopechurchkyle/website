<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/blueprints/content/sermon-archive/featured-image.yaml',
    'modified' => 1527866652,
    'data' => [
        'name' => 'Featured Image',
        'description' => 'Options for displaying featured image',
        'type' => 'sermon-archive',
        'extends@' => [
            0 => [
                'type' => 'archive/featured-image'
            ]
        ],
        'form' => [
            'fields' => [
                'link' => [
                    'type' => 'input.checkbox',
                    'label' => 'Link',
                    'default' => 1
                ]
            ]
        ]
    ]
];
