<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/blueprints/content/archive/grid.yaml',
    'modified' => 1527866652,
    'data' => [
        'name' => 'Grid',
        'description' => NULL,
        'type' => 'archive',
        'form' => [
            'fields' => [
                'columns' => [
                    'type' => 'input.number',
                    'label' => 'Columns',
                    'default' => 1
                ],
                'tablet.columns' => [
                    'type' => 'select.select',
                    'label' => 'Tablet Columns',
                    'default' => 'tablet-default',
                    'options' => [
                        'tablet-default' => 'Default',
                        'tablet-100' => 'One Column',
                        'tablet-50' => 'Two Columns',
                        'tablet-33-3' => 'Three Columns',
                        'tablet-25' => 'Four Columns'
                    ]
                ],
                'phone.columns' => [
                    'type' => 'select.select',
                    'label' => 'Phone Columns',
                    'default' => 'phone-default',
                    'options' => [
                        'phone-default' => 'Default',
                        'phone-50' => 'Two Columns'
                    ]
                ]
            ]
        ]
    ]
];
