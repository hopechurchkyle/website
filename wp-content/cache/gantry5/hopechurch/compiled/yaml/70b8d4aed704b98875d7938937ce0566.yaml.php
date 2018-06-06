<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/blueprints/content/blog/meta-author.yaml',
    'modified' => 1527866652,
    'data' => [
        'name' => 'Author Meta',
        'description' => 'Options for displaying author meta',
        'type' => 'blog',
        'extends@' => [
            0 => [
                'type' => 'archive/meta-author'
            ]
        ],
        'form' => [
            'fields' => [
                'prefix' => [
                    'type' => 'input.text',
                    'label' => 'Prefix',
                    'default' => 'By'
                ]
            ]
        ]
    ]
];
