<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/blueprints/content/archive/page-header.yaml',
    'modified' => 1527866652,
    'data' => [
        'name' => 'Page Header',
        'description' => 'Options for displaying Page Header',
        'type' => 'archive',
        'form' => [
            'fields' => [
                'enabled' => [
                    'type' => 'input.checkbox',
                    'label' => 'Enabled',
                    'description' => 'Display custom heading text at the top of the page.',
                    'default' => 0
                ],
                'title.enabled' => [
                    'type' => 'input.checkbox',
                    'label' => 'Title Enabled',
                    'default' => 1
                ],
                'title.text' => [
                    'type' => 'input.text',
                    'label' => 'Title Text',
                    'description' => 'Text to be used as a custom title.'
                ],
                'description.enabled' => [
                    'type' => 'input.checkbox',
                    'label' => 'Description Enabled',
                    'default' => 1
                ],
                'description.text' => [
                    'type' => 'textarea.textarea',
                    'label' => 'Description Text',
                    'description' => 'Text to be used as description.'
                ]
            ]
        ]
    ]
];
