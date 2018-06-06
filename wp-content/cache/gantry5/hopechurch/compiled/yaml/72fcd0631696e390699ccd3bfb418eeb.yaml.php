<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/blueprints/content/single/meta-tags.yaml',
    'modified' => 1527866652,
    'data' => [
        'name' => 'Tags Meta',
        'description' => 'Options for displaying tags meta',
        'type' => 'single',
        'form' => [
            'fields' => [
                'enabled' => [
                    'type' => 'input.checkbox',
                    'label' => 'Display Tags',
                    'description' => 'Display post tags.',
                    'default' => 1
                ],
                'icon' => [
                    'type' => 'input.icon',
                    'label' => 'Icon',
                    'default' => ''
                ],
                'prefix' => [
                    'type' => 'input.text',
                    'label' => 'Prefix'
                ],
                'link' => [
                    'type' => 'input.checkbox',
                    'label' => 'Link Tags',
                    'description' => 'Link tags to their tag page.',
                    'default' => 1
                ]
            ]
        ]
    ]
];
