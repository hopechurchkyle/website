<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/plugins/gantry5/engines/nucleus/blueprints/page/head.yaml',
    'modified' => 1527866744,
    'data' => [
        'name' => 'Head Properties',
        'description' => 'Settings that can be applied to the page.',
        'type' => 'global',
        'form' => [
            'fields' => [
                'meta' => [
                    'type' => 'collection.keyvalue',
                    'label' => 'Meta Tags',
                    'description' => 'Meta Tags for extras such as Facebook and Twitter.',
                    'key_placeholder' => 'og:title, og:site_name, twitter:site',
                    'value_placeholder' => 'Value',
                    'default' => NULL
                ],
                'head_bottom' => [
                    'type' => 'textarea.textarea',
                    'label' => 'Custom Content',
                    'description' => 'Anything in this field will be appended to the head tag'
                ],
                'atoms' => [
                    'type' => 'input.hidden',
                    'override_target' => '#atoms .atoms-list + input[type="checkbox"]',
                    'array' => true
                ]
            ]
        ]
    ]
];
