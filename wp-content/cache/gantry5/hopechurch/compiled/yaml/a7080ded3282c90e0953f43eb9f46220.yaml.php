<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/blueprints/content/page/entry-author.yaml',
    'modified' => 1527866652,
    'data' => [
        'name' => 'Entry Author',
        'description' => 'Options for displaying author box',
        'type' => 'page',
        'extends@' => [
            0 => [
                'type' => 'single/entry-author'
            ]
        ],
        'form' => [
            'fields' => [
                'enabled' => [
                    'type' => 'input.checkbox',
                    'label' => 'Author Box',
                    'description' => 'Display author box.',
                    'default' => 0
                ]
            ]
        ]
    ]
];
