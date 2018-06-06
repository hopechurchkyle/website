<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/blueprints/content/sermon-archive/meta-avatar.yaml',
    'modified' => 1527866652,
    'data' => [
        'name' => 'Avatar',
        'description' => NULL,
        'type' => 'sermon-archive',
        'form' => [
            'fields' => [
                'enabled' => [
                    'type' => 'input.checkbox',
                    'label' => 'Display Author',
                    'description' => NULL,
                    'default' => 1
                ],
                'link' => [
                    'type' => 'input.checkbox',
                    'label' => 'Link Author',
                    'description' => NULL,
                    'default' => 1
                ]
            ]
        ]
    ]
];
