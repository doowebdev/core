<?php

/*
|--------------------------------------------------------------------------
|             REGISTER TWIG SERVICE PROVIDER
|--------------------------------------------------------------------------
|
*/
    $app->register(new Silex\Provider\TwigServiceProvider(), [
        'twig.path' => __DIR__.'/../../../../../../src/Doowebdev/Views',
    ]);


/*
|--------------------------------------------------------------------------
|             LANGUAGE TRANSLATOR SERVICE PROVIDER
|--------------------------------------------------------------------------
|
*/
    $app->register(new Silex\Provider\TranslationServiceProvider( $app ), [
        'locale'           => $app['language'],
        'locale_fallbacks' => ['en']

    ]);



/*
|--------------------------------------------------------------------------
|             REGISTER CONTROLLER SERVICE PROVIDER
|--------------------------------------------------------------------------
|
*/
    $app->register(new Silex\Provider\ServiceControllerServiceProvider());


/*
|--------------------------------------------------------------------------
|             REGISTER SESSIONS SERVICE PROVIDER
|--------------------------------------------------------------------------
|
*/

    $app->register(new Silex\Provider\SessionServiceProvider());



/*
|--------------------------------------------------------------------------
|             REGISTER URL GENERATOR SERVICE PROVIDER
|--------------------------------------------------------------------------
|
*/
    $app->register(new Silex\Provider\UrlGeneratorServiceProvider());


/*
|--------------------------------------------------------------------------
|             REGISTER SESSIONS SERVICE PROVIDER
|--------------------------------------------------------------------------
|
*/
    $app->register(new Silex\Provider\SessionServiceProvider());


/*
|--------------------------------------------------------------------------
|             REGISTER SESSIONS SERVICE PROVIDER
|--------------------------------------------------------------------------
|
*/

    $app->register(new \Silex\Provider\FormServiceProvider());


/*
|--------------------------------------------------------------------------
|             REGISTER ELOQUENT/CAPSULE SERVICE PROVIDER
|--------------------------------------------------------------------------
|
*/
    $app->register(
        new \BitolaCo\Silex\CapsuleServiceProvider(),
        [
            'capsule.connection' => [
                'driver'    => 'mysql',
                'host'      => 'localhost',
                'database'  => 'dooweb_web',
                'username'  => 'dooweb_web',
                'password'  => 'alltheway',
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix'    => '',
                'logging'   => true, // Toggle query logging on this connection.
            ]
        ]
    );