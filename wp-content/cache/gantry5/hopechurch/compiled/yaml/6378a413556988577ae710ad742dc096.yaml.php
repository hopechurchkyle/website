<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/themes/wpfc-multiply/wpfc-core/particles/wpfc-content-grid.yaml',
    'modified' => 1527866652,
    'data' => [
        'name' => 'Content Grid',
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
                        '_tab_header' => [
                            'label' => 'Header',
                            'fields' => [
                                '.header.title.text' => [
                                    'type' => 'input.text',
                                    'label' => 'Title'
                                ],
                                '.header.title.tag' => [
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
                                '.header.description.text' => [
                                    'type' => 'textarea.textarea',
                                    'label' => 'Description'
                                ]
                            ]
                        ],
                        '_tab_settings' => [
                            'label' => 'Settings',
                            'fields' => [
                                'settings.style' => [
                                    'type' => 'select.select',
                                    'label' => 'Style',
                                    'default' => 'content',
                                    'options' => [
                                        'content' => 'Style 1',
                                        'content2' => 'Style 2'
                                    ]
                                ]
                            ]
                        ],
                        '_tab_query' => [
                            'label' => 'Query',
                            'fields' => [
                                'query.posts' => [
                                    'type' => 'input.number',
                                    'label' => 'Number of Posts',
                                    'default' => 3,
                                    'min' => 1
                                ],
                                'query.categories' => [
                                    'type' => 'wordpress.categories',
                                    'label' => 'Categories'
                                ],
                                'query.tags' => [
                                    'type' => 'wordpress.categories',
                                    'label' => 'Tags',
                                    'taxonomy' => 'post_tag'
                                ],
                                'query.sticky' => [
                                    'type' => 'select.select',
                                    'label' => 'Sticky Posts',
                                    'default' => 'Show',
                                    'options' => [
                                        'show' => 'Show',
                                        '' => 'Hide'
                                    ]
                                ],
                                'query.offset' => [
                                    'type' => 'input.number',
                                    'label' => 'Start From'
                                ],
                                'query.id' => [
                                    'type' => 'input.selectize',
                                    'label' => 'Post ID'
                                ],
                                'sort.orderby' => [
                                    'type' => 'select.select',
                                    'label' => 'Order By',
                                    'default' => 'date',
                                    'options' => [
                                        'date' => 'Published Date',
                                        'modified' => 'Last Modified Date',
                                        'name' => 'Post Name (Slug)',
                                        'title' => 'Title',
                                        'author' => 'Author',
                                        'comment_count' => 'Comment Count',
                                        'id' => 'ID',
                                        'rand' => 'Random'
                                    ]
                                ],
                                'sort.ordering' => [
                                    'type' => 'select.select',
                                    'label' => 'Ordering Direction',
                                    'default' => 'DESC',
                                    'options' => [
                                        'ASC' => 'Ascending',
                                        'DESC' => 'Descending'
                                    ]
                                ]
                            ]
                        ],
                        '_tab_grid' => [
                            'label' => 'Grid',
                            'fields' => [
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
                                        'link' => 'Show with link',
                                        '' => 'Hide'
                                    ]
                                ],
                                'image.width' => [
                                    'type' => 'input.number',
                                    'label' => 'Image Width',
                                    'default' => 600
                                ],
                                'image.height' => [
                                    'type' => 'input.number',
                                    'label' => 'Image Height',
                                    'default' => 400
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
                                ],
                                'readmore.enabled' => [
                                    'type' => 'select.select',
                                    'label' => 'Show Readmore',
                                    'default' => '',
                                    'options' => [
                                        'show' => 'Show',
                                        '' => 'Hide'
                                    ]
                                ],
                                'readmore.label' => [
                                    'type' => 'input.text',
                                    'label' => 'Readmore Label',
                                    'default' => 'Read More'
                                ],
                                'readmore.class' => [
                                    'type' => 'input.selectize',
                                    'label' => 'Readmore Class',
                                    'default' => 'button'
                                ]
                            ]
                        ],
                        '_tab_meta' => [
                            'label' => 'Meta',
                            'fields' => [
                                'meta.author.enabled' => [
                                    'type' => 'select.select',
                                    'label' => 'Show Author Name',
                                    'default' => 'link',
                                    'options' => [
                                        'show' => 'Show',
                                        'link' => 'Show With Link',
                                        '' => 'Hide'
                                    ]
                                ],
                                'meta.categories.enabled' => [
                                    'type' => 'select.select',
                                    'label' => 'Show Categories',
                                    'default' => 'link',
                                    'options' => [
                                        'show' => 'Show',
                                        'link' => 'Show With Link',
                                        '' => 'Hide'
                                    ]
                                ],
                                'meta.comments.enabled' => [
                                    'type' => 'select.select',
                                    'label' => 'Show Comments Count',
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
                                'meta.date.format' => [
                                    'type' => 'select.date',
                                    'label' => 'Date Format',
                                    'default' => 'F j, Y',
                                    'options' => [
                                        'F j, Y' => 'Date1'
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
