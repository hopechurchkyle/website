<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/blueprints/content/sermon-single/entry-video.yaml',
    'modified' => 1527866652,
    'data' => [
        'name' => 'Entry Video',
        'description' => NULL,
        'type' => 'sermon-single',
        'form' => [
            'fields' => [
                'embed' => [
                    'type' => 'input.checkbox',
                    'label' => 'Embed',
                    'description' => NULL,
                    'default' => 1
                ],
                'link' => [
                    'type' => 'input.checkbox',
                    'label' => 'Link',
                    'description' => NULL,
                    'default' => 1
                ]
            ]
        ]
    ]
];
