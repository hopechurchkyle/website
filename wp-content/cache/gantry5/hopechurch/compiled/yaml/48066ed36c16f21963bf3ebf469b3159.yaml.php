<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/blueprints/styles/navigation.yaml',
    'modified' => 1527866652,
    'data' => [
        'name' => 'Navigation Colors',
        'description' => 'Navigation Colors',
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
                ],
                'mobile-color' => [
                    'type' => 'input.colorpicker',
                    'label' => 'Mobile Text Color',
                    'default' => '#181818'
                ],
                'mobile-background' => [
                    'type' => 'input.colorpicker',
                    'label' => 'Mobile Background Color',
                    'default' => '#ffffff'
                ]
            ]
        ]
    ]
];
