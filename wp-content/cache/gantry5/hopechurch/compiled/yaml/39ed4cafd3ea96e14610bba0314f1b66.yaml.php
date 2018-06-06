<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/blueprints/content/sermon-archive/entry-title.yaml',
    'modified' => 1527866652,
    'data' => [
        'name' => 'Post Title',
        'description' => 'Options for displaying title',
        'type' => 'sermon-archive',
        'extends@' => [
            0 => [
                'type' => 'archive/entry-title'
            ]
        ],
        'form' => [
            'fields' => [
                'link' => [
                    'type' => 'input.checkbox',
                    'label' => 'Link Title',
                    'description' => 'Link titles to the posts.',
                    'default' => 1
                ],
                'tag' => [
                    'type' => 'select.select',
                    'label' => 'Tag',
                    'default' => 'h3',
                    'options' => [
                        'h1' => 'H1',
                        'h2' => 'H2',
                        'h3' => 'H3',
                        'h4' => 'H4',
                        'h5' => 'H5'
                    ]
                ]
            ]
        ]
    ]
];
