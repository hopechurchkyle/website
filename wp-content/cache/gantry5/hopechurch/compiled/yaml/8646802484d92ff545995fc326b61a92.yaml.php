<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/blueprints/content/single/comments.yaml',
    'modified' => 1527866652,
    'data' => [
        'name' => 'Comments',
        'description' => NULL,
        'type' => 'single',
        'form' => [
            'fields' => [
                'headline.text' => [
                    'type' => 'input.text',
                    'label' => 'Headline',
                    'default' => 'Comments:'
                ],
                'button' => [
                    'type' => 'input.selectize',
                    'label' => 'Button Class',
                    'default' => 'button'
                ]
            ]
        ]
    ]
];
