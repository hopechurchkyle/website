<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/blueprints/styles/body.yaml',
    'modified' => 1527866652,
    'data' => [
        'name' => 'Body Colors',
        'description' => 'Body Colors',
        'type' => 'core',
        'extends@' => 'above',
        'form' => [
            'fields' => [
                'color' => [
                    'type' => 'input.colorpicker',
                    'label' => 'Text Color',
                    'default' => '#181818'
                ],
                'background' => [
                    'type' => 'input.colorpicker',
                    'label' => 'Background Color',
                    'default' => '#f5f5f5'
                ],
                'background-attachment' => [
                    'default' => 'fixed'
                ]
            ]
        ]
    ]
];
