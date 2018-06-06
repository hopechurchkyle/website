<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/particles/wpfc-page-hero.yaml',
    'modified' => 1527866652,
    'data' => [
        'name' => 'Page Hero',
        'type' => 'particle',
        'icon' => 'fa-wordpress',
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
                '_tabs' => [
                    'type' => 'container.tabs',
                    'fields' => [
                        '_tab_settings' => [
                            'label' => 'Settings',
                            'fields' => [
                                'settings.type' => [
                                    'type' => 'select.select',
                                    'label' => 'Content Type',
                                    'default' => 'page',
                                    'options' => [
                                        'page' => 'Page Content',
                                        'custom' => 'Custom Content'
                                    ]
                                ],
                                'settings.content_width' => [
                                    'type' => 'input.text',
                                    'label' => 'Content Width'
                                ],
                                'settings.height' => [
                                    'type' => 'input.text',
                                    'label' => 'Height',
                                    'default' => '500px'
                                ],
                                'settings.padding' => [
                                    'type' => 'input.text',
                                    'label' => 'Padding'
                                ],
                                'settings.background' => [
                                    'type' => 'input.colorpicker',
                                    'label' => 'Background',
                                    'default' => '#181818'
                                ],
                                'settings.color' => [
                                    'type' => 'input.colorpicker',
                                    'label' => 'Color',
                                    'default' => '#ffffff'
                                ],
                                'settings.align_items' => [
                                    'type' => 'select.select',
                                    'label' => 'Vertical Align',
                                    'default' => 'center',
                                    'options' => [
                                        'flex-start' => 'Top',
                                        'center' => 'Center',
                                        'flex-end' => 'Bottom'
                                    ]
                                ],
                                'settings.text_align' => [
                                    'type' => 'select.select',
                                    'label' => 'Text Align',
                                    'default' => 'left',
                                    'options' => [
                                        'left' => 'Left',
                                        'center' => 'Center',
                                        'right' => 'Right'
                                    ]
                                ]
                            ]
                        ],
                        '_tab_image' => [
                            'label' => 'Image',
                            'fields' => [
                                'image.enabled' => [
                                    'type' => 'select.select',
                                    'label' => 'Show Image',
                                    'default' => 'show',
                                    'options' => [
                                        'show' => 'Show',
                                        '' => 'Hide'
                                    ]
                                ],
                                'image.select' => [
                                    'type' => 'input.imagepicker',
                                    'label' => 'Custom Image'
                                ],
                                'image.background.size' => [
                                    'type' => 'select.select',
                                    'label' => 'Background Size',
                                    'default' => 'cover',
                                    'options' => [
                                        'auto' => 'Auto',
                                        'cover' => 'Cover',
                                        'contain' => 'Contain'
                                    ]
                                ],
                                'image.background.repeat' => [
                                    'type' => 'select.select',
                                    'label' => 'Background Repeat',
                                    'default' => 'no-repeat',
                                    'options' => [
                                        'no-repeat' => 'No Repeat',
                                        'repeat' => 'Repeat',
                                        'repeat-x' => 'Repeat X',
                                        'repeat-y' => 'Repeat Y'
                                    ]
                                ],
                                'image.background.position' => [
                                    'type' => 'select.select',
                                    'label' => 'Background Position',
                                    'default' => 'left top',
                                    'options' => [
                                        'left top' => 'Left Top',
                                        'left center' => 'Left Center',
                                        'left bottom' => 'Left Bottom',
                                        'right top' => 'Right Top',
                                        'right center' => 'Right Center',
                                        'right bottom' => 'Right Bottom',
                                        'center top' => 'Center Top',
                                        'center' => 'Center',
                                        'center bottom' => 'Center Bottom'
                                    ]
                                ],
                                'image.overlay.enabled' => [
                                    'type' => 'select.select',
                                    'label' => 'Background Overlay',
                                    'default' => 'show',
                                    'options' => [
                                        'show' => 'Show',
                                        '' => 'Hide'
                                    ]
                                ]
                            ]
                        ],
                        '_tab_content' => [
                            'label' => 'Content',
                            'fields' => [
                                'content.title' => [
                                    'type' => 'textarea.textarea',
                                    'label' => 'Title'
                                ],
                                'content.description' => [
                                    'type' => 'textarea.textarea',
                                    'label' => 'Description'
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ]
];
