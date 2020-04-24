<?php

$api = json_decode(file_get_contents('botapi.json'), true);

$json = [];

$json['info'] = [
    'name'   => 'Telegram Bot API',
    'schema' => 'https://schema.getpostman.com/json/collection/v2.1.0/collection.json'
];

foreach ($api['methods'] as $method => $fields) {
    if (!empty($fields['fields'])) {
        //gen parameters
        foreach ($fields['fields'] as $field) {
            if ($field['required']) {
                $required = 'Required';
            } else {
                $required = 'Optional';
            }

            $formData[] = [
                'key'         => $field['name'],
                'value'       => '',
                'description' => $required . '. ' . $field['description'],
                'type'        => 'text'
            ];
        }
    } else {
        $formData = [];
    }

    $items[] = [
        'name'    => $fields['name'],
        'request' => [
            'method' => 'POST',
            'body'   => [
                'mode'     => 'formdata',
                'formdata' => $formData
            ],
            'url'    => [
                'raw'      => 'https://api.telegram.org/bot{{token}}/' . $fields['name'],
                'protocol' => 'https',
                'host'     => [
                    'api',
                    'telegram',
                    'org'
                ],
                'path'     => [
                    'bot{{token}}',
                    $fields['name']
                ]
            ],
            'description'  => $fields['description']
        ]
    ];

    $formData = [];
}

$json['item'] = $items;

$json['variable'] = [
    [
        'key'   => 'token',
        'value' => '1234:AAbbcc',
        'type'  => 'string'
    ]
];

$out = json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

file_put_contents('postman_botapi.json', $out);
