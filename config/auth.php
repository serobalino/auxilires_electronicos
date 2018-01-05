<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'cli',
        'passwords' => 'clientes',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session", "token"
    |
    */

    'guards' => [
        'adm' => [
            'driver' => 'session',
            'provider' => 'administradores',
        ],
        'cli' => [
            'driver' => 'session',
            'provider' => 'clientes',
        ],

        'adm-api' => [
            'driver' => 'token',
            'provider' => 'administradores',
        ],
        'cli-api' => [
            'driver' => 'token',
            'provider' => 'clientes',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'clientes' => [
            'driver' => 'eloquent',
            'model' => App\Cliente::class,
        ],
        'administradores' => [
            'driver' => 'eloquent',
            'model' => App\Administrador::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expire time is the number of minutes that the reset token should be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    */

    'passwords' => [
        'administradores'   => [
            'provider'      => 'administradores',
            'table'         => 'contrasenas_reseteadas',
            'expire'        => 30,
        ],
        'clientes' => [
            'provider'  => 'clientes',
            'table'     => 'contrasenas_reseteadas',
            'expire'    => 120,
        ],
    ],

];
