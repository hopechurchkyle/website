<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/blueprints/content/blog/meta-date.yaml',
    'modified' => 1527866652,
    'data' => [
        'name' => 'Date Meta',
        'description' => 'Options for displaying date meta',
        'type' => 'blog',
        'extends@' => [
            0 => [
                'type' => 'archive/meta-date'
            ]
        ],
        'form' => [
            'fields' => [
                'prefix' => [
                    'type' => 'input.text',
                    'label' => 'Prefix',
                    'default' => 'On'
                ]
            ]
        ]
    ]
];
