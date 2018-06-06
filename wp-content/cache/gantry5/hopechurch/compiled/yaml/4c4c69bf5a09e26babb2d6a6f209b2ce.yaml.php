<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/blueprints/content/page/meta-date.yaml',
    'modified' => 1527866652,
    'data' => [
        'name' => 'Date Meta',
        'description' => 'Options for displaying date meta',
        'type' => 'page',
        'extends@' => [
            0 => [
                'type' => 'archive/meta-date'
            ]
        ],
        'form' => [
            'fields' => [
                'enabled' => [
                    'type' => 'input.checkbox',
                    'label' => 'Display Date',
                    'description' => 'Display post publish date.',
                    'default' => 0
                ]
            ]
        ]
    ]
];
