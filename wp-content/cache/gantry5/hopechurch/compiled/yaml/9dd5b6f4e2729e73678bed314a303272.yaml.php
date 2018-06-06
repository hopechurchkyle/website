<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/particles/wpfc-sermon-hero.yaml',
    'modified' => 1527866652,
    'data' => [
        'name' => 'Sermon Hero',
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
                                'settings.style' => [
                                    'type' => 'select.select',
                                    'label' => 'Style',
                                    'default' => 'content',
                                    'options' => [
                                        'content' => 'Style 1'
                                    ]
                                ],
                                'settings.height' => [
                                    'type' => 'input.text',
                                    'label' => 'Height',
                                    'default' => '500px'
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
                                    'label' => 'Image Overlay',
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
                                'title.enabled' => [
                                    'type' => 'select.select',
                                    'label' => 'Show Title',
                                    'default' => 'link',
                                    'options' => [
                                        'show' => 'Show',
                                        'link' => 'Show With Link',
                                        '' => 'Hide'
                                    ]
                                ],
                                'title.tag' => [
                                    'type' => 'select.select',
                                    'label' => 'Title Tag',
                                    'default' => 'h1',
                                    'options' => [
                                        'h1' => 'H1',
                                        'h2' => 'H2',
                                        'h3' => 'H3',
                                        'h4' => 'H4',
                                        'h5' => 'H5'
                                    ]
                                ],
                                'title.limit' => [
                                    'type' => 'input.number',
                                    'label' => 'Title Limit',
                                    'min' => 0
                                ],
                                'content.enabled' => [
                                    'type' => 'select.select',
                                    'label' => 'Show Content',
                                    'default' => '',
                                    'options' => [
                                        'content' => 'Content',
                                        'excerpt' => 'Excerpt',
                                        '' => 'Hide'
                                    ]
                                ],
                                'content.limit' => [
                                    'type' => 'input.number',
                                    'label' => 'Content Limit',
                                    'min' => 0
                                ]
                            ]
                        ],
                        '_tab_meta' => [
                            'label' => 'Meta',
                            'fields' => [
                                'meta.preacher.enabled' => [
                                    'type' => 'select.select',
                                    'label' => 'Show Preacher Name',
                                    'default' => 'link',
                                    'options' => [
                                        'show' => 'Show',
                                        'link' => 'Show With Link',
                                        '' => 'Hide'
                                    ]
                                ],
                                'meta.date.enabled' => [
                                    'type' => 'select.select',
                                    'label' => 'Show Date',
                                    'default' => 'link',
                                    'options' => [
                                        'show' => 'Show',
                                        'link' => 'Show With Link',
                                        '' => 'Hide'
                                    ]
                                ],
                                'meta.series.enabled' => [
                                    'type' => 'select.select',
                                    'label' => 'Show Series',
                                    'default' => 'link',
                                    'options' => [
                                        'show' => 'Show',
                                        'link' => 'Show With Link',
                                        '' => 'Hide'
                                    ]
                                ],
                                'meta.book.enabled' => [
                                    'type' => 'select.select',
                                    'label' => 'Show Book',
                                    'default' => 'link',
                                    'options' => [
                                        'show' => 'Show',
                                        'link' => 'Show With Link',
                                        '' => 'Hide'
                                    ]
                                ],
                                'meta.service.enabled' => [
                                    'type' => 'select.select',
                                    'label' => 'Show Service',
                                    'default' => 'link',
                                    'options' => [
                                        'show' => 'Show',
                                        'link' => 'Show With Link',
                                        '' => 'Hide'
                                    ]
                                ],
                                'meta.topics.enabled' => [
                                    'type' => 'select.select',
                                    'label' => 'Show Topics',
                                    'default' => 'link',
                                    'options' => [
                                        'show' => 'Show',
                                        'link' => 'Show With Link',
                                        '' => 'Hide'
                                    ]
                                ],
                                'meta.passage.enabled' => [
                                    'type' => 'select.select',
                                    'label' => 'Show Passage',
                                    'default' => 'link',
                                    'options' => [
                                        'show' => 'Show',
                                        'link' => 'Show With Link',
                                        '' => 'Hide'
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ]
];
