<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/blueprints/content/sermon-archive/general.yaml',
    'modified' => 1527866652,
    'data' => [
        'name' => 'General',
        'description' => NULL,
        'type' => 'sermon-archive',
        'form' => [
            'fields' => [
                'content' => [
                    'type' => 'select.select',
                    'label' => 'Style',
                    'default' => 'content',
                    'options' => [
                        'content' => 'Grid',
                        'content2' => 'List'
                    ]
                ]
            ]
        ]
    ]
];
