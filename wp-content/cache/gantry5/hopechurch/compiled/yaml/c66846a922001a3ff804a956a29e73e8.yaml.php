<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/blueprints/styles/expanded.yaml',
    'modified' => 1527866652,
    'data' => [
        'name' => 'Expanded Colors',
        'description' => 'Expanded Colors',
        'type' => 'section',
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
                    'default' => '#ffffff'
                ]
            ]
        ]
    ]
];