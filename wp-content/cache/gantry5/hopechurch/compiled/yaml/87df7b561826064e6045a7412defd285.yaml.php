<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/blueprints/styles/headroom.yaml',
    'modified' => 1527866652,
    'data' => [
        'name' => 'Headroom Styles',
        'description' => 'Headroom JS',
        'type' => 'core',
        'form' => [
            'fields' => [
                'scroll-background' => [
                    'type' => 'input.colorpicker',
                    'label' => 'Scroll Background',
                    'default' => ''
                ],
                'scroll-color' => [
                    'type' => 'input.colorpicker',
                    'label' => 'Scroll Color',
                    'default' => ''
                ],
                'position' => [
                    'type' => 'select.select',
                    'label' => 'Position',
                    'default' => 'default',
                    'options' => [
                        'default' => 'Default',
                        'overlay' => 'Overlay',
                        'fixed' => 'Fixed',
                        'sticky' => 'Sticky',
                        'overlay-sticky' => 'Overlay Sticky'
                    ]
                ]
            ]
        ]
    ]
];
