<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/particles/wpfc-assets/common/blueprints/forms/particle-header.yaml',
    'modified' => 1527866652,
    'data' => [
        'type' => 'hidden',
        'form' => [
            'fields' => [
                'header.image' => [
                    'type' => 'input.imagepicker',
                    'label' => 'Image'
                ],
                'header.title.text' => [
                    'type' => 'input.text',
                    'label' => 'Title Text'
                ],
                'header.title.tag' => [
                    'type' => 'select.select',
                    'label' => 'Title Tag',
                    'default' => 'h4',
                    'options' => [
                        'h1' => 'H1',
                        'h2' => 'H2',
                        'h3' => 'H3',
                        'h4' => 'H4',
                        'h5' => 'H5'
                    ]
                ],
                'header.description.text' => [
                    'type' => 'textarea.textarea',
                    'label' => 'Description'
                ]
            ]
        ]
    ]
];
