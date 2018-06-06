<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/blueprints/content/page/entry-title.yaml',
    'modified' => 1527866652,
    'data' => [
        'name' => 'Post Title',
        'description' => 'Options for displaying title',
        'type' => 'page',
        'extends@' => [
            0 => [
                'type' => 'archive/entry-title'
            ]
        ],
        'form' => [
            'fields' => [
                'enabled' => [
                    'type' => 'input.checkbox',
                    'label' => 'Display Title',
                    'description' => 'Display post title.',
                    'default' => 0
                ],
                'link' => [
                    'unset@' => true
                ]
            ]
        ]
    ]
];
