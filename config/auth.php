<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'comptes',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'comptes',
        ],
        
    ],

    'providers' => [
        'comptes' => [
            'driver' => 'eloquent',
            'model' => App\Models\Compte::class,
        ],
    ],

    'passwords' => [
        'comptes' => [
            'provider' => 'comptes',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
