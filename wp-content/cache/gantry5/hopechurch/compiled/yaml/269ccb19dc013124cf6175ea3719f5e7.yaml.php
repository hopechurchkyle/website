<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/blueprints/content/sermon-archive/entry-content.yaml',
    'modified' => 1527866652,
    'data' => [
        'name' => 'Entry Content',
        'type' => 'sermon-archive',
        'form' => [
            'fields' => [
                'enabled' => [
                    'type' => 'input.checkbox',
                    'label' => 'Enabled',
                    'default' => 1
                ],
                'limit' => [
                    'type' => 'input.text',
                    'label' => 'Limit'
                ]
            ]
        ]
    ]
];
