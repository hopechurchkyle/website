<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/blueprints/content/archive/meta-author.yaml',
    'modified' => 1527866652,
    'data' => [
        'name' => 'Author Meta',
        'description' => 'Options for displaying author meta',
        'type' => 'archive',
        'form' => [
            'fields' => [
                'enabled' => [
                    'type' => 'input.checkbox',
                    'label' => 'Display Author',
                    'description' => 'Display author.',
                    'default' => 1
                ],
                'icon' => [
                    'type' => 'input.icon',
                    'label' => 'Icon',
                    'default' => ''
                ],
                'prefix' => [
                    'type' => 'input.text',
                    'label' => 'Prefix',
                    'default' => 'By'
                ],
                'link' => [
                    'type' => 'input.checkbox',
                    'label' => 'Link Author',
                    'description' => 'Link author to his archives.',
                    'default' => 1
                ]
            ]
        ]
    ]
];
