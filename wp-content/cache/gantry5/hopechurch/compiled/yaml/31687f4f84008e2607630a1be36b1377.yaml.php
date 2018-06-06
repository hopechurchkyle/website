<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/blueprints/content/blog/entry-title.yaml',
    'modified' => 1527866652,
    'data' => [
        'name' => 'Post Title',
        'description' => 'Options for displaying title',
        'type' => 'blog',
        'extends@' => [
            0 => [
                'type' => 'archive/entry-title'
            ]
        ],
        'form' => [
            'fields' => [
                'link' => [
                    'type' => 'input.checkbox',
                    'label' => 'Link Title',
                    'description' => 'Link titles to the posts.',
                    'default' => 1
                ]
            ]
        ]
    ]
];
