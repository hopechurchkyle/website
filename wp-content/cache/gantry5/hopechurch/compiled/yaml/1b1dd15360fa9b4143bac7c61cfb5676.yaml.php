<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/blueprints/content/blog/meta-categories.yaml',
    'modified' => 1527866652,
    'data' => [
        'name' => 'Categories Meta',
        'description' => 'Options for displaying categories meta',
        'type' => 'blog',
        'extends@' => [
            0 => [
                'type' => 'archive/meta-categories'
            ]
        ],
        'form' => [
            'fields' => [
                'enabled' => [
                    'type' => 'input.checkbox',
                    'label' => 'Display Categories',
                    'description' => 'Display categories that the post has been assigned to.',
                    'default' => 1
                ],
                'icon' => [
                    'type' => 'input.icon',
                    'label' => 'Icon',
                    'default' => 'fa fa-folder-open-o'
                ]
            ]
        ]
    ]
];
