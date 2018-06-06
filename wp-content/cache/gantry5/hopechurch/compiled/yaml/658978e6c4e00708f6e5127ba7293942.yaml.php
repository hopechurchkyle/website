<?php
return [
    '@class' => 'Gantry\\Component\\File\\CompiledYamlFile',
    'filename' => '/var/www/html/wp-content/plugins/gantry5/engines/nucleus/admin/blueprints/layout/inheritance/messages/default.yaml',
    'modified' => 1527866744,
    'data' => [
        'name' => 'Inheritance',
        'description' => 'Nothing to inherit tab',
        'type' => 'empty.inheritance',
        'form' => [
            'fields' => [
                '_note' => [
                    'type' => 'separator.note',
                    'class' => 'alert alert-info blocksize-note',
                    'content' => 'You can inherit sections and particles from Base Outline.'
                ],
                '_note2' => [
                    'type' => 'separator.note',
                    'class' => 'alert alert-success blocksize-note',
                    'content' => 'No Outline is currently inheriting this item.'
                ]
            ]
        ]
    ]
];
