<?php

return [
    'admins' => [
        [
            'email' => 'info@albus-it.ru',
        ]
    ],
    'forms' => [
        'main' => [
            'validation' => [
                'name' => 'required|min:3|max:255',
                'phone' => 'required',
            ],
            'attributes' => [
                'name' => 'Имя',
                'phone' => 'Телефон'
            ]
        ]

    ]
];
