<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/particles/wpfc-headroom.yaml',
    'modified' => 1527866652,
    'data' => [
        'name' => 'Headroom',
        'description' => 'Headroom JS',
        'type' => 'atom',
        'icon' => 'fa-css3',
        'form' => [
            'fields' => [
                'enabled' => [
                    'type' => 'input.checkbox',
                    'label' => 'Enabled',
                    'description' => 'Globally enable CSS/JS particles.',
                    'default' => true
                ],
                'selector' => [
                    'type' => 'input.selectize',
                    'label' => 'Selector',
                    'default' => '#g-navigation'
                ],
                'wrapper' => [
                    'type' => 'input.selectize',
                    'label' => 'Wrapper',
                    'default' => '#g-wrapper-navigation'
                ],
                'offset' => [
                    'type' => 'input.number',
                    'label' => 'Offset',
                    'default' => 300
                ]
            ]
        ]
    ]
];
