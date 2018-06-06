<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/blueprints/content/archive/readmore.yaml',
    'modified' => 1527866652,
    'data' => [
        'name' => 'Read More',
        'description' => 'Options for displaying Read More button',
        'type' => 'archive',
        'form' => [
            'fields' => [
                'mode' => [
                    'type' => 'select.select',
                    'label' => 'Display Mode',
                    'description' => 'When set to Auto - theme detects <!--more--> tag inside of the post content.',
                    'default' => 'auto',
                    'options' => [
                        'auto' => 'Auto',
                        'always' => 'Always',
                        'never' => 'Never'
                    ]
                ],
                'label' => [
                    'type' => 'input.text',
                    'label' => 'Button Label',
                    'description' => 'Default Read More button label.',
                    'default' => 'Read More'
                ],
                'class' => [
                    'type' => 'input.selectize',
                    'label' => 'Button Class',
                    'default' => 'button small'
                ]
            ]
        ]
    ]
];
