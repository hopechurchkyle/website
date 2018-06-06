<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/blueprints/content/sermon-archive/meta-date.yaml',
    'modified' => 1527866652,
    'data' => [
        'name' => 'Date',
        'description' => NULL,
        'type' => 'sermon-archive',
        'form' => [
            'fields' => [
                'enabled' => [
                    'type' => 'input.checkbox',
                    'label' => 'Display',
                    'description' => NULL,
                    'default' => 1
                ],
                'icon' => [
                    'type' => 'input.icon',
                    'label' => 'Icon'
                ],
                'prefix' => [
                    'type' => 'input.text',
                    'label' => 'Prefix'
                ],
                'link' => [
                    'type' => 'input.checkbox',
                    'label' => 'Link',
                    'description' => NULL,
                    'default' => 1
                ]
            ]
        ]
    ]
];