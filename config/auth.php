<?php
return [
    'defaults' => [
        'guard' => env('AUTH_GUARD', 'admins'),
    ],
    'guards' => [
        'users' => [
            'driver' => 'jwt',
            'provider' => 'users',
        ],
        'admins' => [
            'driver' => 'jwt',
            'provider' => 'admins',
        ]
    ],
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => \App\Models\User::class,
        ],
        'admins' => [
            'driver' => 'eloquent',
            'model' => \App\Models\Admins::class,
        ]
    ]
];
