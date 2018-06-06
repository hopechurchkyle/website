<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/plugins/gantry5/engines/nucleus/particles/copyright.yaml',
    'modified' => 1527866744,
    'data' => [
        'name' => 'Copyright',
        'description' => 'Display copyright information.',
        'type' => 'particle',
        'icon' => 'fa-copyright',
        'configuration' => [
            'caching' => [
                'type' => 'static'
            ]
        ],
        'form' => [
            'fields' => [
                'enabled' => [
                    'type' => 'input.checkbox',
                    'label' => 'Enabled',
                    'description' => 'Globally enable the particle.',
                    'default' => true
                ],
                'date.start' => [
                    'type' => 'input.text',
                    'label' => 'Start Year',
                    'description' => 'Select the copyright start year.',
                    'default' => 'now'
                ],
                'date.end' => [
                    'type' => 'input.text',
                    'label' => 'End Year',
                    'description' => 'Select the copyright end year.',
                    'default' => 'now'
                ],
                'owner' => [
                    'type' => 'input.text',
                    'label' => 'Copyright owner',
                    'description' => 'Add copyright owner name.'
                ]
            ]
        ]
    ]
];
