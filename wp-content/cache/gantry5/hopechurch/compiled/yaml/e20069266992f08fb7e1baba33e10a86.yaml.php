<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/blueprints/content/sermon-archive/grid.yaml',
    'modified' => 1527866652,
    'data' => [
        'name' => 'Grid',
        'description' => NULL,
        'type' => 'sermon-archive',
        'extends@' => [
            0 => [
                'type' => 'archive/grid'
            ]
        ],
        'form' => [
            'fields' => [
                'posts' => [
                    'type' => 'input.number',
                    'label' => 'Number of Posts',
                    'default' => 9,
                    'min' => 1
                ],
                'columns' => [
                    'type' => 'input.number',
                    'label' => 'Columns',
                    'default' => 3,
                    'min' => 1
                ]
            ]
        ]
    ]
];
