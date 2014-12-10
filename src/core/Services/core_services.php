<?php


$app['auth'] = $app->share(

/**
 * @return \Doowebdev\Core\Authentication\Sentry2\SentryRepository
 */
    function() {

    return new Doowebdev\Core\Authentication\Sentry2\SentryRepository();
});



/*$app['doo_session'] = $app->share(


    function() {

    return new Doowebdev\Core\Sessions\DooSession();
});*/


$app['csrf'] = $app->share(

/**
 * @return \Doowebdev\Core\CSRF\Csrf
 */
    function() {

        return new Doowebdev\Core\CSRF\Csrf();
    });


