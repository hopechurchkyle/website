<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/particles/wpfc-list.yaml',
    'modified' => 1527866652,
    'data' => [
        'name' => 'List',
        'type' => 'particle',
        'icon' => 'fa-list',
        'form' => [
            'fields' => [
                'enabled' => [
                    'type' => 'input.checkbox',
                    'label' => 'Enabled',
                    'default' => true
                ],
                'class' => [
                    'type' => 'input.selectize',
                    'label' => 'Class'
                ],
                'header.image' => [
                    'type' => 'input.imagepicker',
                    'label' => 'Image'
                ],
                'header.title.text' => [
                    'type' => 'input.text',
                    'label' => 'Title'
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
                ],
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
                ],
                'items' => [
                    'type' => 'collection.list',
                    'label' => 'Items',
                    'array' => true,
                    'ajax' => true,
                    'value' => 'name',
                    'fields' => [
                        '.icon.icon' => [
                            'type' => 'input.icon',
                            'label' => 'Icon'
                        ],
                        '.title.text' => [
                            'type' => 'input.text',
                            'label' => 'Title'
                        ],
                        '.link' => [
                            'type' => 'input.text',
                            'label' => 'Link'
                        ],
                        '.target' => [
                            'type' => 'select.select',
                            'label' => 'Target',
                            'default' => '_self',
                            'options' => [
                                '_self' => 'Self',
                                '_blank' => 'New Window'
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ]
];
