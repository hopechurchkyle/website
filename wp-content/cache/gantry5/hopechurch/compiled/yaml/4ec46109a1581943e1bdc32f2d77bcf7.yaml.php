<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/blueprints/content/single/entry-nav.yaml',
    'modified' => 1527866652,
    'data' => [
        'name' => 'Post Navigation',
        'description' => 'Options for displaying post navigation links',
        'type' => 'single',
        'form' => [
            'fields' => [
                'enabled' => [
                    'type' => 'input.checkbox',
                    'label' => 'Post Navigation',
                    'description' => 'Display post nav links.',
                    'default' => 1
                ],
                'icon' => [
                    'type' => 'input.checkbox',
                    'label' => 'Icon',
                    'default' => 1
                ],
                'image.enabled' => [
                    'type' => 'input.checkbox',
                    'label' => 'Image',
                    'default' => 1
                ],
                'image.width' => [
                    'type' => 'input.text',
                    'label' => 'Image Width',
                    'default' => '100'
                ],
                'image.height' => [
                    'type' => 'input.text',
                    'label' => 'Image Height',
                    'default' => '120'
                ],
                'prev.prefix' => [
                    'type' => 'input.text',
                    'label' => 'Previous Article Prefix',
                    'description' => NULL,
                    'default' => 'Previous Article'
                ],
                'next.prefix' => [
                    'type' => 'input.text',
                    'label' => 'Next Article Prefix',
                    'description' => NULL,
                    'default' => 'Next Article'
                ]
            ]
        ]
    ]
];
