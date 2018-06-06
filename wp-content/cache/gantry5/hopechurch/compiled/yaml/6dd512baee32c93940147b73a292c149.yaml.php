<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/blueprints/styles/copyright.yaml',
    'modified' => 1527866652,
    'data' => [
        'name' => 'Copyright Colors',
        'description' => 'Copyright Colors',
        'type' => 'section',
        'extends@' => 'above',
        'form' => [
            'fields' => [
                'color' => [
                    'type' => 'input.colorpicker',
                    'label' => 'Text Color',
                    'default' => '#afafaf'
                ],
                'background' => [
                    'type' => 'input.colorpicker',
                    'label' => 'Background Color',
                    'default' => '#263238'
                ]
            ]
        ]
    ]
];
