<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/particles/wpfc-assets/common/blueprints/forms/grid.yaml',
    'modified' => 1527866652,
    'data' => [
        'type' => 'hidden',
        'form' => [
            'fields' => [
                'grid.columns' => [
                    'type' => 'input.number',
                    'label' => 'Number of Columns',
                    'default' => 2,
                    'min' => 1,
                    'max' => 6
                ],
                'grid.tablet.columns' => [
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
                'grid.phone.columns' => [
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
